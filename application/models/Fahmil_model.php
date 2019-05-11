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
        return $this->db->get_where($this->_table, ['nosurat'=>$surat, 'ayatawal'=>$ayat])->row();
//        include "koneksi.php";
//        $queryview = mysqli_query($koneksi, "SELECT * FROM `halaman` WHERE nosurat = $surat and ayatawal <= $ayat ORDER BY no_halaman DESC LIMIT 1") or die(mysqli_error($koneksi));
//        $halaman = mysqli_fetch_array($queryview);
//        $kanan = $halaman['no_halaman'];
//        if (mysqli_num_rows($queryview) == 0) {
//            $surat = $surat - 1;
//            $queryview = mysqli_query($koneksi, "SELECT * FROM `halaman` WHERE nosurat = $surat ORDER BY no_halaman DESC LIMIT 1") or die(mysqli_error($koneksi));
//            $halaman = mysqli_fetch_array($queryview);
//            $kanan = $halaman['no_halaman'];
//        }
//        return $kanan;

    }

    function getNamaSurat($surat)
    {
        if ($surat != "") {
			$this->db->where('nosurat', $surat);
		}
		$data = $this->db->get_where('daftarsurah', array('aktif' => 1));
        // $data = $this->db->query('select * from daftarsurah where daftarsurah.nosurat ='.$surat.' limit 1');
        $surah = $data->result_array();
        $namasurat = $surah['nama'];
        return $namasurat;
        //        include "koneksi.php";
//        $queryview = mysqli_query($koneksi, "SELECT * FROM `daftarsurah` WHERE nosurat = $surat LIMIT 1") or die(mysqli_error($koneksi));
//        $surah = mysqli_fetch_array($queryview);
//        $namasurat = $surah['nama'];
//        return $namasurat;

    }
}
