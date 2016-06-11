<div class="container-fluid">
		
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><?php echo $this->Html->link("Home","/users"); ?></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo __("Modules"); ?> <span class="caret"></span></a>
              <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-submenu"><?php echo $this->Html->link("Facilities",'javascript:void(0)',array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      <li><?php echo $this->Html->link("Add New","/facilities/add"); ?></li>
                      <li><?php echo $this->Html->link("List All","/facilities"); ?></li>
                      <!--
                      <li class="dropdown-submenu">
                        <a href="#">Even More..</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">3rd level</a></li>
                            <li><a href="#">3rd level</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Second level</a></li>
                      -->
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Places","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      <li><?php echo $this->Html->link("Add New","/places/add"); ?></li>
                      <li><?php echo $this->Html->link("List All","/places"); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("States","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New","/states/add"); ?></li>
						<li><?php echo $this->Html->link("List All","/states"); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Hotels","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New","/hotels/add"); ?></li>
						<li><?php echo $this->Html->link("List All","/hotels"); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Users","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New","/users/add"); ?></li>
						<li><?php echo $this->Html->link("List All","/users"); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Room Types","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New",array('controller'=>'room_types', 'action'=>'add')); ?></li>
						<li><?php echo $this->Html->link("List All",array('controller'=>'room_types', 'action'=>'index')); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Room Details","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New",array('controller'=>'room_details', 'action'=>'add')); ?></li>
						<li><?php echo $this->Html->link("List All",array('controller'=>'room_details', 'action'=>'index')); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Ratings","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New",array('controller'=>'hotel_ratings', 'action'=>'add')); ?></li>
						<li><?php echo $this->Html->link("List All",array('controller'=>'hotel_ratings', 'action'=>'index')); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Approved Ratings","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New",array('controller'=>'hotel_approved_ratings', 'action'=>'add')); ?></li>
						<li><?php echo $this->Html->link("List All",array('controller'=>'hotel_approved_ratings', 'action'=>'index')); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Booking Details","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New",array('controller'=>'bookings', 'action'=>'add')); ?></li>
						<li><?php echo $this->Html->link("List All",array('controller'=>'bookings', 'action'=>'index')); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Testimonials","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New",array('controller'=>'testimonials', 'action'=>'add')); ?></li>
						<li><?php echo $this->Html->link("List All",array('controller'=>'testimonials', 'action'=>'index')); ?></li>
                    </ul>
                </li>
                <li class="dropdown-submenu"><?php echo $this->Html->link("Manage Content","javascript:void(0);",array('tabindex'=>'-1')); ?>
                	<ul class="dropdown-menu">
                      	<li><?php echo $this->Html->link("Add New",array('controller'=>'cms_contents', 'action'=>'add')); ?></li>
						<li><?php echo $this->Html->link("List All",array('controller'=>'cms_contents', 'action'=>'index')); ?></li>
                    </ul>
                </li>
                <!--<li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>-->
              </ul>
            </li>
            <li><?php echo $this->Html->link("Log Out","/users/logout"); ?></li>
          </ul>
          <!--
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul>
          -->
        </div><!--/.nav-collapse -->
      </div>