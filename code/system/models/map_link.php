<?php
class MapLink extends AppModel {

	var $name = 'MapLink';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Map' => array(
			'className' => 'Map',
			'foreignKey' => 'map_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>