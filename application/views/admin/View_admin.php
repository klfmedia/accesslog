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
                      <li class="dropdown">                    	
                        <a href="#" class="dropbtn"><i class="fa fa-search"></i>Statistic Request</a>
                    		<div class="dropdown-content">
						   	 	<a href="<?php echo base_url().'index.php/admin/summaryRequest/';?>"><i class="fa fa-calendar"></i>&nbsp Summary request times</a> 				    	
						    	 <a href="<?php echo base_url().'index.php/admin/summaryByUser/';?>"><i class="fa fa-male"></i>&nbsp Summary by user</a>
						  </div>
						 
                    </li>
                    <li class="dropdown">                    	
                        <a href="#" class="dropbtn"><i class="fa fa-users"></i>User</a>
                    		<div class="dropdown-content">
						   	 	<a href="<?php echo base_url().'index.php/admin/addUser/';?>"><i class="fa fa-plus"></i> Add New</a> 				    	
						    	<a href="<?php echo base_url().'index.php/admin/displayAllUser/';?>"><i class="fa fa-times-circle-o"></i> Disable User</a>
						  </div>
						 
                    </li>
                              
                </ul>
            </div>
        </nav>

<div id="page-wrapper">
  <div id="page-inner">              			
		<?php	 	
		 $this->load->view($subview,$data);
		 ?>
  </div>
</div>
 <hr />
 <br/>



<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>
  		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
     
   		
        </script>
