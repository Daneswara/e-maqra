<?php defined('BASEPATH') OR exit('No direct script access allowed');


class alquran_model extends CI_Model
{
    private $_table = "alquran";

    public $id;
    public $juz;
    public $nama;
    public $surat;
    public $ayat;

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

    function getSoal($where){
        $this->db->order_by('id', 'asc');
        $this->db->where($where);
        $hasil = $this->db->get($this->_table)->result();
        return $hasil;
    }
}