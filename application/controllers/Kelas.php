<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        authenticated_check();
        $this->load->model('KelasModel', 'kelas');
        $this->load->model('JurusanModel', 'jurusan');
    }

    public function index()
    {
        $data['judul'] = "E - Presensi | Data Kelas";
        $data['konten'] = "admin/data_master/kelas/kelas";
        $data['kelas'] = $this->kelas->get();
        return $this->load->view('admin/main', $data);
    }

    public function tambahKelas()
    {
        $data['judul'] = "E - Presensi | Data Kelas";
        $data['konten'] = "admin/data_master/kelas/tambah";
        $data['jurusan'] = $this->jurusan->get();
        $this->form_validation->set_rules('namaKelas', '', 'required|max_length[15]|is_unique[kelas.nama_kelas]',[
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} huruf!',
            'is_unique' => 'Nama Kelas Sudah Digunakan!'
        ]);
        $this->form_validation->set_rules('jurusan', '', 'required',[
            'required' => 'Harus Dipilih, Tidak Boleh Kosong!',
        ]);
        if($this->form_validation->run()){
            $namaKelas = strtoupper($this->input->post('namaKelas', TRUE));
            $jurusan = $this->input->post('jurusan', TRUE);
            $data = [
                'nama_kelas' => $namaKelas,
                'jurusan_id' => $jurusan
            ];
            $this->kelas->insertKelas($data);
            $this->session->set_flashdata('sukses', 'Kelas Berhasil Ditambahkan!');
            return redirect('admin/data_master/kelas');
        }else {
            return $this->load->view('admin/main', $data);
        }
    }

    public function editKelas($id_kelas)
    {
        $data['judul'] = "E - Presensi | Data Kelas";
        $data['konten'] = "admin/data_master/kelas/edit";
        $data['kelas'] = $this->kelas->getKelasById($id_kelas);
        $data['jurusan'] = $this->jurusan->get();
        if ($this->input->post('namaKelas', TRUE) && $data['kelas']['nama_kelas'] != strtoupper($this->input->post('namaKelas', TRUE))) {
            $is_unique = '|is_unique[kelas.nama_kelas]';
        }else{
            $is_unique = '';
        }
        $this->form_validation->set_rules('namaKelas', '', 'required|max_length[15]'.$is_unique, [
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} huruf!',
            'is_unique' => 'Nama Kelas Sudah Digunakan!'
        ]);
        $this->form_validation->set_rules('jurusan', '', 'required', [
            'required' => 'Harus Dipilih, Tidak Boleh Kosong!',
        ]);
        if ($this->form_validation->run()) {
            $namaKelas = strtoupper($this->input->post('namaKelas', TRUE));
            $jurusan = $this->input->post('jurusan', TRUE);
            $data = [
                'nama_kelas' => $namaKelas,
                'jurusan_id' => $jurusan
            ];
            $this->kelas->updateKelas($id_kelas, $data);
            $this->session->set_flashdata('sukses', 'Kelas Berhasil Diubah!');
            return redirect('admin/data_master/kelas');
        } else {
            return $this->load->view('admin/main', $data);
        }
    }

    public function hapusKelas($id_kelas)
    {
        $siswa = $this->kelas->getKelasInSiswaById($id_kelas);
        if($siswa) {
            $this->session->set_flashdata('gagal', 'Kelas Masih Digunakan!');
            return redirect('admin/data_master/kelas');
        }else{
            $this->session->set_flashdata('sukses', 'Kelas Berhasil Dihapus!');
            $this->kelas->deleteKelas($id_kelas);
            return redirect('admin/data_master/kelas');
        }
    }
}
