<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templatesteknisi/header', $data);
        $this->load->view('templatesteknisi/sidebar', $data);
        $this->load->view('templatesteknisi/topbar', $data);
        $this->load->view('teknisi/index', $data);
        $this->load->view('templatesteknisi/footer');
    }

    public function edit()
    {
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templatesteknisi/header', $data);
            $this->load->view('templatesteknisi/sidebar', $data);
            $this->load->view('templatesteknisi/topbar', $data);
            $this->load->view('teknisi/edit', $data);
            $this->load->view('templatesteknisi/footer');
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
            $this->load->view('templatesteknisi/header', $data);
            $this->load->view('templatesteknisi/sidebar', $data);
            $this->load->view('templatesteknisi/topbar', $data);
            $this->load->view('teknisi/changepassword', $data);
            $this->load->view('templatesteknisi/footer');
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

    //Pemeliharaan

    public function lappemeliharaan()
    {
        $data['title'] = 'Teknisi IPSRS - Laporan Pemeliharaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templatesteknisi/header', $data);
        $this->load->view('templatesteknisi/sidebar', $data);
        $this->load->view('templatesteknisi/topbar', $data);
        $this->load->view('teknisi/lappemeliharaan', $data);
        $this->load->view('templatesteknisi/footer');

        $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required|trim', array('required' => 'Nama alat harus diisi'));
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim', array('required' => 'Ruangan harus diisi'));
        $this->form_validation->set_rules('suhu', 'Suhu', 'required|trim', array('required' => 'Suhu harus diisi'));
        $this->form_validation->set_rules('kelembaban', 'Kelembaban', 'required|trim', array('required' => 'Kelembaban harus diisi'));
        $this->form_validation->set_rules('tegangan', 'Tegangan', 'required|trim', array('required' => 'Tegangan harus diisi'));
        $this->form_validation->set_rules('daya_semu', 'Daya Semu', 'required|trim', array('required' => 'Daya semu harus diisi'));
        $this->form_validation->set_rules('daya_aktif', 'Daya Aktif', 'required|trim', array('required' => 'Daya aktif harus diisi'));
        $this->form_validation->set_rules('daya_reaktif', 'Daya Reaktif', 'required|trim', array('required' => 'Daya reaktif harus diisi'));
        $this->form_validation->set_rules('kondisi_fisik', 'Kondisi Fisik', 'required|trim', array('required' => 'Kondisi fisik harus diisi'));
        $this->form_validation->set_rules('ket_kondisi_fisik', 'Keterangan Kondisi Fisik', 'required|trim', array('required' => 'Keterangan kondisi fisik harus diisi'));
        if ($this->form_validation->run() == false) {
        } else {
            $data = array(
                'nama_alat' => htmlspecialchars($this->input->post('nama_alat', true)),
                'ruangan' => htmlspecialchars($this->input->post('ruangan', true)),
                'suhu' => htmlspecialchars($this->input->post('suhu', true)),
                'kelembaban' => htmlspecialchars($this->input->post('kelembaban', true)),
                'tegangan' => htmlspecialchars($this->input->post('tegangan', true)),
                'daya_semu' => htmlspecialchars($this->input->post('daya_semu', true)),
                'daya_aktif' => htmlspecialchars($this->input->post('daya_aktif', true)),
                'daya_reaktif' => htmlspecialchars($this->input->post('daya_reaktif', true)),
                'kondisi_fisik' => htmlspecialchars($this->input->post('kondisi_fisik', true)),
                'ket_kondisi_fisik' => htmlspecialchars($this->input->post('ket_kondisi_fisik', true)),
                'date_created' => time()
            );


            $this->db->insert('lap_pemeliharaan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                laporan pemeliharaan berhasil dibuat!</div>');
            redirect('teknisi/lappemeliharaan');
        }
    }
}
