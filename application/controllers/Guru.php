<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    // membuat function construct
    public function __construct()
    {
        parent::__construct();
        // cek role semua user yang login
        authenticated_check();
        // load model
        $this->load->model('GuruModel', 'guru');
        $this->load->model('StatusModel', 'status');
    }

    // halaman data master guru pada halaman admin
    public function index()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Data Guru";
        // konten web yang akan di load pada section content pada template
        $data['konten'] = "admin/data_master/guru/guru";
        // mengambil semua data guru memalui model guru
        $data['guru'] = $this->guru->get();
        // meload view template
        return $this->load->view('admin/main', $data);
    }

    // halaman tambah guru dan logicnya
    public function tambahGuru()
    {
        // tab tittle
        $data['judul'] = "SI - Absensi | Data Guru";
        // konten web yang akan diload pada section konten pada template
        $data['konten'] = "admin/data_master/guru/tambah";
        // mengambil data status pada model status untuk select option status pada fitur tambah guru
        $data['status'] = $this->status->get();
        // cek validasi form tambah guru
        // jika lolos valodasi
        if ($this->form_validation->run('tambahGuru')) {
            // mengambil data yang dipost dari form tambah guru
            // nip
            $nip = $this->input->post('nip', TRUE);
            // nama guru
            $nama_guru = $this->input->post('namaGuru', TRUE);
            // status
            $status = $this->input->post('status', TRUE);
            // password
            $password = $this->input->post('password', TRUE);
            // array untuk dipost ke insert data guru
            $data = [
                'nip' => $nip,
                'nama' => ucwords($nama_guru),
                'sts_id' => $status,
                'password' => md5($password)
            ];
            // tambah data guru dengan parameter array di atas
            $this->guru->insertGuru($data);
            // membuat session sukes menambah data
            $this->session->set_flashdata('sukses', 'Guru Berhasil Ditambahkan!');
            // kembali kehalamn tampil data guru
            return redirect('admin/data_master/guru');
            // jika validasi tidak lolos
        } else {
            // kembali kehalaman form tambah
            return $this->load->view('admin/main', $data);
        }
    }

    // function untuk edit data guru dengan parameter id guru
    public function editGuru($nip)
    {
        // tab tittle
        $data['judul'] = "SI - Absensi | Data Guru";
        // konten yang akan di load pada section konten pada template
        $data['konten'] = "admin/data_master/guru/edit";
        // mengambil data status pada model status
        $data['status'] = $this->status->get();
        // mengambil data guru dengan parameter id guru yang di post
        $data['guru'] = $this->guru->getGuruById($nip);
        // mengambil data yang dipost dari form edit guru
        // nip
        $nip = $this->input->post('nip', TRUE);
        // nama guru
        $nama_guru = $this->input->post('namaGuru', TRUE);
        // status
        $status = $this->input->post('status', TRUE);
        // mengechek nip yang di post berubah atau tidak
        // jika berubah
        if ($nip != $data['guru']['nip']) {
            // menambah rule validasi mengecek penggunaan nip 
            $is_unique = '|is_unique[guru.nip]';
            // jika tidak berubah
        } else {
            // tidak menambah rule
            $is_unique = '';
        }
        // membuat validasi untuk form inputan nip
        $this->form_validation->set_rules('nip', '', 'required|max_length[21]|numeric' . $is_unique, [
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} Digit Angka!',
            'numeric' => 'Hanya Boleh Diisi Angka!',
            'is_unique' => 'Nip Sudah Digunakan!'
        ]);
        // membuat valasi untuk form inputan nama guru
        $this->form_validation->set_rules('namaGuru', '', 'required|max_length[35]', [
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} Huruf!'
        ]);
        // membuat validasi untuk inputan status
        $this->form_validation->set_rules('status', '', 'required', [
            'required' => 'Pilih, Tidak Boleh Kosong!'
        ]);

        // cek validasi
        // jika validasi lolos
        if ($this->form_validation->run()) {
            // membuat array untuk edit data
            $data = [
                'nip' => $nip,
                'nama' => ucwords($nama_guru),
                'sts_id' => $status,
            ];
            // update guru dengan memparsing data pada function update guru pada model guru
            $this->guru->updateGuru($nip, $data);
            // membuat flashdata sukses
            $this->session->set_flashdata('sukses', 'Guru Berhasil Diubah!');
            // meload tampilan data guru
            return redirect('admin/data_master/guru');
            // jika validasi gagal
        } else {
            // kembali ke halaman form ubah data
            return $this->load->view('admin/main', $data);
        }
    }

    // membuat function hapus guru dengan parameter id guru
    public function hapusGuru($nip)
    {
        // membuat flashdata sukses
        $this->session->set_flashdata('sukses', 'Guru Berhasil Dihapus!');
        // hapus guru dengan memparsing id guru yanga akan dihapus pada model guru ufntion deleteGuru
        $this->guru->deleteGuru($nip);
        // kembali kehalamn tampilan data guru
        return redirect('admin/data_master/guru');
    }

    // membuat function reset guru dengan parameter id guru
    public function resetGuru($nip)
    {
        // membuat flashdata sukses
        $this->session->set_flashdata('sukses', 'Akun Berhasil Direset!');
        // data yang direset
        $data['password'] = md5("user");
        // reset guru dengan memparsing id guru yanga akan direset pada model guru ufntion resetGuru
        $this->guru->resetGuru($nip, $data);
        // kembali kehalamn tampilan data guru
        return redirect('admin/data_master/guru');
    }

    public function absen()
    {
        $tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal') : date('d-m-Y');
        $status = $this->input->post('status') ? $this->input->post('status') : '';
        $jenis_absen = $this->input->post('jenis_absen') ? $this->input->post('jenis_absen') : 'datang';
        $data['judul'] = "E - Presensi | Absen guru";
        $data['konten'] = "admin/absen/guru";
        $data['tanggal'] = $tanggal;
        $data['jenis_absen'] = $jenis_absen;
        $data['status_'] = ($status == '') ? 'Semua' : $status;
        $data['absen_guru'] = $this->guru->filter_absen($tanggal, $status, $jenis_absen);
        $data['status'] = $this->status->get();
        return $this->load->view('admin/main', $data);
    }

    // function untukk menampilkan absen datang pada halaman admin
    public function absenDatang()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Absen Guru";
        // konten yang akan diload pada section konten pada main template
        $data['konten'] = "admin/absen_datang/guru";
        // filter data dari post data form tanggal -> jika tidak ada post data maka mengguanakan tanggal sekarang
        $tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal') : date('d-m-Y');
        // memparsing data tanggal yang di post
        $data['tanggal'] = $tanggal;
        // mengamil data guru berdasarkan tanggal dan jenis absen
        $data['absen_guru'] = $this->guru->getAbsenGuru($tanggal, 'datang');
        // meload halaman tampil data absen datang guru
        return $this->load->view('admin/main', $data);
    }

    // function untuk menampikan absen pulang pada halaman admin
    public function absenPulang()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Absen Guru";
        // konten yang akan diload pada section konten pada main template
        $data['konten'] = "admin/absen_pulang/guru";
        // filer data dari post form tanggal -> jika tidak ada post data maka menggunakan tanggal sekarang
        $tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal') : date('d-m-Y');
        // membuat array untuk parsing data tanngal
        $data['tanggal'] = $tanggal;
        // mengambil data guru berdasarkan tanggal dan jenis absen
        $data['absen_guru'] = $this->guru->getAbsenGuru($tanggal, 'pulang');
        // meload halaman tampil data absen pulang guru
        return $this->load->view('admin/main', $data);
    }

    // halaman untuk mencetak laporan dan logic nya
    public function laporan()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Laporan Guru ";
        // konten yang akan diload pada section konten pada main template
        $data['konten'] = "admin/laporan/guru";
        // mengambil data status dari model status
        $data['status'] = $this->status->get();
        // cek perintah cetak
        // jika ada perintah cetak
        if (isset($_POST['cetak'])) {
            // mengambil data yang di post dari form filter cetak 
            // tanggal
            $tanggal = $this->input->post('tanggal');
            // jabatan / status
            $jabatan = $this->input->post('jabatan');
            // tampilan yang akan digunakan untuk cetak pdf absen datang
            $printpdf = 'admin/laporan/pdf/guru/guru';
            // mengambildata pada model guru berdasarkan tgl, status, jns absen oada function fitur dan di masukkan ke array guru
            $data['guru'] = $this->guru->filter($jabatan);
            // merubah format tanggal
            $data['tanggal'] = $tanggal;
            $data['tanggal_format_indonesia'] = custom_tanggal($tanggal);
            // menentukan jabatan, jika jabatan = '' value jabatan dirubah "Semua"
            $data['jabatan'] = $jabatan == '' ? 'Semua' : $jabatan;
            // meng set kertas yang akan digunkan untuk cetak pdf
            $this->pdf->setPaper('letter', 'potrait');
            // nama file pdf yang akan di cetak
            $this->pdf->filename = $tanggal . '-laporan' . ($jabatan == '' ? '-guru' : '-' . strtolower($jabatan));
            // function untuk mencetak pdh dengan parameter letak tampilan dan data yang dibutuhkan
            $this->pdf->make_pdf($printpdf, $data);
            // jika tidak ada perintah cetak
        } else {
            // kembali kehalaman filter cetak guru
            return $this->load->view('admin/main', $data);
        }
    }
}
