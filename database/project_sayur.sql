-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2021 at 09:35 PM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sayur`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `gross_amount` int(23) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `transaction_status` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `va_number` varchar(50) NOT NULL,
  `fraud_status` varchar(50) DEFAULT NULL,
  `bca_va_number` varchar(50) NOT NULL,
  `permata_va_number` varchar(50) NOT NULL,
  `pdf_url` varchar(200) NOT NULL,
  `finish_redirect_url` varchar(200) NOT NULL,
  `bill_key` varchar(50) NOT NULL,
  `biller_code` varchar(10) NOT NULL,
  `payment_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `transaction_id`, `order_id`, `gross_amount`, `payment_type`, `transaction_time`, `transaction_status`, `bank`, `va_number`, `fraud_status`, `bca_va_number`, `permata_va_number`, `pdf_url`, `finish_redirect_url`, `bill_key`, `biller_code`, `payment_code`) VALUES
(62, '6f52eda0-694f-4113-ad7b-d1617f854e2a', '1077214772', 155000, 'bank_transfer', '2021-07-31 20:34:07', 'settlement', 'bca', '79427451510', 'accept', '79427451510', '-', 'https://app.sandbox.midtrans.com/snap/v1/transactions/0f87099e-7189-46dc-8a1e-4ab24aa38858/pdf', 'http://example.com?order_id=1077214772&status_code=201&transaction_status=pending', '-', '-', '-'),
(63, '34ebee81-57ca-49d3-a6ae-bd7e46f11f51', '1458692634', 43000, 'bank_transfer', '2021-07-31 20:57:50', 'settlement', 'bca', '79427755621', 'accept', '79427755621', '-', 'https://app.sandbox.midtrans.com/snap/v1/transactions/88603284-072d-429d-b5af-debf1326d7b8/pdf', 'http://example.com?order_id=1458692634&status_code=201&transaction_status=pending', '-', '-', '-'),
(64, '42465e82-c0b6-4f3d-805a-4837be88cd8d', '72657419', 120000, 'bank_transfer', '2021-07-31 21:09:00', 'settlement', 'bca', '79427925904', 'accept', '79427925904', '-', 'https://app.sandbox.midtrans.com/snap/v1/transactions/166c667c-f8da-4310-a4d4-161bd4692120/pdf', 'http://example.com?order_id=72657419&status_code=201&transaction_status=pending', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `email`, `role_id`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `role_id` int(11) NOT NULL,
  `hak_akses` enum('admin','konsumen','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`role_id`, `hak_akses`) VALUES
(1, 'admin'),
(2, 'konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(200) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `id_kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Gula batu', 'Gula batu organik', 2, 10000, 9, 'gula.jpg'),
(2, 'Beras Cap Topi Koki', 'Beras Cap Topi Koki 10kg', 1, 120000, -12, 'brstopikoki.jpg'),
(6, 'Daging Ayam', 'Daging Ayam Negeri 1Kg', 3, 35000, -6, 'dagingayam.jpg'),
(7, 'wortel organik', 'wortel organik 1Kg', 1, 8000, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `status_bayar` enum('belum bayar','menunggu pembayaran','lunas','') NOT NULL,
  `status_kirim` enum('belum dikirim','proses kirim','sudah terkirim','') NOT NULL,
  `id_konsumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `nama`, `alamat`, `no_hp`, `tgl_pesan`, `batas_bayar`, `keterangan`, `status_bayar`, `status_kirim`, `id_konsumen`) VALUES
(68, 'putra', 'Jogjakarta', '081234567809', '2021-07-31 20:33:59', '2021-08-01 20:33:59', 'aa', 'menunggu pembayaran', 'belum dikirim', 1),
(69, 'putra', 'Jogjakarta', '081234567809', '2021-07-31 20:57:33', '2021-08-01 20:57:33', 'aaa', 'lunas', 'belum dikirim', 1),
(70, 'putra', 'Jogjakarta', '081234567809', '2021-07-31 21:08:46', '2021-08-01 21:08:46', '', 'lunas', 'belum dikirim', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Bahan Pangan Organik/Natural'),
(2, 'Gula'),
(3, 'Sumber Protein'),
(4, 'Sayuran'),
(5, 'Buah'),
(6, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsumen`
--

CREATE TABLE `tb_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id_konsumen`, `nama`, `alamat`, `no_tlp`, `email`, `username`, `password`, `role_id`) VALUES
(1, 'putra', 'Jogjakarta', '081234567809', 'putra@gmail.com', 'putra', 'putra', 2),
(2, 'BELA SAVIRA', 'Bandar Lampung', '089912345678', 'bela@gmail.com', 'bela', 'bela', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(200) NOT NULL,
  `no_rek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `metode_pembayaran`, `no_rek`) VALUES
(1, 'Bank Bri', '1234567899'),
(2, 'Bank Mandiri', '0987654321'),
(3, 'Dana', '089123456788'),
(4, 'OVO', '08124353546');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(200) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok - NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_pesanan`
--

CREATE TABLE `tb_riwayat_pesanan` (
  `id_riwayat_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `nama_brg` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total` int(50) NOT NULL,
  `order_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayat_pesanan`
--

INSERT INTO `tb_riwayat_pesanan` (`id_riwayat_pesanan`, `id_pesanan`, `id_invoice`, `nama_brg`, `jumlah`, `harga`, `sub_total`, `total`, `order_id`) VALUES
(25, 55, 68, 'Beras Cap Topi Koki', 1, 120000, 120000, 155000, '1077214772'),
(26, 56, 68, 'Daging Ayam', 1, 35000, 35000, 155000, '1077214772'),
(27, 57, 69, 'wortel organik', 1, 8000, 8000, 43000, '1458692634'),
(28, 58, 69, 'Daging Ayam', 1, 35000, 35000, 43000, '1458692634'),
(29, 59, 70, 'Beras Cap Topi Koki', 1, 120000, 120000, 120000, '72657419');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_invoice` (`id_invoice`);

--
-- Indexes for table `tb_riwayat_pesanan`
--
ALTER TABLE `tb_riwayat_pesanan`
  ADD PRIMARY KEY (`id_riwayat_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `tb_riwayat_pesanan`
--
ALTER TABLE `tb_riwayat_pesanan`
  MODIFY `id_riwayat_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_akses` (`role_id`);

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`);

--
-- Constraints for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD CONSTRAINT `tb_konsumen_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_akses` (`role_id`);

--
-- Constraints for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `tb_barang` (`id_brg`),
  ADD CONSTRAINT `tb_pesanan_ibfk_2` FOREIGN KEY (`id_invoice`) REFERENCES `tb_invoice` (`id_invoice`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
