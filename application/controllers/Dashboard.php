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
		$level = $this->session->userdata('level');
		
		if($level == 2){

			$dashboard_user = $this->db->query("SELECT transaksi_sensor.* FROM transaksi_sensor JOIN sensor USING(id_sensor) WHERE id_user = '$id_user' ORDER BY id_transaksi DESC LIMIT 1")->result();
			$id_sensor = $dashboard_user[0]->id_sensor;
		} else {
			$dashboard_user = $this->db->query("SELECT transaksi_sensor.* FROM transaksi_sensor JOIN sensor USING(id_sensor) WHERE id_user = '$id_user' ORDER BY id_transaksi DESC LIMIT 1")->result();
			$id_sensor = 0;
		}

		$dashboard1 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 1 ORDER BY created_at DESC LIMIT 1")->result();
		$dashboard2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2 ORDER BY created_at DESC LIMIT 1")->result();

		$grafik = $this->db->query("SELECT transaksi_sensor.* FROM transaksi_sensor JOIN sensor USING(id_sensor) WHERE id_user = '$id_user'")->result();

		$prediksi1 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 1 ORDER BY id_transaksi DESC")->row();

		$prediksi2 = $this->db->query("SELECT * FROM transaksi_sensor WHERE id_sensor = 2 ORDER BY id_transaksi DESC")->row();

		$data = array(
			'title' => "Dashboard",
			// 'created_at' => $created_at,
			'dashboard_user' => $dashboard_user,
			// 'pulsa' => $pulsa,
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
