<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h3 class="h3 mb-0 text-gray-800"><b>DATA PRODUK</b></h3>
	</div>

	<!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button> -->
	<a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/data_barang/tambah_barang') ?>"><i class="fas fa-plus"></i> Tambah Data</a>

	<?php echo $this->session->flashdata('pesan') ?>
	<div class="card shadow">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="dataTable">
					<thead>
						<tr>
							<th class="text-center">NO</th>
							<th class="text-center">NAMA BARANG</th>
							<th class="text-center">KETERANGAN</th>
							<th class="text-center">KATEGORI</th>
							<th class="text-center">HARGA</th>
							<th class="text-center">STOK</th>
							<th class="text-center">AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($barang as $brg) : ?>
							<tr>
								<td class="text-center"><?php echo $no++ ?></td>
								<td><?php echo $brg->nama_brg ?></td>
								<td><?php echo $brg->keterangan ?></td>
								<td class="text-center"><?php echo $brg->nama_kategori ?></td>
								<td class="text-center">Rp. <?php echo number_format($brg->harga, 0, ',', '.')  ?></td>
								<td class="text-center"><?php echo $brg->stok ?></td>
								<td>
									<?php echo anchor('admin/data_barang/detail/' . $brg->id_brg, '<div class="btn btn-success btn-sm m-1"><i class="fas fa-eye"></i></div>') ?>
									<?php echo anchor('admin/data_barang/edit/' . $brg->id_brg, '<div class="btn btn-primary btn-sm m-1"><i class="fa fa-edit"></i></div>') ?>
									<?php echo anchor('admin/data_barang/hapus/' . $brg->id_brg, '<div class="btn btn-danger btn-sm m-1"><i class="fas fa-trash"></i></div>') ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah barang-->
<!-- <div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span area-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php //echo base_url(). 'admin/data_barang/tambah_aksi' 
						?>" 
        	method="post" enctype="multipart/form_data">

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
              <?php //foreach ($kategori as $value) { 
				?>
                <option value="<?php //echo $value->id_kategori 
								?>"><?php //echo $value->nama_kategori 
									?></option>
              <?php //} 
				?>
            </select>
        	</div>
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
        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
    </div>
  </div>
</div> -->