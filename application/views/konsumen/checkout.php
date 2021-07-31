<div class="container-fluid">

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div align="center">
				<?php 
				$grand_total = 0;
				if ($keranjang = $this->cart->contents()) 
				{
				 	foreach ($keranjang as $item)
				 	{
				 		$grand_total = $grand_total + $item['subtotal'];
				 	} 

				 	
				 ?>
			</div><br><br>

			<h3 align="center">Input Alamat Pengiriman dan Pembayaran</h3>

			<form method="post" action="<?php echo base_url('konsumen/dashboard/proses_pesanan') ?>">
				
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" value = <?php echo $this->session->userdata('nama')?>>
				</div>

				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control"  value = <?= $this->session->userdata('alamat')?>>
				</div>

				<div class="form-group">
					<label>Total Bayar</label>
					<input type="text" name="total" disabled placeholder="No. Handphone Anda Yang Dapat Dihubungi" class="form-control" value = <?php echo number_format($grand_total, 0,',','.'); ?> required>
				</div>
				
				<div class="form-group">
					<label>No. Handphone</label>
					<input type="text" name="no_hp" placeholder="No. Handphone Anda Yang Dapat Dihubungi" class="form-control" value = <?= $this->session->userdata('no_hp')?>>
				</div>

				<div class="form-group">
					<label>Tambahan Keterangan</label>
					<textarea name="keterangan" id="" class = "form-control" cols="20" rows="5"></textarea>
				</div>

				<button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>

			</form>

			<?php 
			}else{
				echo "<h5>Keranjang Belanja Anda Masih Kosong, Ayo Pilih Produk Untuk Belanja";
			}
			 ?>
			

		</div>
		<div class="col-md-2"></div>
	</div>

</div>