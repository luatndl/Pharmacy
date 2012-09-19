<div id="middle">
    <div class="background">                        
        
        <div id="left">
                <div id="left_container" class="clearfix">                            
                    <div class="module-blue"><div><div><div>
                        <center><h1 style="color:white"><?php __("System Group") ?><br><i id="LoadingDiv" style="display: none;"><?php echo $html->image('ajax-loader.gif'); ?></i></h1></center>
                    </div></div></div></div>
                    
                    <div class="module_menu"><div><div><div>
                    <h3><?php __("Actions") ?></h3><ul class="menu">
                    <ul class="menu">                        
                            <li class="level1 first"><a class="level1 first" href="<?php echo Helper::url("../groups") ?>"><span><?php __("Back") ?></span></a></li>
                    </ul>
                    </div></div></div></div>
                </div>
        </div>
        <!-- left end -->

        <div id="main">            
            <div id="main_container" class="clearfix">
                <div class="module-white"><div><div><div>                                    
                    <center>                    
                        <?php echo $form->create('Group');?>
                        <?php echo $form->input('id'); ?>
                        <table cellpadding="3" cellspacing="5">
                            <tr>
                                <td><?php __("Name") ?></td>
                                <td><?php echo $form->input('name',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td><?php __("Description") ?></td>
                                <td><?php echo $form->input('description',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td><?php __("Code") ?></td>
                                <td><?php echo $form->input('code',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="<?php __("Update") ?>" class="button" /></td>
                            </tr>                            
                        </table>
                        </form>
                    </center>
                    
                </div></div></div></div><br>
                                
            </div>
        </div>            
    </div>    
</div>