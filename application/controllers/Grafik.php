<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {
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

    	$sensor = $this->db->query("SELECT transaksi_sensor.*, sensor.nama FROM transaksi_sensor JOIN sensor USING(id_sensor) WHERE id_user = '$id_user' ORDER BY id_transaksi DESC LIMIT 50")->result();

    	$forname = $this->db->query("SELECT transaksi_sensor.*, sensor.nama FROM transaksi_sensor RIGHT JOIN sensor USING(id_sensor) WHERE id_user = '$id_user' ORDER BY id_transaksi DESC")->result();

    	foreach ($forname as $rows) {
    		$nama = "Grafik Beban ". $rows->nama;
    	}

		$data = array(
			'title' => $nama,
			'sensor1' => $sensor,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/grafik/v_grafik', $data);
		$this->load->view('admin/layouts/footer',$data);
    }

	public function grafik1() {
		
		$sensor1 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 1 ORDER BY id_transaksi LIMIT 50")->result();
		$data = array(
			'title' => "Grafik Beban 1",
			'sensor1' => $sensor1,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/grafik/v_beban1', $data);
		$this->load->view('admin/layouts/footer',$data);
	}

	public function grafik2() {
		
		$sensor2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2 ORDER BY id_transaksi LIMIT 50")->result();
		$data = array(
			'title' => "Grafik Beban 2",
			'sensor2' => $sensor2,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/grafik/v_beban2', $data);
		$this->load->view('admin/layouts/footer',$data);
	}



}
