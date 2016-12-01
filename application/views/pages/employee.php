<h3>Access History</h3>
<?php  //print_r($tempLogsHistory); ?>

<?php //$data['tempLogsHistory']= $tempLogsHistory ?>

<table border="1">
	<tr><th>System</th><th>Request Date</th><th>Reason</th></tr>
	
	<?php foreach ($tempLogsHistory as $oneRec){?>
			  <tr><td><?php echo $oneRec['resName'];?></td><td><?php echo $oneRec['requestDate'];?></td><td><?php echo $oneRec['reason'];?></td></tr>
	      
	
	
	<?php } ?>
	
	
	
</table>