<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends CI_Controller
{
    public $id_siswa;
    public $nama_panggilan;
    public $email;
    public $waktu;
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->load->helper(array('url', 'file', 'download'));
        $this->id_siswa = $this->session->userdata('id_siswa');
        if ($this->id_siswa) {
            $this->nama_panggilan = $this->session->userdata('nama_pengguna');
            $this->email = $this->session->userdata('email');
            $this->waktu = $this->session->userdata('waktu');
            $this->ModelKelas->kalkulasiStatusLangkah($this->id_siswa);
        } else {
            redirect('beranda');
        }
        if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
        }
    }
    public function aktivitas()
    {
        $waktu = explode('-', $this->waktu);
        $waktu = $waktu[0];
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'waktu' => $waktu,
            'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
            'kelas' => $this->ModelKelas->getDataKelas($this->id_siswa),
            'aktivitasKelas' => $this->ModelKelas->getDataAktivitasKelas($this->id_siswa),
            'progres_kelas' => $this->ModelKelas->kalkulasiStatusLangkah($this->id_siswa)
        ];
        // var_dump($data['progres_kelas']);
        // die;

        $this->load->view('halaman/member/header', $data);
        $this->load->view('halaman/member/profile', $data);
        $this->load->view('halaman/member/aktivitas', $data);
        $this->load->view('halaman/member/footer');
    }




    //http://localhost:8080/F-brain/member/akademi/
    public function akademi($judul_kelas = null, $judul_langkah = null, $judul_topik = null)
    {
        if ($judul_kelas == null) {

            $waktu = explode('-', $this->waktu);
            $waktu = $waktu[0];
            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
                'waktu' => $waktu,
                'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                'kelas' => $this->ModelKelas->getDataKelas($this->id_siswa),
                'langkah' => $this->ModelKelas->getLangkah($this->id_siswa)
            ];
            // var_dump($data['kelas']);
            // die;
            $this->load->view('halaman/member/header', $data);
            $this->load->view('halaman/member/profile', $data);
            $this->load->view('halaman/member/akademi', $data);
            $this->load->view('halaman/member/footer');
        } else {
            //http://localhost:8080/F-brain/member/akademi/judul_kelas/
            if ($judul_kelas != null && $judul_langkah == null) {
                $id_kelas = explode('-', $judul_kelas);
                $id_kelas = intval(end($id_kelas));
                $data = [
                    'nama' => $this->nama_panggilan,
                    'email' => $this->email,
                    'kelas' => $this->ModelKelas->getKelasById($id_kelas, $this->id_siswa),
                    'nilai' => $this->db->get_where('tb_nilai', ['id_siswa' => $this->id_siswa, 'id_paket' => $id_kelas])->row_array(),
                ];
                // var_dump($data['nilai']);
                // die;
                // $this->load->view('halaman/member/header_kelas', $data);
                $this->load->view('halaman/member/header_kelas', $data);
                $this->load->view('halaman/member/kelas', $data);
                $this->load->view('halaman/member/footer_kelas', $data);
            }
            //http://localhost:8080/F-brain/member/akademi/judul_kelas/judul_langkah/
            else {
                if ($judul_kelas != null && $judul_kelas != null && $judul_topik == null) {
                    $url = 'member/updateStatus/' . $judul_kelas . '/' . $judul_langkah;

                    $id_kelas = explode('-', $judul_kelas);
                    $id_kelas = intval(end($id_kelas));
                    $judul_topik = $this->uri->segment(4);
                    $id_langkah = explode('-', $judul_topik);
                    $id_langkah = intval(end($id_langkah));



                    $judul_langkah = str_replace($id_langkah, ' ', str_replace('-', ' ', $judul_langkah));

                    $data = [
                        'nama' => $this->nama_panggilan,
                        'email' => $this->email,
                        'kelas' => $this->ModelKelas->getLangkahById($id_langkah, $id_kelas, $this->id_siswa),
                        'url' => $url,
                        'data_langkah' => $this->db->get_where('tb_langkah', ['id' => $id_langkah, 'id_paket' => $id_kelas])->row_array(),
                        'judul_langkah' => $judul_langkah,
                        'status' => $this->db->get_where('tb_klangkah', ['id_kelas' => $id_kelas, 'id_langkah' => $id_langkah, 'id_siswa' => $this->id_siswa])->row_array(),
                    ];
                    // $judul_langkah = 'pengenalan-bahasa-pemograman-python-11';
                    // var_dump($data['data_langkah']);
                    // die;
                    // $this->load->view('halaman/member/header_kelas', $data);
                    $this->load->view('halaman/member/header_kelas', $data);
                    $this->load->view('halaman/member/kelas_langkah', $data);
                    // $this->load->view('halaman/member/footer_kelas', $data);
                    // $this->load->view('halaman/member/langkah', $data);
                } else {
                    $id_kelas = explode('-', $judul_kelas);
                    $id_kelas = intval(end($id_kelas));
                    $id_langkah = $this->uri->segment(4);
                    $id_langkah = explode('-', $id_langkah);
                    $id_langkah = intval(end($id_langkah));
                    $id_topik = $this->uri->segment(5);
                    $id_topik = explode('-', $id_topik);
                    $id_topik = intval(end($id_topik));
                    $data = [
                        'nama' => $this->nama_panggilan,
                        'email' => $this->email,
                        'kelas' => $this->ModelKelas->getTopichById($id_topik, $id_langkah, $id_kelas, $this->id_siswa), 'id_topik' => $id_topik
                    ];
                    // echo $id_langkah . 'hehe <br> ';
                    // echo $id_kelas . '<br>';
                    // echo $id_topik . '<br>';
                    // var_dump($data['kelas']);
                    // die;
                    // var_dump($data['kelas']);
                    // die;
                    $this->load->view('halaman/member/header_kelas', $data);
                    $this->load->view('halaman/member/kelas_langkah_topik', $data);
                    $this->load->view('halaman/member/footer_kelas', $data);
                    // die;
                    // echo "hay";
                }
            }
            // echo $id_kelas;
        }
    }

    public function updateStatus($id_kelas = null, $id_langkah = null, $id_topik = null)
    {
        if ($id_topik == null) {
            $url = 'member/akademi/' . $id_kelas . '/' . $id_langkah;
            $id_kelas = explode('-', $id_kelas);
            $id_kelas = intval(end($id_kelas));

            $id_langkah = explode('-', $id_langkah);
            $id_langkah = intval(end($id_langkah));

            $this->db->insert('tb_klangkah', [
                'id_kelas' => $id_kelas,
                'id_siswa' => $this->id_siswa,
                'id_langkah' => $id_langkah,
                'status' => 1
            ]);
            redirect($url);
        } else {
            $url = 'member/akademi/' . $id_kelas . '/' . $id_langkah . '/' . $id_topik;
            $id_kelas = explode('-', $id_kelas);
            $id_kelas = intval(end($id_kelas));

            $id_langkah = explode('-', $id_langkah);
            $id_langkah = intval(end($id_langkah));


            $id_topik = explode('-', $id_topik);
            $id_topik = intval(end($id_topik));
            $this->db->insert('tb_ktopik', [

                'id_klangkah' => $id_langkah,
                'id_topik' => $id_topik,
                'status' => 1
            ]);
            redirect($url);
        }
    }
    public function downloadModul($filename)
    {

        $filePath = FCPATH . 'assets/uploads/modul/' . $filename;
        if (!file_exists($filePath)) {

            show_404();
            return;
        }
        $fileInfo = pathinfo($filePath);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    }
    public function endQuis($id_kelas = null)
    {
        $judul_paket = $id_kelas;
        $judul_paket = str_replace('-', ' ', $id_kelas);
        $id_kelas = explode('-', $id_kelas);
        $id_kelas = intval(end($id_kelas));
        $judul_paket = str_replace($id_kelas, '', $judul_paket);
        $id_soal = $this->ModelKelas->getSoalById($id_kelas, $this->id_siswa);
        $salah = 0;
        $benar = 0;
        $jumlah_soal = count($id_soal['soal']);
        // var_dump($jumlah_soal);
        // die;
        foreach ($id_soal['soal'] as $i) {
            // foreach ($i['opsi'] as $o) {
            $jawaban = $this->input->post($i->id);
            if ($jawaban == 1) {
                $benar += 1;
            } else {
                $salah += 1;
            }
            // }
        }
        $dataK = [
            'status' => 2
        ];
        $where = [
            'id_siswa' => $this->id_siswa,
            'id_paket' => $id_kelas,
        ];
        $nilai = ($benar / $jumlah_soal) * 100;
        $dataNilai = [
            'id_siswa' => $this->id_siswa,
            'id_paket' => $id_kelas,
            'benar' => $benar,
            'salah' => $salah,
            'jumlah_soal' => $jumlah_soal,
            'nilai' => $nilai,
        ];
        $this->db->insert('tb_nilai', $dataNilai);

        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'nilai' => $this->db->get_where('tb_nilai', ['id_siswa' => $this->id_siswa, 'id_paket' => $id_kelas])->row_array(),
            'paket' => $judul_paket,
        ];

        $this->load->view('halaman/member/header_quis', $data);
        $this->load->view('halaman/member/endQuis');
    }
    public function quis($id_kelas = null)
    {
        $judul_kelas = $id_kelas;
        $id_kelas = explode('-', $id_kelas);
        $id_kelas = intval(end($id_kelas));

        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'soal' => $this->ModelKelas->getSoalById($id_kelas, $this->id_siswa),
            'id_kelas' => $judul_kelas

        ];
        // var_dump($data['soal']);
        // die;
        $this->load->view('halaman/member/header_quis', $data);
        $this->load->view('halaman/member/quis');
    }






    public function tambahDataDiri()
    {
        $upload_image = isset($_FILES['image']) ? $_FILES['image']['name'] : '';

        if ($upload_image) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '3000'; // 3 MB
            $config['max_width'] = '1024';
            $config['max_height'] = '1000';
            $config['file_name'] = 'pro' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $gambar_baru = $this->upload->data('file_name');

                $data = [
                    'nama_lengkap' => $this->input->post('nama'),
                    'no_telp' => $this->input->post('nohp'),
                    'tempat_lahir' => $this->input->post('tempatlahir'),
                    'tanggal_lahir' => $this->input->post('tanggallahir'),
                    'lokasi' => $this->input->post('kota'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'institusi' => $this->input->post('institusi'),
                    'profesi' => $this->input->post('profesi'),
                    'foto' => $gambar_baru,
                    'id_siswa' => $this->id_siswa
                ];

                $this->ModelSiswa->insertDataDiri('tb_data_pribadi', $data);
                redirect('member/akademi');
            } else {
                $error = $this->upload->display_errors();
                echo $error;
            }
        }
    }


    public function dataDiri()
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
        ];
        $this->load->view('halaman/member/header', $data);
        $this->load->view('halaman/member/form_datadiri', $data);
        $this->load->view('halaman/member/footer');
    }
}
