<div class="row">
    <!-- left column -->
    <div class="col-md-5">
        <!-- jquery validation -->
        <div class="card" id="example2_wrapper">
            <!-- /.card-header -->
            <div class="card-body">
                <a href="<?= base_url('admin/print/' . $member['id_member']) ?>" target="_blank" class="btn btn-dark">Print</a>


                <table id="example2" class="table">
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <img src="<?= base_url('images/qrcode/' . $qrcode) ?>" alt="" width="150px">
                                <br><?= $member['no_qr'] ?>

                            </td>
                            <td valign="middle">
                                <img src="<?= base_url('images/foto/' . $member['foto']) ?>" alt="" width="150px">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: <?= $member['nama'] ?></td>
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
                        <tr>
                            <td>Tgl. Daftar</td>
                            <td>: <?= $member['tgl_daftar'] ?></td>
                        </tr>
                        <tr>
                            <td>Tgl. Kedaluarsa</td>
                            <td>: <?= $member['tgl_kedaluarsa'] ?></td>
                        </tr>
                    </tbody>
                </table>

                <?php
                $user = $this->db->get_where('t_user', ['id' => $member['id_user']])->row_array();
                if ($user['level'] == 0) :
                ?>
                    <form action="<?= base_url('Admin/acc_member/' . $member['id_user']) ?>" method="POST">
                        <?php
                        $tgl_daftar     = strtotime($member['tgl_daftar']);
                        $tgl_kedaluarsa = strtotime($member['tgl_kedaluarsa']);
                        $selisih_waktu  = ($tgl_kedaluarsa - $tgl_daftar) / 86400;

                        if ($selisih_waktu > 31) {
                            $paket = 'Regist ' . $member['nama'] . ' Paket Membership 1 Tahun';
                            $biaya = 1500000;
                        } else {
                            $paket = 'Regist ' . $member['nama'] . ' Paket Membership 1 Bulan';
                            $biaya = 150000;
                        }
                        ?>
                        <input type="hidden" name="id_member" value="<?= $member['id_member']; ?>">
                        <input type="hidden" name="nama_member" value="<?= $member['nama']; ?>">
                        <input type="hidden" name="nama_pemasukan" value="<?= $paket; ?>">
                        <input type="hidden" name="jml_pemasukan" value="<?= $biaya; ?>">
                        <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah anda yakin ingin menyetujui Registrasi ini ?')">SETUJUI</button>
                    </form>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>