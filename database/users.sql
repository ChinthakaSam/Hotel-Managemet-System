-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 09:26 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `group`) VALUES
(1, 'cdesilva.mr@gmail.com', 'fff138ccc52f8461dac5eb43aa101a4b417505ca36dd13cb83cc8ea3ff46e7e5', 'YÎ¶È9üæ‡ö¨…pâhùt¯}¢½ŽeˆÓ\"', 'C.J. De Silva', '2018-08-25 17:40:21', 2),
(2, 'kwijerathne.mr@gmail.com', 'f9a53bf70308532af465c965c9debb0235456e66b88c3a5caa104eb4a02b00fe', '”c:“ûôHÙ’›ÈÁê­°ÇØé)”Ó&‰†æD\'–B', 'K. Wijerathne', '2018-08-25 17:44:01', 1),
(3, 'csamarakoon.mr@gmail.com', '9a250bfcdd90ffd6281094bef08ea236686b0a20bd7b4cedd93c35411f968c17', '¬±ó(ûèSOSrlÎuÉÇD#_…ÿ²Þô£`õû¾', 'C. Samarakoon', '2018-08-25 17:46:09', 1),
(4, 'srandunuge.mr@gmail.com', 'eecb1f1331103da9d2debc4a0cd5c51181e4f1b9731dfdd821eb01477555d2ac', 'ZnAµ¢\0jÄ»S“EÚdÃÑþñ±MçÍêyú­g<Öv', 'S. Randunuge', '2018-08-25 18:29:06', 1),
(5, 'sthalagahagedara.mr@gmail.com', 'f193c4b139ab9ff4796838f074fd4952fbe01bd760113523ed28c913eb002d13', 'â8@Ã[á¯Á,Öƒ\ZO½„½Uè ®10í¹-ñ', 'S. Thalagahagedara', '2018-08-26 17:05:48', 1),
(6, 'cabimani.mr@gmail.com', '9a333451966e745b1df3ff2d93adcba0e3c6a56e4f29c4939a8321a8ae3f3d25', '&´ôK,ßB5J$ÔZgŽúIRì!ßñdª&Ê=ü€¢', 'C. Abimani', '2018-08-26 17:09:34', 1),
(7, 'kweerasekara.mr@gmail.com', '15efb615c617e67bc86485bc237321aa7a3236663b5894fd7aab13ca396c8de0', 'l Fpä½å¸kÇ°ú¯kÒ?üLìþ\0Ìjq,ÁÍ3®nœz', 'K. Weerasekara', '2018-08-26 17:12:20', 1),
(8, 'agayan.mr@gmail.com', '1fa974807756c672cd3da675c9c86e666ff9a354bc648663b5ef3e2302155c94', '!À€™ž›Ò®áõûêv€¥p4n{F >cH ‰Í', 'A. Gayan', '2018-08-26 17:19:44', 1),
(9, 'dkulathunga.mr@gmail.com', '04519def8825d0022e4c291c31a0781800dceae69888d769a0775e03e82ca6f2', 'ø\r!”ÍMuß¼†~ÏÞâ8ˆèL¤÷ßÊšÂèŠêróÉ', 'D. Kulathunga', '2018-08-28 03:48:42', 1),
(10, 'sdissanayake.mr@gmail.com', 'cc35db65be419f18e95696172cd099101b5e1c7ee462f6969668db6721fc24a4', 'ûò×ý>4¸~º‘—g=ôcÇ~ì	ºC}ËQã', 'S. Dissanayake', '2018-08-28 04:24:45', 1),
(11, 'jdesilva.mr@gmail.com', '350816253e332c4e33db136db1c3b9ef3cfdfe836c8ca3dce9de09dc9eabc4b2', 'o(Ì‚P%>\"gHZ¸È¡fÑ!”û“4mJo¿]Qâ', 'J. De Silva', '2018-08-28 08:14:58', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
