<?php
Class Employeeaction extends CI_Controller{
	
	public function __construct()
    {
        parent::__construct();
                
		
				
		//loading session library 
		$this->load->library('session');
		
		//lodinbg the helper to create the forms abd the url
		$this->load->helper(array('form', 'url'));
				
    }
	
	
	public function action()
	{
		if($this->input->post('empAction') == 'Request Access')
		{
			$this->request();
		}
		
		if ($this->input->post('empAction') == 'My Profile')
		{
			//loading session library 
			$this->load->library('session');
			//store the info of the session variable in a variable to red in the page
			$userInfo = $this->session->userdata('mID');
			
			//Built the page to diaplay the personal info of the employee 
			$title['title'] = "Employee Profile";
			$this->load->view('templates/header', $title);
			$this->load->view('pages/userprofile', $userInfo);
			$this->load->view('templates/footer', $title);
		}
		
		if ($this->input->post('empAction') == 'My Access History')
		{
			//load the userID from the session
			$userID = $this->session->userdata('mID');
			//Call the model to get the data again from the database ab return the result.
			$this->load->model('AccessHistory_model');
			$tempLogsHistory = $this->AccessHistory_model->searchLogs($userID);
						
			$data1['tempLogsHistory'] = $tempLogsHistory;
			
			//Built the page of the current employee
			$title['title'] = "Employee";
			$this->load->view('templates/header', $title);
			$this->load->view('pages/employee',$data1);
			$this->load->view('templates/footer', $title);
		}
		
		if ($this->input->post('empAction') == 'Update')
		{
			
			//Validate if the data enter for the user is correct
			$this->load->library('form_validation');
			
			//Regular expressions used to validate the data
			$regExpEmail = "^(?!\d+)\w+[\+\.\w]*@([\w]+\.[a-z]{2,4})$";
			$regExpNames = "^([a-zA-Z ]{2,})$";
			$regExpPhones = "^\b\d{3}[-]?\d{3}[-]?\d{4}\b$";
			
			//Stablish the rules that are going to use to validate the data enter by the user
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required|regex_match[/'.$regExpNames.'/]');
			$this->form_validation->set_rules('lname', 'First Name', 'trim|required|regex_match[/'.$regExpNames.'/]');
			$this->form_validation->set_rules('phonenbr', 'Phone number', 'trim|required|regex_match[/'.$regExpPhones.'/]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/'.$regExpEmail.'/]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('fullnamecontact', 'Contact Name', 'trim|required|regex_match[/'.$regExpNames.'/]');
			$this->form_validation->set_rules('relationcontact', 'Relationship', 'trim|required|regex_match[/'.$regExpNames.'/]');
			$this->form_validation->set_rules('phonenbrcontact', 'Phone number of your contact', 'trim|required|regex_match[/'.$regExpPhones.'/]');	



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
			if($this->input->post('avatar')) //If the avatar was selected then update the avatar in the session
			{
				$this->session->set_userdata('picture', $this->input->post('avatar'));
			}

			
			
			if ($this->form_validation->run() == FALSE)
			{	
		
				
				//loading session library 
				$this->load->library('session');

				//The controller call the view to create the page updateuserprofile of the current user
				//in order to display the correspond error
				$title['title'] = "Update your information";
				$this->load->view('templates/header', $title);
				$this->load->view('pages/updateuserprofile');
				$this->load->view('templates/footer', $title);
				
				
			}
			else
			{
				//Testing
				//print_r($this->session->userdata());
				//echo $this->input->post('fname');
				//echo $this->input->post('lname');

				
				//Call the model that is going to update the database with the info of the user
				$this->load->model('userinfo_model');
				$this->userinfo_model-> updateUserInfo();
				
				$message['message'] ="User Updated";
				
				/*$title['title'] = "Update your information";*/
				$this->load->view('templates/header');
				$this->load->view('pages/updateuserprofile', $message);
				$this->load->view('templates/footer');
				
			}
			
		}
		
		
		if($this->input->post('empAction') == 'Send')
		{
			$this->load->library('form_validation'); // called the library to validate the forms
			$selectedSystem = $this->input->post('resources'); //Post Method that returns the value selected for the user in the comboBox
			$mboxInfo = $this->input->post('reason_comment'); //Post method that retieves the data enter in the textarea for the user
		
		
			//Validation rules applied to the form.
			//set_rules('1','2','3','4');
			//1. The field name - the exact name you’ve given the form field.
			//2. A “human” name for this field, which will be inserted into the error message. 
			//3. The validation rules for this form field.
			//4. (optional) Set custom error messages on any rules given for current field. If not provided will use the default one.
			
			//ComboBox Validation
			$this->form_validation->set_rules('resources', 'resources', 'required|callback_select_validate');
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
	
				$this->load->model('AccessHistory_model'); //Call the model AccessHistory_model to retrieve the data in the table accesslogs including the new data
				$tempLogsHistory = $this->AccessHistory_model->searchLogs($userID);
				$data1['tempLogsHistory'] = $tempLogsHistory;
				
				
				//Load the helper to create th form
				$this->load->helper(array('form', 'url'));
				
				//The controller call the view to create the page employee that include all the accesslogs for the current user
				$title['title'] = "Employee";
				$this->load->view('templates/header', $title);
				$this->load->view('pages/employee',$data1);
				$this->load->view('templates/footer', $title);
				
						
			}
		}
		
		if($this->input->post('empAction') == 'Edit your profile')
		{
			$message['message'] ="";
			
			//The controller call the view to create the page updateuserprofile of the current user
			$title['title'] = "Update your information";
			$this->load->view('templates/header', $title);
			$this->load->view('pages/updateuserprofile', $message);
			$this->load->view('templates/footer', $title);
		}
	}
	
	public function request()
	{
		
		
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->model('getresourceinfo_model'); // The controller call the model called getresourceinfo_model
		$tempResult = $this->getresourceinfo_model->getResourceInfo(); //The model is called and goes to the function called getResourceInfo(), this function returns and array of the query from the model
		$resultInfo['tempResult'] = $tempResult; //Returned information
		
		
		//Built the page from the views
		$title['title'] = "Request Access";
		$this->load->view('templates/header', $title);
		$this->load->view('pages/requestaccess', $resultInfo);
		$this->load->view('templates/footer', $title);
	}
	
	
	function select_validate($selectedSystem)
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
	
	
	public function changeUsrProfile()
	{
		//echo "hellor";
		
			//The controller call the view to create the page updateuserprofile of the current user
			$title['title'] = "Update your information";
			$this->load->view('templates/header', $title);
			$this->load->view('pages/updateuserprofile');
			$this->load->view('templates/footer', $title);
	}
}

?>




