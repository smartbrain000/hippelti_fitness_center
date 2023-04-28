<div class="container">
    <div class="row">
        <div class="col-md-7">

            <div class="card mb-2 mt-1 mx-2">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-5">
                            <div style="max-height: 350px; overflow:hidden;">
                                <img src="<?= base_url('images/foto/' . $alat['foto']) ?>" alt="<?= $alat['nama_alat'] ?>" class="img-fluid mt-3">
                            </div>
                        </div>
                        <!-- <a href="<?= base_url('post/detail/' . $alat['id_alat']) ?>" class="btn btn-info">Detail Alat Fitness</a> -->


                        <div class="col-md-7">
                            <table class="table mt-4">
                                <tr>
                                    <td>Nama Alat</td>
                                    <td>: <?= $alat['nama_alat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>: <?= $alat['jumlah'] ?></td>
                                </tr>

                            </table>
                            <article class="my-3 fs-6" style="text-align:justify;">
                                <?= $alat['fungsi'] ?>
                            </article>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <table class="table table-bordered table-hover <?= ($tampil->num_rows() > 5) ? 'alat_fitnes' : ''; ?>">
                            <thead>

                                <tr>
                                    <th>NO SERI ALAT</th>
                                    <th>STATUS ALAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tampil->result_array() as $t) {
                                ?>

                                    <tr>


                                        <td>
                                            <?= $t['id_status_alat'] ?>


                                        </td>
                                        <td>
                                            <?= $t['status_alat'] ?>


                                            </a>

                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-1 mx-2">
                <div class="card-header bg-success text-white text-center">
                    <h5>Kritik dan Saran</h5>
                </div>
                <div class="card-body">

                    <div class="row my-3">
                        <div class="col-md-12">

                            <form method="POST" id="form_komen">
                                <div class="form-group">
                                    <textarea name="komen" id="komen" class="form-control" placeholder="Tulis Komentar" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_alat" id="id_alat" value="<?= $alat['id_alat'] ?>" />
                                    <input type="hidden" name="id_komentar" id="id_komentar" value="0" />
                                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-5">
            <div class="card mt-1">
                <div class="card-body mb-3">
                    <h5>Komentar</h5>
                    <hr>
                    <span id="message"></span>

                    <div id="display_comment">
                        <?php if ($komen['num_rows'] > 0) :
                            foreach ($komen['data'] as $row) : ?>

                                <div class="media border p-3 mb-2">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('images/foto/' . $row['foto']) ?>" alt="foto-user" class="mr-1 mt-1 rounded-circle" style="width:50px;">
                                            </div>
                                            <div class="col-sm-9">
                                                <p><b><?= $row["nama"] ?></b><br> <small><i><?= $row["waktu"] ?></i></small></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <p><?= $row["komentar"] ?></p>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php if (($_SESSION['level'] == '1') || ($_SESSION['id_member'] == $row['id_member'])) : ?>
                                                    <a href="<?= base_url('dashboard/del_komentar/' . $row['id_komentar'] . '/' . $alat['id_alat']); ?>" class="btn btn-danger btn-sm">Hapus</a>

                                                <?php endif; ?>
                                                <button type="button" class="my-1 btn btn-primary btn-sm reply" id="<?= $row["id_komentar"] ?>">Reply</button>
                                            </div>
                                        </div>

                                        <?php if ($row['child'] != 'nothing') :
                                            foreach ($row['child'] as $row2) { ?>
                                                <div class="media border p-2 mb-1" style="margin-left:40px">
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <img src="<?= base_url('assets/images/foto/' . $row2['foto']) ?>" alt="foto-user" class="mr-1 mt-1 rounded-circle" style="width:50px;">
                                                            </div>
                                                            <div class="col-sm-9 my-1">
                                                                <p><b><?= $row2['nama'] ?></b><br><small><i><?= $row2['waktu'] ?></i></small></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <p><?= $row2['komentar'] ?></p>
                                                                <?php if (($_SESSION['level'] == '1') || ($_SESSION['id_member'] == $row2['id_member'])) : ?>
                                                                    <a href="<?= base_url('dashboard/del_komentar/' . $row2['id_komentar'] . '/' . $alat['id_alat']); ?>" class="btn btn-danger btn-sm">Hapus</a>

                                                                <?php endif; ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        endif;
                                        ?>

                                    </div>
                                </div>

                        <?php endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>