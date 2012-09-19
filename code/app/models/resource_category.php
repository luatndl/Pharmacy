<?php
class ResourceCategory extends AppModel {

	var $name = 'ResourceCategory';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Resource' => array('className' => 'Resource',
								'foreignKey' => 'resource_category_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);        
    
    function getDirPath($id)
    {
        $path = "";
        $dir = $this->find('first',array('conditions'=>array('ResourceCategory.id'=>$id),'recursive'=>0));        
        $folderName = $dir['ResourceCategory']['name'];
        
        if(empty($dir['ResourceCategory']['parent_id']))
        {            
            $path = $path .'/'. $folderName;
        }
        else
        {
            $path = $path .'/'. $folderName;
            $path = $this->getDirPath($dir['ResourceCategory']['parent_id']) . $path;
        }
        return $path;
    }
}
?>