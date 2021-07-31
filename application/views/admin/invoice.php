<div class="container-fluid">

	<h4>Invoice Pemesanan Produk</h4>
	<div class="card shadow">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped" id="dataTable">
					<thead>
						<tr>
							<th class="text-center">Id Invoice</th>
							<th class="text-center">Nama Pemesan</th>
							<th class="text-center">Alamat Pengiriman</th>
							<th class="text-center">Nomor Handphone</th>
							<th class="text-center">Tanggal Pemesanan</th>
							<th class="text-center">Batas Pembayaran</th>
							<th class="text-center">Status Bayar</th>
							<th class="text-center">Status Kirim</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($invoice as $inv) : ?>
							<tr>
								<td align="center"><?php echo $inv->id_invoice ?></td>
								<td><?php echo $inv->nama ?></td>
								<td><?php echo $inv->alamat ?></td>
								<td align="center"><?php echo $inv->no_hp ?></td>
								<td align="center"><?php echo $inv->tgl_pesan ?></td>
								<td align="center"><?php echo $inv->batas_bayar ?></td>
								<td align="center"></td>
								<td align="center"></td>
								<td align="center"><?php echo anchor('admin/invoice/detail/' . $inv->id_invoice, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
							</tr>

						<?php endforeach; ?>
					</tbody>



				</table>
			</div>
		</div>
	</div>


</div>