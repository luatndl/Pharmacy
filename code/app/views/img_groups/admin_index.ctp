<div class="container clearfix">
<div class="title">
    <p><?php __('ImgGroups') ?></p>
        <h6></h6>
        <h5>&nbsp;</h5>
</div>    
<?php $session->flash(); ?>
<!--left start-->
<!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo $html->link(__('NewImgGroup', true), array('action' => 'add')); ?>        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
            	<td><?php echo $paginator->sort('id');?></td>
            	<td><?php echo $paginator->sort('name_vie');?></td>
            	<td><?php echo $paginator->sort('name_eng');?></td>
            	<td><?php echo $paginator->sort('description_vie');?></td>
            	<td><?php echo $paginator->sort('description_eng');?></td>
            	<td><?php echo $paginator->sort('created');?></td>
            	<td><?php echo $paginator->sort('public');?></td>
            	<td><?php echo $paginator->sort('category_id');?></td>
            	<td class="actions"><?php __('Actions');?></td>
            </tr>
            <?php
            $i = 0;
            foreach ($imgGroups as $imgGroup):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
            ?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $imgGroup['ImgGroup']['id']; ?>
				</td>
				<td>
					<?php echo $imgGroup['ImgGroup']['name_vie']; ?>
				</td>
				<td>
					<?php echo $imgGroup['ImgGroup']['name_eng']; ?>
				</td>
				<td>
					<?php echo $imgGroup['ImgGroup']['description_vie']; ?>
				</td>
				<td>
					<?php echo $imgGroup['ImgGroup']['description_eng']; ?>
				</td>
				<td>
					<?php echo $imgGroup['ImgGroup']['created']; ?>
				</td>
				<td>
					<?php echo $imgGroup['ImgGroup']['public']; ?>
				</td>
				<td>
					<?php echo $imgGroup['ImgGroup']['category_id']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link($html->image('system/view.png',array('width'=>14,'height'=>14,'title'=>__('View',true),'tooltip'=>__('View',true))), array('action' => 'view', $imgGroup['ImgGroup']['id']),array('escape'=>false)); ?>
					<?php echo $html->link($html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('action' => 'edit', $imgGroup['ImgGroup']['id']),array('escape'=>false)); ?>
					<?php echo $html->link($html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete', $imgGroup['ImgGroup']['id']), array('escape'=>false), sprintf(__('MsgConfirmDelete', true), $imgGroup['ImgGroup']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
                <tr class="title_table_bottom">
                    <td colspan="9">
                        	<?php echo $paginator->prev('<< '.__('previous', true), array('url'=>$this->params['pass']), null, array('class'=>'disabled','style'=>'display:inline'));?>
                         | 	<?php echo $paginator->numbers(array('url'=>$this->params['pass']));?>
                        	<?php echo $paginator->next(__('next', true).' >>', array('url'=>$this->params['pass']), null, array('class' => 'disabled','style'=>'display:inline'));?>
                    </td>
                </tr>                
            </table>
    </div>
</div>
</div>