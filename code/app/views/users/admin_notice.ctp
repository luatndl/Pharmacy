     
<div class="container clearfix">
<div class="title">
    <p><?php __("Notice") ?></p>
        <h6></h6>
        <h5>&nbsp;</h5>
</div>    
<?php $session->flash(); ?>    

<!--left start--><!--left end-->

<!--midle start-->
<div class="midle">                    
    <div class="under_title">
        <div class="search">&nbsp;</div>
    </div>
    
    <div class="center">
        <table>
            <tr class="title_table">
                <td><?php __("Notice") ?></td>
            </tr>
            <tr>
                <td>
                    <br><br><br>
                    <?php echo $session->read('Notice') ?>
                    
                    <br><br>
                    <a href="<?php echo $referer ?>"><?php __("Back") ?></a>
                    <br><br><br><br><br><br>
                </td>
            </tr>
            <tr class="title_table_bottom">
                <td align="right">
                    <?php __("Error") ?> <?php echo $session->read('NoticeCode') ?>                    
                </td>
            </tr>
        </table>
    </div>
</div>
</div>