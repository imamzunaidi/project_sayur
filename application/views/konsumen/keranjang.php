<div class="container-fluid">
	
	<h4>Keranjang Belanja</h4>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th class="text-center">NO</th>
			<th class="text-center">Nama Produk</th>
			<th class="text-center">Jumlah</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Sub-Total</th>
		</tr>

		<?php 
		$no=1;
		foreach ($this->cart->contents() as $items) : ?>

			<tr>
				<td align="center"><?php echo $no++ ?></td>
				<td><?php echo $items['name'] ?></td>
				<td align="center"><?php echo $items['qty'] ?></td>
				<td align="right">Rp. <?php echo number_format($items['price'], 0,',','.') ?>,-</td>
				<td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?>,-</td>
			</tr>

		<?php endforeach; ?>

		<tr>
			<td colspan="4"><b>Total</b></td>
			<td align="right">Rp. <?php echo number_format($this->cart->total(), 0,',','.') ?></td>
		</tr>

	</table>

  <div align="right">
		<a href="<?php echo base_url('konsumen/dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">
			Hapus Keranjang</div></a>
		<a href="<?php echo base_url('konsumen/dashboard/index') ?>"><div class="btn btn-sm btn-primary">
			Lanjutkan Belanja</div></a>
		<a href="<?php echo base_url('konsumen/dashboard/checkout') ?>"><div class="btn btn-sm btn-success">
			Checkout</div></a>
	</div>

	<!-- <div align="right"> -->
		<!-- <form id="payment-form" method="post" action="<?=site_url()?>payment/snap/finish">
			<input type="hidden" name="result_type" id="result-type" value="">
			<input type="hidden" name="result_data" id="result-data" value="">
		</form>
		<a href="<?php echo base_url('konsumen/dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">
			Hapus Keranjang</div></a>
		<a href="<?php echo base_url('konsumen/dashboard/index') ?>"><div class="btn btn-sm btn-primary">
			Lanjutkan Belanja</div></a>
		<button id="pay-button" class="btn btn-sm btn-success" >
		Checkout</a></button> -->
	<!-- </div> -->
</div>
    
    
  