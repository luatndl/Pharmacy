<?php
class SysAction extends AppModel {

	var $name = 'SysAction';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'SysController' => array(
			'className' => 'SysController',
			'foreignKey' => 'sys_controller_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>