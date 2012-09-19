<?php
class ResourceCategoriesController extends AppController 
{
	var $name = 'ResourceCategories';
	var $helpers = array('Html', 'Form');

	function admin_add() 
    {
		if (!empty($this->data)) 
        {                        
			$this->ResourceCategory->create();
			if ($this->ResourceCategory->save($this->data)) 
            {
                // --- Default Folder ---
                $defaultFolder = 'img/resources';
                if(!is_dir($defaultFolder))
                {
                    mkdir($defaultFolder, 0777);
                    chmod($defaultFolder, 0777);
                }
                // ----------------------
                $id = $this->ResourceCategory->field('id',array("id = (Select max(id) From resource_categories)"));                
                $dirPath = $defaultFolder . $this->ResourceCategory->getDirPath($id);
                if(!is_dir($dirPath))
                {
                    mkdir($dirPath, 0777);
                    chmod($dirPath, 0777);
                }                
				$this->redirect(array('controller'=>'resources','action'=>'index',$this->data['ResourceCategory']['parent_id']));
			}
		}
	}

	function admin_delete($id = null) 
    {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ResourceCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResourceCategory->del($id)) {
			$this->Session->setFlash(__('ResourceCategory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>