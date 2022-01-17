<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_user');
        
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

	public function index() {
		
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
		$this->load->view('admin/layouts/footer',$data);
	}

    public function tambah_user() {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $password = md5($this->input->post('password'));
        $id_sensor = $this->input->post('id_sensor');

        if ($id_sensor == 0) {
                $data_user = array(
                    'username' => $this->input->post('username'),
                    'password' => $password,
                    'password_text' => $this->input->post('password'),
                    'level' => $this->input->post('level'),
                    'status' => 0,
                    'created_at' => $waktu
                );

                $result = $this->m_user->simpan_user($data_user);

                if ($result) {
                    $this->session->set_flashdata('warning', 'User Berhasil disimpan, Tetapi User tidak dapat Login!!.');
                    redirect(site_url('user'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
                    redirect(site_url('user'));
                }

        } else {

            $data_user = array(
                'username' => $this->input->post('username'),
                'password' => $password,
                'password_text' => $this->input->post('password'),
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status'),
                'created_at' => $waktu
            );

            if ($hasil_user = $this->m_user->simpan_user($data_user)) {
                    $last_id_user = $this->db->insert_id();
            }

            $data_kamar = array(
                'id_user' => $last_id_user,
                'status_kamar' => 1
            );

            $result = $this->m_user->update_kamar($data_kamar, $id_sensor);

            if ($result) {
                $this->session->set_flashdata('success', 'User Berhasil Disimpan!!.');
                redirect(site_url('user'));
            } else {
                $this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
                redirect(site_url('user'));
            }

        }
        

    }

	public function get_user() {
		
		$id = $this->input->post("userId");


        $kamar = $this->db->query("SELECT * FROM sensor WHERE status_kamar = 0")->result();

        foreach ($kamar as $rows) {
            $id_sensor = $rows->id_sensor;
            $nama = $rows->nama;
        }

        $count_kamar = $this->db->query("SELECT * FROM sensor WHERE status_kamar = 0")->num_rows();

        if(isset($id) and !empty($id)){
            $record = $this->db->query("SELECT * FROM users LEFT JOIN sensor USING(id_user) WHERE users.id_user='$id'")->result();

                if ($record[0]->level == 1) {
                    error_reporting(0);
                    $level1 = "selected";
                } else {
                    error_reporting(0);
                    $level2 = "selected";
                }

                if ($record[0]->id_sensor == 1) {
                    error_reporting(0);
                    $kamar1 = "selected";
                } else {
                    error_reporting(0);
                    $kamar2 = "selected";
                }

                if ($record[0]->status == 1) {
                    error_reporting(0);
                    $status1 = "selected";
                } else {
                    error_reporting(0);
                    $status0 = "selected";
                }


        if ($record[0]->level == 2) {

            if ($record[0]->id_sensor == NULL) {

                if ($count_kamar > 0) {

                $a = '                      <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Pilih Kamar</label>
                                                    <select class="form-control" name="id_sensor">

                                                            <option value="'.$id_sensor.'">'.$nama.'</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Level User</label>
                                                    <select class="form-control" name="level">
                                                        <option value="1" '.$level1.'>Admin</option>
                                                        <option value="2" '.$level2.'>Pengguna</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Status User</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="1" '.$status1.'>Aktif</option>
                                                        <option value="0" '.$status0.'>Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>

                    ';


                } else {

                $a = '                      <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="id_sensor" class="form-control" value="0">
                                                    <label class="control-label">Pilih Kamar</label>
                                                    <input type="text" class="form-control" name="kamar" value="Kamar Penuh" disabled="">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Level User</label>
                                                    <select class="form-control" name="level">
                                                        <option value="1" '.$level1.'>Admin</option>
                                                        <option value="2" '.$level2.'>Pengguna</option>
                                                    </select>
                                                </div>
                                            </div>
                ';
                                                    
                }

            } else {

                if ($count_kamar > 0) {

                $a = '                      <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Pindah Kamar</label>
                                                    <select class="form-control" name="id_sensor">
                                                            <option value="0">Pilih Kamar</option>
                                                            <option value="'.$id_sensor.'">'.$nama.'</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Keluar Kamar</label>
                                                    <select class="form-control" name="keluar">
                                                        <option value="1">Tidak</option>
                                                        <option value="0">Ya</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Level User</label>
                                                    <select class="form-control" name="level">
                                                        <option value="1" '.$level1.'>Admin</option>
                                                        <option value="2" '.$level2.'>Pengguna</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Status User</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="1" '.$status1.'>Aktif</option>
                                                        <option value="0" '.$status0.'>Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>

                    ';


                } else {

                $a = '                      <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="id_sensor" class="form-control" value="0">
                                                    <label class="control-label">Pilih Kamar</label>
                                                    <input type="text" class="form-control" name="kamar" value="'.$record[0]->nama.'" disabled="">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Keluar Kamar</label>
                                                    <select class="form-control" name="keluar">
                                                        <option value="1">Tidak</option>
                                                        <option value="0">Ya</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Level User</label>
                                                    <select class="form-control" name="level">
                                                        <option value="1" '.$level1.'>Admin</option>
                                                        <option value="2" '.$level2.'>Pengguna</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Status User</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="1" '.$status1.'>Aktif</option>
                                                        <option value="0" '.$status0.'>Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                ';
                                                    
                }

            }

        } else {
            $a = '<input class="form-control" type="hidden" name="level" value="'.$record[0]->level.'">';
        }
        

            $output = "";

            foreach ($record as $rows) {


                $output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="'. site_url("user/edit_user").'" method="post" enctype="multipart/form-data">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Username</label>
                                                    <input class="form-control" type="hidden" name="id_user" value="'.$rows->id_user.'">
                                                    <input class="form-control" type="text" name="username" value="'.$rows->username.'">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input class="form-control" type="text" name="password" value="'.$rows->password_text.'">
                                                </div>
                                            </div>

                                        </div> 

                                        <div class="row">

                                            '.$a.'

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

    function hapus($id) {

       $query = $this->db->query("SELECT * FROM users LEFT JOIN sensor USING(id_user) WHERE users.id_user='$id'")->result();

       if ($query[0]->id_sensor == NULL) {

           $result = $this->m_user->delete_user($id);

           if($result){

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
