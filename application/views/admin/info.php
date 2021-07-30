<div class="container-fluid">

    <h4>Info Admin</h4>
    <div class="card shadow">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah password</h6>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <form method="post" action="">
                <div class="form-group row">
                    <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" disabled readonly class="form-control-plaintext" id="staticUsername" value="<?= $this->session->userdata('username') ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                        <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirm" class="col-sm-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm New Password">
                        <?php echo form_error('confirm', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                </div>

                <div align="right">
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>


</div>