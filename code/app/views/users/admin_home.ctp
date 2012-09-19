     
<div class="container clearfix">
<div class="title">
    <p><?php __("Home") ?></p>
        <h6></h6>
        <h5>&nbsp;</h5>
</div>    
<?php $session->flash(); ?>    

<!--left start--><!--left end-->

<!--midle start-->        
<div class="midle">                    
    <div class="under_title ">                        
        <div class="search">&nbsp;</button>
        </div>
    </div>
    <div class="center">
        <div class="inf">
            <table width="100%">
                <tr>
                    <th colspan="2" style="text-align:center;color:#DA7115;"><?php __("Profile") ?></th>
                </tr>
                <tr>
                    <td width="25%" style="color:#808EB1"><p><?php __("Username") ?></p></td>
                    <td><?php echo $curUser['username'] ?></td>
                </tr>
                <tr>
                    <td width="25%" style="color:#808EB1"><p><?php __("Group") ?></p></td>
                    <td><?php if(isset($gName)) echo $gName ?></td>
                </tr>
                <tr>
                    <td width="25%" style="color:#808EB1"><p><?php __("Name") ?></p></td>
                    <td><?php echo $curUser['info_name'] ?></td>
                </tr>
                <tr>
                    <td width="25%" style="color:#808EB1"><p><?php __("Email") ?></p></td>
                    <td><?php echo $curUser['email'] ?></td>
                </tr>                                
                <tr>
                    <td width="25%" style="color:#808EB1"><p><?php __("LoginCount") ?></p></td>
                    <td><?php echo $curUser['login_count'] ?></td>
                </tr>
                <tr>
                    <td width="25%" style="color:#808EB1"><p><?php __("LastLogin") ?></p></td>
                    <td><?php echo $curUser['last_login'] ?></td>
                </tr>                
                <tr>
                    <td width="25%" style="color:#808EB1"><p><?php __("CreatedDate") ?></p></td>
                    <td><?php echo $curUser['created'] ?></td>
                </tr>
            </table>
        </div>
        <div class="function">
                    
            <?php $i=1;foreach($sys_menu as $item): ?>
            <?php 
                if($i==1) { $i=2; continue;}
                $con = $item['Menu']['SysFunction']['controller'];
                $act = $item['Menu']['SysFunction']['action'];
            ?>
                <?php if(!empty($con) && !empty($act)): ?>
                    <div class="block_home">
                        <?php if(!empty($item['Menu']['SysFunction']['icon'])) echo $html->image($item['Menu']['SysFunction']['icon'],array('width'=>50,'height'=>50)) ?>
                        <p><?php echo $html->link($item['Menu']['SysFunction']['name'],array('controller'=>$con,'action'=>$act));  ?></p>
                        <?php echo $item['Menu']['SysFunction']['description'] ?>
                    </div>
                    <div class="dot cl">
                    </div>
                <?php endif; ?>
                <!-- Build Submenu -->
                <?php if(count($item['SubMenu']) >0): ?>
                                        
                    <table cellpadding="3" cellspacing="5">
                        <tr>
                            <td align="left" class="title_table"><?php echo $item['Menu']['SysFunction']['name'] ?></td>
                        </tr>
                        <tr><td style="text-align:left">
                            
                            <?php foreach($item['SubMenu'] as $sub): ?>
                                <?php 
                                    $con = $sub['SysFunction']['controller'];
                                    $act = $sub['SysFunction']['action'];
                                 ?>
                                 <?php if(!empty($con) && !empty($act)): ?>
                                    <div class="block_home">
                                        <?php if(!empty($sub['SysFunction']['icon'])) echo $html->image($sub['SysFunction']['icon'],array('width'=>50,'height'=>50)) ?>
                                        <p><?php echo $html->link($sub['SysFunction']['name'],array('controller'=>$con,'action'=>$act));  ?></p>
                                        <?php echo $sub['SysFunction']['description'] ?>
                                    </div>
                                    <div class="dot cl">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>                    
                    
                        </td></tr></table>
                    
                <?php endif; ?>
            <?php $i++;endforeach; ?>
        </div>
        <div class="cl"></div>
        <br>
    </div>
    <div class="button_function">
        &nbsp;
    </div>
</div>
<!--midle end-->


</div>
<br><br>