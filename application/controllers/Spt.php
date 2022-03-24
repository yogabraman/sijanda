<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_spt');
        $this->load->model('m_pegawai');
        $this->load->library('pdf');

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }
    }

    public function index()
    {
        // $spt = $this->db->query("SELECT tbl_spt.*, tbl_spt_pegawai.pegawai as pegawai FROM tbl_spt 
        // JOIN tbl_spt_pegawai USING(id_spt) GROUP BY id_spt ORDER by id_spt DESC")->result();
        // $spt = $this->db->query("SELECT * FROM tbl_spt")->result();
        $spt = $this->db->query("SELECT spt.*, 
        (SELECT GROUP_CONCAT(pgw.pegawai SEPARATOR '<br>')FROM tbl_spt_pegawai pgw WHERE pgw.id_spt = spt.id_spt) AS pegawai 
        FROM tbl_spt spt")->result();
        $data = array(
            'title' => "Data SPT",
            'spt' => $spt
        );
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/spt/v_spt', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    public function tambah_spt()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_user = $this->session->userdata('id_user');
        $new = $_FILES["filex"]["name"];

        $data = array(
            'tgl_berangkat' => $this->input->post('tgl_berangkat'),
            'tgl_pulang' => $this->input->post('tgl_pulang'),
            'tujuan' => $this->input->post('tujuan'),
            'file_spt' => $this->m_spt->_uploadSpt($new),
            'id_user' => $id_user,
            'created_at' => $waktu,
            'updated_at' => $waktu
        );

        $result = $this->m_spt->add_spt($data);
        if ($result) {

            $last_insert = $this->db->insert_id();

            $pegawai = $this->input->post('pegawai');
            foreach ($pegawai as $nama) {
                $pgw = array(
                    'pegawai' => $nama,
                    'id_spt' => $last_insert,
                    'created_at' => $waktu,
                    'updated_at' => $waktu
                );
                $this->m_spt->add_spt_pgw($pgw);
            }

            $this->session->set_flashdata('success', 'Berhasil Disimpan!!.');
            redirect(site_url('spt'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
            redirect(site_url('spt'));
        }
    }
    
    public function get_spt()
    {

        $id = $this->input->post("sptId");

        if (isset($id) and !empty($id)) {
            $record = $this->db->query("SELECT spt.*, 
            (SELECT GROUP_CONCAT(pgw.pegawai)FROM tbl_spt_pegawai pgw WHERE pgw.id_spt = spt.id_spt) AS pegawai 
            FROM tbl_spt spt WHERE id_spt='$id'")->result();
            $pgw = $this->db->query("SELECT * FROM tbl_pegawai")->result();

            $output = "";
            $abc = "";
    
            foreach ($pgw as $row) {
                $abc .= '<option value="' . $row->pegawai . '">' . $row->pegawai . '</option>';
            }    

            foreach ($record as $rows) {

                $output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit SPT</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . site_url("spt/edit_spt") . '" method="post" enctype="multipart/form-data">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tanggal Berangkat</label>
                                                    <input class="form-control" type="hidden" name="id_spt" value="' . $rows->id_spt . '">
                                                    <input class="form-control" type="date" name="tgl_berangkat" value="' . $rows->tgl_berangkat . '">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tanggal Pulang</label>
                                                    <input class="form-control" type="date" name="tgl_pulang" value="' . $rows->tgl_pulang . '">
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tujuan</label>
                                                    <input class="form-control" type="text" name="tujuan" value="' . $rows->tujuan . '">
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Pegawai</label>
                                                    <select class="form-control" id="pilih_pegawai" name="pegawai[]" style="width:100%">
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">File SPT</label>
                                                    <input type="file" name="filex" class="form-control">
                                                    <input type="hidden" name="old_file" class="form-control" value="' . $rows->file_spt . '">
                                                    <small class="red-text">Current File : <b>' . substr($rows->file_spt, 22) . '</b> *Jika tidak ada file/scan gambar surat, biarkan kosong!</small>
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
                        </div>
                    </div>
                ';
            }
            echo $output;
        } else {
            echo "";
        }
    }

    function hapus_spt($id)
    {
        $result = $this->m_spt->hapus_spt($id);

        if ($result) {
            $result2 = $this->m_spt->hapus_spt_pgw($id);
            if ($result2) {
                $this->session->set_flashdata('success', 'Data Berhasil dihapus!!.');
                redirect(site_url('spt'));
            } else {
                $this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
                redirect(site_url('spt'));
            }
        } else {
            $this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
            redirect(site_url('spt'));
        }
    }

    public function print_spt()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id = $_POST['id'];
        $data['spt'] = array(
            'tgl_berangkat' => $this->input->post('tgl_berangkat'),
            'tgl_pulang' => $this->input->post('tgl_pulang'),
            'tujuan' => $this->input->post('tujuan'),
            'dasar' => $this->input->post('dasar'),
            'untuk' => $this->input->post('untuk'),
            'pegawai' => $this->input->post('pegawai')
        );

        if ($id == "save") {
            print_r($data);
        } else {
            $this->pdf->filename = "print-spt-" . $waktu . ".pdf";
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->load_view('admin/spt/print_spt', $data);
            $this->pdf->render();
        }

        // $pegawai = $this->input->post('pegawai');
        // $tgl_berangkat = "";
        // $tgl_pulang = "";
        // $cek_berangkat = $this->db->query("SELECT * FROM tbl_pegawai WHERE pegawai LIKE '%$pegawai%' 
        // AND ( (tgl_berangkat='$tgl_berangkat') OR (tgl_pulang='$tgl_berangkat') )")->num_rows();

        // $cek_pulang = $this->db->query("SELECT * FROM tbl_pegawai WHERE pegawai LIKE '%$pegawai%' 
        // AND ( (tgl_berangkat='$tgl_pulang') OR (tgl_pulang='$tgl_pulang') )")->num_rows();

        // $result = $this->m_pegawai->add_pegawai($data);

        // if ($result) {
        //     $this->session->set_flashdata('success', 'Berhasil Disimpan!!.');
        //     redirect(site_url('spt/pegawai'));
        // } else {
        //     $this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
        //     redirect(site_url('spt/pegawai'));
        // }
    }

    public function pegawai()
    {

        $list = $this->db->query("SELECT * FROM tbl_pegawai")->result();
        $data = array(
            'title' => "Data Pegawai",
            'list' => $list
        );
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/spt/v_pegawai', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    public function tambah_pegawai()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $data = array(
            'pegawai' => $this->input->post('pegawai')
        );

        $result = $this->m_pegawai->add_pegawai($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Berhasil Disimpan!!.');
            redirect(site_url('spt/pegawai'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
            redirect(site_url('spt/pegawai'));
        }
    }

    public function get_pegawai()
    {

        $id = $this->input->post("id");

        if (isset($id) and !empty($id)) {
            $record = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_pegawai='$id'")->result();

            $output = "";

            foreach ($record as $rows) {

                $output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Pegawai</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . site_url("spt/edit_pegawai") . '" method="post" enctype="multipart/form-data">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Pegawai</label>
                                                    <input class="form-control" type="hidden" name="id_pegawai" value="' . $rows->id_pegawai . '">
                                                    <input class="form-control" type="text" name="pegawai" value="' . $rows->pegawai . '">
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
                        </div>
                    </div>
                ';
            }
            echo $output;
        } else {
            echo "";
        }
    }

    function edit_pegawai()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_pegawai = $this->input->post("id_pegawai");

        $data = array(
            'pegawai' => $this->input->post('pegawai')
        );

        $result = $this->m_pegawai->update_pegawai($data, $id_pegawai);

        if ($result) {
            $this->session->set_flashdata('success', 'User Berhasil Diupdate!!.');
            redirect(site_url('spt/pegawai'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Update Data!!.');
            redirect(site_url('spt/pegawai'));
        }
    }

    function hapus_pegawai($id)
    {
        $result = $this->m_pegawai->hapus_pegawai($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus!!.');
            redirect(site_url('spt/pegawai'));
        } else {
            $this->session->set_flashdata('error', 'Data Gagal dihapus!!.');
            redirect(site_url('spt/pegawai'));
        }
    }
}
