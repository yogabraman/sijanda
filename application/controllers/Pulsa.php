<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pulsa extends CI_Controller {
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

        $id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');

		$pulsa = $this->db->query("SELECT * FROM sensor")->result();

        if ($level != 1) {
           $pulsa_user = $this->db->query("SELECT * FROM sensor WHERE id_user = '$id_user'")->result();

            foreach ($pulsa_user as $rows) {
                $nama = "Isi Pulsa ". $rows->nama;
            }
        } else {
            $nama = "";
            $pulsa_user = "";
        }
        

		$data = array(
			'title' => "Pulsa",
            'title_user' => $nama,
			'pulsa' => $pulsa,
            'pulsa_user' => $pulsa_user
			//'count_usulan' => $count_usulan,
			//'count_instansi' => $count_instansi,
			//'iklan' => $iklan
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/pulsa/v_pulsa', $data);
		$this->load->view('admin/layouts/footer',$data);
	}

	public function get_pulsa() {
		
		$id = $this->input->post("sensorId");

        if(isset($id) and !empty($id)){
            $record = $this->db->query("SELECT * FROM sensor WHERE id_sensor='$id'")->result();
            $output = "";

            foreach ($record as $rows) {

                $output .= '
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Isi Pulsa</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="'. site_url("pulsa/isi_pulsa").'" method="post" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row p-t-20">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                <input type="hidden" name="id_pelanggan" class="form-control" value="'.$rows->id_pelanggan.'">
                                                <input type="hidden" name="id_sensor" class="form-control" value="'.$rows->id_sensor.'">
                                                <input type="hidden" name="pulsa" class="form-control" value="'.$rows->pulsa.'">
                                                    <label class="control-label">Sensor</label>
                                                    <input type="text" name="nama" class="form-control" value="'.$rows->nama.'" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Masukan Token</label>
                                                    <input type="text" id="token" name="token" class="form-control" placeholder="XXXX-XXXX-XXXX">
                                                </div>
                                            </div>

                                        </div>  

                                        <div class="row" align="right">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Isi Pulsa</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                ';
            }
            echo $output;
        } else {
            echo "";
        }
	}

	function isi_pulsa()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $id = $this->input->post("id_pelanggan");
        $id_sensor = $this->input->post("id_sensor");
        $saldoku = $this->input->post("pulsa");
        $token = $this->input->post("token");

        $search = $this->db->query("SELECT * FROM token WHERE token = '$token' AND status_token = 0 AND id_pelanggan = '$id'")->result_array();

        $kwh = $search[0]['kwh'];
        $id_token = $search[0]['id_token'];

        // print_r($kwh);
        // exit();

        $saldo = $saldoku + $kwh;

        

        if ($search) {

            $data_token = array(
                'status_token' => 1
            );
            $data_saldo = array(
                'pulsa' => $saldo
            );

            $result = $this->m_pulsa->isi_pulsa($data_saldo, $id_sensor);
            $result = $this->m_pulsa->update_token($data_token, $id_token);
            $this->session->set_flashdata('success', 'Top Up Berhasil!!.');
            redirect(site_url('pulsa'));
            
        } else {

            $this->session->set_flashdata('error', 'Token Salah Atau Token Sudah Digunakan!!.');
            redirect(site_url('pulsa'));
        }

        
    }



}
