<?php
function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alertdanger" role="alert">Akses ditolak. Anda belum login!! </div>');
        redirect('autentifikasi');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}
