<?php
include_once (dirname(__FILE__) . "/user.php");
class Admin extends User{
	public function __construct(){
		parent::__construct();
		
	}
	
	// summary request
	public function summaryRequest()
	{
		$this->load->model("Mmember");
		$data['accessLog']= $this->Mmember->countRequest();
		$data['subview']="admin/summary/View_admin_summary";
		$this->load->view('admin/View_admin',$data);
	}
	
	// summary request by user
	public function summaryByUser()
	{
		$this->load->model("Mmember");
		$data['allUser']= $this->Mmember->numberRequestByUser();
		$data['subview']="admin/summary/View_sumaryByUser";
		$this->load->view('admin/View_admin',$data);
	}
	
	// add new user
	public function addUser()
	{
		$this->load->model("Mmember");
		$mID=$this->session->userdata('mID');
		$this->load->library("form_validation");
		$this->form_validation->set_rules("txtEmail", "Email", "callback_check_email[".$mID."]");
		if ($this->form_validation->run() == true) {
			$data_add = array(
					"firstName"=>$this->input->post("txtFirstName"),
					"lastName"=>$this->input->post("txtLastName"),
					"mEmail"=>$this->input->post("txtEmail"),
					"mPassword"=>md5($this->input->post("txtPassword")),
					"phoneNumber"=>$this->input->post("txtPhone"),
					"gender" => $this->input->post("gender")?"male":"female",
					"dateOfBirth"=>$this->input->post("txtDOB"),
					"title"=>$this->input->post("txtTitle"),
					"designation"=>$this->input->post("txtDesignation"),
					"JoinDate"=>$this->input->post("txtJoinDate"),
					"contactPhone"=>$this->input->post("txtContactPhone"),
					"contactName"=>$this->input->post("txtContactName"),
					"departmentID"=>$this->input->post("cboDeparment"),
					"status"=>"active",
					"level"=>1
			);
				
			$this->Mmember->addMember($data_add);
			$this->session->set_flashdata("flash_mess", "add Success");
		}
		$this->load->model("Mdepartment");
		$department=$this->Mdepartment->getAllDepartment();
		$data["department"]=$department;
		
		$data['subview']="admin/View_addUser";
		$this->load->view('admin/View_admin',$data);
		
	}
	
	// confirm accesslog
	public function adminConfirm($accesslogId,$accStatus)
	{
		$this->load->model("Mmember");
		$this->Mmember->updateAccStatus($accesslogId,$accStatus);
		$member = $this->session->all_userdata();
		redirect(base_url().'index.php/user/displayAcesslog/0');
	}
	

	public function displayAllUser()
	{
		$this->load->model("Mmember");
		$allUser= $this->Mmember->listallUser();
		$data['allUser']=$allUser;
		$data['subview']="admin/View_disableUser";
		$this->load->view('admin/View_admin',$data);
	}
	
	// change status of user
	public function changeUserStatus($mID,$mStatus)
	{
		$this->load->model("Mmember");
		$data_update = array(
				"status"=>$mStatus,
		);
		$this->Mmember->updateMember($data_update,$mID);
		$this->displayAllUser();
	}
	
	
	
	
}