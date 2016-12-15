
<?php
$user=array(
		"name" => "username",
		"value"=> $member['firstName']." ".$member['lastName'],
		"size" => "25",
		"class"=>"form-control",
);


//fill combobox

foreach ($resource as $oneR)
{
	$opt[$oneR['resourcesID']]=$oneR['resName'];	
}
$reason=array(
		"name" => "Reason",
		"cols" => "60",
		"rows" => "5",
		"class"=>"form-control",
);
?>
                <div class="row">
                    <div class="col-md-9">
                        <h2>Request Resource</h2>
                    </div>
                </div>
			<div class="row"> 
			<div class="col-sm-4">
			 <?php
			 	echo "<span style='color: red;'>".validation_errors()."</span>";
			    echo form_open(base_url()."index.php/user/requestAccess/".$member['mID']);
			    echo "<div style='padding-bottom: 18px;'>User name: ";
			    echo form_input($user)."<br /></div>";			 
			    echo "<div style='padding-bottom: 18px;'>Resources :";
			    echo form_dropdown("Resource", $opt, 1,"class='form-control'")."<br />";
			    echo "<div style='padding-bottom: 18px;'>Date Request :<br/>";
			    echo "<input type='date' name='dateResquest' class='form-control'>"; 
			    echo "<div style='padding-bottom: 18px;'>Reason :<br/>";
			    echo form_textarea($reason)."<br /></div>";
			    echo form_label(" ").form_submit("ok","Send","class='btn btn-primary'");			    
			    echo form_close();
			    echo "<br/>";			    
			 ?>
			 </div>
 			</div>
 		