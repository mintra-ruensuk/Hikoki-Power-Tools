/* **************************************************

Name: branding_image.js

Description: JavaScript for Branding Image Module

Create: 2015.09.30
Update: XXXX.XX.XX

Copyright 2015 Hitachi, Ltd.

***************************************************** */



(function($) {



var startTimer;
var stopTimer;
var noBrandingImage = 0;
var brandingImageStart = 0;
var stopSlide = 0;



var brandingImage = function() {
	
	// Initialization
	
	var
		slideID = ['BrandingImgStyle', 'BrandingImgStyle1', 'BrandingImgStyle2'],	// Slide image
		showControl = true,								// Controller visible (true:visible / false:hidden)
		controlImagePath = '/image/en/r5/corporate/branding_image/',			// Controller image path
		interval = 3,									// interval(sec)
		duration = 0.5;									// duration(sec)
		
		time = new Date();
		dummy = time.getTime();
	
	
	// Configuration file
	
	var
		CONTROL_IMAGE_FILE = CONTROL_IMAGE_DIR + 'btn_0',
		CONTROL_IMAGE_FILE_PLAY = 'btn_play',
		CONTROL_IMAGE_FILE_STOP = 'btn_stop',
		CONTROL_IMAGE_EXT = '.png',
		CONTROL_IMAGE_WIDTH = 24,
		CONTROL_IMAGE_HEIGHT = 72,
		CONTROL_IMAGE_ACTIVE_SUFFIX = '_cr',
		CONTROL_IMAGE_HOVER_SUFFIX = '_on';
	
	var
		CLASS_IMAGE_BOX = 'branding-image',
		CLASS_SLIDE = 'slide',
		CLASS_SLIDE_LIST = 'slide-list',
		CLASS_CONTROLLER = 'controller',
		CLASS_ACTIVE = 'active',
		CLASS_FOCUS = 'focus',
		CLASS_PAUSE = 'pause';
	
	var
		TEXT_PAUSE = 'Stop',
		TEXT_PLAY = 'Play';
	
	var
		DATA_INDEX = 'index';
	
	var
		activeIndex = 0,
		playing = true,
		intervalID;
	
	for (var i in slideID) {
		if ($('#' + slideID[i])[0]) {
			var $slideID = $('#' + slideID[i]).addClass(CLASS_IMAGE_BOX);
			break;
		}
	}
	
	function sendTraking(index) {
		var trackingData = slides[index - 1].traking;
		if ((trackingData != undefined) && (typeof dcsMultiTrack == 'function')) {
			dcsMultiTrack(
				'DCS.dcsuri', trackingData.uri,
				'WT.ti', trackingData.ti,
				'WT.dl', trackingData.dl,
				'WT.BannerID', trackingData.id
			);
		}
	}
	
	if (slides.length > 1) {
		
		var $controlList = $slideID
			.append(format('<div class="{0}"><ul></ul></div>', CLASS_CONTROLLER))
			.find('ul:last-child');
		
		function hoverIn() {
			var $this = $(this);
			$controlList.removeClass(CLASS_FOCUS)
			$this.addClass(CLASS_FOCUS);
			
			if ($this.data(DATA_INDEX)) {
				stopTimer();
				showPage($this.data(DATA_INDEX), true);
			};
			setImageSrc($this);
		}
		
		function hoverOut() {
			var $this = $(this);
			$this.removeClass(CLASS_FOCUS);
			setImageSrc($this);
			if (playing) {
				startTimer();
			}
		}
		
		$(format('<li><a href="javascrpit:void(0);"><img src="{0}" alt="{1}" width="28" height="72" /></a></li>',
							getImageFileName(0), TEXT_PAUSE))
			.appendTo($controlList)
			.find('a:last-child')
			.data(DATA_INDEX, 0)
			.on('focusin mouseover', hoverIn)
			.on('focusout mouseout', hoverOut)
			.on('click', function(){
				var $this = $(this);
				$this.toggleClass(CLASS_PAUSE);
				playing = !$this.hasClass(CLASS_PAUSE);
				$this.find('img').attr({
					'src':getImageFileName(0, CLASS_FOCUS),
					'alt':playing ? TEXT_PAUSE : TEXT_PLAY
				});
				if (playing) {
					startTimer();
				} else {
					stopTimer();
				}
				return false;
			});
		
		if (showControl) {
			
			var alt = [];
			
			$.each(slides, function(index, value) {
				
				if (value.text == undefined) value.text = '';
				if (value.imageText == undefined) value.imageText = '';
				if (value.responsiveText == undefined) value.responsiveText = '';
				if (value.responsiveButton == undefined) value.responsiveButton = '';
				
				alt[index] = value.text !== '' ? value.text : value.responsiveText
						.split('<p class="TextStyle1">').join(' ')
						.split('<p class="TextStyle2">').join(' ')
						.split('<p class="TextStyle1 TopBorderSet">').join(' ')
						.split('<p class="TextStyle2 TopBorderSet">').join(' ')
						.split('<p class="TopBorderSet TextStyle1">').join(' ')
						.split('<p class="TopBorderSet TextStyle2">').join(' ')
						.split('</p>').join(' ')
						.split('<br />').join(' ')
						.split('<em>').join('')
						.split('</em>').join('')
						.split('<strong>').join('')
						.split('</strong>').join('')
						.replace(/^\s/, '')
						.replace(/\s$/, '');
				if (value.responsiveButton != '') alt[index] += ' ' + value.responsiveButton;
				
				$(format('<li><a href="{0}"><img src="{1}" alt="{2}" width="76" height="72" /></a></li>',
						value.link, getImageFileName(index + 1), (value.text != '' && value.responsiveText != '') ? alt[index] + ' ' + value.text : alt[index]))
					.appendTo($controlList)
					.find('a:last-child')
					.data(DATA_INDEX, index + 1)
					.on('focusin mouseover', hoverIn)
					.on('focusout mouseout', hoverOut)
					.on('click', function(){
						if (ua("sp")) return false;
						sendTraking($(this).data(DATA_INDEX));
					})
			});
			
			$controlList = $slideID.find('.' + CLASS_CONTROLLER + ' a');
		}
	}
	
	function getImageFileName(index, status) {
		var fileName = controlImagePath;
		if (index) {
			fileName += CONTROL_IMAGE_FILE + index;
		} else {
			if (playing) {
				fileName += CONTROL_IMAGE_FILE_STOP;
			} else {
				fileName += CONTROL_IMAGE_FILE_PLAY;
			}
		}
		switch (status) {
			case CLASS_ACTIVE:
				fileName += CONTROL_IMAGE_ACTIVE_SUFFIX;
				break;
			case CLASS_FOCUS:
				fileName += CONTROL_IMAGE_HOVER_SUFFIX;
				break;
		}
		fileName += CONTROL_IMAGE_EXT;
		return fileName + "?" + dummy;
	}
	
	function setImageSrc($anchorObj) {
		var status = '';
		if ($anchorObj.hasClass(CLASS_FOCUS)) {
			status = CLASS_FOCUS;
		} else if ($anchorObj.hasClass(CLASS_ACTIVE)) {
			status = CLASS_ACTIVE;
		}
		$anchorObj
			.find('img')
			.attr('src', getImageFileName($anchorObj.data(DATA_INDEX), status));
	}
	
	var $slideList = $slideID
		.append(format('<div class="{0}"></div>', CLASS_SLIDE))
		.find('div:last-child');
	
	$.each(slides, function(index, value) {
		
		var html = ['', '', '', '', '', '', ''];
		
		html[0] = format('<div class="{0}"><a href="{1}"><img class="Img" src="{2}" alt="{3}" />',
			CLASS_SLIDE_LIST, value.link, value.image, alt[index]);
		
		if (value.imageText != '') {
			html[1] = format('<img class="ImgText" src="{0}" alt="" /></a>',
				value.imageText);
		} else {
			html[1] = '</a>';
		}
		if (value.responsiveText != '') {
			html[2] = format('<div class="ResponsiveTextSet"><div class="ResponsiveText">{0}</div>',
				value.responsiveText);
			html[4] = '</div>'
		}
		if (value.responsiveButton != '') {
			html[3] = format('<div class="ResponsiveButton"><p class="ButtonStyle1"><a href="{0}">{1}</a></p></div>',
				value.link,value.responsiveButton);
		}
		html[5] = '</div>';
		
		$(html[0] + html[1] + html[2] + html[3] + html[4] + html[5])
			.appendTo($slideList)
			.data(DATA_INDEX, index + 1)
			.on('click', function(){
				sendTraking($(this).data(DATA_INDEX));
				location.href = value.link;
			})
	});
	
	$slideList = $slideID.find('.' + CLASS_SLIDE + ' .' + CLASS_SLIDE_LIST);
	
	function showPage(index) {
		if (index == activeIndex) return;
		
		if (showControl && $controlList) {
			$controlList
				.removeClass(CLASS_ACTIVE)
				.eq(index)
				.addClass(CLASS_ACTIVE);
			$.each($controlList, function(index) {
				if (index) {
					setImageSrc($(this));
				}
			});
		}
		
		$slideList
			.css({zIndex:1}).hide();
		
		$slideListPrev = $slideList.eq(activeIndex - 1);
		$slideListPrev
			.css({position: "absolute", zIndex:2, display: "block"});
		activeIndex = index;
		$slideList
			.eq(index - 1)
			.css({position: "relative", zIndex:3, display: "block"})
			.find("img")
			.css({opacity:0})
			.stop(true,true)
			.animate({opacity:1}, duration * 1000, function() {$slideListPrev.hide();});
	}
	
	startTimer = function() {
		if (playing) {
			clearInterval(intervalID);
			intervalID = setInterval(function(){
				var index = activeIndex + 1;
				if (index > slides.length) {
					index = 1;
			}
				showPage(index);
			}, (interval + duration) * 1000);
		}
	}
	
	stopTimer = function() {
		clearInterval(intervalID);
	}
	
	function format(fmt, arg) {
		var fn = undefined;
		if ($.isPlainObject(arg)) {
			fn = function(str, part) { return arg[part]; }
		} else {
			var args = arguments;
			fn = function(str, part) { return args[parseInt(part)+1] }
		}
		return fmt.replace(/\{(\w+)\}/g, fn);
	}
	
	$("." + CLASS_IMAGE_BOX + " ." + CLASS_CONTROLLER + " ul").hide();
	
	$("." + CLASS_SLIDE_LIST + ":last-child img:last-child").on("load", function() {
		$("." + CLASS_IMAGE_BOX)
			.css({height:"auto"})
			.find(" ." + CLASS_CONTROLLER + " ul")
			.removeAttr("style");
		showPage(1);
		startTimer();
	});
	
	$(window).on("load resize", function() {
		if ($(".ResponsiveText")[0] && $("#U580").css("display") !== "block") return false;
		var i = 0;
		var textH = [];
		var buttonH = [];
		$slideList.show();
		$(".branding-image .ResponsiveTextSet").each(function(i) {
			textH[i] = $(this).find(".ResponsiveText").height();
			buttonH[i] = $(this).find(".ResponsiveButton").height();
		});
		var maxTextH = Math.max.apply(null, textH);
		var maxButtonH = Math.max.apply(null, buttonH);
		$(".branding-image .ResponsiveTextSet").each(function() {
			$(this).height(maxTextH + maxButtonH).find(".ResponsiveButton").css({top:maxTextH + 15});
		});
		$slideList.hide().each(function() {
			if ($(this).css("z-index") == "3") $(this).show();
		});
	});
	
}



// Run

$(document).ready(function() {
	
	noBrandingImage = $("body").hasClass("Category") || $("body").hasClass("Syllabary") || $("body").hasClass("Keyword");
	
	if (!noBrandingImage || (noBrandingImage && !_checkRWD(768))) {
		brandingImageStart = 1;
		brandingImage();
	}
	
});

$(window).on("load resize", function() {
	
	if (noBrandingImage && !brandingImageStart && !_checkRWD(768)) {
		brandingImageStart = 1;
		brandingImage();
	} else if (noBrandingImage && brandingImageStart && _checkRWD(768) && !stopSlide) {
		stopSlide = 1;
		stopTimer();
	} else if (noBrandingImage && brandingImageStart && !_checkRWD(768) && stopSlide) {
		stopSlide = 0;
		startTimer();
	}
	
});



})(jQuery);
