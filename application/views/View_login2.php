
<!-- -------------------------------------------- -->
<!-- ---------- LOGIN LAYOUT--------------------- -->
<!--                                              -->
<!-- File name:                                   -->
<!-- loginLayout.jsp                              -->
<!--                                              -->
<!-- Description:                                 -->
<!-- Special layout for the login page.           -->
<!-- Mostly for customerLogIn.jsp                 -->
<!--                                              -->
<!--                                              -->
<!--BY: Pierre-Marc Coursol de Carufel            -->
<!--                                              -->
<!--CREATION DATE: October 1sd 2015               -->
<!-- -------------------------------------------- -->





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
	LogIn - KLF 
</title>
	



    
    
	

	



	
    
	


<!-- Add favicon -->
<link href="<?php echo base_url();?>/CSS/images/favicon.png" rel="icon" />
<!-- Add favicon  -->

<!-- ================THE MOST IMPORTANT FILES FOR THIS LAYOUT================ -->
<link href="<?php echo base_url();?>/CSS/stylesheets/logSS.css" rel="stylesheet" type="text/css" />
<!-- ======================================================================== -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>/CSS/stylesheets/bootstrap.min3.3.5.css" />
<!-- ======================================================================== -->
	<script src="<?php echo base_url();?>/CSS/scripts/jquery-1.11.3.js"></script>
<!-- ======================================================================== -->
	<script src="<?php echo base_url();?>/CSS/scripts/jquery.form.js"></script>
	<script src="<?php echo base_url();?>/CSS/scripts/gamejab.vanadium.js"></script>
<!-- ======================================================================== -->
	<script src="<?php echo base_url();?>/CSS/scripts/bootstrap.min3.3.5.js"></script>
<!-- =======================         END        ============================= -->


















<!-- Content max length -->


<!-- Video max mirror -->



<!-- Replace zero by under score -->





 














<style>
body{
    background: url('<?php echo base_url();?>/css/images/loginBackgrounds/login-wallpaper2.jpg') no-repeat;
}
</style>


</head>

<body >
<!-- ClickTale Top part -->
<script type="text/javascript">
var WRInitTime=(new Date()).getTime();
</script>
<!-- ClickTale end of Top part -->

<div style="width:100%; margin:0 auto;">
	<!-- -------------------------------------------- -->
<!-- ---------- Client Login New Version -------- -->
<!--                                              -->
<!-- File name:                                   -->
<!-- customerLogIn.jsp                            -->
<!--                                              -->
<!-- Description:                                 -->
<!-- New login interface for Loyalty Source.      -->
<!--                                              -->
<!--                                              -->
<!--BY: Pierre-Marc Coursol de Carufel            -->
<!--                                              -->
<!--CREATION DATE: September 29th 2015            -->
<!-- -------------------------------------------- -->

<script type="text/javascript" src="<?php echo base_url();?>/css/scripts/customerLogIn.js"></script>

<!-- START OF THE MAIN CONTENT OF [customerLogIn.JSP]  -->

<div class="login-background">  

</div>                                        
<div class="login-container-fluid">
	<div class="visible-lg visible-md visible-sm" style="text-align:left;color:#b2b2b2;">
		<div style="float:left;margin-right:15px;"><a href="/homePage.htm"><img src="<?php echo base_url();?>/css/images/klf-logo.png" style="width:100px;margin:20px 0px 0px 20px;" /></a></div>
	
		
		<div style="clear:both;"></div>
	</div>
<div class="row" style="width:100%;"><!-- ROW -->

<div class="leftSide" >

	<!-- FIRST COLUMN -->
	<div id="log_top_part">
		<!-- LS LogIn Picture -->	
		<div style="font-size:35px;text-align:center;">Sign In</div>
		<br/><br/>
		<!-- START OF THE FORM -->
		<div id="globalAdvice"><p id="logNotification"></p></div>
		<form   method="post" action="<?php echo base_url();?>index.php/user/validate">
			<fieldset>
				<table class="loginTab">
					<tr>
						<td id="usernameArea">
						<input type="email" id="username" required name="txtEmail" placeholder="Email" maxlength="30"/>
		        		<div id="usernameError" style="display:none"></div>
		        		</td>
					</tr>
					<tr>
						<td id="passwordArea">
		        			<input type="password" id="password" required name="txtPassword" placeholder="Password" maxlength="30"/>
		        			<label class="show-pwd-text"><input type="checkbox" id="passCB" name="showPass" value="showPassword" style="vertical-align:text-bottom;"/>&nbsp;&nbsp;Show Password</label>
		        			<div id="passwordError" style="display:none"></div>
		        		</td>
					</tr>
					<tr>
						<td><!-- SUBMIT SECTION -->
							<div class="vertical-center">
		          				<input type="submit" id="submitBTN" name="submit" value="SIGN IN" />
		          				<div id="btnLoading"><img src="../images/ajax_roller.gif"/></div>
		          			<div style="clear:both;"></div>
		          			</div>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>




	</div><!-- END OF THE FIRST COLUMN -->
	<!-- BOTTOM OF THE PAGE 1 ==== SHOW ONLY ON LARGER SCREEN -->
	<div class="login-footer">
		<div style="text-align:center;">
			<div style="">
				<div style="font-size:30px;font-family:georgia;margin-bottom:10px;">Engaging Rewards</div>
				<!--div style="float:right;margin-top:-10px;"><img src="/images/insta.png" style="width:40px;"/></div-->
				<!--div class="login-bookmark">BOOKMARK THIS PAGE</div-->
				<div style="clear:both;"></div>
				<div style="font-size:10px;margin-top:10px;">&copy;2005-2016 All Rights Reserved. LoyaltySource.com</div>
			</div>
			<!--div style="float:left;">
				<a>Our Core Values</a><br/>
				<a>Community Involvement</a><br/>
				<a>Company Service Promise</a><br/>
				<a>Our Commitment to Your Security</a><br/>
				<a href="/privacyPolicy.htm">Privacy</a> <span style="color:#ffffff;">&amp;</span> <a href="/termsConditions.htm">Terms</a><br/>
			</div-->
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
</div>



</div><!-- END OF THE CONTAINER DIV -->
</div>

<!-- ClickTale Bottom part -->
<div id="ClickTaleDiv" style="display: none;"></div>
<script type="text/javascript">
if(document.location.protocol!='https:')
  document.write(unescape("%3Cscript%20src='http://s.clicktale.net/WRd.js'%20type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
if(typeof ClickTale=='function') ClickTale(5213,1,"www14");
</script>
<!-- ClickTale end of Bottom part -->

<!-- google analytics-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-332108-4']);
  _gaq.push(['_trackPageview']);


  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-332108-4']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>