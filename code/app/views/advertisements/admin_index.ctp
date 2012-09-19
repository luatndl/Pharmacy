<style>
.advdiv
{
    border:solid 1px #8492B7;
    width:30px;
    height:15px;
}
</style>



<div class="container clearfix">
<div class="title">
    <p><?php __("Advertisements") ?></p>
        <h6></h6>
        <h5>&nbsp;</h5>
</div>    
<?php $session->flash(); ?>

<!--midle start-->        
<div class="midle">                    
    
    <div style="padding:5px;color:#6B799C">
    <table>
        <tr>
            <td><div class="advdiv" style="background-color:#DFF2BF"></div></td>
            <td>&nbsp;<?php __("AdvActive") ?>&nbsp;</td>
            <td><div class="advdiv" style="background-color:#FEEFB3"></div></td>
            <td>&nbsp;<?php __("AdvActiveInExpired") ?>&nbsp;</td>
            <td><div class="advdiv" style="background-color:#FFBABA"></div></td>
            <td>&nbsp;<?php __("AdvNotActiveTemp") ?>&nbsp;</td>
            <td><div class="advdiv" style="background-color:#C9CCC4"></div></td>
            <td>&nbsp;<?php __("AdvClose") ?>&nbsp;</td>
        </tr>
    </table>
    </div>
    
    <div class="under_title">
        <p><?php echo $html->link(__('NewAdvertisement', true), array('action' => 'add')); ?></p>
        <div class="search">            
            <?php echo $form->create('Advertisement',array('action'=>'index')) ?>
                <?php __("Position") ?>                 
                <select name="data[Type]">                
                    <option value="-1"> --<?php __("Select") ?> -- </option>
                    <?php foreach($type as $key => $text): ?>
                    <option value="<?php echo $key ?>" <?php if(isset($this->params['pass'][0]) && $this->params['pass'][0] == $key) echo 'selected = "selected"' ?>><?php echo $text ?></option>
                    <?php endforeach; ?>                
                </select>
                <input type="submit" value="<?php __("Submit") ?>" class="btn2" />
            </form>
        </div>
        
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
                <td><?php echo $paginator->sort(__('Name',true),'name',array('url'=>$this->params['pass'])); ?></td>
                <!-- <td><?php //echo $paginator->sort(__('Image',true),'image',array('url'=>$this->params['pass']));?></td> -->
                <td><?php echo $paginator->sort(__('Url',true),'url',array('url'=>$this->params['pass']));?></td>                
                <td><?php echo $paginator->sort(__('ExpiredDate',true),'expired_date',array('url'=>$this->params['pass']));?></td>
                <td><?php echo $paginator->sort(__('PosType',true),'pos_type',array('url'=>$this->params['pass']));?></td>
                <td><?php __('Actions');?></td>
            </tr>
            <?php $i = 0;foreach ($advertisements as $advertisement):?>
                <?php 
                    // Get status color
                    $curDate = date('Y-m-d');
                    if($curDate > $advertisement['Advertisement']['expired_date'])
                        $expired = true;
                    else 
                        $expired = false;
                    $color = ''; $bgcolor='';                       
                    if($advertisement['Advertisement']['status'] && !$expired) // Active
                    {
                        $bgcolor = '#DFF2BF'; // Green
                        $color = '#4F8A10';
                    }                        
                    elseif($advertisement['Advertisement']['status'] && $expired) // Expired but active
                    {
                        $bgcolor = '#FEEFB3'; // Orange
                        $color = '#9F6000';
                    }                        
                    elseif(!$advertisement['Advertisement']['status'] && !$expired) // Stop or not active
                    {
                        $bgcolor = '#FFBABA'; // Pink
                        $color = '#D8000C';
                    }                        
                    elseif(!$advertisement['Advertisement']['status'] && $expired) // Stop
                    {
                        $bgcolor = '#C9CCC4'; // Greay
                        $color = 'black';
                    }
                    else
                        echo "Never go here";
                    
                 ?>
                <tr style="background-color:<?php echo $bgcolor ?>;color:<?php echo $color ?>">
                    <td style="border:solid 1px white">
                        <?php echo $advertisement['Advertisement']['name']; ?>
                    </td>
                    <!-- <td style="border:solid 1px white">
                        <?php 
                            /*if(!empty($advertisement['Advertisement']['image']))
                            {
                                $ext = substr($advertisement['Advertisement']['image'], strrpos($advertisement['Advertisement']['image'], '.') + 1);
                                $ext = strtolower($ext);
                                
                                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png')
                                {
                                     echo $html->image($advertisement['Advertisement']['image'],array('class'=>'pic'));
                                }
                                else
                                {
                                    echo $html->image($html->getFileTypeIcon($ext),array('class'=>'pic','width'=>64,'height'=>64));
                                }
                            }*/
                        ?>
                                
                    </td> -->
                    <td style="border:solid 1px white">
                        <a href = "<?php echo $advertisement['Advertisement']['url']; ?>" target="_blank"><?php echo $advertisement['Advertisement']['url']; ?></a>
                    </td>
                    <td style="border:solid 1px white">
                        <?php echo $advertisement['Advertisement']['expired_date']; ?>
                    </td>
                    <td style="border:solid 1px white">
                        <?php echo $type[$advertisement['Advertisement']['pos_type']]; ?>
                    </td>
                    <td class="actions" style="border:solid 1px white">
                        <?php 
                            if(!$advertisement['Advertisement']['status'])
                                echo $html->link($html->image('modules/adv/go.gif',array('width'=>14,'height'=>14,'title'=>__('AdvChangeActive',true),'tooltip'=>__('AdvChangeActive',true))), array('action' => 'change_status', $advertisement['Advertisement']['id'],1),array('escape'=>false)); 
                            else
                                echo $html->image('modules/adv/go_dis.gif',array('width'=>14,'height'=>14));
                        ?>&nbsp;
                        <?php
                            if($advertisement['Advertisement']['status'])
                                echo $html->link($html->image('modules/adv/stop.gif',array('width'=>14,'height'=>14,'title'=>__('AdvChangeStop',true),'tooltip'=>__('AdvChangeStop',true))), array('action' => 'change_status', $advertisement['Advertisement']['id'],0),array('escape'=>false));
                            else
                                echo $html->image('modules/adv/stop_dis.gif',array('width'=>14,'height'=>14));
                        ?>&nbsp;
                        
                        <?php echo $html->link($html->image('system/view.png',array('width'=>14,'height'=>14,'title'=>__('View',true),'tooltip'=>__('View',true))), array('action' => 'view', $advertisement['Advertisement']['id']),array('escape'=>false)); ?>&nbsp;
                        <?php echo $html->link($html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('action' => 'edit', $advertisement['Advertisement']['id']),array('escape'=>false)); ?>&nbsp;
                        <?php echo $html->link($html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete', $advertisement['Advertisement']['id']), array('escape'=>false), sprintf(__('Are you sure you want to delete # %s?', true), $advertisement['Advertisement']['id'])); ?>&nbsp;
                    </td>
                </tr>
            <?php endforeach; ?>
                <tr class="title_table_bottom">
                    <td colspan="9">
                        <div class="paging">
                            <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled','style'=>'display:inline'));?>
                              <?php echo $paginator->numbers();?>
                            <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled','style'=>'display:inline'));?>
                        </div>
                    </td>
                </tr>
            </table>
    </div>
</div>
</div>