
<div id="middle">
    <div class="background">                        
        
        <div id="left">
                <div id="left_container" class="clearfix">                            
                    <div class="module-blue"><div><div><div>
                        <center><h1 style="color:white"><?php __("Maps") ?><br><i id="LoadingDiv" style="display: none;"><?php echo $html->image('ajax-loader.gif'); ?></i></h1></center>
                    </div></div></div></div>
                    
                    <div class="module_menu"><div><div><div>
                    <h3><?php __("Actions") ?></h3><ul class="menu">
                    <ul class="menu">
                            <li class="level1 first"><a class="level1 first" href="<?php echo Helper::url("../maps") ?>"><span><?php __("ListMap") ?></span></a></li>
                    </ul>
                    </div></div></div></div>
                </div>
        </div>
        <!-- left end -->

        <div id="main">            
            <div id="main_container" class="clearfix">
                <div class="module-white"><div><div><div>                                    
                    <center>
                        <?php echo $form->create('Map');?>
                        <table>
                            <tr class="title_table">
                                <td colspan="2"></td>
                            </tr>

                            <?php echo $form->input('id',array('label'=>'','div'=>'')); ?>            
                            <tr>
                                <td align='right'><?php __('Name') ?></td>
                                <td align='left'><?php echo $form->input('name',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td align='right'><?php __('Image') ?></td>
                                <td align='left'><?php echo $form->input('image',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td align='right'><?php __('Thumbnail') ?></td>
                                <td align='left'><?php echo $form->input('thumbnail',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td align='right'><?php __('Content') ?></td>
                                <td align='left'>
                                    <textarea name="data[Map][content]" cols="60" rows="20"><?php echo $this->data['Map']['content'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td align='right'><?php __('Code') ?></td>
                                <td align='left'><?php echo $form->input('code',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td align='right'><?php __('Active') ?></td>
                                <td align='left'><?php echo $form->input('active',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td align="left">
                                    <input type="submit" value="Submit" class="btn" />                    
                                    <input type = "button" class="btn" onclick="location.href='<?php echo $html->url('/maps'); ?>';" value="<?php __("Back") ?>" />
                                </td>
                            </tr>
                            <tr class="title_table_bottom">
                                <td colspan="2">
                                </td>
                            </tr>
                        </table>
                        </form>
                    </center>
                    
                </div></div></div></div>
                
                <center><h4><?php __("Map Links") ?></h4></center>
                
                <center>
                <?php echo $form->create('MapLink',array('action'=>'add')) ?>
                    <input type="hidden" name = "data[MapLink][map_id]" value="<?php echo $this->params['pass'][0] ?>" />
                    <?php __("Name") ?> <?php echo $form->input('name',array('label'=>'','div'=>'')) ?>
                    <input type="submit" value="<?php __("Add") ?>" class="btn" /><br><br>
                </form>
                </center>
                <div class="module-white"><div><div><div>                                    
                    <center>
                        <table cellpadding="3" cellspacing="5" class="list">
                            <tr>
                                <td><?php echo $paginator->sort('id');?></td>
                                <td><?php echo $paginator->sort('name');?></td>
                                <td class="actions"><?php __('Actions');?></td>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($mapLinks as $item):
                                $class = null;
                                if ($i++ % 2 == 0) {
                                    $class = ' class="item"';
                                }
                            ?>
                            <tr<?php echo $class;?>>
                                <td>
                                    <?php echo $item['MapLink']['id']; ?>
                                </td>
                                <td>
                                    <?php echo $item['MapLink']['name']; ?>
                                </td>
                                <td class="actions">
                                    <?php echo $html->link(__('Edit',true), array('controller'=>'map_links','action' => 'edit', $item['MapLink']['id'],$this->params['pass'][0])); ?>
                                    <?php echo $html->link(__('Delete',true), array('controller'=>'map_links','action' => 'delete', $item['MapLink']['id']), null, sprintf(__('MsgConfirmDelete', true), $item['MapLink']['id'])); ?>
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