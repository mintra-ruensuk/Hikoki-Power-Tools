/* **************************************************

Name: responsive.js

Description: Settings for Responsive Web Design

Create: 2015.09.30
Update: XXXX.XX.XX

Copyright 2015 Hitachi, Ltd.

***************************************************** */



if (_responsiveLabel == undefined) {
	var _responsiveLabel = {
		"url":"http://www.hitachi.com/",
		"close":"Close"
	};
}
var _headerScrollTop;

function _checkRWD(width) {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		var checkRWD = {
			995	:$("#U995").css("display") == "block",
			768	:$("#U768").css("display") == "block",
			580	:$("#U580").css("display") == "block",
			400	:$("#U400").css("display") == "block"
		}
		return checkRWD[width];
		
	} else {
		
		return false;
		
	}
	
}



(function($){



/* Append to DOM
=========================================================================================== */

if (ua("win") || ua("mac")) $("html").addClass("PC");
if (ua("android")) $("html").addClass("Android");
$("html[class!='JS']").addClass("JS");

if (!ua("ie7") && !ua("ie8")) {
	
	$("head meta[name=viewport]").attr("content", "width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0");
	
	var under995 = function() {
		
		if (_checkRWD(995)) {
			$("html[class!='Under995']").addClass("Under995");
		} else {
			$("html[class*='Under995']").removeClass("Under995");
		}
		
	}
	
}

$(document).ready(function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		var selector = "#HeaderSet .Statement img, #Search .BtnOpen img, #CountryRegion .BtnOpen img, .LV1LinkSet ul img[src$='icon_rss.gif'], .LV2LinkSet ul img[src$='icon_rss.gif'], .DateListStyle1 img[src$='icon_new.gif'], .DateListStyle2 img[src$='icon_new.gif'], #SiteIdentity .Title img[src$='site_id_bar.gif'], #SiteIdentityP img";
		
		$(selector).each(function() {
			var src = $(this).attr("src");
			if (src.indexOf("_hd") == -1) {
				var hdSrc = src.replace(".gif", "_hd.gif");
				$(this).attr("src", hdSrc);
			}
		});
		
		$("#UltraGlobalNavi").before('<p id="GlobalNaviTopButtonSP" class="BtnOpen ShowRWD"><a href="javascript:void(0);"><img src="/image/en/r1/icon/icon_navi_global.gif" width="21" height="21" alt="Menu" /></a></p>');
		$("#SiteIdentity .Title img").each(function() {$(this).after('<span class="ShowRWD">' + $(this).attr("alt") + '</span>');});
		$("body").append('<div id="U995"></div><div id="U768"></div><div id="U580"></div><div id="U400"></div>');
		under995();
		
		$(window).on("load resize", under995);
		
	}
	
});



/* Global Navigation
=========================================================================================== */

$(document).ready(function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		var gn = '';
		var cn = '';
		
		if ($("#GlobalNaviTop")[0]) {
			gn = '<ul id="GlobalNaviTopSP">'
			gn += $("#GlobalNaviTop").html();
			gn += '</ul>';
		}
		
		if ($("#GlobalNavi .CourtesyNavi")[0]) {
			var cn = '<ul id="CourtesyNaviSP">';
			cn += $("#GlobalNavi .CourtesyNavi").html();
			cn += '</ul>';
		}
		
		$("#UltraGlobalNavi").prepend('<div id="GlobalNaviSP" class="ShowRWD">' + gn + cn + '</div>');
		
		if ($("#HorizontalLocalNavi")[0]) {
			var hln = '<ul id="HorizontalLocalNaviSP">';
			hln += $("#HorizontalLocalNavi").html();
			hln += '</ul>';
			$("#GlobalNaviTopSP li.Current").append(hln);
		}
		
	}
	
});


if (!ua("ie7") && !ua("ie8")) {

	_headerScrollTop = function() {
		
		var topID = (navigator.userAgent.indexOf("Safari") !== -1) ? "body" : "html";
		if ($(topID).scrollTop() > 100) {
			$(topID).stop().animate({scrollTop: "0"}, 400, "swing");
		}
		
	}
	
}



/* Link List
=========================================================================================== */

$(document).ready(function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		var boxLink = {
			768	:".ResponsiveLinkListStyle dl.LinkListStyle1, .ResponsiveLinkListStyle dl.LinkListStyle2, .ResponsiveLinkListStyle .ImgW60SetStyle, .ResponsiveLinkListStyle .ImgW120SetStyle, .ResponsiveLinkListStyle .ImgW180SetStyle, .ResponsiveLinkListStyle .ImgW230SetStyle",
			580	:"",
			400	:".ResponsivePanelStyle .Column1"
		}
		
		var addLink = function(width) {
			
			$(boxLink[width]).each(function() {
				if ($(this).find("a")[0]) {
					
					$a = $(this).find("a");
					var js = $a.attr("onclick") || 0;
					if (js) {
						if (js.indexOf("this.href") !== -1) js = js.replace("this.href", "'" + $a.attr("href") + "'");
						$(this).attr("onclick", "if(_checkRWD(" + width + ")) {" + js + "}");
						$a.attr("onclick", "if(!_checkRWD(" + width + ")) {" + js + "}");
					}
					
					$(this).addClass("LinkU" + width)
						.removeClass("hover")		// for Android 4.x
						.on("mouseover", function() {
							if (_checkRWD(width)) $(this).addClass("hover");
						}).on("mouseout", function() {
							if (_checkRWD(width)) $(this).removeClass("hover");
						}).on("click", function(){
							if (_checkRWD(width) && !js) {
								location.href = $(this).find("a").attr("href");
								return false;
							}
						});
					
				}
			});
		}
		
		$(".ResponsiveLinkListStyle .DateListStyle1 dt, .ResponsiveLinkListStyle .DateListStyle2 dt").each(function() {
			$(this).next().find("a").prepend('<strong class="Date">' + $(this).text() + '</strong>');
		});
		
		addLink(768);
		addLink(580);
		addLink(400);
		
	}
	
});



/* Box
=========================================================================================== */

$(document).ready(function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		if (!$(".BoxPatternA .BoxImgStyle, .BoxPatternB .BoxImgStyle")[0]) return false;
		
		$(".BoxPatternA .BoxImgStyle, .BoxPatternB .BoxImgStyle").each(function() {
			var html = $(this).html();
			$(this).next(".Title, h2, h3, h4").after('<p class="BoxImgStyleRWD ShowRWD">' + html + '</p>');
		});
		
	}
	
});



/* Table
=========================================================================================== */

$(document).ready(function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		if ($(".ResponsiveTableStyle1")[0]) {
			
			$(".ResponsiveTableStyle1").each(function() {
				
				var thItem = [];
				$(this).find("tr").eq(0).find("th").each(function(i) {
					if (i > 0) thItem[i] = $(this).text();
				});
				$(this).find("tr").each(function() {
					$(this).find("td").each(function(i) {
						$(this).prepend('<span class="ResponsiveTableHeading">' + thItem[i+1] + '</span>');
					});
				});
				
			});
			
		}
		
		
		if ($(".ResponsiveTableStyle2")[0] || $(".ResponsiveTableStyle3")[0]) {
			
			var contents = "#top, #SiteIdentity, #SiteIdentityS, #SiteIdentityL, #GlobalNavi, #TopicPath, #Contents, .Contents, .FatBanner, .FatMenu, .FatMenuWide, #Footer, #PageTopBottom";
			var topID = (ua("safari")) ? "body" : "html";
			var scrolltop = 0;
			var android4 = navigator.userAgent.indexOf("Android 4") !== -1;		// for Android 4.x
			
			$(".ResponsiveTableStyle2, .ResponsiveTableStyle3").each(function() {
				
				var grid = $(this).parent(".Grid4")[0] ? "Contents965" : "Contents720";
				
				var h = '<div class="ResponsiveTableWindow">';
				h += '<div id="SiteIdentityP">';
				h += '<p><a href="' + _responsiveLabel.url + '"><img src="/image/en/r1/corp_id_hd.gif" alt="Hitachi" width="95" height="29" /></a></p>';
				h += '<ul class="CloseButtonStyle">';
				h += '<li><a href="javascript:void(0);">' + _responsiveLabel.close + '</a></li>';
				h += '</ul>';
				h += '</div>';
				h += android4 ? '<div class="ResponsiveTableContainer">' : '';	// for Android 4.x
				h += '<div class="' + grid + '">';
				h += $(this).find(".TableSet").html();
				h += '</div>';
				h += android4 ? '</div>' : '';					// for Android 4.x
				h += '</div>';
				
				$("body").append(h);
				
			});
			
			$(".LinkSet a").on("click", function() {
				
				scrolltop = $(topID).scrollTop();
				
				var index = $(".LinkSet a").index(this);
				$("html").addClass("ResponsiveTableWindowOpen");
				$(contents + ", #HeaderArea").hide();
				$(".ResponsiveTableWindow").eq(index).show();
				
				$(topID).scrollTop(0);
				
			});
			
			$(".CloseButtonStyle").on("click", function() {
				
				var index = $(".CloseButtonStyle").index(this);
				$("html").removeClass("ResponsiveTableWindowOpen");
				$(contents).removeAttr("style");
				$("#HeaderArea").show();
				$(".ResponsiveTableWindow").eq(index).removeAttr("style");
				
				$(topID).scrollTop(scrolltop);
				
			});
			
		}
		
	}
	
});



/* Branding Image
=========================================================================================== */

$(document).ready(function() {
	
	$(".ResponsiveBrandingImgStyle").each(function() {
		
		if ($(this).find("a")[0] && !$(this).find(".branding-image")[0]) {
			$(this).addClass("hover").on("click", function() {
				location.href = $(this).find("a").attr("href");
			});
		}
		
	});
	
});



/* Image Box
=========================================================================================== */

$(document).ready(function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		$(".ImgBoxStyle1, .ImgBoxStyle2").each(function() {
			var $img = $(this).find(".ImgOnlyStyle");
			var html = $img.html();
			$img.replaceWith('<p class="ImgOnlyStyle"><span>' + html + '</span></p>');
		});
		
	}
	
});

$(window).on("load resize", function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		if (_checkRWD(995) && !_checkRWD(580)) {
			
			$(".ImgBoxStyle1, .ImgBoxStyle2").each(function() {
				
				var $img = $(this).find("span");
				$img.removeAttr("style");
				var boxH = $(this).height();
				var imgW = $img.width();
				var imgH = $img.height();
				
				if (boxH > imgH) {
					imgW = imgW * (boxH / imgH);
					var imgM = ($(this).find(".ImgOnlyStyle").width() - imgW) / 2;
					$img.width(imgW).css({marginLeft:imgM});
				}
				
			});
			
		}
		
	}
	
});



/* Category Navigation
=========================================================================================== */

$(document).ready(function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		$(".CategoryNavi .Bottom").each(function() {
			var cn = '<ul class="BottomSP ShowRWD">';
			cn += $(this).html();
			cn += '</ul>';
			$(this).parent().find(".Top2 .Current").append(cn);
		});
		
	}
	
});



/* Smooth Scroll
=========================================================================================== */

$(document).ready(function() {
	
	var topID = (ua("safari")) ? "body" : "html";
	
	$(".SmoothScroll").unbind().click(function(){
		var link = $(this).attr("href");
		if(link.charAt(0)=="#" && link.charAt(1)!="") {
			var offset = $(link).offset();
			var tid = setTimeout(function() {
				$(topID).stop().animate({scrollTop: offset.top}, 800, "easeInOutCubic", function() {
					location.href = link;
				});
			}, 10);
			return false;
		}
	});
	
});



/* Page Top Button
=========================================================================================== */

$(window).on("load", function() {
	
	if (!ua("ie7") && !ua("ie8")) {
		
		var link = navigator.userAgent.indexOf("Android 2") == -1 ? "#top" : "javascript:void(0)";
		if (!$("#PageTopBottom")[0]) $("body").append('<ul id="PageTopBottom" class="ShowRWD"><li><a href="' + link + '"><span>Page top</span></a></li></ul>');
		
		var topID = (ua("safari")) ? "body" : "html";
		
		$("#PageTopBottom a").on("click", function(){
			if (navigator.userAgent.indexOf("Android 2") == -1) {
				var tid = setTimeout(function() {
					$(topID).stop().animate({scrollTop: 0}, 800, "easeInOutCubic", function() {
						location.href = "#top";
					});
				}, 10);
			} else {
				var scrolltop = $(topID).scrollTop();
				$(topID).scrollTop(scrolltop - 1);
				var tid = setTimeout(function() {
					$(topID).stop().animate({scrollTop: 1}, 800, "easeInOutCubic");
				}, 50);
			}
			return false;
		});
		
	}
	
});



/* for Android 2.x
=========================================================================================== */

$(document).ready(function() {
	
	if (navigator.userAgent.indexOf("Android 2") !== -1) {
		
		$("a").each(function() {
			var link = $(this).attr("href");
			if (typeof link !== "undefined" && link.charAt(0)=="#" && link.charAt(1)!="") {
				if ($(this).hasClass("SmoothScroll")) {
					$(this).attr("href", "javascript:_smoothScroll('" + link + "')")
					.removeClass("SmoothScroll");
				} else {
					$(this).attr("href", "javascript:_internalLink('" + link + "')")
				}
			}
		});
		
		var topID = (ua("safari")) ? "body" : "html";
		
		_smoothScroll = function(link) {
			var offset = $(link).offset();
			var offsettop = offset.top == 0 ? 1 : offset.top;
			var scrolltop = $(topID).scrollTop();
			$(topID).scrollTop(scrolltop - 1);
			var tid = setTimeout(function() {
				$(topID).stop().animate({scrollTop: offsettop}, 800, "easeInOutCubic");
			}, 50);
			return false;
		}
		
		_internalLink = function(link) {
			var offset = $(link).offset();
			var offsettop = offset.top == 0 ? 1 : offset.top;
			$(topID).scrollTop(offsettop);
			return false;
		}
		
	}
	
});



})(jQuery);



if (navigator.userAgent.indexOf("Android 2") !== -1) {
	
	var _smoothScroll;
	var _internalLink;
	
}



/* Base Settings
=========================================================================================== */

// Browser size

function getBrowserWidth() {
	return window.innerWidth || self.innerWidth || (document.documentElement&&document.documentElement.clientWidth) || document.body.clientWidth;
}

function getBrowserHeight() {
	return window.innerHeight || self.innerHeight || (document.documentElement&&document.documentElement.clientHeight) || document.body.clientHeight;
}
