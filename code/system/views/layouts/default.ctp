<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">
<head>
    <?php echo $html->charset(); ?>
    <title>        
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $html->meta('icon');
        echo $html->css('main');
        echo $scripts_for_layout;        
        echo $javascript->link('jquery');
    ?>
    <script type="text/javascript">jq = $;</script>
</head>

<body id="page" class="font-medium width-wide left  green">

    <div id="page-body">
        <div class="wrapper floatholder">
            <div class="wrapper-tl">
                <div class="wrapper-tr">
                    <div class="wrapper-bl">
                        <div class="wrapper-br">
                            <div id="header">
                                <div class="header-l">
                                    <div class="header-r">                                
                                        <div id="toolbar">
                                            <div class="floatbox ie_fix_floats">
                                                <div id="date">15-3-2010
                                                    <p>...</p>                                                
                                                </div>                                                                                                  
                                                <div id="search">                                                    
                                                    <form action="index.php?option=com_search" method="get">
                                                        <div class="search">
                                                            <input name="searchword" id="mod_search_searchword" maxlength="20" alt="search" class="inputbox" type="text" size="20" value="..."  onblur="if(this.value=='') this.value='...';" onfocus="if(this.value=='Rechercher...') this.value='';" />    </div>
                                                        <input type="hidden" name="option" value="com_search" />
                                                        <input type="hidden" name="Itemid" value="" />    
                                                    </form>
                                                </div>                                                                                    
                                            </div>
                                        </div>                                        
                                        <div id="headerbar">
                                            <div class="floatbox ie_fix_floats">                                                                                                                                            
                                            </div>
                                        </div>

                                            
<?php //echo $this->element('system/menu') ?>
<div id="menu">    
    <ul class="menu">
    <li class="level1">
        <a class="level1" href="<?php echo Helper::url("../sys_functions") ?>"><span><?php __("Packets") ?></span></a>
        <ul>
            <li class="level2">
                <a class="level2" href="<?php echo Helper::url("../sys_functions") ?>"><span><?php __("Normal") ?></span></a>
                <a class="level2" href="<?php echo Helper::url("../sys_functions/index/1") ?>"><span><?php __("System") ?></span></a>
                <a class="level2" href="<?php echo Helper::url("../groups") ?>"><span><?php __("Group") ?></span></a>
            </li>
        </ul>
    </li>
    <!-- <li class="level1"><a class="level1" href="<?php // echo Helper::url("../sys_groups") ?>"><span><?php //__("Group") ?></span></a></li> -->
        <li class="level1"><a class="level1" href="<?php echo Helper::url("../sys_users/logout") ?>"><span><?php __("Logout") ?></span></a></li>
    </ul>
</div>

<!-- Language                                                                                
<div id="banner">
    <p><a href=""><img border="0" src="components/com_joomfish/images/flags/fr.gif" alt="Fran&ccedil;ais" /></a> <a href="http://www.outlet-malls.eu"><img height="14" width="20" border="0" src="components/com_joomfish/images/flags/en.gif" title="English" alt="English" /></a> <a href="de/"><img border="0" src="components/com_joomfish/images/flags/de.gif" alt="Deutsch" title="Deutsch" /></a></p>
</div>
-->
                                                                        
            </div>
        </div>
    </div>
<!-- header end -->

<!--<div id="top">
Banner or Bread crumb Hello
</div>            
-->

<!-- top end -->

<?php echo $content_for_layout ?>
<br><br><br>

                     </div>    
                </div>    
            </div>    
        </div>        
    </div>    
    <div>

    <!-- page-body end -->
                        
                                                
<div id="page-footer">
    <div class="wrapper floatholder">
        <br><center>Power by DuyNB</center>
    </div>
</div>

    <!-- page-footer end -->

</body>
</html>     