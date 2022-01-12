<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_login');
        $this->load->library('session');

        
    }

	public function index() {

            $user = $this->session->userdata('nama');

            date_default_timezone_set('Asia/Jakarta');
            $waktu = date('Y-m-d H:i:s');

            $data_logout = array(
                'islogin' => 0,
                'lastlogin' => $waktu
            );

            $result = $this->m_login->logout($data_logout, $user);

            $this->session->sess_destroy();

            if($result){
                $this->session->set_flashdata('success', 'Berhasil Logout!!');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Gagal Logout!!');
                redirect('login');
            }
        }

		
	}
