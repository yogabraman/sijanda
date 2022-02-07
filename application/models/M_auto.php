<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class M_Auto extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    function search_asal($name){
        $this->db->like('asal_surat', $name , 'both');
        $this->db->order_by('asal_surat', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tbl_surat_masuk')->result();
    }

}