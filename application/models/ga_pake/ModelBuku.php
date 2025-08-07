<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelBuku extends CI_Model
{
    //manajemen buku
    public function getBuku()
    {
        return $this->db->get('tb_paket');
    }
    public function bukuWhere($where)
    {
        return $this->db->get_where('tb_buku', $where);
    }
    public function simpanBuku($data = null)
    {
        $this->db->insert('tb_buku', $data);
    }
    public function updateBuku($data = null, $where = null)
    {
        $this->db->update('tb_buku', $data, $where);
    }
    public function hapusBuku($where = null)
    {
        $this->db->delete('tb_buku', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('tb_buku');
        return $this->db->get()->row($field);
    }
    //manajemen kategori
    public function getKategori()
    {
        return $this->db->get('tb_kategori');
    }
    public function kategoriWhere($where)
    {
        return $this->db->get_where('tb_kategori', $where);
    }
    public function simpanKategori($data = null)
    {
        $this->db->insert('tb_kategori', $data);
    }
    public function hapusKategori($where = null)
    {
        $this->db->delete('tb_kategori', $where);
    }
    public function updateKategori($where = null, $data = null)
    {
        $this->db->update('tb_kategori', $data, $where);
    }
    //join
    public function joinKategoriBuku($where)
    {
        $this->db->select('buku.id_kategori,kategori.kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }
}
