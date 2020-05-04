<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MEnu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function hapusMenu($id)
    {
        return $this->db->delete('user_menu', ['id' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Menu berhasil di hapus!</div>');
        redirect('menu');
    }

    // SUBMENU
    public function submenu()
    {
        $data['title'] = 'Submenu Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['subMenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Submenu baru berhasil ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function hapusSubMenu($id)
    {
        return $this->db->delete('user_sub_menu', ['id' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Submenu berhasil di hapus!</div>');
        redirect('menu/submenu');
    }
}
