<div class="row">
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('Alat/i_alat') ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input required type="file" name="foto" class="form-control" id="foto" placeholder="masukan foto">

                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama_alat" class="form-control" id="nama" placeholder="masukan nama alat">
                        <?= form_error('nama_alat', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="masukan jumlah">
                        <?= form_error('jumlah', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="fungsi">Fungsi</label>
                        <textarea name="fungsi" id="fungsi" cols="30" rows="10" class="form-control"></textarea>
                        <?= form_error('fungsi', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

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