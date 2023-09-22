<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->model('m_kuesioner');
	}

	public function index()
	{

		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$waktu = date('H:i');

		$data = array(
            'title' => "Kuesioner"
        );

		$this->load->view('layouts/header2', $data);
        $this->load->view('kuesioner', $data);
        $this->load->view('layouts/footer2', $data);
	}

	public function success()
	{

		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$waktu = date('H:i');

		$data = array(
            'title' => "Sukses Mengisi Kuesioner"
        );

		$this->load->view('layouts/header2', $data);
        $this->load->view('success', $data);
        $this->load->view('layouts/footer2', $data);
	}

    public function add_data()
    {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $data = array(
            'periode' => "202202",
            'tgl' => $this->input->post('tgl'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'umur' => $this->input->post('umur'),
            'gender' => $this->input->post('gender'),
            'alamat' => $this->input->post('alamat'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan')=="0"? $this->input->post('lain') : $this->input->post('pekerjaan'),
            'q1a' => $this->input->post('q1a'),
            'q2a' => $this->input->post('q2a'),
            'q3a' => $this->input->post('q3a'),
            'q4a' => $this->input->post('q4a'),
            'q5a' => $this->input->post('q5a'),
            'q6a' => $this->input->post('q6a'),
            'q7a' => $this->input->post('q7a'),
            'q8a' => $this->input->post('q8a'),
            'q9a' => $this->input->post('q9a'),
            'q1b' => $this->input->post('q1b'),
            'q2b' => $this->input->post('q2b'),
            'q3b' => $this->input->post('q3b'),
            'q4b' => $this->input->post('q4b'),
            'q5b' => $this->input->post('q5b'),
            'q6b' => $this->input->post('q6b'),
            'q7b' => $this->input->post('q7b'),
            'q8b' => $this->input->post('q8b'),
            'q9b' => $this->input->post('q9b'),
            'pungli' => $this->input->post('pungli'),
            'saran' => $this->input->post('saran'),
            'created_at' => $waktu
        );

        $result = $this->m_kuesioner->add_kue($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan!!.');
            redirect(site_url('kuesioner/success'));
        } else {
            $this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
            redirect(site_url('kuesioner'));
        }
    }
	
}
