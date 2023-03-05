# ABMS : MySQL database backup
#
# Generated: Tuesday 24. January 2023
# Hostname: localhost
# Database: bis
# --------------------------------------------------------


#
# Delete any existing table `tbl_support`
#

DROP TABLE IF EXISTS `tbl_support`;


#
# Table structure of table `tbl_support`
#



CREATE TABLE `tbl_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




#
# Delete any existing table `tbl_users`
#

DROP TABLE IF EXISTS `tbl_users`;


#
# Table structure of table `tbl_users`
#



CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT '',
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_users VALUES("11","admin","d033e22ae348aeb5660fc2140aec35850c4da997","administrator","19012023121517ANIME_KUBO-SANWAMOBWOYURUSANAIEP1.jfif","2021-05-03 10:33:03");
INSERT INTO tbl_users VALUES("20","Sejeong","40bd001563085fc35165329ea1ff5c5ecbdbbeef","resident","18012023185423Sejeong.jpg","2023-01-19 01:54:23");
INSERT INTO tbl_users VALUES("24","qwe","056eafe7cf52220de2df36845b8ed170c67e23e3","resident","21012023061103AccidentalNeighbour.jpg","2023-01-21 12:47:52");
INSERT INTO tbl_users VALUES("55","www","c50267b906a652f2142cfab006e215c9f6fdc8a0","resident","21012023101634Charess.jpg","2023-01-21 17:06:05");
INSERT INTO tbl_users VALUES("56","333","43814346e21444aaf4f70841bf7ed5ae93f55a9d","resident","","2023-01-23 20:17:00");
INSERT INTO tbl_users VALUES("57","parrablesies","497f2fefebac38374053a8c8608808d85caac571","resident","","2023-01-23 21:16:25");
INSERT INTO tbl_users VALUES("59","qqq","a056c8d05ae9ac6ca180bc991b93b7ffe37563e0","resident","","2023-01-23 22:23:21");
INSERT INTO tbl_users VALUES("60","admin2","315f166c5aca63a157f7d41007675cb44a948b33","administrator","24012023042340YejiLockscreen.jfif","2023-01-24 11:23:40");



#
# Delete any existing table `tblblotter`
#

DROP TABLE IF EXISTS `tblblotter`;


#
# Table structure of table `tblblotter`
#



CREATE TABLE `tblblotter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant` varchar(100) DEFAULT NULL,
  `respondent` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `details` varchar(10000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tblblotter VALUES("34","Girl Topak","Boy Topak","12","Check up","Resident house","2023-01-24","12:46:00","wwwwww","Scheduled");
INSERT INTO tblblotter VALUES("35","Girl Topak","Boy Topak","12","Check up","Resident house","2023-01-24","12:47:00","qweqwe","Active");



#
# Delete any existing table `tblbrgy_info`
#

DROP TABLE IF EXISTS `tblbrgy_info`;


#
# Table structure of table `tblbrgy_info`
#



CREATE TABLE `tblbrgy_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `brgy_name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `city_logo` varchar(100) DEFAULT NULL,
  `brgy_logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblbrgy_info VALUES("1","Laguna","Calamba City","Canlubang","0919-1234567","This is the official Healthcare Center website of Barangay Canlubang, Calamba City Laguna. Visit us in our official facebook page at https://www.facebook.com/itsmearviegrajo","16012023121621HDwallpaper_memes,_3d.jpg","18012023154802Barangay_Canlubang_Seal.jpg","18012023154802Calamba,_Laguna_Seal.svg.png");



#
# Delete any existing table `tblchairmanship`
#

DROP TABLE IF EXISTS `tblchairmanship`;


#
# Table structure of table `tblchairmanship`
#



CREATE TABLE `tblchairmanship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblchairmanship VALUES("2","Presiding Officer");
INSERT INTO tblchairmanship VALUES("3","Committee on Appropriation");
INSERT INTO tblchairmanship VALUES("4","Committee on Peace & Order");
INSERT INTO tblchairmanship VALUES("5","Committee on Health");
INSERT INTO tblchairmanship VALUES("6","Committee on Education");
INSERT INTO tblchairmanship VALUES("7","Committee on Rules");
INSERT INTO tblchairmanship VALUES("8","Committee on Infra");
INSERT INTO tblchairmanship VALUES("9","Committee on Solid Waste");
INSERT INTO tblchairmanship VALUES("10","Committee on Sports");
INSERT INTO tblchairmanship VALUES("11","No Chairmanship");



#
# Delete any existing table `tblofficials`
#

DROP TABLE IF EXISTS `tblofficials`;


#
# Table structure of table `tblofficials`
#



CREATE TABLE `tblofficials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `chairmanship` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `termstart` date DEFAULT NULL,
  `termend` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblofficials VALUES("1","Peter Guevarra	","2","4","2021-04-29","2021-05-01","Active");
INSERT INTO tblofficials VALUES("4","Marlon A. Lorio","3","7","2021-04-03","2021-04-24","Active");
INSERT INTO tblofficials VALUES("5","GARRY A. RAFEL","4","8","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("6","TRILLION LOWRY	","5","9","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("7","MELANIE M. ELBOR	","6","10","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("8","ERLINDA V. VITUS	","7","11","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("9","JOEDAVINCE","8","12","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("10","ALEJANDRO A. CAGAMPANG	","9","13","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("11","JOSEPH P. PARDOS	","10","14","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("12","RUTH A. BACAG	","11","15","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("13","DIANNE A. CURRY	","11","16","2021-04-03","2021-04-03","Active");



#
# Delete any existing table `tblposition`
#

DROP TABLE IF EXISTS `tblposition`;


#
# Table structure of table `tblposition`
#



CREATE TABLE `tblposition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblposition VALUES("4","Captain","1");
INSERT INTO tblposition VALUES("7","Councilor 1","2");
INSERT INTO tblposition VALUES("8","Councilor 2","3");
INSERT INTO tblposition VALUES("9","Councilor 3","4");
INSERT INTO tblposition VALUES("10","Councilor 4","5");
INSERT INTO tblposition VALUES("11","Councilor 5","6");
INSERT INTO tblposition VALUES("12","Councilor 6","7");
INSERT INTO tblposition VALUES("13","Councilor 7","8");
INSERT INTO tblposition VALUES("14","SK Chairman","9");
INSERT INTO tblposition VALUES("15","Secretary","10");
INSERT INTO tblposition VALUES("16","Treasurer","11");



#
# Delete any existing table `tblprecinct`
#

DROP TABLE IF EXISTS `tblprecinct`;


#
# Table structure of table `tblprecinct`
#



CREATE TABLE `tblprecinct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precinct` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




#
# Delete any existing table `tblpurok`
#

DROP TABLE IF EXISTS `tblpurok`;


#
# Table structure of table `tblpurok`
#



CREATE TABLE `tblpurok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblpurok VALUES("13","Purok 2","Asia 2");
INSERT INTO tblpurok VALUES("14","Purok 9","Asia 1");
INSERT INTO tblpurok VALUES("15","Purok 1","Asia 1");
INSERT INTO tblpurok VALUES("16","Purok 3","");



#
# Delete any existing table `tblresident`
#

DROP TABLE IF EXISTS `tblresident`;


#
# Table structure of table `tblresident`
#



CREATE TABLE `tblresident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `national_id` varchar(100) DEFAULT NULL,
  `citizenship` varchar(50) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middlename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alias` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthplace` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `civilstatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `purok` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `voterstatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `identified_as` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `resident_type` int(11) DEFAULT 1,
  `remarks` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tblresident VALUES("171","321321321","Filipino","18052021113447Screenshot2021-05-06183815.png","Ronil","Poe","Cajan","FPJ","Metro  Manila","2021-04-05","1","Single","Male","Purok 2","Yes","Unidentified","19512659595","cajanr02rtrt22@gmail.com","IT","310 W Las Colinas Blvd","1","dasds");
INSERT INTO tblresident VALUES("169","","filipino","24012023042459HDwallpaper_Anime,SoloLeveling,SungJin-Woo.jpg","Ronil","Gonzales","Cajan","Royal Blood","aklan","1980-12-23","40","Single","Male","Purok 2","No","","19512659595","cajanr02rtrt22@gmail.com","","310 W Las Colinas Blvd","1","");
INSERT INTO tblresident VALUES("181","22222222222","filipino","24012023043051ANIME_KUBO-SANWAMOBWOYURUSANAIEP1.jfif","jayward","jed","dej","","aklan","2023-01-28","2","Single","Male","Purok 9","No","","19512659595","","","qweqwe","1","");
INSERT INTO tblresident VALUES("174","","","data:image/jpeg;base64,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","Ronil","M","Cajan","ron","Plaridel","2021-04-01","33","Married","Female","Purok 2","Yes","Positive","19512659595","cajanr02@gmail.com","","310 W Las Colinas Blvd","1","");
INSERT INTO tblresident VALUES("180","1212321321","Pinoy","17012023040124person.png","Aaron","Deez","Nuts","Candice","321321","2021-04-28","33","Widow","Male","Purok 2","No","","19512659595","cajanr0222@gmail.com","IT","310 W Las Colinas Blvd","1","re");

