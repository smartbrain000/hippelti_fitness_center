-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2023 pada 08.53
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hippelti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_absen`
--

CREATE TABLE `t_absen` (
  `id_absen` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_alat`
--

CREATE TABLE `t_alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `fungsi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_alat`
--

INSERT INTO `t_alat` (`id_alat`, `nama_alat`, `foto`, `jumlah`, `fungsi`) VALUES
(3, 'Ez Curl Bar', 'IMG20211229132425.jpg', 1, 'Ez Curl Bar merupakan alat fitness yang lebih pendek daripada barbell dan mempunyai sudut pada stick (batang) untuk menempatkan posisi kedua tangan kita. \r\nFungsi alat fitness ez curl bar adalah untuk melatih otot lengan bicep dan tricepmu.'),
(4, 'Dumbbell ', 'IMG20211229132446.jpg', 47, 'Dumbbell merupakan barbell dengan ukuran lebih pendek. Berukuran 10 sampai 15 inchi.\r\n Alat fitness dumbbell ini adalah untuk melatih hampir semua otot besar dan otot kecil tubuhmu, khususnya otot bagian lenganmu.'),
(5, 'Bench abdominal ', 'IMG20211229132242.jpg', 1, 'Bench abdominal adalah bench jenis decline bench yang berfungsi untuk melatih otot perutmu. \r\nMempunyai roller yang akan membantumu menggantungkan kaki sehingga kamu tidak akan terjatuh saat melakukan latihan.'),
(6, 'Weight plates ', 'IMG20211229132149.jpg', 2, 'Alat fitness weight plates adalah beban dengan bentuk cakram yang dibuat dari logam. \r\nWeight plates bisa digunakan untuk 2 hal yaitu digunakan sendiri untuk latihan, atau menambahkannya sebagai beban pada batang / bar barbell yang kosong.'),
(7, 'Static Bicycle', 'IMG20211229132259.jpg', 2, 'Sepeda statis merupakan alat fitness yang berfungsi untuk melatih otot kaki, alat ini digunakan untuk membakar lemak dan latihan cardio. \r\nKecepatan dan tekanan dalam menggowes bisa diatur sesuai dengan kemampuan tubuhmu.'),
(8, 'Leg Press Machine', 'IMG202112291321031.jpg', 1, 'Alat fitness leg press machine digunakan untuk latihan leg press dan berfungsi untuk membentuk otot paha dan otot betismu. \r\nKamu bisa menambahkan tingkat kesulitan latihan leg press dengan mengatur beban sesuai dengan kemampuanmu.'),
(9, 'Treadmill', 'IMG20211229132324.jpg', 3, 'Treadmill adalah alat yang umum berada di gym center. \r\nBerfungsi untuk membakar lemak tubuh. Alat ini digunakan untuk latihan jalan ataupun lari ditempat. Kecepatan bisa kamu atur sendiri pada monitor yang ada pada alat tersebut.'),
(10, 'Barbell Machine', 'IMG20211229132352.jpg', 1, 'Alat fitness barbell machine berfungsi untuk menopang tubuh agar gerakan latihan tetap stabil saat mengangkat barbell sehingga bisa meminimalisir terjadinya cedera otot. '),
(11, 'Peck Deck Fly', 'IMG20211229132503.jpg', 1, 'Alat fitness peck deck fly berfungsi untuk melakukan gerakan isolasi untuk otot dadamu.  Membantu mengembangkan ukuran dan definisi otot dada bagian tengah.'),
(12, 'Lat Pulldown Machine', 'IMG20211229132125.jpg', 2, 'Alat fitness lat pulldown machine berfungsi untuk membentuk otot-otot punggung dimana otot-otot ulama yang bekerja adalah otot latissimus dorsi, otot teres major, dan otot posterior deltoid. \r\n Otot yang dibentuk menggunakan alat lat pulldown machine diantaranya adalah : Otot trapezius, Otot Rhomboids, Otot Teres Major, Otot Erector Spinae.'),
(13, 'Cable Crossover Machine', 'IMG202112291321251.jpg', 2, 'Alat fitness cable crossover machne berfungsi untuk membentuk otot dada, dan otot bahumu.'),
(14, 'Bench', 'IMG20211229132620.jpg', 1, 'Bench adalah tempat duduk yang sangat fleksibel,manfaat alat fitness bench adalah untuk melatih otot dada, bahu, back, dan otot lainnya. \r\nBench terdiri dari 3 jenis yaitu bench datar ( flat bench ), bench menurun ( decline bench ), dan bench menanjak ( incline bench ).'),
(15, 'Tricep bar', 'IMG20211229132159.jpg', 1, 'Alat ini merupakan alat dengan bentuk oval dengan dua tempa pegangan berbentuk parallel, sama halnya dengan EZ curl bar.\r\n\r\nAnda juga masih bisa menggunakan alat ini untuk bisa melatih otot dari berbagai sudut. Alat ini lebih difokuskan untuk melatih otot tricepmu.'),
(16, 'Eliptical Machine', 'IMG20211229132313.jpg', 1, 'Mesin ini merepresentasikan cara kita berjalan. Dengan eliptical machine ini kita melatih otot kaki yang biasa kita gunakan untuk berjalan dengan cara menambahkan tekanan yang harus kita lakukan lebih dari ketika kita berjalan biasa.'),
(17, 'Shoulder press machine', 'IMG20211229132225.jpg', 1, 'Menggunakan alat ini akan memaksa bahu kita untuk menekan kebawah yang mana sangat sulit dilakukan tanpa menggunakan alat ini untuk melatih otot bahu.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_booking`
--

CREATE TABLE `t_booking` (
  `id_booking` int(11) NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL,
  `waktu_booking` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_komentar`
--

CREATE TABLE `t_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_parent_komentar` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `komentar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `id_member` varchar(40) CHARACTER SET utf8 NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_member`
--

CREATE TABLE `t_member` (
  `id_member` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_kedaluarsa` date NOT NULL,
  `no_telp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_qr` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_member`
--

INSERT INTO `t_member` (`id_member`, `id_user`, `nama`, `foto`, `tempat_lahir`, `tanggal_lahir`, `jk`, `status`, `tgl_daftar`, `tgl_kedaluarsa`, `no_telp`, `no_qr`, `email`, `alamat`, `qr_code`) VALUES
(1, 1, 'Irna', 'user_avatar.png', 'Majalengka', '2000-10-22', 'P', 1, '2021-06-01', '2030-10-23', '091823217489', '180297', NULL, 'Weragati', ''),
(19, 2, 'elga', 'user_avatar4.png', 'Majalengka', '1999-12-06', 'P', 1, '2022-01-20', '2022-11-20', '087652098187', '229919', 'elga@gmail.com', 'weragati', '229919.png'),
(20, 12, 'iman', 'user_avatar2.png', 'Majalengka', '2000-03-01', 'L', 1, '2021-12-17', '2022-01-17', '087113972076', '220020', 'iman31@gmail.com', 'rajagaluh', '220020.png'),
(22, 14, 'ines', 'user_avatar3.png', 'Majalengka', '1999-09-07', 'P', 1, '2022-02-03', '2022-03-03', '083198073261', '229922', 'ines@gmail.com', 'sindang', 'RxIjDlZBAHGyETvwKafnimte7qhcVku93zMrPS6s.png'),
(23, 15, 'tedi', 'user_avatar1.png', 'Majalengka', '1998-12-11', 'L', 1, '2022-01-28', '2022-02-28', '082775893205', '229823', 'teditedi@gmail.com', 'weragati', '229823.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pemasukan`
--

CREATE TABLE `t_pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `sumber` varchar(50) NOT NULL,
  `nama_pemasukan` varchar(50) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `jml_pemasukan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pemasukan`
--

INSERT INTO `t_pemasukan` (`id_pemasukan`, `jenis`, `sumber`, `nama_pemasukan`, `tgl_pemasukan`, `jml_pemasukan`) VALUES
(8, 'Member', 'Haris Sakurudin', 'Paket Membership 1 Bulan', '2022-10-09', 150000),
(11, 'Pengunjung', 'HARIS SAKURUDIN', 'Registrasi', '2022-11-05', 150000),
(12, 'Member', 'MUHAMAD HIKAYAT', 'Registrasi ', '2022-11-05', 150000),
(13, 'Member', 'RIZKI ALAM RAMDHANI', 'Registrasi ', '2022-11-05', 150000),
(14, 'Member', 'Salahuddin Nurul Fahmi', 'Registrasi ', '2022-11-05', 150000),
(15, 'Member', 'Yuda Suparmanto', 'Registrasi ', '2022-11-06', 150000),
(16, 'Member', 'Afif Surya Ramadhan', 'Registrasi ', '2022-11-05', 150000),
(17, 'Member', 'Dede Riska Amalia', 'Registrasi ', '2022-11-05', 150000),
(18, 'Member', 'Raihan Nurfarisi', 'Registrasi ', '2022-11-05', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengeluaran`
--

CREATE TABLE `t_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `nama_pengeluaran` varchar(50) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jml_pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pengeluaran`
--

INSERT INTO `t_pengeluaran` (`id_pengeluaran`, `nama_pengeluaran`, `tgl_pengeluaran`, `jml_pengeluaran`) VALUES
(1, 'GAJI KARYAWAN', '2022-08-06', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_qrcode`
--

CREATE TABLE `t_qrcode` (
  `id` int(11) NOT NULL,
  `qrcode` varchar(255) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `expired` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_qrcode`
--

INSERT INTO `t_qrcode` (`id`, `qrcode`, `nilai`, `expired`) VALUES
(2, 'vVEsm3AoGOcRYKd6M50wSIJ9zpyxDN1PtXeLTUqi.png', '220020', '1678087628'),
(4, 'jrquQEPvSCLdDiIsk5VMz78XAgNTo2UYRwGfZe3m.png', '229919', '1678087658'),
(5, 'tw1Ws5YHK2yBC4hURlfo8jXvicF076DqVdaTOGbN.png', '229823', '1678087662'),
(6, 'KjuQIi4knthypwFD3XbqH812ZRA6NS95fLxeEmYT.png', '229922', '1678087665'),
(7, 'QKlPdJZsgF1qe5U0zrGEfjCOImXtpSWY2n7oNvDk.png', '180297', '1678090516');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_status_alat`
--

CREATE TABLE `t_status_alat` (
  `id_status_alat` varchar(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `status_alat` enum('Baik','Rusak','Sedang Diperbaiki') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_status_alat`
--

INSERT INTO `t_status_alat` (`id_status_alat`, `id_alat`, `status_alat`) VALUES
('1', 4, 'Rusak'),
('asd', 4, 'Sedang Diperbaiki'),
('dsa', 4, 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'member', 'aa08769cdcb26674c6706093503ff0a3', 2),
(12, '220020', 'c0f780349b9b117c96813b1e87756038', 2),
(14, '229922', 'b9d82f4ccc916ff0812193e953f8118d', 2),
(15, '229823', 'dc72272d66994c0f2e81e1fb55c434a4', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_absen`
--
ALTER TABLE `t_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `t_alat`
--
ALTER TABLE `t_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `t_booking`
--
ALTER TABLE `t_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_member` (`id_member`);

--
-- Indeks untuk tabel `t_komentar`
--
ALTER TABLE `t_komentar`
  ADD PRIMARY KEY (`id_komentar`) USING BTREE;

--
-- Indeks untuk tabel `t_member`
--
ALTER TABLE `t_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `t_pemasukan`
--
ALTER TABLE `t_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `t_pengeluaran`
--
ALTER TABLE `t_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `t_qrcode`
--
ALTER TABLE `t_qrcode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_status_alat`
--
ALTER TABLE `t_status_alat`
  ADD PRIMARY KEY (`id_status_alat`),
  ADD KEY `id_alat` (`id_alat`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_absen`
--
ALTER TABLE `t_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `t_alat`
--
ALTER TABLE `t_alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `t_booking`
--
ALTER TABLE `t_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `t_komentar`
--
ALTER TABLE `t_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `t_member`
--
ALTER TABLE `t_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `t_pemasukan`
--
ALTER TABLE `t_pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `t_pengeluaran`
--
ALTER TABLE `t_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_qrcode`
--
ALTER TABLE `t_qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
