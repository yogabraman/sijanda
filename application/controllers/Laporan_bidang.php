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
		$view = null;
		if (isset($_POST['tampilkan'])) {
			$periode = $this->input->post('periode', true);
			$bulan = $this->input->post('bulan', true);
			$tahun = $this->input->post('tahun', true);
			$this->load->model('M_import_kinerja');
			$view = $this->M_import_kinerja->getdata_bid_5($periode, $bulan, $tahun);
			unset($_SESSION['warning']);
			if (!$view) {
				$this->session->set_flashdata('warning', 'Data Tidak Ditemukan!!');
			}
		}

		$data = array(
			'title' => "Laporan Bidang 5",
			'view' => $view,
		);

		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/laporan_bidang/bidang5', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function importexcel_bid_5()
	{
		if (isset($_POST['importnow'])) {
			$file_excel = $_FILES['importexcel']['name'];
			$ext = pathinfo($file_excel, PATHINFO_EXTENSION);
			if ($ext == 'xls') {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $render->load($_FILES['importexcel']['tmp_name']);
			$data = $spreadsheet->getActiveSheet()->toArray();
			$total = 0;
			foreach ($data as $x => $row) {
				$totaldata = $total + $x;
				if ($x == 0) {
					continue;
				}
				$dataimport = [
					'kd_wilayah' => $row[0],
					'kab_kota' => $row[1],
					'wajib_ktp_el' => $row[2],
					'jml_perekaman' => $row[3],
					'persentase_jml_perekaman' => $row[4],
					'sisa_suket' => $row[5],
					'sisa_prr' => $row[6],
					'sisa_blangko_ktp_el' => $row[7],
					'jml_anak_0_17' => $row[8],
					'jml_cetak_kia' => $row[9],
					'persentase_jml_cetak_kia' => $row[10],
					'jml_anak_0_18' => $row[11],
					'jml_akta_lahir_0_18' => $row[12],
					'persentase_jml_akta_lahir_0_18' => $row[13],
					'penggunaan_kertas_putih_jlh_dok' => $row[14],
					'penggunaan_tte_jlh_dok' => $row[15],
					'layanan_ol_sudah' => $row[16],
					'layanan_ol_belum' => $row[17],
					'layanan_integritas_sudah' => $row[18],
					'layanan_integritas_belum' => $row[19],
					'pks' => $row[20],
					'akses_data' => $row[21],
					'created' => time()
				];
				$this->load->model('M_import_kinerja');
				$this->M_import_kinerja->import_bid_5($dataimport);
			}
			$periode = $this->input->post('periode', true);
			$bulan = $this->input->post('bulan', true);
			$tahun = $this->input->post('tahun', true);
			$jumlah = $totaldata;
			for ($x = 1; $x <= $jumlah; $x++) {
				$datainsert = [
					'periode' => $periode,
					'bulan' => $bulan,
					'tahun' => $tahun
				];
				$this->load->model('M_import_kinerja');
				$this->M_import_kinerja->import_atr_bid_5($datainsert, time());
			}
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan!!');
			redirect('laporan_bidang/bidang5');
		}
	}
}
