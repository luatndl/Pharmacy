
<div class="menu_nav">
<h6>
    <?php __("Welcome") ?>: <b><?php echo $curUser['info_name'] ?></b> (<?php echo $curUser['username'] ?>)
    <?php echo $html->link($html->image('system/logout.png',array('width'=>14,'height'=>14,'title'=>__('Logout',true),'tooltip'=>__('Logout',true))),array('controller'=>'users','action'=>'logout','admin'=>0),array('escape'=>false));  ?>
</h6>
<ul>
    <?php if(isset($sys_menu) && count($sys_menu) > 0): ?>
    <?php foreach($sys_menu as $item): ?>
    <?php if(empty($item['Menu']['SysFunction']['controller']) && count($item['SubMenu']) == 0) continue; ?>
        <li>
            <a href="<?php 
                        if(!empty($item['Menu']['SysFunction']['controller']))
                        {
                            $controller1 = $item['Menu']['SysFunction']['controller'];
                            $action1 = $item['Menu']['SysFunction']['action'];
                            echo Helper::url("../$controller1/$action1");
                        }                                                    
                        else 
                            echo "#";
                        ?>">
                        <p class="top_left"></p>
                        <p class="top_center"><?php echo $item['Menu']['SysFunction']['name'] ?></p>
                        <p class="top_right"></p>
                        <div class="cl"></div>
            </a>
            <?php if(isset($item['SubMenu']) && count($item['SubMenu']) > 0): ?>                                
            <ul>                    
                <?php foreach($item['SubMenu'] as $sub): ?>
                    <?php 
                        $controller = $sub['SysFunction']['controller'];
                        $action = $sub['SysFunction']['action'];
                     ?>
                    <li><a href="<?php echo Helper::url("../$controller/$action") ?>"><p><?php echo $sub['SysFunction']['name'] ?></p></a></li>
                <?php endforeach; ?>                                        
            </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
    <?php endif; ?>        
</ul>
</div>