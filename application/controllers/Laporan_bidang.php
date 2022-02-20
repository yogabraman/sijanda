<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_bidang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		if ($this->session->userdata('status') != "login") {
			redirect('login');
		}
	}

	public function bidang5()
	{
		// $masuk = $this->db->query("SELECT * FROM tbl_surat_masuk ORDER by id_surat DESC")->result();
        // $masuk = $this->m_sm->cek_sm();
		$data = array(
			'title' => "Laporan Bidang 5",
			// 'masuk' => $masuk
		);
        $this->db->reconnect();
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/laporan_bidang/bidang5', $data);
		$this->load->view('admin/layouts/footer', $data);
	}
}
