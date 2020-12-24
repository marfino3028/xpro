function dynamicFormData() {

    var data = {'data[Document][ajax]': 1, 'data[Document][title]': $('#DocumentTitle').val()}
    return data;
}

function onSelect(files)
{
    $('#DocumentTitle').val(files[0].name); 
    return true; //to allow file submission.
}

function onSubmit() {
    var title=window.prompt(__('Enter document title or leave it blank to use file name as title'));
    if(title && title!=''){
            
    $('#DocumentTitle').val(title);
    }
    if ($('#DocumentTitle').val()) {
        return true;
    } else {
     //   $('#DocumentTitle').after('<div class="error-message error_DocumentTitle">' + __('Please enter document title') + '</div>');
        setTimeout(function() {
            window.uploadObj.cancelAll();
            $('.ajax-file-upload-statusbar').remove();
        }, 100);
        return false;
    }
}

function onCancel() {
    block_form_submit = false;

}

function onAbort() {
    block_form_submit = false;

}


function onSuccess(files, response, xhr, pd) {
$('#file_uploader_div').hide();
$('.addnotherfile').show();
$('.multi_drop').remove();
    var obj = jQuery.parseJSON(response);
    //console.log(obj);
    if (obj.status == true) {
       $('#DocumentTitle').val('');
        reload_doc(obj);
      
    }
    
    setTimeout(function() {
        $('.ajax-file-upload-statusbar').remove();
    }, 100);
}

function load_doc(id){
    
     $.getJSON(doc_view_url+'/'+id, function(result){
         reload_doc(result);
});
return false;
}

function reload_doc(obj) {

    if (lastDocumentIndex == 0 && $('.itemRow', '#DocumentList').length == 0) {
        lastDocumentIndex = 0;
    } else {
        ++lastDocumentIndex;
    }    
	var newRow = baseDocumentRow.replace(/%id%/g, obj.id);
	//doc_title
     newRow = newRow.replace(/%doc_title%/g, obj.title);
	//doc_download_url
	 newRow = newRow.replace(/%doc_download_url%/g, obj.path);
	//doc_download_url
	 newRow = newRow.replace(/%doc_download_url%/g, obj.path);	
	
	 newRow = newRow.replace(/%photourl%/g, obj.path);
	 newRow = newRow.replace(/%doc_size%/g, Math.ceil(obj.size/1024));
         if(inArray(obj.ext,['jpg','gif','png','jpeg'])){
         newRow = newRow.replace(/%doc_photo_or_doc%/g, '<img id="photome" src="'+obj.path+'?w=140&h=140&c=1" />');
         }else{
         newRow = newRow.replace(/%doc_photo_or_doc%/g, '<i class="icon-'+obj.ext+'"></i>');    
           
         }
         if($('.invoice-doc:last').attr('lastid')){
         lastuuid = parseInt($('.invoice-doc:last').attr('lastid'));
         }else{
         lastuuid=0;    
         }
       //  console.log(lastuuid+1);
         newRow = newRow.replace(/%unid%/g, lastuuid+1);  
         newRow = newRow.replace(/template-/g, '');  
	
    $('#invoice_docs_div').append(newRow);
    return ;
    lastDoc = $('#DocumentList tr.itemRow:last');
    $('a.preview', lastDoc).attr('href', obj.path);
    $('span.document-title', lastDoc).attr('rel', 'doument-' + obj.id).html(obj.title);
    $('#InvoiceDocument' + lastDocumentIndex + 'DocumentId').val(obj.id);
        if($('.itemRow', '#DocumentList').length>0){
           $('#DocumentList .empty-row').hide();  
        }
        return false;
}

 $(document).ready(function() {
     
     	$('.addnotherfile').live('click', function(evt){
            evt.preventDefault();
         $('#file_uploader_div').show(); 
         $('.addnotherfile').hide();
        });
     
	$('.browseFiles').live('click', function(){
            
		aps = '1';
		var frame = $('<iframe />', {
			src: SITE_ROOT + '/owner/documents/index?box=1',
			border: 0,
			frameBorder: 0,
			id: 'lightBoxFrame',
			style: 'border: 0; width: 480px; height: 445px'
		});
		//$('<div>').append(frame).lightbox_me();
				$("#myModalGeneralSize[role='document']").removeClass("modal-md");
				$("#myModalGeneralSize[role='document']").addClass("modal-lg");
				$('#myModalGeneral_iframe').attr('style','border: 0; height: 445px');
				$('#myModalGeneralheader').hide();
				$('#myModalGeneral_iframe').attr('src', 'about:blank');
				$('#myModalGeneral_iframe').attr('src', SITE_ROOT + '/owner/documents/index?box=1');
				$('#myModalGeneral').modal('show');		
		
		return false;
	});
 });
 
