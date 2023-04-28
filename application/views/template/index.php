<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- CSS Tables -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">

    <?php if ($_SESSION['level'] == '1') { ?>
        <!-- JavaScript webcodecam -->
        <script src="<?= base_url("webcodecam/") ?>js/jquery.min.js"></script>
        <script src="<?= base_url("webcodecam/") ?>js/bootstrap.min.js"></script>
    <?php } ?>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- LOAD HEADER -->
        <?php $this->load->view('template/header'); ?>

        <!-- LOAD MENU -->
        <?php $this->load->view('template/menu'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> <?= $judul ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- KONTEN -->
            <section class="content">

                <?= $this->session->flashdata('message'); ?>

                <!-- LOAD VIEW -->
                <?php $this->load->view($file); ?>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>

    <!-- JS -->
    <?php $this->load->view('template/js'); ?>

    <!-- ./JS -->
</body>

</html>