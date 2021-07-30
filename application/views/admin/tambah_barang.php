<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-plus"></i> TAMBAH DATA PRODUK</h3>
	</div>

	<div class="card" style="width: 95%; margin-bottom: 100px;">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url("admin/data_barang/tambah_aksi") ?>" enctype="multipart/form_data">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" name="nama_brg" class="form-control">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" name="keterangan" class="form-control">
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select name="nama_kategori" class="form-control">
								<option value="">--Pilih Kategori--</option>
								<?php foreach ($kategori as $value) { ?>
									<option value="<?php echo $value->id_kategori ?>"><?php echo $value->nama_kategori ?></option>
								<?php } ?>
							</select>
						</div>

						<div>
							<a href="<?php echo base_url('admin/data_barang/index') ?>">
								<div class="btn btn-sm btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Kembali</div>
							</a>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Harga</label>
							<input type="text" name="harga" class="form-control">
						</div>
						<div class="form-group">
							<label>Stok</label>
							<input type="text" name="stok" class="form-control">
						</div>
						<div class="form-group">
							<label>Gambar Barang</label><br>
							<input type="file" name="gambar" class="form-control">
						</div>

						<div align="right">
							<button type="reset" class="btn btn-danger">Reset</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>


					</div>
				</div>

			</form>
		</div>
	</div>

</div>