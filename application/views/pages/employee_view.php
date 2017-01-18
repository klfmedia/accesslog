<?php //echo form_open('home/request'); //call the class 'employeeaction' (controller) & method 'action'?> 
<?php //$this->load->helper('url'); ?>
<?php $picture= $this->session->userdata('picture'); ?>

<script>
//window.location.hash="no-back-button";
//window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
//window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 



<ul class="sidenav">
	
		<li><div id="empAvatar"><img src="<?php echo base_url('/assets/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3><?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		 
		<li><?php echo form_open('home/request'); ?>
			<input class="btnEmployeesSub" type="submit" value="Request Access" name="empAction"/>
			<?php echo form_close(); ?>
		</li>
		<li>
		<?php echo form_open('home/myprofile');?>
		
		<input class="btnEmployeesSub" type="submit" value="My Profile" name="empAction"/>
		<?php echo form_close(); ?>
		</li>
</ul>


<div class = "employeeAccessHistory">
<?php echo form_open('home/request'); ?>
<div id="title">
	<h3>Your access history</h3>
</div>
	
	<table class="tblemp">
		<thead>
		<tr><th>System</th><th>Request Date</th><th>Reason</th><th>Status</th></tr>
		</thead>
		
		<tbody>

		<?php /*foreach ($tempLogsHistory as $oneRec){*/?>
		<?php foreach ($records as $oneRec){?>
			  <tr><td><?php echo $oneRec['resName'];?></td>
				  <td><?php echo $oneRec['requestDate'];?></td>
			      <td><?php echo $oneRec['reason'];?></td>
			      <td><?php switch ($oneRec['acclogStatus'])
							{
								case '0': 
								{
									echo "Denied";
								}break;
								case '1':
								{
									echo "Accepted";
								}break;
								case '2':
								{
									echo "Pending";
								}break;
								
							}
						?></td></tr>
	      
	
	
		<?php } ?>
		</tbody>
		
	    
	
	
	</table>
	<?php echo $this->pagination->create_links(); ?>
<?php echo form_close(); ?>	
</div>




