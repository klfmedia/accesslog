            			
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
<form id="formId" name="formId" method="post" action="<?php echo base_url().'index.php/admin/addUser/';?>" >

<div style="padding-bottom: 18px;font-size : 21px;">PROFILE</div>
<div style="padding-bottom: 18px;font-size : 18px;">Contact Information</div>


<div style="display: flex; padding-bottom: 18px;width : 450px;">
<div style=" margin-left : 0; margin-right : 1%; width : 49%;">First name<br/>

<input type="text" id="txtFirstName" name="txtFirstName"  style="width: 100%;" class="form-control" />
</div>
<div style=" margin-left : 1%; margin-right : 0; width : 49%;">Last name<br/>
<input type="text" id="txtLastName" name="txtLastName" style="width: 100%;" class="form-control" />
</div>
</div>
<div style="padding-bottom: 18px;">Email <span style='color: red;'>* </span><br/>
<input type="email" id="txtEmail" name="txtEmail"  style="width : 450px;" class="form-control" required/>

</div>
<div id="divPassword" style="padding-bottom: 18px;">Password <span style='color: red;'>* </span><br/>
<input type="password" id="txtPassword" name="txtPassword"  style="width : 450px;" class="form-control " />
</div>
<div style="padding-bottom: 18px;">Gender<br/>
<span><input type="radio" id="gender_0" name="gender" value="male"  /> Male</span><br/>
<span><input type="radio" id="gender_1" name="gender" value="female" />Female</span><br/>
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


