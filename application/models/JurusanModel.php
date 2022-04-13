<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JurusanModel extends CI_Model
{
    public function get()
    {
        return $this->db->get('jurusan')->result_array();
    }

    public function getJurusanById($id_jurusan)
    {
        return $this->db->get_where('jurusan', ['id_jurusan' => $id_jurusan])->row_array();
    }

    public function insertJurusan($data)
    {
        return $this->db->insert('jurusan', $data);
    }

    public function updateJurusan($id_jurusan, $data)
    {
        $this->db->where('id_jurusan', $id_jurusan);
        return $this->db->update('jurusan', $data);
    }

    public function deleteJurusan($id_jurusan)
    {
        $this->db->where('id_jurusan', $id_jurusan);
        return $this->db->delete('jurusan');
    }

    public function getJurusanInKelasById($id_jurusan)
    {
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        return $this->db->get_where('kelas', ['jurusan_id' => $id_jurusan])->row_array();
    }
}
