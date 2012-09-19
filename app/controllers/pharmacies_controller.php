<?php
class PharmaciesController extends AppController {

	var $name = 'Pharmacies';
	var $helpers = array('Html', 'Form');
	var $uses = array('User');
	
	function beforeFilter()
    {        
        parent::beforeFilter();
    }
	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The User could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}


	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The User could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	//TODO register user
	function register()
	{
		$this->layout =  null;
	
	}
	
	//TODO login page
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
	//TODO logout page
	function logout() 
    {
        $this->Cookie->del('UserKey');        
        $this->redirect(array('controller'=>'users','action'=>'login','admin'=>0));
    }

}
?>