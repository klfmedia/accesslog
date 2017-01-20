<?php 

$fname= $this->session->userdata('firstName');
$lname=$this->session->userdata('lastName');
$title = $this->session->userdata('title');
$designation = $this->session->userdata('designation');
$department = $this->session->userdata('depName');
$joinDate = $this->session->userdata('joinDate');
$dob= $this->session->userdata('dateOfBirth');
$phonenbr= $this->session->userdata('phoneNumber');
$email= $this->session->userdata('mEmail');
$password= $this->session->userdata('mPassword');
$cname= $this->session->userdata('contactName');
$crelation= $this->session->userdata('relationContact');
$cphone= $this->session->userdata('contactPhone');
$picture= $this->session->userdata('picture');

 ?>
 
<ul class="sidenav">
	
		<li><div id="empAvatar"><img src="<?php echo base_url('assets/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3><?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		
		<li>
			<?php 
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
		<li>

		<li>
			<?php 
				if($this->session->userdata('level') == 1) 
				{ 
					echo form_open('home/request');
					echo"<input class='btnEmployeesSub' type='submit' value='Request Access' name='empAction'/>";
					echo form_close();
					
				}
		        if($this->session->userdata('level') == 2) 
				{ 
					echo form_open('home/adminRequestAccess');
					echo"<input class='btnEmployeesSub' type='submit' value='Admin Request Access' name='adminAction'/>";
					echo form_close();
				}
			?>
		</li>
		<li>	
			<?php
				echo form_open('home/myprofile');
				echo"<input class='btnEmployeesSub' type='submit' value='View your profile' name='empAction'/>";
				echo form_close();
			?>
		</li>
</ul>
 
 
<?php $this->load->library('form_validation');?>


<div class="updateuserprofile"> 

<?php echo form_open('home/update'); ?>
	<div class="usrInfoAreaUpdate">
		<div class="titlesUpdateUsrProfile">
			<label><strong>Edit your profile</strong></label>
		</div>
		<h4 style="color:green; text-align:center;"><?php if ($message != null) { echo $message;} ?></h4> 
		<div class="usrInfoAreaUpdate_field">
		
		<span style="color:red;"><?php echo form_error('fname'); ?></span>
		<label>First Name:</label>
		<input class="tbInfoUpdate" type="text" name="fname" value="<?php echo $fname; ?>" autofocus="autofocus">
		
		<span style="color:red;"><?php echo form_error('lname'); ?></span>
		<label>Last Name:</label>
		<input class="tbInfoUpdate" type="text" name="lname" value="<?php echo $lname; ?>" >
		
		<label>Birthdate:</label>
		<input class="tbInfoUpdate" type="date" name="birthdate" value="<?php echo $dob; ?>"  min="1940-01-01" >
		
		<span style="color:red;"><?php echo form_error('phonenbr'); ?></span>
		<label>Phone number:</label>
		<input class="tbInfoUpdate" type="text" name="phonenbr" value="<?php echo $phonenbr; ?>" placeholder="Exp: 514-555-4433">
		
		<span style="color:red;"><?php echo form_error('email'); ?></span>
		<label>Email:</label>
		<input class="tbInfoUpdate" type="text" name="email" value="<?php echo $email; ?>" placeholder="yourmail@mail.com">
		<label>Password:</label>
		<input class="tbInfoUpdate" type="password" name="password" value="<?php echo $password; ?>" placeholder="**********">
		
		<br>
		<br>
		<script>
		$(document).ready(function(){
			$('#radiobuttons').hide();
			// jQuery methods go here...

		});		
		$(document).ready(function(){
			$('#displayAvatar').click(function() {
			$('#radiobuttons').toggle(300);
			});
		    });
		</script>

		<label><span id="displayAvatar">Click here</span> to change your Avatar</label><br>

		
		<div id="radiobuttons">
		<?php 
		$this->load->helper('directory'); //load directory helper
		$dir = "./assets/images/avatars"; // Your Path to folder
		$map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */
		
		$counter=0;
		foreach ($map as $k)
		{?>
			<input type="radio" name="avatar" value="<?php echo $k; ?>"><img src="<?php echo base_url($dir)."/".$k;?>" alt="" style="width:50px; height:50px;">
			
		<?php $counter ++; if ($counter == 4) {echo '<br>'; $counter=0;} } ?>
		</div>
		
		</div>
		<br>
		<br>
		<div class="usrInfoAreaUpdate_field">
			<legend><strong>In case of emargency contact:</strong></legend>
			<span style="color:red;"><?php echo form_error('fullnamecontact'); ?></span>
			<label>Name:</label>
			<input class="tbInfoUpdate" type="text" name="fullnamecontact" value="<?php echo $cname; ?>">
			<span style="color:red;"><?php echo form_error('relationcontact'); ?></span>
			<label>Realtion:</label>
			<input class="tbInfoUpdate" type="text" name="relationcontact" value="<?php echo $crelation; ?>">
			<span style="color:red;"><?php echo form_error('phonenbrcontact'); ?></span>
			<label>Phone number:</label>
			<input class="tbInfoUpdate" type="text" name="phonenbrcontact" value="<?php echo $cphone; ?>" placeholder="Exp: 514-555-4433">
		</div>
		<br>
		<div class="btnUpdateArea">
		<input class="generalbtns" type="submit" value="Update" name="empAction">
		</div>
		<br>
		<br>

		<br>
	</div>
<?php echo form_close(); ?>
  <br>
</div>