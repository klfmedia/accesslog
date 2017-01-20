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
	
			<table class="tblUsrInfo" align="center">
				
				<tr><td class="col1UsrInfo">Name:</td><td><div class="tbInfo"><?php echo $fullname;?></div></td></tr>
				<tr><td class="col1UsrInfo">Join Date:</td><td><div class="tbInfo"><?php echo $joinDate; ?></div></td></tr>
				<tr><td class="col1UsrInfo">Birthdate:</td><td><div class="tbInfo"><?php echo $dob; ?></div></td></tr>
				<tr><td class="col1UsrInfo">Phone number:</td><td><div class="tbInfo"><?php echo $phonenbr; ?></div></td></tr>
				<tr><td class="col1UsrInfo">Email:</td><td><div class="tbInfo"><?php echo $email; ?></div></td></tr>
			</table>

		<br>
		<div class="titlesUsrProfile">
			<label><strong>Position and Department:</strong></label>
		</div>
		
			<table class="tblUsrInfo" align="center">
				<tr><td class="col1UsrInfo">Position:</td><td><div class="tbInfo"><?php echo $title; ?></div></td></tr>
				<tr><td class="col1UsrInfo">Designation Project:</td><td><div class="tbInfo"><?php echo $designation; ?></div></td></tr>
				<tr><td class="col1UsrInfo">Department:</td><td><div class="tbInfo"><?php echo $department; ?></div></td></tr> 

			</table>

		<br>
		<div class="titlesUsrProfile">
			<label><strong>In case of emargency contact:</strong></label>
		</div>
		
			<table class="tblUsrInfo" align="center">
				<tr><td class="col1UsrInfo">Name:</td><td><div class="tbInfo"><?php echo $cname; ?></div></td></tr>
				<tr><td class="col1UsrInfo">Realtion:</td><td><div class="tbInfo"><?php echo $crelation; ?></div></td></tr>
				<tr><td class="col1UsrInfo">Phone number:</td><td><div class="tbInfo" ><?php echo $cphone; ?></div></td></tr>
			</table>

	<br>
	</div>
  
  <br>
<br>
</div>