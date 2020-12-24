function afterProdSelect(productID,father)
{
	
	product=jsProducts[productID];
	
	$('.item-qty', father).data("track_stock",product.track_stock);
	if(product.track_stock=="1")
	{
		$('.item_name', father).attr('readonly','readonly');
		$('.item-qty', father).data("stock_balance",product.stock_balance);
		$('.item-qty', father).attr("data-stock_balance",product.stock_balance);
		$('.item-qty', father).data("product_id",productID);
		$('.item-qty', father).attr("data-product_id",productID);
	}
	else
		$('.item_name', father).removeAttr('readonly');
	
	
	updateStock($('.item-qty',father).get()[0]);
	
}



function tooltip_enable(target){
	
   if(IS_ESTIMATE){
return false;
    }
    //console.log($(target).data("new_stock_balance"));
	$(target).after($('<div>', {
				'class': 'qty-message',				
			}).text(__('Stock Level After')+': '+$(target).data("new_stock_balance")));
}



$('body').on('focus', '.item-qty', function(){
    if(IS_ESTIMATE){
return false;
    }
    updateStock(this);
    $('.error-message').remove();
    $('.qty-message').remove();
    if($(this).data("track_stock")!="1"){
            return ;
    }
    tooltip_enable(this);
	}).on('blur', '.item-qty', function(){
		$('.qty-message').remove();
	});	

	
function updateStock(qtyInput)
{
    console.log(isPO);
	$('.qty-message').remove();
	if($(qtyInput).data("track_stock")!="1"){
		return ;
	}

	var st=0;
	$('.item-qty[data-product_id="'+$(qtyInput).data("product_id")+'"]').each(function(){st+=parseFloat(($(this).val()==''?0:$(this).val()))});
	
	if(!empty(isPO))
		st=st*-1;
          if((!empty(IS_CreditNote) && IS_CreditNote==true) || (!empty(IS_REFUND) && IS_REFUND==true)  || (!empty(IS_REFUND) && IS_REFUND==true))
		st=st*-1;  
            
	
	var pTrans=0;
	if(!empty(PStocks)&&!empty(PStocks[$(qtyInput).data("product_id")]))    
		pTrans=parseFloat(PStocks[$(qtyInput).data("product_id")]);
        extra_text = '' ; 
        balance = parseFloat($(qtyInput).data("stock_balance"))-parseFloat(st)-pTrans;
        if ( typeof enable_multi_units !== 'undefined' &&enable_multi_units==1 && $(qtyInput).attr("data-factor") > 0)
        {
            extra_text = " "+$(qtyInput).attr("data-factor_name")
            balance = parseFloat(balance/$(qtyInput).attr("data-factor"))//.toFixed(5) 
        }
//        console.log ( extra_text ) ;
//        console.log ( qtyInput ) ;
        if (!Number.isInteger(balance))
        {
            balance = balance.toFixed(2)
        }
	$(qtyInput).data("new_stock_balance", balance+""+extra_text);
//        balance = "";
	tooltip_enable(qtyInput);
}	
$('body').on('keyup change ', '.item-qty', function(){
	updateStock(this);
});
