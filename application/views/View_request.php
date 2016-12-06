<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title']="Welcome KLF Company";
$this->load->view('templates/header', $data);

?>

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
<!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
               <img src="<?php echo base_url().'/uploads/'.$this->session->userdata('picture');?> " class="img-responsive" />                    
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href='<?php
						echo base_url().'index.php/user/requestAccess/';?>'> <i class="fa fa-edit "></i>Request Access </a>
                    </li>
                    <li>
                    
                        <a href="<?php echo base_url().'index.php/user/validate/';?>"><i class="fa fa-mail-reply"></i>Go Back </a>
                    </li>               
                </ul>
            </div>
        </nav>

    <div id="page-wrapper">
            <div id="page-inner">
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
 		</div>
 	</div>
 <hr />
 <br/>
<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>
  