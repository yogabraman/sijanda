<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_sm');
        $this->load->library('pdf');

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

		$agenda = $this->db->query("SELECT * FROM tbl_agenda ORDER by tgl_agenda ASC ")->result();
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


	public function get_agenda()
	{
		$id = $this->input->post("agId");

		$record = $this->db->query("SELECT * FROM tbl_agenda WHERE id_agenda ='$id'")->result();
		$struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
		$nama_bidang = $this->db->limit(1)->query("SELECT dispo FROM tbl_agenda WHERE id_agenda ='$id'")->row()->dispo;

		$output = "";
		$abc = "";

		foreach ($struk as $row) {
			if (!empty($nama_bidang)){
				if (in_array($row->nama, json_decode($nama_bidang))) {
					$abc .= '
				<br><input id="struk_' . $row->id_struk . '" class="form-control-input" value="' . $row->nama . '" type="checkbox" name="bidang[]" checked>
				<label for="struk_' . $row->id_struk . '" for="bidang">&nbsp' . $row->nama . '</label>';
				} else {
					$abc .= '
				<br><input id="struk_' . $row->id_struk . '" class="form-control-input" value="' . $row->nama . '" type="checkbox" name="bidang[]">
				<label for="struk_' . $row->id_struk . '" for="bidang">&nbsp' . $row->nama . '</label>';
				}
			} else{
				$abc .= '
				<br><input id="struk_' . $row->id_struk . '" class="form-control-input" value="' . $row->nama . '" type="checkbox" name="bidang[]">
				<label for="struk_' . $row->id_struk . '" for="bidang">&nbsp' . $row->nama . '</label>';
			}
			
		}

		foreach ($record as $rows) {
			$output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Surat Masuk</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . base_url("agenda/edit_agenda") . '" method="post" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">
										<div class="col-md-6 col-12">
                                    <div class="form-group">

                                        <input class="form-control" type="hidden" name="id_agenda" value="' . $id . '">
                                        <input class="form-control" type="hidden" name="id_surat" value="' . $rows->id_surat . '">
                                        <label class="control-label">Tanggal Acara</label>
                                        <input class="form-control" type="date" name="tgl_acara" value="' . $rows->tgl_agenda . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tempat Acarat</label>
                                        <input class="form-control" type="text" name="tempat" value="' . $rows->tempat . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Waktu Acara</label>
                                        <input class="form-control" type="time" name="wkt_acara" value="' . $rows->waktu_agenda . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Dari</label>
                                        <input class="form-control" type="text" name="dari" value="' . $rows->asal . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Isi Acara</label>
                                        <input class="form-control" type="text" name="isi" value="' . $rows->isi . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Bidang :</label>
                                        ' . $abc . '
                                    </div>
                                </div>
										</div>
										

                                        <div class="row" align="right">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
									</div>
								</form>
							</div>
						</div>
					<div class="modal-footer">
                    </div></div>
                ';
		}
		echo $output;
	}

	function edit_agenda()
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$id_agenda = $this->input->post("id_agenda");
		$id_user = $this->session->userdata('id_user');

		$data = array(
			'asal' => $this->input->post('dari'),
			'isi' => $this->input->post('isi'),
			'tgl_agenda' => $this->input->post('tgl_acara'),
			'waktu_agenda' => $this->input->post('waktu_agenda'),
			'tempat' => $this->input->post('tempat'),
			'dispo' => json_encode($this->input->post('bidang')),
			'id_user' => $id_user
		);

		$result = $this->m_sm->update_agenda($data, $id_agenda);

		if ($result) {
			$this->session->set_flashdata('success', 'Data Undangan Berhasil Diubah!!.');
			redirect(site_url('agenda/list2'));
		} else {
			$this->session->set_flashdata('error', 'Gagal Ubah Data Undangan!!.');
			redirect(site_url('agenda/list2'));
		}
	}

    function hapus($id)
    {
        $result = $this->m_sm->hapus_agenda($id);

            if ($result) {
                $this->session->set_flashdata('success', 'Data Berhasil dihapus!!.');
                redirect(site_url('agenda/list2'));
            } else {
                $this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
                redirect(site_url('agenda/list2'));
            }
            
    }

	public function cetak2()
	{
		$data = array(
			'title' => "Cetak Agenda"
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/agenda/v_cetak2', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function get_cetak2()
    {

        function tgl_indo($tanggal){
            $bulan = array (
                1 =>    'Januari',
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
 
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        $start = $this->input->post("start");
        $end = $this->input->post("end");

        // $a = date_create($start);
        // $mulai = date_format($a,"Y-m-d");

        // $b = date_create($end);
        // $selesai = date_format($b,"Y-m-d");

        if(isset($start) and !empty($end)){
            $record = $this->db->query("SELECT * FROM tbl_agenda WHERE tgl_agenda BETWEEN '$start' AND '$end'")->result();

            $output = "";
            $no = 1;

            foreach ($record as $rows) {

				$dispo = !empty($rows->dispo) ? implode("<br>",json_decode($rows->dispo)): "";

                $output .= '
                        <tr>
                            <td>'. $no++ .'</td>
                            <td>'. tgl_indo($rows->tgl_agenda) .'</td>
                            <td>'. $rows->waktu_agenda .'</td>
                            <td>'. $rows->asal .'</td>
                            <td>'. $rows->tempat .'</td>
                            <td>'. $rows->isi .'</td>
                            <td>'. $dispo .'</td>
                          </tr>
                ';

            }

            echo $output;
        } else {
            echo "Belum pilih Tanggal";
        }
    }

	public function cetakbydate2()
	{

		date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $start = $this->input->post("start");
        $end = $this->input->post("end");
    
        // $data['surat'] = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE id_surat='$id'")->result();
        $data['agenda'] = $this->db->query("SELECT * FROM tbl_agenda WHERE tbl_agenda.tgl_agenda BETWEEN '$start' AND '$end'")->result();

        $data['start'] = $start;
        $data['end'] = $end;

        // $this->pdf->setPaper('A4', 'potrait'); //landscape //potrait
        $this->pdf->filename = "print-agenda-".$waktu.".pdf";
		$this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->load_view('admin/agenda/print_agenda', $data);
        $this->pdf->render();
	}
}
