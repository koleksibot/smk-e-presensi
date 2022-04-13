<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{
    public function get()
    {
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        $this->db->select('nisn, nisn, nama, kelas_id, status, kelas.*, jurusan.*');
        $this->db->order_by('nisn', 'ASC');
        return $this->db->get('siswa')->result_array();
    }

    public function getSiswaWhereNisn($nisn)
    {
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        $this->db->select('siswa.*, kelas.*, jurusan.*');
        $this->db->order_by('nisn', 'ASC');
        return $this->db->get_where('siswa', ['nisn' => $nisn])->row_array();
    }

    public function getSiswaById($nisn)
    {
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        $this->db->select('siswa.*, kelas.*, jurusan.*');
        $this->db->order_by('nisn', 'ASC');
        return $this->db->get_where('siswa', ['nisn' => $nisn])->row_array();
    }

    public function insertSiswa($data)
    {
        return $this->db->insert('siswa', $data);
    }

    public function updateSiswa($nisn, $data)
    {
        $this->db->where('nisn', $nisn);
        return $this->db->update('siswa', $data);
    }

    public function deleteSiswa($nisn)
    {
        $this->db->where('nisn', $nisn);
        return $this->db->delete('siswa');
    }

    // reset guru
    public function resetSiswa($nisn, $data)
    {
        $this->db->where('nisn', $nisn);
        return $this->db->update('siswa', $data);
    }

    // get jam absen siswa dengan jenis absen
    public function getJamAbsenSiswa($jenis_absen)
    {
        return $this->db->get_where('jam_absen', ['ktg_jam_absen' => 'siswa', 'jenis_absen' => $jenis_absen])->row_array();
    }

    public function getAbsenSiswa($tanggal, $jenis_absen)
    {
        $this->db->join('absen_siswa', 'siswa.nisn = absen_siswa.nisn');
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        $this->db->select('absen_siswa.*, siswa.nama, kelas.nama_kelas, jurusan.nama_jurusan');
        return $this->db->get_where('siswa', ['absen_siswa.jenis_absen' => $jenis_absen, 'absen_siswa.tanggal' => $tanggal])->result_array();
    }

    // get guru belum absen
    public function getBelumAbsenSiswa()    
    {
        return $this->db->query("SELECT nisn, nama, nama_kelas  FROM siswa JOIN kelas ON siswa.kelas_id = kelas.id_kelas WHERE NOT EXISTS (SELECT * FROM absen_siswa WHERE siswa.nisn = absen_siswa.nisn)")->result_array();
    }

    // get data absen siswa where tanggal nisn jenis absen
    public function getAbsenSiswaWhereNisnTgl($tanggal, $nisn, $jenis_absen)
    {
        return $this->db->get_where('absen_siswa', ['tanggal' => $tanggal, 'nisn' => $nisn, 'jenis_absen' => $jenis_absen])->row_array();
    }

    public function insertAbsenSiswa($data)
    {
        return $this->db->insert('absen_siswa', $data);
    }

    public function filter($jurusan, $kelas)
    {   
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->where('kelas.jurusan_id', $jurusan);
        if($kelas != 'all') {
            $this->db->where('kelas.id_kelas', $kelas);
        }
        return $this->db->get('siswa')->result_array();
    }

    public function filter_absen($tanggal, $kelas, $jenis_absen)
    {
        $this->db->join('absen_siswa', 'siswa.nisn = absen_siswa.nisn');
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        $this->db->select('absen_siswa.*, siswa.nama, kelas.nama_kelas, jurusan.nama_jurusan');
        $this->db->like(['absen_siswa.tanggal' => $tanggal, 'kelas.nama_kelas' => $kelas, 'absen_siswa.jenis_absen' => $jenis_absen]);
        return $this->db->get('siswa')->result_array();
    }

    public function ubah_password($nisn, $data)
    {
        $this->db->where(['nisn' => $nisn]);
        return $this->db->update('siswa', $data);
    }
}
