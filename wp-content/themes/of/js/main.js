$(document).ready(function(){
	//Login Popup
	$(".login-link a").click(function(){
		$(".faider").fadeIn();
		$(".popup-login").fadeIn();
	});
	//Signup popup
	$(".sing-link a").click(function(){
		$(".faider").fadeIn();
		$(".popup-signup").fadeIn();
		replaceSelects();
	});
	//Creat Popup
	$(".create-link a").click(function(){
		$(".faider").fadeIn();
		$(".popup-create").fadeIn();
	});
	//find Popup
	$(".find-form .form-reset").click(function(){
		$(".find-form .checkbox-frame div").each(function(){
			$(this).addClass("checkboxArea");
			$(this).removeClass("checkboxAreaChecked");
		});
		
	});
	$(".find-link").click(function(){
		$(".find-popup").fadeIn();
		$(this).addClass("find-link-active");
		return false;
	});
	$(".find-popup-close").click(function(){
		$(".find-popup").fadeOut();
		$(".find-link").removeClass("find-link-active");
	});
	//Close  popup : Creat Popup, Signup popup, Login Popup
	$(".close-popup, .faider").click(function(){
		$(".faider").fadeOut();
		$(".popup-login").fadeOut();
		$(".popup-signup").fadeOut();
		$(".popup-create").fadeOut();
	});
	//Send form select-popup
	$(".sent-box .form-text").click(function(){
		$(".sent-drop").fadeIn();
	});
	$(".sent-list a").click(function(){
		$(".sent-drop").fadeOut();
		return false;
	});
	
	//---------------------
	function initInputs (object) {
		var inputs = $(object);
		for (var i = 0; i < inputs.length; i++ ){
			if(inputs[i].type == "text" ) {
				inputs[i].valueHtml = inputs[i].value;
				inputs[i].onfocus = function (){
					this.value = "";
				}
				inputs[i].onblur = function (){
					this.value != ""? this.value = this.value: this.value = this.valueHtml;
				}
			}
		}
	}
	initInputs(".search-form .form-text");
	initInputs(".invites-form .search-friends .form-text");
	initInputs(".interests-form #interests-01");
	initInputs(".image-filter-holder .form-text");
	initInputs(".update-holder .form-text");
	
});
$(window).load(function() {
	//padding for #content
	var ContentPadding = $("#content .content-bottom").height();
	if(ContentPadding > 0){
		$("#content").css("padding-bottom", ""+ContentPadding+"px");
	}
	
	//RSS-link
	var NavHolderItemHeight = $(".nav-holder .item").height();
	var RssLinkHeight = $(".rss-link").height();
	var MarginRssLink = (NavHolderItemHeight - RssLinkHeight) / 2;
	$(".rss-link").css("margin-top", ""+MarginRssLink+"px");
	
	//Height for side column
	var HeightColumn = $("#contour-area").height();
	$("#left-column").css("height", ""+HeightColumn+"px");
	$("#right-column").css("height", ""+HeightColumn+"px");
	var ContentHeight = HeightColumn - ContentPadding - 8;
	$("#content").css("height", ""+ContentHeight+"px");
	
	//Block - user Text align center
	$(".users-box").each(function(){
		var UserBoxHeight = $(this).height();
		var UserBoxTextHeight = $(this).find(".txt-frame").height();
		if(UserBoxHeight > UserBoxTextHeight){
			var UserBoxTextPadding = (UserBoxHeight - UserBoxTextHeight) / 2;
		}
		$(this).find(".txt-frame").css("padding-top", UserBoxTextPadding);
	});
	
	//Height basic-content
	var HeightTwoColumn = $("#two-column").height();
	$("#sidebar").css("height", ""+HeightTwoColumn - 22+"px");
	
});