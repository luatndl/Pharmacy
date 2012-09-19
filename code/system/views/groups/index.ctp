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
                            <li class="level1 first"><a class="level1 first" href="<?php echo Helper::url("../groups/add") ?>"><span><?php __("New Group") ?></span></a></li>
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
                                <th><?php __("Description") ?></th>
                                <th><?php __("Code") ?></th>
                                <th class="actions"><?php __('Actions');?></th>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($groups as $group):
                                $class = null;
                                if ($i++ % 2 == 0) {
                                    $class = ' class="item"';
                                }
                            ?>
                                <tr<?php echo $class;?>>
                                    <td>
                                        <?php echo $group['Group']['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $group['Group']['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $group['Group']['description']; ?>
                                    </td>
                                    <td>
                                        <?php echo $group['Group']['code']; ?>
                                    </td>
                                    <td class="actions">
                                        <?php echo $html->link(__('Edit', true), array('action' => 'edit', $group['Group']['id'])); ?>
                                        <?php echo $html->link(__('Delete', true), array('action' => 'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </table>
                    </center>
                    
                </div></div></div></div><br>
                
                <center><h3><?php __("Group") ?> - <?php __("Function") ?></h3>
                
                <?php echo $form->create('Group',array('action'=>'index')) ?>
                    <?php __("Group") ?>: 
                        <select name="data[SysFunctionsGroup][group_id]">
                        <?php foreach($groups as $item): ?>
                        <option value="<?php echo $item['Group']['id'] ?>"><?php echo $item['Group']['name'] ?></option>
                        <?php endforeach; ?>                
                        </select> 
                     - <?php __("Function") ?>: 
                        <select name="data[SysFunctionsGroup][sys_function_id]">
                        <?php foreach($functions as $item): ?>
                        <option value="<?php echo $item['SysFunction']['id'] ?>"><?php echo $item['SysFunction']['name'] ?></option>
                        <?php endforeach; ?>                
                        </select> 
                    <input type="submit" value="<?php __("Add") ?>" class="btn" />
                </form><br>
                
                <div class="module-white"><div><div><div>
                    <table cellpadding="3" cellspacing="5" class="list">
                            <tr>
                                <th><?php __("Group") ?></th>
                                <th><?php __("Function") ?></th>
                                <th><?php __("Actions") ?></th>
                            </tr>
                            <?php if(isset($groupFunction) && count($groupFunction) > 0): ?>
                            <?php foreach($groupFunction as $item): ?>
                                <tr>
                                    <td><?php echo $item['Group']['name'] ?></td>
                                    <td><?php echo $item['SysFunction']['name'] ?></td>
                                    <td><?php echo $html->link(__('Delete', true), array('action' => 'del_group_function', $item['SysFunctionsGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['SysFunctionsGroup']['id'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </table>
                </div></div></div></div><br>
                </center>
                                
            </div>
        </div>            
    </div>    
</div>