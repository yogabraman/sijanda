<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_sm');
        $this->load->model('m_sk');
        $this->load->model('m_nota');
        $this->load->library('pdf');

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }
    }

    public function index()
    {

        $id_user = $this->session->userdata('id_user');

        $data = array(
            'title' => "Surat Masuk"
        );
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/surat_masuk/v_list', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    //tambah surat masuk
    public function tambah_sm()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_user = $this->session->userdata('id_user');
        // $new = $this->input->post("filex");
        $new = $_FILES["filex"]["name"];
        $jenis_surat = $this->input->post('tipe_surat');

        // print_r($new);
        // exit();

        // if (!empty($_FILES["filex"]["name"])) {

        // 	$new = $this->input->post("filex");
        // 	$files = $this->m_sm->_uploadFile($new);
        // } else {
        // 	$files = "";
        // }

        // print_r($new);
        // exit();

        if ($jenis_surat == 0) {

            $data_surat = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'no_surat' => $this->input->post('no_surat'),
                'asal_surat' => $this->input->post('asal_surat'),
                'isi' => $this->input->post('isi'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'tgl_diterima' => $waktu,
                'file' => $this->m_sm->_uploadFile($new),
                'keterangan' => "",
                'status_dispo' => 0,
                'tipe_surat' => $this->input->post('tipe_surat'),
                'id_user' => $id_user
            );

            $result = $this->m_sm->add_sm($data_surat);

            if ($result) {
                $this->session->set_flashdata('success', 'Data Surat Biasa Berhasil Disimpan!!.');
                redirect(site_url('surat_masuk/list'));
            } else {
                $this->session->set_flashdata('error', 'Gagal Simpan Data Surat Biasa!!.');
                redirect(site_url('surat_masuk/list'));
            }
        } else {

            $data_surat = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'no_surat' => $this->input->post('no_surat'),
                'asal_surat' => $this->input->post('asal_surat'),
                'isi' => $this->input->post('isi'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'tgl_diterima' => $waktu,
                'file' => $this->m_sm->_uploadFile($new),
                'keterangan' => "",
                'status_dispo' => 0,
                'tipe_surat' => $this->input->post('tipe_surat'),
                'id_user' => $id_user
            );

            $result = $this->m_sm->add_sm($data_surat);

            if ($result) {
                $last_insert = $this->db->insert_id();

                $data_undangan = array(
                    'asal' => $this->input->post('asal_surat'),
                    'isi' => $this->input->post('isi'),
                    'tgl_agenda' => $this->input->post('tgl_agenda'),
                    'waktu_agenda' => $this->input->post('waktu_agenda'),
                    'tempat' => $this->input->post('tempat'),
                    'id_surat' => $last_insert,
                    'id_user' => $id_user
                );

                $result2 = $this->m_sm->add_ag($data_undangan);

                if ($result2) {
                    $this->session->set_flashdata('success', 'Data Undangan Berhasil Disimpan!!.');
                    redirect(site_url('surat_masuk/list'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal Simpan Data Undangan!!.');
                    redirect(site_url('surat_masuk/list'));
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal Simpan Data Undangan!!.');
                redirect(site_url('surat_masuk/list'));
            }
        }
    }

    //tambah surat keluar
    public function tambah_sk()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_user = $this->session->userdata('id_user');
        $new = $_FILES["filex"]["name"];

        $data = array(
            'no_surat' => $this->input->post('no_surat'),
            'asal_surat' => $this->input->post('asal_surat'),
            'perihal' => $this->input->post('perihal'),
            'tgl_surat' => $this->input->post('tgl_surat'),
            'tgl_naik' => $this->input->post('tgl_naik'),
            'file' => $this->m_sk->_uploadFileSK($new),
            'isi_dispo' => $this->input->post('isi_dispo'),
            'id_user' => $id_user
        );

        $result = $this->m_sk->add_sk($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Surat Biasa Berhasil Disimpan!!.');
            redirect(site_url('surat_masuk/list1'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Simpan Data Surat Biasa!!.');
            redirect(site_url('surat_masuk/list1'));
        }
    }

    //tambah nota dinas
    public function tambah_nota()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_user = $this->session->userdata('id_user');
        $new = $_FILES["filex"]["name"];

        $data = array(
            'id_surat' => $this->input->post('id_surat'),
            'file_nota' => $this->m_nota->_uploadFileNota($new),
            'tgl_nota' => $this->input->post('tgl_nota'),
            'created_at' => $waktu,
            'updated_at' => $waktu,
            'id_user' => $id_user
        );

        $result = $this->m_nota->add_nota($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Surat Biasa Berhasil Disimpan!!.');
            redirect(site_url('surat_masuk/list_nota'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Simpan Data Surat Biasa!!.');
            redirect(site_url('surat_masuk/list_nota'));
        }
    }

    //list surat masuk
    public function list()
    {
        $masuk = $this->db->query("SELECT * FROM tbl_surat_masuk ORDER by id_surat DESC")->result();
        // $masuk = $this->m_sm->cek_sm();
        $data = array(
            'title' => "List Surat Masuk",
            'masuk' => $masuk
        );
        $this->db->reconnect();
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/surat_masuk/v_list', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    //list surat keluar
    public function list1()
    {
        $keluar = $this->db->query("SELECT * FROM tbl_surat_keluar ORDER by id_surat DESC")->result();
        $data = array(
            'title' => "List Surat Keluar",
            'keluar' => $keluar
        );
        $this->db->reconnect();
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/surat_keluar/v_list1', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    //list nota dinas
    public function list_nota()
    {
        $nota = $this->db->query("SELECT tbl_nota_dinas.*, 
            tbl_surat_masuk.no_surat as no_surat, 
            tbl_surat_masuk.tgl_surat as tgl_surat, 
            tbl_surat_masuk.isi as perihal
            FROM tbl_nota_dinas JOIN tbl_surat_masuk USING(id_surat) ORDER by id_nota DESC")->result();
        $data = array(
            'title' => "List Nota Dinas",
            'nota' => $nota
        );
        $this->db->reconnect();
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/nota_dinas/v_list_nota', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    //form edit surat masuk
    public function get_sm()
    {
        $id = $this->input->post("smId");

        $cek = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE id_surat ='$id'")->result();
        $pegawai = $this->db->query("SELECT pegawai FROM tbl_pegawai")->result();

        foreach ($cek as $rows) {
            $tipe_surat = $rows->tipe_surat;
            $no_agenda = $rows->no_agenda;
            $asal_surat = $rows->asal_surat;
            $no_surat = $rows->no_surat;
            $tgl_surat = $rows->tgl_surat;
            $isi = $rows->isi;
            $file = $rows->file;
            $penerima = $rows->penerima;
        }

        $output = "";
        $abc = "";

        foreach ($pegawai as $row) {
            $abc .= '<option value="' . $row->pegawai . '">' . $row->pegawai . '</option>';
        }

        if ($tipe_surat == 1) {
            $record = $this->db->query("SELECT tbl_surat_masuk.*, tbl_agenda.tgl_agenda, tbl_agenda.waktu_agenda, tbl_agenda.tempat, tbl_agenda.id_agenda FROM tbl_surat_masuk JOIN tbl_agenda USING(id_surat) WHERE id_surat ='$id'")->result();

            foreach ($record as $rows) {
                $output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Surat Masuk</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . base_url("surat_masuk/edit_sm") . '" method="post" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">

                                        <input class="form-control" type="hidden" name="id_surat" value="' . $rows->id_surat . '">
                                        <input class="form-control" type="hidden" name="tipe_surat" value="' . $tipe_surat . '">
                                        <label class="control-label">Nomor Agenda</label>
                                        <input class="form-control" type="text" name="no_agenda" value="' . $rows->no_agenda . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Asal Surat</label>
                                        <input class="form-control" type="text" name="asal_surat" value="' . $rows->asal_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nomor Surat</label>
                                        <input class="form-control" type="text" name="no_surat" value="' . $rows->no_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Surat</label>
                                        <input class="form-control" type="date" name="tgl_surat" value="' . $rows->tgl_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Perihal</label>
                                        <input class="form-control" type="text" name="isi" value="' . $rows->isi . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">File</label>
                                        <input type="file" name="filex" class="form-control">
                                        <input type="hidden" name="old_file" class="form-control" value="' . $file . '">
                                        <small class="red-text">Current File : <b>' . substr($file, 22) . '</b> *Jika tidak ada file/scan gambar surat, biarkan kosong!</small>
                                    </div>
                                </div>

                            </div>

                            	<div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Acara</label>
                                            <input class="form-control" type="date" name="tgl_agenda" value="' . $rows->tgl_agenda . '">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label">Tempat Acara</label>
                                            <input class="form-control" type="text" name="tempat" value="' . $rows->tempat . '">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label">Waktu Acara</label>
                                            <input class="form-control" type="time" name="waktu_agenda" value="' . $rows->waktu_agenda . '">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pegawai Penerima</label>
                                        <select class="form-control" id="penerima" type="text" name="penerima">
                                            <option value="' . $rows->penerima . '" >' . $rows->penerima . '</option>
                                            ' . $abc . '
                                        </select>
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
        } else {

            $output = '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Surat Masuk</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . base_url("surat_masuk/edit_sm") . '" method="post" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                    	<input class="form-control" type="hidden" name="id_surat" value="' . $rows->id_surat . '">
                                        <input class="form-control" type="hidden" name="tipe_surat" value="' . $tipe_surat . '">
                                        <label class="control-label">Nomor Agenda</label>
                                        <input class="form-control" type="text" name="no_agenda" value="' . $no_agenda . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Asal Surat</label>
                                        <input class="form-control" type="text" name="asal_surat" value="' . $asal_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nomor Surat</label>
                                        <input class="form-control" type="text" name="no_surat" value="' . $no_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Surat</label>
                                        <input class="form-control" type="date" name="tgl_surat" value="' . $tgl_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Perihal</label>
                                        <input class="form-control" type="text" name="isi" value="' . $isi . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">File</label>
                                        <input type="file" name="filex" class="form-control">
                                        <input type="hidden" name="old_file" class="form-control" value="' . $file . '">
                                        <small class="red-text">Current File : <b>' . substr($file, 22) . '</b> *Jika tidak ada file/scan gambar surat, biarkan kosong!</small>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label class="control-label">Pegawai Penerima</label>
                                    <select class="form-control" id="penerima" type="text" name="penerima">
                                        <option value="' . $penerima . '" >' . $penerima . '</option>
                                        ' . $abc . '
                                    </select>
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
            echo $output;
        }
    }

    //form edit surat keluar
    public function get_sk()
    {
        $id = $this->input->post("skId");

        $cek = $this->db->query("SELECT * FROM tbl_surat_keluar WHERE id_surat ='$id'")->result();

        foreach ($cek as $rows) {
            $asal_surat = $rows->asal_surat;
            $no_surat = $rows->no_surat;
            $perihal = $rows->perihal;
            $tgl_surat = $rows->tgl_surat;
            $tgl_naik = $rows->tgl_naik;
            $isi_dispo = $rows->dispo;
            $file = $rows->file;
        }

        $output = "";

        $output = '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Surat Keluar</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . base_url("surat_masuk/edit_sk") . '" method="post" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_surat" value="' . $id . '">
                                        <label class="control-label">Asal Surat</label>
                                        <input class="form-control" type="text" name="asal_surat" value="' . $asal_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nomor Surat</label>
                                        <input class="form-control" type="text" name="no_surat" value="' . $no_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Surat</label>
                                        <input class="form-control" type="date" name="tgl_surat" value="' . $tgl_surat . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Perihal</label>
                                        <input class="form-control" type="text" name="perihal" value="' . $perihal . '">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Diteruskan</label>
                                        <input class="form-control" type="date" name="tgl_naik" value="' . $tgl_naik . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Isi Diposisi</label>
                                        <input class="form-control" type="text" name="isi_dispo" value="' . $isi_dispo . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">File</label>
                                        <input type="file" name="filex" class="form-control">
                                        <input type="hidden" name="old_file" class="form-control" value="' . $file . '">
                                        <small class="red-text">Current File : <b>' . substr($file, 22) . '</b> *Jika tidak ada file/scan gambar surat, biarkan kosong!</small>
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
        echo $output;
    }

    //form edit nota dinas
    public function get_nota()
    {
        $id = $this->input->post("notaId");

        $cek = $this->db->query("SELECT tbl_nota_dinas.*, tbl_surat_masuk.isi as perihal 
        FROM tbl_nota_dinas
        JOIN tbl_surat_masuk USING(id_surat)
        WHERE id_nota ='$id'")->result();

        foreach ($cek as $rows) {
            $id_surat = $rows->id_surat;
            $perihal = $rows->perihal;
            $file_nota = $rows->file_nota;
            $file_dispo = $rows->file_dispo;
            $tgl_nota = $rows->tgl_nota;
            $disponota = $rows->tgl_disponota;
        }

        $output = "";
        $filedisp = "";

        if ($disponota !== null) {
            $filedisp = '<div class="col-md-12 col-12">
            <div class="form-group">
                <label class="control-label">Dispo Nota Dinas</label>
                <input type="file" name="filex2" class="form-control">
                <input type="hidden" name="old_file2" class="form-control" value="' . $file_dispo . '">
                <small class="red-text">Current File : <b>' . substr($file_dispo, 22) . '</b> *Jika tidak ada file/scan gambar surat, biarkan kosong!</small>
            </div>
        </div>';
        }

        $output = '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Nota Dinas</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . base_url("surat_masuk/edit_nota") . '" method="post" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id_nota" value="' . $id . '">
                                        <input class="form-control" type="hidden" name="id_surat" value="' . $id_surat . '">
                                        <label class="control-label">Surat</label>
                                        <input class="form-control" id="nota_surat" name="perihal" value="' . $perihal . '" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Nota Dinas</label>
                                        <input class="form-control" type="date" name="tgl_nota" value="' . $tgl_nota . '">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nota Dinas</label>
                                        <input type="file" name="filex" class="form-control">
                                        <input type="hidden" name="old_file" class="form-control" value="' . $file_nota . '">
                                        <small class="red-text">Current File : <b>' . substr($file_nota, 22) . '</b> *Jika tidak ada file/scan gambar surat, biarkan kosong!</small>
                                    </div>
                                </div>

                                ' . $filedisp . '

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
        echo $output;
    }

    //store edit surat masuk
    function edit_sm()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $tipe_surat = $this->input->post("tipe_surat");
        $id_surat = $this->input->post("id_surat");
        $new = $this->input->post("filex");

        if ($tipe_surat == 1) {

            if (!empty($_FILES["filex"]["name"])) {

                $new = $_FILES["filex"]["name"];
                $files = $this->m_sm->_uploadFile($new);
            } else {
                $files = $this->input->post("old_file");
            }

            $data_surat = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'no_surat' => $this->input->post('no_surat'),
                'asal_surat' => $this->input->post('asal_surat'),
                'isi' => $this->input->post('isi'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'file' => $files,
                'penerima' => $this->input->post('penerima')
            );

            $result = $this->m_sm->update_sm($data_surat, $id_surat);

            $data_undangan = array(
                'asal' => $this->input->post('asal_surat'),
                'isi' => $this->input->post('isi'),
                'tgl_agenda' => $this->input->post('tgl_agenda'),
                'waktu_agenda' => $this->input->post('waktu_agenda'),
                'tempat' => $this->input->post('tempat')
            );

            $result2 = $this->m_sm->update_ag($data_undangan, $id_surat);

            if ($result2) {
                $this->session->set_flashdata('success', 'Data Undangan Berhasil Diubah!!.');
                redirect(site_url('surat_masuk/list'));
            } else {
                $this->session->set_flashdata('error', 'Gagal Ubah Data Undangan!!.');
                redirect(site_url('surat_masuk/list'));
            }
        } else {

            if (!empty($_FILES["filex"]["name"])) {

                $new = $_FILES["filex"]["name"];
                $files = $this->m_sm->_uploadFile($new);
            } else {
                $files = $this->input->post("old_file");
            }

            $data_surat = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'no_surat' => $this->input->post('no_surat'),
                'asal_surat' => $this->input->post('asal_surat'),
                'isi' => $this->input->post('isi'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'file' => $files,
                'penerima' => $this->input->post('penerima')
            );

            $result = $this->m_sm->update_sm($data_surat, $id_surat);

            if ($result) {
                $this->session->set_flashdata('success', 'Data Surat Biasa Berhasil Diubah!!.');
                redirect(site_url('surat_masuk/list'));
            } else {
                $this->session->set_flashdata('error', 'Gagal Ubah Data Surat Biasa!!.');
                redirect(site_url('surat_masuk/list'));
            }
        }
    }

    //store edit surat keluar
    function edit_sk()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_surat = $this->input->post("id_surat");
        $new = $this->input->post("filex");

        if (!empty($_FILES["filex"]["name"])) {

            $new = $_FILES["filex"]["name"];
            $files = $this->m_sk->_uploadFileSK($new);
        } else {
            $files = $this->input->post("old_file");
        }

        $data_surat = array(
            'no_surat' => $this->input->post('no_surat'),
            'asal_surat' => $this->input->post('asal_surat'),
            'perihal' => $this->input->post('perihal'),
            'tgl_surat' => $this->input->post('tgl_surat'),
            'tgl_naik' => $this->input->post('tgl_naik'),
            'file' => $files,
            'penerima' => $this->input->post('penerima'),
            'isi_dispo' => $this->input->post('isi_dispo')
        );

        $result = $this->m_sm->update_sm($data_surat, $id_surat);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Surat Biasa Berhasil Diubah!!.');
            redirect(site_url('surat_masuk/list1'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Ubah Data Surat Biasa!!.');
            redirect(site_url('surat_masuk/list1'));
        }
    }

    //store edit surat keluar
    function edit_nota()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id = $this->input->post("id_nota");
        $new = $this->input->post("filex");
        $new2 = $this->input->post("filex2");

        if (!empty($_FILES["filex"]["name"])) {

            $new = $_FILES["filex"]["name"];
            $files = $this->m_nota->_uploadFileNota($new);
        } else {
            $files = $this->input->post("old_file");
        }

        if (!empty($_FILES["filex2"]["name"])) {

            $new2 = $_FILES["filex2"]["name"];
            $files2 = $this->m_nota->_uploadFileDispo($new2);
        } else {
            $files2 = $this->input->post("old_file2");
        }

        $data = array(
            'id_surat' => $this->input->post('id_surat'),
            'file_nota' => $files,
            'file_dispo' => $files2,
            'tgl_nota' => $this->input->post('tgl_nota'),
            'updated_at' => $waktu
        );

        $result = $this->m_nota->update_nota($data, $id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Surat Biasa Berhasil Diubah!!.');
            redirect(site_url('surat_masuk/list_nota'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Ubah Data Surat Biasa!!.');
            redirect(site_url('surat_masuk/list_nota'));
        }
    }

    //hapus surat masuk
    function hapus($id)
    {
        $result = $this->m_sm->hapus_sm($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus!!.');
            redirect(site_url('surat_masuk/list'));
        } else {
            $this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
            redirect(site_url('surat_masuk/list'));
        }
    }

    //hapus surat keluar
    function hapus_sk($id)
    {
        $result = $this->m_sk->hapus_sk($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus!!.');
            redirect(site_url('surat_masuk/list1'));
        } else {
            $this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
            redirect(site_url('surat_masuk/list1'));
        }
    }

    //hapus nota dinas
    function hapus_nota($id)
    {
        $result = $this->m_nota->hapus_nota($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus!!.');
            redirect(site_url('surat_masuk/list_nota'));
        } else {
            $this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
            redirect(site_url('surat_masuk/list_nota'));
        }
    }

    //Merge Nota Dinas
    public function mergepdf($filez)
    {
        echo "Belum Selesai";
    }

    //direct cetak surat masuk
    public function cetak()
    {
        $data = array(
            'title' => "Cetak Surat Masuk"
        );
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/surat_masuk/v_cetak', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    //get list cetak surat masuk
    public function get_cetak()
    {

        function tgl_indo($tanggal)
        {
            $bulan = array(
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

            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }

        $start = $this->input->post("start");
        $end = $this->input->post("end");

        // $a = date_create($start);
        // $mulai = date_format($a,"Y-m-d");

        // $b = date_create($end);
        // $selesai = date_format($b,"Y-m-d");

        if (isset($start) and !empty($end)) {
            $record = $this->db->query("SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk USING(id_surat) WHERE tbl_disposisi.tgl_dispo BETWEEN '$start' AND '$end'")->result();

            $output = "";
            $no = 1;

            foreach ($record as $rows) {

                $tujuan = !empty($rows->tujuan) ? implode("<br>", json_decode($rows->tujuan)) : "";

                $output .= '
                        <tr>
                            <td>' . $no++ . '</td>
                            <td>' . $rows->asal_surat . '</td>
                            <td>' . $rows->isi . '</td>
                            <td>' . tgl_indo($rows->tgl_surat) . '</td>
                            <td>' . tgl_indo($rows->tgl_dispo) . '</td>
                            <td>' . $tujuan . '</td>
                          </tr>
                ';
            }

            echo $output;
        } else {
            echo "Belum pilih Tanggal";
        }
    }

    //pdf cetak surat masuk
    public function cetakbydate()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $start = $this->input->post("start");
        $end = $this->input->post("end");

        // $data['surat'] = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE id_surat='$id'")->result();
        $data['dispo'] = $this->db->query("SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk USING(id_surat) WHERE tbl_disposisi.tgl_dispo BETWEEN '$start' AND '$end'")->result();

        $data['start'] = $start;
        $data['end'] = $end;

        // $this->pdf->setPaper('A4', 'potrait'); //landscape //potrait
        $this->pdf->filename = "print-sm-" . $waktu . ".pdf";
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->load_view('admin/surat_masuk/print_sm', $data);
        $this->pdf->render();
    }
}
