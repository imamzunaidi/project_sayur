<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-HksAZsLPLyPVtFmb"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="container-fluid">
<?php echo $this->session->flashdata('pesan')?>
	<h4>Pembayaran Pemesanan Produk</h4>

	<table class="table table-bordered table-hover table-striped">
		
		<tr>
			<th class="text-center">Id Invoice</th>
			<th class="text-center">Nama Pemesan</th>
			<th class="text-center">Alamat Pengiriman</th>
			<th class="text-center">Tanggal Pemesanan</th>
			<th class="text-center">Batas Pembayaran</th>
			<th class="text-center">Total</th>
			<th class="text-center">Status Pembayaran</th>
			<th class="text-center">Aksi</th>
		</tr>
		
		<!-- <button id="pay-button" class="btn btn-sm btn-success" >
		Checkout</a></button> -->
		<?php foreach ($invoice as $inv) : ?>
		<tr>
			<td align="center"><?php echo $inv->id_invoice ?></td>
			<td><?php echo $inv->nama ?></td>
			<td><?php echo $inv->alamat ?></td>
			<td align="center"><?php echo $inv->tgl_pesan ?></td>
			<td align="center"><?php echo $inv->batas_bayar ?></td>
			<td align="center"><?php echo $inv->total ?></td>
			<td align="center"><div class = "badge badge-danger"><?php echo $inv->status_bayar ?></div></td>
			<form id="payment-form" method="post" action="<?=site_url()?>payment/snap/finish">
				<input type="hidden" name="result_type" id="result-type" value="">
				<input type="hidden" name="result_data" id="result-data" value="">
				
			</form>
			<td align="center">
				<div class="row">
					<div class="col-5">
						<button id="pay-button" class="btn btn-sm btn-primary" >Bayar</button>
					</div>
					<div class="col-2">
						<a href="<?= base_url('konsumen/pesanan/hapus_pesanan/'.$inv->id_invoice)?>" class="btn btn-sm btn-danger">Hapus</a>
					</div>
				</div>
			</td>

			<!-- <td align="center"><?php echo anchor('admin/invoice/detail/'.$inv->id_invoice, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td> -->
		</tr>

		<?php endforeach; ?>

	</table>

</div>
<script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?=site_url()?>payment/snap/token',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

</script>
