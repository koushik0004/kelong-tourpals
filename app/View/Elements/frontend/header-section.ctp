<div class="row">
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 logo">
          	<a href="#"><!--<img src="images/logo.png" alt="logo" />-->
            	<?php echo $this->Html->image('logo.png', array('alt'=>'Logo')); ?>
            </a>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
            <p class="text-right">
                Please&nbsp;<?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'clientlogin'), array('class'=>'login-btn', 'id'=>'client-login-btn')); ?><!--<a href="#myModal" class="login-btn" data-toggle="modal">Login</a>-->&nbsp;or&nbsp;<?php echo $this->Html->link('Registed', array('controller'=>'users', 'action'=>'clientregistration'), array('class'=>'register-btn', 'id'=>'client-register-btn')); ?><!--<a href="#" class="register-btn">Registed</a>-->
                <span class="hidden-xs hidden-sm"><a href="#">Privacy Policy</a>&nbsp;|&nbsp;<a href="#" >Terms & Conditions</a></span>
            </p>
                     </div>
          <div class="col-lg-9 col-md-9 col-xs-12">
            <nav class="navbar navbar-default navArea navbar-left" role="navigation">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                   <li class="act">
                      <a href="#" class="" data-toggle="">Home</a>                      
                    </li>
                   <li>
                      <a href="#" class="" data-toggle="">About Us</a>                      
                    </li>
                    <li>
                      <a href="#" class="" data-toggle="">Register your property</a>                      
                    </li>
                     <li>
                      <a href="#" class="" data-toggle="">How it works</a>                      
                    </li>
                    <li>
                      <a href="#" class="" data-toggle="">FAQ</a>                      
                    </li>
                    <li>
                      <a href="#" class="" data-toggle="">Contact Us</a>                  
                    </li>                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
          </div>
        </div>