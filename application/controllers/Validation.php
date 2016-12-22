<?php
class Validation extends CI_Controller{
	
	
	 public function index($page ='login')
    {
		
		//loading session library 
		$this->load->library('session');
		
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
			
		$regExp = "^(?!\d+)\w+[\+\.\w]*@([\w]+\.[a-z]{2,4})$";
		$this->form_validation->set_rules('username', 'Username', 'trim|required|regex_match[/'.$regExp.'/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'You must provide a %s.'));


        if ($this->form_validation->run() == FALSE)
        {		
			$data['title'] = ucfirst($page); // Capitalize the first letter

			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
						
			//echo "NO DATA ENTER";
						
        }
        else
        {
			/*
			echo $_POST['username'];
			echo $_POST['password'];
						
			*/
						
						
						
					
			$this->load->model('userauthentication_model');
			$tempResult=$this->userauthentication_model->user_verification();
			$userID = $tempResult['mID'];
			$levelUsr = $tempResult['level'];
			
			
			//*******************************First situacion*******************************//
			//Create a session with only one specific information retived from the database
			/*$userID = $tempResult['mID'];
			$fname = $tempResult['firstName'];
			$lname = $tempResult['lastName'];
			$email = $tempResult['mEmail'];
			
			$userInfo = array ( 'mID'=> $userID,
								'firstName' => $fname,
								'lastName' => $lname,
								'mEmail' => $email);
			//print_r($userInfo);					
			$this->session->set_userdata($userInfo);//Create a session for the current user
			$this->session->userdata();
			//print_r( $this->session->userdata()); //print everything of the session
			*/
			
			//*******************************Second situation*******************************//
			//Create a session with all the information retreived from the database. This include the password of the current user
			$this->session->set_userdata($tempResult); //Create a session for the current user
			$this->session->userdata();
			//print_r( $this->session->userdata()); //print everything of the session
			
			
			
			////***************************ASK ABOUT THIS ***********************************************////
			//$data['tempResult']=$tempResult;
			//$array_items = array('mEmail', 'mPassword'); //This array will be used to for the method unset_userdata to specify which data is not going to store in the session
			
			//$this->session->set_userdata($tempResult); //This is a "bad" practice because contain all the info of the user including the username and password
			//$this->session->unset_userdata($array_items); //remove the userID and the password of the current user for this session
			
			//$this->session->set_flashdata($userInfo);
			//$this->session->sess_destroy(); //Destroy the previous session 
			
			//$this->session->set_userdata($userInfo);//Create a session for the current user
			//$this->session->userdata();
			
			//print_r( $this->session->userdata('title')); //print the array session with the column 'title' and returns -> 'stage' or 'admin' or 'employee'
			//print_r( $this->session->userdata()); //print everything of the session
			
			
			if (count ($tempResult)>0)
			{
				if($tempResult['level'] == 1)
				{
					
					$this->load->model('AccessHistory_model');
					$tempLogsHistory = $this->AccessHistory_model->searchLogs($userID);
					
					
					$data1['tempLogsHistory'] = $tempLogsHistory;

						
					$title['title'] = "Employee";
					$this->load->view('templates/header', $title);
					$this->load->view('pages/employee',$data1);
					$this->load->view('templates/footer', $title);
				}
				else
				{
					//echo "Administrator";
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
			
            
        }
    }
	/*
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserAuthentication_model');
		$this->load->helper('url_helper');
	}
	*/
	/*
	public function validateUser(){
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	*/
	/*
	public function index ()
	{
		$data['title'] = "login page";
		
		$this->load->view('templates/header', $data);
		$this->load->view('login',$data);
		$this->load->view('templates/footer');
		
	}
	*/
}

?>