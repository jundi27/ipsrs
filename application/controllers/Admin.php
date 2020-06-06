<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // AKSES
    public function akses()
    {
        $data['title'] = 'Akses Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/akses', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Role baru berhasil ditambahkan!</div>');
            redirect('admin/akses');
        }
    }

    public function roleakses($role_id)
    {
        $data['title'] = 'Role Akses';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleakses', $data);
        $this->load->view('templates/footer');
    }

    public function gantiakses()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akses berhasil diganti!</div>');
    }

    public function hapus($id)
    {
        $this->db->delete('user_role', ['id' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Role berhasil di hapus!</div>');
        redirect('admin/akses');
    }

    //KELOLA AKUN
    public function akun()
    {
        $data['title'] = 'Akun Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['member'] = $this->Admin_model->getUser();
        $data['teknisi'] = $this->Admin_model->getTeknisi();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarA', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/akun', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->tambah();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Akun berhasil di tambahkan!</div>');
            redirect('admin/akun');
        }
    }

    public function hapusAkun($id)
    {
        $this->Admin_model->hapus($id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Akun berhasil di hapus!</div>');
        redirect('admin/akun');
    }

    public function ubahAkun($un)
    {

        $data['title'] = 'Ubah Data Akun';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['user'] = $this->Admin_model->getUserById($un);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarA', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/upAkun', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Admin_model->ubah();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Akun berhasil di ubah!</div>');
            redirect('admin/akun');
        }
    }

    //PENGADUAN
    public function lappengaduan()
    {
        $data['title'] = 'Laporan Pengaduan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pengaduan'] = $this->User_model->getPengaduan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lappengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Laporan Pengaduan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['detail'] = $this->Admin_model->getDetailPeng($id);
        $data['pengaduan'] = $this->User_model->getPengaduan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    //KENDALA
    public function lapkendala()
    {
        $data['title'] = 'Laporan Kendala';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['kendala'] = $this->User_model->getKendala();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lapkendala', $data);
        $this->load->view('templates/footer');
    }

    public function detailKen($id)
    {
        $data['title'] = 'Detail Laporan Kendala';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['detail'] = $this->Admin_model->getDetailKen($id);
        $data['pengaduan'] = $this->User_model->getPengaduan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailKen', $data);
        $this->load->view('templates/footer');
    }
}
