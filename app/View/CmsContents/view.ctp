<div class="roomDetails view">
<h2><?php echo __('Room Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($roomDetail['RoomDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($roomDetail['RoomType']['id'], array('controller' => 'room_types', 'action' => 'view', $roomDetail['RoomType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Number'); ?></dt>
		<dd>
			<?php echo h($roomDetail['RoomDetail']['room_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Details'); ?></dt>
		<dd>
			<?php echo h($roomDetail['RoomDetail']['room_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($roomDetail['RoomDetail']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($roomDetail['RoomDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($roomDetail['RoomDetail']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($roomDetail['RoomDetail']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($roomDetail['RoomDetail']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room Detail'), array('action' => 'edit', $roomDetail['RoomDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room Detail'), array('action' => 'delete', $roomDetail['RoomDetail']['id']), null, __('Are you sure you want to delete # %s?', $roomDetail['RoomDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types'), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type'), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('controller' => 'bookings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booking'), array('controller' => 'bookings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bookings'); ?></h3>
	<?php if (!empty($roomDetail['Booking'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Place Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Childrens'); ?></th>
		<th><?php echo __('Adults'); ?></th>
		<th><?php echo __('Check In'); ?></th>
		<th><?php echo __('Checkout'); ?></th>
		<th><?php echo __('No Of Days'); ?></th>
		<th><?php echo __('Service Charges'); ?></th>
		<th><?php echo __('Sevice Tax'); ?></th>
		<th><?php echo __('Other Taxes'); ?></th>
		<th><?php echo __('Bank Charges'); ?></th>
		<th><?php echo __('Courier Charges'); ?></th>
		<th><?php echo __('Misc Charges'); ?></th>
		<th><?php echo __('Extra Charges'); ?></th>
		<th><?php echo __('Extra Bed Charges'); ?></th>
		<th><?php echo __('Discount'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Isdeleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($roomDetail['Booking'] as $booking): ?>
		<tr>
			<td><?php echo $booking['id']; ?></td>
			<td><?php echo $booking['place_id']; ?></td>
			<td><?php echo $booking['hotel_id']; ?></td>
			<td><?php echo $booking['user_id']; ?></td>
			<td><?php echo $booking['childrens']; ?></td>
			<td><?php echo $booking['adults']; ?></td>
			<td><?php echo $booking['check_in']; ?></td>
			<td><?php echo $booking['checkout']; ?></td>
			<td><?php echo $booking['no_of_days']; ?></td>
			<td><?php echo $booking['service_charges']; ?></td>
			<td><?php echo $booking['sevice_tax']; ?></td>
			<td><?php echo $booking['other_taxes']; ?></td>
			<td><?php echo $booking['bank_charges']; ?></td>
			<td><?php echo $booking['courier_charges']; ?></td>
			<td><?php echo $booking['misc_charges']; ?></td>
			<td><?php echo $booking['extra_charges']; ?></td>
			<td><?php echo $booking['extra_bed_charges']; ?></td>
			<td><?php echo $booking['discount']; ?></td>
			<td><?php echo $booking['created']; ?></td>
			<td><?php echo $booking['modified']; ?></td>
			<td><?php echo $booking['isactive']; ?></td>
			<td><?php echo $booking['isdeleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bookings', 'action' => 'view', $booking['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bookings', 'action' => 'edit', $booking['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bookings', 'action' => 'delete', $booking['id']), null, __('Are you sure you want to delete # %s?', $booking['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Booking'), array('controller' => 'bookings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
