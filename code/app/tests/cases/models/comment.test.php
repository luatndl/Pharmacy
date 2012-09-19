<?php 
/* SVN FILE: $Id$ */
/* Comment Test cases generated on: 2010-07-05 22:43:22 : 1278341002*/
App::import('Model', 'Comment');

class CommentTestCase extends CakeTestCase {
	var $Comment = null;
	var $fixtures = array('app.comment');

	function startTest() {
		$this->Comment =& ClassRegistry::init('Comment');
	}

	function testCommentInstance() {
		$this->assertTrue(is_a($this->Comment, 'Comment'));
	}

	function testCommentFind() {
		$this->Comment->recursive = -1;
		$results = $this->Comment->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Comment' => array(
			'id' => 1,
			'content' => 'Lorem ipsum dolor sit amet',
			'image_id' => 1,
			'img_group_id' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>