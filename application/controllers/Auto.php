<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_auto');

        // if ($this->session->userdata('status') != "login") {
        //     redirect('login');
        // }
    }

    public function auto_asal()
    {
        // $sql="SELECT * FROM tbl_surat_masuk WHERE asal_surat LIKE '%$searchTerm%' ORDER BY asal_surat ASC";

        if (isset($_GET['term'])) {
            $result = $this->m_auto->getAsal($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->asal_surat;
                echo json_encode($arr_result);
            }
        }
    }
}
