<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h3 class="h3 mb-0 text-gray-800"><b>Metode Pembayaran</b></h3>
    </div>
	
	<!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button> -->
  <a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/metode_pembayaran/tambah_pembayaran')?>"><i class="fas fa-plus"></i> Tambah Metode</a>

  <?php echo $this->session->flashdata('pesan') ?>

	<table class="table table-striped table-bordered">
		<tr>
			<th class="text-center">NO</th>
			<th class="text-center">JENIS METODE PEMBAYARAN</th>
      <th class="text-center">NO REKENING</th>
			<th class="text-center" colspan="3">AKSI</th>
		</tr>

		<?php 
		$no=1;
		foreach ($pembayaran as $byr) : ?>

			<tr>
				<td class="text-center"><?php echo $no++ ?></td>
				<td><?php echo $byr->metode_pembayaran ?></td>
        <td class="text-center"><?php echo $byr->no_rek ?></td>
				 <td><center><?php echo anchor('admin/metode_pembayaran/edit/' .$byr->id_pembayaran, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></center></td>
				<td><center><?php echo anchor('admin/metode_pembayaran/hapus/' .$byr->id_pembayaran, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></center></td>
			</tr>

		<?php endforeach; ?>

	</table>
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
        <form action="<?php //echo base_url(). 'admin/data_barang/tambah_aksi' ?>" 
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
              <?php //foreach ($kategori as $value) { ?>
                <option value="<?php //echo $value->id_kategori ?>"><?php //echo $value->nama_kategori ?></option>
              <?php //} ?>
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

<!-- Modal edit barang-->
<!-- <div class="modal fade" id="edit_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span area-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php //foreach ($barang as $brg) : ?>

          <form action="<?php //echo base_url(). 'admin/data_barang/update' ?>" method="post" enctype="multipart/form_data">
        
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_brg" class="form-control" value="<?php //echo $brg->nama_brg ?>">
            </div>

            <div class="form-group">
              <label>Keterangan</label>
              <input type="hidden" name="id_brg" class="form-control" value="<?php //echo $brg->id_brg ?>">
              <input type="text" name="keterangan" class="form-control" value="<?php //echo $brg->keterangan ?>">
            </div>

            <div class="form-group">
              <label>Kategori</label> -->
              <!-- <input type="text" name="kategori" class="form-control" value="<?php //echo $brg->kategori ?>"> -->
              <!-- <select name="nama_kategori" class="form-control">
                <option value="<?php //echo $brg->id_kategori  ?>"><?php //echo $brg->nama_kategori ?></option>
                <?php //foreach ($kategori as $key => $k) { ?>
                  <option value="<?php //echo $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                <?php //} ?>
              </select>
              <?php //echo form_error('nama_kategori','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_brg" class="form-control" value="<?php //echo $brg->nama_brg ?>">
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga" class="form-control" value="<?php //echo $brg->harga ?>">
            </div>

            <div class="form-group">
              <label>Stok</label>
              <input type="text" name="stok" class="form-control" value="<?php //echo $brg->stok ?>">
            </div>

          </form>

        <?php //endforeach; ?>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
    </div>
  </div>
</div> -->