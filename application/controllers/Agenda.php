<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
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
			'title' => "Agenda",
			// 'sensor' => $sensor,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/riwayat/v_riwayat', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function list2()
	{

		$agenda = $this->db->query("SELECT * FROM tbl_agenda ORDER by tgl_agenda DESC, waktu_agenda DESC ")->result();
		$data = array(
			'title' => "List Agenda",
			'agenda' => $agenda,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/agenda/v_list2', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function add_agenda()
	{

		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$id_user = $this->session->userdata('id_user');
		$bidang = json_encode($this->input->post('bidang'));

		$data = array(
			'asal' => $this->input->post('dari'),
			'isi' => $this->input->post('isi'),
			'tgl_agenda' => $this->input->post('tgl_acara'),
			'waktu_agenda' => $this->input->post('wkt_acara'),
			'tempat' => $this->input->post('tempat'),
			'dispo' => $bidang,
			'id_user' => $id_user
		);

		$result = $this->m_sm->add_ag($data);

		if ($result) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan!!.');
			redirect(site_url('agenda/list2'));
		} else {
			$this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
			redirect(site_url('sagenda/list2'));
		}
	}

	public function cetak2()
	{

		// $sensor2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2")->result();
		$data = array(
			'title' => "Cetak Agenda",
			// 'sensor2' => $sensor2,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/agenda/v_cetak2', $data);
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
		$this->load->view('admin/agenda/v_cetak2', $data);
		$this->load->view('admin/layouts/footer', $data);
	}
}
