<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasModel extends CI_Model
{
    public function get()
    {
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        $this->db->order_by('id_kelas', 'ASC');
        return $this->db->get('kelas')->result_array();
    }

    public function getKelasById($id_kelas)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
    }

    public function insertKelas($data)
    {
        return $this->db->insert('kelas', $data);
    }

    public function updateKelas($id_kelas, $data)
    {
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->update('kelas', $data);
    }

    public function deleteKelas($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->delete('kelas');
    }

    public function getKelasInSiswaById($id_kelas)
    {
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        return $this->db->get_where('siswa', ['kelas_id' => $id_kelas])->row_array();
    }

    public function getKelasByJurusanId($id_jurusan){
        return $this->db->get_where('kelas', ['jurusan_id' => $id_jurusan])->result_array();
    }
}
