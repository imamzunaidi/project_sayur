<?php 

class Model_detail_riwayat extends CI_Model{

    public function detail_payment($id_invoice){
        $data = $this->db->query("SELECT * FROM tb_riwayat_pesanan r inner join payment p on r.order_id = p.order_id where id_invoice = $id_invoice group by id_invoice")->row();
        return $data;
    }
    
    public function detail_barang($id_invoice){
        $data = $this->db->query("SELECT * FROM tb_riwayat_pesanan r inner join tb_invoice i on r.id_invoice = i.id_invoice WHERE r.id_invoice = $id_invoice group by r.id_invoice")->result();
        return $data;
    }
	
    public function riwayat_pesanan($id_konsumen){
        $data = $this->db->query("SELECT * FROM tb_riwayat_pesanan r left join tb_invoice t on r.id_invoice = t.id_invoice where id_konsumen = $id_konsumen group by r.id_invoice")->result();
        return $data;
    }
}