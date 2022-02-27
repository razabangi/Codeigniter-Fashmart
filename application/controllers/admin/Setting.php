<?php

/**
 * 
 */
class Setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model','setting');
	}

	public function index()
	{		

		$data['dataContent'] = '/admin/setting/index';
		$this->load->view('/admin/layout/master',$data);
	}

	public function logo()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/logo-images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('logo_img')) {
					$data['fileUploadedErrors'] = $this->upload->display_errors();
				}
				else
				{
					$uploadedFile = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {
				$options = [
					'image' => ($hasFileUploaded) ? $uploadedFile['file_name'] : $this->input->post('img_url'),
					'type' => 'logo'
				];

				$result = $this->setting->update(1,$options);
				if ($result) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/logo-images/'.$this->input->post('img_url'))) {
							unlink('./uploads/logo-images/'.$this->input->post('img_url'));
						}
					}
					redirect('/admin/setting','refresh');
				}
			}
	
		}	
	}


	public function mini_banner_one()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/mini-banner-images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('miniBanner1')) {
					$data['fileUploadedErrors'] = $this->upload->display_errors();
				}
				else
				{
					$uploadedFile = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {

				$where = [
					'id' => 2,
					'type' => 'small-cat-1'
				];

				$options = [
					'image' => ($hasFileUploaded) ? $uploadedFile['file_name'] : $this->input->post('img_url')
				];

				$result = $this->setting->update($where,$options);
				if ($result) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/mini-banner-images/'.$this->input->post('img_url'))) {
							unlink('./uploads/mini-banner-images/'.$this->input->post('img_url'));
						}
					}
					redirect('/admin/setting','refresh');
				}
			}
	
		}	
			
	}

	public function mini_banner_two()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/mini-banner-images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('miniBanner2')) {
					$data['fileUploadedErrors'] = $this->upload->display_errors();
				}
				else
				{
					$uploadedFile = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {

				$where = [
					'id' => 3,
					'type' => 'small-cat-2'
				];

				$options = [
					'image' => ($hasFileUploaded) ? $uploadedFile['file_name'] : $this->input->post('img_url')
				];

				$result = $this->setting->update($where,$options);
				if ($result) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/mini-banner-images/'.$this->input->post('img_url'))) {
							unlink('./uploads/mini-banner-images/'.$this->input->post('img_url'));
						}
					}
					redirect('/admin/setting','refresh');
				}
			}
	
		}	
			
	}

	public function mini_banner_three()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/mini-banner-images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('miniBanner3')) {
					$data['fileUploadedErrors'] = $this->upload->display_errors();
				}
				else
				{
					$uploadedFile = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {

				$where = [
					'id' => 4,
					'type' => 'small-cat-3'
				];

				$options = [
					'image' => ($hasFileUploaded) ? $uploadedFile['file_name'] : $this->input->post('img_url')
				];

				$result = $this->setting->update($where,$options);
				if ($result) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/mini-banner-images/'.$this->input->post('img_url'))) {
							unlink('./uploads/mini-banner-images/'.$this->input->post('img_url'));
						}
					}
					redirect('/admin/setting','refresh');
				}
			}
	
		}	
			
	}


	public function big_banner_one()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/big-banner-images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('bigBanner1')) {
					$data['fileUploadedErrors'] = $this->upload->display_errors();
				}
				else
				{
					$uploadedFile = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {

				$where = [
					'id' => 5,
					'type' => 'big-cat-1'
				];

				$options = [
					'image' => ($hasFileUploaded) ? $uploadedFile['file_name'] : $this->input->post('img_url')
				];

				$result = $this->setting->update($where,$options);
				if ($result) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/big-banner-images/'.$this->input->post('img_url'))) {
							unlink('./uploads/big-banner-images/'.$this->input->post('img_url'));
						}
					}
					redirect('/admin/setting','refresh');
				}
			}
	
		}	
			
	}


	public function big_banner_two()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$uploadedFile = [];
				$hasFileUploaded = FALSE;

				$filePreferences = [
					'upload_path' => './uploads/big-banner-images/',
					'allowed_types' => 'gif|png|jpg|jpeg',
					'encrypt_name' => true

				];

				$this->upload->initialize($filePreferences);

				if (!$this->upload->do_upload('bigBanner2')) {
					$data['fileUploadedErrors'] = $this->upload->display_errors();
				}
				else
				{
					$uploadedFile = $this->upload->data();
					$hasFileUploaded = TRUE;
				}

				if ($hasFileUploaded) {

				$where = [
					'id' => 6,
					'type' => 'big-cat-2'
				];

				$options = [
					'image' => ($hasFileUploaded) ? $uploadedFile['file_name'] : $this->input->post('img_url')
				];

				$result = $this->setting->update($where,$options);
				if ($result) {
					if ($hasFileUploaded) {
						if (file_exists('./uploads/big-banner-images/'.$this->input->post('img_url'))) {
							unlink('./uploads/big-banner-images/'.$this->input->post('img_url'));
						}
					}
					redirect('/admin/setting','refresh');
				}
			}
	
		}	
			
	}

	public function add()
	{
		$data['dataContent'] = '/admin/setting/add';
		$this->load->view('/admin/layout/master',$data);
	}

	public function edit()
	{
		$data['dataContent'] = '/admin/setting/edit';
		$this->load->view('/admin/layout/master',$data);
	}	

}

?>