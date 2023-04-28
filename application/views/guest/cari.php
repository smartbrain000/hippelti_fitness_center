<div class="container px-4 py-5" id="custom-cards">

    <div class="row">

        <h1><?= $judul ?></h1>
    </div>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">
        <?php foreach ($alat as $pd) { ?>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('<?= base_url("images/foto/" . $pd['foto']) ?>');">
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
    <div class="d-flex justify-content-center">
        <?= $pagination; ?>
    </div>
</div>