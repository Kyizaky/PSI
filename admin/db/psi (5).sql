-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 12:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barber`
--

CREATE TABLE `barber` (
  `id_barber` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barber`
--

INSERT INTO `barber` (`id_barber`, `id_user`, `nama`, `jk`, `no_hp`, `alamat`) VALUES
(12, 35, 'fikri', 'laki-laki', '0907342887', 'kost malika'),
(14, 37, 'hasan', 'laki-laki', '892913128', 'condongcatur'),
(15, 38, 'richard', 'laki-laki', '897349827398', 'kaliurang'),
(16, 39, 'maulana', 'laki-laki', '934234234', 'ngemplang'),
(17, 40, 'raja', 'laki-laki', '3423423425', 'kailurang');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `id_user`, `nama`, `no_hp`, `alamat`) VALUES
(11, 24, 'viano', '081378871625', 'Taman Valencia Blok B no 16'),
(12, 25, 'vahri', '08873478233', 'kos putra'),
(13, 26, 'tomi', '0838921', 'jln arah kaliurang'),
(14, 27, 'rafli', '0813174725', 'candiwinanggun'),
(16, 29, 'dafa', '0826312732', 'muka kuning'),
(18, 31, 'burhan', '98231009321', 'Poltek batam'),
(19, 32, 'danu', '08284618763', 'Griya Batu Aji asri'),
(20, 33, 'ahsan', '081767263123', 'Kaliurang pokoknya'),
(21, 34, 'riski', '09823081987', 'Aviari');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_barang`, `nama`, `stok`) VALUES
(1, 'Pomade Raja Dewa', 20),
(2, 'Pomade Ratu Dewa', 15);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_barber` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(11) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `order_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_customer`, `id_barber`, `id_service`, `tanggal`, `waktu`, `Status`, `order_id`) VALUES
(1, 11, 12, 1, '2023-05-01', '08:00', 'selesai', 509165068),
(6, 11, 12, 2, '2023-05-06', '10:00', 'selesai', 1905425873),
(7, 11, 14, 2, '2023-05-08', '10:00', 'selesai', 639657842),
(8, 11, 12, 3, '2023-05-12', '10:00', 'selesai', 883328417),
(10, 11, 12, 1, '2023-05-19', '10:00', 'selesai', 29007727),
(11, 11, 15, 1, '2023-05-26', '10:00', 'selesai', 1464340273),
(12, 12, 16, 1, '2023-05-04', '10:00', 'selesai', 1439651512),
(14, 12, 15, 2, '2023-05-07', '10:00', 'selesai', 1571621694),
(15, 12, 16, 1, '2023-05-13', '10:00', 'selesai', 727119796),
(17, 12, 17, 3, '2023-05-13', '10:00', 'selesai', 1821315768),
(19, 12, 12, 1, '2023-05-22', '10:00', 'selesai', 963123225),
(20, 12, 16, 2, '2023-05-31', '10:00', 'selesai', 1946869725),
(21, 13, 12, 1, '2023-05-05', '13:00', 'selesai', 1858650786),
(22, 13, 17, 1, '2023-05-09', '10:00', 'selesai', 834807648),
(24, 13, 14, 2, '2023-05-13', '13:00', 'selesai', 2076498119),
(25, 13, 14, 3, '2023-05-26', '13:00', 'selesai', 1415404368),
(26, 14, 17, 1, '2023-05-03', '10:00', 'selesai', 45024138),
(27, 14, 17, 1, '2023-05-15', '10:00', 'selesai', 1515005175),
(28, 14, 14, 2, '2023-05-20', '10:00', 'selesai', 84270024),
(29, 14, 15, 1, '2023-05-31', '10:00', 'selesai', 1478108127),
(30, 16, 12, 1, '2023-05-01', '10:00', 'selesai', 2135500628),
(31, 16, 12, 1, '2023-05-13', '10:00', 'selesai', 2138028629),
(32, 16, 14, 2, '2023-05-14', '10:00', 'selesai', 857820477),
(33, 16, 17, 1, '2023-05-20', '10:00', 'selesai', 514087891),
(34, 16, 14, 3, '2023-05-21', '10:00', 'selesai', 1804310545),
(35, 16, 17, 4, '2023-05-26', '10:00', 'selesai', 1721815777),
(39, 18, 12, 1, '2023-05-08', '10:00', 'selesai', 1371341561),
(40, 18, 15, 4, '2023-05-20', '10:00', 'selesai', 2040674009),
(41, 18, 12, 1, '2023-05-30', '10:00', 'selesai', 1959592659),
(42, 19, 17, 1, '2023-05-07', '13:00', 'selesai', 1373734294),
(43, 19, 14, 3, '2023-05-07', '10:00', 'selesai', 1770069520),
(45, 19, 16, 4, '2023-05-20', '13:00', 'selesai', 632505056),
(46, 19, 12, 2, '2023-05-27', '10:00', 'selesai', 438951991),
(47, 19, 15, 1, '2023-05-31', '10:00', 'selesai', 1496218350),
(48, 20, 14, 2, '2023-05-06', '13:00', 'selesai', 1917595169),
(49, 20, 14, 1, '2023-05-13', '10:00', 'selesai', 1574566189),
(50, 20, 12, 3, '2023-05-27', '13:00', 'selesai', 1260713010),
(51, 20, 12, 4, '2023-05-31', '13:00', 'selesai', 1453119038),
(52, 21, 12, 1, '2023-05-12', '10:00', 'selesai', 1470243988),
(53, 21, 12, 1, '2023-05-27', '13:00', 'selesai', 1732817910),
(54, 11, 12, 1, '2023-06-01', '10:00', 'selesai', 1582894340),
(55, 11, 12, 1, '2023-06-10', '10:00', 'selesai', 1830345575),
(56, 11, 12, 3, '2023-06-11', '13:00', 'selesai', 754213413),
(58, 11, 12, 1, '2023-06-17', '10:00', 'selesai', 76914449),
(59, 11, 12, 4, '2023-06-24', '13:00', 'selesai', 2046200757),
(60, 11, 12, 4, '2023-06-30', '13:00', 'selesai', 1444552867),
(61, 12, 15, 1, '2023-06-03', '10:00', 'selesai', 682595337),
(62, 12, 16, 4, '2023-06-10', '13:00', 'selesai', 1222659556),
(63, 12, 17, 1, '2023-06-20', '13:00', 'selesai', 1296481369),
(64, 12, 16, 3, '2023-06-21', '10:00', 'selesai', 60013899),
(65, 12, 14, 1, '2023-06-30', '10:00', 'selesai', 412672763),
(66, 13, 17, 1, '2023-06-02', '10:00', 'selesai', 1317828184),
(67, 13, 15, 3, '2023-06-03', '10:00', 'selesai', 1448177638),
(68, 13, 12, 3, '2023-06-10', '13:00', 'selesai', 558620309),
(69, 13, 15, 1, '2023-06-17', '10:00', 'selesai', 2043810819),
(70, 13, 16, 1, '2023-06-24', '10:00', 'selesai', 1018247347),
(71, 13, 14, 1, '2023-06-30', '13:00', 'selesai', 697999011),
(72, 14, 17, 1, '2023-06-04', '10:00', 'selesai', 1028379853),
(73, 14, 14, 4, '2023-06-10', '13:00', 'selesai', 67898553),
(75, 14, 15, 1, '2023-06-17', '10:00', 'selesai', 635776611),
(76, 14, 15, 3, '2023-06-18', '10:00', 'selesai', 1412688181),
(77, 14, 12, 1, '2023-06-24', '13:00', 'selesai', 811878431),
(78, 14, 12, 1, '2023-06-30', '13:00', 'selesai', 1559536823),
(79, 16, 15, 1, '2023-06-01', '10:00', 'selesai', 1772915976),
(80, 16, 17, 3, '2023-06-03', '10:00', 'selesai', 1768144353),
(81, 16, 15, 4, '2023-06-17', '10:00', 'selesai', 656827366),
(82, 16, 12, 1, '2023-06-21', '10:00', 'selesai', 1088177908),
(83, 16, 15, 1, '2023-06-30', '10:00', 'selesai', 303311996),
(84, 18, 12, 4, '2023-06-03', '10:00', 'selesai', 1659289038),
(85, 18, 14, 1, '2023-06-10', '10:00', 'selesai', 374795689),
(86, 18, 12, 3, '2023-06-11', '10:00', 'selesai', 167270696),
(87, 18, 12, 1, '2023-06-20', '10:00', 'selesai', 1371089384),
(88, 18, 12, 1, '2023-06-30', '10:00', 'selesai', 1745703063),
(89, 19, 12, 1, '2023-06-04', '10:00', 'selesai', 1115775470),
(90, 19, 12, 3, '2023-06-14', '10:00', 'selesai', 1456898956),
(91, 19, 14, 1, '2023-06-20', '10:00', 'selesai', 1731918529),
(92, 19, 16, 1, '2023-06-30', '13:00', 'selesai', 1595978741),
(93, 20, 17, 1, '2023-06-07', '10:00', 'selesai', 1487408956),
(94, 20, 12, 3, '2023-06-10', '10:00', 'selesai', 1292385735),
(95, 20, 15, 4, '2023-06-17', '13:00', 'selesai', 1459413604),
(96, 20, 16, 1, '2023-06-24', '13:00', 'selesai', 1916961266),
(97, 20, 12, 1, '2023-06-30', '10:00', 'selesai', 1891909713),
(98, 21, 16, 1, '2023-06-01', '10:00', 'selesai', 306534446),
(99, 21, 17, 1, '2023-06-10', '10:00', 'selesai', 1427968186),
(100, 21, 14, 1, '2023-06-17', '10:00', 'selesai', 229871264),
(101, 21, 12, 1, '2023-06-24', '10:00', 'selesai', 1793121060),
(102, 21, 15, 1, '2023-06-30', '13:00', 'selesai', 139960001),
(103, 11, 17, 1, '2023-07-04', '10:00', 'selesai', 1204450210),
(126, 11, 12, 1, '2023-07-07', '13:00', 'selesai', 1478971403),
(127, 11, 12, 1, '2023-07-06', '10:00', 'selesai', 1070161332),
(128, 11, 12, 1, '2023-07-11', '10:00', 'reserved', 1862661534),
(129, 11, 12, 1, '2023-07-07', '13:00', 'cancelled', 744647947),
(130, 11, 12, 2, '2023-07-10', '13:00', 'cancelled', 1927120019),
(131, 11, 12, 1, '2023-07-07', '13:00', 'selesai', 768108816);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'admin'),
(2, 'pegawai'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `id_pesanan`, `sales`) VALUES
(1, 10, 70000),
(2, 8, 75000),
(3, 1, 50000),
(4, 6, 250000),
(5, 51, 75000),
(6, 41, 50000),
(7, 50, 75000),
(8, 46, 250000),
(9, 53, 50000),
(10, 19, 50000),
(11, 31, 50000),
(12, 52, 50000),
(13, 39, 50000),
(14, 21, 50000),
(15, 30, 50000),
(16, 25, 75000),
(17, 34, 75000),
(18, 28, 250000),
(19, 32, 250000),
(20, 24, 250000),
(21, 49, 50000),
(22, 7, 250000),
(23, 43, 75000),
(24, 48, 250000),
(25, 47, 50000),
(26, 29, 50000),
(27, 11, 50000),
(28, 40, 75000),
(29, 14, 250000),
(30, 20, 250000),
(31, 45, 75000),
(32, 15, 50000),
(33, 12, 50000),
(34, 35, 75000),
(35, 33, 50000),
(36, 27, 50000),
(37, 17, 75000),
(38, 22, 50000),
(39, 42, 50000),
(40, 26, 50000),
(41, 78, 50000),
(42, 97, 50000),
(43, 88, 50000),
(44, 60, 75000),
(45, 59, 75000),
(46, 77, 50000),
(47, 101, 50000),
(48, 82, 50000),
(49, 87, 50000),
(50, 58, 50000),
(51, 90, 75000),
(52, 86, 75000),
(53, 56, 75000),
(54, 94, 75000),
(55, 55, 50000),
(56, 68, 75000),
(57, 51, 75000),
(58, 89, 50000),
(59, 84, 75000),
(60, 54, 50000),
(61, 65, 50000),
(62, 71, 50000),
(63, 91, 50000),
(64, 100, 50000),
(65, 85, 50000),
(66, 73, 75000),
(67, 102, 50000),
(68, 83, 50000),
(69, 76, 75000),
(70, 95, 75000),
(71, 69, 50000),
(72, 81, 75000),
(73, 75, 50000),
(74, 61, 50000),
(75, 67, 75000),
(76, 79, 50000),
(77, 92, 50000),
(78, 96, 50000),
(79, 70, 50000),
(80, 64, 75000),
(81, 62, 75000),
(82, 98, 50000),
(83, 63, 50000),
(84, 99, 50000),
(85, 93, 50000),
(86, 72, 50000),
(87, 80, 75000),
(88, 66, 50000),
(89, 103, 100000),
(91, 127, 50000),
(92, 126, 50000),
(93, 131, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `service`, `harga`, `keterangan`) VALUES
(1, 'Cukur', 50000, 'model cukur apapun'),
(2, 'SPA', 250000, 'dari ujung badan ampe ujung kaki bersih'),
(3, 'coloring', 75000, 'mewarnai rambut'),
(4, 'curling', 75000, 'mengkritingkan rambut');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `role`) VALUES
(24, 'viano', 'viano@gmail.com', 'bb35f134a9893fe36f6ae2779cd64162', 3),
(25, 'vahri', 'vahri@gmail.com', '43da8a8edad1341ba59f364e11a667bb', 3),
(26, 'Tomi', 'tomi@gmail.com', '08767d10c94125f26f95eaadb5ebb98a', 3),
(27, 'rafli', 'rafli@gmail.com', '054a3c3033e8f672358b1e159aecc7a7', 3),
(29, 'dafa', 'dafa@gmail.com', 'a1cd64bd35bd9f2ba71f4da62d3359bc', 3),
(31, 'Burhan', 'burhan@gmail.com', 'fe9e3203ad8d1387bf8c8d1d889b902b', 3),
(32, 'danu', 'danu@gmail.com', 'a29e5a0efaa2b1521ebea7cf10cd0eab', 3),
(33, 'Ahsan', 'ahsan@gmail.com', '74870a2fd40b4d9926a5849f64fa2fca', 3),
(34, 'Riski', 'riski@gmail.com', '6e24184c9f8092a67bcd413cbcf598da', 3),
(35, 'fikri', 'fikri@gmail.com', '5d4864249b21de08642aa6ff4178b346', 2),
(37, 'Hasan', 'hasan@gmail.com', 'fc3f318fba8b3c1502bece62a27712df', 2),
(38, 'richard', 'richard@gmail.com', '6ae199a93c381bf6d5de27491139d3f9', 2),
(39, 'maulana', 'maulana@gmail.com', 'aff4b352312d5569903d88e0e68d3fbb', 2),
(40, 'raja', 'raja@gmail.com', '526e34d04735124f05a090181f3e6e8a', 2),
(41, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`id_barber`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barber` (`id_barber`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barber`
--
ALTER TABLE `barber`
  MODIFY `id_barber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barber`
--
ALTER TABLE `barber`
  ADD CONSTRAINT `barber_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_barber`) REFERENCES `barber` (`id_barber`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
