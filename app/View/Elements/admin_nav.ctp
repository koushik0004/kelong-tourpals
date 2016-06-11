<div class="nav">
	<ul>
		<li><?php echo $this->Html->link("Home","/users"); ?></li>
		<li>
			<?php echo $this->Html->link("Modules","javascript:void(0);"); ?>
			<ul>
				<li>
					<?php echo $this->Html->link("Facilities","javascript:void(0);"); ?>
					<ul>
						<li><?php echo $this->Html->link("Add New","/facilities/add"); ?></li>
						<li><?php echo $this->Html->link("List All","/facilities"); ?></li>
					</ul>
				</li>
				<li>
					<?php echo $this->Html->link("Places","javascript:void(0);"); ?>
					<ul>
						<li><?php echo $this->Html->link("Add New","/places/add"); ?></li>
						<li><?php echo $this->Html->link("List All","/places"); ?></li>
					</ul>
				</li>
				<li>
					<?php echo $this->Html->link("States","javascript:void(0);"); ?>
					<ul>
						<li><?php echo $this->Html->link("Add New","/states/add"); ?></li>
						<li><?php echo $this->Html->link("List All","/states"); ?></li>
					</ul>
				</li>
				<li>
					<?php echo $this->Html->link("Hotels","javascript:void(0);"); ?>
					<ul>
						<li><?php echo $this->Html->link("Add New","/hotels/add"); ?></li>
						<li><?php echo $this->Html->link("List All","/hotels"); ?></li>
					</ul>
				</li>
				<li>
					<?php echo $this->Html->link("Users","javascript:void(0);"); ?>
					<ul>
						<li><?php echo $this->Html->link("Add New","/users/add"); ?></li>
						<li><?php echo $this->Html->link("List All","/users"); ?></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><?php echo $this->Html->link("Log Out","/users/logout"); ?></li>
	</ul>
</div>