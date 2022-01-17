<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

    public function index(){

    	$id_user = $this->session->userdata('id_user');

    	// foreach ($forname as $rows) {
    	// 	$nama = "Riwayat Beban ". $rows->nama;
    	// }

		$data = array(
			'title' => "Agenda",
			// 'sensor' => $sensor,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/riwayat/v_riwayat', $data);
		$this->load->view('admin/layouts/footer',$data);
    }

	public function list2() {
		
		$agenda = $this->db->query("SELECT * FROM tbl_agenda ORDER by tgl_agenda DESC, waktu_agenda DESC ")->result();
		$data = array(
			'title' => "List Agenda",
			'agenda' => $agenda,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/agenda/v_list2', $data);
		$this->load->view('admin/layouts/footer',$data);
	}

	public function cetak2() {
		
		// $sensor2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2")->result();
		$data = array(
			'title' => "Cetak Agenda",
			// 'sensor2' => $sensor2,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/agenda/v_cetak2', $data);
		$this->load->view('admin/layouts/footer',$data);
	}

	public function cetakbydate() {
		
		// $sensor2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2")->result();
		$data = array(
			'title' => "Riwayat Beban 2",
			// 'sensor2' => $sensor2,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/agenda/v_cetak2', $data);
		$this->load->view('admin/layouts/footer',$data);
	}



}
