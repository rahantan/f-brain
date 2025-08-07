<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Beranda extends CI_Controller
{
    public $id_siswa;
    public $nama_panggilan;
    public $email;
    public $waktu;
    public $status;

    public function __construct()
    {
        parent::__construct();
        // cek_login();
        if ($this->session->userdata('id_siswa')) {
            $this->id_siswa = $this->session->userdata('id_siswa');
            $this->nama_panggilan = $this->session->userdata('nama_pengguna');
            $this->email = $this->session->userdata('email');
            $this->waktu = $this->session->userdata('waktu');
        } else {
        }
    }
    public function index()
    {
        if ($this->id_siswa) {

            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
                'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                'paket_populer' => $this->ModelPaket->get_filter_paket()
                // 'langkah' => $this->ModelKelas->getLangkah($this->id_siswa)
            ];
            $this->load->view('halaman/member/header', $data);
        } else {
            $data = [
                'nama' => 'pengunjang',
                'paket_populer' => $this->ModelPaket->get_filter_paket()
            ];
            $this->load->view('halaman/member/header_before', $data);
        }
        $data['judul'] = 'Beranda';

        $this->load->view('halaman/beranda', $data);
        $this->load->view('halaman/member/footer', $data);
    }
    public function tentangKami()
    {
        if ($this->id_siswa) {
            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
                'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                'tutor' => $this->db->get_where('tb_admin', ['role' => 1])->result()
                // 'langkah' => $this->ModelKelas->getLangkah($this->id_siswa)
            ];
            $this->load->view('halaman/member/header', $data);
        } else {
            $data = [
                'nama' => 'pengunjang',
                'tutor' => $this->db->get_where('tb_admin', ['role' => 1])->result()
            ];
            $this->load->view('halaman/member/header_before', $data);
        }
        $data['judul'] = 'Beranda';
        $this->load->view('halaman/tentangKami', $data);
        $this->load->view('halaman/member/footer', $data);
    }
}
