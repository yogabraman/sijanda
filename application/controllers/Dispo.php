<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dispo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_dispo');

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
}
