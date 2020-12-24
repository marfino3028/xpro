$(function(){
	$('.sub-menu a', '#main-nav').click(function(evt){
		evt.stopPropagation();
		return true;
	});
	
	$('.mob-nav-trigger .p-b-none i').click(function(evt){
		$(this).toggleClass('fa-times');
	});
	
	

	$("li.super-menu", '#main-nav').click(function(evt){
		evt.preventDefault();
		var thisMenu = $('div.sub-menu-cont', this);
		var visible = thisMenu.is(':visible');
		var _this = this;

		$('div.sub-menu-cont').hide();
		$("li.super-menu", '#main-nav').removeClass('open-submenu');
		if (!visible){
			thisMenu.show();
			$(_this).addClass('open-submenu');
		}
	});

	if ($('.page-snippets .close, .snippet-content .close').length){

		$('.page-snippets , .snippet-content').hide(); 

		var closedSnippets = [];
		 try {
		if (window.localStorage.closedSnippets){
			closedSnippets = window.localStorage.closedSnippets.split(':');
                }     
		  } catch(e) {
        
    }
		
		$('.page-snippets .close, .snippet-content .close').click(function(){
			var snippet = $(this).parents('.page-snippets , .snippet-content');
			snippet.fadeOut('medium', function(){
				snippet.remove();
			});
			 try {
			if (!window.localStorage.closedSnippets){
				window.localStorage.closedSnippets = '';
			}
			} catch(e) {
			}

			var snippetName = $(this).data('snippet');
			closedSnippets.push(snippetName);
			 try {
			window.localStorage.closedSnippets = closedSnippets.join(':');
			} catch(e) {
                            
                        
			}
			return false;
		}).each(function(){
				 try {
			if (window.localStorage.closedSnippets){
				var snippetName = $(this).data('snippet');
				if ($.inArray(snippetName, closedSnippets) == -1){
					$(this).parents('.page-snippets , .snippet-content').show();
				}
			} else {
				$(this).parents('.page-snippets , .snippet-content').show();
			}
			} catch(e) {
				$(this).parents('.page-snippets , .snippet-content').show();
			}
		});
	}

	$('li.actions-list .more-actions').click(function(evt){
		/* @var evt Event */
		var $parent = $(this).parents('.actions-list');
		var parent = $parent[0];
		var list = $('.submenu-more-actions', parent);
		var visible = $('.submenu-more-actions:visible', parent).length;
		$('.submenu-more-actions').hide();
		$('li.actions-list .more-actions').removeClass('current').find('ul').hide();
		$parent.addClass('current');
		if(!visible){
			list.show();
		} else {
			list.hide();
			$parent.removeClass('current');
		}

		evt.preventDefault();
		evt.stopPropagation();
	});

	$('li.actions-list>ul').hide();

	$(document).click(function(evt) {
		$('li.actions-list').removeClass('current').find(' > ul').hide();
		var $target = $(evt.target);
		if (!$target.hasClass('colors-popup-wrap') && !$target.hasClass('open-color-selector') && !$target.parents('.colors-popup-wrap').length){
			$('.colors-popup-wrap').animate({
				left: -($('.popup-bg').width() + 35)
			}, 'slow');
		}


		if (!$target.hasClass("super-menu") && !$target.parents('.super-menu').length){
			$('div.sub-menu-cont', "#main-nav").hide();
			$("li.super-menu", '#main-nav').removeClass('open-submenu');
		}
	});

	function keepAlive(){
		if (prefix == 'admin'){
			return false;
		}
		$.ajax({
			url: SITE_ROOT + '/' + prefix + '-sess.php',
			dataType: 'json',
			success: function(data){
				if (!data.status){
					if (!$('#LoginBox').length){
						$('<div id="LoginBox"></div>').append($('<iframe></iframe>', {
							frameBorder: 0,
							border: 0,
							style: 'border:none',
							width: 400,
							height: 250,
							src: SITE_ROOT + '?box=1&expire=' + 1
						})).lightbox_me({
							closeClick: false,
							closeEsc: false,
							closeButton: false
						});
					}
				} else {
					if ($('#LoginBox').length){
						removeModal($('#LoginBox'));
						$('#LoginBox').remove();
					}
				}
				setTimeout(keepAlive, 5000);
			}
		});
		return true;
	}

	setTimeout(keepAlive, 15000);


	var tooltipElements = $('.tooltip');
	var tipsImage = $('<img>', {
		'src' : '/css/images/question.png',
		'class' : 'tips-image'
	});

	tipsImage = '<a href="#" tabindex="-1"><img src="/css/images/question.png" class="tips-image" /></a>'

	var tips = {};

	tooltipElements.append(tipsImage).each(function(){
		//		var parent = $(this);
		if ($(this).attr('title') != ''){
			$(this).data('title', this.title).removeAttr('title');
		}

		title = $(this).data('title');
		if (window.localStorage[title +  '_' + SITE_VERSION]) {
			tips[title] = window.localStorage[title +  '_' + SITE_VERSION];
		} else {
			$.ajax({
				url : SITE_ROOT + 'tooltip/' + title,
				tmpStore:{
					'name': title
				},
				success : function(data) {
					if (window.localStorage) {
						window.localStorage[this.tmpStore.name +  '_' + SITE_VERSION] = data;
					}

					tips[this.tmpStore.name] = data;
				}
			})
		}
	});
	

	//Tooltips section
	$('.tooltip a').tooltip({
		showURL: false,
		extraClass: "tooltip-box",
		id: 'tooltip',
		top: 10,
		left: 10,
		bodyHandler: function(){
			var parent = $(this).parent();
			title = parent.data('title');

			var tip = '';
			if (window.localStorage[title +  '_' + SITE_VERSION] != undefined) {
				tip = window.localStorage[title +  '_' + SITE_VERSION];
			} else if (tips[title] != undefined) {
				tip = tips[title];
			}

			return '<div>' + tip + '</div>';
		}
	}).click(function(){
		$(this).mouseover();
		if($('#tooltip').is(':visible'))
			$(this).mouseout();
		else
			$(this).mouseover();
		return false;
	});

});


function removeLoginBox(){
	removeModal($('#LoginBox'));
	$('#LoginBox').remove();
}


$(function() {
$('#myModal').on('shown.bs.modal', function () {
$('.modal-body').css('min-height','352px');
  $('#myInput').focus();
  $('#contact_iframe').attr('src','/owner/sites_enquiries/?box=1');
})
});
