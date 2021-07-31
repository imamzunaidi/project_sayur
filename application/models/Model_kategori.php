<?php 

class Model_kategori extends CI_Model{

	public function data_beras()
	{
		return $this->db->get_where("tb_barang", array('kategori' => 'Beras'));
		//$this->db->query("SELECT * FROM tb_barang WHERE kategori='Beras'")->result();
	}

	public function data_kategori_barang($id_kategori){
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get('')->result();
	}

	public function data_barang(){
		$this->db->select('*');
		$this->db->from('tb_kategori');
		return $this->db->get('')->result();
	}
}