<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');

        // if (!$this->session->userdata('username')) {
        //     redirect('auth');
        // } else {
        //     if ($this->session->role_id == 3) {
        //         redirect('teknisi');
        //     }
        // }
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
    public function lappengaduan($aksi = null)
    {
        if ($aksi != null && $aksi == 'forward') {
            return $this->_forward_pengaduan();
        }

        if (!empty($_GET['aksi'])) {
            switch ($_GET['aksi']) {
                case 'edit_kendala':
                    $edit_kendala_kerusakan = $this->input->post('edit_kendala_kerusakan');
                    $this->db->update('forward_pengaduan', [
                        'edit_kendala_kerusakan' => $edit_kendala_kerusakan
                    ], [
                        'id_forward' => $this->input->post('id_forward')
                    ]);
                    $this->session->set_flashdata('success', 'Pesan diperbarui');
                    return redirect('admin/lappengaduan');
                    break;
                case 'edit_alasan_penolakan':
                    $edit_alasan_penolakan = $this->input->post('edit_alasan_penolakan');
                    $this->db->update('forward_pengaduan', [
                        'edit_alasan_penolakan' => $edit_alasan_penolakan
                    ], [
                        'id_forward' => $this->input->post('id_forward')
                    ]);
                    $this->session->set_flashdata('success', 'Pesan diperbarui');
                    return redirect('admin/lappengaduan');
                    break;
                default:
                    break;
            }
        }

        $data['title'] = 'Administrator - Laporan Pengaduan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pengaduan'] = $this->User_model->getPengaduan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lappengaduan', $data);
        $this->load->view('templates/footer');
    }

    private function _forward_pengaduan()
    {
        $id_pengaduan = $this->input->post('id_pengaduan');
        $id_forward = $this->input->post('id_forward');
        $id_teknisi = $this->input->post('teknisi');

        if ($id_forward != '') {
            $forward = $this->Admin_model->forwardPengaduanKembali($id_forward, $id_teknisi);
        } else {
            $forward = $this->Admin_model->forwardPengaduan($id_pengaduan, $id_teknisi);
        }

        if ($forward) {
            $this->session->set_flashdata("success", "Pengaduan Diteruskan!");
            return redirect("admin/lappengaduan");
        } else {
            $this->session->flash("failed", "Gagal Diteruskan!");
            return redirect("admin/lappengaduan");
        }
    }

    public function historylappeng()
    {
        $data['title'] = 'Administrator - History Laporan Pengaduan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if (!empty($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
            $id_history = $_GET['id'];
            $this->db->delete('history', ['id' => $id_history]);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            return redirect('admin/historylappeng');
        }

        $data['pengaduan'] = $this->Admin_model->getHistoryPengaduan()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/historylappeng', $data);
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
        $data['title'] = 'Administrator - Laporan Kendala';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['kendala'] = $this->Admin_model->getKendala()->result();

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
    }

    //PEMELIHARAAN
    public function ceklappem()
    {
        $data['title'] = 'Administrator - Laporan Pemeliharaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if (!empty($_GET['aksi'])) {
            if ($_GET['aksi'] == 'hapus') {
                $id_laporan = $_GET['id_laporan'];
                $this->db->delete('lap_pemeliharaan', ['id' => $id_laporan]);
                $this->session->set_flashdata('success', 'Data berhasil dihapus!');
                return redirect('admin/ceklappem');
            }
        }

        // join antara lap_pemeliharaan dan user, karena ada beberapa kolom yang sama di dua tabel, untuk menghindari kerancuan beberapa kolom didefinisikan dengan nama baru spt: lap_pemeliharaan.date_created menjadi lpdc
        $data['lappem'] = $this->db->query('select lap_pemeliharaan.date_created as lpdc, lap_pemeliharaan.id as lpid, lap_pemeliharaan.*, user.* from lap_pemeliharaan, user where lap_pemeliharaan.user_id = user.id order by lap_pemeliharaan.date_created desc')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ceklappem', $data);
        $this->load->view('templates/footer');
    }

    public function historylappem()
    {
        $data['title'] = 'Administrator - History Laporan Pemeliharaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // join antara history_lappem dan user, karena ada beberapa kolom yang sama di dua tabel, untuk menghindari kerancuan beberapa kolom didefinisikan dengan nama baru spt: history_lappem.date_created menjadi lpdc
        $data['lappem'] = $this->db->query('select history_lappem.date_created as lpdc, history_lappem.id as hlid, history_lappem.*, user.* from history_lappem join user on history_lappem.user_id = user.id')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/historylappem', $data);
        $this->load->view('templates/footer');
    }

    public function printlappem($id)
    {
        $data['title'] = 'Print Laporan';

        // join antara lap_pemeliharaan dan user, karena ada beberapa kolom yang sama di dua tabel, untuk menghindari kerancuan beberapa kolom didefinisikan dengan nama baru spt: lap_pemeliharaan.date_created menjadi lpdc
        $data['lappem'] = $this->db->query('select lap_pemeliharaan.date_created as lpdc, lap_pemeliharaan.id as lpid, lap_pemeliharaan.*, user.* from lap_pemeliharaan, user where lap_pemeliharaan.user_id = user.id and lap_pemeliharaan.id = ' . $id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/printlappem', $data);
    }

    public function printhistorylappem($id)
    {
        $data['title'] = 'Print Laporan';

        // join antara history_lappem dan user, karena ada beberapa kolom yang sama di dua tabel, untuk menghindari kerancuan beberapa kolom didefinisikan dengan nama baru spt: history_lappem.date_created menjadi lpdc
        $data['lappem'] = $this->db->query('select history_lappem.date_created as lpdc, history_lappem.id as lpid, history_lappem.*, user.* from history_lappem, user where history_lappem.user_id = user.id and history_lappem.id = ' . $id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/printlappem', $data);
    }

    public function kelolaalkes()
    {
        if (!empty($_GET['aksi'])) {
            switch ($_GET['aksi']) {
                case 'ubah':
                    $this->_ubah_alkes($this->input->post());
                    break;
                case 'tambah':
                    $this->_tambah_alkes($this->input->post());
                    break;
                default:
                    # code...
                    break;
            }
        }
        $data['title'] = 'Administrator - Kelola Data Alat Kesehatan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['alatkes'] = $this->db->get('alkes')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelolaalkes', $data);
        $this->load->view('templates/footer');
    }

    private function _tambah_alkes($post)
    {
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
            $this->session->set_flashdata('success', 'Data alat kesehatan berhasil ditambahkan!');
            redirect('admin/kelolaalkes');
        }
    }

    private function _ubah_alkes($post)
    {
        $data = [];
        foreach ($post as $key => $val) {
            if ($key != 'id') {
                $this->form_validation->set_rules($key, ucfirst($key), 'required', ['required' => '{field} harus diisi!']);
                $data[$key] = $val;
            }
        }
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data gagal diubah!');
        } else {
            $this->db->update('alkes', $data, ['id' => $post['id']]);
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
        }

        redirect('admin/kelolaalkes');
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

    // public function kelolateknisi()
    // {

    //     $data['title'] = 'Administrator - Kelola Data Teknisi';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    //     $data['date'] = $this->db->get('user')->result_array();

    //     $this->load->model('Admin_model', 'admin');
    //     $data['nama'] = $this->admin->getNama();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/kelolateknisi', $data);
    //     $this->load->view('templates/footer');

    //     $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    //     $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
    //         'is_unique' => 'Username ini telah terdaftar!'
    //     ]);
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
    //         'is_unique' => 'Email ini telah terdaftar!'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
    //         'matches' => 'Password tidak sama!',
    //         'min_length' => 'Password terlalu pendek!'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     //validasi data 
    //     if ($this->form_validation->run() == false) {
    //     } else {
    //         $email = $this->input->post('email', true);
    //         $data = [
    //             'nama' => htmlspecialchars($this->input->post('nama', true)),
    //             'username' => htmlspecialchars($this->input->post('username', true)),
    //             'email' => htmlspecialchars($email),
    //             'image' => 'default.jpg',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'role_id' => 3,
    //             'is_active' => 1,
    //             'date_created' => time()
    //         ];

    //         $this->db->insert('user', $data);


    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //             Data teknisi berhasil dibuat. Silahkan login</div>');
    //         redirect('admin/kelolateknisi');
    //     }
    // }

    // public function hapusTeknisi($id)
    // {
    //     $this->load->model('Admin_model');
    //     $this->Admin_model->getHapusAkunTeknisi($id);

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //             Data teknisi berhasil dihapus!</div>');
    //     redirect('admin/kelolateknisi');
    // }

    // public function hapusakunteknisi()
    // {
    //     $data['user'] = $this->db->get_where('user', array(
    //         'username' => $this->session->userdata('username')
    //     ))->row_array();

    //     $this->load->model('Admin_model');
    //     $data['nama'] = $this->Admin_model->getNama();
    // }
}
