<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mushaf extends CI_Controller
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
        $this->load->view('linkmushaf', $data);
    }

    function getHalaman($surat, $ayat)
    {
        include "koneksi.php";
        $queryview = mysqli_query($koneksi, "SELECT * FROM `halaman` WHERE nosurat = $surat and ayatawal <= $ayat ORDER BY no_halaman DESC LIMIT 1") or die(mysqli_error($koneksi));
        $halaman = mysqli_fetch_array($queryview);
        $kanan = $halaman['no_halaman'];
        if (mysqli_num_rows($queryview) == 0) {
            $surat = $surat - 1;
            $queryview = mysqli_query($koneksi, "SELECT * FROM `halaman` WHERE nosurat = $surat ORDER BY no_halaman DESC LIMIT 1") or die(mysqli_error($koneksi));
            $halaman = mysqli_fetch_array($queryview);
            $kanan = $halaman['no_halaman'];
        }
        return $kanan;
    }

    function getNamaSurat($surat)
    {
        include "koneksi.php";
        $queryview = mysqli_query($koneksi, "SELECT * FROM `daftarsurah` WHERE nosurat = $surat LIMIT 1") or die(mysqli_error($koneksi));
        $surah = mysqli_fetch_array($queryview);
        $namasurat = $surah['nama'];
        return $namasurat;
    }

    function view()
    {
        $data["pengaturan"] = $this->pengaturan_model->getPengaturan(1);
        $acara = $data['pengaturan']->acara;
        $acara = str_replace("<petik>", "'", $acara);
        $data['acara'] = $acara;
        $this->load->view('mushaf', $data);
    }

}
