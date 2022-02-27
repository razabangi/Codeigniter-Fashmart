<?php

/**
 * 
 */
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model','member');
	}

	public function index()
	{
		$this->load->view('/admin/auth/index');		
	}

	public function validate()
	{
		$where = [
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		];

		$row = $this->member->credential_validate($where);
		if ($row) {
			$sessions = [
				'isLoggedIn' => true,
				'email' => $row['email'],
				'name' => $row['name'],
				'role' => $row['role'],
				'user_id' => $row['id']
			];

			$this->session->set_userdata($sessions);
			redirect('/admin/brand','refresh');
		}
		else
		{
			$data['error'] = 'Invalid user name or password!';
			$this->load->view('/admin/auth/index',$data);
		}
	}

	public function change_password()
	{
		if ($this->input->server("REQUEST_METHOD") == 'POST') {

			$old_password = $this->input->post('old_password');

			$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			$this->form_validation->set_rules('new_password', 'New Password', 'required');
			$this->form_validation->set_rules('retype_password', 'Retype Password', 'required|matches[new_password]');
			
			if ($this->form_validation->run() == TRUE) 
			{
				if ($this->member->verify_password($old_password)){
					$data['message'] = 'Your Password has been changed!';
				}
				else{
					$data['message'] = 'Oppss! Something went wrong';
				}
			}
		}

		$data['dataContent'] = '/admin/auth/change_password';
		$this->load->view('/admin/layout/master',$data);
	}

	public function forgot_password()
	{
		if ($this->input->server("REQUEST_METHOD") == 'POST') {
			$email = $this->input->post('email');

			$row = $this->member->credential_validate(['email'=>$email]);
			if ($row) {
				$hash_key = random_string('alnum', 50);
				$html = $this->load->view('/admin/auth/email_template',['token'=>$hash_key], TRUE);

				$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.mailtrap.io',
				  'smtp_port' => 2525,
				  'smtp_user' => '07092819367ffe',
				  'smtp_pass' => 'dc1128e0c6bc43',
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
				);

				$this->load->library('email', $config);
				$this->email->from('info@alfateemacademy.com', 'FashMart');
				$this->email->to($email);				
				$this->email->message($html);	
				$this->email->send();	
				$this->member->update(['email' => $email],['hash_key' => $hash_key]);
				$data['message'] = "Your Password request has been sent.";	
			}
			else
			{
				$data['message'] = "Email is not valid!";			
			}
		}

		$data['title'] = "Forgot Password";
		$this->load->view('/admin/auth/forgot_password',$data);
	}

	public function reset($token)
	{
		$where = ['hash_key' => $token];
		$row = $this->member->credential_validate($where);
		if (!$row) show_error("Token Has been expired");

		if ($this->input->server('REQUEST_METHOD') == 'POST') 
		{
			$affected = $this->member->update(['id' => $row['id'] ],[
				'password' => $this->input->post('retype_password'),
				'hash_key' => NULL
			]);

			if ($affected) {
				redirect('/admin','refresh');
			}
		}
		$data['title'] = 'Reset Password';
		$this->load->view('admin/auth/reset',$data);	
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/admin');
	}
}

?>