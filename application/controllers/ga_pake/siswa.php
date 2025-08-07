<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
    }
    public function info_kelas($id)
    {
        // echo $id;
        // die;
        $data['judul'] = 'Beranda';
        $data['data_user'] = $this->ModelPaket->getPakeTDetailtById($id);
        var_dump($data['detail_paket']);
    }
}
