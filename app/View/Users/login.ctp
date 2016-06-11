<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <div class="form-group">
        <label for="exampleInputEmail1">UserName</label>
        <?php echo $this->Form->input('username', array('div'=>FALSE, 'label'=>FALSE, 'placeholder'=>'Enter Username', 'class'=>'form-control')); ?>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <!--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
        <?php echo $this->Form->input('password', array('div'=>FALSE, 'label'=>FALSE, 'placeholder'=>'Enter Password', 'class'=>'form-control')); ?>
      </div>
      
     <!-- <div class="checkbox">
        <label>
          <input type="checkbox"> Check me out
        </label>
      </div>-->
      <button type="submit" class="btn btn-default">Login</button>
<?php echo $this->Form->end(); ?>
</div>