<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row">
<h3><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h3>
<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('novalidate' => true,
					'inputDefaults'=>array(
						'error' => array('attributes' => array('wrap' => 'div', 'class'=>'alert alert-danger'))
					)
				)); ?>\n"; ?>
<?php echo "<?php echo \$this->Session->flash(); ?>\n"; ?>
<?php
		$fieldCounter = 0;
		if (strpos($action, 'edit') !== false) {
			echo "\t<?php echo \$this->Form->input('{$primaryKey}', array('type'=>'hidden', 'div'=>false)); ?>\n";
		}
		echo "<div class=\"row\">\n";
		foreach ($fields as $field) {
			if (!in_array($field, array('created', 'modified', 'updated', 'isdeleted', 'isactive', $primaryKey))) {
				if($fieldCounter%2==0 && $fieldCounter!=0){
					echo "</div>\n";
					echo "<div class=\"row\">\n";
				}
				echo "<div class=\"col-sm-6 col-md-6 col-xs-6\">\n";
				echo "\t<div class=\"form-group\">\n";
				echo "\t\t<?php echo \$this->Form->input('{$field}', array('type'=>'text', 'class'=>'form-control', 'div'=>false)); ?>\n";
				echo "\t</div>\n";
				echo "</div>\n";
				$fieldCounter++ ;
			}
		}
		echo "</div>\n";
		
		
		
		if (!empty($associations['hasAndBelongsToMany'])) {
			echo "<div class=\"row\">\n";
			$fieldCounter = 0;
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				if($fieldCounter%2==0 && $fieldCounter!=0){
					echo "</div>\n";
					echo "<div class=\"row\">\n";
				}
				echo "<div class=\"col-sm-6 col-md-6 col-xs-6\">\n";
				echo "\t<div class=\"form-group\">\n";
				echo "\t\t<?php echo \$this->Form->input('{$assocName}', array('empty'=>'-- Please Select --', 'class'=>'admin-add-edit-dropdown-big', 'div'=>false)); ?>\n";
				echo "\t</div>\n";
				echo "</div>\n";
				$fieldCounter++ ;
			}
			echo "</div>\n";
		}
		
		
		
		
		
		echo "<div class=\"row\">\n";
		foreach ($fields as $field) {
			if(in_array($field, array('isdeleted', 'isactive'))) {
				echo "<div class=\"col-sm-3 col-md-3 col-xs-3\">\n";
				echo "\t<div class=\"form-group\">\n";
				echo "\t\t<?php echo \$this->Form->input('{$field}', array('type'=>'select', 'class'=>'admin-add-edit-dropdown-big', 'div'=>false, 'options'=>array(0=>'No',1=>'Yes'), 'selected'=>".(($field=='isdeleted')?'0':'1').")); ?>\n";
				echo "\t</div>\n";
				echo "</div>\n";
			}
		}
		echo "</div>\n";
?>
<?php echo "
<div class=\"row\">\n
	<div class=\"col-sm-offset-5 col-md-offset-5 col-xs-offset-5\">\n
    	<?php echo \t\$this->Form->submit(\"Add\", array(\"div\"=>false, \"label\"=>false, \"class\"=>\"btn btn-primary\"));?>\n
		
        <?php echo \t\$this->Html->link(\"Cancel\",array(\"action\"=>\"index\"), array(\"class\"=>\"btn btn-default\"));?>\n
    </div>\n
</div>\n"; 
?>
<?php echo "<?php echo \t\$this->Form->end();?>\n"; ?>
