<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_pegawai($data)
    {
        $this->load->database();
        $this->db->insert('tbl_pegawai', $data);
        return $this->db->insert_id();
    }

    public function update_pegawai($data, $id)
    {
        $this->db->update('tbl_pegawai', $data, array('id_pegawai' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    
    public function hapus_pegawai($id)
    {
        $this->db->delete('tbl_pegawai', array('id_pegawai' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
