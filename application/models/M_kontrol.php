<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class M_Kontrol extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        return $this->db->get_where('data_pimpinan', ["id_pimpinan" => $id])->row();
    }

    public function kontrol($data, $id)
    {
        $this->db->update('sensor', $data, array('id_sensor' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

}