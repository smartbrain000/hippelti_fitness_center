<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-76quQ6K8eEhZtmc0"></script>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Pembayaran SPP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Data Pembayaran SPP</h2>
        <form id="payment-form" method="post" action="<?= site_url() ?>midtrans/snap_test/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <label for="email">Email</label>
            <div class="form-group">
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <label for="nama">Nama Siswa</label>
            <div class="form-group">
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <label for="kelas">Kelas</label>
            <div class="form-group">
                <select name="kelas" id="kelas" class="form-control">
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                    <option value="IX">IX</option>
                </select>
            </div>
            <label for="jml_bayar">Jumlah Bayar</label>
            <div class="form-group">
                <input type="text" name="jml_bayar" id="jml_bayar" class="form-control">
            </div>
            <button id="pay-button" class="btn btn-primary mt-1">BAYAR!</button>
        </form>

        <div class="row mt-2">
            <div class="col-12">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Nama - Kelas</th>
                            <th>gross_amount</th>
                            <th>payment_type</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $d) : ?>
                            <tr>
                                <td><?= $d['order_id'] ?></td>
                                <td><?= $d['nama'] . ' - ' . $d['kelas'] ?></td>
                                <td class="text-right"><?= number_format($d['gross_amount']) ?></td>
                                <td><?= $d['payment_type'] ?></td>
                                <td><?= $d['transaction_time'] ?></td>
                                <td>
                                    <?= ($d['status_code'] == 200) ? 'Success' : 'Pending'; ?>
                                </td>
                                <td>
                                    <a href="<?= $d['pdf_url'] ?>" class="btn btn-success btn-sm">Download</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();

            var nama = $("#nama").val();
            var email = $("#email").val();
            var kelas = $("#kelas").val();
            var jml_bayar = $("#jml_bayar").val();

            $(this).attr("disabled", "disabled");

            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>midtrans/snap_test/token',
                data: {
                    email: email,
                    nama: nama,
                    kelas: kelas,
                    jml_bayar: jml_bayar
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
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>