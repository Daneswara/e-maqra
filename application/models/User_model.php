<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user";

    public $id;
    public $username;
    public $password;
    public $nama;

    public function rules()
    {
        return [
            ['field' => 'username',
                'label' => 'Username',
                'rules' => 'required'],
            ['field' => 'password',
                'label' => 'Password',
                'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function cekUserLogin()
    {
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = md5($post['password']);
        $hasil = $this->db->get_where($this->_table, ['username' => $this->username, 'password' => $this->password])->row();
        if ($hasil) {
            $this->session->set_userdata('username', $this->username);
            return true;
        } else {
            return false;
        }
    }
}