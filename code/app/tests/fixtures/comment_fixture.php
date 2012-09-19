<?php 
/* SVN FILE: $Id$ */
/* Comment Fixture generated on: 2010-07-05 22:43:22 : 1278341002*/

class CommentFixture extends CakeTestFixture {
	var $name = 'Comment';
	var $table = 'comments';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'content' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 500),
		'image_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'img_group_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'content' => 'Lorem ipsum dolor sit amet',
		'image_id' => 1,
		'img_group_id' => 1
	));
}
?>