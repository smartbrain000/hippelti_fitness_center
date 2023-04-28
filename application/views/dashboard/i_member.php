<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('admin/i_member') ?>" method="POST" enctype="multipart/form-data">
                <div class=" card-body">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input required type="file" name="foto" class="form-control" id="foto" placeholder="masukan foto">

                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="masukan nama">
                        <?= form_error('nama', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>

                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="l" name="jk" value="L" checked>
                            <label for="l" class="custom-control-label">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="p" name="jk" value="P">
                            <label for="p" class="custom-control-label">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat">
                        <?= form_error('alamat', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="masukan no telpon">
                        <?= form_error('no_telp', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <!-- <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="masukan email">
                        <?= form_error('email', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div> -->
                    <div class="form-group">
                        <label for="expired">Tanggal Daftar</label>
                        <input type="date" name="tgl_daftar" class="form-control" id="expired" placeholder="masukan tanggal daftar">
                        <?= form_error('tgl_daftar', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="expired">Tanggal Kedaluarsa</label>
                        <input type="date" name="tgl_kedaluarsa" class="form-control" id="expired" placeholder="masukan tanggal kedaluarsa">
                        <?= form_error('tgl_kedaluarsa', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="input_nominal">Input Nominal</label>
                        <input type="text" name="input_nominal" class="form-control" id="input_nominal" placeholder="input nominal">
                        <?= form_error('input_nominal', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>