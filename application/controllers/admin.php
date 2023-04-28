<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
            redirect(base_url('Dashboard'));
        }
    }
    public function index()
    {
        //configurasi waktu
        $tgl = date("Y-m-d");
        $data['judul'] = 'Home';
        if (!empty($_SESSION['id_member_scan'])) {
            $data['member'] = $this->db->get_where('t_member', ['id_member' => $_SESSION['id_member_scan']])->row_array();
        } else {
            $data['member'] = 0;
        }
        $data['tampil'] = $this->mydb->absen_member($tgl);
        $data['member'] = ($data['tampil']['num_rows'] < 1) ? $this->session->unset_userdata('id_member_scan') : $data['member'];
        load_view('Dashboard/home', $data);
    }
    //PROSES SCAN
    public function scan()
    {
        $nilai_qr = $this->input->post('no_qr');

        //configurasi waktu
        $waktu = date("Y-m-d");
        //Mengecek member tersebut terdaftar atau tidak
        $cek_member = $this->db->get_where('t_member', ['no_qr' => $nilai_qr, 'tgl_kedaluarsa >' => $waktu]);
        $member = $cek_member->row_array();

        if ($cek_member->num_rows() > 0) {  //Jika terdaftar, maka :
            //Mengecek member pada tabel absen berdasarkan id_member dan tgl_absen
            $id_member = $member['id_member'];
            $where = ['id_member' => $id_member, 'tgl_absen' => $waktu];
            $cek_absen = $this->db->get_where('t_absen', $where);
            if ($cek_absen->num_rows() > 0) {  //data member ditemukan, maka :
                notifikasi('Anda sudah absen!', true);
            } else { //data absen tidak ditemukan, maka :
                //Melakukan input data pada tabel member
                $data = [
                    'id_member' => $id_member,
                    'tgl_absen' => $waktu
                ];
                $this->db->insert('t_absen', $data);
                $_SESSION['id_member_scan'] = $id_member;
                notifikasi('Member ini terabsen!', true);
            }
        } else { //member Tidak Terdaftar
            notifikasi('Data member kedaluarsa! Jika ingin absen silahkan perpanjang masa aktif anda!', false);
        }
        redirect(base_url('Admin'));
    }
    public function print($id)
    {
        $data['judul'] = 'Detail';
        $data['member'] = $this->db->get_where('t_member', ['id_member' => $id])->row_array();
        $this->load->view('dashboard/print', $data);
    }
    //MEMBER
    public function daftar_member()
    {
        $data['judul'] = 'Member';
        if ((isset($_POST['tgl1'])) && (isset($_POST['tgl2']))) {
            $query = $this->mydb->list_member($_POST['tgl1'], $_POST['tgl2']);
        } else {
            $query = $this->mydb->list_member();
        }
        $data['tampil'] = $query->result_array();
        load_view('Dashboard/member', $data);
    }
    public function del_member($id = null)
    {
        if ($id == null) {
            notifikasi('Data member gagal di dihapus!', false);
        } else {
            $where = ['id_member' => $id];
            $member = $this->db->get_where('t_member', $where);
            if ($member->num_rows() > 0) {
                $member = $member->row_array();
                unlink(FCPATH . 'images/profil/' . $member['foto']);
                $this->mydb->del($where, 't_member');
                notifikasi('Data member berhasil di dihapus!', true);
            } else {
                notifikasi('Data member gagal di dihapus!', false);
            }
        }
        redirect(base_url('admin/daftar_member'));
    }
    public function e_member($id)
    {
        $data['judul'] = 'edit member';
        $data['col'] = $this->db->get_where('t_member', ['id_member' => $id])->row_array();
        load_view('dashboard/e_member', $data);
    }
    public function p_e_member($id)
    {
        $namaMember = ucwords(strtolower($this->input->post('nama')));
        $imageDulu = $this->db->get_where('t_member', ['id_member' => $id])->row_array()['foto'];
        if (!empty($_FILES) && $_FILES['foto']['size'] > 0) {
            $namaImageBaru = date('YmdHis') . '_' . $namaMember;
            $upload = $this->mydb->uploadImage('foto', $namaImageBaru, './images/profil/');
            if ($upload) {
                $cover = $this->upload->data('file_name');
                // print_r(json_encode($this->upload->data()));
                $source_path = "./images/profil/$cover";

                $this->mydb->imageResize('foto', $source_path, 180, 240);
                $this->mydb->update_dt(['id_member' => $id], ['foto' => $cover], 't_member');
                unlink(FCPATH . 'images/profil/' . $imageDulu);
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("admin/e_member"));
            }
        } else {
            $cover = NULL;
        }
        $data = [
            'nama'      => $namaMember,
            'alamat'    => post_input("alamat"),
            'no_telp'   => post_input("no_telp"),
            'status'    => '1',
            'tgl_kedaluarsa' => post_input("tgl_kedaluarsa")

        ];
        $this->mydb->update_dt(['id_member' => $id], $data, 't_member');
        notifikasi('Data berhasil di update!', true);
        redirect(base_url('admin/daftar_member'));
    }
    public function i_member()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'nama masih kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'alamat masih kosong'
        ]);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim', [
            'required' => 'no_telp masih kosong'
        ]);
        $this->form_validation->set_rules('tgl_daftar', 'tgl_daftar', 'required|trim', [
            'required' => 'tgl_daftar masih kosong'
        ]);
        $this->form_validation->set_rules('tgl_kedaluarsa', 'tgl_kedaluarsa', 'required|trim', [
            'required' => 'tgl_kedaluarsa masih kosong'
        ]);
        $this->form_validation->set_rules('input_nominal', 'input_nominal', 'required|trim|numeric', [
            'required' => 'input nominal masih kosong',
            'numeric' => 'nominal hanya di tulis angka'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tambah anggota';
            load_view('dashboard/i_member', $data);
        } else {
            $this->_p_i_member();
        }
    }
    private function _p_i_member()
    {

        $thn_daftar     = date("y");
        //menghitung jumlah member
        $jml_member = $this->db->query('SELECT max(id_member+1) as jml FROM t_member')->row_array()['jml'];
        //mengacak angka dari angka jumlah_member sampai 999
        $acak_angka     = mt_rand($jml_member, 999);
        //membuat NILAI QRCODE
        $nilai_qr     = $thn_daftar . $acak_angka . $jml_member;
        //buat qrcode
        $file_qr = $this->mydb->create_qrcode($nilai_qr);

        //PROSES INPUT TABEL USER
        $data1 = [
            'username'  => $nilai_qr,
            'password'  => md5($nilai_qr),
            'level'     => '2',
        ];
        $this->mydb->input_dt($data1, 't_user');

        $namaMember = ucwords(strtolower($this->input->post('nama')));
        if (!empty($_FILES) && $_FILES['foto']['size'] > 0) {
            $namaImageBaru = date('YmdHis') . '_' . $namaMember;
            $upload = $this->mydb->uploadImage('foto', $namaImageBaru, './images/foto/');
            if ($upload) {
                $foto = $this->upload->data('file_name');
                // print_r(json_encode($this->upload->data()));
                $source_path = "./images/foto/$foto";
                $this->mydb->imageResize('foto', $source_path, 720, 540);
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("admin/i_member"));
            }
        } else {
            $foto = NULL;
        }
        //PROSES INPUT TABEL MEMBER
        $data2 = [
            'id_user' => $this->db->insert_id(),
            'nama' => $namaMember,
            'foto' => $foto,
            'jk' => post_input("jk"),
            'alamat' => post_input("alamat"),
            'no_telp' => post_input("no_telp"),
            'status' => '1',
            'tgl_daftar' => post_input("tgl_daftar"),
            'tgl_kedaluarsa' => post_input("tgl_kedaluarsa"),
            'no_qr' => $nilai_qr,
            'qr_code' => $file_qr

        ];
        $this->mydb->input_dt($data2, 't_member');

        $data3 = [
            'nama_pemasukan' => 'Registrasi',
            'sumber'         => $namaMember,
            'tgl_pemasukan'  => post_input("tgl_daftar"),
            'jml_pemasukan'  => post_input("input_nominal"),
        ];
        $this->mydb->input_dt($data3, 't_pemasukan');
        notifikasi('Data berhasil di simpan!', true);
        redirect(base_url('Admin/daftar_member'));
    }
    public function detail($id)
    {
        $data['judul'] = 'Detail';
        $data['member'] = $this->db->get_where('t_member', ['id_member' => $id])->row_array();
        //membuat file QRCODE
        $data['qrcode'] = $this->mydb->create_qrcode($data['member']['no_qr']);
        load_view('dashboard/detail', $data);
    }
    public function acc_member($id_user)
    {
        $id_member      = $this->input->post('id_member');
        $nama           = $this->input->post('nama_member');
        $nama_pemasukan = $this->input->post('nama_pemasukan');
        $jml_pemasukan  = $this->input->post('jml_pemasukan');

        //INPUT PEMASUKAN
        $data_pemasukan = [
            'nama_pemasukan' => $nama_pemasukan,
            'sumber'         => 'Pengunjung',
            'tgl_pemasukan'  => date('Y-m-d'),
            'jml_pemasukan'  => $jml_pemasukan,
        ];
        $this->mydb->input_dt($data_pemasukan, 't_pemasukan');

        //UPDATE LEVEL USER dari 0 menjadi 2 atau dari t bisa login jadi bisa login tpi sebagai member (level 2)
        $level = ['level' => '2'];
        $this->mydb->update_dt(['id' => $id_user], $level, 't_user');

        notifikasi('Registrasi ' . $nama . ' telah disetujui', true);
        redirect(base_url('Admin/detail/' . $id_member));
    }
    //JADWAL
    public function jadwal()
    {
        $data['judul'] = 'Jadwal';
        $data['tampil'] = $this->db->get('t_booking')->result_array();
        load_view('dashboard/jadwal', $data);
    }
    public function absensi()
    {
        $data['judul'] = 'Absensi';
        if ((isset($_POST['tgl1'])) && (isset($_POST['tgl2']))) {
            $tanggal = "AND tgl_absen>='" . $_POST['tgl1'] . "' AND tgl_absen<='" . $_POST['tgl2'] . "'";
        } else {
            $tanggal = "AND tgl_absen='" . date('Y-m-d') . "'";
        }

        $data['tampil'] = $this->db->query("SELECT nama, tgl_absen, id_absen FROM t_absen a, t_member b
        WHERE a.id_member = b.id_member " . $tanggal . " order by tgl_absen DESC")->result_array();
        load_view('Dashboard/absensi', $data);
    }
    public function del_absensi($id)
    {
        $this->mydb->del(['id_absen' => $id], 't_absen');
        notifikasi('Data berhasil di dihapus!', true);
        redirect(base_url('admin/absensi'));
    }
    public function del_absensi_tgl($tgl)
    {
        $this->mydb->del(['tgl_absen' => $tgl], 't_absen');
        notifikasi('Data berhasil di dihapus!', true);
        redirect(base_url('admin/absensi'));
    }
}
