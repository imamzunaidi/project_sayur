<?php 

class Data_konsumen extends CI_Controller{

	public function index()
	{
		$data['konsumen'] = $this->model_barang->tampil_data('tb_konsumen')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_konsumen', $data);
		$this->load->view('templates_admin/footer');
	}

	public function hapus($id)
	{
		$where = array('id_konsumen' => $id);
		$this->model_barang->hapus_data($where, 'tb_konsumen');
		redirect('admin/data_konsumen/index');
	}
}