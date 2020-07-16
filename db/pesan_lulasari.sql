-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jul 2020 pada 16.47
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesan_lulasari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'dipesan',
  `confirm` varchar(20) NOT NULL DEFAULT 'belum bayar',
  `proses` varchar(50) NOT NULL,
  `komplain` varchar(50) NOT NULL,
  `estimasi` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `username`, `nama`, `alamat`, `no_tlp`, `status`, `confirm`, `proses`, `komplain`, `estimasi`, `tgl_pesan`, `batas_bayar`) VALUES
(1, '', 'mamang', 'Ketanggungan, Brebes', '', 'dipesan', 'belum bayar', '', '', '', '2020-06-13 22:19:11', '2020-06-14 22:19:11'),
(2, '', 'maymay', 'Ketanggungan, Brebes', '', 'dipesan', 'belum bayar', '', '', '', '2020-06-14 18:42:07', '2020-06-15 18:42:07'),
(3, '', '', '', '', 'dipesan', 'belum bayar', '', '', '', '2020-06-14 21:02:06', '2020-06-15 21:02:06'),
(4, 'mawan', 'mawan', 'Ketanggungan, Brebes', '', 'batal', 'belum bayar', '', '', '', '2020-06-16 21:31:38', '2020-06-17 21:31:38'),
(5, 'mawan', 'mawan', 'Ketanggungan, Brebes', '', 'dipesan', 'confirm', '', '', '', '2020-06-16 21:32:38', '2020-06-17 21:32:38'),
(6, 'mawan', 'mawan', 'ketanggungan, brebes111', '123123111', 'dipesan', 'confirm', 'dikirim', '', '15', '2020-06-16 22:22:10', '2020-06-17 03:22:10'),
(7, 'mawan', 'mawan', 'ketanggungan, brebes111', '123123111', 'dipesan', 'confirm', '', '', '', '2020-06-18 23:27:28', '2020-06-19 04:27:28'),
(8, 'mawan', 'mawan', 'ketanggungan, brebes111', '123123111', 'dipesan', 'belum bayar', '', '', '', '2020-06-28 18:26:20', '2020-06-28 23:26:20'),
(9, 'mawan', 'mawan', 'ketanggungan, brebes111', '123123111', 'dipesan', 'belum bayar', '', '', '', '2020-06-28 18:28:15', '2020-06-28 23:28:15'),
(10, 'mawan', 'mawan', 'ketanggungan, brebes111', '123123111', 'dipesan', 'belum bayar', '', '', '', '2020-06-28 18:29:00', '2020-06-28 23:29:00'),
(11, 'mawan', 'mawan', 'ketanggungan, brebes111', '123123111', 'dipesan', 'belum bayar', '', '', '', '2020-06-28 18:29:58', '2020-06-28 23:29:58'),
(12, 'mawan', 'mawan', 'ketanggungan, brebes111', '123123111', 'dipesan', 'belum bayar', '', '', '', '2020-06-28 18:30:01', '2020-06-28 23:30:01'),
(13, 'mawan', 'mawan', 'ketanggungan, brebes111', '123123111', 'dipesan', 'belum bayar', '', '', '', '2020-07-02 14:06:54', '2020-07-02 19:06:54'),
(14, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'belum bayar', '', '', '', '2020-07-08 16:19:41', '2020-07-08 21:19:41'),
(15, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', 'dikirim', '', '3 Jam', '2020-07-08 20:55:43', '2020-07-09 01:55:43'),
(16, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', 'dikirim', '', '4 jam', '2020-07-08 23:15:22', '2020-07-09 04:15:22'),
(17, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'batal', 'belum bayar', '', '', '', '2020-07-09 12:35:02', '2020-07-09 17:35:02'),
(18, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'dibayar', '', '', '', '2020-07-09 13:00:40', '2020-07-09 18:00:40'),
(19, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', '', '', '3 Jam', '2020-07-09 13:04:58', '2020-07-10 08:05:45'),
(20, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', 'dikirim', '', '3 jam', '2020-07-09 15:37:34', '2020-07-10 10:38:44'),
(21, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'belum bayar', '', '', '', '2020-07-09 23:38:45', '2020-07-10 04:38:45'),
(22, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', 'dikirim', '', '2 jam', '2020-07-10 11:22:08', '2020-07-11 06:23:09'),
(23, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', '', 'Ya', '3 jam', '2020-07-10 14:27:38', '2020-07-11 09:33:06'),
(24, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', '', '', '3 jam', '2020-07-10 15:38:40', '2020-07-11 10:42:28'),
(25, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'diterima', 'confirm', 'dikirim', '', '3 jam', '2020-07-10 15:45:19', '2020-07-11 10:45:50'),
(26, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'diterima', 'confirm', 'dikirim', 'Ya', ' 3 jam', '2020-07-10 15:46:25', '2020-07-11 10:46:57'),
(27, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', '', '', '3 jam', '2020-07-12 17:47:20', '2020-07-13 12:51:16'),
(28, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'batal', 'belum bayar', '', '', '', '2020-07-12 17:47:36', '2020-07-12 22:47:36'),
(29, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', 'dikirim', '', '3 jam', '2020-07-12 17:47:53', '2020-07-13 12:51:55'),
(30, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'confirm', 'komplain', 'Ya', '3 jam', '2020-07-12 17:48:10', '2020-07-13 12:52:22'),
(31, 'mawan', 'mawan', 'Ketanggungan, Brebes, Jawa Tengah', '081225285120', 'dipesan', 'belum bayar', '', '', '', '2020-07-12 17:49:29', '2020-07-12 22:49:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komplain`
--

CREATE TABLE `tb_komplain` (
  `id` int(11) NOT NULL,
  `id_invoice` varchar(50) NOT NULL,
  `komplain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komplain`
--

INSERT INTO `tb_komplain` (`id`, `id_invoice`, `komplain`) VALUES
(1, '22', 'kenapa sambalnya tidak ada'),
(2, '23', 'kenapa sambalnya tidak ada'),
(3, '26', 'kenapa sambalnya tidak ada'),
(4, '30', 'kenapa sambalnya tidak ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_makmin`
--

CREATE TABLE `tb_makmin` (
  `id_makmin` int(11) NOT NULL,
  `nama_makmin` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_makmin`
--

INSERT INTO `tb_makmin` (`id_makmin`, `nama_makmin`, `keterangan`, `kategori`, `harga`, `gambar`) VALUES
(1, 'Gurame Bakar', 'Gurame Bakar Dengan Lalaban', 'Makanan', 40000, 'gurame_bakar_goreng.jpg'),
(2, 'Entog Bakar', 'Entog Bakar Dengan Lalaban', 'Makanan', 25000, 'entog_bakar_goreng.jpg'),
(3, 'Es Jeruk Lemon', 'Paduan Es jeruk dengan tambahan lemon segar', 'Minuman', 10000, 'es-jeruk.jpg'),
(5, 'Bawal Goreng', 'Bawal Goreng Dengan Lalaban', 'Makanan', 30000, 'bawal_goreng_bakar.jpeg'),
(6, 'Nila Goreng', 'Nila Goreng Dengan Lalaban', 'Makanan', 25000, 'nila_bakar_goreng.jpg'),
(7, 'Patin Bakar', 'Patin Bakar Bumbu Spesial', 'Makanan', 30000, 'patin_bakar_goreng.jpg'),
(8, 'Ayam Bakar Rica Rica', 'Ayam Bakar Dengan Bumbu Rica-Rica', 'Makanan', 25000, 'ayam_bakar_rica.jpg'),
(9, 'Es Teh Manis', 'Es Teh Manis Yang Segar', 'Minuman', 5000, 'es_teh.jpg'),
(10, 'Bebek Bakar Rica Rica', 'Bebek Bakar Dengan Bumbu Rica-Rica', 'Makanan', 20000, 'bebek_bakar_rica.jpg'),
(11, 'Cumi Goreng Tepung', 'Cumi Goreng Dengan Baluran Tepung Krispi', 'Makanan', 25000, 'cumi_goreng_tepung.jpg'),
(12, 'Kepiting Saus Padang', 'Kepiting Dengan Baluran Saus Padang', 'Makanan', 40000, 'kepiting_saus_tiram_padang.jpg'),
(13, 'Sop Iga Sapi', 'Sop Iga Sapi Spesial', 'Makanan', 20000, 'sop_iga_sapi.jpg'),
(14, 'Soto Ayam', 'Soto Ayam Spesial', 'Makanan', 15000, 'soto_babad.jpg'),
(15, 'Cah Kangkung Tauge', 'Cah Kangkung Dengan Tambahan Tauge', 'Makanan', 5000, 'cah_kangkung_tauge.jpg'),
(16, 'Sayur Asem', 'Sayur Asem Spesial', 'Makanan', 5000, 'saur_asem.jpg'),
(17, 'Capcay', 'Capcay Spesial', 'Makanan', 10000, 'capcay.jpg'),
(18, 'Nasi Goreng', 'Nasi Goreng Spesial', 'Makanan', 15000, 'nasi_goreng.jpeg'),
(19, 'Nasi Goreng Seafood', 'Nasi Goreng Dengan Toping Seafood', 'Makanan', 25000, 'nasi_goreng_seafood.jpg'),
(20, 'Jus Alpukat', 'Jus Alpukat Yang Segar', 'Minuman', 10000, 'jus_alpukat.jpg'),
(21, 'Jus Jambu', 'Jus Jambu Yang Segar', 'Minuman', 10000, 'jus_jambu.png'),
(22, 'Jus Melon', 'Jus Melon Yang Segar', 'Minuman', 10000, 'jus_melon.jpg'),
(23, 'Jus Mangga', 'Jus Mangga Yang Segar', 'Minuman', 10000, 'jus_mangga.jpg'),
(24, 'Jus Tomat', 'Jus Tomat Yang Segar', 'Minuman', 10000, 'jus_tomat.jpg'),
(25, 'Es Klapa Muda', 'Es Klapa Muda Yang Segar', 'Minuman', 5000, 'es_klapa_muda.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `id_invoice` varchar(10) NOT NULL,
  `nama_peng` varchar(50) NOT NULL,
  `no_peng` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl_dibayar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `id_invoice`, `nama_peng`, `no_peng`, `gambar`, `tgl_dibayar`) VALUES
(1, '', 'budi darmawan', '123123123', 'logo_sma.png', '2020-06-17 00:10:58'),
(2, '', 'budi darmawan', '123123', 'logo_sma1.png', '2020-06-17 00:12:42'),
(3, '6', 'budi darmawan', '123123', 'logo_sma2.png', '2020-06-17 00:14:34'),
(4, '7', 'budi darmawan', '123123', 'icon.png', '2020-06-18 23:28:09'),
(5, '4', 'budi darmawan', '1234567890', 'default.jpg', '2020-07-08 16:20:30'),
(6, '15', 'budi darmawan', '1234567890', 'default1.jpg', '2020-07-08 20:56:18'),
(7, '16', 'budi darmawan', '1234567890', 'default2.jpg', '2020-07-08 23:20:45'),
(8, '18', 'budi darmawan', '1234567890', 'default_profil.jpg', '2020-07-09 13:04:01'),
(9, '19', 'budi darmawan', '1234567890', 'default_profil1.jpg', '2020-07-09 13:05:20'),
(10, '20', 'budi darmawan', '1234567890', 'default_profil2.jpg', '2020-07-09 15:38:10'),
(11, '22', 'budi darmawan', '1234567890', 'default_profil3.jpg', '2020-07-10 11:22:35'),
(12, '23', 'budi darmawan', '1234567890', 'default3.jpg', '2020-07-10 14:27:59'),
(13, '24', 'budi darmawan', '1234567890', 'default4.jpg', '2020-07-10 15:42:09'),
(14, '25', 'budi darmawan', '1234567890', 'default5.jpg', '2020-07-10 15:45:38'),
(15, '26', 'budi darmawan', '1234567890', 'default.png', '2020-07-10 15:46:44'),
(16, '27', 'budi darmawan', '1234567890', 'default6.jpg', '2020-07-12 17:49:54'),
(17, '29', 'budi darmawan', '1234567890', 'default7.jpg', '2020-07-12 17:50:38'),
(18, '30', 'budi darmawan', '1234567890', 'default8.jpg', '2020-07-12 17:50:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_makmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_makmin` varchar(56) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_invoice`, `id_makmin`, `username`, `nama_makmin`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 2, '', 'Pecel Lele', 1, 45000, ''),
(2, 1, 1, '', 'Gurame Saus Tiram', 2, 60000, ''),
(3, 2, 1, '', 'Gurame Saus Tiram', 2, 60000, ''),
(4, 2, 2, '', 'Pecel Lele', 1, 45000, ''),
(5, 3, 1, '', 'Gurame Saus Tiram', 1, 60000, ''),
(6, 4, 1, 'mawan', 'Gurame Saus Tiram', 2, 60000, ''),
(7, 5, 1, 'mawan', 'Gurame Saus Tiram', 1, 60000, ''),
(8, 5, 2, 'mawan', 'Pecel Lele', 2, 45000, ''),
(9, 5, 3, 'mawan', 'Es Jeruk Lemon', 3, 10000, ''),
(10, 6, 3, 'mawan', 'Es Jeruk Lemon', 1, 10000, ''),
(11, 6, 2, 'mawan', 'Pecel Lele', 1, 45000, ''),
(12, 6, 1, 'mawan', 'Gurame Saus Tiram', 2, 60000, ''),
(13, 7, 1, 'mawan', 'Gurame Saus Tiram', 1, 60000, ''),
(14, 7, 2, 'mawan', 'Pecel Lele', 1, 45000, ''),
(15, 7, 3, 'mawan', 'Es Jeruk Lemon', 1, 10000, ''),
(16, 8, 1, 'mawan', 'Gurame Saus Tiram', 1, 60000, ''),
(17, 8, 2, 'mawan', 'Pecel Lele', 1, 45000, ''),
(18, 8, 3, 'mawan', 'Es Jeruk Lemon', 1, 10000, ''),
(19, 13, 2, 'mawan', 'Pecel Lele', 1, 45000, ''),
(20, 13, 1, 'mawan', 'Gurame Saus Tiram', 1, 60000, ''),
(21, 14, 1, 'mawan', 'Gurame Saus Tiram', 2, 60000, ''),
(22, 14, 3, 'mawan', 'Es Jeruk Lemon', 1, 10000, ''),
(23, 15, 1, 'mawan', 'Gurame Saus Tiram', 5, 60000, ''),
(24, 15, 3, 'mawan', 'Es Jeruk Lemon', 4, 10000, ''),
(25, 16, 1, 'mawan', 'Gurame Saus Tiram', 1, 60000, ''),
(26, 17, 1, 'mawan', 'Gurame Saus Tiram', 5, 60000, ''),
(27, 18, 1, 'mawan', 'Gurame Saus Tiram', 10, 60000, ''),
(28, 19, 1, 'mawan', 'Gurame Saus Tiram', 10, 60000, ''),
(29, 20, 1, 'mawan', 'Gurame Saus Tiram', 5, 60000, ''),
(30, 20, 3, 'mawan', 'Es Jeruk Lemon', 4, 10000, ''),
(31, 21, 1, 'mawan', 'Gurame Saus Tiram', 3, 60000, ''),
(32, 22, 1, 'mawan', 'Gurame Saus Tiram', 6, 60000, ''),
(33, 22, 3, 'mawan', 'Es Jeruk Lemon', 4, 10000, ''),
(34, 23, 1, 'mawan', 'Gurame Saus Tiram', 5, 60000, ''),
(35, 24, 1, 'mawan', 'Gurame Saus Tiram', 4, 60000, ''),
(36, 25, 1, 'mawan', 'Gurame Saus Tiram', 4, 60000, ''),
(37, 26, 1, 'mawan', 'Gurame Saus Tiram', 4, 60000, ''),
(38, 27, 1, 'mawan', 'Gurame Saus Tiram', 5, 60000, ''),
(39, 28, 2, 'mawan', 'Pecel Lele', 6, 45000, ''),
(40, 29, 3, 'mawan', 'Es Jeruk Lemon', 5, 10000, ''),
(41, 30, 3, 'mawan', 'Es Jeruk Lemon', 5, 10000, ''),
(42, 31, 6, 'mawan', 'Ayam Bakar Bali', 5, 30000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekening`
--

INSERT INTO `tb_rekening` (`id`, `nama`, `nama_bank`, `no_rekening`) VALUES
(1, 'Munawir', 'BRI', '390101003815538'),
(2, 'Budi Darmawan', 'Gojek', '081225285120'),
(5, 'Munawir', 'Mandiri', '1390068371');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(56) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `password` varchar(56) NOT NULL,
  `email` varchar(56) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `resset_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama`, `password`, `email`, `no_tlp`, `alamat`, `gambar`, `role_id`, `resset_password`) VALUES
(1, 'admin', 'admin', '123', 'admin@admin.com', '', '', '', 1, ''),
(2, 'admin1', 'Budi Darmawan', 'e8f8c6ab524211739e2f9731d7040698', 'budifitt6@gmail.com', '081225285120', 'Ketanggungan, Brebes, Jawa Tengah', 'lulasaribg2.png', 1, ''),
(3, 'user', 'user', '202cb962ac59075b964b07152d234b70', 'admin@admin.com', '', '', '', 2, ''),
(4, 'mawan', 'mawan', 'e8f8c6ab524211739e2f9731d7040698', 'budifitt3@gmail.com', '081225285120', 'Ketanggungan, Brebes, Jawa Tengah', 'default_profil3.jpg', 2, 'NwMhkxtubSCdi1jHoFmIB8V9yE7A4l0UKfZrDQ3GecTaXLnJRO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komplain`
--
ALTER TABLE `tb_komplain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_makmin`
--
ALTER TABLE `tb_makmin`
  ADD PRIMARY KEY (`id_makmin`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_rekening` (`no_rekening`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_komplain`
--
ALTER TABLE `tb_komplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_makmin`
--
ALTER TABLE `tb_makmin`
  MODIFY `id_makmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
