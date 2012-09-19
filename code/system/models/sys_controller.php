<?php
class SysController extends AppModel {

	var $name = 'SysController';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'SysFunction' => array(
			'className' => 'SysFunction',
			'foreignKey' => 'sys_function_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'SysAction' => array(
			'className' => 'SysAction',
			'foreignKey' => 'sys_controller_id',
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
    
    function getIDsByFunction($functionID)
    {
        $list = $this->find('all',array('conditions'=>array('sys_function_id'=>$functionID)));
        $ids = array();
        foreach($list as $item)
        {
            array_push($ids,$item['SysController']['id']);
        }
        return $ids;
    }

}
?>