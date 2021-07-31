
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-NFJuTT_u8NCLauxi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<?php 

$id_konsumen = $this->session->userdata('id_konsumen');
?>



<div class="container-fluid">
<?php echo $this->session->flashdata('pesan')?>
	<h4>Riwayat Pemesanan Produk</h4>
	<table class="table table-bordered table-hover table-striped">
		
		<tr>
			<th class="text-center">Id Invoice</th>
			<th class="text-center">Nama Pemesan</th>
			<th class="text-center">Alamat Pengiriman</th>
			<th class="text-center">Tanggal Pemesanan</th>
			<th class="text-center">Batas Pembayaran</th>
			<th class="text-center">Total</th>
			<th class="text-center">Status Pembayaran</th>
			<th class="text-center">Status Pengiriman</th>
			<th class="text-center">Aksi</th>
		</tr>
		
		<?php foreach ($riwayat as $r) : ?>
		<tr>
			<td align="center"><?php echo $r->id_invoice ?></td>
			<td><?php echo $r->nama ?></td>
			<td><?php echo $r->alamat ?></td>
			<td align="center"><?php echo $r->tgl_pesan ?></td>
			<td align="center"><?php echo $r->batas_bayar ?></td>
			<td align="center"><?php echo $r->total ?></td>
			<td align="center"><div class = "badge badge-warning"><?php echo $r->status_bayar ?></div></td>
			<td align="center"><div class = "badge badge-success"><?php echo $r->status_kirim ?></div></td>
			<td align="center">
                <a href="<?= base_url('konsumen/pesanan/detail_riwayat_pesanan/'.$r->id_invoice)?>" class="btn btn-sm btn-primary">Detail</a>
			</td>
		</tr>
		<?php 
			// $data = $this->db->query("SELECT * FROM tb_riwayat_pesanan t inner join tb_invoice i on t.id_invoice = i.id_invoice where i.id_konsumen = $id_konsumen and t.id_invoice = $r->id_invoice group by t.id_invoice")->row(); 
			
			// $status = $this->veritrans->status(49674293);
			// var_dump($status);
			// die();
			?>

		<?php endforeach; ?>

	</table>
</div>