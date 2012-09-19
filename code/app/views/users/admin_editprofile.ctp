     
<div class="container clearfix">
<div class="title">
    <p><?php __("User") ?></p>
        <h6></h6>
        <h5>&nbsp;<?php __("Profile") ?></h5>
</div>    
<?php $session->flash(); ?>    

<!--left start--><?php echo $this->element('left_menu') ?><!--left end-->

<!--midle start-->        
<div class="midle not_full">                    
    <div class="under_title">
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php echo $form->create('User',array('action'=>'editprofile',"enctype" => "multipart/form-data"));?>
            <?php echo $form->input('id') ?>
            <!--<input type="hidden" name = "data[User][username]" value="<?php echo $this->data['User']['username'] ?>" />-->
            <div class="setting">
            <table>
                <tr class="title_table">
                    <td colspan="2" align="left"><?php __("Profile") ?></td>
                </tr>
                <tr>        
                    <td align="right"><b><?php __("Username") ?></b></td>
                    <td align="left"><b><?php echo $this->data['User']['username'] ?></b></td>
                </tr>                
                <tr>        
                    <td align="right"><b><?php __("Password") ?></b></td>
                    <td align="left"><?php echo $html->link(__("ChangePassword",true),array('controller'=>'users','action'=>'changepassword')); ?></td>                    
                </tr>
                <tr>        
                    <td align="right"><b><?php __("Email") ?></b></td>
                    <td align="left"><?php echo $form->input('email',array('label'=>'')); ?></td>
                </tr>
                <tr>        
                    <td align="right"><b><?php __("Email2") ?></b></td>
                    <td align="left"><?php echo $form->input('info_email',array('label'=>'')); ?></td>
                </tr>
                <tr>        
                    <td align="right"><b><?php __("Name") ?></b></td>
                    <td align="left"><?php echo $form->input('info_name',array('label'=>'')); ?></td>
                </tr>
                <tr>        
                    <td align="right" style="vertical-align:top"><b><?php __("Address") ?></b></td>
                    <td align="left">
                        <textarea name="data[User][info_address]" cols="40"><?php echo $this->data['User']['info_address'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="left"><input type="submit" value="<?php __("Update") ?>" class="btn" /></td>
                </tr>
                </table>        
            </form>
    </div>
</div>
</div>

</div>