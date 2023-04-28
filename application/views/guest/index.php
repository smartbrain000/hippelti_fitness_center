<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($this->uri->segment('2') == 'detail') : ?>
        <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title><?= $judul ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("bootstrap/img/") ?>">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('bootstrap/') ?>css/slg.css" rel="stylesheet">
    <link href="<?= base_url('bootstrap/') ?>css/features.css" rel="stylesheet">
    <style>
        .media {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start
        }

        .media-body {
            -ms-flex: 1;
            flex: 1
        }
    </style>

</head>

<body>
    <!-- <header> -->
    <?php $this->load->view('guest/navbar'); ?>
    <!-- </header> -->
    <main style="margin-top:0px">
        <div class="container px-2 py-2" id="custom-cards">
            <?= $this->session->flashdata('message'); ?>

            <?php $this->load->view('guest/' . $file); ?>

        </div>
    </main>
    <?php $this->load->view('guest/botnav'); ?>

    <script src="<?= base_url() ?>bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>bootstrap/js/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            //Mengirimkan Token Keamanan
            $.ajaxSetup({
                headers: {
                    'Csrf-Token': $('meta[name="csrf-token" ]').attr('content')
                }
            });
            $('#form_komen').on('submit', function(event) {
                event.preventDefault();
                let id_komentar = $('#id_komentar').val();
                let id_alat = $('#id_alat').val();
                let komen = $('#komen').val();
                if (komen == '') {
                    alert("Komentar Harus disii");
                } else {
                    var form_data = $(this).serialize();
                    $.ajax({
                        url: "<?= base_url('post/i_komentar') ?>",
                        method: "POST",
                        data: form_data,
                        success: function(data) {
                            console.log(form_data)
                            $('#form_komen')[0].reset();
                            $('#id_komentar').val('0');
                            setTimeout(function() {
                                window.location.replace("<?= base_url('post/detail/' . $this->uri->segment('3')) ?>");
                            }, 1000);
                        },
                    })
                }
            });

            $(document).on('click', '.reply', function() {
                var id_komentar = $(this).attr("id");
                $('#id_komentar').val(id_komentar);
                $('#komen').focus();
            });
        });
    </script>
</body>

</html>