<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		
		$this->load->library('form_validation'); // CI library to validate the forms
		$this->load->database();
		
	}
	
	public function validate()
	{
		$regExp = "^(?!\d+)\w+[\+\.\w]*@([\w]+\.[a-z]{2,4})$";
		$this->form_validation->set_rules('username', 'Username', 'trim|required|regex_match[/'.$regExp.'/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'You must provide a %s.'));

		if ($this->form_validation->run() == FALSE)
        {		
			
			
			$this->load->view('templates/header');
			$this->load->view('pages/login_view.php');
			$this->load->view('templates/footer');			
			
		    return false;
        }
		
		
		$this->verifyUsr();
		
		
		
	}
	
	private function verifyUsr()
	{
		$this->load->model('userauthentication_model');
		$tempResult=$this->userauthentication_model->user_verification();
		
		if ($tempResult != null)
		{
			$this->create_session($tempResult);
			
			return true;
		}
		else
		{
			$data = array('error_message' => 'Invalid Username or Password');
			
			$this->load->view('templates/header');
			$this->load->view('pages/login_view.php', $data);
			$this->load->view('templates/footer');
			
			return null;
		}
		
		
		
	}
	
	
	private function create_session($tempResult)
	{
		//Create a session with all the information retreived from the database. This include the password of the current user
		$this->session->set_userdata($tempResult); //Create a session for the current user
		$this->session->set_userdata('session_active', 'true');
		$this->session->set_userdata('session_logout', 'false');
		
		$this->checkUsr();
		
	}
	
	private function checkUsr()
	{
		if($this->session->userdata('level') == 1){
			$this->empLogs();
		}
		
		if($this->session->userdata('level') == 2){
	
			$this->adminLogs();
		}
		
	}
	
	//**************************Employee functions*********************************/
	public function empLogs()
	{
		
		$this->load->library('pagination');
		
		
		$mID = $this->session->userdata('mID');
		
		$this->load->model('AccessHistory_model');
		$records = $this->AccessHistory_model->searchLogsEmp($mID); 
		
		//The variable $records is an associative array
		//This array has
		// Array ( [temprecords] => Array ( records inside (only five))
		//		   [tempnbrrec] => total number of records(logs) that where found for the current users )
		
		//Configuration of parination
		$config['base_url']='http://localhost/accesslog/home/empLogs'; // if is http://127.0.0.1/accesslog/home/empLogs goes outside and create an empty session
		$config['total_rows']= $records['tempnbrrec']; //Number of total records
		$config['per_page']=5; //Records display per page
		$config['num_links']=2; //Number of links to display in the pagination


		$config['records']= $records['temprecords']; //Records found (only five)
					
		
		$config['full_tag_open']='<ul class = "pagination">';
		$config['full_tag_close']='</ul>';
		
		$config['first_tag_open']='<li>';
		$config['last_tag_open']='<li>';
		
		$config['next_tag_open']='<li>';
		$config['prev_tag_open']='<li>';
		
		$config['num_tag_open']='<li>';
		$config['num_tag_close']='</li>';
		
		$config['first_tag_close']='</li>';
		$config['last_tag_close']='</li>';

		$config['next_tag_close']='</li>';
		$config['prev_tag_close']='</li>';
		
		$config['cur_tag_open']="<li class = \"active\"><span><b>";
		$config['cur_tag_close']="</b></span></li>";
		

		
		$this->pagination->initialize($config); //initialize the pagination
		

		//Load the view of the employee to see the the logs
		$this->load->view('templates/header');
		$this->load->view('pages/employee_view',$config);
		$this->load->view('templates/footer');
		

	}
	
	
	public function request()
	{
		
		
		
		//$this->load->helper(array('form', 'url'));
		
		$this->load->model('getresourceinfo_model'); // The controller call the model called getresourceinfo_model
		$tempResult = $this->getresourceinfo_model->getResourceInfo(); //The model is called and goes to the function called getResourceInfo(), this function returns and array of the query from the model
		$resultInfo['tempResult'] = $tempResult; //Returned information
		
		$resultInfo['message'] ="";
		
		//Built the page from the views
		//$title['title'] = "Request Access";
		$this->load->view('templates/header');
		$this->load->view('pages/requestaccess_view', $resultInfo);
		$this->load->view('templates/footer');
	}
	
	
	public function send()
	{
		//$this->load->library('form_validation'); // called the library to validate the forms
		$selectedSystem = $this->input->post('resources_option'); //Post Method that returns the value selected for the user in the comboBox
		$mboxInfo = $this->input->post('reason_comment'); //Post method that retieves the data enter in the textarea for the user
		
		
		//Validation rules applied to the form.
		//set_rules('1','2','3','4');
		//1. The field name - the exact name you’ve given the form field.
		//2. A “human” name for this field, which will be inserted into the error message. 
		//3. The validation rules for this form field.
		//4. (optional) Set custom error messages on any rules given for current field. If not provided will use the default one.
		
		//ComboBox Validation
		$this->form_validation->set_rules('resources_option', 'resources_option', 'required|callback_select_validate');
		
		//Text area validation
		$this->form_validation->set_rules('reason_comment', 'message', 'required');
		
		//If the form is not valid, calls the function of this controller called: request()
		//And send back the error message to the caller form
		if($this->form_validation->run() == FALSE)
		{
			$this->request();
			
		}
		else
		{	
			//echo $selectedSystem; //test for verify the data enter for the user
			//echo $mboxInfo;
			
			//If the user enter the correct data this controller call the model
			// to fill the data enter by the user into the database.
			$this->load->model('makeRequest_model');
			$this->makeRequest_model->insertRequestDB($selectedSystem,$mboxInfo);
			
			
			$userID = $this->session->userdata('mID'); //Call the session variable to get the id of the user in order to insert the resquest into the database
		

			$this->load->model('getresourceinfo_model'); // The controller call the model called getresourceinfo_model
			$tempResult = $this->getresourceinfo_model->getResourceInfo(); //The model is called and goes to the function called getResourceInfo(), this function returns and array of the query from the model
			$resultInfo['tempResult'] = $tempResult; //Returned information
			
			
			
			
			//Load the helper to create th form
			
			$resultInfo['message'] ="Request sent";
			
			//The controller call the view to create the page employee that include all the accesslogs for the current user
			$this->load->view('templates/header');
			$this->load->view('pages/requestaccess_view',$resultInfo);
			$this->load->view('templates/footer');
			
					
		}
	}
	
	
	public function select_validate($selectedSystem)
	{
		if($selectedSystem=="0"){
		$this->form_validation->set_message('select_validate', 'Please Select one system.');
		return false;
		}
		else
		{
			//The user choose something
			return true;
		}
	} 
	
	//*****************************Administrator functions*****************************************************/
	
	public function adminLogs()
	{
		$this->load->library('pagination');
		
		
		$this->load->model('AccessHistory_model');
		$records = $this->AccessHistory_model->searchLogsAdmin();
	
		
		//pagination
		$config['base_url']='http://localhost/accesslog/home/adminLogs';
		$config['total_rows']= $records['tempnbrrec'];
		$config['per_page']=5;
		$config['num_links']=2;



		$config['records']= $records['temprecords'];


		$config['full_tag_open']='<ul class = "pagination">';
		$config['full_tag_close']='</ul>';
		
		$config['first_tag_open']='<li>';
		$config['last_tag_open']='<li>';
		
		$config['next_tag_open']='<li>';
		$config['prev_tag_open']='<li>';
		
		$config['num_tag_open']='<li>';
		$config['num_tag_close']='</li>';
		
		$config['first_tag_close']='</li>';
		$config['last_tag_close']='</li>';

		$config['next_tag_close']='</li>';
		$config['prev_tag_close']='</li>';
		
		$config['cur_tag_open']="<li class = \"active\"><span><b>";
		$config['cur_tag_close']="</b></span></li>";
		
		
					
		$this->pagination->initialize($config);
		

		//Load the view of the employee to see the the logs
		$this->load->view('templates/header');
		$this->load->view('pages/administrator_view',$config);
		$this->load->view('templates/footer');
		
	}
	
	
	public function adminRequestAccess()
	{
		$this->load->library('pagination');
		
		
		//Call the model AccessHistory_model and the function searchLogsAdmin
		//Returns an associative array with two important values
		//The first position  contains  an array with all the data selected in the select stament ($records['temprecords'] = Array with records)
		//The second position contains the number of records that has the array that is stored in the first position
		$this->load->model('AccessHistory_model');
		$records = $this->AccessHistory_model->searchLogsAdmin();
		
		
		//pagination
		$config['base_url']='http://localhost/accesslog/home/adminRequestAccess';
		$config['total_rows']= $records['tempnbrrec'];
		$config['per_page']=5;
		$config['num_links']=2;


		$config['records']= $records['temprecords'];			
		
		$config['full_tag_open']='<ul class = "pagination">';
		$config['full_tag_close']='</ul>';
		
		$config['first_tag_open']='<li>';
		$config['last_tag_open']='<li>';
		
		$config['next_tag_open']='<li>';
		$config['prev_tag_open']='<li>';
		
		$config['num_tag_open']='<li>';
		$config['num_tag_close']='</li>';
		
		$config['first_tag_close']='</li>';
		$config['last_tag_close']='</li>';

		$config['next_tag_close']='</li>';
		$config['prev_tag_close']='</li>';
		
		$config['cur_tag_open']="<li class = \"active\"><span><b>";
		$config['cur_tag_close']="</b></span></li>";
		
		
		$this->pagination->initialize($config);
		
		$this->load->view('templates/header');
		$this->load->view('pages/requestaccessadmin_view',$config);
		$this->load->view('templates/footer');
		
	}
	
	
	//
	public function action()
	{
		if( $this->input->post('accept'))
		{
			$status = 1;
			$this->changestatuslog($status);
			//echo 'accept';
		}
		
		if ($this->input->post('deny'))
		{
			$status = 0;
			$this->changestatuslog($status);
			//echo 'deny';
		}
	}
	
	function changestatuslog($status)
	{
		$logID = $this->input->post('logID');
		$message = $this->input->post('reason_comment');
		
		
		$data = array ( 'acclogStatus'  => $status,
						'adminResponse' => $message);
								
		$this->load->model('accesshistory_model');
		$this->accesshistory_model->changestatuslog($data, $logID);
		

		
		$this->adminRequestAccess();
	}

	
	//****************************General functions for admin and employee users************************************/
	
	//Function that display the user profile view 
	public function myprofile()
	{
		$userInfo = $this->session->userdata('mID');
			
		//Built the page to diaplay the personal info of the employee 
		$this->load->view('templates/header');
		$this->load->view('pages/userprofile_view', $userInfo);
		$this->load->view('templates/footer');
	}
	
	//Function that display the edit profile view for the first time
	public function editProfile()
	{
		$message['message'] ="";
		
		//The controller call the view to create the page updateuserprofile of the current user
		$this->load->view('templates/header');
		$this->load->view('pages/updateuserprofile_view', $message);
		$this->load->view('templates/footer');
	}
	
	
	//Funtion that update the information of the current user
	public function update()
	{
			
		//Validate if the data enter for the user is correct
		$this->load->library('form_validation');
		
		//Regular expressions used to validate the data
		$regExpEmail = "^(?!\d+)\w+[\+\.\w]*@([\w]+\.[a-z]{2,4})$";
		$regExpNames = "^([a-zA-Z ]{2,})$";
		$regExpPhones = "^\b\d{3}[-]?\d{3}[-]?\d{4}\b$";
		
		//Stablish the rules that are going to use to validate the data enter by the user
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|regex_match[/'.$regExpNames.'/]');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|regex_match[/'.$regExpNames.'/]');
		$this->form_validation->set_rules('phonenbr', 'Phone number', 'trim|required|regex_match[/'.$regExpPhones.'/]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/'.$regExpEmail.'/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('fullnamecontact', 'Contact Name', 'trim|required|regex_match[/'.$regExpNames.'/]');
		$this->form_validation->set_rules('relationcontact', 'Relationship', 'trim|required|regex_match[/'.$regExpNames.'/]');
		$this->form_validation->set_rules('phonenbrcontact', 'Phone number of your contact', 'trim|required|regex_match[/'.$regExpPhones.'/]');	




		if($this->input->post('avatar')) //If the avatar was selected then update the avatar in the session
		{
			$this->session->set_userdata('picture', $this->input->post('avatar'));
		}

		
		
		if ($this->form_validation->run() == FALSE)
		{	
			$message['message'] ="";
			
			//loading session library 
			$this->load->library('session');

			//The controller call the view to create the page updateuserprofile of the current user
			//in order to display the correspond error
			$this->load->view('templates/header');
			$this->load->view('pages/updateuserprofile_view', $message);
			$this->load->view('templates/footer');
			
			return null;
			
			
		}
		else
		{	
			//Modify some values of the current session
			$this->session->set_userdata('firstName', $this->input->post('fname'));
			$this->session->set_userdata('lastName', $this->input->post('lname'));
			$this->session->set_userdata('dateOfBirth', $this->input->post('birthdate'));
			$this->session->set_userdata('phoneNumber', $this->input->post('phonenbr'));
			$this->session->set_userdata('mEmail', $this->input->post('email'));
			$this->session->set_userdata('mPassword', $this->input->post('password'));
			$this->session->set_userdata('contactName', $this->input->post('fullnamecontact'));
			$this->session->set_userdata('relationContact', $this->input->post('relationcontact'));
			$this->session->set_userdata('contactPhone', $this->input->post('phonenbrcontact'));
			
			//Call the model that is going to update the database with the info of the user
			$this->load->model('userinfo_model');
			$this->userinfo_model-> updateUserInfo();
			
			$message['message'] ="User Updated";
			
			//Load the view updateuserprofile
			$this->load->view('templates/header');
			$this->load->view('pages/updateuserprofile_view', $message);
			$this->load->view('templates/footer');
			
		}
		
	}
	
	

	
	
	
}