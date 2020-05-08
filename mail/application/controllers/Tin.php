<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Tin_model');
		$data=$this->Tin_model->load();
		$data=array('kq'=>$data);
		$this->load->view('Danhmuctin_view',$data);
	}
	public function themdanhmuc()
	{
		$tendanhmuc=$this->input->post('tendanhmuc');
		$this->load->model('Tin_model');
		if($this->Tin_model->insertdanhmuc($tendanhmuc))
		{
			echo "OK";
		}
		else
		{
			echo "Loi db";
		}
	}
	public function addJquery()
	{
		$tendanhmuc=$this->input->post('tendanhmuc');
		$this->load->model('Tin_model');
		$this->Tin_model->insertdanhmuc($tendanhmuc);
		echo json_encode($this->db->insert_id());
	}
	public function deleteJquery($id)
	{
		$this->load->model('Tin_model');
		if($this->Tin_model->deletebyid($id))
		{
			echo "OK";
		}
		else
		{
			echo "not OK";
		}
	}
	public function updateJquery()
	{
		$id=$this->input->post('id');
		$tendanhmuc=$this->input->post('tendanhmuc');
		$this->load->model('Tin_model');
		if($this->Tin_model->updatebyid($id,$tendanhmuc))
		{
			echo "OK";
		}
		else
		{
			echo "not OK";
		}
	}
	public function qltin()
	{
		$this->load->model('Tin_model');
		$data=$this->Tin_model->load();
		$datatintuc=$this->Tin_model->loadtintuc();
		$data=array('dulieu'=>$data, 'dulieutin'=>$datatintuc);
		$this->load->view('Quanlytin_view',$data);
	}
	public function themtin()
	{

		// Xu ly anh tin

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["anhtin"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhtin"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["anhtin"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhtin"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["anhtin"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		$linkanh = base_url().$target_file;
		
		//

		$tieude=$this->input->post('tieude');
		$iddanhmuc=$this->input->post('iddanhmuc');
		$noidungtin=$this->input->post('noidungtin');
		$trichdan=$this->input->post('trichdan');
		$this->load->model('Tin_model');
		if($this->Tin_model->inserttin($tieude,$iddanhmuc,$noidungtin,$linkanh,$trichdan))
		{
			echo "OK";
		}
		else
		{
			echo "not OK";
		}
	}
	public function suatin($id)
	{
		$this->load->model('Tin_model');
		$datadanhmuc=$this->Tin_model->gettendanhmucbyidtin($id);
		$data=$this->Tin_model->getdatatintucbyid($id);
		$dulieudanhmuc=$this->Tin_model->load($id);
		$data=array('dulieusua'=>$data,'datadanhmuc'=>$datadanhmuc,'dulieudanhmuc'=>$dulieudanhmuc);
		$this->load->view('Suatin_view', $data);
	}
	public function luutindasua()
	{
		$anhtincu=$this->input->post('anhtincu');
		$anhtin=$_FILES['anhtin']['name'];
		if(empty($anhtin))
		{
			$anhtin=$anhtincu;
		}
		else
		{
			// Xu ly anh tin

			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["anhtin"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["anhtin"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["anhtin"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["anhtin"]["tmp_name"], $target_file)) {
			        // echo "The file ". basename( $_FILES["anhtin"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			$anhtin = base_url().$target_file;
			
			//
		}
		$id=$this->input->post('id');
		$tieude=$this->input->post('tieude');
		$iddanhmuc=$this->input->post('iddanhmuc');
		$noidungtin=$this->input->post('noidungtin');
		$trichdan=$this->input->post('trichdan');
		$this->load->model('Tin_model');
		if($this->Tin_model->updatetinbyid($id,$tieude, $iddanhmuc, $noidungtin,$anhtin,$trichdan))
		{
			echo "OK";
		}
		else
		{
			echo "not OK";
		}
	}
	public function xoatin($id)
	{
		$this->load->model('Tin_model');
		if($this->Tin_model->deletetinbyid($id))
		{
			echo "OK";
		}
		else
		{
			echo "not OK";
		}
	}
}

/* End of file Tin.php */
/* Location: ./application/controllers/Tin.php */