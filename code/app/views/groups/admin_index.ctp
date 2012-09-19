<div class="container clearfix">
    <div class="title">
        <p><?php __('Users & Groups');?></p>
        <h6></h6><h5>&nbsp;&nbsp;<?php __("Groups") ?></h5>
    </div>
    <?php $session->flash(); ?>    
    <!--left start--><!--left end-->
    
    <!--midle start-->        
    <div class="midle">                    
        <div class="under_title">                
            <p>
                <?php echo $html->link(__('Users',true),array('controller'=>'users','action'=>'index'));  ?>                
            </p>
            <div class="search">
                <?php echo $form->create('Group',array('action'=>'index')) ?>
                <?php __("New Group") ?>
                <?php echo $form->input('name',array('label'=>'','div'=>'')) ?>
                <input type="submit" value="<?php __("Add") ?>" class="btn2" />
                </form>
            </div>
            <div class="cl"></div>
        </div>
        <div class="center">
            <table>
                <tr class="title_table">
                    <td><?php echo $paginator->sort('name');?></td>
                    <td><?php echo $paginator->sort('description');?></td>
                    <td class="actions"><?php __('Actions');?></td>
                </tr>
                <?php
                $i = 0;
                foreach ($groups as $group):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                ?>
                    <tr<?php echo $class;?>>
                        <td>
                            <?php echo $group['Group']['name']; ?>
                        </td>
                        <td>
                            <?php echo $group['Group']['description']; ?>
                        </td>
                        <td class="actions">
                            <?php if($group['Group']['code'] == GROUP_SUPERADMIN): ?>
                                <?php __("SystemGroup") ?>
                            <?php else: ?>
                                <?php echo $html->link($html->image('system/manage.png',array('width'=>14,'height'=>14,'title'=>__('Manage',true),'tooltip'=>__('Manage',true))), array('action' => 'edit', $group['Group']['id']),array('escape'=>false)); ?>
                                <?php echo $html->link($html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete', $group['Group']['id']), array('escape'=>false), sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?>
                            <?php endif; ?>
                        </td>                        
                    </tr>
                <?php endforeach; ?>
                    <tr class="title_table_bottom">
                        <td colspan="3">
                            <div class="paging">
                                <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled','style'=>'display:inline'));?>
                             |     <?php echo $paginator->numbers();?>
                                <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled','style'=>'display:inline'));?>
                            </div>
                        </td>
                    </tr>
                </table>
        </div>
    </div>        
</div>
