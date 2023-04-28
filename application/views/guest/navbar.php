<nav class="py-2 bg-dark border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="<?= base_url('Post') ?>" class="nav-link link-light px-2 ">Home</a></li>
            <li class="nav-item"><a href="<?= base_url('Post/profil') ?>" class="nav-link link-light px-2">Profil</a></li>
        </ul>
        <ul class="nav">

            <?php
            if (empty($_SESSION['username'])) {
            ?>
                <li class="nav-item">
                    <a href="<?= base_url('auth') ?>" class="nav-link link-light px-2 btn btn-warning">
                        Login</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/registrasi') ?>" class="mx-1 nav-link link-light px-2 btn btn-primary">
                        Registrasi</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link link-light px-2 btn ">
                        <?= $_SESSION['title'] ?></a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link link-light px-2 btn btn-warning">
                        Logout</a>
                </li>
            <?php } ?>
            </li>
        </ul>
    </div>
</nav>
<header class="py-3 mb-4 bg-light border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="<?= base_url('Post') ?>" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <!-- <use xlink:href="#bootstrap" /> -->
            </svg>
            <span class="fs-4">Hippelti Fitness Center</span>
        </a>
        <form action="<?= base_url('Post/cari') ?>" method="POST" class="col-10 col-lg-auto mb-3 mb-lg-0">
            <input type="text" class="form-control" name="search" placeholder="Ketik nama alat.." value="<?= set_value('search') ?>">

        </form>
    </div>
</header>