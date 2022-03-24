<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_spt extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_spt($data)
    {
        $this->load->database();
        $this->db->insert('tbl_spt', $data);
        return $this->db->insert_id();
    }
    
    public function add_spt_pgw($data)
    {
        $this->load->database();
        $this->db->insert('tbl_spt_pegawai', $data);
        return $this->db->insert_id();
    }

    public function _uploadSpt($file)
    {
        date_default_timezone_set('Asia/Jakarta');
        $rand = date("YmdHis");

        // echo $file;

        $config['upload_path']          = './assets/spt/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $rand."-spt_".$file;
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 10MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ($this->upload->do_upload('filex')) {
            return $this->upload->data("file_name");
        }
        return $rand . "-no_spt.pdf";
    }

    public function update_spt($data, $id)
    {
        $this->db->update('tbl_spt', $data, array('id_spt' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    
    public function hapus_spt($id)
    {
        $this->db->delete('tbl_spt', array('id_spt' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    
    public function hapus_spt_pgw($id)
    {
        $this->db->delete('tbl_spt_pegawai', array('id_spt' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
