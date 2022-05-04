-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 03:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_klasifikasi`
--

CREATE TABLE `tbl_hasil_klasifikasi` (
  `id_hk` int(10) NOT NULL,
  `id_testing` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kelas` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pekerjaan_ibu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `penghasilan_ayah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `penghasilan_ibu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggungan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `transportasi` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testing`
--

CREATE TABLE `tbl_testing` (
  `id_testing` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `penghasilan_ayah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `penghasilan_ibu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggungan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `transportasi` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status_testing` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_testing`
--

INSERT INTO `tbl_testing` (`id_testing`, `nama`, `kelas`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `tanggungan`, `transportasi`, `status_testing`) VALUES
(23, 'ERIKA RAHMAT APRIANI ', 'XI BAHASA 1', 'Petani', 'Dagang', '1,000,000', '2,000,000', '5 orang ', 'Jalan kaki', ''),
(24, 'SELENA RATU', 'X MIPA 2', 'Guru Honor ', 'Pegawai swasta ', '1,500,000', '2,000,000', '2 orang', 'Angkutan umum', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `id_training` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `penghasilan_ayah` varchar(50) NOT NULL,
  `penghasilan_ibu` varchar(50) NOT NULL,
  `tanggungan` varchar(50) NOT NULL,
  `transportasi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`id_training`, `nama`, `kelas`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `tanggungan`, `transportasi`, `status`) VALUES
(106, 'IRENSIANA SAMA BILI', 'XI MIPA 2', 'Guru Honor', 'Sales', '1,200,000', '1,000,000', '3 orang', 'Jalan kaki', 'Layak'),
(107, 'KLAUDIA TEI NGGORO', 'XI MIPA 4', 'Dagang', 'IRT', '2,000,000', '1,000,000', '5 orang', 'Jalan kaki', 'Layak'),
(108, 'NATALIA RADJO', 'XI IPS 2', 'Petani', 'Petani', '2,000,000', '1,000,000', '4 orang', 'Jalan kaki', 'Layak'),
(109, 'ALI BABA', 'X MIPA 1', 'Karyawan', 'Sales', '2,000,000', '1,000,000', '4 orang', 'Jalan kaki', 'Layak'),
(110, 'SUPRIONO', 'XI IPS 1', 'Petani', 'Dagang', '2,500,000', '1,500,000', '1 orang', 'Angkutan umum', 'Tidak Layak'),
(111, 'YOHANA SITA', 'XI BAHASA 1', 'Sales', 'Guru Honor', '2,500,000', '2,000,000', '2 orang', 'Angkutan umum', 'Tidak Layak'),
(112, 'ALFREDA SOGE', 'XI MIPA 2', 'Guru Honor', 'Pegawai swasta', '1,700,000', '2,000,000', '4 orang', 'Jalan kaki', 'Tidak Layak'),
(113, 'ELISABETH LUSITANIA WENI', 'X IPS 2', 'Dagang', 'Pegawai swasta', '1,500,000', '1,500,000', '4 orang', 'Jalan kaki', 'Layak'),
(114, 'GILBERTUS AVONSIUS DAPA', 'X MIPA 2', 'Buruh', 'IRT', '1,200,000', '1,000,000', '4 orang', 'Jalan kaki', 'Layak'),
(115, 'MARIANUS RIKU', 'XI BAHASA 2', 'Karyawan', 'Dagang', '2,000,000', '2,500,000', '1 orang', 'Angkutan umum', 'Tidak Layak'),
(116, 'SOFIA ANTONIA UBE', 'XI BAHASA 2', 'Dagang', 'Sales', '1,200,000', '2,000,000', '4 orang', 'Jalan kaki', 'Tidak Layak'),
(117, 'EMERENSIANA TOLA', 'XI IPS 4', 'PNS', 'Dagang', '2,500,000', '2,500,000', '2 orang', 'Angkutan umum', 'Tidak Layak'),
(118, 'ELISABETH RENITA SORO', 'X BAHASA 2', 'Sopir', 'Dagang', '1,200,000', '1,500,000', '4 orang', 'Jalan kaki', 'Layak'),
(119, 'ASTIN SONGA', 'XI BAHASA 4', 'PNS', 'Petani', '2,000,000', '1,500,000', '5 orang', 'Angkutan umum', 'Layak'),
(120, 'GABRIELA ANITA ROJA', 'XII IPS 3', 'Karyawan', 'Guru Honor', '1,500,000', '1,500,000', '2 orang', 'Jalan kaki', 'Layak'),
(121, 'PUTRA MONEK', 'XII IPS 3', 'Buruh', 'Dagang', '1,500,000', '1,200,000', '3 orang', 'Angkutan umum', 'Tidak Layak'),
(122, 'SUSANTI WULA', 'XI MIPA 5', 'Sopir', 'IRT', '2,000,000', '1,500,000', '1 orang', 'Jalan kaki', 'Tidak Layak'),
(123, 'KRISANTUS REMA RIWU', 'XI  BAHASA 1', 'Petani', 'Guru Honor', '1,500,000', '1,250,000', '2 orang', 'Jalan kaki', 'Layak'),
(124, 'SUTIKNO', 'XI IPS 1', 'Nelayan', 'Sales', '1,500,000', '1,700,000', '1 orang', 'Jalan kaki', 'Tidak Layak'),
(125, 'ANDREAS MATUTINA', 'XI BAHASA 2', 'Nelayan', 'Sales', '1,200,000', '1,500,000', '1 orang', 'Angkutan umum', 'Layak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `id_penduduk` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `tgl_registrasi` varchar(50) NOT NULL,
  `status_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_penduduk`, `nama_user`, `username`, `password`, `level`, `tgl_registrasi`, `status_user`) VALUES
('USR001', '', 'Chris Sony', 'Lurah', '1234', 'Lurah', '2020-10-26', ''),
('USR002', '', 'Acen', 'admin', '1234', 'Admin', '2021-09-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vp`
--

CREATE TABLE `tbl_vp` (
  `id_variabel` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_variabel` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vp`
--

INSERT INTO `tbl_vp` (`id_variabel`, `nama_variabel`) VALUES
('VRP001', 'Umur'),
('VRP002', 'Jumlah Tanggungan'),
('VRP003', 'Pekerjaan'),
('VRP004', 'Pendidikan'),
('VRP005', 'Pendapatan'),
('VRP006', 'Status Rumah'),
('VRP007', 'Bahan Bakar'),
('VRP008', 'Sumber Air'),
('VRP009', 'Daya Listrik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_hasil_klasifikasi`
--
ALTER TABLE `tbl_hasil_klasifikasi`
  ADD PRIMARY KEY (`id_hk`);

--
-- Indexes for table `tbl_testing`
--
ALTER TABLE `tbl_testing`
  ADD PRIMARY KEY (`id_testing`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`id_training`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_vp`
--
ALTER TABLE `tbl_vp`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hasil_klasifikasi`
--
ALTER TABLE `tbl_hasil_klasifikasi`
  MODIFY `id_hk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_testing`
--
ALTER TABLE `tbl_testing`
  MODIFY `id_testing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
