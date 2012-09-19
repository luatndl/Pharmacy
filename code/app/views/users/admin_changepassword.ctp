     
<div class="container clearfix">
<div class="title">
    <p><?php __("User") ?></p>
        <h6></h6>
        <h5>&nbsp;<?php __("ChangePassword") ?></h5>
</div>    
<?php $session->flash(); ?>    

<!--left start--><?php echo $this->element('left_menu') ?><!--left end-->

<!--midle start-->        
<div class="midle not_full">    
    <div class="center">
        <?php echo $form->create('User',array('action'=>'changepassword'));?>
        <table>    
            <tr class="title_table">
                <td colspan="3" align="left"><?php __("ChangePassword") ?></td>
            </tr>
            <tr>        
                <td align="right"><b><?php __("OldPassword") ?></b></td>
                <td align="left"><input type="password" name="data[User][oldpassword]" value="<?php echo $this->data['User']['oldpassword'] ?>" />
                    <font color = "red"><?php if(isset($msgError['oldpassword'])) echo $msgError['oldpassword'] ?></forn>
                </td>                
            </tr>
            <tr>        
                <td align="right"><b><?php __("NewPassword") ?></b></td>
                <td align="left"><input type="password" name="data[User][newpassword]" value="<?php echo $this->data['User']['newpassword'] ?>"/>
                    <font color = "red"><?php if(isset($msgError['newpassword'])) echo $msgError['newpassword'] ?></forn>
                </td>                
            </tr>
            <tr>        
                <td align="right"><b><?php __("ConfirmPassword") ?></b></td>
                <td align="left"><input type="password" name="data[User][confirmpassword]" value="<?php echo $this->data['User']['confirmpassword'] ?>"/>
                    <font color = "red"><?php if(isset($msgError['confirmpassword'])) echo $msgError['confirmpassword'] ?></forn>
                </td>                
            </tr>
            <tr>
                <td></td>
                <td align="left"><button onclick="submit()" class="btn"><?php __("Update") ?></button></td>                
            </tr>
            <tr class="title_table_bottom">
                <td colspan="2"></td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>