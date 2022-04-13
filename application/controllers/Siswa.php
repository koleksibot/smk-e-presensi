<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        authenticated_check();
        $this->load->model('SiswaModel', 'siswa');
        $this->load->model('KelasModel', 'kelas');
        $this->load->model('JurusanModel', 'jurusan');
    }

    public function index()
    {
        $data['judul'] = "E - Presensi | Data Siswa";
        $data['konten'] = "admin/data_master/siswa/siswa";
        $data['siswa'] = $this->siswa->get();
        return $this->load->view('admin/main', $data);
    }

    public function tambahSiswa()
    {
        $data['judul'] = "E - Presensi | Data Siswa";
        $data['konten'] = "admin/data_master/siswa/tambah";
        $data['kelas'] = $this->kelas->get();
        if ($this->form_validation->run('tambahSiswa')) {
            $nisn = $this->input->post('nisn', TRUE);
            $namaSiswa = $this->input->post('namaSiswa', TRUE);
            $kelas_id = $this->input->post('kelas', TRUE);
            $status = $this->input->post('status', TRUE);
            $password = $this->input->post('password', TRUE);
            $data = [
                'nisn' => $nisn,
                'nama' => ucwords($namaSiswa),
                'kelas_id' => $kelas_id,
                'status' => $status,
                'password' => md5($password),
            ];
            $this->session->set_flashdata('sukses', 'Siswa Berhasil Ditambahkan!');
            $this->siswa->insertSiswa($data);
            return redirect('admin/data_master/siswa');
        } else {
            return $this->load->view('admin/main', $data);
        }
    }

    public function editSiswa($nisn)
    {
        $data['judul'] = "E - Presensi | Data Siswa";
        $data['konten'] = "admin/data_master/siswa/edit";
        $data['kelas'] = $this->kelas->get();
        $data['siswa'] = $this->siswa->getSiswaById($nisn);
        $nisn = $this->input->post('nisn', TRUE);
        if ($nisn != $data['siswa']['nisn']) {
            $is_unique = '|is_unique[siswa.nisn]';
        } else {
            $is_unique = '';
        }
        $this->form_validation->set_rules('nisn', '', 'required|numeric' . $is_unique, [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Hanya Boleh Diisi Angka!',
            'is_unique' => 'Nisn Sudah Digunakan!'
        ]);
        $this->form_validation->set_rules('namaSiswa', '', 'required|max_length[35]', [
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} Huruf!'
        ]);
        $this->form_validation->set_rules('kelas', '', 'required', [
            'required' => 'Pilih, Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run()) {
            $namaSiswa = $this->input->post('namaSiswa', TRUE);
            $kelas_id = $this->input->post('kelas', TRUE);
            $data = [
                'nisn' => $nisn,
                'nama' => ucwords($namaSiswa),
                'kelas_id' => $kelas_id
            ];
            $this->session->set_flashdata('sukses', 'Siswa Berhasil Diubah!');
            $this->siswa->updateSiswa($nisn, $data);
            return redirect('admin/data_master/siswa');
        } else {
            return $this->load->view('admin/main', $data);
        }
    }

    public function hapusSiswa($nisn)
    {
        $this->session->set_flashdata('sukses', 'Siswa Berhasil Dihapus!');
        $this->siswa->deleteSiswa($nisn);
        return redirect('admin/data_master/siswa');
    }

    // membuat function reset siswa dengan parameter id siswa
    public function resetSiswa($nisn)
    {
        // membuat flashdata sukses
        $this->session->set_flashdata('sukses', 'Akun Berhasil Direset!');
        // data yang direset
        $data['password'] = md5("user");
        // reset siswa dengan memparsing id siswa yanga akan direset pada model siswa ufntion resetsiswa
        $this->siswa->resetSiswa($nisn, $data);
        // kembali kehalamn tampilan data siswa
        return redirect('admin/data_master/siswa');
    }

    public function absen()
    {
        $tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal') : date('d-m-Y');
        $kelas = $this->input->post('kelas') ? $this->input->post('kelas') : '';
        $jenis_absen = $this->input->post('jenis_absen') ? $this->input->post('jenis_absen') : 'datang';
        $data['judul'] = "E - Presensi | Absen Siswa";
        $data['konten'] = "admin/absen/siswa";
        $data['tanggal'] = $tanggal;
        $data['jenis_absen'] = $jenis_absen;
        $data['kelas_'] = ($kelas == '') ? 'Semua' : $kelas;
        $data['absen_siswa'] = $this->siswa->filter_absen($tanggal, $kelas, $jenis_absen);
        $data['kelas'] = $this->kelas->get();
        return $this->load->view('admin/main', $data);
    }

    public function absenDatang()
    {
        $tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal') : date('d-m-Y');
        $data['judul'] = "E - Presensi | Absen Siswa";
        $data['konten'] = "admin/absen_datang/siswa";
        $data['tanggal'] = $tanggal;
        $data['absen_siswa'] = $this->siswa->getAbsenSiswa($tanggal, 'datang');
        return $this->load->view('admin/main', $data);
    }

    public function absenPulang()
    {
        $tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal') : date('d-m-Y');
        $data['judul'] = "E - Presensi | Absen Siswa";
        $data['konten'] = "admin/absen_pulang/siswa";
        $data['tanggal'] = $tanggal;
        $data['absen_siswa'] = $this->siswa->getAbsenSiswa($tanggal, 'pulang');
        return $this->load->view('admin/main', $data);
    }

    public function laporan()
    {
        $data['judul'] = "E - Presensi | Laporan Siswa ";
        $data['kelas'] = $this->kelas->get();
        $data['jurusan'] = $this->jurusan->get();
        $data['konten'] = "admin/laporan/siswa";
        if (isset($_POST['cetak'])) {
            $tanggal = $this->input->post('tanggal');
            $jurusan = $this->input->post('jurusan');
            $kelas = $this->input->post('kelas');

            $printpdf = 'admin/laporan/pdf/siswa/siswa';
            
            $data['siswa'] = $this->siswa->filter($jurusan, $kelas);
            $data['tanggal'] = $tanggal;
            $data['tanggal_format_indonesia'] = custom_tanggal($tanggal);
            $data['jurusan'] = $this->jurusan->getJurusanById($jurusan);
            $data['kelas'] = ($kelas == 'all') ? 'Semua kelas' : $this->kelas->getKelasById($kelas)['nama_kelas'];
            $this->pdf->setPaper('letter', 'potrait');
            $this->pdf->filename = str_replace('-', '', $tanggal) . '-lprn-siswa';
            $this->pdf->make_pdf($printpdf, $data);
            // var_dump($data['siswa']);
        } else {
            return $this->load->view('admin/main', $data);
        }
    }

    public function getKelasByIdJurusan()
    {
        $id_jurusan = $this->input->post('id_jurusan');
        $kelas_by_jurusan = $this->kelas->getKelasByJurusanId($id_jurusan);

        $output = '<option value="">Pilih kelas</option>';
        $output .= '<option value="all">Semua Kelas</option>';

        foreach($kelas_by_jurusan as $row){
            $output .=  '<option value="'. $row['id_kelas'] .'">'.$row['nama_kelas'].'</option>';
        }

        echo json_encode($output);

    }
}
