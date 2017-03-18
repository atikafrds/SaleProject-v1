-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Okt 2016 pada 12.05
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Database: `tbddb`
--
-- --------------------------------------------------------
--
-- Struktur dari tabel `catalog`
--
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `liked` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data untuk tabel `catalog`
--
INSERT INTO `catalog` (`id`, `name`, `price`, `description`, `liked`, `timestamp`, `quantity`, `photo`, `id_user`) VALUES
(3, 'Pink Dress', 350000, 'Watch your daughter become the star of the party in this blush pink love dress that comes with a crocheted cape.',
  111, '2016-09-24 13:38:13', 27, 'dress.jpg', 16),
(14, 'Nutella', 125000, '26.5 Ounce (750g), no artificial colors or preservatives, made with Skim Milk and Hazelnut,
  Peanut Free, Kosher', 109, '2016-09-24 13:18:18', 11, 'nutella.jpg', 2),
(22, '', 10000, '15.6" FHD (19201080), matte, Black / Silver (metal), Intel Core i7-6500U 2.5GHz (Turbo up to 3.1GHz) Sky lake, 
NVidia GTX950M 2GB GDDR3, 256GB SSD, 802.11AC, Bluetooth 4.0, Windows 10 (64bit)', 10, '2016-09-24 13:24:53', 21, 'laptop.jpg', 2);
-- --------------------------------------------------------
--
-- Struktur dari tabel `transaction`
--
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_buyer` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `postal` varchar(8) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `cc_number` varchar(12) NOT NULL,
  `verif_value` varchar(3) NOT NULL,
  `uname_seller` varchar(30) NOT NULL,
  `uname_buyer` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
--
-- Dumping data untuk tabel `transaction`
--
INSERT INTO `transaction` (`id`, `id_product`, `id_buyer`, `id_seller`, `quantity`, `timestamp`, `name`, `address`, `postal`, `phone`, `cc_number`, `verif_value`, `uname_seller`, `uname_buyer`) VALUES
(5, 22, 16, 2, 1, '2016-10-06 11:49:54', 'Atika Firdaus', 'Bandung', '123456', '081312362451', '123456789087', '045', 'anwarramadha', 'atikafrds');
-- --------------------------------------------------------
--
-- Struktur dari tabel `users`
--
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `postal` varchar(8) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `id` int(11) NOT NULL,
  `likes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
--
-- Dumping data untuk tabel `users`
--
INSERT INTO `users` (`name`, `username`, `email`, `password`, `address`, `postal`, `phone`, `id`, `likes`) VALUES
('HP ASUS', 'hpasus', 'hpasus@gmail.com', 'MTIzNDU2', 'Bandung', '123456', '081312362451', 0, ';;22;'),
('Anwar Ramadha', 'anwarramadha', 'anwar.ramadha@gmail.com', 'MTIzNDU2', 'Bandung', '123456', '081312362451', 2, ';132;3;22;'),
('Atika Firdaus', 'atikafrds', 'atika@gmail.com', 'MTIzNDU2', 'Bandung', '123456', '081312362451', 16, ';;132;');
--
-- Indexes for dumped tables
--
--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;