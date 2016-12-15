	
					<div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>DOB</th>
                                        <th>Picture</th>
                                        <th>Change Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php                                  
									if(isset($allUser))
									{
										foreach ($allUser as $oneUser)
										{
											$str= "<tr class='success'><td><b>".$oneUser['firstName'].",".$oneUser['lastName']."</b></td><td>"
										
											.$oneUser['mEmail']."</td><td>"
											.$oneUser['dateOfBirth']."</td>"
                							."<td style='background-image:url(".base_url()."./uploads/".$oneUser['picture'].");background-repeat:no-repeat;background-size:40px 40px;   width: 40px; height: 40px;'>"							 										
											."</td>";
										if($oneUser['status']=="active")
											$str.= "<td><a href=".base_url().'index.php/admin/changeUserStatus/'.$oneUser['mID']."/deactive> Deactive </a></td>";
									 	else 
									 		$str.="<td><a href=".base_url().'index.php/admin/changeUserStatus/'.$oneUser['mID']."/active>Active </a></td>";
									 		$str.="</tr>";
									 		echo $str;
										}
									}
									else 
										echo "<br/>no access log<br/>";
									?>
                                </tbody>
                            </table>
                        </div>
	
 