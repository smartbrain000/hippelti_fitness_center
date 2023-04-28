<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">

    <div class="col-md-8">
        <div class="row">

            <?php foreach ($alat as $pd) { ?>
                <div class="col-md-6 my-2">

                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('<?= base_url("images/alat/" . $pd['foto']) ?>');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">

                                <a href="<?= base_url("post/detail/" . $pd['id_alat']) ?>" class="text-decoration-none text-white">
                                    <?= $pd['nama_alat'] ?>
                                </a>
                            </h2>

                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
        <div class="d-flex justify-content-center mt-3">

            <?= $pagination; ?>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card mx-3">
            <div class="card-header bg-danger text-white text-center">
                <h5>Jam Operasional</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card my-2">
                            <div class="card-body text-center">
                                <h1>08.00-20.00</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header bg-success text-white text-center">
                <h5>Paket dan Harga</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card my-2">
                            <div class="card-header bg-primary text-white text-center">
                                <h5>Harian/Freelance</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>Rp.15.000</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card my-2">
                            <div class="card-header bg-primary text-white text-center">
                                <h5>Bulanan</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>Rp.150.000</h1>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card my-2">
                            <div class="card-header bg-primary text-white text-center">
                                <h5>Tahunan</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>Rp.1.500.000</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>