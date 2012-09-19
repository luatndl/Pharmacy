<div id="middle">
    <div class="background">                        
        
        <div id="left">
                <div id="left_container" class="clearfix">                            
                    <div class="module-blue"><div><div><div>
                        <center><h1 style="color:white"><?php __("Packets") ?><br><i id="LoadingDiv" style="display: none;"><?php echo $html->image('ajax-loader.gif'); ?></i></h1></center>
                    </div></div></div></div>
                    
                    <div class="module_menu"><div><div><div>
                        <h3><?php __("Actions") ?></h3><ul class="menu">
                        <ul class="menu">                            
                            <li class="level1 last"><a class="level1 last" href="<?php echo Helper::url("../sys_functions/index") ?>"><span><?php __("Back") ?></span></a></li>
                        </ul>
                    </div></div></div></div>
                    
                </div>
        </div>
        <!-- left end -->

        <div id="main">            
            <div id="main_container" class="clearfix">            
                <?php __("Packet") ?>: <b><?php echo $sysFunction['SysFunction']['name']; ?></b><br><br>
                
                <div class="module-white"><div><div><div>
                
                    <center>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <?php echo $form->create('SysController',array('action'=>'add')) ?>
                                <input type="hidden" name = "data[SysController][sys_function_id]" value="<?php echo $this->params['pass'][0] ?>" />
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td><?php __("Controller") ?>&nbsp;</td>
                                        <td><input name = "data[SysController][name]" /></td>
                                        <td><input type="submit" value="<?php __("Add") ?>" /></td>
                                    </tr>
                                </table>
                                </form>
                            </td>
                            <td>&nbsp;&nbsp;</td>
                            <td>
                                <?php if(isset($this->params['pass'][1])): ?>
                                    <?php echo $form->create('SysAction',array('action'=>'add')) ?>
                                    <input type="hidden" name = "data[SysAction][sys_function_id]" value="<?php echo $this->params['pass'][0] ?>" />
                                    <input type="hidden" name = "data[SysAction][sys_controller_id]" value="<?php echo $this->params['pass'][1] ?>" />
                                    <table cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td><?php __("Action") ?>&nbsp;</td>
                                            <td><input name = "data[SysAction][name]" /></td>
                                            <td><input type="submit" value="<?php __("Add") ?>" /></td>
                                        </tr>
                                    </table>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    </center>                    
                                    
                </div></div></div></div>
                
                <center><h3><?php if(isset($controllerName)) echo " ( " . $controllerName .  " ) " ?></h3><br></center>

                <div class="module-white"><div><div><div>                
                    
                    <center>
                    <table cellpadding="3" cellspacing="5" class="list">
                        <tr>
                            <th><?php __("Controllers") ?></th>
                            <th><?php __("Actions") ?></th>                            
                        </tr>
                        <tr>
                            <td style="text-align:left" valign="top">
                                <?php if(isset($sysFunction['SysController']) && count($sysFunction['SysController']) > 0): ?>
                                <?php foreach($sysFunction['SysController'] as $controller): ?>
                                    - <?php echo $html->link($controller['name'],array('controller'=>'sys_functions','action'=>'manage',$sysFunction['SysFunction']['id'],$controller['id'])); ?>
                                     ( <?php echo $html->link(__('Delete', true), array('controller'=>'sys_controllers','action'=>'delete', $controller['id'],$this->params['pass'][0]), null, sprintf(__('Are you sure you want to delete # %s?', true), $controller['id'])); ?> )
                                    <br>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <?php __("Empty") ?>
                                <?php endif; ?>
                            </td>
                            <td style="text-align:left" valign="top">                            
                                <?php if(isset($sysAction) && count($sysAction) > 0): ?>            
                                <?php foreach($sysAction as $action): ?>
                                    - <?php echo $action['SysAction']['name'] ?> ( <?php echo $html->link(__('Delete', true), array('controller'=>'sys_actions','action'=>'delete', $action['SysAction']['id'],$this->params['pass'][0],$this->params['pass'][1]), null, sprintf(__('Are you sure you want to delete # %s?', true), $action['SysAction']['id'])); ?> )<br>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <?php __("Empty") ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    </center>
                    
                </div></div></div></div><br>
                
                <div class="module-white"><div><div><div>
                    <center>
                    
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <?php echo $form->create('SysFunction',array('action'=>'import',"enctype" => "multipart/form-data")) ?>
                                        <input type="hidden" name = "data[FunctionID]" value="<?php echo $this->params['pass'][0] ?>" />
                                        <?php __("File:") ?> 
                                        <?php echo $form->input('upload_file',array("type" => "file",'label'=>'','div'=>'')); ?>
                                        <input type="submit" value="<?php __("Import") ?>" />
                                    </form>
                                </td>
                                <td>
                                    <?php echo $form->create('SysFunction',array('action'=>'export_file')) ?>
                                        &nbsp;<input type="hidden" name = "data[FunctionID]" value="<?php echo $this->params['pass'][0] ?>" />
                                        <input type="submit" value="<?php __("Export") ?>" />
                                    </form>
                                </td>
                            </tr>
                        </table>
                                                
                    </center>
                </div></div></div></div><br>
                
            </div>
        </div>            
    </div>    
</div>