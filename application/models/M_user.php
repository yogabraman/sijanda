<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class M_User extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function update_user($data, $id)
    {
        $this->db->update('tbl_user', $data, array('id_user' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function simpan_user($data)
    {
        $this->load->database();
        $this->db->insert('tbl_user', $data);
        return $this->db->insert_id();
    }

    public function delete_user($id)
    {
        // $this->_deleteImage($id);
        $this->db->delete('tbl_user', array('id_user' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

}