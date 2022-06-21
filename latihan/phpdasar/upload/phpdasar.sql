-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 08:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(3) NOT NULL,
  `nrp` char(3) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `alamat`) VALUES
(1, '101', 'ajieaaaa', 'jakartaaaaa'),
(2, '102', 'dharma', 'lampung'),
(25, '111', 'desu', 'jkrt'),
(26, '123', 'wew', 'desuuu'),
(29, '121', '11', '11'),
(30, '11', '11', '111'),
(31, '12', '13', '33'),
(32, '12', '22', '222');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(7, 'ajie', '$2y$10$NlSHeDvQ7rpmtJRYDSz3O.pJLhibb1TFTJbLh.5c5cIjt3pqIVI3e'),
(8, 'dharma', '$2y$10$TJ9oa9iZ.gP6Bh5z6L.2..krcguHQDWAXuZDlcRSnQ///QnK/uCOi'),
(9, 'ajiee', '$2y$10$O6QiO8l.a7.OE0qQXdRxjO..2coWAjQt2NphLlIyryc5bg6Aia.YC'),
(10, 'ajieee', '$2y$10$IbgxhAiWlWx2fu5OifLHlOhRDA3B9YDR.ltYHF2brkDMvWHm8OcSy'),
(11, 'ajieeee', '$2y$10$7mQomtBItaUZZ1CkG6MVi.JcscSw2ll6QMXVAxbeCfEUCBrLvMJrm'),
(12, 'ajieeeee', '$2y$10$OnWFwh77ccS0sHCgCgxd3eqs.oya2peps0ZLpyTGApmAAVA.u0cPG'),
(13, 'ajies', '$2y$10$91PMiqCuyQQP7.VeWXB31.nU2OC40TENl45F8gURawRiM65AaPMem'),
(14, 'ajis', '$2y$10$3uxdIWD9Xqd/fukQCwR1iemg9rJCiv96be4WaoQw7Hwbasuf7NH5m'),
(15, 'ajiess', '$2y$10$cNqvYXjpJt6HHTtJyM5uMe4tu7dcnb4Xa5BanQXa6EEyeRzz8UTWi'),
(16, 'hiji', '$2y$10$Ovs0pUOO1w.GZheAquw.2em.IXSipMnAM3c3hmfGiojBXwCIn8hYq'),
(17, 'qqqqq', '$2y$10$4wsfZ/uP8NZ78OYV7GFkzey5u3boliyasahMFUKKRFxA5dbTK/z52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
