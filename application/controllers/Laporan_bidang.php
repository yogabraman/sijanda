<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
					'created' => date('Y-m-d H')
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
				$this->M_import_kinerja->import_atr_bid_5($datainsert, date('Y-m-d H'));
			}
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan!!');
			redirect('laporan_bidang/bidang5');
		}
	}

	function template_bid_5()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'kd_wilayah');
		$sheet->setCellValue('B1', 'kab_kota');
		$sheet->setCellValue('C1', 'wajib_ktp_el');
		$sheet->setCellValue('D1', 'jml_perekaman');
		$sheet->setCellValue('E1', 'persentase_jml_perekaman');
		$sheet->setCellValue('F1', 'sisa_suket');
		$sheet->setCellValue('G1', 'sisa_prr');
		$sheet->setCellValue('H1', 'sisa_blangko_ktp_el');
		$sheet->setCellValue('I1', 'jml_anak_0_17');
		$sheet->setCellValue('J1', 'jml_cetak_kia');
		$sheet->setCellValue('K1', 'persentase_jml_cetak_kia');
		$sheet->setCellValue('L1', 'jml_anak_0_18');
		$sheet->setCellValue('M1', 'jml_akta_lahir_0_18');
		$sheet->setCellValue('N1', 'persentase_jml_akta_lahir_0_18');
		$sheet->setCellValue('O1', 'penggunaan_kertas_putih_jlh_dok');
		$sheet->setCellValue('P1', 'penggunaan_tte_jlh_dok');
		$sheet->setCellValue('Q1', 'layanan_ol_sudah');
		$sheet->setCellValue('R1', 'layanan_ol_belum');
		$sheet->setCellValue('S1', 'layanan_integritas_sudah');
		$sheet->setCellValue('T1', 'layanan_integritas_belum');
		$sheet->setCellValue('U1', 'pks');
		$sheet->setCellValue('V1', 'akses_data');

		$spreadsheet->getActiveSheet()->getStyle('A1:V1')
			->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

		$styleArray = [
			'font' => [
				'bold' => true,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];

		$spreadsheet->getActiveSheet()->getStyle('A1:V1')->applyFromArray($styleArray);

		$sheet->setCellValue('A2', '3301');
		$sheet->setCellValue('A3', '3302');
		$sheet->setCellValue('A4', '3303');
		$sheet->setCellValue('A5', '3304');
		$sheet->setCellValue('A6', '3305');
		$sheet->setCellValue('A7', '3306');
		$sheet->setCellValue('A8', '3307');
		$sheet->setCellValue('A9', '3308');
		$sheet->setCellValue('A10', '3309');
		$sheet->setCellValue('A11', '3310');
		$sheet->setCellValue('A12', '3311');
		$sheet->setCellValue('A13', '3312');
		$sheet->setCellValue('A14', '3313');
		$sheet->setCellValue('A15', '3314');
		$sheet->setCellValue('A16', '3315');
		$sheet->setCellValue('A17', '3316');
		$sheet->setCellValue('A18', '3317');
		$sheet->setCellValue('A19', '3318');
		$sheet->setCellValue('A20', '3319');
		$sheet->setCellValue('A21', '3320');
		$sheet->setCellValue('A22', '3321');
		$sheet->setCellValue('A23', '3322');
		$sheet->setCellValue('A24', '3323');
		$sheet->setCellValue('A25', '3324');
		$sheet->setCellValue('A26', '3325');
		$sheet->setCellValue('A27', '3326');
		$sheet->setCellValue('A28', '3327');
		$sheet->setCellValue('A29', '3328');
		$sheet->setCellValue('A30', '3329');
		$sheet->setCellValue('A31', '3371');
		$sheet->setCellValue('A32', '3372');
		$sheet->setCellValue('A33', '3373');
		$sheet->setCellValue('A34', '3374');
		$sheet->setCellValue('A35', '3375');
		$sheet->setCellValue('A36', '3376');
		$sheet->setCellValue('B2', 'KAB. CILACAP');
		$sheet->setCellValue('B3', 'KAB. BANYUMAS');
		$sheet->setCellValue('B4', 'KAB. PURBALINGGA');
		$sheet->setCellValue('B5', 'KAB. BANJARNEGARA');
		$sheet->setCellValue('B6', 'KAB. KEBUMEN');
		$sheet->setCellValue('B7', 'KAB. PURWOREJO');
		$sheet->setCellValue('B8', 'KAB. WONOSOBO');
		$sheet->setCellValue('B9', 'KAB. MAGELANG');
		$sheet->setCellValue('B10', 'KAB. BOYOLALI');
		$sheet->setCellValue('B11', 'KAB. KLATEN');
		$sheet->setCellValue('B12', 'KAB. SUKOHARJO');
		$sheet->setCellValue('B13', 'KAB. WONOGIRI');
		$sheet->setCellValue('B14', 'KAB. KARANGANYAR');
		$sheet->setCellValue('B15', 'KAB. SRAGEN');
		$sheet->setCellValue('B16', 'KAB. GROBOGAN');
		$sheet->setCellValue('B17', 'KAB. BLORA');
		$sheet->setCellValue('B18', 'KAB. REMBANG');
		$sheet->setCellValue('B19', 'KAB. PATI');
		$sheet->setCellValue('B20', 'KAB. KUDUS');
		$sheet->setCellValue('B21', 'KAB. JEPARA');
		$sheet->setCellValue('B22', 'KAB. DEMAK');
		$sheet->setCellValue('B23', 'KAB. SEMARANG');
		$sheet->setCellValue('B24', 'KAB. TEMANGGUNG');
		$sheet->setCellValue('B25', 'KAB. KENDAL');
		$sheet->setCellValue('B26', 'KAB. BATANG');
		$sheet->setCellValue('B27', 'KAB. PEKALONGAN');
		$sheet->setCellValue('B28', 'KAB. PEMALANG');
		$sheet->setCellValue('B29', 'KAB. TEGAL');
		$sheet->setCellValue('B30', 'KAB. BREBES');
		$sheet->setCellValue('B31', 'KOTA MAGELANG');
		$sheet->setCellValue('B32', 'KOTA SURAKARTA');
		$sheet->setCellValue('B33', 'KOTA SALATIGA');
		$sheet->setCellValue('B34', 'KOTA SEMARANG');
		$sheet->setCellValue('B35', 'KOTA PEKALONGAN');
		$sheet->setCellValue('B36', 'KOTA TEGAL');

		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);

		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];
		$sheet->getStyle('A1:V36')->applyFromArray($styleArray);

		$writer = new Xlsx($spreadsheet);
		$filename = 'Template-laporan-kinerja-bidang-5';

		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
