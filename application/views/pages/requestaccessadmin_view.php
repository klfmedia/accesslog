<?php $picture= $this->session->userdata('picture'); ?>

<ul class="sidenav">
		<li><div id="empAvatar"><img src="<?php echo base_url('assets/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3><?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>

		<li>
			<?php echo form_open('home/adminLogs'); ?>
			<input class='btnEmployeesSub' type='submit' value='Logs History' name='adminAction'/>
			<?php echo form_close();?>
		</li>
		<li>
			<?php echo form_open('home/myprofile');?>
			<input class="btnEmployeesSub" type="submit" value="My Profile" name="adminAction"/>
			<?php echo form_close(); ?>
		</li>
</ul>

<div class="adminRequest">
<h3>Access Request</h3>
<?php if( count($records) > 0) {?>
<?php echo "<table class ='tbladminrequest' border='1' align='center'>" ?>
	<?php echo"<thead>"; ?>
	<?php echo"<tr><th>Employee</th><th>System</th><th>Reason</th><th>Request Date</th><th>Action</th></tr>"?>
	<?php echo"</thead>"; ?>
		<?php foreach ($records as $oneRec){?>
		
		<?php echo"<tr><td>".$oneRec['firstName']." ".$oneRec['lastName']."</td>"?>
			<?php echo"<td>".$oneRec['resName']."</td>"?>
			<?php echo"<td>".$oneRec['reason']."</td>"?>
			<?php echo"<td>".$oneRec['requestDate']."</td>"?>
			<?php echo form_open('home/action');?> 
			<?php echo"<input type='hidden' name='logID' value= '".$oneRec['acclogID']."'/>"?>
			<?php echo"<td><input type='submit' value='Accept' name='accept'/>&nbsp&nbsp"?>
			<?php echo"<input type='submit' value='Deny' name='deny'/>"?>
			<?php echo"</td>"?>
			<?php echo form_close();?>
		<?php echo"</tr>"?>
		
		<?php } ?>
<?php echo"</table>"?>
<?php } ?>
<?php echo $this->pagination->create_links(); ?>
</div>

