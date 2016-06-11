<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($user['User']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isblocked'); ?></dt>
		<dd>
			<?php echo h($user['User']['isblocked']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Ratings'), array('controller' => 'hotel_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Rating'), array('controller' => 'hotel_ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Hotel Ratings'); ?></h3>
	<?php if (!empty($user['HotelRating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Review Title'); ?></th>
		<th><?php echo __('Review'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Is Approvied'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Isdeleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['HotelRating'] as $hotelRating): ?>
		<tr>
			<td><?php echo $hotelRating['id']; ?></td>
			<td><?php echo $hotelRating['hotel_id']; ?></td>
			<td><?php echo $hotelRating['user_id']; ?></td>
			<td><?php echo $hotelRating['review_title']; ?></td>
			<td><?php echo $hotelRating['review']; ?></td>
			<td><?php echo $hotelRating['rating']; ?></td>
			<td><?php echo $hotelRating['is_approvied']; ?></td>
			<td><?php echo $hotelRating['created']; ?></td>
			<td><?php echo $hotelRating['updated']; ?></td>
			<td><?php echo $hotelRating['isactive']; ?></td>
			<td><?php echo $hotelRating['isdeleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotel_ratings', 'action' => 'view', $hotelRating['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotel_ratings', 'action' => 'edit', $hotelRating['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotel_ratings', 'action' => 'delete', $hotelRating['id']), null, __('Are you sure you want to delete # %s?', $hotelRating['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel Rating'), array('controller' => 'hotel_ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
