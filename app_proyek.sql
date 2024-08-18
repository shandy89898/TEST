-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2024 at 05:35 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE IF NOT EXISTS `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4334237 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `negara`, `provinsi`, `kota`, `created_at`) VALUES
(4334236, 'Kampung okas', 'Amerika', 'Banten', 'Tangerang', '2024-08-18 16:31:00'),
(8, '1', '1', '1', '1', '2024-08-18 14:26:48'),
(9, 'Jakarta', 'Indonesia', 'Banten', 'Tangerang', '2024-08-18 14:35:08'),
(10, 'Jakarta', 'Shandy', 'banten', 'tangerang', '2024-08-18 14:59:03'),
(11, 'Jakarta', 'Shandy', 'banten', 'tangerang', '2024-08-18 15:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

DROP TABLE IF EXISTS `proyek`;
CREATE TABLE IF NOT EXISTS `proyek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_proyek` varchar(100) NOT NULL,
  `client` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `pimpinan_proyek` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4334237 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `nama_proyek`, `client`, `tgl_mulai`, `tgl_selesai`, `pimpinan_proyek`, `keterangan`, `created_at`) VALUES
(4334235, 'Proyek IKN', 'Shnady', '2024-08-07', '2024-08-08', 'JUNIAR', 'asda', '2024-08-18 16:29:24'),
(4334236, 'Proyek Tangerang', 'Irshandy', '2024-08-07', '2024-08-20', 'Juniar', 'asdasd', '2024-08-18 16:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `proyek_lokasi`
--

DROP TABLE IF EXISTS `proyek_lokasi`;
CREATE TABLE IF NOT EXISTS `proyek_lokasi` (
  `id_proyek_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `proyek_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  PRIMARY KEY (`id_proyek_lokasi`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_lokasi`
--

INSERT INTO `proyek_lokasi` (`id_proyek_lokasi`, `proyek_id`, `lokasi_id`) VALUES
(1, 4334235, 9),
(2, 4334235, 4334236);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
