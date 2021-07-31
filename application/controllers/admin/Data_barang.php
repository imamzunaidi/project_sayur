<?php

class Data_barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '1') {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Anda Belum Login!!! 
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  	<span aria-hidden="true">&times;</span>
					  </button>
				</div>'
			);
			redirect('auth/login');
		}
	}

	public function index()
	{
		// $where = array('id_brg' => $id);
		$data['title'] = "Data Produk";
		//$data['barang'] = $this->model_barang->tampil_data()->result();
		$data['barang']	= $this->db->query("SELECT * FROM tb_barang b, tb_kategori k WHERE b.id_kategori=k.id_kategori")->result();
		// $data['barang1']	= $this->db->query("SELECT * FROM tb_barang b, tb_kategori k WHERE b.id_kategori=k.id_kategori AND id_brg='$id'")->result();
		$data['kategori']	= $this->db->query("SELECT * FROM tb_kategori")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_barang()
	{
		$data['kategori']	= $this->db->query("SELECT * FROM tb_kategori")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		// $this->_rules();
		// if($this->form_validation->run() == FALSE)
		// {
		// 	$this->tambah_barang();
		// }else{
		$nama_brg		= $this->input->post('nama_brg');
		$keterangan		= $this->input->post('keterangan');
		$nama_kategori	= $this->input->post('nama_kategori');
		$harga			= $this->input->post('harga');
		$stok			= $this->input->post('stok');
		$gambar			= $_FILES['gambar']['name'];
		if ($gambar = '') {
		} else {
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Gagal di Upload";
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'id_kategori'	=> $nama_kategori,
			'harga'			=> $harga,
			'stok'			=> $stok,
			'gambar'		=> $gambar
		);

		$this->model_barang->tambah_barang($data, 'tb_barang');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('admin/data_barang/index');
		// }

	}

	public function edit($id)
	{
		$where = array('id_brg' => $id);
		// $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
		$data['barang']	= $this->db->query("SELECT * FROM tb_barang b, tb_kategori k WHERE b.id_kategori=k.id_kategori AND id_brg='$id'")->result();
		$data['kategori'] = $this->db->query("SELECT * FROM tb_kategori")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id 			= $this->input->post('id_brg');
		$nama_brg 		= $this->input->post('nama_brg');
		$keterangan 	= $this->input->post('keterangan');
		$nama_kategori 	= $this->input->post('nama_kategori');
		$harga 			= $this->input->post('harga');
		$stok 			= $this->input->post('stok');
		// $gambar 		= $this->input->post('gambar');

		$data = array(

			'nama_brg' 		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'id_kategori'	=> $nama_kategori,
			'harga'			=> $harga,
			'stok'			=> $stok,
			// 'gambar'		=> $gambar
		);

		$where = array(
			'id_brg'	=> $id
		);

		$this->model_barang->update_data($where, $data, 'tb_barang');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diubah</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('admin/data_barang/index');
	}

	public function hapus($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function detail($id_brg)
	{
		// $where = array('id_brg' => $id);
		// $data['barang']		= $this->model_barang->detail_brg($id_brg);
		$data['barang']		= $this->db->query("SELECT * FROM tb_barang b, tb_kategori k WHERE b.id_kategori=k.id_kategori AND b.id_brg='$id_brg'")->result();
		// $data['kategori']	= $this->db->query("SELECT * FROM tb_kategori")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	// public function _rules()
	// {
	// 	//$this->form_validation->set_rules('nip','nip','required');
	// 	$this->form_validation->set_rules('nama_brg','Nama Barang ','required');
	// 	$this->form_validation->set_rules('keterangan','Keterangan','required');
	// 	$this->form_validation->set_rules('id_kategori','Nama Kategori','required');
	// 	$this->form_validation->set_rules('harga','Harga','required');
	// 	$this->form_validation->set_rules('stok','Stok','required');
	// 	$this->form_validation->set_rules('gambar','Gambar','required');
	// }

}
