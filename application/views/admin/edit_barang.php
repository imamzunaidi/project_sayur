<div class="container-fluid">
	
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-edit"></i> EDIT DATA PRODUK</h3>
  	</div>
	

	<div class="card" style="width: 95%; margin-bottom: 100px;">
		<div class="card-body">
			
			<?php foreach ($barang as $brg) : ?>

				<form method="post" action="<?php echo base_url(). 'admin/data_barang/update' ?>" 
					enctype="multipart/form_data">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Barang</label>
								<input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
							</div>

							<div class="form-group">
								<label>Keterangan</label>
								<input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
								<input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
							</div>

							<div class="form-group">
								<label>Kategori</label>
								<!-- <input type="text" name="kategori" class="form-control" value="<?php //echo $brg->kategori ?>"> -->
								<select name="nama_kategori" class="form-control">
									<option value="<?php echo $brg->id_kategori  ?>"><?php echo $brg->nama_kategori ?></option>
									<?php foreach ($kategori as $key => $k) { ?>
										<option value="<?php echo $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
									<?php } ?>
								</select>
								<?php echo form_error('nama_kategori','<div class="text-small text-danger"></div>') ?>
							</div>

							<div>
				        		<a href="<?php echo base_url('admin/data_barang/index') ?>"><div class="btn btn-sm btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Kembali</div></a>
				        	</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Harga</label>
								<input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
							</div>

							<div class="form-group">
								<label>Stok</label>
								<input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
							</div>

							<!-- <div class="form-group">
								<label>Gambar</label>
								<input type="file" name="stok" class="form-control" value="<?php echo $brg->gambar ?>">
							</div> -->

							<div align="right">
				        		<button type="reset" class="btn btn-danger">Reset</button>
				        		<button type="submit" class="btn btn-primary">Simpan</button>
				        	</div>
						</div>
					</div>

				</form>

			<?php endforeach; ?>

		</div>
	</div>

</div>