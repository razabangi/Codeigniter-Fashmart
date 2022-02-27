<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('isLoggedIn')) {
			redirect('/admin/','refresh');
		}

		$this->load->model('product_gallery_model','product_gallery');
	}

	public function index()
	{
		$data['dataContent'] = '/admin/product_gallery/index';
		$this->load->view('/admin/layout/master', $data);
	}

	public function add($product_id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
			$filePreferences = [
				'upload_path' => './uploads/product-gallery-images/',
				'allowed_types' => 'jpg|jpeg|png|gif',
				'encrypt_name' => TRUE
			];

			$this->upload->initialize($filePreferences);
								
			if ($this->upload->do_upload('file'))
			{
				$file = $this->upload->data();
				$data = [
	        		'product_id' => $product_id,
	        		'gallery_images' => $file['file_name'],
	        	];
	        	$result = $this->product_gallery->create($data);
				if ($result) {
					redirect('/admin/product','refresh');		
				}
			}
		}

		$data['dataContent'] = '/admin/product_gallery/add';
		$this->load->view('/admin/layout/master', $data);
	}

	public function gallery_seed()
	{
		$faker = Faker\factory::create();
        
        for ($i =0; $i < 50; $i++) {
    		$title = $faker->name;
        	$options = [
        		'product_id' => $faker-> numberBetween($min = 1, $max =100 ),
        		'gallery_images' => 'No image found',
        	];
        	$this->product_gallery->create($options);
        }
		redirect('/admin/product_gallery','refresh');
	}
}
