<?php
class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library("session");
	}
	public function index(){	
		$this->session->sess_destroy();
		$this->load->view("View_login2");
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
		$this->load->library('pagination');
		// get member for display access log from session
		$member = $this->session->all_userdata();
		$memberID=$member["mID"];
		// if level 2 is admin we display everything
		if($member["level"]==2){$memberID="memberID";}
		
			
			// admin 
			if($member["level"]==2)
			{
				$totalRowPerPage=10;
				$totalRow=$this->Mmember->countAllaccLog($acclogStatus);					
				$config['total_rows'] = $totalRow;
				$config['base_url'] = base_url()."index.php/user/displayAcesslog/".$acclogStatus;		
				$config['per_page'] = $totalRowPerPage;
				$this->pagination->initialize($config);		
				$start=$this->uri->segment(4);			
				$data['accessLog']= $this->Mmember->getAccessLog($memberID,$totalRowPerPage,$start,$acclogStatus);
				$this->calculatePercent($data);
				$data["accessStatus"]=$this->getAccessStatus($acclogStatus); //change number from database to word
				$data['subview']="admin/View_adminDashboard";
				$this->load->view('admin/View_admin',$data);			
				echo "<div class='footer'> Total acceslog :<span style='color:red'>".$totalRow."</span> logs ".$this->pagination->create_links()."</div>";
			}
			// employee
			else
			{
				$totalRowPerPage=10;
				$totalRow=$this->Mmember->countAllaccLog();
				$config['total_rows'] = $totalRow;
				$config['base_url'] = base_url()."index.php/user/displayAcesslog/";
				$config['per_page'] = $totalRowPerPage;
				$this->pagination->initialize($config);
				$start=$this->uri->segment(3)?$this->uri->segment(3):0;				
				$data['accessLog']= $this->Mmember->getAccessLog($memberID,$totalRowPerPage,$start);
			
				$data['subview']="employee/View_employeeDashboard";
				$this->load->view('employee/View_employee',$data);
				echo "<div class='footer'>Total acceslog :<span style='color:red'>".$totalRow."</span> logs ".$this->pagination->create_links()."</div>";
			}
	}
	
	//calculate percent for display grogess bar
	private function calculatePercent(& $data)
	{
		$totalAccessLogNotdecide=$this->Mmember->countAllaccLog(0);
		$totalAccessAccept=$this->Mmember->countAllaccLog(1);
		$totalAccessDeny=$this->Mmember->countAllaccLog(2);
		$totalAccessLog=$totalAccessLogNotdecide+$totalAccessAccept+$totalAccessDeny;
		$data['totalAccessLogNotdecide']=round(($totalAccessLogNotdecide * 100 )/$totalAccessLog,0);
		$data['totalAccessAccept']=round(($totalAccessAccept * 100 )/$totalAccessLog,0);
		$data['totalAccessDeny']=round(($totalAccessDeny * 100 )/$totalAccessLog,0);
		
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
		$data["member"]=$member;
		// get all department for edit
		$this->load->model("Mdepartment");
		$department=$this->Mdepartment->getAllDepartment();
		$data["department"]=$department;
		$data['subview']="profile/View_profile";
		$this->load->view('profile/View_profileMain',$data);
		
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
			
			$data['subview']="employee/View_request";
			$this->load->view('employee/View_employee',$data);
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
	// check date send request must be from now
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
	
	public function updateUser()
	{
		$this->load->model("Mmember");
		$mID=$this->session->userdata('mID');
		$this->load->library("form_validation");
		$this->form_validation->set_rules("txtEmail", "Email", "callback_check_email[".$mID."]");
		if ($this->form_validation->run() == true) {
			$data_update = array(
					"firstName"=>$this->input->post("txtFirstName"),
					"lastName"=>$this->input->post("txtLastName"),
					"mEmail"=>$this->input->post("txtEmail"),
					"mPassword"=>md5($this->input->post("txtPassword")),
					"phoneNumber"=>$this->input->post("txtPhone"),
					"gender" => $this->input->post("gender"),
					"dateOfBirth"=>$this->input->post("txtDOB"),
					"title"=>$this->input->post("txtTitle"),
					"designation"=>$this->input->post("txtDesignation"),
					"JoinDate"=>$this->input->post("txtJoinDate"),
					"contactPhone"=>$this->input->post("txtContactPhone"),
					"contactName"=>$this->input->post("txtContactName"),
					"departmentID"=>$this->input->post("cboDeparment"),
					);
			$this->Mmember->updateMember($data_update, $mID);
			$this->session->set_flashdata("flash_mess", "Update Success");
		}
			$this->displayProfile();
	}
	

	
	
	public function check_email($mEmail,$mID) {
		$this->load->model('Mmember');
		//$mID=$this->session->userdata('mID');
		if ($this->Mmember->checkEmail($mEmail, $mID) == FALSE) {
			$this->form_validation->set_message("check_email", "this email has been registed, please try again!");
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function changePassword($mID=null)
	{
		$this->load->model("Mmember");
		// first coming
		if(!isset($mID))
		{
		$member['mID']=$this->session->userdata('mID');
		$member['mEmail']=$this->session->userdata('mEmail');
		$member['firstName']=$this->session->userdata('firstName');
		$member['lastName']=$this->session->userdata('lastName');
		$member['mPassword']=$this->session->userdata('mPassword');	
		$member['picture']=$this->session->userdata('picture');
		$data["member"]=$member;
		
		$data['subview']="profile/View_changePassword";
		$this->load->view('profile/View_profileMain',$data);
		}
		// change password 
		else 
		{			
			$data_update['mPassword'] =md5($this->input->post('txtPassword')); 
			$this->Mmember->updateMember($data_update, $mID);
			$this->session->set_flashdata("flash_mess", "Password Changed Success");
			redirect(base_url().'index.php/user/displayProfile/');
		}
	}
	
	public function changePicture($mID=null)
	{
		if(!isset($mID))
		{
		$member['mID']=$this->session->userdata('mID');
		$member['mEmail']=$this->session->userdata('mEmail');
		$member['firstName']=$this->session->userdata('firstName');
		$member['lastName']=$this->session->userdata('lastName');
		$member['mPassword']=$this->session->userdata('mPassword');
		$member['picture']=$this->session->userdata('picture');
		$data["member"]=$member;
		$data['subview']="profile/View_changePicture";
		$this->load->view('profile/View_profileMain',$data);
		}
		else 
		{
			$member['mID']=$mID;			
			// upload new picture
			$check=$this->uploadFile();
		
			if(isset($check))
				{
					$fileName=basename($_FILES["userFile"]["name"]);
					$member['picture']=$fileName;
					$data['mess']="Upload success!";
					$data_update['picture']= $fileName;
					$this->load->model("Mmember");
					$this->Mmember->updateMember($data_update, $mID);
					$this->session->set_userdata("picture", $fileName);
				}
				else 
					{
						$data['mess']="Upload fail!";
						$member['picture']=$this->session->userdata('picture');
					}
					
					$data["member"]=$member;
					$data['subview']="profile/View_changePicture";
					$this->load->view('profile/View_profileMain',$data);
		}
		}
			
		/*	if (move_uploaded_file($_FILES["userFile"]["tmp_name"],  $_SERVER['DOCUMENT_ROOT'].'test/accesslog/uploads/'. basename($_FILES["userFile"]["name"]))) {
				echo "The file ". basename( $_FILES["userFile"]["name"]).$_SERVER['DOCUMENT_ROOT']. " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
			
			
			//$this->upload->initialize($config);
			if (!$this->upload->do_upload('userFile'))
			{
				$data['error']= $this->upload->display_errors();
				$member['picture']=$this->input->post('userFile');
				echo  $this->upload->display_errors()  ;//basename($_FILES["userFile"]["name"]);
				$this->load->view('View_changePicture', $data);				
			}
			else
			{
				echo $this->upload->data();//basename($_FILES["userFile"]["name"]);
				$data['error'] = $this->upload->data();
				$member['picture']=$this->input->post('userFile');
				$this->load->view('View_changePicture', $data);
			}
			
		*/
			
	private function uploadFile()
	{
		// check file already exist we delete first
		$target_dir = $_SERVER['DOCUMENT_ROOT'].'/test/accesslog/uploads/';
		$target_file = $target_dir . basename($_FILES["userFile"]["name"]);				
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image		
			$check = getimagesize($_FILES["userFile"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				return null;
			}
		
		// Check file size
		if ($_FILES["userFile"]["size"] > 300000) {
			return null;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					return null;
				}
				// Check if $uploadOk is set to 0 by an error					
		if (move_uploaded_file($_FILES["userFile"]["tmp_name"], $target_file)) {							
			$this->load->model("Mmember");
			$mID=$this->session->userdata('mID');
			$oldPicture=$this->Mmember->getPictureById($mID);
			if(isset($oldPicture))
			{
				if($oldPicture!=basename($_FILES["userFile"]["name"]))
				{
				unlink($target_dir.$oldPicture);
				}
			}
			return basename( $_FILES["userFile"]["name"]);
				
			} else {
				return null;
			}	
	}
	// log out 
	public function signOut()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/user');
	}
	
	
}
?>