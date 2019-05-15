<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hifzhil extends CI_Controller
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
        $data["kategori"] = $this->kategori_model->getKategoriHifzhilPaket();
        $acara = $data['pengaturan']->acara;
        $acara = str_replace("<petik>", "'", $acara);
        $data['acara'] = $acara;
        $data['pilihan'] = $pilihan;
        $this->load->view('hifzhil', $data);
    }
    public function otomatis($pilihan = 1)
    {
        $data["pengaturan"] = $this->pengaturan_model->getPengaturan(1);
        $data["kategori"] = $this->kategori_model->getKategoriHifzhilOtomatis();
        $acara = $data['pengaturan']->acara;
        $acara = str_replace("<petik>", "'", $acara);
        $data['acara'] = $acara;
        $data['pilihan'] = $pilihan;
        $this->load->view('hifzhil', $data);
    }
    public function otomatisterkelompok($pilihan = 1)
    {
        $data["pengaturan"] = $this->pengaturan_model->getPengaturan(1);
        $data["kategori"] = $this->kategori_model->getKategoriHifzhilOtomatisTerkelompok();
        $acara = $data['pengaturan']->acara;
        $acara = str_replace("<petik>", "'", $acara);
        $data['acara'] = $acara;
        $data['pilihan'] = $pilihan;
        $this->load->view('hifzhil', $data);
    }


    public function acakHifzhilOtomatis()
    {
        $post = $this->input->post();
        $getkat = $post['kategori'];
        $where = $this->getWhere($getkat);


        $pengaturan = $this->pengaturan_model->getPengaturan(1);
        $jumlahsoal = $pengaturan->jumlahsoal + $pengaturan->jumlahsoalmudah;


    }

    public function getWhere($getkat){
        $pecah = explode("_",$getkat);
        $kategori = $pecah[0];

        if (strpos($kategori, "-") != false) {
            $kat = explode("-", $kategori);
            $where = "juz >= $kat[0] AND juz <= $kat[1]";
        } else if (strpos($kategori, ",")) {
            $kat = explode(",", $kategori);
            $where = "";
            for ($i = 0; $i < count($kat); $i++) {
                if ($i == count($kat) - 1) {
                    $where .= "juz = $kat[$i]";
                } else {
                    $where .= "juz = $kat[$i] OR ";
                }
            }
        } else {
            $where = "juz = $kategori";
        }
        return $where;
    }
}
