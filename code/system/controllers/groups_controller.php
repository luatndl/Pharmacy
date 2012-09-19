<?php
class GroupsController extends AppController {

	var $name = 'Groups';
	var $helpers = array('Html', 'Form');

	function index() 
    {
        if(!empty($this->data))
        {
            $this->loadModel('SysFunctionsGroup');
            
            $this->SysFunctionsGroup->create();
            if($this->SysFunctionsGroup->save($this->data))
                $this->redirect(array('action'=>'index'));            
            else
                debug('False');
        }
        
		$this->Group->recursive = 0;
        $groups = $this->Group->find('all',array('conditions'=>array('Group.code <> \''.GROUP_SUPERADMIN.'\' And Group.code <> \''.GROUP_NORMAL.'\'')));
		$this->set('groups', $groups);
        
        $this->loadModel('SysFunctionsGroup');
        $groupFunction = $this->SysFunctionsGroup->find('all',array('joins' => array(
                array(
                    'table' => 'groups',
                    'alias' => 'Group',
                    'type' => 'inner',
                    'conditions'=> array('SysFunctionsGroup.group_id = Group.id')
                    ),
                array(
                    'table' => 'sys_functions',
                    'alias' => 'SysFunction',
                    'type' => 'inner',
                    'conditions'=> array('SysFunctionsGroup.sys_function_id = SysFunction.id')
                    )),'fields'=>array('*'),'conditions'=>array('SysFunction.is_system'=>true)));
        $this->set('groupFunction',$groupFunction);
        
        $this->loadModel('SysFunction');
        $functions = $this->SysFunction->find('all',array('conditions'=>array('SysFunction.is_system'=>true)));
        $this->set('functions',$functions);
        
	}

	function add() 
    {
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('The Group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Group could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('The Group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Group->read(null, $id);
		}
	}
    
    function del_group_function($id = null)
    {
        if (!$id) 
        {
            $this->Session->setFlash(__('Invalid id for Group', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->loadModel('SysFunctionsGroup');
        if ($this->SysFunctionsGroup->del($id)) 
        {
            $this->Session->setFlash(__('Group deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The Group could not be deleted. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }

	function delete($id = null) 
    {
		if (!$id) 
        {
			$this->Session->setFlash(__('Invalid id for Group', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Group->del($id)) 
        {
			$this->Session->setFlash(__('Group deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Group could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>