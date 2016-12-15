<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['title']="Welcome KLF Company";
$this->load->view('templates/header', $data);

?>
 <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                  <img src="<?php echo base_url().'/uploads/'.$this->session->userdata('picture');?> " class="img-responsive" />                                         
                    </li>
                    <li>
                        <a href="<?php echo base_url().'index.php/user/validate/';?>"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href='<?php
						echo base_url().'index.php/user/requestAccess/';?>'> <i class="fa fa-edit "></i>Request Access </a>
                    </li>
                                  
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
<hr />
 <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">               
                <?php	 	
		 $this->load->view($subview,$data);
		 ?>
                </div>
              </div>
              <br/>
              <hr />
<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>