
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
                            <li class="level1 first"><a class="level1 first" href="<?php echo Helper::url("../maps/add") ?>"><span><?php __("New Map") ?></span></a></li>
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
                                <td><?php echo $paginator->sort('name');?></td>
                                <td><?php echo $paginator->sort('code');?></td>
                                <td><?php echo $paginator->sort('active');?></td>
                                <td class="actions"><?php __('Actions');?></td>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($maps as $map):
                                $class = null;
                                if ($i++ % 2 == 0) {
                                    $class = ' class="item"';
                                }
                            ?>
                            <tr<?php echo $class;?>>
                                <td>
                                    <?php echo $map['Map']['name']; ?>
                                </td>
                                <td>
                                    <?php echo $map['Map']['code']; ?>
                                </td>
                                <td>
                                    <?php if($map['Map']['active']) echo __('True',true); else echo __('False',true) ?>
                                </td>
                                <td class="actions">
                                    <?php echo $html->link(__('Manage',true), array('action' => 'edit', $map['Map']['id'])); ?>
                                    <?php echo $html->link(__('Delete',true), array('action' => 'delete', $map['Map']['id']), null, sprintf(__('MsgConfirmDelete', true), $map['Map']['id'])); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                                <tr class="title_table_bottom">
                                    <td colspan="8" align="center">
                                            <?php echo $paginator->prev('<< '.__('previous', true), array('url'=>$this->params['pass']), null, array('class'=>'disabled','style'=>'display:inline'));?>
                                         |     <?php echo $paginator->numbers(array('url'=>$this->params['pass']));?>
                                            <?php echo $paginator->next(__('next', true).' >>', array('url'=>$this->params['pass']), null, array('class' => 'disabled','style'=>'display:inline'));?>
                                    </td>
                                </tr>                
                            </table>
                    </center>
                    
                </div></div></div></div><br>
                                
            </div>
        </div>            
    </div>    
</div>