<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class M_Pulsa extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        return $this->db->get_where('data_pimpinan', ["id_pimpinan" => $id])->row();
    }

    public function isi_pulsa($data, $id)
    {
        $this->db->update('sensor', $data, array('id_sensor' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function simpan_token($data)
    {
        $this->load->database();
        $this->db->insert('token', $data);
        return $this->db->insert_id();
    }

    public function update_token($data, $id)
    {
        $this->db->update('token', $data, array('id_token' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

}