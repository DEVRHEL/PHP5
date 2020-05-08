<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Upload_view');
		echo "<a href=\"".base_url()."Upload/loadresize"."\">Link resize </a>";
		echo "<a href=\"".base_url()."Upload/loadcrop"."\">Link crop </a>";
	}
	public function upload_file()
	{
		$config['upload_path'] = './hinhanh/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000000';
	 
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('anh')){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}
		else{
			// $data = array('upload_data' => $this->upload->data());

			$dulieuanh = $this->upload->data(); 
			echo "<pre>";
			var_dump($data);
			echo "</pre>";
			
			 
			echo base_url().'hinhanh/'.$dulieuanh['file_name'];
		}
	}
	public function loadresize()
	{
		$this->load->view('Resize');
	}
	public function resize()
	{
		$config['upload_path'] = './hinhanh/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100000';		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('anh')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = $this->upload->data();
			echo base_url().'hinhanh/'.$data['file_name'];
			//resize
			$config['image_library']='gd2';
			$config['source_image'] = 'hinhanh/'.$data['file_name'];
			$config['create_thumb'] = TRUE; //se tao ra anh thumb la anh da resize
			$config['maintain_ratio'] = TRUE; // giu nguyen ti le
			$config['width'] = 100;
			$config['height'] = 100;
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

		}
	}
	public function loadcrop()
	{
		$this->load->view('Crop');
	}
	public function crop()
	{
		$config['upload_path'] = './hinhanh/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100000';		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('anh')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = $this->upload->data();
			echo base_url().'hinhanh/'.$data['file_name'];
			//resize
			$config['image_library']='gd2';
			$config['source_image'] = 'hinhanh/'.$data['file_name'];
			$config['create_thumb'] = TRUE; // tao ra anh thumb la anh da crop
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 200;
			$config['height'] = 200;
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			
		}
	}
}

/* End of file Upload.php */
/* Location: ./application/controllers/Upload.php */