-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2020 pada 06.58
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
-- Database: `images`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `img`
--

INSERT INTO `img` (`id`, `name`, `img_dir`) VALUES
(1, 'Gp (1)', 'img-web/gp (1).jpg'),
(2, 'Gp (2)', 'img-web/gp (2).jpg'),
(3, 'Gp (3)', 'img-web/gp (3).jpg'),
(4, 'Gp (4)', 'img-web/gp (4).jpg'),
(5, 'Gp (5)', 'img-web/gp (5).jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
