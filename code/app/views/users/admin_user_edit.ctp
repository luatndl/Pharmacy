     
<div class="container clearfix">
<div class="title">
    <p><?php __("NormalUsers") ?></p>
        <h6></h6>
        <h5>&nbsp;&nbsp;<?php __("Edit") ?></h5>
</div>    
<?php $session->flash(); ?>    

<!--midle start-->        
<div class="midle">                    
    <div class="under_title">                
        <p>
            <?php echo $html->link(__('Users', true), array('action' => 'user_index'));?>
        </p>
        <div class="cl"></div>
    </div>
    <div class="center">
        <?php echo $form->create('User',array('action'=>'user_edit')) ?>
        <?php echo $form->input('id'); ?>
        <table cellpadding="3" cellspacing="5" class="list">
            <tr class="title_table">
                <td colspan="2"></td>
            </tr>
            <tr>
                <td align="right"><?php __("Username") ?></td>
                <td align="left"><?php echo $form->input('username',array('disabled'=>'disabled','label'=>'','div'=>'')); ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("Password") ?></td>
                <td align="left"><?php echo $html->link(__('ResetPassword',true),array('controller'=>'users','action'=>'userresetpassword',$this->data['User']['id']));  ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("Name") ?></td>
                <td align="left"><?php echo $form->input('info_name',array('label'=>'','div'=>'')); ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("Email") ?></td>
                <td align="left"><?php echo $form->input('email',array('label'=>'','div'=>'')); ?></td>
            </tr>    
            <tr>
                <td align="right"><?php __("Email2") ?></td>
                <td align="left"><?php echo $form->input('info_email',array('label'=>'','div'=>'')); ?></td>
            </tr>
            <tr>
                <td align="right" style="vertical-align:top"><?php __("Address") ?></td>
                <td align="left"><textarea name="data[User][info_address]" cols="40"><?php echo $this->data['User']['info_address'] ?></textarea></td>
            </tr>    
            <tr>
                <td align="right"><?php __("DateOfBirth") ?></td>
                <td align="left"><?php echo $form->input('info_dob',array('label'=>'','div'=>'')); ?></td>
            </tr>
            <tr>
                <td align="right"><?php __("Gender") ?></td>
                <td align="left">
                    <select name="data[User][info_gender]">                
                    <?php foreach($gender as $key => $text): ?>
                    <option value="<?php echo $key ?>" <?php if($this->data['User']['info_gender'] == $key) echo 'selected="selected"' ?>><?php echo $text ?></option>
                    <?php endforeach; ?>                
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><?php __("Active") ?></td>
                <td align="left"><?php echo $form->input('active',array('label'=>'','div'=>'')); ?></td>
            </tr>
            <tr>
                <td></td>
                <td align="left">
                    <input type="submit" value="<?php __("Submit") ?>" class="btn" />
                </td>
            </tr>
            <tr class="title_table_bottom">
                <td colspan="2"></td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>