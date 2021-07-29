<?php 

class Metode_pembayaran extends CI_Controller{

	public function index()
	{
		$data['pembayaran'] = $this->model_barang->tampil_data('tb_pembayaran')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/metode_pembayaran', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_pembayaran()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_pembayaran');
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		// $this->_rules();
		// if($this->form_validation->run() == FALSE)
		// {
		// 	$this->tambah_barang();
		// }else{
			$metode_pembayaran	= $this->input->post('metode_pembayaran');
			$no_rek				= $this->input->post('no_rek');
			
			$data = array(
			'metode_pembayaran'	=> $metode_pembayaran,
			'no_rek'			=> $no_rek,
			);

			$this->model_barang->tambah_barang($data, 'tb_pembayaran');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/metode_pembayaran/index');
		// }
		
	}

	public function edit($id)
	{
		$where = array('id_pembayaran' => $id);
		$data['pembayaran'] = $this->db->query("SELECT * FROM tb_pembayaran WHERE id_pembayaran='$id'")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_pembayaran', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id 				= $this->input->post('id_pembayaran');
		$metode_pembayaran 	= $this->input->post('metode_pembayaran');
		$no_rek			 	= $this->input->post('no_rek');
		
		$data = array(

			'metode_pembayaran'	=> $metode_pembayaran,		
			'no_rek'			=> $no_rek,
		);

		$where = array(
			'id_pembayaran'	=> $id
		);

		$this->model_barang->update_data($where, $data, 'tb_pembayaran');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diubah</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('admin/metode_pembayaran/index');
	}

	public function hapus($id)
	{
		$where = array('id_pembayaran' => $id);
		$this->model_barang->hapus_data($where, 'tb_pembayaran');
		redirect('admin/metode_pembayaran/index');
	}
}