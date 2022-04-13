<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JamAbsen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek autentikasi
        authenticated_check();
        // load model
        $this->load->model('JamAbsenModel', 'jamAbsen');
    }

    public function index()
    {
        // button pilihan untuk jam absen guru/siswa
        $role = $this->input->post('role', TRUE) ? $this->input->post('role', TRUE) : "guru";
        // tittle web
        $data['judul'] = "E - Presensi | Jam Absen";
        // konten yang akan ditampikan
        $data['konten'] = 'admin/data_master/jam_absen/jam_absen';
        // ambil data dari model
        $data['jam_absen'] = $this->jamAbsen->getJamAbsenByRole($role);
        // menampikan halaman dan parsing data
        return $this->load->view('admin/main', $data);
    }

    public function keteranganJamAbsen()
    {
        // menentukan hari ke - n di minggu ini dimulai dari 0 dakan urutan hari global
        $hari = date('w');
        // ambil userdata untuk menentukan role absen
        $role = $this->session->userdata('sebagai');
        // get jam absen dan parsing parameter hari dan rolenya pada model JamAbsenModel
        $jam_absen = $this->jamAbsen->getJamAbsenByDayAndRole($hari, $role);

        // untuk mengetahui selisih jam absen datang (keterlambatan)
        $jam_absen_datang_berakhir = explode(':', $jam_absen['datang_berakhir']);

        // keterangan absen datang
        if (date('H:i:s') < $jam_absen['datang_mulai']) {
            $absen_datang =  "Belum Dimulai";
        } elseif (date('H:i:s') >= $jam_absen['datang_mulai'] && (date('H:i:s') < $jam_absen['datang_berakhir'])) {
            $absen_datang =  "Tepat waktu";
        } elseif (date('H:i:s') >= $jam_absen['datang_berakhir'] && (date('H:i:s') < $jam_absen['datang_tutup'])) {
            $absen_datang =  "Terlambat " . (date('H') - $jam_absen_datang_berakhir[0]) . " jam " . (date('i') - $jam_absen_datang_berakhir[1]) . " menit " . (date('s') - $jam_absen_datang_berakhir[2]) . " detik";
        } else {
            $absen_datang =  "Sudah ditutup";
        }

        // untuk mengetahui selisih jam absen pulang (keterlambatan / lembur)
        $jam_absen_pulang_berakhir = explode(':', $jam_absen['pulang_berakhir']);

        // keterangan absen pulang
        if (date('H:i:s') < $jam_absen['pulang_mulai']) {
            $absen_pulang = "Pulang cepat";
        } elseif (date('H:i:s') >= $jam_absen['pulang_mulai'] && date('H:i:s') < $jam_absen['pulang_berakhir']) {
            $absen_pulang = "Tepat waktu";
        } elseif (date('H:i:s') >= $jam_absen['pulang_berakhir'] && date('H:i:s') < $jam_absen['pulang_tutup']) {
            $absen_pulang =  "Lembur " . (date('H') - $jam_absen_pulang_berakhir[0]) . " jam " . (date('i') - $jam_absen_pulang_berakhir[1]) . " menit " . (date('s') - $jam_absen_pulang_berakhir[2]) . " detik";
        } else {
            $absen_pulang =  "Sudah ditutup";
        }

        // data array yang di jadikan json 
        $data = [
            'jam' => date('H:i'),
            'ket_absen_datang' => $absen_datang,
            'ket_absen_pulang' => $absen_pulang
        ];

        // dikonversi jadi json
        echo json_encode($data);
    }

    // fungsi untuk menambah jam absen
    public function tambahJamAbsen()
    {
        // tittle web
        $data['judul'] = "E - Presensi | Jam Absen";
        // konten yang akan ditampikan
        $data['konten'] = 'admin/data_master/jam_absen/tambah';

        // cek form validasi berjalan atau tidak
        if ($this->form_validation->run('jam_absen')) {

            // ambil data yang dipost
            $hari = $this->input->post('hari');
            $datang_mulai = $this->input->post('datang_mulai');
            $datang_berakhir = $this->input->post('datang_berakhir');
            $datang_tutup = $this->input->post('datang_tutup');
            $pulang_mulai = $this->input->post('pulang_mulai');
            $pulang_berakhir = $this->input->post('pulang_berakhir');
            $pulang_tutup = $this->input->post('pulang_tutup');
            $role = $this->input->post('untuk');

            // ambil data jam absen berdasarkan hari dan role
            $jamAbsen = $this->jamAbsen->getJamAbsenByDayAndRole($hari, $role);

            // cek data jam absen 
            if ($jamAbsen) {
                $this->session->set_flashdata('gagal', 'Jam Absen Sudah Ada!');
                redirect('admin/data_master/jam_absen');
            }

            // dijadikan arrray sesuai nama field pada table jam absen
            $data = [
                'hari' => $hari,
                'datang_mulai' => $datang_mulai,
                'datang_berakhir' => $datang_berakhir,
                'datang_tutup' => $datang_tutup,
                'pulang_mulai' => $pulang_mulai,
                'pulang_berakhir' => $pulang_berakhir,
                'pulang_tutup' => $pulang_tutup,
                'role' => $role
            ];

            $this->jamAbsen->insertJamAbsen($data);
            $this->session->set_flashdata('sukses', 'Jam Absen Berhasil Ditambahkan!');
            redirect('admin/data_master/jam_absen');

            // jika validasi tidak terpenuhi 
        } else {

            // menampikan halaman dan parsing data
            return $this->load->view('admin/main', $data);
        }
    }


    public function editJamAbsen($id_jam_absen)
    {
        // tittle web
        $data['judul'] = "E - Presensi | Jam Absen";
        // konten yang akan ditampikan
        $data['konten'] = 'admin/data_master/jam_absen/edit';
        // array hari
        $data['hari'] = ['1', '2', '3', '4', '5', '6', '0'];
        // array untuk
        $data['untuk'] = [0 => ['guru', 'Guru'], 1 => ['siswa', 'Siswa']];

        // get data jam absen sesuai id_jam_absen
        $data['jam_absen'] = $this->jamAbsen->getJamAbsenById($id_jam_absen);

        // set rules validation
        if ($this->input->post('hari') == $data['jam_absen']['hari']) {
            $this->form_validation->set_rules('hari', '', 'required');
        } else {
            $this->form_validation->set_rules('hari', '', 'required|is_unique[jam_absen.hari]');
        }
        $this->form_validation->set_rules('untuk', '', 'required');
        $this->form_validation->set_rules('datang_mulai', '', 'required');
        $this->form_validation->set_rules('datang_berakhir', '', 'required');
        $this->form_validation->set_rules('datang_tutup', '', 'required');
        $this->form_validation->set_rules('pulang_mulai', '', 'required');
        $this->form_validation->set_rules('datang_berakhir', '', 'required');
        $this->form_validation->set_rules('pulang_tutup', '', 'required');

        $this->form_validation->set_message('required', 'Tidak Boleh Kosong!');
        $this->form_validation->set_message('is_unique', 'Hari Sudah Digunakan!');

        // cek form validasi berjalan atau tidak
        if ($this->form_validation->run()) {

            // ambil data yang dipost
            $hari = $this->input->post('hari');
            $datang_mulai = $this->input->post('datang_mulai');
            $datang_berakhir = $this->input->post('datang_berakhir');
            $datang_tutup = $this->input->post('datang_tutup');
            $pulang_mulai = $this->input->post('pulang_mulai');
            $pulang_berakhir = $this->input->post('pulang_berakhir');
            $pulang_tutup = $this->input->post('pulang_tutup');
            $role = $this->input->post('untuk');

            // dijadikan arrray sesuai nama field pada table jam absen
            $data = [
                'hari' => $hari,
                'datang_mulai' => $datang_mulai,
                'datang_berakhir' => $datang_berakhir,
                'datang_tutup' => $datang_tutup,
                'pulang_mulai' => $pulang_mulai,
                'pulang_berakhir' => $pulang_berakhir,
                'pulang_tutup' => $pulang_tutup,
                'role' => $role
            ];

            // menambah data jam absen
            $this->jamAbsen->updateJamAbsen($id_jam_absen, $data);
            // flashdata sukes
            $this->session->set_flashdata('sukses', 'Jam Absen Berhasil Ditambahkan!');
            // kembali kehalaman utama jam absen
            redirect('admin/data_master/jam_absen');

            // jika validasi tidak terpenuhi 
        } else {

            // menampikan halaman dan parsing data
            return $this->load->view('admin/main', $data);
        }
    }

    public function hapusJamAbsen($id_jam_absen)
    {

        // hpuas jam absen - parsing id
        $this->jamAbsen->deleteJamAbsen($id_jam_absen);
        // set flashdata berhasil
        $this->session->set_flashdata('sukses', 'Jam Absen Berhasil Dihapus!');
        // kembali kehalaman utama jam absen
        redirect('admin/data_master/jam_absen');
    }
}
