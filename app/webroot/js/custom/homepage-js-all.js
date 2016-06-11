var WEBROOT = $('#WEBROOT').val();

var ValidateForm = function(_formObj){
	var errorCntr = 0;
	return errorCntr;
}

var LoadRequiredTemplate = function(self){
	var _self = self;
	var _modal= $('#login-registration-modal');
	//console.log(_self.attr('href'));
	$.ajax({
		url: _self.attr('href'),
		type: 'POST',
		dataType: 'text',
		cache:false,
		data: {},
		beforeSend: function( xhr ) {
			//xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
		  },
		success: function(data){
			$('div.modal-content', _modal).html(data);
			_modal.modal('show');
		},
	});
};

var LoginClientUsers = function(self, e){
	e.preventDefault();
	var _self = $(self);
	var getForm = _self.closest('form');
	var _validateForms = ValidateForm(getForm);
	if(_validateForms<=0){
		$.ajax({
			url: getForm.attr('action'),
			type: 'POST',
			dataType: 'text',
			cache:false,
			data: getForm.serializeArray(),
			beforeSend: function( xhr ) {
				//xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
			  },
			success: function(data){
				//$('div.modal-content', _modal).html(data);
				//_modal.modal('show');
			},
		});
	}
	
};
var AddClientUsers = function(self, e){
	e.preventDefault();
	var _self = $(self);
	var getForm = _self.closest('form');
	var _validateForms = ValidateForm(getForm);
	
	if(_validateForms<=0){
		$.ajax({
			url: getForm.attr('action'),
			type: 'POST',
			dataType: 'text',
			cache:false,
			data: getForm.serializeArray(),
			beforeSend: function( xhr ) {
				//xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
			  },
			success: function(data){
				//$('div.modal-content', _modal).html(data);
				//_modal.modal('show');
			},
		});
	}
	
	
};

$(document).ready(function(){
		var loginBtn = $('#client-login-btn');
		var registerBtn = $('#client-register-btn');
		
		loginBtn.on('click', function(e){
				e.preventDefault();
				var self = $(this);
				LoadRequiredTemplate(self);
			});
		registerBtn.on('click', function(e){
				e.preventDefault();
				var self = $(this);
				LoadRequiredTemplate(self);
			});
	});