<?php
class AccessHistory_model extends CI_Model{
	
	public function __construct(){
		// Load database
		$this->load->database();
	}
	
	public function searchLogs($userID)
	{
		
		$this->db->select('resName, requestDate, reason, acclogStatus');
		$this->db->from('accesslogs');
		$this->db->join('resources', 'resources.resourcesID = accesslogs.resID');
		$this->db->join('members', 'accesslogs.memberID = members.mID');
		$this->db->where('mID', $userID);
		$this->db->order_by('loginDate', 'DESC');
		$query = $this->db->get();
		
		$result = $query->result_array();
		

		return $result;
		
	}
	
	public function searchLogsAdmin()
	{
		$this->db->select('acclogID, resName, requestDate, reason, acclogStatus, firstName, lastName');
		$this->db->from('accesslogs');
		$this->db->join('resources', 'resources.resourcesID = accesslogs.resID');
		$this->db->join('members', 'accesslogs.memberID = members.mID');
		$this->db->where('acclogStatus', 2);
		$this->db->order_by('loginDate', 'DESC');
		$query = $this->db->get();
		
		$result = $query->result_array();
		

		return $result;
		
	}
	
	public function ChangeStatusLog($logID, $status)
	{

		
		$data = array( 'acclogStatus' => $status);
		
		
		$this->db->where('acclogID', $logID);
		$this->db->update('accesslogs', $data);
	}
	
}



?>

