-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2020 at 07:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipsrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `alkes`
--

CREATE TABLE `alkes` (
  `id` int(11) NOT NULL,
  `nama_alat` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `model` varchar(128) NOT NULL,
  `nomorseri` int(64) NOT NULL,
  `ruangan` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alkes`
--

INSERT INTO `alkes` (`id`, `nama_alat`, `merk`, `model`, `nomorseri`, `ruangan`, `date_created`) VALUES
(2, 'HP', 'Oddo', 'A6s', 289, 'Mawar', 1589183891);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `kerusakan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `kerusakan`) VALUES
(1, 'Alat Kesehatan'),
(2, 'IT'),
(3, 'Listrik'),
(4, 'Air'),
(5, 'Gedung'),
(6, 'Bangunan');

-- --------------------------------------------------------

--
-- Table structure for table `forward_pengaduan`
--

CREATE TABLE `forward_pengaduan` (
  `id_forward` int(11) NOT NULL,
  `id_pengaduan` int(11) UNSIGNED NOT NULL,
  `id_teknisi` int(11) UNSIGNED NOT NULL,
  `status` enum('Sedang Diteruskan','Sedang Diperbaiki','Sudah Diperbaiki','Ditolak','Dikembalikan','Ditunda') NOT NULL,
  `alasan_penolakan` varchar(256) NOT NULL,
  `edit_alasan_penolakan` varchar(256) NOT NULL,
  `alasan_pengembalian` varchar(256) NOT NULL,
  `kendala_kerusakan` varchar(256) NOT NULL,
  `edit_kendala_kerusakan` varchar(256) NOT NULL,
  `tanggal_forward` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forward_pengaduan`
--

INSERT INTO `forward_pengaduan` (`id_forward`, `id_pengaduan`, `id_teknisi`, `status`, `alasan_penolakan`, `edit_alasan_penolakan`, `alasan_pengembalian`, `kendala_kerusakan`, `edit_kendala_kerusakan`, `tanggal_forward`) VALUES
(3, 4, 21, 'Ditunda', '', '', '', 'Ada alat yang perlu dibeli dulu pak', '', '2020-11-08 06:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `history_lappem`
--

CREATE TABLE `history_lappem` (
  `id` int(11) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `nama_alat` varchar(128) NOT NULL,
  `ruangan` varchar(128) NOT NULL,
  `suhu` int(4) NOT NULL,
  `kelembaban` int(4) NOT NULL,
  `tegangan` varchar(16) NOT NULL,
  `daya_semu` varchar(16) NOT NULL,
  `daya_aktif` varchar(16) NOT NULL,
  `daya_reaktif` varchar(16) NOT NULL,
  `kondisi_fisik` varchar(16) NOT NULL,
  `ket_kondisi_fisik` varchar(10000) NOT NULL,
  `date_created` date NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_lappem`
--

INSERT INTO `history_lappem` (`id`, `user_id`, `nama_alat`, `ruangan`, `suhu`, `kelembaban`, `tegangan`, `daya_semu`, `daya_aktif`, `daya_reaktif`, `kondisi_fisik`, `ket_kondisi_fisik`, `date_created`, `expired`) VALUES
(1, '3', 'kulkas', 'ac', -12, 212, '21', '12', '2131', '321', 'Bagus', 'sd', '2020-04-18', '2020-05-18'),
(2, '4', 'korek', 'baru', 32, 32, '32', '32', '32', '32', 'Rusak', 'rusak', '2020-04-18', '2020-05-18'),
(3, '3', 'Container', 'VIP', 54, 32, '28', '28', '28', '28', 'Kurang Bagus', 'Terlalu panas', '2020-05-17', '2020-05-21'),
(4, '4', 'Sabun Cuci', 'Kamar Mandi', 34, 34, '3', '34', '34', '34', 'Bagus', 'mantap', '2020-05-18', '2020-05-23'),
(5, '3', 'HP3', 'Cadangan', 32, 32, '32', '32', '32', '32', 'Bagus', 'Bagus', '2020-05-23', '2020-05-22'),
(6, '4', 'Mesin Cuci', 'Kebersihan', 20, 23, '20', '15', '10', '5', 'Bagus', 'Kondisinya bagus', '2020-06-06', '2020-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `history_pengaduan`
--

CREATE TABLE `history_pengaduan` (
  `id` int(11) NOT NULL,
  `nama_pengadu` varchar(64) NOT NULL,
  `nip` varchar(32) NOT NULL,
  `brg` varchar(32) NOT NULL,
  `ruangan` varchar(64) NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(256) NOT NULL,
  `status` varchar(16) NOT NULL,
  `alasan_penolakan` text NOT NULL,
  `edit_alasan_penolakan` text NOT NULL,
  `alasan_pengembalian` text NOT NULL,
  `kendala_kerusakan` text NOT NULL,
  `edit_kendala_kerusakan` text NOT NULL,
  `kerusakan` varchar(64) NOT NULL,
  `nama_teknisi` varchar(64) NOT NULL,
  `lvl_teknisi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_pengaduan`
--

INSERT INTO `history_pengaduan` (`id`, `nama_pengadu`, `nip`, `brg`, `ruangan`, `tgl`, `ket`, `status`, `alasan_penolakan`, `edit_alasan_penolakan`, `alasan_pengembalian`, `kendala_kerusakan`, `edit_kendala_kerusakan`, `kerusakan`, `nama_teknisi`, `lvl_teknisi`) VALUES
(1, 'Jundi Salim', '1232', 'Kulkas', 'Poli', '2020-11-04', 'sdsds', 'Ditolak', 'Saya sedang sakit pak', 'Silahkan mencoba beberapa hari lagi karena si teknisi dalam keadaan sakit\r\nMohon maaf atas ketidaknyamanannya, terimakasih.', 'saya sudah menunggu 4 hari, saya harap si teknisi sudah sehat dan bisa memperbaiki kerusakan', '', '', 'Air', 'Uki', 'Teknisi Kulkas');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `lvl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `lvl`) VALUES
(1, 'Teknisi Alat Kesehatan'),
(2, 'Teknisi IT'),
(3, 'Teknisi Listrik'),
(4, 'Teknisi Air'),
(5, 'Teknisi Gedung'),
(6, 'Teknisi Bangunan'),
(7, 'Pegawai Rekam Medis'),
(8, 'Pegawai Poli Anak');

-- --------------------------------------------------------

--
-- Table structure for table `kendala`
--

CREATE TABLE `kendala` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kendala` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendala`
--

INSERT INTO `kendala` (`id`, `nama`, `kendala`, `ruangan`, `tgl`, `ket`) VALUES
(1, 'Anto', 'komputer', 'rekam medis', '2020-06-01', 'LCD harus diganti');

-- --------------------------------------------------------

--
-- Table structure for table `lap_pemeliharaan`
--

CREATE TABLE `lap_pemeliharaan` (
  `id` int(11) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `nama_alat` varchar(128) NOT NULL,
  `ruangan` varchar(128) NOT NULL,
  `suhu` int(4) NOT NULL,
  `kelembaban` int(4) NOT NULL,
  `tegangan` varchar(16) NOT NULL,
  `daya_semu` varchar(16) NOT NULL,
  `daya_aktif` varchar(16) NOT NULL,
  `daya_reaktif` varchar(16) NOT NULL,
  `kondisi_fisik` varchar(16) NOT NULL,
  `ket_kondisi_fisik` varchar(10000) NOT NULL,
  `date_created` date NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `kerusakan_id` int(11) NOT NULL,
  `brg` varchar(128) NOT NULL,
  `ruangan` varchar(128) NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `id_user`, `nama`, `nip`, `kerusakan_id`, `brg`, `ruangan`, `tgl`, `ket`) VALUES
(4, 2, 'Jundi Salim', '11232323', 1, 'Stetoskop', 'Poli', '2020-11-08', 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `lvl` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `lvl`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Administrator', 'Admin', 'casperghost860@gmail.com', 'Admin', 'boruto.jpg', '$2y$10$W8eyeOdxW5DC.KSIUB3XBuHgTnmc3b9ZcWaoSRB12qGx5LAHEwTKG', 1, 1, 1585829928),
(2, 'Jundi Salim', 'jundi', 'esportgamer2726@gmail.com', 'Kepala Rekam Medis', 'default.jpg', '$2y$10$DbKVJmQ8tbX8FaR9jz34Bu963oLT5/8C1SxKm.UUdxikyaPmE09Zi', 2, 1, 1603111616),
(13, 'Rendi', 'rendi', 'rendi@gmail.com', 'Pegawai Poli Anak', 'default.jpg', '$2y$10$TR0cTzVqMZh1PeinJH4ZuutXpTLxCn4Cstkt9wXK3xnFXB3qX4kv.', 2, 1, 1591540079),
(20, 'ibnu', 'ibnu', 'ibnu@gmail.com', 'Teknisi Air', 'default.jpg', '$2y$10$SNCkFBan.bKSA.qBXCk4B.98WywDIOFnUlBQTDgLEmcyHRCY4bwH.', 3, 1, 1604030310),
(21, 'Uki', 'uki', 'uki@gmail.com', 'Teknisi Kulkas', 'default.jpg', '$2y$10$bP3C05ArbPDeTnRl4CYMQ.tVUCvxLfClf9YLu6amSD7AKgVQq27Li', 3, 1, 1604302813);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 3),
(6, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Menu'),
(3, 'Pegawai'),
(4, 'Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pegawai'),
(3, 'Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Akses Manajemen', 'admin/akses', 'fas fa-fw fa-user-cog', 1),
(3, 3, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(4, 3, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(5, 3, 'Ganti Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(6, 3, 'Pengaduan Kerusakan', 'user/pengaduanKer', 'fas fa-fw fa-file', 1),
(11, 4, 'Profil Saya', 'teknisi', 'fas fa-fw fa-user', 1),
(14, 4, 'Ubah Profil', 'teknisi/edit', 'fas fa-fw fa-user-edit', 1),
(15, 4, 'Ganti Password', 'teknisi/changepassword', 'fas fa-fw fa-key', 1),
(16, 4, 'Form Kendala', 'teknisi/kendala', 'fas fa-fw fa-clipboard-list', 1),
(18, 2, 'Menu Manajemen', 'menu', 'fas fa-fw fa-folder', 1),
(19, 2, 'Submenu Manajemen', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(30, 1, 'Akun Manajemen', 'admin/akun', 'fas fa-fw fa-users', 1),
(32, 1, 'Laporan Pengaduan', 'admin/pengaduan', 'fas fa-fw fa-folder', 1),
(33, 3, 'Pengaduan Saya', 'user/pengaduan_saya', 'fas fa-fw fa-folder', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'esportgamer2726@gmail.com', 'twnodeHZpcYjTjpGZPhs4/R8TIT1u/z1rzr90quMqik=', 1588314645),
(4, 'test@gmail.com', '0A52YsLuOId5w4kuBeISAeT2LMNaMnDW0bMKkxixhrY=', 1588406208);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alkes`
--
ALTER TABLE `alkes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forward_pengaduan`
--
ALTER TABLE `forward_pengaduan`
  ADD PRIMARY KEY (`id_forward`),
  ADD KEY `id_pengaduan` (`id_pengaduan`,`id_teknisi`);

--
-- Indexes for table `history_lappem`
--
ALTER TABLE `history_lappem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_pengaduan`
--
ALTER TABLE `history_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendala`
--
ALTER TABLE `kendala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lap_pemeliharaan`
--
ALTER TABLE `lap_pemeliharaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alkes`
--
ALTER TABLE `alkes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forward_pengaduan`
--
ALTER TABLE `forward_pengaduan`
  MODIFY `id_forward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_lappem`
--
ALTER TABLE `history_lappem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_pengaduan`
--
ALTER TABLE `history_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kendala`
--
ALTER TABLE `kendala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lap_pemeliharaan`
--
ALTER TABLE `lap_pemeliharaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
