<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ToolsAcak extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengaturan_model");
        $this->load->model("daftarsurah_model");
        $this->load->library('form_validation');

        $username = $this->session->userdata('username');
        if (!isset($username)) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data["pengaturan"] = $this->pengaturan_model->getPengaturan(1);
        $acara = $data['pengaturan']->acara;
        $acara = str_replace("<petik>", "'", $acara);
        $data['acara'] = $acara;
        $data['daftar_surah'] = $this->daftarsurah_model->getAllNamaSurah();
        $this->load->view('linkmushaf', $data);
    }

    public function getLink($surat, $ayat)
    {
        if (isset($_GET["surat1"]) && isset($_GET["ayat1"])) {
            $tempsurat = $_GET["surat1"];
            $tempayat = $_GET["ayat1"];

            $hal = getHalaman($tempsurat, $tempayat);
            $namasurat = getNamaSurat($tempsurat);
            $namasurat = str_replace("'", "petik", $namasurat);
            echo "<script type=\"text/javascript\">  window.open('mushaf.php?kanan=$hal&surah=$tempsurat&ayat=$tempayat&namasurat=$namasurat')</script>";
        }
    }
}
