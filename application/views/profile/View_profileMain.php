<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title']="Welcome KLF Company";
$this->load->view('templates/header', $data);
$memberInfo = array(
		"txtmID"=>$member["mID"],
		"txtPicture"=>$member["picture"],
);
form_hidden($memberInfo);
?>
<!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                  
                   		<img src="<?php echo base_url().'/uploads/'.$member['picture'];?> " class="img-responsive" />                       
              		
                    </li>
                    <li>
                        <a href="<?php echo base_url().'index.php/user/validate/';?>"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                     <li>                   
                        <a href="<?php echo base_url().'index.php/user/changePicture/';?>" id="hrefChangePicture"><i class="fa fa-wrench"></i>Change Picture </a>
                    </li>
                     <li>                   
                        <a href="<?php echo base_url().'index.php/user/changePassword/';?>" id="hrefChangePassword"><i class="fa fa-wrench"></i>Change Password </a>
                    </li>
                    <li>                   
                        <a href="#" id="hrefEdit"><i class="fa fa-wrench"></i>Edit </a>
                    </li>
                    <li>                   
                        <a id="hrefGoBack" href="<?php echo base_url().'index.php/user/validate/';?>"><i class="fa fa-mail-reply"></i>Go Back </a>
                    </li>  
                     
                     <li>                   
                        <a id="hrefCancel" href="<?php echo base_url().'index.php/user/displayProfile/';?>" ><i class="fa fa-close"></i>Cancel </a>
                    </li>           
                </ul>
            </div>
        </nav>

<div id="page-wrapper">
  <div id="page-inner">  
  	<div style="padding-bottom: 18px;font-size : 21px;">PROFILE</div>
	<div style="padding-bottom: 18px;font-size : 18px;">Contact Information</div>            			
      <?php	 	
		 $this->load->view($subview,$data);
		 ?>

	</div>
 </div>
 <hr />
 <br/>



<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>
  		