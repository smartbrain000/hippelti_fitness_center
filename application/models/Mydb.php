<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mydb extends CI_Model
{

    // INPUT
    public function input_dt($data, $table)
    {
        $this->db->insert($table, $data);
    }
    // UPDATE ATAU EDIT
    public function  update_dt($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // HAPUS
    public function del($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    //MEMBER
    public function list_member($tgl1 = null, $tgl2 = null)
    {
        $this->db->select('a.*, username, level');
        $this->db->from('t_member a')->join('t_user b', '.a.id_user = b.id');
        $result = (($tgl1 != null) && ($tgl2 != null))
            ?   $this->db->where('tgl_daftar >=', $tgl1)->where('tgl_daftar <=', $tgl2)->order_by('tgl_daftar', 'DESC')
            : $this->db->order_by('tgl_daftar', 'DESC');
        return $result->get();
    }
    //ALAT
    public function alat($limit)
    {
        $this->db->from('t_alat')
            ->order_by('id_alat', 'DESC')
            ->limit(6, $limit);
        return $this->db->get()->result_array();
    }

    public function cari_alat($limit, $keyword)
    {
        $this->db->from('t_alat');
        $this->db->like('nama_alat', $keyword)->order_by('nama_alat', 'ASC');
        $this->db->limit(6, $limit);
        return $this->db->get()->result_array();
    }
    public function hitung_alat($keyword)
    {
        $this->db->from('t_alat');
        $this->db->like('nama_alat', $keyword);
        return $this->db->get()->num_rows();
    }
    //KOMENTAR
    public function all_komen($id_alat)
    {
        $output = [];
        $no = 0;

        $query = $this->db
            ->select('a.*, nama, foto')
            ->from('t_komentar a')
            ->join('t_member b', 'a.id_member = b.id_member')
            ->where('a.id_alat', $id_alat)
            ->where('id_parent_komentar', '0')
            ->order_by('a.id_komentar', 'ASC')
            ->get();

        $output['num_rows'] = $query->num_rows();

        foreach ($query->result_array() as $row) {
            $col[$no] = [];
            $col[$no]['id_komentar'] = $row["id_komentar"];
            $col[$no]['id_parent_komentar'] = $row["id_parent_komentar"];
            $col[$no]['id_member'] = $row["id_member"];
            $col[$no]['nama'] = $row["nama"];
            $col[$no]['foto'] = $row["foto"];
            $col[$no]['komentar'] = $row["komentar"];
            $col[$no]['waktu'] = $row["waktu"];

            $query2 = $this->db->select('a.*, nama, foto')
                ->from('t_komentar a')
                ->join('t_member b', 'a.id_member = b.id_member')
                ->where('id_parent_komentar', $row['id_komentar'])
                ->order_by('a.id_komentar', 'ASC')
                ->get();

            $count = $query2->num_rows();
            $no2 = 0;

            if ($count > 0) {
                foreach ($query2->result_array() as $row2) {
                    $col2 = [];
                    $col2['id_komentar']         = $row2["id_komentar"];
                    $col2['id_parent_komentar'] = $row2["id_parent_komentar"];
                    $col2['id_member']             = $row2["id_member"];
                    $col2['nama']                 = $row2["nama"];
                    $col2['foto']                 = $row2["foto"];
                    $col2['komentar']             = $row2["komentar"];
                    $col2['waktu']                 = $row2["waktu"];

                    $col[$no]['child'][$no2]     = $col2;
                    $no2++;
                }
            } else {
                $col[$no]['child'] = 'nothing';
            }

            $output['data'] = $col;
            $no++;
        }

        return $output;
    }
    public function tampil_booking($mulai, $selesai)
    {
        $this->db->select('a.*, nama')
            ->from('t_booking a')
            ->join('t_member b', 'a.id_member = b.id_member');
        $this->db->where('mulai', $mulai)->where('selesai', $selesai)->order_by('mulai', 'ASC');
        return $this->db->get()->result_array();
    }
    //ABSEN
    public function absen_member($tgl)
    {
        $query = $this->db->select('nama, alamat, tgl_absen, id_absen')
            ->from('t_absen a')->join('t_member b', 'a.id_member = b.id_member')
            ->where('tgl_absen', $tgl)
            ->order_by('tgl_absen', 'DESC')->get();
        $data = [];
        $data['result'] = $query->result_array();  //menampilkan seluruh data
        $data['num_rows'] = $query->num_rows();  //menghitung jumlah data
        return $data;
    }
    //UPLOAD & RESIZE IMAGE
    public function uploadImage($fieldname, $filename, $folder)
    {
        $config = [
            'upload_path' => $folder,
            'file_name' => $filename,
            'allowed_types' => 'jpg|png',
            'max_size' => 8000,
            'overwrite' => true,
            'file_ext_tolower' => true,
        ];
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldname)) {
            return $this->upload->data();
        } else {
            // $this->form_validation->add_to_error_array($fieldname, $this->upload->display_errors('', ''));
            return false;
        }
    }
    public function imageResize($fieldname, $source_path, $width, $height)
    {
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'maintain_ratio' => false,
            'width' => $width,
            'height' => $height,
        ];
        $this->load->library('image_lib', $config);
        if ($this->image_lib->resize()) {
            return true;
        } else {
            // $this->form_validation->add_to_error_array($fieldname, $this->image_lib->display_errors('', ''));
            return false;
        }
    }
    //ALAT
    public function tambah_jml_alat($id_alat)
    {
        $where = ['id_alat' => $id_alat];
        $alat = $this->db->get_where('t_alat', $where);
        if ($alat->num_rows() > 0) {
            $jml_lama = $alat->row_array()['jumlah'];
            $jml_sekarang = $jml_lama + 1;
            $this->update_dt($where, ['jumlah' => $jml_sekarang], 't_alat');
        } else {
            return false;
        }
    }
    public function kurang_jml_alat($id_alat)
    {
        $where = ['id_alat' => $id_alat];
        $alat = $this->db->get_where('t_alat', $where);
        if ($alat->num_rows() > 0) {
            $jml_lama = $alat->row_array()['jumlah'];
            $jml_sekarang = $jml_lama - 1;
            $this->update_dt($where, ['jumlah' => $jml_sekarang], 't_alat');
        } else {
            return false;
        }
    }
    //BUAT QRCODE
    public function create_qrcode($nilai_qr)
    {
        $tgl_saat_ini = strtotime(date('Y-m-d H:i:s'));
        $expired = $tgl_saat_ini + 86400;
        $cek_qrcode = $this->db->get_where('t_qrcode', ['nilai' => $nilai_qr]);
        if ($cek_qrcode->num_rows() < 1) {
            //CONFIGURASI QRCODE
            $this->load->library('ciqrcode');
            $config['cacheable'] = true;
            $config['cachedir'] = './images/';
            $config['errorlog'] = './images/';
            $config['imagedir'] = './images/qrcode/';
            $config['quality'] = true;
            $config['size'] = '1024';
            $config['black'] = array(0, 0, 255);
            $config['white'] = array(70, 130, 180);
            $this->ciqrcode->initialize($config);

            //BUAT FILE QRCODE
            $nama_file = random_string('alnum', 40);
            $file_qr = $nama_file . '.png';     //nama file image qrcode
            $params['data'] = $nilai_qr;  //nilai qrcode
            $params['level'] = 'H';
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $file_qr;
            $this->ciqrcode->generate($params);

            //INPUT DATA QRCODE
            $data_input = [
                'qrcode' =>  $file_qr,
                'nilai' => $nilai_qr,
                'expired' => $expired
            ];
            $this->input_dt($data_input, 't_qrcode');

            $qrcode = $file_qr;
        } else {
            $data_update = [
                'expired' => $expired
            ];
            $this->update_dt(['nilai' => $nilai_qr], $data_update, 't_qrcode');
            $qrcode = $cek_qrcode->row_array()['qrcode'];
        }
        return $qrcode;
    }
    //HAPUS QRCODE OTOMATIS
    public function del_qrcode_exp()
    {
        $tgl_saat_ini = strtotime(date('Y-m-d H:i:s'));
        $cek_qrcode = $this->db->get_where('t_qrcode', ['expired <' => $tgl_saat_ini]);
        if ($cek_qrcode->num_rows() > 0) {
            foreach ($cek_qrcode->result() as $r) {
                unlink('./images/qrcode/' . $r->qrcode);
                $this->db->where(['qrcode' => $r->qrcode])->delete('t_qrcode');
            }
        }
    }
}
