-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2024 pada 04.45
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
-- Database: `db_money_tracking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dana`
--

CREATE TABLE `tb_dana` (
  `id_dana` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `category` varchar(100) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dana`
--

INSERT INTO `tb_dana` (`id_dana`, `id_user`, `category`, `vendor`, `saldo`) VALUES
(2, 1, 'Banking', 'BCA', 1000000),
(3, 1, 'Dompet', '-', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemasukan`
--

CREATE TABLE `tb_pemasukan` (
  `id_pemasukan` int(4) NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `id_dana` int(4) NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pemasukan`
--

INSERT INTO `tb_pemasukan` (`id_pemasukan`, `sumber`, `id_dana`, `penghasilan`, `tanggal`) VALUES
(21, 'Sidejob', 2, 1200000, '2023-12-15'),
(22, 'Sidejob', 2, 100000, '2023-12-15'),
(23, 'Sallary', 2, 1200000, '2023-12-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` int(4) NOT NULL,
  `id_dana` int(4) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `id_dana`, `untuk`, `harga`, `jumlah`, `total`, `tanggal`) VALUES
(2, 2, 'Sepatu', 100000, 2, 200000, '2023-12-15'),
(3, 2, 'Kemeja', 50000, 2, 100000, '2023-12-15'),
(4, 2, 'Nasi Goreng', 12000, 2, 24000, '2023-12-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(4) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `email_user`, `password_user`) VALUES
(1, 'Gangga Swadiaya', 'ganggaswadiaya@gmail.com', 'gangga123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dana`
--
ALTER TABLE `tb_dana`
  ADD PRIMARY KEY (`id_dana`),
  ADD KEY `fk_iduser` (`id_user`);

--
-- Indeks untuk tabel `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `fk_iddana` (`id_dana`);

--
-- Indeks untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `fk_dana` (`id_dana`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dana`
--
ALTER TABLE `tb_dana`
  MODIFY `id_dana` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  MODIFY `id_pemasukan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_pengeluaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_dana`
--
ALTER TABLE `tb_dana`
  ADD CONSTRAINT `fk_iduser` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  ADD CONSTRAINT `fk_iddana` FOREIGN KEY (`id_dana`) REFERENCES `tb_dana` (`id_dana`);

--
-- Ketidakleluasaan untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD CONSTRAINT `fk_dana` FOREIGN KEY (`id_dana`) REFERENCES `tb_dana` (`id_dana`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
