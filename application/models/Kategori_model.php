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

    function getKategori()
    {
        $this->db->order_by('urutan', 'asc');
        $kategori = $this->db->get_where($this->_table, ['nama!=' => 'Tafsir'])->result();
        return $kategori;
    }
}
