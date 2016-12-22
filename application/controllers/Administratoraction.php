<?php
class Administratoraction extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		
		//loading session library 
		$this->load->library('session');
		
		//lodinbg the helper to create the forms abd the url
		$this->load->helper(array('form', 'url'));
		
		
	}
	
	public function action()
	{
		
		
		if($this->input->post('adminAction') == 'Admin Request Access')
		{
			
			$this->adminRequestAccess();
			
			
			
		}
		
	
		if ($this->input->post('goback') == 'Go back')
		{
			/*echo "go back";*/
			$this->logsHistoryAdmin();
			/*$this->load->model('AccessHistory_model');
			$tempLogsHistoryAdmin = $this->AccessHistory_model->searchLogsAdmin();
					
			$data2['tempLogsHistoryAdmin'] = $tempLogsHistoryAdmin;
			//print_r($tempLogsHistoryAdmin);
					
			$title['title'] = "Administrator";
			$this->load->view('templates/header', $title);
			$this->load->view('pages/administrator',$data2);
			$this->load->view('templates/footer', $title);*/
		}
		
		
		if ($this->input->post('adminAction') == 'My Profile')
		{
			//Load the model to botain the information related to this user
			//Ask if is better to have this info in the session variable or go to the model toretrive the data again
			//Go to the model
			/*$this->load->model('userinfo_model');
			$this->userinfo_model->getuserinfo();*/
			
			//loading session library 
			$this->load->library('session');
			//store the info of the session variable in a variable to red in the page
			$userInfo = $this->session->userdata('mID');
			
			//Built the page to diaplay the personal info of the employee 
			$title['title'] = "Administrator Profile";
			$this->load->view('templates/header', $title);
			$this->load->view('pages/userprofile', $userInfo);
			$this->load->view('templates/footer', $title);
		}

		if ($this->input->post('adminAction') == 'Logs History')
		{
		
			/*echo "Hello logs repeted";*/
			$this->logsHistoryAdmin();
			
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

		if ($this->input->post('empAction') == 'Update')
		{
		
			/*print_r($this->input->post());
			
			echo "<br>";
			
			print_r($this->session->userdata());*/
			
			
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
		
		if ($this->input->post('pending'))
		{
			$status = 2;
			$this->changestatuslog($status);
			//echo 'pending';
		}
		
		
		
		//echo $id;
		//echo $this->uri->segment(4);
		//echo $this->input->get('logID');
		//echo $this->input->get('action');
		
		
		/*echo $this->input->post('accept');
		echo $this->input->post('deny');*/
	}
	
	function changestatuslog($status)
	{
		$logID = $this->input->post('logID');
		
		$this->load->model('accesshistory_model');
		$this->accesshistory_model->changestatuslog($logID,$status);
		
		$this->adminRequestAccess();
	}
	
	
	
	
/*	
	public function accesslogvalidate()
	{
		
		//echo $this->input->post('logID');
		
		$logID = $this->input->post('logID');
	
		
		if( $this->input->post('accept'))
		{
			$status = 1;
			//echo 'accept';
		}
		else if ($this->input->post('deny'))
		{
			$status = 0;
			//echo 'deny';
		}
		else
		{
			$status = 2;
			//echo 'pending';
		}
		
		
		$this->load->model('accesshistory_model');
		$this->accesshistory_model->changestatuslog($logID,$status);
		
		$this->adminRequestAccess();
		
	}
*/	
	
	function adminRequestAccess()
	{
		$this->load->model('AccessHistory_model');
		$tempLogsHistoryAdmin = $this->AccessHistory_model->searchLogsAdmin();
		
		//if ( count($tempLogsHistoryAdmin) > 0)
		//{
			$data2['tempLogsHistoryAdmin'] = $tempLogsHistoryAdmin;
			//print_r($tempLogsHistoryAdmin);
				
			$title['title'] = "Administrator Request";
			$this->load->view('templates/header', $title);
			$this->load->view('pages/requestaccessadmin',$data2);
			$this->load->view('templates/footer', $title);

		//}
		//else
		//{
			//echo "No more data";
		//}
		
		
	}
	
	function logsHistoryAdmin()
	{
		$this->load->model('AccessHistory_model');
			$tempLogsHistoryAdmin = $this->AccessHistory_model->searchLogsAdmin();
					
			$data2['tempLogsHistoryAdmin'] = $tempLogsHistoryAdmin;
			//print_r($tempLogsHistoryAdmin);
					
			$title['title'] = "Administrator";
			$this->load->view('templates/header', $title);
			$this->load->view('pages/administrator',$data2);
			$this->load->view('templates/footer', $title);
	}
	
	
}

?>