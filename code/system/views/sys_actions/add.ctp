<div class="sysActions form">
<?php echo $form->create('SysAction');?>
	<fieldset>
 		<legend><?php __('Add SysAction');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('sys_controller_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List SysActions', true), array('action' => 'index'));?></li>
	</ul>
</div>
