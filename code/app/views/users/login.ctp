<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $html->charset(); ?>

<?php echo $html->css('style'); ?>
<?php echo $html->css('custom'); ?>
<title><?php __("Adminstator") ?></title>
</head>
<body>

<?php $session->flash(); ?>
<div class="login">    
    <?php echo $form->create('User', array('action' => 'login'));?>                                                             
    <table cellpadding="3" cellspacing="5">
        <tr>
            <td class="title_login"><?php __("Login") ?></td>
            <td></td>
        </tr>
        <tr>
            <td><?php __("Username") ?></td>
            <td class="title_login"><?php echo $form->input('username',array('label'=>'','div'=>''));?></td>
        </tr>
        <tr>
            <td><?php __("Password") ?></td>
            <td class="title_login"><?php echo $form->input('password',array('label'=>'','div'=>''));?></td>
        </tr>
        <tr>
            <td><?php __("Remember") ?></td>
            <td><input type="checkbox" name="data[User][remember]" /></td>
        </tr>
        <tr>
            <td></td>
            <td class="title_login"><?php echo $form->submit(__('Login',true),array('class'=>'button_login'));?></td>
        </tr>
    </table>                        
    </form>
    
</div>

</body>
</html>