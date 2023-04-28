<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{


    public function index()
    {
        redirect(base_url('Post/home'));
    }

    public function home()

    {
        $jml = $this->db->get('t_alat')->num_rows();
        halaman(site_url('Post/home'), $jml);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['alat'] = $this->mydb->alat($data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $data['judul'] = 'Home';
        $data['file'] = 'home';
        $this->load->view('guest/index', $data);
    }

    public function cari()
    {

        $keyword = $this->input->post('search');
        $post = $this->mydb->hitung_alat($keyword);
        if ($post > 0) {
            $data['judul'] = "Pencarian : " . $keyword;

            $jml = $post;
            halaman(site_url('Post/cari'), $jml);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['alat'] = $this->mydb->cari_alat($data['page'], $keyword);
            $data['pagination'] = $this->pagination->create_links();

            $page = 'cari';
        } else {
            $data['judul'] = "Pencarian Tidak Ditemukan !!!";
            $page = 'notfound';
        }
        $data['file'] = $page;
        $this->load->view('guest/index', $data);
    }

    //

    public function profil()
    {
        $data['judul'] = 'Profil';
        $data['title'] = 'Profil';
        $data['file'] = 'profil';
        $this->load->view('guest/index', $data);
    }

    public function detail($id_alat)
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = '';
            $_SESSION['level'] = '2';
            $_SESSION['id_member'] = '0';
        }
        $data['judul'] = 'Detail';
        $data['title'] = 'Detail';
        $data['file'] = 'detail';
        $data['alat'] = $this->db->get_where('t_alat', ['id_alat' => $id_alat])->row_array();
        $data['komen'] = $this->mydb->all_komen($id_alat);
        $data['tampil'] = $this->db->get_where('t_status_alat', ['id_alat' => $id_alat]);
        $this->load->view('guest/index', $data);
    }

    public function tes($id_alat)
    {
        echo json_encode($this->mydb->all_komen($id_alat));
    }
    public function i_komentar()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = '';
            $_SESSION['id_member'] = '0';
        }
        function anti($text)
        {
            return stripslashes(strip_tags(htmlspecialchars($text, ENT_QUOTES)));
        }
        $id_member = anti($_SESSION['id_member']);
        $komen = anti($_POST["komen"]);
        $id_komen = anti($_POST["id_komentar"]);
        $id_alat = anti($_POST["id_alat"]);

        $data = [
            'id_parent_komentar' => $id_komen,
            'id_alat' => $id_alat,
            'komentar' => $komen,
            'id_member' => $id_member
        ];
        $this->mydb->input_dt($data, 't_komentar');
        notifikasi('Data berhasil di simpan!', true);
        redirect(base_url('post/detail/' . $id_alat));
    }
}
