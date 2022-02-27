<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Product_model extends CI_Model
{
	public function create($options)
	{
		$this->db->insert('fashmart099_product',$options);
		return $this->db->insert_id();

	}
	

	public function get_by($product_id)
	{
		return $this->db->get_where('fashmart099_product',['id'=>$product_id])->row_array();
	}

	public function get_all($offset=null,$limit=null)
	{
		return $this->db->get('fashmart099_product',$offset,$limit)->result_array();
	}

	public function total_rows()
	{
		return $this->db->get('fashmart099_product')->num_rows();
	}

	public function update($product_id,$where)
	{
		$this->db->where('id',$product_id);
		$this->db->update('fashmart099_product',$where);
		return $this->db->affected_rows();
	}

	public function delete($product_id)
	{
		$this->db->delete('fashmart099_product',['id'=>$product_id]);
		return $this->db->affected_rows();
	}

	//front end
	public function show_all_by_category($category_id)
	{	
		// $this->db->limit(6);
		// $this->db->where('status','activate');
		// return $this->db->get('fashmart099_product')->result_array();
		return $this->db->query("SELECT * from fashmart099_product where FIND_IN_SET($category_id,category_id);")->result_array();
	}

	public function show_all_by_category_withLimit($category_id)
	{
		return $this->db->query("SELECT * from fashmart099_product where FIND_IN_SET($category_id,category_id) limit 8;")->result_array();
	}

	public function show_all_product_with_sale()
	{
		$this->db->limit(4);
		return $this->db->get_where('fashmart099_product',['is_featured'=>1])->result_array();
	}

	public function show_all_new_arrivals()
	{
		$this->db->limit(4);
		$this->db->order_by('id','desc');
		return $this->db->get('fashmart099_product')->result_array();
	}

	public function show_all_most_views()
	{
		$this->db->limit(4);
		$this->db->order_by('views','desc');
		return $this->db->get('fashmart099_product')->result_array();
	}

	public function show_all($product_id)
	{
		return $this->db->get_where('fashmart099_product',['id'=>$product_id])->row_array();
	}

	public function related_products($product_id,$brand_id)
	{
		$this->db->where('id !=',$product_id);
		$this->db->where('brand_id',$brand_id);
		$this->db->limit(8);
		$this->db->order_by('id','RANDOM');
		return $this->db->get('fashmart099_product')->result_array();
	}

	public function get_slug($slug)
	{
		return $this->db->get_where('fashmart099_product',['slug'=>$slug])->row_array();
	}

	public function show_all_products_by_brand($brand_id)
	{
		return $this->db->get_where('fashmart099_product',['brand_id'=>$brand_id])->result_array();
	}

	
}

?>