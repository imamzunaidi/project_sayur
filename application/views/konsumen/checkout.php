<div class="container-fluid">

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success" align="center">
				<?php 
				$grand_total = 0;
				if ($keranjang = $this->cart->contents()) 
				{
				 	foreach ($keranjang as $item)
				 	{
				 		$grand_total = $grand_total + $item['subtotal'];
				 	} 

				 	echo "<h5>Total Belanja Anda: Rp. ".number_format($grand_total, 0,',','.');
				 ?>
			</div><br><br>

			<h3 align="center">Input Alamat Pengiriman dan Pembayaran</h3>

			<form method="post" action="<?php echo base_url('konsumen/dashboard/proses_pesanan') ?>">
				
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
				</div>

				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
				</div>

				<div class="form-group">
					<label>No. Handphone</label>
					<input type="text" name="no_hp" placeholder="No. Handphone Anda Yang Dapat Dihubungi" class="form-control">
				</div>

				<div class="form-group">
					<label>Metode Pembayaran</label>
					<select name="metode_pembayaran" class="form-control">
						<option value="">--Pilih Metode Pembayaran--</option>
						<?php foreach ($pembayaran as $value) { ?>
		                	<option value="<?php echo $value->id_pembayaran ?>"><?php echo $value->metode_pembayaran ?> - <?php echo $value->no_rek ?></option>
		              	<?php } ?>						
					</select>
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