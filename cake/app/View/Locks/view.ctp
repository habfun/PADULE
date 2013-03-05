<div class="locks view">
<h2><?php  echo __('Lock'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lock['Lock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lock['Schedule']['id'], array('controller' => 'schedules', 'action' => 'view', $lock['Schedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job Seeker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lock['JobSeeker']['id'], array('controller' => 'job_seekers', 'action' => 'view', $lock['JobSeeker']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lock Type'); ?></dt>
		<dd>
			<?php echo h($lock['Lock']['lock_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($lock['Lock']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($lock['Lock']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lock'), array('action' => 'edit', $lock['Lock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lock'), array('action' => 'delete', $lock['Lock']['id']), null, __('Are you sure you want to delete # %s?', $lock['Lock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lock'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Seekers'), array('controller' => 'job_seekers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Seeker'), array('controller' => 'job_seekers', 'action' => 'add')); ?> </li>
	</ul>
</div>
