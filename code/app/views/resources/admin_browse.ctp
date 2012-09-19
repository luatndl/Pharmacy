<script>
function select_item(item)
{    
    opener.jq('#txt_<?php echo $returnID ?>').val(item);
    opener.jq('#div_<?php echo $returnID ?>').html('<img src = "<?php echo Helper::url('/',true).'img/' ?>'+item+'" class = "pic" /><div class = "half"></div>');
    top.close();
    return false;
}
</script>

     
<div class="container clearfix">
<div class="title">
    <p><?php __("Image") ?></p>
        <h6></h6>
        <h5>&nbsp;<?php __("Directory") ?>: <?php echo $curDir ?></h5>
</div>    
<?php $session->flash(); ?>    

<div class="left">
    <p class="title_left"><?php __("Directory") ?></p>
    
    <?php if(isset($this->params['pass'][1])): ?>
        <?php if(isset($parentID)): ?>
            <p class="contend_left"><?php echo $html->link(__('UpFolder',true),array('action'=>'browse',$returnID,$parentID)); ?></p>        
        <?php else: ?>
            <p class="contend_left"><?php echo $html->link(__('UpFolder',true),array('action'=>'browse',$returnID)); ?></p>        
        <?php endif; ?>
    <?php endif; ?>
    
    <?php if(isset($listDir) && count($listDir) > 0): ?>
        <?php foreach($listDir as $item): ?>    
            <p class="contend_left"><?php echo $html->link($item['ResourceCategory']['name'],array('action'=>'browse',$returnID,$item['ResourceCategory']['id'])); ?></p>
        <?php endforeach; ?>                        
    <?php endif; ?>
    
    <div class="half"></div>
        
</div>

<!--midle start-->        
<div class="midle not_full">
    <div class="center">
        <?php if(isset($listFile) && count($listFile) > 0): ?>
            <?php echo $form->create(null,array('action'=>'fileprocess')) ?>
            <table cellspacing="10">
                <tr class="title_table">
                    <td colspan="5"><?php __("Image") ?></td>
                </tr>
                <tr>                                
                    <?php $i=0;foreach($listFile as $item): ?>
                    <?php if($i%5==0): ?>
                        </tr>
                        <tr>
                    <?php endif; ?>
                    <td width="20%">
                        <?php                             
                            if(!empty($item['Resource']['thumbnail'])) // thumbnail
                                echo $html->link($html->image($item['Resource']['thumbnail'],array('class'=>'pic')),array("../../../".$item['Resource']['thumbnail']),array('escape'=>false,'onclick'=>'return select_item(\''. $item['Resource']['thumbnail']. '\')'));
                            elseif(!empty($item['Resource']['image'])) // normal
                                echo $html->link($html->image($item['Resource']['image'],array('class'=>'pic')),array("../../../".$item['Resource']['image']),array('escape'=>false,'onclick'=>'return select_item(\''. $item['Resource']['image']. '\')'));
                            else
                                echo 'NoImage';
                        ?>
                    </td>
                    <?php $i++;endforeach; ?>
                    <?php 
                        $nullTD = 5 - $i%5;
                        for($i=0;$i<$nullTD;++$i)
                        {
                            echo '<td>&nbsp;</td>';
                        }
                     ?>
                </tr>
                <tr class="title_table_bottom">
                    <td colspan="5"></td>
                </tr>
            </table>
            </form>
        <?php else: ?>
            <table>
                <tr class="title_table">
                    <td colspan="2"><?php __("Empty") ?></td>
                </tr>
                <tr>
                    <td><br><?php __("UploadImage") ?><br><br></td>
                </tr>
            </table>
        <?php endif; ?>
    </div>
</div>
</div><br>