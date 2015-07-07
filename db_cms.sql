SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_banners`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_banners`;
CREATE TABLE `tbl_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `banners_title` varchar(255) DEFAULT NULL,
  `banners_file` text,
  `publish` enum('Ya','Tidak') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_banners
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_news`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_content` text,
  `news_file` text,
  `publish` enum('Ya','Tidak') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_news
-- ----------------------------
INSERT INTO `tbl_news` VALUES ('10', '18', 'Abraham: Saya lebih baik diam, ini sebuah pelajaran', '<p><img alt=\"\" src=\"/lapas/assets/plugins/kcfinder/upload/images/abraham-saya-lebih-baik-diam-ini-sebuah-pelajaran.jpg\" style=\"height:300px; width:600px\" /></p>\r\n\r\n<p><strong>Merdeka.com</strong> - Lama tak muncul, Ketua Komisi Pemberantasan Korupsi (KPK) nonaktif, Abraham Samad, hadir di acara BEM Universitas Indonesia yang digelar di Kampus Salemba, Jakarta Pusat. Ini kemunculan pertama Abraham setelah Presiden Joko Widodo memutuskan mengganti dirinya dan mengangkat pelaksana tugas (Plt) pimpinan KPK.</p>\r\n\r\n<p>Abraham yang mengenakan koko putih mulanya tak mau bicara soal kondisi KPK, termasuk penanganan kasusnya. Dia tak mau dikira kemunculannya hari ini untuk menunjukkan eksistensi diri.</p>\r\n\r\n<p>&quot;Saya ini kan dituduh macam-macam. Saya kan sudah nonaktif, kalau saya terus muncul nanti orang ngira saya mau comeback, saya lebih baik diam sebagai ini sebuah pelajaran,&quot; kata Abraham ditemui di lokasi, Jakarta, Jumat (20/3).</p>\r\n\r\n<p>Soal perkembangan kasusnya pun, Abraham tak mau menjelaskan berulang kali. Dia menegaskan, sebagai manusia dia mengaku salah tapi tak seburuk yang dituduhkan padanya dalam kasus dugaan dokumen palsu.</p>\r\n\r\n<p>&quot;Saya bukan malaikat. tapi kita tidak sebejat yang dituduhkan. Itu kan keliatan semua mncul setelah tersangka. Kalau saya punya kasus kenapa tidak dari awal,&quot; ucapnya sesal.</p>\r\n\r\n<p>Saat ditanya lebih jauh soal kasusnya yang sementara dihentikan dulu, Abraham bungkam. Dia memilih menceritakan kegiatannya saat ini yang lebih banyak menghabiskan waktu bersama keluarga.</p>\r\n\r\n<p>&quot;Selama ini saya di kampung halaman dan kumpul-kumpul sama keluarga. Selama ini kan jarang kumpul sama keluarga apa lagi anak-anak, kita pulang malam anak-anak sudah tidur,&quot; tambahnya.</p>\r\n\r\n<p>Saat kembali ditanya seputar KPK, Abraham mulanya tersenyum. Dia hanya menjawab singkat soal kredibilitas pimpinan KPK saat ini di mana tiga di antaranya menjabat sebagai Plt.</p>\r\n\r\n<p>&quot;Baik,&quot; ucapnya singkat.</p>\r\n\r\n<p>Abraham memang menghilang sejak dinonaktifkan dari KPK. Jabatan Abraham saat ini diisi bekas pimpinan KPK terdahulu, Taufiequrachman Ruki.</p>\r\n', null, 'Ya', '2015-03-20', null);

-- ----------------------------
-- Table structure for `tbl_photos`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_photos`;
CREATE TABLE `tbl_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `photos_title` varchar(255) DEFAULT NULL,
  `photos_file` text,
  `photos_desc` text,
  `publish` enum('Ya','Tidak') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_photos
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_roles`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_roles
-- ----------------------------
INSERT INTO `tbl_roles` VALUES ('1', 'Super Admin');
INSERT INTO `tbl_roles` VALUES ('2', 'Administrator');
INSERT INTO `tbl_roles` VALUES ('3', 'User');

-- ----------------------------
-- Table structure for `tbl_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sessions`;
CREATE TABLE `tbl_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_sessions
-- ----------------------------
INSERT INTO `tbl_sessions` VALUES ('3c4c3f979e059dc9d272ee2ec92a2a1c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', '1427862231', 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";i:1;s:2:\"id\";s:2:\"18\";s:9:\"firstname\";s:3:\"Ado\";s:8:\"lastname\";s:8:\"Pabianko\";s:8:\"username\";s:11:\"adopabianko\";s:12:\"date_created\";s:10:\"2015-03-19\";}');
INSERT INTO `tbl_sessions` VALUES ('9d4ce1d0747b36a1699e237eea949f57', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', '1428039789', 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";i:1;s:2:\"id\";s:2:\"18\";s:9:\"firstname\";s:3:\"Ado\";s:8:\"lastname\";s:8:\"Pabianko\";s:8:\"username\";s:11:\"adopabianko\";s:12:\"date_created\";s:10:\"2015-03-19\";}');
INSERT INTO `tbl_sessions` VALUES ('de8637958a93d2d19c5d86ad77588a1c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', '1427554281', 'a:7:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";i:1;s:2:\"id\";s:2:\"18\";s:9:\"firstname\";s:3:\"Ado\";s:8:\"lastname\";s:8:\"Pabianko\";s:8:\"username\";s:11:\"adopabianko\";s:12:\"date_created\";s:10:\"2015-03-19\";}');

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
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
  KEY `role_id` (`role_id`),
  CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('18', '1', 'Ado', 'Pabianko', 'adopabianko', '0192023a7bbd73250516f069df18b500', 'Aktif', '2015-03-19', '2015-03-19');

-- ----------------------------
-- Table structure for `tbl_videos`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_videos`;
CREATE TABLE `tbl_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `videos_title` varchar(255) DEFAULT NULL,
  `videos_link` text,
  `videos_desc` text,
  `publish` enum('Ya','Tidak') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_videos
-- ----------------------------

-- ----------------------------
-- View structure for `users`
-- ----------------------------
DROP VIEW IF EXISTS `users`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users` AS select `tbl_roles`.`rolename` AS `rolename`,`tbl_users`.`firstname` AS `firstname`,`tbl_users`.`id` AS `id`,`tbl_users`.`lastname` AS `lastname`,`tbl_users`.`active` AS `active`,`tbl_users`.`username` AS `username` from (`tbl_roles` join `tbl_users` on((`tbl_roles`.`id` = `tbl_users`.`role_id`))) ;
