<div class="card">
    <div class="card-header">
        <form action="<?= base_url('keuangan/pengeluaran') ?>" method="POST">
            <div class="row">
                <div class="col-3">
                    <a href="<?= base_url("keuangan/i_pengeluaran") ?>" class="btn btn-info">
                        TAMBAH PENGELUARAN
                    </a>
                </div>
                <div class="col-3">
                    <input type="date" class="form-control" name="tgl1" id="tgl1">
                </div>
                <div class="col-3">
                    <input type="date" class="form-control" name="tgl2" id="tgl2">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-info " id="cari">cari</button>
                </div>
            </div>
        </form>


    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table id="keuangan" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>NAMA PENGELUARAN</th>
                    <th>JUMLAH</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $jml_pengeluaran = 0;
                foreach ($tampil as $t) {
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $t['tgl_pengeluaran'] ?></td>
                        <td><?= $t['nama_pengeluaran'] ?></td>
                        <td><?= number_format($t['jml_pengeluaran']) ?></td>
                        <td>
                            <a href="<?= base_url("keuangan/e_pengeluaran/" . $t["id_pengeluaran"]) ?>" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?= base_url('keuangan/del_pengeluaran/' . $t['id_pengeluaran']) ?>" class="btn btn-danger btn-sm">

                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>

                <?php $no++;
                    $jml_pengeluaran += $t['jml_pengeluaran'];
                } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>JUMLAH</th>
                    <th><?= number_format($jml_pengeluaran); ?></th>
                    <th>--</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>