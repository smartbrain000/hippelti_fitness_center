<script>
    window.print();
</script>
<div class="row">
    <!-- left column -->
    <div class="col-md-5">
        <!-- jquery validation -->
        <div class="card" id="example2_wrapper">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table">
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <img src="<?= base_url('assets/images/qr_code/' . $member['qr_code']) ?>" alt="" width="150px">
                                <br>
                                <br>
                            </td>
                            <td valign="middle" class="text-center">
                                <img src="<?= base_url('assets/images/foto/' . $member['foto']) ?>" alt="" width="140px">
                                <br>
                                <br>
                            </td>

                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: <?= $member['nama'] ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Tampat Lahir</td>
                            <td>: <?= $member['tempat_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>: <?= $member['tanggal_lahir'] ?></td>
                        </tr> -->
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
                        <tr>
                            <td>Tgl. Daftar</td>
                            <td>: <?= $member['tgl_daftar'] ?></td>
                        </tr>
                        <tr>
                            <td>Expired Member</td>
                            <td>: <?= $member['tgl_kedaluarsa'] ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Email</td>
                            <td>: <?= $member['email'] ?></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>