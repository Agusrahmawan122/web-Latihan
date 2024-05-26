-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2024 pada 03.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databaru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `nama`, `kelas`, `keterangan`, `tanggal`) VALUES
(1, 'agus', '10 tkj', 'hadir', '2024-04-21'),
(2, 'alen', '10 tkj', '', '2024-04-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_login`
--

CREATE TABLE `notifikasi_login` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `aktifitas` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notifikasi_login`
--

INSERT INTO `notifikasi_login` (`id`, `username`, `tanggal`, `waktu`, `aktifitas`) VALUES
(60, 'agus', '2024-04-19', '08:42:00', 'melakukan login'),
(61, 'agus', '2024-04-20', '08:42:00', 'mengerjakan soal'),
(62, 'agus', '2024-04-19', '08:42:00', 'mengerjakan soal'),
(63, 'agus', '2024-04-19', '08:42:00', 'melakukan absen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `username`, `password`, `status`) VALUES
(1, 'agus', 'fdf169558242ee051cca1479770ebac3', 'guru'),
(2, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(225) NOT NULL,
  `aktif` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `aktif`) VALUES
(1, 'agus', 'fdf169558242ee051cca1479770ebac3', 'guru', 'aktif'),
(2, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'aktif'),
(3, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'aktif'),
(4, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'noaktif'),
(5, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'aktif'),
(6, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'aktif'),
(7, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'noaktif'),
(8, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'aktif'),
(9, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'aktif'),
(10, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'noaktif'),
(11, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'aktif'),
(12, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'aktif'),
(13, 'alen', 'f3f7eb1421dcfed9a2614712ec608f1b', 'siswa', 'noaktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi_login`
--
ALTER TABLE `notifikasi_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_login`
--
ALTER TABLE `notifikasi_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
