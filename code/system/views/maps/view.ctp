<div class="container clearfix">
<div class="title">
    <p><?php __('Map');?></p>
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
            <?php echo $html->link(__('ListMaps', true), array('action' => 'index')); ?>        </p>
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
				<td align = 'left'><?php echo $map['Map']['id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Name') ?></td>
				<td align = 'left'><?php echo $map['Map']['name']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Image') ?></td>
				<td align = 'left'><?php echo $map['Map']['image']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Thumbnail') ?></td>
				<td align = 'left'><?php echo $map['Map']['thumbnail']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Content') ?></td>
				<td align = 'left'><?php echo $map['Map']['content']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Code') ?></td>
				<td align = 'left'><?php echo $map['Map']['code']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Active') ?></td>
				<td align = 'left'><?php echo $map['Map']['active']; ?></td>
			</tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>