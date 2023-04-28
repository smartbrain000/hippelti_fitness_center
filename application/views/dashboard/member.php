<div class="card">
    <div class="card-header">
        <form action="<?= base_url('admin/daftar_member') ?>" method="POST">
            <div class="row">
                <div class="col-3">
                    <a href="<?= base_url("admin/i_member") ?>" class="btn btn-info">
                        TAMBAH ANGGOTA
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

        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL DAFTAR</th>
                    <th>NAMA</th>
                    <th>TANGGAL KEDALUARSA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tampil as $t) {
                    if ($t['id_user'] != '1') :
                ?>

                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $t['tgl_daftar'] ?></td>
                            <td><a href="<?= base_url("admin/detail/" . $t["id_member"]) ?>">
                                    <?= $t['nama'] ?>
                                </a>
                            </td>
                            <td><?= $t['tgl_kedaluarsa'] ?></td>
                            <td>

                                <?php if ($t['level'] == '0') { ?>
                                    <a href="<?= base_url("admin/detail/" . $t["id_member"]) ?>" class="btn btn-warning btn-sm">
                                        ACC
                                    </a>
                                <?php } ?>

                                <a href="<?= base_url("admin/e_member/" . $t["id_member"]) ?>" class="btn btn-info btn-sm">

                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?= base_url("admin/del_member/" . $t["id_member"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data <?= $t['nama'] ?> ini dihapus?')">

                                    <i class="fa fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                <?php
                        $no++;
                    endif;
                } ?>
            </tbody>
        </table>


    </div>
</div>