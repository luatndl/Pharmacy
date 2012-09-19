<?php

class AdvHelper extends AppHelper 
{    
    var $helpers = array('Html');
    
    function renderAdv($data,$pos_type)
    {        
        if(isset($data[$pos_type]) && count($data[$pos_type]) > 0)
        {
            echo '<div style = "border: solid 1px grey">';
            $advData = $data[$pos_type];
            foreach ($advData as $item) 
            {
                if(!empty($item['Advertisement']['image']))
                {
                    $ext = substr($item['Advertisement']['image'], strrpos($item['Advertisement']['image'], '.') + 1);
                    $ext = strtolower($ext);
                    
                    if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png')
                    {
                         echo $this->Html->link($this->Html->image($item['Advertisement']['image']),array('controller' => 'advertisements', 'action' => 'redirectUrl',$item['Advertisement']['id'],'admin'=>0),array('escape'=>false,'target'=>'_blank'));
                    }
                    elseif($ext == 'flv' || $ext == 'swf')
                    {
                        echo '<object>
                            <param name="movie" value="'.Helper::url('/',true) .'/webroot/'.$item['Advertisement']['image'].'">
                            <embed src="'.Helper::url('/',true).'/webroot/'.$item['Advertisement']['image'].'"></embed>
                        </object>';
                    }
                    else
                    {
                        echo '<!-- Invalid adv type (must be image or flash only) -->';
                    }
                    echo '<div class = "half"></div>';
                }            
            }
            echo '</div>';
        }
        else
        {
            echo '<!-- Dont have any item -->';
        }        
    }
    
    function renderAdvLeft($data){ $this->renderAdv($data,ADV_LEFT);}
    
    function renderAdvRight($data){ $this->renderAdv($data,ADV_RIGHT);}
    
    function renderAdvTop($data){ $this->renderAdv($data,ADV_TOP);}
    
    function renderAdvBottom($data){ $this->renderAdv($data,ADV_BOTTOM);}
    
    function renderAdvMiddle($data){ $this->renderAdv($data,ADV_MIDDLE);}
}

?>