<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{

    private $table = 'admin';

    public function get()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getAdminWhereUsername($username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row_array();
    }

    public function getAdminById($id_admin)
    {
        return $this->db->get_where($this->table, ['id_admin' => $id_admin])->row_array();
    }

    public function ubah_password($id_admin, $data)
    {
        $this->db->where(['id_admin' => $id_admin]);
        return $this->db->update($this->table, $data);
    }

    public function insertAdmin($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function updateAdmin($id_admin, $data)
    {
        $this->db->where(['id_admin' => $id_admin]);
        return $this->db->update($this->table, $data);
    }

    public function deleteAdmin($id_admin)
    {
        $this->db->where(['id_admin' => $id_admin]);
        return $this->db->delete($this->table);
    }

    // reset admin
    public function resetAdmin($id_admin, $data)
    {
        $this->db->where('id_admin', $id_admin);
        return $this->db->update('admin', $data);
    }
}
