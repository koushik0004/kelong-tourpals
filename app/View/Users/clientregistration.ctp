<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" 
       aria-hidden="true">×
    </button>
    <h4 class="modal-title" id="myModalLabel">
       New Registration
    </h4>
 </div>
 
<?php echo $this->Form->create('User', array('novalidate' => true, 'type' => 'file', 'url'=>'/users/addclient')); ?> 
<div class="modal-body"> 
    <?php 
    
    echo $this->Session->flash();
    ?>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            <?php echo $this->Form->input('first_name', array('type'=>'text', 'class'=>"form-control", 'div'=>false, 'mandatory'=>'1'));?>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            <?php echo $this->Form->input('last_name', array('type'=>'text', 'class'=>"form-control", 'div'=>false, 'mandatory'=>'1'));?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            <?php echo $this->Form->input('email', array('type'=>'email', 'class'=>"form-control", 'div'=>false, 'mandatory'=>'1'));?>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            <?php echo $this->Form->input('username', array('type'=>'text', 'class'=>"form-control", 'div'=>false, 'mandatory'=>'1', 'label'=>'Choose UserName'));?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            <?php echo $this->Form->input('password', array('type'=>'password', 'class'=>"form-control", 'div'=>false, 'mandatory'=>'1'));?>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            <?php echo $this->Form->input('cpassword', array('type'=>'text', 'class'=>"form-control", 'div'=>false,'label' => 'Confirm Password', 'mandatory'=>'1'));?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
            <?php echo $this->Form->input('User.role', array('type'=>'hidden', 'value'=>'CLIENT', 'div'=>false, 'label'=>false)); ?>
            <?php echo $this->Form->input('User.isactive', array('type'=>'hidden', 'value'=>'1', 'div'=>false, 'label'=>false)); ?>
            <?php echo $this->Form->input('User.isdeleted', array('type'=>'hidden', 'value'=>'0', 'div'=>false, 'label'=>false)); ?>
            <?php echo $this->Form->submit('Add', array('div'=>false, 'label'=>false, 'class'=>'btn btn-primary', 'onclick'=>'AddClientUsers(this, event)'));
            ?>
            <?php echo$this->Form->button('Cancel', array('type'=>'button', 'class'=>'btn btn-default', 'label'=>false, 'div'=>false, 'data-dismiss'=>"modal")); ?>
</div>
<?php
echo $this->Form->end();

?>
