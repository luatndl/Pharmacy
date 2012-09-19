<?php 
    if(isset($this->params['pass'][0]))
        $isSystem = true;
    else
        $isSystem = false
 ?>

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
                        <?php if($isSystem): ?>
                            <li class="level1 first"><a class="level1 first" href="<?php echo Helper::url("../sys_functions/add/".$this->params['pass'][0]) ?>"><span><?php __("New Packet") ?></span></a></li>
                        <?php else: ?>
                            <li class="level1 first"><a class="level1 first" href="<?php echo Helper::url("../sys_functions/add") ?>"><span><?php __("New Packet") ?></span></a></li>
                        <?php endif; ?>
                    </ul>
                    </div></div></div></div>
                </div>
        </div>
        <!-- left end -->

        <div id="main">            
            <div id="main_container" class="clearfix">
                <div class="module-white"><div><div><div>                                    
                    <center>                    
                        <table cellpadding="3" cellspacing="5" class="list">
                            <tr>
                                <th><?php __("ID") ?></th>
                                <th><?php __("Name") ?></th>
                                <?php if(!$isSystem): ?><th><?php __("Parent") ?></th><?php endif; ?>
                                <th><?php __("Controller") ?></th>
                                <th><?php __("Action") ?></th>
                                <?php if(!$isSystem): ?><th><?php __("Display") ?></th><?php endif ?>
                                <th class="actions"><?php __('Actions');?></th>
                            </tr>
                            <?php foreach ($sysFunctions as $sysMenu):?>
                                <tr<?php if(!empty($sysMenu['SysFunction']['parent_id'])) echo 'class = "item"' ?> class="item">
                                    <td>
                                        <?php echo $sysMenu['SysFunction']['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $sysMenu['SysFunction']['name']; ?>
                                    </td>
                                    <?php if(!$isSystem): ?>
                                    <td>                                
                                        <?php if(!empty($sysMenu['SysFunction']['parent_id'])) echo $parentName[$sysMenu['SysFunction']['parent_id']]; ?>
                                    </td>
                                    <?php endif; ?>
                                    <td>
                                        <?php echo $sysMenu['SysFunction']['controller']; ?>
                                    </td>
                                    <td>
                                        <?php echo $sysMenu['SysFunction']['action']; ?>
                                    </td>
                                    <?php if(!$isSystem): ?>
                                    <td>
                                        <?php echo $sysMenu['SysFunction']['display']; ?>
                                    </td>
                                    <?php endif; ?>
                                    <td class="actions">                                
                                        <?php echo $html->link(__('Manage', true), array('action'=>'manage', $sysMenu['SysFunction']['id'])); ?>
                                        <?php echo $html->link(__('Edit', true), array('action'=>'edit', $sysMenu['SysFunction']['id'])); ?>
                                        <?php echo $html->link(__('Delete', true), array('action'=>'delete', $sysMenu['SysFunction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sysMenu['SysFunction']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </table>
                    </center>
                    
                </div></div></div></div><br>
                                
            </div>
        </div>            
    </div>    
</div>