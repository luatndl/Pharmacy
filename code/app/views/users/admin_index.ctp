         
 <div class="container clearfix">
    <div class="title">
        <p><?php __('Users & Groups');?></p>
            <h6></h6>
            <h5>&nbsp;&nbsp;<?php __("User") ?></h5>
    </div>    
    <?php $session->flash(); ?>    
    
    <!--left start--><!--left end-->
    
    <!--midle start-->        
    <div class="midle">                    
        <div class="under_title">                
            <p>
                <?php echo $html->link(__('New User', true), array('action' => 'add')); ?> |
                <?php echo $html->link(__('Groups',true),array('controller'=>'groups','action'=>'index'));  ?>
            </p>
            <div class="search">                
                <?php echo $form->create('User',array('action'=>'index')) ?>                
                    <?php __("Group") ?>
                    <select name="data[User][group_id]">
                    <option value="-1">-- <?php __("Select") ?> --</option>
                    <?php foreach($groups as $key => $value): ?>
                        <option value="<?php echo $key ?>" <?php if($groupID == $key) echo 'selected="selected"' ?>><?php echo $value ?></option>
                    <?php endforeach; ?>            
                    </select>
                    <input type="submit" value="<?php __("Submit") ?>" class="btn2" />
                </form>
            </div>
            <div class="cl"></div>
        </div>
        <div class="center">
            <?php if(isset($users)): ?>
            <table>
                <tr class="title_table">
                    <td><?php echo $paginator->sort('username');?></td>    
                    <td><?php echo $paginator->sort('info_name');?></td>
                    <td><?php echo $paginator->sort('email');?></td>
                    <td><?php echo $paginator->sort('active');?></td>
                    <td><?php echo $paginator->sort('group_id');?></td>
                    <td><?php __('Actions');?></td>
                </tr>
                <?php
                $i = 0;
                foreach ($users as $user):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                ?>
                    <tr<?php echo $class;?>>
                        <td>
                            <?php echo $user['User']['username']; ?>
                        </td>
                        <td>
                            <?php echo $user['User']['info_name']; ?>
                        </td>
                        <td>
                            <?php echo $user['User']['email']; ?>
                        </td>
                        <td>
                            <?php if($user['User']['active']) echo '<b>'.__('True',true).'</b>'; else echo __('False',true); ?>
                        </td>
                        <td>
                            <?php if(isset($groups[$user['User']['group_id']])) echo $groups[$user['User']['group_id']]; else echo '<font color = "#BA0000">'.__('UnknownGroup',true).'</font>'; ?>
                        </td>        
                        <td class="actions">
                            <?php if($user['User']['username'] != SYSTEM_USERNAME) echo $html->link($html->image('system/reset.png',array('width'=>14,'height'=>14,'title'=>__('ResetPassword',true),'tooltip'=>__('ResetPassword',true))), array('action' => 'resetpassword', $user['User']['id']),array('escape'=>false)); ?>
                            <?php echo $html->link($html->image('system/view.png',array('width'=>14,'height'=>14,'title'=>__('View',true),'tooltip'=>__('View',true))), array('action' => 'view', $user['User']['id']),array('escape'=>false)); ?>
                            <?php echo $html->link($html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('action' => 'edit', $user['User']['id']),array('escape'=>false)); ?>
                            <?php if($user['User']['username'] != SYSTEM_USERNAME) echo $html->link($html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete', $user['User']['id']), array('escape'=>false), sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id']));?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr class="title_table_bottom">
                        <td colspan="6">
                            <div class="paging">
                                <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled','style'=>'display:inline'));?>
                                  <?php echo $paginator->numbers();?>
                                <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled','style'=>'display:inline'));?>
                            </div>
                        </td>
                    </tr>
                </table>                
            <?php endif; ?>
        </div>
    </div>        
</div>