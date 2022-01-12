<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class M_User extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        return $this->db->get_where('data_pimpinan', ["id_pimpinan" => $id])->row();
    }

    public function update_user($data, $id)
    {
        $this->db->update('user', $data, array('id_user' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function simpan_user($data)
    {
        $this->load->database();
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update_kamar($data, $id)
    {
        $this->db->update('sensor', $data, array('id_sensor' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function updel_kamar($data, $id)
    {
        $this->db->update('sensor', $data, array('id_user' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function delete_user($id)
    {
        // $this->_deleteImage($id);
        $this->db->delete('users', array('id_user' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

}