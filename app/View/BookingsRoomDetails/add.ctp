<div class="row">
<h3><?php echo __('Add Bookings Room Detail'); ?></h3>
<?php echo $this->Form->create('BookingsRoomDetail', array('novalidate' => true)); ?>
<?php echo $this->Session->flash(); ?>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('booking_id', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('room_details_id', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('isactive', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('isdeleted', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>

<div class="row">

	<div class="col-sm-offset-5 col-md-offset-5 col-xs-offset-5">

    	<?php echo 	$this->Form->submit("Add", array("div"=>false, "label"=>false, "class"=>"btn btn-primary"));?>

		
        <?php echo 	$this->Html->link("cancel",array("action"=>"index"), array("class"=>"btn btn-default"));?>

    </div>

</div>
<?php echo 	$this->Form->end();?>
