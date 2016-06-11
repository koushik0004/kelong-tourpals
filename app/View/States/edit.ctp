<div class="row">
<h3><?php echo __('Edit State'); ?></h3>
<?php echo $this->Form->create('State', array('novalidate' => true,
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
		<?php echo $this->Form->input('code', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
</div>
<div class="row">
</div>

<div class="row">

	<div class="col-sm-offset-5 col-md-offset-5 col-xs-offset-5">

    	<?php echo 	$this->Form->submit("Add", array("div"=>false, "label"=>false, "class"=>"btn btn-primary"));?>

		
        <?php echo 	$this->Html->link("cancel",array("action"=>"index"), array("class"=>"btn btn-default"));?>

    </div>

</div>
<?php echo 	$this->Form->end();?>
