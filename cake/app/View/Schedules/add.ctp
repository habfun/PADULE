<div class="schedules form">
<?php echo $this->Form->create('Schedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Schedule'); ?></legend>
	<?php
		echo $this->Form->input('group_id');
		echo $this->Form->input('start_datetime', array('type' => 'datetime', 'label' => '開始', 'dateFormat' => 'YMD', 'timeFormat' => '24', 'monthNames' => false, 'empty' => false, 'interval' => 15, 'minYear' => 2012 ,'separator' => '/'));
		echo $this->Form->input('end_datetime', array('type' => 'datetime', 'label' => '終了', 'dateFormat' => 'YMD', 'timeFormat' => '24', 'monthNames' => false, 'empty' => false, 'interval' => 15, 'minYear' => 2012 ,'separator' => '/'));
		echo $this->Form->input('start_datetime', array('type' => 'datetime', 'label' => '開始', 'dateFormat' => 'YMD', 'timeFormat' => '24', 'monthNames' => false, 'empty' => false, 'interval' => 15, 'minYear' => 2012 ,'separator' => '/'));
		echo $this->Form->input('end_datetime', array('type' => 'datetime', 'label' => '終了', 'dateFormat' => 'YMD', 'timeFormat' => '24', 'monthNames' => false, 'empty' => false, 'interval' => 15, 'minYear' => 2012 ,'separator' => '/'));
	?>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Schedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locks'), array('controller' => 'locks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lock'), array('controller' => 'locks', 'action' => 'add')); ?> </li>
	</ul>
</div>
