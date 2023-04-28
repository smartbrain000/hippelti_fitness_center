<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_SESSION['username']) {
            notifikasi('Maaf anda tidak masuk, Silahkan LOGIN terlebih dahulu!', false);
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $data['judul'] = 'Home';
        load_view('dashboard/home_baru', $data);
    }
    public function admin()
    {
        $data['judul'] = 'Admin';
        load_view('dashboard/admin', $data);
    }
    public function profil()
    {
        $data['judul'] = 'Profil';
        load_view('dashboard/profil', $data);
    }
    public function absen()
    {
        $data['judul'] = 'Absen';
        $data['tampil'] = $this->db->query("SELECT nama, tgl_absen, id_absen FROM t_absen a, t_member b
            WHERE a.id_member = b.id_member AND a.id_member='" . $_SESSION['id_member'] . "' ORDER BY tgl_absen DESC
        ")->result_array();
        load_view('dashboard/absen', $data);
    }
    public function booking()
    {
        $data['judul'] = 'Booking';
        load_view('dashboard/booking', $data);
    }
    public function detail_booking($mulai, $selesai)
    {
        // rawlurldecode adalah mengembalikan string dari url-encode
        $mulai = rawurldecode($mulai);
        $selesai = rawurldecode($selesai);
        $data['tampil'] = $this->mydb->tampil_booking($mulai, $selesai);
        $data['judul'] = 'Detail booking';
        load_view('dashboard/detail_booking', $data);
    }
    public function booking_jadwal()
    {
        //LOGIKA BOKING JADWAL
        $mulai = post_input('mulai');
        $selesai = post_input('selesai');
        $data = [
            'id_member' => $_SESSION['id_member'],
            'mulai' => $mulai,
            'selesai' => $selesai,
        ];
        $this->mydb->input_dt($data, 't_booking');
        notifikasi('Data berhasil di booking!', true);
        redirect(base_url('dashboard/booking'));
    }
    public function data_diri()
    {
        $data['judul'] = 'Data Diri';
        $data['member'] = $this->db->get_where('t_member', ['id_member' => $_SESSION['id_member']])->row_array();
        load_view('dashboard/data_diri', $data);
    }
    public function print($id)
    {
        $data['judul'] = 'Detail';
        $data['member'] = $this->db->get_where('t_member', ['id_member' => $id])->row_array();
        $this->load->view('dashboard/print', $data);
    }
    public function del_komentar($id, $id_alat)
    {
        $row = $this->db->get_where('t_komentar', ['id_komentar' => $id]);
        if ($row->num_rows() > 0) {
            if (($_SESSION['level'] == '1') || ($_SESSION['id_member'] == $row['id_member'])) {
                $row = $row->row_array();
                $this->mydb->del(['id_komentar' => $id], 't_komentar');
                notifikasi('Komentar berhasil di dihapus!', true);
            } else {
                notifikasi('Komentar tidak dapat di dihapus!', false);
            }
        } else {
            notifikasi('Komentar tidak di temukan!', false);
        }
        redirect(base_url('post/detail/' . $id_alat));
    }
}
