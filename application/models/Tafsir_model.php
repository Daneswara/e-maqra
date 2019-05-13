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
    function getAcak(){
            $dbsoalke = array();
            $jumlahsoal = 20;
        if (isset($_GET['acak'])) {
            $psoal = $_GET['acak'];
            for ($i=1; $i <= $jumlahsoal; $i++) {
                # code...
                $dbsoalke[$i] = $i;
            }
        }

    }
    function listTafsir(){

        $query = $this->db->query('SELECT * FROM kategori where nama = "Tafsir" ORDER BY urutan');
        // $this->db
        // foreach  ($query->result_array() as $data){
            // if ($pilihan == $data['index'] . "_" . $data['id']) {
            //   $hasil =  echo "<option value=" . $data['index'] . "_" . $data['id'] . " selected> " . $data['jenis'] . " (Juz " . $data['index'] . ")" . "</option>";
            // } else {
                // $hasil = echo "<option value=" . $data['index'] . "_" . $data['id'] . "> " . $data['jenis'] . " (Juz " . $data['index'] . ")" . "</option>";
        //     }
        // }
        $data = $query->result_array();
        return $data;

        // $query_mysql = mysqli_query($koneksi, "SELECT * FROM kategori where nama = 'Tafsir' ORDER BY urutan") or die(mysqli_error($koneksi));

        // while ($data = mysqli_fetch_array($query_mysql)) {
        //     if ($pilihan == $data['index'] . "_" . $data['id']) {
        //         echo "<option value=" . $data['index'] . "_" . $data['id'] . " selected> " . $data['jenis'] . " (Juz " . $data['index'] . ")" . "</option>";
        //     } else {
        //         echo "<option value=" . $data['index'] . "_" . $data['id'] . "> " . $data['jenis'] . " (Juz " . $data['index'] . ")" . "</option>";
        //     }
        // }
    }
}
