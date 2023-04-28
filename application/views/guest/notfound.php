<div class="container px-4 py-5" id="custom-cards">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5>Pencarian</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Post/cari') ?>" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Ketik Judul postingan.." value="<?= set_value('search') ?>">
                    <button class="btn btn-primary" type="submit" id="button-addon2">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">

        <h1>
            <?= $judul ?>
        </h1>
    </div>
</div>