<?php
class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library("session");
	}
	public function index(){	
		
		$this->load->view("View_login");
		/*
		$this->load->model("Mmember");
		$config['total_rows'] = $this->Mmember->countAllaccLog();
		$config['base_url'] = base_url()."index.php/page/index";
		$config['per_page'] = 5;
		
		$this->load->library('pagination', $config);
		
		echo $this->pagination->create_links();*/
	}
	
	// validate memeber but member already exist we display
	public function validate($member=null)
	{
		// login 		
		 $this->login();
		
		// display access log
		$this->displayAcesslog();
	}
	
	public function login()
	{
		$this->load->model("Mmember");
		// validate user
		if ($this->session->userdata('mID') !== FALSE && is_null($this->session->userdata('mID')))
		{
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
				redirect(base_url().'index.php/user');
			}
		}
		
	}
	
	// display access log
	public function displayAcesslog($acclogStatus=null)
	{
		$this->load->model("Mmember");
		
		$config['total_rows'] = $this->Mmember->countAllaccLog();
		$config['base_url'] = base_url()."index.php/user/validate";
		$config['per_page'] = 5;
		$start=$this->uri->segment(3);
		$this->load->library('pagination', $config);
		
		
		
		$member = $this->session->all_userdata();
		$memberID=$member["mID"];
		// if level 2 is admin we display everything
		if($member["level"]==2)
			$memberID="memberID";
			$data['accessLog']= $this->Mmember->getAccessLog($memberID,$config['per_page'],$start,$acclogStatus);
			if($member["level"]==2)
			{
				$view_Admin=$this->load->view("View_admin",$data);
				echo "<div class='footer'>".$this->pagination->create_links()."</div>";
			}
				else
				{
					$view_employee=$this->load->view("View_employee",$data);
					echo "<div class='footer'>".$this->pagination->create_links()."</div>";
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
		//$member= $this->Mmember->getMemberbyId($memberID);
		$member = $this->session->all_userdata();
		$this->load->model("Mresource");
		$resource=$this->Mresource->getResources();
		$data["member"]=$member;
		$data["resource"]=$resource;
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Reason', 'Reason', 'required|max_length[200]');
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
		$this->validate($member);
	}
	
	// log out 
	public function signOut()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/user');
	}
	
	
}
?>