<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('mail/PHPMailerAutoload.php');
class Photos extends CI_Controller {
	private $getcatepage;
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model("Mphotos");
		$data=$this->Mphotos->get_tbl_images();
		$data_welcome=$this->Mphotos->get_tbl_welcome();
		$data=array('dataimages' => $data);
		$data['datawelcome']=$data_welcome;
		$this->load->view("Index",$data);
	}
	public function Portfolio($offset=0)
	{
		$this->load->model('Mphotos');
		$this->load->model('Mtypeimg');
		$data=$this->Mphotos->get_tbl_images_filo(18,$offset);
		$type=$this->Mtypeimg->get();
		$count=$this->Mphotos->countimages();

		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'Photos/Portfolio';
		$config['total_rows'] = $count;
		$config['per_page'] = 18;
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
		
		$data=array('datafilo' => $data, 'type'=>$type);
		$this->load->view("Portfolio",$data);
	}
	public function About()
	{
		$this->load->model('Mabout');
		$dataauthor=$this->Mabout->get(1);
		$dataauthor=json_decode($dataauthor['data'],true);
		$data=array('value' => $dataauthor);
		$this->load->view("About",$data);
	}
	public function Contact($error=NULL)
	{
		$data=array('error'=>$error);
		$this->load->view("Contact",$data);
	}
	public function Blog($offset=0)
	{
		$this->load->model('Mblog');
		$this->load->model('Mphotos');
		$data=$this->Mblog->getjoincategory(null,3,$offset);
		$count=$this->Mphotos->countblog();

		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'Photos/Blog';
		$config['total_rows'] = $count;
		$config['per_page'] = 3;
		$config['uri_segment'] = 0;
		$config['num_links'] = 2;

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
		

		$data=array('datablog' => $data);
		$this->load->view("Blog",$data);
	}
	public function Danhmuc($category, $offset=0)
	{
		$this->load->model('Mphotos');
		$data=$this->Mphotos->get_tinbycategory($category,3,$offset);
		$count=$this->Mphotos->countcateinblog($category);
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'Photos/Danhmuc/'.$category;
		$config['first_url'] =0; // khi func co 2 tham so truyen vao thi choi cai nay
		$config['total_rows'] = $count;
		$config['per_page'] = 3;
		$config['uri_segment'] = 0;
		$config['num_links'] = 2;

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

		$data=array('datablog' => $data);
		$this->load->view("Blog",$data);
	}
	public function Read($id)
	{
		$this->load->model('Mblog');
		$this->load->model('Mcategory');
		$this->load->model('Mphotos');
		
		$cateid=$this->Mphotos->getcateidbyidtin($id);

		$data=$this->Mblog->getjoincategory($id);
		$cate=$this->Mcategory->get();
		$tlq=$this->Mphotos->get_tinlienquan($cateid, $id);
		$data=array('value' => $data, 'cacdanhmuc'=>$cate, 'tlq'=>$tlq);
		$this->load->view("Read",$data);
	}
	public function sendmail($error=NULL)
	{
		$nameclient=$this->input->post('nameclient');
		$mailclient=$this->input->post('mailclient');
		$subjectclient=$this->input->post('subjectclient');
		$contentclient=$this->input->post('contentclient');
		if(empty($nameclient) || empty($mailclient) || empty($subjectclient) || empty($contentclient))
		{
			$error=array('error'=>'you must fill all');
			$this->Contact($error);
		}
		else
		{
			$this->load->model('Mmailconfig');
			$data=$this->Mmailconfig->get(1);
			$mail = new PHPMailer;
			$mail->isSMTP();                                      
			$mail->Host = $data['host']; 
			$mail->SMTPAuth = true;                              
			$mail->Username = $data['username'];      
			$mail->Password = $data['password'];  
			$mail->SMTPSecure = $data['smtpsecure'];            
			$mail->Port = $data['port'];                     

			
			$mail->setFrom($data['addressfrom'], $data['namefrom']);
			$mail->addAddress($data['username'], 'Admin');
			$mail->Subject = $subjectclient;
			$mail->Body    = "Ten: ".$nameclient."\n Email: ".$mailclient."\n Noi dung: ".$contentclient;
			$mail->CharSet = "UTF-8"; // CharSet S phai viet hoa
			if(!$mail->send()) {
			    $error= 'Message could not be sent. '.$mail->ErrorInfo;
			    $error=array('error'=>$error);
				$this->Contact($error);
			} else {
			    $error=array('error'=>'Successfully');
				$this->Contact($error);
			}
		}
	}
}
