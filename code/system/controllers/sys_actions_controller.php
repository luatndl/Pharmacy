<?php
class SysActionsController extends AppController {

	var $name = 'SysActions';
	var $helpers = array('Html', 'Form');

	function add() 
    {
		if (!empty($this->data)) {
			$this->SysAction->create();
			if ($this->SysAction->save($this->data)) 
            {				
				$this->redirect(array('controller'=>'sys_functions','action'=>'manage',$this->data['SysAction']['sys_function_id'],$this->data['SysAction']['sys_controller_id']));
			} 
            else 
            {
				$this->Session->setFlash(__('The SysAction could not be saved. Please, try again.', true));
			}
		}
		$sysControllers = $this->SysAction->SysController->find('list');
		$this->set(compact('sysControllers'));
	}

	function delete($id = null,$functionID = null,$controllerID = null) 
    {		        
		if ($this->SysAction->del($id))
        {			
			$this->redirect(array('controller'=>'sys_functions','action'=>'manage',$functionID,$controllerID));
		}
	}

}
?>