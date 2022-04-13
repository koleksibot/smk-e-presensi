<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        
    }

    public function laporan()
    {
        // tab tittle
        $data['judul'] = "E - Presensi | Laporan coba ";
        // mengambil data yang di post dari form filter cetak 
        // tampilan yang akan digunakan untuk cetak pdf absen datang
        $printpdf = 'admin/laporan/pdf/guru/coba';
        // meng set kertas yang akan digunkan untuk cetak pdf
        $this->pdf->setPaper('letter', 'potrait');
        // nama file pdf yang akan di cetak
        $this->pdf->filename = 'coba';
        // function untuk mencetak pdh dengan parameter letak tampilan dan data yang dibutuhkan
        $this->pdf->make_pdf($printpdf, $data);
    }
}