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
                        <a href="<?php echo base_url().'index.php/user/summaryRequest/';?>"><i class="fa fa-bar-chart "></i>Summary request times</a>
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
                    
                    <div class="col-md-8">
                        <h5>Click for view:</h5>                        
                        <a href="<?php echo base_url().'index.php/user/displayAcesslog/0';?>" class="btn btn-primary">Not decide</a>
                        <a href="<?php echo base_url().'index.php/user/displayAcesslog/1';?>" class="btn btn-success">Accept</a>
						<a href="<?php echo base_url().'index.php/user/displayAcesslog/2';?>" class="btn btn-danger">deny</a>
                        <br />
                        <br />
                        <h5>Progressbar</h5>
                        <div class="progress progress-striped">
                            <div class="progress-bar progress-bar-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width:<?php echo $totalAccessLogNotdecide?>%">
                                <?php echo $totalAccessLogNotdecide?>% Not Decide
                            </div>
                            
                        </div>
                        <div class="progress progress-striped ">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="20" style="width:<?php echo $totalAccessAccept?>%">
                                <?php echo $totalAccessAccept?>% Accept
                            </div>
                        </div>
                        <div class="progress progress-striped ">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="20" style="width:<?php echo $totalAccessDeny?>%">
                                <?php echo $totalAccessDeny?>% Deny
                            </div>
                        </div>
                    </div>
                </div>
 		<hr />
                <div class="row">                
                    <div class="col-md-12">
                        <h5>Access Log :<b> <?php echo $accessStatus;?></b></h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Resource</th>
                                        <th>Request Date</th>
                                        <th>Send Date</th>
                                        <th>Reason</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
									if(isset($accessLog))
									{
										foreach ($accessLog as $oneLog)
											echo "<tr class='success'><td>".$oneLog['firstName'].",".$oneLog['lastName']."</td><td>"
											.$oneLog['resName']."</td><td>".$oneLog['requestDate']."</td><td>"
											.$oneLog['sendDate']."</td><td>".$oneLog['reason']
											."</td><td><a href=".base_url().'index.php/user/adminConfirm/'.$oneLog['acclogID']."/1>Accept </a>&nbsp"
									 		."<a href=".base_url().'index.php/user/adminConfirm/'.$oneLog['acclogID']."/2>Deny </a>"
									 		."</td></tr>";
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