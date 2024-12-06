-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2024 pada 22.03
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
-- Database: `galery_foto_asa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggalbuat` date NOT NULL,
  `user-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggalbuat`, `user-id`) VALUES
(9, 'Furina Sticker', 'furina stiker2', '2024-08-11', 3),
(11, 'Lynette sticker', 'Lynette stiker', '2024-08-11', 3),
(12, 'Fontaine', 'Fontaine', '2024-08-26', 3),
(13, 'Kinich', 'Kinich Album', '2024-12-03', 6),
(14, 'Sumeru', 'Sumeru', '2024-11-12', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `user-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `user-id`) VALUES
(6, 'Furina1', 'Furina de Fontaine', '2024-08-26', '1022727740-Paimon_s Paintings_Set 28_Furina (4).png', 9, 3),
(9, 'Kinich & Ajaw', 'annoying ajaw', '2024-11-10', '660840126-Kinich 3.png', 13, 6),
(10, 'kinich VA', 'kinich va', '2024-11-12', '466978823-GSQj7BoW8AA0hAq (1).png', 13, 6),
(11, 'Sumeru boys', 'sumeru boys', '2024-11-12', '626870989-Parade-Providence-desktop-wallpaper-official-genshin.jpg', 14, 6),
(12, 'wanderer', 'wanderer', '2024-12-03', '326359921-Secret-Summer-Paradise-official-wallpaper-genshin-3.jpg', 14, 6),
(13, 'alhaitam', 'alhaitam', '2024-11-12', '1385541134-alhaitham-birthday-art-genshinimpact-2048x2048.jpg', 14, 6),
(14, 'Nahida', 'Nahida bday', '2024-12-03', '989392692-wp11821317-wanderer-genshin-wallpapers.jpg', 14, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar-foto`
--

CREATE TABLE `komentar-foto` (
  `komentar-id` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `user-id` int(11) NOT NULL,
  `isi-komentar` text NOT NULL,
  `tanggal-komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar-foto`
--

INSERT INTO `komentar-foto` (`komentar-id`, `fotoid`, `user-id`, `isi-komentar`, `tanggal-komentar`) VALUES
(3, 6, 3, 'tes3', '2024-11-10'),
(4, 6, 3, 'tes4', '2024-11-10'),
(5, 6, 6, 'tes5', '2024-11-10'),
(6, 9, 6, 'Ajaw is really annoying!!', '2024-11-10'),
(7, 10, 6, 'tes', '2024-11-12'),
(8, 9, 3, 'tes', '2024-12-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `user-id` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `user-id`, `tanggallike`) VALUES
(13, 6, 3, '2024-09-01'),
(2629, 10, 6, '2024-12-03'),
(2630, 6, 6, '2024-12-03'),
(2631, 9, 6, '2024-12-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user-id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user-id`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(3, 'admin1', '202cb962ac59075b964b07152d234b70', 'admin1@gmail.com', '', 'admin'),
(4, 'akun2', '202cb962ac59075b964b07152d234b70', 'akun2@gmail.com', '', 'akun2'),
(5, 'ryne', '202cb962ac59075b964b07152d234b70', 'ryne@gmail.com', '', 'akun3'),
(6, 'yuuka', '202cb962ac59075b964b07152d234b70', 'yuuka@gmail.com', 'yuukayuuka', 'akun4');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `album-id` (`albumid`),
  ADD KEY `user-id` (`user-id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `album-id` (`albumid`),
  ADD KEY `user-id` (`user-id`);

--
-- Indeks untuk tabel `komentar-foto`
--
ALTER TABLE `komentar-foto`
  ADD PRIMARY KEY (`komentar-id`),
  ADD KEY `foto-id` (`fotoid`),
  ADD KEY `user-id` (`user-id`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `foto-id` (`fotoid`),
  ADD KEY `user-id` (`user-id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user-id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `komentar-foto`
--
ALTER TABLE `komentar-foto`
  MODIFY `komentar-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2632;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `user` (`user-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `user` (`user-id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar-foto`
--
ALTER TABLE `komentar-foto`
  ADD CONSTRAINT `komentar-foto_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `user` (`user-id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar-foto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `user` (`user-id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
