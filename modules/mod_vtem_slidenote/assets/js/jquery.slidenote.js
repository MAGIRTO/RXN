/*
 * SlideNote
 * A jQuery Plugin for flexible, customizable sliding notifications.
 *
 * Copyright 2010 - 2011 Tom McFarlin, http://tommcfarlin.com
 * Released under the MIT License
 * More information: http://slidenote.info
*/

(function($) {
	$.slideNoteCount = 0;
	$.fn.slideNote = function(options) {
		$.slideNoteCount += this.length;
		var opts = $.extend({}, $.fn.slideNote.defaults, $.fn.slideNote.private, options);
		return this.each(function() {
			var $note = _init(this, opts);
			if(opts.where <= 0){
				if(opts.useCookie){
					var hasSeenPopup = _GetCookie('slideNote');
					 if (hasSeenPopup == null || hasSeenPopup == '')
						$(window).load(function (){	$note.trigger('slideIn'); });
					 _SetCookie('slideNote', 'true', opts.cookieDay);
				}else
					$(window).load(function (){	$note.trigger('slideIn'); });
			}else{
				$(window, document).scroll(function() {
					if($(this).scrollTop() === 0) {
						opts._bIsClosed = false;
					}
					if($(this).scrollTop() > opts.where) {
						if(!$note.is(':visible') && !opts._bIsClosed) {
							$note.trigger('slideIn');
						}
					} else if ($(this).scrollTop() < opts.where && $note.queue('fx')[0] !== 'inprogress') {
						if($note.is(':visible')) {
							$note.trigger('slideOut');
						}
					}
				});
			}
		});
		
	};
	
	function _init(obj, opts) {
		$(obj).css(opts.corner, -1 * $(obj).outerWidth()).css({'position': 'fixed', 'bottom': 0, 'width': opts.width, 'height': opts.height})
			.bind('slideIn', function(evt){_slideIn(evt, obj, opts);})	
			.bind('slideOut', function(evt){_slideOut(evt, obj, opts);});
		//_retrieveData(obj, opts);
		_addCloseImage(obj, opts);
		return $(obj);
	}
	
	function _slideIn(evt, obj, opts) {		
		if(opts.displayCount === -1 || opts._iCurrentDisplayCount < opts.displayCount) {
			var direction = opts.corner === 'right' ? { 'right' : 0 } : { 'left' : 0 } ;
			$(obj).show().animate(direction, 1000, 'swing', function() {
				if(opts.displayCount !== -1)
					opts._iCurrentDisplayCount++;
			if(opts.onSlideIn !== null)
				opts.onSlideIn();
			});
		}
	}
	
	function _slideOut(evt, obj, opts) {
		var direction = opts.corner === 'right' ? { 'right' : -1 * $(obj).outerWidth() } : { 'left' : -1 * $(obj).outerWidth() };
		$(obj).animate(direction, 1000, 'swing', function() {
			if($.slideNoteCount === 1)
				$(obj).stop(true).hide();
			else
				$(obj).hide();		
			if(opts.closeImage !== null && evt.target.id === $(obj).attr('id') + '_close')
				opts._bIsClosed = true;		
			if(opts.onSlideOut !== null)
				opts.onSlideOut();		
		});
	}
/*	
	function _retrieveData(obj, opts) {
		if(opts.url !== null) {
			if(opts.container.length !== 0 && opts.container.indexOf('#') === -1)
				opts.container = '#' + opts.container;
			var sUrl = opts.container.length === 0 ? opts.url : opts.url + ' ' + opts.container;
			$(obj).load(sUrl, function() {
				if(opts.closeImage !== null)
					_addCloseImage(obj, opts);
			});
		}
	}
*/	
	function _addCloseImage(obj, opts) {
		if(opts.closeImage !== null) {
			var oImg = document.createElement('img');
			$(oImg).attr('src', opts.closeImage).attr('alt', 'close').attr('id', $(obj).attr('id') + '_close').addClass('slideNoteClose').click(function(evt){
				evt.stopPropagation();
				$(this).trigger('slideOut');
			});
			$(obj).prepend(oImg);
		}
	}
	
	function _SetCookie(c_name,value,expiredays){
		var exdate=new Date();
		exdate.setDate(exdate.getDate()+expiredays);
	    document.cookie=c_name+ "=" +escape(value)+ ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
	}

	function _GetCookie(c_name){
		if (document.cookie.length>0){
		  c_start=document.cookie.indexOf(c_name + "=")
		  if (c_start!=-1){
			c_start=c_start + c_name.length+1
			c_end=document.cookie.indexOf(";",c_start)
			if (c_end==-1) c_end=document.cookie.length
			return unescape(document.cookie.substring(c_start,c_end))
		  }
		}
		return "";
	}

	$.fn.slideNote.defaults = {
		//url: null, container: '',
		width: '35%',
		height: 'auto',
		where: 640,
		corner: 'right',
		closeImage: null,
		displayCount: -1,
		useCookie: false, //Use Cookie to show the slideNote on first load page
		cookieDay: 7,
		onSlideIn: null,
		onSlideOut: null
	};
	
	$.fn.slideNote.private = {
		_bIsClosed: false,
		_iCurrentDisplayCount: 0
	}
	
})(jQuery);