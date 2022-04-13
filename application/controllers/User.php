<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // function cek auth
        authenticated_check();
        // load model
        $this->load->model('GuruModel', 'guru');
        $this->load->model('SiswaModel', 'siswa');
        $this->load->model('JamAbsenModel', 'jamAbsen');
        // load library upload file
        $this->load->library('upload');
    }

    // tampilan awal / beranda
    public function index()
    {
        // title web
        $data['judul'] = "E - Presensi | Beranda";

        // konten
        $data['konten'] = 'user/beranda';

        //meload tampilan 
        return $this->load->view('user/main', $data);
    }


    public function absen()
    {
        if ($this->session->userdata('sebagai') == 'guru') {
            $this->absenGuru();
        } else {
            $this->absenSiswa();
        }
    }

    public function absenKbm()
    {
        // title web
        $data['judul'] = "E - Presensi | Absen KBM";

        // meload konten
        $data['konten'] = 'user/absen/guru/absen_kbm';

        //meload halaman induk template
        return $this->load->view('user/main', $data);
    }

    private function absenGuru()
    {
        // title web
        $data['judul'] = "E - Presensi | Absen";

        // data post
        // -- role 
        $role = $this->session->userdata('sebagai');
        // -- nip
        $nip = $this->session->userdata('nip');
        // -- tanggal
        $tanggal = $this->input->post('tanggal');
        // -- jam/pukul
        $jam = $this->input->post('jam', TRUE);
        // -- tanda tangan
        $ttd = str_replace('[removed]', '', $this->input->post('ttd'));
        $image = base64_decode($ttd);
        $dir_ttd = 'ttd_guru/';
        // -- status
        $status = $this->input->post('status');

        // get data model
        $absen_datang = $this->guru->getAbsenGuruWhereNipTgl(date('d-m-Y'), $nip, 'datang');
        $absen_pulang = $this->guru->getAbsenGuruWhereNipTgl(date('d-m-Y'), $nip, 'pulang');

        // ambil data jam absen -> cek hari dan jam absen sekarang
        $jam_absen = $this->jamAbsen->getJamAbsenByDayAndRole(date('w'), $role);

        // parsing data
        $data['absen'] = $this->guru->getGuruWhereNip($nip);

        // cek jam absen
        // jika tidak ada
        if (!$jam_absen) {
            $msg_header = "Mohon Maaf <i class='fa fa-frown'></i>";
            $msg_konten = "Tidak ada jam absen hari ini, Kembali lagi besok.";
            $this->pesanAbsen($msg_header, $msg_konten);
        } else {
            // cek jam mulai absen
            if (date('H:i') < $jam_absen['datang_mulai']) {
                $msg_header = "Mohon Maaf <i class='fa fa-frown'></i>";
                $msg_konten = "Absensi belum dimulai, Absen akan dimulai pukul 06:00.";
                $this->pesanAbsen($msg_header, $msg_konten);
            } else {
                if ($absen_datang && $absen_pulang) {
                    $msg_header = "Terima Kasih <i class='fa fa-smile'></i>";
                    $msg_konten = ($absen_datang['status'] == 'sakit') ? "Terima kasih sudah absen hari ini, Semoga lekas sembuh." : "Terima kasih sudah absen hari ini.";
                    $this->pesanAbsen($msg_header, $msg_konten);
                } else if ($absen_datang) {
                    if (date('H:i') > $jam_absen['pulang_tutup']) {
                        $msg_header = "Mohon Maaf <i class='fa fa-frown'></i>";
                        $msg_konten = "Absensi sudah ditutup, Absen kembali besok.";
                        $this->pesanAbsen($msg_header, $msg_konten);
                    } else {
                        $data['konten'] = 'user/absen/guru/absen_pulang';
                        $data['js'] = 'lib/js';
                        if ($this->form_validation->run('form_absen') == true) {
                            // simpan ttd
                            $nama_ttd = $tanggal . '-' . $nip . '-pulang.png';
                            file_put_contents($dir_ttd . $nama_ttd, $image);
                            $data = [
                                'nip' => $nip,
                                'tanggal' => $tanggal,
                                'jam' => $jam,
                                'status' => 'hadir',
                                'surat_izin' => '',
                                'keterangan' => $this->input->post('keteranganPulang'),
                                'ttd' => $nama_ttd,
                                'jenis_absen' => 'pulang'
                            ];
                            $this->guru->insertAbsenGuru($data);
                            $this->session->set_flashdata('sukses', 'Anda Berhasil Absen!');
                            return redirect('user/absen');
                        } else {
                            return $this->load->view('user/main', $data);
                        }
                    }
                } else {
                    if (date('H:i') > $jam_absen['datang_tutup']) {
                        $msg_header = "Mohon Maaf <i class='fa fa-frown'></i>";
                        $msg_konten = "Absensi sudah ditutup, Absen kembali besok.";
                        $this->pesanAbsen($msg_header, $msg_konten);
                    } else {
                        $data['konten'] = 'user/absen/guru/absen_datang';
                        $data['js'] = 'lib/js';
                        if ($this->form_validation->run('form_absen') == true) {
                            // simpan ttd
                            $nama_ttd = $tanggal . '-' . $nip . '-datang.png';
                            file_put_contents($dir_ttd . $nama_ttd, $image);
                            // cek status 
                            if ($status == "izin" || $status == "sakit") {
                                // upload
                                $upload = $this->uploadSurat("./surat_guru/", $tanggal . "-" . $nip . "-" . $status);
                                $data = [
                                    [
                                        'nip' => $nip,
                                        'tanggal' => $tanggal,
                                        'jam' => $jam,
                                        'status' => $status,
                                        'surat_izin' => $upload,
                                        'keterangan' => $this->input->post('keteranganDatang', TRUE),
                                        'ttd' => $nama_ttd,
                                        'jenis_absen' => 'datang'
                                    ], [
                                        'nip' => $nip,
                                        'tanggal' => $tanggal,
                                        'jam' => $jam,
                                        'status' => $status,
                                        'surat_izin' => $upload,
                                        'keterangan' => $status,
                                        'ttd' => $nama_ttd,
                                        'jenis_absen' => 'pulang'
                                    ]
                                ];
                                $this->db->insert_batch('absen_guru', $data);
                                $this->session->set_flashdata('sukses', 'Anda Berhasil Absen!');
                                return redirect('user/absen');
                            } else {
                                $data = [
                                    'nip' => $nip,
                                    'tanggal' => $tanggal,
                                    'jam' => $jam,
                                    'status' => $status,
                                    'surat_izin' => '',
                                    'keterangan' => $this->input->post('keteranganDatang'),
                                    'ttd' => $nama_ttd,
                                    'jenis_absen' => 'datang'
                                ];
                                $this->guru->insertAbsenGuru($data);
                                $this->session->set_flashdata('sukses', 'Anda Berhasil Absen!');
                                return redirect('user/absen');
                            }
                        } else {
                            return $this->load->view('user/main', $data);
                        }
                    }
                }
            }
        }
    }

    private function absenSiswa()
    {
        // title web
        $data['judul'] = "E - Presensi | Absen";

        // data post
        $role = $this->session->userdata('sebagai');
        $nisn = $this->session->userdata('nisn');
        $tanggal = $this->input->post('tanggal', TRUE);
        $jam = $this->input->post('jam', TRUE);

        // tanda tangan
        $ttd = str_replace('[removed]', '', $this->input->post('ttd'));
        $image = base64_decode($ttd);

        // get data
        $absen_datang = $this->siswa->getAbsenSiswaWhereNisnTgl(date('d-m-Y'), $nisn, 'datang');
        $absen_pulang = $this->siswa->getAbsenSiswaWhereNisnTgl(date('d-m-Y'), $nisn, 'pulang');

        $jam_absen = $this->jamAbsen->getJamAbsenByDayAndRole(date('w'), $role);

        // parsing data
        $data['absen'] = $this->siswa->getSiswaWhereNisn($nisn);

        // cek jam absen
        // jika tidak ada
        if (!$jam_absen) {
            $msg_header = "Mohon Maaf <i class='fa fa-frown'></i>";
            $msg_konten = "Tidak ada jam absen hari ini, Kembali lagi besok.";
            $this->pesanAbsen($msg_header, $msg_konten);
        } else {
            if (date('H:i') < $jam_absen['datang_mulai']) {
                $msg_header = "Mohon Maaf <i class='fa fa-frown'></i>";
                $msg_konten = "Absensi belum dimulai, Absen akan dimulai pukul " . $jam_absen['datang_mulai'];
                $this->pesanAbsen($msg_header, $msg_konten);
            } else {
                if ($absen_datang && $absen_pulang) {
                    $msg_header = "Terima Kasih <i class='fa fa-smile'></i>";
                    $msg_konten = ($absen_datang['status'] == 'sakit') ? "Terima kasih sudah absen hari ini, Semoga lekas sembuh." : "Terima kasih sudah absen hari ini.";
                    $this->pesanAbsen($msg_header, $msg_konten);
                } else if ($absen_datang) {
                    if (date('H:i') > $jam_absen['pulang_tutup']) {
                        $msg_header = "Mohon Maaf <i class='fa fa-frown'></i>";
                        $msg_konten = "Absensi sudah ditutup, Absen kembali besok.";
                        $this->pesanAbsen($msg_header, $msg_konten);
                    } else {
                        $data['konten'] = 'user/absen/siswa/absen_pulang';
                        $data['js'] = 'lib/js';
                        if ($this->form_validation->run('form_absen') == true) {
                            // simpan ttd
                            $nama_ttd = $nisn . '-' .  $tanggal . '-pulang' . '.png';
                            $letak = 'ttd_siswa/';
                            file_put_contents($letak . $nama_ttd, $image);
                            $data = [
                                'nisn' => $nisn,
                                'tanggal' => $tanggal,
                                'jam' => $jam,
                                'status' => 'hadir',
                                'surat_izin' => '',
                                'keterangan' => $this->input->post('keteranganPulang'),
                                'ttd' => $nama_ttd,
                                'jenis_absen' => 'pulang'
                            ];
                            $this->siswa->insertAbsenSiswa($data);
                            $this->session->set_flashdata('sukses', 'Anda Berhasil Absen!');
                            return redirect('user/absen');
                        } else {
                            return $this->load->view('user/main', $data);
                        }
                    }
                } else {
                    if (date('H:i') > $jam_absen['datang_tutup']) {
                        $msg_header = "Mohon Maaf <i class='fa fa-frown'></i>";
                        $msg_konten = "Absensi sudah ditutup, Absen kembali besok.";
                        $this->pesanAbsen($msg_header, $msg_konten);
                    } else {
                        $data['konten'] = 'user/absen/siswa/absen_datang';
                        $data['js'] = 'lib/js';
                        if ($this->form_validation->run('form_absen') == true) {
                            $status = $this->input->post('status');
                            // simpan ttd
                            $nama_ttd = $tanggal . '-' .  $nisn . '-datang' . '.png';
                            $letak = 'ttd_siswa/';
                            file_put_contents($letak . $nama_ttd, $image);
                            // cek status
                            if ($status == "izin" || $status == "sakit") {
                                // upload foto
                                $upload = $this->uploadSurat("./surat_siswa/", $tanggal . "-" . $nisn . "-" . $status);
                                $data = [
                                    [
                                        'nisn' => $nisn,
                                        'tanggal' => $tanggal,
                                        'jam' => $jam,
                                        'status' => $status,
                                        'surat_izin' => $upload,
                                        'keterangan' => $this->input->post('keteranganDatang', TRUE),
                                        'ttd' => $nama_ttd,
                                        'jenis_absen' => 'datang'
                                    ], [
                                        'nisn' => $nisn,
                                        'tanggal' => $tanggal,
                                        'jam' => $jam,
                                        'status' => $status,
                                        'surat_izin' => $upload,
                                        'keterangan' => 'Pulang cepat',
                                        'ttd' => $nama_ttd,
                                        'jenis_absen' => 'pulang'
                                    ]
                                ];
                                $this->db->insert_batch('absen_siswa', $data);
                                $this->session->set_flashdata('sukses', 'Anda Berhasil Absen!');
                                return redirect('user/absen');
                            } else {
                                $data = [
                                    'nisn' => $nisn,
                                    'tanggal' => $tanggal,
                                    'jam' => $jam,
                                    'status' => $status,
                                    'surat_izin' => '',
                                    'keterangan' => $this->input->post('keteranganDatang'),
                                    'ttd' => $nama_ttd,
                                    'jenis_absen' => 'datang'
                                ];
                                $this->siswa->insertAbsenSiswa($data);
                                $this->session->set_flashdata('sukses', 'Anda Berhasil Absen!');
                                return redirect('user/absen');
                            }
                        } else {
                            return $this->load->view('user/main', $data);
                        }
                    }
                }
            }
        }
    }

    private function pesanAbsen($msg_header = "", $msg_konten = "")
    {
        $data['judul'] = "E - Presensi | Absen";
        $data['konten'] = 'user/pesan_absen';
        $data['msg_header'] = $msg_header;
        $data['msg_konten'] = $msg_konten;
        return $this->load->view('user/main', $data);
    }

    public function uploadSurat($letak, $namaFile)
    {
        // upload foto
        $config['upload_path'] = $letak;
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '3072';
        $config['file_name'] = $namaFile;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('surat')) {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = $letak . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['overwrite'] = TRUE;
            $config['quality'] = '50%';
            $config['new_image'] = $letak . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $gbr['file_name'];
        } else {
            $this->session->set_flashdata('gagal', $this->upload->display_errors());
            return redirect('user/absen');
        }
    }

    public function ubahPassword()
    {
        if ($this->session->userdata('sebagai') == 'guru') {
            $this->ubahPasswordGuru();
        } else {
            $this->ubahPasswordSiswa();
        }
    }

    private function ubahPasswordGuru()
    {
        $data['judul'] = "E - Presensi | Beranda";
        $data['konten'] = 'user/absen/ubah_password';
        $nip = $this->session->userdata('nip');
        $guru = $this->guru->getGuruWhereNip($nip);
        if ($this->form_validation->run('ubah_password')) {
            $passwordLama = $this->input->post('password_lama');
            $passwordBaru = $this->input->post('password_baru');
            // cek password
            if ($this->form_validation->run('ubah_password')) {
                $passwordLama = $this->input->post('password_lama');
                $passwordBaru = $this->input->post('password_baru');
                // cek password
                if (md5($passwordLama) == $guru['password']) {
                    $data = [
                        'password' => md5($passwordBaru)
                    ];
                    $this->guru->ubah_password($nip, $data);
                    $this->session->set_flashdata('sukses', 'Password Berhasil Diubah!');
                    return redirect('user/ubah_password');
                } else {
                    $this->session->set_flashdata('passwordSalah', 'Password Salah!');
                    return redirect('user/ubah_password');
                }
            } else {
                $this->load->view('user/main', $data);
            }
        } else {
            $this->load->view('user/main', $data);
        }
    }

    private function ubahPasswordSiswa()
    {
        $data['judul'] = "E - Presensi | Beranda";
        $data['konten'] = 'user/absen/ubah_password';
        $nisn = $this->session->userdata('nisn');
        $siswa = $this->siswa->getSiswaWhereNisn($nisn);
        if ($this->form_validation->run('ubah_password')) {
            $passwordLama = $this->input->post('password_lama');
            $passwordBaru = $this->input->post('password_baru');
            // cek password
            if (md5($passwordLama) == $siswa['password']) {
                $data = [
                    'password' => md5($passwordBaru)
                ];
                $this->siswa->ubah_password($nisn, $data);
                $this->session->set_flashdata('sukses', 'Password Berhasil Diubah!');
                return redirect('user/ubah_password');
            } else {
                $this->session->set_flashdata('passwordSalah', 'Password Salah!');
                return redirect('user/ubah_password');
            }
        } else {
            $this->load->view('user/main', $data);
        }
    }
}
