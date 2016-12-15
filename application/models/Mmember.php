<?php
class Mmember extends CI_Model{
	public function __construct(){
		parent::__construct();		
	}
	
	public function listallUser(){		
		$sql="SELECT members.*,departments.depName
		FROM members,departments where departmentID=depID";
		$query=$this->db->query($sql);
		$data= $query->result_array();
		return $data;		
	}
	public function login($data=array())
	{
		$mEmail= $data["email"];
		$mPassword=$data["password"];
	 	$this->db->where("mEmail",$mEmail);
	 	$this->db->where("mPassword",$mPassword);
	 	$this->db->where("status","active");
		$query=$this->db->get("members");
	
		if( count($query->result_array())>0)
		return $query->row_array();
		else 
			return null;
		
	}
	
	public function getMemberbyId($memberID)
	{		
		$sql="SELECT members.*,departments.depName
		FROM members,departments where departmentID=depID and mID=?";		
		$query=$this->db->query($sql,$memberID);
			$data=$query->row_array();
			return $data;
	}
	
	public function checkEmail($mEmail,$mID=""){
		if($mID != ""){
			$this->db->where("mID !=", $mID);
		}
		$this->db->where('mEmail',$mEmail);
		$query=$this->db->get("members");
		if($query->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function updateMember($data_update, $mID){
		$this->db->where("mId", $mID);		
		$this->db->update("members", $data_update);
	}
	
	public function addMember($data_insert){
		$this->db->insert("members",$data_insert);
	}
	
	public function getPictureById($mID)
	{
		$this->db->where("mId", $mID);
		$query=$this->db->get("members");
		if($query->num_rows() > 0){
			$data=$query->row_array();
			return $data["picture"];
		}else{
			return null;
		}
	}
		
	public function countAllaccLog($accesslogStatus=null){
		if(isset($accesslogStatus))
		$this->db->where("accStatus=".$accesslogStatus);
		$query=$this->db->get("accesslogs");
		return count($query->result_array());
	}
	
	public function countRequest()
	{
		$sql="SELECT COUNT( * ) as 'Times' ,  requestDate  ,  resName 
				FROM  `accesslogs` , resources
				WHERE  accesslogs.resID= resources.resourcesID
				AND accStatus=2
				GROUP BY  `requestDate` ,  `resID`
				ORDER BY requestDate"; 
		$query=$this->db->query($sql);
		if( count($query->result_array())>0)
		{
			return  $query->result_array();
		}
		else
			return null;

	}
	
	public function getAccessLog($memberID,$total=null, $start=null,$accesslogStatus=null)
	{
		$sql=   "SELECT accesslogs.*,
					resources.resourcesID,resources.resName,
					firstName, lastName
				FROM accesslogs,resources,members
				WHERE resID=resourcesID
					  AND members.mID= accesslogs.memberID
					  AND memberID=".$memberID;
		// check if admin we don't display access log alrealdy decided accstatus != 0
		if($memberID=="memberID")
		{
			// select accesslog with status 0 : new . 1 : accept  . 2 : deny
			if(!isset($accesslogStatus) )	
			$sql =$sql." AND accStatus=0";
			else
				$sql =$sql." AND accStatus=".$accesslogStatus;
		}
		 $sql =$sql." ORDER BY sendDate,requestDate ";
		 if(isset($start))
		 $sql=$sql." LIMIT ".$start.",".$total;
		$query=$this->db->query($sql);
		if( count($query->result_array())>0)
		{
			return  $query->result_array();
		}
			else
				return null;
		
	}
	
	public function getResourceId($resID)
	{
		$this->db->where("resourcesID",$resID);
		$query=$this->db->get("resources");
		
		if( count($query->result_array())>0)
		{
			return  $query->row_array();
		}
		else
			return null;
		
	}
	// add new access log
	public function insertAccesslog($res)
	{
		$data=array(
				"resID" => $res["resID"],
				"sendDate" => date("Y/m/d h:i:sa"),
				"requestDate"    => $res['requestDate'],
				"memberID"=>$res["memberID"],
				"reason"=>$res["reason"]
		);
		$this->db->insert("accesslogs", $data);
	
	}
	//change status of accesslog
	public function updateAccStatus($accesslogId,$accStatus){
		$data=array(
				"accStatus" => $accStatus,				
		);
		$this->db->where("acclogID", $accesslogId);
		$this->db->update("accesslogs", $data);
	}
	
	
}
?>