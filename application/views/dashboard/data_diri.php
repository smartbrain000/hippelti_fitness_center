<div class="row">
    <!-- left column -->
    <div class="col-md-5">
        <!-- jquery validation -->
        <div class="card" id="example2_wrapper">
            <!-- /.card-header -->
            <div class="card-body">

                <a href="<?= base_url('Dashboard/print/' . $member['id_member']) ?>" target="_blank" class="btn btn-dark">Print</a>

                <table id="example2" class="table">
                    <tbody>

                        <tr>
                            <td width="80%" class="text-center">
                                <img src="<?= base_url('assets/images/qr_code/' . $member['qr_code']) ?>" class="qrcode" alt="" width="100%">
                                <br><?= $member['no_qr'] ?>
                            </td>
                            <td width="50%">
                                <img src="<?= base_url('assets/images/foto/' . $member['foto']) ?>" alt="" width="100%">

                            </td>
                        </tr>

                        <tr>
                            <td>Nama</td>
                            <td>: <?= $member['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Tampat Lahir</td>
                            <td>: <?= $member['tempat_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>: <?= $member['tanggal_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?= $member['jk'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $member['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>: <?= $member['no_telp'] ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Email</td>
                            <td>: <?= $member['email'] ?></td>
                        </tr> -->
                    </tbody>
                </table>
                <script>
                    function tampilfoto() {
                        const tombol = document.querySelector('.qrcode');
                        tombol.classList.remove('d-none');
                    }
                </script>
            </div>
        </div>
    </div>
</div>