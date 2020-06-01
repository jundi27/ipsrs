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
}
