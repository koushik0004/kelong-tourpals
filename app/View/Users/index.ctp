<script type="text/javascript">
	function deleteRecord(id){
		var conf = confirm("Are Your Sure?");
		if(conf){
			window.location = "<?php echo $this->webroot; ?>users/delete/"+id;
		}
		return false;
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".bulk_action_check").click(function(){
			if($(this).is(":checked")){
				$(".item_id").attr("checked",true);
			}else{
				$(".item_id").removeAttr("checked");
			}
		});
		
		$(".item_id").click(function(){
			var all_checked_flag = true;
			
			$(".item_id").each(function(){
				if(!$(this).is(":checked")){
					all_checked_flag = false;
				}
			});
			if(all_checked_flag){
				$(".bulk_action_check").attr("checked",true);
			}else{
				$(".bulk_action_check").removeAttr("checked");
			}
		});
		
		$(".bulk_options_button, .bulk-action-submit").click(function(){
			var action = $(".bulk_options").val();
			switch( action ){
				case 'delete':
							$("#admin_panel_form").append('<input type="hidden" name="process_action" value="delete" /><input type="hidden" name="process_model" value="User" />').submit();
							break;
				default:
						
			}
		});
	});
</script>

<div class="grid-tools-wrap">
<div class="row">
    <div class="col-md-5 col-sm-5 col-xs-5">
        <div class="row">
			<div class="col-md-10 col-sm-10 col-xs-10">
          	<div class="form-group">
                <label for="CommonTopBulkAction">Actions</label>
                <?php 
                $bulk_opts = array(
                        'delete'=>'Delete',
                    );
                ?>
                <?php echo $this->Form->input('CommonTop.bulk_action', array('type'=>'select', 'class'=>'bulk_options bulk-action-picker', 'div'=>false, 'label'=>false, 'options'=>$bulk_opts, 'empty'=>'Bulk Actions')); ?>
                <?php echo $this->Form->input('Go', array('div'=>false, 'label'=>false, 'type'=>'button', 'class'=>'btn btn-default bulk-action-submit')); ?>
          	</div>
          	
            <!--<button type="submit" class="btn btn-default">Go</button>-->
            </div>
          	<div class="col-md-2 col-sm-2 col-xs-2">
            </div>
        </div>  
    </div>

	<div class="col-md-offset-6">
        <?php echo $this->Form->create('UserSearch', array('url'=>'/users/index/', 'class'=>'grid-search-form form-inline', 'autocomplete'=>'off')); ?>
			<label for="grid_column_id">Select Column</label>
            <?php 
				$col_opts = array(
					'id'=>'ID',
					'first_name'=>'First Name',
					'last_name'=>'Last Name',
					'email'=>'Email',
					'role'=>'Role',
					'active'=>'Active Users',
					'blocked'=>'Blocked Users'
				);
			?>
            <?php echo $this->Form->input('UserSearch.grid_column', array('type'=>'select', 'options'=>$col_opts, 'empty'=>'Active Users', 'id'=>'grid_column_id', 'class'=>'bulk-search-select', 'label'=>false, 'div'=>false, 'name'=>'grid_column', 'selected'=>$column));?>
			
           <?php echo $this->Form->input('UserSearch.search_text', array('type'=>'text', 'class'=>"grid-search-text form-control", 'placeholder'=>"type text to search", 'value'=>$search, 'label'=>false, 'div'=>false, 'name'=>'search_text')); ?>
            
            
			<?php echo $this->Form->input('Search', array('div'=>false, 'label'=>false, 'type'=>'button', 'class'=>'btn btn-default grid-search-button')); ?>
			<!--<input type="submit" value="search" class="grid-search-button" />-->
		<?php echo $this->Form->end(); ?>
		
	</div>
    
    <div class="row div-spacer">
    	<div class="col-md-offset-11">
        	<a href="<?php echo $this->webroot; ?>users/add" class="btn btn-default">Add New</a>
        </div>
    </div>
</div>	
</div>
<div class="grid-table ">
	<form id="admin_panel_form" action="<?php echo $this->webroot; ?>users/bulk_actions" method="post">
	<table class="table">
		<thead>
		<tr>
			<th><!--<input type="checkbox" class="bulk_action_check" />--></th>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Created</th>
			<th>Updated</th>
			<th><?php echo $this->Paginator->sort('isactive','Active'); ?></th>
			<th><?php echo $this->Paginator->sort('isdeleted','Deleted'); ?></th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php if(count($users) > 0): ?>
		<?php foreach($users as $item): ?>
		<tr>
			<td><input type="checkbox" class="item_id" name="item_id[]" value="<?php echo $item['User']['id']; ?>" /></td>
			<td><?php echo $item['User']['id']; ?></td>
			<td><?php echo $item['User']['first_name']; ?></td>
			<td><?php echo $item['User']['last_name']; ?></td>
			<td><?php echo $item['User']['email']; ?></td>
			<td><?php echo $item['User']['role']; ?></td>
			<td><?php echo $item['User']['created']; ?></td>
			<td><?php echo $item['User']['modified']; ?></td>
			<td><?php echo ($item['User']['isactive'] == 1 ? "Active" : "Blocked"); ?></td>
			<td><?php echo ($item['User']['isdeleted'] == 1 ? "Deleted" : "Not Deleted"); ?></td>
			<td class="action_column">
				<a href="<?php echo $this->webroot ?>users/edit/<?php echo $item['User']['id']; ?>">
					<img src="<?php echo $this->webroot; ?>img/admin/edit.png" title="edit" alt="edit" />
				</a>
				<a href="javascript:deleteRecord('<?php echo $item['User']['id']; ?>');">
					<img src="<?php echo $this->webroot; ?>img/admin/delete.png" title="delete" alt="delete" />
				</a>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
		<tr>
			<td class="empty-row" colspan="11">No records found!</td>
		</tr>
		<?php endif; ?>
		</tbody>
	</table>
	<?php 
		echo $this->Paginator->prev();
		echo $this->Paginator->numbers(); 
		echo $this->Paginator->next();
	?>
	</form>
</div>