<div class="container clearfix">
<div class="title">
    <p><?php __('Category');?></p>
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
            <?php echo $html->link(__('ListCategories', true), array('action' => 'index'));?>        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php echo $form->create('Category');?>
        <table>
            <tr class="title_table">
                <td colspan="2"></td>
            </tr>

            			<tr>
				<td align='right'><?php __('NameVie') ?></td>
				<td align='left'><?php echo $form->input('name_vie',array('label'=>'','div'=>'')); ?></td>
			</tr>
			<tr>
				<td align='right'><?php __('NameEng') ?></td>
				<td align='left'><?php echo $form->input('name_eng',array('label'=>'','div'=>'')); ?></td>
			</tr>
            <tr>
                <td></td>
                <td align="left">
                    <input type="submit" value="Submit" class="btn" />                    
                    <input type = "button" class="btn" onclick="location.href='<?php echo $html->url('/admin/categorys'); ?>';" value="<?php __("Back") ?>" />
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