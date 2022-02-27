<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','product');
		$this->load->model('brand_model','brand');
		$this->load->model('category_model','category');
	}

	public function index()
	{
		if($this->input->get('q'))
			$this->db->like('title',$this->input->get('q'),'both');

		$config['base_url'] = base_url().'/admin/product/index/';
		$config['total_rows'] = $this->product->total_rows();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 15;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;

		$this->pagination->initialize($config);

		if($this->input->get('q'))
			$this->db->like('title',$this->input->get('q'),'both');

		$data['brand_array'] = $this->brand->brand_array();		
		$data['get_all_products'] = $this->product->get_all($config['per_page'],$this->uri->segment(4));
		$data['dataContent'] = '/admin/product/index';
		$this->load->view('/admin/layout/master',$data);
	}

	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->form_validation->set_rules('title', 'Title', 'required|is_unique[fashmart099_brand.title]');
			// $this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[fashmart099_product.title]');
			// $this->form_validation->set_rules('sku', 'SKU', 'required|is_unique[fashmart099_product.sku]');
			// $this->form_validation->set_rules('price', 'Price', 'required');


			if ($this->form_validation->run() == TRUE) {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/product_images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('product_img')) {
					$data['fileUploadedErrors'] = $this->upload->display_errors();
				}
				else
				{
					$uploadedFile = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {

					$category_ids = $this->input->post('category_id');
					$category_id = implode(',', $category_ids);

					$is_featured = $this->input->post('is_featured');
					$is_feature = ($is_featured == 1) ? 1 : 0;

					$options = [
						'create_date' => $this->input->post('create_date'),
						'title' => $this->input->post('title'),
						'slug' => $this->input->post('slug'),
						'sku' => $this->input->post('sku'),
						'brand_id' => $this->input->post('brand_id'),
						'category_id' => $category_id,
						'status' => 'activate',
						'product_img' => $uploadedFile['file_name'],
						'price' => $this->input->post('price'),
						'special_price' => $this->input->post('special_price'),
						'is_featured' => $is_feature,
						'description' => $this->input->post('description'),
						'meta_description' => $this->input->post('meta_description'),
						'meta_keyword' => $this->input->post('meta_keyword')
					];

					$result = $this->product->create($options);
					if ($result) {
						redirect('/admin/product','refresh');
					}
				}

				
					
			}
			
		}

		$data['show_all_parent_categories'] = $this->category->show_all_parent_categories(0);
		$data['all_brands'] = $this->brand->show_all();
		$data['dataContent'] = '/admin/product/add';
		$this->load->view('/admin/layout/master',$data);
	}

	public function sub_child($parent_id)
	{

		$result = $this->category->show_sub_child($parent_id);
		if ($result) {
			$output = '<option value="">Select Category</option>';
			  foreach($result as $row)
			  {
			    $output .= '<option value="'.$row['id'].'">'.$row['title'].'</option>';
			  }
			  echo $output;

		}
	}

	public function edit($product_id)
	{
		if ($this->input->server("REQUEST_METHOD") == 'POST') {

			$uploadData = [];
			$hasFileUploaded = false;

			$config = [
				'upload_path' => './uploads/product_images',
				'allowed_types' => 'jpeg|jpg|png',
				'encrypt_name' => true
			];

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('product_img')) {
				$data['uploadingErrors'] = $this->upload->display_errors();
			}
			else{
				$uploadData = $this->upload->data();
				$hasFileUploaded = true;
			}

			$category_ids = $this->input->post('category_id');
			$category_id = implode(',', $category_ids);

			$is_featured = $this->input->post('is_featured');
			$is_feature = ($is_featured == 1) ? 1 : 0;

			$options = [
				'create_date' => $this->input->post('create_date'),
				'title' => $this->input->post('title'),
				'slug' => $this->input->post('slug'),
				'sku' => $this->input->post('sku'),
				'brand_id' => $this->input->post('brand_id'),
				'category_id' => $category_id,
				'status' => 'activate',
				'product_img' => ($hasFileUploaded) ? $uploadData['file_name'] : $this->input->post('img_url'),
				'price' => $this->input->post('price'),
				'special_price' => $this->input->post('special_price'),
				'is_featured' => $is_feature,
				'description' => $this->input->post('description'),
				'meta_description' => $this->input->post('meta_description'),
				'meta_keyword' => $this->input->post('meta_keyword')
			];

			$affected = $this->product->update($product_id,$options);
			if ($affected){
				if ($hasFileUploaded) {
					if (file_exists('./uploads/product_images/'.$this->input->post('img_url'))) {
						unlink('./uploads/product_images/'.$this->input->post('img_url'));
					}
				}
				redirect('/admin/product','refresh');
			}
			
		}

		$data['show_all_parent_categories'] = $this->category->show_all_parent_categories(0);
		$data['all_brands'] = $this->brand->show_all();
		$data['get_product'] = $this->product->get_by($product_id);
		$data['dataContent'] = '/admin/product/edit';
		$this->load->view('/admin/layout/master',$data);
	}


	public function status($product_id)
	{
		$result = $this->product->get_by($product_id);
		$updateStatus = ($result['status'] == 'activate') ? 'deactivate' : 'activate';
		$where = [
			'status' => $updateStatus
		];
		$this->product->update($product_id,$where);
		echo $result['status'];
	}

	public function delete($product_id)
	{
		$result = $this->product->get_by($product_id);
		$current_image = $result['product_img'];

		$deleted = $this->product->delete($product_id);
		if ($deleted) {
			if (file_exists('./uploads/product_images/'.$current_image)) {
				unlink('./uploads/product_images/'.$current_image);
			}
			// redirect('/admin/product','refresh');
			echo 1;
		}
	}

	public function selectAllActive()
	{
		$productids = $this->input->post('productids');
		$options = ['status'=>'activate'];
		foreach ($productids as $product_id) {
			echo $this->product->update($product_id,$options);
		}
	}

	public function selectAllDeactive()
	{
		$productids = $this->input->post('productids');
		$options = ['status'=>'deactivate'];
		foreach ($productids as $product_id) {
			echo $this->product->update($product_id,$options);
		}
	}

	public function selectAllDelete()
	{
		$productids = $this->input->post('brandids');
		foreach ($brandids as $product_id) {
			echo $this->delete($product_id);
		}
	}

	public function product_seed()
	{
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 150; $i++) {
		  
			$title = $faker->name;

			$options = [
				'brand_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]),
				'create_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
				'title'=>$title,
				'slug'=>url_title($title,'-',true),
				'sku' => $title."-01",
				'price' => $faker->randomElement([11999,45999,299,499,849,549,4599,111999,1249,6499,7899,2349,6549,2549,3249]),
				'special_price' => $faker->randomElement([11999,45999,299,499,849,549,4599,111999,1249,6499,7899,2349,6549,2549,3249]),
				'description' => $faker->text($maxNbChars = 200),								
				'product_img' => 'No image found',
				'views' => $faker->randomElement([45,65,23,1,56,8,5,95,64,32,15,32,54,21,561,84,2]),
				'category_id' => $faker->randomElement(['1,3,4','1,3,5','1,3,6','1,7,8','1,7,9','1,10,11','1,10,12','1,10,13','1,10,14','1,15,16','1,15,17','1,15,18','2,22,23','2,22,24','2,25,26','2,25,27','2,25,28','2,29,30','2,29,31','2,29,32','2,33,34','2,33,35','2,33,36','2,33,37']),
				'status' => $faker->randomElement(['activate', 'deactivate']),
				'is_featured' => $faker->randomElement([1,0]),
				'meta_description' => $faker->text($maxNbChars = 100),
				'meta_keyword' => $faker->randomElement(['keyword-1', 'keyword-2', 'keyword-3'])
			];

			$this->product->create($options);

		}

		redirect('/admin/product/','refresh');
	}

}


?>