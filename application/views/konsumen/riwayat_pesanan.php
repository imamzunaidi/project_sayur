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
			<td align="center">
                <a href="<?= base_url('konsumen/pesanan/hapus_pesanan/'.$r->id_invoice)?>" class="btn btn-sm btn-danger">Detail</a>
			</td>
		</tr>

		<?php endforeach; ?>

	</table>
</div>