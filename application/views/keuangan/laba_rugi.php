<div class="card">
    <div class="card-header">
        <form action="<?= base_url('keuangan/laba_rugi') ?>" method="POST">
            <div class="row">
                <div class="col-3">
                    <input type="date" class="form-control" name="tgl1" id="tgl1">
                </div>
                <div class="col-3">
                    <input type="date" class="form-control" name="tgl2" id="tgl2">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-info " id="cari">cari</button>
                    <?php if ($tgl != 0) : ?>
                        <a href="<?= base_url('keuangan/print/' . $tgl) ?>" class="btn btn-warning" target="_blank">Print Laporan</a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-header -->
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
                            <td><?= ucwords(strtolower($t['sumber'])) ?></td>
                            <td><?= $t['nama_pemasukan'] ?></td>
                            <td><?= number_format($t['jml_pemasukan']) ?></td>
                        </tr>
                    <?php $no++;
                        $jumlah_pm += $t['jml_pemasukan'];
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-center">Jumlah Pemasukan</td>
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
                            <td><?= number_format($t['jml_pengeluaran']) ?></td>
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