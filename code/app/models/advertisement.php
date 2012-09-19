<?php

class Advertisement extends AppModel 
{
	var $name = 'Advertisement';
    
    function getAdvType()
    {
        $type = array
        (
            ADV_TOP => __('AdvTop',true),
            ADV_LEFT => __('AdvLeft',true),
            ADV_MIDDLE => __('AdvMiddle',true),
            ADV_RIGHT => __('AdvRight',true),
            ADV_BOTTOM => __('AdvBottom',true)
        );
        return $type;
    }
    
    function getAdv()
    {        
        $arrAdv = array();
        $arrType = $this->getAdvType();
        foreach($arrType as $key => $text)
        {
            $list = $this->find('all',array('conditions'=>array('pos_type'=>$key,'status'=>ADV_ACTIVE),'recursive'=>-1));
            if(count($list) > 0)
                $arrAdv[$key] = $list;
        }
        return $arrAdv;        
    }
    
    function updateStatus()
    {
        $curDate = date('Y-m-d');
        $list = $this->find('all',array('conditions'=>array("expired_date < '$curDate'",'status'=>ADV_ACTIVE)));
        if(count($list) > 0)
        {
            foreach($list as $item)
            {
                $this->id = $item['Advertisement']['id'];
                $this->saveField('status',ADV_NOT_ACTIVE);                
            }
        }
    }
    
    function increaseCount($id)
    {
        // increate visit count and return redirect url        
        $url = $this->field('url',array('id'=>$id));
        $count = $this->field('count',array('id'=>$id));
        $this->id = $id;
        $this->saveField('count',$count + 1);
        return $url;
    }    
    
    function getAdvStatus()
    {
        $status = array
        (
            ADV_ACTIVE => __('AdvStatusActive',true),
            ADV_NOT_ACTIVE => __('AdvStatusNotActive',true)
        );
        return $status;
    }
    
    function change_status($id,$status)
    {
        $this->id = $id;
        $this->saveField('status',$status);
    }

}
?>