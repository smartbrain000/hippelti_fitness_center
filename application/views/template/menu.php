<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Dashboard/profil') ?>" class="brand-link">
        <img src="<?= base_url() ?>images/logo/baru.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Hippelti FC</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="#">
                    <img src="<?= base_url() ?>images/profil/<?= $_SESSION['foto'] ?>" class="img-circle elevation-2" alt="User Image">
                </a>
            </div>
            <div class="info">
                <a href="#"><?= $_SESSION['title'] ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php //MENU ADMIN
                if ($_SESSION['level'] == '1') { ?>

                    <li class="nav-item ">
                        <a href="<?= base_url('admin/index') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard </p>
                        </a>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="<?= base_url('admin/daftar_member') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>List Member</p>
                        </a>

                    </li>
                    <li class="nav-item bg-warning">
                        <a href="<?= base_url('admin/absensi') ?>" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="<?= base_url('Alat/index') ?>" class="nav-link">
                            <i class="nav-icon fas fa-upload"></i>
                            <p>Alat Fitnes</p>
                        </a>
                    </li>

                    <li class="nav-item bg-warning">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                            <p>Keuangan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview bg-dark">
                            <li class="nav-item">
                                <a href="<?= base_url('keuangan/pemasukan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pemasukan</p>
                                </a>
                            </li>
                            <li class="nav-item bg-dark">
                                <a href="<?= base_url('keuangan/pengeluaran') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengeluaran</p>
                                </a>
                            </li>
                            <li class="nav-item bg-dark">
                                <a href="<?= base_url('keuangan/laba_rugi') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laba Rugi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="<?= base_url('Admin/jadwal') ?>" class="nav-link">
                            <i class="nav-icon fas fa-grip-horizontal"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>

                <?php }

                //MENU MEMBER
                if ($_SESSION['level'] == '2') { ?>

                    <li class="nav-item bg-info">
                        <a href="<?= base_url('dashboard/index') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item bg-warning">
                        <a href="<?= base_url('Dashboard/data_diri') ?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Data Diri
                            </p>
                        </a>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="<?= base_url('Dashboard/absen') ?>" class="nav-link">
                            <i class="nav-icon fas fa-list-ul"></i>
                            <p>
                                Absen
                            </p>
                        </a>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="<?= base_url('Dashboard/booking') ?>" class="nav-link">
                            <i class="nav-icon fas fa-add"></i>
                            <p>
                                Booking
                            </p>
                        </a>
                    </li>
                <?php } ?>


                <li class="nav-item bg-warning">
                    <a href="<?= base_url('user/ubah_password') ?>" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Ubah Password
                        </p>
                    </a>
                </li>
                <li class="nav-item bg-info">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <li class="nav-item bg-warning">
                    <a href="<?= base_url('Post/home') ?>" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Situs
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>