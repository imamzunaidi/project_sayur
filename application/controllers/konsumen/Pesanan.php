<?php 

class Pesanan extends CI_Controller
{
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
		// $data['invoice'] = $this->model_invoice->tampil_data();
		$data['kategori'] = $this->model_kategori->data_barang();
		$data ['invoice']	= $this->model_pesanan->tampil_data_pesanan();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('konsumen/pesanan', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id_invoice)
	{
		$data['kategori'] = $this->model_kategori->data_barang();
		$data ['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data ['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
		// $data['invoice']	= $this->db->query("SELECT * FROM tb_invoice")->result();
		// $data ['pesanan']	= $this->db->query("SELECT * FROM tb_pesanan p, tb_invoice i, tb_barang b, tb_pembayaran pb WHERE p.id_invoice=i.id_invoice AND p.id_brg=b.id_brg")->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('konsumen/detail_pesanan', $data);
		$this->load->view('templates/footer');
	}

	public function tampil_pemesanan(){
		$id_konsumen = $this->session->userdata('id_konsumen');
		$data['kategori'] = $this->model_kategori->data_barang();
		$data['invoice'] = $this->model_pesanan->tampil_pesanan_id($id_konsumen);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$data);
		$this->load->view('konsumen/pesanan', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_pesanan($id_invoice){
		$data = array('id_invoice' => $id_invoice);
		$this->model_invoice->hapus_data_pesanan($data);
		$this->model_invoice->hapus_data_invoice($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Data Berhasil Di Hapus
		</div>');
		redirect('konsumen/pesanan');
	}

	public function detail_riwayat_pesanan($id_invoice){
		$data['payment'] = $this->model_detail_riwayat->detail_payment($id_invoice);
		$data['barang'] = $this->model_detail_riwayat->detail_barang($id_invoice);
		$data['kategori'] = $this->model_kategori->data_barang();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar',$data);
		$this->load->view('konsumen/detail_riwayat_pesanan', $data);
		$this->load->view('templates/footer');
	}


}
