<div class="container clearfix">
<div class="title">
    <p><?php __('Comments') ?></p>
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
            <?php echo $html->link(__('NewComment', true), array('action' => 'add')); ?>        </p>
        <div class="search">
        </div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
            	<td><?php echo $paginator->sort('id');?></td>
            	<td><?php echo $paginator->sort('content');?></td>
            	<td><?php echo $paginator->sort('image_id');?></td>
            	<td><?php echo $paginator->sort('img_group_id');?></td>
            	<td class="actions"><?php __('Actions');?></td>
            </tr>
            <?php
            $i = 0;
            foreach ($comments as $comment):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
            ?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $comment['Comment']['id']; ?>
				</td>
				<td>
					<?php echo $comment['Comment']['content']; ?>
				</td>
				<td>
					<?php echo $comment['Comment']['image_id']; ?>
				</td>
				<td>
					<?php echo $comment['Comment']['img_group_id']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link($html->image('system/view.png',array('width'=>14,'height'=>14,'title'=>__('View',true),'tooltip'=>__('View',true))), array('action' => 'view', $comment['Comment']['id']),array('escape'=>false)); ?>
					<?php echo $html->link($html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('action' => 'edit', $comment['Comment']['id']),array('escape'=>false)); ?>
					<?php echo $html->link($html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete', $comment['Comment']['id']), array('escape'=>false), sprintf(__('MsgConfirmDelete', true), $comment['Comment']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
                <tr class="title_table_bottom">
                    <td colspan="5">
                        	<?php echo $paginator->prev('<< '.__('previous', true), array('url'=>$this->params['pass']), null, array('class'=>'disabled','style'=>'display:inline'));?>
                         | 	<?php echo $paginator->numbers(array('url'=>$this->params['pass']));?>
                        	<?php echo $paginator->next(__('next', true).' >>', array('url'=>$this->params['pass']), null, array('class' => 'disabled','style'=>'display:inline'));?>
                    </td>
                </tr>                
            </table>
    </div>
</div>
</div>