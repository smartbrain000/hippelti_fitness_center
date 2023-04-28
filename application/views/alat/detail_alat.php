<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card mb-2 mt-1 mx-2">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-5">
                            <div style="max-height: 350px; overflow:hidden;">
                                <img src="<?= base_url('images/alat/' . $alat['foto']) ?>" alt="<?= $alat['nama_alat'] ?>" class="img-fluid mt-3">
                            </div>
                        </div>


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

                </div>
            </div>


        </div>
        <div class="col-md-6">
            <div class="card mb-2 mt-1 mx-2">
                <div class="card-header form_input_status_alat d-none ">
                    <form action="<?= base_url('alat/i_status_alat/' . $alat['id_alat']) ?>" method="POST">

                        <div class="form-group">
                            <label for="no_seri_alat">No seri Alat</label>
                            <input type="text" name="no_seri_alat" class="form-control" id="status_alat" placeholder="masukan no seri alat">

                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-info mb-3 tombolShow" onclick="return tampilForm()">
                        Tambah Status Alat
                    </a>
                    <script>
                        function tampilForm() {
                            document.querySelector('.form_input_status_alat').classList.remove('d-none');
                            document.querySelector('.tombolShow').classList.add('d-none');
                        }
                    </script>

                    <table class="table table-bordered table-hover <?= ($tampil->num_rows() > 5) ? 'alat_fitnes' : ''; ?>">
                        <thead>
                            <tr>
                                <th>NO SERI ALAT</th>
                                <th>STATUS ALAT</th>
                                <th>HAPUS</th>
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
                                        <a href="<?= base_url("alat/status_alat/" . $t["id_status_alat"]) ?>" class="text-success">
                                            <?= $t['status_alat'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url("alat/del_status_alat/" . $t["id_status_alat"]) ?>" class="btn btn-danger btn-sm">
                                            hapus
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
    </div>
</div>