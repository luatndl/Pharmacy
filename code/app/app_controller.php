<?php

class AppController extends Controller 
{
    var $helpers = array('Html','Form','Ajax','Javascript');
    var $components = array('Cookie');
    var $uses = array('User');
    
    var $curUser;
    
    function beforeFilter()
    {        
        parent::beforeFilter();
        if (strpos($this->action, 'admin_') !== false) 
        {
            $this->checkLogin();
            $this->layout = 'admin';
        }
    }
    
    function checkLogin()
    {
        $userKey = $this->Cookie->read('UserKey');        
        if(!isset($userKey))
        {
            $this->redirect(array('controller'=>'users','action'=>'login','admin'=>0));
        }
        else
        {
            $user = $this->User->find('first',array('conditions'=>array('User.login_key'=>$userKey)));
            if(!empty($user))
            {
                $this->curUser = $user['User'];
                $this->set('curUser',$this->curUser);
                
                // Check auth and return functionIDs of group 
                $fIDs = $this->checkAuth();
                if($fIDs == GROUP_SUPERADMIN)
                    $this->getTopMenu(); // Render full menu
                else
                    $this->getTopMenu($fIDs); // Render menu base on function available
                
            }
            else
            {
                $this->redirect(array('controller'=>'users','action'=>'login','admin'=>0));
            }
        }
    
    }
    
    /* ----------------------------- Check Auth ----------------------------- */
    
    function checkAuth()
    {
        if($this->params['controller'] == 'users' && $this->params['action'] == 'admin_notice')
        {
            // Allow to go to user notice (default)
        }
        else
        {
            // Check User Group
            $this->loadModel('Group');        
            $group = $this->Group->find('first',array('conditions'=>array('Group.id'=>$this->curUser['group_id'])));
            if(!empty($group))
            {
                // Check super admin
                if($group['Group']['code'] == GROUP_SUPERADMIN)
                {                
                    return GROUP_SUPERADMIN;
                }
                else // Get group's functions
                {
                    $this->loadModel('SysFunctionsGroup');
                    $function = $this->SysFunctionsGroup->find('all',array('conditions'=>array('SysFunctionsGroup.group_id'=>$group['Group']['id'])));
                    $fIDs = array();
                    if(count($function) > 0)
                    {
                        foreach($function as $item)
                        {
                            array_push($fIDs, $item['SysFunctionsGroup']['sys_function_id']);
                        }
                    }
                    $functionCount = count($fIDs);
                    if($functionCount > 0)
                    {
                        // Check controller and action allowed
                        $curController = $this->params['controller'];
                        $curAction = $this->params['action'];
                        $check = false;
                        foreach($fIDs as $fID)
                        {
                            $hasAuth = $this->validateAuth($fID,$curController,$curAction);
                            if($hasAuth)
                            {
                                $check = true;
                                break;
                            }
                        }
                        if(!$check)
                        {
                            //debug( 'False. (Not allowed to enter this place)');
                            $this->errorPage('MsgInvalidUrl','101');
                        }
                        
                        // Has Auth = true  => Allow enter this place
                        return $fIDs;
                        // ------------------------------------------
                    }
                    else
                    {
                        //echo 'False. (Group without functions)';
                        $this->errorPage('MsgInvalidUrl','102');
                    }
                }

            }
            else // Not in any group
            {
                //echo 'False. (Not in any group)';
                $this->errorPage('MsgInvalidUrl','103');
            }
            // -----------------
        }        
    }
    
    function errorPage($msg,$error)
    {
        /* ------------- Error ------------- */
        
        /* 101: Permision denied to go to this place.
        /* 102: This group dont have any funtion.
        /* 103: User not in group, or group does not exist any more.
        
        /* --------------------------------- */
        
        $this->Session->write('Notice',__($msg,true));
        $this->Session->write('NoticeCode',$error);
        $this->redirect(array('controller'=>'users','action'=>'notice','admin'=>1));
    }
    
    function validateAuth($functionID,$curController,$curAction)
    {                
        $curAction = str_replace('admin_','',$curAction); // Use only in backend
        if($curController == 'users' && $curAction == 'auth')
            return true; // Allow this action for viewing auth message
               
        $this->loadModel('SysController');
        $controller = $this->SysController->find('first',array('conditions'=>array('SysController.sys_function_id'=>$functionID,'SysController.name'=>$curController),'recursive'=>-1));            
        
        if(!empty($controller))
        {
            $controllerID = $controller['SysController']['id'];                
            $this->loadModel('SysAction');
            $action = $this->SysAction->find('first',array('conditions'=>array('SysAction.sys_controller_id'=>$controllerID,'SysAction.name'=>$curAction),'recursive'=>-1));                
            
            if(!empty($action))
                return true;
            else
                return false;
        }
        else
        {
            return false;
        }
    }
    /* ----------------------------- End check Auth ----------------------------- */
    
    function getTopMenu($functionIDs = null)
    {
        if(count($functionIDs) != 1)
        {
            $this->loadModel('SysFunction');
            
            if($functionIDs == null) // System Admin
                $listParent = $this->SysFunction->find('all',array('conditions'=>array('SysFunction.parent_id'=>null,'SysFunction.display'=>1),'order'=>array('SysFunction.displayorder')));
            else
                $listParent = $this->SysFunction->find('all',array('conditions'=>array('SysFunction.parent_id'=>null,'SysFunction.display'=>1,'or'=>array('SysFunction.id'=>$functionIDs,'SysFunction.controller = \'\'')),'order'=>array('SysFunction.displayorder')));
            
            $menu = array();
            // Render default Home button
            $arrHome = array('Menu'=>array('SysFunction'=>array('name'=>__('Home',true),'controller'=>'users','action'=>'home')),'SubMenu'=>null);
            array_push($menu,$arrHome);
            // ---------------------------
            
            foreach($listParent as $parent)
            {
                $parentID = $parent['SysFunction']['id'];
                if($functionIDs == null) // System Admin
                    $listChild = $this->SysFunction->find('all',array('conditions'=>array('SysFunction.parent_id'=>$parentID,'SysFunction.display'=>1),'order'=>array('SysFunction.displayorder')));
                else
                    $listChild = $this->SysFunction->find('all',array('conditions'=>array('SysFunction.parent_id'=>$parentID,'SysFunction.display'=>1,'or'=>array('SysFunction.id'=>$functionIDs,'SysFunction.controller = \'\'')),'order'=>array('SysFunction.displayorder')));
                array_push($menu,array('Menu'=>$parent,'SubMenu'=>$listChild));
            }
            $this->set('sys_menu',$menu);
            //debug($functionIDs);
        }        
    }
    
    # sets up successful session flash message for view
    function flashSuccess($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'flash'.DS.'success');
        if (!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }

    # sets up warning session flash message for view
    function flashWarning($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'flash'.DS.'warning');
        if (!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }

    # sets up information session flash message for view
    function flashInfo($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'flash'.DS.'info');
        if (!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }

    # sets up successful session flash message for view
    function flashError($msg, $url = null)
    {
        $this->Session->setFlash($msg, 'flash'.DS.'error');
        if (!empty($url))
        {
            $this->redirect($url, null, true);
        }
    }
}
?>