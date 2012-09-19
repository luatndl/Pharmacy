<?php
class GroupsController extends AppController {

	var $name = 'Groups';
	var $helpers = array('Html', 'Form');
    var $uses = array('Group','SysFunction');

	function admin_index() 
    {
        if(!empty($this->data))
        {
            $this->Group->create();
            if($this->Group->save($this->data))
            {
                $this->redirect(array('action'=>'index'));
            }
        }
        
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate('Group',array('or'=>array('code'=>array(GROUP_SUPERADMIN,GROUP_NORMAL)))));
	}

	function admin_view($id = null) 
    {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

	function admin_edit($id = null) 
    {
        // Check system group
        if($this->Group->checkSystemGroup($id))
            $this->redirect(array('action'=>'index'));
        // ------------------

		if (!empty($this->data)) 
        {
			if ($this->Group->save($this->data)) 
            {
				$this->Session->setFlash(__('The Group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} 
            else 
            {
				$this->Session->setFlash(__('The Group could not be saved. Please, try again.', true));
			}
		}
        else
        {
            $this->data = $this->Group->read(null, $id);
        }
        
        
        App::import('Model', 'SysFunctionsGroup');
        $this->SysFunctionsGroup = new SysFunctionsGroup();
        
        $fGroup = $this->SysFunctionsGroup->find('all',array('conditions'=>array('SysFunctionsGroup.group_id'=>$id)));
        $fIDs = array();
        foreach($fGroup as $fID)
        {
            array_push($fIDs,$fID['SysFunction']['id']);
        }
        
        $fAvailable = $this->SysFunction->find('list',array('conditions'=>array('SysFunction.display'=>true,'SysFunction.controller <> \'\'','not'=>array('SysFunction.id'=>$fIDs))));
        $this->set(compact('fAvailable','fGroup'));
	}
    
    function admin_groupfunction()
    {
        if(!empty($this->data))
        {
            App::import('Model', 'SysFunctionsGroup');
            $this->SysFunctionsGroup = new SysFunctionsGroup();
            // Add functions
            if(isset($this->params['form']['add']))
            {
                if(isset($this->data['FunctionAvailable']))
                {                    
                    $this->SysFunctionsGroup->addFunctionsToGroup($this->data['FunctionAvailable'],$this->data['GroupID']);
                }
            }
            
            // Remove functions
            if(isset($this->params['form']['remove']))
            {
                if(isset($this->data['GroupFunction']))
                {                    
                    $this->SysFunctionsGroup->removeFunctionsFromGroup($this->data['GroupFunction'],$this->data['GroupID']);                    
                }
            }
            $this->redirect(array('action'=>'edit',$this->data['GroupID']));
        }        
    }

	function admin_delete($id = null) 
    {
		// Check system group
        if($this->Group->checkSystemGroup($id))
            $this->redirect(array('action'=>'index'));
        // ------------------
        
		if ($this->Group->del($id)) 
        {
            // Also Delete functions in Group
            $this->loadModel('SysFunctionsGroup');
            $this->SysFunctionsGroup->deleteAll(array('SysFunctionsGroup.group_id'=>$id));
            // ------------------------------
			$this->flashSuccess(__('Group deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->flashWarning(__('The Group could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>