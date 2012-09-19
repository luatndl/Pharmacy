<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2012-09-19 22:19:01 : 1348064341*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'Username' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'Salutation' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 10),
		'FirstName' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'LastName' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'Address' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'Country_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'Postcode' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'Email' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'Telephone' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'Fax' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'MatchMemberSince' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'LastLoggedIn' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'GPHCNumber' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'DateOfPharmacist' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'EPS1Ready' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'EPS2Ready' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'EssentialService' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'AdvancedServices' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'EnhancedServices' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'PatientGroupDirectives' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'UserType' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'pharmacy_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
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
}
?>