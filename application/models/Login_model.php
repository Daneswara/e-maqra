<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    private $_table = "pengaturan";

    public $id;
    public $qori;
    public $jumlahsoal;
    public $jumlahsoalmudah;
    public $acara;
    public $logo;
    public $link_video;

    public function rules()
    {
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getPengaturan($id)
    {
        return $this->db->get_where($this->_table, ['id'=>$id])->row();
    }
}