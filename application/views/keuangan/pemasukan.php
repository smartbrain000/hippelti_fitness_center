<div class="card">
    <div class="card-header">
        <form action="<?= base_url('keuangan/pemasukan/' . $jenis) ?>" method="POST">
            <div class="row">
                <div class="col-3">
                    <a href="<?= base_url("keuangan/i_pemasukan") ?>" class="btn btn-info">
                        TAMBAH PEMASUKAN
                    </a>
                </div>
                <div class="col-3">
                    <select name="jenis" id="jenis" class="form-control">
                        <option hidden><?= $jenis ?></option>
                        <option value='Semua'>Semua Jenis Pemasukan</option>
                        <option value="Member">Member</option>
                        <option value="Pengunjung">Pengunjung</option>
                        <option value="Lain-lain">Lain-lain</option>
                    </select>
                    <script>
                        document.getElementById('jenis').addEventListener('change', function() {
                            var jenis = $(this).val();
                            setTimeout(function() {
                                window.location.replace("<?= base_url('keuangan/pemasukan/')  ?>" + jenis);
                            }, 2000);
                        });
                    </script>
                </div>
                <div class="col-2">
                    <input type="date" class="form-control" name="tgl1" id="tgl1">
                </div>
                <div class="col-2">
                    <input type="date" class="form-control" name="tgl2" id="tgl2">
                </div>
                <div class="col-2">
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
                    <th>SUMBER</th>
                    <th>NAMA PEMASUKAN</th>
                    <th>JUMLAH</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $jml_pemasukan = 0;
                foreach ($tampil as $t) {
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $t['tgl_pemasukan'] ?></td>
                        <td><?= ucwords(strtolower($t['sumber'])) ?></td>
                        <td><?= $t['nama_pemasukan'] ?></td>
                        <td><?= number_format($t['jml_pemasukan']) ?></td>
                        <td>
                            <a href="<?= base_url("keuangan/e_pemasukan/" . $t["id_pemasukan"]) ?>" class="btn btn-info btn-sm">

                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?= base_url('keuangan/del_pemasukan/' . $t['id_pemasukan']) ?>" class="btn btn-danger btn-sm">

                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>

                <?php $no++;
                    $jml_pemasukan += $t['jml_pemasukan'];
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>JUMLAH</th>
                    <th><?= number_format($jml_pemasukan); ?></th>
                    <th>-</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>