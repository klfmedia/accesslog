<?php

class Validation extends CI_Controller{
	
	
	 public function index($page ='login')
    {
			
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
			
			$data['tempResult']=$tempResult;
			
			$userID = $tempResult['mID'];
			
			if (count ($tempResult)>0)
			{
				if($tempResult['level'] == 1)
				{
					
					$this->load->model('AccessHistory_model');
					$tempLogsHistory = $this->AccessHistory_model->searchLogs($userID);
					
					
					//echo "<br>";
					
					$data1['tempLogsHistory'] = $tempLogsHistory;
					//print_r($data1);
				
					
					
					$title['title'] = "Employee";
					$this->load->view('templates/header', $title);
					$this->load->view('pages/employee',$data1);
					$this->load->view('templates/footer', $title);
				}
				else
				{
					echo "Administrator";
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