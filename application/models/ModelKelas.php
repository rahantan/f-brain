<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKelas extends CI_Model
{

    public function getTotalLangkah()
    {
        $paket = $this->db->get('tb_paket')->result();
        $data = [];

        if ($paket) {
            foreach ($paket as $p) {
                $id_paket = $p->id;
                $judul_paket = $p->judul_paket;
                $query = $this->db->query("SELECT COUNT(*) AS jumlah_langkah FROM tb_langkah WHERE id_paket = $id_paket")->row();

                $data[] = [
                    'id_paket' => $id_paket,
                    'judul_paket' => $judul_paket,
                    'jumlah_langkah' => $query->jumlah_langkah
                ];
            }
        }

        return $data;
    }

    public function kalkulasiStatusLangkah($id_siswa)
    {
        $total = $this->getTotalLangkah();
        $tb_paket = $this->db->select('tb_kelas.id as kelas_id, tb_kelas.id_siswa, tb_kelas.id_paket, tb_kelas.waktu, tb_paket.id as paket_id, tb_paket.judul_paket, tb_paket.gambar, tb_paket.deskripsi_judul, tb_paket.terdaftar, tb_paket.rating, tb_paket.main_deskripsi,tb_paket.id_tutor, tb_paket.harga')
            ->from('tb_kelas')
            ->join('tb_paket', 'tb_paket.id = tb_kelas.id_paket')
            ->join('tb_klangkah', 'tb_klangkah.id_kelas = tb_kelas.id_paket')
            ->where('tb_kelas.id_siswa', $id_siswa)
            // ->where('tb_kelas.id_siswa', $id_siswa)
            ->get()->result();
        $data = [];
        $seen = [];

        foreach ($total as $t) {
            foreach ($tb_paket as $p) {
                if ($t['id_paket'] == $p->id_paket && !in_array($t['id_paket'], $seen)) {

                    $total_klangkah_query = "SELECT COUNT(*) AS jumlah_langkah FROM tb_klangkah WHERE id_kelas = {$p->id_paket} AND id_siswa = {$id_siswa}";

                    $total_klangkah = $this->db->query($total_klangkah_query)->row();
                    error_log("Query: $total_klangkah_query, Result: " . print_r($total_klangkah, true));

                    $rata = $t['jumlah_langkah'] - $total_klangkah->jumlah_langkah;
                    $rata = ($total_klangkah->jumlah_langkah / $t['jumlah_langkah']) * 100;
                    $data[] = [
                        'id_paket' => $t['id_paket'],
                        'judul_paket' => $t['judul_paket'],
                        'ratarata' => $rata,
                        'jumlah_langkah' => $t['jumlah_langkah'],
                        'klangkah' => $total_klangkah->jumlah_langkah,
                        'r' => $rata
                    ];
                    $seen[] = $t['id_paket'];
                    if ($rata == 100) {
                        $k = $this->db->get_where('tb_kelas', ['id' => $p->kelas_id, 'id_siswa' => $id_siswa])->row_array();
                        if ($k['id'] != 1) {
                            $this->db->update('tb_kelas', ['status' => 1], ['id_siswa' => $id_siswa, 'id' => $p->kelas_id]);
                        }
                        // return $p->kelas_id;
                    }
                }
            }
        }

        return $data;
    }






























    // public function getSoalById($id_kelas, $id_siswa)
    // { 
    //     $kelas=$this->getDataKelas($id_siswa);
    //     if($kelas){

    //     }
    //     $soal = $this->db->select('*');
    // }
    public function getSoalById($id_kelas, $id_siswa)
    {
        $data = [];
        $kelas = $this->db->select('tb_kelas.id as id_kelas, tb_paket.id as id_paket, tb_paket.judul_paket')
            ->from('tb_kelas')
            ->join('tb_paket', 'tb_kelas.id_paket=tb_paket.id')
            ->where('tb_kelas.id_siswa', $id_siswa)
            ->where('tb_kelas.id_paket', $id_kelas)
            ->get()->result();
        if (!empty($kelas)) {

            $id_paket = $kelas[0]->id_paket;
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
        }

        return $data;
    }
    // public function getDataNilai($id_siswa, $id_paket)
    // {
    //     $id_kelas = $this->db->get_where('tb_kelas', ['id_siswa' => $id_siswa, 'id_paket' => $id_paket])->row_array();
    //     if ($id_kelas) {
    //         $dataNilai = $this->db->select('*')
    //             ->from('tb_nilai')
    //             ->where('tb_nilai.id_kelas', $id_kelas['id'])
    //             ->get()->row_array();
    //     }
    //     return $id_kelas;
    // }




    public function getDataKelas($id)
    {
        return $this->db->select('*')
            ->from('tb_kelas')
            ->join('tb_paket', 'tb_kelas.id_paket=tb_paket.id')
            // ->join('tb_langkah', 'tb_langkah.id_paket=tb_paket.id')
            ->where('tb_kelas.id_siswa', $id)
            ->get()->result();
    }
    public function getDataAktivitasKelas($id)
    {
        $kelas = $this->db->select('*')
            ->from('tb_kelas')
            ->join('tb_paket', 'tb_kelas.id_paket = tb_paket.id')
            // ->join('tb_langkah', 'tb_langkah.id_paket = tb_paket.id') 
            ->where('tb_kelas.id_siswa', $id)
            ->where('tb_kelas.waktu !=', '0000-00-00')
            ->get()
            ->result();

        return $kelas;
    }


    public function getLangkah($id)
    {
        $langkah = [];
        $data_langkah = $this->db->get('tb_langkah')->result();
        $kelas = $this->getDataKelas($id);
        $total_langkah = 0;

        foreach ($data_langkah as $l) {
            foreach ($kelas as $k) {
                if ($l->id_paket == $k->id_paket) {
                    array_push($langkah, $l);
                    $total_langkah += 1;
                }
            }
        }
        return [
            'langkah' => $langkah,
            'total_langkah' => $total_langkah
        ];
    }

    public function getKelasById($id_kelas, $id_siswa)
    {
        // echo "tess";
        // die;
        $kelas = $this->db->select('*')
            ->from('tb_kelas')
            ->join('tb_paket', 'tb_paket.id=tb_kelas.id_paket')
            ->where(['tb_kelas.id_siswa' => $id_siswa, 'tb_kelas.id_paket' => $id_kelas])
            ->get()->row_array();
        if ($kelas) {
            $kelas['langkah'] = [];
            $langkah = $this->db->get_where('tb_langkah', ['id_paket' => $kelas['id_paket']],)->result();
            if ($langkah) {
                foreach ($langkah as $l) {
                    $klangkah = $this->db->select('*')
                        ->from('tb_klangkah')
                        ->where('tb_klangkah.id_kelas', $id_kelas)
                        ->where('tb_klangkah.id_langkah', $l->id)
                        ->where('tb_klangkah.id_siswa', $id_siswa)
                        ->get()->row_array();
                    if ($klangkah) {
                        $data = [
                            'id' => $l->id,
                            'judul_langkah' => $l->judul_langkah,
                            'deskripsi' => $l->deskripsi,
                            'modul' => $l->modul,
                            'id_paket' => $l->id_paket,
                            'status' => 'selesai'
                        ];
                        array_push($kelas['langkah'], $data);
                    } else {
                        $data = [
                            'id' => $l->id,
                            'judul_langkah' => $l->judul_langkah,
                            'deskripsi' => $l->deskripsi,
                            'modul' => $l->modul,
                            'id_paket' => $l->id_paket,
                            'status' => 'belum'
                        ];
                        array_push($kelas['langkah'], $data);
                    }
                }
            } else {
            }
        }
        return $kelas;
    }


















    public function getLangkahById($id_langkah, $id_kelas, $id_siswa)
    {
        $kelas = $this->getKelasById($id_kelas, $id_siswa);
        if ($kelas) {
            $kelas['topik'] = $this->db->get_where('tb_topik', ['id_langkah' => $id_langkah])->result();
        }
        return $kelas;
    }
    public function getTopichById($id_topik, $id_langkah, $id_kelas, $id_siswa)
    {
        $kelas = $this->getLangkahById($id_langkah, $id_kelas, $id_siswa);
        if ($kelas) {
            $kelas['data_topik'] = $this->db->get_where('tb_topik', ['id' => $id_topik])->row_array();
        } else {
            return "kosong";
        }
        return $kelas;
    }


    public function getDaftarSiswa($id_tutor, $id_paket)
    {
        return $this->db->select('*')
            ->from('tb_paket')
            ->join('tb_kelas', 'tb_paket.id=tb_kelas.id_paket')
            ->where('tb_paket.id_tutor', $id_tutor)
            ->where('tb_paket.id', $id_paket)
            ->get()->result();
    }
    public function getSiswaTerdaftar($id_admin, $id_paket)
    {
        $kelas = $this->getDaftarSiswa($id_admin, $id_paket);
        $targetUser = [];
        if ($kelas) {
            foreach ($kelas as $k) {
                $user = $this->db->select('*')
                    ->from('tb_siswa')
                    ->where('tb_siswa.id', $k->id_siswa)
                    ->get()->row_array();
                array_push($targetUser, $user);
            }
        }
        return $targetUser;
    }
}
