<?php
defined('BASEPATH') or exit('No direct script access allowed');

class keuangan_model extends CI_Model
{
    public function get_pemasukan($jenis, $dari = null, $sampai = null)
    {
        $this->db->from('t_pemasukan');
        if ($jenis != 'Semua') {
            $this->db->where('jenis', $jenis);
        }
        $this->db->order_by('tgl_pemasukan', 'DESC');
        if (($dari != null) && ($sampai != null)) {
            $this->db->where('tgl_pemasukan >=', $dari)->where('tgl_pemasukan <=', $sampai);
            return $this->db->get()->result_array();
        } else {
            return $this->db->get()->result_array();
        }
    }
    public function get_pengeluaran($dari = null, $sampai = null)
    {
        if (($dari != null) && ($sampai != null)) {
            $where = ['tgl_pengeluaran>=' => $dari, 'tgl_pengeluaran<=' => $sampai];
            return $this->db->order_by('tgl_pengeluaran', 'DESC')->get('t_pengeluaran', $where)->result_array();
        } else {
            return $this->db->order_by('tgl_pengeluaran', 'DESC')->get('t_pengeluaran')->result_array();
        }
    }
    public function get_laba_rugi($dari = null, $sampai = null)
    // public function get_laba_rugi($jenis = 'Semua', $dari = null, $sampai = null)
    {
        // if ($jenis == 'Semua') {
        $where1 = ['tgl_pemasukan>=' => $dari, 'tgl_pemasukan<=' => $sampai];
        // } else {
        // $where1 = ['jenis' => $jenis, 'tgl_pemasukan>=' => $dari, 'tgl_pemasukan<=' => $sampai];
        // }
        $where2 = ['tgl_pengeluaran>=' => $dari, 'tgl_pengeluaran<=' => $sampai];
        $data = [];
        $data['pemasukan'] = $this->db
            ->order_by('tgl_pemasukan', 'ASC')
            ->order_by('id_pemasukan', 'ASC')
            ->get_where('t_pemasukan', $where1)->result_array();
        $data['pengeluaran'] = $this->db->order_by('tgl_pengeluaran', 'ASC')
            ->order_by('id_pengeluaran', 'ASC')
            ->get_where('t_pengeluaran', $where2)->result_array();
        return $data;
    }
}
