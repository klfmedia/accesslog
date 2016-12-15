           			
		
<?php echo "<span style='color: red;'>".validation_errors()."</span>";?>			
<form  method="post" action="<?php echo base_url().'index.php/user/changePassword/'.$member['mID'];?>" onsubmit="return checkPass()" >

<div style="padding-bottom: 18px;font-size : 21px;">PROFILE</div>
<div style="padding-bottom: 18px;font-size : 18px;">Contact Information</div>


<div style="display: flex; padding-bottom: 18px;width : 450px;">
<div style=" margin-left : 0; margin-right : 1%; width : 49%;">First name<br/>

<input type="text" id="txtFirstName" name="txtFirstName"  style="width: 100%;" class="form-control" readonly/>
</div>
<div style=" margin-left : 1%; margin-right : 0; width : 49%;">Last name<br/>
<input type="text" id="txtLastName" name="txtLastName"  style="width: 100%;" class="form-control" readonly/>
</div>
</div>

<div style="padding-bottom: 18px;">Email<br/>
<input type="email" id="txtEmail" name="txtEmail"   style="width : 450px;" class="form-control" readonly/>
</div>

<div id="divPassword" style="padding-bottom: 18px;">Password<br/>
<input type="password" id="txtPassword" name="txtPassword"  style="width : 450px;" class="form-control " required/>

</div>
<div  style="padding-bottom: 18px;">Retype - Password <br/>
<input type="password" id="txtPassword2" name="txtPassword2" style="width : 450px;" class="form-control " required />
<span id='message'></span>
</div>
<br/>
<div id="divSave" style="padding-bottom: 18px;">
<input type="submit" value="save" id="btnSave" style="width : 200px;" class="btn btn-success"  > 
<input type="button" value="Cancel" id="btnCancel" style="width : 200px;" class="btn btn-success"  onclick="window.location = '<?php echo base_url().'index.php/user/displayProfile/';?>';"> 
</div>
</form>
  		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  		<script type="text/javascript" src="http://github.com/kvz/phpjs/raw/master/functions/xml/utf8_encode.js"></script>
        <script type="text/javascript" src="http://github.com/kvz/phpjs/raw/master/functions/strings/md5.js"></script>
        <script type="text/javascript">
        
        window.onload = DATA2TXT;    
        function DATA2TXT() {
        	document.getElementById('txtLastName').value='<?php echo $member['lastName'];?>';
        	document.getElementById('txtFirstName').value='<?php echo $member['firstName'];?>';
        	document.getElementById('txtEmail').value='<?php echo $member['mEmail'];?>';      									
        };
               		       		
        function checkPass()
        {
			if($('#txtPassword').val() == $('#txtPassword2').val())
				{					
				return true;
				}
			else
			{
				alert("Password doesn't match!" );
				return false;
			}
        };

        $('#txtPassword, #txtPassword2').on('keyup', function () {
            if ($('#txtPassword').val() == $('#txtPassword2').val()) {
                $('#message').html('Matching').css('color', 'green');
            } else 
                $('#message').html('Not Matching').css('color', 'red');
        });
        	
      </script>

        
     
