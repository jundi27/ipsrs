<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MEnu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
    }

    //MENU
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

    public function hapus($id)
    {
        $this->Menu_model->hapusMenu($id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Menu berhasil di hapus!</div>');
        redirect('menu');
    }

    public function ubah($id)
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['user_menu'] = $this->Menu_model->getMenuById($id);

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah-menu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->ubahMenu();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu berhasil diubah!</div>');
            redirect('menu');
        }
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

    public function ubahSubmenu($id)
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->Menu_model->getAllMenu();

        $data['submenu'] = $this->Menu_model->getSubMenu();
        $data['user_menu'] = $this->Menu_model->getMenuById($id);
        $data['user_submenu'] = $this->Menu_model->getSubMenuById($id);

        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('judul', 'Sub Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Ikon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah-submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->ubahSM();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Submenu berhasil diubah!</div>');
            redirect('menu/submenu');
        }
    }

    public function hapusSubmenu($id)
    {
        $this->Menu_model->hapusSM($id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Submenu berhasil di hapus!</div>');
        redirect('menu/submenu');
    }
}
