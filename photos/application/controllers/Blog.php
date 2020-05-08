<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Mblog');
		$this->load->model('Mcategory');
		if(!$this->session->has_userdata('admin')) // ngan chan khong cho truy cap vao bat ki function nao cua controller khi chua dang nhap
		{
			redirect('Login'); 
		}
	}

	// List all your items
	public function index($offset=0, $error = NULL)
	{
		$dulieu=$this->Mcategory->get();
		$dulieutin=$this->Mblog->getjoincategory(null,12,$offset);

		$count=$this->Mblog->countblog();

		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'Blog/index';
		$config['total_rows'] = $count;
		$config['per_page'] = 12;
		$config['uri_segment'] = 0;
		$config['num_links'] = 2; // so link tren trang

		$config['full_tag_open'] = '<div class="site-pagination">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<a>';
		$config['first_tag_close'] = '</a>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<a>';
		$config['last_tag_close'] = '</a>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<a>';
		$config['next_tag_close'] = '</a>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<a>';
		$config['prev_tag_close'] = '</a>';
		$config['cur_tag_open'] = '<a class="current">';
		$config['cur_tag_close'] = '</a>';
		
		$this->pagination->initialize($config);

		$data=array('dulieu'=>$dulieu, 'dulieutin'=>$dulieutin, 'error'=>$error);	
		$this->load->view('BlogPage',$data);
	}

	// Add a new item
	public function add()
	{
		$title=$this->input->post('title');
		$head=$this->input->post('head');
		$content=$this->input->post('content');
		$category=$this->input->post('category');
		$config['upload_path'] = './img/blog/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '9000000';
		
		$this->load->library('upload', $config);
		if(empty($_FILES['linkimg']['name']))
		{
			$error=array('error'=>'you must upload picture');
			$this->index(0, $error);
		}
		else if ( ! $this->upload->do_upload('linkimg')){
			$error = array('error' => $this->upload->display_errors());
			$this->index(0, $error);
		}
		else{
			$data=$this->upload->data();
			$linkimg=base_url().'img/blog/'.$data['file_name'];
			$datainsert=array(
			'title'=>$title,
			'head'=>$head,
			'content'=>$content,
			'category'=>$category,
			'linkimg'=>$linkimg
			);
			if($this->Mblog->insert($datainsert))
			{
				$error=array('success'=>'insert sucessfully');
				$this->index(0, $error);
			}
			else
			{
				$error=array('error'=>'can not insert');
				$this->index(0, $error);
			}
		}
		

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{
		if($this->Mblog->delete($id))
		{
			$error=array('successdelete'=>'delete sucessfully');
			$this->index(0, $error);
		}
		else
		{
			$error=array('successdelete'=>'can not delete');
			$this->index(0, $error);
		}
	}

	public function edit($id, $error = NULL)
	{
		$where=array('id'=>$id);
		$data=$this->Mblog->getjoincategory($where);
		$datacate=$this->Mcategory->get();
		$data=array('value'=>$data, 'dulieudanhmuc'=>$datacate, 'error'=>$error);
		$this->load->view('EditBlog', $data);
	}

	public function doedit()
	{
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$head=$this->input->post('head');
		$category=$this->input->post('category');
		$content=$this->input->post('content');
		if(empty($_FILES['linkimg']['name']))
		{
			$linkimg=$this->input->post('linkimgcu');
			$dataupdate=array(
					'title'=>$title,
					'head'=>$head,
					'content'=>$content,
					'category'=>$category,
					'linkimg'=>$linkimg
				);
			if($this->Mblog->update($dataupdate, $id))
			{
				$error=array('success'=>'update sucessfully');
				$this->edit($id,$error);
			}
			else
			{
				$error=array('error'=>'info not change');
				$this->edit($id,$error);
			}
		}
		else
		{
			$config['upload_path'] = './img/blog/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '9000000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('linkimg')){
				$error = array('errorupload' => $this->upload->display_errors());
				$this->edit($id, $error);
			}
			else{
				$data=$this->upload->data();
				$linkimg=base_url().'img/blog/'.$data['file_name'];
				$dataupdate=array(
					'title'=>$title,
					'head'=>$head,
					'content'=>$content,
					'category'=>$category,
					'linkimg'=>$linkimg
				);
				if($this->Mblog->update($dataupdate, $id))
				{
					$error=array('success'=>'update sucessfully');
					$this->edit($id, $error);
				}
				else
				{
					$error=array('error'=>'info not change');
					$this->edit($id, $error);
				}
				}
		}
	}
	public function addcate()
	{
		$catename=$this->input->post('catename');
		$datainsert=array('catename'=>$catename);
		if($this->Mcategory->insert($datainsert))
		{
			$error=array('success'=>'insert type of image sucessfully');
			$this->index(0,$error);
		}
		else
		{
			$error=array('error'=>'can not insert');
			$this->index(0,$error);
		}
	}
	public function updatecate($id)
	{
		$catename=$this->input->post('catename');
		$dataupdate=array('catename'=>$catename);
		if($id==0)
		{
			$error=array('error'=>'can not change this type');
			$this->index(0,$error);
		}
		else if($this->Mcategory->update($dataupdate,$id))
		{
			$error=array('success'=>'update type of image sucessfully');
			$this->index(0,$error);
		}
		else
		{
			$error=array('error'=>'can not update');
			$this->index(0,$error);
		}
	}
	public function deletecate($id)
	{
		if($id==0)
		{
			$error=array('error'=>'can not delete this type');
			$this->index(0,$error);
		}
		else if($this->Mcategory->delete($id))
		{
			$datacate=$this->Mblog->getwherecate($id);
			foreach ($datacate as $key => $value) {
				$this->Mblog->update(array('category'=>0),$value['id']);
			}
			$error=array('success'=>'delete type of image sucessfully');
			$this->index(0,$error);
		}
		else
		{
			$error=array('error'=>'can not delete');
			$this->index(0,$error);
		}
	}
}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */
