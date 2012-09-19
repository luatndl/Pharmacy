<?php
class SysUsersController extends AppController {

	var $name = 'SysUsers';
	var $helpers = array('Html', 'Form');
    var $uses = array();
    
    function login()
    {
        if(!empty($this->data))
        {
            $username = $this->data['SysUser']['username'];
            $password = md5($this->data['SysUser']['password']);
            
            if($username == 'admin' && $password == '21232f297a57a5a743894a0e4a801fc3')
            {
                $this->Session->write('SysUserLogin',1);
                $this->redirect(array('controller'=>'sys_functions','action'=>'index'));
            }
            else
            {
                $this->set('msgInvalidLogin',__('MsgInvalidLogin',true));
            }            
        }
    }
    
    function logout()
    {
        $this->Session->del('SysUserLogin');
        $this->redirect(array('controller'=>'sys_users','action'=>'login'));
    }

}
?>