-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2015 at 09:58 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banners`
--

CREATE TABLE IF NOT EXISTS `tbl_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `banners_title` varchar(255) DEFAULT NULL,
  `banners_file` text,
  `publish` enum('Ya','Tidak') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_content` text,
  `news_file` text,
  `publish` enum('Ya','Tidak') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `user_id`, `news_title`, `news_content`, `news_file`, `publish`, `date_created`, `date_modified`) VALUES
(10, 18, 'Abraham: Saya lebih baik diam, ini sebuah pelajaran', '<p><img alt="" src="/admin_cms/public/plugins/kcfinder/upload/images/abraham-saya-lebih-baik-diam-ini-sebuah-pelajaran.jpg" style="height:300px; width:600px" /></p>\n\n<p><strong>Merdeka.com</strong> - Lama tak muncul, Ketua Komisi Pemberantasan Korupsi (KPK) nonaktif, Abraham Samad, hadir di acara BEM Universitas Indonesia yang digelar di Kampus Salemba, Jakarta Pusat. Ini kemunculan pertama Abraham setelah Presiden Joko Widodo memutuskan mengganti dirinya dan mengangkat pelaksana tugas (Plt) pimpinan KPK.</p>\n\n<p>Abraham yang mengenakan koko putih mulanya tak mau bicara soal kondisi KPK, termasuk penanganan kasusnya. Dia tak mau dikira kemunculannya hari ini untuk menunjukkan eksistensi diri.</p>\n\n<p>&quot;Saya ini kan dituduh macam-macam. Saya kan sudah nonaktif, kalau saya terus muncul nanti orang ngira saya mau comeback, saya lebih baik diam sebagai ini sebuah pelajaran,&quot; kata Abraham ditemui di lokasi, Jakarta, Jumat (20/3).</p>\n\n<p>Soal perkembangan kasusnya pun, Abraham tak mau menjelaskan berulang kali. Dia menegaskan, sebagai manusia dia mengaku salah tapi tak seburuk yang dituduhkan padanya dalam kasus dugaan dokumen palsu.</p>\n\n<p>&quot;Saya bukan malaikat. tapi kita tidak sebejat yang dituduhkan. Itu kan keliatan semua mncul setelah tersangka. Kalau saya punya kasus kenapa tidak dari awal,&quot; ucapnya sesal.</p>\n\n<p>Saat ditanya lebih jauh soal kasusnya yang sementara dihentikan dulu, Abraham bungkam. Dia memilih menceritakan kegiatannya saat ini yang lebih banyak menghabiskan waktu bersama keluarga.</p>\n\n<p>&quot;Selama ini saya di kampung halaman dan kumpul-kumpul sama keluarga. Selama ini kan jarang kumpul sama keluarga apa lagi anak-anak, kita pulang malam anak-anak sudah tidur,&quot; tambahnya.</p>\n\n<p>Saat kembali ditanya seputar KPK, Abraham mulanya tersenyum. Dia hanya menjawab singkat soal kredibilitas pimpinan KPK saat ini di mana tiga di antaranya menjabat sebagai Plt.</p>\n\n<p>&quot;Baik,&quot; ucapnya singkat.</p>\n\n<p>Abraham memang menghilang sejak dinonaktifkan dari KPK. Jabatan Abraham saat ini diisi bekas pimpinan KPK terdahulu, Taufiequrachman Ruki.</p>\n', 'DSC_6253-2-640x356.jpg', 'Ya', '2015-03-20', '2015-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photos`
--

CREATE TABLE IF NOT EXISTS `tbl_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `photos_title` varchar(255) DEFAULT NULL,
  `photos_file` text,
  `photos_desc` text,
  `publish` enum('Ya','Tidak') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `rolename`) VALUES
(1, 'Super Admin'),
(2, 'Administrator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sessions`
--

CREATE TABLE IF NOT EXISTS `tbl_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sessions`
--

INSERT INTO `tbl_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8121be92a647c7ffcacf18150997dde5', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36', 1436540221, 'a:7:{s:9:"user_data";s:0:"";s:9:"logged_in";i:1;s:2:"id";s:2:"18";s:9:"firstname";s:3:"Ado";s:8:"lastname";s:8:"Pabianko";s:8:"username";s:11:"adopabianko";s:12:"date_created";s:10:"2015-03-19";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` enum('Aktif','Tidak Aktif') NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `role_id`, `firstname`, `lastname`, `username`, `password`, `active`, `date_created`, `date_modified`) VALUES
(18, 1, 'Ado', 'Pabianko', 'adopabianko', '0192023a7bbd73250516f069df18b500', 'Aktif', '2015-03-19', '2015-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `videos_title` varchar(255) DEFAULT NULL,
  `videos_link` text,
  `videos_desc` text,
  `publish` enum('Ya','Tidak') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `users`
--
CREATE TABLE IF NOT EXISTS `users` (
`rolename` varchar(30)
,`firstname` varchar(50)
,`id` int(11)
,`lastname` varchar(50)
,`active` enum('Aktif','Tidak Aktif')
,`username` varchar(50)
);
-- --------------------------------------------------------

--
-- Structure for view `users`
--
DROP TABLE IF EXISTS `users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users` AS select `tbl_roles`.`rolename` AS `rolename`,`tbl_users`.`firstname` AS `firstname`,`tbl_users`.`id` AS `id`,`tbl_users`.`lastname` AS `lastname`,`tbl_users`.`active` AS `active`,`tbl_users`.`username` AS `username` from (`tbl_roles` join `tbl_users` on((`tbl_roles`.`id` = `tbl_users`.`role_id`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
