<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_pulsa');
        
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }

	public function index() {
		
		$token = $this->db->query("SELECT * FROM sensor")->result();

		$data = array(
			'title' => "Token Pulsa",
			'token' => $token,
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/token/v_token', $data);
		$this->load->view('admin/layouts/footer',$data);
	}

	public function simpan_token() {

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');
        $tanggal = date('Y-m-d');
		
		$token = $this->input->post("token");
        $kwh = $this->input->post("kwh");
        $id_pelanggan = $this->input->post("id_pelanggan");

        $kamar = $this->db->query("SELECT * FROM sensor WHERE id_pelanggan = '$id_pelanggan'")->result_array();

        $data_token = array(
            'token' => $token,
            'kwh' => $kwh,
            'id_pelanggan' => $id_pelanggan,
            'tanggal_token' => $tanggal,
            'created_at' => $waktu
        );

        $query = $this->m_pulsa->simpan_token($data_token);

        // print_r($kwh);
        // exit();

        if($query){
            $output = "";

                $output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: green">Token Berhasil Ditambahkan!!</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row p-t-20">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nomor Token</label>
                                                    <input type="text" name="nama" class="form-control" value="'.$token.'" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Kamar</label>
                                                    <input type="text" name="kamar" class="form-control" value="'.$kamar[0]['nama'].'" disabled>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row p-t-20">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Id Pelanggan</label>
                                                    <input type="text" name="nama" class="form-control" value="'.$id_pelanggan.'" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Jumlah Kwh</label>
                                                    <input type="text" name="nama" class="form-control" value="'.$kwh.'" disabled>
                                                </div>
                                            </div>

                                        </div>  

                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <div class="row" align="right">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                                            </div>
                                        </div>
                        </div>
                    </div>
                ';
            echo $output;
        } else {
            echo "";
        }
	}

	function isi_pulsa()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id = $this->input->post("id_sensor");
        $saldoku = $this->input->post("pulsa");
        $topup = $this->input->post("topup");

        $saldo = $saldoku + $topup;

        $data_saldo = array(
            'pulsa' => $saldo
        );

        $result = $this->m_pulsa->isi_pulsa($data_saldo, $id);

        if($result) {
            $this->session->set_flashdata('success', 'Top Up Berhasil!!.');
            redirect(site_url('pulsa'));
        } else {
            $this->session->set_flashdata('error', 'Top Up Gagal!!.');
            redirect(site_url('pulsa'));
        }
    }



}
