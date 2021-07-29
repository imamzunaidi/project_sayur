<div class="container-fluid">
	
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-edit"></i> EDIT METODE PEMBAYARAN</h3>
  	</div>
	

	<div class="card" style="width: 70%; margin-bottom: 100px;">
		<div class="card-body">
			
			<?php foreach ($pembayaran as $byr) : ?>

				<form method="post" action="<?php echo base_url(). 'admin/metode_pembayaran/update' ?>">
					<div class="form-group">
						<label>Metode Pembayaran</label>
						<input type="text" name="metode_pembayaran" class="form-control" value="<?php echo $byr->metode_pembayaran ?>">
					</div>

					<div class="form-group">
						<label>No Rekening</label>
						<input type="hidden" name="id_pembayaran" class="form-control" value="<?php echo $byr->id_pembayaran ?>">
						<input type="text" name="no_rek" class="form-control" value="<?php echo $byr->no_rek ?>">
					</div>

					<div align="right">
		        		<button type="reset" class="btn btn-danger">Reset</button>
		        		<button type="submit" class="btn btn-primary">Simpan</button>
		        	</div>
				</form>

			<?php endforeach; ?>

		</div>
	</div>

</div>