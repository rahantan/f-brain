<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Paket extends CI_Controller
{
    public $id_siswa;
    public $nama_panggilan;
    public $email;
    public $waktu;
    public function __construct()
    {
        parent::__construct();
        $this->id_siswa = $this->session->userdata('id_siswa');
        $this->nama_panggilan = $this->session->userdata('nama_pengguna');
        $this->email = $this->session->userdata('email');
        $this->waktu = $this->session->userdata('waktu');
        // cek_login();
    }
    public function info_kelas($id)
    {
        if ($this->id_siswa) {

            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
                'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                'id_paket' => $id,
                'detail_paket' => $this->ModelPaket->getPakeTDetailtById($id)
            ];
            $this->load->view('halaman/member/header', $data);
        } else {
            $data = [
                'nama' => 'pengunjung',
                'id_paket' => $id,
                'detail_paket' => $this->ModelPaket->getPakeTDetailtById($id)
            ];
            $this->load->view('halaman/member/header_before', $data);
        }


        // var_dump($data['detail_paket']);
        $this->load->view('halaman/info_kelas', $data);
        // die;
        $this->load->view('halaman/member/footer', $data);
    }
    public function pembayaran($id_paket)
    {
        if ($this->id_siswa) {
            $transaksi = $this->db->get_where('tb_transaksi', ['id_siswa' => $this->id_siswa, 'id_paket' => $id_paket])->row_array();
            if (empty($transaksi)) {
                if ($this->input->post()) {
                    $id_user = $this->id_siswa;
                    $waktu = date('y-m-d');
                    $total_diskon = $this->input->post('promo');
                    $jumlah_tagihan = $this->input->post('jumlah_tagihan');
                    $id_paket = $this->input->post('id_paket');
                    $dataPaket = $this->db->get_where('tb_paket', ['id' => $id_paket])->row_array();
                    $data = [
                        'nama' => $this->nama_panggilan,
                        'email' => $this->email,
                        'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                        'paket' => $this->db->get_where('tb_paket', ['id' => $id_paket])->row_array(),
                    ];
                    $this->db->insert('tb_transaksi', [
                        'id_paket' => $id_paket,
                        'id_siswa' => $id_user,
                        'waktu' => $waktu,
                        'total_diskon' => $total_diskon,
                        'status' => 0,
                        'jumlah_tagihan' => $jumlah_tagihan,
                    ]);
                    redirect('paket/bayar/' . $id_paket);
                } else {
                    $data = [
                        'nama' => $this->nama_panggilan,
                        'email' => $this->email,
                        'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                        'paket' => $this->db->get_where('tb_paket', ['id' => $id_paket])->row_array(),
                    ];
                    $this->load->view('halaman/member/header', $data);
                    $this->load->view('halaman/pembayaran');
                }
            } else {
                if ($transaksi['status'] == 0) {
                    redirect('paket/bayar/' . $id_paket);
                } else {
                    redirect('paket/pesanan/');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<script>Swal.fire("Gagal", "Anda Belum Login,Silahkan Login Dulu!", "error")</script>');
            redirect('paket/daftarPaket');
        }
    }

    public function bayar($id_paket)
    {
        $transaksi = $this->db->get_where('tb_transaksi', ['id_siswa' => $this->id_siswa, 'id_paket' => $id_paket])->row_array();
        if ($transaksi['status'] != 1) {
            if ($transaksi['status'] == 2) {
                $this->session->set_flashdata('message', '<script>Swal.fire("Berhasil", "permintaan anda Sedang di Proses,Terima kasih!", "success")</script>');
                redirect('paket/pesanan');
            }
            if ($this->input->post()) {
                $config['upload_path'] = './assets/uploads/img/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('bukti_pembayaran')) {
                    $bukti = $this->upload->data('file_name');
                    $datat = [
                        'bukti_pembayaran' => $bukti,
                        'status' => 2
                    ];
                    $this->db->where('id', $this->input->post('id_transaksi'))
                        ->update('tb_transaksi', $datat);
                }
                $this->session->set_flashdata('message', '<script>Swal.fire("Berhasil", "permintaan anda Sedang di Proses,Terima kasih!", "success")</script>');
                redirect('paket/pesanan');
            } else {
                $data = [
                    'nama' => $this->nama_panggilan,
                    'email' => $this->email,
                    'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                    'transaksi' => $this->ModelSiswa->getTransaksiById($this->id_siswa, $id_paket)
                ];
                $this->load->view('halaman/member/header', $data);
                $this->load->view('halaman/bayar');
                // redirect('member/akademi');
            }
        } else {
            $this->session->set_flashdata('message', '<script>Swal.fire("Berhasil", "permintaan anda Sedang di Proses,Terima kasih!", "error")</script>');
            redirect('paket/pesanan');
        }
    }
    public function daftarPaket($id_kategori = null)
    {

        if ($this->id_siswa) {
            if ($id_kategori == null) {

                $data = [
                    'nama' => $this->nama_panggilan,
                    'email' => $this->email,
                    'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                    'paket' => $this->ModelPaket->getPaketAll($this->id_siswa),
                    'kelas' => $this->ModelKelas->getDataKelas($this->id_siswa),
                    'kategori' => $this->db->get('tb_kategori')->result(),
                    // 'langkah' => $this->ModelKelas->getLangkah($this->id_siswa)
                ];
                $data['judul'] = 'Daftar Paket';
                // var_dump($data['paket']);
                // die;
                $this->load->view('halaman/member/header', $data);
            } else {
                $data = [
                    'nama' => $this->nama_panggilan,
                    'email' => $this->email,
                    'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                    'paket' => $this->ModelPaket->getPaketAll($this->id_siswa, $id_kategori),
                    'kelas' => $this->ModelKelas->getDataKelas($this->id_siswa),
                    'kategori' => $this->db->get('tb_kategori')->result(),
                    // 'langkah' => $this->ModelKelas->getLangkah($this->id_siswa)
                ];
                $judul = $this->db->get_where('tb_kategori', ['id' => $id_kategori])->row_array();
                $data['judul'] = 'Filter by: ' . $judul['judul_kategori'];
                // var_dump($data['paket']);
                // die;
                $this->load->view('halaman/member/header', $data);
            }
        } else {
            if ($id_kategori == null) {

                $data = [
                    'nama' => $this->nama_panggilan,
                    'paket' => $this->ModelPaket->getPaketAll(),
                    'kategori' => $this->db->get('tb_kategori')->result(),
                ];
                $data['judul'] = 'Daftar Paket';
            } else {
                $data = [
                    'nama' => $this->nama_panggilan,
                    'paket' => $this->ModelPaket->getPaketAll(null, $id_kategori),
                    'kategori' => $this->db->get('tb_kategori')->result(),
                ];
                $judul = $this->db->get_where('tb_kategori', ['id' => $id_kategori])->row_array();
                $data['judul'] = 'Filter by: ' . $judul['judul_kategori'];
            }
            $this->load->view('halaman/member/header_before', $data);
        }
        // var_dump($data['paket']);
        // die;


        $this->load->view('halaman/daftarPaket', $data);
        $this->load->view('halaman/member/footer', $data);
    }

    public function kategori($id_paket)
    {
        if ($this->id_siswa) {
            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
                'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
                'paket' => $this->ModelPaket->getPaketAll($this->id_siswa),
                'kelas' => $this->ModelKelas->getDataKelas($this->id_siswa),
                'kategori' => $this->db->get('tb_kategori')->result(),
                // 'langkah' => $this->ModelKelas->getLangkah($this->id_siswa)
            ];
            // var_dump($data['paket']);
            // die;
            $this->load->view('halaman/member/header', $data);
        } else {
            $data = [
                'nama' => $this->nama_panggilan,
                'paket' => $this->ModelPaket->getPaketAll(),
                'kategori' => $this->db->get('tb_kategori')->result(),
            ];
            $this->load->view('halaman/member/header_before', $data);
        }
        // var_dump($data['paket']);
        // die;
        $data['judul'] = 'Beranda';

        $this->load->view('halaman/daftarPaket', $data);
        $this->load->view('halaman/member/footer', $data);
    }






















    public function pesanan()
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'data_siswa' => $this->ModelSiswa->getDataSiswa($this->id_siswa),
            'pesanan' => $this->ModelPaket->getTransaksiById($this->id_siswa)
            // 'langkah' => $this->ModelKelas->getLangkah($this->id_siswa)
        ];
        // var_dump($data['pesanan']);
        // die;
        $data['judul'] = 'Beranda';

        $this->load->view('halaman/member/header', $data);
        $this->load->view('halaman/pesanan', $data);
        $this->load->view('halaman/member/footer', $data);
    }
}
