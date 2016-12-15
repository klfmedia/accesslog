            			

<?php  if(isset($mess))
	echo $mess;?>			
<?php // echo form_open_multipart('user/changePicture/'.$member["mID"]);?>

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
<form action="<?php echo base_url().'index.php/user/changePicture/'.$member["mID"];?>" method="post" enctype="multipart/form-data" id="formUpload">
<div style="padding-bottom: 18px;">File<br/>
<input type="file"  name="userFile" id="userFile" onchange="previewImg(event);" size="20"  style="width : 450px;" class="form-control" required/>
</div>
<div class="box-preview-img" style="width : 70px;"></div>
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

        function previewImg(event) {
         
            var files = document.getElementById('userFile').files;         
            $('#formUpload .box-preview-img').show();                    
            $('#formUpload .box-preview-img').html('<p>Preview</p>');
         
         
            for (i = 0; i < files.length; i++)
            {
              
                $('#formUpload .box-preview-img').append('<img src="" id="' + i +'">');         
                $('#formUpload .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
            }   
        }
	
        	
      </script>

        
     
