<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTutor extends CI_Model
{
    public function getPaketById($id_tutor)
    {
        $where = [
            'id_tutor' => $id_tutor
        ];
        return $this->db->get_where('tb_paket', $where)->result();
    }
    public function getLangkahByid($id_tutor, $id_paket)
    {
        $query = $this->db->select('*')
            ->from('tb_paket')
            ->join('tb_langkah', 'tb_paket.id=tb_langkah.id_paket')
            ->where('tb_paket.id', $id_paket)
            ->where('tb_paket.id_tutor', $id_tutor)
            ->get();

        return $query->result();
    }
    public function getTopikByid($id_langkah)
    {
        $query = $this->db->select('*')
            ->from('tb_langkah')
            ->join('tb_topik', 'tb_langkah.id=tb_topik.id_langkah')
            ->where('tb_langkah.id', $id_langkah)
            // ->where('tb_paket.id_tutor', $id_tutor)
            ->get();
        return $query->result();
    }
    public function insertPaket($data)
    {
        $this->db->insert('tb_paket', $data);
    }
    public function insertlangkah($data)
    {

        $this->db->insert('tb_langkah', $data);
    }
    public function insertTopik($data)
    {

        $this->db->insert('tb_topik', $data);
    }
    public function getQuisById($id_paket)
    {
        $data = [];
        $data['soal'] = $this->db->select('*')
            ->from('tb_soal')
            ->where('tb_soal.id_paket', $id_paket)
            ->get()->result();
        if (!empty($data['soal'])) {
            foreach ($data['soal'] as $index => $s) {
                $data['soal'][$index]->opsi = $this->db->select('*')
                    ->from('tb_opsi')
                    ->where('tb_opsi.id_soal', $s->id)
                    ->get()->result();
            }
        }

        return $data;
    }
    public function getTransaksi($id_admin)
    {
        return $this->db->select('tb_admin.id,tb_paket.id,tb_paket.judul_paket,tb_transaksi.id,tb_transaksi.id_siswa,tb_transaksi.status,tb_transaksi.bukti_pembayaran,tb_transaksi.waktu,tb_transaksi.jumlah_tagihan,tb_siswa.email')
            ->from('tb_admin')
            ->join('tb_paket', 'tb_paket.id_tutor=tb_admin.id')
            ->join('tb_transaksi', 'tb_transaksi.id_paket=tb_paket.id')
            ->join('tb_siswa', 'tb_transaksi.id_siswa=tb_siswa.id')
            ->where('tb_admin.id', $id_admin)->get()->result();
    }
    public function updateTransaksi($id_transaksi)
    {
        $this->db->where('id', $id_transaksi)
            ->update('tb_transaksi', ['status' => 1]);
        $t = $this->db->get_where('tb_transaksi', ['id' => $id_transaksi])->row_array();
        if ($t) {
            $data = [
                'id_siswa' => $t['id_siswa'],
                'id_paket' => $t['id_paket']
            ];
            $this->db->insert('tb_kelas', $data);
            $p = $this->db->get_where('tb_paket', ['id' => $t['id_paket']])->row_array();
            if ($p) {
                $terdaftar = $p['terdaftar'] + 1;
                $this->db->where('id', $p['id'])
                    ->update('tb_paket', ['terdaftar' => $terdaftar]);
            }
        }
    }






    // public function insertPembayaran($id_user, $id_paket, $data)
    // {
    //     $this->db->insert('tb_transaksi', $data);
    // }
    // public function get_filter_paket()
    // {
    //     $this->db->order_by('terdaftar', 'DESC');
    //     $query = $this->db->get('tb_paket', 4);
    //     return $query->result();
    // }
    // public function getPakeTDetailtById($id)
    // {
    //     $dataPaket = $this->db->get_where('tb_paket', ['id' => $id])->row_array();
    //     if ($dataPaket) {
    //         $dataLangkah = $this->db->get_where('tb_langkah', ['id_paket' => $dataPaket['id']]);
    //     }
    //     $dataPaketById = [
    //         'dataPaket' => $dataPaket,
    //         'dataLangkah' => $dataLangkah->result()
    //     ];
    //     return $dataPaketById;
    // }
}
