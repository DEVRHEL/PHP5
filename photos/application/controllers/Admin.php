<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mimages');
		$this->load->model('Mtypeimg');
		$this->load->model('Mlogin');
		if(!$this->session->has_userdata('admin')) // ngan chan khong cho truy cap vao bat ki function nao cua controller khi chua dang nhap
		{
			redirect('Login'); 
		}
	}
	public function index($offet=0, $error = NULL)
	{
		$acc=$this->Mlogin->get(0);
		$data=$this->Mimages->getjointypeimg(null,12,$offet);
		$tl=$this->Mtypeimg->get();

		$count=$this->Mimages->countimages();

		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'Admin/index';
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

		$data=array('kq'=>$data, 'tl'=>$tl, 'acc'=>$acc, 'error'=>$error);
		$this->load->view('AdminPage',$data);
	}
	public function addimage()
	{
		$tenanh=$this->input->post('tenanh');
		$theloai=$this->input->post('theloai');

		$config['upload_path'] = './img/portfolio/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '90000000000';
		
		$this->load->library('upload', $config);
		if(empty($_FILES['link']['name']))
		{
			$error=array('error'=>'you must upload picture');
			$this->index(0,$error);
		}
		else if ( ! $this->upload->do_upload('link')){
			$error = array('error' => $this->upload->display_errors());
			$this->index(0,$error);
		}
		else{
			$data=$this->upload->data();
			$link=base_url().'img/portfolio/'.$data['file_name'];
			$datainsert=array(
				'name'=>$tenanh,
				'link'=>$link,
				'type'=>$theloai
			);
			if($this->Mimages->insert($datainsert))
			{
				$error=array('success'=>'insert sucessfully');
				$this->index(0,$error);
			}
			else
			{
				$error=array('error'=>'can not insert');
				$this->index(0,$error);
			}
		}
	}
	public function edit($id, $error = NULL)
	{
		$where=array('id'=>$id);
		$data=$this->Mimages->getjointypeimg($where);
		$datatypeimg=$this->Mtypeimg->get();
		$data=array('value'=>$data, 'typeimg'=>$datatypeimg, 'error'=>$error);
		$this->load->view('Editimages', $data);
	}
	public function doedit()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$type=$this->input->post('type');
		if(empty($_FILES['link']['name']))
		{
			$link=$this->input->post('linkanhcu');
			$dataupdate=array(
					'name'=>$name,
					'link'=>$link,
					'type'=>$type
				);
			if($this->Mimages->update($dataupdate, $id))
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
			$config['upload_path'] = './img/portfolio/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '90000000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('link')){
				$error = array('errorupload' => $this->upload->display_errors());
				$this->edit($id, $error);
			}
			else{
				$data=$this->upload->data();
				$link=base_url().'img/portfolio/'.$data['file_name'];
				$dataupdate=array(
					'name'=>$name,
					'link'=>$link,
					'type'=>$type
				);
				if($this->Mimages->update($dataupdate, $id))
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
	public function delete($id)
	{	
		if($this->Mimages->delete($id))
		{
			$error=array('successdelete'=>'delete sucessfully');
			$this->index(0,$error);
		}
		else
		{
			$error=array('successdelete'=>'can not delete');
			$this->index(0,$error);
		}
	}
	public function addtypeimage()
	{
		$typename=$this->input->post('typename');
		$datainsert=array('typename'=>$typename);
		if($this->Mtypeimg->insert($datainsert))
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
	public function updatetypeimage($id)
	{
		$typename=$this->input->post('typename');
		$dataupdate=array('typename'=>$typename);
		if($id==0)
		{
			$error=array('error'=>'can not change this type');
			$this->index(0,$error);
		}
		else if($this->Mtypeimg->update($dataupdate,$id))
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
	public function deletetypeimage($id)
	{
		if($id==0)
		{
			$error=array('error'=>'can not delete this type');
			$this->index(0,$error);
		}
		else if($this->Mtypeimg->delete($id))
		{
			$dataimg=$this->Mimages->getwheretype($id);
			foreach ($dataimg as $key => $value) {
				$this->Mimages->update(array('type'=>0),$value['id']);
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
	public function updateaccount()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$dataupdate=array('username'=>$username, 'password'=>$password);
		if($this->Mlogin->update($dataupdate,0))
		{
			$error=array('success'=>'update account sucessfully');
			$this->index(0,$error);
		}
		else
		{
			$error=array('error'=>'can not update account');
			$this->index(0,$error);
		}
	}
	public function Test1()
	{
		echo "hihi";
	}
	public function Test()
	{
		$this->Test1();
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */