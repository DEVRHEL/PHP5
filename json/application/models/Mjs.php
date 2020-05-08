<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mjs extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertdata($ten,$dulieu)
	{
		$data= array(
			'ten'=> $ten,
			'dulieu'=>$dulieu
		);
		$this->db->insert('jsondb', $data);
		return $this->db->insert_id();
	}
	public function showdata()
	{
		$this->db->select('*');
		$this->db->where('ten', 'contact');
		$data=$this->db->get('jsondb');
		$data=$data->result_array();
		foreach ($data as $value){
			$kq=$value['dulieu'];
		}
		return $kq;
	}
	public function updatedata($data)
	{
		$this->db->where('ten', 'contact');
		$dl= array(
			'ten' => 'contact',
			'dulieu' => $data
		);
		return $this->db->update('jsondb', $dl);
	}
}

/* End of file Mjs.php */
/* Location: ./application/models/Mjs.php */