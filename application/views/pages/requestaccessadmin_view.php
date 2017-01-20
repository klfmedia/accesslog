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
			
			
			<?php echo "<td >" ?>
			<div style='text-align: center'>
			<?php $js = 'document.getElementById("id01").style.display="block"'; ?>
			
			<?php echo"<button type='button' name='validateButton' onclick='".$js."; myFunction(".$oneRec['acclogID'].");' class='validatebtns'>Validate</button>"?>
			<?php //echo"<button type='button' name='validateButton' onclick='myFunction(".$oneRec['acclogID'].")' class='validatebtns'>Validate</button>"?>
			</div>
			
			<?php echo"</td>"?>

			
			
		<?php echo"</tr>"?>
		
		<?php } ?>
<?php echo"</table>"?>
<?php } ?>
<?php echo $this->pagination->create_links(); ?>
</div>
<?php echo form_open('home/action');?> 
	<?php echo"<input id='logtempID' type='hidden' name='logID'/>"?> 		
	<div id="id01" class="modal">
		<div class="modal-content animate">
			<div class="container">
				<label><b>Please write a message for your decision</b></label>
				<textarea class="admincomment" name="reason_comment" placeholder="Please write a comment" cols="100%" rows="10" tabindex="4" required ></textarea>
      
			</div>
			
			<div class="container btn-accept-div">
				<input type='submit' value='Accept' name='accept' class='btnaccept'/>
			</div>
			<div class="container btn-deny-div">
				<input type='submit' value='Deny' name='deny' class='btndeny'/>
			</div>

			<div class="container btn-cancel-div" >
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
			</div>
		</div>
	</div>
<?php echo form_close();?>

<script>
function myFunction(myval) {
	document.getElementById('logtempID').value = myval;
	//alert(myval);
	}		
</script>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>