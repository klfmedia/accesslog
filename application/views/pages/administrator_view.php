<?php $picture= $this->session->userdata('picture'); ?>

<ul class="sidenav">
		<li><div id="empAvatar"><img src="<?php echo base_url('/assets/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3><?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		<?php if( count($records) > 0) {
			echo form_open('home/adminRequestAccess');
			echo "<li><input class='btnEmployeesSub' type='submit' value='Admin Request Access' name='adminAction'/></li>";
			echo form_close();
			
		}?>
				
		

		<li>
			<?php echo form_open('home/myprofile');?>
			<input class="btnEmployeesSub" type="submit" value="My Profile" name="adminAction"/>
			<?php echo form_close(); ?>
		</li>
</ul>


<div class = "adminAccessHistory">


<h3>Access History</h3>

<?php if( count($records) > 0) {?>

<?php echo "<table class='tblAdmin'  align='center'>" ?>
	<?php echo "<thead>" ?>
	<?php echo"<tr><th>Employee</th><th>System</th><th>Reason</th><th>Request Date</th></tr>"?>
	<?php echo "</thead>" ?>
	<?php echo "<tbody>" ?>
		<?php foreach ($records as $oneRec){?>
		
		<?php echo"<tr><td>".$name = $oneRec['firstName']." ".$oneRec['lastName']."</td>" ?>
		<?php echo"<td>".$name = $oneRec['resName']."</td>" ?>
		<?php echo"<td>".$name = $oneRec['reason']."</td>"?>
		<?php echo"<td>".$name = $oneRec['requestDate']."</td>"?>
		<?php echo"</tr>"?>
		
		<?php } ?>
<?php echo "</tbody>" ?>	
<?php echo"</table>"?>

<?php echo form_close(); ?>	
<?php 
	}else
	  {
		echo "<div id='nologsAdv'>";
		echo "<h4 style='color:green'>There is not logs to validate</h4>";
		echo "</div>";
	  }

?>

<?php echo $this->pagination->create_links(); ?>

		<br>
		<br>


</div>