<?php
class Chat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        // echo 'hello world';
        // die;
        if ($this->session->userdata('email')) {
            // $id_target = $this->uri->segment(3);
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['all_user'] = $this->ModelChat->getAlluser();
            // var_dump($data['all_user']);
            // die;
            // $chat = $this->ModelChat->getChatByIdTarget($data['user']['id'], $id_target);

            // if ($this->input->post()) {
            //     $data_chat = array(
            //         'id_user' => $data['user']['id'],
            //         'id_target' => $id_target,
            //         'isi_pesan' => $this->input->post('chat'),
            //         'waktu' => date('Y-m-d H:i:s'),
            //         'status' => 1,
            //     );
            //     $this->ModelChat->sendChat($data_chat);
            //     redirect('chat/chating/' . $id_target);
            // } else {

            // $data['chat'] = $chat;
            $this->load->view('chat/header', $data);
            $this->load->view('chat/home_chat', $data);
            $this->load->view('chat/footer', $data);
        } else {

            redirect('autentifikasi');
        }
    }


    public function chating()
    {
        // echo 'hello world';
        // die;
        if ($this->session->userdata('email')) {
            $data['judul'] = 'Daftar Paket';
            $id_target = $this->uri->segment(3);
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['target'] = $this->ModelChat->getDataTarget($id_target);
            $data['all_user'] = $this->ModelChat->getAlluser();
            $chat = $this->ModelChat->getChatByIdTarget($data['user']['id'], $id_target);

            if ($this->input->post()) {
                $data_chat = array(
                    'id_user' => $data['user']['id'],
                    'id_target' => $id_target,
                    'isi_pesan' => $this->input->post('chat'),
                    'waktu' => date('Y-m-d H:i:s'),
                    'status' => 1,
                );
                $this->ModelChat->sendChat($data_chat);
                redirect('chat/chating/' . $id_target);
            } else {

                $data['chat'] = $chat;
                $this->load->view('chat/header', $data);
                $this->load->view('chat/chating', $data);
                $this->load->view('chat/footer', $data);
            }
        } else {

            redirect('autentifikasi');
        }
    }
}
