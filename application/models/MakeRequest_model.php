<?php
Class MakeRequest_model extends CI_Model{
	
	function __construct ()
	{
		//loading session library 
		$this->load->library('session');
		
		$this->load->database();
	}
	
	function insertRequestDB($selectedSystem, $mboxInfo )
	{

		
		
		$time = $this->session->userdata('__ci_last_regenerate'); //The session gives the time when the user log to the system
		date_default_timezone_set('America/Montreal'); //Set the time_zone related to Montreal in order to get the time exactly queh the user logs with the refernece of montreal
		$loginDate = date('Y-m-d H:i:s', $time ); //Store the time informatnion of the login into a variable for store into the database
		/*echo date('Y-m-d H:i:s', $time ); //Testing
		echo date('Y-m-d H:i:s');*/
		
		$mID = $this->session->userdata('mID'); //Call the session variable to get the id of the user in order to insert the resquest into the database

		//Array that contains the columns of the table accesslog, this array has the info that will be inserted into this table
		 $data = array(
        'resID' => $selectedSystem,
		'loginDate'=> $loginDate,
		'requestDate'=> $loginDate,
		'memberID' => $mID, 
		'reason' => $mboxInfo,
		'acclogStatus'=> 2);

    return $this->db->insert('accesslogs', $data); // Insert the data into the Database and then Returns to the controller that made the call for this model
		
		
	}
	
	
}
?>