<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function ubah_password()
    {
        $user['user'] = $this->db->get_where('t_user', ['username' => $this->session->userdata('t_user')])->row_array();
        $data['judul'] = "Ubah Password";
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', [
            'required' => 'Password Lama masih kosong'
        ]);
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[6]', [
            'min_length' => 'Password Baru terlalu pendek',
            'required' => 'Password Baru masih kosong'
        ]);
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi', 'required|trim|min_length[6]|matches[password_baru]', [
            'min_length' => 'Konfirmasi Password terlalu pendek',
            'required' => 'Konfirmasi Password masih kosong',
            'matches' => 'Password Baru tidak sama dengan Konfirmasi Password'
        ]);

        if ($this->form_validation->run() == false) {
            load_view('Dashboard/ubah_password', $data);
        } else {
            $current = md5($this->input->post('password_lama'));
            $new = md5($this->input->post('password_baru'));
            if ($current == $user['user']['password']) {
                notifikasi('Password lama salah!', false);
            } else {
                if ($current == $new) {
                    notifikasi('Password baru tidak sama dengan password lama!', false);
                } else {
                    $this->db->set('password', $new);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('t_user');
                    notifikasi('Password berhasil di ubah!', true);
                }
            }
            redirect(base_url("user/ubah_password"));
        }
    }
}
