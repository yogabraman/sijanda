<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrol extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_kontrol');
        
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

	public function index() {
		
		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');

		$sensor1 = $this->db->query("SELECT * FROM sensor WHERE id_sensor = 1")->result();
		$sensor2 = $this->db->query("SELECT * FROM sensor WHERE id_sensor = 2")->result();

		if ($level != 1) {
           $kontrol_user = $this->db->query("SELECT * FROM sensor WHERE id_user = '$id_user'")->result();

            foreach ($kontrol_user as $rows) {
                $nama = "Kontrol ". $rows->nama;
                $id_sensor = $rows->id_sensor;
            }
        } else {
            $nama = "";
            $kontrol_user = "";
            $id_sensor = "";
        }

		$data = array(
			'title' => "Kontrol",
			'sensor1' => $sensor1,
			'sensor2' => $sensor2,
			'title_user' => $nama,
			'kontrol_user' => $kontrol_user,
			'id_sensor' => $id_sensor
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/kontrol/v_kontrol', $data);
		$this->load->view('admin/layouts/footer',$data);
	}

	public function sensor1($value) {

		$id = 1;
		$output = "";

		if($value == 1){
			$output = "Saklar ON!!";
		} else {
			$output = "Saklar OFF!!";
		}

		$data_sensor = array(
            'saklar' => $value
        );
		
		$result = $this->m_kontrol->kontrol($data_sensor, $id);

        if($result) {
            $this->session->set_flashdata('success', $output);
            redirect(site_url('kontrol'));
        } else {
            $this->session->set_flashdata('error', 'Saklar Error!!.');
            redirect(site_url('kontrol'));
        }
	}

	public function sensor2($value) {

		$id = 2;
		$output = "";

		if($value == 1){
			$output = "Saklar ON!!";
		} else {
			$output = "Saklar OFF!!";
		}

		$data_sensor = array(
            'saklar' => $value
        );
		
		$result = $this->m_kontrol->kontrol($data_sensor, $id);

        if($result) {
            $this->session->set_flashdata('success', $output);
            redirect(site_url('kontrol'));
        } else {
            $this->session->set_flashdata('error', 'Saklar Error!!.');
            redirect(site_url('kontrol'));
        }
	}



}
