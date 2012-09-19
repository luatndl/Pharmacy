<div class="container clearfix">
<div class="title">
    <p><?php __('Comment');?></p>
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
            <?php echo $html->link(__('ListComments', true), array('action' => 'index')); ?>        </p>
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
				<td align = 'left'><?php echo $comment['Comment']['id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Content') ?></td>
				<td align = 'left'><?php echo $comment['Comment']['content']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('ImageId') ?></td>
				<td align = 'left'><?php echo $comment['Comment']['image_id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('ImgGroupId') ?></td>
				<td align = 'left'><?php echo $comment['Comment']['img_group_id']; ?></td>
			</tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>