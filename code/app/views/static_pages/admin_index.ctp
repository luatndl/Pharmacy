     
<div class="container clearfix">
<div class="title">
    <p><?php __("Home") ?></p>
        <h6></h6>
        <h5>&nbsp;</h5>
</div>    
<?php $session->flash(); ?>    

<div class="left">    
    <?php if(isset($pageList) && count($pageList) > 0): ?>    
        <p class="title_left"><?php __("Pages") ?></p>
        <?php $i=1;foreach($pageList as $item): ?>
            <p class="contend_left"><?php echo $html->link($item['StaticPage']['name'],array('action'=>'index',$item['StaticPage']['id']));  ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!--midle start-->        
<div class="midle not_full">                    
<div class="center">
        <div id = "update_div">
            <?php echo $this->element('static_pages/update_div') ?>                        
        </div> <!-- update_div end -->
</div>
</div>
</div>