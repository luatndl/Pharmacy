<?php 
/* SVN FILE: $Id$ */
/* ImgGroup Fixture generated on: 2010-07-05 22:42:41 : 1278340961*/

class ImgGroupFixture extends CakeTestFixture {
	var $name = 'ImgGroup';
	var $table = 'img_groups';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name_vie' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'name_eng' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'description_vie' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'description_eng' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'public' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'category_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'name_vie' => 'Lorem ipsum dolor sit amet',
		'name_eng' => 'Lorem ipsum dolor sit amet',
		'description_vie' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'description_eng' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created' => '2010-07-05 22:42:41',
		'public' => 1,
		'category_id' => 1
	));
}
?>