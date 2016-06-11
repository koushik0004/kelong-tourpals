<div class="roomTypes view">
<h2><?php echo __('Room Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($roomType['Hotel']['title'], array('controller' => 'hotels', 'action' => 'view', $roomType['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Title'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['type_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Nuber Of Rooms'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['total_nuber_of_rooms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit Price'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['unit_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Occupied'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['room_occupied']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Charges'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['service_charges']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Taxes'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['service_taxes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($roomType['RoomType']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room Type'), array('action' => 'edit', $roomType['RoomType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room Type'), array('action' => 'delete', $roomType['RoomType']['id']), null, __('Are you sure you want to delete # %s?', $roomType['RoomType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Details'), array('controller' => 'room_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Detail'), array('controller' => 'room_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Room Details'); ?></h3>
	<?php if (!empty($roomType['RoomDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Room Type Id'); ?></th>
		<th><?php echo __('Room Number'); ?></th>
		<th><?php echo __('Room Details'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Isdeleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($roomType['RoomDetail'] as $roomDetail): ?>
		<tr>
			<td><?php echo $roomDetail['id']; ?></td>
			<td><?php echo $roomDetail['room_type_id']; ?></td>
			<td><?php echo $roomDetail['room_number']; ?></td>
			<td><?php echo $roomDetail['room_details']; ?></td>
			<td><?php echo $roomDetail['comments']; ?></td>
			<td><?php echo $roomDetail['created']; ?></td>
			<td><?php echo $roomDetail['modified']; ?></td>
			<td><?php echo $roomDetail['isactive']; ?></td>
			<td><?php echo $roomDetail['isdeleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'room_details', 'action' => 'view', $roomDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'room_details', 'action' => 'edit', $roomDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'room_details', 'action' => 'delete', $roomDetail['id']), null, __('Are you sure you want to delete # %s?', $roomDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Room Detail'), array('controller' => 'room_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
