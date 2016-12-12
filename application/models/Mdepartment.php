<?php
class Mdepartment extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getAllDepartment()
	{
		$query=$this->db->get("departments");
	
		if( count($query->result_array())>0)
		{
			return  $query->result_array();
		}
		else
			return null;
	
	}
}

?>