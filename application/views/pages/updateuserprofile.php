<?php 
$this->load->library('session');
$this->load->helper(array('form', 'url'));

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
		
		<li><?php if($this->session->userdata('level') == 1) {echo "<input class='btnEmployeesSub' type='submit' value='My Access History' name='empAction'/>";}
				  if($this->session->userdata('level') == 2) {echo "<input class='btnEmployeesSub' type='submit' value='Logs History' name='adminAction'/>";}?><li>

		<li><?php if($this->session->userdata('level') == 1) { echo"<input class='btnEmployeesSub' type='submit' value='Request Access' name='empAction'/>";}
		          if($this->session->userdata('level') == 2) { echo"<input class='btnEmployeesSub' type='submit' value='Admin Request Access' name='adminAction'/>";}?></li>
</ul>
 
 
<?php $this->load->library('form_validation');?>

<div class="updateuserprofile"> 
<h4 style="color:red;"><?php echo validation_errors(); ?></h4> 
	<div class="usrInfoAreaUpdate">
		<fieldset class="usrInfoAreaUpdate_fieldset">
		<legend><b>Edit your profile:</b></legend>
		<h4 style="color:green; text-align:center;"><?php if ($message != null) { echo $message;} ?></h4> 
		
		<label>First Name:</label>
		<input type="text" name="fname" value="<?php echo $fname; ?>" autofocus="autofocus">
		<label>Last Name:</label>
		<input type="text" name="lname" value="<?php echo $lname; ?>" >
		<label>Birthdate:</label>
		<input type="date" name="birthdate" value="<?php echo $dob; ?>"  min="1940-01-01" >
		<label>Phone number:</label>
		<input type="text" name="phonenbr" value="<?php echo $phonenbr; ?>" placeholder="Exp: 514-555-4433">
		<label>Email:</label>
		<input type="text" name="email" value="<?php echo $email; ?>" placeholder="yourmail@mail.com">
		<label>Password:</label>
		<input type="text" name="password" value="<?php echo $password; ?>">
		<label>Change your Avatar:</label><br>
		<div id="radiobuttons">
		<?php 
		$this->load->helper('directory'); //load directory helper
		$dir = "./images/avatars"; // Your Path to folder
		$map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */
		
		$counter=0;
		foreach ($map as $k)
		{?>
			<input style="border: 1px solid blue;" type="radio" name="avatar" value="<?php echo $k; ?>"><img src="<?php echo base_url($dir)."/".$k;?>" alt="" style="width:50px; height:50px;">
			
		<?php $counter ++; if ($counter == 2) {echo '<br>'; $counter=0;} } ?>
		</div>
		
		</fieldset>
		<br>
		<br>
		<fieldset class="usrInfoAreaUpdate_fieldset">
			<legend><b>In case of emargency contact:</b></legend>
			<label>Name:</label>
			<input type="text" name="fullnamecontact" value="<?php echo $cname; ?>">
			<label>Realtion:</label>
			<input type="text" name="relationcontact" value="<?php echo $crelation; ?>">
			<label>Phone number:</label>
			<input type="text" name="phonenbrcontact" value="<?php echo $cphone; ?>" placeholder="Exp: 514-555-4433">
			

		</fieldset>
		<br>
		<div class="btnUpdateArea">
		<input id="btnUpdate" type="submit" value="Update" name="empAction">
		</div>
		<br>
		<br>

		<br>
	</div>
</form>
  <br>
</div>

