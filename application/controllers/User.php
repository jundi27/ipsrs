<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            //QUERY
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Profil berhasil diubah!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password     = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password lama salah!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Password berhasil diganti!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function pengaduanKer()
    {
        $data['title'] = 'Pengaduan Kerusakan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pengaduan'] = $this->User_model->getPengaduan();
        $data['kerusakan'] = $this->db->get('fasilitas')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('kerusakan_id', 'Kerusakan', 'required|trim');
        $this->form_validation->set_rules('brg', 'Barang', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengaduanKer', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'kerusakan_id' => $this->input->post('kerusakan_id'),
                'brg' => $this->input->post('brg'),
                'ruangan' => $this->input->post('ruangan'),
                'tgl' => $this->input->post('tgl'),
                'ket' => $this->input->post('ket')
            ];

            $this->db->insert('pengaduan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dikirim!</div>');
            redirect('user/pengaduanKer');
        }
    }
}
