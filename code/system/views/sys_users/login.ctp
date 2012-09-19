<div id="middle">
    <div class="background">                        
        
        <div id="left">
                <div id="left_container" class="clearfix">                            
                    <div class="module-blue"><div><div><div>
                        <center><h1 style="color:white"><?php __("Login") ?><br><i id="LoadingDiv" style="display: none;"><?php echo $html->image('ajax-loader.gif'); ?></i></h1></center>
                    </div></div></div></div>
                </div>
        </div>
        <!-- left end -->

        <div id="main">            
            <div id="main_container" class="clearfix">
                <div class="module-white"><div><div><div>                
                    
                    <?php if(isset($msgInvalidLogin)): ?>
                        <font color="red"><?php echo $msgInvalidLogin ?></font>
                        <?php endif; ?>
                        <br>
                        <center>                        
                        <?php echo $form->create('SysUser', array('action' => 'login'));?>                                                             
                        <table cellpadding="3" cellspacing="5">
                            <tr>
                                <td><?php __("Username") ?></td>
                                <td><?php echo $form->input('username',array('label'=>'','div'=>''));?></td>
                            </tr>
                            <tr>
                                <td><?php __("Password") ?></td>
                                <td><?php echo $form->input('password',array('label'=>'','div'=>''));?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo $form->submit(__('Login',true));?></td>
                            </tr>
                        </table>                        
                        </form>
                        </center>
                    
                </div></div></div></div><br>
                
            </div>
        </div>            
    </div>    
</div>          