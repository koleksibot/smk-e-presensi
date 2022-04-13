<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatusModel extends CI_Model
{
    public function get()
    {
        return $this->db->get('status')->result_array();
    }

    public function getStatusById($id_sts)
    {
        return $this->db->get_where('status', ['id_sts' => $id_sts])->row_array();
    }

    public function insertStatus($data)
    {
        return $this->db->insert('status', $data);
    }

    public function updateStatus($id_sts, $data)
    {
        $this->db->where('id_sts', $id_sts);
        return $this->db->update('status', $data);
    }

    public function deleteStatus($id_sts)
    {
        $this->db->where('id_sts', $id_sts);
        return $this->db->delete('status');
    }

    public function getStatusInGuruById($id_sts)
    {
        $this->db->join('status', 'guru.sts_id = status.id_sts');
        return $this->db->get_where('guru', ['sts_id' => $id_sts])->row_array();
    }
}
