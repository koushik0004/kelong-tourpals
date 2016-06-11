<div class="bookings view">
<h2><?php echo __('Booking'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booking['Place']['title'], array('controller' => 'places', 'action' => 'view', $booking['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booking['Hotel']['title'], array('controller' => 'hotels', 'action' => 'view', $booking['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booking['User']['id'], array('controller' => 'users', 'action' => 'view', $booking['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Childrens'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['childrens']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adults'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['adults']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Check In'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['check_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checkout'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['checkout']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Days'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['no_of_days']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Charges'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['service_charges']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sevice Tax'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['sevice_tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Other Taxes'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['other_taxes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Charges'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['bank_charges']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Courier Charges'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['courier_charges']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Misc Charges'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['misc_charges']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extra Charges'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['extra_charges']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extra Bed Charges'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['extra_bed_charges']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($booking['Booking']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Booking'), array('action' => 'edit', $booking['Booking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Booking'), array('action' => 'delete', $booking['Booking']['id']), null, __('Are you sure you want to delete # %s?', $booking['Booking']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Details'), array('controller' => 'room_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Detail'), array('controller' => 'room_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Room Details'); ?></h3>
	<?php if (!empty($booking['RoomDetail'])): ?>
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
	<?php foreach ($booking['RoomDetail'] as $roomDetail): ?>
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
