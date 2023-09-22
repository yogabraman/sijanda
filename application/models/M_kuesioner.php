<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_kuesioner extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_kue($data)
    {
        $this->load->database();
        $this->db->insert('tbl_kuesioner', $data);
        return $this->db->insert_id();
    }

    public function update_kue($data, $id_kuesioner)
    {
        $this->db->update('tbl_kuesioner', $data, array('id_kuesioner' => $id_kuesioner));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function hapus_kue($id)
    {
        $this->db->delete('tbl_kuesioner', array('id_kuesioner' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
