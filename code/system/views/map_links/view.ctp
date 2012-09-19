<div class="container clearfix">
<div class="title">
    <p><?php __('MapLink');?></p>
        <h6></h6>
        <h5>&nbsp;<?php __('View') ?></h5>
</div>    
<?php $session->flash(); ?>
<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo $html->link(__('ListMapLinks', true), array('action' => 'index')); ?>        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
                <td colspan="2"></td>
            </tr>
            			<tr>
				<td align = 'right'><?php __('Id') ?></td>
				<td align = 'left'><?php echo $mapLink['MapLink']['id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Name') ?></td>
				<td align = 'left'><?php echo $mapLink['MapLink']['name']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('MapId') ?></td>
				<td align = 'left'><?php echo $mapLink['MapLink']['map_id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('RedirectId') ?></td>
				<td align = 'left'><?php echo $mapLink['MapLink']['redirect_id']; ?></td>
			</tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>