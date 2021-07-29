<?php 

class Model_kategori extends CI_Model{

	public function data_beras()
	{
		return $this->db->get_where("tb_barang", array('kategori' => 'Beras'));
		//$this->db->query("SELECT * FROM tb_barang WHERE kategori='Beras'")->result();
	}
}