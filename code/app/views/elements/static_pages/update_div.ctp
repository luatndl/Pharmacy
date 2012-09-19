<?php echo $javascript->link('tiny_mce/tiny_mce.js'); ?>
<script type="text/javascript">
    tinyMCE.init({
    // General options
    mode : "textareas",
    theme : "advanced",
    //plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",
    // Theme options
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,
    });
</script>                                                                                                                                                                                                                   
<?php if(isset($eID)): ?>
    <?php echo $ajax->form(array('type' => 'post','options' => array('model'=>'StaticPage','indicator'=>'LoadingDiv','update'=>'update_div','url' => array('controller' => 'static_pages','action' => 'index/'.$eID))));?>
        <input type="hidden" name = "data[StaticPage][id]" value="<?php echo $eID ?>" />
        <table>
            <tr>
                <td class="title_table" align="left"><?php echo $pageName ?> <i id="LoadingDiv" style="display: none;"><?php echo $html->image('ajax-loader.gif'); ?></i></td>                
            </tr>
            <tr>
                <td>
                    <?php echo $form->input('content',array('label'=>'','value'=>$content,'style'=>'width:100%;height:400px')) ?>
                </td>                
            </tr>
            <tr class="title_table_bottom">
                <td colspan="2">
                    <input type="submit" value="<?php __("Save") ?>" class="btn" />
                </td>
            </tr>
        </table>
    </form>
<?php else: ?>
    <table>
        <tr>
            <td class="title_table" align="left"><?php echo $pageName ?> <i id="LoadingDiv" style="display: none;"><?php echo $html->image('ajax-loader.gif'); ?></i></td>                
        </tr>
        <tr>
            <td style="height:400px;background-color:#E7E7E7" align="left">
                <?php echo $content; ?>
            </td>                
        </tr>
        <tr class="title_table_bottom">
            <td colspan="2">
                <?php echo $ajax->link(__('Edit',true),array('action'=>'index',$this->params['pass'][0]."/update"),array('indicator' => 'LoadingDiv','update'=>'update_div','escape'=>false,'class'=>'btn')); ?>
            </td>
        </tr>
    </table>    
<?php endif; ?>