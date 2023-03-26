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

    function kirim_file_saja($nomor_pengirim_kirim, $nomor_tujuan_kirim, $pesan_kirim)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        $token_pengguna_TEMPLATE = "fb176fda94ad70ec8cc65456d1d5906a";
        $protocol_TEMPLATE = "http";
        $host_TEMPLATE = "103.9.227.189:9033";

        $token_pengguna = $token_pengguna_TEMPLATE;
        $url = $protocol_TEMPLATE . '://' . $host_TEMPLATE . '/actions/aaa_api_kirim.php';
        $data = array(
            "id_jenis_kirim"        => 4, //1=BUTTON, 2=LIST, 4=PESAN SAJA, 5=GAMBAR & PESAN, 6=BERKAS SAJA
            "nomor_pengirim_kirim"    => $nomor_pengirim_kirim, //*=NOMOR BERAPA SAJA YG KIRIM, KALO MAU SET NO. PENGIRIM TERTENTU, AWALI 62
            "nomor_tujuan_kirim"    => $nomor_tujuan_kirim,
            "token_pengguna"        => $token_pengguna,
            "pesan_kirim"            => $pesan_kirim,
            "gambar_kirim"            => '',
            "file_kirim"            => '',
            "base64_string"            => ''
        );

        // $url = "http://127.0.0.1/rest_ci/index.php/kontak";
        // $data = array(
        //     'id'        => 17,
        //     'nama'      => "xxx",
        //     'nomor'     => "08832432478"
        // );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);

        echo $res = curl_exec($ch);
        curl_close($ch);
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

    public function auto_surat()
    {
        // $sql="SELECT * FROM tbl_surat_masuk WHERE asal_surat LIKE '%$searchTerm%' ORDER BY asal_surat ASC";

        if (isset($_GET['term'])) {
            // $result = $this->m_auto->getSurat($_GET['term']);
            $searchTerm = $_GET['term'];
            $result = $this->db->query("SELECT * FROM tbl_surat_masuk WHERE isi LIKE '%$searchTerm%' OR 
                no_surat LIKE '%$searchTerm%' ")->result();
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array('label' => $row->isi, 'value' => $row->id_surat);
                echo json_encode($arr_result);
            }
        }
    }
}
