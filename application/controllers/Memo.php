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

    public function index()
    {

        $id_user = $this->session->userdata('id_user');

        $data = array(
            'title' => "Agenda"
        );
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/riwayat/v_riwayat', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    public function listmemo()
    {
        $dates = date("Y-m-d");

        $memo = $this->db->query("SELECT * FROM `tbl_memo` WHERE tbl_memo >= '$dates' ORDER by created_at ASC ")->result();
        $data = array(
            'title' => "List Memo",
            'agenda' => $memo
        );
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/agenda/v_memo', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    public function add_memo()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_user = $this->session->userdata('id_user');
        $dispo = json_encode($this->input->post('dispo'));

        $data = array(
            'no_memo' => $this->input->post('no_memo'),
            'tgl_memo' => $this->input->post('created_at'),
            'isi' => $this->input->post('isi'),
            'dispo' => $dispo,
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
        $id = $this->input->post("agId");

        $record = $this->db->query("SELECT * FROM tbl_agenda WHERE id_agenda ='$id'")->result();
        $struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
        $nama_bidang = $this->db->limit(1)->query("SELECT dispo FROM tbl_agenda WHERE id_agenda ='$id'")->row()->dispo;

        $output = "";
        $abc = "";

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
                            <h4 class="modal-title">Edit Agenda</h4>
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
            redirect(site_url('memo/list2'));
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
}
