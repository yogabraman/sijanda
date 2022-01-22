<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_sm extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cek_sm($table, $where)
    {
        //set query
        return $this->db->get_where($table, $where);
    }

    public function update_sm($data, $username)
    {
        $this->db->update('tbl_surat_masuk', $data, array('username' => $username));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function add_sm($data)
    {
        $this->load->database();
        $this->db->insert('tbl_surat_masuk', $data);
        return $this->db->insert_id();
    }

    public function _uploadFile($file)
    {
        $config['upload_path']          = './assets/surat_masuk/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        // $config['file_name']            = $gambar;
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 10MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filex')) {
            return "assets/surat_masuk/" . $this->upload->data("file_name");
        }
        return "/assets/surat_masuk/noimage.png";
    }
}
