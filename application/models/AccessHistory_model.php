<?php
class AccessHistory_model extends CI_Model{
	
	public function __construct(){
		// Load database
		$this->load->database();
	}
	
	public function searchLogs($userID)
	{
		
		$this->db->select('resName, requestDate, reason');
		$this->db->from('accesslogs');
		$this->db->join('resources', 'resources.resourcesID = accesslogs.resID');
		$this->db->join('members', 'accesslogs.memberID = members.mID');
		$this->db->where('mID', $userID);
		
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		//print_r($result);
		return $result;
		
		

		
	}
	
}



?>

