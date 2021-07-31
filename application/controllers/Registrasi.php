<?php 

class Registrasi extends CI_Controller
{
	public function index()
	{
		$this->_rules();
		// $this->form_validation->set_rules('nama', 'Nama', 'required',[
		// 		'required' => 'Nama tidak boleh kosong!']);
		// $this->form_validation->set_rules('username', 'Username', 'required',[
		// 		'required' => 'Username tidak boleh kosong!']);
		// $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]',
		// 	[
		// 		'required'=> 'Pasword tidak boleh kosong!',
		// 		'matches'=> 'Pasword tidak cocok!'
		// 	]);
		// $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('registrasi');
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'id_konsumen'	=> '',
				'nama'			=> $this->input->post('nama'),
				'alamat'		=> $this->input->post('alamat'),
				'no_tlp'		=> $this->input->post('no_tlp'),
				'email'			=> $this->input->post('email'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password_1'),
				'role_id'		=> 2,
			);

			$this->db->insert('tb_konsumen', $data);
			redirect('auth/login');

		}
		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required',[
				'required' => 'Nama tidak boleh kosong!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required',[
				'required' => 'Alamat tidak boleh kosong!']);
		$this->form_validation->set_rules('no_tlp', 'No_tlp', 'required',[
				'required' => 'No Handphone tidak boleh kosong!']);
		$this->form_validation->set_rules('email', 'Email', 'required',[
				'required' => 'Email tidak boleh kosong!']);
		$this->form_validation->set_rules('username', 'Username', 'required',[
				'required' => 'Username tidak boleh kosong!']);
		$this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]',
			[
				'required'=> 'Pasword tidak boleh kosong!',
				'matches'=> 'Pasword tidak cocok!'
			]);
		$this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');
	}
}