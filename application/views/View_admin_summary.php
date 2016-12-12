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
                            
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Welcome Admin: <?php echo $this->session->userdata('lastName');?></h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">                
                    <div class="col-md-12">
                        <h5>Access Log : Accepted</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Resource</th>
                                        <th>Request Date</th>
                                        <th>Times</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
									if(isset($accessLog))
									{
										foreach ($accessLog as $oneLog)
											echo "<tr class='success'><td>".$oneLog['resName']."</td><td>".$oneLog['requestDate']."</td><td>"
											.$oneLog['Times']."</td>"
									 		."</tr>";
									}
									else 
										echo "<br/>no access log<br/>";
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
<br/>
<hr />
<?php
  $data['company']="KLF Company";;
  $this->load->view('templates/footer', $data);
?>