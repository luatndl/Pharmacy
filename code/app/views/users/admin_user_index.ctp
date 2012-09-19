     
<div class="container clearfix">
<div class="title">
    <p><?php __("NormalUsers") ?></p>
        <h6></h6>
        <h5>&nbsp;&nbsp;</h5>
</div>    
<?php $session->flash(); ?>    

<!--left start--><!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">
        <div class="search">&nbsp;</div>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php if(isset($users)): ?>
        <table>
        <tr class="title_table">
            <td><?php echo $paginator->sort('username');?></td>
            <td><?php echo $paginator->sort(__('Name',true),'info_name');?></td>
            <td><?php echo $paginator->sort('email');?></th>
            <td><?php echo $paginator->sort(__('Address',true),'info_address');?></td>
            <td><?php echo $paginator->sort('info_dob');?></td>
            <td><?php echo $paginator->sort(__('Gender',true),'info_gender');?></td>
            <td><?php echo $paginator->sort('active');?></td>
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
                    <?php echo $user['User']['info_address']; ?>
                </td>
                <td>
                    <?php echo $user['User']['info_dob']; ?>
                </td>
                <td>
                    <?php echo $gender[$user['User']['info_gender']]; ?>
                </td>        
                <td>
                    <?php if($user['User']['active']) echo '<b>'.__('True',true).'</b>'; else echo __('False',true) ?>
                </td>
                <td class="actions">   
                    <?php echo $html->link($html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('action' => 'user_edit', $user['User']['id']),array('escape'=>false)); ?>
                    <?php echo $html->link($html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'user_delete', $user['User']['id']), array('escape'=>false), sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td class="title_table_bottom" colspan="8">
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