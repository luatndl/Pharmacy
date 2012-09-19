<?php 
/* SVN FILE: $Id$ */
/* Category Test cases generated on: 2010-07-05 22:36:16 : 1278340576*/
App::import('Model', 'Category');

class CategoryTestCase extends CakeTestCase {
	var $Category = null;
	var $fixtures = array('app.category');

	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function testCategoryInstance() {
		$this->assertTrue(is_a($this->Category, 'Category'));
	}

	function testCategoryFind() {
		$this->Category->recursive = -1;
		$results = $this->Category->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Category' => array(
			'id' => 1,
			'name_vie' => 'Lorem ipsum dolor sit amet',
			'name_eng' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>