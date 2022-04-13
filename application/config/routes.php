<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Auth/guru';

// ========== LOGIN ==========

// === login admin
$route['login/admin'] = 'Auth/admin';

// === login guru
$route['login/guru'] = 'Auth/guru';

// === login siswa
$route['login/siswa'] = 'Auth/siswa';

// ========== ADMIN ==========

// ===== BERANDA =====

// === beranda
$route['admin/beranda'] = 'Admin';

// === ubah password
$route['admin/ubah_password'] = 'Admin/ubahPassword';

// === admin
$route['admin/admin'] = 'Admin/admin';
// === tambah admin
$route['admin/admin/tambah'] = 'Admin/tambahAdmin';
// === edit admin
$route['admin/admin/edit/(:num)'] = 'Admin/editAdmin/$1';
// === hapus admin
$route['admin/admin/hapus/(:num)'] = 'Admin/hapusAdmin/$1';
// reset admin
$route['admin/admin/reset/(:num)'] = 'Admin/resetAdmin/$1';

// ===== DATA MASTER =====

// === guru
$route['admin/data_master/guru'] = 'Guru';
// tambah guru
$route['admin/data_master/guru/tambah'] = 'Guru/tambahGuru';
// edit guru
$route['admin/data_master/guru/edit/(:num)'] = 'Guru/editGuru/$1';
// hapus guru
$route['admin/data_master/guru/hapus/(:num)'] = 'Guru/hapusGuru/$1';
// reset guru
$route['admin/data_master/guru/reset/(:num)'] = 'Guru/resetGuru/$1';

// === siswa
$route['admin/data_master/siswa'] = 'Siswa';
// tambah siswa
$route['admin/data_master/siswa/tambah'] = 'Siswa/tambahSiswa';
// edit siswa
$route['admin/data_master/siswa/edit/(:num)'] = 'Siswa/editSiswa/$1';
// hapus siswa
$route['admin/data_master/siswa/hapus/(:num)'] = 'Siswa/hapusSiswa/$1';
// reset guru
$route['admin/data_master/siswa/reset/(:num)'] = 'Siswa/resetSiswa/$1';

// === jurusan
$route['admin/data_master/jurusan'] = 'Jurusan';
// tambah jurusan
$route['admin/data_master/jurusan/tambah'] = 'Jurusan/tambahJurusan';
// edit jurusan
$route['admin/data_master/jurusan/edit/(:num)'] = 'Jurusan/editJurusan/$1';
// hapus jurusan
$route['admin/data_master/jurusan/hapus/(:num)'] = 'Jurusan/hapusJurusan/$1';

// === kelas
$route['admin/data_master/kelas'] = 'Kelas';
// tambah kelas
$route['admin/data_master/kelas/tambah'] = 'Kelas/tambahKelas';
// edit kelas
$route['admin/data_master/kelas/edit/(:num)'] = 'Kelas/editKelas/$1';
// hapus kelas
$route['admin/data_master/kelas/hapus/(:num)'] = 'Kelas/hapusKelas/$1';

// === jabatan
$route['admin/data_master/status'] = 'Status';
// tambah jabatan
$route['admin/data_master/status/tambah'] = 'Status/tambahStatus';
// edit jabatan
$route['admin/data_master/status/edit/(:num)'] = 'Status/editStatus/$1';
// hapus jabatan
$route['admin/data_master/status/hapus/(:num)'] = 'Status/hapusStatus/$1';

// === jam absen
$route['admin/data_master/jam_absen'] = 'JamAbsen';
// tambah jam absen
$route['admin/data_master/jam_absen/tambah'] = 'JamAbsen/tambahJamAbsen';
// edit jam absen
$route['admin/data_master/jam_absen/edit/(:num)'] = 'JamAbsen/editJamAbsen/$1';
// hapus jam absen
$route['admin/data_master/jam_absen/hapus/(:num)'] = 'JamAbsen/hapusJamAbsen/$1';

// === mapel
$route['admin/data_master/mapel'] = 'Mapel';
// tambah mapel
$route['admin/data_master/mapel/tambah'] = 'Mapel/tambahMapel';
// edit mapel
$route['admin/data_master/mapel/edit/(:num)'] = 'Mapel/editMapel/$1';
// hapus mapel
$route['admin/data_master/mapel/hapus/(:num)'] = 'Mapel/hapusMapel/$1';

// ===== ABSEN =====

// === absen
// guru
$route['admin/absen/guru'] = 'Guru/absen';
// siswa 
$route['admin/absen/siswa'] = 'Siswa/absen';


// ===== LAPORAN =====

// guru
$route['admin/laporan/guru'] = 'Guru/laporan';
// siswa
$route['admin/laporan/siswa'] = 'Siswa/laporan';

// ========== END ADMIN ==========


// ========== USER ========== 
// beranda
$route['user/beranda'] = 'User';
// halaman absen
$route['user/absen'] = 'User/absen';
// halaman absen kbm
$route['user/absen_kbm'] = 'User/absenKbm';
// halaman ubah password
$route['user/ubah_password'] = 'User/ubahPassword';

// cek keterangan absen
$route['user/cek_jam_absen'] = 'JamAbsen/keteranganJamAbsen';

// for select option Jurusan for get the class
$route['admin/siswa/get_kelas_by_jurusan_id'] = 'Siswa/getKelasByIdJurusan';

// logout
$route['logout'] = 'Auth/logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
