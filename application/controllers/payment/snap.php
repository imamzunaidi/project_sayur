<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-EDbyYBEqxixIouHbS9R91Ujc', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function index()
    {
    	$this->load->view('payment/checkout_snap');
    }

    public function token()
    {
		$id_konsumen = $this->session->userdata('id_konsumen');
		$rincian = $this->db->query("SELECT * FROM tb_pesanan p left join tb_invoice t on p.id_invoice = t.id_invoice where id_konsumen = $id_konsumen")->result();
		
		foreach ($rincian as $r) {
	
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $r->total, // no decimal allowed for creditcard
		);

		$item1_details = array(
		  'id' => "$r->id_brg",
		  'price' => $r->total,
		  'quantity' => 1,
		  'name' => "Harga Total"
		);

		// Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 0,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		$nama = $this->session->userdata('nama');
		$alamat = $this->session->userdata('alamat');
		$no_hp= $this->session->userdata('no_hp');

		// Optional
		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "$alamat",
		  'city'          => "",
		  'postal_code'   => "",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "$alamat",
		  'city'          => "",
		  'postal_code'   => "",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => "$nama",
		  'last_name'     => "",
		  'email'         => "andri@litani.com",
		  'phone'         => "$no_hp",
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 1440
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );
		}
		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
		$result = json_decode($this->input->post('result_data'));

		if(isset($result->va_numbers[0]->bank)){
			$bank = $result->va_numbers[0]->bank;
		}else{
			$bank = "-";
		}

		if(isset($result->va_numbers[0]->va_number)){
			$va_number = $result->va_numbers[0]->va_number;
		}else{
			$va_number = "-";
		}

		if(isset($result->bca_va_number)){
			$bca_va_number = $result->bca_va_number;
		}else{
			$bca_va_number = "-";
		}

		if(isset($result->bill_key)){
			$bill_key = $result->bill_key;
		}else{
			$bill_key = "-";
		}

		if(isset($result->biller_code)){
			$biller_code = $result->biller_code;
		}else{
			$biller_code = "-";
		}

		if(isset($result->permata_va_number)){
			$permata_va_number = $result->permata_va_number;
		}else{
			$permata_va_number = "-";
		}

		if(isset($result->fraud_status)){
			$fraud_status = $result->fraud_status;
		}else{
			$fraud_status = "-";
		}

		if(isset($result->pdf_url)){
			$pdf_url = $result->pdf_url;
		}else{
			$pdf_url = "-";
		}

		if(isset($result->payment_code)){
			$payment_code = $result->payment_code;
		}else{
			$payment_code = "-";
		}

		$id_konsumen = $this->session->userdata('id_konsumen');

		$ambil_data_pesanan = $this->db->query("SELECT * FROM tb_pesanan p left join tb_invoice n on p.id_invoice = n.id_invoice where id_konsumen = $id_konsumen")->result();

		foreach ($ambil_data_pesanan as $p) {
			$id_invoice = $p->id_invoice;
			$id_pesanan = $p->id_pesanan;
			$id_brg = $p->id_brg;
			$nama_brg = $p->nama_brg;
			$jumlah = $p->jumlah;
			$harga = $p->harga;
			$sub_total = $p->sub_total;
			$total = $p->total;

			$data = array(
				'id_pesanan' => $id_pesanan,
				'id_invoice' => $id_invoice,
				'nama_brg' => $nama_brg,
				'jumlah' => $jumlah,
				'harga' => $harga,
				'sub_total' => $sub_total,
				'total' => $total,
				'order_id' => $result->order_id
			);
			$this->model_pesanan->insert_data_pesanan($data);
			$this->db->query("UPDATE tb_invoice SET status_bayar = 'menunggu pembayaran' where id_invoice = $id_invoice");	
			$hapus = array(
				'id_pesanan' => $p->id_pesanan
			);
			$this->model_pesanan->hapus_data_pesanan($hapus);
		}

		$data1 = [
		'transaction_id' => $result->transaction_id,
		'order_id' => $result->order_id,
		'gross_amount' => $result->gross_amount,
		'payment_type' => $result->payment_type,
		'transaction_time' => $result->transaction_time,
		'transaction_status' => $result->transaction_status,
		'fraud_status' => $result->fraud_status,
		'pdf_url' => $pdf_url,
		'finish_redirect_url' => $result->finish_redirect_url,
		//tiap bank beda beda
		'payment_code' => $payment_code,
		'permata_va_number' => $permata_va_number,
		'bank' => $bank,
		'bill_key' => $bill_key,
		'va_number' => $va_number,
		'biller_code' => $biller_code,
		'bca_va_number' => $bca_va_number,
		];

		$this->model_pesanan->insert_payment($data1);
		

		$data['finish'] = json_decode('result_data');		
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Silahkan segera lakukan pelunasan!!
		</div>');
    	// echo 'RESULT <br><pre>';
    	//var_dump($result);
    	// echo '</pre>' ;
		redirect('payment/snap/riwayat_pemesanan','refresh');


    }

	public function riwayat_pemesanan(){
		$id_konsumen = $this->session->userdata('id_konsumen');
		$data['riwayat'] = $this->db->query("SELECT * FROM tb_riwayat_pesanan r left join tb_invoice t on r.id_invoice = t.id_invoice where id_konsumen = $id_konsumen")->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('konsumen/riwayat_pesanan',$data);
		$this->load->view('templates/footer');
	}
}
