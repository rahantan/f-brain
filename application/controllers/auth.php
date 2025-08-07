<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        echo "hello om";
    }

    public function logn()
    {
        $this->load->view('templates/user_login/header');
        $this->load->view('autentifikasi/login');
        $this->load->view('templates/user_login/footer');
    }


    public function login()
    {
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_login/header');
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/user_login/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->ModelSiswa->getSiswaByEmail('tb_siswa', $email);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $session_data = [
                        'id_siswa' => $user['id'],
                        'nama_pengguna' => $user['nama_pengguna'],
                        'waktu' => $user['waktu'],
                        'email' => $user['email'],
                    ];
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('message', '<script>Swal.fire("Berhasil", "Berhasi login!", "success")</script>');
                    redirect('member/aktivitas');
                } else {
                    // Password salah
                    $this->session->set_flashdata('message', '<script>Swal.fire("Gagal", "Password salah!", "error")</script>');
                    redirect('auth/login');
                }
            } else {
                // Pengguna tidak ditemukan
                $this->session->set_flashdata('message', '<script>Swal.fire("Gagal", "Email tidak terdaftar!", "error")</script>');
                redirect('auth/login');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<script>Swal.fire("Berhasil", "Logout berhasil!", "success")</script>');
        redirect('auth/login');
    }

    public function loginTutor()
    {
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_login/header');
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/user_login/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->ModelSiswa->getSiswaByEmail('tb_admin', $email);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $session_data = [
                        'id_admin' => $user['id'],
                        'nama_pengguna' => $user['nama_pengguna'],
                        'email' => $user['email'],
                    ];
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Login Berhasil
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
                    redirect('admin/kelas/');
                } else {
                    // Password salah
                    $this->session->set_flashdata('message ', '<script>Swal.fire("Gagal", "Password salah!", "error")</script>');
                    redirect('auth/loginTutor');
                }
            } else {
                // Pengguna tidak ditemukan
                $this->session->set_flashdata('message', '<script>Swal.fire("Gagal", "Email tidak terdaftar!", "error")</script>');
                redirect('auth/loginTutor');
            }
        }
    }



























    public function register()
    {
        $this->form_validation->set_rules(
            'username',
            'Nama Lengkap',
            'required',
            [
                'required' => 'Nama Belum Diisi !!'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[tb_siswa.email]',
            [
                'valid_email' => 'Email Tidak Benar !!',
                'required' => 'Email Belum Diisi !!',
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
            $data = ['action' => 'register'];
            $this->load->view('templates/user_login/header');
            $this->load->view('autentifikasi/daftar', $data);
            $this->load->view('templates/user_login/footer');
        } else {
            $data = [
                'nama_pengguna' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'waktu' => date('y-m-d'),
            ];
            $this->ModelSiswa->insertSiswa('tb_siswa', $data);
            $this->session->set_flashdata('message', '<script>SSwal.fire({
                title: "Sukses",
                text: "Registrasi berhasil!",
                icon: "success"
            });</script>');
            redirect('auth/login');
        }
    }

    public function registerTutor()
    {
        $this->form_validation->set_rules(
            'username',
            'Nama Lengkap',
            'required',
            [
                'required' => 'Nama Belum Diisi !!'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[tb_siswa.email]',
            [
                'valid_email' => 'Email Tidak Benar !!',
                'required' => 'Email Belum Diisi !!',
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

        $data = ['action' => 'registerTutor'];
        if ($this->form_validation->run() == false) {
            // echo $action;
            // die;
            $this->load->view('templates/user_login/header');
            $this->load->view('autentifikasi/daftar', $data);
            $this->load->view('templates/user_login/footer');
        } else {
            $data = [
                'nama_pengguna' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => 1,

            ];
            $this->ModelSiswa->insertSiswa('tb_admin', $data);
            $this->session->set_flashdata('message', '<script>SSwal.fire({
                title: "Sukses",
                text: "Registrasi berhasil!",
                icon: "success"
            });</script>');
            redirect('auth/loginTutor');
        }
    }
}
