<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	// function contruct - function yang otomatis dijalankan saat controller di aksen
	public function __construct()
	{
		parent::__construct();

		// load model
		$this->load->model('GuruModel', 'guru');
		$this->load->model('SiswaModel', 'siswa');
		$this->load->model('AdminModel', 'admin');
	}

	// function login admin
	public function admin()
	{
		// tittle pada tab web
		$data['judul'] = "E - Presensi | Login - Admin";
		// konten web yang akan di tampilkan pada section konten
		$data['konten'] = 'auth/admin';
		// cek validasi
		if ($this->form_validation->run('login_admin') == true) {
			// mengambildata hasil post form logi
			// username
			$username = $this->input->post('username');
			// password
			$password = md5($this->input->post('password'));
			// mengambil data admin dari mode admin berdasarkan username
			$admin = $this->admin->getAdminWhereUsername($username);
			// cek apakah admin dengan username
			// jika terdapat admin berdasarkan user yang dicari
			if ($admin) {
				// cek password 
				// jika password benar
				if ($admin['password'] == $password) {
					// membuat array untuk userdata
					$session = [
						'status' => true,
						'id_admin' => $admin['id_admin'],
						'nama' => $admin['nama'],
						'role_admin' => $admin['role'],
						'role' => 'admin',
						'sebagai' => 'admin'
					];
					// mendeklarasikan session userdata
					$this->session->set_userdata($session);
					// mengembalikan menerusakan ke halaman admin/beranda
					return redirect('admin/beranda');
					// jika password salah
				} else {
					// membuat session flasdata gagal
					$this->session->set_flashdata('gagal', 'Password Salah!');
					// kembali kehalaman login admin
					return redirect('login/admin');
				}
				// jika tidak terdatapat data dengan userbame yang sama
			} else {
				// membuat session flashdata gagagl karena username tidak ditemukan
				$this->session->set_flashdata('gagal', 'Username Tidak Terdaftar!');
				// kembali kehalamn login
				return redirect('login/admin');
			}
			// jika tidak ada admin berdasarkan user yang dicari
		} else {
			// mengembalikan halaman 
			return $this->load->view('auth/main', $data);
		}
	}

	// function untuk login guru
	public function guru()
	{
		// title  web
		$data['judul'] = "E - Presensi | Login - Guru";
		// konten yang akan di load di section pada content
		$data['konten'] = 'auth/guru';
		// cek validasi data
		if ($this->form_validation->run('login_guru') == true) {
			// mengambil data yang di post melalui form login login
			// nip
			$nip =  $this->input->post('nip', TRUE);
			// passwrord
			$password =  md5($this->input->post('password', TRUE));
			// mengambil data guru dari model guru berdasarkan nip
			$guru = $this->guru->getGuruWhereNip($nip);
			// cek guru
			// jika terdapat guru dengan nip yang di post
			if ($guru) {
				// cek password
				if ($guru['password'] === $password) {
					// array untuk userdata
					$session = [
						'status' => true,
						'nip' => $guru['nip'],
						'nama' => $guru['nama'],
						'role' => 'user',
						'sebagai' => 'guru'
					];
					// mendeklarasikan session userdata
					$this->session->set_userdata($session);
					// masuk kehalaman user beranda
					return redirect('user/beranda');
					// jika password salah
				} else {
					// membuat flashdata gagal
					$this->session->set_flashdata('gagal', 'Password Salah!');
					// meload halaman auth / login
					return $this->load->view('auth/main', $data);
				}
				// jika tidak ada guru dengan username yang bersangkutan
			} else {
				// membuat flashdata gagal
				$this->session->set_flashdata('gagal', 'NIP Tidak Terdaftar!');
				// kembali ke halaman login
				return redirect('login/guru');
			}
			// jika validasi form salah / tidak terpenuhi
		} else {
			// kembali kelahaman utama login depan
			return $this->load->view('auth/main', $data);
		}
	}

	// function untuk login siswa
	public function siswa()
	{
		// tittle pada tab web
		$data['judul'] = "E - Presensi | Login - Siswa";
		// tampilan yang akan diload pada section konten pada template
		$data['konten'] = 'auth/siswa';
		// cek validasi form login siswa
		if ($this->form_validation->run('login_siswa')) :
			// ambil data yang di post dari form login
			// nisn
			$nisn = $this->input->post('nisn', TRUE);
			// password
			$password = md5($this->input->post('password', TRUE));
			// meload data  pada funtion model siswa dengan parameter nisn yang di post
			$siswa = $this->siswa->getSiswaWhereNisn($nisn);
			// cek siswa
			// jika terdapat siswa dengan nisn yang di post 
			if ($siswa) :
				// cek password yang di post 
				// jika password benar
				if ($siswa['password'] === $password) :
					// membuat array untuk data session
					$session = [
						'status' => true,
						'nisn' => $siswa['nisn'],
						'nama' => $siswa['nama'],
						'role' => 'user',
						'sebagai' => 'siswa'
					];
					// mendeklarsika userdata dan parameter menggunakan array di atas
					$this->session->set_userdata($session);
					// masuk kehalaman user beranda
					return redirect('user/beranda');
				// jika password salah
				else :
					// membuat flashdata gagal
					$this->session->set_flashdata('gagal', 'Password Salah!');
					// meload halaman auth siswa
					return $this->load->view('auth/main', $data);
				endif;
			// jika tidak terdapat siswa dengan siswa yang di post
			else :
				// membuat flashdata gagal
				$this->session->set_flashdata('gagal', 'NISN Tidak Terdaftar!');
				// kembali kehalaman login
				return redirect('login/siswa');
			endif;
		// jika validasi gagal
		else :
			// kembali kehalaman auth / login dan parsing data konten yanga akan di load di section konten
			return $this->load->view('auth/main', $data);
		endif;
	}

	// function logout(keluar)
	public function logout()
	{
		// menghapus semua session(usedata, flashdata)
		$this->session->sess_destroy();
		// kembali kelaman login
		return redirect('');
	}
}
