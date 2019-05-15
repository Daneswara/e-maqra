<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Kategori_model extends CI_Model
{
    private $_table = "kategori";

    public $id;
    public $urutan;
    public $nama;
    public $jenis;
    public $index;

    public function rules()
    {
    }

    function getKategoriHifzhilOtomatis()
    {
        $this->db->order_by('urutan', 'asc');
        $kategori = $this->db->get_where($this->_table, ['nama!=' => 'Tafsir','type'=>2])->result();
        return $kategori;
    }
    function getKategoriHifzhilPaket()
    {
        $this->db->order_by('urutan', 'asc');
        $kategori = $this->db->get_where($this->_table, ['nama!=' => 'Tafsir','type'=>1])->result();
        return $kategori;
    }
    function getKategoriHifzhilOtomatisTerkelompok()
    {
        $this->db->order_by('urutan', 'asc');
        $kategori = $this->db->get_where($this->_table, ['nama!=' => 'Tafsir','type'=>3])->result();
        return $kategori;
    }
    function getKategoriTilawahPaket()
    {
        $this->db->order_by('urutan', 'asc');
        $kategori = $this->db->get_where($this->_table, ['nama!=' => 'Tafsir','type'=>4])->result();
        return $kategori;
    }
    function getKategoriTilawahOtomatis()
    {
        $this->db->order_by('urutan', 'asc');
        $kategori = $this->db->get_where($this->_table, ['nama!=' => 'Tafsir','type'=>5])->result();
        return $kategori;
    }
    function getKategoriTafsir()
    {
        $this->db->order_by('urutan', 'asc');
        $kategori = $this->db->get_where($this->_table, ['nama' => 'Tafsir'])->result();
        return $kategori;
    }
}
