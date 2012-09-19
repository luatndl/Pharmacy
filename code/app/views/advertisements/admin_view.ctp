     
<div class="container clearfix">
<div class="title">
    <p><?php __("Advertisements") ?></p>
        <h6></h6>
        <h5>&nbsp;<?php __("View") ?></h5>
</div>    
<?php $session->flash(); ?>    

<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p><?php echo $html->link(__('ListAdvertisements', true), array('action' => 'index'));?></p>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
                <td colspan="2"></td>                
            </tr>
            <tr>
                <td align="right" width="20%"><?php __("Name") ?></td>
                <td align="left"><?php echo $advertisement['Advertisement']['name']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("Description") ?></td>
                <td align="left"><?php echo $advertisement['Advertisement']['description']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("Preview") ?></td>
                <td align="left">
                    <?php 
                        $ext = substr($advertisement['Advertisement']['image'], strrpos($advertisement['Advertisement']['image'], '.') + 1);
                        $ext = strtolower($ext);
                        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png'):                        
                     ?>
                        <?php if(!empty($advertisement['Advertisement']['image'])) echo $html->image($advertisement['Advertisement']['image'],array('class'=>'pic')) ?>
                     <?php elseif($ext == 'flv' || $ext == 'swf'): ?>
                        <object>
                            <param name="movie" value="<?php echo Helper::url('/',true) .'/'.$advertisement['Advertisement']['image'] ?>">
                            <embed src="<?php echo Helper::url('/',true).'/'.$advertisement['Advertisement']['image'] ?>"></embed>
                        </object>
                     <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td align="right"><?php __("Url") ?></td>
                <td align="left"><?php echo $advertisement['Advertisement']['url']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("Active") ?></td>
                <td align="left"><?php if($advertisement['Advertisement']['status']) echo __('Yes',true); else echo __('False',true) ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("ExpiredDate") ?></td>
                <td align="left"><?php echo $advertisement['Advertisement']['expired_date']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("Count") ?></td>
                <td align="left"><?php echo $advertisement['Advertisement']['count']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("PosType") ?></td>
                <td align="left"><?php echo $type[$advertisement['Advertisement']['pos_type']]; ?></td>
            </tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>