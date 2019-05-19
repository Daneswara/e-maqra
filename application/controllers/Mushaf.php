<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mushaf extends CI_Controller
{
    public $surah;
    public $ayat;
    public $namasuratlink;
    public $surahakhir;
    public $ayatakhir;
    public $akhirnamasuratlink;
    public $kanan;

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
        $this->load->model("mushaf_model");
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

    function next($halaman)
    {
        $data['awal'] = 1;
        $data['kanan'] = $halaman+1;
        if($halaman+1 > 604){
            $data['kanan'] = 1;
        }
        $this->load->view('mushaf', $data);
    }

    function back($halaman)
    {
        $data['awal'] = 1;
        $data['kanan'] = $halaman-1;
        if($halaman-1 < 1){
            $data['kanan'] = 604;
        }
        $this->load->view('mushaf', $data);
    }

    function view()
    {
        $get = $this->input->get();
        $data['controller'] = $this;

//        if (isset($post['kanan'])) {
//            $this->kanan = $post['kanan'];
//        }
        $this->surah = $get['surat'];
        $this->ayat = $get['ayat'];

        $this->kanan = $this->mushaf_model->getHalaman($this->surah, $this->ayat)->no_halaman;

        if (isset($this->kanan)) {
            $data['kanan'] = $this->kanan;
            $data['awal'] = 1;
        } else {
            $data['awal'] = 0;
            $data['kanan'] = 1;
        }

        if ($this->kanan > 604 || $this->kanan < 1) {
            $data['kanan'] = 1;
        }
        $this->load->view('mushaf', $data);
    }

}
