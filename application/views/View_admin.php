<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title']="Welcome KLF Company";
$this->load->view('templates/header', $data);

?>
<h3 id="total">Access History</h3>
<div style='overflow: auto;'>
<table >
<tr><td ><a href="<?php echo base_url().'index.php/user/displayAcesslog/0';?>">Not decide</a> </td>
	<td>&nbsp &nbsp</td><td><a href="<?php echo base_url().'index.php/user/displayAcesslog/1';?>">Accept</a></td>
	<td>&nbsp &nbsp</td><td><a href="<?php echo base_url().'index.php/user/displayAcesslog/2';?>">Deny</a></td>
 </tr>
</table>

<table border="1" style='float:left;'>
 <tr><th>Name</th><th>Resource</th><th>Request Date</th><th>Send Date</th><th>Reason</th><th>Action</th></tr>
<?php 
if(isset($accessLog))
{
	foreach ($accessLog as $oneLog)
		echo "<tr><td>".$oneLog['firstName'].",".$oneLog['lastName']."</td><td>"
		.$oneLog['resName']."</td><td>".$oneLog['requestDate']."</td><td>"
		.$oneLog['sendDate']."</td><td>".$oneLog['reason']
		."</td><td><a href=".base_url().'index.php/user/adminConfirm/'.$oneLog['acclogID']."/1>Accept </a>"
 		."<a href=".base_url().'index.php/user/adminConfirm/'.$oneLog['acclogID']."/2>Deny </a>"
 		."</td></tr>";
}
else 
	echo "<br/>no access log<br/>";
?>
</table>

<section style='margin-left: 70%;'>
<a href='<?php
	echo base_url().'index.php/user/displayProfile/';?>'> See Your's Profile </a>
	
</section>

</div>

<br/>
<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>