<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    // membuat function construct 
    public function __construct()
    {
        parent::__construct();
        // cek user role yang mengakses controller ini
        authenticated_check();
        // meload model
        $this->load->model('adminModel', 'admin');
    }

    // tampilan beranda halaman admin
    public function index()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Beranda";
        // konten yang akan di load pada section konten pada main template
        $data['konten'] = 'admin/beranda';
        $data['guru'] = $this->db->query('SELECT * from guru')->num_rows();
        $data['siswa'] = $this->db->query('SELECT * from siswa')->num_rows();
        $data['kelas'] = $this->db->query('SELECT * from kelas')->num_rows();
        $data['jurusan'] = $this->db->query('SELECT * from jurusan')->num_rows();
        // meload halaman main template dengan konten halama beranda admin
        return $this->load->view('admin/main', $data);
    }

    // tampilan untuk menampilakan data admin(hanya untuk super admin)
    public function admin()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Admin";
        // konten yang akan di load pad section konten pada main template
        $data['konten'] = 'admin/admin/admin';
        // mengamil data admin pada moel admin
        $data['admin'] = $this->admin->get();
        // meload halaman main template dengan konten halaman pengeloaan admin
        return $this->load->view('admin/main', $data);
    }

    // halaman untuk tambah admin
    public function tambahAdmin()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Admin";
        // konten yang akan di load pada section conten pada main template
        $data['konten'] = 'admin/admin/tambah';
        // jika lolos validasi
        if ($this->form_validation->run('tambahEditAdmin')) {
            // mengambil data yang di post form tambah
            // nama lengkap
            $nama = $this->input->post('nama');
            // username
            $username = $this->input->post('username');
            // role
            $role = strtolower($this->input->post('role'));
            // password
            $password = md5($this->input->post('password'));
            // arrry untuk dipost ke insert admin
            $data = [
                'nama' => $nama,
                'username' => $username,
                'role' => $role,
                'password' => $password
            ];

            // kirim data ke model admin funtion insert data
            $this->admin->insertAdmin($data);
            // session flashdata sukses tambah data
            $this->session->set_flashdata('sukses', 'Admin Berhasil Ditambahkan!');
            // kembali kehalamn tampil data admin
            return redirect('admin/admin');
            // jika validasi tidak lolos
        } else {
            // meload halaman main template ddengan konten halaman tambah admin
            return $this->load->view('admin/main', $data);
        }
    }

    // funtion untuk edit data admin
    public function editAdmin($id_admin)
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Admin";
        // konten yang akan di load pada section conten pada main template
        $data['konten'] = 'admin/admin/edit';
        // get data admin sesuai id
        $data['admin'] = $this->admin->getAdminById($id_admin);
        // rules validasi
        $this->form_validation->set_rules('nama', '', 'required', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->input->post('username') == $data['admin']['username']) {
            $this->form_validation->set_rules('username', '', 'required', [
                'required' => 'Tidak Boleh Kosong!'
            ]);
        } else {
            $this->form_validation->set_rules('username', '', 'required|is_unique[admin.username]', [
                'required' => 'Tidak Boleh Kosong!',
                'is_unique' => 'Username Sudah Digunakan!'
            ]);
        }

        // cek validasi form
        // jika lolos
        if ($this->form_validation->run()) {
            // mengambil data yang di post form tambah
            // nama lengkap
            $nama = $this->input->post('nama');
            // username
            $username = $this->input->post('username');
            $data = [
                'nama' => $nama,
                'username' => $username
            ];
            // update data
            $this->admin->updateAdmin($id_admin, $data);
            // flashdata sukses edit data
            $this->session->set_flashdata('sukses', 'Admin Berhasil Diubah!');
            // kembali kehalaman tampil data admin
            return redirect('admin/admin');
            // jika validasi tidak lolo
        } else {
            // meload halaman main template dengan konten halaman tambah admin
            return $this->load->view('admin/main', $data);
        }
    }

    // function untuk hapus admin
    public function hapusAdmin($id_admin)
    {
        // membuat flashdata sukses
        $this->session->set_flashdata('sukses', 'Admin Berhasil Dihapus!');
        // menghapus admin parsing data id admin
        $this->admin->deleteAdmin($id_admin);
        // kembali kehalamn tampilan data admin
        return redirect('admin/admin');
    }

    // membuat function reset admin dengan parameter id admin
    public function resetAdmin($id_admin)
    {
        // cek role
        $admin = $this->admin->getAdminById($id_admin);
        if ($admin['role'] == 'super') {
            // membuat flashdata sukses
            $this->session->set_flashdata('gagal', 'Tidak Boleh!');
        } else {
            // membuat flashdata sukses
            $this->session->set_flashdata('sukses', 'Akun Berhasil Direset!');
            // data yang direset
            $data['password'] = md5("admin");
            // reset admin dengan memparsing id admin yanga akan direset pada model admin ufntion resetadmin
            $this->admin->resetAdmin($id_admin, $data);
        }
        // kembali kehalamn tampilan data admin
        return redirect('admin/admin');
    }

    // function untuk ubah passord dan logic nya
    public function ubahPassword()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Beranda";
        // konten yang akan diload pada section konten pada main template
        $data['konten'] = 'admin/ubah_password';
        // mengambil data userdata id admin
        $id_admin = $this->session->userdata('id_admin');
        // mengamil data admin berdasarkan id admin pada model admin
        $admin = $this->admin->getAdminById($id_admin);
        // cek validasi ubah password
        // jika lolos validasi
        if ($this->form_validation->run('ubah_password')) {
            $passwordLama = $this->input->post('password_lama');
            $passwordBaru = $this->input->post('password_baru');
            // cek password
            // jika password benar
            if (md5($passwordLama) == $admin['password']) {
                // array menampung data ubah password
                $data = [
                    'password' => md5($passwordBaru)
                ];
                // parsing data ubah password dengan parameter id admin dan password yang akan di ubah
                $this->admin->ubah_password($id_admin, $data);
                // membuat flashdata sukses 
                $this->session->set_flashdata('sukses', 'Password Berhasil Diubah!');
                // kembali ke halaman ubah password
                return redirect('admin/ubah_password');
                // jika password salah
            } else {
                // membuat flashdata password salah
                $this->session->set_flashdata('passwordSalah', 'Password Salah!');
                // kembali kehalaman ubah password
                return redirect('admin/ubah_password');
            }
            // jika gagal validasi
        } else {
            // kembali kehalaman ubah password
            $this->load->view('admin/main', $data);
        }
    }
}
