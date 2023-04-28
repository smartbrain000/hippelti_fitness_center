<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('keuangan/p_e_pengeluaran/' . $col['id_pengeluaran']) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tgl_pemasukan">Tanggal Pengeluaran</label>
                        <input value="<?= $col['tgl_pengeluaran'] ?>" required type="text" name="tgl_pengeluaran" class="form-control" id="nama" placeholder="masukan nama alat">
                    </div>
                    <div class="form-group">
                        <label for="nama_pengeluaran">Nama pengeluaran</label>
                        <input value="<?= $col['nama_pengeluaran'] ?>" required type="text" name="nama_pengeluaran" class="form-control" id="jumlah" placeholder="masukan jumlah">
                    </div>
                    <div class="form-group">
                        <label for="jml_pengeluaran">Jumlah pengeluaran</label>
                        <input value="<?= $col['jml_pengeluaran'] ?>" required type="text" name="jml_pengeluaran" class="form-control" id="jumlah" placeholder="masukan jumlah">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>