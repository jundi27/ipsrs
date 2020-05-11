<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
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

    public function ceklappem()
    {

        $data['title'] = 'Administrator - Laporan Pemeliharaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['date'] = $this->db->get('lap_pemeliharaan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ceklappem', $data);
        $this->load->view('templates/footer');
    }

    public function historylappem()
    {
        $data['title'] = 'Administrator - History Laporan Pemeliharaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['date'] = $this->db->get('lap_pemeliharaan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/historylappem', $data);
        $this->load->view('templates/footer');
    }

    public function kelolaalkes()
    {
        $data['title'] = 'Administrator - Kelola Data Alat Kesehatan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['alatkes'] = $this->db->get('alkes')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelolaalkes', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required|trim', array('required' => 'Nama alat harus diisi'));
        $this->form_validation->set_rules('merk', 'Merk', 'required|trim', array('required' => 'Merk harus diisi'));
        $this->form_validation->set_rules('model', 'Model', 'required|trim', array('required' => 'Model harus diisi'));
        $this->form_validation->set_rules('nomorseri', 'Nomor Seri', 'required|trim', array('required' => 'Nomor Seri harus diisi'));
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim', array('required' => 'Ruangan harus diisi'));
        if ($this->form_validation->run() == false) {
        } else {
            $data = array(
                'nama_alat' => htmlspecialchars($this->input->post('nama_alat', true)),
                'merk' => $this->input->post('merk', true),
                'model' => $this->input->post('model', true),
                'nomorseri' => $this->input->post('nomorseri', true),
                'ruangan' => htmlspecialchars($this->input->post('ruangan', true)),
                'date_created' => time()
            );


            $this->db->insert('alkes', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data alat kesehatan berhasil ditambahkan!</div>');
            redirect('admin/kelolaalkes');
        }
    }

    public function hapusAlkes($id)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->getHapusAlkes($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data alat kesehatan berhasil dihapus!</div>');
        redirect('admin/kelolaalkes');
    }

    public function hapusalatkesehatan()
    {
        $data['user'] = $this->db->get_where('user', array(
            'username' => $this->session->userdata('username')
        ))->row_array();

        $this->load->model('Admin_model');
        $data['id'] = $this->Admin_model->getAlkes();
    }

    ////////////////////////////////////////////////////////////////

    public function kelolateknisi()
    {

        $data['title'] = 'Administrator - Kelola Data Teknisi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['date'] = $this->db->get('user')->result_array();

        $this->load->model('Admin_model', 'admin');
        $data['nama'] = $this->admin->getNama();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelolateknisi', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username ini telah terdaftar!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini telah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //validasi data 
        if ($this->form_validation->run() == false) {
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data teknisi berhasil dibuat. Silahkan login</div>');
            redirect('admin/kelolateknisi');
        }
    }

    public function hapusTeknisi($id)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->getHapusAkunTeknisi($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data teknisi berhasil dihapus!</div>');
        redirect('admin/kelolateknisi');
    }

    public function hapusakunteknisi()
    {
        $data['user'] = $this->db->get_where('user', array(
            'username' => $this->session->userdata('username')
        ))->row_array();

        $this->load->model('Admin_model');
        $data['nama'] = $this->Admin_model->getNama();
    }
}
