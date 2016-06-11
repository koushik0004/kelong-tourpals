
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
        <div class="form-inline">
          <div class="form-group">
            <label for="CommonTopBulkAction">Actions</label>
            <?php 
			$bulk_opts = array(
					'delete'=>'Delete',
				);
			?>
            <?php echo $this->Form->input('CommonTop.bulk_action', array('type'=>'select', 'class'=>'bulk_options bulk-action-picker', 'div'=>false, 'label'=>false, 'options'=>$bulk_opts, 'empty'=>'Bulk Actions')); ?>
          </div>
          <?php echo $this->Form->input('Go', array('div'=>false, 'label'=>false, 'type'=>'button', 'class'=>'btn btn-default bulk-action-submit')); ?>
          <!--<button type="submit" class="btn btn-default">Go</button>-->
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
            <?php $column = (isset($column) && !empty($column))?$column:''; ?>
            <?php echo $this->Form->input('UserSearch.grid_column', array('type'=>'select', 'options'=>$col_opts, 'empty'=>'Active Users', 'id'=>'grid_column_id', 'class'=>'bulk-search-select', 'label'=>false, 'div'=>false, 'name'=>'grid_column', 'selected'=>$column));?>
			
            <?php $search = (isset($search) && !empty($search))?$search:''; ?>
			<?php echo $this->Form->input('UserSearch.search_text', array('type'=>'text', 'class'=>"grid-search-text form-control", 'placeholder'=>"type text to search", 'value'=>$search, 'label'=>false, 'div'=>false, 'name'=>'search_text')); ?>
 
			<?php echo $this->Form->input('Search', array('div'=>false, 'label'=>false, 'type'=>'button', 'class'=>'btn btn-default grid-search-button')); ?>
			<!--<input type="submit" value="search" class="grid-search-button" />-->
		<?php echo $this->Form->end(); ?>
		
	</div>
    
    <div class="row div-spacer">
    	<div class="col-md-offset-11">
        				<?php echo $this->Html->link(__('ADD NEW'), array('action' => 'add'), array('class'=>"btn btn-default")); ?>
        </div>
    </div>
</div>	
</div>
<div class="grid-table">
	<form id="admin_panel_form" action="<?php echo $this->webroot; ?>users/bulk_actions" method="post">
	<table class="table">
		<thead>
		<tr>
			<th><input type="checkbox" class="bulk_action_check" /></th>
			                <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('booking_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('room_details_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th><?php echo $this->Paginator->sort('isactive'); ?></th>
                            <th><?php echo $this->Paginator->sort('isdeleted'); ?></th>
            			<th>Action</th>
		</tr>
		</thead>
		<tbody>
        <?php if(count($bookingsRoomDetails) > 0): ?>
<?php foreach ($bookingsRoomDetails as $bookingsRoomDetail): ?>
	<tr>
<td><input type="checkbox" class="item_id" name="item_id[]" value="<?php echo $bookingsRoomDetail['BookingsRoomDetail']['id']; ?>" /></td>
		<td><?php echo h($bookingsRoomDetail['BookingsRoomDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bookingsRoomDetail['Booking']['id'], array('controller' => 'bookings', 'action' => 'view', $bookingsRoomDetail['Booking']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($bookingsRoomDetail['RoomDetails']['id'], array('controller' => 'room_details', 'action' => 'view', $bookingsRoomDetail['RoomDetails']['id'])); ?>
		</td>
		<td><?php echo h($bookingsRoomDetail['BookingsRoomDetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($bookingsRoomDetail['BookingsRoomDetail']['modified']); ?>&nbsp;</td>
		<td><?php echo h($bookingsRoomDetail['BookingsRoomDetail']['isactive']); ?>&nbsp;</td>
		<td><?php echo h($bookingsRoomDetail['BookingsRoomDetail']['isdeleted']); ?>&nbsp;</td>
		<td class="actions action_column">
			<?php echo $this->Html->image("admin/edit.png", array("alt"=>"edit", "title"=>"Edit", "url"=>array('action' => 'edit', $bookingsRoomDetail['BookingsRoomDetail']['id']))); ?>
			<?php echo $this->Form->postLink($this->Html->image("admin/delete.png", array('alt' => __('delete'), 'title'=>'Delete')), array('action' => 'delete', $bookingsRoomDetail['BookingsRoomDetail']['id']), array('escape'=>FALSE, 'confirm'=>__('Are you sure you want to delete # %s?', $bookingsRoomDetail['BookingsRoomDetail']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
				<td class="empty-row" colspan="9">No records found!</td>
			</tr><?php endif; ?>
		</tbody>
	</table>
	</form>
    <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>


