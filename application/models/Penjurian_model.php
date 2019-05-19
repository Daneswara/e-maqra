<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Penjurian_model extends CI_Model
{
    private $_table = "penjurian";

    public $id;
    public $nosurat;
    public $ayat;

    public function rules()
    {
    }

    function getSoal($nosurat, $ayat){
        $hasil = $this->db->get_where($this->_table, ['nosurat' => $nosurat, 'ayat'=>$ayat])->row();
        if ($hasil){
            return true;
        } else {
            return false;
        }
    }
}