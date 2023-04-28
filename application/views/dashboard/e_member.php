<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('admin/p_e_member/' . $col['id_member']) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" placeholder="masukan foto">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input value="<?= $col['nama'] ?>" required type="text" name="nama" class="form-control" id="nama" placeholder="masukan nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input value="<?= $col['alamat'] ?>" required type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input value="<?= $col['no_telp'] ?>" required type="text" name="no_telp" class="form-control" id="no_telp" placeholder="masukan no telpon">
                    </div>
                    <!-- <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?= $col['email'] ?>" type="text" name="email" class="form-control" id="email" placeholder="masukan email">
                    </div> -->
                    <div class="form-group">
                        <label for="expired">Tanggal Kedaluarsa</label>
                        <input value="<?= $col['tgl_kedaluarsa'] ?>" required type="date" name="tgl_kedaluarsa" class="form-control" id="expired" placeholder="masukan tanggal kedaluarsa">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>