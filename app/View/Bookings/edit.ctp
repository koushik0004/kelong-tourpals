<div class="row">
<h3><?php echo __('Edit Booking'); ?></h3>
<?php echo $this->Form->create('Booking', array('novalidate' => true,
					'inputDefaults'=>array(
						'error' => array('attributes' => array('wrap' => 'div', 'class'=>'alert alert-danger'))
					)
				)); ?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->input('id', array('type'=>'hidden', 'div'=>false)); ?>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('place_id', array('type'=>'select', 'class'=>'admin-add-edit-dropdown-big', 'empty'=>'-- Please Select --', 'div'=>false, 'data-live-search'=>"true")); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('hotel_id', array('type'=>'select', 'class'=>'admin-add-edit-dropdown-big', 'empty'=>'-- Please Select --', 'div'=>false, 'data-live-search'=>"true")); ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('user_id', array('type'=>'select', 'class'=>'admin-add-edit-dropdown-big', 'empty'=>'-- Please Select --', 'div'=>false, 'data-live-search'=>"true")); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('childrens', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('adults', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
    	<?php 
			//echo date('d/m/y');
			$formattedDate = explode(' ', $this->request->data['Booking']['check_in']);	
			$dateOnly = explode('-', $formattedDate[0]);
			$editData = (isset($this->request->data['Booking']['check_in'])&& $dateOnly[2]!='00')?($dateOnly[2].'/'.$dateOnly[1].'/'.$dateOnly[0]):date('d/m/Y');
		?>
		<?php echo $this->Form->input('check_in', array('type'=>'text', 'class'=>'form-control date-field', 'div'=>false, 'value'=>$editData)); ?>
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
    	<?php 
			//echo date('d/m/y');
			$formattedDate = explode(' ', $this->request->data['Booking']['checkout']);	
			$dateOnly = explode('-', $formattedDate[0]);
			$editData = (isset($this->request->data['Booking']['checkout'])&& $dateOnly[2]!='00')?($dateOnly[2].'/'.$dateOnly[1].'/'.$dateOnly[0]):date('d/m/Y');
		?>
		<?php echo $this->Form->input('checkout', array('type'=>'text', 'class'=>'form-control date-field', 'div'=>false, 'value'=>$editData)); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('no_of_days', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
    	<?php echo $this->Number->precision($this->request->data['Booking']['service_charges'], 2); ?>
		<?php echo $this->Form->input('service_charges', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['service_charges'], 2))); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('sevice_tax', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['sevice_tax'], 2))); ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('other_taxes', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['other_taxes'], 2))); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('bank_charges', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['bank_charges'], 2))); ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('courier_charges', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['courier_charges'], 2))); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('misc_charges', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['misc_charges'], 2))); ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('extra_charges', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['extra_charges'], 2))); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('extra_bed_charges', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['extra_bed_charges'], 2))); ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('discount', array('type'=>'text', 'class'=>'form-control decimal-input', 'div'=>false, 'value'=>$this->Number->precision($this->request->data['Booking']['discount'], 2))); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('RoomDetail', array('empty'=>'-- Please Select --', 'class'=>'admin-add-edit-dropdown-big', 'div'=>false)); ?>
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

    	<?php echo 	$this->Form->submit("Update", array("div"=>false, "label"=>false, "class"=>"btn btn-primary"));?>

		
        <?php echo 	$this->Html->link("cancel",array("action"=>"index"), array("class"=>"btn btn-default"));?>

    </div>

</div>
<?php echo 	$this->Form->end();?>
