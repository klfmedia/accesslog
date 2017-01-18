<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
	}
	
	public function loginpage()
	{
		$this->load->view('templates/headerLogin');
		$this->load->view('pages/login_view.php');
		/*$this->load->view('welcome_message');*/
		$this->load->view('templates/footer');
	}
	
	public function home()
	{
		echo "hello home";
		echo "<script> alert ('hello') </script>";
	}
}