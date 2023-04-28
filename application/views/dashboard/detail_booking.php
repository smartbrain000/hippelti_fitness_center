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
                    <th>WAKTU</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tampil as $t) {
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $t['nama'] ?></td>
                        <td><?= $t['waktu_booking'] ?></td>

                    </tr>
            </tbody>
        <?php $no++;
                } ?>

        </table>
    </div>
</div>