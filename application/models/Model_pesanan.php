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

    public function tampil_data_pesanan(){
		return $this->db->query("SELECT * FROM tb_invoice v inner join tb_pesanan p on v.id_invoice = p.id_invoice GROUP BY p.id_invoice")->result();
	}

    public function tampil_pesanan_id($id_konsumen){
        return $this->db->query("SELECT * FROM tb_invoice where id_konsumen  = $id_konsumen order by id_invoice desc")->result();
    }
}