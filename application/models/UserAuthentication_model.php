<?php
//session_start(); //we need to start session in order to access it through CI

class UserAuthentication_model extends CI_Model{
	
	public function __construct(){

		$this->load->database();
	}
	
	//public function user_verification($email, $pass)
	public function user_verification()
	{

		
		$email = $_POST['username'];
		$pass = $_POST['password'];
		
		
		//This query get all the information related to the member that include the deparmentID number
		//$array = array('mEmail' => $email,'mPassword' => $pass ); //means: "WHERE mEmail = 'test@yahoo.com' AND mPassword = 'test-password'"
		//$query = $this->db->get_where('members', $array); //means: Select * FROM 'table members' WHERE (the condition in on the array)
		//$result = $query->row_array();
		
		$array = array('mEmail' => $email,'mPassword' => $pass ); //means: "WHERE mEmail = 'test@yahoo.com' AND mPassword = 'test-password'"

		
		//query with the name of the department
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('departments', 'departments.depID = members.departmentID');
		$query = $this->db->where($array);
		$query = $this->db->get();
		
		$result = $query->row_array();
		
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