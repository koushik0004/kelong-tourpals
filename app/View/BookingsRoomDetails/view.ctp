<div class="bookingsRoomDetails view">
<h2><?php echo __('Bookings Room Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bookingsRoomDetail['BookingsRoomDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Booking'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bookingsRoomDetail['Booking']['id'], array('controller' => 'bookings', 'action' => 'view', $bookingsRoomDetail['Booking']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Details'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bookingsRoomDetail['RoomDetails']['id'], array('controller' => 'room_details', 'action' => 'view', $bookingsRoomDetail['RoomDetails']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bookingsRoomDetail['BookingsRoomDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bookingsRoomDetail['BookingsRoomDetail']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($bookingsRoomDetail['BookingsRoomDetail']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($bookingsRoomDetail['BookingsRoomDetail']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bookings Room Detail'), array('action' => 'edit', $bookingsRoomDetail['BookingsRoomDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bookings Room Detail'), array('action' => 'delete', $bookingsRoomDetail['BookingsRoomDetail']['id']), null, __('Are you sure you want to delete # %s?', $bookingsRoomDetail['BookingsRoomDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookings Room Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookings Room Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookings'), array('controller' => 'bookings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Booking'), array('controller' => 'bookings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Details'), array('controller' => 'room_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Details'), array('controller' => 'room_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
