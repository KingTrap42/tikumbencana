-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 03:27 AM
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
-- Database: `tikum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_evakuasi`
--

CREATE TABLE `tb_evakuasi` (
  `id_evakuasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `lat` varchar(55) NOT NULL,
  `lng` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_evakuasi`
--

INSERT INTO `tb_evakuasi` (`id_evakuasi`, `nama`, `alamat`, `no_hp`, `lat`, `lng`) VALUES
(7, 'Balai Buntar', 'Balai Buntar, Jl. Gedang, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38225', '0811223344556', '-3.8218532564707086', '102.29674776796449'),
(8, 'Benteng Malborough', 'JL. Benteng, Kebun keling, Kota Bengkulu, Bengkulu', '0811223344556', '-3.7871416698300053', '102.25181476240591'),
(9, 'Balai Kota Merah Putih', 'Balaikota Merah Putih, Pekan Sabtu, Kec. Selebar, Kota Bengkulu, Bengkulu', '0811223344556', '-3.8452989748661643', '102.35698302488196'),
(10, 'Semarak Stadion Bengkulu', 'JL. Semarak Raya, Bentiring Permai, Kota Bengkulu, Bengkulu', '0811223344556', '-3.793279058639232', '102.27335132012828');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_evakuasi`
--
ALTER TABLE `tb_evakuasi`
  ADD PRIMARY KEY (`id_evakuasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_evakuasi`
--
ALTER TABLE `tb_evakuasi`
  MODIFY `id_evakuasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
