<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Auto extends CI_Model
{
    function getAsal($title)
    {

        $this->db->like('asal_surat', $title, 'both');
        $this->db->order_by('asal_surat', 'ASC');
        $this->db->group_by('asal_surat');
        $this->db->limit(10);
        return $this->db->get('tbl_surat_masuk')->result();
    }

    function getSurat($title)
    {
        $this->db->like('isi', $title, 'both');
        $this->db->order_by('isi', 'ASC');
        return $this->db->get('tbl_surat_masuk')->result();
    }
}
