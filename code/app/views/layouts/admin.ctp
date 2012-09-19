<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $html->charset(); ?>

<?php echo $html->css('style'); ?>
<?php echo $html->css('custom'); ?>
<title>
    <?php echo $title_for_layout; ?>
</title>

<?php echo $javascript->link('jquery') ?>
<script type="text/javascript">jq = $;</script>
<?php echo $javascript->link('prototype'); ?>

<?php
    echo $html->meta('icon');        
    echo $scripts_for_layout;
?>

</head>
<body>
<br>
<div class="wapper">    
    <?php echo $this->element('header') ?>    
    
    <!--midle start-->
    <?php echo $content_for_layout; ?>
    <!--midle end-->
    
    <?php echo $this->element('footer') ?>
    
    <?php echo $cakeDebug; ?>

</body>
</html>
