/********* Trigger to the Show Password CheckBox ************/
$(document).ready( function() {
	$("#passCB").change(function(){
		if($(this).is(":checked")){
			$("#password").prop("type", "text");
		}
		else{
			$("#password").prop("type", "password");
		}
	});
});

/*DIV background to the bottom of screen size
$(document).ready(function(){
	var body_H = $(document).height();//height of the body
	var bp_H = $("#bp_part").height();//height of the bottom div of BestProduct
	var height_difference;
	if(bp_H < body_H){
		height_difference = body_H - bp_H;
		$("#BP_bottomDiv").height(function(n,c){ return c+height_difference; });
	}
});

$(window).resize(manageBottomDiv);

function manageBottomDiv(){
	$("#BP_bottomDiv").height(function(n,c){ return 0; });
	body_H = $(document).height();//height of the body
	bp_H = $("#bp_part").height();//height of the bottom div of BestProduct
	height_difference = 0;
	if(bp_H < body_H){
		height_difference = body_H - bp_H;
		$("#BP_bottomDiv").height(function(n,c){ return c+height_difference; });
	}
}

//Change the padding of the bottom page area(for mobile) when best product is closed
$("#btn_BP_Close").click(function(){
	$("#mobileBottomArea").css({'padding-top':'160px'});

});
*/

/********** SCRIPT TO DISPLAY THE LOGIN SUCCESS OR FAIL NOTIFICATION *************/
jQuery(document).ready(function(){
	Vanadium.loadAndInit(function(){});
	VanadiumForm.handleSubmit($("#form"), true, function(hasErrors,hasGlobalErrors,response,ajaxStatus){		
		if(ajaxStatus == 'success'){		
			if(!hasGlobalErrors){  //Success
				$("#submitBTN").hide();
				$("#btnLoading").show();
				var username = $("#username").val();
				if(username == "SampleA" || username == "SampleB" || username == "SampleC" || username == "SampleAA" || 
				username == "SampleD" || username == "SampleE"){
					window.location = "/customerLogInSample.htm?type="+username;
				}else{
					window.location = "/homePageLoggedIn.htm";
				}
			}
			else{  //Fail
				if($("#logNotification").text() == "sample"){
					var username = $("#username").val();
					window.location = "/customerLogInSample.htm?type="+username;
				}
				$("#logNotification").hide();
				$("#logNotification").css('color', 'red');
				$("#logNotification").css('visibility', 'visible').hide().fadeIn("slow");
			}
		}
	},"logNotification");
});
/********** SCRIPT TO DISPLAY THE LOGIN SUCCESS OR FAIL NOTIFICATION *************/

/*************** SCRIPT TO BOOKMARK THE PAGE *********************/
/*var url = window.location; 
	var pageName = "Loyalty Source Log In Page";

	function bookmark() { 
		 if(window.sidebar){
	         // Mozilla Firefox Bookmark 
	         window.sidebar.addPanel(pageName, url, "");
	      }else if(window.external){
	          // IE Favorite 
	          window.external.AddFavorite(url, pageName);
	      }else if(window.opera && window.print) {
	         // Opera Hotlist 
	          alert("Press Control + D to bookmark");
	          return true;
	      }else{
	         // Other
	         alert("Press Control + D to bookmark");
	      }
	}
$('.login-bookmark').click(function(e) {
	    var bookmarkURL = window.location.href;
	    var bookmarkTitle = document.title;

	    if ('addToHomescreen' in window && window.addToHomescreen.isCompatible) {
	      // Mobile browsers
	      addToHomescreen({ autostart: false, startDelay: 0 }).show(true);
	    } else if (window.sidebar && window.sidebar.addPanel) {
	      // Firefox version < 23
	      window.sidebar.addPanel(bookmarkTitle, bookmarkURL, '');
	    } else if ((window.sidebar && /Firefox/i.test(navigator.userAgent)) || (window.opera && window.print)) {
	      // Firefox version >= 23 and Opera Hotlist
	      $(this).attr({
	        href: bookmarkURL,
	        title: bookmarkTitle,
	        rel: 'sidebar'
	      }).off(e);
	      return true;
	    } else if (window.external && ('AddFavorite' in window.external)) {
	      // IE Favorite
	      window.external.AddFavorite(bookmarkURL, bookmarkTitle);
	    } else {
	      // Other browsers (mainly WebKit - Chrome/Safari)
	      alert('Press ' + (/Mac/i.test(navigator.userAgent) ? 'Cmd' : 'Ctrl') + '+D to bookmark this page.');
	    }

	    return false;
	  });
$(".login-bookmark").click(function(event) {
	event.preventDefault(); // Stop the link click from doing anything.
	var ev = jQuery.Event("keypress"); // Build an event to simulate keypress.
	ev.which = 68; // Keycode for 'd' is 68
	ev.ctrlKey = true; // Control key is down.
	$(this).trigger(ev); // Fire!
});*/

/*************** SCRIPT TO BOOKMARK THE PAGE *********************/

/*************** CHANGE BACKGROUND ON LOAD *********************/
$(window).load(function() {
	var randomImages = ['login-wallpaper1','login-wallpaper2','login-wallpaper3','login-wallpaper4'];
	var rndNum = Math.floor(Math.random() * randomImages.length);

	var $win = $(this);
	var iMac = $(window).width() > 1920 ? '_imac' : '';

	//var $img = $('.login-background').css('background', 'url("/images/' + randomImages[rndNum] + iMac + '.gif") no-repeat');//.css('repeat','no-repeat');
	
    var $img = $('.login-background').css('background', 'url("/images/loginBackgrounds/' + randomImages[rndNum] + iMac + '.jpg") no-repeat');

	/* function resize() {
	            if (($win.width() / $win.height()) < ($img.width() / $img.height())) {
	              $img.css({'height':'100%','width':'auto'});
	            } else {
	              $img.css({'width':'100%','height':'auto'});
	            }
	        }
	        $win.resize(function() { resize(); }).trigger('resize');*/
});
/*************** CHANGE BACKGROUND ON LOAD *********************/

/*************** LIVE CHAT SCRIPT *********************/
	var __lc = {};
	__lc.license = 6293061;
	
	(function() {
		var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
		lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
	})();
	
	/****** SCRIPT TO HIDE THE DOCKED CHAT WINDOW *******/
	var LC_API = LC_API || {};
	var livechat_chat_started = false;
	
	LC_API.on_before_load = function(){
		// don't hide the chat window only if visitor
		// is currently chatting with an agent
		if (LC_API.visitor_engaged() === false && livechat_chat_started === false){
			LC_API.hide_chat_window();
		}
	};
	
	LC_API.on_chat_started = function(){
		livechat_chat_started = true;
	};
/****** SCRIPT TO HIDE THE DOCKED CHAT WINDOW *******/
	
/*************** LIVE CHAT SCRIPT *********************/