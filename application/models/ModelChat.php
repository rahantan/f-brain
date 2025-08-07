<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelChat extends CI_Model
{
    public function getChatByIdTarget($id_user = null, $id_target = null, $id_kelas = null)
    {
        // $id_user = 4;
        // $id_target = 1;
        // $id_kelas = 13;
        $this->db->select('*');
        $this->db->from('tb_chat');
        // $this->db->join('tb_user', 'tb_pesan.id_target=tb_user.id');
        // $this->db->where('tb_user.id', $id_target);
        // $this->db->or_where('tb_user.id', $id_user);
        $this->db->where('tb_chat.id_user', $id_target);
        $this->db->where('tb_chat.id_target', $id_user);
        $this->db->where('tb_chat.id_kelas', $id_kelas);
        $this->db->or_where('tb_chat.id_user', $id_user);
        $this->db->where('tb_chat.id_target', $id_target);
        $this->db->where('tb_chat.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataTarget($id_target)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('tb_user.id', $id_target);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAlluser()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataKelas($id)
    {
        return $this->db->select('tb_kelas.id as kelas_id, tb_kelas.id_siswa, tb_kelas.id_paket, tb_kelas.waktu, tb_paket.id as paket_id, tb_paket.judul_paket, tb_paket.gambar, tb_paket.deskripsi_judul, tb_paket.terdaftar, tb_paket.rating, tb_paket.main_deskripsi,tb_paket.id_tutor, tb_paket.harga')
            ->from('tb_kelas')
            ->join('tb_paket', 'tb_kelas.id_paket=tb_paket.id')
            ->where('tb_kelas.id_siswa', $id)
            ->get()->result();
    }


    public function getAdminChatByKelas($id_siswa)
    {
        $kelas = $this->getDataKelas($id_siswa);
        $targetAdmin = [];
        if ($kelas) {
            foreach ($kelas as $k) {
                $admin = $this->db->select('*')
                    ->from('tb_admin')
                    ->where('tb_admin.id', $k->id_tutor)
                    ->get()->row_array();
                array_push($targetAdmin, ['user' => $admin, 'kelas' => $k]);
            }
        }
        return $targetAdmin; // Mengembalikan $targetAdmin, bukan $kelas
    }

    // public function getDataKelas($id)
    // {
    //     return $this->db->select('*')
    //         ->from('tb_paket')
    //         ->join('tb_kelas', 'tb_kelas.id_paket=tb_paket.id')
    //         ->where('tb_kelas.id_siswa', $id)
    //         ->get()->result();
    // }

    public function getDataKelasAdmin($id)
    {
        return $this->db->select('*')
            ->from('tb_paket')
            ->join('tb_kelas', 'tb_paket.id=tb_kelas.id_paket')
            ->where('tb_paket.id_tutor', $id)
            ->get()->result();
    }

    public function getUserChatByKelas($id_admin)
    {
        $kelas = $this->getDataKelasAdmin($id_admin);
        $targetUser = [];
        if ($kelas) {
            foreach ($kelas as $k) {
                $user = $this->db->select('*')
                    ->from('tb_siswa')
                    ->join('tb_data_pribadi', 'tb_siswa.id=tb_data_pribadi.id_siswa')
                    // ->join('tb_paket', 'tb_kelas.id_paket=tb_paket.id')
                    ->where('tb_siswa.id', $k->id_siswa)
                    ->get()->row_array();
                array_push($targetUser, ['user' => $user, 'kelas' => $k]);
            }
        }
        return $targetUser;
    }
    public function sendChat($data)
    {
        return $this->db->insert('tb_chat', $data);
    }
}
