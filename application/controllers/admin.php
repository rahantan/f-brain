<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public $id_admin;
    public $nama_panggilan;
    public $email;
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->id_admin = $this->session->userdata('id_admin');
        if ($this->id_admin) {

            $this->nama_panggilan = $this->session->userdata('nama_pengguna');
            $this->email = $this->session->userdata('email');
            $this->waktu = $this->session->userdata('waktu');
        } else {
            redirect('auth/loginTutor');
        }
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
        ];
        $this->load->view('halaman/admin/header', $data);
        $this->load->view('halaman/admin/dashboard');
        $this->load->view('halaman/admin/footer');
    }




















    public function chat()
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'target' => $this->ModelChat->getUserChatByKelas($this->id_admin),
            'action' => 'admin/message/'
        ];
        // var_dump($data['target']);
        // die;
        $data['judul'] = 'kelas';
        $this->load->view('halaman/admin/header', $data);
        $this->load->view('halaman/admin/sidebar', $data);
        $this->load->view('halaman/admin/chat');
        $this->load->view('halaman/admin/footer');
    }
    public function message($judul_kelas = null, $id_target = null)
    {

        if ($this->input->post()) {
            $id_kelas = explode('-', $judul_kelas);
            $id_kelas = intval(end($id_kelas));
            // $tes = 1;
            // var_dump($id_kelas);
            // die;
            $data_chat = array(
                'id_user' => $this->input->post('id_user'),
                'id_target' => $this->input->post('id_target'),
                'id_kelas' => $id_kelas,
                'teks' => $this->input->post('teks'),
            );
            $this->ModelChat->sendChat($data_chat);
            redirect('admin/message/' . $judul_kelas . '/' . $id_target);
        } else {
            $id_kelas = explode('-', $judul_kelas);
            $id_kelas = intval(end($id_kelas));
            // var_dump($id_kelas, $id_target);
            // die;
            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
                'user' => $this->ModelChat->getUserChatByKelas($this->id_admin, $id_kelas),
                'id_target' => $id_target,
                'chat' => $this->ModelChat->getChatByIdTarget($this->id_admin, $id_target, $id_kelas),
                'nama_target' => $this->db->get_where('tb_siswa', ['id' => $id_target])->row_array(),
                'id_user' => $this->id_admin
                // 'langkah' => $this->ModelKelas->getLangkah($this->id_siswa)
            ];
            // var_dump($this->id_admin);
            // die;
            // $this->load->view('halaman/member/header', $data);
            $this->load->view('halaman/admin/header', $data);
            $this->load->view('halaman/admin/sidebar', $data);
            $this->load->view('halaman/admin/message');
            $this->load->view('halaman/admin/footer');
        }
    }
































    public function kelas()
    {
        $data['judul'] = 'kelas';
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'kelas' => $this->ModelTutor->getPaketById($this->id_admin),
        ];

        $this->load->view('halaman/admin/header', $data);
        $this->load->view('halaman/admin/sidebar', $data);
        $this->load->view('halaman/admin/kelas');
        $this->load->view('halaman/admin/footer');
    }
    public function tambahPaket()
    {
        $this->form_validation->set_rules('judul_paket', 'Judul Paket', 'required');

        if ($this->form_validation->run() == false) {
            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
                'kategori' => $this->db->get('tb_kategori')->result_array(),
            ];
            $data['judul'] = 'kelas';
            $this->load->view('halaman/admin/header', $data);
            $this->load->view('halaman/admin/sidebar', $data);
            $this->load->view('halaman/admin/tambahKelas', $data);
            $this->load->view('halaman/admin/footer');
        } else {
            $judul_paket = $this->input->post('judul_paket');
            $deskripsi_judul = $this->input->post('deskripsi_judul');
            $main_deskripsi = $this->input->post('main_deskripsi');
            $harga = $this->input->post('harga');
            $kategori = $this->input->post('kategori');
            $gambar = $_FILES['gambar']['name'];
            // var_dump($kategori);
            // die;
            if ($gambar) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $data = [
                'judul_paket' => $judul_paket,
                'deskripsi_judul' => $deskripsi_judul,
                'main_deskripsi' => $main_deskripsi,
                'harga' => $harga,
                'gambar' => $gambar,
                'id_tutor' => $this->id_admin
            ];
            $this->db->insert('tb_paket', $data);
            $id_paket = $this->db->insert_id();
            foreach ($kategori as $id_kategori) {
                $data_kategori = [
                    'id_paket' => $id_paket,
                    'id_kategori' => intval($id_kategori)
                ];
                $this->db->insert('tb_pkategori', $data_kategori);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/kelas');
        }
    }


    public function ubahKelas($id_paket)
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('judul_paket', 'Judul Kelas', 'required');
        $this->form_validation->set_rules('deskripsi_judul', 'Deskripsi Judul', 'required');
        $this->form_validation->set_rules('main_deskripsi', 'Main Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('kategori[]', 'Kategori Kelas', 'required');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, kembali ke halaman form ubah kelas dengan data yang dikirim
            // var_dump($_POST['kategori']);
            // die;
            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
            ];
            $data['judul'] = 'Form Ubah Data Kelas';
            $data['kelas'] = $this->db->get_where('tb_paket', ['id' => $id_paket])->row_array();
            $data['kategori'] = $this->db->get('tb_kategori')->result_array();
            // var_dump($data['kategori']);
            // die;
            $this->load->view('halaman/admin/header', $data);
            $this->load->view('halaman/admin/sidebar', $data);
            $this->load->view('halaman/admin/ubahKelas', $data);
            $this->load->view('halaman/admin/footer');
        } else {
            $judul_paket = $this->input->post('judul_paket');
            $deskripsi_judul = $this->input->post('deskripsi_judul');
            $main_deskripsi = $this->input->post('main_deskripsi');
            $harga = $this->input->post('harga');
            $kategori = $this->input->post('kategori');
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $data = [
                'judul_paket' => $judul_paket,
                'deskripsi_judul' => $deskripsi_judul,
                'main_deskripsi' => $main_deskripsi,
                'harga' => $harga,
            ];
            if ($gambar) {
                $data['gambar'] = $gambar;
            }
            $this->db->where('id', $id);
            $this->db->update('tb_paket', $data);
            $this->db->delete('tb_pkategori', ['id_paket' => $id]);
            foreach ($kategori as $kategori_id) {
                $data_kategori = [
                    'id_paket' => $id_paket,
                    'id_kategori' => intval($kategori_id)
                ];
                $this->db->insert('tb_pkategori', $data_kategori);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/detailKelas/' . $id_paket);
        }
    }
    public function hapusKelas($id_paket)
    {
        $this->db->where('id', $id_paket);
        $this->db->delete('tb_paket');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/kelas/');
    }


    public function tambahTopik()
    {

        if (!empty($_FILES['video']['name'])) {
            $config['upload_path'] = './assets/uploads/video/';
            $config['allowed_types'] = 'mp4|avi|mov|wmv';
            $config['max_size'] = '10000';
            $config['file_name'] = 'video_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('video')) {
                $file_baru = $this->upload->data('file_name');
                $filePath = $config['upload_path'] . $file_baru;

                $data = [
                    'judul_topic' => $this->input->post('judul_topik'),
                    'video' => $filePath,
                    'id_langkah' => $this->input->post('id_langkah'),
                ];


                $this->ModelTutor->insertTopik($data);


                redirect('halaman/sukses');
            } else {

                $error = $this->upload->display_errors();
                echo $error;
            }
        } else {

            echo "Pilih file video yang akan diunggah.";
        }
    }

    public function detailLangkah($id_langkah = null)
    {
        if ($this->input->post()) {

            $config['upload_path'] = './assets/uploads/video/';
            $config['allowed_types'] = 'mp4|avi|mov';
            $config['max_size'] = 1024 * 1024;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('video')) {

                $upload_data = $this->upload->data();
                $video = $upload_data['file_name'];

                $data = [
                    'judul_topic' => $this->input->post('judul_topik'),
                    'video' => $video,
                    'id_langkah' => $this->input->post('id_langkah'),
                ];
                $this->db->insert('tb_topik', $data);
                redirect('admin/detailLangkah/' . $id_langkah);
            } else {

                $data['error'] = $this->upload->display_errors();
                $data['judul'] = 'kelas';
                $data['nama'] = $this->nama_panggilan;
                $data['email'] = $this->email;
                $data['topik'] = $this->ModelTutor->getTopikById($id_langkah);
                $data['id_langkah'] = $id_langkah;

                $this->load->view('halaman/admin/header', $data);
                $this->load->view('halaman/admin/detailLangkah', $data);
                $this->load->view('halaman/admin/footer', $data);
            }
        } else {
            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
                'topik' => $this->ModelTutor->getTopikById($id_langkah),
                'langkah' => $this->db->get_where('tb_langkah', ['id' => $id_langkah])->row_array(),
                'id_langkah' => $id_langkah
            ];
            $data['judul'] = 'kelas';
            $this->load->view('halaman/admin/header', $data);
            $this->load->view('halaman/admin/sidebar', $data);
            $this->load->view('halaman/admin/detailLangkah');
            $this->load->view('halaman/admin/footer');
        }
    }
    public function hapusTopik($id_topik, $id_langkah)
    {
        $topik = $this->db->get_where('tb_topik', ['id' => $id_topik])->row();

        if ($topik) {
            if ($topik->video) {
                $file_path = './assets/uploads/video/' . $topik->video;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $this->db->delete('tb_topik', ['id' => $id_topik]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/detailLangkah/' . $id_langkah);
        } else {
            show_404();
        }
    }
    public function ubahTopik($id_topik, $id_langkah)
    {
        $topik = $this->db->get_where('tb_topik', ['id' => $id_topik])->row();
        if (!$topik) {
            show_404();
            return;
        }
        $data = [
            'judul_topic' => $this->input->post('judul_topik'),

        ];
        if ($_FILES['video']['name']) {
            $config['upload_path'] = './assets/uploads/video/';
            $config['allowed_types'] = 'mp4|avi|mov';
            $config['max_size'] = 1024 * 1024;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('video')) {
                if ($topik->video) {
                    $file_path = './assets/uploads/video/' . $topik->video;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                $upload_data = $this->upload->data();
                $data['video'] = $upload_data['file_name'];
            }
        }
        $this->db->where('id', $id_topik);
        $this->db->update('tb_topik', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/detailLangkah/' . $id_langkah);
    }



    public function tambahLangkah()
    {
        $upload_modul = $_FILES['modul']['name'];
        if ($upload_modul) {
            $config['upload_path'] = './assets/uploads/modul/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '3000'; // 3 MB
            $config['file_name'] = 'modul' . time();
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('modul')) {
                $file_baru = $this->upload->data('file_name');
                $filePath = $config['upload_path'] . $file_baru;
                $data = [
                    'judul_langkah' => $this->input->post('judul_langkah'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'modul' => $file_baru,
                    'id_paket' => $this->input->post('id_paket'),
                ];
                $this->ModelTutor->insertlangkah($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Berhasil Ditambahkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
                redirect('admin/detailKelas/' . $data['id_paket']);
            } else {

                $error = $this->upload->display_errors();
                echo $error;
            }
        }
    }
    public function updateLangkah()
    {
        $id = $this->input->post('id');
        $judul_langkah = $this->input->post('judul_langkah');
        $deskripsi = $this->input->post('deskripsi');
        $id_paket = $this->input->post('id_paket');

        $upload_modul = $_FILES['modul']['name'];
        $data = [
            'judul_langkah' => $judul_langkah,
            'deskripsi' => $deskripsi,
            'id_paket' => $id_paket,
        ];
        if ($upload_modul) {
            $config['upload_path'] = './assets/uploads/modul/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '3000';
            $config['file_name'] = 'modul' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('modul')) {
                $file_baru = $this->upload->data('file_name');
                $data['modul'] = $file_baru;
                $langkah_lama = $this->ModelTutor->getLangkahById($this->id_admin, $id);
                if ($langkah_lama->modul && file_exists('./assets/uploads/modul/' . $langkah_lama->modul)) {
                    unlink('./assets/uploads/modul/' . $langkah_lama->modul);
                }
            } else {
                $error = $this->upload->display_errors();
                echo $error;
                return;
            }
        }
        $this->db->where('id', $id);
        $this->db->update('tb_langkah', $data);
        redirect('admin/detailKelas/' . $id_paket);
    }
    public function hapusLangkah($id, $id_paket)
    {
        $langkah = $this->db->get_where('tb_langkah', ['id' => $id])->row();
        if ($langkah->modul && file_exists('./assets/uploads/modul/' . $langkah->modul)) {
            unlink('./assets/uploads/modul/' . $langkah->modul);
        }
        $this->db->where('id', $id);
        $this->db->delete('tb_langkah');

        redirect('admin/detailKelas/' . $id_paket);
    }





    public function dataKelas($id_paket)
    {
        $judul = $this->db->get_where('tb_paket', ['id' => $id_paket])->row_array();
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,

            'dataKelas' => $this->ModelKelas->getSiswaTerdaftar($this->id_admin, $id_paket)
        ];


        $data['judul'] = $judul;
        $this->load->view('halaman/admin/header', $data);
        $this->load->view('halaman/admin/sidebar', $data);
        $this->load->view('halaman/admin/dataKelas');
        $this->load->view('halaman/admin/footer');
    }
    public function tambahKelas()
    {
        if ($this->input->post()) {

            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                $data = [
                    'judul_paket' => $this->input->post('judul_paket'),
                    'gambar' => $gambar,
                    'deskripsi_judul' => $this->input->post('deskripsi_judul'),
                    'main_deskripsi' => $this->input->post('main_deskripsi'),
                    'harga' => $this->input->post('harga'),
                    'id_tutor' => $this->id_admin,
                ];
                $this->db->insert('tb_paket', $data);
                redirect('admin/kelas');
            } else {
                $data['error'] = $this->upload->display_errors();
                $data['judul'] = 'kelas';
                $data['nama'] = $this->nama_panggilan;
                $data['email'] = $this->email;

                $this->load->view('halaman/admin/header', $data);
                $this->load->view('halaman/admin/tambahKelas', $data);
                $this->load->view('halaman/admin/footer', $data);
            }
        } else {
            $data = [
                'nama' => $this->nama_panggilan,
                'email' => $this->email,
            ];
            $data['judul'] = 'kelas';

            $this->load->view('halaman/admin/header', $data);
            $this->load->view('halaman/admin/tambahKelas');
            $this->load->view('halaman/admin/footer', $data);
        }
    }


    public function detailKelas($id_paket)
    {


        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'kelas' => $this->db->get_where('tb_paket', ['id' => $id_paket])->row_array(),
            'langkah' => $this->ModelTutor->getLangkahById($this->id_admin, $id_paket),
            'id_paket' => $id_paket
        ];
        // var_dump($data['kelas']);
        // die;
        $this->load->view('halaman/admin/header', $data);
        $this->load->view('halaman/admin/sidebar', $data);
        $this->load->view('halaman/admin/detailKelas');
        $this->load->view('halaman/admin/footer');
    }





    public function createQuis($id_paket = null)
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'id_paket' => $id_paket,
        ];
        if ($this->input->post()) {
            $judul_soal = $this->input->post('judul_soal');
            $opsi_a = $this->input->post('opsi_a');
            $opsi_b = $this->input->post('opsi_b');
            $opsi_c = $this->input->post('opsi_c');
            $opsi_d = $this->input->post('opsi_d');
            $id_paket = $this->input->post('id_paket');
            $jawaban_benar = $this->input->post('jawaban_benar');

            $opsi = [$opsi_a, $opsi_b, $opsi_c, $opsi_d];
            $this->db->insert('tb_soal', ['id_paket' => $id_paket, 'judul_soal' => $judul_soal]);
            $id_soal = $this->db->insert_id();

            switch ($jawaban_benar) {
                case 'opsi_a':
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_a, 'kunci_jawaban' => 1]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_b, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_c, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_d, 'kunci_jawaban' => 0]);
                    break;
                case 'opsi_b':
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_a, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_b, 'kunci_jawaban' => 1]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_c, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_d, 'kunci_jawaban' => 0]);
                    break;
                case 'opsi_c':
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_a, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_b, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_c, 'kunci_jawaban' => 1]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_d, 'kunci_jawaban' => 0]);
                    break;
                case 'opsi_d':
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_a, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_b, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_c, 'kunci_jawaban' => 0]);
                    $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $opsi_d, 'kunci_jawaban' => 1]);
                    break;
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('admin/quis/' . $id_paket);

            // $data['pesan'] = 'Soal berhasil disimpan';
            // $this->load->view('admin/sukses_view', $data);
        } else {
            $this->load->view('halaman/admin/header', $data);
            $this->load->view('halaman/admin/sidebar', $data);
            $this->load->view('halaman/admin/createquis');
            $this->load->view('halaman/admin/footer');
        }
    }
    public function updateSoal($id_soal = null, $id_paket = null)
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'soal' => $this->db->get_where('tb_soal', ['id' => $id_soal])->row_array(),
            'opsi' => $this->db->get_where('tb_opsi', ['id_soal' => $id_soal])->result_array(),
            'id_paket' => $id_paket
        ];
        if ($this->input->post()) {
            $id_soal = $this->input->post('id_soal');
            $judul_soal = $this->input->post('judul_soal');
            $opsi_a = $this->input->post('opsi_a');
            $opsi_b = $this->input->post('opsi_b');
            $opsi_c = $this->input->post('opsi_c');
            $opsi_d = $this->input->post('opsi_d');
            $jawaban_benar = $this->input->post('jawaban_benar');
            $id_paket = $this->input->post('id_paket');
            $opsi = [$opsi_a, $opsi_b, $opsi_c, $opsi_d];
            $this->db->where('id', $id_soal);
            $this->db->update('tb_soal', ['judul_soal' => $judul_soal]);
            $this->db->where('id_soal', $id_soal);
            $this->db->delete('tb_opsi');
            foreach ($opsi as $key => $value) {
                $kunci_jawaban = ($jawaban_benar == 'opsi_' . chr($key + 97)) ? 1 : 0;
                $this->db->insert('tb_opsi', ['id_soal' => $id_soal, 'opsi' => $value, 'kunci_jawaban' => $kunci_jawaban]);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/quis/' . $id_paket);
        } else {
            $this->load->view('halaman/admin/header', $data);
            $this->load->view('halaman/admin/sidebar', $data);
            $this->load->view('halaman/admin/updateSoal');
            $this->load->view('halaman/admin/footer');
        }
    }
    public function deleteSoal($id_soal = null, $id_paket = null)
    {
        $this->db->where('id_soal', $id_soal);
        $this->db->delete('tb_opsi');
        $this->db->where('id', $id_soal);
        $this->db->delete('tb_soal');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/quis/' . $id_paket);
    }




    public function quis($id_paket = null)
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'id_paket' => $id_paket,
            'soal' => $this->ModelTutor->getQuisById($id_paket),
        ];
        // var_dump($data['soal']);
        // die;
        $this->load->view('halaman/admin/header', $data);
        $this->load->view('halaman/admin/sidebar', $data);
        $this->load->view('halaman/admin/quis');
        $this->load->view('halaman/admin/footer');
    }






    public function transaksi()
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'transaksi' => $this->ModelTutor->getTransaksi($this->id_admin),
        ];
        // var_dump($data['transaksi']);
        // die;
        $this->load->view('halaman/admin/header', $data);
        $this->load->view('halaman/admin/sidebar', $data);
        $this->load->view('halaman/admin/transaksi');
        $this->load->view('halaman/admin/footer');
    }
    public function accTransaksi($id_transaksi)
    {
        $this->db->where('id', $id_transaksi)
            ->update('tb_transaksi', ['status' => 1]);
        $transaksi = $this->db->get_where('tb_transaksi', ['id' => $id_transaksi])->row_array();

        if ($transaksi) {
            $data_kelas = [
                'id_siswa' => $transaksi['id_siswa'],
                'id_paket' => $transaksi['id_paket']
            ];
            $this->db->insert('tb_kelas', $data_kelas);
            $paket = $this->db->get_where('tb_paket', ['id' => $transaksi['id_paket']])->row_array();

            if ($paket) {
                $terdaftar_baru = $paket['terdaftar'] + 1;
                $this->db->where('id', $paket['id'])
                    ->update('tb_paket', ['terdaftar' => $terdaftar_baru]);
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diupdate
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/transaksi');
    }
    public function laporanTransaksi()
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'transaksi' => $this->ModelTutor->getTransaksi($this->id_admin),
        ];
        // var_dump($data['transaksi']);
        // die;
        $this->load->view('halaman/admin/header', $data);
        $this->load->view('halaman/admin/cetakTransaksi');
        $this->load->view('halaman/admin/footer');
    }
    public function hapusTransaksi($id_transaksi)
    {
        $this->db->where('id', $id_transaksi)
            ->delete('tb_transaksi');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/transaksi');
    }

















    public function hapusKategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_kategori');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/kategori/');
    }
    public function ubahKategori($id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_kategori', ['judul_kategori' => $this->input->post('judul_kategori')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/kategori/');
    }

    public function kategori()
    {
        $data = [
            'nama' => $this->nama_panggilan,
            'email' => $this->email,
            'kategori' => $this->db->get('tb_kategori')->result_array(),
        ];
        if ($this->input->post()) {
            $this->db->insert('tb_kategori', ['judul_kategori' => $this->input->post('judul_kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
            redirect('admin/kategori');
        } else {

            $data['judul'] = 'kategori';
            $this->load->view('halaman/admin/header', $data);
            $this->load->view('halaman/admin/sidebar', $data);
            $this->load->view('halaman/admin/kategori');
            $this->load->view('halaman/admin/footer');
        }
    }
}
