         
 <div class="container clearfix">
    <div class="title">
        <p><?php __('NormalUsers');?></p>
            <h6></h6>
            <h5>&nbsp;&nbsp;<?php __("ResetPassword") ?></h5>
    </div>    
    <?php $session->flash(); ?>    
    
    <!--left start--><!--left end-->
    
    <!--midle start-->        
    <div class="midle">                    
        <div class="under_title">                
            <p>
                <?php echo $html->link(__('Users', true), array('action' => 'user_index')); ?>
            </p>
            <div class="cl"></div>
        </div>
        <div class="center">
            <?php echo $form->create('User',array('action'=>'userresetpassword'));?>
            <?php echo $form->input('id') ?>    
            <table>
                <tr class="title_table">
                    <td colspan="2"></td>                    
                </tr>
                <tr>        
                    <td align="right"><?php __("Username") ?></td>
                    <td align="left"><input type="text" disabled="disabled" value="<?php echo $this->data['User']['username'] ?>"/></td>
                </tr>
                <tr>        
                    <td align="right"><?php __("NewPassword") ?></td>
                    <td align="left"><input type="password" name="data[User][newpassword]" value=""/></td>        
                </tr>
                <tr>        
                    <td align="right"><?php __("ConfirmPassword") ?></td>
                    <td align="left"><input type="password" name="data[User][confirmpassword]" value=""/></td>        
                </tr>
                <tr>
                    <td></td>
                    <td align="left">
                        <input type="submit" value="<?php __("Save") ?>" class="btn" />
                        <input type = "button" class="btn" onclick="location.href='<?php echo $html->url('/admin/users/user_edit/'.$this->params['pass'][0]); ?>';" value="<?php __("Cancel") ?>" />
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