<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" 
       aria-hidden="true">×
    </button>
    <h4 class="modal-title" id="myModalLabel">
       Please LogIn.
    </h4>
 </div>

<div class="modal-body">
	<div class="row">
        <div class="col-md-7 col-sm-7 col-xs-7">
        <?php echo $this->Form->create('User', array('url'=>'/users/loginclient')); ?>
		<?php echo $this->Session->flash('auth'); ?>
        	<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">UserName</label>
                        <?php echo $this->Form->input('username', array('div'=>FALSE, 'label'=>FALSE, 'placeholder'=>'Enter Username/Email', 'class'=>'form-control', 'mandatory'=>'1')); ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <?php echo $this->Form->input('password', array('div'=>FALSE, 'label'=>FALSE, 'placeholder'=>'Enter Password', 'class'=>'form-control', 'mandatory'=>'1')); ?>
                      </div>
                 </div> 
          </div>
          	<div class="row">
              <div class="col-md-offset-10 col-sm-offset-10 col-xs-offset-10">
              <!--<button type="submit" class="btn btn-default">Login</button>-->
              <?php echo$this->Form->submit('Login', array('type'=>'submit', 'class'=>'btn btn-primary', 'label'=>false, 'div'=>false, 'onclick'=>'LoginClientUsers(this, event)')); ?>
              </div>
          </div>
      	<?php echo $this->Form->end(); ?>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <a class="btn btn-block btn-social btn-twitter">
                <i class="fa fa-twitter"></i> Sign in with Twitter
              </a>
             
             <h4 class="login-button-set">-OR-</h4>
             
             <a class="btn btn-block btn-social btn-google-plus">
                <i class="fa fa-google-plus"></i> Sign in with Google+
              </a>
              
              <h4 class="login-button-set">-OR-</h4>
              
             <a class="btn btn-block btn-social btn-facebook">
                <i class="fa fa-facebook"></i> Sign in with Facebook
              </a> 
        </div>
      </div>
</div>

<div class="modal-footer">
<?php echo$this->Form->button('Cancel', array('type'=>'button', 'class'=>'btn btn-default', 'label'=>false, 'div'=>false, 'data-dismiss'=>"modal")); ?>
</div>
<!-- http://lipis.github.io/bootstrap-social/ -->