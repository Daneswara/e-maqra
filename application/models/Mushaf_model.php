<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Mushaf_model extends CI_Model
{
    private $_table = "halaman";

    public $id;
    public $no_halaman;
    public $nosurat;
    public $ayatawal;
    public $mushaf;

    public function rules()
    {
    }

    function getHalaman($surat, $ayat)
    {
        $this->db->order_by('no_halaman', 'desc');
        $this->db->where('nosurat', $surat);
        $this->db->where('ayatawal <=', $ayat);
        $halaman = $this->db->get($this->_table)->row();
        if(!$halaman){
            $surat = $surat - 1;
            $this->db->order_by('no_halaman', 'desc');
            $halaman = $this->db->get_where($this->_table, ['nosurat<='=>$surat])->row();
        }
        return $halaman;
    }

    function getNamaSurat($surat)
    {
//        include "koneksi.php";
//        $queryview = mysqli_query($koneksi, "SELECT * FROM `daftarsurah` WHERE nosurat = $surat LIMIT 1") or die(mysqli_error($koneksi));
//        $surah = mysqli_fetch_array($queryview);
//        $namasurat = $surah['nama'];
//        return $namasurat;
    }
}
