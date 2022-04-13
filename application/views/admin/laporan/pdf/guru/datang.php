<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @page {
            margin: 30px 30px 30px 30px;
        }

        body {
            margin: 0px;

        }

        table {
            font-size: 14px;
        }
    </style>
</head>

<body>

    <h2 align="center">E - Presensi</h2>

    <table width="200">
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?= $tanggal ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?= $jabatan ?></td>
        </tr>
        <tr>
            <td>Jenis Absen</td>
            <td>:</td>
            <td><?= $jenis_absen ?></td>
        </tr>
    </table>    
    <br>
    <table border="1px" cellspacing="0" cellpadding="5" width="100%">
        <thead align="center">
            <tr>
                <th>Waktu</th>
                <th>Ket Absen</th>
                <th>Ket</th>
                <th>Nip</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Ttd</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($guru) {
                foreach ($guru as $row) { ?>
                <tr>
                    <td width="6%" align="center"><?= $row['jam'] ?></td>
                    <td width="7%" align="center"><?= $row['status'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td width="15%" align="center"><?= $row['nip'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td width="10%" align="center"><?= $row['nama_sts'] ?></td>
                    <td align="center" width="10%"><img src="<?= './ttd_guru/'.$row['ttd'] ?>" alt="" width="85px" ></td>
                </tr>
            <?php
                    }
                }else {
                    echo " <tr align='center'><td colspan='8'>Tidak ada absen</td></tr> ";
                }
            ?>
        </tbody>
    </table>
</body>

</html>