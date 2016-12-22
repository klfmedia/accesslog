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
			

			//Create a session with all the information retreived from the database. This include the password of the current user
			$this->session->set_userdata($tempResult); //Create a session for the current user
			$this->session->userdata();
			
			
			
			
			
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
	
}

?>