<script>
    window.print();
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <style>
        .card {
            margin-top: 113px;
            margin-bottom: 113px;
            margin-right: 113px;
            margin-left: 152px;
        }
    </style>
</head>

<body>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-headeer">
            <h3 class="text-center">LAPORAN PEMASUKAN </h3>
            <h4 class="text-center"><?php echo $periode ?></h4>
        </div>
        <div class="card-body">
            <?php if ($pemasukan != 0) : ?>
                <h5>PEMASUKAN / PENDAPATAN</h5>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal</th>
                            <th>Sumber</th>
                            <th>Nama Pemasukan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $jumlah_pm = 0;
                        foreach ($pemasukan as $t) {
                        ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $t['tgl_pemasukan'] ?></td>
                                <td><?= $t['sumber'] ?></td>
                                <td><?= $t['nama_pemasukan'] ?></td>
                                <td><?= $t['jml_pemasukan'] ?></td>
                            </tr>
                        <?php $no++;
                            $jumlah_pm += $t['jml_pemasukan'];
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-center">Jumlah Pemasukan</td>
                            <td class='text-right'><?= 'Rp ' . number_format($jumlah_pm) ?></td>
                        </tr>
                    </tfoot>
                </table>
            <?php endif; ?>

        </div>
    </div>

</body>

</html>