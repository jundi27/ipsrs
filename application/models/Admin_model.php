<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getAlkes(){
        $query = "select * from `akun` where `id`";
        return $this->db->query($query)->result_array();
    }

    public function getHapusAlkes($id){
        $this->db->delete('alkes', array( 'id' => $id));
    }
}
