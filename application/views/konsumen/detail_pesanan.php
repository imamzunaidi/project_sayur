<div class="container-fluid">
	
	<h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Pesanan: <?php echo $invoice->id_invoice; ?>
		</div></h4>

	<table class="table table-bordered table-hover table-striped">
		
		<tr>
			<th class="text-center">ID PRODUK</th>
			<th class="text-center">NAMA PRODUK</th>
			<th class="text-center">JUMLAH PESANAN</th>
			<th class="text-center">HARGA SATUAN</th>
			<th class="text-center">SUB-TOTAL</th>
		</tr>

		<?php 
		$total = 0;
		foreach ($pesanan as $psn) :
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
		 ?>

		 <tr>
		 	<td align="center"><?php echo $psn->id_brg ?></td>
		 	<td><?php echo $psn->nama_brg ?></td>
		 	<td align="center"><?php echo $psn->jumlah ?></td>
		 	<td align="right">Rp. <?php echo number_format($psn->harga,0,',','.')  ?>,-</td>
		 	<td align="right">Rp. <?php echo number_format($subtotal,0,',','.') ?>,-</td>
		 </tr>

		<?php endforeach; ?>

		<tr>
			<td colspan="4" align="right">Grand Total</td>
			<td align="right">Rp. <?php echo number_format($total,0,',','.') ?></td>
		</tr>

	</table>

	<a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Kembali</div></a>

</div>