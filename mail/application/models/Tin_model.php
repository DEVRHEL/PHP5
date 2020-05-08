<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}
	public function insertdanhmuc($danhmuc)
	{
		$data=array('tendanhmuc'=>$danhmuc);
		return $this->db->insert('danhmuctin', $data);
	}
	public function load()
	{
		$this->db->select('*');
		$data=$this->db->get('danhmuctin');
		$data=$data->result_array();
		return $data;
	}
	public function loadtintuc()
	{
		$this->db->select('*');
		$data=$this->db->get('tintuc');
		$data=$data->result_array();
		return $data;
	}
	public function getdatabyid($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data=$this->db->get('danhmuctin');
		$data=$data->result_array();
		return $data;
	}
	public function updatebyid($id, $tendanhmuc)
	{
		$this->db->where('id', $id);
		$value = array('id' => $id, 'tendanhmuc'=> $tendanhmuc);
		return $this->db->update('danhmuctin', $value);
	}
	public function deletebyid($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('danhmuctin');
	}
	public function inserttin($tieude, $iddanhmuc, $noidungtin,$linkanh,$trichdan)
	{
		$data=array(
			'tieude'=>$tieude,
			'iddanhmuc'=>$iddanhmuc,
			'noidungtin'=>$noidungtin,
			'anhtin'=>$linkanh,
			'trichdan'=>$trichdan
		);
		$this->db->insert('tintuc', $data);
		return $this->db->insert_id();
	}
	public function updatetinbyid($id,$tieude, $iddanhmuc, $noidungtin,$linkanh,$trichdan)
	{
		$this->db->where('id', $id);
		$value=array(
			'id'=>$id,
			'tieude'=>$tieude,
			'iddanhmuc'=>$iddanhmuc,
			'noidungtin'=>$noidungtin,
			'anhtin'=>$linkanh,
			'trichdan'=>$trichdan
		);
		return $this->db->update('tintuc', $value);
	}
	public function getdatatintucbyid($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data=$this->db->get('tintuc');
		$data=$data->result_array();
		return $data;
	}
	public function getdatatintucvadanhmucbyid($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');
		$this->db->join('tintuc', 'danhmuctin.id = tintuc.iddanhmuc', 'left');
		$this->db->where('tintuc.id', $id);
		$data=$this->db->get();
		$data=$data->result_array();
		return $data;
	}
	public function gettendanhmucbyidtin($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);
		$kq=$this->db->get(); // o tren co from roi nen khong can bang nua
		$kq=$kq->result_array();
		$ten=$kq[0]['tendanhmuc']; // vi luc nay select * nen h chi lay ve ten danh muc thoi
		return $ten;
	}
	public function deletetinbyid($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tintuc');
	}
	public function sotrangtin()
	{
		$sotrangtintrong1trang=3;
		$this->db->select('*');
		$ketqua=$this->db->get('tintuc');
		$ketqua=$ketqua->result_array();
		$soluongtin=count($ketqua);
		$sotrang=ceil($soluongtin/$sotrangtintrong1trang); // round la ham lam tron xuong, ceil la lam tron len
		return $sotrang;
	}
	public function loaddanhsachtin($offset)
	{
		$this->db->select('*');
		$this->db->join('tintuc', 'danhmuctin.id = tintuc.iddanhmuc','left'); // join bang nao thi id bang do
		$data=$this->db->get('danhmuctin',3, $offset); // 3 la so luong tin tren trang
		$data=$data->result_array();
		return $data;
	}
	public function loaddanhsachtintheoiddanhmuc($iddanhmuc)
	{
		$this->db->select('*');
		$this->db->join('tintuc', 'danhmuctin.id = tintuc.iddanhmuc','left'); // join bang nao thi id bang do
		$this->db->where('danhmuctin.id', $iddanhmuc);
		$data=$this->db->get('danhmuctin',3, 0); // 3 la so luong tin tren trang
		$data=$data->result_array();
		return $data;
	}
	public function loaddanhsachtinlienquan($iddanhmuc,$idtin)
	{
		$this->db->select('*');
		$this->db->join('tintuc', 'danhmuctin.id = tintuc.iddanhmuc','left'); // join bang nao thi id bang do
		$this->db->where('tintuc.iddanhmuc', $iddanhmuc);
		$this->db->where('tintuc.id !=', $idtin);
		$data=$this->db->get('danhmuctin',3, 0); // 3 la so luong tin tren trang
		$data=$data->result_array();
		return $data;
	}
	public function getiddanhmucbyidtin($id)
	{
		// ham nay copy lai ham kia chu cung k can code ntn chi can select iddanhmuc from tintuc where id=$id;
		$this->db->select('*');
		$this->db->from('danhmuctin');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);
		$kq=$this->db->get(); // o tren co from roi nen khong can bang nua
		$kq=$kq->result_array();
		$iddanhmuc=$kq[0]['iddanhmuc']; // vi luc nay select * nen h chi lay ve ten danh muc thoi
		return $iddanhmuc;
	}
}

/* End of file Tin_model.php */
/* Location: ./application/models/Tin_model.php */