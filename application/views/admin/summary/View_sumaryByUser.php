
  <div style="padding-bottom: 18px;font-size : 21px; color:blue" align="center">SUMMARY BY USER REQUEST</div>
     <hr />
<div class="table-responsive">
    <table class="table">
         <thead>
          <tr>
          <th>Name</th>
          <th>Email</th>
           <th style="color:blue">Not Decide</th>
          <th style="color:green" >Accept</th>
          <th style="color:red">Deny</th>
          <th>Total Request</th>
          </tr>                              
         </thead>                                
          <tbody>
  <?php                                  
									if(isset($allUser))
									{
										foreach ($allUser as $oneUser)
										{
											//$total=$oneUser['notdecide']+$oneUser['accept']+$oneUser['deny'];
											$str= "<tr class='success'><td><b>".$oneUser['firstName'].",".$oneUser['lastName']."</b></td><td>"										
											.$oneUser['mEmail']."</td><td style='color:blue'>".$oneUser['notdecide']."</td><td style='color:green'>".$oneUser['accept']."</td>"
         									."<td style='color:red'>".$oneUser['deny']."</td><td  style='font-size : 16px;'>"
  											.$oneUser['sum']."</td></tr>" ;						
									 		echo $str;
										}
									}
									else 
										echo "<br/>no access log<br/>";
?>                                 
          </tbody>
    </table>
 </div>				
	
 