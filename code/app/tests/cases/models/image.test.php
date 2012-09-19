<?php 
/* SVN FILE: $Id$ */
/* Image Test cases generated on: 2010-07-05 22:50:03 : 1278341403*/
App::import('Model', 'Image');

class ImageTestCase extends CakeTestCase {
	var $Image = null;
	var $fixtures = array('app.image');

	function startTest() {
		$this->Image =& ClassRegistry::init('Image');
	}

	function testImageInstance() {
		$this->assertTrue(is_a($this->Image, 'Image'));
	}

	function testImageFind() {
		$this->Image->recursive = -1;
		$results = $this->Image->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Image' => array(
			'id' => 1,
			'name_vie' => 'Lorem ipsum dolor sit amet',
			'name_eng' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'link' => 'Lorem ipsum dolor sit amet',
			'description_vie' => 'Lorem ipsum dolor sit amet',
			'description_eng' => 'Lorem ipsum dolor sit amet',
			'img_group_id' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>