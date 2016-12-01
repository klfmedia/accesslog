<?php
//session_start(); //we need to start session in order to access it through CI

class UserAuthentication_model extends CI_Model{
	
	public function __construct(){
		/*
		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');*/

		// Load database
		$this->load->database();
	}
	
	//public function user_verification($email, $pass)
	public function user_verification()
	{
		/*echo $_POST['username'];
		echo $_POST['password'];
		*/
		//echo "estoy en el modelo the verification";
		
		$email = $_POST['username'];
		$pass = $_POST['password'];
		
		
		
		$array = array('mEmail' => $email,'mPassword' => $pass ); //means: "WHERE mEmail = 'test@yahoo.com' AND mPassword = 'test-password'"
		$query = $this->db->get_where('members', $array); //means: Select * FROM 'table members' WHERE (the condition in on the array)
		
		$result = $query->row_array();
		
		//print_r($result);
		
		//echo count($result);
		if(count ($result) >0)
		{
			//echo "user exist";
			
			
			return $result;
		}
		else
		{
			echo "This member doesn't exist";
			return null;
		}
	}
	
}
?>