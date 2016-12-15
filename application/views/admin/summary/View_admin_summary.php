  <div style="padding-bottom: 18px;font-size : 21px; color:blue" align="center">RESOURCE REQUEST ALREADY ACCEPTED</div>
             <!-- /. ROW  -->
                <hr />
                <div class="row">                
                    <div class="col-md-12">				
                      
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


