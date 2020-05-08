<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelmail extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function booking($tenkh, $email, $sdt, $ngaydatban, $giodatban, $songuoi)
	{
		$data=array(
			'tenkh'=> $tenkh,
			'email'=> $email,
			'sdt'=> $sdt,
			'ngaydatban'=>$ngaydatban,
			'giodatban'=>$giodatban,
			'songuoi'=> $songuoi
		);
		return $this->db->insert('datban', $data);
	}
}

/* End of file Modelmail.php */
/* Location: ./application/models/Modelmail.php */