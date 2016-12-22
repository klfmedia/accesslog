<?php
class Pages extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		
		//loading session library 
		$this->load->library('session');
		
		//lodinbg the helper to create the forms abd the url
		$this->load->helper(array('form', 'url'));
		
		
	}
		

    public function view($page = 'login')
    {
		$this->load->helper('url');
		
		
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
               // Whoops, we don't have a page for that!
               show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
    }
	
	
	public function logout()
	{	
		$this->session->unset_userdata('mID');
		$this->session->unset_userdata('mEmail');
		$this->session->unset_userdata('mPassword');
		
		$this->session->sess_destroy();
		$this->view();	
	}
		
		
}
?>