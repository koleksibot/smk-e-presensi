<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{

    // membuat function costruct
    public function __construct()
    {
        parent::__construct();
        // cek role user yang login
        authenticated_check();
        // meload model 
        $this->load->model('StatusModel', 'status');
    }

    // function untuk menampilakan halaman tampil data status
    public function index()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Data Status";
        // konten yang akan di load pada section konten pada main template
        $data['konten'] = "admin/data_master/status/status";
        // ambil data status dari model status
        $data['status'] = $this->status->get();
        // meload tampilan main template dengan konten halaman tampil data status
        return $this->load->view('admin/main', $data);
    }

    // function halaman tambah data status dan logicnya
    public function tambahStatus()
    {
        // tab tittle
        $data['judul'] = "SI - Absensi | Data Status";
        // konten yang akan di load pada section konten pada main template
        $data['konten'] = "admin/data_master/status/tambah";
        // validasi untuk inputan nama status
        $this->form_validation->set_rules('namaStatus', '', 'required|max_length[20]|is_unique[status.nama_sts]', [
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} huruf!',
            'is_unique' => 'Nama Status Sudah Digunakan!'
        ]);
        // cek validasi
        // jika validasi lolos
        if ($this->form_validation->run()) {
            // mengambil data hasil post form tambah status
            // nama status
            $namaStatus = $this->input->post('namaStatus', TRUE);
            // keteragan 
            $ket = $this->input->post('keterangan', TRUE);
            // array untuk tambah data status
            $data = [
                'nama_sts' => ucfirst($namaStatus),
                'ket_sts' => ucfirst($ket)
            ];
            // tambah data status dan paring data yang di insert pada model status
            $this->status->insertStatus($data);
            // membuat flashdata sukses
            $this->session->set_flashdata('sukses', 'Status Berhasil Ditambahkan!');
            // kembali kehalaman tampilan status
            return redirect('admin/data_master/status');
        // jika validasi tidak lolos
        } else {
            // meload tampilam main template dengan konten halaman tambah status
            return $this->load->view('admin/main', $data);
        }
    }

    // function halaman edit data status dan logic nya dengan parameter id status
    public function editStatus($id_sts)
    {
        // tab tittle
        $data['judul'] = "SI - Absensi | Data Status";
        // konten yang akan diload pada section konten pada main template
        $data['konten'] = "admin/data_master/status/edit";
        // mengambildata status berdasarkan id status
        $data['status'] = $this->status->getStatusById($id_sts);
        // cek nama status berubah / tidak
        // jika nama status berubah
        if ($this->input->post('namaStatus', TRUE) && $data['status']['nama_sts'] != ucfirst($this->input->post('namaStatus', TRUE))) {
            // jika berubah tambah role validasi unique(untuk mengecek nama status)
            $is_unique = '|is_unique[status.nama_sts]';
        // jika nama status tidak berubah
        } else {
            // tidak menambahkan role validasi
            $is_unique = '';
        }
        // validasi untuk inputan nama status
        $this->form_validation->set_rules('namaStatus', '', 'required|max_length[20]'.$is_unique, [
            'required' => 'Tidak Boleh Kosong!',
            'max_length' => 'Maksimal {param} huruf!',
            'is_unique' => 'Nama Status Sudah Digunakan!'
        ]);
        // cek validasi
        // jika lolos validasi
        if ($this->form_validation->run()) {
            // mengambil data post dari form ubah data status
            // nama status
            $namaStatus = $this->input->post('namaStatus', TRUE);
            // keterangan
            $keterangan = $this->input->post('keterangan', TRUE);
            // membuat array untuk ubah status
            $data = [
                'nama_sts' => ucfirst($namaStatus),
                'ket_sts' => ucfirst($keterangan)
            ];
            // update status dan parsing data id status dan data yang di ubah pada model status function updateStatus 
            $this->status->updateStatus($id_sts, $data);
            // membuat flashdata sukses
            $this->session->set_flashdata('sukses', 'Status Berhasil Diubah!');
            // kembali ketampil data status
            return redirect('admin/data_master/status');
        // jika tidak lolos validasi
        } else {
            // meload main template dengan konten form edit data
            return $this->load->view('admin/main', $data);
        }
    }

    // funtion untuk hapus data status dengan parameter id status
    public function hapusStatus($id_sts)
    {
        // mengambil data status
        $status = $this->status->getStatusInGuruById($id_sts);
        if($status){
            $this->session->set_flashdata('gagal', 'Status Masih Digunakan!');
            return redirect('admin/data_master/status');
        }else{
            $this->session->set_flashdata('sukses', 'Status Berhasil Dihapus!');
            $this->status->deleteStatus($id_sts);
            return redirect('admin/data_master/status');
        }
    }


}
