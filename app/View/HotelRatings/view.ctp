<div class="hotelRatings view">
<h2><?php echo __('Hotel Rating'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelRating['Hotel']['title'], array('controller' => 'hotels', 'action' => 'view', $hotelRating['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelRating['User']['id'], array('controller' => 'users', 'action' => 'view', $hotelRating['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Review Title'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['review_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Review'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['review']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Approvied'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['is_approvied']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($hotelRating['HotelRating']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel Rating'), array('action' => 'edit', $hotelRating['HotelRating']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel Rating'), array('action' => 'delete', $hotelRating['HotelRating']['id']), null, __('Are you sure you want to delete # %s?', $hotelRating['HotelRating']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Ratings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Rating'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
