<?php
class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        if ($this->session->userdata('email')) {
            $data['judul'] = 'Kelasku';
            $data['paket'] = $this->ModelPaket->joinPaketku($data['user']['id'])->result();
            // var_dump($data['paket']);
            // die;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('kelas/index', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('autentifikasi');
        }
    }
    public function viewKelas()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        if ($this->session->userdata('email')) {
            $id_paketku = $this->uri->segment(3);
            $data['kelas'] = $this->ModelPaket->getKelasById($data['user']['id'], $id_paketku);
            // var_dump($data['kelas']);
            // die;
            $id_paket = $data['kelas'][0]->id_paket;
            $judul = $this->ModelPaket->getPaketById($id_paket);

            $data['judul'] = $judul['judul_paket'];
            // $data['paket'] = $this->ModelPaket->joinPaketku($data['user']['id'])->result();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('kelas/pertemuan', $data);
            $this->load->view('admin/footer');
        } else {
            redirect('autentifikasi');
        }
    }
    public function soal()
    {
        $id_pertemuan = $this->uri->segment(3);
        $soal = $this->ModelPaket->getSoalByid($id_pertemuan);

        $id_soal = [];
        foreach ($soal as $soall) {
            array_push($id_soal, $soall->id);
        }

        $opsi = $this->ModelPaket->getOpsiByid($id_soal);

        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['soal'] = $soal;
        $data['opsi'] = $opsi;
        

        if ($this->session->userdata('email')) {
            if ($this->input->post()) {
                $salah = 0;
                $benar = 0;
                $jumlah_soal = count($id_soal);

                foreach ($id_soal as $id) {
                    $jawaban = $this->input->post($id);
                    if ($jawaban == 1) {
                        $benar += 1;
                    } else {
                        $salah += 1;
                    }
                }
                $nilai = [
                    'id_user' => $data['user']['id'],
                    'id_pertemuan' => $id_pertemuan,
                    'jumlah_soal' => $jumlah_soal,
                    'salah' => $salah,
                    'benar' => $benar,
                    'status' => 1
                ];

                $this->ModelPaket->insertNilai($nilai);
                redirect('kelas/soal/' . $id_pertemuan);
            } else {
                $data['judul'] = 'Kelasku';
                $data['status_latihan'] = $this->ModelPaket->getStatusLatihan($data['user']['id'], $id_pertemuan);
                $data['paket'] = $this->ModelPaket->joinPaketku($data['user']['id'])->result();
                if ($data['status_latihan']['status'] == 0) {
                    $this->load->view('admin/header', $data);
                    $this->load->view('admin/sidebar', $data);
                    $this->load->view('admin/topbar', $data);
                    $this->load->view('kelas/soal', $data);
                    $this->load->view('admin/footer');
                } else {
                    $this->load->view('admin/header', $data);
                    $this->load->view('admin/sidebar', $data);
                    $this->load->view('admin/topbar', $data);
                    $this->load->view('kelas/selesai', $data);
                    $this->load->view('admin/footer');
                }
            }
        } else {
            redirect('autentifikasi');
        }
    }
}
