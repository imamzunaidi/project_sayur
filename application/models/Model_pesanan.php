<?php 

class Model_pesanan extends CI_Model{

	public function insert_data_pesanan($data){ 
        $this->db->insert('tb_riwayat_pesanan', $data);
    }
    public function hapus_data_pesanan($data){
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->delete('tb_pesanan', $data);
    }
    public function insert_payment($data){ 
        $this->db->insert('payment', $data);
    }
}