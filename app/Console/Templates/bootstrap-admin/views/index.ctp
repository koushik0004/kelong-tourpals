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
<?php echo "
<script type=\"text/javascript\">
	function deleteRecord(id){
		var conf = confirm(\"Are Your Sure?\");
		if(conf){
			window.location = \"<?php echo \$this->webroot; ?>{$pluralVar}/delete/\"+id;
		}
		return false;
	}
</script>\n";
?>
<?php echo "
<script type=\"text/javascript\">
	$(document).ready(function(){
		$(\".bulk_action_check\").click(function(){
			if($(this).is(\":checked\")){
				$(\".item_id\").attr(\"checked\",true);
			}else{
				$(\".item_id\").removeAttr(\"checked\");
			}
		});
		
		$(\".item_id\").click(function(){
			var all_checked_flag = true;
			
			$(\".item_id\").each(function(){
				if(!$(this).is(\":checked\")){
					all_checked_flag = false;
				}
			});
			if(all_checked_flag){
				$(\".bulk_action_check\").attr(\"checked\",true);
			}else{
				$(\".bulk_action_check\").removeAttr(\"checked\");
			}
		});
		
		$(\".bulk_options_button, .bulk-action-submit\").click(function(){
			var action = $(\".bulk_options\").val();
			switch( action ){
				case 'delete':
							$(\"#admin_panel_form\").append('<input type=\"hidden\" name=\"process_action\" value=\"delete\" /><input type=\"hidden\" name=\"process_model\" value=\"{$modelClass}\" />').submit();
							break;
				default:
						
			}
		});
	});
</script>";
?>
<div class="grid-tools-wrap">
<div class="row">
    <div class="col-md-5 col-sm-5 col-xs-5">
         <div class="row">
          <div class="col-md-10 col-sm-10 col-xs-10">
              <div class="form-group">
                <label for="CommonTopBulkAction">Actions</label>
                <?php echo "<?php 
                \$bulk_opts = array(
                        'delete'=>'Delete',
                    );
                ?>\n"; ?>
                <?php echo "<?php echo \$this->Form->input('CommonTop.bulk_action', array('type'=>'select', 'class'=>'bulk_options bulk-action-picker', 'div'=>false, 'label'=>false, 'options'=>\$bulk_opts, 'empty'=>'Bulk Actions')); ?>\n"; ?>
                <?php echo "<?php echo \$this->Form->input('Go', array('div'=>false, 'label'=>false, 'type'=>'button', 'class'=>'btn btn-default bulk-action-submit')); ?>\n" ?>
          <?php echo "<!--<button type=\"submit\" class=\"btn btn-default\">Go</button>-->\n"; ?>
              </div>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2"></div>
          
        </div>  
    </div>

	<div class="col-md-offset-6">
        	<?php echo "<?php echo \$this->Form->create('{$modelClass}Search', array('url'=>'/{$pluralVar}/index/', 'class'=>'grid-search-form form-inline', 'autocomplete'=>'off')); ?>\n" ?>
			<label for="grid_column_id">Select Column</label>
            <?php
			$exclude_arr = array('id', 'created', 'updated');
			echo "<?php 
				\$col_opts = array(\n";
				foreach ($fields as $field) {
					if(!in_array($field, $exclude_arr))
						echo "'".$field."'=>'".Inflector::humanize($field)."', \n";
				}
				echo ");
			?>\n"; ?>
            <?php echo "<?php \$column = (isset(\$column) && !empty(\$column))?\$column:''; ?>\n"; ?>
            <?php echo "<?php echo \$this->Form->input('UserSearch.grid_column', array('type'=>'select', 'options'=>\$col_opts, 'empty'=>'Active {$pluralVar}', 'id'=>'grid_column_id', 'class'=>'bulk-search-select', 'label'=>false, 'div'=>false, 'name'=>'grid_column', 'selected'=>\$column));?>\n"; ?>
			
            <?php echo "<?php \$search = (isset(\$search) && !empty(\$search))?\$search:''; ?>\n"; ?>
			<?php echo "<?php echo \$this->Form->input('UserSearch.search_text', array('type'=>'text', 'class'=>\"grid-search-text form-control\", 'placeholder'=>\"type text to search\", 'value'=>\$search, 'label'=>false, 'div'=>false, 'name'=>'search_text')); ?>\n"; ?> 
			<?php echo "<?php echo \$this->Form->input('Search', array('div'=>false, 'label'=>false, 'type'=>'button', 'class'=>'btn btn-default grid-search-button')); ?>\n"; ?>
			<?php echo "<!--<input type=\"submit\" value=\"search\" class=\"grid-search-button\" />-->\n"; ?>
		<?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>
		
	</div>
    
    <div class="row div-spacer">
    	<div class="col-md-offset-11">
        	<?php echo "\t\t\t<?php echo \$this->Html->link(__('ADD NEW'), array('action' => 'add'), array('class'=>\"btn btn-default\")); ?>\n"; ?>
        </div>
    </div>
</div>	
</div>
<div class="grid-table">
	<form id="admin_panel_form" action="<?php echo "<?php echo \$this->webroot; ?>{$pluralVar}/bulk_actions"; ?>" method="post">
	<table class="table">
		<thead>
		<tr>
			<th><!--<input type="checkbox" class="bulk_action_check" />--></th>
			<?php foreach ($fields as $field): ?>
                <th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
            <?php endforeach; ?>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
        <?php
		echo "<?php if(count(\${$pluralVar}) > 0): ?>\n";
		echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
		echo "\t<tr>\n";
		echo "<td><input type=\"checkbox\" class=\"item_id\" name=\"item_id[]\" value=\"<?php echo \${$singularVar}['{$modelClass}']['{$primaryKey}']; ?>\" /></td>\n";
			foreach ($fields as $field) {
				$isKey = false;
				if (!empty($associations['belongsTo'])) {
					foreach ($associations['belongsTo'] as $alias => $details) {
						if ($field === $details['foreignKey']) {
							$isKey = true;
							echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
							break;
						}
					}
				}
				if ($isKey !== true) {
					echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
				}
			}
	
			echo "\t\t<td class=\"actions action_column\">\n";
			echo "\t\t\t<?php echo \$this->Html->image(\"admin/edit.png\", array(\"alt\"=>\"edit\", \"title\"=>\"Edit\", \"url\"=>array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']))); ?>\n";
			
			echo "\t\t\t<?php echo \$this->Html->image(\"admin/delete.png\", array(\"alt\"=>\"Delete\", \"title\"=>\"Delete\", \"onclick\"=>\"DeleteRecord(event, this)\", \"url\"=>array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']))); ?>\n";
			
			/*echo "\t\t\t<?php echo \$this->Form->postLink(\$this->Html->image(\"admin/delete.png\", array('alt' => __('delete'), 'title'=>'Delete')), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape'=>FALSE, 'confirm'=>__('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']))); ?>\n";*/
			echo "\t\t</td>\n";
		echo "\t</tr>\n";
	
		echo "<?php endforeach; ?>\n";
		echo "<?php else: ?>\n";
		echo "<tr>
				<td class=\"empty-row\" colspan=\"".(count($fields)+2)."\">No records found!</td>
			</tr>";
		echo "<?php endif; ?>\n";
		?>
		</tbody>
	</table>
	</form>
    <p>
	<?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>"; ?>
	</p>
	<div class="paging">
	<?php
		echo "<?php\n";
		echo "\t\techo \$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));\n";
		echo "\t\techo \$this->Paginator->numbers(array('separator' => ''));\n";
		echo "\t\techo \$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));\n";
		echo "\t?>\n";
	?>
	</div>
</div>


