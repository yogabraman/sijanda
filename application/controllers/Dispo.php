<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dispo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_dispo');
        $this->load->library('pdf');

		if ($this->session->userdata('status') != "login") {
			redirect('login');
		}
	}

	public function get_dispo($id)
	{

		$id_user = $this->session->userdata('id_user');
        $id_surat = $this->input->post("suratId");

		$dispo = $this->db->query("SELECT * FROM tbl_disposisi WHERE id_surat ='$id'")->result();

		$data = array(
			'title' => "Disposisi",
			'dispo' => $dispo
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/dispo/v_dispo', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

    public function print_dispo($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');
    
        $data['surat'] = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE id_surat='$id'")->result();
        $data['dispo'] = $this->db->query("SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk USING(id_surat) WHERE tbl_disposisi.id_surat='$id'")->result();

        // $this->pdf->setPaper('A4', 'potrait'); //landscape //potrait
        $this->pdf->filename = "print-disposisi-".$waktu.".pdf";
        $this->pdf->load_view('admin/dispo/print_dispo', $data);
        $this->pdf->render();
    }
}
