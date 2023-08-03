<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		// if($this->session->userdata('status') != "login"){
		//     redirect(site_url("login"));
		// }
	}

	public function index()
	{

		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$waktu = date('H:i');

		// $data['iklan'] = $this->db->query("SELECT * FROM iklan WHERE active = '1'")->result();
		// $data['home'] = $this->db->query("SELECT agenda.*, instansi.*, agenda.created_at as tglusulan FROM agenda JOIN instansi ON agenda.id_instansi=instansi.id_instansi WHERE agenda.tanggal >='$tanggal' AND agenda.status BETWEEN '2' AND '4' AND agenda.sifat_kegiatan='1' ORDER BY agenda.pukul ASC")->result();
		$agenda = $this->db->query("SELECT * FROM `tbl_agenda` WHERE tgl_agenda >= '$tanggal' ORDER by tgl_agenda ASC, waktu_agenda ASC ")->result();
		$data = array(
            'title' => "List Agenda",
            'agenda' => $agenda
        );

		// $this->load->view('layouts/header');
		// $this->load->view('home', $data);
		// $this->load->view('layouts/footer');
        $this->load->view('layouts/header2', $data);
        $this->load->view('home', $data);
        $this->load->view('layouts/footer2', $data);
	}



	public function get_usulan()
	{

		function tgl_indo($tanggal)
		{
			$bulan = array(
				1 =>	'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$pecahkan = explode('-', $tanggal);

			// variabel pecahkan 0 = tanggal
			// variabel pecahkan 1 = bulan
			// variabel pecahkan 2 = tahun

			return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
		}

		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$waktu = date('H:i');

		$data = $this->db->query("SELECT agenda.*, instansi.*, agenda.created_at as tglusulan FROM agenda JOIN instansi ON agenda.id_instansi=instansi.id_instansi WHERE agenda.tanggal >='$tanggal' AND agenda.status BETWEEN '2' AND '4' AND agenda.sifat_kegiatan='1' ORDER BY agenda.pukul ASC")->result();

		foreach ($data as $rows) {

			if ($rows->status == '0') {
				$status = "<div class='badge badge-info'>MENUNGGU APPROVE</div>";
			} elseif ($rows->status == '1') {
				$status = "<div class='badge badge-success'>TERLAKSANA</div>";
			} elseif ($rows->status == '2') {
				$status = "<div class='badge badge-primary'>TERJADWAL</div>";
			} elseif ($rows->status == '3') {
				$status = "<div class='badge badge-warning'>PENDING</div>";
			} elseif ($rows->status == '4') {
				$status = "<div class='badge badge-danger'>BATAL TERLAKSANA</div>";
			}


			$da[] = (object) array(
				'tanggal' => tgl_indo($rows->tanggal),
				'pukul' => $rows->pukul,
				'nama_kegiatan' => $rows->nama_kegiatan,
				'nama_instansi' => $rows->nama_instansi,
				'tempat' => $rows->tempat,
				'usulan_pimpinan' => $rows->usulan_pimpinan,
				'status' => $status
			);
		}

		echo json_encode($da);
	}
}
