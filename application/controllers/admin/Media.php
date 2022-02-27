<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('isLoggedIn')) {
			redirect('/admin/','refresh');
		}
		$this->load->model("media_model",'media');
	}
	
	public function index()
	{
		if($this->input->get('q'))
			$this->db->like('title',$this->input->get('q'),'both');

		$config['base_url'] = base_url().'/admin/media/index/';
		$config['total_rows'] = $this->media->total_rows();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 15;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;

		$this->pagination->initialize($config);

		if($this->input->get('q'))
			$this->db->like('title',$this->input->get('q'),'both');

		$data['medias_info'] = $this->media->get_all($config['per_page'],$this->uri->segment(4));
		$data['dataContent'] = '/admin/media/index';
		$this->load->view('/admin/layout/master', $data);
	}

	public function add()
	{

		if ($this->input->server("REQUEST_METHOD") == "POST") {

			$this->form_validation->set_rules('media_type', 'Media Type', 'required|callback_check_media');
			$this->form_validation->set_rules('title','Title','required');

			if($this->form_validation->run() == TRUE) {

				$fileUploaded = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/media_images/',
					'allowed_types' => 'jpg|jpeg|png|gif',
					'encrypt_name' => TRUE
				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('media_img')) {
					$data['fileUploadError'] = $this->upload->display_errors();
				}
				else
				{
					$fileUploaded = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {
					$options = [
						"create_date" => $this->input->post("create_date"),
						"media_type" => $this->input->post("media_type"),
						"title" => $this->input->post("title"),
						"slug" => $this->input->post("slug"),
						"embed_code" => $this->input->post("embed_code"),
						"media_img" => $fileUploaded['file_name'],
						"status" => "activate",
						"meta_description" => $this->input->post("meta_description"),
						"meta_keyword" => $this->input->post("meta_keyword")
					];

					$result = $this->media->create($options);
					if ($result) {
						redirect("/admin/media","refresh");
					}					
				}
				
			}

		}

		$data['dataContent'] = '/admin/media/add';
		$this->load->view('/admin/layout/master', $data);
	}

	public function check_media()
	{
		if ($this->input->post('media_type') === 'Select Media Type')  {
            $this->form_validation->set_message('check_media', 'Please choose your media type.');
            return FALSE;
        }
        else {
            return TRUE;
        }
	}

	public function edit($media_id)
	{
		if($this->input->server('REQUEST_METHOD') == "POST")
		{

			$fileUploaded = [];
			$hasFileUploaded = FALSE;

			$filePreferences = [
				'upload_path' => './uploads/media_images/',
				'allowed_types' => 'jpg|jpeg|png|gif',
				'encrypt_name' => TRUE
			];

			$this->upload->initialize($filePreferences);

			if (!$this->upload->do_upload('media_img')) {
				$data['fileUploadError'] = $this->upload->display_errors();
			}
			else{
				$fileUploaded = $this->upload->data();
				$hasFileUploaded = TRUE;
			}

			if ($hasFileUploaded) {
				$options = [
					"create_date" => $this->input->post("create_date"),
					"media_type" => $this->input->post("media_type"),
					"title" => $this->input->post("title"),
					"slug" => $this->input->post("slug"),
					"embed_code" => $this->input->post("embed_code"),
					"media_img" => ($hasFileUploaded) ? $fileUploaded['file_name'] : $this->input->post('image_url'),
					"meta_description" => $this->input->post("meta_description"),
					"meta_keyword" => $this->input->post("meta_keyword")
				];

				$affected = $this->media->update($media_id,$options);
				if ($affected) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/media_images/'.$this->input->post('image_url'))) {
							unlink('./uploads/media_images/'. $this->input->post('image_url'));
						}
					}
				}
				redirect('/admin/media','refresh');				
			}

		}

		$data['media_info'] = $this->media->get_by($media_id);
		$data['dataContent'] = '/admin/media/edit';
		$this->load->view('/admin/layout/master', $data);
	}

	public function status($media_id)
	{
		$currentStatus = $this->media->get_by($media_id);
		$newStatus = ($currentStatus['status'] == "deactivate") ? "activate" : "deactivate";
		$option = ['status'=>$newStatus];
		$this->media->update($media_id,$option);
		echo $currentStatus['status'];
		// redirect('/admin/media','refresh');
	}

	public function delete($media_id)
	{
		$result = $this->media->get_by($media_id);
		$current_image = $result['media_img'];

		$deleted = $this->media->delete($media_id);
		if ($deleted) {
			if (file_exists('./uploads/media_images/'.$current_image)) {
				unlink('./uploads/media_images/'.$current_image);
			}
			// redirect('/admin/brand','refresh');
			echo 1;
		}

	}

	public function selectAllActive()
	{
		$mediaids = $this->input->post('mediaids');
		$options = ['status'=>'activate'];
		foreach ($mediaids as $media_id) {
			echo $this->media->update($media_id,$options);
		}
	}

	public function selectAllDeactive()
	{
		$mediaids = $this->input->post('mediaids');
		$options = ['status'=>'deactivate'];
		foreach ($mediaids as $media_id) {
			echo $this->media->update($media_id,$options);
		}
	}

	public function selectAllDelete()
	{
		$mediaids = $this->input->post('mediaids');
		foreach ($mediaids as $media_id) {
			echo $this->delete($media_id);
		}
	}

}




