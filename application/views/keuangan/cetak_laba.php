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
</head>

<body>


    <div class="card">
        <!-- /.card-header -->
        <div class="card-headeer">
            <h3 class="text-center">LAPORAN KEUANGAN (<?php echo $priode ?>)</h3>
        </div>
        <div class="card-body">
            <?php if ($pemasukan != 0) : ?>
                <h5>PEMASUKAN / PENDAPATAN</h5>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal</th>
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
                                <td><?= $t['nama_pemasukan'] ?></td>
                                <td><?= $t['jml_pemasukan'] ?></td>
                            </tr>
                        <?php $no++;
                            $jumlah_pm += $t['jml_pemasukan'];
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-center">Jumlah Pemasukan</td>
                            <td class='text-right'><?= 'Rp ' . number_format($jumlah_pm) ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            <?php endif; ?>

            <?php if ($pengeluaran != 0) : ?>
                <h5>PENGELUARAN</h5>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal</th>
                            <th>Nama Pengeluaran</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $jumlah_pk = 0;
                        foreach ($pengeluaran as $t) {
                        ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $t['tgl_pengeluaran'] ?></td>
                                <td><?= $t['nama_pengeluaran'] ?></td>
                                <td><?= $t['jml_pengeluaran'] ?></td>
                            </tr>
                        <?php
                            $no++;
                            $jumlah_pk += $t['jml_pengeluaran'];
                        } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-center">Jumlah Pengeluaran</td>
                            <td class='text-right'><?= 'Rp ' . number_format($jumlah_pk) ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            <?php endif; ?>

            <?php if (($pemasukan != 0) && ($pengeluaran != 0)) : ?>
                <h5>LABA BERSIH</h5>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php
                            //TOTAL LABA BERSIH = JUMLAH PEMASUKAN - (JUMLAH PENGELUARAN + JUMLAH BEBAN ADMINISTRASI)
                            // $total = $jumlah_pm - ($jumlah_pl + $jumlah_b);
                            $total = $jumlah_pm - $jumlah_pk;
                            ?>
                            <th class='text-right' scope="col"><?= 'Rp ' . number_format($total) ?></th>
                        </tr>
                    </thead>
                </table>
            <?php endif; ?>

        </div>
    </div>

</body>

</html>