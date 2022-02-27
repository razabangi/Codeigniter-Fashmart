<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Brand extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('isLoggedIn')) {
			redirect('/admin');
		}

		$this->load->model('brand_model','brand');
	}

	public function index()
	{
		if($this->input->get('q'))
			$this->db->like('title',$this->input->get('q'),'both');

		$config['base_url'] = base_url().'/admin/brand/index/';
		$config['total_rows'] = $this->brand->total_rows();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 15;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;

		$this->pagination->initialize($config);

		if($this->input->get('q'))
			$this->db->like('title',$this->input->get('q'),'both');

		$data['get_all_brands'] = $this->brand->get_all($config['per_page'],$this->uri->segment(4));
		$data['dataContent'] = '/admin/brand/index';
		$this->load->view('/admin/layout/master',$data);
	}

	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->form_validation->set_rules('title', 'Title', 'required|is_unique[fashmart099_brand.title]');
			$this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[fashmart099_brand.title]');

			if ($this->form_validation->run() == TRUE) {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/brand-images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('brand_img')) {
					$data['fileUploadedErrors'] = $this->upload->display_errors();
				}
				else
				{
					$uploadedFile = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {
					$options = [
						'create_date' => $this->input->post('create_date'),
						'title' => $this->input->post('title'),
						'slug' => $this->input->post('slug'),
						'status' => 'activate',
						'brand_img' => $uploadedFile['file_name'],
						'meta_description' => $this->input->post('meta_description'),
						'meta_keyword' => $this->input->post('meta_keyword')
					];

					$result = $this->brand->create($options);
					if ($result) {
						redirect('/admin/brand','refresh');
					}
				}

				
					
			}
			
		}

		$data['dataContent'] = '/admin/brand/add';
		$this->load->view('/admin/layout/master',$data);
	}

	public function edit($brand_id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$uploadedFile = [];
			$hasFileUploaded = FALSE;

			$filePreferences = [
				'upload_path' => './uploads/brand-images',
				'encrypt_name' => true,
				'allowed_types' => 'jpg|jpeg|png|gif'
			];

			$this->upload->initialize($filePreferences);

			if (!$this->upload->do_upload('brand_img')) {
				$data['fileUploadedErrors'] = $this->upload->display_errors();
			}
			else
			{
				$uploadedFile = $this->upload->data();
				$hasFileUploaded = true;
			}

			if ($hasFileUploaded) {
				$options = [
					'create_date' => $this->input->post('create_date'),
					'title' => $this->input->post('title'),
					'slug' => $this->input->post('slug'),
					'brand_img' => ($hasFileUploaded) ? $uploadedFile['file_name'] : $this->input->post('img_url'),
					'meta_description' => $this->input->post('meta_description'),
					'meta_keyword' => $this->input->post('meta_keyword')
				];

				$result = $this->brand->update($brand_id,$options);
				if ($result) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/brand-images/'.$this->input->post('img_url'))) {
							unlink('./uploads/brand-images/'.$this->input->post('img_url'));
						}
					}
					redirect('/admin/brand','refresh');
				}
			}
			
		}

		$data['brand_result'] = $this->brand->get_by($brand_id);
		$data['dataContent'] = '/admin/brand/edit';
		$this->load->view('/admin/layout/master',$data);
	}

	public function status($brand_id)
	{
		$result = $this->brand->get_by($brand_id);
		$updateStatus = ($result['status'] == 'activate') ? 'deactivate' : 'activate';
		$where = [
			'status' => $updateStatus
		];
		$this->brand->update($brand_id,$where);
		echo $result['status'];
	}

	public function delete($brand_id)
	{
		$result = $this->brand->get_by($brand_id);
		$current_image = $result['brand_img'];

		$deleted = $this->brand->delete($brand_id);
		if ($deleted) {
			if (file_exists('./uploads/brand-images/'.$current_image)) {
				unlink('./uploads/brand-images/'.$current_image);
			}
			// redirect('/admin/brand','refresh');
			echo 1;
		}
	}

	public function selectAllActive()
	{
		$brandids = $this->input->post('brandids');
		$options = ['status'=>'activate'];
		foreach ($brandids as $brand_id) {
			echo $this->brand->update($brand_id,$options);
		}
	}

	public function selectAllDeactive()
	{
		$brandids = $this->input->post('brandids');
		$options = ['status'=>'deactivate'];
		foreach ($brandids as $brand_id) {
			echo $this->brand->update($brand_id,$options);
		}
	}

	public function selectAllDelete()
	{
		$brandids = $this->input->post('brandids');
		foreach ($brandids as $brand_id) {
			echo $this->delete($brand_id);
		}
	}

	public function brand_seed()
	{
		$faker = Faker\Factory::create();
		for ($i = 0; $i <= 50; $i++) {
			$title = $faker->name;
			$options = [
				'create_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
				'title' => $title,
				'slug' => url_title($title, '-', true),
				'brand_img' => 'No Image Found',
				'status' => $faker->randomElement(['activate', 'deactivate']),
				'meta_description' => $faker->text($maxNbChars = 200),
				'meta_keyword' => $faker->randomElement(['keyword-1', 'keyword-2', 'keyword-3'])
			];

			$this->brand->create($options);
		}
			redirect('/admin/brand','refresh');
	}


}

?>