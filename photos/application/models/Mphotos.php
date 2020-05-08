<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mphotos extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}
	public function get_tbl_images()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$data=$this->db->get('tbl_images',21);
		$data=$data->result_array();
		return $data;
	}
	public function get_tbl_images_filo($num, $offset)
	{
		$this->db->select('*');
		$this->db->join('tbl_typeimg', 'tbl_typeimg.typeid = tbl_images.type', 'left');
		$this->db->order_by('id', 'desc');
		$data=$this->db->get('tbl_images',$num,$offset);
		$data=$data->result_array();
		return $data;
	}
	public function get_tbl_welcome()
	{
		$this->db->select('*');
		$data=$this->db->get('tbl_welcome',1);
		$data=$data->result_array();
		return $data;
	}
	public function get_tbl_author()
	{
		$this->db->select('*');
		$data=$this->db->get('tbl_author',1);
		$data=$data->result_array();
		return $data;
	}
	public function get_tbl_blog()
	{
		$this->db->select('*');
		$data=$this->db->get('tbl_blog');
		$data=$data->result_array();
		return $data;
	}
	public function get_tbl_blog_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data=$this->db->get('tbl_blog');
		$data=$data->result_array();
		return $data;
	}
	public function getcateidbyidtin($id)
	{
		$this->db->select('category');
		$this->db->where('id', $id);
		$data=$this->db->get('tbl_blog');
		$data=$data->result_array();
		return $data[0]['category'];
	}
	public function get_tinlienquan($cateid, $id)
	{
		$this->db->select('*');
		$this->db->join('tbl_category', 'tbl_blog.category = tbl_category.cateid','left');
		$this->db->where('tbl_blog.id !=', $id);
		$this->db->where('tbl_blog.category', $cateid);
		$this->db->order_by('id', 'desc');
		$data=$this->db->get('tbl_blog',3, 0); // 3 la so luong tin tren trang
		$data=$data->result_array();
		return $data;
	}
	public function get_tinbycategory($category,$num,$offset)
	{
		$this->db->select('*');
		$this->db->join('tbl_category', 'tbl_category.cateid = tbl_blog.category', 'left');
		$this->db->where('tbl_blog.category', $category);
		$this->db->order_by('id', 'desc');
		$data=$this->db->get('tbl_blog',$num,$offset);
		$data=$data->result_array();
		return $data;
	}
	public function countblog()
	{
		return $this->db->count_all('tbl_blog');
	}
	public function countimages()
	{
		return $this->db->count_all('tbl_images');
	}
	public function countcateinblog($cateid)
	{
		$this->db->select('*');
		$this->db->where('category', $cateid);
		$data=$this->db->get('tbl_blog');
		return $data->num_rows();
	}
}
