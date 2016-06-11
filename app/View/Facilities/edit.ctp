<!--http://markusslima.github.io/bootstrap-filestyle/-->
<?php echo $this->Html->script('bootstrap-filestyle.min'); ?>
<div class="row">
<h3><?php echo __('Edit Facility'); ?></h3>
<?php echo $this->Form->create('Facility', array('novalidate' => true, 'type'=>'file', 
					'inputDefaults'=>array(
						'error' => array('attributes' => array('wrap' => 'div', 'class'=>'alert alert-danger'))
					)
				)); ?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->input('id', array('type'=>'hidden', 'div'=>false)); ?>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('title', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('title_alias', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-3 col-md-3 col-xs-3">
	<div class="form-group">
		<?php echo $this->Form->input('icon_path', array('type'=>'file', 'class'=>'filestyle', 'div'=>false, 'data-input'=>'false')); ?>
	</div>
</div>
<div class="col-sm-3 col-md-3 col-xs-3">
	<div class="form-group">
    <?php 
		if(isset($this->data['Facility']['icon_path'])
			&& !empty($this->data['Facility']['icon_path']) && !is_array($this->data['Facility']['icon_path'])){
			
			echo '<div class="input file">';
			echo '<label>&nbsp;</label>';
			echo $this->Html->image('uploads/100/'.$this->data['Facility']['icon_path']);
			echo '</div>';
		
		}
	?>
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
		<?php echo $this->Form->input('isdeletd', array('type'=>'select', 'class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'options'=>array(0=>'No',1=>'Yes'), 'selected'=>0)); ?>
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
