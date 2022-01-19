<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_user');

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }
    }

    public function index()
    {

        $users = $this->db->query("SELECT * FROM tbl_user")->result();
        // print_r($count_kamar);
        // exit();
        $data = array(
            'title' => "Data User",
            'users' => $users
            //'count_usulan' => $count_usulan,
            //'count_instansi' => $count_instansi,
            //'iklan' => $iklan
        );
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/users/v_users', $data);
        $this->load->view('admin/layouts/footer', $data);
    }

    public function tambah_user()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');
        
        $id_bidang = $this->input->post('bidang');
        $nama_bidang = $this->db->limit(1)->query("SELECT nama FROM `tbl_struktural` WHERE id_struk=$id_bidang")->row()->nama;

        $password = md5($this->input->post('password'));
        $data_user = array(
            'username' => $this->input->post('username'),
            'password' => $password,
            'nama' => $this->input->post('nama'),
            'nip' => $nama_bidang,
            'admin' => $this->input->post('admin'),
            'status' => 1
        );

        $result = $this->m_user->simpan_user($data_user);

        if ($result) {
            $this->session->set_flashdata('success', 'User Berhasil Disimpan!!.');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
            redirect(site_url('user'));
        }
    }

    public function get_user()
    {

        $id = $this->input->post("userId");

        if (isset($id) and !empty($id)) {
            $record = $this->db->query("SELECT * FROM tbl_user WHERE id_user='$id'")->result();
            $struk = $this->db->query("SELECT * FROM tbl_struktural")->result();

            $output = "";
            $abc = "";

            foreach ($struk as $row) {
                $abc .= '<option value="' . $row->id_struk . '">' . $row->nama . '</option>';
            }

            foreach ($record as $rows) {

                $output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="' . site_url("user/edit_user") . '" method="post" enctype="multipart/form-data">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Username</label>
                                                    <input class="form-control" type="hidden" name="id_user" value="' . $rows->id_user . '">
                                                    <input class="form-control" type="text" name="username" value="' . $rows->username . '">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input class="form-control" type="text" name="password" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama</label>
                                                    <input class="form-control" type="text" name="nama" value="' . $rows->nama . '">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Bidang</label>
                                                    <select class="form-control" id="bidang" type="text" name="bidang" required>
                                                        <option value="' . $rows->nip . '" >' . $rows->nip . '</option>
                                                        '.$abc.'
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
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
                        </div>
                    </div>
                ';
            }
            echo $output;
        } else {
            echo "";
        }
    }

    function edit_user()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id_user = $this->input->post("id_user");
        $pw = $this->input->post("password");

        $id_bidang = $this->input->post('bidang');
        $nama_bidang = $this->db->limit(1)->query("SELECT nama FROM `tbl_struktural` WHERE id_struk=$id_bidang")->row()->nama;

        //ganti password
        if(!empty($pw)){
            $data_user = array(
                'username' => $this->input->post('username'),
                'password' => md5($pw),
                'nama' => $this->input->post('nama'),
                'nip' => $nama_bidang,
                'admin' => $this->input->post('admin'),
                'status' => $this->input->post('status')
            );
        } else{
            $data_user = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'nip' => $nama_bidang,
                'admin' => $this->input->post('admin'),
                'status' => $this->input->post('status')
            );
        }

        $result = $this->m_user->update_user($data_user, $id_user);

        if ($result) {
            $this->session->set_flashdata('success', 'User Berhasil Diupdate!!.');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Update Data!!.');
            redirect(site_url('user'));
        }
    }

    function hapus($id)
    {
        $result = $this->m_user->delete_user($id);

            if ($result) {
                $this->session->set_flashdata('success', 'Data User Berhasil dihapus!!.');
                redirect(site_url('user'));
            } else {
                $this->session->set_flashdata('error', 'Data User Gagal dihapus!!.');
                redirect(site_url('user'));
            }
            
    }
}
