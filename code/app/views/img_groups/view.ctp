<div class="container clearfix">
<div class="title">
    <p><?php __('ImgGroup');?></p>
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
            <?php echo $html->link(__('ListImgGroups', true), array('action' => 'index')); ?>        </p>
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
				<td align = 'left'><?php echo $imgGroup['ImgGroup']['id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('NameVie') ?></td>
				<td align = 'left'><?php echo $imgGroup['ImgGroup']['name_vie']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('NameEng') ?></td>
				<td align = 'left'><?php echo $imgGroup['ImgGroup']['name_eng']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('DescriptionVie') ?></td>
				<td align = 'left'><?php echo $imgGroup['ImgGroup']['description_vie']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('DescriptionEng') ?></td>
				<td align = 'left'><?php echo $imgGroup['ImgGroup']['description_eng']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Created') ?></td>
				<td align = 'left'><?php echo $imgGroup['ImgGroup']['created']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('Public') ?></td>
				<td align = 'left'><?php echo $imgGroup['ImgGroup']['public']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('CategoryId') ?></td>
				<td align = 'left'><?php echo $imgGroup['ImgGroup']['category_id']; ?></td>
			</tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>