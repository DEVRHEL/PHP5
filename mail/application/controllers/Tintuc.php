<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tintuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tin_model');
	}

	public function index()
	{
		$data=$this->Tin_model->loaddanhsachtin(0);
		$sotrang=$this->Tin_model->sotrangtin();
		$danhmuctin=$this->Tin_model->load();
		$data=array('dulieutin'=>$data,'sotrang'=>$sotrang, 'cacdanhmuc'=>$danhmuctin);
		$this->load->view('news',$data);
	}
	public function page($trang)
	{
		$offset=($trang-1)*3; // tim vi tri
		$data=$this->Tin_model->loaddanhsachtin($offset);
		$sotrang=$this->Tin_model->sotrangtin();
		$danhmuctin=$this->Tin_model->load();
		$data=array('dulieutin'=>$data,'sotrang'=>$sotrang, 'cacdanhmuc'=>$danhmuctin);
		$this->load->view('news',$data);
	}
	public function chitiettin($id)
	{
		$iddanhmuc=$this->Tin_model->getiddanhmucbyidtin($id);
		$tinlienquan=$this->Tin_model->loaddanhsachtinlienquan($iddanhmuc,$id);
		$data=$this->Tin_model->getdatatintucvadanhmucbyid($id);
		$danhmuctin=$this->Tin_model->load();
		$data=array('dulieutin'=>$data, 'cacdanhmuc'=>$danhmuctin, 'tinlienquan'=>$tinlienquan);
		$this->load->view('news_detail', $data);
	}
	public function danhmuc($iddanhmuc)
	{
		$data=$this->Tin_model->loaddanhsachtintheoiddanhmuc($iddanhmuc);
		$sotrang=$this->Tin_model->sotrangtin();
		$danhmuctin=$this->Tin_model->load();
		$data=array('dulieutin'=>$data,'sotrang'=>$sotrang, 'cacdanhmuc'=>$danhmuctin);
		$this->load->view('news',$data);
	}
}

/* End of file Tintuc.php */
/* Location: ./application/controllers/Tintuc.php */