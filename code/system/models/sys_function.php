<?php
class SysFunction extends AppModel {

	var $name = 'SysFunction';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'SysController' => array(
			'className' => 'SysController',
			'foreignKey' => 'sys_function_id',
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
    
    function delChild($parentID)
    {
        $this->deleteAll(array('parent_id'=>$parentID));
    }

}
?>