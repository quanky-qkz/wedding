-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2017 at 07:39 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uvent`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('41eab6647da6c77e6c41c821656b094c7d92ef17', '::1', 1489496559, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438393439363535393b),
('6b18f555673d8543947c4a14f46b5adb1316aa16', '::1', 1489501449, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438393439393931303b61646d696e4e616d657c733a353a2261646d696e223b61646d696e49447c733a313a2231223b61646d696e4163636f756e747c733a31353a2261646d696e4061646d696e2e636f6d223b61646d696e4176617461727c733a303a22223b61646d696e547970657c733a313a2232223b69734c6f636b696e677c623a303b6c6f676765645f696e7c623a313b),
('bbd130da98e3bb628bf311bb7c69583213091071', '::1', 1489501766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438393530313435313b61646d696e4e616d657c733a353a2261646d696e223b61646d696e49447c733a313a2231223b61646d696e4163636f756e747c733a31353a2261646d696e4061646d696e2e636f6d223b61646d696e4176617461727c733a303a22223b61646d696e547970657c733a313a2232223b69734c6f636b696e677c623a303b6c6f676765645f696e7c623a313b),
('d808428bc437b4525576ce65d4c025b1e8738504', '::1', 1489513983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438393531313431383b61646d696e4e616d657c733a353a2261646d696e223b61646d696e49447c733a313a2231223b61646d696e4163636f756e747c733a31353a2261646d696e4061646d696e2e636f6d223b61646d696e4176617461727c733a31303a226176617461722e706e67223b61646d696e547970657c733a313a2232223b69734c6f636b696e677c623a303b6c6f676765645f696e7c623a313b),
('e1d574037cb534c3cf0b1cc1f13c6e0d9109d89d', '::1', 1489514011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438393531333939363b61646d696e4e616d657c733a353a2261646d696e223b61646d696e49447c733a313a2231223b61646d696e4163636f756e747c733a31353a2261646d696e4061646d696e2e636f6d223b61646d696e4176617461727c733a31303a226176617461722e706e67223b61646d696e547970657c733a313a2232223b69734c6f636b696e677c623a303b6c6f676765645f696e7c623a313b),
('f8f8970d87619af728d527082a821175ae5e74fa', '::1', 1489502977, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438393530323935393b61646d696e4e616d657c733a353a2261646d696e223b61646d696e49447c733a313a2231223b61646d696e4163636f756e747c733a31353a2261646d696e4061646d696e2e636f6d223b61646d696e4176617461727c733a31303a226176617461722e706e67223b61646d696e547970657c733a313a2232223b69734c6f636b696e677c623a303b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket_name` text NOT NULL,
  `ticket_price` float DEFAULT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `event_id`, `ticket_name`, `ticket_price`, `no_of_tickets`, `timestamp`, `status`) VALUES
(72, 1, 149, 'Standard', 1, 989, '2017-01-23 03:07:57', 1),
(73, 1, 150, 'VIP', 1, 987, '2017-03-14 18:12:03', 1),
(74, 1, 151, 'Table Seats', 2, 944, '2017-01-16 22:30:27', 1),
(76, 1, 152, 'Standard', 1, 954, '2017-01-16 09:59:02', 1),
(77, 1, 153, 'Student', 1, 991, '2017-01-10 07:45:32', 1),
(78, 1, 154, 'Test', 1, 89, '2017-01-02 18:23:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_code`
--

CREATE TABLE `ticket_code` (
  `id` int(50) NOT NULL,
  `purchased_ticket_id` int(50) NOT NULL,
  `is_used` int(40) NOT NULL COMMENT '0=unused,1=used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_code`
--

INSERT INTO `ticket_code` (`id`, `purchased_ticket_id`, `is_used`) VALUES
(588, 514, 0),
(589, 515, 0),
(590, 516, 0),
(591, 517, 0),
(592, 518, 0),
(593, 519, 0),
(594, 520, 0),
(595, 521, 0),
(596, 522, 0),
(597, 523, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uvent_about`
--

CREATE TABLE `uvent_about` (
  `id` int(11) NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uvent_about`
--

INSERT INTO `uvent_about` (`id`, `about_content`) VALUES
(1, 'UVENT is a free mobile app that lets people explore, buy, and access tickets to their favourite events.\r\n\r\nVIKRAM TALLA - Managing Director\r\n\r\nWork hard, Play harder\r\nNobody abides by this more than Vikram. With over 5 years experience in promoting and running the best events for university students he sure knows how to allow students to enjoy there time at university.Vikram is a recent graduate from University of Hertfordshire and has done major events working with the likes of The Game, Big Sean, Will I Am, Ciara, Trey Songz & Tyga too name a few. Now working in the life of advertising and finance, Vikram still has the strong belief that students should be able to have easy access to what is going on in there university and wants all students to enjoy there time there before they hit the working world!');

-- --------------------------------------------------------

--
-- Table structure for table `uvent_event`
--

CREATE TABLE `uvent_event` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_pic` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_time` varchar(20) NOT NULL,
  `event_venue` text NOT NULL,
  `ticket_price` float NOT NULL,
  `no_of_ticket` tinyint(4) NOT NULL,
  `event_acts` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `university` int(11) DEFAULT NULL,
  `postcode` varchar(255) NOT NULL,
  `venue_information` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uvent_event`
--

INSERT INTO `uvent_event` (`id`, `event_name`, `event_pic`, `event_date`, `event_time`, `event_venue`, `ticket_price`, `no_of_ticket`, `event_acts`, `lat`, `long`, `university`, `postcode`, `venue_information`, `user_id`, `status`) VALUES
(149, 'Kanye West: TLOP Tour', '', '2017-03-14 00:00:00', '6 PM', 'The O2', 0, 0, '', '', '', 1, 'SE10 0DX', 'The O2 Arena, referred to as North Greenwich Arena in the context of the 2012 Summer Olympics and 2012 Summer Paralympics, is a multi-purpose indoor arena located in the centre of The O2.', 1, 1),
(150, 'Jay Z Live', '', '2017-03-15 23:59:59', '6 PM', 'The O2', 0, 0, '', '', '', 1, 'Jay Z Live', 'The O2 Arena, referred to as North Greenwich Arena in the context of the 2012 Summer Olympics and 2012 Summer Paralympics, is a multi-purpose indoor arena located in the centre of The O2 ', 1, 1),
(151, 'ASAP Rocky Live', '', '2017-03-15 23:59:59', '6 am', 'O2 Brixton', 0, 0, '', '', '', 1, 'ASAP Rocky Live', 'The O2 Brixton is the perfect venue to host the one and only ASAP Rocky along with ASAP Mob', 1, 1),
(152, 'Hosted by KK', '', '2017-01-17 00:00:00', '', 'Dstrkt', 0, 0, '', '', '', 1, 'W1D 6DG', 'Chic, low-lit restaurant & lounge for eclectic small plates & glamorous late-night partying.', 1, 1),
(153, 'Rihanna Live', '', '2017-01-12 00:00:00', '', 'Wembley Arena', 0, 0, '', '', '', 1, 'HA9 0AA', 'An indoor arena located in Arena Square, Engineers Way, Wembley Park, Wembley, London, HA9 0AA.', 1, 1),
(154, 'Ariana Grande Live', '', '2017-01-03 00:00:00', '', 'Birmingham NEC', 0, 0, '', '', '', 1, 'B40 1NT', 'The National Exhibition Centre is an exhibition centre located in Birmingham, England. It is near junction 6 of the M42 motorway, and is adjacent to Birmingham Airport and Birmingham International railway station.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uvent_event_ticket`
--

CREATE TABLE `uvent_event_ticket` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_of_ticket` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `transition_id` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0: apple pay 1: paypal 2: card',
  `privacy` int(2) NOT NULL COMMENT '0 for private, 1 for public',
  `ticket_id` int(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_used` int(40) NOT NULL COMMENT '0=unused,1= used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uvent_event_ticket`
--

INSERT INTO `uvent_event_ticket` (`id`, `event_id`, `user_id`, `no_of_ticket`, `timestamp`, `transition_id`, `total_price`, `type`, `privacy`, `ticket_id`, `created`, `is_used`) VALUES
(514, 150, 389, 2, 0, '', 2, 0, 1, 73, '2017-03-14 16:05:33', 0),
(515, 150, 387, 3, 0, '', 3, 0, 1, 73, '2017-03-14 16:24:38', 0),
(516, 150, 18, 1, 0, '', 1, 1, 1, 73, '2017-03-14 18:25:05', 0),
(517, 150, 18, 1, 0, '', 1, 1, 1, 73, '2017-03-14 18:25:08', 0),
(518, 150, 327, 1, 0, '', 1, 1, 1, 73, '2017-03-14 18:13:59', 0),
(519, 150, 336, 1, 0, '', 1, 1, 1, 73, '2017-03-14 18:14:00', 0),
(520, 150, 367, 1, 0, '', 1, 1, 1, 73, '2017-03-14 18:11:26', 0),
(521, 150, 367, 1, 0, '', 1, 1, 1, 73, '2017-03-14 18:14:03', 0),
(522, 150, 372, 1, 0, '', 1, 1, 1, 73, '2017-03-14 18:14:04', 0),
(523, 150, 377, 1, 0, '', 1, 1, 1, 73, '2017-03-14 18:14:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uvent_faq`
--

CREATE TABLE `uvent_faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uvent_faq`
--

INSERT INTO `uvent_faq` (`id`, `question`, `answer`, `status`) VALUES
(48, 'How do I upload events?', 'On the UVent home screen, please select "Promoter" and follow the instructions from there onwards. Please email info@Uvent.co.uk for further information', 1),
(49, 'Who produced this App?', ' Digiruu Ltd.', 1),
(50, 'How do I become a promoter to put my events up?', 'Please email info@uvent.co.uk stating that you wish to become a promoter. We will get back to you within 24 hours.', 1),
(51, 'Will you be expanding to areas outside of London?', 'Yes - this is in the pipeline for 2017. You should be able to view events in Birmingham, Manchester, Coventry, Reading and Leeds by then. We will keep you updated!', 1),
(52, 'Are you on Twitter?', 'Yes we are. We wanted to use @UVent but somebody took it unfortunately, so you can find us at @UventUK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uvent_hide_chat`
--

CREATE TABLE `uvent_hide_chat` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `event_id` int(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uvent_message`
--

CREATE TABLE `uvent_message` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` text,
  `title` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_id` int(11) NOT NULL,
  `eventname` text NOT NULL,
  `sender_status` int(50) NOT NULL COMMENT '0= default , 1= deleted',
  `receiver_status` int(50) NOT NULL COMMENT '0= default , 1= deleted',
  `is_seen` int(50) NOT NULL COMMENT '0 = unseen , 1= seen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uvent_social_user`
--

CREATE TABLE `uvent_social_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '''1 ->facebook'' ',
  `social_id` varchar(50) DEFAULT NULL,
  `friend_list` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uvent_social_user`
--

INSERT INTO `uvent_social_user` (`id`, `user_id`, `type`, `social_id`, `friend_list`, `status`) VALUES
(596, 387, 1, '771199763028928', '1356472504374884', 1),
(597, 389, 1, '1356472504374884', '771199763028928', 1),
(600, 367, 1, '10154286494082284', '771199763028928', 1),
(601, 367, 1, '10154286494082284', '1356472504374884', 1),
(605, 387, 1, '771199763028928', '990794574398835', 1),
(606, 387, 1, '771199763028928', '10153021906702284', 1),
(607, 387, 1, '771199763028928', '10157557812690615', 1),
(609, 387, 1, '771199763028928', '10154286494082284', 1),
(611, 387, 1, '771199763028928', '333274580398930', 1),
(613, 387, 1, '771199763028928', '10158292331565377', 1),
(614, 367, 1, '10154286494082284', '990794574398835', 1),
(615, 367, 1, '10154286494082284', '10153021906702284', 1),
(616, 367, 1, '10154286494082284', '10157557812690615', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uvent_university`
--

CREATE TABLE `uvent_university` (
  `university` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uvent_university`
--

INSERT INTO `uvent_university` (`university`, `id`) VALUES
('Brunel University', 1),
('Kingston University', 2),
('Reading University', 3),
('Royal Holloway', 4),
('University of Hertfordshire', 5);

-- --------------------------------------------------------

--
-- Table structure for table `uvent_user`
--

CREATE TABLE `uvent_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `social_id` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `device_type` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL DEFAULT '0',
  `university` int(11) DEFAULT NULL,
  `student_no` varchar(255) NOT NULL,
  `fb_connect` int(20) NOT NULL COMMENT '0=no, 1=yes',
  `lat` varchar(20) NOT NULL,
  `long` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uvent_user`
--

INSERT INTO `uvent_user` (`id`, `firstname`, `surname`, `profile_pic`, `social_id`, `email`, `password`, `device_id`, `device_type`, `created`, `type`, `university`, `student_no`, `fb_connect`, `lat`, `long`, `status`) VALUES
(1, 'admin', 'admin', 'avatar.png', '', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '2017-03-14 20:56:35', 2, 1, '', 0, '', '', 1),
(18, 'keshavv', 'kumar', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13439111_854528591358768_3441719078337578904_n.jpg?oh=c2151ceecd08d0bac7adf297e2ddb533&oe=5966F155', '990794574398835', 'keshav@cqlsys.in', 'e10adc3949ba59abbe56e057f20f883e', 'APA91bE8Ii_9_TtPL2_Fzx1OfawxY_ozAmFOREfPodoAyFC-6pMFMD3k2Vyd4052KNg5Oto0fSOpDuqOpbqpUoaqwi1rM3stroWxCP1OOLJH_w2f6lk62f6J3e40TX79QB-OdPtKil18', 1, '2017-03-14 20:56:35', 0, 1, '', 1, '', '', 0),
(327, 'Aman ', 'Birdi ', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11694957_10153263388187284_1652348667946858421_n.jpg?oh=4a8b609477d8a84fdb5c0f348c749a5b&oe=596B8AE1', '10153021906702284', 'aman@digiruu.com', '21232f297a57a5a743894a0e4a801fc3', 'APA91bEpagu9t87s5NyUDFozjSL_QpgPdTrMFwQ3CmdQQk6BAz_Olc8ANjzZ_T4KoighsmX6h2s31lPyNG_sx5WWgsXphVUVPQ0C-wir0GZeMM8klY7X0bu86OiFp9YHZz1l_3uGcZG0', 1, '2017-03-14 20:56:35', 2, 1, '08207994', 1, '', '', 1),
(336, 'Rusty', 'Pugh', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/16508086_10158246112760615_2151019340068419752_n.jpg?oh=a6feac12d49d939bc30bc0f2b9103451&oe=596E22E1', '10157557812690615', 'radlpugh@gmail.com', 'Sanchez17!', '3566f9f331682889eddbcd6ae1a8d104994ccb0fb954ebbb411d8d773281a67d', 0, '2017-03-14 20:56:35', 0, 1, '12345678910', 1, '', '', 0),
(339, 'Russell', 'Pugh', '', '', 'russell@uvent.co.uk', '21232f297a57a5a743894a0e4a801fc3', '', 0, '2017-03-14 20:56:35', 1, 1, '', 0, '', '', 1),
(354, 'Vik', 'Talla', '', '', 'vikram@uvent.co.uk', '60338db1947bfd96756520200e41f9a8', '', 0, '2017-03-14 20:56:35', 0, 1, '123456', 0, '', '', 1),
(356, 'Andrew', 'Karanikki', '', '', 'andrew@uvent.co.uk', 'b80774456730cdb11a7bc6cdd3cdfc49', 'APA91bFJQl2o1CAbiOhXt7l1SN7G_6wgeWF1t4pV4hvNqaq73fdNS6PVH7AQEByNsHIkP_trSx3y7jAEfiLoa-MpU-zIbMdFxCvIUnq3Uyh7SE3oGpGMCSSaW6BqcQ2_m36ReXcGs5VK', 1, '2017-03-14 20:56:35', 0, 1, '', 0, '', '', 1),
(359, 'Quang', 'Pham', '', '', 'qu4ngco@gmail.com', 'f096af0a51b005b1e1af81fb39af6b74', '123456789', 0, '2017-03-14 20:56:35', 2, 1, '', 0, '', '', 1),
(360, 'tom', 'to', '', '', 'hhhh@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', 0, '2017-03-14 20:56:35', 0, 1, '55r33', 0, '', '', 1),
(362, 'Vik', 'Talla', '', '', 'vikramtalla@hotmail.co.uk', '5830baa7b5dbfa48adce4a6226d05a3d', '', 0, '2017-03-14 20:56:35', 0, 1, '1102000', 0, '', '', 1),
(363, 'Pav ', 'Paul', '', '', 'pavanpaul01@gmail.com', 'f2f2f47f264f7ffe875250d1fc76afea', '7c6f46cb8749403f908b86e36e9b9388f70d34c6d87f97f6e8bc0e9a68310656', 0, '2017-03-14 20:56:35', 0, 1, '', 0, '', '', 1),
(364, 'pploopy', 'mcpoopface', '', '', 'sethhart@twitter.com', '9a60dd9fb92185fc06b669d0ae2c427f', 'APA91bEJOvF88oW5DXwIvwdMe4cYRtosiylr94TxUCiQvTX_SrKzeyYWdh42reKPrrWkP0iJ52ZHmCHjOq5pgIkwGgTdJSPzuPRFp0MtOREPcUmW6YsPd0BecLVY00LzG4IZGm92CaP0', 1, '2017-03-14 20:56:35', 0, 1, '', 0, '', '', 1),
(367, 'benny', 'sudibyo', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11694957_10153263388187284_1652348667946858421_n.jpg?oh=4a8b609477d8a84fdb5c0f348c749a5b&oe=596B8AE1', '10154286494082284', 'benny_sudibyo@outlook.com', '1209b52c46916bb6b2312bae2fc5762d', '', 1, '2017-03-14 20:56:35', 0, 1, '213515', 1, '', '', 1),
(368, 'stefan', 'velchev', '', '', 'stefan.velchev@hotmail.com', '9634a5b95aa3fb5435c4550c180f59ea', 'APA91bGynlB-YzViSgaMKQ2KV2C0QDL-LgAjFYgaaXS2TWiCR-Vylwob8M2uisj8vZhU8ZTEAZzScWzeNu7u66CSlQsisuEeX9OHZf8KXJcllqT98ABpKxZ1Rjx7siqjWGEJw8XVSf_G', 1, '2017-03-14 20:56:35', 0, 1, '213515', 0, '', '', 1),
(370, 'taj', 'virdee', '', '', 'taj.s.virdee@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'APA91bF744kKkGaPgPnczkOEysL3KoieuB4vJB3pJbDQ8w29bnmXhzpdak_HOSeRHnYgffvF5D3u11o2K-9RqkOgDCclqgFnzOTR-qy2Ko3XuZytwpo8X86faQSms_0amwHjvubtk0np', 1, '2017-03-14 20:56:35', 0, 1, '08207994', 0, '', '', 1),
(372, 'Lin', ' Juyong', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/16649374_371288976597490_8945376259018479665_n.jpg?oh=251b547efdb8e5b2bb4dc6fb1f9ce31e&oe=5973E361', '333274580398930', 'LinJuyong@facebook.com', '', '', 0, '2017-03-14 20:56:35', 0, 1, '', 1, '', '', 1),
(373, 'Aman', ' Birdi', '', '', 'AmanBirdi@facebook.com', '', '', 0, '2017-03-14 20:56:35', 0, 1, '', 0, '', '', 1),
(374, 'Vik', 'Talla', '', '', 'footballmadvt@hotmail.com', '2419c459e9ad2d94f4a5c887b3ca18cb', 'APA91bHNXGj2JVOPvVrZvnUQncmVi_BapN8-aIHojiZ0fWnkN2aNYTrgnTAd_d9bd1jZ0eG1QydCDFl38mPNUNW0bqghrM5N7lC4mIz2w9X48RyEuElUtVgN8Nq1OiZcH6W4SlCdaNuY', 1, '2017-03-14 20:56:35', 0, 1, '1223344', 0, '', '', 1),
(375, 'Gurdeep', ' Singh Mudhar', '', '', 'GurdeepSinghMudhar@facebook.com', '', '', 0, '2017-03-14 20:56:35', 0, 1, '', 0, '', '', 1),
(376, 'Bharat', ' Arora', '', '', 'BharatArora@facebook.com', '', '', 0, '2017-03-14 20:56:35', 0, 1, '', 0, '', '', 1),
(377, 'g', 'mudhar', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c66.66.828.828/s50x50/216897_10152107069100377_1842108739_n.jpg?oh=d33282b640a4f4cb114dbcd6782951df&oe=596401ED', '10158292331565377', 'Gforce.dj@gmail.com', '1391b37ff8dc78f2a297681401a57c49', 'APA91bEoafKHhRzhUaQXUUaRj5d4NkS-Mv2q2Vk-qFeoZpyxRS8rHnmLpHHbrmSZAGizwhk9DniFbnhsDz0bKqGMFSgr4Elm2Kpb0M4pJgPPDXJleZ0gYar1gwl4FI3DD-2lcRNZNpfg', 1, '2017-03-14 20:56:35', 0, 1, '777', 1, '', '', 1),
(386, 'Qa', '12', '', '', 'test@aaack.com', 'e10adc3949ba59abbe56e057f20f883e', '123456789', 0, '2017-03-14 22:13:44', 0, 1, '', 0, '', '', 1),
(387, 'Quang', 'Pham', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p200x200/268688_104472803034964_1696744779_n.jpg?oh=40942d70069b71b10617dbe96e1ed732&oe=5929AFB0', '771199763028928', 'quang.pham@tamtay.vn', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '2017-03-14 22:18:05', 0, NULL, '', 1, '', '', 1),
(389, 'Quang', 'Ph?m', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p200x200/14470482_1214741405214662_194810080424302041_n.jpg?oh=03f2982b1d19918ea87cdab0cdf5514f&oe=595A5A81', '1356472504374884', 'qu4ngco@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '2017-03-14 22:28:52', 0, NULL, '', 1, '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_code`
--
ALTER TABLE `ticket_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uvent_about`
--
ALTER TABLE `uvent_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uvent_event`
--
ALTER TABLE `uvent_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `university` (`university`);

--
-- Indexes for table `uvent_event_ticket`
--
ALTER TABLE `uvent_event_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uvent_faq`
--
ALTER TABLE `uvent_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uvent_hide_chat`
--
ALTER TABLE `uvent_hide_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uvent_message`
--
ALTER TABLE `uvent_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uvent_social_user`
--
ALTER TABLE `uvent_social_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`social_id`,`friend_list`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `uvent_university`
--
ALTER TABLE `uvent_university`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `university` (`university`);

--
-- Indexes for table `uvent_user`
--
ALTER TABLE `uvent_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `university` (`university`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `ticket_code`
--
ALTER TABLE `ticket_code`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=598;
--
-- AUTO_INCREMENT for table `uvent_about`
--
ALTER TABLE `uvent_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uvent_event`
--
ALTER TABLE `uvent_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `uvent_event_ticket`
--
ALTER TABLE `uvent_event_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;
--
-- AUTO_INCREMENT for table `uvent_faq`
--
ALTER TABLE `uvent_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `uvent_hide_chat`
--
ALTER TABLE `uvent_hide_chat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `uvent_message`
--
ALTER TABLE `uvent_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;
--
-- AUTO_INCREMENT for table `uvent_social_user`
--
ALTER TABLE `uvent_social_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;
--
-- AUTO_INCREMENT for table `uvent_university`
--
ALTER TABLE `uvent_university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `uvent_user`
--
ALTER TABLE `uvent_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `uvent_event`
--
ALTER TABLE `uvent_event`
  ADD CONSTRAINT `uvent_event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `uvent_user` (`id`),
  ADD CONSTRAINT `uvent_event_ibfk_2` FOREIGN KEY (`university`) REFERENCES `uvent_university` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `uvent_social_user`
--
ALTER TABLE `uvent_social_user`
  ADD CONSTRAINT `uvent_social_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `uvent_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uvent_user`
--
ALTER TABLE `uvent_user`
  ADD CONSTRAINT `uvent_user_ibfk_1` FOREIGN KEY (`university`) REFERENCES `uvent_university` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
