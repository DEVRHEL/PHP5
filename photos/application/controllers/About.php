<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mabout');
		if(!$this->session->has_userdata('admin')) // ngan chan khong cho truy cap vao bat ki function nao cua controller khi chua dang nhap
		{
			redirect('Login'); 
		}
	}

	// List all your items
	public function index($error = NULL)
	{
		
		$dataauthor=$this->Mabout->get(1);
		$dataauthor=json_decode($dataauthor['data'],true);
		$data=array('value' => $dataauthor, 'error'=>$error);
		$this->load->view("AboutPage",$data);
	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update()
	{
		$name=$this->input->post('name');
		$content=$this->input->post('content');
		$myclients=$this->input->post('myclients');
		$editorials=$this->input->post('editorials');
		if(empty($_FILES['linkava']['name']))
		{
			$linkava=$this->input->post('linkanhcu');
			$data=array(
			'name'=>$name,
			'content'=>$content,
			'myclients'=>$myclients,
			'editorials'=>$editorials,
			'linkava'=>$linkava
			);
			$data=json_encode($data);
			$data=array('data'=>$data);
			if($this->Mabout->update($data,1))
			{
				$error=array('success'=>'update sucessfully');
				$this->index($error);
			}
			else
			{
				$error=array('error'=>'info not change');
				$this->index($error);
			}
		}
		else
		{
			$config['upload_path'] = './img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '900000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('linkava')){
				$error = array('error' => $this->upload->display_errors());
				$this->index($error);
			}
			else{
				$data=$this->upload->data();
				$linkava=base_url().'img/'.$data['file_name'];
				$data=array(
				'name'=>$name,
				'content'=>$content,
				'myclients'=>$myclients,
				'editorials'=>$editorials,
				'linkava'=>$linkava
				);
				$data=json_encode($data);
				$data=array('data'=>$data);
				if($this->Mabout->update($data,1))
				{
					$error=array('success'=>'update sucessfully');
					$this->index($error);
				}
				else
				{
					$error=array('error'=>'info not change');
					$this->index($error);
				}
			}
		}
		
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file About.php */
/* Location: ./application/controllers/About.php */
