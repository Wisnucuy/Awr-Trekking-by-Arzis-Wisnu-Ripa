-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 12:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awr_trekking`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id` int(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `id_user`, `nama`, `alamat`, `tanggal`) VALUES
(5, 1, 'Muhamad Maulana Riski', 'Jambi Selatan', '2024-08-17'),
(6, 7, 'Ripa Bagaskara ', 'Jalan Lirik ', '2025-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `paket_wisata` varchar(255) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `jumlah_peserta` int(12) NOT NULL,
  `jumlah_hari` int(12) NOT NULL,
  `akomodasi` bit(1) NOT NULL,
  `transportasi` bit(1) NOT NULL,
  `service` bit(1) NOT NULL,
  `harga_paket` varchar(255) NOT NULL,
  `total_tagihan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `nama`, `phone`, `paket_wisata`, `tanggal_pesan`, `jumlah_peserta`, `jumlah_hari`, `akomodasi`, `transportasi`, `service`, `harga_paket`, `total_tagihan`) VALUES
(16, 1, 'Muhamad Maulana Riski oke', '088706701145', 'Kerinci Mount Package', '2024-08-18', 1, 3, b'1', b'1', b'1', '2700000', '8100000'),
(17, 7, 'Ripa Bagaskara ', '081918061195', 'Rinjani Mount Package', '2025-02-22', 3, 2, b'0', b'0', b'1', '5999000', '35994000'),
(18, 9, 'Ripa Bagaskara ', '081918061195', 'Rinjani Mount Package', '2025-02-25', 2, 1, b'0', b'0', b'1', '5999000', '11998000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Maulana', '$2y$10$kGKEeKKLdsb/oIUZgKwyyu/2KUm.YzVZsSjnaHC5N0z/dT/NFQ19.', 'user', '2024-08-16 19:25:35'),
(7, 'admin', '$2y$10$L0HNa6DyJDq2lXPEwuLLUucwnd4ViBdgs/pHeLBZPOWDjjj4Qs7kO', 'admin', '2024-08-16 22:08:23'),
(9, 'bagas', '$2y$10$k9tsAnkAwyqy6T1OCkXDxOgXB9p.flgH7eJqdeHg6V5Nqo/q/pSGu', 'user', '2025-02-23 11:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
