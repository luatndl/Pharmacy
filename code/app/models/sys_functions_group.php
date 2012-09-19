<?php
class SysFunctionsGroup extends AppModel {

	var $name = 'SysFunctionsGroup';

    
    var $belongsTo = array(
        'SysFunction' => array(
            'className' => 'SysFunction',
            'foreignKey' => 'sys_function_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
    function addFunctionsToGroup($functionIDs,$groupID)
    {                
        foreach($functionIDs as $fID)
        {
            $this->create();        
            $this->save(array('sys_function_id'=>$fID,'group_id'=>$groupID));
        }
    }
    
    function removeFunctionsFromGroup($functionIDs,$groupID)
    {                
        foreach($functionIDs as $fID)
        {            
            $this->deleteAll(array('sys_function_id'=>$functionIDs,'group_id'=>$groupID));
        }
    }
    
    function getFunctions($groupID)
    {
        $temp = $this->find('all',array('conditions'=>array('group_id'=>$groupID)));
        $fIDs = array();
        foreach($temp as $item)
        {
            array_push($fIDs,$item['SysFunctionsGroup']['sys_function_id']);
        }
        return $fIDs;
    }
    
}
?>