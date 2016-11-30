<?php
class Mresource extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

public function getResources()
{
	$query=$this->db->get("resources");

	if( count($query->result_array())>0)
	{
		return  $query->result_array();
	}
	else
		return null;

}
}
?>