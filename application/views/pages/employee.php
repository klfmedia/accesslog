<?php echo form_open('employeeaction/action'); //call the class 'validation' (controller) & method 'index'?> 
<?php $this->load->library('session'); ?>
<?php $this->load->helper('url'); ?>
<?php $picture= $this->session->userdata('picture'); ?>

<!--<div class="spacer">
</div>-->
<ul class="sidenav">
	
		<li><div id="empAvatar"><img src="<?php echo base_url('/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3>Hello <?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		<li><input class="btnEmployeesSub" type="submit" value="Request Access" name="empAction"/></li>
		<li><input class="btnEmployeesSub" type="submit" value="My Profile" name="empAction"/></li>

</ul>

<!--<div class="buttons_employeeAccessHistory">
	<input type="submit" value="Request Access" name="empAction"/>
	<br>
	<br>
	<input type="submit" value="My Profile" name="empAction"/><br>
	<br>
</div>

<br>
<br>-->
<div class = "employeeAccessHistory">

<div id="title">
	<h3>Your access history</h3>
</div>
	
	<table class="tblemp">
		<thead>
		<tr><th>System</th><th>Request Date</th><th>Reason</th><th>Status</th></tr>
		</thead>
		
		<tbody>

		<?php foreach ($tempLogsHistory as $oneRec){?>
			  <tr><td><?php echo $oneRec['resName'];?></td>
				  <td><?php echo $oneRec['requestDate'];?></td>
			      <td><?php echo $oneRec['reason'];?></td>
			      <td><?php switch ($oneRec['acclogStatus'])
							{
								case '0': 
								{
									echo "Deny";
								}break;
								case '1':
								{
									echo "Accept";
								}break;
								case '2':
								{
									echo "In Progress";
								}break;
								
							}
						?></td></tr>
	      
	
	
		<?php } ?>
		</tbody>
	
	
	
	</table>

</div>


