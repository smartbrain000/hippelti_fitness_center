<div class="card">
    <div class="card-header">
        <form action="<?= base_url('admin/absensi') ?>" method="POST">
            <div class="row">
                <div class="col-4">
                    <input type="date" class="form-control" name="tgl1" id="tgl1">
                </div>
                <div class="col-4">
                    <input type="date" class="form-control" name="tgl2" id="tgl2">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-info " id="cari">cari</button>
                </div>
            </div>
        </form>


    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>TANGGAL</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tampil as $t) {
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $t['nama'] ?></td>
                        <td><?= $t['tgl_absen'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/del_absensi/' . $t['id_absen']) ?>" class="btn btn-danger btn-sm">

                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>

                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</div>