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
);


//fill combobox

foreach ($resource as $oneR)
{
	$opt[$oneR['resourcesID']]=$oneR['resName'];
}

$reason=array(
		"name" => "Reason",
		"cols" => "40",
		"rows" => "5",
);
?>
 <?php
 	echo "<span style='color: red;'>".validation_errors()."</span>";
    echo form_open(base_url()."index.php/user/requestAccess/".$member['mID']);
    echo "<div style='padding-bottom: 18px;'>User name: ";
    echo form_input($user)."<br /></div>";
 
    echo "<div style='padding-bottom: 18px;'>Resources :";
    echo form_dropdown("Resource", $opt, 1)."<br />";
    echo "<div style='padding-bottom: 18px;'>Date Request :<br/>";
    echo "<input type='date' name='dateResquest'>"; 
    echo "<div style='padding-bottom: 18px;'>Reason :<br/>";
    echo form_textarea($reason)."<br /></div>";
    echo form_label(" ").form_submit("ok",  "Send");
    
    echo form_close();
    echo "<br/>";
    echo "<div style='padding-bottom: 18px;'><br/>"
    		."<a href='".base_url().'index.php/user/validate/'."'> Back </a></div>";
 ?>
<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>
  