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
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js');
		echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
 <style>
html, body {
height: 100%;
}
footer {
color: #666;
background: #222;
padding: 17px 0 18px 0;
border-top: 1px solid #000;
}
footer a {
color: #999;
}
footer a:hover {
color: #efefef;
}
.wrapper {
min-height: 100%;
height: auto !important;
height: 100%;
margin: 0 auto -63px;
}
.push {
height: 63px;
}
/* not required for sticky footer; just pushes hero down a bit */
.wrapper > .container {
padding-top: 60px;
}
</style> 
</head>
<body>
<div class="wrapper">
	<div id="container" class="container">
        <header class="hero-unit">
                <h1>User Login Section</h1>
        </header>
		<?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
		<div id="footer">
			
		</div>
	</div>
</div>
</body>
</html>