<div class="container clearfix">
<div class="title">
    <p><?php __('Category');?></p>
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
            <?php echo $html->link(__('ListCategories', true), array('action' => 'index')); ?>        </p>
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
				<td align = 'left'><?php echo $category['Category']['id']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('NameVie') ?></td>
				<td align = 'left'><?php echo $category['Category']['name_vie']; ?></td>
			</tr>
			<tr>
				<td align = 'right'><?php __('NameEng') ?></td>
				<td align = 'left'><?php echo $category['Category']['name_eng']; ?></td>
			</tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>