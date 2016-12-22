<?php
class GetResourceInfo_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function getResourceInfo()
	{
		//This query select everything from the table resources
		//$query = $this->db->get('resources'); //SELECT * FROM resources;
		//$result = $query->result_array(); //return an array of objects
		
		//This query select data from an specific columns
		$this->db->select('resourcesID, resName'); // SELECT resourcesID, resName
		$query = $this->db->get('resources'); // FROM resources;
		$result = $query->result_array(); //return an array of objects
		return $result;
	}
	
	
}
?>