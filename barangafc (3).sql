-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2024 at 11:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangafc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(255) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama`) VALUES
('4006381333931', 'Sop Subarashi'),
('4006381333932', 'Utsukushhii');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jumlah_barang`
--

CREATE TABLE `tb_jumlah_barang` (
  `id_jumlahbarang` int NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `id_tempat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jumlah_barang`
--

INSERT INTO `tb_jumlah_barang` (`id_jumlahbarang`, `id_barang`, `jumlah`, `id_tempat`) VALUES
(10, '4006381333931', 20, 1),
(12, '4006381333932', 0, 1),
(14, '4006381333931', 20, 2),
(15, '4006381333932', 0, 2),
(16, '4006381333931', 10, 3),
(17, '4006381333932', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_tempat_asal` int NOT NULL,
  `jumlah` int NOT NULL,
  `pembeli` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int NOT NULL,
  `melalui` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_barang`, `id_tempat_asal`, `jumlah`, `pembeli`, `keterangan`, `id_user`, `melalui`, `tanggal`) VALUES
(5, '4006381333931', 1, 10, 'Dr. Rinaldi', 'Membeli SOP Subarashi dari gudang', 1, 'JNE', '2024-05-24 20:13:46'),
(6, '4006381333931', 3, 20, 'Dr. Rinaldi', 'Membeli 20 Sop Subarashi ', 4, 'JNE', '2024-05-24 20:20:18'),
(7, '4006381333931', 3, 10, 'Mr Donos', 'Membeli 10 sop', 1, 'JNE', '2024-05-24 22:51:00'),
(8, '4006381333931', 2, 10, 'Dr. Rinaldi', 'Membeli 10 sop', 2, 'JNE', '2024-05-25 22:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pindahbarang`
--

CREATE TABLE `tb_pindahbarang` (
  `id_pindah` int NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_tempat_asal` int NOT NULL,
  `id_tempat_tujuan` int NOT NULL,
  `jumlah` int NOT NULL,
  `keterangan` text,
  `id_user` int NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pindahbarang`
--

INSERT INTO `tb_pindahbarang` (`id_pindah`, `id_barang`, `id_tempat_asal`, `id_tempat_tujuan`, `jumlah`, `keterangan`, `id_user`, `tanggal`) VALUES
(16, '4006381333931', 6, 1, 100, 'Kiriman 100 buah Sop Subarashi dari Jepang', 1, '2024-05-24 20:11:26'),
(17, '4006381333931', 1, 2, 30, 'Kirim Sop Subarashi ke Gudang Makasar', 1, '2024-05-24 20:12:13'),
(18, '4006381333931', 1, 3, 40, 'Kirim Sop Subarashi ke Kantor Jakbar', 1, '2024-05-24 20:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int NOT NULL,
  `no_surat` int NOT NULL,
  `keterangan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

CREATE TABLE `tb_tempat` (
  `id_tempat` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`id_tempat`, `nama`, `alamat`) VALUES
(1, 'Gudang Jakarta', 'Jalan Kembangan Jakarta Barat'),
(2, 'Gudang Makasar', 'Jl. Borong Indah 10 Perumahan Graha Sefa Lestari No.1, Kassi-Kassi, Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90221'),
(3, 'Kantor Jakarta Barat', 'Kebun Sirih Jakarta Barat'),
(6, 'AFC Jepang', 'AFC Jepang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `role` int NOT NULL,
  `id_tempat` int NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `nama`, `role`, `id_tempat`, `password`) VALUES
(1, 'johanesalex774@gmail.com', 'Johannes Alexander Putra', 1, 1, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(2, 'hasan@gmail.com', 'Hasan Baraday', 2, 2, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(4, 'doni@gmail.com', 'Doni', 3, 3, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(5, 'azhar@gmail.com', 'Azhar', 2, 1, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_jumlah_barang`
--
ALTER TABLE `tb_jumlah_barang`
  ADD PRIMARY KEY (`id_jumlahbarang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_tempat_asal` (`id_tempat_asal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pindahbarang`
--
ALTER TABLE `tb_pindahbarang`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_tempat_asal` (`id_tempat_asal`),
  ADD KEY `id_tempat_tujuan` (`id_tempat_tujuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jumlah_barang`
--
ALTER TABLE `tb_jumlah_barang`
  MODIFY `id_jumlahbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pindahbarang`
--
ALTER TABLE `tb_pindahbarang`
  MODIFY `id_pindah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jumlah_barang`
--
ALTER TABLE `tb_jumlah_barang`
  ADD CONSTRAINT `tb_jumlah_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_jumlah_barang_ibfk_2` FOREIGN KEY (`id_tempat`) REFERENCES `tb_tempat` (`id_tempat`);

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_penjualan_ibfk_2` FOREIGN KEY (`id_tempat_asal`) REFERENCES `tb_tempat` (`id_tempat`),
  ADD CONSTRAINT `tb_penjualan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_pindahbarang`
--
ALTER TABLE `tb_pindahbarang`
  ADD CONSTRAINT `tb_pindahbarang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_pindahbarang_ibfk_2` FOREIGN KEY (`id_tempat_asal`) REFERENCES `tb_tempat` (`id_tempat`),
  ADD CONSTRAINT `tb_pindahbarang_ibfk_3` FOREIGN KEY (`id_tempat_tujuan`) REFERENCES `tb_tempat` (`id_tempat`),
  ADD CONSTRAINT `tb_pindahbarang_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tb_tempat` (`id_tempat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
