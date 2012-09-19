<div class="container clearfix">
<div class="title">
    <p><?php __('MapLink');?></p>
        <h6></h6>
        <h5>&nbsp;<?php __('Add');?></h5>
</div>    
 <?php $session->flash(); ?>
<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo $html->link(__('ListMapLinks', true), array('action' => 'index'));?>        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php echo $form->create('MapLink');?>
        <table>
            <tr class="title_table">
                <td colspan="2"></td>
            </tr>

            			<tr>
				<td align='right'><?php __('Name') ?></td>
				<td align='left'><?php echo $form->input('name',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('MapId') ?></td>
				<td align='left'><?php echo $form->input('map_id',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('RedirectId') ?></td>
				<td align='left'><?php echo $form->input('redirect_id',array('label'=>'','div'=>'')); ?></td>
			</tr>
            <tr>
                <td></td>
                <td align="left">
                    <input type="submit" value="Submit" class="btn" />                    
                    <input type = "button" class="btn" onclick="location.href='<?php echo $html->url('/admin/maplinks'); ?>';" value="<?php __("Back") ?>" />
                </td>
            </tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>