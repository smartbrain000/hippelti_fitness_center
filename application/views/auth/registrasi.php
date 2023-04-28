<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">

    <style>
        .register-box {
            width: 600px;
        }
    </style>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-76quQ6K8eEhZtmc0"></script>

    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

    <!-- ! jQuery v2.2.4 | (c) jQuery Foundation | jquery.org/license  -->
    <script src="<?= base_url() ?>bootstrap/js/jquery.min.js"></script>
</head>


<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url() ?>"><b>Hippelti Fitness Center</b></a>
        </div>

        <div class="card">
            <div class="card-body">
                <form id="payment-form" method="post" action="<?= site_url() ?>snap/finish">
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <div class="input-group mb-3">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                                <div class="input-group-append">
                                    <div class="input-group-text" id='icon_nama'>
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <div class="text-danger col-12" id="notif_nama"></div>
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input required type="file" name="foto" class="form-control" id="foto" placeholder="masukan foto">
                                <div class="text-danger col-12" id="notif_foto"></div>
                            </div>

                            <label for="jk">Jenis Kelamin</label>
                            <div class="input-group mb-3">

                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="l" name="jk" value="L" checked>
                                    <label for="l" class="custom-control-label">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio mx-2">
                                    <input class="custom-control-input" type="radio" id="p" name="jk" value="P">
                                    <label for="p" class="custom-control-label">Perempuan</label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                                <div class="input-group-append">
                                    <div class="input-group-text" id='icon_alamat'>
                                        <span class="fas fa-address-card"></span>
                                    </div>
                                </div>
                                <div class="text-danger col-12" id="notif_alamat"></div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="No telepon">
                                <div class="input-group-append">
                                    <div class="input-group-text" id='icon_no_telp'>
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                <div class="text-danger col-12" id="notif_no_telp"></div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="username">Username</label>
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text" id='icon_username'>
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <div class="text-danger col-12" id="notif_username"></div>
                            </div>

                            <label for="password">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text" id='icon_password'>
                                        <span class="fas fa-key"></span>
                                    </div>
                                </div>
                                <div class="text-danger col-12" id="notif_password"></div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password2" name="password2" class="form-control" id="password2" placeholder="Ulangi Password">
                                <div class="input-group-append">
                                    <div class="input-group-text" id='icon_password2'>
                                        <span class="fas fa-key"></span>
                                    </div>
                                </div>
                                <div class="text-danger col-12" id="notif_password2"></div>
                            </div>

                            <label for="paket">Membership</label>
                            <div class="input-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="paket_a" name="paket" value="150000" checked>
                                    <label for="paket_a" class="custom-control-label">1 Bulan : Rp 150.000</label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="paket_b" name="paket" value="1500000">
                                    <label for="paket_b" class="custom-control-label">1 Tahun : Rp 1.500.000</label>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="result_type" id="result-type" value="">
                            <input type="hidden" name="result_data" id="result-data" value="">
                            <button type="submit" class="btn btn-primary btn-block" id="submit_registrasi">Registrasi</button>
                        </div>
                    </div>
                </form>


                <script type="text/javascript">
                    //DEKLARASI VARIABEL
                    const notif_nama = document.querySelector('#notif_nama');
                    const notif_alamat = document.querySelector('#notif_alamat');
                    const notif_no_telp = document.querySelector('#notif_no_telp');
                    const notif_username = document.querySelector('#notif_username');
                    const notif_password = document.querySelector('#notif_password');
                    const notif_password2 = document.querySelector('#notif_password2');

                    const icon_nama = document.querySelector('#icon_nama');
                    const icon_alamat = document.querySelector('#icon_alamat');
                    const icon_no_telp = document.querySelector('#icon_no_telp');
                    const icon_username = document.querySelector('#icon_username');
                    const icon_password = document.querySelector('#icon_password');
                    const icon_password2 = document.querySelector('#icon_password2');

                    $('#submit_registrasi').click(function(event) {
                        event.preventDefault();

                        //DEKLARASI VARIABEL INPUT
                        var nama = $('#nama').val();
                        var alamat = $('#alamat').val();
                        var no_telp = $('#no_telp').val();
                        var username = $('#username').val();
                        var password = $('#password').val();
                        var password2 = $('#password2').val();

                        //VALIDASI INPUT
                        if (nama == '') {
                            $('#nama').addClass('border border-danger');
                            notif_nama.innerHTML = '<small> Nama tidak boleh dikosongkan !!!</small>';
                            icon_nama.classList.add('border-danger');
                            icon_nama.classList.add('text-danger');
                            return false;
                        }
                        if (alamat == '') {
                            $('#alamat').addClass('border border-danger');
                            notif_alamat.innerHTML = '<small> alamat tidak boleh dikosongkan !!!</small>';
                            icon_alamat.classList.add('border-danger');
                            icon_alamat.classList.add('text-danger');
                            return false;
                        }
                        if (no_telp == '') {
                            $('#no_telp').addClass('border border-danger');
                            notif_no_telp.innerHTML = '<small> no_telp tidak boleh dikosongkan !!!</small>';
                            icon_no_telp.classList.add('border-danger');
                            icon_no_telp.classList.add('text-danger');
                            return false;
                        }
                        if (username == '') {
                            $('#username').addClass('border border-danger');
                            notif_username.innerHTML = '<small> Username tidak boleh dikosongkan !!!</small>';
                            icon_username.classList.add('border-danger');
                            icon_username.classList.add('text-danger');
                            return false;
                        }
                        if (password == '') {
                            $('#password').addClass('border border-danger');
                            notif_password.innerHTML = '<small> Password tidak boleh dikosongkan !!!</small>';
                            icon_password.classList.add('border-danger');
                            icon_password.classList.add('text-danger');
                            return false;
                        }
                        if (password2 == '') {
                            $('#password2').addClass('border border-danger');
                            notif_password2.innerHTML = '<small> Ulangi Password masih kosong !!!</small>';
                            icon_password2.classList.add('border-danger');
                            icon_password2.classList.add('text-danger');
                            return false;
                        }
                        if (password != password2) {
                            $('#password2').addClass('border border-danger');
                            notif_password2.innerHTML = '<small> Password Tidak Sama !!!</small>';
                            icon_password2.classList.add('border-danger');
                            icon_password2.classList.add('text-danger');
                            password2.val() = '';
                            return false;
                        }

                        var jk = 'L';
                        if ($('#l').is(':checked')) {
                            jk = $('#l').val();
                        }
                        if ($('#p').is(':checked')) {
                            jk = $('#p').val();
                        }

                        var paket = '150000';
                        if ($('#paket_a').is(':checked')) {
                            paket = $('#paket_a').val();
                        }
                        if ($('#paket_b').is(':checked')) {
                            paket = $('#paket_b').val();
                        }

                        $(this).attr("disabled", "disabled");

                        $.ajax({
                            url: '<?= site_url() ?>snap/token',
                            method: 'POST',
                            data: {
                                nama: nama,
                                alamat: alamat,
                                no_telp: no_telp,
                                username: username,
                                password: password,
                                jk: jk,
                                paket: paket,
                            },
                            cache: false,

                            success: function(data) {
                                //location = data;
                                console.log('token = ' + data);
                                var resultType = document.getElementById('result-type');
                                var resultData = document.getElementById('result-data');

                                function changeResult(type, data) {
                                    $("#result-type").val(type);
                                    $("#result-data").val(JSON.stringify(data));
                                    // resultType.innerHTML = type;
                                    // resultData.innerHTML = JSON.stringify(data);
                                }

                                // $("#result-data").val(JSON.stringify(data));
                                // $("#payment-form").submit();

                                snap.pay(data, {
                                    onSuccess: function(result) {
                                        changeResult('success', result);
                                        console.log(result.status_message);
                                        console.log(result);
                                        $("#payment-form").submit();
                                    },
                                    onPending: function(result) {
                                        changeResult('pending', result);
                                        console.log(result.status_message);
                                        $("#payment-form").submit();
                                    },
                                    onError: function(result) {
                                        changeResult('error', result);
                                        console.log(result.status_message);
                                        $("#payment-form").submit();
                                    }
                                });
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>