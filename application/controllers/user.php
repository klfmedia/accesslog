<?php
class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library("session");
	}
	public function index(){	
		
		$this->load->view("View_login");
	}
	
	// validate memeber but member already exist we display
	public function validate()
	{
		// login 
		if ($this->session->userdata('mID') !== FALSE && is_null($this->session->userdata('mID')))
		{
		 $this->login();
		}
		// display access log 
		$this->displayAcesslog(0);
	}
	
	private function login()
	{
		$this->load->model("Mmember");
		
			$email = $this->input->post('txtEmail');
			$pwd= md5($this->input->post('txtPassword'));
			$data=array(
					"email" => $email,
					"password" => $pwd,
			);
			$member= $this->Mmember->login($data);
			if(isset($member))
			{
				$this->session->set_userdata($member);
			}
			else
			{			
				
				echo "<script type='text/javascript'> alert('Wrong User Name or password');";
				echo " window.location.href = '" . base_url() ."index.php/user';";
				echo "</script>";											
			}		
	}
	
	// display access log
	public function displayAcesslog($acclogStatus=null)
	{
		$this->load->model("Mmember");
		
		$totalRowPerPage=10;
		$totalRow=$this->Mmember->countAllaccLog($acclogStatus);		
			$config['total_rows'] = $totalRow;
			$config['base_url'] = base_url()."index.php/user/displayAcesslog/".$acclogStatus;		
			$config['per_page'] = $totalRowPerPage;
			$start=$this->uri->segment(4);
			$this->load->library('pagination', $config);
				
		$member = $this->session->all_userdata();
		$memberID=$member["mID"];
		// if level 2 is admin we display everything
		if($member["level"]==2)
			$memberID="memberID";
			$data['accessLog']= $this->Mmember->getAccessLog($memberID,$config['per_page'],$start,$acclogStatus);
			if($member["level"]==2)
			{	
				//calculate percent for display grogess bar
					$totalAccessLogNotdecide=$this->Mmember->countAllaccLog(0);
					$totalAccessAccept=$this->Mmember->countAllaccLog(1);
					$totalAccessDeny=$this->Mmember->countAllaccLog(2);
					$totalAccessLog=$totalAccessLogNotdecide+$totalAccessAccept+$totalAccessDeny;
				
				$data['totalAccessLogNotdecide']=round(($totalAccessLogNotdecide * 100 )/$totalAccessLog,0);
				$data['totalAccessAccept']=round(($totalAccessAccept * 100 )/$totalAccessLog,0);
				$data['totalAccessDeny']=round(($totalAccessDeny * 100 )/$totalAccessLog,0);
				$data["accessStatus"]=$this->getAccessStatus($acclogStatus);
				$view_Admin=$this->load->view("View_admin",$data);
				echo "<div class='footer'> Total acceslog :<span style='color:red'>".$totalRow."</span> on ".$this->pagination->create_links()."</div>";
			}
				else
				{$data['accessLog']= $this->Mmember->getAccessLog($memberID,$config['per_page'],$start);
					$view_employee=$this->load->view("View_employee",$data);					
					echo "<div class='footer'>Total acceslog :<span style='color:red'>".$totalRow."</span> on ".$this->pagination->create_links()."</div>";
				}
	}
	
	private function getAccessStatus($acclogStatus)
	{
		switch ($acclogStatus) {
			case 1:			return "<span class='label label-success'>Accept</span>";
			case 2: 		return "<span class='label label-danger'>Deny</span> ";
			default:		return "<span class='label label-primary'>Not Decide</span>";

		}
		
	}
	
	//display profile
	public function displayProfile($memberID=null)
	{
		$this->load->model("Mmember");
		// get all information about member and his department
		$member = $this->session->all_userdata();
		$member= $this->Mmember->getMemberbyId($member["mID"]);
		$view_employee=$this->load->view("View_profile",$member);
		
	}
	
	// send request 
	public function requestAccess()
	{
		$this->load->model("Mmember");
		$member = $this->session->all_userdata();
		$this->load->model("Mresource");
		$resource=$this->Mresource->getResources();
		$data["member"]=$member;
		$data["resource"]=$resource;
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Reason', 'Reason', 'required|max_length[200]');
		$this->form_validation->set_rules('dateResquest', 'Date Resquest','required|callback_checkdate');
		if($this->form_validation->run() == FALSE)
		{
			$view_employee=$this->load->view("View_request",$data);
		}
		 else
		 {
		 	$res["resID"]=$this->input->post('Resource');
		 	$res["requestDate"]=$this->input->post('dateResquest');
		 	$res["reason"]= $this->input->post('Reason');
		 	$res["memberID"]=$member["mID"];
		 	$this->Mmember->insertAccesslog($res);
		 	$this->validate($member);
		 }
	}
	
	public function checkdate($date)
	{
		$date=strtotime($date);
		if($date<strtotime('now'))
		{
			$this->form_validation->set_message('checkdate', 'The date request must be after today');
			return false;
		}
		else 
			return true;
	}
	
	// delete accesslog
	public function adminDelete($accesslogId)
	{
		//delete
		
	}
	
	// confirm accesslog
	public function adminConfirm($accesslogId,$accStatus)
	{
		$this->load->model("Mmember");
		$this->Mmember->updateAccStatus($accesslogId,$accStatus);
		$member = $this->session->all_userdata();
		//$this->displayAcesslog(0);
		redirect(base_url().'index.php/user/displayAcesslog/0');
	}
	
	// log out 
	public function signOut()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/user');
	}
	
	
}
?>