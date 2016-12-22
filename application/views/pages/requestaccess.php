<?php $this->load->library('session'); ?>
<?php $this->load->helper('url'); ?>
<?php $picture= $this->session->userdata('picture'); ?>
<?php echo form_open('employeeaction/action'); ?>

<ul class="sidenav">
	
		<li><div id="empAvatar"><img src="<?php echo base_url('/images/avatars/'. $picture);?>" style="width:100px; height:100px;"></div></li>
		<li><div id="empName"><h3>Hello <?php echo $this->session->userdata('firstName')." ".$this->session->userdata('lastName')?></h3></div></li>
		<li><input class="btnEmployeesSub" type="submit" value="My Profile" name="empAction"/></li>
		<li><input class="btnEmployeesSub" type="submit" value="My Access History" name="empAction"/></li>

</ul>


<div class="empRequest">
	
	
	<div class="requestArea">
		<br>
		<br>
		<?php echo form_error('resources'); ?>
		<select name="resources">
			<option value="0">------------Select a System to Request------------</option>
			<!----- Displaying fetched resources in options using foreach loop ---->
			<?php foreach($tempResult as $oneResource): ?>
			<option value="<?php echo $oneResource['resourcesID']; ?>"><?php echo $oneResource['resName']; ?></option>
			<?php endforeach;?>
		
		</select>
		<br>
		<br>
		<br>
		<?php echo form_error('reason_comment'); ?>
		<textarea id="comment" name="reason_comment" placeholder="Reason for this request?" cols="100%" rows="10" tabindex="4"></textarea>
		<br/>
		<br/>
		<input id="sendRequest" type="submit" value="Send" name="empAction"/>
		<br>
		<br>

	</div>

</form>

</div>