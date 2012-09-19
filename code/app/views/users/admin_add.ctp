<div class="container clearfix">
    <div class="title">
        <p><?php __('Users & Groups');?></p>
            <h6></h6>
            <h5>&nbsp;&nbsp;<?php __("User") ?> > <?php __("Add") ?></h5>
    </div>    
    <?php $session->flash(); ?>    
    
    <!--midle start-->        
    <div class="midle">                    
        <div class="under_title">                
            <p>
                <?php echo $html->link(__('Users', true), array('action' => 'index'));?>
            </p>
            <div class="cl"></div>
        </div>
        <div class="center">    
            <?php echo $form->create('User');?>
            <table>
                <tr class="title_table">
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td align="right"><?php __("Username") ?></td>
                    <td align="left"><?php echo $form->input('username',array('label'=>'','div'=>'')); ?></td>
                </tr>
                <tr>
                    <td align="right"><?php __("Password") ?></td>
                    <td align="left"><?php echo $form->input('password',array('label'=>'','div'=>'')); ?></td>
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
                    <td align="right"><?php __("Active") ?></td>
                    <td align="left"><?php echo $form->input('active',array('label'=>'','div'=>'')); ?></td>
                </tr>
                <tr>
                    <td align="right"><?php __("Group") ?></td>
                    <td align="left"><?php echo $form->input('group_id',array('label'=>'','div'=>'')); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="left">
                        <input type="submit" value="<?php __("Submit") ?>" class="btn" />                        
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