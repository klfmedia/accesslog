
                <div class="row">
                    <div class="col-md-12">
                         <h2>Welcome : <?php echo $this->session->userdata('lastName');?></h2>
                    </div>
                </div>
			<div class="row">                
                    <div class="col-md-10">
                        <h5>Access Log</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>                                        
                                        <th>Resource</th>
                                        <th>Request Date</th>                                        
                                        <th>Reason</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
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
										?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               