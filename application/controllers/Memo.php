<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Memo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_memo');
        $this->load->library('pdf');

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }
    }

    public function listmemo()
    {
        $dates = date("Y-m-d");

        $memo = $this->db->query("SELECT * FROM `tbl_memo` ORDER BY created_at DESC ")->result();
        $data = array(
            'title' => "List Memo",
            'memo' => $memo
        );
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/memo/v_memo', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    public function add_memo()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_user = $this->session->userdata('id_user');
		$bidang = $this->input->post('bidang') == null ? '[""]' : json_encode($this->input->post('bidang'));
        $kodebid = null;
		if ($this->input->post('bidang') != null) {
			foreach ($this->input->post('bidang') as $x => $val) {
				$kbid = $this->db->limit(1)->query("SELECT id_struk FROM tbl_struktural WHERE nama ='$val'")->row()->id_struk;
				if ($kodebid == '') {
					$kodebid .= $kbid;
				} else {
					$kodebid .= ',' . $kbid;
				}
			}
		}

        $data = array(
            'no_memo' => $this->input->post('no_memo'),
            'isi_disposisi' => $this->input->post('isi_disposisi'),
			'tujuan' => $bidang,
			'dispo' => $kodebid,
            'created_at' => $waktu,
            'id_user' => $id_user
        );

        $result = $this->m_memo->add_memo($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan!!.');
            redirect(site_url('memo/listmemo'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
            redirect(site_url('memo/listmemo'));
        }
    }

    public function get_memo()
    {
        $id = $this->input->post("memoId");

        $record = $this->db->query("SELECT * FROM tbl_memo WHERE id_memo ='$id'")->result();
        $struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
        $nama_bidang = $this->db->limit(1)->query("SELECT tujuan FROM tbl_memo WHERE id_memo ='$id'")->row()->tujuan;
        $pegawai = $this->db->query("SELECT pegawai FROM tbl_pegawai")->result();

        $output = "";
        $abc = "";
        $def = "";

        foreach ($pegawai as $row) {
            $def .= '<option value="' . $row->pegawai . '">' . $row->pegawai . '</option>';
        }

        if ($this->session->userdata('level') != 3) {
            foreach ($struk as $row) {
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
        } else {
            $abc .= '
                    <br><input class="form-control" value="' . $this->session->userdata('bidang') . '" type="text" name="bidang[]" readonly>';
        }

        foreach ($record as $rows) {
            $output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Memo</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . base_url("memo/edit_memo") . '" method="post" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">
										<div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_memo" value="' . $id . '">
                                        <label class="control-label">No Memo</label>
                                        <input class="form-control" type="text" name="no_memo" value="' . $rows->no_memo . '" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Bidang :</label>
                                        ' . $abc . '
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Isi Memo</label>
                                        <input type="hidden" name="isi_disposisi" value=" ' . html_escape($rows->isi_disposisi) . '">
                                        <div id="editor-edit" style="min-height: 160px;">' . $rows->isi_disposisi . '</div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pegawai Penerima</label>
                                        <select class="form-control" id="penerima" type="text" name="penerima">
                                            <option value="' . $rows->penerima . '" >' . $rows->penerima . '</option>
                                            ' . $def . '
                                        </select>
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
		$this->load->view('admin/layouts/footer-tambahan');
    }

    function edit_memo()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_memo = $this->input->post("id_memo");
        $id_user = $this->session->userdata('id_user');

        $kodebid = null;
		if ($this->input->post('bidang') != null) {
			foreach ($this->input->post('bidang') as $x => $val) {
				$kbid = $this->db->limit(1)->query("SELECT id_struk FROM tbl_struktural WHERE nama ='$val'")->row()->id_struk;
				if ($kodebid == '') {
					$kodebid .= $kbid;
				} else {
					$kodebid .= ',' . $kbid;
				}
			}
		}

        // echo $this->input->post('isi');

        $data = array(
			'tujuan' => json_encode($this->input->post('bidang')),
			'dispo' => $kodebid,
            'isi_disposisi' => $this->input->post('isi_disposisi'),
            'penerima' => $this->input->post('penerima'),
            'updated_at' => $waktu,
            'id_user' => $id_user
        );

        $result = $this->m_memo->update_memo($data, $id_memo);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Berhasil Diubah!!.');
            redirect(site_url('memo/listmemo'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Ubah Data!!.');
            redirect(site_url('memo/listmemo'));
        }
    }

    function hapus($id)
    {
        $result = $this->m_memo->hapus_memo($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus!!.');
            redirect(site_url('memo/listmemo'));
        } else {
            $this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
            redirect(site_url('memo/listmemo'));
        }
    }

	public function print_memo($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');
        $id_sekdin = 2;

		//update surat masuk
		$data_mm = array(
			'status_print' => 1
		);
		$this->m_memo->update_memo($data_mm, $id);

		$data['memo'] = $this->db->query("SELECT * FROM tbl_memo WHERE id_memo='$id'")->result();
		$data['sekdin'] = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_pegawai ='$id_sekdin'")->result();

		// $this->pdf->setPaper('A4', 'potrait'); //landscape //potrait
		$this->pdf->filename = "print-memo-" . $waktu . ".pdf";
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->load_view('admin/memo/print_memo', $data);
		$this->pdf->render();
	}
}
