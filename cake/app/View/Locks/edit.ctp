<div class="locks form">
<?php echo $this->Form->create('Lock'); ?>
	<fieldset>
		<legend><?php echo __('Edit Lock'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('schedule_id');
		echo $this->Form->input('job_seeker_id');
		echo $this->Form->input('lock_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Lock.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Lock.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Locks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Seekers'), array('controller' => 'job_seekers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Seeker'), array('controller' => 'job_seekers', 'action' => 'add')); ?> </li>
	</ul>
</div>
