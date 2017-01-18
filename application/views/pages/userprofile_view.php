<?php 
$fullname= $this->session->userdata('firstName')." ".$this->session->userdata('lastName');
$title = $this->session->userdata('title');
$designation = $this->session->userdata('designation');
$department = $this->session->userdata('depName');
$joinDate = $this->session->userdata('joinDate');
$dob= $this->session->userdata('dateOfBirth');
$phonenbr= $this->session->userdata('phoneNumber');
$email= $this->session->userdata('mEmail');
$cname= $this->session->userdata('contactName');
$crelation= $this->session->userdata('relationContact');
$cphone= $this->session->userdata('contactPhone');
$picture= $this->session->userdata('picture');

 ?>
 
 <ul class="sidenav">
	
		<li><div id="empAvatar"><img src="<?php echo base_url('/assets/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3><?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		<li><?php echo form_open('home/editProfile');?>
			<input class="btnEmployeesSub" type="submit" value="Edit your profile" name="empAction"/></li>
			<?php echo form_close(); ?>
		<li><?php 
				if($this->session->userdata('level') == 1) 
				{
					echo form_open('home/empLogs');
					echo "<input class='btnEmployeesSub' type='submit' value='My Access History' name='empAction'/>";
					echo form_close();
				}
				if($this->session->userdata('level') == 2) 
				{
					echo form_open('home/adminLogs');
					echo "<input class='btnEmployeesSub' type='submit' value='Logs History' name='adminAction'/>";
					echo form_close();
				}
					
			?>
		</li>
		 
		<?php 
			if($this->session->userdata('level') == 1) 
			{
				echo form_open('home/request');
				echo "<li><input class='btnEmployeesSub' type='submit' value='Request Access' name='empAction'/></li>";
				echo form_close();
			}
		?>
		

</ul>

<div class="userProfile">

	<div class="usrInfoArea">
		
		<div class="titlesUsrProfile">
			<label><strong>Your Personal Information:</strong></label>
		</div>
		<!--<fieldset class="userProfile_fieldset">	-->		
			<table class="tblUsrInfo" align="center">
				<tr><td class="col1UsrInfo">Name:</td><td><input class="tbInfo" type="text" name="fullname" value="<?php echo $fullname; ?>" readonly></td></tr>
				<tr><td class="col1UsrInfo">Join Date:</td><td><input class="tbInfo" type="text" name="joindate" value="<?php echo $joinDate; ?>" readonly></td></tr>
				<tr><td class="col1UsrInfo">Birthdate:</td><td><input class="tbInfo" type="text" name="birthdate" value="<?php echo $dob; ?>" readonly></td></tr>
				<tr><td class="col1UsrInfo">Phone number:</td><td><input class="tbInfo" type="text" name="phonenbr" value="<?php echo $phonenbr; ?>" readonly></td></tr>
				<tr><td class="col1UsrInfo">Email:</td><td><input class="tbInfo" type="text" name="email" value="<?php echo $email; ?>" readonly></td></tr>
			</table>
		<!--</fieldset>-->
		<br>
		<div class="titlesUsrProfile">
			<label><strong>Position and Department:</strong></label>
		</div>
		<!--<fieldset class="userProfile_fieldset">-->
			<table class="tblUsrInfo" align="center">
				<tr><td class="col1UsrInfo">Position:</td><td> <input class="tbInfo" type="text" name="title" value="<?php echo $title; ?>" readonly></td></tr>
				<tr><td class="col1UsrInfo">Designation Project:</td><td><input class="tbInfo" type="text" name="desgproj" value="<?php echo $designation; ?>" readonly></td></tr>
				<tr><td class="col1UsrInfo">Department:</td><td> <input class="tbInfo" type="text" name="department" value="<?php echo $department; ?>" readonly></td></tr> 

			</table>
		<!--</fieldset>-->
		<br>
		<div class="titlesUsrProfile">
			<label><strong>In case of emargency contact:</strong></label>
		</div>
		<!--<fieldset class="userProfile_fieldset">-->
			<table class="tblUsrInfo" align="center">
				<tr><td class="col1UsrInfo">Name:</td><td><input class="tbInfo" type="text" name="fullnamecontact" value="<?php echo $cname; ?>" readonly></td></tr>
				<tr><td class="col1UsrInfo">Realtion:</td><td><input class="tbInfo" type="text" name="relationcontact" value="<?php echo $crelation; ?>" readonly></td></tr>
				<tr><td class="col1UsrInfo">Phone number:</td><td><input class="tbInfo" type="text" name="phonenbrcontact" value="<?php echo $cphone; ?>" readonly></td></tr>
			</table>
		<!--</fieldset>-->
	<br>
	</div>
  
  <br>
<br>
</div>