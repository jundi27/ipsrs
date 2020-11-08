<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getPengaduan()
    {
        $query = "SELECT `pengaduan`.*, pengaduan.id as p_id, `fasilitas`.`kerusakan`
                    FROM `pengaduan`
                    JOIN `fasilitas`
                      ON `pengaduan`.`kerusakan_id` = `fasilitas`.`id`
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getPengaduanDiteruskan($id_teknisi)
    {
        $this->db->select("*");
        $this->db->select("pengaduan.id p_id");
        $this->db->from("pengaduan");
        $this->db->join("fasilitas", "pengaduan.kerusakan_id = fasilitas.id");
        $this->db->join("forward_pengaduan", "forward_pengaduan.id_pengaduan = pengaduan.id");
        $this->db->join("user", "user.id = forward_pengaduan.id_teknisi");
        $this->db->where("forward_pengaduan.id_teknisi", $id_teknisi);
        return $this->db->get();
    }

    public function getPengaduanOlehPegawai($id_pegawai)
    {
        $this->db->select("*");
        $this->db->select("pengaduan.id p_id");
        $this->db->from("pengaduan");
        $this->db->join("fasilitas", "pengaduan.kerusakan_id = fasilitas.id");
        $this->db->where("pengaduan.id_user", $id_pegawai);
        return $this->db->get();
    }

    public function getDetailPeng($id)
    {
        return $this->db->get_where('pengaduan', ['id' => $id])->row_array();
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

    public function tundaPengaduan($id_forward, $kendala_kerusakan)
    {
        $this->db->where("id_forward", $id_forward);
        return $this->db->update("forward_pengaduan", [
            "status" => "Ditunda",
            "kendala_kerusakan" => $kendala_kerusakan
        ]);
    }

    public function selesaiPerbaikiPengaduan($id_forward)
    {
        $this->db->where("id_forward", $id_forward);
        return $this->db->update("forward_pengaduan", [
            "status" => "Sudah Diperbaiki"
        ]);
    }

    public function selesaikanPengaduan($id_forward)
    {
        $data = $this->db->query("SELECT pengaduan.nama as nama_pengadu, pengaduan.nip, pengaduan.brg, pengaduan.ruangan, pengaduan.tgl, pengaduan.ket, forward_pengaduan.status, forward_pengaduan.alasan_penolakan, forward_pengaduan.edit_alasan_penolakan, forward_pengaduan.alasan_pengembalian, forward_pengaduan.kendala_kerusakan, forward_pengaduan.edit_kendala_kerusakan, fasilitas.kerusakan, user.nama as nama_teknisi, user.lvl as lvl_teknisi FROM `pengaduan` JOIN forward_pengaduan ON pengaduan.id = forward_pengaduan.id_pengaduan JOIN user ON forward_pengaduan.id_teknisi = user.id JOIN fasilitas ON pengaduan.kerusakan_id = fasilitas.id WHERE forward_pengaduan.id_forward = '$id_forward'")->row_array();
        $this->db->insert('history_pengaduan', $data);
        $query = $this->db->get_where('forward_pengaduan', ['id_forward' => $id_forward])->row();
        $this->db->delete('pengaduan', ['id' => $query->id_pengaduan]);
        return $this->db->delete('forward_pengaduan', ['id_forward' => $id_forward]);
    }

    public function mintaLagi($id_forward, $alasan_pengembalian)
    {
        $this->db->where("id_forward", $id_forward);
        return $this->db->update("forward_pengaduan", [
            "status" => "Dikembalikan",
            "alasan_penolakan" => "",
            "edit_alasan_penolakan" => "",
            "kendala_kerusakan" => "",
            "edit_kendala_kerusakan" => "",
            "alasan_pengembalian" => $alasan_pengembalian
        ]);
    }
}
