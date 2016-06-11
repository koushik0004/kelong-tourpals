<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $this->fetch('title'); ?>
        <?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
		echo $this->Html->css(array('font-awesome.min', 'bootstrap-social'));
		echo $this->Html->css('style');
		echo $this->Html->css('developer');
		echo $this->Html->script('jquery-1.11.2.min.js');
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js');
		echo $this->Html->script(array('vendor-angular/angular-1.5.6.min.js', 'vendor-angular/angular-animate-1.5.6.min', 'vendor-angular/angular-resource-1.5.6.min', 'vendor-angular/angular-sanitize-1.5.6.min', 'angular-files/app'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body ng-app="CommonAngularApp">
	<!-- Bootstrap Modal -->
    <!-- Modal -->
<div class="modal fade" id="login-registration-modal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-center">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">&times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               This Modal title
            </h4>
         </div>
         <div class="modal-body">
            Press ESC button to exit.
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">Close
            </button>
            <button type="Submit" class="btn btn-primary">
               Submit changes
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- Bootstrap Modal End -->
    
	<!-- header section -->
	<div class="header">
      <div class="container">
        <?php echo $this->element('frontend/header-section'); ?>
      </div>
    </div>
    
    <div class="banner-area">
    	<?php echo $this->element('frontend/top-banner'); ?>
    </div>
    <?php echo $this->element('frontend/below-banner-section'); ?>
    <!-- header section -->
    
    <!-- Container -->
    <div class="container">
    	<?php echo $this->fetch('content'); ?>
    </div>
    <!-- End Content -->
    
    <!-- Fooetr Section -->
    <?php echo $this->element('frontend/below-containet-banner-section'); ?>
    <?php echo $this->element('frontend/footer-top-social'); ?>
    <div class="footer">
    	<div class="footer-top">
        	<?php echo $this->element('frontend/footer-top'); ?>
        </div>
        <div class="footer-bottom">
        	<?php echo $this->element('frontend/footer-buttom'); ?>
        </div>
    </div>
    <?php echo $this->Form->input('WEBROOT', array('type'=>'hidden', 'name'=>'WEBROOT', 'id'=>'WEBROOT', 'value'=>$this->webroot));?>
    <!-- End Footer -->
	<?php //echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'); ?>
    <?php //echo $this->Html->script('//ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js'); ?>
    <script>
	$(document).ready(function(){
			//$('#myModal').modal('show');
			//$('body').css('position','relative');
		});
    </script>
</body>
</html>