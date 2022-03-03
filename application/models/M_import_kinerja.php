<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_import_kinerja extends CI_Model
{
    public function getdata_bid_5()
    {
        $this->db->select('*');
        $this->db->from('tbl_laporan_kinerja_bid_5');
        $this->db->where('periode', 1);
        $this->db->where('bulan', strtolower(date('F')));
        $this->db->where('tahun', date('Y'));
        $query = $this->db->get();
        return $query->result();
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
