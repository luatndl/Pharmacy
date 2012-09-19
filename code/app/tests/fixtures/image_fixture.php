<?php 
/* SVN FILE: $Id$ */
/* Image Fixture generated on: 2010-07-05 22:50:03 : 1278341403*/

class ImageFixture extends CakeTestFixture {
	var $name = 'Image';
	var $table = 'images';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name_vie' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'name_eng' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'image' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 150),
		'link' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 150),
		'description_vie' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 500),
		'description_eng' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 500),
		'img_group_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'name_vie' => 'Lorem ipsum dolor sit amet',
		'name_eng' => 'Lorem ipsum dolor sit amet',
		'image' => 'Lorem ipsum dolor sit amet',
		'link' => 'Lorem ipsum dolor sit amet',
		'description_vie' => 'Lorem ipsum dolor sit amet',
		'description_eng' => 'Lorem ipsum dolor sit amet',
		'img_group_id' => 1
	));
}
?>