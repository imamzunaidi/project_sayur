<?php 

/**
 * 
 */
class Dashboard extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '2')
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Anda Belum Login!!! 
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  	<span aria-hidden="true">&times;</span>
					  </button>
				</div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		// $data['barang'] = $this->model_barang->tampil_data()->result();
		$data['barang'] = $this->model_barang->tampil_data('tb_barang')->result();
		$data['kategori'] = $this->model_kategori->data_barang();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('konsumen/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_ke_keranjang($id)
	{
		$barang = $this->model_barang->find($id);

		$data = array(
        'id'      => $barang->id_brg,
        'qty'     => 1,
        'price'   => $barang->harga,
        'name'    => $barang->nama_brg,
		);

		$this->cart->insert($data);
		redirect('welcome');
	}

	public function detail_keranjang()
	{
		$data['kategori'] = $this->model_kategori->data_barang();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('konsumen/keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('welcome');
	}

	public function checkout()
	{
		$data['pembayaran'] = $this->db->query("SELECT * FROM tb_pembayaran")->result();
		$data['kategori'] = $this->model_kategori->data_barang();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('konsumen/checkout', $data);
		$this->load->view('templates/footer');
	}

	public function proses_pesanan()
	{
		$id_konsumen = $this->session->userdata('id_konsumen');
		$cek = $this->model_invoice->cek_pesanan($id_konsumen);

		if($cek >= 1){
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Lunasi Pemesanan Terlebih dahulu
			</div>');
			redirect('konsumen/pesanan');
		}

		$is_processed = $this->model_invoice->index();
		if($is_processed){
			$this->cart->destroy();
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Data Berhasil Di Tambahkan, Silahkan Lakukan Pembayaran
			</div>');
			redirect('konsumen/pesanan');
		}else{
			echo "Maaf, Pesanan Anda Gagal Diproses!";
		}
		
	}

	public function detail($id_brg)
	{
		// $data['barang']		= $this->model_barang->detail_brg($id_brg);
		// $data['kategori']	= $this->db->query("SELECT * FROM tb_kategori")->result();
		$data['barang']		= $this->db->query("SELECT * FROM tb_barang b, tb_kategori k WHERE b.id_kategori=k.id_kategori AND b.id_brg='$id_brg'")->result();
		$data['kategori'] = $this->model_kategori->data_barang();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('konsumen/detail_barang', $data);
		$this->load->view('templates/footer');
	}

}

