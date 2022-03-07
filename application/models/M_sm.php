<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_sm extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cek_sm()
    {
        //set query
        $this->db->from('tbl_surat_masuk');
        $this->db->order_by("tgl_diterima", "DESC");
        $query = $this->db->get(); 
        return $query->result();
    }

    public function add_sm($data)
    {
        $this->load->database();
        $this->db->insert('tbl_surat_masuk', $data);
        return $this->db->insert_id();
    }

    public function add_ag($data)
    {
        $this->load->database();
        $this->db->insert('tbl_agenda', $data);
        return $this->db->insert_id();
    }

    public function _uploadFile($file)
    {
        date_default_timezone_set('Asia/Jakarta');
        $rand = date("YmdHis");

        // echo $file;

        $config['upload_path']          = './assets/suratmasuk/';
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

    public function _uploadPPT($file)
    {
        date_default_timezone_set('Asia/Jakarta');
        $rand = date("YmdHis");

        // echo $file;

        $config['upload_path']          = './assets/agenda/';
        $config['allowed_types']        = 'ppt|pptx';
        $config['file_name']            = $rand."-ppt_".$file;
        $config['overwrite']            = true;
        $config['max_size']             = 102400; // 100MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ($this->upload->do_upload('fileAg1')) {
            return $this->upload->data("file_name");
        }
        return $rand . "-nofile.ppt";
    }

    public function _uploadUnd($file)
    {
        date_default_timezone_set('Asia/Jakarta');
        $rand = date("YmdHis");

        // echo $file;

        $config['upload_path']          = './assets/agenda/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $rand."-und_".$file;
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 10MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ($this->upload->do_upload('fileAg2')) {
            return $this->upload->data("file_name");
        }
        return $rand . "-nofile.pdf";
    }

    public function _uploadFoto($file)
    {
        date_default_timezone_set('Asia/Jakarta');
        $rand = date("YmdHis");

        // echo $file;

        $config['upload_path']          = './assets/agenda/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['file_name']            = $rand."-foto_".$file;
        $config['overwrite']            = true;
        $config['max_size']             = 102400; // 100MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ($this->upload->do_upload('fileAg3')) {
            return $this->upload->data("file_name");
        }
        return $rand . "-nofile.jpg";
    }

    public function _uploadVideo($file)
    {
        date_default_timezone_set('Asia/Jakarta');
        $rand = date("YmdHis");

        // echo $file;

        $config['upload_path']          = './assets/agenda/';
        $config['allowed_types']        = 'mp4';
        $config['file_name']            = $rand."-video_".$file;
        $config['overwrite']            = true;
        $config['max_size']             = 102400; // 100MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ($this->upload->do_upload('fileAg4')) {
            return $this->upload->data("file_name");
        }
        return $rand . "-nofile.mp4";
    }

    public function update_sm($data, $id_surat)
    {
        $this->db->update('tbl_surat_masuk', $data, array('id_surat' => $id_surat));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function update_ag($data, $id_surat)
    {
        $this->db->update('tbl_agenda', $data, array('id_surat' => $id_surat));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function update_agenda($data, $id_agenda)
    {
        $this->db->update('tbl_agenda', $data, array('id_agenda' => $id_agenda));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    
    public function hapus_sm($id)
    {
        $this->db->delete('tbl_surat_masuk', array('id_surat' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function hapus_agenda($id)
    {
        $this->db->delete('tbl_agenda', array('id_agenda' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
