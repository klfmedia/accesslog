<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta charset="UTF-8">
		<title>KLF Media Inc.</title>
		
		<!--<script src="<?php //echo base_url('css/head_body_style.css'); ?>" type="text/javascript"></script>-->
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/head_body_foot_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/sidenav_bar.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/login_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/employeeAccessHistory_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/adminAccessHistory_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/requestAccess_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/adminRequestAccess_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/userProfile_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>./css/footer_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/updateUserprofile_style.css">
		
	</head>
	<body>
	<?php $this->load->helper('html');?>
	<?php $this->load->library('session'); ?>
	<div class="header">
		<div id="leftside-header">		
		<?php 
		$image_properties = array('src'   => '/images/klf-Logo.png',
										  'alt'   => 'KLF Logo',
										  'id' => 'imglogo',
										  'title' => 'KLF Inc.',);

		echo img($image_properties);?><!--<img id="imglogo" src="/images/klf-Logo.png" alt="KLF Logo" >-->
				
		</div>
		<div id="rigthside-header">
			<?php 
			if ($this->session->has_userdata('mID'))
			{
				echo "<a id='signout' href='".site_url("pages/logout")."'>Sign out</a>";
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