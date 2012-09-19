<div class="sysControllers form">
<?php echo $form->create('SysController');?>
	<fieldset>
 		<legend><?php __('Add SysController');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('sys_function_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List SysControllers', true), array('action' => 'index'));?></li>
	</ul>
</div>
