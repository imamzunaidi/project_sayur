<?php

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'info.itdev9@gmail.com',
			'smtp_pass'   => '@itdev085',
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		$this->email->initialize($config);
	}

	public function login()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('form_login');
			$this->load->view('templates/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$auth = $this->model_auth->cek_login($username, $password);
			$auth1 = $this->model_auth->cek_login1($username, $password);

			if ($auth == FALSE && $auth1 == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Username atau Password Anda Salah!!! 
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
						  </button>
					</div>');

				redirect('auth/login');
			} elseif ($auth1) {
				$this->session->set_userdata('username', $auth1->username);
				$this->session->set_userdata('role_id', $auth1->role_id);
				$this->session->set_userdata('id', $auth1->id_konsumen);
				redirect('konsumen/dashboard');
			} else {
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('role_id', $auth->role_id);
				$this->session->set_userdata('id', $auth->id_admin);

				switch ($auth->role_id) {
					case 1:
						redirect('admin/dashboard_admin');
						break;
					case 2:
						redirect('konsumen/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function forgot()
	{
		$this->_rulses_email();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('form_forgot');
			$this->load->view('templates/footer');
		} else {
			$email = $this->input->post('email');
			$auth = $this->model_auth->cek_email($email);
			if (isset($auth)) {
				$data['password'] = $this->try_newpassword();
				$data['username'] = $auth->username;

				$this->email->from('info@javaqu.com', 'Info Javaqu Organik');
				$this->email->to($auth->email);
				$this->email->subject('Reset Password');
				$this->email->message($this->load->view('template_email', $data, true));
				$this->email->set_mailtype("html");
				if ($this->email->send()) {
					$this->model_auth->reset_password($data, $auth->id_konsumen);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Password telah direset, silahkan cek email anda
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
						  </button>
					</div>');

					redirect('auth/login');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Email tidak tersedia
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
						  </button>
					</div>');

					redirect('auth/forgot');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Email tidak tersedia
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
						  </button>
					</div>');

				redirect('auth/forgot');
			}
		}
	}

	private function try_newpassword()
	{
		$karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$pjg = strlen($karakter);
		$password = '';
		for ($i = 0; $i < 8; $i++) {
			$password .= $karakter[rand(0, $pjg - 1)];
		}

		return $password;
	}

	private function _rules()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => 'Username tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Password tidak boleh kosong!'
		]);
	}

	private function _rulses_email()
	{
		$this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email tidak boleh kosong!']);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
