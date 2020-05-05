<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    //MENU
    public function hapusMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function ubahMenu()
    {
        $data = [
            "menu" => $this->input->post('menu')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }


    //SUBMENU
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu`
                    JOIN `user_menu`
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                ";

        return $this->db->query($query)->result_array();
    }

    public function hapusSM($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }

    public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function ubahSM()
    {
        $data = [
            "judul" => $this->input->post('judul'),
            "menu_id" => $this->input->post('menu_id'),
            "url" => $this->input->post('url'),
            "icon" => $this->input->post('icon'),
            "is_active" => $this->input->post('is_active')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }
}
