-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.58-0ubuntu0.14.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_tridaya
CREATE DATABASE IF NOT EXISTS `db_tridaya` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_tridaya`;

-- Dumping structure for table db_tridaya.m_akun
CREATE TABLE IF NOT EXISTS `m_akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_akun: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_akun` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_akun` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_informasi
CREATE TABLE IF NOT EXISTS `m_informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `informasi` longtext,
  `deleted` enum('true','false') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_informasi_m_unit` (`id_unit`),
  KEY `FK_m_informasi_m_akun` (`id_user`),
  CONSTRAINT `FK_m_informasi_m_akun` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_m_informasi_m_unit` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_informasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_informasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_informasi` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_jadwal
CREATE TABLE IF NOT EXISTS `m_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `start` varchar(50) DEFAULT NULL,
  `end` varchar(50) DEFAULT NULL,
  `jadwal_type` enum('kerja','ngajar') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_jadwal_m_unit` (`id_unit`),
  CONSTRAINT `FK_m_jadwal_m_unit` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_jadwal: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_jadwal` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_jadwal` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_kelas
CREATE TABLE IF NOT EXISTS `m_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) DEFAULT NULL,
  `tahun_ajaran` varchar(50) DEFAULT NULL,
  `tipe_kelas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_kelas_m_unit` (`id_unit`),
  CONSTRAINT `FK_m_kelas_m_unit` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_kelas: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_kelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_kelas` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_level
CREATE TABLE IF NOT EXISTS `m_level` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_level: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_level` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_level` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_mapel
CREATE TABLE IF NOT EXISTS `m_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_mapel_m_unit` (`id_unit`),
  CONSTRAINT `FK_m_mapel_m_unit` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_mapel: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_mapel` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_mapel` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_tahun_ajaran
CREATE TABLE IF NOT EXISTS `m_tahun_ajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_tahun_ajaran_m_unit` (`id_unit`),
  CONSTRAINT `FK_m_tahun_ajaran_m_unit` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_tahun_ajaran: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_tahun_ajaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_tahun_ajaran` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_tipe_kelas
CREATE TABLE IF NOT EXISTS `m_tipe_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_tipe_kelas_m_unit` (`id_unit`),
  CONSTRAINT `FK_m_tipe_kelas_m_unit` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_tipe_kelas: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_tipe_kelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_tipe_kelas` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_unit
CREATE TABLE IF NOT EXISTS `m_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `deleted` enum('true','false') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_unit: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_unit` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.m_user
CREATE TABLE IF NOT EXISTS `m_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `alamat` varchar(200) NOT NULL DEFAULT '0',
  `notelp` varchar(15) NOT NULL DEFAULT '0',
  `kecamatan` varchar(100) NOT NULL DEFAULT '0',
  `kelurahan` varchar(100) NOT NULL DEFAULT '0',
  `kabupaten_kota` varchar(100) NOT NULL DEFAULT '0',
  `provinsi` varchar(100) NOT NULL DEFAULT '0',
  `tipe_akun` varchar(100) NOT NULL DEFAULT '0',
  `tahun_ajaran` varchar(20) NOT NULL DEFAULT '0',
  `deleted` enum('true','false') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.m_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_user` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.t_jadwal
CREATE TABLE IF NOT EXISTS `t_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_t_jadwal_m_kelas` (`id_kelas`),
  KEY `FK_t_jadwal_m_jadwal` (`id_jadwal`),
  KEY `FK_t_jadwal_m_mapel` (`id_mapel`),
  CONSTRAINT `FK_t_jadwal_m_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `m_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_t_jadwal_m_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `m_jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_t_jadwal_m_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `m_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.t_jadwal: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_jadwal` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_jadwal` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.t_kelas
CREATE TABLE IF NOT EXISTS `t_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_t_kelas_m_kelas` (`id_kelas`),
  KEY `FK_t_kelas_m_user` (`id_user`),
  CONSTRAINT `FK_t_kelas_m_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `m_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_t_kelas_m_user` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.t_kelas: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_kelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_kelas` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.t_mapel
CREATE TABLE IF NOT EXISTS `t_mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_t_mapel_m_mapel` (`id_mapel`),
  KEY `FK_t_mapel_m_user` (`id_user`),
  CONSTRAINT `FK_t_mapel_m_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `m_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_t_mapel_m_user` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.t_mapel: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_mapel` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_mapel` ENABLE KEYS */;

-- Dumping structure for table db_tridaya.t_raport
CREATE TABLE IF NOT EXISTS `t_raport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_t_raport_m_tahun_ajaran` (`tahun_ajaran`),
  KEY `FK_t_raport_m_user` (`id_user`),
  KEY `FK_t_raport_m_mapel` (`id_mapel`),
  CONSTRAINT `FK_t_raport_m_tahun_ajaran` FOREIGN KEY (`tahun_ajaran`) REFERENCES `m_tahun_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_t_raport_m_user` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_t_raport_m_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `m_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_tridaya.t_raport: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_raport` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_raport` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
