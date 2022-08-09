<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dispo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_dispo');
		$this->load->model('m_sm');
		$this->load->model('m_nota');
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

	public function add_dispo()
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$id_user = $this->session->userdata('id_user');
		$bidang = $this->input->post('bidang') == null ? '[""]' : json_encode($this->input->post('bidang'));
		$perintah = $this->input->post('perintah') == null ? '[""]' : json_encode($this->input->post('perintah'));
		$id_surat = $this->input->post('id_surat');

		$tipe_surat = $this->db->limit(1)->query("SELECT tipe_surat FROM tbl_surat_masuk WHERE id_surat ='$id_surat'")->row()->tipe_surat;

		$data_dispo = array(
			'tujuan' => $bidang,
			'perintah' => $perintah,
			'isi_disposisi' => $this->input->post('isi_disposisi'),
			'sifat' => $this->input->post('sifat'),
			'tgl_dispo' => $waktu,
			'catatan' => $this->input->post('catatan'),
			'id_surat' => $id_surat,
			'id_user' => $id_user
		);

		$data_sm = array(
			'status_dispo' => 1,
			'nodin' => 1
		);

		$data_ag = array(
			'dispo' => $bidang
		);

		$result = $this->m_dispo->add_dispo($data_dispo);
		//update surat masuk
		$this->m_sm->update_sm($data_sm, $id_surat);

		if ($result) {
			if ($tipe_surat == 1) {
				$this->m_sm->update_ag($data_ag, $id_surat);
			}
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan!!.');
			redirect(site_url('surat_masuk/list'));
		} else {
			$this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
			redirect(site_url('surat_masuk/list'));
		}
	}

	public function add_disponota()
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$id_nota = $this->input->post('id_nota');

		$data = array(
			'tgl_disponota' => $waktu
		);

		//update dispo nota dinas
		$result = $this->m_nota->update_nota($data, $id_nota);

		if ($result) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan!!.');
			redirect(site_url('surat_masuk/list_nota'));
		} else {
			$this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
			redirect(site_url('surat_masuk/list_nota'));
		}
	}

	public function getdisp()
	{
		$id = $this->input->post("dispoId");
		$level = $this->session->userdata('level');
		if ($level == 5) {
			$id = $this->db->limit(1)->query("SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk USING(id_surat) WHERE tbl_disposisi.id_surat=$id")->row()->id_disposisi;
		}
		$regex =
			$dispoId = explode("/", $id);
		$suratId =

			$record = $this->db->query("SELECT * FROM tbl_disposisi WHERE id_disposisi ='$id'")->result();
		$struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
		$pr = $this->db->query("SELECT * FROM tbl_perintah")->result();
		$nama_bidang = $this->db->limit(1)->query("SELECT tujuan FROM tbl_disposisi WHERE id_disposisi ='$id'")->row()->tujuan;
		$perintah = $this->db->limit(1)->query("SELECT perintah FROM tbl_disposisi WHERE id_disposisi ='$id'")->row()->perintah;
		// $filex = $this->db->limit(1)->query("SELECT file FROM tbl_surat_masuk JOIN tbl_disposisi USING(id_surat) WHERE tbl_disposisi.id_surat=tbl_surat_masuk.id_surat")->row()->file;

		// $filex = "";
		$output = "";
		$abc = "";
		$def = "";
		// $ghi = "";
		// $ghi .= '<embed src="'. base_url().'assets/suratmasuk/'. $filex .'" width="800px" height="1000px" />';

		foreach ($struk as $row) {
			if ($level == 5) {
				if ($row->id_struk == 1) continue;
				$abc .= '
					<br><input id="struk_' . $row->id_struk . '" class="form-control-input" value="' . $row->nama . '" type="checkbox" name="bidang[]">
					<label for="struk_' . $row->id_struk . '" for="bidang">&nbsp' . $row->nama . '</label>';
			} else {
				if (!empty($nama_bidang)) {
					if (in_array($row->nama, json_decode($nama_bidang))) {
						$abc .= '
					<br><input id="struk_' . $row->id_struk . '" class="form-control-input" value="' . $row->nama . '" type="checkbox" name="bidang[]" checked>
					<label for="struk_' . $row->id_struk . '" for="bidang">&nbsp' . $row->nama . '</label>';
					} else {
						$abc .= '
					<br><input id="struk_' . $row->id_struk . '" class="form-control-input" value="' . $row->nama . '" type="checkbox" name="bidang[]">
					<label for="struk_' . $row->id_struk . '" for="bidang">&nbsp' . $row->nama . '</label>';
					}
				} else {
					$abc .= '
					<br><input id="struk_' . $row->id_struk . '" class="form-control-input" value="' . $row->nama . '" type="checkbox" name="bidang[]">
					<label for="struk_' . $row->id_struk . '" for="bidang">&nbsp' . $row->nama . '</label>';
				}
			}
		}

		foreach ($pr as $row) {
			if ($level == 5) {
				if ($row->id_perintah == 8) continue;
				$def .= '
				<br><input id="' . $row->id_perintah . '" class="form-control-input" value="' . $row->perintah . '" type="checkbox" name="perintah[]">
				<label for="' . $row->id_perintah . '" for="bidang">&nbsp' . $row->perintah . '</label>';
			} else {
				if (!empty($perintah)) {
					if (in_array($row->perintah, json_decode($perintah))) {
						$def .= '
					<br><input id="' . $row->id_perintah . '" class="form-control-input" value="' . $row->perintah . '" type="checkbox" name="perintah[]" checked>
					<label for="' . $row->id_perintah . '" for="bidang">&nbsp' . $row->perintah . '</label>';
					} else {
						$def .= '
					<br><input id="' . $row->id_perintah . '" class="form-control-input" value="' . $row->perintah . '" type="checkbox" name="perintah[]">
					<label for="' . $row->id_perintah . '" for="bidang">&nbsp' . $row->perintah . '</label>';
					}
				} else {
					$def .= '
					<br><input id="' . $row->id_perintah . '" class="form-control-input" value="' . $row->perintah . '" type="checkbox" name="perintah[]">
					<label for="' . $row->id_perintah . '" for="bidang">&nbsp' . $row->perintah . '</label>';
				}
			}
		}

		foreach ($record as $rows) {
			$filex = $this->db->limit(1)->query("SELECT file FROM tbl_surat_masuk JOIN tbl_disposisi USING(id_surat) WHERE $rows->id_surat=tbl_surat_masuk.id_surat")->row()->file;
			$output .= '
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Disposisi</h4>
						<button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
					</div>
					<div class="modal-body">
						<div class="card-body">
							<form action="' . base_url("dispo/edit_dispo") . '" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="row">
										<embed src="' . base_url() . 'assets/suratmasuk/' . $filex . '" width="800px" height="1000px" />
									</div>

									<div class="row">

							<div class="col-md-6 col-12">
								<div class="form-group">

									<input class="form-control" type="hidden" name="id_surat" value="' . $rows->id_surat . '">
									<input class="form-control" type="hidden" name="id_disposisi" value="' . $rows->id_disposisi . '">
									<label class="control-label">Kepada Yth:</label>
                                        ' . $abc . '
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="control-label">Untuk :</label>
									' . $def . '
								</div>
							</div>

							<div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pilih Sifat Disposisi</label>
                                        <select class="form-control" id="sifat" type="text" name="sifat" value="' . $rows->sifat . '">
                                            <option value="Biasa">Biasa</option>
                                            <option value="Penting">Penting</option>
                                            <option value="Segera">Segera</option>
                                            <option value="Rahasia">Rahasia</option>
                                        </select>
                                    </div>
                             </div>

							<div class="col-md-12 col-12">
								<div class="form-group">
									<label class="control-label">Isi Disposisi</label>
									<textarea class="form-control" type="text" name="isi_disposisi" value="' . $rows->isi_disposisi . '"></textarea>
								</div>
							</div>

							<div class="col-md-12 col-12">
								<div class="form-group">
									<label class="control-label">Catatan</label>
									<textarea class="form-control" type="text" name="catatan" value="' . $rows->catatan . '"></textarea>
								</div>
							</div>

						</div>

									<div class="row" align="right">
										<div class="col-md-12">
											<button type="submit" class="btn btn-warning"><i class="fa fa-check"></i> Update</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			';
		}
		echo $output;
	}

	function edit_dispo()
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$id_disposisi = $this->input->post("id_disposisi");
		$id_surat = $this->input->post("id_surat");

		$data = array(
			'tujuan' => json_encode($this->input->post('bidang')),
			'perintah' => json_encode($this->input->post('perintah')),
			'isi_disposisi' => $this->input->post('isi_disposisi'),
			'sifat' => $this->input->post('sifat'),
			'tgl_dispo' => $waktu,
			'catatan' => $this->input->post('catatan')
		);

		$result = $this->m_dispo->update_dispo($data, $id_disposisi);
		$level = $this->session->userdata('level');
		if ($level == 5) {
			$data_sm = array(
				'status_dispo' => 2
			);
			//update surat masuk
			$this->m_sm->update_sm($data_sm, $id_surat);
		}

		if ($result) {
			$this->session->set_flashdata('success', 'Data Berhasil Diubah!!.');
			redirect(site_url('dispo/get_dispo/' . $id_surat));
		} else {
			$this->session->set_flashdata('error', 'Gagal Ubah Data!!.');
			redirect(site_url('dispo/get_dispo/' . $id_surat));
		}
	}

	function hapus($id)
	{
		$id_surat = $this->db->limit(1)->query("SELECT id_surat FROM tbl_disposisi WHERE id_disposisi ='$id'")->row()->id_surat;

		$data_sm = array(
			'status_dispo' => 0
		);

		$result = $this->m_dispo->hapus_dispo($id);
		$this->m_sm->update_sm($data_sm, $id_surat);

		if ($result) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus!!.');
			redirect(site_url('surat_masuk/list'));
		} else {
			$this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
			redirect(site_url('surat_masuk/list'));
		}
	}

	public function print_dispo($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		//update surat masuk
		$data_sm = array(
			'status_print' => 1
		);
		$this->m_sm->update_sm($data_sm, $id);

		$data['surat'] = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE id_surat='$id'")->result();
		$data['dispo'] = $this->db->query("SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk USING(id_surat) WHERE tbl_disposisi.id_surat='$id'")->result();
		
		$id_users = $this->db->limit(1)->query("SELECT tbl_disposisi.id_user FROM tbl_disposisi JOIN tbl_surat_masuk USING(id_surat) WHERE tbl_disposisi.id_surat='$id'")->row()->id_user;
        
		if ($id_users == 5){
		    $id_sekdin = 2;
		} elseif ($id_users == 36) {
		    $id_sekdin = 17;
		}
		$data['sekdin'] = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_pegawai ='$id_sekdin'")->result();

		// $this->pdf->setPaper('A4', 'potrait'); //landscape //potrait
		$this->pdf->filename = "print-disposisi-" . $waktu . ".pdf";
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->load_view('admin/dispo/print_dispo', $data);
		$this->pdf->render();
	}

	public function print_disponota($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$notaId = explode("--", $id);
		$ids = $notaId[0];
		$data['tipe'] = $notaId[1];

		//update surat masuk
		$data_nota = array(
			'status_print' => 1
		);
		$this->m_nota->update_nota($data_nota, $ids);

		if ($notaId[1] == 0) {

			$data['nota'] = $this->db->query("SELECT tbl_nota_dinas.*, 
			tbl_surat_masuk.no_surat as no_surat, 
			tbl_surat_masuk.tgl_surat as tgl_surat, 
			tbl_surat_masuk.asal_surat as asal_surat, 
			tbl_surat_masuk.isi as perihal, 
			tbl_surat_masuk.no_agenda as no_agenda
			FROM tbl_nota_dinas JOIN tbl_surat_masuk USING(id_surat) WHERE tbl_nota_dinas.id_nota='$ids'")->result();
		} else {

			$data['nota'] = $this->db->query("SELECT * FROM tbl_nota_dinas  WHERE id_nota='$ids'")->result();
		}

		// $this->pdf->setPaper('A4', 'potrait'); //landscape //potrait
		$this->pdf->filename = "print-disposisi-" . $waktu . ".pdf";
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->load_view('admin/nota_dinas/print_disponota', $data);
		$this->pdf->render();
	}
}
