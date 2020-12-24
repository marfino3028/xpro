(function($) {
	$.alerts = {
		okButton: 'Yes',         // text for the OK button
		cancelButton: 'No',

		alert: function(message, title, callback) {
			if( title == null ) title = 'Alert';
			$.alerts.dialog(message, title, [$.alerts.okButton,$.alerts.cancelButton] , [callback], ['green-button','red-button']);
		},

		confirm: function(message, title, callback) {
			if( title == null ) title = 'Confirm';
			$.alerts.dialog(message, title, [$.alerts.okButton,$.alerts.cancelButton] , [callback], ['green-button','red-button']);
		},


		dialog: function(message, title, buttons, callbacks, buttonClasses) {
			$('.message-box').remove();
			if(!buttons)
			{
				buttons=[$.alerts.okButton];
			}

			$('body').append('<div style="display:none;"><div  class="message-box" id="MessageBox"><div class="message-box-title ui-widget-header "><h4>'+title+'</h4><a class="close-dialog ui-icon ui-icon-closethick" title="Close" id="messageBoxClose" href="#">close</a></div><div class="message-box-content">'+message+'</div><div class="message-box-buttons"></div></div></div>');
			$('#messageBoxClose').click(function(){
				removeModal($('#MessageBox'));
			});
			for(var i in buttons) {
				if(buttonClasses&&buttonClasses[i]) btnCls=buttonClasses[i];
				else btnCls='green-button';
				$('#MessageBox .message-box-buttons').append(' <button id="msgBoxBtn'+i+'" class="'+btnCls+'">'+buttons[i]+'</button>');
				if(callbacks&&callbacks[i])
					callback=callbacks[i];
				else  callback=function(){
					removeModal($('#MessageBox'));
				};

				$('#MessageBox #msgBoxBtn'+i).click(callback);
				$('#MessageBox #msgBoxBtn'+i).click(function(){
					removeModal($('#MessageBox'))
				});


			}
			$('#MessageBox .message-box-buttons').append('<div class="clear"></div>');
			$('#MessageBox').lightbox_me({
				modal: true
			});
		}
	}

	jAlert = function(message, title, callback) {
		$.alerts.alert(message, title, callback);
	}
	jConfirm = function(message, title, callback) {
		$.alerts.confirm(message, title, callback);
	};
	jDialog = function(message, title, buttons, callbacks) {
		$.alerts.dialog(message, title, buttons, callbacks);
	};
})(jQuery);