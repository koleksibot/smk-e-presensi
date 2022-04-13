-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2021 pada 20.50
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-presensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_guru`
--

CREATE TABLE `absen_guru` (
  `nip` varchar(21) NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `surat_izin` varchar(60) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `ttd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jenis_absen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_guru`
--

INSERT INTO `absen_guru` (`nip`, `tanggal`, `jam`, `status`, `surat_izin`, `keterangan`, `ttd`, `jenis_absen`) VALUES
('1601012662299', '07-10-2021', '06:49', 'hadir', '', 'Tepat waktu', '07-10-2021-1601012662299-datang.png', 'datang'),
('1619081319799', '07-10-2021', '07:30', 'hadir', '', 'Tepat waktu', '07-10-2021-1619081319799-datang.png', 'datang'),
('1619081319799', '07-10-2021', '07:30', 'hadir', '', 'Pulang cepat', '07-10-2021-1619081319799-pulang.png', 'pulang'),
('1619081319799', '08-10-2021', '06:34', 'hadir', '', 'Tepat waktu', '08-10-2021-1619081319799-datang.png', 'datang'),
('1619081319799', '08-10-2021', '06:34', 'hadir', '', 'Pulang cepat', '08-10-2021-1619081319799-pulang.png', 'pulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `nisn` char(25) NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `surat_izin` varchar(60) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `ttd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jenis_absen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`nisn`, `tanggal`, `jam`, `status`, `surat_izin`, `keterangan`, `ttd`, `jenis_absen`) VALUES
('123456789', '07-10-2021', '07:36', 'hadir', '', 'Tepat waktu', '07-10-2021-123456789-datang.png', 'datang'),
('123456789', '07-10-2021', '07:36', 'hadir', '', 'Pulang cepat', '123456789-07-10-2021-pulang.png', 'pulang'),
('1600012847199', '07-10-2021', '08:37', 'hadir', '', 'Terlambat 0 jam 37 menit 15 detik', '07-10-2021-1600012847199-datang.png', 'datang'),
('1600012847199', '07-10-2021', '16:38', 'hadir', '', 'Tepat waktu', '1600012847199-07-10-2021-pulang.png', 'pulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'super'),
(2, 'Operator', 'operator', '4b583376b2767b923c3e1da60d10de59', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(21) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `sts_id` int(11) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `sts_id`, `password`) VALUES
('1601012662299', 'Shaffer', 8, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1602022043399', 'Spears', 10, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1603020583899', 'Travis', 8, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1604051575799', 'Patrick', 4, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1605100943399', 'Ferguson', 9, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1606062741699', 'Garza', 10, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1611091858599', 'Frye', 4, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1611102015699', 'Holt', 8, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1613013094799', 'Wheeler', 7, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1618052438799', 'Brewer', 4, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1618081335799', 'Skinner', 8, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1619052779899', 'Stout', 10, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1619080462799', 'Mills', 5, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1619081319799', 'Butler', 1, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1619122193899', 'Glass', 6, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1620020732499', 'Gibbs', 7, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1621080263599', 'Lopez', 9, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1621112124299', 'Watts', 7, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1622011110699', 'Kerr', 9, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1622061342899', 'Lopez', 10, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1626070232199', 'Warner', 9, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1627051386499', 'Wiley', 7, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1627091701099', 'Poole', 5, 'ee11cbb19052e40b07aac0ca060c23ee'),
('1628062992199', 'Franco', 10, 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_absen`
--

CREATE TABLE `jam_absen` (
  `id_jam_absen` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `datang_mulai` time NOT NULL,
  `datang_berakhir` time NOT NULL,
  `datang_tutup` time NOT NULL,
  `pulang_mulai` time NOT NULL,
  `pulang_berakhir` time NOT NULL,
  `pulang_tutup` time NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jam_absen`
--

INSERT INTO `jam_absen` (`id_jam_absen`, `hari`, `datang_mulai`, `datang_berakhir`, `datang_tutup`, `pulang_mulai`, `pulang_berakhir`, `pulang_tutup`, `role`) VALUES
(1, '1', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'siswa'),
(2, '2', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'siswa'),
(3, '3', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'siswa'),
(4, '4', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'siswa'),
(5, '5', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'siswa'),
(6, '6', '07:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'siswa'),
(7, '1', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'guru'),
(8, '2', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'guru'),
(9, '3', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'guru'),
(10, '4', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'guru'),
(11, '5', '06:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'guru'),
(12, '6', '07:00:00', '08:00:00', '15:00:00', '15:00:00', '17:00:00', '21:00:00', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(5) NOT NULL,
  `nama_jurusan` varchar(15) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `ket`) VALUES
(1, 'RPL', 'Rekayasa Perangakat Lunak'),
(2, 'MM', 'Multimedia'),
(3, 'OTKP', 'Otomatisasi & Tata Kelola Perkantoran'),
(4, 'AKL', 'Akutansi & Keuangan Lembaga'),
(5, 'BDP', 'Bisnis Daring & Pemasaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `jurusan_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan_id`) VALUES
(1, 'X RPL 1', 1),
(2, 'X RPL 2', 1),
(3, 'XI RPL 1', 1),
(4, 'XI RPL 2', 1),
(5, 'XII RPL 1', 1),
(6, 'XII RPL 2', 1),
(7, 'X MM 1', 2),
(8, 'X MM 2', 2),
(9, 'XI MM 1', 2),
(10, 'XI MM 2', 2),
(11, 'XII MM 1', 2),
(12, 'XII MM 2', 2),
(13, 'X OTKP 1', 3),
(14, 'X OTKP 2', 3),
(15, 'X OTKP 3', 3),
(16, 'XI OTKP 1', 3),
(17, 'XI OTKP 2', 3),
(18, 'XI OTKP 3', 3),
(19, 'XII OTKP 1', 3),
(20, 'XII OTKP 2', 3),
(21, 'XII OTKP 3', 3),
(22, 'X AKL 1', 4),
(23, 'X AKL 2', 4),
(24, 'X AKL 3', 4),
(25, 'XI AKL 1', 4),
(26, 'XI AKL 2', 4),
(27, 'XI AKL 3', 4),
(28, 'XII AKL 1', 4),
(29, 'XII AKL 2', 4),
(30, 'XII AKL 3', 4),
(31, 'X BDP 1', 5),
(32, 'X BDP 2', 5),
(33, 'X BDP 3', 5),
(34, 'X BDP 4', 5),
(35, 'XI BDP 1', 5),
(36, 'XI BDP 2', 5),
(37, 'XI BDP 3', 5),
(38, 'XI BDP 4', 5),
(39, 'XII BDP 1', 5),
(40, 'XII BDP 2', 5),
(41, 'XII BDP 3', 5),
(42, 'XII BDP 4', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(25) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `kelas_id`, `status`, `password`) VALUES
('123456789', 'Coki', 1, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1600012847199', 'Neali', 1, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1600091644099', 'Beach', 1, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1600102897799', 'Webster', 33, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1601070295199', 'Cain', 30, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1602031562599', 'Berry', 13, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1602082915099', 'Palmer', 31, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1603060805199', 'Talley', 39, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1606022377399', 'Dotson', 15, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1606032591599', 'Becker', 2, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1606051710899', 'Mckay', 21, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1606100985699', 'Rich', 40, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1606121077899', 'Vega', 6, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1607091481699', 'English', 37, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1607120740299', 'Hanson', 39, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1609060198799', 'Hutchinson', 14, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1610022519099', 'Ochoa', 18, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1612061117599', 'Manning', 5, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1613102313699', 'Wyatt', 7, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1614032054999', 'Torres', 16, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1614032141599', 'Hammond', 11, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1617030547699', 'Jensen', 1, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1624011710999', 'Cooke', 7, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1624051883999', 'Walls', 9, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1625061659099', 'Chen', 6, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1627120950399', 'Bird', 41, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1630022397599', 'Thomas', 22, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1630101806899', 'Carey', 2, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1632051296499', 'Mccarthy', 15, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1632100195099', 'Richardson', 22, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1633092241999', 'Potter', 28, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1633092810199', 'Fry', 27, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1634031672099', 'Sullivan', 8, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1636041919599', 'Knapp', 4, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1637080360099', 'Maldonado', 40, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1637110261099', 'Watson', 31, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1639122669499', 'Carpenter', 34, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1640111701699', 'Sanford', 42, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1641032811399', 'Peck', 3, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1642082007199', 'Fuentes', 31, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1642082810199', 'Hamilton', 7, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1643102194599', 'Edwards', 5, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1646052894199', 'Cole', 32, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1646071579199', 'Owen', 7, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1649041908599', 'Dunlap', 34, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1649070847299', 'Maxwell', 13, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1651070154999', 'Sutton', 11, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1651082373299', 'Foster', 24, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1652010922899', 'Hickman', 33, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1652020250699', 'Rice', 6, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1654093082999', 'Strong', 20, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1655061835299', 'Barlow', 25, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1658052147299', 'Mckee', 15, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1661032544499', 'Ballard', 28, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1661041958399', 'Porter', 17, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1661061861399', 'Fitzgerald', 33, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1662010739199', 'Bell', 15, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1663052235799', 'Shaffer', 34, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1663052380099', 'Hicks', 17, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1667102811299', 'Shepherd', 9, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1668031953499', 'Sellers', 19, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1668040549299', 'Martinez', 13, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1668100674299', 'Hahn', 28, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1669010234399', 'Curtis', 15, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1669070819099', 'Haley', 34, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1670072618799', 'Cote', 27, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1671060429499', 'Huff', 5, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1671112123899', 'Williamson', 20, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1672040347499', 'Francis', 33, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1672061625599', 'Deleon', 17, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1672062004999', 'Oneill', 22, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1672091649999', 'Monroe', 36, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1673050260199', 'Malone', 38, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1674042119299', 'Rios', 27, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1674060755399', 'Cote', 5, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1678061252199', 'Solomon', 29, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1680042832799', 'Marks', 8, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1681091720599', 'Carey', 32, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1682091401799', 'Perry', 1, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1682091504899', 'Gardner', 3, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1683121877499', 'Copeland', 2, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1684112675699', 'Guerrero', 20, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1685060499499', 'Waters', 18, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1685071710199', 'Schmidt', 1, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1685101391499', 'Callahan', 21, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1687030892299', 'Witt', 13, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1687030962699', 'Moon', 24, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1688110377699', 'Robinson', 8, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1689010861099', 'Preston', 26, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1689102767599', 'Cross', 13, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1692122553799', 'Estes', 6, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1693010314299', 'England', 27, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1693011404799', 'Middleton', 25, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1693032008199', 'George', 32, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1693091374899', 'Hess', 29, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1695030353299', 'Duncan', 28, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1695111397399', 'Allison', 41, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1697040273299', 'Weber', 17, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1697042541099', 'Gill', 17, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1697063031299', 'Garrison', 39, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee'),
('1697102101899', 'Poole', 3, 'Siswa', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_sts` int(11) NOT NULL,
  `nama_sts` varchar(30) NOT NULL,
  `ket_sts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_sts`, `nama_sts`, `ket_sts`) VALUES
(1, 'Kepala Sekolah', ''),
(2, 'Guru Mapel', ''),
(3, 'Waka Kurikulum', ''),
(4, 'Waka Keiswaan', ''),
(5, 'Ketua Kompentensi Keahlian', ''),
(6, 'Guru BP/BK', ''),
(7, ' Waka Humas', ''),
(8, 'Waka Sarpras', ''),
(9, 'Ka. Sub Bag. TU', ''),
(10, 'Staf TU', ''),
(11, 'Bag. Kebersihan', ''),
(12, 'SATPAM', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD KEY `nisn_1` (`nisn`) USING BTREE;

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`) USING BTREE,
  ADD KEY `sts_id` (`sts_id`);

--
-- Indeks untuk tabel `jam_absen`
--
ALTER TABLE `jam_absen`
  ADD PRIMARY KEY (`id_jam_absen`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_sts`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jam_absen`
--
ALTER TABLE `jam_absen`
  MODIFY `id_jam_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_sts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD CONSTRAINT `absen_guru_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD CONSTRAINT `absen_siswa_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`sts_id`) REFERENCES `status` (`id_sts`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
