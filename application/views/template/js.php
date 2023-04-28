<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

<?php if ($_SESSION['level'] == '1') { ?>
    <script type="text/javascript" src="<?= base_url("webcodecam/") ?>js/qrcodelib.js"></script>
    <script type="text/javascript" src="<?= base_url("webcodecam/") ?>js/webcodecamjquery.js"></script>
    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {
                var redirect = '<?= base_url("Admin/scan") ?>';
                $.redirectPost(redirect, {
                    no_qr: result.code //no_qr
                });
            }
        };

        var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
        decoder.buildSelectMenu("select");
        decoder.play();
        $('select').on('change', function() {
            decoder.stop().play();
        });

        // jquery extend function
        $.extend({
            redirectPost: function(location, args) {
                var form = '';
                $.each(args, function(key, value) {
                    form += '<input type="hidden" name="' + key + '" value="' + value + '">';
                });
                $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
            }
        });

        //CONFIGURASI CAMERA
        decoder.options.zoom = 0;
        decoder.options.flipHorizontal = true;
    </script>
<?php } ?>

<script>
    <?php $segment = $this->uri->segment('2');
    if ($segment == 'pemasukan' or $segment == 'pengeluaran') : ?>

        $(document).ready(function() {
            $("#keuangan").DataTable({
                "responsive": true,
                "lengthChange": false,
                "ordering": true,
                "autoWidth": false,
                dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
                        extend: 'pageLength',
                        text: 'Tampilkan Data',
                        className: 'btn btn-info',
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-danger',
                        action: function(e, dt, node, config) {
                            // alert('hyoh cetak ya');
                            setTimeout(function() {
                                window.open("<?= $link_cetak;  ?>", '_blank');
                            }, 2000);
                        }
                    },
                ],
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5', '10', '25', '50', 'Semua Data']
                ],
            });
        });

    <?php else : ?>

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "ordering": true,
                "autoWidth": false,
                "buttons": ["pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            //tabel alat
            $(".alat_fitnes").DataTable({
                "responsive": true,
                "lengthChange": false,
                "ordering": true,
                "autoWidth": false
            });
            $('#example2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "info": false,
                "autoWidth": false,
                "responsive": false
            });
        });

    <?php endif ?>
</script>