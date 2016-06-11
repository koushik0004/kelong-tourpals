<?php /*
<h3>Edit User</h3>
<?php 
echo $this->Form->create('User', array('class' => 'form', 'novalidate' => true, 'type' => 'file')); 
echo $this->Session->flash();
echo $this->Form->hidden('id');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');

//echo $this->Form->input('password', array('value' => ''));
//echo $this->Form->input('npassword', array('type' => 'password', 'value' => '', 'label' => 'New Password'));
//echo $this->Form->input('cpassword', array('type' => 'password', 'value' => '', 'label' => 'Confirm Password'));

echo $this->Form->input('role', array('options' => array('ADMIN' => 'ADMIN', 'NORMAL' => 'NORMAL'), 'default' => 'NORMAL', 'empty' => '--- select ---'));
echo $this->Form->input('isactive',array('options'=>array(0=>'No',1=>'Yes'),'default'=>0));
echo $this->Form->input('isdeleted',array('options'=>array(0=>'No',1=>'Yes'),'default'=>0));
echo $this->Form->end(__("Update"));
echo $this->Html->link("cancel",$this->request->referer());
?>*/ ?>
<div class="row">
<h3>Update User</h3>
<?php 
echo $this->Form->create('User', array('novalidate' => true, 'type' => 'file')); 
echo $this->Session->flash();
echo $this->Form->hidden('id');
?>
<div class="row">
    <div class="col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
        <?php echo $this->Form->input('first_name', array('type'=>'text', 'class'=>"form-control", 'div'=>false));?>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
        <?php echo $this->Form->input('last_name', array('type'=>'text', 'class'=>"form-control", 'div'=>false));?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
        <?php echo $this->Form->input('email', array('type'=>'email', 'class'=>"form-control", 'div'=>false));?>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
        <?php echo $this->Form->input('username', array('type'=>'text', 'class'=>"form-control", 'div'=>false));?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
        <?php echo $this->Form->input('password', array('type'=>'password', 'class'=>"form-control", 'div'=>false, 'value'=>''));?>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
        <?php echo $this->Form->input('cpassword', array('type'=>'text', 'class'=>"form-control", 'div'=>false,'label' => 'Confirm Password'));?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
        <?php 
		$type_arr = array(
				'ADMIN' => 'ADMIN',
				'NORMAL' => 'NORMAL',
				'SUBADMIN'=> 'SUBADMIN',
				'CLIENT'=>	'CLIENT'
			);
		
		echo $this->Form->input('role', array('options' => $type_arr, 'empty'=>'-- Select Role --', 'class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'label'=>'Select Role'));?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
        <?php echo $this->Form->input('isactive', array('options'=>array(0=>'No',1=>'Yes'),'default'=>0, 'class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'label'=>'Active Status'));?>
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
        <?php echo $this->Form->input('isdeleted', array('options'=>array(0=>'No',1=>'Yes'),'default'=>0, 'class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'label'=>'Deleted Status'));?>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-offset-5 col-md-offset-5 col-xs-offset-5">
    	<?php echo $this->Form->submit('Update', array('div'=>false, 'label'=>false, 'class'=>'btn btn-primary'));
		?>
        <?php echo $this->Html->link("Cancel",array('controller'=>'users', 'action'=>'index'), array('class'=>"btn btn-default"));?>
    </div>
</div>

<?php
echo $this->Form->end();

?>
</div>