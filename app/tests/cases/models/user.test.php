<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2012-09-19 22:19:01 : 1348064341*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
			'id' => 1,
			'Username' => 'Lorem ipsum dolor sit amet',
			'Salutation' => 'Lorem ip',
			'FirstName' => 'Lorem ipsum dolor sit amet',
			'LastName' => 'Lorem ipsum dolor sit amet',
			'Address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'Country_id' => 1,
			'Postcode' => 'Lorem ipsum dolor sit amet',
			'Email' => 'Lorem ipsum dolor sit amet',
			'Telephone' => 'Lorem ipsum dolor sit amet',
			'Fax' => 'Lorem ipsum dolor sit amet',
			'MatchMemberSince' => '2012-09-19 22:19:01',
			'LastLoggedIn' => '2012-09-19 22:19:01',
			'GPHCNumber' => 1,
			'DateOfPharmacist' => '2012-09-19 22:19:01',
			'EPS1Ready' => 1,
			'EPS2Ready' => 1,
			'EssentialService' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'AdvancedServices' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'EnhancedServices' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'PatientGroupDirectives' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'UserType' => 1,
			'pharmacy_id' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>