<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title']="Welcome KLF Company";
$this->load->view('templates/header', $data);

?>
<h3>Access History</h3>
<div style='overflow: auto;'>
<table border="1" style='float:left;'>
<tr><th>Resource</th><th>Time Request</th><th>Reason</th><th>Status</th></tr>
<?php 
if(isset($accessLog))
{
	foreach ($accessLog as $oneLog)
	{
		if($oneLog['accStatus']==0)
			$status="Not Yet";
		else if ($oneLog['accStatus']==1)
			$status="Accepted";
			else
				$status="Deny";
			
		echo "<tr><td>".$oneLog['resName']."</td><td>".$oneLog['requestDate']."</td><td>"
		.$oneLog['reason']."</td><td>".$status."</td></tr>";
	}
}
else 
	echo "<br/>no access log<br/>";

	/* back
	 <section style='margin-left: 70%;'>
	<a href="<?php echo base_url().'index.php/user/validate/'.$this->session->all_userdata();?>"> Back </a>	
	</section>
	 */
	
?>
</table>
<section style='margin-left: 70%;'>
<a href='<?php
	echo base_url().'index.php/user/displayProfile';?>'> See Your's Profile </a>
	
</section>
<section style='margin-left: 70%;'>
<a href='<?php
	echo base_url().'index.php/user/requestAccess/';?>'> Request Access </a>
</section>


</div>


<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>