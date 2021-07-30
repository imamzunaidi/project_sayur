<?php 

class Auth extends CI_Controller
{
	public function login()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('form_login');
			$this->load->view('templates/footer');
		}else{
			$username = $this->input->post('username');
			$password= $this->input->post('password');

			$auth = $this->model_auth->cek_login($username,$password);
			$auth1 = $this->model_auth->cek_login1($username,$password);

			if($auth == FALSE && $auth1 == FALSE)
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Username atau Password Anda Salah!!! 
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
						  </button>
					</div>');

				redirect('auth/login');
			}elseif($auth1)
			{
				$this->session->set_userdata('username', $auth1->username);
				$this->session->set_userdata('id_konsumen', $auth1->id_konsumen);
				$this->session->set_userdata('nama', $auth1->nama);
				$this->session->set_userdata('alamat', $auth1->alamat);
				$this->session->set_userdata('no_hp', $auth1->no_tlp);
				$this->session->set_userdata('role_id', $auth1->role_id);

				redirect('konsumen/dashboard');
			}
			else{
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('id_admin', $auth1->id_admin);
				$this->session->set_userdata('role_id', $auth->role_id);

				switch($auth->role_id)
				{
					case 1 : redirect('admin/dashboard_admin');
						break;
					case 2 : redirect('konsumen/dashboard');
						break;
					default : break; 
				}
			}

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'Username', 'required',[
				'required' => 'Username tidak boleh kosong!']);
		$this->form_validation->set_rules('password', 'Password', 'required',[
				'required' => 'Password tidak boleh kosong!']);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}