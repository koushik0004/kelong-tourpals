<div class="hotelApprovedRatings view">
<h2><?php echo __('Hotel Approved Rating'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotelApprovedRating['HotelApprovedRating']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotelApprovedRating['Hotel']['title'], array('controller' => 'hotels', 'action' => 'view', $hotelApprovedRating['Hotel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avarage Rating'); ?></dt>
		<dd>
			<?php echo h($hotelApprovedRating['HotelApprovedRating']['avarage_rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($hotelApprovedRating['HotelApprovedRating']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($hotelApprovedRating['HotelApprovedRating']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($hotelApprovedRating['HotelApprovedRating']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($hotelApprovedRating['HotelApprovedRating']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel Approved Rating'), array('action' => 'edit', $hotelApprovedRating['HotelApprovedRating']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel Approved Rating'), array('action' => 'delete', $hotelApprovedRating['HotelApprovedRating']['id']), null, __('Are you sure you want to delete # %s?', $hotelApprovedRating['HotelApprovedRating']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Approved Ratings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Approved Rating'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
	</ul>
</div>
