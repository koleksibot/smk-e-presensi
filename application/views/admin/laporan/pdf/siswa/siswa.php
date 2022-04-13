<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>

    <style>
        @page {
            margin: 30px 30px 45px 30px;
        }

        body {
            margin: 0px;

        }

        table {
            font-size: 14px;
        }

        .text-kop {
            margin: 0;
        }

        p.text-kop {
            font-size: 13px;
        }
    </style>
</head>

<body>

    <h4 align="center" class="text-kop">PEMERINTAH PROVINSI JAWA TIMUR</h4>
    <h4 align="center" class="text-kop">DINAS PENDIDIKAN</h4>
    <h3 align="center" class="text-kop">SEKOLAH MENENGAH KEJURUAN NEGERI 6 JEMBER</h3>
    <p align="center" class="text-kop">Jalan PB. Sudirman No. 144 Tanggul Telp/Fax. (0336) 441347 Tanggul, Jember 68155</p>
    <p align="center" class="text-kop">E-mail: <a href="#">smkn6jember@yahoo.com</a> website : smkn6jember.sch.id</p>
    <h3 align="center" class="text-kop">JEMBER</h3>


    <hr>

    <table width="200">
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?= $tanggal_format_indonesia ?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td><?= $jurusan['ket'] ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $kelas ?></td>
        </tr>
    </table>
    <br>
    <table border="1px" cellspacing="0" cellpadding="5" width="100%">
        <thead align="center">
            <tr>
                <th width="13%" rowspan="2">NISN</th>
                <th rowspan="2">Nama</th>
                <?php if ($kelas == 'Semua kelas') : ?>
                    <th rowspan="2">Kelas</th>
                <?php endif; ?>
                <th colspan="6">Absen</th>
            </tr>
            <tr>
                <th>Datang</th>
                <th>Ket</th>
                <th>TTD</th>
                <th>Pulang</th>
                <th>Ket</th>
                <th>TTD</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswa as $s) :
                $this->db->select('count(nisn) as absen, keterangan, status, ttd');
                $cek_absen_datang = $this->db->get_where('absen_siswa', ['nisn' => $s['nisn'], 'jenis_absen' => 'datang', 'tanggal' => $tanggal])->row_array();
                $this->db->select('count(nisn) as absen, keterangan, status, ttd');
                $cek_absen_pulang = $this->db->get_where('absen_siswa', ['nisn' => $s['nisn'], 'jenis_absen' => 'pulang', 'tanggal' => $tanggal])->row_array();
            ?>
                <tr>
                    <td align="center"><?= $s['nisn']; ?></td>
                    <td><?= $s['nama']; ?></td>
                    <?php if ($kelas == 'Semua kelas') : ?>
                        <td><?= $s['nama_kelas']; ?></td>
                    <?php endif; ?>
                    <td align=" center" width="8%">
                        <?php
                        if ($cek_absen_datang['absen'] == 1) {
                            if ($cek_absen_datang['status'] != 'hadir') {
                                echo "<span style='color : orange'>" . ucfirst($cek_absen_datang['status']) . "</span>";
                            } else {
                                echo "<span style='color : green'>" . ucfirst($cek_absen_datang['status']) . "</span>";
                            }
                        } else {
                            echo "<span style='color : red'>Alpha</span>";
                        }
                        ?>
                    </td>
                    <td align="center" width="15%"><span><?= $cek_absen_datang['keterangan']; ?></span></td>
                    <td>
                        <?php
                        if ($cek_absen_datang['absen'] == 1) {
                            echo "<img src='./ttd_siswa/" . $cek_absen_datang['ttd'] . "' width='70px' alt=''>";
                        } else {
                            echo "";
                        }
                        ?>
                    </td>
                    <td align="center" width="8%">
                        <?php
                        if ($cek_absen_pulang['absen'] == 1) {
                            if ($cek_absen_pulang['status'] != 'hadir') {
                                echo "<span style='color : orange'>" . ucfirst($cek_absen_pulang['status']) . "</span>";
                            } else {
                                echo "<span style='color : green'>" . ucfirst($cek_absen_pulang['status']) . "</span>";
                            }
                        } else {
                            echo "<span style='color : red'>Alpha</span>";
                        }
                        ?>
                    </td>
                    <td align="center" width="15%"><span><?= $cek_absen_pulang['keterangan']; ?></span></td>
                    <td>
                        <?php
                        if ($cek_absen_pulang['absen'] == 1) {
                            echo "<img src='./ttd_siswa/" . $cek_absen_pulang['ttd'] . "' width='70px' alt=''>";
                        } else {
                            echo "";
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>