<?php
defined('BASEPATH') or exit('No direct script access allowed');

class keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_SESSION['username']) {
            notifikasi('Maaf anda tidak masuk, Silahkan LOGIN terlebih dahulu!', false);
            redirect(base_url('auth'));
        }
        if ($_SESSION['level'] != '1') {
            notifikasi('Maaf anda bukan admin!', false);
            redirect(base_url('member'));
        }
        $this->load->model('keuangan_model', 'keuangan');
    }
    public function pemasukan()
    {
        $jenis = ($this->uri->segment('3')) ? $this->uri->segment('3') : 'Semua';
        $data['jenis'] = ($jenis != 'Semua') ? $jenis : 'Semua';
        $data['judul'] = 'Pemasukan';
        if ((isset($_POST['tgl1'])) && (isset($_POST['tgl2']))) {
            $data['tampil'] = $this->keuangan->get_pemasukan($jenis, $_POST['tgl1'], $_POST['tgl2']);
            $data['link_cetak'] = base_url('keuangan/cetak_pemasukan/' . $jenis . '/' . $_POST['tgl1'] . '/' . $_POST['tgl2']);
        } else {
            $data['tampil'] = $this->keuangan->get_pemasukan($jenis);
            $data['link_cetak'] = base_url('keuangan/cetak_pemasukan/' . $jenis);
        }
        load_view('keuangan/pemasukan', $data);
    }
    public function pengeluaran()
    {
        $data['judul'] = 'Pengeluaran';
        if ((isset($_POST['tgl1'])) && (isset($_POST['tgl2']))) {
            $data['tampil'] = $this->keuangan->get_pengeluaran($_POST['tgl1'], $_POST['tgl2']);
            $data['link_cetak'] = base_url('keuangan/cetak_pengeluaran/' . $_POST['tgl1'] . '/' . $_POST['tgl2']);
        } else {
            $data['tampil'] = $this->keuangan->get_pengeluaran();
            $data['link_cetak'] = base_url('keuangan/cetak_pengeluaran');
        }

        load_view('keuangan/pengeluaran', $data);
    }
    public function laba_rugi()
    {
        $data['judul'] = 'Laba Rugi';
        if ((isset($_POST['tgl1'])) && (isset($_POST['tgl2']))) {
            $laba_rugi = $this->keuangan->get_laba_rugi('Semua', $_POST['tgl1'], $_POST['tgl2']);
            $data['pemasukan']   = $laba_rugi['pemasukan'];
            $data['pengeluaran'] = $laba_rugi['pengeluaran'];
            $data['tgl'] = $_POST['tgl1'] . '/' . $_POST['tgl2'];
        } else {
            $data['pemasukan'] =  0;
            $data['pengeluaran'] =  0;
            $data['tgl'] = 0;
        }

        load_view('keuangan/laba_rugi', $data);
    }
    /// PRINT
    public function print($tgl1, $tgl2)
    {
        $data['judul'] = 'Cetak Laba';
        $tgl1 = rawurldecode($tgl1);
        $tgl2 = rawurldecode($tgl2);
        $laba_rugi = $this->keuangan->get_laba_rugi($tgl1, $tgl2);
        $data['pemasukan']   = $laba_rugi['pemasukan'];
        $data['pengeluaran'] = $laba_rugi['pengeluaran'];
        $data['priode'] =  date_id($tgl1) . ' - ' . date_id($tgl2);
        $this->load->view('keuangan/cetak_laba', $data);
    }
    public function cetak_pemasukan($jenis, $tgl1 = null, $tgl2 = null)
    {
        $data['judul'] = 'Cetak Pemasukan';
        if (($tgl1 != null) && ($tgl2 != null)) {
            $tgl1 = rawurldecode($tgl1);
            $tgl2 = rawurldecode($tgl2);
            $laba_rugi = $this->keuangan->get_laba_rugi($jenis, $tgl1, $tgl2);
            $data['pemasukan']   = $laba_rugi['pemasukan'];
            $data['periode'] =  '(' . date_id($tgl1) . ' - ' . date_id($tgl2) . ')';
        } else {
            $data['pemasukan'] = $this->keuangan->get_pemasukan($jenis);
            $data['periode'] = '';
        }
        $this->load->view('keuangan/cetak_pemasukan', $data);
    }
    public function cetak_pengeluaran($tgl1, $tgl2)
    {
        $data['judul'] = 'Cetak Pengeluaran';
        if (($tgl1 != null) && ($tgl2 != null)) {
            $tgl1 = rawurldecode($tgl1);
            $tgl2 = rawurldecode($tgl2);
            $laba_rugi = $this->keuangan->get_laba_rugi($tgl1, $tgl2);
            $data['pengeluaran']   = $laba_rugi['pengeluaran'];
            $data['periode'] =  '(' . date_id($tgl1) . ' - ' . date_id($tgl2) . ')';
        } else {
            $data['pengeluaran'] = $this->keuangan->get_pengeluaran();
            $data['priode'] =  '';
        }
        $this->load->view('keuangan/cetak_pengeluaran', $data);
    }
    //INPUT, EDIT, DELETE
    public function i_pemasukan()
    {
        $this->form_validation->set_rules('nama_pemasukan', 'nama_pemasukan', 'required|trim', [
            'required' => 'nama pemasukan masih kosong'
        ]);
        $this->form_validation->set_rules('sumber', 'sumber', 'required|trim', [
            'required' => 'sumber masih kosong'
        ]);

        $this->form_validation->set_rules('tgl_pemasukan', 'tgl_pemasukan', 'required|trim', [
            'required' => 'tgl pemasukan masih kosong'
        ]);
        $this->form_validation->set_rules('jml_pemasukan', 'jml_pemasukan', 'required|trim', [
            'required' => 'jml pemasukan masih kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tambah Pemasukan';
            load_view('keuangan/i_pemasukan', $data);
        } else {
            //PROSES INPUT TABEL PEMASUKAN
            $data = [
                'nama_pemasukan' => post_input("nama_pemasukan"),
                'sumber'  => post_input("sumber"),
                'tgl_pemasukan' => post_input("tgl_pemasukan"),
                'jml_pemasukan' => post_input("jml_pemasukan"),
            ];
            $this->mydb->input_dt($data, 't_pemasukan');
            notifikasi('Data berhasil di simpan!', true);
            redirect(base_url('keuangan/pemasukan'));
        }
    }
    public function e_pemasukan($id)
    {
        $data['judul'] = 'Edit Pemasukan';
        $data['col'] = $this->db->get_where('t_pemasukan', ['id_pemasukan' => $id])->row_array();
        load_view('keuangan/e_pemasukan', $data);
    }
    public function p_e_pemasukan($id)
    {
        $data = [
            'tgl_pemasukan'  => post_input("tgl_pemasukan"),
            'sumber'         => post_input("sumber"),
            'nama_pemasukan' => post_input("nama_pemasukan"),
            'jml_pemasukan'  => post_input("jml_pemasukan"),
        ];
        $this->mydb->update_dt(['id_pemasukan' => $id], $data, 't_pemasukan');
        notifikasi('Data berhasil di update!', true);
        redirect(base_url('keuangan/pemasukan'));
    }
    public function del_pemasukan($id)
    {
        $this->mydb->del(['id_pemasukan' => $id], 't_pemasukan');
        notifikasi('Data berhasil di dihapus!', true);
        redirect(base_url('keuangan/pemasukan'));
    }
    public function i_pengeluaran()
    {
        $this->form_validation->set_rules('tgl_pengeluaran', 'tgl_pengeluaran', 'required|trim', [
            'required' => 'tgl pengeluaran masih kosong'
        ]);
        $this->form_validation->set_rules('nama_pengeluaran', 'nama_pengeluaran', 'required|trim', [
            'required' => 'nama pengeluaran masih kosong'
        ]);
        $this->form_validation->set_rules('jml_pengeluaran', 'jml_pengeluaran', 'required|trim', [
            'required' => 'jml pengeluaran masih kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tambah pengeluaran';
            load_view('keuangan/i_pengeluaran', $data);
        } else {
            //PROSES INPUT TABEL PENGELUARAN
            $data = [
                'tgl_pengeluaran' => post_input("tgl_pengeluaran"),
                'nama_pengeluaran' => post_input("nama_pengeluaran"),
                'jml_pengeluaran' => post_input("jml_pengeluaran"),
            ];
            $this->mydb->input_dt($data, 't_pengeluaran');
            notifikasi('Data berhasil di simpan!', true);
            redirect(base_url('keuangan/pengeluaran'));
        }
    }
    public function e_pengeluaran($id)
    {
        $data['judul'] = 'Edit Pengeluaran';
        $data['col'] = $this->db->get_where('t_pengeluaran', ['id_pengeluaran' => $id])->row_array();
        load_view('keuangan/e_pengeluaran', $data);
    }
    public function p_e_pengeluaran($id)
    {
        $data = [
            'tgl_pengeluaran' => post_input("tgl_pengeluaran"),
            'nama_pengeluaran' => post_input("nama_pengeluaran"),
            'jml_pengeluaran' => post_input("jml_pengeluaran"),

        ];
        $this->mydb->update_dt(['id_pengeluaran' => $id], $data, 't_pengeluaran');
        notifikasi('Data berhasil di update!', true);
        redirect(base_url('keuangan/pengeluaran'));
    }
    public function del_pengeluaran($id)
    {
        $this->mydb->del(['id_pengeluaran' => $id], 't_pengeluaran');
        notifikasi('Data berhasil di dihapus!', true);
        redirect(base_url('keuangan/pengeluaran'));
    }
}
