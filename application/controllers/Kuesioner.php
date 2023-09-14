<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		// if($this->session->userdata('status') != "login"){
		//     redirect(site_url("login"));
		// }
	}

	public function index()
	{

		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$waktu = date('H:i');

		$data = array(
            'title' => "List Agenda"
        );

		$this->load->view('layouts/header2', $data);
        $this->load->view('kuesioner', $data);
        $this->load->view('layouts/footer2', $data);
	}
}
