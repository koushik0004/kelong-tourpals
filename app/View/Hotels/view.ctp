<div class="hotels view">
<h2><?php echo __('Hotel'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['Place']['title'], array('controller' => 'places', 'action' => 'view', $hotel['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel'), array('action' => 'edit', $hotel['Hotel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel'), array('action' => 'delete', $hotel['Hotel']['id']), null, __('Are you sure you want to delete # %s?', $hotel['Hotel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Approved Ratings'), array('controller' => 'hotel_approved_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Approved Rating'), array('controller' => 'hotel_approved_ratings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Ratings'), array('controller' => 'hotel_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Rating'), array('controller' => 'hotel_ratings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types'), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type'), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Hotel Approved Ratings'); ?></h3>
	<?php if (!empty($hotel['HotelApprovedRating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('Avarage Rating'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Isdeleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hotel['HotelApprovedRating'] as $hotelApprovedRating): ?>
		<tr>
			<td><?php echo $hotelApprovedRating['id']; ?></td>
			<td><?php echo $hotelApprovedRating['hotel_id']; ?></td>
			<td><?php echo $hotelApprovedRating['avarage_rating']; ?></td>
			<td><?php echo $hotelApprovedRating['created']; ?></td>
			<td><?php echo $hotelApprovedRating['updated']; ?></td>
			<td><?php echo $hotelApprovedRating['isactive']; ?></td>
			<td><?php echo $hotelApprovedRating['isdeleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotel_approved_ratings', 'action' => 'view', $hotelApprovedRating['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotel_approved_ratings', 'action' => 'edit', $hotelApprovedRating['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotel_approved_ratings', 'action' => 'delete', $hotelApprovedRating['id']), null, __('Are you sure you want to delete # %s?', $hotelApprovedRating['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel Approved Rating'), array('controller' => 'hotel_approved_ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Hotel Ratings'); ?></h3>
	<?php if (!empty($hotel['HotelRating'])): ?>
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
	<?php foreach ($hotel['HotelRating'] as $hotelRating): ?>
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
<div class="related">
	<h3><?php echo __('Related Room Types'); ?></h3>
	<?php if (!empty($hotel['RoomType'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('Type Title'); ?></th>
		<th><?php echo __('Total Nuber Of Rooms'); ?></th>
		<th><?php echo __('Unit Price'); ?></th>
		<th><?php echo __('Room Occupied'); ?></th>
		<th><?php echo __('Service Charges'); ?></th>
		<th><?php echo __('Service Taxes'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Isdeleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hotel['RoomType'] as $roomType): ?>
		<tr>
			<td><?php echo $roomType['id']; ?></td>
			<td><?php echo $roomType['hotel_id']; ?></td>
			<td><?php echo $roomType['type_title']; ?></td>
			<td><?php echo $roomType['total_nuber_of_rooms']; ?></td>
			<td><?php echo $roomType['unit_price']; ?></td>
			<td><?php echo $roomType['room_occupied']; ?></td>
			<td><?php echo $roomType['service_charges']; ?></td>
			<td><?php echo $roomType['service_taxes']; ?></td>
			<td><?php echo $roomType['created']; ?></td>
			<td><?php echo $roomType['updated']; ?></td>
			<td><?php echo $roomType['isactive']; ?></td>
			<td><?php echo $roomType['isdeleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'room_types', 'action' => 'view', $roomType['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'room_types', 'action' => 'edit', $roomType['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'room_types', 'action' => 'delete', $roomType['id']), null, __('Are you sure you want to delete # %s?', $roomType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Room Type'), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
