<div class="row">
<h3><?php echo __('Add Room Type'); ?></h3>
<?php echo $this->Form->create('RoomType', array('novalidate' => true,
					'inputDefaults'=>array(
						'error' => array('attributes' => array('wrap' => 'div', 'class'=>'alert alert-danger'))
					)
				)); ?>
<?php echo $this->Session->flash(); ?>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('hotel_id', array('class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'empty' => 'Select')); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('type_title', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('total_nuber_of_rooms', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('unit_price', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('room_occupied', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('service_charges', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('service_taxes', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-3 col-md-3 col-xs-3">
	<div class="form-group">
		<?php echo $this->Form->input('isactive', array('type'=>'select', 'class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'options'=>array(0=>'No',1=>'Yes'), 'selected'=>1)); ?>
	</div>
</div>
<div class="col-sm-3 col-md-3 col-xs-3">
	<div class="form-group">
		<?php echo $this->Form->input('isdeleted', array('type'=>'select', 'class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'options'=>array(0=>'No',1=>'Yes'), 'selected'=>0)); ?>
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
