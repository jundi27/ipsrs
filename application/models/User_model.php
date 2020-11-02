<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getPengaduan()
    {
        $query = "SELECT `pengaduan`.*, `fasilitas`.`kerusakan`
                    FROM `pengaduan`
                    JOIN `fasilitas`
                      ON `pengaduan`.`kerusakan_id` = `fasilitas`.`id` 
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getPengaduanDiteruskan($id_teknisi)
    {
        $this->db->select("*");
        $this->db->from("pengaduan");
        $this->db->join("fasilitas", "pengaduan.kerusakan_id = fasilitas.id");
        $this->db->join("forward_pengaduan", "forward_pengaduan.id_pengaduan = pengaduan.id");
        $this->db->join("user", "user.id = forward_pengaduan.id_teknisi");
        $this->db->where("forward_pengaduan.id_teknisi", $id_teknisi);
        return $this->db->get();
    }

    public function getKendala()
    {
        $query = "SELECT `kendala`.*
                    FROM `kendala`
                ";

        return $this->db->query($query)->result_array();
    }

    public function perbaikiPengaduan($id_forward)
    {
        $this->db->where("id_forward", $id_forward);
        return $this->db->update("forward_pengaduan", [
            "status" => "Sedang Diperbaiki"
        ]);
    }

    public function tolakPengaduan($id_forward, $alasan)
    {
        $this->db->where("id_forward", $id_forward);
        return $this->db->update("forward_pengaduan", [
            "status" => "Ditolak",
            "alasan_penolakan" => $alasan
        ]);
    }
}
