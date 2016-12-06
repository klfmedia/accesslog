<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title']="Welcome KLF Company";
$this->load->view('templates/header', $data);
?>
<!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                   <img src="<?php echo base_url().'/uploads/'.$this->session->userdata('picture');?> " class="img-responsive" />                       
                    </li>
                    <li>
                        <a href="<?php echo base_url().'index.php/user/validate/';?>"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                   
                    <li>
                    
                        <a href="<?php echo base_url().'index.php/user/validate/';?>"><i class="fa fa-mail-reply"></i>Go Back </a>
                    </li>               
                </ul>
            </div>
        </nav>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                  
                </div>
			<div class="row"> 
			
			
			
<form method="post" action="//submit.form" onSubmit="return validateForm();">

<div style="padding-bottom: 18px;font-size : 21px;">PROFILE</div>
<div style="padding-bottom: 18px;font-size : 18px;">Contact Information</div>


<div style="display: flex; padding-bottom: 18px;width : 450px;">
<div style=" margin-left : 0; margin-right : 1%; width : 49%;">First name<br/>
<input type="text" id="txtFirstName" name="txtFirstName"  style="width: 100%;" class="form-control" />
</div>
<div style=" margin-left : 1%; margin-right : 0; width : 49%;">Last name<br/>
<input type="text" id="txtLastName" name="txtLastName" style="width: 100%;" class="form-control" />
</div>
</div>
<div style="padding-bottom: 18px;">Gender<br/>
<span><input type="radio" id="gender_0" name="gender" value="male" <?php if($gender=='male')echo 'checked';?> /> Male</span><br/>
<span><input type="radio" id="gender_1" name="gender" value="female" <?php if($gender!='male')echo 'checked';?>/>Female</span><br/>
</div>
<div style="padding-bottom: 18px;">Email<br/>
<input type="text" id="txtEmail" name="txtEmail"  style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Phone<br/>
<input type="text" id="txtPhone" name="txtPhone"  style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Date Of Birth <br/>
<input type="text" id="txtDOB" name="txtDOB" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Title <br/>
<input type="text" id="txtTitle" name="txtTitle" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Designation<br/>
<input id="txtDesignation" name="txtDesignation" style="width : 450px;" type="text" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Join Date<br/>
<input type="text" id="txtJoinDate" name="txtJoinDate" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Contact Name<br/>
<input type="text" id="txtContactName" name="txtContactName" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Contact Phone<br/>
<input type="text" id="txtContactPhone" name="txtContactPhone" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Department Name<br/>
<input type="text" id="txtDepartment" name="txtDepartment" style="width : 450px;" class="form-control"/>
</div>
</form>

		</div>
 		</div>
 	</div>
 <hr />
 <br/>



<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>
  
        <script type="text/javascript">
        function codeAddress() {
        	
        	document.getElementById('txtLastName').value='<?php echo $lastName;?>';
        	document.getElementById('txtFirstName').value='<?php echo $firstName;?>';
        	document.getElementById('txtEmail').value='<?php echo $mEmail;?>';
        	document.getElementById('txtPhone').value='<?php echo $phoneNumber;?>';
        	document.getElementById('txtDOB').value='<?php echo $dateOfBirth;?>';
        	document.getElementById('txtTitle').value='<?php echo $title;?>';
        	document.getElementById('txtDesignation').value='<?php echo $designation;?>';
        	document.getElementById('txtJoinDate').value='<?php echo $joinDate;?>';  
        	document.getElementById('txtContactName').value='<?php echo $contactName;?>';
      		document.getElementById('txtContactPhone').value='<?php echo $contactPhone ;?>'; 
      		document.getElementById('txtDepartment').value='<?php echo $depName ;?>'; 
        
        }
        window.onload = codeAddress;
        </script>
