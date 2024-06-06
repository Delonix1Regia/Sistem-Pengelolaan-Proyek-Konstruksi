-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for uas_web
CREATE DATABASE IF NOT EXISTS `uas_web` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `uas_web`;

-- Dumping structure for table uas_web.arsitek
CREATE TABLE IF NOT EXISTS `arsitek` (
  `id_arsitek` int NOT NULL AUTO_INCREMENT,
  `nama_arsitek` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id_arsitek`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.arsitek: ~3 rows (approximately)
INSERT INTO `arsitek` (`id_arsitek`, `nama_arsitek`) VALUES
	(101, 'Studio Arsitek Urban'),
	(102, 'Arsitek Inovatif'),
	(103, 'Desain Kreatif');

-- Dumping structure for table uas_web.biaya
CREATE TABLE IF NOT EXISTS `biaya` (
  `id_biaya` int NOT NULL AUTO_INCREMENT,
  `jml_biaya` int DEFAULT NULL,
  PRIMARY KEY (`id_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.biaya: ~8 rows (approximately)
INSERT INTO `biaya` (`id_biaya`, `jml_biaya`) VALUES
	(201, 100000000),
	(202, 50000000),
	(203, 25000000),
	(204, 5000000),
	(205, 4000000),
	(206, 3000000),
	(207, 2000000),
	(208, 1000000);

-- Dumping structure for table uas_web.klien
CREATE TABLE IF NOT EXISTS `klien` (
  `id_klien` int NOT NULL AUTO_INCREMENT,
  `nama_klien` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id_klien`)
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.klien: ~3 rows (approximately)
INSERT INTO `klien` (`id_klien`, `nama_klien`) VALUES
	(301, 'Korporasi Maju'),
	(302, 'Reality Lagoan'),
	(303, 'Ciputra Group');

-- Dumping structure for table uas_web.kontraktor
CREATE TABLE IF NOT EXISTS `kontraktor` (
  `id_kontraktor` int NOT NULL AUTO_INCREMENT,
  `nama_kontraktor` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id_kontraktor`)
) ENGINE=InnoDB AUTO_INCREMENT=404 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.kontraktor: ~3 rows (approximately)
INSERT INTO `kontraktor` (`id_kontraktor`, `nama_kontraktor`) VALUES
	(401, 'Pembangunan Utama'),
	(402, 'Citra Pembangunan'),
	(403, 'Bangunan Pro');

-- Dumping structure for table uas_web.material
CREATE TABLE IF NOT EXISTS `material` (
  `id_material` int NOT NULL AUTO_INCREMENT,
  `nama_material` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `id_alat` int DEFAULT NULL,
  PRIMARY KEY (`id_material`),
  KEY `id_alat` (`id_alat`),
  CONSTRAINT `FK__peralatan` FOREIGN KEY (`id_alat`) REFERENCES `peralatan` (`id_alat`)
) ENGINE=InnoDB AUTO_INCREMENT=503 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.material: ~2 rows (approximately)
INSERT INTO `material` (`id_material`, `nama_material`, `id_alat`) VALUES
	(501, 'Semen', 605),
	(502, 'Baja', 602);

-- Dumping structure for table uas_web.peralatan
CREATE TABLE IF NOT EXISTS `peralatan` (
  `id_alat` int NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB AUTO_INCREMENT=608 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.peralatan: ~4 rows (approximately)
INSERT INTO `peralatan` (`id_alat`, `nama_alat`) VALUES
	(601, 'Crane'),
	(602, 'Buldoser'),
	(603, 'Mixer Beton'),
	(604, 'Loader'),
	(605, 'Traktor'),
	(606, 'Grader'),
	(607, 'Excavator');

-- Dumping structure for table uas_web.progress
CREATE TABLE IF NOT EXISTS `progress` (
  `id_progress` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id_progress`)
) ENGINE=InnoDB AUTO_INCREMENT=705 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.progress: ~4 rows (approximately)
INSERT INTO `progress` (`id_progress`, `status`) VALUES
	(701, 'Done'),
	(702, 'On Progress'),
	(703, 'Need Approval'),
	(704, 'Pending');

-- Dumping structure for table uas_web.proyek
CREATE TABLE IF NOT EXISTS `proyek` (
  `id_proyek` int NOT NULL AUTO_INCREMENT,
  `nama_proyek` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `id_klien` int DEFAULT NULL,
  `id_arsitek` int DEFAULT NULL,
  `id_kontraktor` int DEFAULT NULL,
  `id_biaya` int DEFAULT NULL,
  PRIMARY KEY (`id_proyek`),
  KEY `id_klien` (`id_klien`),
  KEY `id_arsitek` (`id_arsitek`),
  KEY `id_kontraktor` (`id_kontraktor`),
  KEY `id_biaya` (`id_biaya`),
  CONSTRAINT `FK__klien` FOREIGN KEY (`id_klien`) REFERENCES `klien` (`id_klien`),
  CONSTRAINT `FK_proyek_arsitek` FOREIGN KEY (`id_arsitek`) REFERENCES `arsitek` (`id_arsitek`),
  CONSTRAINT `FK_proyek_biaya` FOREIGN KEY (`id_biaya`) REFERENCES `biaya` (`id_biaya`),
  CONSTRAINT `FK_proyek_kontraktor` FOREIGN KEY (`id_kontraktor`) REFERENCES `kontraktor` (`id_kontraktor`)
) ENGINE=InnoDB AUTO_INCREMENT=803 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.proyek: ~2 rows (approximately)
INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `id_klien`, `id_arsitek`, `id_kontraktor`, `id_biaya`) VALUES
	(801, 'Menara Apartemen Skyline', 301, 102, 402, 201),
	(802, 'Apartemen Jingga', 302, 101, 401, 202);

-- Dumping structure for table uas_web.register
CREATE TABLE IF NOT EXISTS `register` (
  `username` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `password` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `namalengkap` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `status` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.register: ~1 rows (approximately)
INSERT INTO `register` (`username`, `password`, `namalengkap`, `status`) VALUES
	('diah123', '12345', 'Diah Ayu Rahma', 'Admin');

-- Dumping structure for table uas_web.teknisi
CREATE TABLE IF NOT EXISTS `teknisi` (
  `id_teknisi` int NOT NULL AUTO_INCREMENT,
  `nama_teknisi` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `id_kontraktor` int DEFAULT NULL,
  PRIMARY KEY (`id_teknisi`),
  KEY `id_kontraktor` (`id_kontraktor`),
  CONSTRAINT `FK__kontraktor` FOREIGN KEY (`id_kontraktor`) REFERENCES `kontraktor` (`id_kontraktor`)
) ENGINE=InnoDB AUTO_INCREMENT=902 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.teknisi: ~1 rows (approximately)
INSERT INTO `teknisi` (`id_teknisi`, `nama_teknisi`, `id_kontraktor`) VALUES
	(901, 'Konsultan Struktur', 401);

-- Dumping structure for table uas_web.tugas
CREATE TABLE IF NOT EXISTS `tugas` (
  `id_tugas` int NOT NULL AUTO_INCREMENT,
  `nama_tugas` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `id_material` int DEFAULT NULL,
  `id_proyek` int DEFAULT NULL,
  `id_progress` int DEFAULT NULL,
  PRIMARY KEY (`id_tugas`),
  KEY `id_progress` (`id_progress`),
  KEY `id_material` (`id_material`),
  KEY `id_proyek` (`id_proyek`),
  CONSTRAINT `FK__material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  CONSTRAINT `FK__progress` FOREIGN KEY (`id_progress`) REFERENCES `progress` (`id_progress`),
  CONSTRAINT `FK__proyek` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table uas_web.tugas: ~4 rows (approximately)
INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `id_material`, `id_proyek`, `id_progress`) VALUES
	(1003, 'Atap', 502, 801, 702),
	(1004, 'Pagar', 502, 801, 702),
	(1006, 'Pekerjaan Pondasi', 501, 801, 703),
	(1007, 'Pilar', 502, 802, 702);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
