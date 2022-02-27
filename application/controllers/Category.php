<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','product');
		$this->load->model('product_gallery_model','product_gallery');
		$this->load->model('category_model','category');
		$this->load->model('brand_model','brand');
		$this->load->model('media_model','media');
		$this->load->model('setting_model','setting');
		
	}

	public function detail($slug)
	{
		$row = $this->category->get_slug($slug);
		// $this->db->where('category_id',$row['id']);
		// $this->db->where("category_id IN",$row['id']);
		$data['title'] = $row['title'];
		$data['brand_array'] = $this->brand->brand_array();
		$data['show_all_products'] = $this->product->show_all_by_category($row['id']);

		$data['show_all_brands'] = $this->brand->show_all();
		$data['show_all_categories'] = $this->category->show_all_categories();
		$data['get_parent_category'] = $this->category->show_category_by_id(1);
		$data['get_parent_category_women'] = $this->category->show_category_by_id(2);
		$data['tshirt'] = $this->category->show_category_by_id(3);
		$data['shirt'] = $this->category->show_category_by_id(7);
		$data['shalwar_kameez'] = $this->category->show_category_by_id(10);
		$data['abaya'] = $this->category->show_category_by_id(30);
		$data['trouser'] = $this->category->show_category_by_id(37);
		$data['trouser_jeans'] = $this->category->show_category_by_id(15);
		$data['logo'] = $this->setting->logo();
		$this->load->view('category/details',$data);
	}
}

?>