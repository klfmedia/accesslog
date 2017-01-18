<?php
class AccessHistory_model extends CI_Model{
	
	public function __construct(){
		// Load database
		$this->load->database();
	}
	
	public function searchLogsEmp($userID)
	{
		$this->db->select('resName, requestDate, reason, acclogStatus');
		$this->db->join('resources', 'resources.resourcesID = accesslogs.resID');
		$this->db->join('members', 'accesslogs.memberID = members.mID');
		$this->db->where('mID', $userID);
		$this->db->order_by('loginDate', 'DESC');
		$query = $this->db->get('accesslogs','5',$this->uri->segment(3));
		
		$query2 = $this->db->get('accesslogs');
		
		$data['temprecords'] = $query->result_array(); //contain all the records from the select statement (has an array)
		$data['tempnbrrec'] = $query2->num_rows(); //contain the number of records that is in the previous array
		
		return $data;
		
	}
	
	public function searchLogsAdmin()
	{
		
		$this->db->select('acclogID, resName, requestDate, reason, acclogStatus, firstName, lastName');
		$this->db->join('resources', 'resources.resourcesID = accesslogs.resID');
		$this->db->join('members', 'accesslogs.memberID = members.mID');
		$this->db->where('acclogStatus', 2);
		$this->db->order_by('loginDate', 'DESC');
		$query = $this->db->get('accesslogs','5',$this->uri->segment(3));
	
		$query2 = $this->db->get_where('accesslogs', array('acclogStatus' => 2));
		
		$data['temprecords'] = $query->result_array(); //contain all the records from the select statement (has an array)
		$data['tempnbrrec'] = $query2->num_rows(); //contain the number of records that is in the previous array
		
		return $data;
	}
	
	public function ChangeStatusLog($logID, $status)
	{
		$data = array( 'acclogStatus' => $status);
		$this->db->where('acclogID', $logID);
		$this->db->update('accesslogs', $data);
	}
	
}



?>

