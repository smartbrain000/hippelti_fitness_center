<div class="card">
    <div class="card-header">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>FOTO</th>
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
                        <td><?= $t['foto'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/del_alat/' . $t['id_alat']) ?>" class="btn btn-danger btn-sm">

                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>
            </tbody>
        <?php $no++;
                } ?>

        </table>
    </div>
</div>