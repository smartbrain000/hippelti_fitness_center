<div class="card">
    <div class="card-header">
        <a href="<?= base_url("alat/i_alat") ?>" class="btn btn-info">
            TAMBAH ALAT
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table class="table table-bordered table-hover alat_fitnes">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>FOTO</th>
                    <th>NAMA</th>
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
                        <td>
                            <img src="<?= base_url('images/alat/' . $t['foto']) ?>" width="100">

                        </td>
                        <td><a href="<?= base_url("alat/detail_alat/" . $t["id_alat"]) ?>">
                                <?= $t['nama_alat'] ?>
                            </a>

                        </td>
                        <td><?= $t['jumlah'] ?></td>
                        <td>
                            <a href="<?= base_url("alat/e_alat/" . $t["id_alat"]) ?>" class="btn btn-info btn-sm">

                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?= base_url("alat/del_alat/" . $t["id_alat"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data <?= $t['nama_alat'] ?> ini dihapus?')">

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