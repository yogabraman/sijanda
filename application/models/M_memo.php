<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_memo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_memo($data)
    {
        $this->load->database();
        $this->db->insert('tbl_memo', $data);
        return $this->db->insert_id();
    }

    public function update_memo($data, $id_memo)
    {
        $this->db->update('tbl_memo', $data, array('id_memo' => $id_memo));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function hapus_memo($id_memo)
    {
        $this->db->delete('tbl_memo', array('id_memo' => $id_memo));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
