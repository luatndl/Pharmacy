<?php
class Group extends AppModel {

	var $name = 'Group';
    
    function getListGroup()
    {
        return $this->find('list',array('conditions'=>array('or'=>array('code'=>array(GROUP_SUPERADMIN,GROUP_NORMAL)))));
    }
    
    function checkSystemGroup($id)
    {
        $temp = $this->find('first',array('conditions'=>array('Group.id'=>$id)));        
        if(empty($temp) || $temp['Group']['code'] != GROUP_NORMAL) // Invalid
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // Get group ID by special code (not 'normal')
    function getGroupID($code)
    {
        return $this->field('id',array('code'=>$code));
    }

}
?>