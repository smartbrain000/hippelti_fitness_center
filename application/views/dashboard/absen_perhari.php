<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col-3">
                <input type="date" class="form-control" placeholder=".col-3">
            </div>
            <div class="col-4">
                <input type="date" class="form-control" placeholder=".col-4">
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL ABSEN</th>
                    <th>JUMLAH</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tampil as $t) {
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td> <a href="<?= base_url("admin/detail_absen/" . $t["tgl_absen"]) ?>">
                                <?= $t['tgl_absen'] ?>
                            </a>

                        </td>
                        <td><?= $t['jumlah'] ?></td>
                        <td> <a href="<?= base_url('admin/del_absensi_tgl/' . $t['tgl_absen']) ?>" class="btn btn-danger btn-sm">

                                <i class="fa fa-trash"></i>
                            </a>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>

        </table>
    </div>
</div>