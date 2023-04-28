<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/index');
    }

    public function registrasi()
    {
        $data['judul'] = 'Registrasi';
        $this->load->view('auth/registrasi', $data);
    }

    //LOGIN
    public function login()
    {
        $username =  $this->input->post('username');
        $password =  $this->input->post('password');

        $cek_user = $this->db->get_where('t_user', ['username' => $username, 'password' => md5($password)]);

        if ($cek_user->num_rows() > 0) {
            $user = $cek_user->row_array();

            if ($user['level'] == 0) {
                notifikasi('Registrasi Anda Belum Disetujui Admin!', false);
                redirect(base_url('auth'));
            }

            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $_SESSION['username']   = $user['username'];
            $_SESSION['level']      = $user['level'];

            $_SESSION['id_member']  = '1';
            $_SESSION['title']      = 'Admin';
            $_SESSION['foto']       = 'irna.jpg';

            $this->mydb->del_qrcode_exp();

            if ($user['level'] == 2) {
                $member = $this->db->get_where('t_member', ['id_user' => $user['id']])->row_array();
                $_SESSION['id_member'] = $member['id_member'];
                $_SESSION['title'] = $member['nama'];
                $_SESSION['foto'] = $member['foto'];
                redirect(base_url('Dashboard'));
            }
            redirect(base_url('Admin'));
        } else {
            notifikasi('username / password salah!', false);
            redirect(base_url('auth'));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('title');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('image');
        $this->session->unset_userdata('id_member');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('csrf_token');

        notifikasi('BERHASIL LOGOUT!', true);
        redirect(base_url('auth'));
    }
}
