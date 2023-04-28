<?php
defined('BASEPATH') or exit('No direct script access allowed');

function load_view($file, $data)
{
    $ieu = get_instance();
    $data['file'] = $file;
    $ieu->load->view('template/index', $data);
}

function halaman($base_url, $total_data)
{
    $ieu = get_instance();
    $config['base_url']   = $base_url;
    $config['total_rows'] = $total_data;
    $config['per_page']   = 6;
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);
    //konfigurasi tampilan pagination
    $config['full_tag_open']  = '<nav><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['first_tag_open']  = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link']      = '';
    $config['last_tag_open']  = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['prev_link']      = 'Sebelumnya';
    $config['prev_tag_open']  = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['next_link']     = 'Selanjutnya';
    $config['next_tag_open']  = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['cur_tag_open']  = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['num_tag_open']  = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    //kirim hasil konfigurasi 
    $ieu->pagination->initialize($config);
}

function post_input($data)
{
    $ieu = get_instance();
    return $ieu->input->post($data);
}

function notifikasi($text, $type)
{
    $ieu = get_instance();
    if ($type == true) {
        $warna = 'success';
    } else {
        $warna = 'danger';
    }
    $ieu->session->set_flashdata('message', '<div class="alert alert-' . $warna . '" role="alert">' . $text . '</div>');
}

function detik($time)
{
    $parsed = date_parse($time);
    $detik = ($parsed['year'] * 31104000) + ($parsed['month'] * 2592000) + ($parsed['day'] * 86400) + ($parsed['hour'] * 3600) + ($parsed['minute'] * 60) + ($parsed['second']);
    return $detik;
}
function date_id($date)
{
    $BulanIndo = array(
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    );
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
    return $result;
}
