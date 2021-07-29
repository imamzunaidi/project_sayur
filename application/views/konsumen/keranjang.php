<div class="container-fluid">
	
	<h4>Keranjang Belanja</h4>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th class="text-center">NO</th>
			<th class="text-center">Nama Produk</th>
			<th class="text-center">Jumlah</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Sub-Total</th>
		</tr>

		<?php 
		$no=1;
		foreach ($this->cart->contents() as $items) : ?>

			<tr>
				<td align="center"><?php echo $no++ ?></td>
				<td><?php echo $items['name'] ?></td>
				<td align="center"><?php echo $items['qty'] ?></td>
				<td align="right">Rp. <?php echo number_format($items['price'], 0,',','.') ?>,-</td>
				<td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?>,-</td>
			</tr>

		<?php endforeach; ?>

		<tr>
			<td colspan="4"><b>Total</b></td>
			<td align="right">Rp. <?php echo number_format($this->cart->total(), 0,',','.') ?></td>
		</tr>

	</table>

	<div align="right">
		<form id="payment-form" method="post" action="<?=site_url()?>payment/snap/finish">
			<input type="hidden" name="result_type" id="result-type" value="">
			<input type="hidden" name="result_data" id="result-data" value="">
		</form>
		<a href="<?php echo base_url('konsumen/dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">
			Hapus Keranjang</div></a>
		<a href="<?php echo base_url('konsumen/dashboard/index') ?>"><div class="btn btn-sm btn-primary">
			Lanjutkan Belanja</div></a>
		<button id="pay-button" class="btn btn-sm btn-success" >
		Checkout</a></button>
	</div>
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


</body>
</html>