<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body text-center">

                <h2>SELAMAT DATANG DI HIPPELTI FITNESS CENTER</h2>
                <h3>Silahkan arahkan QR CODE ke kamera!</h3>

                <div class="row mt-2">
                    <div class="col-md-<?= ($member == 0) ? 12 : 8; ?> text-center">

                        <canvas></canvas>

                        <div class="row">
                            <hr>
                            <div class="col-md-3 col-sm-1"></div>
                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <select class="form-control"></select>
                            </div>
                            <div class="col-md-3 col-sm-1"></div>
                        </div>

                    </div>

                    <?php if ($member != 0) { ?>
                        <div class="col-md-4">

                            <table class="border-0">

                                <tr>
                                    <td width="100%" class="text-center" rowspan="8">

                                        <img src="<?= base_url('assets/images/foto/' . $member['foto']) ?>" alt="" width="100%">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?= $member['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tampat Lahir</td>
                                    <td>: <?= $member['tempat_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>: <?= $member['tanggal_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= $member['jk'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <?= $member['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>No Telepon</td>
                                    <td>: <?= $member['no_telp'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: <?= $member['email'] ?></td>
                                </tr>
                            </table>

                        </div>
                    <?php } ?>
                </div>

                <?php if ($tampil['num_rows'] > 0) : ?>
                    <div class="row mt-2">
                        <div class="col-md-12">


                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampil['result'] as $t) {
                                    ?>

                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $t['nama'] ?></td>
                                            <td><?= $t['alamat'] ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>