     
<div class="container clearfix">
<div class="title">
    <p><?php __("Users & Groups") ?></p>
        <h6></h6>
        <h5>&nbsp;<?php __("User") ?> > <?php __("View") ?></h5>
</div>    
<?php $session->flash(); ?>    

<!--left start--><!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo $html->link(__('Users',true),array('controller'=>'users','action'=>'index'));  ?>
        </p>
        <div class="cl"></div>
    </div>
    <div class="center">
        <table>
            <tr class="title_table">
                <td colspan="2" align="left"><?php __("Information") ?></td>                
            </tr>
            <tr>
                <td  width="33%" align="right"><?php __('ID'); ?></td>
                <td align="left"><?php echo $user['User']['id']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __('Username'); ?></td>
                <td align="left"><?php echo $user['User']['username']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __('Name'); ?></td>
                <td align="left"><?php echo $user['User']['info_name']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __('Email'); ?></td>
                <td align="left"><?php echo $user['User']['email']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __('LastLogin'); ?></td>
                <td align="left"><?php echo $user['User']['last_login']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __('LoginCount'); ?></td>
                <td align="left"><?php echo $user['User']['login_count']; ?></td>
            </tr>
            <tr>
                <td align="right"><?php __('Active'); ?></td>
                <td align="left"><?php if($user['User']['active']) echo __('True',true); else echo __('False',true); ?></td>
            </tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                </td>
            </tr>
        </table>
    </div>
</div>
</div>      