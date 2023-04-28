<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('keuangan/p_e_pemasukan/' . $col['id_pemasukan']) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tgl_pemasukan">Tanggal Pemasukan</label>
                        <input value="<?= $col['tgl_pemasukan'] ?>" required type="text" name="tgl_pemasukan" class="form-control" id="nama" placeholder="masukan nama alat">
                    </div>
                    <div class="form-group">
                        <label for="sumber">Sumber</label>
                        <input value="<?= $col['sumber'] ?>" required type="text" name="sumber" class="form-control" id="nama" placeholder="masukan nama alat">
                    </div>
                    <div class="form-group">
                        <label for="nama_pemasukan">Nama Pemasukan</label>
                        <input value="<?= $col['nama_pemasukan'] ?>" required type="text" name="nama_pemasukan" class="form-control" id="jumlah" placeholder="masukan jumlah">
                    </div>
                    <div class="form-group">
                        <label for="jml_pemasukan">Jumlah Pemasukan</label>
                        <input value="<?= $col['jml_pemasukan'] ?>" required type="text" name="jml_pemasukan" class="form-control" id="jumlah" placeholder="masukan jumlah">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>