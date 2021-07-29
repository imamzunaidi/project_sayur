<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h3 class="h3 mb-0 text-gray-800"><b>DATA KONSUMEN</b></h3>
    </div>

    <table class="table table-striped table-bordered">
    	<tr>
    		<th class="text-center">No</th>
    		<th class="text-center">Nama</th>
    		<th class="text-center">Alamat</th>
    		<th class="text-center">No Handphone</th>
    		<th class="text-center">Email</th>
    		<th class="text-center">Username</th>
    		<th class="text-center">Aksi</th>
    	</tr>

    	<?php 
    	$no =1;
    	foreach ($konsumen as $k) : ?>

    		<tr>
    			<td class="text-center"><?php echo $no++ ?></td>
    			<td><?php echo $k->nama ?></td>
    			<td class="text-center"><?php echo $k->alamat ?></td>
    			<td class="text-center"><?php echo $k->no_tlp ?></td>
    			<td class="text-center"><?php echo $k->email ?></td>
    			<td class="text-center"><?php echo $k->username ?></td>
    			<td><center><?php echo anchor('admin/data_konsumen/hapus/' .$k->id_konsumen, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></center></td>
    		</tr>

    	<?php endforeach; ?>

    </table>

</div>