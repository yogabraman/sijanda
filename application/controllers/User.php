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

        $password = md5($this->input->post('password'));
        $data_user = array(
            'username' => $this->input->post('username'),
            'password' => $password,
            'level' => $this->input->post('level'),
            'status' => 0,
            'created_at' => $waktu
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
        $id_sensor = $this->input->post("id_sensor");
        $username = $this->input->post("username");
        $password = md5($this->input->post('password'));
        $password_text = $this->input->post('password');
        $level = $this->input->post("level");

        $saldoku = $this->input->post("pulsa");
        $token = $this->input->post("token");

        $search = $this->db->query("SELECT * FROM token WHERE token = '$token' AND status_token = 0 AND id_pelanggan = '$id'")->result_array();

        $kwh = $search[0]['kwh'];
        $id_token = $search[0]['id_token'];

        // print_r($kwh);
        // exit();

        $saldo = $saldoku + $kwh;



        if ($search) {

            $data_token = array(
                'status_token' => 1
            );
            $data_saldo = array(
                'pulsa' => $saldo
            );

            $result = $this->m_pulsa->isi_pulsa($data_saldo, $id);
            $result = $this->m_pulsa->update_token($data_token, $id_token);
            $this->session->set_flashdata('success', 'Top Up Berhasil!!.');
            redirect(site_url('pulsa'));
        } else {

            $this->session->set_flashdata('error', 'Token Salah Atau Token Sudah Digunakan!!.');
            redirect(site_url('pulsa'));
        }
    }

    function hapus($id)
    {

        $query = $this->db->query("SELECT * FROM users LEFT JOIN sensor USING(id_user) WHERE users.id_user='$id'")->result();

        if ($query[0]->id_sensor == NULL) {

            $result = $this->m_user->delete_user($id);

            if ($result) {

                $this->session->set_flashdata('success', 'Data User Berhasil dihapus!!.');
                redirect(site_url('user'));
            } else {
                $this->session->set_flashdata('error', 'Data User Gagal dihapus!!.');
                redirect(site_url('user'));
            }
        } else {

            $data_sensor =  array(
                'id_user' => 0,
                'status_kamar' => 0
            );

            $update_kamar = $this->m_user->updel_kamar($data_sensor, $id);
            $result = $this->m_user->delete_user($id);

            if ($update_kamar && $result) {
                $this->session->set_flashdata('success', 'Data User Berhasil dihapus!!.');
                redirect(site_url('user'));
            } else {
                $this->session->set_flashdata('error', 'Data User Gagal dihapus!!.');
                redirect(site_url('user'));
            }
        }
    }
}
