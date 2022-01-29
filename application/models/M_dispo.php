<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_dispo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cek_dispo($table, $where)
    {
        //set query
        return $this->db->get_where($table, $where);
    }

    public function update_dispo($data, $id_dispo)
    {
        $this->db->update('tbl_disposisi', $data, array('id_dispo' => $id_dispo));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function add_dispo($data)
    {
        $this->load->database();
        $this->db->insert('tbl_disposisi', $data);
        return $this->db->insert_id();
    }

}
