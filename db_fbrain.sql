-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2025 pada 21.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fbraintemp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(100) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama_pengguna`, `email`, `password`, `foto`, `bio`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$v57rpQkmSpd46ZEoDArXWOlk0y22QgZ8.yZb0jtHROwiDT8zqnl0W', 'masmas.jpg', 'Lulusan Teknik Informatika ITB. Mendirikan dan menjadi CEO Dicoding sejak 2015. Sebelumnya bekerja di Microsoft dan Nokia. Mengembangkan developer serta jejaringnya di Indonesia hingga Asia Tenggara', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id` bigint(250) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_target` int(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `teks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_chat`
--

INSERT INTO `tb_chat` (`id`, `id_user`, `id_target`, `id_kelas`, `teks`) VALUES
(1, 10, 1, 30, 'as');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_pribadi`
--

CREATE TABLE `tb_data_pribadi` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `judul_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `judul_kategori`) VALUES
(1, 'pemrograman'),
(2, 'jaringan'),
(3, 'database');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `id_siswa`, `id_paket`, `status`, `waktu`) VALUES
(30, 10, 22, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_klangkah`
--

CREATE TABLE `tb_klangkah` (
  `id` int(11) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `id_langkah` int(100) NOT NULL,
  `id_siswa` int(150) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ktopik`
--

CREATE TABLE `tb_ktopik` (
  `id` int(11) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `id_topik` int(100) NOT NULL,
  `id_klangkah` int(150) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_langkah`
--

CREATE TABLE `tb_langkah` (
  `id` int(11) NOT NULL,
  `judul_langkah` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `modul` varchar(100) NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `id_paket` int(100) NOT NULL,
  `benar` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_opsi`
--

CREATE TABLE `tb_opsi` (
  `id` int(11) NOT NULL,
  `id_soal` int(100) NOT NULL,
  `opsi` varchar(100) NOT NULL,
  `kunci_jawaban` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `judul_paket` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi_judul` text NOT NULL,
  `terdaftar` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `main_deskripsi` text NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `judul_paket`, `gambar`, `deskripsi_judul`, `terdaftar`, `rating`, `main_deskripsi`, `id_tutor`, `harga`) VALUES
(21, 'python dasar', 'uler.png', 'memahami python dasar', 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1, 200000),
(22, 'Networking', 'jaringan.png', 'memahami jaringan', 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1, 300000),
(23, 'front-end', 'images.png', 'memahami front-end', 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1, 300000),
(24, 'Back-end', 'download_(1).png', 'memahami backend', 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1, 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pkategori`
--

CREATE TABLE `tb_pkategori` (
  `id` int(11) NOT NULL,
  `id_paket` int(100) NOT NULL,
  `id_kategori` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pkategori`
--

INSERT INTO `tb_pkategori` (`id`, `id_paket`, `id_kategori`) VALUES
(47, 21, 1),
(48, 21, 3),
(49, 22, 2),
(56, 23, 1),
(57, 23, 3),
(58, 24, 1),
(59, 24, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nama_pengguna`, `email`, `password`, `waktu`) VALUES
(10, 'zidan', 'zidan@gmail.com', '$2y$10$ngYW84jj7D40FCCRQxeYvuz1qOaiGl2CGmktr.YGZ.xStUJ5uNby.', '2025-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL,
  `id_paket` int(100) NOT NULL,
  `judul_soal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_topik`
--

CREATE TABLE `tb_topik` (
  `id` int(11) NOT NULL,
  `judul_topic` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_langkah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `waktu` date NOT NULL,
  `promo` varchar(100) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `jumlah_tagihan` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `bukti_pembayaran` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_paket`, `id_siswa`, `waktu`, `promo`, `total_diskon`, `jumlah_tagihan`, `status`, `bukti_pembayaran`) VALUES
(34, 9, 4, '2024-07-11', '', 0, 500000, 1, 'gmbr2.jpg'),
(35, 12, 8, '2024-12-18', '', 0, 5000000, 0, ''),
(36, 19, 4, '2024-12-18', '', 0, 300000, 1, '2020-10-02.jpg'),
(37, 18, 4, '2024-12-24', '', 0, 10000000, 1, ''),
(38, 7, 4, '2025-01-03', '', 0, 500000, 2, 'homepage-hero.png'),
(39, 22, 10, '2025-08-07', '', 0, 300000, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_user`),
  ADD KEY `id_admin` (`id_target`),
  ADD KEY `tb_chat_ibfk_1` (`id_kelas`);

--
-- Indeks untuk tabel `tb_data_pribadi`
--
ALTER TABLE `tb_data_pribadi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `tb_kelas_ibfk_2` (`id_paket`);

--
-- Indeks untuk tabel `tb_klangkah`
--
ALTER TABLE `tb_klangkah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `tb_klangkah_ibfk_2` (`id_langkah`);

--
-- Indeks untuk tabel `tb_ktopik`
--
ALTER TABLE `tb_ktopik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_topik` (`id_topik`),
  ADD KEY `id_klangkah` (`id_klangkah`);

--
-- Indeks untuk tabel `tb_langkah`
--
ALTER TABLE `tb_langkah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tb_opsi`
--
ALTER TABLE `tb_opsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_opsi_ibfk_1` (`id_soal`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_paket_ibfk_1` (`id_tutor`);

--
-- Indeks untuk tabel `tb_pkategori`
--
ALTER TABLE `tb_pkategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pkategori_ibfk_1` (`id_paket`),
  ADD KEY `tb_pkategori_ibfk_2` (`id_kategori`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_soal_ibfk_1` (`id_paket`);

--
-- Indeks untuk tabel `tb_topik`
--
ALTER TABLE `tb_topik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_langkah` (`id_langkah`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_paket` (`id_paket`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_data_pribadi`
--
ALTER TABLE `tb_data_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_klangkah`
--
ALTER TABLE `tb_klangkah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `tb_ktopik`
--
ALTER TABLE `tb_ktopik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_langkah`
--
ALTER TABLE `tb_langkah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_opsi`
--
ALTER TABLE `tb_opsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_pkategori`
--
ALTER TABLE `tb_pkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_topik`
--
ALTER TABLE `tb_topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_data_pribadi`
--
ALTER TABLE `tb_data_pribadi`
  ADD CONSTRAINT `tb_data_pribadi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_klangkah`
--
ALTER TABLE `tb_klangkah`
  ADD CONSTRAINT `tb_klangkah_ibfk_2` FOREIGN KEY (`id_langkah`) REFERENCES `tb_langkah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ktopik`
--
ALTER TABLE `tb_ktopik`
  ADD CONSTRAINT `tb_ktopik_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id`),
  ADD CONSTRAINT `tb_ktopik_ibfk_2` FOREIGN KEY (`id_topik`) REFERENCES `tb_topik` (`id`),
  ADD CONSTRAINT `tb_ktopik_ibfk_3` FOREIGN KEY (`id_klangkah`) REFERENCES `tb_klangkah` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_langkah`
--
ALTER TABLE `tb_langkah`
  ADD CONSTRAINT `tb_langkah_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`),
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_opsi`
--
ALTER TABLE `tb_opsi`
  ADD CONSTRAINT `tb_opsi_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `tb_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pkategori`
--
ALTER TABLE `tb_pkategori`
  ADD CONSTRAINT `tb_pkategori_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_topik`
--
ALTER TABLE `tb_topik`
  ADD CONSTRAINT `tb_topik_ibfk_1` FOREIGN KEY (`id_langkah`) REFERENCES `tb_langkah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
