<div id="middle">
    <div class="background">                        
        
        <div id="left">
                <div id="left_container" class="clearfix">                            
                    <div class="module-blue"><div><div><div>
                        <center><h1 style="color:white"><?php __("Packets") ?><br><i id="LoadingDiv" style="display: none;"><?php echo $html->image('ajax-loader.gif'); ?></i></h1></center>
                    </div></div></div></div>
                </div>
        </div>
        <!-- left end -->

        <div id="main">            
            <div id="main_container" class="clearfix">
                <div class="module-white"><div><div><div>                
                    
                    <center>
                    <?php $isSystem = $this->data['SysFunction']['is_system'] ?>
                    <?php echo $form->create('SysFunction');?>
                    <input type="hidden" name = "data[SysFunction][is_system]" value="<?php echo $isSystem ?>" />
                    <?php echo $form->input('id');?>
                    <table cellpadding="3" cellspacing="5">
                        <tr>
                            <td><?php __("Name") ?></td>
                            <td><?php echo $form->input('name',array('label'=>'','div'=>'')); ?></td>
                        </tr>
                        <tr>
                            <td><?php __("Description") ?></td>
                            <td><?php echo $form->input('description',array('label'=>'','div'=>'')); ?></td>
                        </tr>
                        <?php if(!$isSystem): ?>
                        <tr>
                            <td><?php __("Icon") ?></td>
                            <td><?php echo $form->input('icon',array('label'=>'','div'=>'')); ?></td>
                        </tr>
                        <tr>
                            <td><?php __("Parent") ?></td>
                            <td>                                    
                                <select name = "data[SysFunction][parent_id]">
                                <option value="">-- <?php __("Select") ?> --</option>
                                <?php foreach($parent as $key=>$text): ?>
                                    <option value="<?php echo $key ?>" <?php if($key == $this->data['SysFunction']['parent_id']) echo "selected='selected'" ?>><?php echo $text ?></option>
                                <?php endforeach; ?>                                    
                                </select>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td><?php __("Controller") ?></td>
                            <td><?php echo $form->input('controller',array('label'=>'','div'=>'')); ?></td>
                        </tr>
                        <tr>
                            <td><?php __("Action") ?></td>
                            <td><?php echo $form->input('action',array('label'=>'','div'=>'')); ?></td>
                        </tr>
                        <?php if(!$isSystem): ?>
                        <tr>
                            <td><?php __("Display") ?></td>
                            <td><?php echo $form->input('display',array('label'=>'','div'=>'')); ?></td>
                        </tr>
                        <tr>
                            <td><?php __("Display Order") ?></td>
                            <td><?php echo $form->input('displayorder',array('label'=>'','div'=>'')); ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="<?php __("Update") ?>" class="button" />                                
                                <input type = "button" class="button" onclick="location.href='<?php echo $html->url('/sys_functions'); ?>';" value="<?php __("Back") ?>" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </center>
                    
                </div></div></div></div><br>
                
            </div>
        </div>            
    </div>    
</div>