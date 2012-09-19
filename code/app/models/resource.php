<?php
class Resource extends AppModel {

	var $name = 'Resource';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'ResourceCategory' => array('className' => 'ResourceCategory',
								'foreignKey' => 'resource_category_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>