<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

	public function index() {

		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('admin');

		//menghitung jumlah surat masuk
		$count1 = $this->db->query("SELECT * FROM tbl_surat_masuk")->num_rows();

		//menghitung jumlah surat keluar
		$count2 = $this->db->query("SELECT * FROM tbl_surat_keluar")->num_rows();

		//menghitung jumlah disposisi
		$count3 = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE status_dispo=0")->num_rows();

		//menghitung jumlah disposisi
		$count4 = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE status_dispo=1")->num_rows();

		//menghitung jumlah user
		$count5 = $this->db->query("SELECT * FROM tbl_user")->num_rows();

		$data = array(
			'title' => "Dashboard",
			'count1' => $count1,
			'count2' => $count2,
			'count3' => $count3,
			'count4' => $count4,
			'count5' => $count5,
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/dashboard/v_dashboard', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function add(){
		$data_client = array(
			''
		);
	}



}
