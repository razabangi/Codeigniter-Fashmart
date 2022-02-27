<?php

/**
 * 
 */
class Product_gallery_model extends CI_Model
{
	public function create($options)
	{
		$this->db->insert('fashmart099_product_gallery', $options);
		return $this->db->insert_id();
	}	

	public function get_gallaries_for_product($product_id)
	{
		$this->db->limit(4);
		return $this->db->get_where('fashmart099_product_gallery',['product_id'=>$product_id])->result_array();
	}

	public function get_gallaries_for_hover($product_id)
	{
		$this->db->limit(1);
		return $this->db->get_where('fashmart099_product_gallery',['product_id'=>$product_id])->result_array();
	}

}

?>