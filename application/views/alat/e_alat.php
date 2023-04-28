<div class="row">
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-dark">
            <!-- /.card-header -->
            <form action="<?= base_url('Alat/p_e_alat/' . $col['id_alat']) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" placeholder="masukan foto">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input value="<?= $col['nama_alat'] ?>" required type="text" name="nama_alat" class="form-control" id="nama" placeholder="masukan nama alat">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input value="<?= $col['jumlah'] ?>" required type="text" name="jumlah" class="form-control" id="jumlah" placeholder="masukan jumlah">

                    </div>
                    <div class="form-group">
                        <label for="fungsi">Fungsi</label>
                        <textarea name="fungsi" id="fungsi" cols="30" rows="10" class="form-control"><?= $col['fungsi'] ?></textarea>
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