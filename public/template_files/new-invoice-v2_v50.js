var itemsColspan=4;
var loaded_uploaded_doc=0;
var lastItemIndex = 0;
var lastReminderIndex = 0;
var timeoutID;
var baseItemRow;
var baseReminderRow;
var baseDocumentRow;
var documentList;
var lastDocumentIndex = 0 ;
var baseItemIndex;
var baseReminderIndex;
var lastFieldIndex = 0;
var cuCh = 0;
var group_price_id = 0;
var frame = null;
var ajaxUrl;
var totalValue=0;
var used_clients=[];
var lastTaxfocus=false;
var client_faddress='';
var columns={"col_1":'name',"col_2":'description',"col_3":'',"col_4":'',"col_5":''}
var org_columns=jQuery.extend({}, columns);
var saj=0;
var aps='1';
var ifram_css='calc(100vh - 55px)';

$(function(){
	
        $('.MoreFieldsListDropDown').live('click',function(event){
            $('.MoreField', '#MoreFieldsList').click();
        });
	$('.add_as_newclient').live('click',function(event){
		$('#ClientData').append('<input name="data[Invoice][client_skip_email]" id="ClientSkipEmail" value="1" type="hidden">');
		$('#SaveClient').trigger('click');
	});
		$('.Update_Existed_Client').live('click',function(event){
			
			ajaxUrl=$('.Update_Existed_Client').data('data-url');
			
			$('#ClientID').val($('.Update_Existed_Client').data('id'));
			$('#InvoiceClientId').val($('.Update_Existed_Client').data('id'));
		$('#SaveClient').trigger('click');
	});
	
	if($('#ClientData .form-error').length>0){ 
	$('#ClientData').show();
	}
	$('a').attr('tabindex', -1);
	$('.attach-invoice-document').live('click',function(event){
		event.preventDefault();
//		if ($('.itemRow', '#DocumentList').length >= 10){
//			jAlert(__('You can add up to 10 documents only'), __('Documents limit'));
//			return false;
//		}
		document_id = $('#doc').val();
		if(document_id == ''){
			$('#InvoiceDoc').focus();
			return false;
		}
                load_doc(document_id);
                return  false;
		$('.empty-row', '#DocumentList').hide();
		if (lastDocumentIndex == 0 && $('.itemRow', '#DocumentList').length == 0){
			lastDocumentIndex = 0;
		} else {
			++lastDocumentIndex;
		}
		var newRow = baseDocumentRow.replace(/0/g, lastDocumentIndex );
		$('.invoice_docs_div').append(newRow);
		lastDoc = $('#DocumentList tr.itemRow:last');
		$('a.preview' , lastDoc).attr('href',documentList[document_id].file_full_path);
		$('span.document-title' , lastDoc).attr('rel', 'doument-'+document_id).html(documentList[document_id].title);
		$('#InvoiceDocument'+lastDocumentIndex+'DocumentId').val(document_id);
		
		//$(".attach-document option[value='"+document_id+"']").remove();
		return false;
	});

	$(document).click(function(evt){
		
		if (!$(evt.target).hasClass('item-arrow')){
			
			if($(evt.target).hasClass('item_name') && $(evt.target).attr('readonly')){
				return;
			}
			
		if($('#InvoiceProducts').data('visible')==true){
			list_products('');
			$('#search_product').val('').focus();
			}
			$('#InvoiceProducts').hide().data('visible', false);
		}
		
		if (! ($(evt.target).hasClass('tax-arrow') || $(evt.target).hasClass('item-tax-display') || $(evt.target).hasClass('tax-link'))){
			$('#TaxList').hide().data('visible', false);
		}
		if (!$(evt.target).hasClass('select-action-arrow')){
			$('.sub-actions').hide().data('visible', false);
		}
	});

	$('.removeDocument').live('click' , function(event){
            
		event.preventDefault();
                $id=$(this).attr('id');
                $('#invoice-doc-'+$id).remove();
                return;
		tr_obj = $(this).parents('tr');
		document_id = $('span.document-title' , tr_obj).attr('rel').replace('doument-' , '');
		tr_obj.remove();
		//var option = '<option value="'+document_id+'">'+documentList[document_id].title+'</option>';
		//$(".attach-document").append(option);
		if ($('.itemRow', '#DocumentList').length == 0){
			$('.empty-row', '#DocumentList').show();
		}
		return false;
	});

	if ($('.itemRow', '#DocumentList').length == 0){
		$('.empty-row', '#DocumentList').show();
	} else {
		$('.empty-row', '#DocumentList').hide();
	}
	/// Terms and conditions checkbox
	if(!$('#TextCheckbox').attr('checked')){
		$('#TextTerms').hide();
	}
	$('#TextCheckbox').change(function(){
		if($(this).attr('checked')){
			$('#TextTerms').show();
		}else{
			$('#TextTerms').hide();
		}
	});
	$('#discount_type').change(function(){
		
		if($(this).val()=='percent'){
			$('#InvoiceDiscountAmount').hide().val('');
			$('#InvoiceDiscount').show().val('').focus();   
			
		}else{
			$('#InvoiceDiscount').hide().val('');
			$('#InvoiceDiscountAmount').show().val('').focus();
		}
	});
	if (!$('#InvoiceRequiredTermsFile').attr('checked')){
		$('#FileTerms').hide();
	}
	$('#InvoiceRequiredTermsFile').change(function(){
		if($(this).attr('checked')){
			$('#FileTerms').show();
		}else{
			$('#FileTerms').hide();
		}
	});

	
	baseItemRow = $('#listing_table tr.itemRow:first').html();
	if ( typeof baseItemRow !== 'undefined'){
            baseItemIndex = $('.item_name', baseItemRow).attr('id').replace(/\D/g, '');
            baseReminderIndex = $('.item_name', baseItemRow).attr('id').replace(/\D/g, '');
            setFirstLastNotActive('#listing_table');
            setFirstLastNotActive('#InvoiceCustomFields');
        }

	// ---------------------------
	$('.add-reminder').bind('click',function(e){
		if ($('.itemRow', '#RemindersList').length >= 10){
			jAlert(__('You can add up to 10 reminders only'), __('Reminders limit'));
			return false;
		}

		$('.empty-row', '#RemindersList').hide();
		lastReminderIndex = 0;
		$('.itemRow', '#RemindersList').each(function(){
			var idx = string2number($(':input:first', this).attr('id').replace(/\D/g, ''));
			if (idx > lastReminderIndex){
				lastReminderIndex = idx;
			}
		});

		if (lastReminderIndex == 0 && $('.itemRow', '#RemindersList').length == 0){
			lastReminderIndex = 0;
		} else {
			++lastReminderIndex;
		}


		$('table#RemindersList').append(baseReminderRow);
		lastRow = $('#RemindersList tr.itemRow:last');

		$(':input', lastRow).each(function(){
			this.id = this.id.replace(baseItemIndex, lastReminderIndex);
			this.name = this.name.replace(baseItemIndex, lastReminderIndex);
			$(this).val('');
		});

		$(':input'. lastRow).removeClass('form-error');
		$('.error-message', lastRow).remove();
		$('a', lastRow).attr('rel', lastReminderIndex);
		return false;
	});
	// ------------------------
	// Remove Item
	$('.removeReminder', '#RemindersList').live('click', function(){
		$(this).parents('tr').remove();
		if ($('.itemRow', '#RemindersList').length == 0){
			$('.empty-row', '#RemindersList').show();
		}
		return false;
	});
	if ($('.itemRow', '#RemindersList').length == 0){
		$('.empty-row', '#RemindersList').show();
	} else {
		$('.empty-row', '#RemindersList').hide();
	}
	// -------------------------
	// Add Item
	$('#AddItem').bind('click',function(e,manual){
		e.preventDefault();
		lastItemIndex = 0;

		$('tr.itemRow', '#listing_table').each(function(){
			var idx = string2number($(':input:first', this).attr('id').replace(/\D/g, ''));
			if (idx > lastItemIndex){
				lastItemIndex = idx;
			}
		});
		++lastItemIndex;
		$('.itemRow:last', '#listing_table').after('<tr class="itemRow movable" style="display:none;">' + baseItemRow + '</tr>');
		
		var lastRow = $('tr.itemRow:last', '#listing_table');
		$(':input', lastRow).each(function(){
			this.id = this.id.replace(baseItemIndex, lastItemIndex);
			this.name = this.name.replace(baseItemIndex, lastItemIndex);
			$(this).val('');
		}).removeClass('form-error');

		$('.error-message', lastRow).remove();
		$('a', lastRow).attr('rel', lastItemIndex);
		$('.qty', lastRow).val('1');
		$('td.subtotal', lastRow).text('0.00');
		beforelastRow=lastRow.prev();
		$('.move-table .sortable-arrows .ArrawDown', beforelastRow).removeClass('move-down-notactive').removeClass('move-down').addClass('move-down');
		setFirstLastNotActive('#listing_table');
		$(lastRow).show();
		$('textarea.resizable',lastRow).elastic({
			callback:function(textarea){
				resizeItem(textarea);
			}
		});
                
		$('.item_name', lastRow).removeAttr('readonly');
		if(manual!==true){
		$('.item_name', lastRow).focus();
		}
                if ( typeof enable_multi_units !== 'undefined' && enable_multi_units == 1 && $('.multi_units' , lastRow).length > 0  ){
                    $('.multi_units' , lastRow).remove()
                }
                $('.item-qty' , lastRow).attr("data-factor" , "")
                $('.item-qty' , lastRow).attr("data-factor_name" , "")
		updateTaxColumnsView();
                lock_selection ( lastRow ) ;
                if(!empty(ItemColumns)) show_hide_columns();
                
	}).attr('tabindex', 21);
	// ------------------------
	// Remove Item
	$('.removeItem', '#listing_table').live('click', function(){

		if ($('tr.itemRow', '#listing_table').length > 1){
			$(this).parents('tr').remove();
			setFirstLastNotActive('#listing_table');
			calculateTotals();
		}
		else
		{
			$(this).parents('tr').find('input, select, textarea').val('').removeAttr('readonly');
                        lock_selection ( $(this).parents('tr') ) ;
			calculateTotals();
		}

		return false;
	});
	// for tabs
	$('.tabs-buttons li').click(function(e){
		var rel = $(this).attr('rel');

		if($(rel).hasClass('hidden')){
			activateTab(rel);
		} else{
			deactivateTabs();
		}

		e.preventDefault();
	});

	$('textarea.resizable', '#listing_table').elastic({
		callback:resizeItem
	});
	// -------------------------
	// for arrows in items table

	$('.sortable-arrows .move-down', '#listing_table').live('click',function(e){
		console.log('Down');
		var current_tr =  $(this).parents('tr');
		
		var next_element = $(this).parents('tr').next('tr');
				
		var next_name = [];
		next_element.find("input,select,textarea").each(function(){
			//console.log($(this).attr('name'));
		next_name.push($(this).attr('name'));
		
		});
			//console.log('next_name');
		//console.log(next_name);
		//console.log('current_tr');
		//console.log(current_tr.find("input,select,textarea").attr('name'));
		var current_name = [];
		current_tr.find("input,select,textarea").each(function(){
			console.log($(this).attr('name'));
		current_name.push($(this).attr('name'));
		
		});
			console.log('current_name');
		//console.log(current_name);
	
		
		current_tr.remove();
		//current_tr=current_tr.html();
		
		next_element.after(current_tr);
		
		setNotActiveClass($(this).parents('.sortable-arrows'));
		setNotActiveClass(next_element.find('.sortable-arrows'));
		$('textarea.resizable', '#listing_table').elastic({
			callback: resizeItem
		});
		
		next_name.forEach(function( i,k ) {
			console.log('whaaaaaaat');
			console.log(i);
			console.log(current_name[k]);
			$('#listing_table').find('*[name="'+current_name[k]+'"]').prop('name','##'+i);
			$('#listing_table').find('*[name="'+i+'"]').prop('name',current_name[k]);
			$('#listing_table').find('*[name="'+'##'+i+'"]').prop('name',i);
			//$('#listing_table').html($('#listing_table').html().replace(current_name[k],'##'+i));
			
		}); 

		
		e.preventDefault();
		
		
		recalcauto();
	});
	
	
	// ----------------------
	$('.sortable-arrows .move-up', '#listing_table').live('click',function(e){
		console.log('Up');
		var current_tr =  $(this).parents('tr');
		var prev_element = $(this).parents('tr').prev('tr');
		current_tr.remove();
		prev_element.before(current_tr);

		setNotActiveClass($(this).parents('.sortable-arrows'));
		setNotActiveClass(prev_element.find('.sortable-arrows'));
		$('textarea.resizable', '#listing_table').elastic({
			callback:resizeItem
		});

var current_name = [];
		current_tr.find("input,select,textarea").each(function(){
			console.log($(this).attr('name'));
		current_name.push($(this).attr('name'));
		
		});

		
var next_name = [];
		prev_element.find("input,select,textarea").each(function(){
			//console.log($(this).attr('name'));
		next_name.push($(this).attr('name'));
		
		});		
	next_name.forEach(function( i,k ) {
			console.log('whaaaaaaat');
			console.log(i);
			console.log(current_name[k]);
			$('#listing_table').find('*[name="'+current_name[k]+'"]').prop('name','##'+i);
			$('#listing_table').find('*[name="'+i+'"]').prop('name',current_name[k]);
			$('#listing_table').find('*[name="'+'##'+i+'"]').prop('name',i);
			//$('#listing_table').html($('#listing_table').html().replace(current_name[k],'##'+i));
			
		});		
		
		recalcauto();
		e.preventDefault();
	});
	// ----------------------
	$('.move-up-notactive,.move-down-notactive').live('click',function(e){
		e.preventDefault();
		recalcauto();
	});
	// -----------------------
	$('tr.itemRow td.td_editable').live('click',function(){
		if (!$(this).hasClass('select-item')){
			$(this).removeClass('edit-itemhover');
			$('.edit-item').removeClass('edit-item');
			$(this).addClass('edit-item');
			$(this).find('.editable-input').focus();
		}
	});
	// -----------------------
	$('td .editable-input').live('focus',function(){
		$(this).parents('td').removeClass('edit-itemhover');
		$(this).parents('td').addClass('edit-item');
	}).live('blur', function(){
		$(this).parents('td').removeClass('edit-itemhover');
		$(this).parents('td').removeClass('edit-item');
	});
	// -----------------------
	
	// -----------------------
	$('td.td_editable').live('mouseover',function(){
		$(this).addClass('edit-itemhover');
	}).live('mouseout',function(){
		$(this).removeClass('edit-itemhover');
	});
	// -----------------------
	
	
	function setNotActiveClass(element){
		var upNotActive = element.find('.move-up-notactive');
		if(upNotActive.length){
			upNotActive.removeClass('move-up-notactive').addClass('move-up');
		}

		var downNotActive = element.find('.move-down-notactive');
		if(downNotActive.length){
			downNotActive.removeClass('move-down-notactive').addClass('move-down');
		}

		var parent = element.parents('tr');
		if(!parent.prev('tr.movable').length){
			element.find('.move-up').removeClass('move-up').addClass('move-up-notactive');
		}

		if(!parent.next('tr.movable').length){
			element.find('.move-down').removeClass('move-down').addClass('move-down-notactive');
		}
	}
	// -------------------------
	function setFirstLastNotActive(container){
		$('.movable:first .ArrawUp',container).removeClass('move-up').removeClass('move-up-notactive').addClass('move-up-notactive');
		$('.movable:last .ArrawDown',container).removeClass('move-down').removeClass('move-down-notactive').addClass('move-down-notactive');
	}
	// -------------------------
	
	//---------------------------
	//---------------------------

	
	$('#InvoiceIsOffline').bind('change',function(){
		switchMethod();
	});
	
	switchMethod();
	//---------------------------
	//---------------------------
	
	$('.save').click(function(evt){
		if($(this).hasClass('disable-submit')){
			return;
		}
		evt.preventDefault();
		$('.actions-btns .sub-actions').hide();
		if ($('#ClientData', '#InvoiceForm').length == 0){
			$('#InvoiceForm').append($('#ClientData'));
		}
		RemoveEmptyItemRow();
		if (validateFields()){
                    
			var action = $('#InvoiceForm').attr('action');
			if ($(this).hasClass('direct')){
				$('#InvoiceForm').attr('action', action + '?send=direct');
			} else if ($(this).hasClass('revised')) {
				$('#InvoiceForm').attr('action', action + '?send=revised');
			}
			else if ($(this).hasClass('draft')) {
				$('#InvoiceForm').attr('action', action + '?send=draft');
			}
			else if ($(this).hasClass('print')) {
				$('#InvoiceForm').attr('action', action + '?send=print');
			}
			else if ($(this).hasClass('silent')) {
				
				$('#InvoiceForm').attr('action', action + '?send=silent');
			}
			$(this).addClass('disable-submit');
			//clearInterval(invoiceto_local_interval);
			// localStorage.removeItem('myinvoice');
			$('#InvoiceForm').submit();
		}
		else
		{
			// Close I frame Preview
			closepreview();
			if($('.more-options-box .error-message').length>0)
			{
				if($('.more-options-box .collapse.in').length==0) $('button[href="#extra-settings"]').click();
				$('a[href=#'+$('.more-options-box .error-message').parents('.tab-pane').attr('id')+']').click(); 
			}
			if($('.error-message:first').length>0&&$('.error-message:first').is(':visible'))
			{
			 $('html,body').animate({
				scrollTop: $('.error-message:first').offset().top-100
			}, 600);
			}
			else
			{
				$('html,body').animate({
				scrollTop: 0
			}, 600);
			}
		}
		return false;
	});


	
	$('.item-unit-price, .item-qty', '#listing_table').live('change', calculateTotals);
	$('#InvoiceDiscount,#InvoiceDiscountAmount,#InvoiceDeposit,#InvoiceDepositType,#InvoiceShippingAmount,#discount_type').bind('change', calculateTotals);

	calculateTotals();
	

	$('#AddNewClient').bind('click', function(evt){
		ajaxUrl='owner/clients/add';
		$(':input', '#ClientData').not(':checkbox,:radio').each(function(){
			console.log($(this).data('default'));
			$(this).val($(this).data('default') || '');
		});
		$(':checkbox', '#ClientData').attr('checked', false);
		$('.error-meessage', '#ClientData').remove();
		$('#UpdateClientDataBox').hide();
		$('#ClientSendDetails').show();
		$('#ClientData').show();
		
		$('.ClientSelect').hide();
		$('#ClientFirstName').focus();
		$('h3', '#ClientData').text(__('Client Details'));
		if (!addClientLimit.status){
			$('#NewClientMessage', '#ClientData').remove();
			$('h3', '#ClientData').after('<div class="Errormessage" style="width: 290px" id="NewClientMessage">' + addClientLimit.message + '</div>');
		}
		evt.preventDefault();
	});

	$('#EditCurrentClient').bind('click', function(evt){
		ajaxUrl='/owner/clients/edit';
		var clientID = $('#InvoiceClientId').val();
		$('#NewClientMessage', '#ClientData').remove();
		if (clientID){
                    
			$('#ClientID', '#ClientData').val(clientID);
			$('#UpdateClientDataBox').hide();
			//$('.error-meessage', '#ClientData').remove();
			$('#ClientData').show();
			$('.ClientSelect').hide();
			

			$('#ClientFirstName').focus();
			//loadClientData();

			$('h3', '#ClientData').text(__('Client Details'));
			$('#ClientSendDetails').hide();
		}

		evt.preventDefault();
	});

	$('#CancelClient').click(function(){
		
		$('#ClientData').hide();
		$('.ClientSelect').show();
		loadClientData();
		return false;
	});

	

	

	loadClientData();

	$('#InvoiceClientId').bind('change', loadClientData);
	$('#SaveClient').bind('click', function(){
	if($('#SaveClient').find("span").hasClass( "disabled" )){
	return false;
	}
		 ajaxUrl = 'owner/clients/add';
		var client_id = string2number($('#ClientID').val());
		pushCID(client_id);
		//		var clientSaved = false;
		if (client_id != 0){
			ajaxUrl = 'owner/clients/edit/' + client_id;
		}
		$('#NewClientMessage', '#ClientData').remove();
		if (/*document.getElementById('UpdateClientData').checked*/ true || client_id == 0){   
			var clientData = {
				Client: {}
			};
			if (client_id != 0){
				clientData.Client.id = client_id;
			}
			$(':input', '#ClientData').each(function(){
				var name = this.name.replace(/data\[Invoice\]\[client_(.*)\]/, '$1');
				if(name=='type' && this.checked==false){
					
				}else{
				clientData.Client[name] = this.value;
				}
			});
                        
                        
			clientData.Client['is_offline'] = $('#InvoiceIsOffline').val();
			if($('#InvoiceClientSendNotify').attr('checked')=='checked'){
				clientData.Client.send_notify=1;
			}
			else{
				clientData.Client.send_notify='';
			}
			
			if($('#InvoiceClientActiveSecondaryAddress').is(':checked')){
				clientData.Client.active_secondary_address=1;
			}
			else{

				clientData.Client.active_secondary_address=0;
			}
			
			$('#ClientSaveLoader').show();
			$('#SaveClient').find("span").addClass( "disabled" );
			$.ajax({
				url: SITE_ROOT + ajaxUrl,
				type: 'post',
				dataType: 'json',
				data: {
					data: clientData
				},
				success: function(data){
                                //    console.log ( data ) 
				$('#SaveClient').find("span").removeClass( "disabled" );
					$('#ClientSaveLoader').hide();
					$('.error-message', '#ClientData').remove();
					$('#NewClientMessage', '#ClientData').remove();

					if (data.error){
						if (data.message != undefined){
							$('#ClientData h3').after('<div id="NewClientMessage" style="width: 290px" class="' + data['class'] + '">' + data.message + '</div>');
						}

						if (data.errors != undefined){
						
							for(field in data.errors){
								if(field=='email' && data.fmsg!=undefined  && data.fmsg!=''){
                                                                    
								$('#ClientData h3').after('<div id="NewClientMessage" style="" class="new-client-error alert alert-danger">' + data.fmsg + '</div>');										
								}
								var fieldName = 'data[Invoice][client_' + field + ']';
								
								
								var inputField = $(':input[name="'+ fieldName + '"]');
								if (inputField.siblings('.error-message').length < 1){
									inputField.parent().append('<div class="error-message">' + data.errors[field] + '</div>');
								}
							}
						}
					} else {
                                                client_faddress=data.client.full_address;
						loadClientsList(data.client.id);
						$('#ClientFromData').val(1);
						$('#ClientData').hide();
						$('.ClientSelect').show();
						
					}
				},
				error: function(){
					
				$('#ClientSaveLoader').hide();
				// TODO: implement user fail here.
				}
			});
		} else {
			$('#ClientData').hide();
			$('.ClientSelect').show();
		}
		
		if (client_id != 0){
			if(ajaxUrl!='owner/clients/add'){
			generateStaticClientData();
			}
		}
		
		return false;
	});
	// -------------------------
	$('.has-calendar').datepicker();

	$.datepicker.setDefaults({
		dateFormat: jsDateFormat
	});
	// -------------------------
	if ($('#InvoiceDateFormat').length){
		$('#InvoiceDateFormat').bind('change', function(){
			var newJsDateFormat = jsDateFormats[string2number(this.value)];
			$.datepicker.setDefaults({
				dateFormat: newJsDateFormat
			});
			$('.has-calendar').each(function(){
				if (this.value != ''){
					try{
						var thisDate = $.datepicker.parseDate(jsDateFormat, this.value);
						if (thisDate){
							this.value = $.datepicker.formatDate(newJsDateFormat, thisDate).toString();
						}
					} catch (e){
					}
				}
			});
			jsDateFormat = newJsDateFormat;
		}).trigger('change');
	}
	// -------------------------
	$('.reminder-sendwhen', '#RemindersList').live('change', function(){
		var value = string2number(this.value);
		if (value == 3 || value == 4){
			$(this).siblings('div.sub-item').show();
		} else {
			$(this).siblings('div.sub-item').hide();
		}
	}).trigger('change');

	
	// -------------------------

	$('.item-arrow', '#listing_table').live('click', function(evt){
		
		var list = $('#InvoiceProducts');
		var visible = list.data('visible');
		var parent = $(this).parents('td');

		var pos = parent.offset();
		var poww=list.outerWidth();
		var powww=$('.td_editable').outerWidth();
		
		var height = parent.height();
		var pad = parseInt(parent.css('padding-top')) + parseInt(parent.css('padding-bottom'));
		if(SITE_LANG=='ara'){
		list.css({
			top: pos.top + height + pad,
			left: pos.left-poww+powww
		});
		}else{
		list.css({
			top: pos.top + height + pad,
			left: pos.left
		});			
		}
		
		
		if (!visible){
			list.data('visible', true).show();
		} else {
			list.data('visible', false).hide();
		}
		$('#search_product').val('').focus();
		list.data('element', $(this).parents('tr').get(0));
		return false;
	});
	// -------------------------
	//	$('.select-arrow img').live('click', function(evt){
	//		$(this).parent().click();
	//		evt.preventDefault();
	//	});

	// -------------------------
	$('.item_name').live('click', function(){
		if($(this).attr('readonly')){
		$('.item-arrow', '#listing_table').click();
		$('#search_product').focus();
		}
	});
	$('.item_name').live('change', function(e){reviewIds()});
	$('.item_name', '#listing_table').live('keyup', function(e){
		if(aps=='1')
		list_products($(this).val()); 
		
		
		
		var list = $('#InvoiceProducts');
		var visible = list.data('visible');
		var parent = $(this).parents('td');

		var pos = parent.offset();
		var poww=list.outerWidth();
		var powww=$('.td_editable').outerWidth();
		
		var height = parent.height();
		var pad = parseInt(parent.css('padding-top')) + parseInt(parent.css('padding-bottom'));
			if(SITE_LANG=='ara'){
		list.css({
			top: pos.top + height + pad,
			left: pos.left-poww+powww
		});
	}else{
		list.css({
			top: pos.top + height + pad,
			left: pos.left
		});
		
	}

			list.data('visible', true).show();
		list.data('element', $(this).parents('tr').get(0));
		return false;
		var list = $('#InvoiceProducts');
		var bind = list.is(':visible');
		if (bind){
			var thisValue = this.value.toLowerCase();
			if (this.value != ''){
				$('li', list).each(function(){
					if ($('a', this).text().toLowerCase().indexOf(thisValue) != -1){
						$(this).show();
					} else {
						$(this).hide();
					}
				});
			} else{
				$('li', list).show();
			}
		}
		
	});
	// -------------------------
	$('.delete-field','#InvoiceCustomFields').live('click',function(){
		if(!confirm(__("Are you sure ?"))){
		
			return false;
		}
		$(".MoreField[rel='"+ $(this).siblings('.custom-place-holder').attr('value')+"']").show();
	
		//TODO: Check if a real custom value exists
		placeHolder=$(this).parents('tr').find('input:hidden').val();
		$(this).parents('tr').remove();
		if (this.rel != ''){
			$('a[href=' + this.rel + ']','#MoreFieldsList').parent().show();
		}
		setFirstLastNotActive('#InvoiceCustomFields');
		return false;
	});
	// -------------------------
	$('a.product-link', '#InvoiceProducts').live('click', function(evt){
        
		var father = $('#InvoiceProducts').data('element');
		
		var productID = string2number($(this).attr('href').replace(/\D/g, ''));
		
		if (productID && typeof jsProducts[productID] != 'undefined'){
			var product = jsProducts[productID];
            if(columns['col_1']=='auto'){
                $('.item_name', father).val('auto').change();
            }else if(columns['col_1']=='product_image'){
                $('.item_name', father).val('product_image').change();
            }else{
                $('.item_name', father).val(product[columns['col_1']]).change();
            }
			
			$('.org_name', father).val($('.item_name', father).val()); 
			$(':input[id$=ID]', father).val(product.id).change();
			$('.item-description', father).val(product[columns['col_2']]).trigger('keyup');
                        for(iv=3;iv<=5;iv++){
                        if(!empty(columns['col_'+iv])) $('.item_col_'+iv, father).val(product[columns['col_'+iv]]).trigger('keyup');
						console.log(columns['col_'+iv]);
                        }
                        if(group_price_id!=0){
                        var found_price=false;   
						if(!empty(product.prices))
                         $.each(product.prices, function( index, value ) {
                      
                       if(parseInt(value.group_price_id)==group_price_id){
                         $('.item-unit-price', father).val(value.price).change();          
                         found_price=true;
                          return false; 
                       }
                        });   
                         if(found_price==false){
                        $('.item-unit-price', father).val(product.unit_price).change();                         
                         }
                        }else{
                        $('.item-unit-price', father).val(product.unit_price).change();    
                        }
                        lock_product ( product.unit_price , father )
			
			$('.item-tax1', father).val(product.tax1).change();
			$('.item-tax2', father).val(product.tax2).change();
			if(empty(product.default_quantity)) product.default_quantity=1;
			$('.item-qty', father).val(product.default_quantity).change();
			
			
			if (typeof trkInv != 'undefined'&&trkInv==1)
			afterProdSelect(productID,father); 
                        if (typeof enable_multi_units !== 'undefined'&&enable_multi_units==1){
                            multi_units( product , father)
                        }
			$('.item-qty',father).focus().select();
			calculateTotals();
		recalcauto();
		}

		$(this).parents('ul.products-list').hide();
		        AddNewROw(true);
		return false;
	});
$('#search_product').live('click', function(evt){
return false;
});
if(aps=='1')
{
	$('#search_product').live('keyup', function(evt){
		list_products($('#search_product').val());
	});
}
		var saj=0;
		var lasts='zzz';
		var lastc=0;
		var product_line = '';
                var my_client_id=$('#ClientID').val();
		

	$('#AddField').bind('click', function(){
		$('.MoreField', '#MoreFieldsList').click();
		return false;
	});
	// -------------------------
	$('.MoreField', '#MoreFieldsList').click(function(evt){
		evt.preventDefault();
		lastFieldIndex = 0;
		$('.field-row', '#InvoiceCustomFields').each(function(){
			var idx = string2number($(':input:first', this).attr('id').replace(/\D/g, ''));
			if (idx > lastFieldIndex){
				lastFieldIndex = idx;
			}
		});

		if (lastFieldIndex == 0 && $('.field-row', '#InvoiceCustomFields').length == 0){
			lastFieldIndex = 0;
		} else {
			lastFieldIndex++;
		}

		$('#InvoiceCustomFields').append(baseFieldRow);
		var lastFieldRow = $('.field-row:last','#InvoiceCustomFields')[0];
		var lastRow = $('.field-row:last','#InvoiceCustomFields');
		$(':input', lastFieldRow).each(function(){
			this.id = this.id.replace('0', lastFieldIndex);
			this.name = this.name.replace('0', lastFieldIndex);
			this.value = '';
		});

		if (this.rel != ''){
			$('.custom-value', lastFieldRow)
			.attr('readonly', true)
			.val(this.rel)
			.addClass(this.rel.replace(/%/g, '') + '-value')
			.addClass('form-x4 read-only-field')
			.parent('.text');

			$('[name$="[placeholder]"]', lastFieldRow).val(this.rel);
			$('[name$="[placeholder]"]', lastFieldRow).addClass('custom-place-holder');
			$('.custom-label', lastFieldRow)
			.addClass(' read-only-field')
			.attr('readonly', true)
			.parent('.text').removeClass('text');
		}

		if (!$(this).hasClass('other')){
			$(this).parent().hide();
			$('.custom-label', lastFieldRow).val($(this).text());
		}

		$('.delete-field', lastFieldRow).attr('rel', $(this).attr('href'));
		$('.custom-label', lastFieldRow).focus();
		beforelastRow=lastRow.prev();

		$('.move-table .sortable-arrows .ArrawDown', beforelastRow).removeClass('move-down-notactive').removeClass('move-down').addClass('move-down');
		setFirstLastNotActive('#InvoiceCustomFields');

		calculateTotals();
		calculateDates();
		$('#InvoiceStatus').change();
		$('#InvoiceDeposit').change();
		$('#InvoiceDueDays').change();
		$('#InvoiceDueAfter').change();
                $('.custom-label:last').focus();
	});
	// -------------------------
	$('.edit-email-template', '#RemindersList').live('click', function(){
		var value = $(this).siblings('select.reminder-email-template').val();
		if (value){
			frame = $('<iframe>', {
				src: SITE_ROOT + '/owner/email_templates/edit/' + value +'?box=1',
				border: 0,
				id: 'lightBoxFrame',
				style: 'border: 0; width:800px; height: 600px'
			});
			
				$('#myModalGeneralSize').addClass("modal-dialog modal-lg");
				$('#myModalGeneral_iframe').attr('style','border: 0;  height: 600px');
				$('#myModalGeneralheader').hide();
				$('#myModalGeneral_iframe').attr('src', 'about:blank');
				$('#myModalGeneral_iframe').attr('src', SITE_ROOT + '/owner/email_templates/edit/' + value +'?box=1');
				$('#myModalGeneral').modal('show');					
			
			//$('<div>').append(frame).lightbox_me();
		}

		return false;
	});
	// -------------------------
	$('#TermsSelector').bind('change', function(){
		var value = string2number(this.value);
		if (value){
			var loader = $(this).siblings('.inline-loader');
			loader.show();
			$.ajax({
				url: SITE_ROOT + '/owner/terms/load/' + value,
				dataType: 'json',
				cache: false,
				success: function(data){
					if (data.error){
						this.error();
					} else {
						$('#InvoiceTerms').val(data.text);
						loader.hide();
					}
				},
				error: function(){
					//TODO: implement error function if terms failed to load
					$('#InvoiceTerms').val('');
					loader.hide();
				}
			});
		} else {
			$('#InvoiceTerms').val('');
		}
	});
	// -------------------------
	$('#InvoiceDueAfter,#InvoiceDate,#InvoiceIssueDate').bind('change', calculateDates);
	// -------------------------
	$('#InvoiceDueAfter').bind('change', function(){
		$('.due-days-value').val(string2number(this.value));
	});
	// -------------------------
	$('[name$="[placeholder]"]', '#InvoiceCustomFields').each(function(){
		if(this.value!="") $('[rel="'+ this.value.replace('"','\\\"') + '"]', '#MoreFieldsList').parent().hide();
	});
	// -------------------------
	$('#InvoiceSaveAsTemplate').bind('change click', function(){
		if (this.checked){
			$('#TemplateNmae').show();
		}
		else {
			$('#TemplateNmae').hide();
			$(':input', '#TemplateName').val('');
		}
	});
	// -------------------------
	// -------------------------
	$('#payment_method,#transaction_id').hide();
	$('#PaymentIsPaid').bind('change click', function(){
		if (this.checked){
			$('#DepositIsPaid').attr('checked', false);
			$('#payment_method').show();
			$('#transaction_id').show();
			$('#treasury_id').show();
			$('.well.already-paid-well').show();
		}else {
			$('#payment_method,#transaction_id,#treasury_id').hide();
			$('#transaction_id').val('');
			$('#treasury_id').val('');
			$('.well.already-paid-well').hide();
		}
		calculateTotals();
	});
	// -------------------------
	
	// -------------------------
	$('.deposit_is_paid_dev,#deposit_payment_method,#deposit_transaction_id').hide();
	$('#DepositIsPaid').bind('change click', function(){
		
		
		if (this.checked){
			$('#PaymentIsPaid').attr('checked', false);
			if($('#InvoiceDeposit').val()==''||$('#InvoiceDeposit').val()=='0')
			{
				$(this).attr('checked', false);   
				alert(__('You need to enter deposit the amount first')); 
				return false;
			}
			$('.deposit_is_paid_dev').show();
			$('#deposit_payment_method').show();
			$('#deposit_transaction_id').show();
		}
		else {
			
			$('.deposit_is_paid_dev').hide();
			$('#deposit_payment_method,#deposit_transaction_id').hide();  
			$('#deposit_transaction_id').val('');
		}
		calculateTotals();  
	});
	// -------------------------
	
	$('#LoadInvoiceTemplate').click(function(){
		var val = $('#SelectInvoiceTemplate').val();
		if (val != ''){
			var action = '';
			if (typeof IS_SUBSCRIPTION != 'undefined' && IS_SUBSCRIPTION){
				action = 'add_subscription';
			} else if (typeof IS_TEMPLATE != 'undefined' && IS_TEMPLATE) {
				action = 'add_template';
			} else if (typeof IS_ESTIMATE != 'undefined' && IS_ESTIMATE) {
				action = 'add_estimate';
			} else {
				action = 'add';
			}
			window.location = SITE_ROOT + '/owner/invoices/' + action + '/' + val;
		} else {
			jAlert(__('Please select invoice template to load'), 'Invoice Template');
		}

		return false;
	});
	// -------------------------
	$('.html-invoice').bind('click', function(){
		
		$('.actions-btns .sub-actions').hide();
		var form = $('#InvoiceForm');
		var action = form.attr('action');
		var target = form.attr('target');
		var targetAction = 'preview';
		if (IS_ESTIMATE){
			targetAction = 'preview_estimate';
		}
if(IS_MOBILE==1){	
document.querySelector("meta[name=viewport]").setAttribute('content', 'width=device-width, initial-scale=0.5');	
ifram_css='calc(100vh - 80px)';
}else{
ifram_css='calc(100vh - 55px)';	
}		
$('.layout').hide();
$('.footer').hide();

$('body').append('<div style="margin:5px 10px auto 10px;"  id="actionbutton"></div><div class="clear"></div><iframe onload="hidepreviewloader()" id="iframe_preview" name="iframe_preview" src="" style="display: block;border: 0; width: 100%; height:'+ifram_css+';margin-top: 5px;">Your browser doesn\'t support iFrames.</iframe>');
//$('.button.select-actions.btn-group.m-r-md').appendTo("#actionbutton");
$('.in_preview').appendTo("#actionbutton");
$('.close_preview').show();
 $("html, body").animate({ scrollTop: 0 });
		form.attr({
			action: SITE_ROOT + '/owner/invoices/' + targetAction,
			target: 'iframe_preview'
		});

		form.submit();
$('#actionbutton').after('<div class="preview-notifcation-loader notifcation-loader"><div class="inner-loader"></div></div>');
		form.attr({
			'action': action,
			'target': '_self'
		});
		return false;
	});
	// -------------------------
	$('.pdf-invoice').bind('click', function(){
		$('.actions-btns .sub-actions').hide();
		var form = $('#InvoiceForm');
		var action = form.attr('action');
		var target = form.attr('target');
		
		var targetAction = 'preview.pdf';
		if (IS_ESTIMATE){
			targetAction = 'preview_estimate.pdf';
		}

		form.attr({
			action: SITE_ROOT + '/owner/invoices/'+targetAction,
			target: '_blank'
		});
		
		
		form.submit();

		form.attr({
			'action': action,
			'target': target
		});
		return false;
	});

	$('#EditCurrency').click(function(){
		$('#CurrencyInput').modal();
		return false;
	});

	$('#SaveCurrency').click(function(){
		
		var currency = $('#InvoiceCurrencyCode').val();
		if(currency==''){
		currency=currency_code;	
			
		}
            $("#ClientDefaultCurrency").data("default", currency);
			$('#HiddenCurrencyCode').val(currency);
            $('#ClientDefaultCurrency').val(currency);
		$('#EditCurrency').html('<u>' + currency + '</u>');
		//removeModal($('#CurrencyInput'));
		$('#CurrencyInput').modal('hide');
		cuCh=1;
		calculateTotals();
		return false;
	});

	$('#EditLanguage').click(function(){
		$('#LanguageInput').lightbox_me();
		return false;
	});

	$('#SaveLanguage').click(function(){
		var languageText = $('option:selected', '#InvoiceLanguageId').text();
		var languageId= $('#InvoiceLanguageId').val();
		$('#HiddenLanguageId').val(languageId);
		$('#EditLanguage').html('<u>' + languageText + '</u>');
		removeModal($('#LanguageInput'));
		return false;
	});

	$('#EditTerms').click(function(){
		var termID = $('#TermsSelector').val();
		if (termID){
			var frame = $('<iframe />', {
				src: SITE_ROOT + '/owner/terms/edit/' + termID + '?box=1',
				border: 0,
				id: 'lightBoxFrame',
				style: 'border: 0; width: 700px; height: 500px'
			});
				$('#myModalGeneralSize').addClass("modal-dialog modal-lg");
				$('#myModalGeneral_iframe').attr('style','border: 0;height: 500px');
				$('#myModalGeneralheader').hide();
				$('#myModalGeneral_iframe').attr('src', 'about:blank');
				$('#myModalGeneral_iframe').attr('src', SITE_ROOT + '/owner/terms/edit/' + termID + '?box=1');
				$('#myModalGeneral').modal('show');
			
			//$('<div>').append(frame).lightbox_me();
		}
		return false;
	});

	$('.add-product-link', '#InvoiceProducts').live('click', function(){
		aps = '1';
		var frame = $('<iframe />', {
			src: SITE_ROOT + '/owner/products/add?box=1',
			border: 0,
			frameBorder: 0,
			id: 'lightBoxFrame',
			style: 'border: 0; width: 480px; height: 445px'
		});
		//$('<div>').append(frame).lightbox_me();
				$('#myModalGeneralSize').addClass("modal-dialog modal-md");
				$('#myModalGeneral_iframe').attr('style','border: 0; height: 445px');
				$('#myModalGeneralheader').hide();
				$('#myModalGeneral_iframe').attr('src', 'about:blank');
				$('#myModalGeneral_iframe').attr('src', SITE_ROOT + '/owner/products/add?box=1');
				$('#myModalGeneral').modal('show');		
		
		return false;
	});

	$('#InvoiceLayout').bind('change', function(event,manual){
		
        $('#InvoiceInvoiceLayoutId').val(this.value);
		
		if(manual!="manual"&&this.value!="0"){
		$.ajax({url: "/invoices/get_layout_footer/"+this.value}).done(function(data) { if(data!="") $("#InvoiceHtmlNotes").summernote("code",data)});
		}
		template_id=this.value;
		
		if(manual=="manual"){
		template_id=-99;	
		}
		
		console.log(template_id);
		var layoutFields = customFields[template_id];
		var layoutLables = CustomLables[template_id];
	
		$('.field-row').remove();
		$('.MoreField').each(function() {
		  $(this).parent().show();
		  $(this).show();
		});
		var html = '';
		var placeholder=false;
		var placeholderArray=[];
		
		for (var i in layoutFields){
			
			var placeholderClass = 'width-160';
			var placeholderHtml = '';
			var readonly = '';
                        
			if (typeof(layoutFields[i]['placeholder']) !== 'undefined' && layoutFields[i]['placeholder'] != '' && layoutFields[i]['placeholder'] != null && layoutFields[i]['placeholder'] !== null ){
				placeholderClass += ' ' + layoutFields[i]['placeholder'].replace(/%/g, '') + '-value read-only-field';
                                
				placeholderHtml = '<input id="InvoiceCustomField'+i+'Placeholder" type="hidden" name="data[InvoiceCustomField][' + i + '][placeholder]" class="custom-place-holder" value="' + layoutFields[i]['placeholder'] + '"/>';
				readonly=' readonly="readonly"'
            placeholder=true;
			
			
			}else{
            placeholder=false;    
            }
			
			
            if(placeholder && $(".custom-place-holder[value='"+layoutFields[i]['placeholder']+"']").length==0){
			if(placeholderArray.indexOf(layoutFields[i]['placeholder'])==-1){
            html += '<tr class="field-row">';
			html +='<td class="text-right" width=""><label for="CustomField' + i + '">' + layoutFields[i]['label'] + '</label><input id="InvoiceCustomField'+i+'Label" type="hidden" name="data[InvoiceCustomField][' + i + '][label]" value="' + layoutFields[i]['label'] + '"/></td>';
			html +='<td><div class="text"><input id="CustomField' + i + '" name="data[InvoiceCustomField][' + i + '][value]" type="text" value="' + layoutFields[i]['value'] + '" class="' + placeholderClass + '"' + readonly + '/>' + placeholderHtml + '<a href="#" class="delete-field del-pos delete-ico btn btn-xs btn-danger"><i class="fa fa fa-remove"></i></a></div></td>';
			html += '</tr>';
			}
                        }else if(placeholder==false){
                        html += '<tr class="field-row">';
			html +='<td class="text-right"  width="130"><strong><div data-for="InvoicesCustom"><div class="text"><input class="width-160 text-right custom-label" id="InvoiceCustomField'+i+'Label" type="text" name="data[InvoiceCustomField][' + i + '][label]" value="' + layoutFields[i]['label'] + '"/></div></div></strong></td>';
			html +='<td><div class="text"><input id="CustomField' + i + '" name="data[InvoiceCustomField][' + i + '][value]" type="text" value="' + layoutFields[i]['value'] + '" class="' + placeholderClass + '"' + readonly + '/>' + placeholderHtml + '<a href="#" class="delete-field del-pos delete-ico btn btn-xs btn-danger"><i class="fa fa fa-remove"></i></a></div></td>';
			html += '</tr>';    
                        }
						
			placeholderArray.push(layoutFields[i]['placeholder']);			
			console.log(layoutFields[i]['placeholder']);
            console.log(placeholder);
          $(".MoreField[rel='"+layoutFields[i]['placeholder']+"']").hide();
			
            }
            $('#InvoiceCustomFields').append(html);
            if(typeof layoutLables!= 'undefined' && layoutLables)
            $.each(layoutLables, function( index, value ) {
            if(value!=='null' && value!==''  && value!==null){
            $('#'+index).html(value);

            }
            });
                
                if(!empty(ItemColumns)) set_item_columns();
                
                
		calculateTotals();
		calculateDates();
	});

	if ($('.field-row').length < 1){
		$('#InvoiceLayout').trigger('change',["manual"]);
	}

	$('.actions-btns .sub-actions').hide();

	$('.actions-btns .select-action-arrow').click(function(){
		var subActions = $(this).parents('.select-actions').find('.sub-actions');
		var visible = subActions.is(':visible');
		$('.sub-actions').hide();

		if (!visible){
			subActions.fadeIn();
		}
		return false;
	});
	calculateDates();
	
	if($('#InvoiceClientId option').length<2 && $('.with-ajax').length<1)
	$('#AddNewClient').click()
	
	updateTaxColumnsView();
});


//Handle Tab


/**
* Calculates totals for an invoice
*/
function calculateTotals() {
recalcauto();
	var tax1 = string2number($('#InvoiceTax1').val());
	var tax2 = string2number($('#InvoiceTax2').val());
	var discount = string2number($('#InvoiceDiscount').val());
	var discount_amount = string2number($('#InvoiceDiscountAmount').val());
	var is_discount_amount=false;
	if(discount_amount!=0&&discount_amount!='')
	{
			
			 var allSub=0;
			 is_discount_amount=true;
			 $('.itemRow', '#listing_table').each(function(){
					var unitPrice = string2number($('.item-unit-price', this).val());
					var qty = string2number($('.item-qty', this).val());
					var sub = (qty * unitPrice);
					
					allSub += round(sub,2);
			 });
			 discount =  (discount_amount/allSub * 100);
				  
	}
	
	var currency=$('#EditCurrency u').html();
	var shipping = string2number($('#InvoiceShippingAmount').val());
	var refunds = string2number($('#InvoiceSummaryRefund').val());

	var subtotal = 0.0, discountValue = 0.0, total = 0.0;
	var taxIDs = new Array();
	var total_item=$('.itemRow', '#listing_table').length;
	var current_item=0;
	$('.itemRow', '#listing_table').each(function(){
		current_item++;
		var unitPrice = string2number($('.item-unit-price', this).val());
		var qty = string2number($('.item-qty', this).val());
		var tax1 = string2number($('.item-tax1', this).val());
		var tax2 = string2number($('.item-tax2', this).val());
		var itemSubNoTax=0;
		var itemSubtotal = autoRound(qty * unitPrice);
		$('.item-subtotal span', this).text(format_price(itemSubtotal,currency));
		
		subtotal = autoRound(subtotal+itemSubtotal);
		

		var itemDiscount = autoRound(itemSubtotal * discount / 100);

	
		
		discountValue = autoRound(discountValue+round(itemDiscount,2));
		
		console.log("Disccount ...");
		console.log(total_item);
		console.log(current_item);
		if(total_item==current_item){
			
		var i = 0;
		while(is_discount_amount && round(discountValue-discount_amount,2)>=0.01) {
			itemDiscount=autoRound(itemDiscount-0.01);
			discountValue=autoRound(discountValue-0.01);
			console.log(discountValue);
			console.log(discount_amount);
			i++;
			if(i>10){
				break;
			}
		} 
		while(is_discount_amount && round(discountValue-discount_amount,2)<=-0.01) {
			itemDiscount=autoRound(itemDiscount+0.01);
			discountValue=autoRound(discountValue+0.01);
			console.log(discountValue);
			console.log(discount_amount);
			i++;
			if(i>10){
				break;
			}
		}
		}
		
		

		itemSubtotal = autoRound(itemSubtotal-round( itemDiscount ,2));
		
		
		itemSubNoTax=itemSubtotal ;
		var incTax=0;
		if(tax1&&jsTaxes[tax1].included=='1')
		{
			incTax+=string2number(jsTaxes[tax1].value);
		}
		if(tax2&&jsTaxes[tax2].included=='1')
		{
			incTax+=string2number(jsTaxes[tax2].value);
		}
		

		if(incTax>0)
		{
			var itemNoTaxVal=autoRound((incTax  / (string2number(incTax) + 100)) * itemSubtotal);
			itemSubNoTax= autoRound(itemSubNoTax-itemNoTaxVal);
		}
	
		
//$itemTax2 = ($tax2['value'] / (100 + $tax2['value'])) * $subtotal ;
				//else
				//$itemTax2 = $subtotal * $tax2['value'] / 100;
		var itemTax1 = 0, itemTax2 = 0;
		
		if (tax1){
			var t1 = jsTaxes[tax1];
			itemTax1 = itemSubNoTax * t1.value / 100;
			
			if (taxIDs[tax1] == undefined){
				taxIDs[tax1] = 0;
			}
			taxIDs[tax1] += itemTax1;
		}
		if (tax2){
			var t2 = jsTaxes[tax2];
			itemTax2 = itemSubNoTax * t2.value / 100;
			
			if (taxIDs[tax2] == undefined){
				taxIDs[tax2] = 0;
			}
			taxIDs[tax2] += itemTax2;
		}
		
		if(tax1&&t1.included!='1')
		itemSubtotal += itemTax1;
		else if(tax1&&t1.included=='1')
		subtotal -=  itemTax1;
		
		if(tax2&&t2.included!='1')
		itemSubtotal += itemTax2 ;
		else if(tax2&&t2.included=='1')
		subtotal -= itemTax2 ;
		
		
		
		total = autoRound(total+itemSubtotal);
		
		
	});

	
	total+=shipping;
	
	var currency=$('#EditCurrency u').html();
	$('span#products-total').text(format_price(total, currency));
	$('#SubtotalValue').text(format_price(subtotal,currency));
	$('#TotalValue').text(format_price(total,currency));
	$('.total-value').val(format_price(total,currency));
	
	totalValue=total;
	

	var html = '';

	$('#DiscountRow').remove();
	if (discountValue > 0 && !$('#DiscountRow').length){
		
		var discountText = __('Discount') + (!is_discount_amount?' (' + discount + '%)':'');
		html += '<tr class="notEditable" id="DiscountRow"><td  class="tspan new-row-cell"></td>';
		html += '<td  class="text-right"><strong>' + discountText + '<strong></strong>';
		html += '<td class="text-left" id="DiscountValue">-' + format_price(discountValue, currency) + '</td>';
		html += '</tr>';
		$('.discount-value').val(format_price(discountValue, currency));
	} else {
		$('.discount-value').val(format_price('0.00', currency));
	}

	$('.tax-row').remove();
	for (var idx in taxIDs){
		var tax = jsTaxes[idx];
		var taxLabel =  tax.name + ' (' + tax.value + '%)';

		html += '<tr id="Tax' + idx +'Row" class="tax-row notEditable"><td  class="tspan new-row-cell"></td>';
		html += '<td  class="text-right"><strong>' + taxLabel + '</strong></td>';
		html += '<td class="text-left">' + format_price(taxIDs[idx].toFixed(2), currency) + '</td>';
		html += '</tr>';
	}

	
		

	var deposit = string2number($('#InvoiceDeposit').val());
	var depositType = string2number($('#InvoiceDepositType').val());
	if (depositType == 2){
		deposit = total * deposit / 100;
	}
	
	if($('#PaymentIsPaid').length>0 && $('#PaymentIsPaid').get()[0].checked)
	{
		deposit=0;
		summary_paid=total;
	}
	else if($('#DepositIsPaid').length>0 && $('#DepositIsPaid').get()[0].checked)  
	{
		summary_paid=deposit;
		deposit=0;
	}
	else if($('#DepositIsPaid').length>0)
	{
		summary_paid=0;
	}
	
	var unpaidVal = 0;
	var paidText = __('Paid') ;
	var unpaidText = __('Balance Due:') ;
	
	
	unpaidVal = total - summary_paid;
        if(refunds>0)
        unpaidVal -=refunds;
	
	
	$('#ShippingRow').remove();
	
		var shippingText = __('Shipping') ;
		if(shipping>0)
		{
			html += '<tr class="notEditable" id="ShippingRow"><td  class="tspan new-row-cell"></td>';
			html += '<td  class="text-right"><strong>' + shippingText + '<strong></strong>';
			html += '<td class="text-left" id="ShippingValue">' + format_price(shipping, currency) + '</td>';
			html += '</tr>';
		}
			
		
	
	$('#DepositRow').remove();
	if (deposit > 0 && deposit != unpaidVal && !$('#DepositRow').length){
		var depositText = __('Next Payment') ;
		html += '<tr class="notEditable" id="DepositRow"><td class="tspan new-row-cell"></td>';
		html += '<td  class="text-right"><strong>' + depositText + '<strong></strong>';
		html += '<td class="text-left" id="DepositValue">' + format_price(deposit, currency) + '</td>';
		html += '</tr>';
		$('.deposit-value').val(format_price(deposit, currency));
	} else {
		$('.deposit-value').val(format_price('0.00', currency));
	}
	$('#FinalTotalRow').before(html);
	
	$('#PaidRow').remove();
	$('#UnpaidRow').remove();

	html ='';
        
        $('#RefundsRowx').remove();	
                var RefundsText = __('Refunds') ;
		if(refunds>0)
		{
			
			html += '<tr id="RefundsRowx"><td  class="tspan new-row-cell"></td>';
			html += '<td  class="text-right"><strong>' + RefundsText + '<strong></strong>';
			html += '<td class="text-left" id="ShippingValue">-' + format_price(refunds, currency) + '</td>';
			html += '</tr>';
		}	
	
	if(unpaidVal>0&&unpaidVal!=total||refunds>0)    
	{
		html += '<tr class="notEditable" id="PaidRow"><td  class="tspan new-row-cell"></td>';
		html += '<td  class="text-right"><strong>' + paidText + '<strong></strong>';
		html += '<td class="text-left" id="DepositValue">' + format_price(summary_paid, currency) + '</td>';
		html += '</tr>';
		html += '<tr class="notEditable" id="UnpaidRow"><td  class="tspan new-row-cell"></td>';
		html += '<td  class="text-right"><strong>' + unpaidText + '<strong></strong>';
		html += '<td class="text-left" id="DepositValue">' + format_price(unpaidVal, currency) + '</td>';
		html += '</tr>';
		
		$('#FinalTotalRow').after(html);
	
	}
	
	if(summary_paid==0)
	status_text=__('Unpaid');
	else if(summary_paid<total)
	status_text=__('Partial Paid');
	else
	status_text=__('Paid');

	$('.status-value').val(status_text);
	$('.paid-amount-value').val(format_price(summary_paid, currency));
	$('.unpaid-amount-value').val(format_price(unpaidVal, currency));     
	//if(total==subtotal) 	$('.items-totals').hide(); else $('.items-totals').show();
        justifyColumns();
	
} 

function calculateDates(){
	if ($('#InvoiceDate').length){
		try{

			var invoiceDate = $('#InvoiceDate').val();
			var date = $.datepicker.parseDate(jsDateFormat, invoiceDate);

			if (IS_INVOICE){
				var dueDays = string2number($('#InvoiceDueAfter').val());
				$('.due-days-value').val(dueDays);
				var dueDate = date;
				dueDate.setDate(date.getDate() + dueDays);
				var strDueDate = $.datepicker.formatDate(jsDateFormat, dueDate);
				$('.due-date-value').val(strDueDate);

			}
		} catch (e) {
		//			$('.due-days-value').val(0);
		//			$('.due-date-value').val($.datepicker.formatDate(jsDateFormat, new Date()));
		}
	}
}

function activateTab(rel){
	$('.tabs-buttons li').removeClass('current');
	$('.tabs-box:not(' + rel + ')').addClass('hidden');

	$('.tabs-buttons').removeClass('no-tabs');
	$('.tabs-buttons li[rel=' + rel + ']').addClass('current');
	$(rel).removeClass('hidden');
}

function deactivateTabs(){
	$('.tabs-buttons li').removeClass('current');
	$('.tabs-box').addClass('hidden');

	$('.tabs-buttons').addClass('no-tabs');
}
//--------------------------
function validDate(value){
	try {
		var result = (value == $.datepicker.formatDate(jsDateFormat, $.datepicker.parseDate(jsDateFormat, value)));
		if (!result){
			$(selector).after($('<div>', {
				'class': 'error-message'
			}).text(__('Invalid date. Date must match date format')));
		}
		return result;
	} catch (exception) {
		return false;
	}
}
//--------------------------
function validateFields(){

	if($('#HiddenCurrencyCode').val()=='') {
		$('#InvoiceCurrencyCode').val(currency_code);
		$('#HiddenCurrencyCode').val(currency_code);
		$('u','#EditCurrency').text(currency_code);
	}
	

	var rules = {
		'#InvoiceClientId' : ['notEmpty'],
		'#InvoiceTax1' : {
			'rules': ['isNumeric', 'isNotMinus'],
			empty: true
		},
		'#InvoiceTax2' : {
			'rules': ['isNumeric', 'isNotMinus'],
			empty: true
		},
		'#InvoiceDiscount': {
			'rules': ['isNumeric', {
				rule: 'lessThanOrEqual',
				value: 100
			}],
			empty: true
		},
		'#InvoiceDiscountAmount': {
			'rules': ['isNumeric'],
			empty: true
		},
		
		
		'#InvoiceClientBusinessName' : {
			'rules': ['isClientSaved'],
			empty: false
		},
		'#InvoiceDueAfter' : {
			'rules': ['isNumeric', 'isNotMinus'],
			empty: true
		},
		'#InvoiceIssueBefore' : {
			'rules': ['isNumeric', 'isNotMinus'],
			empty: true
		},
		'#InvoiceDate': ['notEmpty', 'validDate'],
                '#InvoiceIssueDate': ['notEmpty', 'validDate'],
		
		'.item-description': [{
			rule: 'maxLength',
			value: 100000
		}],
		'.item-unit-price': ['isNumeric'],
		'.item-qty': ['isNumeric'],
		'.reminder-days' :{
			'rules': ['checkReminderDays'],
			pass: 'selector'
		},
//		'.reminder-email-template': ['notEmpty'],
		'.reminder-sendwhen': ['notEmpty'],
		'.custom-label': {
			'rules': ['checkCustomValue'],
			pass: 'selector'
		},
		'.custom-value': {
			'rules': ['checkCustomValue'],
			pass: 'selector'
		},
		'#TermsSelector': ['validateTerms']
	};
	
	if(!IS_TEMPLATE)
	{
		$.extend(rules, {
			'.item_name': ['notEmpty']
		});
	}

	if($('#InvoiceDepositType').val() == 2){
		$.extend(rules, {
			'#InvoiceDeposit' : {
				'rules': ['isNumeric', 'betweenPercentage'],
				empty: true
			}
		});
	}else{
		$.extend(rules, {
			'#InvoiceDeposit' : {
				'rules': ['isNumeric',  {
					rule: 'lessThanOrEqual',
					value: totalValue
				}],
				empty: true
			}
		});
	}

	if (typeof IS_SUBSCRIPTION != 'undefined' && IS_SUBSCRIPTION){
		$.extend(rules, {
			'#InvoiceIssueBefore': {
				rules: ['isNumeric',  'checkSubscriptionIssue'],
				empty: true
			},
			'#InvoiceName': ['notEmpty'],
			'#InvoiceSubscriptionPeriod': ['isNumeric', 'isNotMinus'],
			'#InvoiceSubscriptionMaxRepeat': {
				'rules': ['isNumeric', 'isNotMinus'],
				empty: true
			}
		});
	} else if (typeof IS_TEMPLATE!= 'undefined' && IS_TEMPLATE){
		$.extend(rules, {
			'#InvoiceName': ['notEmpty'],
			'#InvoiceClientId': []
		});
	}

	var validationMessages = {
		notEmpty: __('Required'),
		isNumeric: __('Valid number required'),
		validDate: __('Valid date required'),
		isNotMinus: __('Positive number required'),
		checkReminderDays: __('Invalid number of days'),
		checkCustomValue: __('Either label or value required'),
		lessThan: __('Value must be less than :value'),
		lessThanOrEqual: __('Value must be less than or equal to :value'),
		maxLength: __('Only :value characters allowed'),
		betweenPercentage:__('Value must be between [0-100]'),
		checkSubscriptionIssue: __('Issue days must be less than subscirption period'),
		validateTerms: __('Please select the required terms'),
		isClientSaved: __('Please Save the client details first by clicking below on Save Client button'),
	};

	return validate(rules, validationMessages);
}

function validateTerms(selector){
	if (document.getElementById('TextCheckbox').checked){
		return notEmpty(selector)
	}
	return true;
}

function checkCustomValue(selector){
	//	var _this = $(selector);
	//	var parent = _this.parents('.field-row');
	//	return _this.hasClass('.read-only-field') || notEmpty($('.custom-label', parent).val()) || notEmpty($('.custom-value', parent).val());
	return true;
}

function checkReminderDays(selector){
	var _this = $(selector);
	var when = string2number($('.reminder-sendwhen', _this.parents('td')[0]).val());

	if (when == 3 || when == 4){
		var value = _this.val();
		return notEmpty(value) && isNumeric(value) && isNotMinus(value);
	}
	return true;
}


function resizeItem(item){
	$(item).parents('.itemRow').find('.item-name a.select-arrow').height($(item).height());
}


function isClientSaved($val)
{
	if($('#ClientData').is(':visible')) {
		return false;
	}
	return true;
}

function checkSubscriptionIssue(value){
	var issueDays = string2number(value);
	if (issueDays){
		var subscriptionPeriod = string2number($('#InvoiceSubscriptionPeriod').val());
		var subscriptionUnit = 1;
		switch ($('#InvoiceSubscriptionUnit').val()){
			case 'weeks':
				subscriptionUnit = 7
				break;
			case 'months':
				subscriptionUnit = 30;
				break;
			case 'years':
				subscriptionUnit = 365;
				break;
		}

		subscriptionPeriod *= subscriptionUnit;
		return issueDays < subscriptionPeriod;
	}

	return true;
}


function justifyColumns()
{
    if(IS_PC)
    {
        $('#SubtotalValue').width($('.item-subtotal').width()+$('.delete-product-cell').width()-8);
        $('.items-totals td:eq(1)').width($('.tax1').width()+$('.tax2').width()+$('.Quantity').width()+$('.unit-price').width()+4);
    }
    
   
}

function updateTaxColumnsView()
{
	var taxes_count= $('#InvoiceItem0Tax1 option').length;
	if(taxes_count>3)
	{
		$('.tax2').show();
	}
	else
	{
		$('.tax2').hide();
                $('.tax2 select').val('');
	}
        justifyColumns();
        
}
function CloseTaxes(){
$('#myModalTax').modal('hide');
}
function updateTaxes(){
	var taxesURL = SITE_ROOT + '/owner/taxes/taxeslist';
	if (typeof invoice_id != 'undefined' && invoice_id){
		taxesURL += '/' + invoice_id+'/1';
	}
	
	return $.ajax({
		url: taxesURL,
		dataType: 'json',
		success: function(data){
			jsTaxes = data.jsTaxes;

			var html = '<option value=""></option>';
			var list_html = '<li>' + $('li:first', '#TaxList').html() + '</li>';
			for (var t in data.taxes){
				if (data.taxes.hasOwnProperty(t)){
					html += '<option value="' + t + '">' + data.taxes[t] + '</option>';
					list_html += '<li><a href="#' + t + '" class="tax-link">' + data.taxes[t] + '</a></li>';
				}
			}
			$('.item-tax').each(function(){
				$(this).data('my-val', $(this).val());
				var opCount= $('option', this).length;
				var lastOption = $('option:last', this);
				$(this).html(html + '<option value="' + lastOption.val() + '">' + lastOption.html() + '</option>').val($(this).data('my-val'));
				if($(this).val()==''&&$(this).data('last')!='-1'&&$(this).data('last')!='') $(this).val($(this).data('last'));
				if($(this).attr('id')==$(lastTaxfocus).attr('id')&&$('option', this).length==opCount+1&&$(this).val()=='')  $(this).val($('option',this).eq(-2).val());
				$(this).change();
			});

			list_html += '<li>' + $('li:last', '#TaxList').html() + '</li>';
			$('#TaxList').html(list_html);
			baseItemRow = $('#listing_table tr.itemRow:first').html();
			updateTaxColumnsView();
			
			CloseTaxes();
		}
	});
}

function reviewIds()
{
	$('.itemRow', '#listing_table').each(function(){
		
		if($('.item_name', this).val().replace(/[^a-zA-Z0-9]/g,'').indexOf($('.org_name', this).val().replace(/[^a-zA-Z0-9]/g,'')) == -1 &&  $('.org_name', this).val().replace(/[^a-zA-Z0-9]/g,'').indexOf($('.item_name', this).val().replace(/[^a-zA-Z0-9]/g,'')) == -1 )
		$('.item-id', this).val(0);
	});
}

function CloseProducts(){
$('#myModalGeneral').modal('hide');	
}

function addProduct(product) {
	 
	var t = $(ProLi(product)).insertBefore(".add-product-link");
	jsProducts[product.id]=product;
	$('a.product-link:last', '#InvoiceProducts').click();
	 $('html,body').animate({scrollTop: $('.invoice-items').offset().top-100}, 600);
}


$(function() {
        $('body').append(productsHTML + taxHTML);
		
		$('#InvoiceHtmlNotes').summernote({toolbar: 
		[
			['style', ['bold', 'italic', 'underline', 'clear']],['font', ['strikethrough']],['fontsize', ['fontsize']],
			['color', ['color']],['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'unlink', 'hr']]
		]});

        var listingTable = document.getElementById('listing_table');

        $('.tax-link', '#TaxList').live('click', function(evt) {
            
            var thisList = $('#TaxList');
            var parent = thisList.data('current-td');
            var value = $(this).data('value');
            $('.item-tax', parent).val(value).change();
            thisList.hide();
            return false;
        });

		$('.item-tax', listingTable).live('focus',function (){ $(this).data('lastfocus',$(this).val()) });
        $('.item-tax', listingTable).live('change', function() {
            var val = $(this).val();
            if (val == -1) {
				lastTaxfocus=this;
				$(this).data('last',$(this).data('lastfocus'));
                var frame = $('<iframe />', {
                    src: SITE_ROOT + '/owner/taxes?box=1',
                    border: 0,
                    frameBorder: 0,
                    id: 'lightBoxFrame',
                    style: 'border: 0; width: 400px; height: 420px'
                });
				$('#tax_iframe').attr('style','border: 0; height: 420px');
				$('#myModalTaxLabelheader').hide();
				$('#tax_iframe').attr('src',SITE_ROOT + '/owner/taxes?box=1');
				$('#myModalTax').modal('show');
               // $('<div>').append(frame).lightbox_me();
                $(this).val('');
            } else {
                calculateTotals();
                var $parent = $(this).parents('td');
                var parent = $parent[0];

                $('.item-tax-display', parent).val($('option[value="' + val + '"]', this).text());
            }
        }).change();

        $('.add-tax-link', '#TaxList').live('click', function(evt) {
            var frame = $('<iframe />', {
                src: SITE_ROOT + '/owner/taxes?box=1',
                border: 0,
                frameBorder: 0,
                id: 'lightBoxFrame',
                style: 'border: 0; width: 400px; height: 420px'
            });
           // $('<div>').append(frame).lightbox_me();
				$('#tax_iframe').attr('style','border: 0; height: 420px');
				$('#myModalTaxLabelheader').hide();
				$('#tax_iframe').attr('src',SITE_ROOT + '/owner/taxes?box=1');
				$('#myModalTax').modal('show');
            evt.preventDefault();
        });

        function showTaxes(evt) {
            var $parent = $(this).parents('td');

            var thisList = $('#TaxList');
            var visible = thisList.is(':visible');

            var ofst = $parent.offset();
            var height = parseInt($parent.height());

            thisList.css({top: ofst.top + height, left: ofst.left});
            ;
            if (!visible) {
                thisList.show();
            } else if (evt.type == 'click' && thisList.data('current-td') == $parent[0]) {
                thisList.hide();
            }

            thisList.data('current-td', $parent[0]);
            return false;
        }

        $('.tax-arrow', listingTable).live('click', showTaxes);
        $('.item-tax-display', listingTable).live('focus', showTaxes).live('blur', function() {
            var $parent = $(this).parents('td');
            var thisList = $('#TaxList');
            if (thisList.data('current-td') == $parent[0]) {
                thisList.hide();
            }
        });
		
		$('#InvoiceLayout').val($('#InvoiceInvoiceLayoutId').val());
        
		if($('#InvoiceInvoiceLayoutId').val()==0 || $('#InvoiceId').val()==''){
		$("#InvoiceLayout").trigger("change",["def"]);	
		}else{
		$("#InvoiceLayout").trigger("change",["manual"]);	
		}
	
		$(document.body).on('change', '.active_secondary_address', function(event) {
            if ($(this).attr('checked') == 'checked') {
			$('#secondary_address_info').show();
            } else {
			$('#secondary_address_info').hide();
            }

        });
        
    });


	
function ProLi(product)
{
	if (empty(product.product_code))  product.product_code=product.id;
		else 
			product.product_code=product.product_code;
		product_line=productLi.replaceAll('$index',product.id).replaceAll('$name',product.name).replaceAll('#$product_code',product.product_code).replaceAll('$product_code',product.product_code);
		if(product.track_stock=="1")
			product_line=product_line.replaceAll('$stock_balance',product.stock_balance);
		else
			product_line=product_line.replaceAll('$none_stock','none');
	return product_line;
						
}

function CancelClient(){
	$('#CancelClient').trigger('click');
	$('#NewClientMessage').remove();
	$('.error-message').remove();
}


function loadClientsList(client_id){
                if ( typeof invoice_selector == 'undefined'){
                    invoice_selector = '#InvoiceClientId'
                }
//		var invoice_selector = 
		var clientList = $(invoice_selector);
		pushCID(client_id);


		var selected = client_id;
		if (!selected){
			clientList.val();
		}

		var emptyOptionText = $('option:first', clientList[0]).text();
		var prevHtml = clientList.html();

		clientList.html('<option value="Loading">Loading</option>');

		$.ajax({
			url: SITE_ROOT + '/owner/clients/load_list/'+used_clients.join(),
			cache: false,
			dataType: 'json',
			success: function(data, status){
				
				
				if (!data.error){
					var html = '<option value="">' + emptyOptionText + '</option>';
					for (var c in data.clients){
						var sel = '';
						if (string2number(c) == selected){
							sel = ' selected="selected"';
						}
						html += '<option value="' + c + '"' + sel + '>' + data.clients[c] + '</option>';
					}
					clientList.html(html);
					$(invoice_selector).selectpicker('refresh');
					$(invoice_selector).val(selected);
					$(invoice_selector).selectpicker('render');
					$(invoice_selector).trigger('change');
					
					
					loadClientData();
				} else {
					this.error();
				}
			},
			error: function(){
				clientList.html(prevHtml);
				$('.selectpicker').selectpicker('render');
			}
		});
	}
	
	function loadClientData(){
        
		var client_id = $('#InvoiceClientId').val();
		if(client_id==''){
			return ;
		}
		pushCID(client_id);
		var currentClientID = $("#ClientID").val();

		//if (client_id && client_id != currentClientID){
			
			
			$('#ClientLoader').show();
			//$('#ClientData').hide();
			$.ajax({
				url: SITE_ROOT + '/owner/clients/get_user_data/' + client_id,
				dataType: 'json',
				cache: false,
				success: function(data){
					
					if (!data.error){
						
                      client_faddress=data.client['full_address'];
                      group_price_id =parseInt(data.client.group_price_id);
						for (var key in data.client){
							if(key=='type'){
							$('[name="data[Invoice][client_'+ key + ']"][value="'+data.client[key]+'"]').prop('checked',true).change();
							}else{
							$('[name="data[Invoice][client_'+ key + ']"]').val(data.client[key]);
							if($('[name="data[Invoice][client_'+ key + ']"]').attr('type')=='checkbox'&&data.client[key]&&data.client[key]!='0'){
								$('[name="data[Invoice][client_'+ key + ']"]').attr('checked',true);
							}
						}
						}
						
						
						
						$('#InvoiceClientActiveSecondaryAddress').val('1');
						
						$('[name="data[Invoice][is_offline]"]').val(data.client['is_offline']);
                                                
						if($('#InvoiceClientActiveSecondaryAddress').is(':checked')){
							$('#secondary_address_info').show();
							
						}
						switchMethod();
						$("#ClientID").val(data.client.id);
						$('.selectpicker').selectpicker('render');
							
					} else {
						this.error();
					}
					
					generateStaticClientData();
					$('#ClientLoader').hide();
				},
				error: function(){
					
					clientDataLoaded = false;
					$('#ClientFromData').val(0);
				//	$(':input:not(:radio,:checkbox)', '#ClientData').val('');
					$('#ClientLoader').hide();
				}
			});
		//} else {
			
			//if(ajaxUrl!='owner/clients/add'){
			//generateStaticClientData();
			//}
		//}

	}
	
	
	function generateStaticClientData(){
					var bndata1=$('#InvoiceClientBn1Label').val()+':'+$('#InvoiceClientBn1').val();
                    var bndata2=$('#InvoiceClientBn2Label').val()+':'+$('#InvoiceClientBn2').val();
                    if(bndata1==':'){
                        bndata1='';
                    }
                    if(bndata2==':'){
                        bndata2='';
                    }
                     $('#StaticBN').text(bndata1+bndata2);
					
					
		$('#ClientFromData').val(1);

		$('#StaticUserName').text($('#InvoiceClientFirstName').val() + ' ' + $('#InvoiceClientLastName').val());


		if ($('#InvoiceClientBusinessName').val() != ''){
			$('#StaticBusinessName').text($('#InvoiceClientBusinessName').val());
		} else {
			$('#StaticBusinessName').text('');
		}

		

		var csp = client_faddress;
		
		if (csp != ''){
			$('#StaticUserCSP').html(csp);
		} else{
			$('#StaticUserCSP').text('');
		}

		if ($('#InvoiceClientCountry').val()){
			$('#StaticUserCountry').text($('#InvoiceClientCountry').val());
		}else {
			$('#StaticUserCountry').text('');
		}


		if ($.trim($('#StaticBusinessName').text())!= ''&&!$('#ClientData').is(':visible')){
			
			$('#StaticClientInfo').show();
			$('.ClientSelect').show();
			$('html,body').animate({
				scrollTop: $('#StaticClientInfo').offset().top-100
			}, 600);

		}

		var clientCurrency = $('#ClientDefaultCurrency').val();   
		if (clientCurrency != ''&&cuCh==0&&($('#InvoiceId').val()==''||$('#InvoiceId').val()=='0')){
			$('#InvoiceCurrencyCode').val(clientCurrency);
			$('#HiddenCurrencyCode').val(clientCurrency);
			$('u','#EditCurrency').text(clientCurrency);
		}
		calculateTotals();
	}
	
		function switchMethod()
	{
		if($('#InvoiceIsOffline').val()=='0')
		{
			$('.print-method').hide();
			$('.email-method').show();
		}
		else
		{
			$('.email-method').hide();
			$('.print-method').show();
		}
	}
	
	function pushCID(cid)
	{
		if (typeof cid !== 'undefined')
		{
			cid=parseInt(cid);
			if(used_clients.indexOf(cid) === -1) used_clients.push(cid);
		}
	} 
	
	function AddNewROw(manual){
	var lastRow = $('tr.itemRow:last', '#listing_table');		
		
	$(':input', lastRow).each(function(){
if($(this).hasClass('item_name') && $(this).val()!=''){
$('#AddItem').trigger('click',[manual]);	
}
		});
		
	}
  
    
        function RemoveEmptyItemRow(){
             console.log('RemoveEmptyItemRow');
        var lastRow = $('tr.itemRow', '#listing_table');
        console.log(lastRow.length);
       if(lastRow.length==1){

           return false;
       }
       console.log('what');
       $(lastRow).each(function(index,value){
        	$(':input', value).each(function(){
                    console.log('input');
if($(this).hasClass('item_name') && $(this).val()==''){

 var lastRow = $('tr.itemRow', '#listing_table');
 
        if(lastRow.length==1){
                    return ;
        }else{
$(value).remove();
        }
}
                });   
           
           
       });
       
        }
        
//        function RemoveEmptyItemRow(){
//            $('#listing_table .itemRow').each(function(){
//                if($('input , select , textarea', this).filter(function () {return !!this.value;}).length==0) this.remove();
//            });
//        }
		
		
		function list_products(value){
				//if(aps=='0') return;
				lasts=value;
				$('.product-link').each(function(i, obj) {
					$(this).parent("li").remove();
				});
				
				$('<li><img class="product-link" src="'+SITE_ROOT+'/css/img/loader.gif"></li>').insertBefore(".add-product-link");
				if(saj!=0)
				saj.abort();
				saj=$.ajax({
				url: SITE_ROOT + '/plain.php?action=product_find&val=' + value+'&client='+$('#InvoiceClientId').val(),
				dataType: 'json',
				cache: false,
				success: function(data){
					
					jsProducts=data.data;
					console.log(data);
					$('.product-link').each(function(i, obj) {
						$(this).parent("li").remove();
					});
					var sk=value;
					var selx=0, cx=0;
					
					$.each(data.order, function( index, order_value ) {
						value=jsProducts[order_value];
						$(ProLi(value)).insertBefore(".add-product-link");
						
						if(!empty(value.barcode)&&value.barcode.trim()==sk.trim()) 
							selx=value.id;
						cx++;
					});
					
					if(selx!=0&&cx==1)
						$('#product-'+selx).click();
					
				},
				error: function(){
				}
			});
}
function recalcauto(){
		if(columns['col_1']=='auto'){
			
			var i =1;	
			$('.item_name').each(function(){
				
			$(this).val(i++);	
			
			});
			var i =1;	
			
			$('.org_name').each(function(){
				
			$(this).val(i++);	
			
			});
			
			
			}
						/* for(iv=3;iv<=5;iv++){
                        if(!empty(columns['col_'+iv])) $('.item_col_'+iv).val(product[columns['col_'+iv]]).trigger('keyup');
						console.log(columns['col_'+iv]);
                        } */			
	
}
function LoadDocUploader(id){
    if(loaded_uploaded_doc==1){
        return ;
    }
    $('#invoice_doc_load').html('<div class="inner-loader"></div>');
                                $.ajax({
				url: SITE_ROOT + 'owner/invoices/docs/'+id,
				success: function(data){
                                    loaded_uploaded_doc=1;
                                 $('#invoice_doc_load').html(data);  
                                }});
    
}
function closepreview(){
$('.layout').show();
$('.footer').show();
if(IS_MOBILE==1){	

document.querySelector("meta[name=viewport]").setAttribute('content', 'width=device-width, initial-scale=1.0');	
}
$('#iframe_preview').remove();
$('.close_preview').hide();
$('body').show();	
if($('.button-2.select-actions.btn-group.m-r-md').after($('.in_preview'))){
$('#actionbutton').remove();
}
}

function hidepreviewloader(){
	$('.preview-notifcation-loader').remove();
}
