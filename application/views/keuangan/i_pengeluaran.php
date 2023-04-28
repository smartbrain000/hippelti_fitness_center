<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('keuangan/i_pengeluaran') ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Tanggal Pengeluaran</label>
                        <input type="date" name="tgl_pengeluaran" class="form-control" id="tgl_pengeluaran" placeholder="masukan tgl">
                        <?= form_error('tgl_pengeluaran', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="tanggal lahir">Nama Pengeluaran</label>
                        <input type="text" name="nama_pengeluaran" class="form-control" id=" nama_pengeluaran" placeholder="masukan pengeluaran">
                        <?= form_error('nama_pengeluaran', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <div class="form-group">
                        <label for="alamat">Jumlah Pengeluaran</label>
                        <input type="text" name="jml_pengeluaran" class="form-control" id="jml_pengeluaran" placeholder="masukan pengeluaran">
                        <?= form_error('jml_pengeluaran', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>