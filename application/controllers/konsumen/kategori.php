<?php 

class Kategori extends CI_Controller{

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