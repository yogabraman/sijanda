<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_import_kinerja extends CI_Model
{
    public function getdata_bid_5($periode, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_laporan_kinerja_bid_5');
        $this->db->where('periode', $periode);
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->order_by('kd_wilayah', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function import_bid_5($dataimport)
    {
        $data = count($dataimport);
        if ($data > 0) {
            $this->db->replace('tbl_laporan_kinerja_bid_5', $dataimport);
        } else {
            $this->db->insert('tbl_laporan_kinerja_bid_5', $dataimport);
        }
    }

    public function import_atr_bid_5($datainsert, $time)
    {
        $this->db->where('created', $time);
        $this->db->update('tbl_laporan_kinerja_bid_5', $datainsert);
    }
}
