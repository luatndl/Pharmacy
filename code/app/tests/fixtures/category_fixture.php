<?php 
/* SVN FILE: $Id$ */
/* Category Fixture generated on: 2010-07-05 22:36:16 : 1278340576*/

class CategoryFixture extends CakeTestFixture {
	var $name = 'Category';
	var $table = 'categories';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name_vie' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'name_eng' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'name_vie' => 'Lorem ipsum dolor sit amet',
		'name_eng' => 'Lorem ipsum dolor sit amet'
	));
}
?>