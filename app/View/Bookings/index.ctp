
<script type="text/javascript">
	function deleteRecord(id){
		var conf = confirm("Are Your Sure?");
		if(conf){
			window.location = "<?php echo $this->webroot; ?>bookings/delete/"+id;
		}
		return false;
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".bulk_action_check").change(function(){
			var checkedStatus = $(this).is(":checked");
			$(".item_id").each(function(){
				var _self = $(this);
				(checkedStatus==true)?_self.attr('checked', true):_self.removeAttr('checked');
			});
			
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
							$("#admin_panel_form").append('<input type="hidden" name="process_action" value="delete" /><input type="hidden" name="process_model" value="Booking" />').submit();
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
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
          
          </div>
          
          <!--<button type="submit" class="btn btn-default">Go</button>-->
        </div>  
    </div>

	<div class="col-md-offset-6">
        	<?php echo $this->Form->create('BookingSearch', array('url'=>'/bookings/index/', 'class'=>'grid-search-form form-inline', 'autocomplete'=>'off')); ?>
			<label for="grid_column_id">Select Column</label>
            <?php 
				$col_opts = array(
					'Place.title'=>'Place',
					'Hotel.title'=>'Hotel Name',
					'Booking.service_charges'=>'Service Charges(value in %)',
					'Booking.sevice_tax'=>'Service Tax(value in %)',
					'active'=>'Active Bookings',
					'blocked'=>'Closed Bookings'
				);
			?>
            <?php $column = (isset($column) && !empty($column))?$column:''; ?>
            <?php echo $this->Form->input('BookingSearch.grid_column', array('type'=>'select', 'options'=>$col_opts, 'empty'=>'Active Bookings', 'id'=>'grid_column_id', 'class'=>'bulk-search-select', 'label'=>false, 'div'=>false, 'name'=>'grid_column', 'selected'=>$column));?>
			
            <?php $search = (isset($search) && !empty($search))?$search:''; ?>
			<?php echo $this->Form->input('BookingSearch.search_text', array('type'=>'text', 'class'=>"grid-search-text form-control", 'placeholder'=>"type text to search", 'value'=>$search, 'label'=>false, 'div'=>false, 'name'=>'search_text')); ?>
 
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
	<form id="admin_panel_form" action="<?php echo $this->webroot; ?>bookings/bulk_actions" method="post">
	<table class="table">
		<thead>
		<tr>
			<th><!--<input type="checkbox" class="bulk_action_check" />--></th>
			                <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('place_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('hotel_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('childrens'); ?></th>
                            <th><?php echo $this->Paginator->sort('adults'); ?></th>
                            <th><?php echo $this->Paginator->sort('check_in'); ?></th>
                            <th><?php echo $this->Paginator->sort('checkout'); ?></th>
                            <th><?php echo $this->Paginator->sort('no_of_days'); ?></th>
                            <th><?php echo $this->Paginator->sort('service_charges'); ?></th>
                            <th><?php echo $this->Paginator->sort('sevice_tax'); ?></th>
                            <?php /*<th><?php echo $this->Paginator->sort('other_taxes'); ?></th>
                            <th><?php echo $this->Paginator->sort('bank_charges'); ?></th>
                            <th><?php echo $this->Paginator->sort('courier_charges'); ?></th>
                            <th><?php echo $this->Paginator->sort('misc_charges'); ?></th>
                            <th><?php echo $this->Paginator->sort('extra_charges'); ?></th>
                            <th><?php echo $this->Paginator->sort('extra_bed_charges'); ?></th>*/ ?>
                            <th><?php echo $this->Paginator->sort('discount'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <?php /*<th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th><?php echo $this->Paginator->sort('isactive'); ?></th>*/ ?>
                            <th><?php echo $this->Paginator->sort('isdeleted', 'Active Booking'); ?></th>
            			<th>Action</th>
		</tr>
		</thead>
		<tbody>
        <?php if(count($bookings) > 0): ?>
<?php foreach ($bookings as $booking): ?>
	<tr>
<td><input type="checkbox" class="item_id" name="item_id[]" value="<?php echo $booking['Booking']['id']; ?>" /></td>
		<td><?php echo h($booking['Booking']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($booking['Place']['title'], array('controller' => 'places', 'action' => 'view', $booking['Place']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($booking['Hotel']['title'], array('controller' => 'hotels', 'action' => 'view', $booking['Hotel']['id'])); ?>
		</td>
		<td>
			<?php 
			$userDetailsList = $booking['User']['username'].ucwords(' ( '.$booking['User']['last_name'].', '.$booking['User']['first_name'].' )');
			echo $this->Html->link($userDetailsList, array('controller' => 'users', 'action' => 'edit', $booking['User']['id'])); ?>
		</td>
		<td><?php echo h($booking['Booking']['childrens']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['adults']); ?>&nbsp;</td>
		<td><?php echo h(date('d/m/Y', strtotime($booking['Booking']['check_in']))); ?>&nbsp;</td>
		<td><?php echo h(date('d/m/Y', strtotime($booking['Booking']['checkout']))); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['no_of_days']); ?>&nbsp;</td>
		<td><?php echo h($this->Number->precision($booking['Booking']['service_charges'], 2)); ?>&nbsp;</td>
		<td><?php echo h($this->Number->precision($booking['Booking']['sevice_tax'], 2)); ?>&nbsp;</td>
		<?php /*<td><?php echo h($booking['Booking']['other_taxes']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['bank_charges']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['courier_charges']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['misc_charges']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['extra_charges']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['extra_bed_charges']); ?>&nbsp;</td>*/ ?>
		<td><?php echo h($this->Number->precision($booking['Booking']['discount'], 2)); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['created']); ?>&nbsp;</td>
		<?php /*<td><?php echo h($booking['Booking']['modified']); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['isactive']); ?>&nbsp;</td>*/ ?>
		<td><?php echo ($booking['Booking']['isdeleted']==0)?"Active":"Completed"; ?>&nbsp;</td>
		<td class="actions action_column">
			<?php echo $this->Html->image("admin/edit.png", array("alt"=>"edit", "title"=>"Edit", "url"=>array('action' => 'edit', $booking['Booking']['id']))); ?>
            
            <?php echo $this->Html->image("admin/delete.png", array("alt"=>"Delete", "title"=>"Delete", "onclick"=>"DeleteRecord(event, this)", "url"=>array('action' => 'delete', $booking['Booking']['id']))); ?>
			<?php //echo $this->Form->postLink($this->Html->image("admin/delete.png", array('alt' => __('delete'), 'title'=>'Delete')), array('action' => 'delete', $booking['Booking']['id']), array('escape'=>FALSE, 'confirm'=>__('Are you sure you want to delete # %s?', $booking['Booking']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
				<td class="empty-row" colspan="24">No records found!</td>
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


