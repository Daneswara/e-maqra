<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tafsir extends CI_Controller
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
        $this->load->model("kategori_model");
        $this->load->library('form_validation');

        $username = $this->session->userdata('username');
        if(!isset($username)){
            redirect(base_url('index.php/Login'));
        }
    }

    public function index($pilihan = 1)
    {
        $data["pengaturan"] = $this->pengaturan_model->getPengaturan(1);
        $data["kategori"] = $this->kategori_model->getKategoriTafsir();
        $acara = $data['pengaturan']->acara;
        $acara = str_replace("<petik>", "'", $acara);
        $data['acara'] = $acara;
        $data['pilihan'] = $pilihan;
        $this->load->view('hifzhil', $data);
    }
}
