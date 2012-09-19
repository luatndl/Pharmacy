<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');
    var $uses = array('User','Group');
    
    function beforeFilter()
    {        
        parent::beforeFilter();
    }

    function login() 
    {
        $this->layout =  null;
        if(!empty($this->data)) 
        {            
            $username = $this->data['User']['username'];
            $password = md5($this->data['User']['password']);            
            $user = $this->User->find('first',array('conditions'=>array('User.username'=>$username,'User.password'=>$password),'recursive'=>0));
                                
            if(!empty($user))
            {
                // Create login key
                $loginTime = date("Y-m-d H:i:s");
                $loginKey = $user['User']['id'] . "key" . $loginTime;
                $loginKey = md5($loginKey);                
                // ----------------
                
                // update login time
                $this->User->id = $user['User']['id'];
                $this->User->saveField('last_login',$loginTime);
                $this->User->saveField('login_key',$loginKey);
                $this->User->saveField('login_count',$user['User']['login_count'] + 1);
                
                // if 'remember me' checked, save cookie
                if(isset($this->data['User']['remember']))
                    $this->Cookie->write('UserKey', $loginKey, null, '30 days');
                else
                    $this->Cookie->write('UserKey', $loginKey, null);
                    
                $this->login_redirect($user);
            }
            else
            {
                $this->flashError(__('MsgLoginFail', true));
                $this->redirect($this->referer());
            }
        }
    }
    
    function login_redirect($user)
    {
        if($user['Group']['code'] == GROUP_SUPERADMIN)
            $this->redirect(array('controller'=>'users','action'=>'home','admin'=>1));
        else
        {
            $this->loadModel('SysFunctionsGroup');
            $this->loadModel('SysFunction');
            $fIDs = $this->SysFunctionsGroup->getFunctions($user['Group']['id']);
            if(count($fIDs) == 1)
            {
                $function = $this->SysFunction->find('first',array('conditions'=>array('SysFunction.id'=>$fIDs[0])));
                if(!empty($function))                
                    $this->redirect(array('controller'=>$function['SysFunction']['controller'],'action'=>$function['SysFunction']['action'],'admin'=>1));                
                else                
                    echo "Never go here";
            }
            elseif(count($fIDs) >= 1)
            {
                $this->redirect(array('controller'=>'users','action'=>'home','admin'=>1));
            }                
            else
            {
                $this->errorPage('MsgInvalidUrl','103');
            }
        }        
    }
    
    function logout() 
    {
        $this->Cookie->del('UserKey');        
        $this->redirect(array('controller'=>'users','action'=>'login','admin'=>0));
    }
    
    function admin_resetpassword($id)
    {
        if (!$id && empty($this->data)) 
        {            
            $this->redirect(array('controller'=>'users','action'=>'index'));
        }
        if(!empty($this->data))
        {
            $error = 0;
            if(strlen($this->data['User']['newpassword']) < 6)
            {
                $this->flashError(__('MsgPasswordLength', true));
                ++$error;
            }
            else
            {
                if($this->data['User']['newpassword'] != $this->data['User']['confirmpassword'])
                {
                    $this->flashError(__('MsgConfirmPasswordInvalid', true));
                    ++$error;
                }
            }
                
            if($error == 0)
            {
                $this->User->id = $id;
                $this->User->saveField('password',md5($this->data['User']['newpassword']));
                $this->flashSuccess(__('MsgResetPasswordSuccess',true));
                $this->redirect(array('controller'=>'users','action'=>'index'));
            }            
        }
        $this->data = $this->User->read(null, $id);
    }
    
    function admin_home()
    {
        $gName = $this->Group->field('name',array('Group.id'=>$this->curUser['group_id']));
        if(!empty($gName))
            $this->set('gName',$gName);
    }

	function admin_index() 
    {
        $groupID = $this->Session->read('GroupID');
        if(!empty($this->data))
        {
            $this->Session->write('GroupID',$this->data['User']['group_id']);
            $this->redirect(array('action'=>'index'));
        }
		        
        if(isset($groupID) && $groupID != -1)        
            $this->set('users', $this->paginate('User',array('User.group_id'=>$groupID)));
        else
            $this->set('users', $this->paginate('User',array('or'=>array('Group.code'=>array(GROUP_SUPERADMIN,GROUP_NORMAL),'Group.id'=>null))));

        $groups = $this->Group->getListGroup();
        $this->set(compact('groups','groupID'));
	}

	function admin_view($id = null) 
    {
		if (!$id) 
        {
			$this->flashWarning(__('MsgInvalidUser', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
    
    function checkUserValid($data)
    {
        if(empty($data['User']['username']))
        {
            $this->flashError(__('MsgUsernameNotEmpty',true));
            return false;
        }
        
        $user = $this->User->find('first',array('conditions'=>array('User.username'=>$data['User']['username'])));
        if(!empty($user))
        {
            $this->flashError(__('MsgUserExist',true));
            return false;
        }
        
        if(strlen($data['User']['password']) < 6)
        {
            $this->flashError(__('MsgPasswordLength',true));
            return false;
        }        
        return true;
    }
    

	function admin_add() 
    {
		if (!empty($this->data)) 
        {
            if(!$this->checkUserValid($this->data))
                return;
            
			$this->User->create();
            $this->data['User']['password'] = md5($this->data['User']['password']);
			if ($this->User->save($this->data)) 
            {
				$this->flashSuccess(__('MsgUserSaved',true));
				$this->redirect(array('action' => 'index'));
			} 
            else 
            {
				$this->flashWarning(__('MsgUserNotSaved', true));
			}
		}
        
        $groups = $this->Group->getListGroup();
        $this->set('groups',$groups);
	}

	function admin_edit($id = null) 
    {
		if (!$id && empty($this->data)) 
        {
			$this->flashWarning(__('MsgInvalidUser', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) 
        {
			if ($this->User->save($this->data)) 
            {
                $this->flashSuccess(__('MsgUserSaved',true));
				$this->redirect(array('action' => 'index'));
			} 
            else 
            {
				$this->flashWarning(__('MsgUserNotSaved', true));
			}
		}
		if (empty($this->data)) 
        {
			$this->data = $this->User->read(null, $id);
		}
        
        $groups = $this->Group->getListGroup();
        $this->set('groups',$groups);
	}

	function admin_delete($id = null) 
    {
		if (!$id) 
        {
			$this->flashWarning(__('MsgInvalidUser', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->User->del($id)) 
        {
			$this->flashSuccess(__('MsgUserDeleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->flashWarning(__('MsgUserNotDeleted', true));
		$this->redirect(array('action' => 'index'));
	}
    
    /* --------------  Normal user management ------------------ */
    
    function admin_user_index()
    {
        $users = $this->paginate('User',array('Group.code'=>GROUP_USER));
        $gender = $this->User->getGender();
        $this->set(compact('users','gender'));
    }
    
    function admin_user_edit($id = null)
    {
        // Check normal user
        $this->checkNormalUser($id);
        
        if (!empty($this->data)) 
        {
            if ($this->User->save($this->data)) 
            {
                $this->flashSuccess(__('MsgUserSaved', true));
                $this->redirect(array('action' => 'user_index'));
            } 
            else 
            {
                $this->flashWarning(__('MsgUserNotSaved', true));
            }
        }
        else
        {
            $this->data = $this->User->read(null, $id);
        }
        
        $gender = $this->User->getGender();
        $this->set('gender',$gender);
    }
    
    function admin_user_delete($id)
    {
        // Check normal user
        $this->checkNormalUser($id);
        
        if ($this->User->del($id)) 
        {
            $this->flashSuccess(__('MsgUserDeleted', true));
            $this->redirect(array('action' => 'user_index'));
        }
        $this->flashWarning(__('MsgUserNotDeleted', true));
        $this->redirect(array('action' => 'user_index'));
    }
    
    function checkNormalUser($userID)
    {
        if($this->User->checkUserByGroup($userID,GROUP_USER) == false)
        {
            $this->User->increaseErrorCount($this->curUser['id']);
            $this->flashWarning(__('MsgInvalidUser',true));            
            $this->redirect(array('action'=>'user_index'));
        }
    }
    
    function admin_notice()
    {
        $referer = Helper::url('/',true) . $this->referer();
        $this->set('referer',$referer);
    }    
     
}
?>