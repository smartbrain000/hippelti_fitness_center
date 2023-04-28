<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('user/ubah_password') ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="password_lama">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control" id="password_lama" placeholder="masukan password lama">
                        <?= form_error('password_lama', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="password_baru">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" id="password_baru" placeholder="masukan password baru">
                        <?= form_error('password_baru', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="konfirmasi">Konfirmasi</label>
                        <input type="password" name="konfirmasi" class="form-control" id="konfirmasi" placeholder="masukan konfirmasi">
                        <?= form_error('konfirmasi', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>