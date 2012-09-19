<?php
class User extends AppModel {

	var $name = 'User';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    function getGender()
    {
          $type[GENDER_MALE] = __('Male',true);
          $type[GENDER_FEMALE] = __('Female',true);
          return $type;
    }
    
    function checkUserByGroup($userID,$groupCode)
    {
        $user = $this->find('first',array('conditions'=>array('User.id'=>$userID)));
        if(!empty($user) && $user['Group']['code'] == $groupCode)
            return true; // Is in this group        
        else
            return false;
    }
    
    function increaseErrorCount($userID)
    {
        $error = $this->field('error_count',array('User.id'=>$userID));
        $this->id = $userID;
        $this->saveField('error_count',$error + 1);
    }
    
}
?>