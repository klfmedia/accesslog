<div class="login">
	<div class="loginform">
	<?php $this->load->helper('form');?>
    <?php $this->load->library('form_validation');?>
	
		
	<?php echo validation_errors(); ?>
	
	<?php echo form_open('validation/index'); //call the class 'validation' (controller) & method 'index'?> 
	
	<!--<div class="inputlabels">-->
	<label >Username :</label>
	<input type="text" name="username" id="username" placeholder="Enter your email" /><br /><br />
	<label>Password :</label>
	<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
	<input type="submit" value=" Login " name="submit"/><br />
	<!--</div>-->
	</form>
	</div>
</div>

