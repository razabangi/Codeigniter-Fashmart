<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model','category');
	}

	public function check()
	{
		$value = '1,3,6';
		$result = $this->category->category_arrays($value);
		print_r($result);
	}

	public function index()
	{
		if($this->input->get('q'))
			$this->db->like('title',$this->input->get('q'),'both');

		$config['base_url'] = base_url().'/admin/category/index/';
		$config['total_rows'] = $this->category->total_rows();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 15;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;

		$this->pagination->initialize($config);

		if($this->input->get('q'))
			$this->db->like('title',$this->input->get('q'),'both');

		$data['get_all_categories'] = $this->category->get_all($config['per_page'],$this->uri->segment(4));

		$data['category_array'] = $this->category->category_array();
		$data['dataContent'] = '/admin/category/index';
		$this->load->view('admin/layout/master',$data);
	}

	public function add()
	{

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[fashmart099_category.slug]');


			if ($this->form_validation->run() == TRUE) {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/category_images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('category_image')) {
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
						'category_image' => $uploadedFile['file_name'],
						'parent_id' => $this->input->post('parent_id')
					];

					$result = $this->category->create($options);
					if ($result) {
						redirect('/admin/category','refresh');
					}
				}			
					
			}
			
		}


		$data['allCategories'] = $this->category->show_all_categories();
		$data['dataContent'] = '/admin/category/add';
		$this->load->view('admin/layout/master',$data);
	}


	public function edit($category_id)
	{

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$uploadedFile = [];
			$hasFileUploaded = FALSE;

			$filePreferences = [
				'upload_path' => './uploads/category_images/',
				'allowed_types' => 'gif|png|jpg|jpeg',
				'encrypt_name' => true

			];

			$this->upload->initialize($filePreferences);

			if (!$this->upload->do_upload('category_image')) {
				$data['fileUploadedErrors'] = $this->upload->display_errors();
			}
			else
			{
				$uploadedFile = $this->upload->data();
				$hasFileUploaded = TRUE;
			}

				$options = [
					'create_date' => $this->input->post('create_date'),
					'title' => $this->input->post('title'),
					'slug' => $this->input->post('slug'),
					'category_image' => ($hasFileUploaded) ? $uploadedFile['file_name'] : $this->input->post('img_url'),
					'parent_id' => $this->input->post('parent_id')
					
				];

				$result = $this->category->update($category_id,$options);
				if ($result) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/category_images/'.$this->input->post('img_url'))) {
							unlink('./uploads/category_images/'.$this->input->post('img_url'));
						}
					}
					redirect('/admin/category','refresh');
				}
			
		}

		$data['category_array'] = $this->category->category_array();
		$data['get_categories'] = $this->category->get_by($category_id);
		$data['dataContent'] = '/admin/category/edit';
		$this->load->view('admin/layout/master',$data);
	}

	public function squenceCategories($parent_id = 0, $sub_mark = '')
	{	    
	 	$query = $this->category->show_category_by($parent_id);  
        foreach($query as $row){
            echo '<option value="'.$row['id'].'">'.$sub_mark.$row['title'].'</option>';
            $this->squenceCategories($row['id'], $sub_mark.'---');
        }	

	}


	public function fetchAllCategories()
	{
		$parent_id = 0;
		$result = $this->category->show_all_categories();
		foreach($result as $row)
		{
		 	$data = $this->get_node_data($parent_id);
		}

		echo json_encode(array_values($data));
		
	}

	public function get_node_data($parent_id)
	{
		 $result = $this->category->show_category_by($parent_id);
		 $output = array();
		 foreach($result as $row)
		 {
		  $sub_array = array();
		  $sub_array['text'] = $row['title'];
		  $sub_array['nodes'] = array_values($this->get_node_data($row['id']));
		  $output[] = $sub_array;
		 }
		 return $output;
	}

	public function status($category_id)
	{
		$result = $this->category->get_by($category_id);
		$updateStatus = ($result['status'] == 'activate') ? 'deactivate' : 'activate';
		$where = [
			'status' => $updateStatus
		];
		$this->category->update($category_id,$where);
		echo $result['status'];
	}

	public function delete($category_id)
	{
		$result = $this->category->get_by($category_id);
		$current_image = $result['category_image'];

		$deleted = $this->category->delete($category_id);
		if ($deleted) {
			if (file_exists('./uploads/category_images/'.$current_image)) {
				unlink('./uploads/category_images/'.$current_image);
			}
			// redirect('/admin/category','refresh');
			echo 1;
		}
	}

	public function selectAllActive()
	{
		$categoryids = $this->input->post('categoryids');
		$options = ['status'=>'activate'];
		foreach ($categoryids as $category_id) {
			echo $this->category->update($category_id,$options);
		}
	}

	public function selectAllDeactive()
	{
		$categoryids = $this->input->post('categoryids');
		$options = ['status'=>'deactivate'];
		foreach ($categoryids as $category_id) {
			echo $this->category->update($category_id,$options);
		}
	}

	public function selectAllDelete()
	{
		$categoryids = $this->input->post('categoryids');
		foreach ($categoryids as $category_id) {
			echo $this->delete($category_id);
		}
	}
}



?>