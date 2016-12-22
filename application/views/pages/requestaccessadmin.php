<?php $this->load->library('session'); ?>
<?php $this->load->helper('url'); ?>
<?php $picture= $this->session->userdata('picture'); ?>
<?php echo form_open('administratoraction/action');?> 

<ul class="sidenav">
		<li><div id="empAvatar"><img src="<?php echo base_url('/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3>Hello <?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>

		<li><input class='btnEmployeesSub' type='submit' value='Logs History' name='adminAction'/></li>
		<li><input class="btnEmployeesSub" type="submit" value="My Profile" name="adminAction"/></li>
</ul>

<div class="adminRequest">
<h3>Access Request</h3>
<?php if( count($tempLogsHistoryAdmin) > 0) {?>
<?php echo "<table class ='tbladminrequest' border='1' align='center'>" ?>
	<?php echo"<thead>"; ?>
	<?php echo"<tr><th>Employee</th><th>System</th><th>Reason</th><th>Request Date</th><th>Action</th></tr>"?>
	<?php echo"</thead>"; ?>
		<?php foreach ($tempLogsHistoryAdmin as $oneRec){?>
		
		<?php echo"<tr><td>".$name = $oneRec['firstName']." ".$oneRec['lastName']."</td>"?>
			<?php echo"<td>".$name = $oneRec['resName']."</td>"?>
			<?php echo"<td>".$name = $oneRec['reason']."</td>"?>
			<?php echo"<td>".$name = $oneRec['requestDate']."</td>"?>
			<?php echo"<input type='hidden' name='logID' value= '".$oneRec['acclogID']."'/>"?>
			<?php echo"<td><input type='submit' value='accept' name='accept'/>&nbsp&nbsp"?>
			<?php echo"<input type='submit' value='deny' name='deny'/>&nbsp&nbsp"?>
			<?php echo"<input type='submit' value='pending' name='pending'/></td>"?>
			
		<?php echo"</tr>"?>
		<?php echo"</form>"?>
		<?php } ?>
<?php echo"</table>"?>
<?php } ?>

</div>