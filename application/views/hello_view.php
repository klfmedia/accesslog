<?php 
	$data['title']="Welcome KLF Company";
        $this->load->view('templates/headerLogin', $data);
  ?>
<?php 
echo $title;
echo "<pre>";
print_r($account);
echo "</pre>";
echo $this->uri->segment('1'); 
echo $this->uri->segment('2'); 
echo $this->uri->segment('3'); 
echo $script;
?>
<?php  $this->load->view('templates/footer', $data);?>