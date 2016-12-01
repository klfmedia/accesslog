<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta charset="UTF-8">
		<title>KLF Media Inc.</title>
		<style>
			body {
			background-image: url("./images/klfBackGround.png");
			background-size: 1896px 1000px;
			background-repeat: no-repeat;
			
			}
			header {
				color: red;
				text-align: center;
			} 
			#imgLogo{
				width: 150px;
				height: 54ps;
				
			}
			#leftside-header{
				float:left;
				/*clear: both;*/
			}
			#rigthside-header{
				float: right;
				/*clear: both;*/
			}
			#clear-spaces{
				clear: both;
			}
    
	</style>
	</head>
	<body>
		<div >
		</div>
			<header>
      
			<div id="leftside-header">
				<img id="imgLogo" src="./images/klf-Logo.png" alt="KFLMedia Inc">
			</div>
			<div id="rigthside-header">
				<a href="login.php">logout</a>
			</div>
			<div id="clear-spaces"></div>
			<hr>
			</header>
	
		<h1><?php echo $title; ?></h1>
		
		
