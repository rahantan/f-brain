<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelPaket extends CI_Model
{
    //manajemen buku
    public function getPaket()
    {
        return $this->db->get('tb_paket');
    }
    public function payment($dataPay = null)
    {
        return $this->db->insert($dataPay);
    }
    public function getPaketKu($id)
    {
        $query = $this->db->get_where('tb_paketku', ['id_user' => $id]);
        return $query->result();
    }
    public function getPaketById($id)
    {
        $query = $this->db->get_where('tb_paket', ['id' => $id]);
        return $query->row_array();
    }
    public function updatePaketku($data = null)
    {
        return $this->db->insert('tb_paketku', $data);
    }
    public function joinPaketku($id_user = null)
    {
        $this->db->select('*');
        $this->db->from('tb_paket');
        $this->db->join('tb_paketku', 'tb_paketku.id_paket = tb_paket.id');
        $this->db->where('tb_paketku.id_user', $id_user);
        return $this->db->get();
    }

    public function getKelasById($id_user = null, $id_paket = null)
    {
        $this->db->select('tb_pertemuan.*, tb_pertemuan.id as id_pertemuan'); // Menambahkan alias untuk id
        $this->db->from('tb_pertemuan');
        $this->db->join('tb_paketku', 'tb_pertemuan.id_paket = tb_paketku.id_paket'); // Menghubungkan id_paket
        $this->db->where('tb_paketku.id_user', $id_user); // Kondisi untuk id_user
        $this->db->where('tb_pertemuan.id_paket', $id_paket); // Kondisi untuk id_paket
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil query dalam bentuk array
    }
    // public function getKelasById($id_user = null, $id_paket = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_pertemuan');
    //     $this->db->join('tb_paketku', 'tb_pertemuan.id_paket = tb_paketku.id_paket'); // Menghubungkan id_paket
    //     $this->db->where('tb_paketku.id_user', $id_user); // Kondisi untuk id_user
    //     $this->db->where('tb_pertemuan.id_paket', $id_paket); // Kondisi untuk id_paket
    //     $query = $this->db->get();
    //     return $query->result(); // Mengembalikan hasil query dalam bentuk array
    // }

    public function getSoalByid($id_pertemuan = null)
    {
        // $kelas = $this->getKelasById($id_user, $id_paket);
        // if ($kelas) {
        $this->db->select('tb_soal.*');
        $this->db->from('tb_soal');
        $this->db->join('tb_pertemuan', 'tb_pertemuan.id= tb_soal.id_pertemuan');
        // $this->db->join('tb_opsi', 'tb_opsi.id=tb_soal.id');
        $this->db->where('tb_soal.id_pertemuan', $id_pertemuan);
        $query = $this->db->get();
        // } else {
        //     redirect('kelas');
        // }
        return $query->result();
    }
    public function getOpsiByid($id_soal)
    {
        $opsi = [];
        foreach ($id_soal as $id) {
            $this->db->select('tb_opsi.*');
            $this->db->from('tb_opsi');
            $this->db->join('tb_soal', 'tb_soal.id= tb_opsi.id_soal');
            $this->db->where('tb_opsi.id_soal', $id);
            $query = $this->db->get()->result();
            array_push($opsi, $query);
        }
        // $this->db->select('tb_opsi.*');
        // $this->db->from('tb_opsi');
        // $this->db->join('tb_soal', 'tb_soal.id= tb_opsi.id_soal');
        // $this->db->where('tb_opsi.id_soal', $id_soal);
        // $query = $this->db->get();
        return $opsi;
    }
    public function insertNilai($data = null)
    {
        return $this->db->insert('tb_nilai', $data);
    }
    public function getStatusLatihan($id_user = null, $id_pertemuan = null)
    {

        $this->db->select('*');
        $this->db->from('tb_nilai');
        $this->db->join('tb_pertemuan', 'tb_nilai.id_pertemuan=tb_pertemuan.id');
        $this->db->where('tb_pertemuan.id', $id_pertemuan);
        $this->db->where('tb_nilai.id_user', $id_user);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {

            return array(
                'status' => 0
            ); // Return array kosong jika data tidak ditemukan
        }
    }


















    // public function process_payment()
    // {
    //     // Validasi input
    //     // $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');

    //     if ($this->form_validation->run() == FALSE) {
    //         // Jika validasi gagal
    //         $this->load->view('payment_form');
    //     } else {
    //         // Jika validasi berhasil
    //         $payment_data = array(
    //             'user_id' => $this->session->userdata('user_id'),
    //             'amount' => $this->input->post('amount'),
    //             'status' => 'Pending',
    //             'created_at' => date('Y-m-d H:i:s')
    //         );

    //         if ($this->payment_model->create_payment($payment_data)) {
    //             // Proses pembayaran berhasil
    //             redirect('payment/success');
    //         } else {
    //             // Proses pembayaran gagal
    //             redirect('payment/error');
    //         }
    //     }
    // }
    // public function bukuWhere($where)
    // {
    //     return $this->db->get_where('tb_buku', $where);
    // }
    // public function simpanBuku($data = null)
    // {
    //     $this->db->insert('tb_buku', $data);
    // }
    // public function updateBuku($data = null, $where = null)
    // {
    //     $this->db->update('tb_buku', $data, $where);
    // }
    // public function hapusBuku($where = null)
    // {
    //     $this->db->delete('tb_buku', $where);
    // }
    // public function total($field, $where)
    // {
    //     $this->db->select_sum($field);
    //     if (!empty($where) && count($where) > 0) {
    //         $this->db->where($where);
    //     }
    //     $this->db->from('tb_buku');
    //     return $this->db->get()->row($field);
    // }
    // //manajemen kategori
    // public function getKategori()
    // {
    //     return $this->db->get('tb_kategori');
    // }
    // public function kategoriWhere($where)
    // {
    //     return $this->db->get_where('tb_kategori', $where);
    // }
    // public function simpanKategori($data = null)
    // {
    //     $this->db->insert('tb_kategori', $data);
    // }
    // public function hapusKategori($where = null)
    // {
    //     $this->db->delete('tb_kategori', $where);
    // }
    // public function updateKategori($where = null, $data = null)
    // {
    //     $this->db->update('tb_kategori', $data, $where);
    // }
    // //join
    // public function joinKategoriBuku($where)
    // {
    //     $this->db->select('buku.id_kategori,kategori.kategori');
    //     $this->db->from('buku');
    //     $this->db->join('kategori', 'kategori.id = buku.id_kategori');
    //     $this->db->where($where);
    //     return $this->db->get();
    // }
}
