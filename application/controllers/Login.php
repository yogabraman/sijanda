<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_login');
        $this->load->library('session');

        
    }

	public function index() {

        // $hash = "123";

        // $salt = 'sigap';

        // $result = md5($salt . $hash);

        // print_r($result);
        // exit();

        if ($this->session->userdata('status') == "login")
        {

            redirect('dashboard');

        }else{
            // $data['coba'] = $this->db->query("SELECT * FROM user WHERE username='mnkmon'")->result();
            $data = array(
                'title' => "Login"
            );
            $this->load->view('admin/layouts/header-login', $data);
            $this->load->view('admin/login/v_login');
            $this->load->view('admin/layouts/footer-login', $data);
        }

		
	}

	function proses_login() {
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date('Y-m-d H:i:s');

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $where = array(
                'username' => $username,
                'password' => $password
            );

            $data_update = array(
                'islogin' => 1,
                'lastlogin' => $waktu
            );

            $login = $this->m_login->cek_user("users", $where)->result_array();

            
            if(!empty($login)) {

                $update_login = $this->m_login->update_user($data_update, $username);

                $data_login = array(

                    'id_user' => $login[0]['id_user'],
                    'nama' => $username,
                    'status' => "login",
                    'level' => $login[0]['admin'],
                    'bidang' => $login[0]['nip']
                );

                // print_r($data_login);
                // exit();

                

                // login berhasil
                $this->session->set_flashdata('success', 'Berhasil Login!!');
                $this->session->set_userdata($data_login);
                redirect('dashboard');

            } else {
                // login gagal
                $this->session->set_flashdata('error', 'Username atau Password Salah atau Akun Anda Tidak Ada Akses!!');
                redirect('login');
            }
        }


    function logout($user){

            $this->session->sess_destroy();
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date('Y-m-d H:i:s');

            $data_logout = array(
                'islogin' => 0,
                'lastlogin' => $waktu
            );

            $result = $this->m_login->logout($data_logout, $user);

            if($result){
                $this->session->set_flashdata('success', 'Berhasil Logout!!');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Gagal Logout!!');
                redirect('login');
            }
        }



}
