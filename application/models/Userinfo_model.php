<?php
Class Userinfo_model extends CI_Model{
	function __construct()
	{
		//loading session library 
		$this->load->library('session');
		
		//loading the database;
		$this->load->database();
	}
	
	function updateUserInfo()
	{
		
		//Update info of the user into in the database using the session variable
		
		$newUsrInfo = array (
								'firstName' => $this->session->userdata('firstName'),
								'lastName' => $this->session->userdata('lastName'),
								'dateOfBirth' => $this->session->userdata('dateOfBirth'),
								'phoneNumber' => $this->session->userdata('phoneNumber'),
								'mEmail' => $this->session->userdata('mEmail'),
								'mPassword' => $this->session->userdata('mPassword'),
								'contactName'=> $this->session->userdata('contactName'),
								'relationContact'=> $this->session->userdata('relationContact'),
								'contactPhone'=> $this->session->userdata('contactPhone'),
								'picture'=> $this->session->userdata('picture'),
								);
								
		
		$userID = $this->session->userdata('mID');
		$this->db->where('mID', $userID);
		$this->db->update('members', $newUsrInfo);
		
		
		
		
		
	}
}
?>