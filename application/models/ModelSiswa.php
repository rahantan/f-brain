<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelSiswa extends CI_Model
{
    public function insertSiswa($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function getSiswaByEmail($tabel, $email)
    {
        return $this->db->get_where($tabel, ['email' => $email])->row_array();
    }
    public function insertDataDiri($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }
    public function getDataSiswa($id)
    {
        $s = $this->db->select('*')
            // ->from('tb_siswa')
            ->from('tb_data_pribadi')
            ->join('tb_siswa', 'tb_data_pribadi.id_siswa=tb_siswa.id')
            // ->join('tb_data_pribadi', 'tb_siswa.id=tb_data_pribadi.id')
            ->where('tb_data_pribadi.id_siswa', $id)
            ->get()->row_array();
        $progres = 0;
        if ($s) {
            if (!empty($s['nama_lengkap'])) {
                $progres += 1;
            }
            if (!empty($s['no_telp'])) {
                $progres += 1;
            }
            if (!empty($s['tempat_lahir'])) {
                $progres += 1;
            }
            if ($s['tanggal_lahir'] !== '0000-00-00') {
                $progres += 1;
            }
            if ($s['lokasi'] !== 'online') {
                $progres += 1;
            }
            if (!empty($s['pendidikan'])) {
                $progres += 1;
            }
            if (!empty($s['institusi'])) {
                $progres += 1;
            }
            if (!empty($s['profesi'])) {
                $progres += 1;
            }
            $progres = ($progres / 8) * 100;
        }
        return [
            'data_siswa' => $s,
            'progres_profil' => $progres
        ];
    }
    public function getTransaksiById($id_siswa, $id_paket)
    {
        return $this->db->select('tb_transaksi.*,tb_paket.judul_paket,tb_paket.harga')
            ->from('tb_transaksi')
            ->join('tb_paket', 'tb_transaksi.id_paket=tb_paket.id')
            ->where('tb_transaksi.id_siswa', $id_siswa)
            ->where('tb_transaksi.id_paket', $id_paket)
            ->get()->result_array();
    }
}
