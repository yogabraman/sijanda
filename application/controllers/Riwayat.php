<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
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

    	$sensor = $this->db->query("SELECT transaksi_sensor.*, sensor.nama FROM transaksi_sensor JOIN sensor USING(id_sensor) WHERE id_user = '$id_user' ORDER BY id_transaksi DESC")->result();

    	$forname = $this->db->query("SELECT transaksi_sensor.*, sensor.nama FROM transaksi_sensor RIGHT JOIN sensor USING(id_sensor) WHERE id_user = '$id_user' ORDER BY id_transaksi DESC")->result();

    	foreach ($forname as $rows) {
    		$nama = "Riwayat Beban ". $rows->nama;
    	}

		$data = array(
			'title' => $nama,
			'sensor' => $sensor,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/riwayat/v_riwayat', $data);
		$this->load->view('admin/layouts/footer',$data);
    }

	public function beban1() {
		
		$sensor1 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 1")->result();
		$data = array(
			'title' => "Riwayat Beban 1",
			'sensor1' => $sensor1,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/riwayat/v_beban1', $data);
		$this->load->view('admin/layouts/footer',$data);
	}

	public function beban2() {
		
		$sensor2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2")->result();
		$data = array(
			'title' => "Riwayat Beban 2",
			'sensor2' => $sensor2,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/riwayat/v_beban2', $data);
		$this->load->view('admin/layouts/footer',$data);
	}



}
