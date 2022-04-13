<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JamAbsenModel extends CI_Model
{
    // atribute
    private $table = "jam_absen";

    // mengambil data jam absen berdasarkan id_jam_absen
    public function getJamAbsenById($id_jam_absen)
    {
        return $this->db->get_where($this->table, ['id_jam_absen' => $id_jam_absen])->row_array();
    }

    // mengambil data jam absen per role
    public function getJamAbsenByRole($role)
    {
        $this->db->like(["role" => $role]);
        return $this->db->get($this->table)->result_array();
    }

    // mengambil data jam absen berdasarkan hari dan role
    public function getJamAbsenByDayAndRole($hari, $role)
    {
        return $this->db->get_where($this->table, ['hari' => $hari, 'role' => $role])->row_array();
    }

    // menambah data absen
    public function insertJamAbsen($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // update data absen
    public function updateJamAbsen($id_jam_absen, $data)
    {
        $this->db->where('id_jam_absen', $id_jam_absen);
        return $this->db->update($this->table, $data);
    }

    // hapus data absen 
    public function deleteJamAbsen($id_jam_absen)
    {
        $this->db->where('id_jam_absen', $id_jam_absen);
        return $this->db->delete($this->table);
    }
}
