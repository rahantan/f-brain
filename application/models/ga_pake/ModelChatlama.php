<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelChat extends CI_Model
{
    public function getChatByIdTarget($id_user = null, $id_target = null)
    {
        $this->db->select('*');
        $this->db->from('tb_pesan');
        // $this->db->join('tb_user', 'tb_pesan.id_target=tb_user.id');
        // $this->db->where('tb_user.id', $id_target);
        // $this->db->or_where('tb_user.id', $id_user);
        $this->db->where('tb_pesan.id_user', $id_target);
        $this->db->where('tb_pesan.id_target', $id_user);
        $this->db->or_where('tb_pesan.id_user', $id_user);
        $this->db->where('tb_pesan.id_target', $id_target);
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
    public function sendChat($data)
    {
        return $this->db->insert('tb_pesan', $data);
    }
    public function getAlluser()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $query = $this->db->get();
        return $query->result();
    }
}
