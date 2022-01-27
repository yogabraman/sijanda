<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dispo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_dispo');
		$this->load->model('m_sm');
        $this->load->library('pdf');

		if ($this->session->userdata('status') != "login") {
			redirect('login');
		}
	}

	public function get_dispo($id)
	{

		$id_user = $this->session->userdata('id_user');
        $id_surat = $this->input->post("suratId");

		$dispo = $this->db->query("SELECT * FROM tbl_disposisi WHERE id_surat ='$id'")->result();

		$data = array(
			'title' => "Disposisi",
			'dispo' => $dispo
		);
		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/dispo/v_dispo', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	public function add_dispo(){
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$id_user = $this->session->userdata('id_user');
		$bidang = json_encode($this->input->post('bidang'));
		$perintah = json_encode($this->input->post('perintah'));
		$id_surat = $this->input->post('id_surat');

		$tipe_surat = $this->db->limit(1)->query("SELECT tipe_surat FROM tbl_surat_masuk WHERE id_surat ='$id_surat'")->row()->tipe_surat;
		// echo $tipe_surat;

		$data_dispo = array(
			'tujuan' => $bidang,
			'perintah' => $perintah,
			'isi_disposisi' => $this->input->post('isi_disposisi'),
			'sifat' => $this->input->post('sifat'),
			'tgl_dispo' => $waktu,
			'catatan' => $this->input->post('catatan'),
			'id_surat' => $id_surat,
			'id_user' => $id_user
		);

		$data_sm = array(
			'status_dispo' => 1
		);

		$data_ag = array(
			'dispo' => $bidang
		);
		
		$result = $this->m_dispo->add_dispo($data_dispo);
		//update surat masuk
		$this->m_sm->update_sm($data_sm,$id_surat);

		if ($result) {
			if ($tipe_surat == 1) {
				$this->m_sm->update_ag($data_ag,$id_surat);
			}
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan!!.');
			redirect(site_url('surat_masuk/list'));
		} else {
			$this->session->set_flashdata('error', 'Gagal Simpan Data!!.');
			redirect(site_url('surat_masuk/list'));
		}
	}

    public function print_dispo($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');
    
        $data['surat'] = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE id_surat='$id'")->result();
        $data['dispo'] = $this->db->query("SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk USING(id_surat) WHERE tbl_disposisi.id_surat='$id'")->result();

        // $this->pdf->setPaper('A4', 'potrait'); //landscape //potrait
        $this->pdf->filename = "print-disposisi-".$waktu.".pdf";
		$this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->load_view('admin/dispo/print_dispo', $data);
        $this->pdf->render();
    }
}
