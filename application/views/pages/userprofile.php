<?php 
$this->load->library('session');
$this->load->helper(array('form', 'url'));

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

if ($this->session->userdata('level') == 1)
{
	echo form_open('employeeaction/action');
}
else if ($this->session->userdata('level') == 2)
{
	echo form_open('administratoraction/action');
}



 ?>
 
 <ul class="sidenav">
	
		<li><div id="empAvatar"><img src="<?php echo base_url('/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3>Hello <?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		<li><input class="btnEmployeesSub" type="submit" value="Edit your profile" name="empAction"/></li>
		<li><?php if($this->session->userdata('level') == 1) {echo "<input class='btnEmployeesSub' type='submit' value='My Access History' name='empAction'/>";}
				  if($this->session->userdata('level') == 2) {echo "<input class='btnEmployeesSub' type='submit' value='Logs History' name='adminAction'/>";}?><li>
		 
		<?php if($this->session->userdata('level') == 1) {echo "<li><input class='btnEmployeesSub' type='submit' value='Request Access' name='empAction'/></li>";}?>
		

</ul>

<div class="userProfile">

	<div class="usrInfoArea">
	
		
		<fieldset class="userProfile_fieldset">
			<legend><b>Your Personal Information:</b></legend>			
			<table align="center">
				<tr><td><b>Name:</b></td><td><input class="tbInfo" type="text" name="fullname" value="<?php echo $fullname; ?>" readonly></td></tr>
				<tr><td>Join Date:</td><td><input class="tbInfo" type="text" name="joindate" value="<?php echo $joinDate; ?>" readonly></td></tr>
				<tr><td>Birthdate:</td><td><input class="tbInfo" type="text" name="birthdate" value="<?php echo $dob; ?>" readonly></td></tr>
				<tr><td>Phone number:</td><td><input class="tbInfo" type="text" name="phonenbr" value="<?php echo $phonenbr; ?>" readonly></td></tr>
				<tr><td>Email:</td><td><input class="tbInfo" type="text" name="email" value="<?php echo $email; ?>" readonly></td></tr>
			</table>
		</fieldset>
		<br>
		<fieldset class="userProfile_fieldset">
			<legend><b>Position and Department:</b></legend>
			<table align="center">
				<tr><td>Position:</td><td> <input class="tbInfo" type="text" name="title" value="<?php echo $title; ?>" readonly></td></tr>
				<tr><td>Designation Project:</td><td><input class="tbInfo" type="text" name="desgproj" value="<?php echo $designation; ?>" readonly></td></tr>
				<tr><td>Department:</td><td> <input class="tbInfo" type="text" name="department" value="<?php echo $department; ?>" readonly></td></tr> 

			</table>
		</fieldset>
		<br>
		<fieldset class="userProfile_fieldset">
			<legend><b>In case of emargency contact:</b></legend>
			<table align="center">
				<tr><td><b>Name:</b></td><td><input class="tbInfo" type="text" name="fullnamecontact" value="<?php echo $cname; ?>" readonly></td></tr>
				<tr><td>Realtion:</td><td><input class="tbInfo" type="text" name="relationcontact" value="<?php echo $crelation; ?>" readonly></td></tr>
				<tr><td>Phone number:</td><td><input class="tbInfo" type="text" name="phonenbrcontact" value="<?php echo $cphone; ?>" readonly></td></tr>
			</table>
		</fieldset>
	<br>
	</div>
  
  <br>
</form>
<br>
</div>