<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        authenticated_check();
        $this->load->model('JurusanModel', 'jurusan');
    }

    public function index()
    {
        $data['judul'] = "E - Presensi | Data Jurusan";
        $data['konten'] = "admin/data_master/jurusan/jurusan";
        $data['jurusan'] = $this->jurusan->get();
        return $this->load->view('admin/main', $data);
    }

    public function tambahjurusan()
    {
        $data['judul'] = "SI - Absensi | Data Jurusan";
        $data['konten'] = "admin/data_master/jurusan/tambah";
        $this->form_validation->set_rules('namaJurusan', '', 'required|max_length[15]|is_unique[jurusan.nama_jurusan]', [
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} huruf!',
            'is_unique' => 'Nama jurusan Sudah Digunakan!'
        ]);
        if ($this->form_validation->run()) {
            $namaJurusan = $this->input->post('namaJurusan', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);
            $data = [
                'nama_jurusan' => strtoupper($namaJurusan),
                'ket' => ucfirst($keterangan)
            ];
            $this->jurusan->insertjurusan($data);
            $this->session->set_flashdata('sukses', 'Jurusan Berhasil Ditambahkan!');
            return redirect('admin/data_master/jurusan');
        } else {
            return $this->load->view('admin/main', $data);
        }
    }

    public function editjurusan($id_jurusan)
    {
        $data['judul'] = "SI - Absensi | Data Jurusan";
        $data['konten'] = "admin/data_master/jurusan/edit";
        $data['jurusan'] = $this->jurusan->getjurusanById($id_jurusan);
        if ($this->input->post('namaJurusan', TRUE) && $data['jurusan']['nama_jurusan'] != ucfirst($this->input->post('namaJurusan', TRUE))) {
            $is_unique = '|is_unique[jurusan.nama_jurusan]';
        } else {
            $is_unique = '';
        }
        $this->form_validation->set_rules('namaJurusan', '', 'required|max_length[15]'.$is_unique, [
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} huruf!',
            'is_unique' => 'Nama jurusan Sudah Digunakan!'
        ]);
        if ($this->form_validation->run()) {
            $namaJurusan = $this->input->post('namaJurusan', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);
            $data = [
                'nama_jurusan' => strtoupper($namaJurusan),
                'ket' => ucfirst($keterangan)
            ];
            $this->jurusan->updatejurusan($id_jurusan, $data);
            $this->session->set_flashdata('sukses', 'jurusan Berhasil Diubah!');
            return redirect('admin/data_master/jurusan');
        } else {
            return $this->load->view('admin/main', $data);
        }
    }

    public function hapusjurusan($id_jurusan)
    {
        // ambil data jurusan yang masih digunakan dikelas
        $jurusan = $this->jurusan->getJurusanInKelasById($id_jurusan);

        // cek data jurusan
        // jika jurusan masih digunakan
        if ($jurusan) {

            // set flashdata gagal
            $this->session->set_flashdata('gagal', 'Jurusan Masih Digunakan!');
            // kembali kehalaman utama jurusan
            return redirect('admin/data_master/jurusan');

        // jika jurusan tidak digunakan
        }else{

            // set flashdata berhasil
            $this->session->set_flashdata('sukses', 'Jurusan Berhasil Dihapus!');
            // hapus data jurusan
            $this->jurusan->deleteJurusan($id_jurusan);
            // kembali ke halaman utama jurusan
            return redirect('admin/data_master/jurusan');
            
        }
    }
}

