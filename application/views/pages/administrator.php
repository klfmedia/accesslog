<?php $this->load->library('session'); ?>
<?php $this->load->helper('url'); ?>
<?php $picture= $this->session->userdata('picture'); ?>
<?php echo form_open('administratoraction/action');?> 
<ul class="sidenav">
		<li><div id="empAvatar"><img src="<?php echo base_url('/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3>Hello <?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		<?php if( count($tempLogsHistoryAdmin) > 0) {
			
			echo "<li><input class='btnEmployeesSub' type='submit' value='Admin Request Access' name='adminAction'/></li>";
			
		}?>
				
		

		<li><input class="btnEmployeesSub" type="submit" value="My Profile" name="adminAction"/></li>
</ul>


<div class = "adminAccessHistory">


<h3>Access History</h3>

<?php if( count($tempLogsHistoryAdmin) > 0) {?>

<?php echo "<table class='tblAdmin'  align='center'>" ?>
	<?php echo "<thead>" ?>
	<?php echo"<tr><th>Employee</th><th>System</th><th>Reason</th><th>Request Date</th></tr>"?>
	<?php echo "</thead>" ?>
	<?php echo "<tbody>" ?>
		<?php foreach ($tempLogsHistoryAdmin as $oneRec){?>
		
		<?php echo"<tr><td>".$name = $oneRec['firstName']." ".$oneRec['lastName']."</td>" ?>
		<?php echo"<td>".$name = $oneRec['resName']."</td>" ?>
		<?php echo"<td>".$name = $oneRec['reason']."</td>"?>
		<?php echo"<td>".$name = $oneRec['requestDate']."</td>"?>
		<?php echo"</tr>"?>
		
		<?php } ?>
<?php echo "</tbody>" ?>	
<?php echo"</table>"?>
<?php 
	}else
	  {
		echo "<div id='nologsAdv'>";
		echo "<h4 style='color:green'>There is not logs to validate</h4>";
		echo "</div>";
	  }

?>
		<br>
		<br>
</form>

</div>