<?php 
/* SVN FILE: $Id$ */
/* ImgGroupsController Test cases generated on: 2010-07-05 22:42:57 : 1278340977*/
App::import('Controller', 'ImgGroups');

class TestImgGroups extends ImgGroupsController {
	var $autoRender = false;
}

class ImgGroupsControllerTest extends CakeTestCase {
	var $ImgGroups = null;

	function startTest() {
		$this->ImgGroups = new TestImgGroups();
		$this->ImgGroups->constructClasses();
	}

	function testImgGroupsControllerInstance() {
		$this->assertTrue(is_a($this->ImgGroups, 'ImgGroupsController'));
	}

	function endTest() {
		unset($this->ImgGroups);
	}
}
?>