<?php 

class Kategori extends CI_Controller{

	public function index($id_kategori){
		$data['kategori'] = $this->model_kategori->data_barang();
		$data['barang'] = $this->model_kategori->data_ketegori_barang($id_kategori);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('konsumen/data_kategori', $data);
		$this->load->view('templates/footer');
	}
	
	public function beras()
	{
		// $data['beras'] = $this->model_kategori->data_beras()->result();
		$data['organik'] = $this->db->query("SELECT * FROM tb_barang b, tb_kategori k WHERE b.id_kategori=k.id_kategori AND nama_kategori='Bahan Pangan Organik/Natural'")->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('konsumen/beras', $data);
		$this->load->view('templates/footer');
	}

	public function protein()
	{
		$data['protein'] = $this->db->query("SELECT * FROM tb_barang b, tb_kategori k WHERE b.id_kategori=k.id_kategori AND nama_kategori='Sumber Protein'")->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('konsumen/protein', $data);
		$this->load->view('templates/footer');
	}

}