-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 05:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cendana`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `ID_KERANJANG` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `status` enum('belum','selesai') DEFAULT 'belum',
  `waktu` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`ID_KERANJANG`, `USER_ID`, `status`, `waktu`) VALUES
(15, 1, 'selesai', '2024-05-20 08:59:53'),
(16, 1, 'selesai', '2024-05-20 09:27:17'),
(17, 1, 'selesai', '2024-05-26 03:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_item`
--

CREATE TABLE `keranjang_item` (
  `ITEM_ID` int(11) NOT NULL,
  `PRODUK_ID` int(11) DEFAULT NULL,
  `ID_KERANJANG` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang_item`
--

INSERT INTO `keranjang_item` (`ITEM_ID`, `PRODUK_ID`, `ID_KERANJANG`, `JUMLAH`) VALUES
(27, 2, 15, 1),
(28, 3, 15, 1),
(29, 3, 16, 1),
(30, 1, 16, 1),
(31, 2, 16, 1),
(32, 2, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `PEMBAYARAN_ID` int(11) NOT NULL,
  `PEMESANAN_ID` int(11) DEFAULT NULL,
  `METODE_PEMBAYARAN` varchar(25) DEFAULT NULL,
  `STATUS` enum('belum','lunas') DEFAULT 'lunas',
  `WAKTU` timestamp NULL DEFAULT current_timestamp(),
  `USER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`PEMBAYARAN_ID`, `PEMESANAN_ID`, `METODE_PEMBAYARAN`, `STATUS`, `WAKTU`, `USER_ID`) VALUES
(11, 11, 'BNI', 'lunas', '2024-05-20 08:59:53', 1),
(12, 12, 'BNI', 'lunas', '2024-05-20 09:27:17', 1),
(13, 13, 'BRIVA', 'lunas', '2024-05-26 03:31:22', 1);

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `update_keranjang_time` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
    UPDATE keranjang
    SET WAKTU = NEW.WAKTU
    WHERE ID_KERANJANG = (SELECT MAX(ID_KERANJANG) FROM keranjang WHERE USER_ID = NEW.USER_ID);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `PEMESANAN_ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `TOTAL_HARGA` bigint(20) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`PEMESANAN_ID`, `USER_ID`, `TOTAL_HARGA`, `ALAMAT`) VALUES
(11, 1, 80000, 'lamongan'),
(12, 1, 120000, 'lamongan'),
(13, 1, 40000, 'Lamongan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `PRODUK_ID` int(11) NOT NULL,
  `NAMA_PRODUK` varchar(50) DEFAULT NULL,
  `GAMBAR_PRODUK` varchar(255) DEFAULT NULL,
  `KATEGORI_PRODUK` varchar(50) DEFAULT NULL,
  `HARGA_PRODUK` int(11) DEFAULT NULL,
  `DESKRIPSI` varchar(200) DEFAULT NULL,
  `STOK` decimal(3,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`PRODUK_ID`, `NAMA_PRODUK`, `GAMBAR_PRODUK`, `KATEGORI_PRODUK`, `HARGA_PRODUK`, `DESKRIPSI`, `STOK`) VALUES
(1, 'Kain Batik Megamendung', '1716101673.jpg', 'Batik', 40000, 'Kain Cendana Untuk kebutuhan fashion anda . terbuat dari bahan yang lebih Halus, Lebar & lebih panjang Panjang.Kain batik Halus 100% Cotton', 5),
(2, 'Kain Batik Tujuh rupa', '1716102324.jpeg', 'Batik', 40000, 'Kain Cendana Untuk kebutuhan fashion anda . terbuat dari bahan yang lebih Halus, Lebar & lebih panjang Panjang.Kain batik Halus 100% Cotton', 6),
(3, 'Kain Batik Kraton', '1716103191.jpg', 'Batik', 40000, 'Kain Cendana Untuk kebutuhan fashion anda . terbuat dari bahan yang lebih Halus, Lebar & lebih panjang Panjang.Kain batik Halus 100% Cotton', 3),
(4, 'Kain Batik Motif Parang', '1716103198.jpeg', 'Batik', 45000, 'Kain Cendana Untuk kebutuhan fashion anda . terbuat dari bahan yang lebih Halus, Lebar & lebih panjang Panjang.Kain batik Halus 100% Cotton', 6),
(5, 'Wayang Kulit Gatotkaca', '1716103206.jpg', 'Wayang Kulit', 41000, 'Terbuat dari 100% kulit kambing asli dengan teknik tatah sunggingUkuran Standar pedalangan 16 cm (dari kepala sampai kaki)', 7),
(6, 'Wayang Kulit Wekudara', '1716103214.jpeg', 'Wayang Kulit', 80000, 'Terbuat dari 100% kulit kambing asli dengan teknik tatah sunggingUkuran Standar pedalangan 16 cm (dari kepala sampai kaki)', 9),
(7, 'Wayang Kulit Buto Patih', '1716103223.jpeg', 'Wayang Kulit', 90000, 'Terbuat dari 100% kulit kambing asli dengan teknik tatah sunggingUkuran Standar pedalangan 16 cm (dari kepala sampai kaki)', 12),
(8, 'Wayang Kulit Krisna', '1716103232.jpg', 'Wayang Kulit', 80000, 'Terbuat dari 100% kulit kambing asli dengan teknik tatah sunggingUkuran Standar pedalangan 16 cm (dari kepala sampai kaki)', 21),
(9, 'Wayang Kulit Buto Cakil1', '1716103239.jpeg', 'Wayang Kulit', 90000, 'Terbuat dari 100% kulit kambing asli dengan teknik tatah sunggingUkuran Standar pedalangan 16 cm (dari kepala sampai kaki)', 41),
(10, 'Wayang Kulit Rama Sinta (set)', '1716103247.jpg', 'Wayang Kulit', 3434, 'Wayang Kulit Mahar 1 set Rama, Sinta, GununganTerbuat dari 100% kulit kambing asli dengan teknik tatah sungging. Ukuran Standar pedalangan 16 cm', 21),
(21, 'Lukisan Bunga Mawar', '1716103258.jpeg', 'Lukisan', 22999, '- 100 % Lukisan Asli- Terdapat tanda tangan pelukis di sisi sampiang   kanvas- menggunakan Cat Akrilik berkualitas- kanvas ukuran 20x20 cm- Sudah disertai rangka kayu di belakang kanvas- L', 1),
(22, 'Lukisan Bunga Melati', '1716103268.jpg', 'Lukisan', 22999, '- 100 % Lukisan Asli- Terdapat tanda tangan pelukis di sisi sampiang   kanvas- menggunakan Cat Akrilik berkualitas- kanvas ukuran 20x20 cm- Sudah disertai rangka kayu di belakang kanvas- L', 1),
(23, 'Lukisan Bunga Tulip', '1716103280.jpg', 'Lukisan', 22999, '- 100 % Lukisan Asli- Terdapat tanda tangan pelukis di sisi sampiang   kanvas- menggunakan Cat Akrilik berkualitas- kanvas ukuran 20x20 cm- Sudah disertai rangka kayu di belakang kanvas- L', 1),
(24, 'Vas Guci Keramik Motif Bunga', '1716103289.jpg', 'Vas Guci ', 65000, 'Ukuran keramik tinggi ±26cm, diameter ±10cm.. Barang utuh sudah dicek kondisi tidak pecah/retak dll, kerusakan yg disebabkan oleh proses pengiriman ekspedisi bukan tanggung jawab penjual', 7),
(25, 'Vas Guci Keramik Motif Daun', '1716103298.jpg', 'Vas Guci ', 65000, 'Ukuran keramik tinggi ±26cm, diameter ±10cm.. Barang utuh sudah dicek kondisi tidak pecah/retak dll, kerusakan yg disebabkan oleh proses pengiriman ekspedisi bukan tanggung jawab penjual', 6),
(26, 'Patung Suku Asmat', '1716103307.jpg', 'Patung', 75000, 'Topeng Suku Etnik Cocok dijadikan Dekorasi Dinding anda yang terasa kosong dan bingung mau menghias apa', 2),
(27, 'Patung Suku Aborigin', '1716103317.jpg', 'Patung', 75000, 'Topeng Suku Etnik Cocok dijadikan Dekorasi Dinding anda yang terasa kosong dan bingung mau menghias apa', 3),
(28, 'Patung Garuda Wisnu Kencana Kayu', '1716103326.jpeg', 'Patung', 350000, 'Garuda Wisnu Kayu 20 cmPatung tersebut berwujud Dewa Wisnu yang dalam agama Hindu adalah Dewa Pemelihara (Sthiti), mengendarai burung Garuda', 3),
(29, 'Vas Bunga Keramik Porselen Biru Putih', '1716103335.jpg', 'Vas Guci ', 248000, 'Vas Bunga Keramik Guci Porselen Biru Putih Import Dekorasi Rumah  Bahan : Porselen Keramik', 3),
(30, 'Pigura Kayu 15x20', '1716102136.jpg', 'Pigura', 12000, 'free design dan tambah text, size 15x20 cm, mudah, dibersihkan, material  board, frame kayu pinewood + tali', 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `alamat`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$hBqqYo3s.u7uXXubyxDamO0srPmCvIC4rEfizypayWNiuzI6CLmdO', NULL, '2024-05-12 03:41:12', '2024-05-12 03:41:12', NULL, 'admin'),
(2, 'user', 'user@gmail.com', NULL, '$2y$12$hTC1Go/7lx6pUH0nTSyGY.FJUFTk45vzpOJVLidylDyM6dQ/.P25C', NULL, '2024-05-17 09:11:59', '2024-05-17 09:11:59', NULL, 'user'),
(3, 'user1', 'us@gmail.com', NULL, '$2y$12$Bpu7Oz9cSOsMS/h6bei2/uQblrZzKK7vHLBh21JpWLZbDjD/Xo.Zq', NULL, '2024-05-19 20:05:50', '2024-05-19 20:05:50', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`ID_KERANJANG`),
  ADD KEY `FK_RELATIONSHIP_1` (`USER_ID`);

--
-- Indexes for table `keranjang_item`
--
ALTER TABLE `keranjang_item`
  ADD PRIMARY KEY (`ITEM_ID`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_KERANJANG`),
  ADD KEY `FK_RELATIONSHIP_6` (`PRODUK_ID`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`PEMBAYARAN_ID`),
  ADD KEY `FK_RELATIONSHIP_5` (`PEMESANAN_ID`),
  ADD KEY `FK2` (`USER_ID`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`PEMESANAN_ID`),
  ADD KEY `FK_RELATIONSHIP_3` (`USER_ID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`PRODUK_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `ID_KERANJANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `keranjang_item`
--
ALTER TABLE `keranjang_item`
  MODIFY `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `PEMBAYARAN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `PEMESANAN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `PRODUK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`);

--
-- Constraints for table `keranjang_item`
--
ALTER TABLE `keranjang_item`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_KERANJANG`) REFERENCES `keranjang` (`ID_KERANJANG`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`PRODUK_ID`) REFERENCES `produk` (`PRODUK_ID`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`PEMESANAN_ID`) REFERENCES `pemesanan` (`PEMESANAN_ID`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
