<div class="login">
	<div class="loginform">
	<?php $this->load->helper('form');?>
    <?php $this->load->library('form_validation');?>
	
		
	<span style="color:red;">
	<?php //echo validation_errors(); ?>
	<?php if (isset($error_message)) { echo $error_message;}?>
	</span>
	<?php echo form_open('home/validate'); ?> 
	
	<span style="color:red;"><?php echo form_error('username'); ?></span>
	<label class="lblLogin">Username:</label>
	<input type="text" name="username" id="username" placeholder="Enter your email" />
	<br /><br />
	<span style="color:red;"><?php echo form_error('password'); ?></span>
	<label class="lblLogin">Password:</label>
	<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
	
	<input id="btnLogin" type="submit" value="Login" name="submit"/><br />
	
	</form>
	</div>
</div>