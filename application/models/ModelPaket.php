<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPaket extends CI_Model
{
    public function getPaketById($id)
    {
        return $this->db->get_where('tb_paket', ['id' => $id])->row_array();
    }

    public function insertPembayaran($id_user, $id_paket, $data)
    {
        $this->db->insert('tb_transaksi', $data);
    }
    public function get_filter_paket()
    {
        $this->db->order_by('terdaftar', 'DESC');
        $query = $this->db->get('tb_paket', 4);
        return $query->result();
    }
    public function getPakeTDetailtById($id)
    {
        $dataPaket = $this->db->get_where('tb_paket', ['id' => $id])->row_array();
        if ($dataPaket) {
            $dataLangkah = $this->db->get_where('tb_langkah', ['id_paket' => $dataPaket['id']]);
        }
        $dataPaketById = [
            'dataPaket' => $dataPaket,
            'dataLangkah' => $dataLangkah->result()
        ];
        return $dataPaketById;
    }
    // public function getPaketByKategori($id_siswa, $id_kategori)
    // {
    //     $this->db->select('*')
    //         ->from('tb_paket')
    //         ->join('tb_pkategori')
    //         ->join('tb_pkategori');
    // }
    public function getPaketAll($id_siswa = null, $id_kategori = null)
    {
        if ($id_siswa != null) {
            $this->db->select('tb_paket.*, tb_transaksi.id AS transaksi_id');
            $this->db->from('tb_paket');
            $this->db->join('tb_transaksi', 'tb_transaksi.id_paket = tb_paket.id AND tb_transaksi.id_siswa = ' . ($id_siswa ? $id_siswa : 'NULL'), 'left');
        } else {
            $this->db->select('*')->from('tb_paket');
        }

        if ($id_kategori != null) {
            $this->db->join('tb_pkategori', 'tb_pkategori.id_paket = tb_paket.id');
            $this->db->where('tb_pkategori.id_kategori', $id_kategori);
        }

        $query = $this->db->get();
        $paket = $query->result();

        $data = [];
        foreach ($paket as $p) {
            $p_array = [
                'id' => $p->id,
                'judul_paket' => $p->judul_paket,
                'harga' => $p->harga,
                'terdaftar' => $p->terdaftar,
                'main_deskripsi' => $p->main_deskripsi,
                'gambar' => $p->gambar,
                'id_tutor' => $p->id_tutor,

            ];
            if ($id_siswa != null) {

                $p_array['status'] = ($p->transaksi_id) ? 1 : 0;
            }
            array_push($data, $p_array);
        }
        return $data;
    }


    public function getTransaksiById($id_siswa)
    {

        return $this->db->select('*')
            ->from('tb_transaksi')
            ->join('tb_paket', 'tb_transaksi.id_paket=tb_paket.id')
            ->where('tb_transaksi.id_siswa', $id_siswa)
            ->get()->result();
    }

    // public function getDataTransaksiByid($id_admin)
    // {
    //     $data=[]
    //     $paket = $this->db->select('*')
    //         ->from('tb_admin')
    //         ->join('tb_paket', 'tb_admin.id=tb_paket.id_tutor')
    //         // ->join('tb_transaksi', 'tb_paket.id=tb_transaksi.id_paket')
    //         ->where('tb_admin.id', $id_admin)->get()->result();
    //         foreach($paket as $p){
    //             if
    //         }
    // }
}
