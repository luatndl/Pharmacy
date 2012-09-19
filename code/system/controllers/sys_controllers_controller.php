<?php
class SysControllersController extends AppController {

	var $name = 'SysControllers';
	var $helpers = array('Html', 'Form');
    var $uses = array('SysController','SysAction');

	function add() 
    {
		if (!empty($this->data)) 
        {
			$this->SysController->create();
			if ($this->SysController->save($this->data)) 
            {				
				$this->redirect(array('controller'=>'sys_functions','action'=>'manage',$this->data['SysController']['sys_function_id']));
			} else {
				$this->Session->setFlash(__('The SysController could not be saved. Please, try again.', true));
			}
		}
		$sysFunctions = $this->SysController->SysFunction->find('list');
		$this->set(compact('sysFunctions'));
	}

	function delete($id = null,$functionID = null) 
    {		
        // Delete child first
        $this->SysAction->deleteAll(array('sys_controller_id'=>$id));        
        
		if ($this->SysController->del($id)) 
        {
			$this->redirect(array('controller'=>'sys_functions','action'=>'manage',$functionID));
		}
	}

}
?>