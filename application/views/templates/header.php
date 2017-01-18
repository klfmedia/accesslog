<?php
header('Cache-Control: no-store, private, no-cache, must-revalidate');     // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);  // HTTP/1.1
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');                  // Date in the past  
header('Expires: 0', false); 
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header ('Pragma: no-cache');

?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>KLF Media Inc.</title>
		
		<!--<script src="<?php //echo base_url('css/head_body_style.css'); ?>" type="text/javascript"></script>-->
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/head_body_foot_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/sidenav_bar.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/login_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/employeeAccessHistory_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/adminAccessHistory_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/requestAccess_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/adminRequestAccess_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/userProfile_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/updateUserprofile_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/assets/css/pagination.css">
		
		<script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
		<!--<script src="<?php //echo base_url();?>/assets/js/updateUsrProfile.js"></script>-->
	</head>
	<body>
	<?php $this->load->helper('html');?>
	<?php $this->load->library('session'); ?>
	<div class="header">
		<div id="leftside-header">
		<a href="http://www.klfmedia.com">
		<?php 
		$image_properties = array('src'=> 'assets/images/klf-Logo.png',
								  'alt'=> 'KLF Logo',
							      'id' => 'imglogo',
								  'title' => 'www.klfmedia.com',);

		echo img($image_properties);?><!--<img id="imglogo" src="/images/klf-Logo.png" alt="KLF Logo" >-->
		</a>		
		</div>
		<div id="rigthside-header">
			<?php 
			if ($this->session->has_userdata('mID'))
			{
				
				echo "<a id='signout' href='".site_url("logout/signout")."'>Sign out</a>";
					//echo 'session has data';
			}
			?>
			<!--<a href="<?php //echo site_url('pages/view') ?>">logout</a>-->
		</div>
		<div id="clear-spaces">
		</div>
		<!--<hr>-->
	</div>
	
		<!--<h1><?php //echo $title; ?></h1>-->