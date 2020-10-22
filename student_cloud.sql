-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2020 pada 12.25
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_cloud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kampus`
--

CREATE TABLE `kampus` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `kota_kab` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `warna` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `id_kampus` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jurusan` varchar(200) DEFAULT NULL,
  `fakultas` varchar(200) DEFAULT NULL,
  `angkatan` varchar(30) DEFAULT NULL,
  `basic_storage` float DEFAULT NULL,
  `addon_storage` float DEFAULT NULL,
  `status_basic` varchar(30) DEFAULT NULL,
  `status_addon` varchar(30) DEFAULT NULL,
  `registered_basic` date DEFAULT NULL,
  `activated_basic` date DEFAULT NULL,
  `activated_addon` date DEFAULT NULL,
  `used_storage` float DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `payment_id` varchar(45) DEFAULT NULL,
  `payment_name` varchar(70) DEFAULT NULL,
  `invoice_id` varchar(70) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kampus`
--
ALTER TABLE `kampus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kampus`
--
ALTER TABLE `kampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
