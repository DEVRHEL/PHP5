<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->has_userdata('admin'))
		{
			redirect('/Admin/','refresh'); // redirect to another controller
		}
		else
		{
			$this->load->view('Login');
		}
	}
	public function Login()
	{
		if(!empty($this->input->post('username')) && !empty($this->input->post('password')))
		{
			$result=$this->Mlogin->checklogin($this->input->post('username'),$this->input->post('password'));
			if($result===false)
			{
				$data['result']="Login fail";
				$this->load->view("Login",$data);
			}
			else
			{
				$this->session->set_userdata('admin',$this->input->post('username'));
				redirect('/Admin/','refresh'); // redirect to another controller
			}
		}
		else
		{
			$this->load->view("Login");
		}
	}
	public function Logout()
	{
		if($this->session->has_userdata('admin'))
		{
			$this->session->unset_userdata('admin');
			redirect('/Photos/');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */