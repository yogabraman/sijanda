<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_sk extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_sk($data)
    {
        $this->load->database();
        $this->db->insert('tbl_surat_keluar', $data);
        return $this->db->insert_id();
    }

    public function _uploadFileSK($file)
    {
        date_default_timezone_set('Asia/Jakarta');
        $rand = date("YmdHis");

        // echo $file;

        $config['upload_path']          = './assets/suratkeluar/';
        $config['allowed_types']        = 'pdf|gif|jpg|png';
        $config['file_name']            = $rand."-".$file;
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 10MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ($this->upload->do_upload('filex')) {
            return $this->upload->data("file_name");
        }
        return $rand . "-noimage.png";
    }

    public function update_sk($data, $id_surat)
    {
        $this->db->update('tbl_surat_keluar', $data, array('id_surat' => $id_surat));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    
    public function hapus_sk($id)
    {
        $this->db->delete('tbl_surat_keluar', array('id_surat' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
