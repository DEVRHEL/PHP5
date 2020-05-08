<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Mmailconfig');
		if(!$this->session->has_userdata('admin')) // ngan chan khong cho truy cap vao bat ki function nao cua controller khi chua dang nhap
		{
			redirect('Login'); 
		}
	}

	// List all your items
	public function index($error=NULL)
	{
		$data=$this->Mmailconfig->get(1);
		$data=array('data'=>$data, 'error'=>$error);
		$this->load->view('ContactPage',$data);
	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{
		$host=$this->input->post('host');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$smtpsecure=$this->input->post('smtpsecure');
		$port=$this->input->post('port');
		$addressfrom=$this->input->post('addressfrom');
		$namefrom=$this->input->post('namefrom');
		$dataupdate=array(
			'host'=>$host,
			'username'=>$username,
			'password'=>$password,
			'smtpsecure'=>$smtpsecure,
			'port'=>$port,
			'addressfrom'=>$addressfrom,
			'namefrom'=>$namefrom
		);
		if($this->Mmailconfig->update($dataupdate,1))
		{
			$error=array('success'=>'update sucessfully');
			$this->index($error);
		}
		else
		{
			$error=array('error'=>'error when upload');
			$this->index($error);
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */
