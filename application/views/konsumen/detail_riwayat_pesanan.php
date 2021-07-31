
<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan')?>
        <h4>Detail Pembayaran</h4>
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="label">Bank</div>
                                <input type="text" value = "<?= $payment->bank?>" class = "form-control" disabled>
                            </div>
                            <div class="form-group">
                                <div class="label">Tipe Pembayaran</div>
                                <input type="text" value = "<?= $payment->payment_type?>" class = "form-control" disabled>
                            </div>
                            <div class="form-group">
                                <div class="label">Jumlah Bayar</div>
                                <input type="text" value = "<?= $payment->gross_amount?>" class = "form-control" disabled>
                            </div>
                            <div class="form-group">
                                <div class="label">Tanggal</div>
                                <input type="text" value = "<?= $payment->transaction_time ?>" class = "form-control" disabled>
                            </div>
                            <?php 
                            if(isset($payment->permata_va_number)){ ?>
                                <div class="form-group">
                                    <div class="label">Pertama Va Number</div>
                                    <input type="text" value = "<?= $payment->permata_va_number ?>" class = "form-control" disabled>
                                </div>
                            <?php }else{?>
                                <div class="form-group">
                                    <div class="label">Pertama Va Number</div>
                                    <input type="text" value = "-" class = "form-control" disabled>
                                </div>
                            <?php }?>
                        </div>
                        <div class="col-md-6">
                        <?php 
                            if(isset($payment->va_number)){ ?>
                                <div class="form-group">
                                    <div class="label">Va Number</div>
                                    <input type="text" value = "<?= $payment->va_number ?>" class = "form-control" disabled>
                                </div>
                            <?php }else{ ?>
                                <div class="form-group">
                                    <div class="label">Va Number</div>
                                    <input type="text" value = "-" class = "form-control" disabled>
                                </div>
                            <?php } ?>

                            <?php if(isset($payment->payment_code)){ ?>
                                <div class="form-group">
                                    <div class="label">Payment Code</div>
                                    <input type="text" value = "<?= $payment->payment_code ?>" class = "form-control" disabled>
                                </div>
                            <?php }else{ ?> 
                                <div class="form-group">
                                    <div class="label">Payment Code</div>
                                    <input type="text" value = "-" class = "form-control" disabled>
                                </div>
                            <?php } ?>

                            <?php if(isset($payment->bill_key)){ ?>
                                <div class="form-group">
                                    <div class="label">Bill Key</div>
                                    <input type="text" value = "<?= $payment->bill_key ?>" class = "form-control" disabled>
                                </div>
                            <?php }else{ ?>
                                <div class="form-group">
                                    <div class="label">Bill Key</div>
                                    <input type="text" value = "-" class = "form-control" disabled>
                                </div>
                            <?php } ?>

                            <?php if(isset($payment->biller_code)){ ?>
                                <div class="form-group">
                                    <div class="label">Biller Code</div>
                                    <input type="text" value = "<?= $payment->biller_code ?>" class = "form-control" disabled>
                                </div>
                            <?php }else{ ?>
                                <div class="form-group">
                                    <div class="label">Biller Code</div>
                                    <input type="text" value = "-" class = "form-control" disabled>
                                </div>
                            <?php }?>
                            <div class="form-group">
                                <div class="label">Download Tutorial</div>
                                <a href="<?php echo $payment->pdf_url?>"><div class="btn btn-info">Download Tutorial</div></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
        <br>

        <h4>Detail Barang yang di beli</h4>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
            
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Sub Total</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Status Pembayaran</th>
                    </tr>
                    
                    <?php $no = 1; foreach ($barang as $r) : ?>
                    <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td><?php echo $r->nama_brg ?></td>
                        <td><?php echo $r->jumlah ?></td>
                        <td align="center"><?php echo $r->harga ?></td>
                        <td align="center"><?php echo $r->sub_total ?></td>
                        <td align="center"><?php echo $r->total ?></td>
                        <td align="center"><div class = "badge badge-warning"><?php echo $r->status_bayar ?></div></td>
                    </tr>

                    <?php endforeach; ?>

                </table>           
            </div>
        </div>
        <br>
        <h4>Detail Pengiriman</h4>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
            
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Penerima</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No HP</th>
                        <th class="text-center">Tanggal Pesan</th>
                        <th class="text-center">Batas Bayar</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Status Bayar</th>
                        <th class="text-center">Status Kirim</th>
                    </tr>
                    
                    <?php $no = 1; foreach ($barang as $r) : ?>
                    <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td><?php echo $r->nama?></td>
                        <td><?php echo $r->alamat ?></td>
                        <td align="center"><?php echo $r->no_hp ?></td>
                        <td align="center"><?php echo $r->tgl_pesan ?></td>
                        <td align="center"><?php echo $r->batas_bayar ?></td>
                        <td align="center"><?php echo $r->keterangan ?></td>
                        <td align="center"><div class = "badge badge-warning"><?php echo $r->status_bayar ?></div></td>
                        <td align="center"><?php echo $r->status_kirim ?></td>
                    </tr>

                    <?php endforeach; ?>

                </table>           
            </div>
        </div>
</div>