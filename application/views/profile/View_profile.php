             			
	<?php
	$mess=$this->session->flashdata("flash_mess");
    if(isset($mess) && $mess != ''){
        echo "<div>";
        echo "<ul>";
            echo "<li>$mess</li>";
        echo "</ul>";
        echo "</div>";
    }
?>		
<?php echo "<span style='color: red;'>".validation_errors()."</span>";?>			
<form id="formId" name="formId" method="post" action="<?php echo base_url().'index.php/user/updateUser/';?>" >

<div style="padding-bottom: 18px;font-size : 21px;">PROFILE</div>
<div style="padding-bottom: 18px;font-size : 18px;">Contact Information</div>


<div style="display: flex; padding-bottom: 18px;width : 450px;">
<div style=" margin-left : 0; margin-right : 1%; width : 49%;">First name<br/>

<input type="text" id="txtFirstName" name="txtFirstName"  style="width: 100%;" class="form-control" required/>
</div>
<div style=" margin-left : 1%; margin-right : 0; width : 49%;">Last name<br/>
<input type="text" id="txtLastName" name="txtLastName" style="width: 100%;" class="form-control" required/>
</div>
</div>
<div style="padding-bottom: 18px;">Gender<br/>
<span><input type="radio" id="gender_0" name="gender" value="male" <?php if($member['gender']=='male')echo 'checked';?> /> Male</span><br/>
<span><input type="radio" id="gender_1" name="gender" value="female" <?php if($member['gender']!='male')echo 'checked';?>/>Female</span><br/>
</div>
<div style="padding-bottom: 18px;">Email<br/>
<input type="email" id="txtEmail" name="txtEmail"  style="width : 450px;" class="form-control" required/>
</div>

<div id="divPassword" style="padding-bottom: 18px;">Password<br/>
<input type="password" id="txtPassword" name="txtPassword" value="<?php echo $member['mPassword'];?>" style="width : 450px;" class="form-control " />
</div>

<br/>
<div style="padding-bottom: 18px;">Phone<br/>
<input type="text" id="txtPhone" name="txtPhone"  style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Date Of Birth <br/>
<input type="date" id="txtDOB" name="txtDOB" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Title <br/>
<input type="text" id="txtTitle" name="txtTitle" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Designation<br/>
<input id="txtDesignation" name="txtDesignation" style="width : 450px;" type="text" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Join Date<br/>
<input type="text" id="txtJoinDate" name="txtJoinDate" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Contact Name<br/>
<input type="text" id="txtContactName" name="txtContactName" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Contact Phone<br/>
<input type="text" id="txtContactPhone" name="txtContactPhone" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Department Name<br/>
<input type="text" id="txtDepartment" name="txtDepartment" style="width : 450px;" class="form-control"/>
<select id="cboDeparment" name="cboDeparment" style="width : 450px;" class="form-control">
<?php 
	foreach ($department as $oneDeparment)
	{
		echo "<option value='".$oneDeparment['depID']."'>".$oneDeparment['depName']."</option>";
	}
?>
 </select>
</div>
<div id="divSave" style="padding-bottom: 18px;">Department Name<br/>
<input type="submit" value="save" id="btnSave" style="width : 200px;" class="btn btn-success"  > 
<input type="button" value="Cancel" id="btnCancel" style="width : 200px;" class="btn btn-success"  onclick="window.location = '<?php echo base_url().'index.php/user/displayProfile/';?>';"> 
</div>
</form>
  		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
        function DATA2TXT() {
        	
        	document.getElementById('txtLastName').value='<?php echo $member['lastName'];?>';
        	document.getElementById('txtFirstName').value='<?php echo $member['firstName'];?>';
        	document.getElementById('txtEmail').value='<?php echo $member['mEmail'];?>';
       	
        	document.getElementById('txtPhone').value='<?php echo $member['phoneNumber'];?>';
        	document.getElementById('txtDOB').value='<?php echo $member['dateOfBirth'];?>';
        	document.getElementById('txtTitle').value='<?php echo $member['title'];?>';
        	document.getElementById('txtDesignation').value='<?php echo $member['designation'];?>';
        	document.getElementById('txtJoinDate').value='<?php echo $member['joinDate'];?>';  
        	document.getElementById('txtContactName').value='<?php echo $member['contactName'];?>';
      		document.getElementById('txtContactPhone').value='<?php echo $member['contactPhone'] ;?>'; 
      		document.getElementById('txtDepartment').value='<?php echo $member['depName'] ;?>'; 
      		 $('#formId input').attr('readonly', 'readonly');
      		 $('#divSave').hide();	
			 $('#hrefCancel').hide();
			 $('#cboDeparment').hide();			
        }
        window.onload = DATA2TXT;             		       		
        $('#hrefEdit').click(function()
        		{   		
        	$('#formId input').attr('readonly', false);  
        	$('#divSave').show();
        	$('#hrefCancel').show();
        	$('#hrefGoBack').hide();
        	$('#hrefEdit').hide();
        	$('#txtDepartment').hide();
        	 $('#cboDeparment').show();
        	 $('#divPassword').hide();
               		});      
        </script>
