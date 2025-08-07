<?php
defined('BASEPATH') or exit('No direct script access allowed');

class autentifikasilama extends CI_Controller
{
    public function blok()
    {
        $this->load->view('autentifikasi/blok');
    }
    public function gagal()
    {
        $this->load->view('autentifikasi/gagal');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('halaman/beranda');
        }
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email',
            [
                'required' => 'Email Harus diisi!!',
                'valid_email' => 'Email Tidak Benar!!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Harus diisi'
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['siswa'] = '';
            $this->load->view('templates/aute_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/aute_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $siswa = $this->ModelSiswa->cekData(['email' => $email])->row_array();
        if ($siswa) {
            if (password_verify($password, $siswa['password'])) {
                $data = [
                    'email' => $user['email']
                ];
                $this->session->set_userdata($data);
                // if ($siswa['image'] == 'default.jpg') {
                //     $this->session->set_flashdata(
                //         'pesan',
                //         '<div class="alert alert-info alert-message" role="alert">Silahkan
                //             Ubah Profile Anda untuk Ubah Photo Profil</div>'
                //     );
                // }
                redirect('halaman/beranda');
            } else {
                $this->session->set_flashdata('pesan', '<div
                    class="alert alert-danger alert-message" role="alert">Password
                    salah!!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert
            alert-danger alert-message" role="alert">Email tidak
            terdaftar!!</div>');
            redirect('autentifikasi');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda telah berhasil logout.</div>');
        redirect('autentifikasi');
    }
    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('halaman/beranda');
        }
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            [
                'required' => 'Nama Belum diis!!'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[tb_user.email]',
            [
                'valid_email' => 'Email Tidak Benar!!',
                'required' => 'Email Belum diisi!!',
                'is_unique' => 'Email Sudah Terdaftar!'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama!!',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules('password2', 'Repeat
        Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Akun';
            $this->load->view('templates/aute_header', $data);
            $this->load->view('autentifikasi/registrasi');
            $this->load->view('templates/aute_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama_pengguna' => htmlspecialchars($this->input->post(
                    'nama',
                    true
                )),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'waktu' => time()
            ];
            $this->ModelSiswa->simpanData($data); //menggunakan model

            $this->session->set_flashdata('pesan', '<div class="alert
            alert-success alert-message" role="alert">Selamat!! akun member anda
            sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('autentifikasi');
        }
    }
}
