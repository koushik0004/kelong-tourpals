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
		echo $this->Html->css("//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css");
		echo $this->Html->css('developer-admin');
		echo $this->Html->css('bootstrap-select.min');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <?PHP echo $this->element('bootstrap/admin-navbar'); ?>	
    </nav>
	<div class="container">
		<!--<div id="header"></div>-->
			<?PHP //echo $this->element('admin_nav'); ?>	
		
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
	</div>
    <div id="footer">
			
	</div>
	<?php 
    	echo $this->Html->script(array('bootstrap-select.min', 'jquery.inputmask.bundle.min', 'custom/admin-custom-all'));
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js');
    ?>    
</body>
</html>
<!-- Bootstrap Select
http://silviomoreto.github.io/bootstrap-select/
http://jquer.in/jquery-plugins-for-html5-forms/bootstrap-select/
-->