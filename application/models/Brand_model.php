<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Brand_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($options)
	{
		$this->db->insert('fashmart099_brand',$options);
		return $this->db->insert_id();

	}

	public function get_by($brand_id)
	{
		return $this->db->get_where('fashmart099_brand',['id'=>$brand_id])->row_array();
	}

	public function get_all($offset=null,$limit=null)
	{
		return $this->db->get('fashmart099_brand',$offset,$limit)->result_array();
	}

	public function total_rows()
	{
		return $this->db->get('fashmart099_brand')->num_rows();
	}

	public function update($brand_id,$where)
	{
		$this->db->where('id',$brand_id);
		$this->db->update('fashmart099_brand',$where);
		return $this->db->affected_rows();
	}

	public function brand_array()
	{
		$brands = [];
		foreach ($this->get_all() as $row) {
			$brands[$row['id']] = $row['title'];
		}
		return $brands;
	}

	public function delete($brand_id)
	{
		$this->db->delete('fashmart099_brand',['id'=>$brand_id]);
		return $this->db->affected_rows();
	}

	public function show_all()
	{
		return $this->db->get('fashmart099_brand')->result_array();
	}

	public function get_slug($slug)
	{
		return $this->db->get_where('fashmart099_brand',['slug'=>$slug])->row_array();
	}

}


?>