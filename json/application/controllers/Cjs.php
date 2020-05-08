<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cjs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $contact1 = array(
		// 	'ten' => "Nguyen van A",
		// 	'tuoi' => "19"
		// );
		// $contact2 = array(
		// 	'ten' => "Nguyen van B",
		// 	'tuoi' => "20"
		// );
		// $contact=array();
		// array_push($contact, $contact1);
		// array_push($contact, $contact2);
		
		// //ma hoa mang contact => json bang ham json_encode()
		// $jsonencode=json_encode($contact);
		
		// $this->load->model('Mjs');
		// echo $this->Mjs->insertdata('contact',$jsonencode);
		// var_dump($jsonencode);

		$this->load->model('Mjs');
		$data=$this->Mjs->showdata();
		$data=json_decode($data);
		$data=array('mangkq'=> $data);
		$this->load->view('Vjs', $data, FALSE);

		// echo '<pre>';
		// var_dump($data);
		// echo '</pre>';
	}
	public function add()
	{
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$this->load->model('Mjs');
		$data=$this->Mjs->showdata();
		$data=json_decode($data,true); //co true thi no thanh kieu mang con khong co true thi no bien thanh dang object

		$cn=array(
			'ten'=> $ten,
			'tuoi' => $tuoi
		);
		array_push($data,$cn);
		$data=json_encode($data);
		$this->Mjs->updatedata($data);
	}
	public function xoa($tuoi)
	{
		$this->load->model('Mjs');
		$data=$this->Mjs->showdata();
		$data=json_decode($data,true);
		foreach ($data as $key=> $value) {
			if($value['tuoi']==$tuoi)
			{
				

				//xoa phan tu do bang unset
				unset($data[$key]);
			}
		}
		var_dump($data);
		$data=json_encode($data,true);

		return $this->Mjs->updatedata($data);
		echo '<pre>';
				var_dump($data);
				echo '</pre>';
	}

}

/* End of file Cjs.php */
/* Location: ./application/controllers/Cjs.php */