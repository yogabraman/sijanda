<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Auto extends CI_Model
{
    function getAsal($title)
    {

        $this->db->like('pegawai', $title, 'both');
        $this->db->order_by('pegawai', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tbl_pegawai')->result();
    }
}
