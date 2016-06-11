jQuery(document).ready(function($){
		var mainContentBody = $('#content');
		var checkArr = ['active', 'blocked', 'isdeletd', ''];
		var topSearchTextBox=$('input[name="search_text"]', mainContentBody);
		//console.log($.inArray($('#grid_column_id').val().trim(), checkArr));
		
		/*detecting edit or add page*/
		var _methodField = $('input[name="_method"]');
		/*detecting edit or add page*/
		
		if($('#grid_column_id').length>0)
			$.inArray($('#grid_column_id').val().trim(), checkArr)!==-1?topSearchTextBox.attr('readonly',true):topSearchTextBox.removeAttr('readonly');
		
		mainContentBody.on('change', '#grid_column_id', function(){
			var _self = $('#grid_column_id');
			
			console.log(_self.val());
			var searchTextBox = _self.closest('form').find('input[name="search_text"]');
			$.inArray($('#grid_column_id').val(), checkArr)!==-1?searchTextBox.attr('readonly',true):searchTextBox.removeAttr('readonly');
			$.inArray($('#grid_column_id').val(), checkArr)!==-1?searchTextBox.val(''):'';
		});
		
		if($('.bulk-action-picker').length>0){
			//bootstrap select all
			$('.bulk-action-picker').selectpicker({
				  //style: 'btn-info',
				  //size: 2
				  width: '66%'
			  });
		}
		if($('.bulk-search-select').length>0){
			$('.bulk-search-select').selectpicker({
				  width: '40%'
			  });
		}
		if($('.admin-add-edit-dropdown').length>0){
			$('.admin-add-edit-dropdown').selectpicker({
				  width: '40%'
			  });
		}
		if($('.admin-add-edit-dropdown-big').length>0){
			$('.admin-add-edit-dropdown-big').selectpicker({
				  width: '100%'
			  });
		}
		
		
		/*showing field errors during validations*/
		var getErrorDiv = $('div.alert-danger');
		var getFormGroup = $('div.form-group');
		getFormGroup.each(function(){
				var _self = $(this);
				var getErrorDiv = $('div.alert-danger', _self);
				if(getErrorDiv.length>0){
					_self.addClass('has-error');
				}
				else{
					_self.removeClass('has-error');
				}
			});
		/*showing field errors during validations*/
		
		/*datepicker section*/
		var allDatePickerFields = $('input.date-field');
		var _dateOpions = {
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd/mm/yy',
				minDate:'0',
			};
		var _maskingOption = {
				placeholder: 'dd/mm/yyyy'
			};
		allDatePickerFields.inputmask("d/m/y", _maskingOption);
		allDatePickerFields.datepicker(_dateOpions);
		
		
		/*datepicker section*/
		
		/*decimal points and currency validations*/
		var _decimalForm = {
			 radixPoint:".", 
			 groupSeparator: ",", 
			 digits: 2,
			 autoGroup: true,
			 placeholder: '0.00',
			 //prefix: '$'
		 };
		 var _allDecimalInputs = $('input.decimal-input');
		 _allDecimalInputs.inputmask('decimal', _decimalForm).on('blur', function(){
			 		var _self = $(this);
					var setData = CompleteMaskInFormat(_self);
					_self.val(setData);
			 });
		/*decimal points and currency validations*/
		
		/*-- delete code for admin listing --*/
		$(".listing-delete-anchor").on("click",function(){
			var conf = window.confirm("Are you sure?");
			var loc = $(this).next(".listing-delete-location");
			if(conf){
				window.location = loc;
			}
		});
		
	});
	
var DeleteRecord = function(e, self){
	var _self = $(self);
	e.preventDefault();
	var conf = window.confirm("Are you sure to delete?");
	var url = _self.parent('a').attr('href');
	_self.parent('a').removeAttr('click');
	if(conf){
		window.location.href = url;
	}
	return false;
};
var CompleteMaskInFormat = function(self){
	var radixPoint = '.';
	var addedDigit = '00';
	var zeros = '';
	if(self.val().trim().indexOf(radixPoint) >= 0){
		var decimalPortion = self.val().trim().split(radixPoint)[1];
		if(decimalPortion.length==2)
			return self.val().trim();
		if(decimalPortion.length<2 && decimalPortion.length!=2){
			for(var i=0; i<2-decimalPortion.length; i++)
				zeros += '0';
			addedDigit = decimalPortion+zeros;
		}
	}
	return self.val().trim().split(radixPoint)[0]+'.'+addedDigit;
};