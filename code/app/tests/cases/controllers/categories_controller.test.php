<?php 
/* SVN FILE: $Id$ */
/* CategoriesController Test cases generated on: 2010-07-05 22:36:35 : 1278340595*/
App::import('Controller', 'Categories');

class TestCategories extends CategoriesController {
	var $autoRender = false;
}

class CategoriesControllerTest extends CakeTestCase {
	var $Categories = null;

	function startTest() {
		$this->Categories = new TestCategories();
		$this->Categories->constructClasses();
	}

	function testCategoriesControllerInstance() {
		$this->assertTrue(is_a($this->Categories, 'CategoriesController'));
	}

	function endTest() {
		unset($this->Categories);
	}
}
?>