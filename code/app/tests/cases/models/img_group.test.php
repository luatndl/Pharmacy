<?php 
/* SVN FILE: $Id$ */
/* ImgGroup Test cases generated on: 2010-07-05 22:42:41 : 1278340961*/
App::import('Model', 'ImgGroup');

class ImgGroupTestCase extends CakeTestCase {
	var $ImgGroup = null;
	var $fixtures = array('app.img_group');

	function startTest() {
		$this->ImgGroup =& ClassRegistry::init('ImgGroup');
	}

	function testImgGroupInstance() {
		$this->assertTrue(is_a($this->ImgGroup, 'ImgGroup'));
	}

	function testImgGroupFind() {
		$this->ImgGroup->recursive = -1;
		$results = $this->ImgGroup->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ImgGroup' => array(
			'id' => 1,
			'name_vie' => 'Lorem ipsum dolor sit amet',
			'name_eng' => 'Lorem ipsum dolor sit amet',
			'description_vie' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'description_eng' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2010-07-05 22:42:41',
			'public' => 1,
			'category_id' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>