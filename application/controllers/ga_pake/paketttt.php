<?php
class Paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['paket'] = $this->ModelPaket->getPaket()->result();

        if ($this->session->userdata('email')) {
            $data['judul'] = 'Daftar Paket';

            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('paket/daftar-paket', $data);
            $this->load->view('admin/footer');
        } else {
            $data['user'] = 'Pengunjung';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('paket/daftar-paket-pengunjung', $data);
            $this->load->view('admin/footer');
        }
    }


    public function pembayaran()
    {
        // Validasi input
        $user_id = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // echo $user_id['id'];
        $id = $this->uri->segment(3);
        $data['paket'] = $this->ModelPaket->getPaketById($id);

        if ($data['paket']) {
            $this->form_validation->set_rules('id_paket', 'ID Paket', 'required|numeric'); // Menambahkan validasi ID Paket
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pembayaran/index', $data);
                // echo $this->session->userdata('user_id');
                // die;
            } else {
                $payment_data = array(
                    'id_user' => $user_id['id'], // Menggunakan user_id dari session
                    'id_paket' => $this->input->post('id_paket'),
                    'waktu' => date('Y-m-d H:i:s')
                );

                if ($this->ModelPaket->updatePaketku($payment_data)) {
                    // Jika update berhasil
                    redirect('paket');
                } else {
                    // Jika update gagal
                    redirect('payment/error');
                }
            }
        } else {
            redirect('paket');
        }
    }
}
