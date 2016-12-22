<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta charset="UTF-8">
		<title>KLF Media Inc.</title>
		
		<!--<script src="<?php //echo base_url('css/head_body_style.css'); ?>" type="text/javascript"></script>-->
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/head_body_style.css">
		<!--<link rel = "stylesheet" type = "text/css" 
		href = "<?php //echo base_url(); ?>/css/employeeAccessHistory_style.css">-->
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/login_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/requestAccess_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/userProfile_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/footer_style.css">
		<link rel = "stylesheet" type = "text/css" 
		href = "<?php echo base_url(); ?>/css/updateUserprofile_style.css">
		
	</head>
	<body>
		
			<header >
      
			<div id="leftside-header">
				
				<?php $this->load->helper('html');?>
				
				<?php 
				$image_properties = array('src'   => '/images/klf-Logo.png',
										  'alt'   => 'KLF Logo',
										  'id'    => 'imglogo',
										  'title' => 'KLF Inc.',);

				echo img($image_properties);?><!--<img id="imglogo" src="/images/klf-Logo.png" alt="KLF Logo" >-->

			</div>
			<!--<div id="rigthside-header">
				<a href="login.php">logout</a>
			</div>-->
			<div id="clear-spaces"></div>
			<hr>
			</header>
	
		<h1><?php echo $title; ?></h1>
		
		
