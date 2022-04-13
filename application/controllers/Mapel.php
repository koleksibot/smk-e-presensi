<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        authenticated_check();
        $this->load->model('MapelModel', 'mapel');
    }

    public function index()
    {
        $data['judul'] = "";
        $data['konten'] = 'admin/data_master/mapel/mapel';
        $this->load->view('admin/main', $data);
    }

    public function tambahMapel()
    {
    }

    public function editMapel($idMapel)
    {
    }

    public function hapusMapel($idMapel)
    {
    }
}
