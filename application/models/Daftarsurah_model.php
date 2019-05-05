<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Daftarsurah_model extends CI_Model
{
    private $_table = "daftarsurah";

    public $id;
    public $kategori;
    public $nosurat;
    public $nama;
    public $awal;
    public $akhir;

    public function rules()
    {
    }

    function getAllNamaSurah(){
        $this->db->select('nosurat,nama');
        $this->db->distinct();
        $this->db->order_by('nosurat', 'asc');
        return $this->db->get($this->_table)->result();
    }

    function getJumlahAyat($nosurat){
        $hasil = $this->db->get_where($this->_table, ['nosurat' => $nosurat])->last_row();
        return $hasil->akhir;
    }
}