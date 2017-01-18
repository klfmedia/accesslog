<?php //$this->load->library('session'); ?>
<?php $this->load->helper('url'); ?>
<?php $picture= $this->session->userdata('picture'); ?>
<?php //echo form_open('home/action'); ?>

<ul class="sidenav">
	
		<li><div id="empAvatar"><img src="<?php echo base_url('/assets/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3><?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		<li>
			<?php echo form_open('home/myprofile');?>
			<input class="btnEmployeesSub" type="submit" value="My Profile" name="empAction"/>
			<?php echo form_close(); ?>
		</li>
		<li>
			<?php echo form_open('home/empLogs'); ?>
			<input class="btnEmployeesSub" type="submit" value="My Access History" name="empAction"/>
			<?php echo form_close(); ?>
		</li>
		
		

		
		
		

</ul>


<div class="empRequest">
<?php echo form_open('home/send'); ?>
	
	<div class="requestArea">
		<br>
		<br>
		
		<h4 style="color:green; text-align:center;"><?php if ($message != null) { echo $message;} ?></h4> 
		<span style="color:red;"><?php echo form_error('resources_option'); ?></span>
		<select id="selectRequest" name="resources_option">
			<option  value="0">---Select a System---</option>
			<!----- Displaying fetched resources in options using foreach loop ---->
			<?php foreach($tempResult as $oneResource): ?>
			<option value="<?php echo $oneResource['resourcesID']; ?>"><?php echo $oneResource['resName']; ?></option>
			<?php endforeach;?>
		
		</select>
		<br>
		<br>
		<br>
		<span style="color:red;"><?php echo form_error('reason_comment'); ?></span>
		<textarea id="comment" name="reason_comment" placeholder="Reason for this request?" cols="100%" rows="10" tabindex="4"></textarea>
		<br/>
		<br/>
		<input class="generalbtns" type="submit" value="Send" name="empAction"/>
		<br>
		<br>

	</div>

<?php echo form_close(); ?>

</div>