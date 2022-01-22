<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_sm');

		if ($this->session->userdata('status') != "login") {
			redirect('login');
		}
	}

	public function index()
	{

		$id_user = $this->session->userdata('id_user');

		// foreach ($forname as $rows) {
		// 	$nama = "Riwayat Beban ". $rows->nama;
		// }

		$data = array(
			'title' => "Surat Masuk",
			// 'sensor' => $sensor,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/surat_masuk/v_list', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function tambah_sm()
	{

		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$id_user = $this->session->userdata('id_user');

		if (!empty($_FILES["filex"]["name"])) {

			$new = $this->input->post("filex");
			$files = $this->m_sm->_uploadFile($new);
		} else {
			$files = "";
		}

		// print_r($new);
		// exit();

		$data_surat = array(
			'no_agenda' => $this->input->post('no_agenda'),
			'no_surat' => $this->input->post('no_surat'),
			'asal_surat' => $this->input->post('asal_surat'),
			'isi' => $this->input->post('isi'),
			'tgl_surat' => $this->input->post('tgl_surat'),
			'tgl_diterima' => $waktu,
			'file' => $files,
			'keterangan' => "",
			'status_dispo' => 0,
			'tipe_surat' => $this->input->post('tipe_surat'),
			'id_user' => $id_user
		);

		$result = $this->m_sm->add_sm($data_surat);

		if ($result) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan!!.');
			redirect(site_url('surat_masuk/list'));
		} else {
			$this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
			redirect(site_url('surat_masuk/list'));
		}
	}

	public function list()
	{

		$masuk = $this->db->query("SELECT * FROM tbl_surat_masuk ORDER by tgl_diterima DESC")->result();
		$data = array(
			'title' => "List Surat Masuk",
			'masuk' => $masuk,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/surat_masuk/v_list', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function cetak()
	{

		// $sensor2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2")->result();
		$data = array(
			'title' => "Cetak Surat Masuk",
			// 'sensor2' => $sensor2,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/surat_masuk/v_cetak', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function cetakbydate()
	{

		// $sensor2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2")->result();
		$data = array(
			'title' => "Riwayat Beban 2",
			// 'sensor2' => $sensor2,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/riwayat/v_beban2', $data);
		$this->load->view('admin/layouts/footer', $data);
	}
}
