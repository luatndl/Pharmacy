<div id="middle">
    <div class="background">                        
        
        <div id="left">
                <div id="left_container" class="clearfix">                            
                    <div class="module-blue"><div><div><div>
                        <center><h1 style="color:white"><?php __("MapLink") ?><br><i id="LoadingDiv" style="display: none;"><?php echo $html->image('ajax-loader.gif'); ?></i></h1></center>
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
                        <?php echo $form->create('MapLink');?>
                        <input type="hidden" name = "data[RedirectUrl]" value="<?php echo $this->params['pass'][1] ?>" />
                        <table>
                            <tr class="title_table">
                                <td colspan="2"></td>
                            </tr>
                            <?php echo $form->input('id',array('label'=>'','div'=>'')); ?>            <tr>
                                <td align='right'><?php __('Name') ?></td>
                                <td align='left'><?php echo $form->input('name',array('label'=>'','div'=>'')); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td align="left">
                                    <input type="submit" value="Submit" class="btn" />                    
                                    <input type = "button" class="btn" onclick="location.href='<?php echo $html->url('/maps/edit/'.$this->params['pass'][1]); ?>';" value="<?php __("Back") ?>" />
                                </td>
                            </tr>
                            <tr class="title_table_bottom">
                                <td colspan="2">
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