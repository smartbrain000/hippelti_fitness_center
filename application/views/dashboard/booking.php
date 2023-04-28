<div class="card">
    <div class="card-header">
        <?php
        $tgl_saat_ini = date('Y-m-d');
        $waktu_saat_ini = detik(date('Y-m-d H:i:s'));
        ?>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th>TANGGAL</th>
                    <th>PAGI-SIANG (08.00-12.00)</th>
                    <th>SIANG-SORE (12.00-16.00)</th>
                    <th>SORE-MALAM (16.00-20.00)</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                for ($t = 1; $t < 8; $t++) {
                    $waktu1 = $tgl_saat_ini . ' 08:00:00';
                    $waktu2 = $tgl_saat_ini . ' 12:00:00';
                    $waktu3 = $tgl_saat_ini . ' 16:00:00';
                    $waktu4 = $tgl_saat_ini . ' 20:00:00';
                    $tgl1 = detik($waktu1);
                    $tgl2 = detik($waktu2);
                    $tgl3 = detik($waktu3);
                    $tgl4 = detik($waktu4);
                ?>
                    <tr>
                        <td align="center">
                            <?= $tgl_saat_ini; ?><br>
                        </td>
                        <td align="center">
                            <?php
                            if (($waktu_saat_ini < $tgl1)) :
                                $cek_boking1 = $this->db->get_where('t_booking', ['mulai' => $waktu1, 'selesai' => $waktu2, 'id_member' => $_SESSION['id_member']]);
                                $jml1 = $cek_boking1->num_rows();
                                if ($jml1 < 1) :
                                    if ($jml1 < 16) :
                            ?>
                                        <form action="<?= base_url('dashboard/booking_jadwal') ?>" method="POST">
                                            <input type="hidden" name="mulai" value='<?= $waktu1 ?>' />
                                            <input type="hidden" name="selesai" value='<?= $waktu2 ?>' />
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Booking
                                            </button>
                                        </form>
                                    <?php else : ?>
                                        <a href="<?= base_url('dashboard/detail_booking/' . $waktu1 . '/' . $waktu2) ?> " class="">
                                            15/15 orang
                                        </a>
                                    <?php
                                    endif;
                                else : ?>
                                    <a href="<?= base_url('dashboard/detail_booking/' . $waktu1 . '/' . $waktu2) ?>" class="btn btn-success btn-sm">Sudah Diboking</a>
                                <?php endif; ?>
                            <?php else : ?>
                                <a href="<?= base_url('dashboard/detail_booking/' . $waktu1 . '/' . $waktu2) ?>" class="btn btn-warning btn-sm">Waktu Boking Habis</a>
                            <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php
                            if (($waktu_saat_ini < $tgl3)) :
                                $cek_boking2 = $this->db->get_where('t_booking', ['mulai' => $waktu2, 'selesai' => $waktu3, 'id_member' => $_SESSION['id_member']]);
                                $jml2 = $cek_boking2->num_rows();
                                if ($jml2 < 1) :
                                    if ($jml2 < 16) :

                            ?>
                                        <form action="<?= base_url('dashboard/booking_jadwal') ?>" method="POST">
                                            <input type="hidden" name="mulai" value='<?= $waktu2 ?>' />
                                            <input type="hidden" name="selesai" value='<?= $waktu3 ?>' />
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Booking
                                            </button>
                                        </form>
                                    <?php else : ?>
                                        <a href="<?= base_url('dashboard/detail_booking/' . $waktu2 . '/' . $waktu3) ?> " class="">
                                            15/15 orang
                                        </a>
                                    <?php
                                    endif;
                                else : ?>
                                    <a href="<?= base_url('dashboard/detail_booking/' . $waktu2 . '/' . $waktu3) ?>" class="btn btn-success btn-sm">Sudah Diboking</a>
                                <?php endif; ?>
                            <?php else : ?>
                                <a href="<?= base_url('dashboard/detail_booking/' . $waktu2 . '/' . $waktu3) ?>" class="btn btn-warning btn-sm">Waktu Boking Habis</a>
                            <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php
                            if ($waktu_saat_ini < $tgl4) :
                                $cek_boking3 = $this->db->get_where('t_booking', ['mulai' => $waktu3, 'selesai' => $waktu4, 'id_member' => $_SESSION['id_member']]);
                                $jml3 = $cek_boking3->num_rows();
                                if ($jml3 < 1) :
                                    if ($jml3 < 16) :

                            ?>
                                        <form action="<?= base_url('dashboard/booking_jadwal') ?>" method="POST">
                                            <input type="hidden" name="mulai" value='<?= $waktu3 ?>' />
                                            <input type="hidden" name="selesai" value='<?= $waktu4 ?>' />
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Booking
                                            </button>
                                        </form>
                                    <?php else : ?>
                                        <a href="<?= base_url('dashboard/detail_booking/' . $waktu3 . '/' . $waktu4) ?> " class="">
                                            15/15 orang
                                        </a>
                                    <?php
                                    endif;
                                else : ?>
                                    <a href="<?= base_url('dashboard/detail_booking/' . $waktu3 . '/' . $waktu4) ?> " class="btn btn-success btn-sm">Sudah Dibooking</a>
                                <?php endif; ?>
                            <?php else : ?>
                                <a href="<?= base_url('dashboard/detail_booking/' . $waktu3 . '/' . $waktu4) ?>" class="btn btn-warning btn-sm">Waktu Booking Habis</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php
                    $tgl_saat_ini++;
                    $no++;
                } ?>
            </tbody>

        </table>
    </div>
</div>