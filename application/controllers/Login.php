<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
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
        $this->load->model("user_model");
        $this->load->model("pengaturan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pengaturan"] = $this->pengaturan_model->getPengaturan(1);
        $this->load->view('login', $data);
    }

    public function proses()
    {
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            if($user->cekUserLogin()){
                $data["pengaturan"] = $this->pengaturan_model->getPengaturan(1);
                $this->load->view('hifzhil', $data);
            }
        }
    }
}
