<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat extends CI_Controller
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
        $data['judul'] = 'Alat Fitness';
        $data['tampil'] = $this->db->get('t_alat')->result_array();
        load_view('alat/index', $data);
    }
    //TAMBAH ALAT
    public function i_alat()
    {
        $this->form_validation->set_rules('nama_alat', 'nama', 'required|trim', [
            'required' => 'nama masih kosong'
        ]);
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim', [
            'required' => 'jumlah masih kosong'
        ]);
        $this->form_validation->set_rules('fungsi', 'fungsi', 'required|trim', [
            'required' => 'fungsi masih kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tambah alat';
            load_view('alat/i_alat', $data);
        } else {
            $up_image = $_FILES['foto']['name'];
            if ($up_image) {
                $config['upload_path'] = './images/alat';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '4000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                } else {
                    notifikasi($this->upload->display_errors(), false);
                    redirect(base_url("Alat/index"));
                }
            }

            //PROSES INPUT
            $data = [
                'nama_alat' => post_input("nama_alat"),
                'foto' => $foto,
                'jumlah' => post_input("jumlah"),
                'fungsi' => post_input("fungsi"),
            ];
            $this->mydb->input_dt($data, 't_alat');
            notifikasi('Data berhasil di simpan!', true);
            redirect(base_url('Alat/index'));
        }
    }
    //EDIT ALAT
    public function e_alat($id)
    {
        $data['judul'] = 'Edit Alat';
        $data['col'] = $this->db->get_where('t_alat', ['id_alat' => $id])->row_array();
        load_view('alat/e_alat', $data);
    }
    public function p_e_alat($id)
    {
        $up_image = $_FILES['foto']['name'];
        if ($up_image) {
            $config['upload_path'] = './images/alat';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '4000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
                $data1 = [
                    'foto' => $foto,
                ];
                $this->mydb->update_dt(['id_alat' => $id], $data1, 't_alat');
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("Alat/index"));
            }
        }
        $data = [
            'nama_alat' => post_input("nama_alat"),
            'jumlah' => post_input("jumlah"),
            'fungsi' => post_input("fungsi"),
        ];
        $this->mydb->update_dt(['id_alat' => $id], $data, 't_alat');
        notifikasi('Data berhasil di update!', true);
        redirect(base_url("Alat/index"));
    }
    //DETAIL ALAT
    public function detail_alat($id_alat)
    {
        $data['judul'] = 'Detail';
        $data['alat'] = $this->db->get_where('t_alat', ['id_alat' => $id_alat])->row_array();
        $data['tampil'] = $this->db->get_where('t_status_alat', ['id_alat' => $id_alat]);
        load_view('alat/detail_alat', $data);
    }
    //TAMBAH STATUS ALAT
    public function i_status_alat($id_alat)
    {
        $this->mydb->tambah_jml_alat($id_alat);
        //PROSES INPUT
        $data = [
            'id_status_alat' => post_input("no_seri_alat"),
            'id_alat' => $id_alat,
            'status_alat' => 'Baik',
        ];
        $this->mydb->input_dt($data, 't_status_alat');
        notifikasi('Data berhasil di simpan!', true);
        redirect(base_url('Alat/detail_alat/' . $id_alat));
    }
    //UBAH STATUS ALAT
    public function status_alat($id_status)
    {
        $alat = $this->db->get_where('t_status_alat', ['id_status_alat' => $id_status])->row_array();
        if ($alat['status_alat'] == 'Baik') {
            $status = 'Rusak';
        } elseif ($alat['status_alat'] == 'Rusak') {
            $status = 'Sedang Diperbaiki';
        } elseif ($alat['status_alat'] == 'Sedang Diperbaiki') {
            $status = 'Baik';
        }
        $data = [
            'id_alat' => $alat['id_alat'],
            'status_alat' => $status,
        ];
        $this->mydb->update_dt(['id_status_alat' => $id_status], $data, 't_status_alat');
        notifikasi('Data alat berhasil di update!', true);
        redirect(base_url('alat/detail_alat/' . $alat['id_alat']));
    }
    //HAPUS STATUS ALAT
    public function del_status_alat($id_status)
    {
        $where = ['id_status_alat' => $id_status];
        $alat = $this->db->get_where('t_status_alat', $where)->row_array();
        $id_alat = $alat['id_alat'];
        $this->mydb->del($where, 't_status_alat');
        $this->mydb->kurang_jml_alat($id_alat);
        notifikasi('Data berhasil di dihapus!', true);
        redirect(base_url('alat/detail_alat/' . $id_alat));
    }
    //HAPUS ALAT
    public function del_alat($id_alat = null)
    {
        if ($id_alat == null) {
            notifikasi('Data alat gagal di dihapus!', false);
        } else {
            $where = ['id_alat' => $id_alat];
            $alat = $this->db->get_where('t_alat', $where);
            if ($alat->num_rows() > 0) {
                $alat = $alat->row_array();
                $this->mydb->del(['id_alat' => $id_alat], 't_alat');
                unlink(FCPATH . 'images/alat/' . $alat['foto']);
                notifikasi('Data Alat berhasil di dihapus!', true);
            } else {
                notifikasi('Data alat gagal di dihapus!', false);
            }
        }
        redirect(base_url('alat/index'));
    }
}
