<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Admin_model');
        $this->load->library('form_validation');

        // if (!$this->session->userdata('username')) {
        //     redirect('auth');
        // } else {
        //     if ($this->session->role_id == 1) {
        //         redirect('admin');
        //     }
        // }
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebart', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebart', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('teknisi/edit', $data);
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
                    redirect('teknisi');
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Profil berhasil diubah!</div>');
            redirect('teknisi');
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
            $this->load->view('templates/sidebart', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('teknisi/changepassword', $data);
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
                    redirect('teknisi/changepassword');
                }
            }
        }
    }

    //PENGADUAN
    public function lappengaduan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Teknisi IPSRS - Laporan Pengaduan';
        $data['pengaduan'] = $this->User_model->getPengaduanDiteruskan($data['user']['id'])->result_array();

        if (!empty($this->input->get("aksi"))) {
            switch ($this->input->get("aksi")) {
                case 'tolak':
                    $tolak = $this->User_model->tolakPengaduan($this->input->post("id_forward_pengaduan"), $this->input->post("alasan_penolakan"));
                    $this->session->set_flashdata("success", "Pengaduan Ditolak!");
                    return redirect("teknisi/lappengaduan");
                    break;
                case 'kendala':
                    $tolak = $this->User_model->tundaPengaduan($this->input->post("id_forward_pengaduan"), $this->input->post("kendala_kerusakan"));
                    $this->session->set_flashdata("success", "Pengaduan ditunda, kendala kerusakan dilaporkan.");
                    return redirect("teknisi/lappengaduan");
                    break;
                case 'perbaiki':
                    $this->User_model->perbaikiPengaduan($this->input->get("id"));
                    return redirect("teknisi/lappengaduan");
                    break;
                case 'selesai':
                    $this->User_model->selesaiPerbaikiPengaduan($this->input->get("id"));
                    return redirect("teknisi/lappengaduan");
                    break;
                default:
                    # code...
                    break;
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebart', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/lappengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Laporan Pengaduan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['detail'] = $this->Admin_model->getDetailPeng($id);
        $data['pengaduan'] = $this->User_model->getPengaduan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebart', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/detail', $data);
        $this->load->view('templates/footer');
    }


    //KENDALA
    public function kendalaKer()
    {
        $data['title'] = 'Teknisi IPSRS - Lapor Kendala Kerusakan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kendala', 'Kendala', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebart', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('teknisi/kendalaKer', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'kendala' => $this->input->post('kendala'),
                'ruangan' => $this->input->post('ruangan'),
                'tgl' => $this->input->post('tgl'),
                'ket' => $this->input->post('ket')
            ];

            $this->db->insert('kendala', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dikirim!</div>');
            redirect('teknisi/kendalaKer');
        }
    }

    //PEMELIHARAAN
    public function lappemeliharaan()
    {
        $data['title'] = 'Teknisi IPSRS - Laporan Pemeliharaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if (!empty($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
            $id_laporan = $_GET['id_laporan'];
            $this->db->delete('lap_pemeliharaan', ['id' => $id_laporan]);
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        }

        // join antara lap_pemeliharaan dan user, karena ada beberapa kolom yang sama di dua tabel, untuk menghindari kerancuan beberapa kolom didefinisikan dengan nama baru spt: lap_pemeliharaan.date_created menjadi lpdc
        $data['lappem'] = $this->db->query('select lap_pemeliharaan.date_created as lpdc, lap_pemeliharaan.id as lpid, lap_pemeliharaan.*, user.* from lap_pemeliharaan, user where lap_pemeliharaan.user_id = user.id order by lap_pemeliharaan.date_created desc')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebart', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/lappemeliharaan', $data);
        $this->load->view('templates/footer');

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
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            //$this->session->set_flashdata('error', 'Ups ada yg error');
        } else {
            $myd = date_create();
            $dtfrmt = date_format($myd, 'Y-m-d');
            $arrdt = explode('-', $dtfrmt);
            $year = $arrdt[0];
            $month = $arrdt[1];
            $day = $arrdt[2];
            $mktime = mktime(0, 0, 0, $month, $day, $year);
            // sebulan setelah ini
            $expired_date = strftime('%Y-%m-%d', strtotime('+1 month', $mktime));

            $data = array(
                'user_id' => $this->session->user_id,
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
                'date_created' => date_format($myd, 'Y-m-d'),
                'expired' => $expired_date
            );


            $this->db->insert('lap_pemeliharaan', $data);
            $this->session->set_flashdata('success', 'Laporan pemeliharaan berhasil dibuat!');
            redirect('teknisi/lappemeliharaan');
        }
    }

    public function ceklappem()
    {
        $data['title'] = 'Teknisi IPSRS - History Laporan Pemeliharaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // join antara history_lappem dan user, karena ada beberapa kolom yang sama di dua tabel, untuk menghindari kerancuan beberapa kolom didefinisikan dengan nama baru spt: history_lappem.date_created menjadi lpdc
        $data['lappem'] = $this->db->query('select history_lappem.id as lpid, history_lappem.date_created as lpdc, history_lappem.*, user.* from history_lappem, user where history_lappem.user_id = user.id')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebart', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/ceklappem', $data);
        $this->load->view('templates/footer');
    }
}
