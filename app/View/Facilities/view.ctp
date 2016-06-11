<div class="facilities view">
<h2><?php echo __('Facility'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($facility['Facility']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($facility['Facility']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title Alias'); ?></dt>
		<dd>
			<?php echo h($facility['Facility']['title_alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon Path'); ?></dt>
		<dd>
			<?php echo h($facility['Facility']['icon_path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($facility['Facility']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($facility['Facility']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($facility['Facility']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeletd'); ?></dt>
		<dd>
			<?php echo h($facility['Facility']['isdeletd']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Facility'), array('action' => 'edit', $facility['Facility']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Facility'), array('action' => 'delete', $facility['Facility']['id']), null, __('Are you sure you want to delete # %s?', $facility['Facility']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Facilities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facility'), array('action' => 'add')); ?> </li>
	</ul>
</div>
