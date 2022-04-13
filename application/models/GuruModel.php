<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruModel extends CI_Model
{
    // get data guru
    public function get()
    {
        $this->db->join('status', 'guru.sts_id = status.id_sts');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('guru')->result_array();
    }

    // get data guru dengan id
    public function getGuruById($nip)
    {
        $this->db->join('status', 'guru.sts_id = status.id_sts');
        return $this->db->get_where('guru', ['nip' => $nip])->row_array();
    }

    // get data guru dengan nip
    public function getGuruWhereNip($nip)
    {
        $this->db->join('status', 'guru.sts_id = status.id_sts');
        return $this->db->get_where('guru', ['nip' => $nip])->row_array();
    }

    // insert guru
    public function insertGuru($data)
    {
        return $this->db->insert('guru', $data);
    }

    // update guru
    public function updateGuru($nip, $data)
    {
        $this->db->where('nip', $nip);
        return $this->db->update('guru', $data);
    }

    // hapus guru
    public function deleteGuru($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->delete('guru');
    }

    // reset guru
    public function resetGuru($nip, $data)
    {
        $this->db->where('nip', $nip);
        return $this->db->update('guru', $data);
    }

    // get jam absen guru dengan jenis absen
    public function getJamAbsenGuru($jenis_absen)
    {
        return $this->db->get_where('jam_absen', ['ktg_jam_absen' => 'guru', 'jenis_absen' => $jenis_absen])->row_array();
    }

    // get absen guru dengan jenis absen
    public function getAbsenGuru($tanggal, $jenis_absen)
    {
        $this->db->join('absen_guru', 'guru.nip = absen_guru.nip');
        $this->db->join('status', 'guru.sts_id = status.id_sts');
        $this->db->select('absen_guru.*, guru.nama, status.nama_sts');
        return $this->db->get_where('guru', ['absen_guru.jenis_absen' => $jenis_absen, 'absen_guru.tanggal' => $tanggal])->result_array();
    }

    // get guru belum absen
    public function getBelumAbsenGuru()
    {
        return $this->db->query("SELECT nip, nama, nama_sts  FROM guru JOIN status ON guru.sts_id = status.id_sts WHERE NOT EXISTS (SELECT * FROM absen_guru WHERE guru.nip = absen_guru.nip && tanggal = '' )")->result_array();
    }

    // get absen guru dengan nip tgl dan jenis absen
    public function getAbsenGuruWhereNipTgl($tanggal, $nip, $jenis_absen)
    {
        return $this->db->get_where('absen_guru', ['tanggal' => $tanggal, 'nip' => $nip, 'jenis_absen' => $jenis_absen])->row_array();
    }

    // untuk insert data guru / absen
    public function insertAbsenGuru($data)
    {
        return $this->db->insert('absen_guru', $data);
    }

    // filter absen guru
    public function filter_absen($tanggal, $status, $jenis_absen)
    {
        $this->db->join('status', 'guru.sts_id = status.id_sts');
        $this->db->join('absen_guru', 'guru.nip = absen_guru.nip');
        $this->db->select('absen_guru.*, guru.nama, status.nama_sts');
        $this->db->like(['absen_guru.tanggal' => $tanggal, 'status.nama_sts' => $status, 'jenis_absen' => $jenis_absen]);
        return $this->db->get('guru')->result_array();
    }

    // filter laporan guru
    public function filter($status)
    {
        $this->db->join('status', 'guru.sts_id = status.id_sts');
        $this->db->select('guru.*, status.nama_sts');
        $this->db->like(['status.nama_sts' => $status]);
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('guru')->result_array();
    }

    public function ubah_password($nip, $data)
    {
        $this->db->where(['nip' => $nip]);
        return $this->db->update('guru', $data);
    }
}
