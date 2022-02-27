<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
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

	public function index()
	{
		$data['sliders'] = $this->media->show_all();
		$data['get_parent_category'] = $this->category->show_category_by_id(1);
		$data['tshirt'] = $this->category->show_category_by_id(3);
		$data['shirt'] = $this->category->show_category_by_id(7);
		$data['shalwar_kameez'] = $this->category->show_category_by_id(10);
		$data['abaya'] = $this->category->show_category_by_id(30);
		$data['trouser'] = $this->category->show_category_by_id(37);
		$data['trouser_jeans'] = $this->category->show_category_by_id(15);
		$data['get_parent_category_women'] = $this->category->show_category_by_id(2);
		$data['brand_array'] = $this->brand->brand_array();
		$data['show_all_mens_products'] = $this->product->show_all_by_category_withLimit(1);
		$data['show_all_womens_products'] = $this->product->show_all_by_category_withLimit(2);
		$data['show_all_sherwani_products'] = $this->product->show_all_by_category_withLimit(13);
		$data['show_all_chinos_products'] = $this->product->show_all_by_category_withLimit(16);
		$data['show_all_product_with_sale'] = $this->product->show_all_product_with_sale();
		$data['show_all_new_arrivals'] = $this->product->show_all_new_arrivals();
		$data['show_all_most_views'] = $this->product->show_all_most_views();
		$data['small_banners'] = $this->setting->show_all_mini_banners();
		$data['logo'] = $this->setting->logo();
		$data['big_banners'] = $this->setting->show_all_big_banners();
		$this->load->view('index',$data);
	}
}

?>