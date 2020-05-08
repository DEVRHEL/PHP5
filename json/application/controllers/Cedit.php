<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cedit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Mjs');
		$data=$this->Mjs->showdata();
		$data=json_decode($data,true);
		$data=array('mangdl'=>$data);
		$this->load->view('Vedit', $data, FALSE);
	}
	public function edit()
	{
		$ten = $this->input->post('ten'); //ten la mang luu tru tat ca cac ten
		$tuoi =$this->input->post('tuoi');
		$data= array();
		// duyet mang de dua du lieu vao mang
		for($i=0; $i < count($ten); $i++)
		{
			$temp=array();
			$temp['ten']=$ten[$i];
			$temp['tuoi']=$tuoi[$i];
			array_push($data,$temp);
		};
		$data=json_encode($data);
		$this->load->model('Mjs');
		$this->Mjs->updatedata($data);
	}
}

/* End of file Cedit.php */
/* Location: ./application/controllers/Cedit.php */