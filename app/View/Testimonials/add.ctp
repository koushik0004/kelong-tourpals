<?php echo $this->Html->script(array('ckeditor/ckeditor', 'bootstrap-filestyle.min'));?>
<script>
$(document).ready(function(){
		//alert(CKEDITOR.version);
		CKEDITOR.replace('testi_description', {
				width: '100%',
				toolbar :
					[
						{ name: 'basicstyles', items : [ 'Bold','Italic' ] },
						{ name: 'paragraph', items : [ 'NumberedList','BulletedList' ] },
						{ name: 'tools', items : [ 'Maximize','-','About' ] }
					]

			});
	});
</script>
<div class="row">
<h3><?php echo __('Add Testimonial'); ?></h3>
<?php echo $this->Form->create('Testimonial', array('novalidate' => true, 'type'=>'file',
					'inputDefaults'=>array(
						'error' => array('attributes' => array('wrap' => 'div', 'class'=>'alert alert-danger'))
					)
				)); ?>
<?php echo $this->Session->flash(); ?>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('title', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>
	</div>
</div>
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('user_id', array('type'=>'select', 'class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'empty'=>'-- Please Select --', 'data-live-search'=>"true")); ?>
	</div>
</div>
</div>

<div class="row">
<div class="col-sm-12 col-md-12 col-xs-12">
	<div class="form-group">
		<?php echo $this->Form->input('description', array('type'=>'text', 'class'=>'form-control', 'div'=>false, 'id'=>'testi_description')); ?>
	</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-xs-6">
	<div class="form-group">
		<?php echo $this->Form->input('imgae_path', array('type'=>'file', 'class'=>'filestyle', 'div'=>false, 'data-input'=>'false')); ?>
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

		
        <?php echo 	$this->Html->link("Cancel",array("action"=>"index"), array("class"=>"btn btn-default"));?>

    </div>

</div>
<?php echo 	$this->Form->end();?>
