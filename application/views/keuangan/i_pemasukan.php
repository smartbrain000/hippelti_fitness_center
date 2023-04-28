<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('keuangan/i_pemasukan') ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Tanggal Pemasukan</label>
                        <input type="date" name="tgl_pemasukan" class="form-control" id="tgl_pemasukan" placeholder="masukan tgl">
                        <?= form_error('tgl_pemasukan', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Sumber</label>
                        <input type="text" name="sumber" class="form-control" id="sumber" placeholder="masukan sumber">
                        <?= form_error('sumber', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>

                    <div class="form-group">
                        <label for="tanggal lahir">Nama Pemasukan</label>
                        <input type="text" name="nama_pemasukan" class="form-control" id=" nama_pemasukan" placeholder="masukan pemasukan">
                        <?= form_error('nama_pemasukan', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="alamat">Jumlah Pemasukan</label>
                        <input type="text" name="jml_pemasukan" class="form-control" id="jml_pemasukan" placeholder="masukan pemasukan">
                        <?= form_error('jml_pemasukan', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>