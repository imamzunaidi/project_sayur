<div class="container-fluid">
	
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-plus"></i> TAMBAH METODE PEMBAYARAN</h3>
  	</div>

  	<div class="card" style="width: 60%; margin-bottom: 100px;">
  		<div class="card-body">
  			<form method="POST" action="<?php echo base_url("admin/metode_pembayaran/tambah_aksi") ?>" 
  				enctype="multipart/form_data">

  					<div class="form-group">
		        		<label>Metode Pembayaran</label>
		        		<input type="text" name="metode_pembayaran" class="form-control">
		        	</div>
		        	<div class="form-group">
		        		<label>No Rekening</label>
		        		<input type="text" name="no_rek" class="form-control">
		        	</div>
		        	
		        	<div class="row">
		        		<div class="col-md-6">
		        			<a href="<?php echo base_url('admin/metode_pembayaran/index') ?>"><div class="btn  btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Kembali</div></a>
		        		</div>
		        		<div class="col-md-6" align="right">
		        			<button type="reset" class="btn btn-danger">Reset</button>
		        			<button type="submit" class="btn btn-primary">Simpan</button>
		        		</div>
		        	</div>

  			</form>
  		</div>
  	</div>

</div>