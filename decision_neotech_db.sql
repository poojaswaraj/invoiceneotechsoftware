-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2019 at 07:29 AM
-- Server version: 5.5.61-38.13-log
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
-- Database: `decision_neotech_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_head`
--

CREATE TABLE `acc_head` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_head`
--

INSERT INTO `acc_head` (`id`, `user_id`, `head_desc`) VALUES
(2, 1, 'Bank Charges\r\n'),
(5, 1, 'Electricity Expenses\r\n'),
(7, 1, 'Internet Expenses\r\n'),
(9, 1, 'Office Expenses\r\n'),
(10, 1, 'Office Rent\r\n'),
(11, 1, 'Printing & Stationery\r\n'),
(14, 1, 'Professional Fees\r\n'),
(17, 1, 'Repair & Maintainence\r\n'),
(18, 1, 'Salary\r\n'),
(21, 1, 'Telephone Expenses\r\n'),
(22, 1, 'Travelling Expenses\r\n'),
(26, 3, 'Cheque'),
(27, 1, 'Site Expenses'),
(28, 1, 'Petrol & Diesel Exp'),
(29, 1, 'Remuneration'),
(30, 1, 'Toll Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `channel_partner`
--

CREATE TABLE `channel_partner` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `create-date` date NOT NULL,
  `update-date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel_partner`
--

INSERT INTO `channel_partner` (`id`, `name`, `email`, `mobile`, `photo`, `address`, `password`, `create-date`, `update-date`, `status`) VALUES
(2, 'Shyam gadekar', 'shyam@e-bc.in', '9874563218', 'images/default.jpg', 'Pune', '1234', '2018-06-20', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(100) NOT NULL,
  `st_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ct_id`, `ct_name`, `st_id`) VALUES
(1, 'Alipur', 1),
(2, 'Andaman Island', 1),
(3, 'Anderson Island', 1),
(4, 'Arainj-Laka-Punga', 1),
(5, 'Austinabad', 1),
(6, 'Bamboo Flat', 1),
(7, 'Barren Island', 1),
(8, 'Beadonabad', 1),
(9, 'Betapur', 1),
(10, 'Bindraban', 1),
(11, 'Bonington', 1),
(12, 'Brookesabad', 1),
(13, 'Cadell Point', 1),
(14, 'Calicut', 1),
(15, 'Chetamale', 1),
(16, 'Cinque Islands', 1),
(17, 'Defence Island', 1),
(18, 'Digilpur', 1),
(19, 'Dolyganj', 1),
(20, 'Flat Island', 1),
(21, 'Geinyale', 1),
(22, 'Great Coco Island', 1),
(23, 'Haddo', 1),
(24, 'Havelock Island', 1),
(25, 'Henry Lawrence Island', 1),
(26, 'Herbertabad', 1),
(27, 'Hobdaypur', 1),
(28, 'Ilichar', 1),
(29, 'Ingoie', 1),
(30, 'Inteview Island', 1),
(31, 'Jangli Ghat', 1),
(32, 'Jhon Lawrence Island', 1),
(33, 'Karen', 1),
(34, 'Kartara', 1),
(35, 'KYD Islannd', 1),
(36, 'Landfall Island', 1),
(37, 'Little Andmand', 1),
(38, 'Little Coco Island', 1),
(39, 'Long Island', 1),
(40, 'Maimyo', 1),
(41, 'Malappuram', 1),
(42, 'Manglutan', 1),
(43, 'Manpur', 1),
(44, 'Mitha Khari', 1),
(45, 'Neill Island', 1),
(46, 'Nicobar Island', 1),
(47, 'North Brother Island', 1),
(48, 'North Passage Island', 1),
(49, 'North Sentinel Island', 1),
(50, 'Nothen Reef Island', 1),
(51, 'Outram Island', 1),
(52, 'Pahlagaon', 1),
(53, 'Palalankwe', 1),
(54, 'Passage Island', 1),
(55, 'Phaiapong', 1),
(56, 'Phoenix Island', 1),
(57, 'Port Blair', 1),
(58, 'Preparis Island', 1),
(59, 'Protheroepur', 1),
(60, 'Rangachang', 1),
(61, 'Rongat', 1),
(62, 'Rutland Island', 1),
(63, 'Sabari', 1),
(64, 'Saddle Peak', 1),
(65, 'Shadipur', 1),
(66, 'Smith Island', 1),
(67, 'Sound Island', 1),
(68, 'South Sentinel Island', 1),
(69, 'Spike Island', 1),
(70, 'Tarmugli Island', 1),
(71, 'Taylerabad', 1),
(72, 'Titaije', 1),
(73, 'Toibalawe', 1),
(74, 'Tusonabad', 1),
(75, 'West Island', 1),
(76, 'Wimberleyganj', 1),
(77, 'Yadita', 1),
(78, 'Achampet', 2),
(79, 'Adilabad', 2),
(80, 'Adoni', 2),
(81, 'Alampur', 2),
(82, 'Allagadda', 2),
(83, 'Alur', 2),
(84, 'Amalapuram', 2),
(85, 'Amangallu', 2),
(86, 'Anakapalle', 2),
(87, 'Anantapur', 2),
(88, 'Andole', 2),
(89, 'Araku', 2),
(90, 'Armoor', 2),
(91, 'Asifabad', 2),
(92, 'Aswaraopet', 2),
(93, 'Atmakur', 2),
(94, 'B. Kothakota', 2),
(95, 'Badvel', 2),
(96, 'Banaganapalle', 2),
(97, 'Bandar', 2),
(98, 'Bangarupalem', 2),
(99, 'Banswada', 2),
(100, 'Bapatla', 2),
(101, 'Bellampalli', 2),
(102, 'Bhadrachalam', 2),
(103, 'Bhainsa', 2),
(104, 'Bheemunipatnam', 2),
(105, 'Bhimadole', 2),
(106, 'Bhimavaram', 2),
(107, 'Bhongir', 2),
(108, 'Bhooragamphad', 2),
(109, 'Boath', 2),
(110, 'Bobbili', 2),
(111, 'Bodhan', 2),
(112, 'Chandoor', 2),
(113, 'Chavitidibbalu', 2),
(114, 'Chejerla', 2),
(115, 'Chepurupalli', 2),
(116, 'Cherial', 2),
(117, 'Chevella', 2),
(118, 'Chinnor', 2),
(119, 'Chintalapudi', 2),
(120, 'Chintapalle', 2),
(121, 'Chirala', 2),
(122, 'Chittoor', 2),
(123, 'Chodavaram', 2),
(124, 'Cuddapah', 2),
(125, 'Cumbum', 2),
(126, 'Darsi', 2),
(127, 'Devarakonda', 2),
(128, 'Dharmavaram', 2),
(129, 'Dichpalli', 2),
(130, 'Divi', 2),
(131, 'Donakonda', 2),
(132, 'Dronachalam', 2),
(133, 'East Godavari', 2),
(134, 'Eluru', 2),
(135, 'Eturnagaram', 2),
(136, 'Gadwal', 2),
(137, 'Gajapathinagaram', 2),
(138, 'Gajwel', 2),
(139, 'Garladinne', 2),
(140, 'Giddalur', 2),
(141, 'Godavari', 2),
(142, 'Gooty', 2),
(143, 'Gudivada', 2),
(144, 'Gudur', 2),
(145, 'Guntur', 2),
(146, 'Hindupur', 2),
(147, 'Hunsabad', 2),
(148, 'Huzurabad', 2),
(149, 'Huzurnagar', 2),
(150, 'Hyderabad', 2),
(151, 'Ibrahimpatnam', 2),
(152, 'Jaggayyapet', 2),
(153, 'Jagtial', 2),
(154, 'Jammalamadugu', 2),
(155, 'Jangaon', 2),
(156, 'Jangareddygudem', 2),
(157, 'Jannaram', 2),
(158, 'Kadiri', 2),
(159, 'Kaikaluru', 2),
(160, 'Kakinada', 2),
(161, 'Kalwakurthy', 2),
(162, 'Kalyandurg', 2),
(163, 'Kamalapuram', 2),
(164, 'Kamareddy', 2),
(165, 'Kambadur', 2),
(166, 'Kanaganapalle', 2),
(167, 'Kandukuru', 2),
(168, 'Kanigiri', 2),
(169, 'Karimnagar', 2),
(170, 'Kavali', 2),
(171, 'Khammam', 2),
(172, 'Khanapur (AP)', 2),
(173, 'Kodangal', 2),
(174, 'Koduru', 2),
(175, 'Koilkuntla', 2),
(176, 'Kollapur', 2),
(177, 'Kothagudem', 2),
(178, 'Kovvur', 2),
(179, 'Krishna', 2),
(180, 'Krosuru', 2),
(181, 'Kuppam', 2),
(182, 'Kurnool', 2),
(183, 'Lakkireddipalli', 2),
(184, 'Madakasira', 2),
(185, 'Madanapalli', 2),
(186, 'Madhira', 2),
(187, 'Madnur', 2),
(188, 'Mahabubabad', 2),
(189, 'Mahabubnagar', 2),
(190, 'Mahadevapur', 2),
(191, 'Makthal', 2),
(192, 'Mancherial', 2),
(193, 'Mandapeta', 2),
(194, 'Mangalagiri', 2),
(195, 'Manthani', 2),
(196, 'Markapur', 2),
(197, 'Marturu', 2),
(198, 'Medachal', 2),
(199, 'Medak', 2),
(200, 'Medarmetla', 2),
(201, 'Metpalli', 2),
(202, 'Mriyalguda', 2),
(203, 'Mulug', 2),
(204, 'Mylavaram', 2),
(205, 'Nagarkurnool', 2),
(206, 'Nalgonda', 2),
(207, 'Nallacheruvu', 2),
(208, 'Nampalle', 2),
(209, 'Nandigama', 2),
(210, 'Nandikotkur', 2),
(211, 'Nandyal', 2),
(212, 'Narasampet', 2),
(213, 'Narasaraopet', 2),
(214, 'Narayanakhed', 2),
(215, 'Narayanpet', 2),
(216, 'Narsapur', 2),
(217, 'Narsipatnam', 2),
(218, 'Nazvidu', 2),
(219, 'Nelloe', 2),
(220, 'Nellore', 2),
(221, 'Nidamanur', 2),
(222, 'Nirmal', 2),
(223, 'Nizamabad', 2),
(224, 'Nuguru', 2),
(225, 'Ongole', 2),
(226, 'Outsarangapalle', 2),
(227, 'Paderu', 2),
(228, 'Pakala', 2),
(229, 'Palakonda', 2),
(230, 'Paland', 2),
(231, 'Palmaneru', 2),
(232, 'Pamuru', 2),
(233, 'Pargi', 2),
(234, 'Parkal', 2),
(235, 'Parvathipuram', 2),
(236, 'Pathapatnam', 2),
(237, 'Pattikonda', 2),
(238, 'Peapalle', 2),
(239, 'Peddapalli', 2),
(240, 'Peddapuram', 2),
(241, 'Penukonda', 2),
(242, 'Piduguralla', 2),
(243, 'Piler', 2),
(244, 'Pithapuram', 2),
(245, 'Podili', 2),
(246, 'Polavaram', 2),
(247, 'Prakasam', 2),
(248, 'Proddatur', 2),
(249, 'Pulivendla', 2),
(250, 'Punganur', 2),
(251, 'Putturu', 2),
(252, 'Rajahmundri', 2),
(253, 'Rajampeta', 2),
(254, 'Ramachandrapuram', 2),
(255, 'Ramannapet', 2),
(256, 'Rampachodavaram', 2),
(257, 'Rangareddy', 2),
(258, 'Rapur', 2),
(259, 'Rayachoti', 2),
(260, 'Rayadurg', 2),
(261, 'Razole', 2),
(262, 'Repalle', 2),
(263, 'Saluru', 2),
(264, 'Sangareddy', 2),
(265, 'Sathupalli', 2),
(266, 'Sattenapalle', 2),
(267, 'Satyavedu', 2),
(268, 'Shadnagar', 2),
(269, 'Siddavattam', 2),
(270, 'Siddipet', 2),
(271, 'Sileru', 2),
(272, 'Sircilla', 2),
(273, 'Sirpur Kagaznagar', 2),
(274, 'Sodam', 2),
(275, 'Sompeta', 2),
(276, 'Srikakulam', 2),
(277, 'Srikalahasthi', 2),
(278, 'Srisailam', 2),
(279, 'Srungavarapukota', 2),
(280, 'Sudhimalla', 2),
(281, 'Sullarpet', 2),
(282, 'Tadepalligudem', 2),
(283, 'Tadipatri', 2),
(284, 'Tanduru', 2),
(285, 'Tanuku', 2),
(286, 'Tekkali', 2),
(287, 'Tenali', 2),
(288, 'Thungaturthy', 2),
(289, 'Tirivuru', 2),
(290, 'Tirupathi', 2),
(291, 'Tuni', 2),
(292, 'Udaygiri', 2),
(293, 'Ulvapadu', 2),
(294, 'Uravakonda', 2),
(295, 'Utnor', 2),
(296, 'V R Puram', 2),
(297, 'Vaimpalli', 2),
(298, 'Vayalpad', 2),
(299, 'Venkatgiri', 2),
(300, 'Venkatgirikota', 2),
(301, 'Vijayawada', 2),
(302, 'Vikrabad', 2),
(303, 'Vinjamuru', 2),
(304, 'Vinukonda', 2),
(305, 'Visakhapatnam', 2),
(306, 'Vizayanagaram', 2),
(307, 'Vizianagaram', 2),
(308, 'Vuyyuru', 2),
(309, 'Wanaparthy', 2),
(310, 'Warangal', 2),
(311, 'Wardhannapet', 2),
(312, 'Yelamanchili', 2),
(313, 'Yelavaram', 2),
(314, 'Yeleswaram', 2),
(315, 'Yellandu', 2),
(316, 'Yellanuru', 2),
(317, 'Yellareddy', 2),
(318, 'Yerragondapalem', 2),
(319, 'Zahirabad', 2),
(320, 'Along', 3),
(321, 'Anini', 3),
(322, 'Anjaw', 3),
(323, 'Bameng', 3),
(324, 'Basar', 3),
(325, 'Changlang', 3),
(326, 'Chowkhem', 3),
(327, 'Daporizo', 3),
(328, 'Dibang Valley', 3),
(329, 'Dirang', 3),
(330, 'Hayuliang', 3),
(331, 'Huri', 3),
(332, 'Itanagar', 3),
(333, 'Jairampur', 3),
(334, 'Kalaktung', 3),
(335, 'Kameng', 3),
(336, 'Khonsa', 3),
(337, 'Kolaring', 3),
(338, 'Kurung Kumey', 3),
(339, 'Lohit', 3),
(340, 'Lower Dibang Valley', 3),
(341, 'Lower Subansiri', 3),
(342, 'Mariyang', 3),
(343, 'Mechuka', 3),
(344, 'Miao', 3),
(345, 'Nefra', 3),
(346, 'Pakkekesang', 3),
(347, 'Pangin', 3),
(348, 'Papum Pare', 3),
(349, 'Passighat', 3),
(350, 'Roing', 3),
(351, 'Sagalee', 3),
(352, 'Seppa', 3),
(353, 'Siang', 3),
(354, 'Tali', 3),
(355, 'Taliha', 3),
(356, 'Tawang', 3),
(357, 'Tezu', 3),
(358, 'Tirap', 3),
(359, 'Tuting', 3),
(360, 'Upper Siang', 3),
(361, 'Upper Subansiri', 3),
(362, 'Yiang Kiag', 3),
(363, 'Abhayapuri', 4),
(364, 'Baithalangshu', 4),
(365, 'Barama', 4),
(366, 'Barpeta Road', 4),
(367, 'Bihupuria', 4),
(368, 'Bijni', 4),
(369, 'Bilasipara', 4),
(370, 'Bokajan', 4),
(371, 'Bokakhat', 4),
(372, 'Boko', 4),
(373, 'Bongaigaon', 4),
(374, 'Cachar', 4),
(375, 'Cachar Hills', 4),
(376, 'Darrang', 4),
(377, 'Dhakuakhana', 4),
(378, 'Dhemaji', 4),
(379, 'Dhubri', 4),
(380, 'Dibrugarh', 4),
(381, 'Digboi', 4),
(382, 'Diphu', 4),
(383, 'Goalpara', 4),
(384, 'Gohpur', 4),
(385, 'Golaghat', 4),
(386, 'Guwahati', 4),
(387, 'Hailakandi', 4),
(388, 'Hajo', 4),
(389, 'Halflong', 4),
(390, 'Hojai', 4),
(391, 'Howraghat', 4),
(392, 'Jorhat', 4),
(393, 'Kamrup', 4),
(394, 'Karbi Anglong', 4),
(395, 'Karimganj', 4),
(396, 'Kokarajhar', 4),
(397, 'Kokrajhar', 4),
(398, 'Lakhimpur', 4),
(399, 'Maibong', 4),
(400, 'Majuli', 4),
(401, 'Mangaldoi', 4),
(402, 'Mariani', 4),
(403, 'Marigaon', 4),
(404, 'Moranhat', 4),
(405, 'Morigaon', 4),
(406, 'Nagaon', 4),
(407, 'Nalbari', 4),
(408, 'Rangapara', 4),
(409, 'Sadiya', 4),
(410, 'Sibsagar', 4),
(411, 'Silchar', 4),
(412, 'Sivasagar', 4),
(413, 'Sonitpur', 4),
(414, 'Tarabarihat', 4),
(415, 'Tezpur', 4),
(416, 'Tinsukia', 4),
(417, 'Udalgiri', 4),
(418, 'Udalguri', 4),
(419, 'UdarbondhBarpeta', 4),
(420, 'Adhaura', 5),
(421, 'Amarpur', 5),
(422, 'Araria', 5),
(423, 'Areraj', 5),
(424, 'Arrah', 5),
(425, 'Arwal', 5),
(426, 'Aurangabad', 5),
(427, 'Bagaha', 5),
(428, 'Banka', 5),
(429, 'Banmankhi', 5),
(430, 'Barachakia', 5),
(431, 'Barauni', 5),
(432, 'Barh', 5),
(433, 'Barosi', 5),
(434, 'Begusarai', 5),
(435, 'Benipatti', 5),
(436, 'Benipur', 5),
(437, 'Bettiah', 5),
(438, 'Bhabhua', 5),
(439, 'Bhagalpur', 5),
(440, 'Bhojpur', 5),
(441, 'Bidupur', 5),
(442, 'Biharsharif', 5),
(443, 'Bikram', 5),
(444, 'Bikramganj', 5),
(445, 'Birpur', 5),
(446, 'Buxar', 5),
(447, 'Chakai', 5),
(448, 'Champaran', 5),
(449, 'Chapara', 5),
(450, 'Dalsinghsarai', 5),
(451, 'Danapur', 5),
(452, 'Darbhanga', 5),
(453, 'Daudnagar', 5),
(454, 'Dhaka', 5),
(455, 'Dhamdaha', 5),
(456, 'Dumraon', 5),
(457, 'Ekma', 5),
(458, 'Forbesganj', 5),
(459, 'Gaya', 5),
(460, 'Gogri', 5),
(461, 'Gopalganj', 5),
(462, 'H Kharagpur', 5),
(463, 'Hajipur', 5),
(464, 'Hathua', 5),
(465, 'Hilsa', 5),
(466, 'Imamganj', 5),
(467, 'Jahanabad', 5),
(468, 'Jainagar', 5),
(469, 'Jamshedpur', 5),
(470, 'Jamui', 5),
(471, 'Jehanabad', 5),
(472, 'Jhajha', 5),
(473, 'Jhanjharpur', 5),
(474, 'Kahalgaon', 5),
(475, 'Kaimur (Bhabua)', 5),
(476, 'Katihar', 5),
(477, 'Katoria', 5),
(478, 'Khagaria', 5),
(479, 'Kishanganj', 5),
(480, 'Korha', 5),
(481, 'Lakhisarai', 5),
(482, 'Madhepura', 5),
(483, 'Madhubani', 5),
(484, 'Maharajganj', 5),
(485, 'Mahua', 5),
(486, 'Mairwa', 5),
(487, 'Mallehpur', 5),
(488, 'Masrakh', 5),
(489, 'Mohania', 5),
(490, 'Monghyr', 5),
(491, 'Motihari', 5),
(492, 'Motipur', 5),
(493, 'Munger', 5),
(494, 'Muzaffarpur', 5),
(495, 'Nabinagar', 5),
(496, 'Nalanda', 5),
(497, 'Narkatiaganj', 5),
(498, 'Naugachia', 5),
(499, 'Nawada', 5),
(500, 'Pakribarwan', 5),
(501, 'Pakridayal', 5),
(502, 'Patna', 5),
(503, 'Phulparas', 5),
(504, 'Piro', 5),
(505, 'Pupri', 5),
(506, 'Purena', 5),
(507, 'Purnia', 5),
(508, 'Rafiganj', 5),
(509, 'Rajauli', 5),
(510, 'Ramnagar', 5),
(511, 'Raniganj', 5),
(512, 'Raxaul', 5),
(513, 'Rohtas', 5),
(514, 'Rosera', 5),
(515, 'S Bakhtiarpur', 5),
(516, 'Saharsa', 5),
(517, 'Samastipur', 5),
(518, 'Saran', 5),
(519, 'Sasaram', 5),
(520, 'Seikhpura', 5),
(521, 'Sheikhpura', 5),
(522, 'Sheohar', 5),
(523, 'Sherghati', 5),
(524, 'Sidhawalia', 5),
(525, 'Singhwara', 5),
(526, 'Sitamarhi', 5),
(527, 'Siwan', 5),
(528, 'Sonepur', 5),
(529, 'Supaul', 5),
(530, 'Thakurganj', 5),
(531, 'Triveniganj', 5),
(532, 'Udakishanganj', 5),
(533, 'Vaishali', 5),
(534, 'Wazirganj', 5),
(535, 'Chandigarh', 6),
(536, 'Mani Marja', 6),
(537, 'Ambikapur', 7),
(538, 'Antagarh', 7),
(539, 'Arang', 7),
(540, 'Bacheli', 7),
(541, 'Bagbahera', 7),
(542, 'Bagicha', 7),
(543, 'Baikunthpur', 7),
(544, 'Balod', 7),
(545, 'Balodabazar', 7),
(546, 'Balrampur', 7),
(547, 'Barpalli', 7),
(548, 'Basana', 7),
(549, 'Bastanar', 7),
(550, 'Bastar', 7),
(551, 'Bderajpur', 7),
(552, 'Bemetara', 7),
(553, 'Berla', 7),
(554, 'Bhairongarh', 7),
(555, 'Bhanupratappur', 7),
(556, 'Bharathpur', 7),
(557, 'Bhatapara', 7),
(558, 'Bhilai', 7),
(559, 'Bhilaigarh', 7),
(560, 'Bhopalpatnam', 7),
(561, 'Bijapur', 7),
(562, 'Bilaspur', 7),
(563, 'Bodla', 7),
(564, 'Bokaband', 7),
(565, 'Chandipara', 7),
(566, 'Chhinagarh', 7),
(567, 'Chhuriakala', 7),
(568, 'Chingmut', 7),
(569, 'Chuikhadan', 7),
(570, 'Dabhara', 7),
(571, 'Dallirajhara', 7),
(572, 'Dantewada', 7),
(573, 'Deobhog', 7),
(574, 'Dhamda', 7),
(575, 'Dhamtari', 7),
(576, 'Dharamjaigarh', 7),
(577, 'Dongargarh', 7),
(578, 'Durg', 7),
(579, 'Durgakondal', 7),
(580, 'Fingeshwar', 7),
(581, 'Gariaband', 7),
(582, 'Garpa', 7),
(583, 'Gharghoda', 7),
(584, 'Gogunda', 7),
(585, 'Ilamidi', 7),
(586, 'Jagdalpur', 7),
(587, 'Janjgir', 7),
(588, 'Janjgir-Champa', 7),
(589, 'Jarwa', 7),
(590, 'Jashpur', 7),
(591, 'Jashpurnagar', 7),
(592, 'Kabirdham-Kawardha', 7),
(593, 'Kanker', 7),
(594, 'Kasdol', 7),
(595, 'Kathdol', 7),
(596, 'Kathghora', 7),
(597, 'Kawardha', 7),
(598, 'Keskal', 7),
(599, 'Khairgarh', 7),
(600, 'Kondagaon', 7),
(601, 'Konta', 7),
(602, 'Korba', 7),
(603, 'Korea', 7),
(604, 'Kota', 7),
(605, 'Koyelibeda', 7),
(606, 'Kuakunda', 7),
(607, 'Kunkuri', 7),
(608, 'Kurud', 7),
(609, 'Lohadigundah', 7),
(610, 'Lormi', 7),
(611, 'Luckwada', 7),
(612, 'Mahasamund', 7),
(613, 'Makodi', 7),
(614, 'Manendragarh', 7),
(615, 'Manpur', 7),
(616, 'Marwahi', 7),
(617, 'Mohla', 7),
(618, 'Mungeli', 7),
(619, 'Nagri', 7),
(620, 'Narainpur', 7),
(621, 'Narayanpur', 7),
(622, 'Neora', 7),
(623, 'Netanar', 7),
(624, 'Odgi', 7),
(625, 'Padamkot', 7),
(626, 'Pakhanjur', 7),
(627, 'Pali', 7),
(628, 'Pandaria', 7),
(629, 'Pandishankar', 7),
(630, 'Parasgaon', 7),
(631, 'Pasan', 7),
(632, 'Patan', 7),
(633, 'Pathalgaon', 7),
(634, 'Pendra', 7),
(635, 'Pratappur', 7),
(636, 'Premnagar', 7),
(637, 'Raigarh', 7),
(638, 'Raipur', 7),
(639, 'Rajnandgaon', 7),
(640, 'Rajpur', 7),
(641, 'Ramchandrapur', 7),
(642, 'Saraipali', 7),
(643, 'Saranggarh', 7),
(644, 'Sarona', 7),
(645, 'Semaria', 7),
(646, 'Shakti', 7),
(647, 'Sitapur', 7),
(648, 'Sukma', 7),
(649, 'Surajpur', 7),
(650, 'Surguja', 7),
(651, 'Tapkara', 7),
(652, 'Toynar', 7),
(653, 'Udaipur', 7),
(654, 'Uproda', 7),
(655, 'Wadrainagar', 7),
(656, 'Amal', 8),
(657, 'Amli', 8),
(658, 'Bedpa', 8),
(659, 'Chikhli', 8),
(660, 'Dadra & Nagar Haveli', 8),
(661, 'Dahikhed', 8),
(662, 'Dolara', 8),
(663, 'Galonda', 8),
(664, 'Kanadi', 8),
(665, 'Karchond', 8),
(666, 'Khadoli', 8),
(667, 'Kharadpada', 8),
(668, 'Kherabari', 8),
(669, 'Kherdi', 8),
(670, 'Kothar', 8),
(671, 'Luari', 8),
(672, 'Mashat', 8),
(673, 'Rakholi', 8),
(674, 'Rudana', 8),
(675, 'Saili', 8),
(676, 'Sili', 8),
(677, 'Silvassa', 8),
(678, 'Sindavni', 8),
(679, 'Udva', 8),
(680, 'Umbarkoi', 8),
(681, 'Vansda', 8),
(682, 'Vasona', 8),
(683, 'Velugam', 8),
(684, 'Brancavare', 9),
(685, 'Dagasi', 9),
(686, 'Daman', 9),
(687, 'Diu', 9),
(688, 'Magarvara', 9),
(689, 'Nagwa', 9),
(690, 'Pariali', 9),
(691, 'Passo Covo', 9),
(692, 'Central Delhi', 10),
(693, 'East Delhi', 10),
(694, 'New Delhi', 10),
(695, 'North Delhi', 10),
(696, 'North East Delhi', 10),
(697, 'North West Delhi', 10),
(698, 'South Delhi', 10),
(699, 'South West Delhi', 10),
(700, 'West Delhi', 10),
(701, 'Canacona', 11),
(702, 'Candolim', 11),
(703, 'Chinchinim', 11),
(704, 'Cortalim', 11),
(705, 'Goa', 11),
(706, 'Jua', 11),
(707, 'Madgaon', 11),
(708, 'Mahem', 11),
(709, 'Mapuca', 11),
(710, 'Marmagao', 11),
(711, 'Panji', 11),
(712, 'Ponda', 11),
(713, 'Sanvordem', 11),
(714, 'Terekhol', 11),
(715, 'Ahmedabad', 12),
(716, 'Ahwa', 12),
(717, 'Amod', 12),
(718, 'Amreli', 12),
(719, 'Anand', 12),
(720, 'Anjar', 12),
(721, 'Ankaleshwar', 12),
(722, 'Babra', 12),
(723, 'Balasinor', 12),
(724, 'Banaskantha', 12),
(725, 'Bansada', 12),
(726, 'Bardoli', 12),
(727, 'Bareja', 12),
(728, 'Baroda', 12),
(729, 'Barwala', 12),
(730, 'Bayad', 12),
(731, 'Bhachav', 12),
(732, 'Bhanvad', 12),
(733, 'Bharuch', 12),
(734, 'Bhavnagar', 12),
(735, 'Bhiloda', 12),
(736, 'Bhuj', 12),
(737, 'Billimora', 12),
(738, 'Borsad', 12),
(739, 'Botad', 12),
(740, 'Chanasma', 12),
(741, 'Chhota Udaipur', 12),
(742, 'Chotila', 12),
(743, 'Dabhoi', 12),
(744, 'Dahod', 12),
(745, 'Damnagar', 12),
(746, 'Dang', 12),
(747, 'Danta', 12),
(748, 'Dasada', 12),
(749, 'Dediapada', 12),
(750, 'Deesa', 12),
(751, 'Dehgam', 12),
(752, 'Deodar', 12),
(753, 'Devgadhbaria', 12),
(754, 'Dhandhuka', 12),
(755, 'Dhanera', 12),
(756, 'Dharampur', 12),
(757, 'Dhari', 12),
(758, 'Dholka', 12),
(759, 'Dhoraji', 12),
(760, 'Dhrangadhra', 12),
(761, 'Dhrol', 12),
(762, 'Dwarka', 12),
(763, 'Fortsongadh', 12),
(764, 'Gadhada', 12),
(765, 'Gandhi Nagar', 12),
(766, 'Gariadhar', 12),
(767, 'Godhra', 12),
(768, 'Gogodar', 12),
(769, 'Gondal', 12),
(770, 'Halol', 12),
(771, 'Halvad', 12),
(772, 'Harij', 12),
(773, 'Himatnagar', 12),
(774, 'Idar', 12),
(775, 'Jambusar', 12),
(776, 'Jamjodhpur', 12),
(777, 'Jamkalyanpur', 12),
(778, 'Jamnagar', 12),
(779, 'Jasdan', 12),
(780, 'Jetpur', 12),
(781, 'Jhagadia', 12),
(782, 'Jhalod', 12),
(783, 'Jodia', 12),
(784, 'Junagadh', 12),
(785, 'Junagarh', 12),
(786, 'Kalawad', 12),
(787, 'Kalol', 12),
(788, 'Kapad Wanj', 12),
(789, 'Keshod', 12),
(790, 'Khambat', 12),
(791, 'Khambhalia', 12),
(792, 'Khavda', 12),
(793, 'Kheda', 12),
(794, 'Khedbrahma', 12),
(795, 'Kheralu', 12),
(796, 'Kodinar', 12),
(797, 'Kotdasanghani', 12),
(798, 'Kunkawav', 12),
(799, 'Kutch', 12),
(800, 'Kutchmandvi', 12),
(801, 'Kutiyana', 12),
(802, 'Lakhpat', 12),
(803, 'Lakhtar', 12),
(804, 'Lalpur', 12),
(805, 'Limbdi', 12),
(806, 'Limkheda', 12),
(807, 'Lunavada', 12),
(808, 'M M Mangrol', 12),
(809, 'Mahuva', 12),
(810, 'Malia-Hatina', 12),
(811, 'Maliya', 12),
(812, 'Malpur', 12),
(813, 'Manavadar', 12),
(814, 'Mandvi', 12),
(815, 'Mangrol', 12),
(816, 'Mehmedabad', 12),
(817, 'Mehsana', 12),
(818, 'Miyagam', 12),
(819, 'Modasa', 12),
(820, 'Morvi', 12),
(821, 'Muli', 12),
(822, 'Mundra', 12),
(823, 'Nadiad', 12),
(824, 'Nakhatrana', 12),
(825, 'Nalia', 12),
(826, 'Narmada', 12),
(827, 'Naswadi', 12),
(828, 'Navasari', 12),
(829, 'Nizar', 12),
(830, 'Okha', 12),
(831, 'Paddhari', 12),
(832, 'Padra', 12),
(833, 'Palanpur', 12),
(834, 'Palitana', 12),
(835, 'Panchmahals', 12),
(836, 'Patan', 12),
(837, 'Pavijetpur', 12),
(838, 'Porbandar', 12),
(839, 'Prantij', 12),
(840, 'Radhanpur', 12),
(841, 'Rahpar', 12),
(842, 'Rajaula', 12),
(843, 'Rajkot', 12),
(844, 'Rajpipla', 12),
(845, 'Ranavav', 12),
(846, 'Sabarkantha', 12),
(847, 'Sanand', 12),
(848, 'Sankheda', 12),
(849, 'Santalpur', 12),
(850, 'Santrampur', 12),
(851, 'Savarkundla', 12),
(852, 'Savli', 12),
(853, 'Sayan', 12),
(854, 'Sayla', 12),
(855, 'Shehra', 12),
(856, 'Sidhpur', 12),
(857, 'Sihor', 12),
(858, 'Sojitra', 12),
(859, 'Sumrasar', 12),
(860, 'Surat', 12),
(861, 'Surendranagar', 12),
(862, 'Talaja', 12),
(863, 'Thara', 12),
(864, 'Tharad', 12),
(865, 'Thasra', 12),
(866, 'Una-Diu', 12),
(867, 'Upleta', 12),
(868, 'Vadgam', 12),
(869, 'Vadodara', 12),
(870, 'Valia', 12),
(871, 'Vallabhipur', 12),
(872, 'Valod', 12),
(873, 'Valsad', 12),
(874, 'Vanthali', 12),
(875, 'Vapi', 12),
(876, 'Vav', 12),
(877, 'Veraval', 12),
(878, 'Vijapur', 12),
(879, 'Viramgam', 12),
(880, 'Visavadar', 12),
(881, 'Visnagar', 12),
(882, 'Vyara', 12),
(883, 'Waghodia', 12),
(884, 'Wankaner', 12),
(885, 'Adampur Mandi', 13),
(886, 'Ambala', 13),
(887, 'Assandh', 13),
(888, 'Bahadurgarh', 13),
(889, 'Barara', 13),
(890, 'Barwala', 13),
(891, 'Bawal', 13),
(892, 'Bawanikhera', 13),
(893, 'Bhiwani', 13),
(894, 'Charkhidadri', 13),
(895, 'Cheeka', 13),
(896, 'Chhachrauli', 13),
(897, 'Dabwali', 13),
(898, 'Ellenabad', 13),
(899, 'Faridabad', 13),
(900, 'Fatehabad', 13),
(901, 'Ferojpur Jhirka', 13),
(902, 'Gharaunda', 13),
(903, 'Gohana', 13),
(904, 'Gurgaon', 13),
(905, 'Hansi', 13),
(906, 'Hisar', 13),
(907, 'Jagadhari', 13),
(908, 'Jatusana', 13),
(909, 'Jhajjar', 13),
(910, 'Jind', 13),
(911, 'Julana', 13),
(912, 'Kaithal', 13),
(913, 'Kalanaur', 13),
(914, 'Kalanwali', 13),
(915, 'Kalka', 13),
(916, 'Karnal', 13),
(917, 'Kosli', 13),
(918, 'Kurukshetra', 13),
(919, 'Loharu', 13),
(920, 'Mahendragarh', 13),
(921, 'Meham', 13),
(922, 'Mewat', 13),
(923, 'Mohindergarh', 13),
(924, 'Naraingarh', 13),
(925, 'Narnaul', 13),
(926, 'Narwana', 13),
(927, 'Nilokheri', 13),
(928, 'Nuh', 13),
(929, 'Palwal', 13),
(930, 'Panchkula', 13),
(931, 'Panipat', 13),
(932, 'Pehowa', 13),
(933, 'Ratia', 13),
(934, 'Rewari', 13),
(935, 'Rohtak', 13),
(936, 'Safidon', 13),
(937, 'Sirsa', 13),
(938, 'Siwani', 13),
(939, 'Sonipat', 13),
(940, 'Tohana', 13),
(941, 'Tohsam', 13),
(942, 'Yamunanagar', 13),
(943, 'Amb', 14),
(944, 'Arki', 14),
(945, 'Banjar', 14),
(946, 'Bharmour', 14),
(947, 'Bilaspur', 14),
(948, 'Chamba', 14),
(949, 'Churah', 14),
(950, 'Dalhousie', 14),
(951, 'Dehra Gopipur', 14),
(952, 'Hamirpur', 14),
(953, 'Jogindernagar', 14),
(954, 'Kalpa', 14),
(955, 'Kangra', 14),
(956, 'Kinnaur', 14),
(957, 'Kullu', 14),
(958, 'Lahaul', 14),
(959, 'Mandi', 14),
(960, 'Nahan', 14),
(961, 'Nalagarh', 14),
(962, 'Nirmand', 14),
(963, 'Nurpur', 14),
(964, 'Palampur', 14),
(965, 'Pangi', 14),
(966, 'Paonta', 14),
(967, 'Pooh', 14),
(968, 'Rajgarh', 14),
(969, 'Rampur Bushahar', 14),
(970, 'Rohru', 14),
(971, 'Shimla', 14),
(972, 'Sirmaur', 14),
(973, 'Solan', 14),
(974, 'Spiti', 14),
(975, 'Sundernagar', 14),
(976, 'Theog', 14),
(977, 'Udaipur', 14),
(978, 'Una', 14),
(979, 'Akhnoor', 15),
(980, 'Anantnag', 15),
(981, 'Badgam', 15),
(982, 'Bandipur', 15),
(983, 'Baramulla', 15),
(984, 'Basholi', 15),
(985, 'Bedarwah', 15),
(986, 'Budgam', 15),
(987, 'Doda', 15),
(988, 'Gulmarg', 15),
(989, 'Jammu', 15),
(990, 'Kalakot', 15),
(991, 'Kargil', 15),
(992, 'Karnah', 15),
(993, 'Kathua', 15),
(994, 'Kishtwar', 15),
(995, 'Kulgam', 15),
(996, 'Kupwara', 15),
(997, 'Leh', 15),
(998, 'Mahore', 15),
(999, 'Nagrota', 15),
(1000, 'Nobra', 15),
(1001, 'Nowshera', 15),
(1002, 'Nyoma', 15),
(1003, 'Padam', 15),
(1004, 'Pahalgam', 15),
(1005, 'Patnitop', 15),
(1006, 'Poonch', 15),
(1007, 'Pulwama', 15),
(1008, 'Rajouri', 15),
(1009, 'Ramban', 15),
(1010, 'Ramnagar', 15),
(1011, 'Reasi', 15),
(1012, 'Samba', 15),
(1013, 'Srinagar', 15),
(1014, 'Udhampur', 15),
(1015, 'Vaishno Devi', 15),
(1016, 'Bagodar', 16),
(1017, 'Baharagora', 16),
(1018, 'Balumath', 16),
(1019, 'Barhi', 16),
(1020, 'Barkagaon', 16),
(1021, 'Barwadih', 16),
(1022, 'Basia', 16),
(1023, 'Bermo', 16),
(1024, 'Bhandaria', 16),
(1025, 'Bhawanathpur', 16),
(1026, 'Bishrampur', 16),
(1027, 'Bokaro', 16),
(1028, 'Bolwa', 16),
(1029, 'Bundu', 16),
(1030, 'Chaibasa', 16),
(1031, 'Chainpur', 16),
(1032, 'Chakardharpur', 16),
(1033, 'Chandil', 16),
(1034, 'Chatra', 16),
(1035, 'Chavparan', 16),
(1036, 'Daltonganj', 16),
(1037, 'Deoghar', 16),
(1038, 'Dhanbad', 16),
(1039, 'Dumka', 16),
(1040, 'Dumri', 16),
(1041, 'Garhwa', 16),
(1042, 'Garu', 16),
(1043, 'Ghaghra', 16),
(1044, 'Ghatsila', 16),
(1045, 'Giridih', 16),
(1046, 'Godda', 16),
(1047, 'Gomia', 16),
(1048, 'Govindpur', 16),
(1049, 'Gumla', 16),
(1050, 'Hazaribagh', 16),
(1051, 'Hunterganj', 16),
(1052, 'Ichak', 16),
(1053, 'Itki', 16),
(1054, 'Jagarnathpur', 16),
(1055, 'Jamshedpur', 16),
(1056, 'Jamtara', 16),
(1057, 'Japla', 16),
(1058, 'Jharmundi', 16),
(1059, 'Jhinkpani', 16),
(1060, 'Jhumaritalaiya', 16),
(1061, 'Kathikund', 16),
(1062, 'Kharsawa', 16),
(1063, 'Khunti', 16),
(1064, 'Koderma', 16),
(1065, 'Kolebira', 16),
(1066, 'Latehar', 16),
(1067, 'Lohardaga', 16),
(1068, 'Madhupur', 16),
(1069, 'Mahagama', 16),
(1070, 'Maheshpur Raj', 16),
(1071, 'Mandar', 16),
(1072, 'Mandu', 16),
(1073, 'Manoharpur', 16),
(1074, 'Muri', 16),
(1075, 'Nagarutatri', 16),
(1076, 'Nala', 16),
(1077, 'Noamundi', 16),
(1078, 'Pakur', 16),
(1079, 'Palamu', 16),
(1080, 'Palkot', 16),
(1081, 'Patan', 16),
(1082, 'Rajdhanwar', 16),
(1083, 'Rajmahal', 16),
(1084, 'Ramgarh', 16),
(1085, 'Ranchi', 16),
(1086, 'Sahibganj', 16),
(1087, 'Saraikela', 16),
(1088, 'Simaria', 16),
(1089, 'Simdega', 16),
(1090, 'Singhbhum', 16),
(1091, 'Tisri', 16),
(1092, 'Torpa', 16),
(1093, 'Bagodar', 17),
(1094, 'Baharagora', 17),
(1095, 'Balumath', 17),
(1096, 'Barhi', 17),
(1097, 'Barkagaon', 17),
(1098, 'Barwadih', 17),
(1099, 'Basia', 17),
(1100, 'Bermo', 17),
(1101, 'Bhandaria', 17),
(1102, 'Bhawanathpur', 17),
(1103, 'Bishrampur', 17),
(1104, 'Bokaro', 17),
(1105, 'Bolwa', 17),
(1106, 'Bundu', 17),
(1107, 'Chaibasa', 17),
(1108, 'Chainpur', 17),
(1109, 'Chakardharpur', 17),
(1110, 'Chandil', 17),
(1111, 'Chatra', 17),
(1112, 'Chavparan', 17),
(1113, 'Daltonganj', 17),
(1114, 'Deoghar', 17),
(1115, 'Dhanbad', 17),
(1116, 'Dumka', 17),
(1117, 'Dumri', 17),
(1118, 'Garhwa', 17),
(1119, 'Garu', 17),
(1120, 'Ghaghra', 17),
(1121, 'Ghatsila', 17),
(1122, 'Giridih', 17),
(1123, 'Godda', 17),
(1124, 'Gomia', 17),
(1125, 'Govindpur', 17),
(1126, 'Gumla', 17),
(1127, 'Hazaribagh', 17),
(1128, 'Hunterganj', 17),
(1129, 'Ichak', 17),
(1130, 'Itki', 17),
(1131, 'Jagarnathpur', 17),
(1132, 'Jamshedpur', 17),
(1133, 'Jamtara', 17),
(1134, 'Japla', 17),
(1135, 'Jharmundi', 17),
(1136, 'Jhinkpani', 17),
(1137, 'Jhumaritalaiya', 17),
(1138, 'Kathikund', 17),
(1139, 'Kharsawa', 17),
(1140, 'Khunti', 17),
(1141, 'Koderma', 17),
(1142, 'Kolebira', 17),
(1143, 'Latehar', 17),
(1144, 'Lohardaga', 17),
(1145, 'Madhupur', 17),
(1146, 'Mahagama', 17),
(1147, 'Maheshpur Raj', 17),
(1148, 'Mandar', 17),
(1149, 'Mandu', 17),
(1150, 'Manoharpur', 17),
(1151, 'Muri', 17),
(1152, 'Nagarutatri', 17),
(1153, 'Nala', 17),
(1154, 'Noamundi', 17),
(1155, 'Pakur', 17),
(1156, 'Palamu', 17),
(1157, 'Palkot', 17),
(1158, 'Patan', 17),
(1159, 'Rajdhanwar', 17),
(1160, 'Rajmahal', 17),
(1161, 'Ramgarh', 17),
(1162, 'Ranchi', 17),
(1163, 'Sahibganj', 17),
(1164, 'Saraikela', 17),
(1165, 'Simaria', 17),
(1166, 'Simdega', 17),
(1167, 'Singhbhum', 17),
(1168, 'Tisri', 17),
(1169, 'Torpa', 17),
(1170, 'Afzalpur', 18),
(1171, 'Ainapur', 18),
(1172, 'Aland', 18),
(1173, 'Alur', 18),
(1174, 'Anekal', 18),
(1175, 'Ankola', 18),
(1176, 'Arsikere', 18),
(1177, 'Athani', 18),
(1178, 'Aurad', 18),
(1179, 'Bableshwar', 18),
(1180, 'Badami', 18),
(1181, 'Bagalkot', 18),
(1182, 'Bagepalli', 18),
(1183, 'Bailhongal', 18),
(1184, 'Bangalore', 18),
(1185, 'Bangalore Rural', 18),
(1186, 'Bangarpet', 18),
(1187, 'Bantwal', 18),
(1188, 'Basavakalyan', 18),
(1189, 'Basavanabagewadi', 18),
(1190, 'Basavapatna', 18),
(1191, 'Belgaum', 18),
(1192, 'Bellary', 18),
(1193, 'Belthangady', 18),
(1194, 'Belur', 18),
(1195, 'Bhadravati', 18),
(1196, 'Bhalki', 18),
(1197, 'Bhatkal', 18),
(1198, 'Bidar', 18),
(1199, 'Bijapur', 18),
(1200, 'Biligi', 18),
(1201, 'Chadchan', 18),
(1202, 'Challakere', 18),
(1203, 'Chamrajnagar', 18),
(1204, 'Channagiri', 18),
(1205, 'Channapatna', 18),
(1206, 'Channarayapatna', 18),
(1207, 'Chickmagalur', 18),
(1208, 'Chikballapur', 18),
(1209, 'Chikkaballapur', 18),
(1210, 'Chikkanayakanahalli', 18),
(1211, 'Chikkodi', 18),
(1212, 'Chikmagalur', 18),
(1213, 'Chincholi', 18),
(1214, 'Chintamani', 18),
(1215, 'Chitradurga', 18),
(1216, 'Chittapur', 18),
(1217, 'Cowdahalli', 18),
(1218, 'Davanagere', 18),
(1219, 'Deodurga', 18),
(1220, 'Devangere', 18),
(1221, 'Devarahippargi', 18),
(1222, 'Dharwad', 18),
(1223, 'Doddaballapur', 18),
(1224, 'Gadag', 18),
(1225, 'Gangavathi', 18),
(1226, 'Gokak', 18),
(1227, 'Gowribdanpur', 18),
(1228, 'Gubbi', 18),
(1229, 'Gulbarga', 18),
(1230, 'Gundlupet', 18),
(1231, 'H B Halli', 18),
(1232, 'H D  Kote', 18),
(1233, 'Haliyal', 18),
(1234, 'Hampi', 18),
(1235, 'Hangal', 18),
(1236, 'Harapanahalli', 18),
(1237, 'Hassan', 18),
(1238, 'Haveri', 18),
(1239, 'Hebri', 18),
(1240, 'Hirekerur', 18),
(1241, 'Hiriyur', 18),
(1242, 'Holalkere', 18),
(1243, 'Holenarsipur', 18),
(1244, 'Honnali', 18),
(1245, 'Honnavar', 18),
(1246, 'Hosadurga', 18),
(1247, 'Hosakote', 18),
(1248, 'Hosanagara', 18),
(1249, 'Hospet', 18),
(1250, 'Hubli', 18),
(1251, 'Hukkeri', 18),
(1252, 'Humnabad', 18),
(1253, 'Hungund', 18),
(1254, 'Hunsagi', 18),
(1255, 'Hunsur', 18),
(1256, 'Huvinahadagali', 18),
(1257, 'Indi', 18),
(1258, 'Jagalur', 18),
(1259, 'Jamkhandi', 18),
(1260, 'Jewargi', 18),
(1261, 'Joida', 18),
(1262, 'K R  Nagar', 18),
(1263, 'Kadur', 18),
(1264, 'Kalghatagi', 18),
(1265, 'Kamalapur', 18),
(1266, 'Kanakapura', 18),
(1267, 'Kannada', 18),
(1268, 'Kargal', 18),
(1269, 'Karkala', 18),
(1270, 'Karwar', 18),
(1271, 'Khanapur', 18),
(1272, 'Kodagu', 18),
(1273, 'Kolar', 18),
(1274, 'Kollegal', 18),
(1275, 'Koppa', 18),
(1276, 'Koppal', 18),
(1277, 'Koratageri', 18),
(1278, 'Krishnarajapet', 18),
(1279, 'Kudligi', 18),
(1280, 'Kumta', 18),
(1281, 'Kundapur', 18),
(1282, 'Kundgol', 18),
(1283, 'Kunigal', 18),
(1284, 'Kurugodu', 18),
(1285, 'Kustagi', 18),
(1286, 'Lingsugur', 18),
(1287, 'Madikeri', 18),
(1288, 'Madugiri', 18),
(1289, 'Malavalli', 18),
(1290, 'Malur', 18),
(1291, 'Mandya', 18),
(1292, 'Mangalore', 17),
(1293, 'Manipal', 18),
(1294, 'Manvi', 18),
(1295, 'Mashal', 18),
(1296, 'Molkalmuru', 18),
(1297, 'Mudalgi', 18),
(1298, 'Muddebihal', 18),
(1299, 'Mudhol', 18),
(1300, 'Mudigere', 18),
(1301, 'Mulbagal', 18),
(1302, 'Mundagod', 18),
(1303, 'Mundargi', 18),
(1304, 'Murugod', 18),
(1305, 'Mysore', 18),
(1306, 'Nagamangala', 18),
(1307, 'Nanjangud', 18),
(1308, 'Nargund', 18),
(1309, 'Narsimrajapur', 18),
(1310, 'Navalgund', 18),
(1311, 'Nelamangala', 18),
(1312, 'Nimburga', 18),
(1313, 'Pandavapura', 18),
(1314, 'Pavagada', 18),
(1315, 'Puttur', 18),
(1316, 'Raibag', 18),
(1317, 'Raichur', 18),
(1318, 'Ramdurg', 18),
(1319, 'Ranebennur', 18),
(1320, 'Ron', 18),
(1321, 'Sagar', 18),
(1322, 'Sakleshpur', 18),
(1323, 'Salkani', 18),
(1324, 'Sandur', 18),
(1325, 'Saundatti', 18),
(1326, 'Savanur', 18),
(1327, 'Sedam', 18),
(1328, 'Shahapur', 18),
(1329, 'Shankarnarayana', 18),
(1330, 'Shikaripura', 18),
(1331, 'Shimoga', 18),
(1332, 'Shirahatti', 18),
(1333, 'Shorapur', 18),
(1334, 'Siddapur', 18),
(1335, 'Sidlaghatta', 18),
(1336, 'Sindagi', 18),
(1337, 'Sindhanur', 18),
(1338, 'Sira', 18),
(1339, 'Sirsi', 18),
(1340, 'Siruguppa', 18),
(1341, 'Somwarpet', 18),
(1342, 'Sorab', 18),
(1343, 'Sringeri', 18),
(1344, 'Sriniwaspur', 18),
(1345, 'Srirangapatna', 18),
(1346, 'Sullia', 18),
(1347, 'T  Narsipur', 18),
(1348, 'Tallak', 18),
(1349, 'Tarikere', 18),
(1350, 'Telgi', 18),
(1351, 'Thirthahalli', 18),
(1352, 'Tiptur', 18),
(1353, 'Tumkur', 18),
(1354, 'Turuvekere', 18),
(1355, 'Udupi', 18),
(1356, 'Virajpet', 18),
(1357, 'Wadi', 18),
(1358, 'Yadgiri', 18),
(1359, 'Yelburga', 18),
(1360, 'Yellapur', 18),
(1361, 'Agatti Island', 19),
(1362, 'Bingaram Island', 19),
(1363, 'Bitra Island', 19),
(1364, 'Chetlat Island', 19),
(1365, 'Kadmat Island', 19),
(1366, 'Kalpeni Island', 19),
(1367, 'Kavaratti Island', 19),
(1368, 'Kiltan Island', 19),
(1369, 'Lakshadweep Sea', 19),
(1370, 'Minicoy Island', 19),
(1371, 'North Island', 19),
(1372, 'South Island', 19),
(1373, 'Agar', 20),
(1374, 'Ajaigarh', 20),
(1375, 'Alirajpur', 20),
(1376, 'Amarpatan', 20),
(1377, 'Amarwada', 20),
(1378, 'Ambah', 20),
(1379, 'Anuppur', 20),
(1380, 'Arone', 20),
(1381, 'Ashoknagar', 20),
(1382, 'Ashta', 20),
(1383, 'Atner', 20),
(1384, 'Babaichichli', 20),
(1385, 'Badamalhera', 20),
(1386, 'Badarwsas', 20),
(1387, 'Badnagar', 20),
(1388, 'Badnawar', 20),
(1389, 'Badwani', 20),
(1390, 'Bagli', 20),
(1391, 'Baihar', 20),
(1392, 'Balaghat', 20),
(1393, 'Baldeogarh', 20),
(1394, 'Baldi', 20),
(1395, 'Bamori', 20),
(1396, 'Banda', 20),
(1397, 'Bandhavgarh', 20),
(1398, 'Bareli', 20),
(1399, 'Baroda', 20),
(1400, 'Barwaha', 20),
(1401, 'Barwani', 20),
(1402, 'Batkakhapa', 20),
(1403, 'Begamganj', 20),
(1404, 'Beohari', 20),
(1405, 'Berasia', 20),
(1406, 'Berchha', 20),
(1407, 'Betul', 20),
(1408, 'Bhainsdehi', 20),
(1409, 'Bhander', 20),
(1410, 'Bhanpura', 20),
(1411, 'Bhikangaon', 20),
(1412, 'Bhimpur', 20),
(1413, 'Bhind', 20),
(1414, 'Bhitarwar', 20),
(1415, 'Bhopal', 20),
(1416, 'Biaora', 20),
(1417, 'Bijadandi', 20),
(1418, 'Bijawar', 20),
(1419, 'Bijaypur', 20),
(1420, 'Bina', 20),
(1421, 'Birsa', 20),
(1422, 'Birsinghpur', 20),
(1423, 'Budhni', 20),
(1424, 'Burhanpur', 20),
(1425, 'Buxwaha', 20),
(1426, 'Chachaura', 20),
(1427, 'Chanderi', 20),
(1428, 'Chaurai', 20),
(1429, 'Chhapara', 20),
(1430, 'Chhatarpur', 20),
(1431, 'Chhindwara', 20),
(1432, 'Chicholi', 20),
(1433, 'Chitrangi', 20),
(1434, 'Churhat', 20),
(1435, 'Dabra', 20),
(1436, 'Damoh', 20),
(1437, 'Datia', 20),
(1438, 'Deori', 20),
(1439, 'Deosar', 20),
(1440, 'Depalpur', 20),
(1441, 'Dewas', 20),
(1442, 'Dhar', 20),
(1443, 'Dharampuri', 20),
(1444, 'Dindori', 20),
(1445, 'Gadarwara', 20),
(1446, 'Gairatganj', 20),
(1447, 'Ganjbasoda', 20),
(1448, 'Garoth', 20),
(1449, 'Ghansour', 20),
(1450, 'Ghatia', 20),
(1451, 'Ghatigaon', 20),
(1452, 'Ghorandogri', 20),
(1453, 'Ghughari', 20),
(1454, 'Gogaon', 20),
(1455, 'Gohad', 20),
(1456, 'Goharganj', 20),
(1457, 'Gopalganj', 20),
(1458, 'Gotegaon', 20),
(1459, 'Gourihar', 20),
(1460, 'Guna', 20),
(1461, 'Gunnore', 20),
(1462, 'Gwalior', 20),
(1463, 'Gyraspur', 20),
(1464, 'Hanumana', 20),
(1465, 'Harda', 20),
(1466, 'Harrai', 20),
(1467, 'Harsud', 20),
(1468, 'Hatta', 20),
(1469, 'Hoshangabad', 20),
(1470, 'Ichhawar', 20),
(1471, 'Indore', 20),
(1472, 'Isagarh', 20),
(1473, 'Itarsi', 20),
(1474, 'Jabalpur', 20),
(1475, 'Jabera', 20),
(1476, 'Jagdalpur', 20),
(1477, 'Jaisinghnagar', 20),
(1478, 'Jaithari', 20),
(1479, 'Jaitpur', 20),
(1480, 'Jaitwara', 20),
(1481, 'Jamai', 20),
(1482, 'Jaora', 20),
(1483, 'Jatara', 20),
(1484, 'Jawad', 20),
(1485, 'Jhabua', 20),
(1486, 'Jobat', 20),
(1487, 'Jora', 20),
(1488, 'Kakaiya', 20),
(1489, 'Kannod', 20),
(1490, 'Kannodi', 20),
(1491, 'Karanjia', 20),
(1492, 'Kareli', 20),
(1493, 'Karera', 20),
(1494, 'Karhal', 20),
(1495, 'Karpa', 20),
(1496, 'Kasrawad', 20),
(1497, 'Katangi', 20),
(1498, 'Katni', 20),
(1499, 'Keolari', 20),
(1500, 'Khachrod', 20),
(1501, 'Khajuraho', 20),
(1502, 'Khakner', 20),
(1503, 'Khalwa', 20),
(1504, 'Khandwa', 20),
(1505, 'Khaniadhana', 20),
(1506, 'Khargone', 20),
(1507, 'Khategaon', 20),
(1508, 'Khetia', 20),
(1509, 'Khilchipur', 20),
(1510, 'Khirkiya', 20),
(1511, 'Khurai', 20),
(1512, 'Kolaras', 20),
(1513, 'Kotma', 20),
(1514, 'Kukshi', 20),
(1515, 'Kundam', 20),
(1516, 'Kurwai', 20),
(1517, 'Kusmi', 20),
(1518, 'Laher', 20),
(1519, 'Lakhnadon', 20),
(1520, 'Lamta', 20),
(1521, 'Lanji', 20),
(1522, 'Lateri', 20),
(1523, 'Laundi', 20),
(1524, 'Maheshwar', 20),
(1525, 'Mahidpurcity', 20),
(1526, 'Maihar', 20),
(1527, 'Majhagwan', 20),
(1528, 'Majholi', 20),
(1529, 'Malhargarh', 20),
(1530, 'Manasa', 20),
(1531, 'Manawar', 20),
(1532, 'Mandla', 20),
(1533, 'Mandsaur', 20),
(1534, 'Manpur', 20),
(1535, 'Mauganj', 20),
(1536, 'Mawai', 20),
(1537, 'Mehgaon', 20),
(1538, 'Mhow', 20),
(1539, 'Morena', 20),
(1540, 'Multai', 20),
(1541, 'Mungaoli', 20),
(1542, 'Nagod', 20),
(1543, 'Nainpur', 20),
(1544, 'Narsingarh', 20),
(1545, 'Narsinghpur', 20),
(1546, 'Narwar', 20),
(1547, 'Nasrullaganj', 20),
(1548, 'Nateran', 20),
(1549, 'Neemuch', 20),
(1550, 'Niwari', 20),
(1551, 'Niwas', 20),
(1552, 'Nowgaon', 20),
(1553, 'Pachmarhi', 20),
(1554, 'Pandhana', 20),
(1555, 'Pandhurna', 20),
(1556, 'Panna', 20),
(1557, 'Parasia', 20),
(1558, 'Patan', 20),
(1559, 'Patera', 20),
(1560, 'Patharia', 20),
(1561, 'Pawai', 20),
(1562, 'Petlawad', 20),
(1563, 'Pichhore', 20),
(1564, 'Piparia', 20),
(1565, 'Pohari', 20),
(1566, 'Prabhapattan', 20),
(1567, 'Punasa', 20),
(1568, 'Pushprajgarh', 20),
(1569, 'Raghogarh', 20),
(1570, 'Raghunathpur', 20),
(1571, 'Rahatgarh', 20),
(1572, 'Raisen', 20),
(1573, 'Rajgarh', 20),
(1574, 'Rajpur', 20),
(1575, 'Ratlam', 20),
(1576, 'Rehli', 20),
(1577, 'Rewa', 20),
(1578, 'Sabalgarh', 20),
(1579, 'Sagar', 20),
(1580, 'Sailana', 20),
(1581, 'Sanwer', 20),
(1582, 'Sarangpur', 20),
(1583, 'Sardarpur', 20),
(1584, 'Satna', 20),
(1585, 'Saunsar', 20),
(1586, 'Sehore', 20),
(1587, 'Sendhwa', 20),
(1588, 'Seondha', 20),
(1589, 'Seoni', 20),
(1590, 'Seonimalwa', 20),
(1591, 'Shahdol', 20),
(1592, 'Shahnagar', 20),
(1593, 'Shahpur', 20),
(1594, 'Shajapur', 20),
(1595, 'Sheopur', 20),
(1596, 'Sheopurkalan', 20),
(1597, 'Shivpuri', 20),
(1598, 'Shujalpur', 20),
(1599, 'Sidhi', 20),
(1600, 'Sihora', 20),
(1601, 'Silwani', 20),
(1602, 'Singrauli', 20),
(1603, 'Sirmour', 20),
(1604, 'Sironj', 20),
(1605, 'Sitamau', 20),
(1606, 'Sohagpur', 20),
(1607, 'Sondhwa', 20),
(1608, 'Sonkatch', 20),
(1609, 'Susner', 20),
(1610, 'Tamia', 20),
(1611, 'Tarana', 20),
(1612, 'Tendukheda', 20),
(1613, 'Teonthar', 20),
(1614, 'Thandla', 20),
(1615, 'Tikamgarh', 20),
(1616, 'Timarani', 20),
(1617, 'Udaipura', 20),
(1618, 'Ujjain', 20),
(1619, 'Umaria', 20),
(1620, 'Umariapan', 20),
(1621, 'Vidisha', 20),
(1622, 'Vijayraghogarh', 20),
(1623, 'Waraseoni', 20),
(1624, 'Zhirnia', 20),
(1625, 'Achalpur', 21),
(1626, 'Aheri', 21),
(1627, 'Ahmednagar', 21),
(1628, 'Ahmedpur', 21),
(1629, 'Ajara', 21),
(1630, 'Akkalkot', 21),
(1631, 'Akola', 21),
(1632, 'Akole', 21),
(1633, 'Akot', 21),
(1634, 'Alibagh', 21),
(1635, 'Amagaon', 21),
(1636, 'Amalner', 21),
(1637, 'Ambad', 21),
(1638, 'Ambejogai', 21),
(1639, 'Amravati', 21),
(1640, 'Arjuni Merogaon', 21),
(1641, 'Arvi', 21),
(1642, 'Ashti', 21),
(1643, 'Atpadi', 21),
(1644, 'Aurangabad', 21),
(1645, 'Ausa', 21),
(1646, 'Babhulgaon', 21),
(1647, 'Balapur', 21),
(1648, 'Baramati', 21),
(1649, 'Barshi Takli', 21),
(1650, 'Barsi', 21),
(1651, 'Basmatnagar', 21),
(1652, 'Bassein', 21),
(1653, 'Beed', 21),
(1654, 'Bhadrawati', 21),
(1655, 'Bhamregadh', 21),
(1656, 'Bhandara', 21),
(1657, 'Bhir', 21),
(1658, 'Bhiwandi', 21),
(1659, 'Bhiwapur', 21),
(1660, 'Bhokar', 21),
(1661, 'Bhokardan', 21),
(1662, 'Bhoom', 21),
(1663, 'Bhor', 21),
(1664, 'Bhudargad', 21),
(1665, 'Bhusawal', 21),
(1666, 'Billoli', 21),
(1667, 'Brahmapuri', 21),
(1668, 'Buldhana', 21),
(1669, 'Butibori', 21),
(1670, 'Chalisgaon', 21),
(1671, 'Chamorshi', 21),
(1672, 'Chandgad', 21),
(1673, 'Chandrapur', 21),
(1674, 'Chandur', 21),
(1675, 'Chanwad', 21),
(1676, 'Chhikaldara', 21),
(1677, 'Chikhali', 21),
(1678, 'Chinchwad', 21),
(1679, 'Chiplun', 21),
(1680, 'Chopda', 21),
(1681, 'Chumur', 21),
(1682, 'Dahanu', 21),
(1683, 'Dapoli', 21),
(1684, 'Darwaha', 21),
(1685, 'Daryapur', 21),
(1686, 'Daund', 21),
(1687, 'Degloor', 21),
(1688, 'Delhi Tanda', 21),
(1689, 'Deogad', 21),
(1690, 'Deolgaonraja', 21),
(1691, 'Deori', 21),
(1692, 'Desaiganj', 21),
(1693, 'Dhadgaon', 21),
(1694, 'Dhanora', 21),
(1695, 'Dharani', 21),
(1696, 'Dhiwadi', 21),
(1697, 'Dhule', 21),
(1698, 'Dhulia', 21),
(1699, 'Digras', 21),
(1700, 'Dindori', 21),
(1701, 'Edalabad', 21),
(1702, 'Erandul', 21),
(1703, 'Etapalli', 21),
(1704, 'Gadhchiroli', 21),
(1705, 'Gadhinglaj', 21),
(1706, 'Gaganbavada', 21),
(1707, 'Gangakhed', 21),
(1708, 'Gangapur', 21),
(1709, 'Gevrai', 21),
(1710, 'Ghatanji', 21),
(1711, 'Golegaon', 21),
(1712, 'Gondia', 21),
(1713, 'Gondpipri', 21),
(1714, 'Goregaon', 21),
(1715, 'Guhagar', 21),
(1716, 'Hadgaon', 21),
(1717, 'Hatkangale', 21),
(1718, 'Hinganghat', 21),
(1719, 'Hingoli', 21),
(1720, 'Hingua', 21),
(1721, 'Igatpuri', 21),
(1722, 'Indapur', 21),
(1723, 'Islampur', 21),
(1724, 'Jalgaon', 21),
(1725, 'Jalna', 21),
(1726, 'Jamkhed', 21),
(1727, 'Jamner', 21),
(1728, 'Jath', 21),
(1729, 'Jawahar', 21),
(1730, 'Jintdor', 21),
(1731, 'Junnar', 21),
(1732, 'Kagal', 21),
(1733, 'Kaij', 21),
(1734, 'Kalamb', 21),
(1735, 'Kalamnuri', 21),
(1736, 'Kallam', 21),
(1737, 'Kalmeshwar', 21),
(1738, 'Kalwan', 21),
(1739, 'Kalyan', 21),
(1740, 'Kamptee', 21),
(1741, 'Kandhar', 21),
(1742, 'Kankavali', 21),
(1743, 'Kannad', 21),
(1744, 'Karad', 21),
(1745, 'Karjat', 21),
(1746, 'Karmala', 21),
(1747, 'Katol', 21),
(1748, 'Kavathemankal', 21),
(1749, 'Kedgaon', 21),
(1750, 'Khadakwasala', 21),
(1751, 'Khamgaon', 21),
(1752, 'Khed', 21),
(1753, 'Khopoli', 21),
(1754, 'Khultabad', 21),
(1755, 'Kinwat', 21),
(1756, 'Kolhapur', 21),
(1757, 'Kopargaon', 21),
(1758, 'Koregaon', 21),
(1759, 'Kudal', 21),
(1760, 'Kuhi', 21),
(1761, 'Kurkheda', 21),
(1762, 'Kusumba', 21),
(1763, 'Lakhandur', 21),
(1764, 'Langa', 21),
(1765, 'Latur', 21),
(1766, 'Lonar', 21),
(1767, 'Lonavala', 21),
(1768, 'Madangad', 21),
(1769, 'Madha', 21),
(1770, 'Mahabaleshwar', 21),
(1771, 'Mahad', 21),
(1772, 'Mahagaon', 21),
(1773, 'Mahasala', 21),
(1774, 'Mahaswad', 21),
(1775, 'Malegaon', 21),
(1776, 'Malgaon', 21),
(1777, 'Malgund', 21),
(1778, 'Malkapur', 21),
(1779, 'Malsuras', 21),
(1780, 'Malwan', 21),
(1781, 'Mancher', 21),
(1782, 'Mangalwedha', 21),
(1783, 'Mangaon', 21),
(1784, 'Mangrulpur', 21),
(1785, 'Manjalegaon', 21),
(1786, 'Manmad', 21),
(1787, 'Maregaon', 21),
(1788, 'Mehda', 21),
(1789, 'Mekhar', 21),
(1790, 'Mohadi', 21),
(1791, 'Mohol', 21),
(1792, 'Mokhada', 21),
(1793, 'Morshi', 21),
(1794, 'Mouda', 21),
(1795, 'Mukhed', 21),
(1796, 'Mul', 21),
(1797, 'Mumbai', 21),
(1798, 'Murbad', 21),
(1799, 'Murtizapur', 21),
(1800, 'Murud', 21),
(1801, 'Nagbhir', 21),
(1802, 'Nagpur', 21),
(1803, 'Nahavara', 21),
(1804, 'Nanded', 21),
(1805, 'Nandgaon', 21),
(1806, 'Nandnva', 21),
(1807, 'Nandurbar', 21),
(1808, 'Narkhed', 21),
(1809, 'Nashik', 21),
(1810, 'Navapur', 21),
(1811, 'Ner', 21),
(1812, 'Newasa', 21),
(1813, 'Nilanga', 21),
(1814, 'Niphad', 21),
(1815, 'Omerga', 21),
(1816, 'Osmanabad', 21),
(1817, 'Pachora', 21),
(1818, 'Paithan', 21),
(1819, 'Palghar', 21),
(1820, 'Pali', 21),
(1821, 'Pandharkawada', 21),
(1822, 'Pandharpur', 21),
(1823, 'Panhala', 21),
(1824, 'Paranda', 21),
(1825, 'Parbhani', 21),
(1826, 'Parner', 21),
(1827, 'Parola', 21),
(1828, 'Parseoni', 21),
(1829, 'Partur', 21),
(1830, 'Patan', 21),
(1831, 'Pathardi', 21),
(1832, 'Pathari', 21),
(1833, 'Patoda', 21),
(1834, 'Pauni', 21),
(1835, 'Peint', 21),
(1836, 'Pen', 21),
(1837, 'Phaltan', 21),
(1838, 'Pimpalner', 21),
(1839, 'Pirangut', 21),
(1840, 'Poladpur', 21),
(1841, 'Pune', 21),
(1842, 'Pusad', 21),
(1843, 'Pusegaon', 21),
(1844, 'Radhanagar', 21),
(1845, 'Rahuri', 21),
(1846, 'Raigad', 21),
(1847, 'Rajapur', 21),
(1848, 'Rajgurunagar', 21),
(1849, 'Rajura', 21),
(1850, 'Ralegaon', 21),
(1851, 'Ramtek', 21),
(1852, 'Ratnagiri', 21),
(1853, 'Raver', 21),
(1854, 'Risod', 21),
(1855, 'Roha', 21),
(1856, 'Sakarwadi', 21),
(1857, 'Sakoli', 21),
(1858, 'Sakri', 21),
(1859, 'Salekasa', 21),
(1860, 'Samudrapur', 21),
(1861, 'Sangamner', 21),
(1862, 'Sanganeshwar', 21),
(1863, 'Sangli', 21),
(1864, 'Sangola', 21),
(1865, 'Sanguem', 21),
(1866, 'Saoner', 21),
(1867, 'Saswad', 21),
(1868, 'Satana', 21),
(1869, 'Satara', 21),
(1870, 'Sawantwadi', 21),
(1871, 'Seloo', 21),
(1872, 'Shahada', 21),
(1873, 'Shahapur', 21),
(1874, 'Shahuwadi', 21),
(1875, 'Shevgaon', 21),
(1876, 'Shirala', 21),
(1877, 'Shirol', 21),
(1878, 'Shirpur', 21),
(1879, 'Shirur', 21),
(1880, 'Shirwal', 21),
(1881, 'Sholapur', 21),
(1882, 'Shri Rampur', 21),
(1883, 'Shrigonda', 21),
(1884, 'Shrivardhan', 21),
(1885, 'Sillod', 21),
(1886, 'Sinderwahi', 21),
(1887, 'Sindhudurg', 21),
(1888, 'Sindkheda', 21),
(1889, 'Sindkhedaraja', 21),
(1890, 'Sinnar', 21),
(1891, 'Sironcha', 21),
(1892, 'Soyegaon', 21),
(1893, 'Surgena', 21),
(1894, 'Talasari', 21),
(1895, 'Talegaon S Ji Pant', 21),
(1896, 'Taloda', 21),
(1897, 'Tasgaon', 21),
(1898, 'Thane', 21),
(1899, 'Tirora', 21),
(1900, 'Tiwasa', 21),
(1901, 'Trimbak', 21),
(1902, 'Tuljapur', 21),
(1903, 'Tumsar', 21),
(1904, 'Udgir', 21),
(1905, 'Umarkhed', 21),
(1906, 'Umrane', 21),
(1907, 'Umrer', 21),
(1908, 'Urlikanchan', 21),
(1909, 'Vaduj', 21),
(1910, 'Velhe', 21),
(1911, 'Vengurla', 21),
(1912, 'Vijapur', 21),
(1913, 'Vita', 21),
(1914, 'Wada', 21),
(1915, 'Wai', 21),
(1916, 'Walchandnagar', 21),
(1917, 'Wani', 21),
(1918, 'Wardha', 21),
(1919, 'Warlydwarud', 21),
(1920, 'Warora', 21),
(1921, 'Washim', 21),
(1922, 'Wathar', 21),
(1923, 'Yavatmal', 21),
(1924, 'Yawal', 21),
(1925, 'Yeola', 21),
(1926, 'Yeotmal', 21),
(1927, 'Bishnupur', 22),
(1928, 'Chakpikarong', 22),
(1929, 'Chandel', 22),
(1930, 'Chattrik', 22),
(1931, 'Churachandpur', 22),
(1932, 'Imphal', 22),
(1933, 'Jiribam', 22),
(1934, 'Kakching', 22),
(1935, 'Kalapahar', 22),
(1936, 'Mao', 22),
(1937, 'Mulam', 22),
(1938, 'Parbung', 22),
(1939, 'Sadarhills', 22),
(1940, 'Saibom', 22),
(1941, 'Sempang', 22),
(1942, 'Senapati', 22),
(1943, 'Sochumer', 22),
(1944, 'Taloulong', 22),
(1945, 'Tamenglong', 22),
(1946, 'Thinghat', 22),
(1947, 'Thoubal', 22),
(1948, 'Ukhrul', 22),
(1949, 'Amlaren', 23),
(1950, 'Baghmara', 23),
(1951, 'Cherrapunjee', 23),
(1952, 'Dadengiri', 23),
(1953, 'Garo Hills', 23),
(1954, 'Jaintia Hills', 23),
(1955, 'Jowai', 23),
(1956, 'Khasi Hills', 23),
(1957, 'Khliehriat', 23),
(1958, 'Mariang', 23),
(1959, 'Mawkyrwat', 23),
(1960, 'Nongpoh', 23),
(1961, 'Nongstoin', 23),
(1962, 'Resubelpara', 23),
(1963, 'Ri Bhoi', 23),
(1964, 'Shillong', 23),
(1965, 'Tura', 23),
(1966, 'Williamnagar', 23),
(1967, 'Aizawl', 24),
(1968, 'Champhai', 24),
(1969, 'Demagiri', 24),
(1970, 'Kolasib', 24),
(1971, 'Lawngtlai', 24),
(1972, 'Lunglei', 24),
(1973, 'Mamit', 24),
(1974, 'Saiha', 24),
(1975, 'Serchhip', 24),
(1976, 'Dimapur', 25),
(1977, 'Jalukie', 25),
(1978, 'Kiphire', 25),
(1979, 'Kohima', 25),
(1980, 'Mokokchung', 25),
(1981, 'Mon', 25),
(1982, 'Phek', 25),
(1983, 'Tuensang', 25),
(1984, 'Wokha', 25),
(1985, 'Zunheboto', 25),
(1986, 'Anandapur', 26),
(1987, 'Angul', 26),
(1988, 'Anugul', 26),
(1989, 'Aska', 26),
(1990, 'Athgarh', 26),
(1991, 'Athmallik', 26),
(1992, 'Attabira', 26),
(1993, 'Bagdihi', 26),
(1994, 'Balangir', 26),
(1995, 'Balasore', 26),
(1996, 'Baleswar', 26),
(1997, 'Baliguda', 26),
(1998, 'Balugaon', 26),
(1999, 'Banaigarh', 26),
(2000, 'Bangiriposi', 26),
(2001, 'Barbil', 26),
(2002, 'Bargarh', 26),
(2003, 'Baripada', 26),
(2004, 'Barkot', 26),
(2005, 'Basta', 26),
(2006, 'Berhampur', 26),
(2007, 'Betanati', 26),
(2008, 'Bhadrak', 26),
(2009, 'Bhanjanagar', 26),
(2010, 'Bhawanipatna', 26),
(2011, 'Bhubaneswar', 26),
(2012, 'Birmaharajpur', 26),
(2013, 'Bisam Cuttack', 26),
(2014, 'Boriguma', 26),
(2015, 'Boudh', 26),
(2016, 'Buguda', 26),
(2017, 'Chandbali', 26),
(2018, 'Chhatrapur', 26),
(2019, 'Chhendipada', 26),
(2020, 'Cuttack', 26),
(2021, 'Daringbadi', 26),
(2022, 'Daspalla', 26),
(2023, 'Deodgarh', 26),
(2024, 'Deogarh', 26),
(2025, 'Dhanmandal', 26),
(2026, 'Dharamgarh', 26),
(2027, 'Dhenkanal', 26),
(2028, 'Digapahandi', 26),
(2029, 'Dunguripali', 26),
(2030, 'G  Udayagiri', 26),
(2031, 'Gajapati', 26),
(2032, 'Ganjam', 26),
(2033, 'Ghatgaon', 26),
(2034, 'Gudari', 26),
(2035, 'Gunupur', 26),
(2036, 'Hemgiri', 26),
(2037, 'Hindol', 26),
(2038, 'Jagatsinghapur', 26),
(2039, 'Jajpur', 26),
(2040, 'Jamankira', 26),
(2041, 'Jashipur', 26),
(2042, 'Jayapatna', 26),
(2043, 'Jeypur', 26),
(2044, 'Jharigan', 26),
(2045, 'Jharsuguda', 26),
(2046, 'Jujumura', 26),
(2047, 'Kalahandi', 26),
(2048, 'Kalimela', 26),
(2049, 'Kamakhyanagar', 26),
(2050, 'Kandhamal', 26),
(2051, 'Kantabhanji', 26),
(2052, 'Kantamal', 26),
(2053, 'Karanjia', 26),
(2054, 'Kashipur', 26),
(2055, 'Kendrapara', 26),
(2056, 'Kendujhar', 26),
(2057, 'Keonjhar', 26),
(2058, 'Khalikote', 26),
(2059, 'Khordha', 26),
(2060, 'Khurda', 26),
(2061, 'Komana', 26),
(2062, 'Koraput', 26),
(2063, 'Kotagarh', 26),
(2064, 'Kuchinda', 26),
(2065, 'Lahunipara', 26),
(2066, 'Laxmipur', 26),
(2067, 'M  Rampur', 26),
(2068, 'Malkangiri', 26),
(2069, 'Mathili', 26),
(2070, 'Mayurbhanj', 26),
(2071, 'Mohana', 26),
(2072, 'Motu', 26),
(2073, 'Nabarangapur', 26),
(2074, 'Naktideul', 26),
(2075, 'Nandapur', 26),
(2076, 'Narlaroad', 26),
(2077, 'Narsinghpur', 26),
(2078, 'Nayagarh', 26),
(2079, 'Nimapara', 26),
(2080, 'Nowparatan', 26),
(2081, 'Nowrangapur', 26),
(2082, 'Nuapada', 26),
(2083, 'Padampur', 26),
(2084, 'Paikamal', 26),
(2085, 'Palla Hara', 26),
(2086, 'Papadhandi', 26),
(2087, 'Parajang', 26),
(2088, 'Pardip', 26),
(2089, 'Parlakhemundi', 26),
(2090, 'Patnagarh', 26),
(2091, 'Pattamundai', 26),
(2092, 'Phiringia', 26),
(2093, 'Phulbani', 26),
(2094, 'Puri', 26),
(2095, 'Puruna Katak', 26),
(2096, 'R  Udayigiri', 26),
(2097, 'Rairakhol', 26),
(2098, 'Rairangpur', 26),
(2099, 'Rajgangpur', 26),
(2100, 'Rajkhariar', 26),
(2101, 'Rayagada', 26),
(2102, 'Rourkela', 26),
(2103, 'Sambalpur', 26),
(2104, 'Sohela', 26),
(2105, 'Sonapur', 26),
(2106, 'Soro', 26),
(2107, 'Subarnapur', 26),
(2108, 'Sunabeda', 26),
(2109, 'Sundergarh', 26),
(2110, 'Surada', 26),
(2111, 'T  Rampur', 26),
(2112, 'Talcher', 26),
(2113, 'Telkoi', 26),
(2114, 'Titlagarh', 26),
(2115, 'Tumudibandha', 26),
(2116, 'Udala', 26),
(2117, 'Umerkote', 26),
(2118, 'Bahur', 27),
(2119, 'Karaikal', 27),
(2120, 'Mahe', 27),
(2121, 'Pondicherry', 27),
(2122, 'Purnankuppam', 27),
(2123, 'Valudavur', 27),
(2124, 'Villianur', 27),
(2125, 'Yanam', 27),
(2126, 'Abohar', 28),
(2127, 'Ajnala', 28),
(2128, 'Amritsar', 28),
(2129, 'Balachaur', 28),
(2130, 'Barnala', 28),
(2131, 'Batala', 28),
(2132, 'Bathinda', 28),
(2133, 'Chandigarh', 28),
(2134, 'Dasua', 28),
(2135, 'Dinanagar', 28),
(2136, 'Faridkot', 28),
(2137, 'Fatehgarh Sahib', 28),
(2138, 'Fazilka', 28),
(2139, 'Ferozepur', 28),
(2140, 'Garhashanker', 28),
(2141, 'Goindwal', 28),
(2142, 'Gurdaspur', 28),
(2143, 'Guruharsahai', 28),
(2144, 'Hoshiarpur', 28),
(2145, 'Jagraon', 28),
(2146, 'Jalandhar', 28),
(2147, 'Jugial', 28),
(2148, 'Kapurthala', 28),
(2149, 'Kharar', 28),
(2150, 'Kotkapura', 28),
(2151, 'Ludhiana', 28),
(2152, 'Malaut', 28),
(2153, 'Malerkotla', 28),
(2154, 'Mansa', 28),
(2155, 'Moga', 28),
(2156, 'Muktasar', 28),
(2157, 'Nabha', 28),
(2158, 'Nakodar', 28),
(2159, 'Nangal', 28),
(2160, 'Nawanshahar', 28),
(2161, 'Nawanshahr', 28),
(2162, 'Pathankot', 28),
(2163, 'Patiala', 28),
(2164, 'Patti', 28),
(2165, 'Phagwara', 28),
(2166, 'Phillaur', 28),
(2167, 'Phulmandi', 28),
(2168, 'Quadian', 28),
(2169, 'Rajpura', 28),
(2170, 'Raman', 28),
(2171, 'Rayya', 28),
(2172, 'Ropar', 28),
(2173, 'Rupnagar', 28),
(2174, 'Samana', 28),
(2175, 'Samrala', 28),
(2176, 'Sangrur', 28),
(2177, 'Sardulgarh', 28),
(2178, 'Sarhind', 28),
(2179, 'SAS Nagar', 28),
(2180, 'Sultanpur Lodhi', 28),
(2181, 'Sunam', 28),
(2182, 'Tanda Urmar', 28),
(2183, 'Taran Taran', 28),
(2184, 'Zira', 28),
(2185, 'Abu Road', 29),
(2186, 'Ahore', 29),
(2187, 'Ajmer', 29),
(2188, 'Aklera', 29),
(2189, 'Alwar', 29),
(2190, 'Amber', 29),
(2191, 'Amet', 29),
(2192, 'Anupgarh', 29),
(2193, 'Asind', 29),
(2194, 'Aspur', 29),
(2195, 'Atru', 29),
(2196, 'Bagidora', 29),
(2197, 'Bali', 29),
(2198, 'Bamanwas', 29),
(2199, 'Banera', 29),
(2200, 'Bansur', 29),
(2201, 'Banswara', 29),
(2202, 'Baran', 29),
(2203, 'Bari', 29),
(2204, 'Barisadri', 29),
(2205, 'Barmer', 29),
(2206, 'Baseri', 29),
(2207, 'Bassi', 29),
(2208, 'Baswa', 29),
(2209, 'Bayana', 29),
(2210, 'Beawar', 29),
(2211, 'Begun', 29),
(2212, 'Behror', 29),
(2213, 'Bhadra', 29),
(2214, 'Bharatpur', 29),
(2215, 'Bhilwara', 29),
(2216, 'Bhim', 29),
(2217, 'Bhinmal', 29),
(2218, 'Bikaner', 29),
(2219, 'Bilara', 29),
(2220, 'Bundi', 29),
(2221, 'Chhabra', 29),
(2222, 'Chhipaborad', 29),
(2223, 'Chirawa', 29),
(2224, 'Chittorgarh', 29),
(2225, 'Chohtan', 29),
(2226, 'Churu', 29),
(2227, 'Dantaramgarh', 29),
(2228, 'Dausa', 29),
(2229, 'Deedwana', 29),
(2230, 'Deeg', 29),
(2231, 'Degana', 29),
(2232, 'Deogarh', 29),
(2233, 'Deoli', 29),
(2234, 'Desuri', 29),
(2235, 'Dhariawad', 29),
(2236, 'Dholpur', 29),
(2237, 'Digod', 29),
(2238, 'Dudu', 29),
(2239, 'Dungarpur', 29),
(2240, 'Dungla', 29),
(2241, 'Fatehpur', 29),
(2242, 'Gangapur', 29),
(2243, 'Gangdhar', 29),
(2244, 'Gerhi', 29),
(2245, 'Ghatol', 29),
(2246, 'Girwa', 29),
(2247, 'Gogunda', 29),
(2248, 'Hanumangarh', 29),
(2249, 'Hindaun', 29),
(2250, 'Hindoli', 29),
(2251, 'Hurda', 29),
(2252, 'Jahazpur', 29),
(2253, 'Jaipur', 29),
(2254, 'Jaisalmer', 29),
(2255, 'Jalore', 29),
(2256, 'Jhalawar', 29),
(2257, 'Jhunjhunu', 29),
(2258, 'Jodhpur', 29),
(2259, 'Kaman', 29),
(2260, 'Kapasan', 29),
(2261, 'Karauli', 29),
(2262, 'Kekri', 29),
(2263, 'Keshoraipatan', 29),
(2264, 'Khandar', 29),
(2265, 'Kherwara', 29),
(2266, 'Khetri', 29),
(2267, 'Kishanganj', 29),
(2268, 'Kishangarh', 29),
(2269, 'Kishangarhbas', 29),
(2270, 'Kolayat', 29),
(2271, 'Kota', 29),
(2272, 'Kotputli', 29),
(2273, 'Kotra', 29),
(2274, 'Kotri', 29),
(2275, 'Kumbalgarh', 29),
(2276, 'Kushalgarh', 29),
(2277, 'Ladnun', 29),
(2278, 'Ladpura', 29),
(2279, 'Lalsot', 29),
(2280, 'Laxmangarh', 29),
(2281, 'Lunkaransar', 29),
(2282, 'Mahuwa', 29),
(2283, 'Malpura', 29),
(2284, 'Malvi', 29),
(2285, 'Mandal', 29),
(2286, 'Mandalgarh', 29),
(2287, 'Mandawar', 29),
(2288, 'Mangrol', 29),
(2289, 'Marwar-Jn', 29),
(2290, 'Merta', 29),
(2291, 'Nadbai', 29),
(2292, 'Nagaur', 29),
(2293, 'Nainwa', 29),
(2294, 'Nasirabad', 29),
(2295, 'Nathdwara', 29),
(2296, 'Nawa', 29),
(2297, 'Neem Ka Thana', 29),
(2298, 'Newai', 29),
(2299, 'Nimbahera', 29),
(2300, 'Nohar', 29),
(2301, 'Nokha', 29),
(2302, 'Onli', 29),
(2303, 'Osian', 29),
(2304, 'Pachpadara', 29),
(2305, 'Pachpahar', 29),
(2306, 'Padampur', 29),
(2307, 'Pali', 29),
(2308, 'Parbatsar', 29),
(2309, 'Phagi', 29),
(2310, 'Phalodi', 29),
(2311, 'Pilani', 29),
(2312, 'Pindwara', 29),
(2313, 'Pipalda', 29),
(2314, 'Pirawa', 29),
(2315, 'Pokaran', 29),
(2316, 'Pratapgarh', 29),
(2317, 'Raipur', 29),
(2318, 'Raisinghnagar', 29),
(2319, 'Rajgarh', 29),
(2320, 'Rajsamand', 29),
(2321, 'Ramganj Mandi', 29),
(2322, 'Ramgarh', 29),
(2323, 'Rashmi', 29),
(2324, 'Ratangarh', 29),
(2325, 'Reodar', 29),
(2326, 'Rupbas', 29),
(2327, 'Sadulshahar', 29),
(2328, 'Sagwara', 29),
(2329, 'Sahabad', 29),
(2330, 'Salumber', 29),
(2331, 'Sanchore', 29),
(2332, 'Sangaria', 29),
(2333, 'Sangod', 29),
(2334, 'Sapotra', 29),
(2335, 'Sarada', 29),
(2336, 'Sardarshahar', 29),
(2337, 'Sarwar', 29),
(2338, 'Sawai Madhopur', 29),
(2339, 'Shahapura', 29),
(2340, 'Sheo', 29),
(2341, 'Sheoganj', 29),
(2342, 'Shergarh', 29),
(2343, 'Sikar', 29),
(2344, 'Sirohi', 29),
(2345, 'Siwana', 29),
(2346, 'Sojat', 29),
(2347, 'Sri Dungargarh', 29),
(2348, 'Sri Ganganagar', 29),
(2349, 'Sri Karanpur', 29),
(2350, 'Sri Madhopur', 29),
(2351, 'Sujangarh', 29),
(2352, 'Taranagar', 29),
(2353, 'Thanaghazi', 29),
(2354, 'Tibbi', 29),
(2355, 'Tijara', 29),
(2356, 'Todaraisingh', 29),
(2357, 'Tonk', 29),
(2358, 'Udaipur', 29),
(2359, 'Udaipurwati', 29),
(2360, 'Uniayara', 29),
(2361, 'Vallabhnagar', 29),
(2362, 'Viratnagar', 29),
(2363, 'Barmiak', 30),
(2364, 'Be', 30),
(2365, 'Bhurtuk', 30);
INSERT INTO `city` (`ct_id`, `ct_name`, `st_id`) VALUES
(2366, 'Chhubakha', 30),
(2367, 'Chidam', 30),
(2368, 'Chubha', 30),
(2369, 'Chumikteng', 30),
(2370, 'Dentam', 30),
(2371, 'Dikchu', 30),
(2372, 'Dzongri', 30),
(2373, 'Gangtok', 30),
(2374, 'Gauzing', 30),
(2375, 'Gyalshing', 30),
(2376, 'Hema', 30),
(2377, 'Kerung', 30),
(2378, 'Lachen', 30),
(2379, 'Lachung', 30),
(2380, 'Lema', 30),
(2381, 'Lingtam', 30),
(2382, 'Lungthu', 30),
(2383, 'Mangan', 30),
(2384, 'Namchi', 30),
(2385, 'Namthang', 30),
(2386, 'Nanga', 30),
(2387, 'Nantang', 30),
(2388, 'Naya Bazar', 30),
(2389, 'Padamachen', 30),
(2390, 'Pakhyong', 30),
(2391, 'Pemayangtse', 30),
(2392, 'Phensang', 30),
(2393, 'Rangli', 30),
(2394, 'Rinchingpong', 30),
(2395, 'Sakyong', 30),
(2396, 'Samdong', 30),
(2397, 'Singtam', 30),
(2398, 'Siniolchu', 30),
(2399, 'Sombari', 30),
(2400, 'Soreng', 30),
(2401, 'Sosing', 30),
(2402, 'Tekhug', 30),
(2403, 'Temi', 30),
(2404, 'Tsetang', 30),
(2405, 'Tsomgo', 30),
(2406, 'Tumlong', 30),
(2407, 'Yangang', 30),
(2408, 'Yumtang', 30),
(2409, 'Ambasamudram', 31),
(2410, 'Anamali', 31),
(2411, 'Arakandanallur', 31),
(2412, 'Arantangi', 31),
(2413, 'Aravakurichi', 31),
(2414, 'Ariyalur', 31),
(2415, 'Arkonam', 31),
(2416, 'Arni', 31),
(2417, 'Aruppukottai', 31),
(2418, 'Attur', 31),
(2419, 'Avanashi', 31),
(2420, 'Batlagundu', 31),
(2421, 'Bhavani', 31),
(2422, 'Chengalpattu', 31),
(2423, 'Chengam', 31),
(2424, 'Chennai', 31),
(2425, 'Chidambaram', 31),
(2426, 'Chingleput', 31),
(2427, 'Coimbatore', 31),
(2428, 'Courtallam', 31),
(2429, 'Cuddalore', 31),
(2430, 'Cumbum', 31),
(2431, 'Denkanikoitah', 31),
(2432, 'Devakottai', 31),
(2433, 'Dharampuram', 31),
(2434, 'Dharmapuri', 31),
(2435, 'Dindigul', 31),
(2436, 'Erode', 31),
(2437, 'Gingee', 31),
(2438, 'Gobichettipalayam', 31),
(2439, 'Gudalur', 31),
(2440, 'Gudiyatham', 31),
(2441, 'Harur', 31),
(2442, 'Hosur', 31),
(2443, 'Jayamkondan', 31),
(2444, 'Kallkurichi', 31),
(2445, 'Kanchipuram', 31),
(2446, 'Kangayam', 31),
(2447, 'Kanyakumari', 31),
(2448, 'Karaikal', 31),
(2449, 'Karaikudi', 31),
(2450, 'Karur', 31),
(2451, 'Keeranur', 31),
(2452, 'Kodaikanal', 31),
(2453, 'Kodumudi', 31),
(2454, 'Kotagiri', 31),
(2455, 'Kovilpatti', 31),
(2456, 'Krishnagiri', 31),
(2457, 'Kulithalai', 31),
(2458, 'Kumbakonam', 31),
(2459, 'Kuzhithurai', 31),
(2460, 'Madurai', 31),
(2461, 'Madurantgam', 31),
(2462, 'Manamadurai', 31),
(2463, 'Manaparai', 31),
(2464, 'Mannargudi', 31),
(2465, 'Mayiladuthurai', 31),
(2466, 'Mayiladutjurai', 31),
(2467, 'Mettupalayam', 31),
(2468, 'Metturdam', 31),
(2469, 'Mudukulathur', 31),
(2470, 'Mulanur', 31),
(2471, 'Musiri', 31),
(2472, 'Nagapattinam', 31),
(2473, 'Nagarcoil', 31),
(2474, 'Namakkal', 31),
(2475, 'Nanguneri', 31),
(2476, 'Natham', 31),
(2477, 'Neyveli', 31),
(2478, 'Nilgiris', 31),
(2479, 'Oddanchatram', 31),
(2480, 'Omalpur', 31),
(2481, 'Ootacamund', 31),
(2482, 'Ooty', 31),
(2483, 'Orathanad', 31),
(2484, 'Palacode', 31),
(2485, 'Palani', 31),
(2486, 'Palladum', 31),
(2487, 'Papanasam', 31),
(2488, 'Paramakudi', 31),
(2489, 'Pattukottai', 31),
(2490, 'Perambalur', 31),
(2491, 'Perundurai', 31),
(2492, 'Pollachi', 31),
(2493, 'Polur', 31),
(2494, 'Pondicherry', 31),
(2495, 'Ponnamaravathi', 31),
(2496, 'Ponneri', 31),
(2497, 'Pudukkottai', 31),
(2498, 'Rajapalayam', 31),
(2499, 'Ramanathapuram', 31),
(2500, 'Rameshwaram', 31),
(2501, 'Ranipet', 31),
(2502, 'Rasipuram', 31),
(2503, 'Salem', 31),
(2504, 'Sankagiri', 31),
(2505, 'Sankaran', 31),
(2506, 'Sathiyamangalam', 31),
(2507, 'Sivaganga', 31),
(2508, 'Sivakasi', 31),
(2509, 'Sriperumpudur', 31),
(2510, 'Srivaikundam', 31),
(2511, 'Tenkasi', 31),
(2512, 'Thanjavur', 31),
(2513, 'Theni', 31),
(2514, 'Thirumanglam', 31),
(2515, 'Thiruraipoondi', 31),
(2516, 'Thoothukudi', 31),
(2517, 'Thuraiyure', 31),
(2518, 'Tindivanam', 31),
(2519, 'Tiruchendur', 31),
(2520, 'Tiruchengode', 31),
(2521, 'Tiruchirappalli', 31),
(2522, 'Tirunelvelli', 31),
(2523, 'Tirupathur', 31),
(2524, 'Tirupur', 31),
(2525, 'Tiruttani', 31),
(2526, 'Tiruvallur', 31),
(2527, 'Tiruvannamalai', 31),
(2528, 'Tiruvarur', 31),
(2529, 'Tiruvellore', 31),
(2530, 'Tiruvettipuram', 31),
(2531, 'Trichy', 31),
(2532, 'Tuticorin', 31),
(2533, 'Udumalpet', 31),
(2534, 'Ulundurpet', 31),
(2535, 'Usiliampatti', 31),
(2536, 'Uthangarai', 31),
(2537, 'Valapady', 31),
(2538, 'Valliyoor', 31),
(2539, 'Vaniyambadi', 31),
(2540, 'Vedasandur', 31),
(2541, 'Vellore', 31),
(2542, 'Velur', 31),
(2543, 'Vilathikulam', 31),
(2544, 'Villupuram', 31),
(2545, 'Virudhachalam', 31),
(2546, 'Virudhunagar', 31),
(2547, 'Wandiwash', 31),
(2548, 'Yercaud', 31),
(2549, 'Agartala', 32),
(2550, 'Ambasa', 32),
(2551, 'Bampurbari', 32),
(2552, 'Belonia', 32),
(2553, 'Dhalai', 32),
(2554, 'Dharam Nagar', 32),
(2555, 'Kailashahar', 32),
(2556, 'Kamal Krishnabari', 32),
(2557, 'Khopaiyapara', 32),
(2558, 'Khowai', 32),
(2559, 'Phuldungsei', 32),
(2560, 'Radha Kishore Pur', 32),
(2561, 'Tripura', 32),
(2562, 'Achhnera', 33),
(2563, 'Agra', 33),
(2564, 'Akbarpur', 33),
(2565, 'Aliganj', 33),
(2566, 'Aligarh', 33),
(2567, 'Allahabad', 33),
(2568, 'Ambedkar Nagar', 33),
(2569, 'Amethi', 33),
(2570, 'Amiliya', 33),
(2571, 'Amroha', 33),
(2572, 'Anola', 33),
(2573, 'Atrauli', 33),
(2574, 'Auraiya', 33),
(2575, 'Azamgarh', 33),
(2576, 'Baberu', 33),
(2577, 'Badaun', 33),
(2578, 'Baghpat', 33),
(2579, 'Bagpat', 33),
(2580, 'Baheri', 33),
(2581, 'Bahraich', 33),
(2582, 'Ballia', 33),
(2583, 'Balrampur', 33),
(2584, 'Banda', 33),
(2585, 'Bansdeeh', 33),
(2586, 'Bansgaon', 33),
(2587, 'Bansi', 33),
(2588, 'Barabanki', 33),
(2589, 'Bareilly', 33),
(2590, 'Basti', 33),
(2591, 'Bhadohi', 33),
(2592, 'Bharthana', 33),
(2593, 'Bharwari', 33),
(2594, 'Bhogaon', 33),
(2595, 'Bhognipur', 33),
(2596, 'Bidhuna', 33),
(2597, 'Bijnore', 33),
(2598, 'Bikapur', 33),
(2599, 'Bilari', 33),
(2600, 'Bilgram', 33),
(2601, 'Bilhaur', 33),
(2602, 'Bindki', 33),
(2603, 'Bisalpur', 33),
(2604, 'Bisauli', 33),
(2605, 'Biswan', 33),
(2606, 'Budaun', 33),
(2607, 'Budhana', 33),
(2608, 'Bulandshahar', 33),
(2609, 'Bulandshahr', 33),
(2610, 'Capianganj', 33),
(2611, 'Chakia', 33),
(2612, 'Chandauli', 33),
(2613, 'Charkhari', 33),
(2614, 'Chhata', 33),
(2615, 'Chhibramau', 33),
(2616, 'Chirgaon', 33),
(2617, 'Chitrakoot', 33),
(2618, 'Chunur', 33),
(2619, 'Dadri', 33),
(2620, 'Dalmau', 33),
(2621, 'Dataganj', 33),
(2622, 'Debai', 33),
(2623, 'Deoband', 33),
(2624, 'Deoria', 33),
(2625, 'Derapur', 33),
(2626, 'Dhampur', 33),
(2627, 'Domariyaganj', 33),
(2628, 'Dudhi', 33),
(2629, 'Etah', 33),
(2630, 'Etawah', 33),
(2631, 'Faizabad', 33),
(2632, 'Farrukhabad', 33),
(2633, 'Fatehpur', 33),
(2634, 'Firozabad', 33),
(2635, 'Garauth', 33),
(2636, 'Garhmukteshwar', 33),
(2637, 'Gautam Buddha Nagar', 33),
(2638, 'Ghatampur', 33),
(2639, 'Ghaziabad', 33),
(2640, 'Ghazipur', 33),
(2641, 'Ghosi', 33),
(2642, 'Gonda', 33),
(2643, 'Gorakhpur', 33),
(2644, 'Gunnaur', 33),
(2645, 'Haidergarh', 33),
(2646, 'Hamirpur', 33),
(2647, 'Hapur', 33),
(2648, 'Hardoi', 33),
(2649, 'Harraiya', 33),
(2650, 'Hasanganj', 33),
(2651, 'Hasanpur', 33),
(2652, 'Hathras', 33),
(2653, 'Jalalabad', 33),
(2654, 'Jalaun', 33),
(2655, 'Jalesar', 33),
(2656, 'Jansath', 33),
(2657, 'Jarar', 33),
(2658, 'Jasrana', 33),
(2659, 'Jaunpur', 33),
(2660, 'Jhansi', 33),
(2661, 'Jyotiba Phule Nagar', 33),
(2662, 'Kadipur', 33),
(2663, 'Kaimganj', 33),
(2664, 'Kairana', 33),
(2665, 'Kaisarganj', 33),
(2666, 'Kalpi', 33),
(2667, 'Kannauj', 33),
(2668, 'Kanpur', 33),
(2669, 'Karchhana', 33),
(2670, 'Karhal', 33),
(2671, 'Karvi', 33),
(2672, 'Kasganj', 33),
(2673, 'Kaushambi', 33),
(2674, 'Kerakat', 33),
(2675, 'Khaga', 33),
(2676, 'Khair', 33),
(2677, 'Khalilabad', 33),
(2678, 'Kheri', 33),
(2679, 'Konch', 33),
(2680, 'Kumaon', 33),
(2681, 'Kunda', 33),
(2682, 'Kushinagar', 33),
(2683, 'Lalganj', 33),
(2684, 'Lalitpur', 33),
(2685, 'Lucknow', 33),
(2686, 'Machlishahar', 33),
(2687, 'Maharajganj', 33),
(2688, 'Mahoba', 33),
(2689, 'Mainpuri', 33),
(2690, 'Malihabad', 33),
(2691, 'Mariyahu', 33),
(2692, 'Math', 33),
(2693, 'Mathura', 33),
(2694, 'Mau', 33),
(2695, 'Maudaha', 33),
(2696, 'Maunathbhanjan', 33),
(2697, 'Mauranipur', 33),
(2698, 'Mawana', 33),
(2699, 'Meerut', 33),
(2700, 'Mehraun', 33),
(2701, 'Meja', 33),
(2702, 'Mirzapur', 33),
(2703, 'Misrikh', 33),
(2704, 'Modinagar', 33),
(2705, 'Mohamdabad', 33),
(2706, 'Mohamdi', 33),
(2707, 'Moradabad', 33),
(2708, 'Musafirkhana', 33),
(2709, 'Muzaffarnagar', 33),
(2710, 'Nagina', 33),
(2711, 'Najibabad', 33),
(2712, 'Nakur', 33),
(2713, 'Nanpara', 33),
(2714, 'Naraini', 33),
(2715, 'Naugarh', 33),
(2716, 'Nawabganj', 33),
(2717, 'Nighasan', 33),
(2718, 'Noida', 33),
(2719, 'Orai', 33),
(2720, 'Padrauna', 33),
(2721, 'Pahasu', 33),
(2722, 'Patti', 33),
(2723, 'Pharenda', 33),
(2724, 'Phoolpur', 33),
(2725, 'Phulpur', 33),
(2726, 'Pilibhit', 33),
(2727, 'Pitamberpur', 33),
(2728, 'Powayan', 33),
(2729, 'Pratapgarh', 33),
(2730, 'Puranpur', 33),
(2731, 'Purwa', 33),
(2732, 'Raibareli', 33),
(2733, 'Rampur', 33),
(2734, 'Ramsanehi Ghat', 33),
(2735, 'Rasara', 33),
(2736, 'Rath', 33),
(2737, 'Robertsganj', 33),
(2738, 'Sadabad', 33),
(2739, 'Safipur', 33),
(2740, 'Sagri', 33),
(2741, 'Saharanpur', 33),
(2742, 'Sahaswan', 33),
(2743, 'Sahjahanpur', 33),
(2744, 'Saidpur', 33),
(2745, 'Salempur', 33),
(2746, 'Salon', 33),
(2747, 'Sambhal', 33),
(2748, 'Sandila', 33),
(2749, 'Sant Kabir Nagar', 33),
(2750, 'Sant Ravidas Nagar', 33),
(2751, 'Sardhana', 33),
(2752, 'Shahabad', 33),
(2753, 'Shahganj', 33),
(2754, 'Shahjahanpur', 33),
(2755, 'Shikohabad', 33),
(2756, 'Shravasti', 33),
(2757, 'Siddharthnagar', 33),
(2758, 'Sidhauli', 33),
(2759, 'Sikandra Rao', 33),
(2760, 'Sikandrabad', 33),
(2761, 'Sitapur', 33),
(2762, 'Siyana', 33),
(2763, 'Sonbhadra', 33),
(2764, 'Soraon', 33),
(2765, 'Sultanpur', 33),
(2766, 'Tanda', 33),
(2767, 'Tarabganj', 33),
(2768, 'Tilhar', 33),
(2769, 'Unnao', 33),
(2770, 'Utraula', 33),
(2771, 'Varanasi', 33),
(2772, 'Zamania', 33),
(2773, 'Almora', 34),
(2774, 'Bageshwar', 34),
(2775, 'Bhatwari', 34),
(2776, 'Chakrata', 34),
(2777, 'Chamoli', 34),
(2778, 'Champawat', 34),
(2779, 'Dehradun', 34),
(2780, 'Deoprayag', 34),
(2781, 'Dharchula', 34),
(2782, 'Dunda', 34),
(2783, 'Haldwani', 34),
(2784, 'Haridwar', 34),
(2785, 'Joshimath', 34),
(2786, 'Karan Prayag', 34),
(2787, 'Kashipur', 34),
(2788, 'Khatima', 34),
(2789, 'Kichha', 34),
(2790, 'Lansdown', 34),
(2791, 'Munsiari', 34),
(2792, 'Mussoorie', 34),
(2793, 'Nainital', 34),
(2794, 'Pantnagar', 34),
(2795, 'Partapnagar', 34),
(2796, 'Pauri Garhwal', 34),
(2797, 'Pithoragarh', 34),
(2798, 'Purola', 34),
(2799, 'Rajgarh', 34),
(2800, 'Ranikhet', 34),
(2801, 'Roorkee', 34),
(2802, 'Rudraprayag', 34),
(2803, 'Tehri Garhwal', 34),
(2804, 'Udham Singh Nagar', 34),
(2805, 'Ukhimath', 34),
(2806, 'Uttarkashi', 34),
(2807, 'Adra', 35),
(2808, 'Alipurduar', 35),
(2809, 'Amlagora', 35),
(2810, 'Arambagh', 35),
(2811, 'Asansol', 35),
(2812, 'Balurghat', 35),
(2813, 'Bankura', 35),
(2814, 'Bardhaman', 35),
(2815, 'Basirhat', 35),
(2816, 'Berhampur', 35),
(2817, 'Bethuadahari', 35),
(2818, 'Birbhum', 35),
(2819, 'Birpara', 35),
(2820, 'Bishanpur', 35),
(2821, 'Bolpur', 35),
(2822, 'Bongoan', 35),
(2823, 'Bulbulchandi', 35),
(2824, 'Burdwan', 35),
(2825, 'Calcutta', 35),
(2826, 'Canning', 35),
(2827, 'Champadanga', 35),
(2828, 'Contai', 35),
(2829, 'Cooch Behar', 35),
(2830, 'Daimond Harbour', 35),
(2831, 'Dalkhola', 35),
(2832, 'Dantan', 35),
(2833, 'Darjeeling', 35),
(2834, 'Dhaniakhali', 35),
(2835, 'Dhuliyan', 35),
(2836, 'Dinajpur', 35),
(2837, 'Dinhata', 35),
(2838, 'Durgapur', 35),
(2839, 'Gangajalghati', 35),
(2840, 'Gangarampur', 35),
(2841, 'Ghatal', 35),
(2842, 'Guskara', 35),
(2843, 'Habra', 35),
(2844, 'Haldia', 35),
(2845, 'Harirampur', 35),
(2846, 'Harishchandrapur', 35),
(2847, 'Hooghly', 35),
(2848, 'Howrah', 35),
(2849, 'Islampur', 35),
(2850, 'Jagatballavpur', 35),
(2851, 'Jalpaiguri', 35),
(2852, 'Jhalda', 35),
(2853, 'Jhargram', 35),
(2854, 'Kakdwip', 35),
(2855, 'Kalchini', 35),
(2856, 'Kalimpong', 35),
(2857, 'Kalna', 35),
(2858, 'Kandi', 35),
(2859, 'Karimpur', 35),
(2860, 'Katwa', 35),
(2861, 'Kharagpur', 35),
(2862, 'Khatra', 35),
(2863, 'Krishnanagar', 35),
(2864, 'Mal Bazar', 35),
(2865, 'Malda', 35),
(2866, 'Manbazar', 35),
(2867, 'Mathabhanga', 35),
(2868, 'Medinipur', 35),
(2869, 'Mekhliganj', 35),
(2870, 'Mirzapur', 35),
(2871, 'Murshidabad', 35),
(2872, 'Nadia', 35),
(2873, 'Nagarakata', 35),
(2874, 'Nalhati', 35),
(2875, 'Nayagarh', 35),
(2876, 'Parganas', 35),
(2877, 'Purulia', 35),
(2878, 'Raiganj', 35),
(2879, 'Rampur Hat', 35),
(2880, 'Ranaghat', 35),
(2881, 'Seharabazar', 35),
(2882, 'Siliguri', 35),
(2883, 'Suri', 35),
(2884, 'Takipur', 35),
(2885, 'Tamluk', 35);

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cpid` int(11) NOT NULL,
  `cpname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `pack_amt` decimal(10,0) NOT NULL,
  `commission_per` varchar(20) NOT NULL,
  `total_comp_amt` decimal(53,2) NOT NULL,
  `comm_amount` decimal(53,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `common`
--

CREATE TABLE `common` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `series_id` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_identification` varchar(50) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `invoice_state` varchar(255) NOT NULL,
  `in_state_code` varchar(255) NOT NULL,
  `ship_cont_person` varchar(255) NOT NULL,
  `ship_email` varchar(255) NOT NULL,
  `ship_state` varchar(255) NOT NULL,
  `ship_state_code` varchar(255) NOT NULL,
  `invoicing_address` longtext,
  `shipping_address` longtext,
  `contact_person` varchar(100) DEFAULT NULL,
  `cust_gst_no` varchar(255) DEFAULT NULL,
  `terms` longtext,
  `bank_details` varchar(255) NOT NULL,
  `notes` text,
  `base_amount` decimal(53,2) NOT NULL,
  `discount_amount` decimal(53,2) NOT NULL,
  `net_amount` decimal(53,2) NOT NULL,
  `gross_amount` decimal(53,2) NOT NULL,
  `amt_words` text NOT NULL,
  `paid_amount` decimal(53,2) NOT NULL,
  `due_amt` decimal(53,2) NOT NULL,
  `tax_amount` decimal(53,2) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT '1',
  `closed` tinyint(1) DEFAULT '0',
  `sent_by_email` tinyint(1) DEFAULT '0',
  `number` varchar(255) DEFAULT NULL,
  `recurring_invoice_id` bigint(20) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `days_to_due` mediumint(9) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '0',
  `max_occurrences` int(11) DEFAULT NULL,
  `must_occurrences` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `period_type` varchar(8) DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `finishing_date` date DEFAULT NULL,
  `last_execution_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `del_status` int(11) NOT NULL COMMENT '1-active 0-delete',
  `po_no` varchar(255) NOT NULL,
  `po_date` date NOT NULL,
  `po_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `common`
--

INSERT INTO `common` (`id`, `user_id`, `sub_user_id`, `series_id`, `customer_id`, `customer_name`, `customer_identification`, `customer_email`, `invoice_state`, `in_state_code`, `ship_cont_person`, `ship_email`, `ship_state`, `ship_state_code`, `invoicing_address`, `shipping_address`, `contact_person`, `cust_gst_no`, `terms`, `bank_details`, `notes`, `base_amount`, `discount_amount`, `net_amount`, `gross_amount`, `amt_words`, `paid_amount`, `due_amt`, `tax_amount`, `status`, `type`, `draft`, `closed`, `sent_by_email`, `number`, `recurring_invoice_id`, `issue_date`, `due_date`, `days_to_due`, `enabled`, `max_occurrences`, `must_occurrences`, `period`, `period_type`, `starting_date`, `finishing_date`, `last_execution_date`, `created_at`, `updated_at`, `del_status`, `po_no`, `po_date`, `po_project_name`) VALUES
(1, 1, 0, '2', 8, 'Kumar Builders', 'GAJKAGGA0990L', 'gurudtta@testing.neotech', 'Maharashtra ', '27', 'Gurudatta', 'gurudtta@testing.neotech', 'Maharashtra ', '27', 'Kumar Builders, Kharghar', 'kumar builders kharghar', 'Gurudatta', '', '1. Please pay your invoice within seven daysÂ \r\n2. Cheque and DDâ€™s to be drawn on â€˜Neotech Constructions Pvt. Ltd.â€™Â \r\n3. Subject to Navi Mumbai Jurisdiction\r\n\r\nThank you for your business', 'E Business Canvas\r\nBranch Name : Anand Nagar,Sinhgad Road\r\nA/C No.:0641102000016737\r\nBank.: IDBI Bank\r\nIFSC code:IBKL0000641', '', '48000.00', '0.00', '48000.00', '48000.00', 'Forty-Eight Thousand', '0.00', '48000.00', '0.00', 'Pending', 'Invoice', 1, 0, 0, 'CL-10', NULL, '2019-01-23', '2019-01-23', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-23 10:38:22', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(2, 1, 0, '1', 11, '7', 'AABCB0976E', 'testing@neotech123.in', 'Maharashtra ', '27', 'Amit', 'testing@neotech123.in', 'Maharashtra ', '27', 'thane, mumbai', 'thane, mumbai', 'Amit', '27AABCB0976E1ZV', '1. Please pay your invoice within seven daysÂ \r\n2. Cheque and DDâ€™s to be drawn on â€˜Neotech Constructions Pvt. Ltd.â€™Â \r\n3. Subject to Navi Mumbai Jurisdiction\r\n\r\nThank you for your business', 'E Business Canvas\r\nBranch Name : Anand Nagar,Sinhgad Road\r\nA/C No.:0641102000016737\r\nBank.: IDBI Bank\r\nIFSC code:IBKL0000641', '', '75000.00', '0.00', '0.00', '84000.00', 'Eighty-Four Thousand', '0.00', '84000.00', '9000.00', 'Pending', 'Material-Invoice', 1, 0, 0, 'PR-9', NULL, '2019-01-01', '2019-01-23', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-23 10:39:17', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(3, 1, 0, '5', 12, '30', 'AABCD3102E', 'abhay@dcstechno.com', 'Maharashtra ', '27', '', 'abhay@dcstechno.com', 'Maharashtra ', '27', 'CBD BELAPUR', 'CBD BELAPUR', 'ABHAY', '27AABCD3102E1ZD', '\r\n', '', '', '1390000.00', '0.00', '0.00', '1640200.00', 'One Million, Six Hundred and Forty Thousand, Two Hundred', '0.00', '1640200.00', '250200.00', 'Pending', 'Material-Invoice', 1, 0, 0, '11', NULL, '2018-07-17', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-19 10:20:23', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(4, 1, 0, '5', 13, '31', 'AADCT5240R', 'account@tachion-india.com', 'Maharashtra ', '27', '', 'account@tachion-india.com', 'Maharashtra ', '27', 'PLOT NO.8, SECTOR1, AIROLI NAKA, AIROLI, NAVI MUMBAI-400708', 'PLOT NO.8, SECTOR1, AIROLI NAKA, AIROLI, NAVI MUMBAI-400708', 'AMARNATH', '27AADCT5240R1ZT', '\r\n', '', '', '85447.00', '0.00', '0.00', '100827.46', 'One Hundred Thousand, Eight Hundred and Twenty-Seven', '0.00', '100827.46', '15380.46', 'Pending', 'Material-Invoice', 1, 0, 0, '12', NULL, '2018-08-13', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-19 10:51:31', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(5, 1, 0, '5', 14, '32', 'AAACT4498A', 'turbheironandsteel@gmail.com', 'Maharashtra ', '27', 'TURBHE', 'turbheironandsteel@gmail.com', 'Maharashtra ', '27', 'PLOT NO.102(A), TURBHE SERVICE INDUSTRIAL AREA, NEAR JANTA MARKET SEC23, TURBHE, NAVI MUMBAI -400705', 'PLOT NO.102(A), TURBHE SERVICE INDUSTRIAL AREA, NEAR JANTA MARKET SEC23, TURBHE, NAVI MUMBAI -400705', 'TURBHE', '27AAACT4498A1ZD', '\r\n', '', '', '27732.00', '0.00', '0.00', '32712.43', 'Thirty-Two Thousand, Seven Hundred and Twelve', '0.00', '32712.43', '4990.03', 'Pending', 'Material-Invoice', 1, 0, 0, '13', NULL, '2018-08-10', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-19 11:52:08', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(6, 1, 0, '5', 15, '33', 'AFBPC2870G', 'shaileshchopra2028@yahoo.com', 'Maharashtra ', '27', 'shailesh', 'shaileshchopra2028@yahoo.com', 'Maharashtra ', '27', 'SANTACRUZ', 'SANTACRUZ', 'shailesh', '27AFBPC2870G1ZS', '\r\n', '', '', '15600.00', '0.00', '0.00', '18408.00', 'Eighteen Thousand, Four Hundred and Eight', '0.00', '18408.00', '2808.00', 'Pending', 'Material-Invoice', 1, 0, 0, '14', NULL, '2018-06-08', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-19 12:03:17', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(7, 1, 0, '5', 16, '34', 'AKVPK4074H', 'harshawardhan.kenny@gmail.com', 'Maharashtra ', '27', 'HARSH KENNY', 'harshawardhan.kenny@gmail.com', 'Maharashtra ', '27', 'ULWE', 'ULWE', 'HARSH KENNY', '27AKVPK4074H1ZN', '\r\n', '', '', '3320.00', '0.00', '0.00', '3917.60', 'Three Thousand, Nine Hundred and Seventeen', '0.00', '3917.60', '597.60', 'Pending', 'Material-Invoice', 1, 0, 0, '15', NULL, '2018-09-07', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-08 09:51:33', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(8, 1, 0, '5', 15, '33', 'AFBPC2870G', 'shaileshchopra2028@yahoo.com', 'Maharashtra ', '27', 'SHAILESH', 'shaileshchopra2028@yahoo.com', 'Maharashtra ', '27', 'SANTACRUZ', 'SANTACRUZ', 'SHAILESH', '27AFBPC2870G1ZS', '\r\n', '', '', '21555.00', '0.00', '0.00', '25434.90', 'Twenty-Five Thousand, Four Hundred and Thirty-Four', '0.00', '25434.90', '3879.90', 'Pending', 'Material-Invoice', 1, 0, 0, '16', NULL, '2018-08-09', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-08 11:15:22', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(9, 1, 0, '5', 17, '35', 'ANMPS6054M', 'supremehardware17@gmail.com', 'Maharashtra ', '27', 'supreme', 'supremehardware17@gmail.com', 'Maharashtra ', '27', 'TURBHE', 'TURBHE', 'supreme', '27ANMPS6054M1Z7', '\r\n', '', '', '1344.00', '0.00', '0.00', '1520.78', 'One Thousand, Five Hundred and Twenty', '0.00', '1520.78', '231.98', 'Pending', 'Material-Invoice', 1, 0, 0, '17', NULL, '2018-08-10', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-11 07:54:15', '0000-00-00 00:00:00', 0, '', '0000-00-00', ''),
(10, 1, 0, '5', 16, '34', 'AKVPK4074H', 'harshawardhan.kenny@gmail.com', 'Maharashtra ', '27', 'harsh', 'harshawardhan.kenny@gmail.com', 'Maharashtra ', '27', 'ULWE', 'ULWE', 'harsh', '27AKVPK4074H1ZN', '\r\n', '', '', '3320.00', '0.00', '0.00', '3917.60', 'Three Thousand, Nine Hundred and Seventeen', '0.00', '3917.60', '597.60', 'Pending', 'Material-Invoice', 1, 0, 0, '18', NULL, '2018-09-07', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-11 07:59:55', '0000-00-00 00:00:00', 0, '033', '0000-00-00', ''),
(11, 1, 0, '5', 18, '9', 'CDRPM2201D', 'apollotile2009@gmail.com', 'Maharashtra ', '27', 'ROHIN', 'apollotile2009@gmail.com', 'Maharashtra ', '27', 'Mumbra Panvel Road', 'Mumbra Panvel Road', 'ROHIN', '27CDRPM2201D1ZD', '\r\n', '', '', '63432.88', '0.00', '0.00', '74850.80', 'Seventy-Four Thousand, Eight Hundred and Fifty', '0.00', '74850.80', '11417.92', 'Pending', 'Material-Invoice', 1, 0, 0, '19', NULL, '2018-08-10', '1970-01-01', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-25 09:57:54', '0000-00-00 00:00:00', 0, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_phone` varchar(255) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `state_code` int(11) NOT NULL,
  `company_url` varchar(100) NOT NULL,
  `company_address` varchar(500) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `terms` text NOT NULL,
  `bank_details` text NOT NULL,
  `cutomers` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `estimates` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `product` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `voucher` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `get_purchase` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `print_temp` varchar(50) NOT NULL DEFAULT 'temp2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `user_id`, `company_name`, `company_email`, `company_phone`, `gst_no`, `pan_no`, `state`, `state_code`, `company_url`, `company_address`, `logo`, `terms`, `bank_details`, `cutomers`, `estimates`, `product`, `voucher`, `get_purchase`, `print_temp`) VALUES
(1, 1, 'NEOTECH Construction Pvt. Ltd', 'enginners.neotech@gmail.com', '+91-8424040194', '27AAKFN4226B1ZJ', 'AAKFN4226B', 'Maharashtra', 27, '', 'Shop No.42, 1st Floor, Sector 07, Kharghar, Navi Mumbai', 'img/neotech.png', '\r\n\r\n', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'temp2'),
(2, 2, 'EBC Services', 'admin@e-bc.in', '8482050141', '', '', 'Maharashtra', 27, 'www.e-bc.in', 'Sighgad road, Pune', 'img/finallogo.png', 'Company 2nd', 'BOI\r\nAccount No:089745660022\r\nIFSC: BOI00002018', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(3, 3, 'RR Parkon', 'ashutosh@e-bc.in', '7845129623', '27LOIJ3223JDH3', '', 'Maharashtra', 27, 'www.e-bc.in', 'Flat No: 408, Near NDA gate, Kondhawa Dhawade-411023', 'img/it-freedom-logo.png', 'Company 3rd', 'ICICI\r\nAccount No:0254681545210\r\nIFSC:ICICI0002018', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(4, 4, 'E-zest', 'rahul@gmail.com', '7896541230', '', '', '', 0, '', '', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(5, 5, 'aaaaa', 'ashutosh@e-bc.in', '98532352263', '', '', '', 0, '', '', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_details`
--

CREATE TABLE `contractor_details` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `con_name` varchar(255) NOT NULL,
  `type_work` varchar(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `bill_date` date NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `unit` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `amount` decimal(52,2) NOT NULL,
  `tax_value` decimal(53,2) NOT NULL,
  `tax_amt` decimal(52,2) NOT NULL,
  `sgst` decimal(52,2) NOT NULL,
  `cgst` decimal(52,2) NOT NULL,
  `total_amt` decimal(52,2) NOT NULL,
  `paid_amt` decimal(52,2) NOT NULL,
  `balance_amt` decimal(52,2) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor_details`
--

INSERT INTO `contractor_details` (`id`, `user_id`, `sub_user_id`, `con_name`, `type_work`, `bill_no`, `bill_date`, `rate`, `unit`, `qty`, `amount`, `tax_value`, `tax_amt`, `sgst`, `cgst`, `total_amt`, `paid_amt`, `balance_amt`, `record_date`, `update_date`) VALUES
(1, 1, 0, '1', '1', 'adsad', '2018-08-12', '100.00', 2, 10, '1000.00', '12.00', '120.00', '60.00', '60.00', '1120.00', '1000.00', '120.00', '2018-08-12', '2018-08-12'),
(2, 1, 0, '2', '2', 'Bill1520', '2018-08-12', '550.00', 6, 15, '8250.00', '18.00', '1485.00', '742.50', '742.50', '9735.00', '975.00', '8760.00', '2018-08-12', '2018-08-12'),
(3, 1, 0, '3', '4', '155', '2018-08-17', '150.00', 7, 15, '2250.00', '18.00', '405.00', '202.50', '202.50', '2655.00', '0.00', '2655.00', '2018-08-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `price` decimal(53,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `name_slug` varchar(100) DEFAULT NULL,
  `identification` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `invoice_state` varchar(255) NOT NULL,
  `in_state_code` varchar(255) NOT NULL,
  `ship_cont_person` varchar(255) NOT NULL,
  `ship_email` varchar(255) NOT NULL,
  `ship_state` varchar(255) NOT NULL,
  `ship_state_code` varchar(255) NOT NULL,
  `invoicing_address` longtext,
  `shipping_address` longtext,
  `gst_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `sub_user_id`, `name`, `name_slug`, `identification`, `email`, `contact_person`, `invoice_state`, `in_state_code`, `ship_cont_person`, `ship_email`, `ship_state`, `ship_state_code`, `invoicing_address`, `shipping_address`, `gst_no`) VALUES
(1, 1, 0, 'RR Parkon', 'RRParkon', 'BLID231DF', 'ashutosh@e-bc.in', 'Ashutosh Shirole', 'Maharashtra', '27', 'Ashutosh Shirole', 'ashutosh@e-bc.in', 'Maharashtra', '27', 'Pune', 'Pune', '27MHBLID231DF'),
(2, 1, 0, 'Tri-Polarcon', 'Tri-Polarcon', '', 'tejas@gmail.com', 'vinod ', 'Maharashtra', '27', 'vinod ', 'vinod@gmail.com', 'Maharashtra', '27', 'Pune', 'Pune', ''),
(3, 1, 0, 'Planora', 'Planora', '', 'tejas@gmail.com', 'Tejas ', 'Haryana', '6', 'Tejas ', 'tejas@gmail.com', 'Haryana', '6', 'Haryana', 'Haryana', ''),
(4, 1, 0, 'It-Freedom', 'It-Freedom', '', 'amit@e-bc.in', 'Amit Ranawade', 'Maharashtra', '27', 'Amit Ranawade', 'amit@e-bc.in', 'Maharashtra', '27', 'Pune', 'Pune', ''),
(5, 1, 0, 'Tata', 'Tata', '', 'pratik@e-bc.in', 'Pratik', 'Maharashtra', '27', 'Pratik', 'pratik@e-bc.in', 'Maharashtra', '27', 'Pune', 'Pune', ''),
(6, 1, 0, 'Codesnippet', 'Codesnippet', '', 'rahul@gmail.com', 'Rahul', 'Maharashtra', '27', 'Rahul', 'rahul@gmail.com', 'Maharashtra', '27', 'Pune', 'Pune', ''),
(7, 1, 0, 'Dsad', 'Dsad', '', 'a@gmail.com', 'asd', 'Himachal Pradesh', '2', '', '', '', '', 'hggh', '', ''),
(8, 1, 0, 'Kumar Builders', 'KumarBuilders', 'GAJKAGGA0990L', 'gurudtta@testing.neotech', 'Gurudatta', 'Maharashtra ', '27', 'Gurudatta', 'gurudtta@testing.neotech', 'Maharashtra ', '27', 'Kumar Builders, Kharghar', 'kumar builders kharghar', ''),
(9, 1, 0, 'Vishwanath Mhatre', 'VishwanathMhatre', 'GAPOO9876G', 'gurdatta@kumarbuilder.com', 'Gurudatta', 'Maharashtra ', '27', 'Gurudatta', 'gurdatta@kumarbuilder.com', 'Maharashtra ', '27', 'Kharghar testing', 'Kharghar testing', ''),
(10, 1, 0, '6', '6', 'ALKPS8333B', 'vesteria29@gmail.com', 'Amit', 'Maharashtra ', '27', 'Amit', 'vesteria29@gmail.com', 'Maharashtra ', '27', '90 FT ROAD GHATKOPAR', '90 FT ROAD GHATKOPAR', '27ALKPS8333B1ZY'),
(11, 1, 0, '7', '7', 'AABCB0976E', 'testing@neotech123.in', 'Amit', 'Maharashtra ', '27', 'Amit', 'testing@neotech123.in', 'Maharashtra ', '27', 'thane, mumbai', 'thane, mumbai', '27AABCB0976E1ZV'),
(12, 1, 0, '30', '30', 'AABCD3102E', 'abhay@dcstechno.com', 'ABHAY', 'Maharashtra ', '27', '', 'abhay@dcstechno.com', 'Maharashtra ', '27', 'CBD BELAPUR', 'CBD BELAPUR', '27AABCD3102E1ZD'),
(13, 1, 0, '31', '31', 'AADCT5240R', 'account@tachion-india.com', 'AMARNATH', 'Maharashtra ', '27', '', 'account@tachion-india.com', 'Maharashtra ', '27', 'PLOT NO.8, SECTOR1, AIROLI NAKA, AIROLI, NAVI MUMBAI-400708', 'PLOT NO.8, SECTOR1, AIROLI NAKA, AIROLI, NAVI MUMBAI-400708', '27AADCT5240R1ZT'),
(14, 1, 0, '32', '32', 'AAACT4498A', 'turbheironandsteel@gmail.com', 'TURBHE', 'Maharashtra ', '27', 'TURBHE', 'turbheironandsteel@gmail.com', 'Maharashtra ', '27', 'PLOT NO.102(A), TURBHE SERVICE INDUSTRIAL AREA, NEAR JANTA MARKET SEC23, TURBHE, NAVI MUMBAI -400705', 'PLOT NO.102(A), TURBHE SERVICE INDUSTRIAL AREA, NEAR JANTA MARKET SEC23, TURBHE, NAVI MUMBAI -400705', '27AAACT4498A1ZD'),
(15, 1, 0, '33', '33', 'AFBPC2870G', 'shaileshchopra2028@yahoo.com', 'SHAILESH', 'Maharashtra ', '27', 'SHAILESH', 'shaileshchopra2028@yahoo.com', 'Maharashtra ', '27', 'SANTACRUZ', 'SANTACRUZ', '27AFBPC2870G1ZS'),
(16, 1, 0, '34', '34', 'AKVPK4074H', 'harshawardhan.kenny@gmail.com', 'harsh', 'Maharashtra ', '27', 'harsh', 'harshawardhan.kenny@gmail.com', 'Maharashtra ', '27', 'ULWE', 'ULWE', '27AKVPK4074H1ZN'),
(17, 1, 0, '35', '35', 'ANMPS6054M', 'supremehardware17@gmail.com', 'supreme', 'Maharashtra ', '27', 'supreme', 'supremehardware17@gmail.com', 'Maharashtra ', '27', 'TURBHE', 'TURBHE', '27ANMPS6054M1Z7'),
(18, 1, 0, '9', '9', 'CDRPM2201D', 'apollotile2009@gmail.com', 'ROHIN', 'Maharashtra ', '27', 'ROHIN', 'apollotile2009@gmail.com', 'Maharashtra ', '27', 'Mumbra Panvel Road', 'Mumbra Panvel Road', '27CDRPM2201D1ZD');

-- --------------------------------------------------------

--
-- Table structure for table `daily_labour`
--

CREATE TABLE `daily_labour` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cont_id` int(255) NOT NULL,
  `type_of_work` bigint(255) NOT NULL,
  `no_labour` bigint(20) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_labour`
--

INSERT INTO `daily_labour` (`id`, `user_id`, `sub_user_id`, `date`, `cont_id`, `type_of_work`, `no_labour`, `record_date`, `update_date`) VALUES
(2, 1, 0, '2018-08-22', 2, 1, 4, '2018-08-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `daily_material_consuption`
--

CREATE TABLE `daily_material_consuption` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `avail_qty` int(11) NOT NULL,
  `bal_qty` int(255) NOT NULL,
  `date` date NOT NULL,
  `used_for` text NOT NULL,
  `comment` text NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_material_consuption`
--

INSERT INTO `daily_material_consuption` (`id`, `user_id`, `sub_user_id`, `pro_id`, `mate_id`, `cont_id`, `description`, `unit`, `qty`, `avail_qty`, `bal_qty`, `date`, `used_for`, `comment`, `record_date`, `update_date`) VALUES
(1, 1, 0, 3, 2, 4, '', 'BAG', 2, 12, 10, '2018-08-16', '', '', '2018-08-16', '0000-00-00'),
(2, 1, 0, 8, 4, 5, 'Anti skit tiles', '500Box', 100, 400, 300, '2018-08-22', '1st floor Bathrooms west wing', '', '2018-08-29', '0000-00-00'),
(3, 1, 1, 1, 4, 2, 'Anti skit tiles', '500Box', 20, 100, 80, '2018-09-04', 'first floor bathrooms A wing 5 falts', '', '2018-09-10', '0000-00-00'),
(4, 1, 1, 1, 4, 5, 'Anti skit tiles', '500Box', 10, 70, 60, '2018-09-19', 'A wing 1st floor 10 flats', '', '2018-09-19', '0000-00-00'),
(5, 1, 0, 1, 7, 2, '6 inch red brick', 'Number', 1000, 5000, 4000, '2018-09-19', 'A wing 3 floor 5 flats', '', '2018-09-19', '0000-00-00'),
(6, 1, 1, 1, 8, 3, '600*600  K6016 Batch number : ', 'Box 6num', 330, 2050, 1720, '2018-09-25', '3rd floor 110 4th floor 110 5th floor 110', '', '2018-09-26', '0000-00-00'),
(7, 1, 1, 1, 3, 6, '', 'BAG', 25, 2000, 1975, '2018-10-03', 'flooring & wall tiles work at 4th,5th floor', '', '2018-10-04', '0000-00-00'),
(8, 1, 1, 1, 4, 6, 'Anti skit tiles', '500Box', 15, 60, 45, '2018-10-03', '', '', '2018-10-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `daily_material_requisition`
--

CREATE TABLE `daily_material_requisition` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `requ_made_by` int(255) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `requried_by_date` date NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  `approval` varchar(25) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `po_no` varchar(255) NOT NULL,
  `po_date` date NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `tax_value` decimal(52,2) NOT NULL,
  `tax_amt` decimal(52,2) NOT NULL,
  `grand_total` decimal(52,2) NOT NULL,
  `terms` text NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_material_requisition`
--

INSERT INTO `daily_material_requisition` (`id`, `user_id`, `sub_user_id`, `pro_id`, `requ_made_by`, `mate_id`, `description`, `unit`, `qty`, `requried_by_date`, `date`, `comment`, `approval`, `supp_id`, `po_no`, `po_date`, `rate`, `tax_value`, `tax_amt`, `grand_total`, `terms`, `record_date`, `update_date`) VALUES
(1, 1, 0, 1, 1, 10, 'SS', 'Number', 100, '2018-10-08', '2018-10-04', 'need for above 6th floor', 'Approved', 0, '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', '', '2018-10-04', '2018-10-25'),
(2, 1, 0, 1, 1, 57, 'PP Sheet 2mm Gray 48\'\'X72\'\'', 'Number', 450, '2018-11-05', '2018-10-05', '', 'Approved', 11, '001', '2018-11-14', '50.00', '12.00', '2700.00', '25200.00', '1. Please pay your invoice within seven daysÂ \r\n2. Cheque and DDâ€™s to be drawn on â€˜Neotech Constructions Pvt. Ltd.â€™Â \r\n3. Subject to Navi Mumbai Jurisdiction\r\n\r\nThank you for your business', '2018-11-01', '2018-11-13'),
(3, 1, 1, 1, 1, 58, 'One Way Tape 72mm P', 'Roll', 23, '2018-11-03', '2018-10-05', '', 'Pending', 0, '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', '', '2018-11-01', '0000-00-00'),
(4, 1, 1, 1, 1, 58, 'One Way Tape 72mm P', 'Roll', 23, '2018-11-03', '2018-10-05', '', 'Pending', 0, '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', '', '2018-11-01', '0000-00-00'),
(5, 1, 1, 1, 1, 60, '', 'Number', 50, '2019-01-24', '2018-10-15', '', 'Pending', 0, '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', '', '2018-11-01', '0000-00-00'),
(6, 1, 1, 1, 1, 60, '1\" Patti Orange Colour ', 'Number', 50, '2019-01-31', '2018-10-15', '', 'Pending', 0, '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', '', '2018-11-01', '0000-00-00'),
(7, 1, 1, 1, 1, 61, 'yellow colour ', 'Number', 50, '2019-01-31', '2018-10-15', '', 'Pending', 0, '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', '', '2018-11-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `daily_works`
--

CREATE TABLE `daily_works` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cont_id` int(11) NOT NULL,
  `work_type` int(11) NOT NULL,
  `volume_of_work` varchar(255) NOT NULL,
  `no_skill_labour` bigint(20) NOT NULL,
  `no_unskill_labour` bigint(20) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_works`
--

INSERT INTO `daily_works` (`id`, `user_id`, `sub_user_id`, `pro_id`, `date`, `cont_id`, `work_type`, `volume_of_work`, `no_skill_labour`, `no_unskill_labour`, `unit_id`, `value`, `record_date`, `update_date`) VALUES
(1, 1, 0, 4, '2018-08-24', 2, 1, '10', 5, 0, 7, '4000', '2018-08-24', '0000-00-00'),
(2, 1, 0, 5, '2018-08-21', 4, 2, '9', 5, 0, 7, '6000', '2018-08-29', '0000-00-00'),
(3, 1, 0, 6, '2018-08-23', 4, 2, '10', 10, 0, 7, '10000', '2018-08-29', '2018-09-04'),
(6, 1, 3, 2, '2018-09-05', 2, 6, '100', 5, 0, 4, '33000', '2018-09-11', '0000-00-00'),
(7, 1, 4, 3, '2018-09-05', 2, 2, '9', 10, 0, 7, '10000', '2018-09-11', '0000-00-00'),
(8, 1, 4, 3, '2018-09-08', 4, 5, '100', 2, 0, 4, '40000', '2018-09-11', '0000-00-00'),
(10, 1, 1, 1, '2018-10-03', 6, 2, '241', 13, 0, 2, '', '2018-10-04', '0000-00-00'),
(12, 1, 1, 1, '2018-10-05', 6, 2, '18', 9, 2, 7, '', '2018-10-06', '0000-00-00'),
(13, 0, 0, 0, '0000-00-00', 0, 0, '600', 80000, 0, 0, '', '2018-10-06', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `pur_date` date NOT NULL,
  `perticular` varchar(255) NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `proj_client` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `state_code` varchar(20) NOT NULL,
  `hsn_code` varchar(255) NOT NULL,
  `basic_amt` decimal(53,2) NOT NULL,
  `tax_amt` decimal(53,2) NOT NULL,
  `total_amt` decimal(53,2) NOT NULL,
  `created_at` date NOT NULL,
  `acc_head_id` int(11) NOT NULL,
  `mode_id` int(11) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `cheque_date` date NOT NULL,
  `voucher_no` varchar(100) NOT NULL,
  `is_return` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `sub_user_id`, `invoice_no`, `pur_date`, `perticular`, `party_name`, `gst_no`, `proj_client`, `state`, `state_code`, `hsn_code`, `basic_amt`, `tax_amt`, `total_amt`, `created_at`, `acc_head_id`, `mode_id`, `cheque_no`, `cheque_date`, `voucher_no`, `is_return`) VALUES
(1, 1, 0, 'SAL-1', '2018-05-01', 'Salary', 'EBC Solutions Pvt. Ltd', '27MHJHKHN124K', '', 'Maharashtra', '27', '', '11000.00', '1320.00', '12320.00', '2018-06-04', 18, 7, '', '1970-01-01', '001', 'No'),
(2, 1, 0, 'PUR-1', '2018-06-05', 'Purchase', 'Aaradhya Ineterprices', '27MHKFK332KH', 'EBC Solutions Pvt. Ltd', 'Maharashtra', '27', '57462100', '45000.00', '8100.00', '53100.00', '2018-06-04', 1, 7, '', '1970-01-01', '002', 'Yes'),
(3, 1, 0, 'Sal-2', '2018-05-01', 'Salary', 'EBC Solutions Pvt. Ltd', '27MHJHKHN124K', '', 'Maharashtra', '27', '', '15000.00', '2700.00', '17700.00', '2018-06-04', 18, 7, '', '1970-01-01', '003', 'Yes'),
(4, 1, 0, 'PUR-2', '2018-06-12', 'Salary', 'EBC Solutions Pvt. Ltd', '27MHJHKHN124K', 'Printing Purchase', 'Maharashtra', '27', '98462111', '86000.00', '10320.00', '96320.00', '2018-06-12', 13, 2, '', '1970-01-01', '005', 'Yes'),
(5, 1, 0, 'PUR-5', '2018-05-30', 'Purchase', 'Planora', '', '', 'Himachal Pradesh', '2', '', '500.00', '140.00', '640.00', '2018-06-23', 13, 3, '015201500', '2018-06-23', '005', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `flat_booking`
--

CREATE TABLE `flat_booking` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_cont` varchar(20) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `flat_details` text NOT NULL,
  `area` varchar(255) NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `other_charges` decimal(52,2) NOT NULL,
  `gov_charges` decimal(52,2) NOT NULL,
  `amount` decimal(52,2) NOT NULL,
  `payment_date` date NOT NULL,
  `paid_amount` decimal(52,2) NOT NULL,
  `total_due` decimal(52,2) NOT NULL,
  `balance_amount` decimal(52,2) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat_booking`
--

INSERT INTO `flat_booking` (`id`, `user_id`, `sub_user_id`, `cust_name`, `cust_cont`, `pro_id`, `flat_details`, `area`, `rate`, `other_charges`, `gov_charges`, `amount`, `payment_date`, `paid_amount`, `total_due`, `balance_amount`, `record_date`, `update_date`) VALUES
(1, 1, 0, '3', '', 0, 'sAS', '12221', '5656.00', '123.00', '12.00', '123.00', '2018-08-11', '123.00', '1231.00', '213.00', '2018-08-11', '0000-00-00'),
(3, 1, 0, '2', '', 0, 'dasadasdasd', '152215', '10000.00', '1000.00', '1000.00', '1000.00', '2018-08-12', '1000.00', '1000.00', '1000.00', '2018-08-12', '0000-00-00'),
(5, 1, 0, '2', '', 3, 'da', '700', '2000.00', '5000.00', '2000.00', '1407000.00', '2018-08-13', '0.00', '0.00', '1407000.00', '2018-08-13', '0000-00-00'),
(6, 1, 0, 'Sandip', '9874569855', 5, '702', '700', '5000.00', '500000.00', '300000.00', '4300000.00', '2018-08-22', '250000.00', '0.00', '4050000.00', '2018-08-22', '0000-00-00'),
(7, 1, 0, 'Amit', '8974584874', 4, '550', '5000', '6500.00', '900000.00', '600000.00', '34000000.00', '2018-08-23', '1500000.00', '0.00', '32500000.00', '2018-08-22', '0000-00-00'),
(8, 1, 0, 'Rajesh Dave', '9900233390', 4, 'Flat on B wing 202', '600', '5000.00', '300000.00', '250000.00', '3550000.00', '2018-08-28', '30000.00', '0.00', '3520000.00', '2018-08-29', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `quantity` decimal(53,2) NOT NULL,
  `discount` decimal(53,2) NOT NULL DEFAULT '0.00',
  `disc_amt` decimal(53,2) NOT NULL,
  `tax_amt` decimal(53,2) NOT NULL,
  `common_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `description` varchar(20000) DEFAULT NULL,
  `unitary_cost` decimal(53,2) NOT NULL,
  `price` decimal(53,2) NOT NULL,
  `hsn_code` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-active 0-deactive',
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `user_id`, `sub_user_id`, `quantity`, `discount`, `disc_amt`, `tax_amt`, `common_id`, `product_id`, `description`, `unitary_cost`, `price`, `hsn_code`, `session`, `state_code`, `status`, `type`) VALUES
(1, 1, 0, '1.00', '0.00', '0.00', '36000.00', 1, 1, 'Flow Tracking Management', '200000.00', '236000.00', '564111', '2018-06-000265-STO', '27', 1, 'invoice'),
(2, 1, 0, '500.00', '0.00', '0.00', '138.00', 2, 2, 'Folder Printing', '2.30', '1288.00', '654211', '2018-06-000267-STO', '27', 1, 'estimate'),
(4, 1, 0, '500.00', '0.00', '0.00', '138.00', 3, 2, 'Folder Printing', '2.30', '1288.00', '654211', '2018-06-000267-STO467', '27', 1, 'proforma'),
(5, 1, 0, '45.00', '0.00', '0.00', '121.50', 3, 2, 'I-Cards Printing', '15.00', '796.50', '654211', '2018-06-000267-STO927', '27', 1, 'proforma'),
(6, 1, 0, '1.00', '0.00', '0.00', '539.82', 4, 1, 'Invoice', '2999.00', '3538.82', '564111', '2018-06-000269-STO', '6', 1, 'invoice'),
(7, 1, 0, '5.00', '0.00', '0.00', '486.00', 5, 3, 'T-Shirts', '540.00', '3186.00', '9874611', '2018-06-000275-STO', '6', 1, 'invoice'),
(10, 1, 0, '5.00', '0.00', '0.00', '9.00', 6, 2, 'I-Cards Printing', '15.00', '84.00', '654211', '2018-06-000276-STO', '6', 1, 'invoice'),
(11, 1, 0, '10.00', '25.00', '3750.00', '1350.00', 5, 3, 'Shirts', '1500.00', '12600.00', '9874611', '2018-06-000275-STO', '6', 1, 'invoice'),
(12, 1, 0, '500.00', '2.00', '200.00', '1764.00', 6, 2, 'I-Cards Printing', '20.00', '11564.00', '654211', '2018-06-000276-STO', '6', 1, 'invoice'),
(13, 1, 0, '1.00', '0.00', '0.00', '719.88', 7, 1, 'Invoice and CRM', '5999.00', '6718.88', '564111', '2018-06-000281-STO', '27', 1, 'invoice'),
(14, 1, 0, '2.00', '15.00', '450.00', '459.00', 8, 3, 'Shirts', '1500.00', '3009.00', '9874611', '2018-06-000285-STO', '27', 1, 'estimate'),
(15, 1, 0, '2.00', '15.00', '450.00', '459.00', 9, 3, 'Shirts', '1500.00', '3009.00', '9874611', '2018-06-000285-STO226', '27', 1, 'proforma'),
(16, 1, 0, '2.00', '0.00', '0.00', '3359.44', 10, 1, 'Invoice and CRM', '5999.00', '15357.44', '564111', '2018-06-000294-STO', '27', 1, 'invoice'),
(17, 1, 0, '2.00', '0.00', '0.00', '150.00', 11, 3, 'Shirts', '1500.00', '3150.00', '9874611', '2018-06-000296-STO', '6', 1, 'invoice'),
(18, 1, 0, '1.00', '0.00', '0.00', '719.88', 12, 1, 'Invoice and CRM', '5999.00', '6718.88', '564111', '2018-06-000299-STO', '27', 1, 'invoice'),
(19, 1, 0, '5.00', '0.00', '0.00', '1350.00', 13, 3, 'Shirts', '1500.00', '8850.00', '9874611', '2018-06-000301-STO', '27', 1, 'estimate'),
(20, 1, 0, '5.00', '0.00', '0.00', '1350.00', 14, 3, 'Shirts', '1500.00', '8850.00', '9874611', '2018-06-000301-STO551', '27', 1, 'proforma'),
(21, 1, 0, '5.00', '0.00', '0.00', '1350.00', 15, 3, 'Shirts', '1500.00', '8850.00', '9874611', '2018-06-000301-STO551827', '27', 1, 'invoice'),
(23, 1, 0, '5.00', '0.00', '0.00', '900.00', 16, 3, 'Shirts', '1500.00', '8400.00', '9874611', '2018-06-000307-STO', '27', 1, 'invoice'),
(26, 1, 0, '45.00', '0.00', '0.00', '108.00', 17, 2, 'I-Cards Printing', '20.00', '1008.00', '654211', '2018-06-000310-STO', '27', 1, 'invoice'),
(27, 1, 0, '5.00', '0.00', '0.00', '900.00', 18, 3, 'Shirts', '1500.00', '8400.00', '9874611', '2018-06-000312-STO', '27', 1, 'invoice'),
(28, 1, 0, '1.00', '0.00', '0.00', '180.00', 18, 3, 'Shirts', '1500.00', '1680.00', '9874611', '2018-06-000312-STO', '27', 1, 'invoice'),
(29, 1, 0, '50.00', '5.00', '50.00', '171.00', 19, 2, 'I-Cards Printing', '20.00', '1121.00', '654211', '2018-06-000318-STO', '27', 1, 'estimate'),
(30, 1, 0, '50.00', '5.00', '50.00', '171.00', 20, 2, 'I-Cards Printing', '20.00', '1121.00', '654211', '2018-06-000318-STO544', '27', 1, 'proforma'),
(31, 1, 0, '50.00', '5.00', '50.00', '171.00', 21, 2, 'I-Cards Printing', '20.00', '1121.00', '654211', '2018-06-000318-STO544258', '27', 1, 'invoice'),
(32, 1, 0, '1.00', '0.00', '0.00', '0.00', 22, 1, 'Invoice ', '2999.00', '2999.00', '564111', '2018-06-000320-STO', '27', 1, 'invoice'),
(33, 1, 0, '1.00', '0.00', '0.00', '719.88', 22, 1, 'Invoice And CRM', '5999.00', '6718.88', '564111', '2018-06-000320-STO', '27', 1, 'invoice'),
(34, 1, 0, '50.00', '5.00', '500.00', '475.00', 24, 7, 'History Books', '200.00', '9975.00', '001', '2018-08-000346-STO', '27', 1, 'invoice'),
(35, 1, 0, '20.00', '5.00', '4000.00', '3800.00', 25, 9, 'testing', '4000.00', '79800.00', 'Test', '2018-08-000350-STO', '27', 1, 'invoice'),
(36, 1, 0, '12.00', '0.00', '0.00', '0.00', 1, 9, 'testing', '4000.00', '48000.00', 'Test', '2019-01-000377-STO', '27', 1, 'invoice');

-- --------------------------------------------------------

--
-- Table structure for table `item_tax`
--

CREATE TABLE `item_tax` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tax_value` decimal(53,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_tax`
--

INSERT INTO `item_tax` (`id`, `item_id`, `tax_value`) VALUES
(1, 1, '18.00'),
(2, 2, '12.00'),
(4, 4, '12.00'),
(5, 5, '18.00'),
(6, 6, '18.00'),
(7, 7, '18.00'),
(9, 10, '12.00'),
(10, 11, '12.00'),
(11, 12, '18.00'),
(12, 13, '12.00'),
(13, 14, '18.00'),
(14, 15, '18.00'),
(15, 16, '28.00'),
(16, 17, '5.00'),
(17, 18, '12.00'),
(18, 19, '18.00'),
(19, 20, '18.00'),
(20, 21, '18.00'),
(22, 23, '12.00'),
(25, 26, '12.00'),
(26, 27, '12.00'),
(27, 28, '12.00'),
(28, 29, '18.00'),
(29, 30, '18.00'),
(30, 31, '18.00'),
(31, 33, '12.00'),
(32, 34, '5.00'),
(33, 35, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `cp_id` int(10) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_mobile` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `createdate` date NOT NULL,
  `updatedate` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `cp_id`, `client_name`, `client_email`, `client_mobile`, `city`, `contact_person`, `createdate`, `updatedate`, `status`) VALUES
(1, 2, 'Shree Enterprises', 'shreeenterprises0606@gmail.com', '07030708328', 'Pune', 'Tushar Deo', '2018-06-19', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_invoice_gen`
--

CREATE TABLE `material_invoice_gen` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `number` varchar(11) NOT NULL,
  `challan_no` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_invoice_gen`
--

INSERT INTO `material_invoice_gen` (`id`, `user_id`, `sub_user_id`, `number`, `challan_no`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'PR-9', '14 ,15 ', '2019-01-23 10:39:17', '0000-00-00 00:00:00'),
(2, 1, 0, '11', '500 ', '2019-02-19 10:20:23', '0000-00-00 00:00:00'),
(3, 1, 0, '12', '501 ,502 ', '2019-02-19 10:51:31', '0000-00-00 00:00:00'),
(4, 1, 0, '13', '503 ,504 ,505 ,506 ,507 ', '2019-02-19 11:52:08', '0000-00-00 00:00:00'),
(5, 1, 0, '14', '508 ,509 ', '2019-02-19 12:03:17', '0000-00-00 00:00:00'),
(6, 1, 0, '15', '746 ', '2019-03-08 09:51:33', '0000-00-00 00:00:00'),
(7, 1, 0, '16', '510 ,748 ,749 ', '2019-03-08 11:15:22', '0000-00-00 00:00:00'),
(8, 1, 0, '17', '750 ,752 ,753 ', '2019-03-11 07:54:15', '0000-00-00 00:00:00'),
(9, 1, 0, '18', '746 ', '2019-03-11 07:59:55', '0000-00-00 00:00:00'),
(10, 1, 0, '19', '768 ,769 ', '2019-03-25 09:57:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `material_procurement`
--

CREATE TABLE `material_procurement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `rate` decimal(53,2) NOT NULL,
  `qty` int(255) NOT NULL,
  `amount` decimal(53,2) NOT NULL,
  `tax_value` decimal(52,2) NOT NULL,
  `tax_amt` decimal(52,2) NOT NULL,
  `sgst` decimal(52,2) NOT NULL,
  `cgst` decimal(52,2) NOT NULL,
  `total_amt` decimal(52,2) NOT NULL,
  `po_wo_no` varchar(255) NOT NULL,
  `challan` varchar(255) NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `gadi_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL,
  `grn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_procurement`
--

INSERT INTO `material_procurement` (`id`, `user_id`, `sub_user_id`, `supp_id`, `pro_id`, `mate_id`, `description`, `unit`, `rate`, `qty`, `amount`, `tax_value`, `tax_amt`, `sgst`, `cgst`, `total_amt`, `po_wo_no`, `challan`, `batch_no`, `gadi_no`, `date`, `record_date`, `update_date`, `grn`) VALUES
(2, 1, 0, 3, 4, 2, '', 'BAG', '550.00', 1000, '550000.00', '18.00', '99000.00', '49500.00', '49500.00', '649000.00', '', '', '', '', '2018-08-28', '2018-08-28', '0000-00-00', 0),
(4, 1, 0, 3, 7, 2, '', 'BAG', '300.00', 4000, '1200000.00', '18.00', '216000.00', '108000.00', '108000.00', '1416000.00', '001', '12,13,14,15', '', '', '2018-08-03', '2018-08-29', '0000-00-00', 0),
(5, 1, 0, 3, 7, 6, 'Made in USA', 'Box - 100', '40000.00', 50, '2000000.00', '18.00', '360000.00', '180000.00', '180000.00', '2360000.00', '', '', '', '', '2018-08-22', '2018-08-29', '0000-00-00', 0),
(6, 1, 0, 2, 8, 4, 'Anti skit tiles', '500Box', '1000.00', 400, '400000.00', '5.00', '20000.00', '10000.00', '10000.00', '420000.00', '', '', '', '', '2018-08-22', '2018-08-29', '0000-00-00', 0),
(7, 1, 1, 4, 1, 4, 'Anti skit tiles', '500Box', '1000.00', 100, '100000.00', '18.00', '18000.00', '9000.00', '9000.00', '118000.00', 'PO001', '01,02', '', '', '2018-09-11', '2018-09-10', '0000-00-00', 0),
(8, 1, 1, 4, 1, 5, 'Crushed Sand', 'Brass', '5000.00', 4, '20000.00', '12.00', '2400.00', '1200.00', '1200.00', '22400.00', 'PO002', '01,02', '', '', '2018-09-11', '2018-09-11', '0000-00-00', 0),
(9, 1, 1, 2, 1, 6, 'Made in USA', 'Box - 100', '40000.00', 10, '400000.00', '28.00', '112000.00', '56000.00', '56000.00', '512000.00', 'PO003', '01,02,03', '', '', '2018-09-09', '2018-09-11', '0000-00-00', 0),
(10, 1, 1, 3, 1, 3, '', 'BAG', '300.00', 2000, '600000.00', '18.00', '108000.00', '54000.00', '54000.00', '708000.00', 'PO004', '01', '', '', '2018-09-06', '2018-09-11', '0000-00-00', 0),
(11, 1, 3, 2, 2, 5, 'Crushed Sand', 'Brass', '5000.00', 3, '15000.00', '12.00', '1800.00', '900.00', '900.00', '16800.00', 'PO005', '01', '', '', '2018-09-11', '2018-09-11', '0000-00-00', 0),
(12, 1, 1, 2, 1, 5, 'Crushed Sand', 'Brass', '2200.00', 12, '26400.00', '18.00', '4752.00', '2376.00', '2376.00', '31152.00', 'PO001', '1,2,3', '', '', '2018-09-19', '2018-09-19', '0000-00-00', 0),
(13, 1, 0, 2, 1, 7, '6 inch red brick', 'Number', '9.00', 5000, '45000.00', '5.00', '2250.00', '1125.00', '1125.00', '47250.00', 'PO002', '1,2', '', '', '2018-09-19', '2018-09-19', '0000-00-00', 0),
(14, 1, 1, 5, 1, 5, 'River Sand', 'BAG 40kg', '100.00', 700, '70000.00', '12.00', '8400.00', '4200.00', '4200.00', '78400.00', '', '63', '', '', '2018-05-10', '2018-09-26', '0000-00-00', 0),
(15, 1, 1, 5, 1, 5, 'River Sand', 'BAG 40kg', '100.00', 50, '5000.00', '12.00', '600.00', '300.00', '300.00', '5600.00', '', '48', '', '', '2018-05-09', '2018-09-26', '0000-00-00', 0),
(17, 1, 1, 7, 1, 9, 'Wether coat Ext primer prolinks', 'Ltr', '25.00', 500, '12500.00', '18.00', '2250.00', '1125.00', '1125.00', '14750.00', '', 'DSP/1819/1558', '', 'MH-04, FP-3649', '2018-08-07', '2018-10-04', '0000-00-00', 0),
(18, 1, 1, 8, 1, 11, '2mm gray 48*72', 'Number', '72.00', 450, '32400.00', '18.00', '5832.00', '2916.00', '2916.00', '38232.00', 'NC/THANE/2018/PO/08', '398-18/19', '', '', '2018-10-06', '2018-10-06', '0000-00-00', 0),
(19, 1, 1, 10, 1, 13, 'Binani cement ltd PPC', 'BAG', '300.00', 500, '150000.00', '28.00', '42000.00', '21000.00', '21000.00', '192000.00', '', 'JOS/BCL/4301', '', 'MH-43 Y-4475', '2018-10-06', '2018-10-12', '0000-00-00', 0),
(20, 1, 1, 10, 1, 13, 'Binani cement ltd PPC', 'BAG', '300.00', 200, '60000.00', '0.00', '0.00', '0.00', '0.00', '60000.00', '', 'JOS/BCl/4177', '', 'MH-43 Y-1058', '2018-09-29', '2018-10-12', '0000-00-00', 0),
(21, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 30, '14670.00', '18.00', '2640.60', '1320.30', '1320.30', '17310.60', 'NC/THANE/2018/PO-07/02', 'JC003552', '', '', '2018-09-01', '2018-10-17', '0000-00-00', 0),
(22, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 50, '24450.00', '18.00', '4401.00', '2200.50', '2200.50', '28851.00', 'NC/THANE/2018/PO-07/01', 'JC003534', '', '', '2018-08-28', '2018-10-17', '0000-00-00', 0),
(23, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 20, '9780.00', '18.00', '1760.40', '880.20', '880.20', '11540.40', 'NC/THANE/2018/PO-07/01', 'C/316962', '', '', '2018-08-11', '2018-10-17', '0000-00-00', 0),
(24, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 20, '9780.00', '18.00', '1760.40', '880.20', '880.20', '11540.40', '', 'C/27195', '', '', '2018-08-03', '2018-10-17', '2018-10-20', 0),
(25, 1, 1, 11, 1, 15, 'SQT-ESS-511AKN-BIB COCK WITH NOZZLE', 'Number', '437.00', 3, '1311.00', '18.00', '235.98', '117.99', '117.99', '1546.98', '', 'C/27193', '', '', '2018-07-31', '2018-10-17', '2018-10-20', 0),
(26, 1, 1, 11, 1, 16, 'SQT-ESS-507KN-PILLAR COCK ROCKET TYPE WITH AREATOR', 'Number', '434.00', 2, '868.00', '18.00', '156.24', '78.12', '78.12', '1024.24', '', 'C/27193', '', '', '2018-07-31', '2018-10-17', '0000-00-00', 0),
(27, 1, 1, 11, 1, 17, 'AQT-CHR-3057-ANGULAR STOP COCK (REGULATING VALVE)  WIT', 'Number', '0.00', 15, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27183', '', '', '2018-07-25', '2018-10-17', '0000-00-00', 0),
(28, 1, 1, 11, 1, 18, 'SQT- ESS- 526KN^BASIN INLET CONNECTION (ANGLE VALVE)', 'Number', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(29, 1, 1, 11, 1, 19, 'ALE-ESS-583-HAND SHOWER (HEALTHY FAUCET) (ABS BODY)', 'Number', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '2018-10-20', 0),
(30, 1, 1, 11, 1, 20, 'ALE-ESS-773AL190*125-BOTTLE TRAP WITH FULLY CASTED BODY WIT', 'Number', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(31, 1, 1, 11, 1, 21, 'ALE-ESS-544FT-WASTE COUPLING FULL THREAD 32MM', 'Number', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(32, 1, 1, 11, 1, 22, 'EXTENSION-8481 1\" CP', 'Number', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(33, 1, 1, 11, 1, 29, 'FLANGE-7307\r\n', 'Number', '0.00', 16, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(34, 1, 1, 11, 1, 23, 'ELBOW/PLUG/EXTENTION/DOUBLE NIPPLE -7412 CP ELBOW', 'Number', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(35, 1, 1, 11, 1, 22, 'EXTENSION-8481 1\" CP', 'Number', '0.00', 4, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(36, 1, 1, 11, 1, 25, 'JALLI-7326 -5\"*5\" sq jalli', 'Number', '0.00', 4, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(37, 1, 1, 11, 1, 25, 'JALLI-7326 -5\"*5\" sq jalli', 'Number', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(38, 1, 1, 11, 1, 26, 'METAL/PVC CONNECTOR -3917-24\" PVC CONNECTOR', 'Number', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(39, 1, 1, 11, 1, 26, 'METAL/PVC CONNECTOR -3917-24\" PVC CONNECTOR', 'Number', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '0000-00-00', 0),
(40, 1, 1, 11, 1, 28, 'ECS-WHT-841-CORNER BASIN SIZE 400*405*200', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27173', '', '', '2018-07-17', '2018-10-17', '2018-10-20', 0),
(43, 1, 1, 11, 1, 31, 'MQT-ESS-508-PILLAR COCK SUPER DELUXE WITH AREATOR', 'Number', '1.00', 3, '3.00', '18.00', '0.54', '0.27', '0.27', '3.54', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(44, 1, 1, 11, 1, 32, 'EOS-ESS-541N-OVERHEAD SHOWER 80MM DIA ROUND SHAPE SIN', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(45, 1, 1, 11, 1, 33, 'ALE-ESS-536A-SHOWERR ARM 240MM LONG (LIGHT WEIGHT)', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(46, 1, 1, 11, 1, 34, 'ECS-WHT-901-TABLE TOP BASIN SIZE 355*355*145', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(47, 1, 1, 11, 1, 35, 'WHC-WHT-184L-WALL HUNG CISTERN WITH DRAINAGE L BEND P', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(48, 1, 1, 11, 1, 36, 'MQT-ESS-512-LONG BODY BIB COCK WITH WALL FLANGE WITH ', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(49, 1, 1, 11, 1, 37, 'SQT-ESS-517BKN-WALL MIXER WITH 115MM LONG BEND PIPE FOR', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(50, 1, 1, 11, 1, 18, 'SQT- ESS- 526KN^BASIN INLET CONNECTION (ANGLE VALVE)', 'Number', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(51, 1, 1, 11, 1, 39, 'SQT-ESS-514KN-CONCEALED STOP COCK  WITH SLIDING FLANGE ', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(52, 1, 1, 11, 1, 40, 'MQT-ESS-523-SINK COCK WITH SWINGING CASTED PSPOUT (TA)', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(53, 1, 1, 11, 1, 41, 'MQT-ESS--511-BIB COCK SHORT BODY ', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-04', '2018-10-20', '0000-00-00', 0),
(54, 1, 1, 11, 1, 42, 'ECS-WHT-551PN-EWC WITH NORMAL CLOSING SEAT COVER ', 'Number', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'C/27160', '', '', '2018-07-11', '2018-10-20', '0000-00-00', 0),
(55, 1, 1, 11, 1, 43, 'MCC -160A  TPN', 'Number', '9455.00', 1, '9455.00', '18.00', '1701.90', '850.95', '850.95', '11156.90', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(56, 1, 1, 11, 1, 44, '-', 'Number', '970.00', 1, '970.00', '18.00', '174.60', '87.30', '87.30', '1144.60', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(57, 1, 1, 11, 1, 45, 'Sproader Links ', 'Number', '918.00', 1, '918.00', '0.00', '0.00', '0.00', '0.00', '918.00', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(58, 1, 1, 11, 1, 46, 'Power Terminal - 70 SQ.MM', 'Number', '19.38', 8, '155.04', '18.00', '27.91', '13.95', '13.95', '182.95', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(59, 1, 1, 11, 1, 47, 'Encloser - 400 X 300 X 210\r\n', 'Number', '2888.00', 1, '2888.00', '12.00', '346.56', '173.28', '173.28', '3234.56', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(60, 1, 1, 11, 1, 48, 'Power Cable - 3.5C Al ARM 70SQ.MM - 90Mtrs', 'Number', '27054.00', 1, '27054.00', '18.00', '4869.72', '2434.86', '2434.86', '31923.72', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(61, 1, 1, 11, 1, 49, 'LUGS..- 70 SQMM RING TYPE AL. I.D  8MM', 'Number', '24.00', 6, '144.00', '18.00', '25.92', '12.96', '12.96', '169.92', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(62, 1, 1, 11, 1, 50, ' LUGS.. - 35SQMM RING TYPE AL I.D 8MM ', 'Number', '24.00', 10, '240.00', '18.00', '43.20', '21.60', '21.60', '283.20', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(63, 1, 1, 11, 1, 51, 'CABLE GLAND - BRASS S.C (1/2)\" 2 NOS\r\nBRASS S.C 1\" 2 NOS \r\n           ', 'Number', '2064.00', 1, '2064.00', '18.00', '371.52', '185.76', '185.76', '2435.52', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(64, 1, 1, 11, 1, 52, 'CHEMICAL EARTH KIT ', 'Number', '3600.00', 1, '3600.00', '18.00', '648.00', '324.00', '324.00', '4248.00', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(65, 1, 1, 11, 1, 53, 'IG StriP ( 25MM X 5MM) ', 'RM', '92.40', 1, '92.40', '18.00', '16.63', '8.32', '8.32', '109.03', '', '27/082018/', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(66, 1, 1, 11, 1, 54, 'Installation & Commissioning', 'Number', '5250.00', 5, '26250.00', '18.00', '4725.00', '2362.50', '2362.50', '30975.00', '', '27/082018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(67, 1, 1, 11, 1, 56, '-', 'Number', '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '27/052018/051', '', '', '2018-08-25', '2018-10-21', '0000-00-00', 0),
(68, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 30, '14670.00', '18.00', '2638.84', '1319.42', '1319.42', '17299.06', '', '', '', '', '2018-09-01', '2018-12-14', '0000-00-00', 0),
(69, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 100, '48900.00', '18.00', '8801.12', '4400.56', '4400.56', '57696.23', '', '', '', '', '2018-11-06', '2018-12-14', '0000-00-00', 0),
(70, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 50, '24450.00', '18.00', '4401.00', '2200.50', '2200.50', '28851.00', '', '', '', '', '2018-08-28', '2018-12-14', '0000-00-00', 0),
(71, 1, 1, 13, 1, 63, 'Double rope full body Universal', 'Number', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-13', '2018-12-14', '0000-00-00', 0),
(72, 1, 1, 13, 1, 64, '44+', 'Number', '0.00', 100, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-13', '2018-12-14', '0000-00-00', 0),
(73, 1, 1, 13, 1, 65, 'capacity F/E ISI mark', 'Number', '3.00', 3, '9.00', '18.00', '1.62', '0.81', '0.81', '10.62', '', '', '', '', '2018-11-13', '2018-12-14', '0000-00-00', 0),
(74, 1, 1, 13, 1, 66, 'BC stored pressure type 9kg F/E ISI mark', 'Number', '1.00', 1, '1.00', '18.00', '0.18', '0.09', '0.09', '1.18', '', '', '', '', '2018-11-13', '2018-12-14', '0000-00-00', 0),
(75, 1, 1, 13, 1, 67, '20 ltr', 'Number', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-13', '2018-12-14', '0000-00-00', 0),
(76, 1, 1, 14, 1, 68, '0.9*1.8M', 'sqft', '2.50', 15103, '37758.00', '18.00', '6796.44', '3398.22', '3398.22', '44554.44', '', '', '', '', '2018-11-27', '2018-12-14', '0000-00-00', 0),
(77, 1, 1, 14, 1, 68, '1*2m\r\n', 'sqft', '2.50', 4902, '12255.00', '18.00', '2205.90', '1102.95', '1102.95', '14460.90', '', '', '', '', '2018-11-27', '2018-12-14', '0000-00-00', 0),
(78, 1, 1, 14, 1, 70, '72mm P', 'Roll', '0.00', 23, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-27', '2018-12-14', '0000-00-00', 0),
(79, 1, 1, 8, 1, 57, 'PP Sheet 2mm Gray 48\'\'X72\'\'', 'Number', '72.00', 450, '32400.00', '18.00', '5832.00', '2916.00', '2916.00', '38232.00', '', '', '', '', '2018-10-05', '2018-12-14', '0000-00-00', 0),
(80, 1, 1, 8, 1, 58, 'One Way Tape 72mm P', 'Roll', '75.00', 23, '1725.00', '18.00', '310.50', '155.25', '155.25', '2035.50', '', '', '', '', '2018-10-05', '2018-12-14', '0000-00-00', 0),
(81, 1, 1, 13, 1, 60, '1\" Patti Orange Colour ', 'Number', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-15', '2018-12-14', '0000-00-00', 0),
(82, 1, 1, 13, 1, 61, 'yellow colour ', 'Number', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-15', '2018-12-14', '0000-00-00', 0),
(83, 1, 1, 11, 1, 15, 'SQT-ESS-511AKN-BIB COCK WITH NOZZLE', 'Number', '437.00', 3, '1311.00', '18.00', '235.98', '117.99', '117.99', '1546.98', '', '', '', '', '2018-07-31', '2018-12-14', '0000-00-00', 0),
(84, 1, 1, 15, 1, 71, '-', 'Number', '0.00', 55, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-03', '2018-12-14', '0000-00-00', 0),
(85, 1, 1, 15, 1, 72, '', 'Number', '0.00', 13, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-14', '2018-12-14', '0000-00-00', 0),
(86, 1, 1, 15, 1, 73, '-', 'Number', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-14', '2018-12-14', '0000-00-00', 0),
(87, 1, 1, 15, 1, 74, '-', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-14', '2018-12-14', '0000-00-00', 0),
(88, 1, 1, 15, 1, 75, '-', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-14', '2018-12-14', '0000-00-00', 0),
(89, 1, 1, 15, 1, 76, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-01', '2018-12-14', '0000-00-00', 0),
(90, 1, 1, 15, 1, 72, '', 'Number', '0.00', 33, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-01', '2018-12-14', '0000-00-00', 0),
(91, 1, 1, 15, 1, 77, 'with motor', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-01', '2018-12-14', '0000-00-00', 0),
(92, 1, 1, 15, 1, 73, '-', 'Number', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-01', '2018-12-14', '0000-00-00', 0),
(93, 1, 1, 15, 1, 78, '', 'Number', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-01', '2018-12-14', '0000-00-00', 0),
(94, 1, 1, 15, 1, 79, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-01', '2018-12-14', '0000-00-00', 0),
(95, 1, 1, 15, 1, 80, 'R/m', 'RM', '0.00', 80, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-01', '2018-12-14', '0000-00-00', 0),
(96, 1, 1, 15, 1, 81, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-23', '2018-12-14', '0000-00-00', 0),
(97, 1, 1, 15, 1, 82, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-23', '2018-12-14', '0000-00-00', 0),
(98, 1, 1, 16, 1, 83, '78\"X33\"', 'Number', '0.00', 4, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-06-15', '2018-12-14', '0000-00-00', 0),
(99, 1, 1, 16, 1, 83, '78\"X33\"', 'Number', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-06-27', '2018-12-14', '0000-00-00', 0),
(100, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-12-14', '2018-12-14', '0000-00-00', 0),
(101, 1, 1, 17, 1, 85, '', 'Number', '0.00', 3174, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-30', '2018-12-14', '0000-00-00', 0),
(102, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-25', '2018-12-14', '0000-00-00', 0),
(103, 1, 1, 17, 1, 85, '', 'Number', '0.00', 2950, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-14', '2018-12-14', '0000-00-00', 0),
(104, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-14', '2018-12-14', '0000-00-00', 0),
(105, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-28', '2018-12-14', '0000-00-00', 0),
(106, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-26', '2018-12-14', '0000-00-00', 0),
(107, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-23', '2018-12-14', '0000-00-00', 0),
(108, 1, 1, 17, 1, 85, '', 'Number', '0.00', 3352, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-01', '2018-12-14', '0000-00-00', 0),
(109, 1, 1, 17, 1, 85, '', 'Number', '0.00', 3360, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-11-02', '2018-12-14', '0000-00-00', 0),
(110, 1, 1, 17, 1, 85, '', 'Number', '0.00', 2800, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-21', '2018-12-14', '0000-00-00', 0),
(111, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-22', '2018-12-14', '0000-00-00', 0),
(112, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-15', '2018-12-14', '0000-00-00', 0),
(113, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-14', '2018-12-14', '0000-00-00', 0),
(114, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-05', '2018-12-14', '0000-00-00', 0),
(115, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-05', '2018-12-14', '0000-00-00', 0),
(116, 1, 1, 17, 1, 85, '', 'Number', '0.00', 3072, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-05', '2018-12-14', '0000-00-00', 0),
(117, 1, 1, 17, 1, 85, '', 'Number', '0.00', 4000, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-21', '2018-12-14', '0000-00-00', 0),
(118, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 3, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-06-25', '2018-12-14', '0000-00-00', 0),
(119, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-06-29', '2018-12-15', '0000-00-00', 0),
(120, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-09-20', '2018-12-15', '0000-00-00', 0),
(121, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-08-31', '2018-12-15', '0000-00-00', 0),
(122, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 3, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-06-27', '2018-12-15', '0000-00-00', 0),
(123, 1, 1, 17, 1, 85, '', 'Number', '0.00', 3400, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-09-25', '2018-12-15', '0000-00-00', 0),
(124, 1, 1, 17, 1, 86, 'River Sand', 'Bags 30 kg', '100.00', 1005, '100500.00', '5.00', '5025.00', '2512.50', '2512.50', '105525.00', '', '', '', '', '2018-11-27', '2018-12-15', '0000-00-00', 0),
(125, 1, 1, 17, 1, 86, 'River Sand', 'Bags 30 kg', '100.00', 924, '92400.00', '5.00', '4620.00', '2310.00', '2310.00', '97020.00', '', '', '', '', '2018-11-16', '2018-12-15', '0000-00-00', 0),
(126, 1, 1, 17, 1, 86, 'River Sand', 'Bags 30 kg', '100.00', 915, '91500.00', '5.00', '4575.00', '2287.50', '2287.50', '96075.00', '', '', '', '', '2018-10-26', '2018-12-15', '0000-00-00', 0),
(127, 1, 1, 17, 1, 86, 'River Sand', 'Bags 30 kg', '100.00', 925, '92500.00', '5.00', '4625.00', '2312.50', '2312.50', '97125.00', '', '', '', '', '2018-10-03', '2018-12-15', '0000-00-00', 0),
(128, 1, 1, 18, 1, 87, '50kg bags', 'BAG', '310.00', 100, '31000.00', '5.00', '1550.00', '775.00', '775.00', '32550.00', '', '', '', '', '2018-05-07', '2018-12-15', '0000-00-00', 0),
(129, 1, 1, 9, 1, 88, '20 X 17', 'Number', '1160.00', 80, '92800.00', '18.00', '16704.00', '8352.00', '8352.00', '109504.00', '', '25', '', '', '2018-12-01', '2018-12-22', '0000-00-00', 0),
(130, 1, 1, 9, 1, 88, '20 X 17', 'Number', '1160.00', 10, '11600.00', '18.00', '2088.00', '1044.00', '1044.00', '13688.00', '', '424', '', '', '2018-10-25', '2018-12-22', '0000-00-00', 0),
(131, 1, 1, 9, 1, 88, '20 X 17', 'Number', '1160.00', 80, '92800.00', '18.00', '16704.00', '8352.00', '8352.00', '109504.00', '', '16', '', '', '2018-10-30', '2018-12-22', '0000-00-00', 0),
(132, 1, 1, 9, 1, 88, '20 X 17', 'Number', '1160.00', 20, '23200.00', '18.00', '4176.00', '2088.00', '2088.00', '27376.00', '', '26', '', '', '2018-10-25', '2018-12-22', '0000-00-00', 0),
(133, 1, 1, 9, 1, 88, '20 X 17', 'Number', '1160.00', 28, '32480.00', '18.00', '5846.40', '2923.20', '2923.20', '38326.40', '', '34', '', '', '2018-10-06', '2018-12-22', '0000-00-00', 0),
(134, 1, 1, 9, 1, 89, '12\" X 12\" Chicago Grey                                                                                                                                                             ', 'Box-10', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '00', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(135, 1, 1, 9, 1, 90, '18\" X 12\" Stanley highlighter ', 'Box - 6', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(136, 1, 1, 9, 1, 91, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(137, 1, 1, 9, 1, 92, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(138, 1, 1, 9, 1, 93, '', 'Number', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(139, 1, 1, 9, 1, 94, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(140, 1, 1, 9, 1, 95, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(141, 1, 1, 9, 1, 96, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(142, 1, 1, 9, 1, 97, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(143, 1, 1, 9, 1, 98, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(144, 1, 1, 9, 1, 99, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(145, 1, 1, 9, 1, 94, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(146, 1, 1, 9, 1, 100, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(147, 1, 1, 9, 1, 101, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(148, 1, 1, 9, 1, 102, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(149, 1, 1, 9, 1, 103, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(150, 1, 1, 9, 1, 104, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(151, 1, 1, 9, 1, 99, '', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-05-09', '2018-12-22', '0000-00-00', 0),
(152, 1, 1, 19, 1, 106, '81\" X 38\" ', 'Number', '0.00', 15, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '05', '', '', '2018-12-21', '2018-12-24', '0000-00-00', 0),
(153, 1, 1, 19, 1, 107, '81\" X 32\"', 'Number', '0.00', 16, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '05', '', '', '2018-12-21', '2018-12-24', '0000-00-00', 0),
(154, 1, 1, 19, 1, 108, '81\" X 27\"', 'Number', '0.00', 40, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '5', '', '', '2018-12-21', '2018-12-24', '0000-00-00', 0),
(155, 1, 1, 19, 1, 108, '81\" X 27\"', 'Number', '0.00', 40, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4', '', '', '2018-12-12', '2018-12-24', '0000-00-00', 0),
(156, 1, 1, 19, 1, 106, '81\" X 38\" ', 'Number', '0.00', 15, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '3', '', '', '2018-12-05', '2018-12-24', '0000-00-00', 0),
(157, 1, 1, 19, 1, 107, '81\" X 32\"', 'Number', '0.00', 15, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '3', '', '', '2018-12-05', '2018-12-24', '0000-00-00', 0),
(158, 1, 1, 11, 1, 21, 'ALE-ESS-544FT-WASTE COUPLING FULL THREAD 32MM', 'Number', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(159, 1, 1, 11, 1, 19, 'ALE-ESS-583-HAND SHOWER (HEALTHY FAUCET) (ABS BODY)', 'Number', '0.00', 11, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(160, 1, 1, 11, 1, 32, 'EOS-ESS-541N-OVERHEAD SHOWER 80MM DIA ROUND SHAPE SIN', 'Number', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(161, 1, 1, 11, 1, 16, 'SQT-ESS-507KN-PILLAR COCK ROCKET TYPE WITH AREATOR', 'Number', '434.00', 12, '5208.00', '18.00', '937.44', '468.72', '468.72', '6145.44', '', 'JC003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(162, 1, 1, 11, 1, 15, 'SQT-ESS-511AKN-BIB COCK WITH NOZZLE', 'Number', '437.00', 10, '4370.00', '18.00', '786.60', '393.30', '393.30', '5156.60', '', 'JC003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(163, 1, 1, 11, 1, 37, 'SQT-ESS-517BKN-WALL MIXER WITH 115MM LONG BEND PIPE FOR', 'Number', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(164, 1, 1, 11, 1, 40, 'MQT-ESS-523-SINK COCK WITH SWINGING CASTED PSPOUT (TA)', 'Number', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JUC003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(165, 1, 1, 11, 1, 18, 'SQT- ESS- 526KN^BASIN INLET CONNECTION (ANGLE VALVE)', 'Number', '0.00', 48, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'Jc003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(166, 1, 1, 11, 1, 109, 'SHA-CHR-477P', 'Number', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003791', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(167, 1, 1, 11, 1, 110, 'WHE-WHT-183L', 'Number', '0.00', 30, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003789', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(168, 1, 1, 11, 1, 34, 'ECS-WHT-901-TABLE TOP BASIN SIZE 355*355*145', 'Number', '0.00', 30, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003789', '', '', '2018-12-20', '2018-12-24', '0000-00-00', 0),
(169, 1, 1, 11, 1, 42, 'ECS-WHT-551PN-EWC WITH NORMAL CLOSING SEAT COVER ', 'Number', '0.00', 18, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-12-17', '2018-12-24', '0000-00-00', 0),
(170, 1, 1, 11, 1, 34, 'ECS-WHT-901-TABLE TOP BASIN SIZE 355*355*145', 'Number', '0.00', 80, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003784', '', '', '2018-12-17', '2018-12-24', '0000-00-00', 0),
(171, 1, 1, 11, 1, 110, 'WHE-WHT-183L', 'Number', '0.00', 80, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003785', '', '', '2018-12-17', '2018-12-24', '0000-00-00', 0),
(173, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 30, '14670.00', '18.00', '2640.60', '1320.30', '1320.30', '17310.60', '', 'JC003552', '', '', '2018-09-01', '2018-12-24', '0000-00-00', 0),
(174, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 10, '4890.00', '18.00', '880.20', '440.10', '440.10', '5770.20', '', 'JC003706', '', '', '2018-10-26', '2018-12-24', '0000-00-00', 0),
(176, 1, 1, 11, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 100, '48900.00', '18.00', '8802.00', '4401.00', '4401.00', '57702.00', '', 'JC003721', '', '', '2018-11-06', '2018-12-24', '0000-00-00', 0),
(177, 1, 1, 20, 1, 111, '60062Z-C3', 'Number', '329.00', 2, '658.00', '18.00', '118.44', '59.22', '59.22', '776.44', '', '6271', '', '', '2018-12-14', '2018-12-24', '0000-00-00', 0),
(178, 1, 1, 6, 1, 112, 'Sphere Blanco 300X450 ', 'Box - 6', '0.00', 172, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4656', '', '', '2018-12-04', '2018-12-24', '0000-00-00', 0),
(179, 1, 1, 6, 1, 90, '18\" X 12\" Stanley highlighter ', 'Box - 6', '0.00', 115, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4656', '', '', '2018-12-04', '2018-12-24', '0000-00-00', 0),
(180, 1, 1, 6, 1, 114, 'Chicago Gray 300X300', 'Box-10', '0.00', 103, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4656', '', '', '2018-12-04', '2018-12-24', '0000-00-00', 0),
(181, 1, 1, 21, 1, 115, '', 'Bundle - 12', '0.00', 54, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '11', '', '', '2018-12-04', '2018-12-24', '0000-00-00', 0),
(182, 1, 1, 21, 1, 117, '', 'Pack', '0.00', 16, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '12', '', '', '2018-12-08', '2018-12-24', '0000-00-00', 0),
(183, 1, 1, 21, 1, 118, '', 'Nos', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '12', '', '', '2018-12-08', '2018-12-24', '0000-00-00', 0),
(184, 1, 1, 21, 1, 115, '', 'Bundle - 12', '0.00', 100, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '12', '', '', '2018-12-08', '2018-12-24', '0000-00-00', 0),
(185, 1, 1, 21, 1, 119, '12mm Sq Bar \r\n20X5mm Patti', 'Kg', '0.00', 15640, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '7', '', '', '2018-11-13', '2018-12-24', '0000-00-00', 0),
(186, 1, 1, 21, 1, 117, '', 'Pack', '0.00', 48, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '09', '', '', '2018-10-03', '2018-12-24', '0000-00-00', 0),
(187, 1, 1, 21, 1, 118, '', 'Nos', '0.00', 30, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '09', '', '', '2018-10-03', '2018-12-24', '0000-00-00', 0),
(188, 1, 1, 21, 1, 120, '4\"', 'Nos', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '10', '', '', '2018-10-15', '2018-12-24', '0000-00-00', 0),
(189, 1, 1, 21, 1, 121, '', 'RM', '0.00', 220, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '10', '', '', '2018-10-15', '2018-12-24', '0000-00-00', 0),
(190, 1, 1, 21, 1, 122, '', 'Nos', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '10', '', '', '2018-10-15', '2018-12-24', '0000-00-00', 0),
(191, 1, 1, 21, 1, 124, '0', 'pair', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '10', '', '', '2018-10-15', '2018-12-24', '0000-00-00', 0),
(192, 1, 1, 21, 1, 125, '', 'pair', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '10', '', '', '2018-10-15', '2018-12-24', '0000-00-00', 0),
(193, 1, 1, 21, 1, 118, '', 'Nos', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '10', '', '', '2018-10-15', '2018-12-24', '0000-00-00', 0),
(194, 1, 1, 21, 1, 123, '', 'Kg', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '15', '', '', '2018-12-24', '2018-12-24', '0000-00-00', 0),
(195, 1, 1, 21, 1, 117, '', 'Pack', '0.00', 40, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '15', '', '', '2018-12-24', '2018-12-24', '0000-00-00', 0),
(196, 1, 1, 21, 1, 118, '', 'Nos', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '15', '', '', '2018-12-24', '2018-12-24', '0000-00-00', 0),
(197, 1, 1, 21, 1, 126, '', 'Kg', '0.00', 100, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '15', '', '', '2018-12-24', '2018-12-24', '0000-00-00', 0),
(198, 1, 1, 21, 1, 127, '', 'Ltr', '0.00', 20, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '14', '', '', '2018-12-21', '2018-12-24', '0000-00-00', 0),
(199, 1, 1, 21, 1, 128, '', 'Ltr', '0.00', 20, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '14', '', '', '2018-12-21', '2018-12-24', '0000-00-00', 0),
(200, 1, 1, 21, 1, 115, '', 'Bundle - 12', '0.00', 500, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '13', '', '', '2018-12-13', '2018-12-24', '0000-00-00', 0),
(201, 1, 1, 21, 1, 123, '', 'Kg', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '8', '', '', '2018-11-14', '2018-12-24', '0000-00-00', 0),
(202, 1, 1, 21, 1, 126, '', 'Kg', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '8', '', '', '2018-11-14', '2018-12-24', '0000-00-00', 0),
(203, 1, 1, 21, 1, 121, '', 'RM', '0.00', 220, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '6', '', '', '2018-11-06', '2018-12-24', '0000-00-00', 0),
(204, 1, 1, 21, 1, 117, '', 'Pack', '0.00', 48, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '6', '', '', '2018-11-06', '2018-12-24', '0000-00-00', 0),
(205, 1, 1, 21, 1, 118, '', 'Nos', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '6', '', '', '2018-11-06', '2018-12-24', '0000-00-00', 0),
(206, 1, 1, 21, 1, 125, '', 'pair', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '6', '', '', '2018-11-06', '2018-12-24', '0000-00-00', 0),
(207, 1, 1, 21, 1, 126, '', 'Kg', '0.00', 26, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '5', '', '', '2018-10-26', '2018-12-24', '0000-00-00', 0),
(208, 1, 1, 21, 1, 123, '', 'Kg', '0.00', 26, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '5', '', '', '2018-10-26', '2018-12-24', '0000-00-00', 0),
(209, 1, 1, 21, 1, 128, '', 'Ltr', '0.00', 20, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '5', '', '', '2018-10-26', '2018-12-24', '0000-00-00', 0),
(210, 1, 1, 21, 1, 128, '', 'Ltr', '0.00', 20, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4', '', '', '2018-10-24', '2018-12-24', '0000-00-00', 0),
(211, 1, 1, 21, 1, 129, '', 'Ltr', '0.00', 40, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '3', '', '', '2018-10-23', '2018-12-24', '0000-00-00', 0),
(212, 1, 1, 21, 1, 130, '', 'Ltr', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '3', '', '', '2018-10-23', '2018-12-24', '0000-00-00', 0),
(213, 1, 1, 21, 1, 117, '', 'Pack', '0.00', 24, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2', '', '', '2018-10-03', '2018-12-24', '0000-00-00', 0),
(214, 1, 1, 21, 1, 118, '', 'Nos', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '25', '', '', '2018-10-03', '2018-12-24', '0000-00-00', 0),
(215, 1, 1, 21, 1, 119, '12mm Sq Bar \r\n20X5mm Patti', 'Kg', '0.00', 9785, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1', '', '', '2018-09-29', '2018-12-24', '0000-00-00', 0),
(216, 1, 1, 21, 1, 127, '', 'Ltr', '0.00', 60, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2911', '', '', '2018-11-15', '2018-12-24', '0000-00-00', 0),
(217, 1, 1, 21, 1, 129, '', 'Ltr', '0.00', 100, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2704', '', '', '2018-10-29', '2018-12-24', '0000-00-00', 0),
(218, 1, 1, 21, 1, 127, '', 'Ltr', '0.00', 60, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2629', '', '', '2018-10-25', '2018-12-24', '0000-00-00', 0),
(219, 1, 1, 21, 1, 129, '', 'Ltr', '0.00', 20, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2629', '', '', '2018-10-25', '2018-12-24', '0000-00-00', 0),
(220, 1, 1, 22, 1, 131, '', 'Nos', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(221, 1, 1, 22, 1, 132, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-001', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(222, 1, 1, 22, 1, 133, '', 'BUNDLE 100M', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(223, 1, 1, 22, 1, 134, '', 'Nos', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(224, 1, 1, 22, 1, 135, '', 'Nos', '0.00', 15, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(225, 1, 1, 22, 1, 136, '', 'Nos', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(226, 1, 1, 22, 1, 137, '', 'Nos', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(227, 1, 1, 22, 1, 138, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(228, 1, 1, 22, 1, 139, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-014', '', '', '2018-11-30', '2018-12-27', '0000-00-00', 0),
(229, 1, 1, 22, 1, 140, '', 'Nos', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-014', '', '', '2018-10-30', '2018-12-27', '0000-00-00', 0),
(230, 1, 1, 22, 1, 141, '', 'Nos', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '-014', '', '', '2018-10-30', '2018-12-27', '0000-00-00', 0),
(231, 1, 1, 22, 1, 142, '', 'BUNDLE 100M', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-013', '', '', '2018-10-26', '2018-12-27', '0000-00-00', 0),
(232, 1, 1, 22, 1, 143, '', 'BUNDLE 100M', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-013', '', '', '2018-10-26', '2018-12-27', '0000-00-00', 0),
(233, 1, 1, 22, 1, 134, '', 'Nos', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-012', '', '', '2018-10-23', '2018-12-27', '0000-00-00', 0),
(234, 1, 1, 22, 1, 136, '', 'Nos', '0.00', 16, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-012', '', '', '2018-10-23', '2018-12-27', '0000-00-00', 0),
(235, 1, 1, 22, 1, 137, '', 'Nos', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-012', '', '', '2018-10-23', '2018-12-27', '0000-00-00', 0),
(236, 1, 1, 22, 1, 144, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-012', '', '', '2018-10-23', '2018-12-27', '0000-00-00', 0),
(237, 1, 1, 22, 1, 145, '', 'Nos', '0.00', 40, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-012', '', '', '2018-10-23', '2018-12-27', '0000-00-00', 0),
(238, 1, 1, 22, 1, 135, '', 'Nos', '0.00', 18, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-012', '', '', '2018-10-23', '2018-12-27', '0000-00-00', 0),
(239, 1, 1, 22, 1, 169, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-012', '', '', '2018-10-23', '2018-12-27', '0000-00-00', 0),
(240, 1, 1, 22, 1, 131, '', 'Nos', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(241, 1, 1, 22, 1, 132, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(242, 1, 1, 22, 1, 133, '', 'BUNDLE 100M', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(243, 1, 1, 22, 1, 134, '', 'Nos', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(244, 1, 1, 22, 1, 135, '', 'Nos', '0.00', 15, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(245, 1, 1, 22, 1, 136, '', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(246, 1, 1, 22, 1, 137, '', 'Nos', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(247, 1, 1, 22, 1, 138, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-011', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(248, 1, 1, 22, 1, 146, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-010', '', '', '2018-10-17', '2018-12-27', '0000-00-00', 0),
(249, 1, 1, 22, 1, 147, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-010', '', '', '2018-10-09', '2018-12-27', '0000-00-00', 0),
(250, 1, 1, 22, 1, 148, '', 'Nos', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-010', '', '', '2018-10-09', '2018-12-27', '0000-00-00', 0),
(251, 1, 1, 22, 1, 149, '', 'Nos', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-010', '', '', '2018-10-09', '2018-12-27', '0000-00-00', 0),
(252, 1, 1, 22, 1, 150, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-009', '', '', '2018-10-06', '2018-12-27', '0000-00-00', 0),
(253, 1, 1, 11, 1, 42, 'ECS-WHT-551PN-EWC WITH NORMAL CLOSING SEAT COVER ', 'Number', '0.00', 18, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003784', '', '', '2018-12-17', '2018-12-27', '0000-00-00', 0),
(254, 1, 1, 22, 1, 151, '', 'BUNDLE 100M', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-009', '', '', '2018-10-06', '2018-12-27', '0000-00-00', 0),
(255, 1, 1, 11, 1, 34, 'ECS-WHT-901-TABLE TOP BASIN SIZE 355*355*145', 'Number', '0.00', 80, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003784', '', '', '2018-12-17', '2018-12-27', '0000-00-00', 0),
(256, 1, 1, 22, 1, 152, '', 'BUNDLE 100M', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-009', '', '', '2018-10-06', '2018-12-27', '0000-00-00', 0),
(257, 1, 1, 11, 1, 34, 'ECS-WHT-901-TABLE TOP BASIN SIZE 355*355*145', 'Number', '0.00', 30, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003789', '', '', '2018-12-20', '2018-12-27', '0000-00-00', 0),
(258, 1, 1, 22, 1, 153, '', 'RM', '0.00', 114, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-009', '', '', '2018-10-06', '2018-12-27', '0000-00-00', 0),
(259, 1, 1, 11, 1, 110, 'WHE-WHT-183L', 'Number', '0.00', 30, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003789', '', '', '2018-12-20', '2018-12-27', '0000-00-00', 0),
(260, 1, 1, 22, 1, 148, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-009', '', '', '2018-10-06', '2018-12-27', '0000-00-00', 0),
(261, 1, 1, 11, 1, 110, 'WHE-WHT-183L', 'Number', '0.00', 80, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003785', '', '', '2018-12-17', '2018-12-27', '0000-00-00', 0),
(262, 1, 1, 22, 1, 149, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-009', '', '', '2018-10-06', '2018-12-27', '0000-00-00', 0),
(263, 1, 1, 22, 1, 154, '', 'Pack', '0.00', 4, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-009', '', '', '2018-10-06', '2018-12-27', '0000-00-00', 0),
(264, 1, 1, 22, 1, 155, '', 'Nos', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-008', '', '', '2018-10-04', '2018-12-27', '0000-00-00', 0),
(265, 1, 1, 22, 1, 133, '', 'BUNDLE 100M', '0.00', 4, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-008', '', '', '2018-10-04', '2018-12-27', '0000-00-00', 0),
(266, 1, 1, 22, 1, 136, '', 'Nos', '0.00', 24, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-008', '', '', '2018-10-04', '2018-12-27', '0000-00-00', 0),
(267, 1, 1, 19, 1, 106, '81\" X 38\" ', 'Number', '0.00', 30, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2', '', '', '2018-11-18', '2018-12-27', '0000-00-00', 0),
(268, 1, 1, 22, 1, 135, '', 'Nos', '0.00', 34, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'N-008', '', '', '2018-12-04', '2018-12-27', '0000-00-00', 0),
(269, 1, 1, 19, 1, 107, '81\" X 32\"', 'Number', '0.00', 30, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2', '', '', '2018-11-18', '2018-12-27', '0000-00-00', 0),
(270, 1, 1, 22, 1, 156, ' ', 'Nos', '0.00', 4, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-008', '', '', '2018-10-04', '2018-12-27', '0000-00-00', 0),
(271, 1, 1, 22, 1, 157, '', 'Nos', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-008', '', '', '2018-10-04', '2018-12-27', '0000-00-00', 0),
(272, 1, 1, 19, 1, 170, '10mmX12mm -3.25RFT', 'RFT', '0.00', 205, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2', '', '', '2018-11-18', '2018-12-27', '0000-00-00', 0),
(273, 1, 1, 22, 1, 151, '', 'BUNDLE 100M', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-007', '', '', '2018-10-01', '2018-12-27', '0000-00-00', 0),
(274, 1, 1, 19, 1, 171, '10mmX12mm 6.75RFT', 'RFT', '0.00', 844, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '2', '', '', '2018-11-18', '2018-12-27', '0000-00-00', 0),
(275, 1, 1, 22, 1, 152, '', 'BUNDLE 100M', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-007', '', '', '2018-10-01', '2018-12-27', '0000-00-00', 0),
(276, 1, 1, 22, 1, 154, '', 'Pack', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-007', '', '', '2018-10-01', '2018-12-27', '0000-00-00', 0),
(277, 1, 1, 22, 1, 165, '', 'Nos', '0.00', 30, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-001', '', '', '2018-08-30', '2018-12-27', '0000-00-00', 0),
(278, 1, 1, 19, 1, 106, '81\" X 38\" ', 'Number', '0.00', 19, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1', '', '', '2018-11-15', '2018-12-27', '0000-00-00', 0),
(279, 1, 1, 19, 1, 107, '81\" X 32\"', 'Number', '0.00', 19, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1', '', '', '2018-11-15', '2018-12-27', '0000-00-00', 0),
(280, 1, 1, 22, 1, 151, '', 'BUNDLE 100M', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-001', '', '', '2018-08-30', '2018-12-27', '0000-00-00', 0),
(281, 1, 1, 22, 1, 151, '', 'BUNDLE 100M', '0.00', 90, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-001', '', '', '2018-08-30', '2018-12-27', '0000-00-00', 0),
(282, 1, 1, 6, 1, 8, '600*600  K6016 Batch number : ', 'Box', '100.00', 725, '72500.00', '18.00', '13050.00', '6525.00', '6525.00', '85550.00', '', '4692', '', '', '2018-12-25', '2018-12-27', '0000-00-00', 0),
(283, 1, 1, 22, 1, 154, '', 'Pack', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-001', '', '', '2018-08-30', '2018-12-27', '0000-00-00', 0),
(284, 1, 1, 22, 1, 158, '', 'Nos', '0.00', 4, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(285, 1, 1, 22, 1, 135, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0);
INSERT INTO `material_procurement` (`id`, `user_id`, `sub_user_id`, `supp_id`, `pro_id`, `mate_id`, `description`, `unit`, `rate`, `qty`, `amount`, `tax_value`, `tax_amt`, `sgst`, `cgst`, `total_amt`, `po_wo_no`, `challan`, `batch_no`, `gadi_no`, `date`, `record_date`, `update_date`, `grn`) VALUES
(286, 1, 1, 22, 1, 159, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-001', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(287, 1, 1, 22, 1, 160, '', 'Nos', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(288, 1, 1, 22, 1, 161, ' ', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(289, 1, 1, 22, 1, 43, 'MCC -160A  TPN', 'Number', '9455.00', 1, '9455.00', '18.00', '1701.90', '850.95', '850.95', '11156.90', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(290, 1, 1, 22, 1, 134, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(291, 1, 1, 22, 1, 162, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(292, 1, 1, 22, 1, 154, '', 'Pack', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(293, 1, 1, 22, 1, 163, '', 'BUNDLE 100M', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-002', '', '', '2018-09-01', '2018-12-27', '0000-00-00', 0),
(294, 1, 1, 22, 1, 135, '', 'Nos', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-004', '', '', '2018-09-19', '2018-12-27', '0000-00-00', 0),
(295, 1, 1, 22, 1, 136, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-004', '', '', '2018-09-19', '2018-12-27', '0000-00-00', 0),
(296, 1, 1, 22, 1, 162, '', 'Nos', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-004', '', '', '2018-09-19', '2018-12-27', '0000-00-00', 0),
(297, 1, 1, 22, 1, 134, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-004', '', '', '2018-09-19', '2018-12-27', '0000-00-00', 0),
(298, 1, 1, 22, 1, 154, '', 'Pack', '0.00', 4, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-004', '', '', '2018-09-19', '2018-12-27', '0000-00-00', 0),
(299, 1, 1, 22, 1, 164, '', 'Pack', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-004', '', '', '2018-09-19', '2018-12-27', '0000-00-00', 0),
(300, 1, 1, 22, 1, 163, '', 'BUNDLE 100M', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-005', '', '', '2018-09-24', '2018-12-27', '0000-00-00', 0),
(301, 1, 1, 21, 1, 139, '', 'Nos', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-005', '', '', '2018-09-24', '2018-12-27', '0000-00-00', 0),
(302, 1, 1, 22, 1, 165, '', 'Nos', '0.00', 20, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-006', '', '', '2018-09-27', '2018-12-27', '0000-00-00', 0),
(303, 1, 1, 22, 1, 166, '', 'Nos', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-006', '', '', '2018-09-27', '2018-12-27', '0000-00-00', 0),
(304, 1, 1, 22, 1, 167, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-006', '', '', '2018-09-27', '2018-12-27', '0000-00-00', 0),
(305, 1, 1, 22, 1, 168, '', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'N-006', '', '', '2018-09-27', '2018-12-27', '0000-00-00', 0),
(306, 1, 1, 19, 1, 191, '', 'Box', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'Priya Hardware', '', '', '2018-11-22', '2018-12-27', '0000-00-00', 0),
(307, 1, 1, 23, 1, 172, 'In one Box 400 Nos ', 'Box', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '179', '', '', '2018-12-14', '2018-12-27', '0000-00-00', 0),
(308, 1, 1, 23, 1, 173, '', 'Piece', '0.00', 82, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '171', '', '', '2018-12-06', '2018-12-27', '0000-00-00', 0),
(309, 1, 1, 23, 1, 174, '', 'Piece', '0.00', 240, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '171', '', '', '2018-12-06', '2018-12-27', '0000-00-00', 0),
(310, 1, 1, 23, 1, 175, '', 'Box', '0.00', 260, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '717', '', '', '2018-12-06', '2018-12-27', '0000-00-00', 0),
(311, 1, 1, 23, 1, 176, '', 'Piece', '0.00', 120, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '171', '', '', '2018-12-06', '2018-12-27', '0000-00-00', 0),
(312, 1, 1, 23, 1, 177, '', 'Piece', '0.00', 240, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '162', '', '', '2018-12-01', '2018-12-27', '0000-00-00', 0),
(313, 1, 1, 23, 1, 178, '', 'Piece', '0.00', 240, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '120', '', '', '2018-12-01', '2018-12-27', '0000-00-00', 0),
(314, 1, 1, 23, 1, 180, '', 'Piece', '0.00', 360, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '162', '', '', '2018-12-01', '2018-12-27', '0000-00-00', 0),
(315, 1, 1, 23, 1, 181, '', 'Piece', '0.00', 120, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '162', '', '', '2018-12-01', '2018-12-27', '0000-00-00', 0),
(316, 1, 1, 23, 1, 185, '', 'Piece', '0.00', 300, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '152', '', '', '2018-11-26', '2018-12-27', '0000-00-00', 0),
(317, 1, 1, 23, 1, 173, '', 'Piece', '0.00', 38, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '152', '', '', '2018-11-26', '2018-12-27', '0000-00-00', 0),
(318, 1, 1, 23, 1, 186, '', 'Box', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '152', '', '', '2018-11-26', '2018-12-27', '0000-00-00', 0),
(319, 1, 1, 23, 1, 184, '', 'Box', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '152', '', '', '2018-11-26', '2018-12-27', '0000-00-00', 0),
(320, 1, 1, 23, 1, 183, '', 'Box', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '152', '', '', '2018-11-26', '2018-12-27', '0000-00-00', 0),
(321, 1, 1, 23, 1, 179, '', 'Piece', '0.00', 110, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '138', '', '', '2018-11-15', '2018-12-27', '0000-00-00', 0),
(322, 1, 1, 23, 1, 187, '', 'Piece', '0.00', 110, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '138', '', '', '2018-11-11', '2018-12-27', '0000-00-00', 0),
(323, 1, 1, 23, 1, 188, '', 'pair', '0.00', 110, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '138', '', '', '2018-11-15', '2018-12-27', '0000-00-00', 0),
(324, 1, 1, 23, 1, 189, '', 'Piece', '0.00', 100, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '136', '', '', '2018-11-06', '2018-12-27', '0000-00-00', 0),
(325, 1, 1, 23, 1, 190, '', 'Piece', '0.00', 100, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '136', '', '', '2018-11-06', '2018-12-27', '0000-00-00', 0),
(326, 1, 1, 23, 1, 181, '', 'Piece', '0.00', 120, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '162', '', '', '2018-12-01', '2018-12-27', '0000-00-00', 0),
(327, 1, 1, 23, 1, 182, '', 'Piece', '0.00', 120, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '162', '', '', '2018-12-01', '2018-12-27', '0000-00-00', 0),
(328, 1, 1, 23, 1, 183, '', 'Box', '0.00', 12, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '12', '', '', '2018-12-01', '2018-12-27', '0000-00-00', 0),
(329, 1, 1, 23, 1, 186, '', 'Box', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '162', '', '', '2018-12-01', '2018-12-27', '0000-00-00', 0),
(330, 1, 1, 23, 1, 185, '', 'Piece', '0.00', 200, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '121', '', '', '2018-10-29', '2018-12-27', '0000-00-00', 0),
(331, 1, 1, 23, 1, 183, '', 'Piece', '0.00', 1600, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '121', '', '', '2018-10-29', '2018-12-27', '0000-00-00', 0),
(332, 1, 1, 23, 1, 189, '', 'Piece', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '175', '', '', '2018-12-10', '2018-12-27', '0000-00-00', 0),
(333, 1, 1, 23, 1, 190, '', 'Piece', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '175', '', '', '2018-12-10', '2018-12-27', '0000-00-00', 0),
(334, 1, 1, 22, 1, 158, '', 'Nos', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '-', '', '', '2018-09-16', '2018-12-27', '0000-00-00', 0),
(335, 1, 1, 22, 1, 154, '', 'Pack', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '-', '', '', '2018-10-16', '2018-12-27', '0000-00-00', 0),
(336, 1, 1, 6, 1, 8, '600*600  K6016 Batch number : ', 'Box', '100.00', 2050, '205000.00', '18.00', '36900.00', '18450.00', '18450.00', '241900.00', '', '4418', '', '', '2018-08-06', '2018-12-27', '0000-00-00', 0),
(340, 1, 1, 6, 1, 112, 'Sphere Blanco 300X450 ', 'Box - 6', '0.00', 45, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '342', '', '', '2018-06-08', '2019-01-31', '0000-00-00', 0),
(341, 1, 1, 6, 1, 112, 'Sphere Blanco 300X450 ', 'Box - 6', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '589', '', '', '2018-09-09', '2019-01-31', '0000-00-00', 0),
(342, 1, 1, 6, 1, 112, 'Sphere Blanco 300X450 ', 'Box - 6', '0.00', 880, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4744', '', '', '2019-01-16', '2019-01-31', '0000-00-00', 0),
(343, 1, 1, 6, 1, 89, '12\" X 12\" Chicago Grey                                                                                                                                                             ', 'Box-10', '0.00', 450, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4744/2', '', '', '2019-01-16', '2019-01-31', '0000-00-00', 0),
(344, 1, 1, 6, 1, 90, '18\" X 12\" Stanley highlighter ', 'Box - 6', '0.00', 450, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4744/3', '', '', '2019-01-16', '2019-01-31', '0000-00-00', 0),
(345, 1, 1, 6, 1, 112, 'Sphere Blanco 300X450 ', 'Box - 6', '0.00', 880, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '6406/1', '', '', '2019-01-17', '2019-01-31', '0000-00-00', 0),
(347, 1, 1, 6, 1, 114, 'Chicago Gray 300X300', 'Box-10', '0.00', 450, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '6406/03', '', '', '2019-01-17', '2019-01-31', '0000-00-00', 0),
(348, 1, 1, 6, 1, 112, 'Sphere Blanco 300X450 ', 'Box - 6', '0.00', 1220, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '6682', '', '', '2019-01-28', '2019-01-31', '0000-00-00', 0),
(349, 1, 1, 10, 1, 3, '', 'BAG', '300.00', 100, '30000.00', '18.00', '5400.00', '2700.00', '2700.00', '35400.00', '', 'BPT/MG-02031', '', '', '2019-01-03', '2019-01-31', '0000-00-00', 0),
(350, 1, 1, 10, 1, 3, '', 'BAG', '300.00', 200, '60000.00', '28.00', '16800.00', '8400.00', '8400.00', '76800.00', '', 'BPT/MG-02030', '', '', '2019-01-03', '2019-01-31', '0000-00-00', 0),
(351, 1, 1, 19, 1, 106, '81\" X 38\" ', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '7/01', '', '', '2018-11-28', '2019-01-31', '0000-00-00', 0),
(352, 1, 1, 19, 1, 107, '81\" X 32\"', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '7/02', '', '', '2018-11-28', '2019-01-31', '0000-00-00', 0),
(353, 1, 1, 19, 1, 108, '81\" X 27\"', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '7/03', '', '', '2018-11-28', '2019-01-31', '0000-00-00', 0),
(354, 1, 1, 19, 1, 192, '', 'Nos', '0.00', 160, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '6/01', '', '', '2018-11-28', '2019-01-31', '0000-00-00', 0),
(355, 1, 1, 19, 1, 193, '', 'Nos', '0.00', 160, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '6/02', '', '', '2018-11-28', '2019-01-31', '0000-00-00', 0),
(356, 1, 1, 19, 1, 170, '10mmX12mm -3.25RFT', 'RFT', '0.00', 500, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '6/03', '', '', '2018-11-28', '2019-01-31', '0000-00-00', 0),
(357, 1, 1, 19, 1, 106, '81\" X 38\" ', 'Number', '0.00', 17, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '8/01', '', '', '2019-01-22', '2019-01-31', '0000-00-00', 0),
(358, 1, 1, 19, 1, 106, '81\" X 38\" ', 'Number', '0.00', 16, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '8/02', '', '', '2019-01-22', '2019-01-31', '0000-00-00', 0),
(359, 1, 1, 19, 1, 107, '81\" X 32\"', 'Number', '0.00', 32, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '9/01', '', '', '2019-01-29', '2019-01-31', '0000-00-00', 0),
(360, 1, 1, 19, 1, 108, '81\" X 27\"', 'Number', '0.00', 32, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '9/2', '', '', '2019-01-29', '2019-01-31', '0000-00-00', 0),
(361, 1, 1, 21, 1, 119, '12mm Sq Bar \r\n20X5mm Patti', 'Kg', '0.00', 4970, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'MF 16', '', '', '2018-12-31', '2019-01-31', '0000-00-00', 0),
(362, 1, 1, 21, 1, 119, '12mm Sq Bar \r\n20X5mm Patti', 'Kg', '0.00', 2400, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'MF 17', '', '', '2019-01-06', '2019-01-31', '0000-00-00', 0),
(363, 1, 1, 21, 1, 123, '', 'Kg', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'MF18', '', '', '2019-01-08', '2019-01-31', '0000-00-00', 0),
(364, 1, 1, 21, 1, 128, '', 'Ltr', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'MF 18/01', '', '', '2019-01-08', '2019-01-31', '0000-00-00', 0),
(365, 1, 1, 21, 1, 119, '12mm Sq Bar \r\n20X5mm Patti', 'Kg', '0.00', 500, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'MF 19', '', '', '2019-01-28', '2019-01-31', '0000-00-00', 0),
(366, 1, 1, 21, 1, 117, '', 'Pack', '0.00', 20, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'MF 20/01', '', '', '2019-01-31', '2019-01-31', '0000-00-00', 0),
(367, 1, 1, 21, 1, 123, '', 'Kg', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'MF 20/02', '', '', '2019-01-31', '2019-01-31', '0000-00-00', 0),
(368, 1, 1, 11, 1, 42, 'ECS-WHT-551PN-EWC WITH NORMAL CLOSING SEAT COVER ', 'Number', '0.00', 51, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003806', '', '', '2018-12-28', '2019-01-31', '0000-00-00', 0),
(369, 1, 1, 17, 1, 194, 'Timing', 'Hrs', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '5427', '', '', '2018-06-23', '2019-01-31', '0000-00-00', 0),
(370, 1, 1, 17, 1, 194, 'Timing', 'Hrs', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '5499', '', '', '2018-08-26', '2019-01-31', '0000-00-00', 0),
(371, 1, 1, 17, 1, 194, 'Timing', 'Hrs', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1443', '', '', '2018-08-16', '2019-01-31', '0000-00-00', 0),
(372, 1, 1, 17, 1, 194, 'Timing', 'Hrs', '0.00', 0, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1444', '', '', '2018-08-17', '2019-01-31', '0000-00-00', 0),
(373, 1, 1, 17, 1, 194, 'Timing', 'Hrs', '0.00', 3, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1449', '', '', '2018-08-21', '2019-01-31', '0000-00-00', 0),
(374, 1, 1, 17, 1, 194, 'Timing', 'Hrs', '0.00', 2, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1452', '', '', '2018-08-25', '2019-01-31', '0000-00-00', 0),
(375, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 6, '2945.00', '5.00', '147.25', '73.63', '73.63', '3092.25', '', '4594', '', '', '2018-12-31', '2019-01-31', '0000-00-00', 0),
(376, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 4, '1890.00', '5.00', '94.50', '47.25', '47.25', '1984.50', '', '1652', '', '', '2019-01-07', '2019-01-31', '0000-00-00', 0),
(377, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 5, '2530.00', '5.00', '126.50', '63.25', '63.25', '2656.50', '', '4079', '', '', '2019-01-07', '2019-01-31', '0000-00-00', 0),
(378, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 6, '2900.00', '5.00', '145.00', '72.50', '72.50', '3045.00', '', '4595', '', '', '2019-01-28', '2019-01-31', '0000-00-00', 0),
(379, 1, 1, 17, 1, 7, '6 inch red brick', 'Number', '9.00', 3000, '27000.00', '18.00', '4860.00', '2430.00', '2430.00', '31860.00', '', '4080', '', '', '2019-01-29', '2019-01-31', '0000-00-00', 0),
(380, 1, 1, 23, 1, 183, '', 'Box', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207/1', '', '', '2019-01-02', '2019-01-31', '0000-00-00', 0),
(381, 1, 1, 23, 1, 187, '', 'Piece', '0.00', 48, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207/2', '', '', '2019-01-02', '2019-01-31', '0000-00-00', 0),
(382, 1, 1, 23, 1, 185, '', 'Piece', '0.00', 150, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207/3', '', '', '2019-01-02', '2019-01-31', '2019-02-09', 0),
(383, 1, 1, 23, 1, 173, '', 'Piece', '0.00', 75, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207/4', '', '', '2019-01-02', '2019-01-31', '0000-00-00', 0),
(384, 1, 1, 23, 1, 182, '', 'Piece', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207', '', '', '2019-01-02', '2019-02-04', '0000-00-00', 0),
(389, 1, 1, 23, 1, 176, '', 'Piece', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207', '', '', '2019-01-02', '2019-02-06', '0000-00-00', 0),
(391, 1, 1, 23, 1, 184, '', 'Box', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207', '', '', '2019-01-02', '2019-02-06', '0000-00-00', 0),
(394, 1, 1, 23, 1, 181, '', 'Piece', '0.00', 50, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207', '', '', '2019-01-02', '2019-02-09', '0000-00-00', 0),
(395, 1, 1, 23, 1, 191, '', 'Box', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '207', '', '', '2019-01-02', '2019-02-09', '0000-00-00', 0),
(396, 1, 1, 17, 1, 86, 'River Sand', 'Bags 30 kg', '100.00', 1060, '106000.00', '5.00', '5300.00', '2650.00', '2650.00', '111300.00', '', '4948', '', '', '2019-02-06', '2019-02-09', '0000-00-00', 0),
(397, 1, 1, 21, 1, 116, '', 'Kg', '0.00', 510, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '21', '', '', '2019-02-03', '2019-02-09', '0000-00-00', 0),
(398, 1, 1, 21, 1, 117, '', 'Pack', '0.00', 20, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '20', '', '', '2019-01-31', '2019-02-09', '0000-00-00', 0),
(399, 1, 1, 21, 1, 123, '', 'Kg', '0.00', 25, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '20', '', '', '2019-01-31', '2019-02-09', '0000-00-00', 0),
(400, 1, 1, 22, 1, 195, 'Single core 10 sqmm', 'RM', '79.00', 12, '948.00', '18.00', '170.64', '85.32', '85.32', '1118.64', '', '27/082018/055', '', '', '2018-08-30', '2019-02-09', '0000-00-00', 0),
(401, 1, 1, 25, 1, 108, '81\" X 27\"', 'Number', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '01/01', '', '', '2018-11-13', '2019-02-09', '0000-00-00', 0),
(402, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 117, '5833.50', '18.00', '1050.03', '525.01', '525.01', '6883.53', '', '506', '', '', '2018-12-18', '2019-02-09', '0000-00-00', 0),
(403, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 471, '56019.25', '18.00', '10083.47', '5041.73', '5041.73', '66102.71', '', '506', '', '', '2018-12-18', '2019-02-09', '0000-00-00', 0),
(404, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 673, '19520.19', '5.00', '976.01', '488.00', '488.00', '20496.20', '', '504', '', '', '2018-12-14', '2019-02-09', '0000-00-00', 0),
(405, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 730, '86824.78', '18.00', '15628.46', '7814.23', '7814.23', '102453.24', '', '504', '', '', '2018-12-14', '2019-02-09', '0000-00-00', 0),
(406, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 953, '27622.50', '5.00', '1381.13', '690.56', '690.56', '29003.63', '', '048', '', '', '2018-12-08', '2019-02-09', '0000-00-00', 0),
(407, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 67, '7957.53', '18.00', '1432.36', '716.18', '716.18', '9389.89', '', '048', '', '', '2018-12-08', '2019-02-09', '0000-00-00', 0),
(408, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 473, '56271.53', '18.00', '10128.88', '5064.44', '5064.44', '66400.41', '', '043', '', '', '2018-12-05', '2019-02-09', '0000-00-00', 0),
(409, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 21, '1050.00', '18.00', '189.00', '94.50', '94.50', '1239.00', '', '043', '', '', '2018-12-12', '2019-02-09', '0000-00-00', 0),
(410, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 959, '27796.50', '5.00', '1389.83', '694.91', '694.91', '29186.33', '', '036', '', '', '2018-11-28', '2019-02-09', '0000-00-00', 0),
(411, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 126, '6300.00', '18.00', '1134.00', '567.00', '567.00', '7434.00', '', '036', '', '', '2018-11-28', '2019-02-09', '0000-00-00', 0),
(412, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 126, '6300.00', '18.00', '1134.00', '567.00', '567.00', '7434.00', '', '036', '', '', '2018-11-28', '2019-02-09', '0000-00-00', 0),
(413, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 428, '50872.50', '18.00', '9157.05', '4578.52', '4578.52', '60029.55', '', '035', '', '', '2018-11-14', '2019-02-09', '0000-00-00', 0),
(414, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 428, '50872.50', '18.00', '9157.05', '4578.52', '4578.52', '60029.55', '', '035', '', '', '2018-11-14', '2019-02-09', '0000-00-00', 0),
(415, 1, 1, 25, 0, 197, 'Spotted white marble ', 'Sqft', '50.00', 109, '5437.50', '18.00', '978.75', '489.38', '489.38', '6416.25', '', '035', '', '', '2018-11-14', '2019-02-09', '0000-00-00', 0),
(416, 1, 1, 25, 0, 198, 'Black Granite ', 'Sqft', '119.00', 441, '52523.03', '18.00', '9454.15', '4727.07', '4727.07', '61977.18', '', '032', '', '', '2018-11-22', '2019-02-09', '0000-00-00', 0),
(417, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 369, '43955.03', '18.00', '7911.91', '3955.95', '3955.95', '51866.94', '', '032', '', '', '2018-11-18', '2019-02-09', '0000-00-00', 0),
(418, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 369, '43955.03', '18.00', '7911.91', '3955.95', '3955.95', '51866.94', '', '032', '', '', '2018-11-18', '2019-02-09', '0000-00-00', 0),
(419, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 547, '27368.50', '18.00', '4926.33', '2463.16', '2463.16', '32294.83', '', '026', '', '', '2018-11-16', '2019-02-09', '0000-00-00', 0),
(420, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 181, '9062.50', '18.00', '1631.25', '815.63', '815.63', '10693.75', '', '024', '', '', '2018-11-15', '2019-02-09', '0000-00-00', 0),
(421, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 368, '10657.50', '5.00', '532.88', '266.44', '266.44', '11190.38', '', '022', '', '', '2018-11-13', '2019-02-09', '0000-00-00', 0),
(422, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 483, '24125.00', '18.00', '4342.50', '2171.25', '2171.25', '28467.50', '', '022', '', '', '2018-11-13', '2019-02-09', '0000-00-00', 0),
(423, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 295, '8560.80', '18.00', '1540.94', '770.47', '770.47', '10101.74', '', '022', '', '', '2018-11-13', '2019-02-09', '0000-00-00', 0),
(424, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 11, '1338.75', '18.00', '240.97', '120.49', '120.49', '1579.72', '', '169', '', '', '2018-05-04', '2019-02-09', '0000-00-00', 0),
(425, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 8, '423.00', '5.00', '21.15', '10.58', '10.58', '444.15', '', '169', '', '', '2018-05-04', '2019-02-09', '0000-00-00', 0),
(426, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 340, '17000.00', '18.00', '3060.00', '1530.00', '1530.00', '20060.00', '', '169', '', '', '2018-05-11', '2019-02-09', '0000-00-00', 0),
(427, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 10, '1204.28', '18.00', '216.77', '108.39', '108.39', '1421.05', '', '173', '', '', '2018-05-11', '2019-02-09', '0000-00-00', 0),
(428, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 32, '928.00', '5.00', '46.40', '23.20', '23.20', '974.40', '', '512', '', '', '2018-04-07', '2019-02-09', '0000-00-00', 0),
(429, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 31, '3629.50', '18.00', '653.31', '326.65', '326.65', '4282.81', '', '512', '', '', '2018-04-07', '2019-02-09', '0000-00-00', 0),
(430, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 36, '1778.50', '18.00', '320.13', '160.06', '160.06', '2098.63', '', '512', '', '', '2018-04-07', '2019-02-09', '0000-00-00', 0),
(431, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 340, '17000.00', '18.00', '3060.00', '1530.00', '1530.00', '20060.00', '', '511', '', '', '2018-07-04', '2019-02-09', '0000-00-00', 0),
(432, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 420, '49980.00', '18.00', '8996.40', '4498.20', '4498.20', '58976.40', '', '519', '', '', '2018-07-11', '2019-02-09', '0000-00-00', 0),
(433, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 890, '25806.23', '5.00', '1290.31', '645.16', '645.16', '27096.54', '', '520', '', '', '2018-07-13', '2019-02-09', '0000-00-00', 0),
(434, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 276, '13804.00', '18.00', '2484.72', '1242.36', '1242.36', '16288.72', '', '526', '', '', '2018-07-17', '2019-02-09', '0000-00-00', 0),
(435, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 303, '36057.00', '18.00', '6490.26', '3245.13', '3245.13', '42547.26', '', '526', '', '', '2018-07-17', '2019-02-09', '0000-00-00', 0),
(436, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 874, '25341.65', '5.00', '1267.08', '633.54', '633.54', '26608.73', '', '534', '', '', '2018-07-21', '2019-02-09', '0000-00-00', 0),
(437, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 368, '43792.00', '18.00', '7882.56', '3941.28', '3941.28', '51674.56', '', '542', '', '', '2018-07-27', '2019-02-09', '0000-00-00', 0),
(438, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 687, '34362.50', '18.00', '6185.25', '3092.63', '3092.63', '40547.75', '', '542', '', '', '2018-07-29', '2019-02-09', '0000-00-00', 0),
(439, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 197, '23443.00', '18.00', '4219.74', '2109.87', '2109.87', '27662.74', '', '550', '', '', '2018-08-08', '2019-02-09', '0000-00-00', 0),
(440, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 200, '5806.38', '5.00', '290.32', '145.16', '145.16', '6096.70', '', '550', '', '', '2018-08-08', '2019-02-09', '0000-00-00', 0),
(441, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 79, '9392.67', '18.00', '1690.68', '845.34', '845.34', '11083.35', '', '550', '', '', '2018-08-08', '2019-02-09', '0000-00-00', 0),
(442, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 244, '7069.62', '5.00', '353.48', '176.74', '176.74', '7423.10', '', '645', '', '', '2018-09-09', '2019-02-09', '0000-00-00', 0),
(443, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 43, '5156.27', '18.00', '928.13', '464.06', '464.06', '6084.40', '', '645', '', '', '2018-09-09', '2019-02-09', '0000-00-00', 0),
(444, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 150, '4346.23', '5.00', '217.31', '108.66', '108.66', '4563.54', '', '762', '', '', '2018-09-24', '2019-02-09', '0000-00-00', 0),
(445, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 1086, '31491.97', '5.00', '1574.60', '787.30', '787.30', '33066.57', '', '769', '', '', '2018-09-28', '2019-02-09', '0000-00-00', 0),
(446, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 1335, '158913.79', '18.00', '28604.48', '14302.24', '14302.24', '187518.27', '', '772', '', '', '2018-09-30', '2019-02-09', '0000-00-00', 0),
(447, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 140, '4052.75', '5.00', '202.64', '101.32', '101.32', '4255.39', '', '772', '', '', '2018-09-30', '2019-02-09', '0000-00-00', 0),
(448, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 1029, '29841.00', '5.00', '1492.05', '746.02', '746.02', '31333.05', '', '779', '', '', '2018-10-06', '2019-02-09', '0000-00-00', 0),
(449, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 261, '30999.50', '18.00', '5579.91', '2789.95', '2789.95', '36579.41', '', '779', '', '', '2018-10-06', '2019-02-09', '0000-00-00', 0),
(450, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 239, '11962.50', '18.00', '2153.25', '1076.63', '1076.63', '14115.75', '', '779', '', '', '2018-10-06', '2019-02-09', '0000-00-00', 0),
(451, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 953, '113453.41', '18.00', '20421.61', '10210.81', '10210.81', '133875.02', '', '792', '', '', '2018-10-14', '2019-02-09', '0000-00-00', 0),
(452, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 76, '3787.50', '18.00', '681.75', '340.88', '340.88', '4469.25', '', '792', '', '', '2018-10-14', '2019-02-09', '0000-00-00', 0),
(453, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 120, '14280.00', '18.00', '2570.40', '1285.20', '1285.20', '16850.40', '', '797', '', '', '2018-10-17', '2019-02-09', '0000-00-00', 0),
(454, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 495, '24750.00', '18.00', '4455.00', '2227.50', '2227.50', '29205.00', '', '797', '', '', '2018-10-17', '2019-02-09', '0000-00-00', 0),
(455, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 357, '10351.26', '5.00', '517.56', '258.78', '258.78', '10868.82', '', '002', '', '', '2018-10-27', '2019-02-09', '0000-00-00', 0),
(456, 1, 1, 25, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 424, '21175.00', '18.00', '3811.50', '1905.75', '1905.75', '24986.50', '', '011', '', '', '2018-11-01', '2019-02-09', '0000-00-00', 0),
(457, 1, 1, 25, 1, 198, 'Black Granite ', 'Sqft', '119.00', 72, '8552.53', '18.00', '1539.46', '769.73', '769.73', '10091.99', '', '011', '', '', '2018-11-01', '2019-02-09', '0000-00-00', 0),
(458, 1, 1, 25, 1, 196, 'Various Sizes', 'Sqft', '29.00', 1688, '48937.50', '5.00', '2446.88', '1223.44', '1223.44', '51384.38', '', '018', '', '', '2018-11-05', '2019-02-09', '0000-00-00', 0),
(459, 1, 1, 29, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 438, '21875.00', '18.00', '3937.50', '1968.75', '1968.75', '25812.50', '', 'DGM/022', '', '', '2019-01-12', '2019-02-09', '0000-00-00', 0),
(460, 1, 1, 29, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 681, '34031.00', '18.00', '6125.58', '3062.79', '3062.79', '40156.58', '', 'DGM/025', '', '', '2019-01-22', '2019-02-09', '0000-00-00', 0),
(461, 1, 1, 5, 1, 2, '', 'BAG', '350.00', 40, '14000.00', '28.00', '3920.00', '1960.00', '1960.00', '17920.00', '', 'A-1', '', '', '2019-01-28', '2019-02-09', '0000-00-00', 0),
(462, 1, 1, 5, 1, 2, '', 'BAG', '350.00', 140, '49000.00', '28.00', '13720.00', '6860.00', '6860.00', '62720.00', '', 'A-2', '', '', '2019-01-31', '2019-02-09', '0000-00-00', 0),
(463, 1, 1, 24, 1, 199, '40 mm', 'Nos', '20.00', 2, '40.00', '0.00', '0.00', '0.00', '0.00', '40.00', '', '0001', '', '', '2018-08-28', '2019-02-17', '0000-00-00', 0),
(464, 1, 1, 24, 1, 200, 'metal', 'Nos', '110.00', 1, '110.00', '0.00', '0.00', '0.00', '0.00', '110.00', '', '0001', '', '', '2018-08-28', '2019-02-17', '0000-00-00', 0),
(465, 1, 1, 24, 1, 201, 'pvc pipe cutting\r\n', 'Nos', '10.00', 2, '20.00', '0.00', '0.00', '0.00', '0.00', '20.00', '', '0001', '', '', '2018-08-28', '2019-02-17', '0000-00-00', 0),
(466, 1, 1, 24, 1, 203, 'For electic cable Joint', 'Nos', '10.00', 2, '20.00', '0.00', '0.00', '0.00', '0.00', '20.00', '', '0001', '', '', '2018-08-28', '2019-02-17', '0000-00-00', 0),
(467, 1, 1, 24, 0, 202, 'joint filling', 'Kg', '35.00', 2, '70.00', '0.00', '0.00', '0.00', '0.00', '70.00', '', '0001', '', '', '2018-08-28', '2019-02-17', '0000-00-00', 0),
(468, 1, 1, 24, 1, 204, 'water Proofing', 'Kg', '312.00', 5, '1560.00', '0.00', '0.00', '0.00', '0.00', '1560.00', '', '0002', '', '', '2018-08-17', '2019-02-17', '0000-00-00', 0),
(469, 1, 1, 24, 1, 124, 'For Staff ', 'pair', '970.00', 2, '1940.00', '0.00', '0.00', '0.00', '0.00', '1940.00', '', '0003', '', '', '2018-08-18', '2019-02-17', '0000-00-00', 0),
(470, 1, 1, 24, 1, 205, 'for water ', 'Bundle - 12', '800.00', 2, '1600.00', '0.00', '0.00', '0.00', '0.00', '1600.00', '', '0004', '', '', '2018-08-21', '2019-02-17', '0000-00-00', 0),
(471, 1, 1, 24, 1, 206, 'metal', 'Nos', '40.00', 1, '40.00', '0.00', '0.00', '0.00', '0.00', '40.00', '', '0004', '', '', '2018-08-21', '2019-02-17', '0000-00-00', 0),
(472, 1, 1, 24, 1, 144, '', 'Nos', '10.00', 4, '40.00', '0.00', '0.00', '0.00', '0.00', '40.00', '', '0005', '', '', '2018-08-25', '2019-02-17', '0000-00-00', 0),
(473, 1, 1, 24, 1, 208, 'fir lift nut-bolt', 'Kg', '100.00', 1, '100.00', '0.00', '0.00', '0.00', '0.00', '100.00', '', '0006', '', '', '2018-08-25', '2019-02-17', '0000-00-00', 0),
(474, 1, 1, 24, 1, 60, '1\" Patti Orange Colour ', 'Nos', '60.00', 2, '120.00', '0.00', '0.00', '0.00', '0.00', '120.00', '', '0007', '', '', '2018-08-25', '2019-02-17', '0000-00-00', 0),
(475, 1, 1, 24, 1, 124, 'For Staff ', 'pair', '970.00', 3, '2910.00', '0.00', '0.00', '0.00', '0.00', '2910.00', '', '0008', '', '', '2018-08-27', '2019-02-17', '0000-00-00', 0),
(476, 1, 1, 24, 1, 209, '50 mtr for measurement', 'Nos', '500.00', 1, '500.00', '0.00', '0.00', '0.00', '0.00', '500.00', '', '0008', '', '', '2018-08-27', '2019-02-17', '0000-00-00', 0),
(477, 1, 1, 24, 1, 204, 'water Proofing', 'Kg', '312.00', 5, '1560.00', '0.00', '0.00', '0.00', '0.00', '1560.00', '', '0009', '', '', '2018-08-27', '2019-02-17', '0000-00-00', 0),
(478, 1, 1, 24, 1, 210, 'for marble door frame fixing', 'Kg', '1050.00', 2, '2100.00', '0.00', '0.00', '0.00', '0.00', '2100.00', '', '0009', '', '', '2018-08-27', '2019-02-17', '0000-00-00', 0),
(479, 1, 1, 24, 1, 60, '1\" Patti Orange Colour ', 'Nos', '60.00', 10, '600.00', '0.00', '0.00', '0.00', '0.00', '600.00', '', '0010', '', '', '2018-08-27', '2019-02-17', '0000-00-00', 0),
(480, 1, 1, 24, 1, 211, 'for connection', 'Bundle - 12', '1950.00', 1, '1950.00', '0.00', '0.00', '0.00', '0.00', '1950.00', '', '0011', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(481, 1, 1, 24, 1, 212, 'for water supply', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0012', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(482, 1, 1, 24, 1, 213, 'for water supply', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0012', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(483, 1, 1, 24, 1, 60, '1\" Patti Orange Colour ', 'Number', '60.00', 15, '900.00', '0.00', '0.00', '0.00', '0.00', '900.00', '', '0012', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(484, 1, 1, 24, 1, 61, 'yellow colour ', 'Number', '60.00', 10, '600.00', '0.00', '0.00', '0.00', '0.00', '600.00', '', '0012', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(485, 1, 1, 24, 1, 214, 'for water supply', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0012', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(486, 1, 1, 24, 1, 199, '40 mm', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0012', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(487, 1, 1, 24, 1, 215, 'for Raj torres', 'Ft.', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0012', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(488, 1, 1, 24, 1, 216, 'for eater supply', 'Ft.', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0012', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(490, 1, 1, 24, 1, 217, 'for kitch sink & granite gap filing', 'Nos', '20.00', 4, '80.00', '0.00', '0.00', '0.00', '0.00', '80.00', '', '0013', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(491, 1, 1, 24, 1, 183, '', 'Number', '1.25', 36, '45.00', '0.00', '0.00', '0.00', '0.00', '45.00', '', '0014', '', '', '2018-08-29', '2019-02-17', '0000-00-00', 0),
(492, 1, 1, 24, 1, 224, 'chemical dr fixid urp', 'Kg', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1535', '', '', '2018-09-01', '2019-02-18', '0000-00-00', 0),
(493, 1, 1, 24, 1, 117, '', 'Pack', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1561', '', '', '2018-09-05', '2019-02-18', '0000-00-00', 0),
(494, 1, 1, 24, 1, 117, '', 'Pack', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1561', '', '', '2018-09-05', '2019-02-18', '0000-00-00', 0),
(495, 1, 1, 24, 1, 117, '', 'Pack', '0.00', 6, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1561', '', '', '2018-09-05', '2019-02-18', '0000-00-00', 0),
(496, 1, 1, 24, 1, 225, 'tiger safety shoes', 'Nos', '0.00', 1, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1575', '', '', '2018-09-08', '2019-02-18', '0000-00-00', 0),
(497, 1, 1, 24, 1, 60, '1\" Patti Orange Colour ', 'Number', '0.00', 60, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1575', '', '', '2018-09-08', '2019-02-18', '0000-00-00', 0),
(498, 1, 1, 24, 1, 61, 'yellow colour ', 'Number', '0.00', 60, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '1575', '', '', '2018-09-08', '2019-02-18', '0000-00-00', 0),
(499, 1, 1, 24, 1, 211, 'for connection', 'Bundle - 12', '1950.00', 2, '3900.00', '0.00', '0.00', '0.00', '0.00', '3900.00', '', '1575', '', '', '2018-09-08', '2019-02-18', '0000-00-00', 0),
(500, 1, 0, 30, 1, 226, '', 'Nos', '1390000.00', 1, '1390000.00', '18.00', '250200.00', '125100.00', '125100.00', '1640200.00', 'NC/THANE/2018/PO-07/02', '', '', '', '2018-07-13', '2019-02-19', '0000-00-00', 0),
(501, 1, 0, 31, 1, 227, '', 'Nos', '83772.00', 1, '83772.00', '18.00', '15078.96', '7539.48', '7539.48', '98850.96', '', 'PO-08/02', '', '', '2018-08-11', '2019-02-19', '2019-02-19', 0),
(502, 1, 0, 31, 1, 56, '-', 'Number', '1675.00', 1, '1675.00', '18.00', '301.50', '150.75', '150.75', '1976.50', '', 'PO-08/02', '', '', '2018-08-11', '2019-02-19', '0000-00-00', 0),
(503, 1, 0, 32, 1, 228, 'LIFT EXTENSION', 'Kg', '48.00', 233, '11174.40', '18.00', '2011.39', '1005.70', '1005.70', '13185.79', '369310/08/18', '', '', '', '2018-08-10', '2019-02-19', '0000-00-00', 0),
(504, 1, 0, 32, 1, 229, 'LIFT EXTENSION', 'Kg', '52.00', 84, '4368.00', '18.00', '786.24', '393.12', '393.12', '5154.24', '', '3693/10/08/18', '', '', '2018-08-10', '2019-02-19', '0000-00-00', 0),
(505, 1, 0, 32, 1, 230, 'LIFT EXTENSION', 'Kg', '60.00', 192, '11520.00', '18.00', '2073.60', '1036.80', '1036.80', '13593.60', '3693/10/08/18', '', '', '', '2018-08-10', '2019-02-19', '0000-00-00', 0),
(506, 1, 0, 32, 1, 231, '', 'Nos', '480.00', 1, '480.00', '18.00', '86.40', '43.20', '43.20', '566.40', '3693/10/08/18', '', '', '', '2018-08-10', '2019-02-19', '0000-00-00', 0),
(507, 1, 0, 32, 1, 232, '', 'Nos', '180.00', 1, '180.00', '18.00', '32.40', '16.20', '16.20', '212.40', '3693/10/08/18', '', '', '', '2018-08-10', '2019-02-19', '0000-00-00', 0),
(508, 1, 0, 33, 1, 233, '', 'Box', '320.00', 45, '14400.00', '18.00', '2592.00', '1296.00', '1296.00', '16992.00', '242', '', '', '', '2018-06-08', '2019-02-19', '0000-00-00', 0),
(510, 1, 0, 33, 1, 235, 'K-6016', 'Box', '610.20', 25, '15255.00', '18.00', '2745.90', '1372.95', '1372.95', '18000.90', '435', '', '', '', '2018-08-09', '2019-02-19', '0000-00-00', 0),
(513, 1, 0, 33, 1, 234, '', 'Nos', '1200.00', 1, '1200.00', '18.00', '216.00', '108.00', '108.00', '1416.00', '', '435', '', '', '2018-08-09', '2019-02-19', '0000-00-00', 0),
(514, 1, 0, 9, 1, 237, '', 'Piece', '1457.70', 1, '1457.70', '18.00', '262.39', '131.19', '131.19', '1720.09', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(515, 1, 0, 9, 1, 238, '083 FT Reguler', 'Nos', '470.36', 1, '470.36', '18.00', '84.66', '42.33', '42.33', '555.02', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(516, 1, 0, 9, 1, 239, '083 FT K 6NEXP', 'Nos', '470.36', 1, '470.36', '18.00', '84.66', '42.33', '42.33', '555.02', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(517, 1, 0, 9, 1, 240, '347 KNSINK COCK', 'Piece', '1000.05', 1, '1000.05', '18.00', '180.01', '90.00', '90.00', '1180.06', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(518, 1, 0, 9, 0, 241, 'ALD CHP 585', 'Piece', '781.40', 1, '781.40', '18.00', '140.65', '70.33', '70.33', '922.05', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(519, 1, 0, 9, 0, 242, 'CON CHR 041 KN', 'Piece', '703.43', 1, '703.43', '18.00', '126.62', '63.31', '63.31', '830.05', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(520, 1, 0, 9, 1, 241, 'ALD CHP 585', 'Piece', '781.40', 1, '781.40', '18.00', '140.65', '70.33', '70.33', '922.05', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(521, 1, 0, 9, 1, 242, 'CON CHR 041 KN', 'Piece', '703.43', 1, '703.43', '18.00', '126.62', '63.31', '63.31', '830.05', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(522, 1, 0, 9, 0, 243, '053 KN CON CHR', 'Piece', '491.55', 1, '491.55', '18.00', '88.48', '44.24', '44.24', '580.03', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(523, 1, 0, 9, 1, 244, 'CON CHR 967 KN', 'Piece', '2669.63', 1, '2669.63', '18.00', '480.53', '240.27', '240.27', '3150.16', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(524, 1, 0, 9, 1, 245, 'SIXE 355X355X140      347 KN CON', 'Piece', '1000.05', 1, '1000.05', '18.00', '180.01', '90.00', '90.00', '1180.06', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(525, 1, 0, 9, 0, 246, '901 CHS / WH', 'Nos', '1457.70', 1, '1457.70', '18.00', '262.39', '131.19', '131.19', '1720.09', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(526, 1, 0, 9, 0, 247, '24 X24 KAJ', 'Box', '576.30', 25, '14407.50', '18.00', '2593.35', '1296.67', '1296.67', '17000.85', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(527, 1, 0, 9, 0, 248, '12X12 C GREY', 'Box', '313.58', 5, '1567.90', '18.00', '282.22', '141.11', '141.11', '1850.12', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(528, 1, 0, 9, 0, 249, '18x12 s hi', 'Box', '271.20', 12, '3254.40', '18.00', '585.79', '292.90', '292.90', '3840.19', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(529, 1, 0, 9, 1, 250, '6016 Kaj', 'Box', '576.30', 6, '3457.80', '18.00', '622.40', '311.20', '311.20', '4080.20', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(530, 1, 0, 9, 0, 251, '', 'Nos', '508.47', 1, '508.47', '18.00', '91.52', '45.76', '45.76', '599.99', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(531, 1, 0, 9, 0, 243, '053 KN CON CHR', 'Piece', '491.55', 1, '491.55', '18.00', '88.48', '44.24', '44.24', '580.03', 'AS061/18-19', '', '', '', '2018-06-11', '2019-02-20', '0000-00-00', 0),
(532, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 6, '2900.00', '0.00', '0.00', '0.00', '0.00', '2900.00', '', '4596', '', '', '2019-02-13', '2019-02-20', '0000-00-00', 0),
(533, 1, 1, 10, 1, 3, '', 'BAG', '300.00', 300, '90000.00', '0.00', '0.00', '0.00', '0.00', '90000.00', '', 'BPT/MG-02399', '', '', '2019-02-11', '2019-02-20', '0000-00-00', 0),
(534, 1, 1, 24, 1, 115, '', 'Number', '0.00', 6, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1582', '', '', '2018-09-09', '2019-02-20', '0000-00-00', 0),
(535, 1, 1, 24, 1, 252, '1.5 Screw ss', 'Box', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1582', '', '', '2018-09-09', '2019-02-20', '0000-00-00', 0),
(536, 1, 1, 24, 1, 253, '10 inch Aldrop  ss', 'Number', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1582', '', '', '2018-09-09', '2019-02-20', '0000-00-00', 0),
(537, 1, 1, 24, 1, 254, 'for lift gress', 'Kg', '0.00', 16, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1589', '', '', '2018-09-11', '2019-02-20', '0000-00-00', 0),
(538, 1, 1, 24, 1, 255, '', 'Number', '0.00', 16, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1589', '', '', '2018-09-11', '2019-02-20', '0000-00-00', 0),
(539, 1, 1, 24, 1, 256, '10>11 spanner', 'Number', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1589', '', '', '2018-09-11', '2019-02-20', '0000-00-00', 0),
(540, 1, 1, 24, 1, 257, '3 mtr  Measurement tape ', 'Number', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1589', '', '', '2018-09-11', '2019-02-20', '0000-00-00', 0),
(541, 1, 1, 24, 1, 258, '5 mtr  measurement tape', 'Number', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1589', '', '', '2018-09-11', '2019-02-20', '0000-00-00', 0),
(542, 1, 1, 24, 1, 259, 'marker', 'Number', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1589', '', '', '2018-09-11', '2019-02-20', '0000-00-00', 0),
(543, 1, 1, 24, 1, 260, 'pvc tape', 'Number', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1589', '', '', '2018-09-11', '2019-02-20', '0000-00-00', 0),
(544, 1, 1, 24, 1, 116, '', 'Number', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0015', '', '', '2018-09-19', '2019-02-20', '0000-00-00', 0),
(545, 1, 1, 24, 1, 151, '', 'BUNDLE 100M', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1620', '', '', '2018-09-18', '2019-02-21', '0000-00-00', 0),
(546, 1, 1, 24, 1, 262, '1\'\' screw ', 'Number', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1620', '', '', '2018-09-18', '2019-02-21', '0000-00-00', 0),
(547, 1, 1, 24, 1, 262, '1\'\' screw ', 'Number', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1620', '', '', '2018-09-18', '2019-02-21', '0000-00-00', 0),
(548, 1, 1, 24, 1, 266, 'rawal plug', 'Pack', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1620', '', '', '2018-09-18', '2019-02-21', '0000-00-00', 0),
(549, 1, 1, 24, 1, 263, '8 Model  board  with plat', 'Number', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1620', '', '', '2018-09-18', '2019-02-21', '0000-00-00', 0),
(550, 1, 1, 24, 1, 263, '8 Model  board  with plat', 'Number', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1620', '', '', '2018-09-18', '2019-02-21', '0000-00-00', 0),
(551, 1, 1, 24, 1, 264, '5 Amp switch', 'Number', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1620', '', '', '2018-09-18', '2019-02-21', '0000-00-00', 0),
(552, 1, 1, 24, 1, 265, '5 mm  drill bit', 'Number', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1620', '', '', '2018-09-18', '2019-02-21', '0000-00-00', 0),
(553, 1, 1, 24, 1, 267, '1 sq.mm 3 core wire ', 'RM', '0.00', 20, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1631', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(554, 1, 1, 24, 1, 268, 'ribe hooks', 'Nos', '0.00', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1631', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(555, 1, 1, 24, 1, 269, 'pawada with handle', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1631', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(556, 1, 1, 24, 1, 270, 'pvc ghamela  small', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1631', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(557, 1, 1, 24, 1, 271, 'medium', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1631', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(558, 1, 1, 24, 1, 272, 'linedori', 'bundle 25  RM', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1631', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(559, 1, 1, 24, 1, 181, '', 'Piece', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1631', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(560, 1, 1, 24, 1, 264, '5 Amp switch', 'Number', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1631', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(561, 1, 1, 24, 1, 124, 'For Staff ', 'pair', '970.00', 1, '970.00', '0.00', '0.00', '0.00', '0.00', '970.00', '', '1638', '', '', '2018-09-20', '2019-02-21', '0000-00-00', 0),
(562, 1, 1, 24, 1, 274, '4\'\' brush', 'Nos', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1638', '', '', '2018-09-21', '2019-02-21', '0000-00-00', 0),
(563, 1, 1, 24, 1, 117, '', 'Pack', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(564, 1, 1, 24, 1, 275, 'j hooks ', 'Kg', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(565, 1, 1, 24, 1, 276, '3 cbs hammer', 'Nos', '0.00', 6, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(566, 1, 1, 24, 1, 277, 'hammer  handle', 'Nos', '0.00', 11, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(567, 1, 1, 24, 1, 278, 'tacha', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(568, 1, 1, 24, 1, 279, 'Cheni', 'Nos', '0.00', 6, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(569, 1, 1, 24, 1, 260, 'pvc tape', 'Number', '0.00', 6, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(570, 1, 1, 24, 1, 280, '12\'\'  spirit level', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(571, 1, 1, 24, 1, 61, 'yellow colour ', 'Number', '0.00', 50, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(572, 1, 1, 24, 1, 60, '1\" Patti Orange Colour ', 'Number', '0.00', 32, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1643', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(573, 1, 1, 24, 1, 281, 'currig pipe', 'bundle', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1641', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(574, 1, 1, 24, 1, 282, '10 mm pvc pipe', 'bundle', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1641', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(575, 1, 1, 24, 1, 283, '1\'\' croshing patty', 'Number', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1641', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(576, 1, 1, 24, 1, 118, '', 'Nos', '0.00', 7, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1641', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(577, 1, 1, 24, 1, 284, '2.5\'\' nails', 'Kg', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1641', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0);
INSERT INTO `material_procurement` (`id`, `user_id`, `sub_user_id`, `supp_id`, `pro_id`, `mate_id`, `description`, `unit`, `rate`, `qty`, `amount`, `tax_value`, `tax_amt`, `sgst`, `cgst`, `total_amt`, `po_wo_no`, `challan`, `batch_no`, `gadi_no`, `date`, `record_date`, `update_date`, `grn`) VALUES
(578, 1, 1, 24, 1, 285, '12\'\' right angle', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1641', '', '', '2018-09-24', '2019-02-21', '0000-00-00', 0),
(579, 1, 1, 24, 1, 122, '', 'Nos', '0.00', 24, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1649', '', '', '2018-09-25', '2019-02-21', '0000-00-00', 0),
(580, 1, 1, 24, 1, 286, 'mask', 'Nos', '0.00', 20, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1649', '', '', '2018-09-25', '2019-02-21', '0000-00-00', 0),
(581, 1, 1, 24, 1, 287, '500 watt halogen', 'Nos', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1649', '', '', '2018-09-25', '2019-02-21', '0000-00-00', 0),
(582, 1, 1, 24, 1, 288, '20 > 22 fix spanners', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1649', '', '', '2018-09-25', '2019-02-21', '0000-00-00', 0),
(583, 1, 1, 24, 1, 289, 'flexible pipe', 'RM', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1653', '', '', '2018-09-26', '2019-02-21', '0000-00-00', 0),
(584, 1, 1, 24, 1, 290, '8 modul  plat', 'Nos', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1653', '', '', '2018-09-26', '2019-02-21', '0000-00-00', 0),
(585, 1, 1, 24, 1, 144, '', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1665', '', '', '2018-09-29', '2019-02-21', '0000-00-00', 0),
(586, 1, 1, 24, 1, 291, '2 pin top', 'Nos', '0.00', 20, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1665', '', '', '2018-09-29', '2019-02-21', '0000-00-00', 0),
(587, 1, 1, 24, 1, 292, 'multi plug', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1665', '', '', '2018-09-29', '2019-02-21', '0000-00-00', 0),
(588, 1, 1, 24, 1, 293, 'pvc tape', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1665', '', '', '2018-09-29', '2019-02-21', '0000-00-00', 0),
(589, 1, 1, 24, 1, 294, '1\'\' abro tape', 'Nos', '0.00', 18, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1801', '', '', '2018-10-27', '2019-02-21', '0000-00-00', 0),
(590, 1, 1, 24, 1, 295, 'weight machine', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1794', '', '', '2018-10-26', '2019-02-21', '0000-00-00', 0),
(591, 1, 1, 24, 1, 293, 'pvc tape', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1785', '', '', '2018-10-24', '2019-02-21', '0000-00-00', 0),
(592, 1, 1, 24, 1, 154, '', 'Pack', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1785', '', '', '2018-10-24', '2019-02-21', '0000-00-00', 0),
(593, 1, 1, 24, 1, 294, '1\'\' abro tape', 'Nos', '0.00', 36, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1766', '', '', '2018-10-20', '2019-02-21', '0000-00-00', 0),
(594, 1, 1, 24, 1, 284, '2.5\'\' nails', 'Nos', '0.00', 20, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '17', '', '', '2018-10-20', '2019-02-21', '0000-00-00', 0),
(595, 1, 1, 24, 1, 124, 'For Staff ', 'pair', '970.00', 1, '970.00', '0.00', '0.00', '0.00', '0.00', '970.00', '', '1762', '', '', '2018-10-19', '2019-02-21', '0000-00-00', 0),
(596, 1, 1, 24, 1, 296, '1/2 plug', 'Nos', '0.00', 6, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1762', '', '', '2018-10-19', '2019-02-21', '0000-00-00', 0),
(597, 1, 1, 24, 1, 115, '', 'Bundle - 12', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1762', '', '', '2018-10-19', '2019-02-21', '0000-00-00', 0),
(598, 1, 1, 24, 1, 297, 'combined box', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1762', '', '', '2018-10-19', '2019-02-21', '0000-00-00', 0),
(599, 1, 1, 24, 1, 274, '4\'\' brush', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1761', '', '', '2018-10-19', '2019-02-21', '0000-00-00', 0),
(600, 1, 1, 24, 1, 298, 'p.o  red', 'gm', '0.00', 100, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1761', '', '', '2018-10-19', '2019-02-21', '0000-00-00', 0),
(601, 1, 1, 24, 1, 294, '1\'\' abro tape', 'Nos', '0.00', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1755', '', '', '2018-10-17', '2019-02-21', '0000-00-00', 0),
(602, 1, 1, 24, 1, 270, 'pvc ghamela  small', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750', '', '', '2018-10-16', '2019-02-21', '0000-00-00', 0),
(603, 1, 1, 24, 1, 270, 'pvc ghamela  small', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750', '', '', '2018-10-16', '2019-02-21', '0000-00-00', 0),
(604, 1, 1, 24, 1, 211, 'for connection', 'bundle', '1950.00', 2, '3900.00', '0.00', '0.00', '0.00', '0.00', '3900.00', '', '', '', '', '2018-10-16', '2019-02-21', '0000-00-00', 0),
(605, 1, 1, 24, 1, 264, '5 Amp switch', 'Number', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750ss', '', '', '2018-10-16', '2019-02-21', '0000-00-00', 0),
(606, 1, 1, 24, 1, 264, '5 Amp switch', 'Number', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750', '', '', '2018-10-16', '2019-02-21', '0000-00-00', 0),
(607, 1, 1, 24, 1, 270, 'pvc ghamela  small', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750', '', '', '2018-10-19', '2019-02-21', '0000-00-00', 0),
(608, 1, 1, 24, 1, 293, 'pvc tape', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750', '', '', '2018-10-19', '2019-02-21', '0000-00-00', 0),
(609, 1, 1, 24, 1, 299, 'peroom', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750', '', '', '2018-10-16', '2019-02-21', '0000-00-00', 0),
(610, 1, 1, 24, 1, 300, 'patra', 'Nos', '0.00', 24, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750', '', '', '2018-10-16', '2019-02-21', '0000-00-00', 0),
(611, 1, 1, 24, 1, 301, '8 > 10 pvc board', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1750', '', '', '2018-10-16', '2019-02-21', '0000-00-00', 0),
(612, 1, 1, 24, 1, 302, 'Aluminium  bottom patti 12 feet', 'Nos', '0.00', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1751', '', '', '2018-10-16', '2019-02-22', '0000-00-00', 0),
(613, 1, 1, 24, 0, 303, 'solution', 'ml', '0.00', 30, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1741', '', '', '2018-10-14', '2019-02-22', '0000-00-00', 0),
(614, 1, 1, 24, 1, 304, '1/2 bush pvc fitting', 'Nos', '0.00', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1741', '', '', '2018-10-14', '2019-02-22', '0000-00-00', 0),
(615, 1, 1, 24, 1, 144, '', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1741', '', '', '2018-10-14', '2019-02-22', '0000-00-00', 0),
(616, 1, 1, 24, 1, 60, '1\" Patti Orange Colour ', 'Number', '0.00', 25, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1739', '', '', '2018-10-14', '2019-02-22', '0000-00-00', 0),
(617, 1, 1, 24, 1, 61, 'yellow colour ', 'Number', '0.00', 25, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1739', '', '', '2018-10-14', '2019-02-22', '0000-00-00', 0),
(618, 1, 1, 24, 1, 303, 'solution', 'ml', '0.00', 125, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1739', '', '', '2018-10-14', '2019-02-22', '0000-00-00', 0),
(619, 1, 1, 24, 1, 124, 'For Staff ', 'pair', '970.00', 2, '1940.00', '0.00', '0.00', '0.00', '0.00', '1940.00', '', '1739', '', '', '2018-10-14', '2019-02-22', '0000-00-00', 0),
(620, 1, 1, 24, 1, 305, 'white cement\r\n', 'Kg', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1739', '', '', '2018-10-14', '2019-02-22', '0000-00-00', 0),
(621, 1, 1, 24, 1, 306, 'lock', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1699', '', '', '2018-10-04', '2019-02-22', '0000-00-00', 0),
(622, 1, 1, 24, 1, 61, 'yellow colour ', 'Number', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1699', '', '', '2018-10-04', '2019-02-22', '0000-00-00', 0),
(625, 1, 1, 24, 1, 60, '1\" Patti Orange Colour ', 'Number', '0.00', 15, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1699', '', '', '2018-10-04', '2019-02-22', '0000-00-00', 0),
(626, 1, 1, 24, 1, 286, 'mask', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1699', '', '', '2018-10-04', '2019-02-22', '0000-00-00', 0),
(627, 1, 1, 24, 1, 307, 'aralite  per set  1 kg', 'Kg', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1699', '', '', '2018-10-04', '2019-02-22', '0000-00-00', 0),
(628, 1, 1, 24, 1, 308, '70 lug', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1948', '', '', '2018-11-30', '2019-02-22', '0000-00-00', 0),
(629, 1, 1, 24, 1, 293, 'pvc tape', 'Nos', '0.00', 33, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1948', '', '', '2018-11-30', '2019-02-22', '0000-00-00', 0),
(630, 1, 1, 24, 1, 255, 'pvc wire clamp', 'Number', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1948', '', '', '2018-11-30', '2019-02-22', '0000-00-00', 0),
(631, 1, 1, 24, 1, 288, '20 > 22 fix spanners', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1948', '', '', '2018-11-30', '2019-02-22', '0000-00-00', 0),
(632, 1, 1, 24, 1, 201, 'pvc pipe cutting\r\n', 'Nos', '10.00', 1, '10.00', '0.00', '0.00', '0.00', '0.00', '10.00', '', '1948', '', '', '2018-11-30', '2019-02-22', '0000-00-00', 0),
(633, 1, 1, 24, 1, 284, '2.5\'\' nails', 'Nos', '0.00', 20, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1948', '', '', '2018-11-30', '2019-02-22', '0000-00-00', 0),
(634, 1, 1, 24, 1, 124, 'For Staff ', 'pair', '970.00', 1, '970.00', '0.00', '0.00', '0.00', '0.00', '970.00', '', '1936', '', '', '2018-11-30', '2019-02-22', '0000-00-00', 0),
(635, 1, 1, 24, 1, 217, 'for kitch sink & granite gap filing', 'Kg', '20.00', 3, '60.00', '0.00', '0.00', '0.00', '0.00', '60.00', '', '1928', '', '', '2018-11-27', '2019-02-22', '0000-00-00', 0),
(636, 1, 1, 24, 1, 309, 'finale for {toilet cleaning}', 'bottle', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1928', '', '', '2018-11-27', '2019-02-22', '0000-00-00', 0),
(637, 1, 1, 24, 1, 310, '', 'Kg', '0.00', 25, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1928', '', '', '2018-11-27', '2019-02-22', '0000-00-00', 0),
(638, 1, 1, 24, 1, 311, 'broom', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1928', '', '', '2018-11-27', '2019-02-22', '0000-00-00', 0),
(639, 1, 1, 24, 1, 217, 'for kitch sink & granite gap filing', 'Kg', '20.00', 1, '20.00', '0.00', '0.00', '0.00', '0.00', '20.00', '', '1911', '', '', '2018-11-24', '2019-02-22', '0000-00-00', 0),
(640, 1, 1, 24, 1, 293, 'pvc tape', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1911', '', '', '2018-11-24', '2019-02-22', '0000-00-00', 0),
(641, 1, 1, 24, 1, 308, '70 lug', 'Nos', '0.00', 13, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1911', '', '', '2018-11-24', '2019-02-22', '0000-00-00', 0),
(643, 1, 1, 24, 1, 313, '12 > 14  nut bolt for  passenger lift', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1911', '', '', '2018-11-24', '2019-02-22', '0000-00-00', 0),
(644, 1, 1, 24, 1, 312, '50 lugs for main connection jointing', 'Nos', '0.00', 4, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1911', '', '', '2018-11-24', '2019-02-22', '0000-00-00', 0),
(645, 1, 1, 24, 1, 314, '17&1 nails', 'Kg', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1910', '', '', '2018-11-23', '2019-02-22', '0000-00-00', 0),
(646, 1, 1, 24, 1, 217, 'for kitch sink & granite gap filing', 'gm', '20.00', 25, '500.00', '0.00', '0.00', '0.00', '0.00', '500.00', '', '1910', '', '', '2018-11-23', '2019-02-22', '0000-00-00', 0),
(647, 1, 1, 24, 1, 217, 'for kitch sink & granite gap filing', 'Kg', '20.00', 1, '20.00', '0.00', '0.00', '0.00', '0.00', '20.00', '', '1910', '', '', '2018-11-23', '2019-02-22', '0000-00-00', 0),
(648, 1, 1, 24, 1, 315, 'black powder', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1910', '', '', '2018-11-23', '2019-02-22', '0000-00-00', 0),
(649, 1, 1, 24, 1, 316, '24 no  spannels', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1900', '', '', '2018-11-22', '2019-02-22', '0000-00-00', 0),
(650, 1, 1, 24, 1, 317, '27 no  spannels', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1900', '', '', '2018-11-22', '2019-02-22', '0000-00-00', 0),
(651, 1, 1, 24, 1, 318, 'ellenki pana', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1900', '', '', '2018-11-22', '2019-02-22', '0000-00-00', 0),
(652, 1, 1, 24, 1, 210, 'for marble door frame fixing', 'Kg', '1050.00', 5, '5250.00', '0.00', '0.00', '0.00', '0.00', '5250.00', '', '1883', '', '', '2018-11-20', '2019-02-22', '0000-00-00', 0),
(653, 1, 1, 24, 1, 254, 'for lift gress', 'Kg', '0.00', 16, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1883', '', '', '2018-11-20', '2019-02-22', '0000-00-00', 0),
(654, 1, 1, 24, 1, 217, 'for kitch sink & granite gap filing', 'gm', '20.00', 5, '100.00', '0.00', '0.00', '0.00', '0.00', '100.00', '', '1883', '', '', '2018-11-20', '2019-02-22', '0000-00-00', 0),
(655, 1, 1, 24, 1, 319, 'ellenki pana 12 mm', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1874', '', '', '2018-11-18', '2019-02-22', '0000-00-00', 0),
(656, 1, 1, 24, 1, 320, 'hammer 12 mm', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1874', '', '', '2018-11-18', '2019-02-22', '0000-00-00', 0),
(657, 1, 1, 24, 1, 321, '24 > 22 ring pana', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1874', '', '', '2018-11-18', '2019-02-22', '0000-00-00', 0),
(658, 1, 1, 24, 1, 322, '1\'\' mirror screw', 'Nos', '0.00', 72, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1874', '', '', '2018-11-18', '2019-02-22', '0000-00-00', 0),
(659, 1, 1, 24, 1, 323, 'kharrata  jadu', 'Nos', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1874', '', '', '2018-11-18', '2019-02-22', '0000-00-00', 0),
(660, 1, 1, 24, 1, 325, '15Watt', 'Number', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1868', '', '', '2018-11-17', '2019-02-23', '0000-00-00', 0),
(661, 1, 1, 24, 1, 324, '6 ampere english 3 pin plug', 'Number', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1868', '', '', '2018-11-17', '2019-02-23', '0000-00-00', 0),
(662, 1, 1, 24, 1, 326, 'brass boll wall', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1870', '', '', '2018-11-17', '2019-02-23', '0000-00-00', 0),
(663, 1, 1, 24, 1, 327, 'mix nut bolt', 'Nos', '0.00', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1870', '', '', '2018-11-17', '2019-02-23', '0000-00-00', 0),
(664, 1, 1, 24, 1, 306, 'lock', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1870', '', '', '2018-11-17', '2019-02-23', '0000-00-00', 0),
(665, 1, 1, 24, 1, 273, 'tester taparia', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1870', '', '', '2018-11-17', '2019-02-23', '0000-00-00', 0),
(666, 1, 1, 24, 1, 307, 'aralite  per set  1 kg', 'Kg', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1862', '', '', '2018-11-16', '2019-02-23', '0000-00-00', 0),
(667, 1, 1, 24, 1, 306, 'lock', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1862', '', '', '2018-11-10', '2019-02-23', '0000-00-00', 0),
(668, 1, 1, 24, 1, 184, '', 'Box', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1862', '', '', '2018-11-16', '2019-02-23', '0000-00-00', 0),
(669, 1, 1, 24, 1, 265, '5 mm  drill bit', 'Number', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1862', '', '', '2018-11-16', '2019-02-23', '0000-00-00', 0),
(670, 1, 1, 24, 1, 328, '95 lugs', 'Nos', '0.00', 4, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1952', '', '', '2018-12-02', '2019-02-23', '0000-00-00', 0),
(671, 1, 1, 24, 1, 71, '-', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1952', '', '', '2018-12-02', '2019-02-23', '0000-00-00', 0),
(672, 1, 1, 24, 1, 322, '1\'\' mirror screw', 'Nos', '0.00', 468, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1952', '', '', '2018-12-02', '2019-02-23', '0000-00-00', 0),
(673, 1, 1, 24, 1, 255, 'pvc wire clamp', 'Pack', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1952', '', '', '2018-12-02', '2019-02-23', '0000-00-00', 0),
(674, 1, 1, 24, 1, 329, 'pipe hooks  with nut bolt', 'Nos', '0.00', 6, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1985', '', '', '2018-12-02', '2019-02-23', '0000-00-00', 0),
(675, 1, 1, 24, 1, 330, '20 amp 3 pin plug', 'Nos', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1695', '', '', '2018-12-04', '2019-02-23', '0000-00-00', 0),
(676, 1, 1, 24, 1, 331, '20&22 rig or fix pana spanners', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1695', '', '', '2018-12-04', '2019-02-23', '0000-00-00', 0),
(677, 1, 1, 24, 1, 294, '1\'\' abro tape', 'Nos', '0.00', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1813', '', '', '2018-11-01', '2019-02-23', '0000-00-00', 0),
(678, 1, 1, 24, 0, 332, 'fevicol', 'gm', '0.00', 500, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1813', '', '', '2018-11-01', '2019-02-23', '0000-00-00', 0),
(679, 1, 1, 24, 1, 332, 'fevicol', 'gm', '0.00', 500, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1813', '', '', '2018-11-01', '2019-02-23', '0000-00-00', 0),
(680, 1, 1, 24, 0, 333, 'fevikwik', 'gm', '0.00', 20, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1813', '', '', '2018-11-01', '2019-02-23', '0000-00-00', 0),
(681, 1, 1, 24, 1, 284, '2.5\'\' nails', 'gm', '0.00', 500, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1813', '', '', '2018-11-01', '2019-02-23', '0000-00-00', 0),
(682, 1, 1, 24, 0, 334, '2\'\' bron  tape', 'bundle', '0.00', 4, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2070', '', '', '2018-12-25', '2019-02-23', '0000-00-00', 0),
(683, 1, 1, 24, 1, 335, '110 mm  flange bend', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2070', '', '', '2018-12-25', '2019-02-23', '0000-00-00', 0),
(684, 1, 1, 24, 1, 306, 'lock', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2057', '', '', '2018-12-21', '2019-02-23', '0000-00-00', 0),
(685, 1, 1, 24, 1, 336, 'connection pipe', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2057', '', '', '2018-12-21', '2019-02-23', '0000-00-00', 0),
(686, 1, 1, 24, 1, 337, 'plastic bibcock', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2057', '', '', '2018-12-21', '2019-02-23', '0000-00-00', 0),
(687, 1, 1, 24, 1, 336, 'connection pipe', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2041', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(688, 1, 1, 24, 1, 318, 'ellenki pana', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2041', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(689, 1, 1, 24, 1, 313, '12 > 14  nut bolt for  passenger lift', 'Nos', '0.00', 8, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2041', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(690, 1, 1, 24, 1, 338, 'clear tape', 'Nos', '0.00', 12, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2041', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(691, 1, 1, 24, 1, 339, '14 \'\' pipe spenners ', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(692, 1, 1, 24, 1, 340, 'taflon tape', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2041', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(693, 1, 1, 24, 1, 341, 'upvc solvent', 'ml', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2041', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(694, 1, 1, 24, 1, 342, 'cpvc solvent', 'ml', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2041', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(695, 1, 1, 24, 1, 306, 'lock', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2041', '', '', '2018-12-16', '2019-02-23', '0000-00-00', 0),
(696, 1, 1, 24, 1, 289, 'flexible pipe', 'bundle', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2009', '', '', '2018-12-09', '2019-02-23', '0000-00-00', 0),
(697, 1, 1, 24, 1, 343, '40 feet  1 1/2  upvc pipe', 'Ft.', '0.00', 40, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(698, 1, 1, 24, 1, 344, '1  1/2  upvc tee', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(699, 1, 1, 24, 1, 345, '1  1/2 upvc m t', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(700, 1, 1, 24, 1, 346, '  1/2  long tank  nipplea', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(701, 1, 1, 24, 1, 347, '1/2 g.i  lion', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(702, 1, 1, 24, 1, 341, 'upvc solvent', 'ml', '0.00', 250, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(703, 1, 1, 24, 1, 340, 'taflon tape', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(704, 1, 1, 24, 1, 348, '1/2 g i elbow', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(705, 1, 1, 24, 1, 349, '1/2 Brass balve', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(706, 1, 1, 24, 1, 350, '1/2  brass m.t', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(707, 1, 1, 24, 1, 342, 'cpvc solvent', 'ml', '0.00', 125, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2012', '', '', '2018-12-10', '2019-02-23', '0000-00-00', 0),
(708, 1, 1, 24, 1, 314, '17&1 nails', 'Kg', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1983', '', '', '2018-12-06', '2019-02-23', '0000-00-00', 0),
(709, 1, 1, 24, 1, 124, 'For Staff ', 'pair', '970.00', 1, '970.00', '0.00', '0.00', '0.00', '0.00', '970.00', '', '1983', '', '', '2018-12-06', '2019-02-23', '0000-00-00', 0),
(710, 1, 1, 24, 1, 265, '5 mm  drill bit', 'Nos', '0.00', 4, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(711, 1, 1, 24, 1, 322, '1\'\' mirror screw', 'Nos', '0.00', 468, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(712, 1, 1, 24, 1, 284, '2.5\'\' nails', 'Kg', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(713, 1, 1, 24, 1, 340, 'taflon tape', 'Nos', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(714, 1, 1, 24, 1, 351, '1\'\' cpvc plug', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(715, 1, 1, 24, 1, 352, '1\'\' cpvc brass  m.t', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(716, 1, 1, 24, 1, 353, '1 3/4  g.i  tee', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(717, 1, 1, 24, 1, 354, '3 bundle pipe', 'bundle', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1983', '', '', '2018-12-06', '2019-02-23', '0000-00-00', 0),
(718, 1, 1, 24, 1, 355, '1/2 nippel', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(719, 1, 1, 24, 1, 356, '', 'Number', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1977', '', '', '2018-12-05', '2019-02-23', '0000-00-00', 0),
(720, 1, 1, 24, 1, 133, '', 'BUNDLE 100M', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1964', '', '', '2018-12-03', '2019-02-23', '0000-00-00', 0),
(721, 1, 1, 24, 1, 264, '5 Amp switch', 'Number', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1964', '', '', '2018-12-03', '2019-02-23', '0000-00-00', 0),
(722, 1, 1, 24, 0, 357, '1\'\' g.i clip', 'Nos', '0.00', 24, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '1964', '', '', '2018-12-03', '2019-02-23', '0000-00-00', 0),
(723, 1, 1, 24, 1, 201, 'pvc pipe cutting\r\n', 'Nos', '10.00', 2, '20.00', '0.00', '0.00', '0.00', '0.00', '20.00', '', '2124', '', '', '2019-01-06', '2019-02-23', '0000-00-00', 0),
(724, 1, 1, 24, 1, 342, 'cpvc solvent', 'ml', '0.00', 50, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2124', '', '', '2019-01-06', '2019-02-23', '0000-00-00', 0),
(725, 1, 1, 24, 1, 220, 'for kitchen gas connection', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2124', '', '', '2019-01-06', '2019-02-23', '0000-00-00', 0),
(726, 1, 1, 24, 1, 293, 'pvc tape', 'Nos', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2124', '', '', '2019-01-06', '2019-02-23', '0000-00-00', 0),
(727, 1, 1, 24, 1, 282, '10 mm pvc pipe', 'Ft.', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2124', '', '', '2019-01-06', '2019-02-23', '0000-00-00', 0),
(728, 1, 1, 24, 1, 358, '25 sq cable jointer', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2124', '', '', '2019-01-06', '2019-02-23', '0000-00-00', 0),
(729, 1, 1, 24, 1, 307, 'aralite  per set  1 kg', 'Kg', '0.00', 7, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2149', '', '', '2019-01-11', '2019-02-23', '0000-00-00', 0),
(730, 1, 1, 24, 1, 307, 'aralite  per set  1 kg', 'Kg', '0.00', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2207', '', '', '2019-01-30', '2019-02-23', '0000-00-00', 0),
(731, 1, 1, 24, 1, 294, '1\'\' abro tape', 'Nos', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2207', '', '', '2019-01-30', '2019-02-23', '0000-00-00', 0),
(732, 1, 1, 24, 1, 254, 'for lift gress', 'Kg', '0.00', 16, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2207', '', '', '2019-01-30', '2019-02-23', '0000-00-00', 0),
(733, 1, 1, 24, 1, 306, 'lock', 'Nos', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2207', '', '', '2019-01-30', '2019-02-23', '0000-00-00', 0),
(734, 1, 1, 24, 1, 359, '22 no.  nut bolt   for passenger  lift', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2207', '', '', '2019-01-30', '2019-02-23', '0000-00-00', 0),
(735, 1, 1, 24, 1, 360, '50 sq cable jointer ', 'Nos', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2207', '', '', '2019-01-30', '2019-02-23', '0000-00-00', 0),
(736, 1, 1, 29, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 231, '11550.00', '18.00', '2079.00', '1039.50', '1039.50', '13629.00', '', 'dgm/029', '', '', '2019-02-13', '2019-02-25', '0000-00-00', 0),
(737, 1, 1, 29, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 173, '8662.50', '18.00', '1559.25', '779.63', '779.63', '10221.75', '', 'dgm/029', '', '', '2019-02-13', '2019-02-25', '0000-00-00', 0),
(738, 1, 1, 29, 1, 198, 'Black Granite ', 'Sqft', '119.00', 78, '9222.50', '18.00', '1660.05', '830.02', '830.02', '10882.55', '', 'dgm/029', '', '', '2019-02-13', '2019-02-25', '0000-00-00', 0),
(739, 1, 1, 29, 1, 198, 'Black Granite ', 'Sqft', '119.00', 45, '5355.00', '18.00', '963.90', '481.95', '481.95', '6318.90', '', 'dgm/029', '', '', '2019-02-13', '2019-02-25', '0000-00-00', 0),
(740, 1, 1, 10, 1, 2, '', 'BAG', '350.00', 100, '35000.00', '28.00', '9800.00', '4900.00', '4900.00', '44800.00', '', 'BPTG/MRP-6338', '', '', '2019-03-02', '2019-03-03', '0000-00-00', 0),
(741, 1, 1, 10, 1, 2, '', 'BAG', '350.00', 200, '70000.00', '28.00', '19600.00', '9800.00', '9800.00', '89600.00', '', 'BPTG/MRP-6436', '', '', '2019-03-02', '2019-03-03', '0000-00-00', 0),
(742, 1, 1, 10, 1, 13, 'Binani cement ltd PPC', 'BAG', '300.00', 200, '60000.00', '28.00', '16800.00', '8400.00', '8400.00', '76800.00', '', 'JOS/BCL/3026', '', '', '2018-08-19', '2019-03-03', '0000-00-00', 0),
(743, 1, 1, 10, 1, 13, 'Binani cement ltd PPC', 'BAG', '300.00', 200, '60000.00', '28.00', '16800.00', '8400.00', '8400.00', '76800.00', '', 'JOS/BCL/5145', '', '', '2018-11-05', '2019-03-03', '0000-00-00', 0),
(744, 1, 1, 10, 1, 13, 'Binani cement ltd PPC', 'BAG', '300.00', 300, '90000.00', '28.00', '25200.00', '12600.00', '12600.00', '115200.00', '', 'JOS/BCL//5144', '', '', '2018-11-06', '2019-03-03', '0000-00-00', 0),
(745, 1, 1, 6, 1, 112, 'Sphere Blanco 300X450 ', 'Box', '0.00', 700, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '4466', '', '', '2018-08-29', '2019-03-07', '0000-00-00', 0),
(746, 1, 0, 34, 1, 363, '20 ltr', 'Ltr', '166.00', 20, '3320.00', '18.00', '597.60', '298.80', '298.80', '3917.60', '033', '', '', '', '2018-09-07', '2019-03-08', '0000-00-00', 0),
(748, 1, 0, 33, 1, 236, 'Sphere Blanco', 'Box', '320.00', 15, '4800.00', '18.00', '864.00', '432.00', '432.00', '5664.00', '', '', '', '', '2018-08-09', '2019-03-08', '0000-00-00', 0),
(749, 1, 0, 33, 1, 364, '435', 'Nos', '1500.00', 1, '1500.00', '18.00', '270.00', '135.00', '135.00', '1770.00', '', '', '', '', '2018-08-09', '2019-03-08', '0000-00-00', 0),
(750, 1, 0, 35, 1, 365, '1\" X 8\" ', 'Nos', '221.00', 4, '884.00', '18.00', '159.12', '79.56', '79.56', '1043.12', '1745', '', '', '', '2018-08-10', '2019-03-11', '0000-00-00', 0),
(751, 1, 0, 35, 0, 366, 'Washer', 'Kg', '120.00', 2, '184.80', '18.00', '33.26', '16.63', '16.63', '218.06', '1745', '', '', '', '2018-08-10', '2019-03-11', '0000-00-00', 0),
(752, 1, 0, 35, 1, 367, '25mm', 'Nos', '5.00', 44, '220.00', '18.00', '39.60', '19.80', '19.80', '259.60', '1745', '', '', '', '2018-08-10', '2019-03-11', '0000-00-00', 0),
(753, 1, 0, 35, 1, 366, 'Washer', 'Kg', '120.00', 2, '184.80', '18.00', '33.26', '16.63', '16.63', '218.06', '', '', '', '', '2018-08-10', '2019-03-11', '0000-00-00', 0),
(754, 1, 0, 24, 1, 202, 'joint filling', 'Kg', '35.00', 2, '70.00', '18.00', '12.60', '6.30', '6.30', '82.60', '', '150', '', '', '2018-08-25', '2019-03-12', '0000-00-00', 0),
(755, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '4597', '', '', '2019-03-08', '2019-03-14', '0000-00-00', 0),
(756, 1, 1, 17, 1, 84, '', 'Brass', '0.00', 6, '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', '', '4598', '', '', '2019-03-10', '2019-03-14', '0000-00-00', 0),
(757, 1, 1, 24, 1, 202, 'joint filling', 'Kg', '35.00', 2, '70.00', '18.00', '12.60', '6.30', '6.30', '82.60', '', '2455', '', '', '2019-03-16', '2019-03-16', '0000-00-00', 0),
(758, 1, 1, 9, 1, 10, 'SS ', 'Number', '300.00', 50, '15000.00', '18.00', '2700.00', '1350.00', '1350.00', '17700.00', '', '3', '', '', '2018-08-08', '2019-03-16', '0000-00-00', 0),
(759, 1, 1, 34, 1, 363, '20 ltr', 'Ltr', '166.00', 100, '16600.00', '18.00', '2988.00', '1494.00', '1494.00', '19588.00', '', 'k-01', '', '', '2018-12-06', '2019-03-16', '2019-03-16', 0),
(760, 1, 1, 34, 1, 363, '20 ltr', 'Ltr', '166.00', 100, '16600.00', '18.00', '2988.00', '1494.00', '1494.00', '19588.00', '', 'k-02', '', '', '2019-02-20', '2019-03-16', '0000-00-00', 0),
(761, 1, 1, 34, 1, 363, '20 ltr', 'Ltr', '166.00', 100, '16600.00', '18.00', '2988.00', '1494.00', '1494.00', '19588.00', '', 'k-03', '', '', '2019-01-22', '2019-03-16', '0000-00-00', 0),
(762, 1, 1, 23, 1, 188, '', 'pair', '0.00', 70, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(763, 1, 1, 23, 1, 189, '', 'Piece', '0.00', 70, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '44', '', '', '2019-03-19', '2019-03-25', '2019-03-25', 0),
(764, 1, 1, 23, 1, 178, '', 'Piece', '0.00', 100, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(765, 1, 1, 23, 1, 190, '', 'Piece', '0.00', 70, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(766, 1, 1, 23, 1, 179, '', 'Piece', '0.00', 130, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(767, 1, 1, 23, 1, 182, '', 'Piece', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(768, 1, 0, 9, 1, 368, '20X17', 'Piece', '1228.88', 51, '62672.88', '18.00', '11281.12', '5640.56', '5640.56', '73954.00', 'AS203', '', '', '', '2018-08-10', '2019-03-25', '0000-00-00', 0),
(769, 1, 0, 9, 1, 369, 'B+H  1.43', 'Piece', '380.00', 2, '760.00', '18.00', '136.80', '68.40', '68.40', '896.80', 'AS203', '', '', '', '2018-08-10', '2019-03-25', '0000-00-00', 0),
(770, 1, 1, 23, 1, 181, '', 'Piece', '0.00', 116, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(771, 1, 1, 23, 1, 176, '', 'Piece', '0.00', 10, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(772, 1, 1, 23, 1, 183, '', 'Box', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(773, 1, 1, 23, 1, 184, '', 'Box', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(774, 1, 1, 23, 1, 186, '', 'Box', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(775, 1, 1, 23, 1, 172, 'In one Box 400 Nos ', 'Box', '0.00', 5, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '443', '', '', '2019-03-19', '2019-03-25', '0000-00-00', 0),
(776, 1, 1, 11, 1, 39, 'SQT-ESS-514KN-CONCEALED STOP COCK  WITH SLIDING FLANGE ', 'Number', '0.00', 14, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', 'JC003979', '', '', '2019-03-27', '2019-03-27', '0000-00-00', 0),
(777, 1, 1, 23, 1, 180, '', 'Piece', '0.00', 300, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '445', '', '', '2019-03-20', '2019-03-27', '0000-00-00', 0),
(778, 1, 1, 21, 1, 116, '', 'Kg', '0.00', 1880, '0.00', '18.00', '0.00', '0.00', '0.00', '0.00', '', '22', '', '', '2019-03-30', '2019-04-05', '0000-00-00', 0),
(779, 1, 1, 24, 1, 340, 'taflon tape', 'Nos', '0.00', 5, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2501', '', '', '2019-04-02', '2019-04-05', '0000-00-00', 0),
(780, 1, 1, 24, 1, 348, '1/2 g i elbow', 'Nos', '0.00', 11, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2501', '', '', '2019-04-02', '2019-04-18', '0000-00-00', 0),
(781, 1, 1, 24, 1, 348, '1/2 g i elbow', 'Nos', '0.00', 11, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2501', '', '', '2019-04-02', '2019-04-18', '0000-00-00', 0),
(782, 1, 1, 29, 1, 201, 'pvc pipe cutting\r\n', 'Nos', '10.00', 4, '40.00', '0.00', '0.00', '0.00', '0.00', '40.00', '', '2501', '', '', '2019-04-02', '2019-04-18', '0000-00-00', 0),
(783, 1, 1, 29, 1, 341, 'upvc solvent', 'ml', '0.00', 100, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2501', '', '', '2019-04-02', '2019-04-18', '0000-00-00', 0),
(784, 1, 1, 29, 1, 341, 'upvc solvent', 'ml', '0.00', 100, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2501', '', '', '2019-04-02', '2019-04-18', '0000-00-00', 0),
(785, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 5, '2700.00', '0.00', '0.00', '0.00', '0.00', '2700.00', '', '5005', '', '', '2019-03-29', '2019-04-18', '0000-00-00', 0),
(786, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 5, '2700.00', '0.00', '0.00', '0.00', '0.00', '2700.00', '', '5004', '', '', '2019-03-27', '2019-04-18', '0000-00-00', 0),
(787, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 5, '2700.00', '0.00', '0.00', '0.00', '0.00', '2700.00', '', '5004', '', '', '2019-03-27', '2019-04-18', '0000-00-00', 0),
(788, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 6, '2900.00', '0.00', '0.00', '0.00', '0.00', '2900.00', '', '5007', '', '', '2019-04-03', '2019-04-18', '0000-00-00', 0),
(789, 1, 1, 17, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 6, '2750.00', '0.00', '0.00', '0.00', '0.00', '2750.00', '', '5006', '', '', '2019-04-02', '2019-04-18', '0000-00-00', 0),
(790, 1, 1, 23, 1, 177, '', 'Piece', '0.00', 240, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(791, 1, 1, 23, 1, 178, '', 'Piece', '0.00', 140, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(792, 1, 1, 23, 1, 178, '', 'Piece', '0.00', 140, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(793, 1, 1, 23, 1, 187, '', 'Piece', '0.00', 20, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(794, 1, 1, 23, 1, 188, '', 'pair', '0.00', 464, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(795, 1, 1, 23, 1, 181, '', 'Piece', '0.00', 66, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(796, 1, 1, 23, 1, 181, '', 'Piece', '0.00', 66, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(797, 1, 1, 23, 1, 115, '', 'Bundle - 12', '0.00', 312, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(798, 1, 1, 23, 1, 189, '', 'Piece', '0.00', 50, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(799, 1, 1, 23, 1, 190, '', 'Piece', '0.00', 50, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-18', '0000-00-00', 0),
(801, 1, 1, 23, 1, 371, '2\'\' Nut Bolt for doors', 'Box', '0.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-19', '0000-00-00', 0),
(802, 1, 1, 23, 1, 372, '19x4 screw', 'Box', '0.00', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '269', '', '', '2019-04-11', '2019-04-19', '0000-00-00', 0),
(803, 1, 1, 23, 1, 371, '2\'\' Nut Bolt for doors', 'Box', '0.00', 14, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '273', '', '', '2019-04-18', '2019-04-19', '0000-00-00', 0),
(804, 1, 1, 21, 1, 116, '', 'Kg', '0.00', 7870, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '23', '', '', '2019-04-16', '2019-04-19', '0000-00-00', 0),
(805, 1, 1, 21, 1, 117, '', 'Pack', '0.00', 16, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '24', '', '', '2019-04-18', '2019-04-19', '0000-00-00', 0),
(806, 1, 1, 21, 0, 373, 'cutter blade for grill', 'Piece', '0.00', 25, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '24', '', '', '2019-04-18', '2019-04-19', '0000-00-00', 0),
(807, 1, 1, 19, 1, 106, '81\" X 38\" ', 'Number', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '11', '', '', '2019-04-14', '2019-04-19', '0000-00-00', 0),
(808, 1, 1, 19, 1, 107, '81\" X 32\"', 'Number', '0.00', 10, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '11', '', '', '2019-04-14', '2019-04-19', '0000-00-00', 0),
(809, 1, 1, 10, 1, 3, '', 'BAG', '300.00', 200, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'BPTG/MRP-8391', '', '', '2019-04-19', '2019-04-19', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `material_stock`
--

CREATE TABLE `material_stock` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `bal_qty` int(11) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_stock`
--

INSERT INTO `material_stock` (`id`, `user_id`, `sub_user_id`, `pro_id`, `mate_id`, `desc`, `unit`, `rate`, `qty`, `total_qty`, `bal_qty`, `record_date`, `update_date`) VALUES
(1, 1, 0, 2, 2, '', 'BAG', '350.00', 500, 512, 12, '2018-08-28', '2019-01-28'),
(2, 1, 0, 4, 2, '', 'BAG', '550.00', 1000, 1000, 0, '2018-08-28', '0000-00-00'),
(3, 1, 0, 7, 6, 'Made in USA', 'Box - 100', '40000.00', 60, 60, 0, '2018-08-29', '2018-08-29'),
(4, 1, 0, 7, 2, '', 'BAG', '300.00', 4000, 4000, 0, '2018-08-29', '0000-00-00'),
(5, 1, 0, 8, 4, 'Anti skit tiles', '500Box', '1000.00', 300, 300, 0, '2018-08-29', '2018-08-29'),
(6, 1, 1, 1, 4, 'Anti skit tiles', '500Box', '1000.00', 45, 230, 185, '2018-09-10', '2018-10-04'),
(7, 1, 1, 1, 5, 'River Sand', 'BAG 40kg', '2000.00', 750, 751, 1, '2018-09-11', '2019-02-05'),
(8, 1, 0, 1, 6, 'Made in USA', 'Box - 100', '40000.00', 10, 12, 2, '2018-09-11', '2019-01-31'),
(9, 1, 1, 1, 3, '', 'BAG', '300.00', 25, 2800, 2775, '2018-09-11', '2019-04-19'),
(10, 1, 0, 2, 5, 'River Sand', 'BAG 40kg', '2000.00', 2, 13, 11, '2018-09-11', '2019-02-05'),
(11, 1, 1, 1, 7, '6 inch red brick', 'Number', '9.00', 1000, 8000, 7000, '2018-09-19', '2019-01-31'),
(12, 1, 1, 1, 8, '600*600  K6016 Batch number : ', 'Box', '100.00', 1720, 4825, 3105, '2018-09-26', '2018-12-27'),
(13, 1, 1, 1, 9, 'Wether coat Ext primer prolinks', 'Ltr', '25.00', 500, 500, 0, '2018-10-04', '0000-00-00'),
(14, 1, 1, 1, 11, '2mm gray 48*72', 'Number', '72.00', 450, 450, 0, '2018-10-06', '0000-00-00'),
(15, 1, 1, 1, 13, 'Binani cement ltd PPC', 'BAG', '300.00', 0, 1400, 1400, '2018-10-12', '2019-03-03'),
(16, 1, 1, 1, 14, 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'Number', '489.00', 20, 480, 480, '2018-10-17', '2018-12-24'),
(17, 1, 1, 1, 15, 'SQT-ESS-511AKN-BIB COCK WITH NOZZLE', 'Number', '437.00', 3, 66, 66, '2018-10-17', '2018-12-24'),
(18, 1, 1, 1, 16, 'SQT-ESS-507KN-PILLAR COCK ROCKET TYPE WITH AREATOR', 'Number', '434.00', 0, 14, 14, '2018-10-17', '2018-12-24'),
(19, 1, 1, 1, 17, 'AQT-CHR-3057-ANGULAR STOP COCK (REGULATING VALVE)  WIT', 'Number', '0.00', 0, 15, 15, '2018-10-17', '0000-00-00'),
(20, 1, 1, 1, 18, 'SQT- ESS- 526KN^BASIN INLET CONNECTION (ANGLE VALVE)', 'Number', '0.00', 0, 60, 60, '2018-10-17', '2018-12-24'),
(21, 1, 1, 1, 19, 'ALE-ESS-583-HAND SHOWER (HEALTHY FAUCET) (ABS BODY)', 'Number', '0.00', 2, 13, 13, '2018-10-17', '2018-12-24'),
(22, 1, 1, 1, 20, 'ALE-ESS-773AL190*125-BOTTLE TRAP WITH FULLY CASTED BODY WIT', 'Number', '0.00', 0, 2, 2, '2018-10-17', '0000-00-00'),
(23, 1, 1, 1, 21, 'ALE-ESS-544FT-WASTE COUPLING FULL THREAD 32MM', 'Number', '0.00', 0, 14, 14, '2018-10-17', '2018-12-24'),
(24, 1, 1, 1, 22, 'EXTENSION-8481 1\" CP', 'Number', '0.00', 0, 14, 14, '2018-10-17', '2018-10-17'),
(25, 1, 1, 1, 29, 'FLANGE-7307\r\n', 'Number', '0.00', 0, 16, 16, '2018-10-17', '0000-00-00'),
(26, 1, 1, 1, 23, 'ELBOW/PLUG/EXTENTION/DOUBLE NIPPLE -7412 CP ELBOW', 'Number', '0.00', 0, 2, 2, '2018-10-17', '0000-00-00'),
(27, 1, 1, 1, 25, 'JALLI-7326 -5\"*5\" sq jalli', 'Number', '0.00', 0, 6, 6, '2018-10-17', '2018-10-17'),
(28, 1, 1, 1, 26, 'METAL/PVC CONNECTOR -3917-24\" PVC CONNECTOR', 'Number', '0.00', 0, 4, 4, '2018-10-17', '2018-10-17'),
(29, 1, 1, 1, 28, 'ECS-WHT-841-CORNER BASIN SIZE 400*405*200', 'Number', '0.00', 1, 1, 1, '2018-10-17', '2018-10-20'),
(30, 1, 1, 1, 31, 'MQT-ESS-508-PILLAR COCK SUPER DELUXE WITH AREATOR', 'Number', '1.00', 0, 3, 3, '2018-10-20', '0000-00-00'),
(31, 1, 1, 1, 32, 'EOS-ESS-541N-OVERHEAD SHOWER 80MM DIA ROUND SHAPE SIN', 'Number', '0.00', 0, 15, 15, '2018-10-20', '2018-12-24'),
(32, 1, 1, 1, 33, 'ALE-ESS-536A-SHOWERR ARM 240MM LONG (LIGHT WEIGHT)', 'Number', '0.00', 0, 3, 3, '2018-10-20', '0000-00-00'),
(33, 1, 1, 1, 34, 'ECS-WHT-901-TABLE TOP BASIN SIZE 355*355*145', 'Number', '0.00', 0, 223, 223, '2018-10-20', '2018-12-27'),
(34, 1, 1, 1, 35, 'WHC-WHT-184L-WALL HUNG CISTERN WITH DRAINAGE L BEND P', 'Number', '0.00', 0, 3, 3, '2018-10-20', '0000-00-00'),
(35, 1, 1, 1, 36, 'MQT-ESS-512-LONG BODY BIB COCK WITH WALL FLANGE WITH ', 'Number', '0.00', 0, 3, 3, '2018-10-20', '0000-00-00'),
(36, 1, 1, 1, 37, 'SQT-ESS-517BKN-WALL MIXER WITH 115MM LONG BEND PIPE FOR', 'Number', '0.00', 0, 15, 15, '2018-10-20', '2018-12-24'),
(37, 1, 1, 1, 39, 'SQT-ESS-514KN-CONCEALED STOP COCK  WITH SLIDING FLANGE ', 'Number', '0.00', 0, 17, 17, '2018-10-20', '2019-03-27'),
(38, 1, 1, 1, 40, 'MQT-ESS-523-SINK COCK WITH SWINGING CASTED PSPOUT (TA)', 'Number', '0.00', 0, 13, 13, '2018-10-20', '2018-12-24'),
(39, 1, 1, 1, 41, 'MQT-ESS--511-BIB COCK SHORT BODY ', 'Number', '0.00', 0, 3, 3, '2018-10-20', '0000-00-00'),
(40, 1, 1, 1, 42, 'ECS-WHT-551PN-EWC WITH NORMAL CLOSING SEAT COVER ', 'Number', '0.00', 0, 90, 90, '2018-10-20', '2019-01-31'),
(41, 1, 1, 1, 43, 'MCC -160A  TPN', 'Number', '9455.00', 0, 2, 2, '2018-10-21', '2018-12-27'),
(42, 1, 1, 1, 44, '-', 'Number', '970.00', 0, 1, 1, '2018-10-21', '0000-00-00'),
(43, 1, 1, 1, 45, 'Sproader Links ', 'Number', '918.00', 0, 1, 1, '2018-10-21', '0000-00-00'),
(44, 1, 1, 1, 46, 'Power Terminal - 70 SQ.MM', 'Number', '19.38', 0, 8, 8, '2018-10-21', '0000-00-00'),
(45, 1, 1, 1, 47, 'Encloser - 400 X 300 X 210\r\n', 'Number', '2888.00', 0, 1, 1, '2018-10-21', '0000-00-00'),
(46, 1, 1, 1, 48, 'Power Cable - 3.5C Al ARM 70SQ.MM - 90Mtrs', 'Number', '27054.00', 0, 1, 1, '2018-10-21', '0000-00-00'),
(47, 1, 1, 1, 49, 'LUGS..- 70 SQMM RING TYPE AL. I.D  8MM', 'Number', '24.00', 0, 6, 6, '2018-10-21', '0000-00-00'),
(48, 1, 1, 1, 50, ' LUGS.. - 35SQMM RING TYPE AL I.D 8MM ', 'Number', '24.00', 0, 10, 10, '2018-10-21', '0000-00-00'),
(49, 1, 1, 1, 51, 'CABLE GLAND - BRASS S.C (1/2)\" 2 NOS\r\nBRASS S.C 1\" 2 NOS \r\n           ', 'Number', '2064.00', 0, 1, 1, '2018-10-21', '0000-00-00'),
(50, 1, 1, 1, 52, 'CHEMICAL EARTH KIT ', 'Number', '3600.00', 0, 1, 1, '2018-10-21', '0000-00-00'),
(51, 1, 1, 1, 53, 'IG StriP ( 25MM X 5MM) ', 'RM', '92.40', 0, 1, 1, '2018-10-21', '0000-00-00'),
(52, 1, 1, 1, 54, 'Installation & Commissioning', 'Number', '5250.00', 0, 5, 5, '2018-10-21', '0000-00-00'),
(53, 1, 0, 1, 56, '-', 'Number', '1675.00', 0, 1, 1, '2018-10-21', '2019-02-19'),
(54, 1, 1, 1, 63, 'Double rope full body Universal', 'Number', '0.00', 0, 10, 10, '2018-12-14', '0000-00-00'),
(55, 1, 1, 1, 64, '44+', 'Number', '0.00', 0, 100, 100, '2018-12-14', '0000-00-00'),
(56, 1, 1, 1, 65, 'capacity F/E ISI mark', 'Number', '3.00', 0, 3, 3, '2018-12-14', '0000-00-00'),
(57, 1, 1, 1, 66, 'BC stored pressure type 9kg F/E ISI mark', 'Number', '1.00', 0, 1, 1, '2018-12-14', '0000-00-00'),
(58, 1, 1, 1, 67, '20 ltr', 'Number', '0.00', 0, 3, 3, '2018-12-14', '0000-00-00'),
(59, 1, 1, 1, 68, '1*2m\r\n', 'sqft', '2.50', 0, 20005, 20005, '2018-12-14', '2018-12-14'),
(60, 1, 1, 1, 70, '72mm P', 'Roll', '0.00', 0, 23, 23, '2018-12-14', '0000-00-00'),
(61, 1, 1, 1, 57, 'PP Sheet 2mm Gray 48\'\'X72\'\'', 'Number', '72.00', 0, 450, 450, '2018-12-14', '0000-00-00'),
(62, 1, 1, 1, 58, 'One Way Tape 72mm P', 'Roll', '75.00', 0, 23, 23, '2018-12-14', '0000-00-00'),
(63, 1, 1, 1, 60, '1\" Patti Orange Colour ', 'Number', '0.00', 0, 209, 209, '2018-12-14', '2019-02-22'),
(64, 1, 1, 1, 61, 'yellow colour ', 'Number', '0.00', 0, 201, 201, '2018-12-14', '2019-02-22'),
(65, 1, 1, 1, 71, '-', 'Nos', '0.00', 0, 60, 60, '2018-12-14', '2019-02-23'),
(66, 1, 1, 1, 72, '', 'Number', '0.00', 0, 46, 46, '2018-12-14', '2018-12-14'),
(67, 1, 1, 1, 73, '-', 'Number', '0.00', 0, 11, 11, '2018-12-14', '2018-12-14'),
(68, 1, 1, 1, 74, '-', 'Number', '0.00', 0, 1, 1, '2018-12-14', '0000-00-00'),
(69, 1, 1, 1, 75, '-', 'Number', '0.00', 0, 1, 1, '2018-12-14', '0000-00-00'),
(70, 1, 1, 1, 76, '', 'Number', '0.00', 0, 1, 1, '2018-12-14', '0000-00-00'),
(71, 1, 1, 1, 77, 'with motor', 'Number', '0.00', 0, 1, 1, '2018-12-14', '0000-00-00'),
(72, 1, 1, 1, 78, '', 'Number', '0.00', 0, 6, 6, '2018-12-14', '0000-00-00'),
(73, 1, 1, 1, 79, '', 'Number', '0.00', 0, 1, 1, '2018-12-14', '0000-00-00'),
(74, 1, 1, 1, 80, 'R/m', 'RM', '0.00', 0, 80, 80, '2018-12-14', '0000-00-00'),
(75, 1, 1, 1, 81, '', 'Number', '0.00', 0, 1, 1, '2018-12-14', '0000-00-00'),
(76, 1, 1, 1, 82, '', 'Number', '0.00', 0, 1, 1, '2018-12-14', '0000-00-00'),
(77, 1, 1, 1, 83, '78\"X33\"', 'Number', '0.00', 0, 6, 6, '2018-12-14', '2018-12-14'),
(78, 1, 1, 1, 84, '', 'Brass', '0.00', 0, 102, 102, '2018-12-14', '2019-03-14'),
(79, 1, 1, 1, 85, '', 'Number', '0.00', 0, 26108, 26108, '2018-12-14', '2018-12-15'),
(80, 1, 1, 1, 86, 'River Sand', 'Bags 30 kg', '100.00', 0, 4829, 4829, '2018-12-15', '2019-02-09'),
(81, 1, 1, 1, 87, '50kg bags', 'BAG', '310.00', 0, 100, 100, '2018-12-15', '0000-00-00'),
(82, 1, 1, 1, 88, '20 X 17', 'Number', '1160.00', 0, 218, 218, '2018-12-22', '2018-12-22'),
(83, 1, 1, 1, 89, '12\" X 12\" Chicago Grey                                                                                                                                                             ', 'Box-10', '0.00', 0, 455, 455, '2018-12-22', '2019-01-31'),
(84, 1, 1, 1, 90, '18\" X 12\" Stanley highlighter ', 'Box - 6', '0.00', 0, 1027, 1027, '2018-12-22', '2019-01-31'),
(85, 1, 1, 1, 91, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(86, 1, 1, 1, 92, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(87, 1, 1, 1, 93, '', 'Number', '0.00', 0, 2, 2, '2018-12-22', '0000-00-00'),
(88, 1, 1, 1, 94, '', 'Number', '0.00', 0, 2, 2, '2018-12-22', '2018-12-22'),
(89, 1, 1, 1, 95, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(90, 1, 1, 1, 96, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(91, 1, 1, 1, 97, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(92, 1, 1, 1, 98, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(93, 1, 1, 1, 99, '', 'Number', '0.00', 0, 2, 2, '2018-12-22', '2018-12-22'),
(94, 1, 1, 1, 100, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(95, 1, 1, 1, 101, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(96, 1, 1, 1, 102, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(97, 1, 1, 1, 103, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(98, 1, 1, 1, 104, '', 'Number', '0.00', 0, 1, 1, '2018-12-22', '0000-00-00'),
(99, 1, 1, 1, 106, '81\" X 38\" ', 'Number', '0.00', 0, 123, 123, '2018-12-24', '2019-04-19'),
(100, 1, 1, 1, 107, '81\" X 32\"', 'Number', '0.00', 0, 123, 123, '2018-12-24', '2019-04-19'),
(101, 1, 1, 1, 108, '81\" X 27\"', 'Number', '0.00', 0, 114, 114, '2018-12-24', '2019-02-09'),
(102, 1, 1, 1, 109, 'SHA-CHR-477P', 'Number', '0.00', 0, 12, 12, '2018-12-24', '0000-00-00'),
(103, 1, 1, 1, 110, 'WHE-WHT-183L', 'Number', '0.00', 0, 220, 220, '2018-12-24', '2018-12-27'),
(104, 1, 1, 1, 111, '60062Z-C3', 'Number', '329.00', 0, 2, 2, '2018-12-24', '0000-00-00'),
(105, 1, 1, 1, 112, 'Sphere Blanco 300X450 ', 'Box', '0.00', 0, 3922, 3922, '2018-12-24', '2019-03-07'),
(106, 1, 1, 1, 114, 'Chicago Gray 300X300', 'Box-10', '0.00', 0, 553, 553, '2018-12-24', '2019-01-31'),
(107, 1, 1, 1, 115, '', 'Bundle - 12', '0.00', 0, 974, 974, '2018-12-24', '2019-04-18'),
(108, 1, 1, 1, 117, '', 'Pack', '0.00', 0, 253, 253, '2018-12-24', '2019-04-19'),
(109, 1, 1, 1, 118, '', 'Nos', '0.00', 0, 162, 162, '2018-12-24', '2019-02-21'),
(110, 1, 1, 1, 119, '12mm Sq Bar \r\n20X5mm Patti', 'Kg', '0.00', 0, 33295, 33295, '2018-12-24', '2019-01-31'),
(111, 1, 1, 1, 120, '4\"', 'Nos', '0.00', 0, 50, 50, '2018-12-24', '0000-00-00'),
(112, 1, 1, 1, 121, '', 'RM', '0.00', 0, 440, 440, '2018-12-24', '2018-12-24'),
(113, 1, 1, 1, 122, '', 'Nos', '0.00', 0, 36, 36, '2018-12-24', '2019-02-21'),
(114, 1, 1, 1, 124, 'For Staff ', 'pair', '970.00', 0, 23, 23, '2018-12-24', '2019-02-23'),
(115, 1, 1, 1, 125, '', 'pair', '0.00', 0, 8, 8, '2018-12-24', '2018-12-24'),
(116, 1, 1, 1, 123, '', 'Kg', '0.00', 0, 226, 226, '2018-12-24', '2019-02-09'),
(117, 1, 1, 1, 126, '', 'Kg', '0.00', 0, 176, 176, '2018-12-24', '2018-12-24'),
(118, 1, 1, 1, 127, '', 'Ltr', '0.00', 0, 140, 140, '2018-12-24', '2018-12-24'),
(119, 1, 1, 1, 128, '', 'Ltr', '0.00', 0, 70, 70, '2018-12-24', '2019-01-31'),
(120, 1, 1, 1, 129, '', 'Ltr', '0.00', 0, 160, 160, '2018-12-24', '2018-12-24'),
(121, 1, 1, 1, 130, '', 'Ltr', '0.00', 0, 1, 1, '2018-12-24', '0000-00-00'),
(122, 1, 1, 1, 131, '', 'Nos', '0.00', 0, 6, 6, '2018-12-27', '2018-12-27'),
(123, 1, 1, 1, 132, '', 'Nos', '0.00', 0, 2, 2, '2018-12-27', '2018-12-27'),
(124, 1, 1, 1, 133, '', 'BUNDLE 100M', '0.00', 0, 18, 18, '2018-12-27', '2019-02-23'),
(125, 1, 1, 1, 134, '', 'Nos', '0.00', 0, 18, 18, '2018-12-27', '2018-12-27'),
(126, 1, 1, 1, 135, '', 'Nos', '0.00', 0, 94, 94, '2018-12-27', '2018-12-27'),
(127, 1, 1, 1, 136, '', 'Nos', '0.00', 0, 51, 51, '2018-12-27', '2018-12-27'),
(128, 1, 1, 1, 137, '', 'Nos', '0.00', 0, 16, 16, '2018-12-27', '2018-12-27'),
(129, 1, 1, 1, 138, '', 'Nos', '0.00', 0, 20, 20, '2018-12-27', '2018-12-27'),
(130, 1, 1, 1, 139, '', 'Nos', '0.00', 0, 3, 3, '2018-12-27', '2018-12-27'),
(131, 1, 1, 1, 140, '', 'Nos', '0.00', 0, 2, 2, '2018-12-27', '0000-00-00'),
(132, 1, 1, 1, 141, '', 'Nos', '0.00', 0, 12, 12, '2018-12-27', '0000-00-00'),
(133, 1, 1, 1, 142, '', 'BUNDLE 100M', '0.00', 0, 2, 2, '2018-12-27', '0000-00-00'),
(134, 1, 1, 1, 143, '', 'BUNDLE 100M', '0.00', 0, 1, 1, '2018-12-27', '0000-00-00'),
(135, 1, 1, 1, 144, '', 'Nos', '0.00', 0, 20, 20, '2018-12-27', '2019-02-22'),
(136, 1, 1, 1, 145, '', 'Nos', '0.00', 0, 40, 40, '2018-12-27', '0000-00-00'),
(137, 1, 1, 1, 169, '', 'Nos', '0.00', 0, 10, 10, '2018-12-27', '0000-00-00'),
(138, 1, 1, 1, 146, '', 'Nos', '0.00', 0, 10, 10, '2018-12-27', '0000-00-00'),
(139, 1, 1, 1, 147, '', 'Nos', '0.00', 0, 10, 10, '2018-12-27', '0000-00-00'),
(140, 1, 1, 1, 148, '', 'Nos', '0.00', 0, 4, 4, '2018-12-27', '2018-12-27'),
(141, 1, 1, 1, 149, '', 'Nos', '0.00', 0, 4, 4, '2018-12-27', '2018-12-27'),
(142, 1, 1, 1, 150, '', 'Nos', '0.00', 0, 1, 1, '2018-12-27', '0000-00-00'),
(143, 1, 1, 1, 151, '', 'BUNDLE 100M', '0.00', 0, 120, 120, '2018-12-27', '2019-02-21'),
(144, 1, 1, 1, 152, '', 'BUNDLE 100M', '0.00', 0, 3, 3, '2018-12-27', '2018-12-27'),
(145, 1, 1, 1, 153, '', 'RM', '0.00', 0, 114, 114, '2018-12-27', '0000-00-00'),
(146, 1, 1, 1, 154, '', 'Pack', '0.00', 0, 16, 16, '2018-12-27', '2019-02-21'),
(147, 1, 1, 1, 155, '', 'Nos', '0.00', 0, 3, 3, '2018-12-27', '0000-00-00'),
(148, 1, 1, 1, 156, ' ', 'Nos', '0.00', 0, 4, 4, '2018-12-27', '0000-00-00'),
(149, 1, 1, 1, 157, '', 'Nos', '0.00', 0, 3, 3, '2018-12-27', '0000-00-00'),
(150, 1, 1, 1, 170, '10mmX12mm -3.25RFT', 'RFT', '0.00', 0, 705, 705, '2018-12-27', '2019-01-31'),
(151, 1, 1, 1, 171, '10mmX12mm 6.75RFT', 'RFT', '0.00', 0, 844, 844, '2018-12-27', '0000-00-00'),
(152, 1, 1, 1, 165, '', 'Nos', '0.00', 0, 50, 50, '2018-12-27', '2018-12-27'),
(153, 1, 1, 1, 158, '', 'Nos', '0.00', 0, 6, 6, '2018-12-27', '2018-12-27'),
(154, 1, 1, 1, 159, '', 'Nos', '0.00', 0, 10, 10, '2018-12-27', '0000-00-00'),
(155, 1, 1, 1, 160, '', 'Nos', '0.00', 0, 5, 5, '2018-12-27', '0000-00-00'),
(156, 1, 1, 1, 161, ' ', 'Nos', '0.00', 0, 1, 1, '2018-12-27', '0000-00-00'),
(157, 1, 1, 1, 162, '', 'Nos', '0.00', 0, 4, 4, '2018-12-27', '2018-12-27'),
(158, 1, 1, 1, 163, '', 'BUNDLE 100M', '0.00', 0, 2, 2, '2018-12-27', '2018-12-27'),
(159, 1, 1, 1, 164, '', 'Pack', '0.00', 0, 1, 1, '2018-12-27', '0000-00-00'),
(160, 1, 1, 1, 166, '', 'Nos', '0.00', 0, 10, 10, '2018-12-27', '0000-00-00'),
(161, 1, 1, 1, 167, '', 'Nos', '0.00', 0, 1, 1, '2018-12-27', '0000-00-00'),
(162, 1, 1, 1, 168, '', 'Nos', '0.00', 0, 1, 1, '2018-12-27', '0000-00-00'),
(163, 1, 1, 1, 191, '', 'Box', '0.00', 0, 2, 2, '2018-12-27', '2019-02-09'),
(164, 1, 1, 1, 172, 'In one Box 400 Nos ', 'Box', '0.00', 0, 7, 7, '2018-12-27', '2019-03-25'),
(165, 1, 1, 1, 173, '', 'Piece', '0.00', 0, 195, 195, '2018-12-27', '2019-01-31'),
(166, 1, 1, 1, 174, '', 'Piece', '0.00', 0, 240, 240, '2018-12-27', '0000-00-00'),
(167, 1, 1, 1, 175, '', 'Box', '0.00', 0, 260, 260, '2018-12-27', '0000-00-00'),
(168, 1, 1, 1, 176, '', 'Piece', '0.00', 0, 230, 230, '2018-12-27', '2019-03-25'),
(169, 1, 1, 1, 177, '', 'Piece', '0.00', 0, 480, 480, '2018-12-27', '2019-04-18'),
(170, 1, 1, 1, 178, '', 'Piece', '0.00', 0, 620, 620, '2018-12-27', '2019-04-18'),
(171, 1, 1, 1, 180, '', 'Piece', '0.00', 0, 660, 660, '2018-12-27', '2019-03-27'),
(172, 1, 1, 1, 181, '', 'Piece', '0.00', 0, 540, 540, '2018-12-27', '2019-04-18'),
(173, 1, 1, 1, 185, '', 'Piece', '0.00', 150, 650, 650, '2018-12-27', '2019-02-09'),
(174, 1, 1, 1, 186, '', 'Box', '0.00', 0, 12, 12, '2018-12-27', '2019-03-25'),
(175, 1, 1, 1, 184, '', 'Box', '0.00', 0, 10, 10, '2018-12-27', '2019-03-25'),
(176, 1, 1, 1, 183, '', 'Box', '0.00', 0, 1668, 1668, '2018-12-27', '2019-03-25'),
(177, 1, 1, 1, 179, '', 'Piece', '0.00', 0, 240, 240, '2018-12-27', '2019-03-25'),
(178, 1, 1, 1, 187, '', 'Piece', '0.00', 0, 178, 178, '2018-12-27', '2019-04-18'),
(179, 1, 1, 1, 188, '', 'pair', '0.00', 0, 644, 644, '2018-12-27', '2019-04-18'),
(180, 1, 1, 1, 189, '', 'Piece', '0.00', 70, 230, 230, '2018-12-27', '2019-04-18'),
(181, 1, 1, 1, 190, '', 'Piece', '0.00', 0, 230, 230, '2018-12-27', '2019-04-18'),
(182, 1, 1, 1, 182, '', 'Piece', '0.00', 0, 180, 180, '2018-12-27', '2019-03-25'),
(183, 1, 1, 1, 2, '', 'BAG', '350.00', 0, 492, 492, '2019-01-28', '2019-03-03'),
(184, 1, 1, 1, 192, '', 'Nos', '0.00', 0, 160, 160, '2019-01-31', '0000-00-00'),
(185, 1, 1, 1, 193, '', 'Nos', '0.00', 0, 160, 160, '2019-01-31', '0000-00-00'),
(186, 1, 1, 1, 194, 'Timing', 'Hrs', '0.00', 0, 9, 9, '2019-01-31', '2019-01-31'),
(187, 1, 1, 1, 12, '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'Brass', '500.00', 0, 54, 54, '2019-01-31', '2019-04-18'),
(188, 1, 0, 2, 3, '', 'BAG', '300.00', 0, 1, 1, '2019-02-05', '0000-00-00'),
(189, 1, 1, 0, 3, '', 'BAG', '300.00', 0, 1, 1, '2019-02-05', '0000-00-00'),
(190, 1, 1, 1, 116, '', 'Kg', '0.00', 0, 10261, 10261, '2019-02-09', '2019-04-19'),
(191, 1, 1, 1, 195, 'Single core 10 sqmm', 'RM', '79.00', 0, 12, 12, '2019-02-09', '0000-00-00'),
(192, 1, 1, 1, 197, 'Spotted white marble ', 'Sqft', '50.00', 0, 6045, 6045, '2019-02-09', '2019-02-25'),
(193, 1, 1, 1, 198, 'Black Granite ', 'Sqft', '119.00', 0, 7661, 7661, '2019-02-09', '2019-02-25'),
(194, 1, 1, 1, 196, 'Various Sizes', 'Sqft', '29.00', 0, 9938, 9938, '2019-02-09', '2019-02-09'),
(195, 1, 1, 0, 197, 'Spotted white marble ', 'Sqft', '50.00', 0, 109, 109, '2019-02-09', '0000-00-00'),
(196, 1, 1, 0, 198, 'Black Granite ', 'Sqft', '119.00', 0, 441, 441, '2019-02-09', '0000-00-00'),
(197, 1, 1, 1, 199, '40 mm', 'Nos', '0.00', 0, 4, 4, '2019-02-17', '2019-02-17'),
(198, 1, 1, 1, 200, 'metal', 'Nos', '110.00', 0, 1, 1, '2019-02-17', '0000-00-00'),
(199, 1, 1, 1, 201, 'pvc pipe cutting\r\n', 'Nos', '10.00', 0, 9, 9, '2019-02-17', '2019-04-18'),
(200, 1, 1, 1, 203, 'For electic cable Joint', 'Nos', '10.00', 0, 2, 2, '2019-02-17', '0000-00-00'),
(201, 1, 1, 0, 202, 'joint filling', 'Kg', '35.00', 0, 2, 2, '2019-02-17', '0000-00-00'),
(202, 1, 1, 1, 204, 'water Proofing', 'Kg', '312.00', 0, 10, 10, '2019-02-17', '2019-02-17'),
(203, 1, 1, 1, 205, 'for water ', 'Bundle - 12', '800.00', 0, 2, 2, '2019-02-17', '0000-00-00'),
(204, 1, 1, 1, 206, 'metal', 'Nos', '40.00', 0, 1, 1, '2019-02-17', '0000-00-00'),
(205, 1, 1, 1, 208, 'fir lift nut-bolt', 'Kg', '100.00', 0, 1, 1, '2019-02-17', '0000-00-00'),
(206, 1, 1, 1, 209, '50 mtr for measurement', 'Nos', '500.00', 0, 1, 1, '2019-02-17', '0000-00-00'),
(207, 1, 1, 1, 210, 'for marble door frame fixing', 'Kg', '1050.00', 0, 7, 7, '2019-02-17', '2019-02-22'),
(208, 1, 1, 1, 211, 'for connection', 'bundle', '1950.00', 0, 5, 5, '2019-02-17', '2019-02-21'),
(209, 1, 1, 1, 212, 'for water supply', 'Nos', '0.00', 0, 1, 1, '2019-02-17', '0000-00-00'),
(210, 1, 1, 1, 213, 'for water supply', 'Nos', '0.00', 0, 2, 2, '2019-02-17', '0000-00-00'),
(211, 1, 1, 1, 214, 'for water supply', 'Nos', '0.00', 0, 2, 2, '2019-02-17', '0000-00-00'),
(212, 1, 1, 1, 215, 'for Raj torres', 'Ft.', '0.00', 0, 2, 2, '2019-02-17', '0000-00-00'),
(213, 1, 1, 1, 216, 'for eater supply', 'Ft.', '0.00', 0, 4, 4, '2019-02-17', '2019-02-17'),
(214, 1, 1, 1, 217, 'for kitch sink & granite gap filing', 'gm', '20.00', 0, 39, 39, '2019-02-17', '2019-02-22'),
(215, 1, 1, 1, 224, 'chemical dr fixid urp', 'Kg', '0.00', 0, 5, 5, '2019-02-18', '0000-00-00'),
(216, 1, 1, 1, 225, 'tiger safety shoes', 'Nos', '0.00', 0, 1, 1, '2019-02-18', '0000-00-00'),
(217, 1, 0, 1, 226, '', 'Nos', '1390000.00', 0, 1, 1, '2019-02-19', '0000-00-00'),
(218, 1, 0, 1, 227, '', 'Nos', '83772.00', 1, 1, 1, '2019-02-19', '2019-02-19'),
(219, 1, 0, 1, 228, 'LIFT EXTENSION', 'Kg', '48.00', 0, 233, 233, '2019-02-19', '0000-00-00'),
(220, 1, 0, 1, 229, 'LIFT EXTENSION', 'Kg', '52.00', 0, 84, 84, '2019-02-19', '0000-00-00'),
(221, 1, 0, 1, 230, 'LIFT EXTENSION', 'Kg', '60.00', 0, 192, 192, '2019-02-19', '0000-00-00'),
(222, 1, 0, 1, 231, '', 'Nos', '480.00', 0, 1, 1, '2019-02-19', '0000-00-00'),
(223, 1, 0, 1, 232, '', 'Nos', '180.00', 0, 1, 1, '2019-02-19', '0000-00-00'),
(224, 1, 0, 1, 233, '', 'Box', '320.00', 0, 45, 45, '2019-02-19', '0000-00-00'),
(225, 1, 0, 1, 234, '', 'Nos', '1200.00', 1, 3, 3, '2019-02-19', '2019-02-19'),
(226, 1, 0, 1, 235, 'K-6016', 'Box', '610.20', 0, 50, 50, '2019-02-19', '2019-03-08'),
(227, 1, 0, 1, 236, 'Sphere Blanco', 'Box', '320.00', 0, 30, 30, '2019-02-19', '2019-03-08'),
(228, 1, 0, 1, 237, '', 'Piece', '1457.70', 0, 1, 1, '2019-02-20', '0000-00-00'),
(229, 1, 0, 1, 238, '083 FT Reguler', 'Nos', '470.36', 0, 1, 1, '2019-02-20', '0000-00-00'),
(230, 1, 0, 1, 239, '083 FT K 6NEXP', 'Nos', '470.36', 0, 1, 1, '2019-02-20', '0000-00-00'),
(231, 1, 0, 1, 240, '347 KNSINK COCK', 'Piece', '1000.05', 0, 1, 1, '2019-02-20', '0000-00-00'),
(232, 1, 0, 0, 241, 'ALD CHP 585', 'Piece', '781.40', 0, 1, 1, '2019-02-20', '0000-00-00'),
(233, 1, 0, 0, 242, 'CON CHR 041 KN', 'Piece', '703.43', 0, 1, 1, '2019-02-20', '0000-00-00'),
(234, 1, 0, 1, 241, 'ALD CHP 585', 'Piece', '781.40', 0, 1, 1, '2019-02-20', '0000-00-00'),
(235, 1, 0, 1, 242, 'CON CHR 041 KN', 'Piece', '703.43', 0, 1, 1, '2019-02-20', '0000-00-00'),
(236, 1, 0, 0, 243, '053 KN CON CHR', 'Piece', '491.55', 0, 2, 2, '2019-02-20', '2019-02-20'),
(237, 1, 0, 1, 244, 'CON CHR 967 KN', 'Piece', '2669.63', 0, 1, 1, '2019-02-20', '0000-00-00'),
(238, 1, 0, 1, 245, 'SIXE 355X355X140      347 KN CON', 'Piece', '1000.05', 0, 1, 1, '2019-02-20', '0000-00-00'),
(239, 1, 0, 0, 246, '901 CHS / WH', 'Nos', '1457.70', 0, 1, 1, '2019-02-20', '0000-00-00'),
(240, 1, 0, 0, 247, '24 X24 KAJ', 'Box', '576.30', 0, 25, 25, '2019-02-20', '0000-00-00'),
(241, 1, 0, 0, 248, '12X12 C GREY', 'Box', '313.58', 0, 5, 5, '2019-02-20', '0000-00-00'),
(242, 1, 0, 0, 249, '18x12 s hi', 'Box', '271.20', 0, 12, 12, '2019-02-20', '0000-00-00'),
(243, 1, 0, 1, 250, '6016 Kaj', 'Box', '576.30', 0, 6, 6, '2019-02-20', '0000-00-00'),
(244, 1, 0, 0, 251, '', 'Nos', '508.47', 0, 1, 1, '2019-02-20', '0000-00-00'),
(245, 1, 1, 1, 252, '1.5 Screw ss', 'Box', '0.00', 0, 1, 1, '2019-02-20', '0000-00-00'),
(246, 1, 1, 1, 253, '10 inch Aldrop  ss', 'Number', '0.00', 0, 2, 2, '2019-02-20', '0000-00-00'),
(247, 1, 1, 1, 254, 'for lift gress', 'Kg', '0.00', 0, 48, 48, '2019-02-20', '2019-02-23'),
(248, 1, 1, 1, 255, 'pvc wire clamp', 'Pack', '0.00', 0, 29, 29, '2019-02-20', '2019-02-23'),
(249, 1, 1, 1, 256, '10>11 spanner', 'Number', '0.00', 0, 1, 1, '2019-02-20', '0000-00-00'),
(250, 1, 1, 1, 257, '3 mtr  Measurement tape ', 'Number', '0.00', 0, 3, 3, '2019-02-20', '0000-00-00'),
(251, 1, 1, 1, 258, '5 mtr  measurement tape', 'Number', '0.00', 0, 2, 2, '2019-02-20', '0000-00-00'),
(252, 1, 1, 1, 259, 'marker', 'Number', '0.00', 0, 10, 10, '2019-02-20', '0000-00-00'),
(253, 1, 1, 1, 260, 'pvc tape', 'Number', '0.00', 0, 16, 16, '2019-02-20', '2019-02-21'),
(254, 1, 1, 1, 262, '1\'\' screw ', 'Number', '0.00', 0, 10, 10, '2019-02-21', '2019-02-21'),
(255, 1, 1, 1, 266, 'rawal plug', 'Pack', '0.00', 0, 2, 2, '2019-02-21', '0000-00-00'),
(256, 1, 1, 1, 263, '8 Model  board  with plat', 'Number', '0.00', 0, 2, 2, '2019-02-21', '2019-02-21'),
(257, 1, 1, 1, 264, '5 Amp switch', 'Number', '0.00', 0, 35, 35, '2019-02-21', '2019-02-23'),
(258, 1, 1, 1, 265, '5 mm  drill bit', 'Nos', '0.00', 0, 6, 6, '2019-02-21', '2019-02-23'),
(259, 1, 1, 1, 267, '1 sq.mm 3 core wire ', 'RM', '0.00', 0, 20, 20, '2019-02-21', '0000-00-00'),
(260, 1, 1, 1, 268, 'ribe hooks', 'Nos', '0.00', 0, 12, 12, '2019-02-21', '0000-00-00'),
(261, 1, 1, 1, 269, 'pawada with handle', 'Nos', '0.00', 0, 10, 10, '2019-02-21', '0000-00-00'),
(262, 1, 1, 1, 270, 'pvc ghamela  small', 'Nos', '0.00', 0, 20, 20, '2019-02-21', '2019-02-21'),
(263, 1, 1, 1, 271, 'medium', 'Nos', '0.00', 0, 5, 5, '2019-02-21', '0000-00-00'),
(264, 1, 1, 1, 272, 'linedori', 'bundle 25  RM', '0.00', 0, 5, 5, '2019-02-21', '0000-00-00'),
(265, 1, 1, 1, 274, '4\'\' brush', 'Nos', '0.00', 0, 4, 4, '2019-02-21', '2019-02-21'),
(266, 1, 1, 1, 275, 'j hooks ', 'Kg', '0.00', 0, 2, 2, '2019-02-21', '0000-00-00'),
(267, 1, 1, 1, 276, '3 cbs hammer', 'Nos', '0.00', 0, 6, 6, '2019-02-21', '0000-00-00'),
(268, 1, 1, 1, 277, 'hammer  handle', 'Nos', '0.00', 0, 11, 11, '2019-02-21', '0000-00-00'),
(269, 1, 1, 1, 278, 'tacha', 'Nos', '0.00', 0, 5, 5, '2019-02-21', '0000-00-00'),
(270, 1, 1, 1, 279, 'Cheni', 'Nos', '0.00', 0, 6, 6, '2019-02-21', '0000-00-00'),
(271, 1, 1, 1, 280, '12\'\'  spirit level', 'Nos', '0.00', 0, 2, 2, '2019-02-21', '0000-00-00'),
(272, 1, 1, 1, 281, 'currig pipe', 'bundle', '0.00', 0, 1, 1, '2019-02-21', '0000-00-00'),
(273, 1, 1, 1, 282, '10 mm pvc pipe', 'Ft.', '0.00', 0, 6, 6, '2019-02-21', '2019-02-23'),
(274, 1, 1, 1, 283, '1\'\' croshing patty', 'Number', '0.00', 0, 10, 10, '2019-02-21', '0000-00-00'),
(275, 1, 1, 1, 284, '2.5\'\' nails', 'Kg', '0.00', 0, 543, 543, '2019-02-21', '2019-02-23'),
(276, 1, 1, 1, 285, '12\'\' right angle', 'Nos', '0.00', 0, 1, 1, '2019-02-21', '0000-00-00'),
(277, 1, 1, 1, 286, 'mask', 'Nos', '0.00', 0, 30, 30, '2019-02-21', '2019-02-22'),
(278, 1, 1, 1, 287, '500 watt halogen', 'Nos', '0.00', 0, 3, 3, '2019-02-21', '0000-00-00'),
(279, 1, 1, 1, 288, '20 > 22 fix spanners', 'Nos', '0.00', 0, 2, 2, '2019-02-21', '2019-02-22'),
(280, 1, 1, 1, 289, 'flexible pipe', 'bundle', '0.00', 0, 2, 2, '2019-02-21', '2019-02-23'),
(281, 1, 1, 1, 290, '8 modul  plat', 'Nos', '0.00', 0, 3, 3, '2019-02-21', '0000-00-00'),
(282, 1, 1, 1, 291, '2 pin top', 'Nos', '0.00', 0, 20, 20, '2019-02-21', '0000-00-00'),
(283, 1, 1, 1, 292, 'multi plug', 'Nos', '0.00', 0, 2, 2, '2019-02-21', '0000-00-00'),
(284, 1, 1, 1, 293, 'pvc tape', 'Nos', '0.00', 0, 47, 47, '2019-02-21', '2019-02-23'),
(285, 1, 1, 1, 294, '1\'\' abro tape', 'Nos', '0.00', 0, 80, 80, '2019-02-21', '2019-02-23'),
(286, 1, 1, 1, 295, 'weight machine', 'Nos', '0.00', 0, 1, 1, '2019-02-21', '0000-00-00'),
(287, 1, 1, 1, 296, '1/2 plug', 'Nos', '0.00', 0, 6, 6, '2019-02-21', '0000-00-00'),
(288, 1, 1, 1, 297, 'combined box', 'Nos', '0.00', 0, 1, 1, '2019-02-21', '0000-00-00'),
(289, 1, 1, 1, 298, 'p.o  red', 'gm', '0.00', 0, 100, 100, '2019-02-21', '0000-00-00'),
(290, 1, 1, 1, 299, 'peroom', 'Nos', '0.00', 0, 10, 10, '2019-02-21', '0000-00-00'),
(291, 1, 1, 1, 300, 'patra', 'Nos', '0.00', 0, 24, 24, '2019-02-21', '0000-00-00'),
(292, 1, 1, 1, 301, '8 > 10 pvc board', 'Nos', '0.00', 0, 1, 1, '2019-02-21', '0000-00-00'),
(293, 1, 1, 1, 302, 'Aluminium  bottom patti 12 feet', 'Nos', '0.00', 0, 12, 12, '2019-02-22', '0000-00-00'),
(294, 1, 1, 0, 303, 'solution', 'ml', '0.00', 0, 30, 30, '2019-02-22', '0000-00-00'),
(295, 1, 1, 1, 304, '1/2 bush pvc fitting', 'Nos', '0.00', 0, 12, 12, '2019-02-22', '0000-00-00'),
(296, 1, 1, 1, 303, 'solution', 'ml', '0.00', 0, 125, 125, '2019-02-22', '0000-00-00'),
(297, 1, 1, 1, 305, 'white cement\r\n', 'Kg', '0.00', 0, 5, 5, '2019-02-22', '0000-00-00'),
(298, 1, 1, 1, 306, 'lock', 'Nos', '0.00', 0, 17, 17, '2019-02-22', '2019-02-23'),
(299, 1, 1, 1, 307, 'aralite  per set  1 kg', 'Kg', '0.00', 0, 18, 18, '2019-02-22', '2019-02-23'),
(300, 1, 1, 1, 308, '70 lug', 'Nos', '0.00', 0, 18, 18, '2019-02-22', '2019-02-22'),
(301, 1, 1, 1, 309, 'finale for {toilet cleaning}', 'bottle', '0.00', 0, 1, 1, '2019-02-22', '0000-00-00'),
(302, 1, 1, 1, 310, '', 'Kg', '0.00', 0, 25, 25, '2019-02-22', '0000-00-00'),
(303, 1, 1, 1, 311, 'broom', 'Nos', '0.00', 0, 1, 1, '2019-02-22', '0000-00-00'),
(304, 1, 1, 1, 313, '12 > 14  nut bolt for  passenger lift', 'Nos', '0.00', 0, 28, 28, '2019-02-22', '2019-02-23'),
(305, 1, 1, 1, 312, '50 lugs for main connection jointing', 'Nos', '0.00', 0, 4, 4, '2019-02-22', '0000-00-00'),
(306, 1, 1, 1, 314, '17&1 nails', 'Kg', '0.00', 0, 2, 2, '2019-02-22', '2019-02-23'),
(307, 1, 1, 1, 315, 'black powder', 'Nos', '0.00', 0, 2, 2, '2019-02-22', '0000-00-00'),
(308, 1, 1, 1, 316, '24 no  spannels', 'Nos', '0.00', 0, 1, 1, '2019-02-22', '0000-00-00'),
(309, 1, 1, 1, 317, '27 no  spannels', 'Nos', '0.00', 0, 1, 1, '2019-02-22', '0000-00-00'),
(310, 1, 1, 1, 318, 'ellenki pana', 'Nos', '0.00', 0, 3, 3, '2019-02-22', '2019-02-23'),
(311, 1, 1, 1, 319, 'ellenki pana 12 mm', 'Nos', '0.00', 0, 1, 1, '2019-02-22', '0000-00-00'),
(312, 1, 1, 1, 320, 'hammer 12 mm', 'Nos', '0.00', 0, 1, 1, '2019-02-22', '0000-00-00'),
(313, 1, 1, 1, 321, '24 > 22 ring pana', 'Nos', '0.00', 0, 1, 1, '2019-02-22', '0000-00-00'),
(314, 1, 1, 1, 322, '1\'\' mirror screw', 'Nos', '0.00', 0, 1008, 1008, '2019-02-22', '2019-02-23'),
(315, 1, 1, 1, 323, 'kharrata  jadu', 'Nos', '0.00', 0, 3, 3, '2019-02-22', '0000-00-00'),
(316, 1, 1, 1, 325, '15Watt', 'Number', '0.00', 0, 3, 3, '2019-02-23', '0000-00-00'),
(317, 1, 1, 1, 324, '6 ampere english 3 pin plug', 'Number', '0.00', 0, 2, 2, '2019-02-23', '0000-00-00'),
(318, 1, 1, 1, 326, 'brass boll wall', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(319, 1, 1, 1, 327, 'mix nut bolt', 'Nos', '0.00', 0, 12, 12, '2019-02-23', '0000-00-00'),
(320, 1, 1, 1, 273, 'tester taparia', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(321, 1, 1, 1, 328, '95 lugs', 'Nos', '0.00', 0, 4, 4, '2019-02-23', '0000-00-00'),
(322, 1, 1, 1, 329, 'pipe hooks  with nut bolt', 'Nos', '0.00', 0, 6, 6, '2019-02-23', '0000-00-00'),
(323, 1, 1, 1, 330, '20 amp 3 pin plug', 'Nos', '0.00', 0, 3, 3, '2019-02-23', '0000-00-00'),
(324, 1, 1, 1, 331, '20&22 rig or fix pana spanners', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(325, 1, 1, 0, 332, 'fevicol', 'gm', '0.00', 0, 500, 500, '2019-02-23', '0000-00-00'),
(326, 1, 1, 1, 332, 'fevicol', 'gm', '0.00', 0, 500, 500, '2019-02-23', '0000-00-00'),
(327, 1, 1, 0, 333, 'fevikwik', 'gm', '0.00', 0, 20, 20, '2019-02-23', '0000-00-00'),
(328, 1, 1, 0, 334, '2\'\' bron  tape', 'bundle', '0.00', 0, 4, 4, '2019-02-23', '0000-00-00'),
(329, 1, 1, 1, 335, '110 mm  flange bend', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(330, 1, 1, 1, 336, 'connection pipe', 'Nos', '0.00', 0, 3, 3, '2019-02-23', '2019-02-23'),
(331, 1, 1, 1, 337, 'plastic bibcock', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(332, 1, 1, 1, 338, 'clear tape', 'Nos', '0.00', 0, 12, 12, '2019-02-23', '0000-00-00'),
(333, 1, 1, 1, 339, '14 \'\' pipe spenners ', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(334, 1, 1, 1, 340, 'taflon tape', 'Nos', '0.00', 0, 15, 15, '2019-02-23', '2019-04-05'),
(335, 1, 1, 1, 341, 'upvc solvent', 'ml', '0.00', 0, 452, 452, '2019-02-23', '2019-04-18'),
(336, 1, 1, 1, 342, 'cpvc solvent', 'ml', '0.00', 0, 176, 176, '2019-02-23', '2019-02-23'),
(337, 1, 1, 1, 343, '40 feet  1 1/2  upvc pipe', 'Ft.', '0.00', 0, 40, 40, '2019-02-23', '0000-00-00'),
(338, 1, 1, 1, 344, '1  1/2  upvc tee', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(339, 1, 1, 1, 345, '1  1/2 upvc m t', 'Nos', '0.00', 0, 2, 2, '2019-02-23', '0000-00-00'),
(340, 1, 1, 1, 346, '  1/2  long tank  nipplea', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(341, 1, 1, 1, 347, '1/2 g.i  lion', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(342, 1, 1, 1, 348, '1/2 g i elbow', 'Nos', '0.00', 0, 23, 23, '2019-02-23', '2019-04-18'),
(343, 1, 1, 1, 349, '1/2 Brass balve', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(344, 1, 1, 1, 350, '1/2  brass m.t', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(345, 1, 1, 1, 351, '1\'\' cpvc plug', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(346, 1, 1, 1, 352, '1\'\' cpvc brass  m.t', 'Nos', '0.00', 0, 2, 2, '2019-02-23', '0000-00-00'),
(347, 1, 1, 1, 353, '1 3/4  g.i  tee', 'Nos', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(348, 1, 1, 1, 354, '3 bundle pipe', 'bundle', '0.00', 0, 3, 3, '2019-02-23', '0000-00-00'),
(349, 1, 1, 1, 355, '1/2 nippel', 'Nos', '0.00', 0, 2, 2, '2019-02-23', '0000-00-00'),
(350, 1, 1, 1, 356, '', 'Number', '0.00', 0, 1, 1, '2019-02-23', '0000-00-00'),
(351, 1, 1, 0, 357, '1\'\' g.i clip', 'Nos', '0.00', 0, 24, 24, '2019-02-23', '0000-00-00'),
(352, 1, 1, 1, 220, 'for kitchen gas connection', 'Nos', '0.00', 0, 2, 2, '2019-02-23', '0000-00-00'),
(353, 1, 1, 1, 358, '25 sq cable jointer', 'Nos', '0.00', 0, 10, 10, '2019-02-23', '0000-00-00'),
(354, 1, 1, 1, 359, '22 no.  nut bolt   for passenger  lift', 'Nos', '0.00', 0, 10, 10, '2019-02-23', '0000-00-00'),
(355, 1, 1, 1, 360, '50 sq cable jointer ', 'Nos', '0.00', 0, 10, 10, '2019-02-23', '0000-00-00'),
(356, 1, 1, 1, 363, '20 ltr', 'Ltr', '166.00', 100, 320, 320, '2019-03-08', '2019-03-16'),
(357, 1, 0, 1, 364, '435', 'Nos', '1500.00', 0, 1, 1, '2019-03-08', '0000-00-00'),
(358, 1, 0, 1, 365, '1\" X 8\" ', 'Nos', '221.00', 0, 4, 4, '2019-03-11', '0000-00-00'),
(359, 1, 0, 0, 366, 'Washer', 'Kg', '120.00', 0, 2, 2, '2019-03-11', '0000-00-00'),
(360, 1, 0, 1, 367, '25mm', 'Nos', '5.00', 0, 44, 44, '2019-03-11', '0000-00-00'),
(361, 1, 0, 1, 366, 'Washer', 'Kg', '120.00', 0, 2, 2, '2019-03-11', '0000-00-00'),
(362, 1, 1, 1, 202, 'joint filling', 'Kg', '35.00', 0, 4, 4, '2019-03-12', '2019-03-16'),
(363, 1, 1, 1, 10, 'SS ', 'Number', '300.00', 0, 50, 50, '2019-03-16', '0000-00-00'),
(364, 1, 0, 1, 368, '20X17', 'Piece', '1228.88', 0, 51, 51, '2019-03-25', '0000-00-00'),
(365, 1, 0, 1, 369, 'B+H  1.43', 'Piece', '380.00', 0, 2, 2, '2019-03-25', '0000-00-00'),
(366, 1, 1, 1, 371, '2\'\' Nut Bolt for doors', 'Box', '0.00', 0, 16, 16, '2019-04-19', '2019-04-19'),
(367, 1, 1, 1, 372, '19x4 screw', 'Box', '0.00', 0, 2, 2, '2019-04-19', '0000-00-00'),
(368, 1, 1, 0, 373, 'cutter blade for grill', 'Piece', '0.00', 0, 25, 25, '2019-04-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mode`
--

INSERT INTO `mode` (`id`, `user_id`, `mode`) VALUES
(11, 2, 'Cash'),
(12, 3, 'NEFT'),
(13, 1, 'Cash'),
(14, 1, 'Indusind Bank NEFT'),
(15, 1, 'Indusind Bank RTGS'),
(16, 1, 'Indusind Bank Cheque'),
(17, 1, 'ICICI Bank NEFT'),
(18, 1, 'ICICI Bank RTGS'),
(19, 1, 'ICICI Bank Cheque'),
(20, 1, 'HDFC Bank NEFT'),
(21, 1, 'HDFC Bank RTGS'),
(22, 1, 'HDFC Bank Cheque'),
(23, 1, 'HDFC Bank IMPS'),
(24, 1, 'ICICI Bank IMPS'),
(25, 1, 'Indusind Bank IMPS');

-- --------------------------------------------------------

--
-- Table structure for table `mst_contractor`
--

CREATE TABLE `mst_contractor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `s_type` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `panno` varchar(20) NOT NULL,
  `adharno` varchar(25) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `pic_no` varchar(255) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `land_line` varchar(20) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `joining_date` date NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_contractor`
--

INSERT INTO `mst_contractor` (`id`, `user_id`, `sub_user_id`, `s_type`, `name`, `gender`, `email`, `contact`, `panno`, `adharno`, `gst_no`, `pic_no`, `comp_name`, `land_line`, `state`, `city`, `address`, `type`, `joining_date`, `record_date`, `update_date`) VALUES
(6, 1, 1, 'Mr', 'creative interiors & decorates (amjad Sk)', 'Male', 'shaikhamjad2902@gmail.com', '9867779878', 'DHRPS2946Q', '', '27DHRPS2946Q1Z3', '', '', NULL, '21', '1846', 'taloja', 'Main Contractor', '0000-00-00', '2018-10-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_customer`
--

CREATE TABLE `mst_customer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_contact` varchar(20) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_customer`
--

INSERT INTO `mst_customer` (`id`, `user_id`, `sub_user_id`, `cust_name`, `cust_contact`, `cust_email`, `cust_address`, `record_date`, `update_date`) VALUES
(2, 1, 0, 'Rajesh', '9874563210', 'raj@gmail.com', 'Pune', '2018-08-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_employee`
--

CREATE TABLE `mst_employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `s_type` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `panno` varchar(20) NOT NULL,
  `adharno` varchar(25) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_employee`
--

INSERT INTO `mst_employee` (`id`, `user_id`, `sub_user_id`, `s_type`, `name`, `gender`, `email`, `contact`, `panno`, `adharno`, `qualification`, `dob`, `state`, `city`, `address`, `joining_date`, `record_date`, `update_date`) VALUES
(3, 1, 0, 'Miss', 'nikita', 'Female', 'nikita@gmail.com', '9856256325', 'SDFGH5678Y', '9636562356', ' BE', '2018-08-06', 'Maharashtra', 'Pune', 'REERH', '2018-08-07', '2018-08-13', '2018-08-17'),
(6, 1, 0, 'Mr', 'Pushkaraj Kolatkar', 'Male', 'pushkaraj@e-bc', '9764000200', 'APAPP9876L', '0', ' BE', '2018-08-10', '21', '1841', '', '1990-07-10', '2018-08-17', '0000-00-00'),
(7, 1, 0, 'Mr', 'Amit Ranawade', 'Male', 'amittest@neotechtest.com', '9764000202', 'APAPP9804R', '', ' ME', '1986-06-04', '20', '1415', '', '2018-08-01', '2018-08-22', '0000-00-00'),
(8, 1, 0, 'Mr', 'Shyam Malve', 'Male', 'testing@shyamebc.testing', '9764000252', 'ABAPP0976B', '', ' BE', '1999-06-01', '21', '1822', 'M', '2018-08-01', '2018-08-24', '0000-00-00'),
(9, 1, 0, '', 'Dinesh Rao', 'Male', 'dineshrao@testing.neotech', '9238823420', 'ABAOO0987B', '', ' BE', '1990-06-26', '21', '1797', 'Kharghar', '2018-04-04', '2018-08-29', '0000-00-00'),
(10, 1, 0, '', 'Prathamesh Laghate', 'Male', 'prathamesh@testing.neotech', '9089089090', 'ABAPP0976B', '', ' ME', '1984-10-01', '12', '715', 'sector 10 near main market', '2018-01-01', '2018-08-29', '0000-00-00'),
(11, 1, 0, 'Mr', 'Nishi Sathe', 'Female', 'nishi@testing.neotech', '9809808080', 'KAPOO0812J', '', ' B.Com', '1998-11-04', '21', '1797', 'Testing on Google Chrome', '2018-08-23', '2018-08-29', '0000-00-00'),
(12, 1, 1, 'Mr', 'VIKAS VINODKUMAR SINGH', 'Male', 'singhvikas549@gmail.com', '8652727276', 'EGZPS3167K', '  8233-9504-9670', ' DIPLOMA+ BE IN CIVI', '1994-05-12', '21', '1797', 'ROOM NO 1,JAY BHARAT HSG SOC, 90 FT ROAD ,NR PENINSULA GRAND, SKAINAKA MUMBAI 400072', '2018-09-06', '2018-12-02', '2019-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `mst_material`
--

CREATE TABLE `mst_material` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `mat_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_material`
--

INSERT INTO `mst_material` (`id`, `user_id`, `sub_user_id`, `mat_name`, `description`, `brand_name`, `unit`, `rate`, `record_date`, `update_date`) VALUES
(2, 1, 0, 'Cement', '', 'Ambuja Cement', 'BAG', '350.00', '2018-08-11', '2018-08-16'),
(3, 1, 0, 'Cement', '', 'Birla', 'BAG', '300.00', '2018-08-13', '2018-08-16'),
(4, 1, 0, 'Bathroom Tiles', 'Anti skit tiles', 'Raheja', '500Box', '1000.00', '2018-08-22', '0000-00-00'),
(5, 1, 1, 'Reti', 'River Sand', 'River Sand', 'BAG 40kg', '2000.00', '2018-08-22', '2018-09-26'),
(6, 1, 0, 'Italian Marble', 'Made in USA', 'Kites', 'Box - 100', '40000.00', '2018-08-29', '2018-08-29'),
(7, 1, 0, 'Brick', '6 inch red brick', 'sohani', 'Number', '9.00', '2018-09-19', '0000-00-00'),
(8, 1, 1, 'Floor Tiles', '600*600  K6016 Batch number : ', 'Kajaria', 'Box 6num', '100.00', '2018-09-26', '0000-00-00'),
(9, 1, 1, 'EXT primer', 'Wether coat Ext primer prolinks', 'berger Ext primer', 'Ltr', '25.00', '2018-10-04', '0000-00-00'),
(10, 1, 1, 'Kitchen sink', 'SS ', 'filix', 'Number', '300.00', '2018-10-04', '0000-00-00'),
(11, 1, 1, 'floor protection sheet', '2mm gray 48*72', 'pp sheet', 'Number', '72.00', '2018-10-06', '0000-00-00'),
(12, 1, 1, 'crush sand', '16 ft 2in x 7 ft 10 in x 4 ft 8in', 'a+', 'Brass', '500.00', '2018-10-06', '2018-10-06'),
(13, 1, 1, 'cement', 'Binani cement ltd PPC', 'Binani', 'BAG', '300.00', '2018-10-12', '0000-00-00'),
(14, 1, 1, 'stop cock', 'ESSCO SPL ESS 514 CON WTH SLID FLG 1/2', 'ESSCO', 'Number', '489.00', '2018-10-17', '0000-00-00'),
(15, 1, 1, 'BIB COCK WITH NOZZLE', 'SQT-ESS-511AKN-BIB COCK WITH NOZZLE', 'ESSCO', 'Number', '437.00', '2018-10-17', '0000-00-00'),
(16, 1, 1, 'PILLAR COCK', 'SQT-ESS-507KN-PILLAR COCK ROCKET TYPE WITH AREATOR', 'ESSCO', 'Number', '434.00', '2018-10-17', '0000-00-00'),
(17, 1, 1, 'ANGULAR STOP COCK', 'AQT-CHR-3057-ANGULAR STOP COCK (REGULATING VALVE)  WIT', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(18, 1, 1, 'BASIN  INLET CONNECTION (ANGLE VALVE)', 'SQT- ESS- 526KN^BASIN INLET CONNECTION (ANGLE VALVE)', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(19, 1, 1, 'HAND SHOWER', 'ALE-ESS-583-HAND SHOWER (HEALTHY FAUCET) (ABS BODY)', 'eSSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(20, 1, 1, 'BOTTLE TRAP', 'ALE-ESS-773AL190*125-BOTTLE TRAP WITH FULLY CASTED BODY WIT', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(21, 1, 1, 'WASTE COUPLING', 'ALE-ESS-544FT-WASTE COUPLING FULL THREAD 32MM', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(22, 1, 1, 'EXTENSION', 'EXTENSION-8481 1\" CP', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(23, 1, 1, 'ELBOW', 'ELBOW/PLUG/EXTENTION/DOUBLE NIPPLE -7412 CP ELBOW', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(24, 1, 1, 'DOUBLE NIPPLE', 'ELBOW/PLUG/EXTENSION/DOUBLE NIPPLE -7412 CP DOUBLE NIPPLE', 'ESCCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(25, 1, 1, 'JALLI', 'JALLI-7326 -5\"*5\" sq jalli', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(26, 1, 1, 'METAL/PVC CONNECTOR', 'METAL/PVC CONNECTOR -3917-24\" PVC CONNECTOR', 'ESCCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(27, 1, 1, '18\' PVC CONNECTOR', 'METAL/PVC CONNECTOR-3917 -18\'\' PVC COPNNECTOR', 'ESCCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(28, 1, 1, 'CORNER BASIN', 'ECS-WHT-841-CORNER BASIN SIZE 400*405*200', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(29, 1, 1, 'FLANGE', 'FLANGE-7307\r\n', 'ESSCO', 'Number', '0.00', '2018-10-17', '0000-00-00'),
(31, 1, 1, 'PILLAR COCK', 'MQT-ESS-508-PILLAR COCK SUPER DELUXE WITH AREATOR', 'ESSCO', 'Number', '1.00', '2018-10-20', '0000-00-00'),
(32, 1, 1, 'OVERHEAD SHOWER', 'EOS-ESS-541N-OVERHEAD SHOWER 80MM DIA ROUND SHAPE SIN', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(33, 1, 1, 'SHOWER ARM', 'ALE-ESS-536A-SHOWERR ARM 240MM LONG (LIGHT WEIGHT)', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(34, 1, 1, 'TABLE TOP BASIN', 'ECS-WHT-901-TABLE TOP BASIN SIZE 355*355*145', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(35, 1, 1, 'WALL HUNG CISTERN', 'WHC-WHT-184L-WALL HUNG CISTERN WITH DRAINAGE L BEND P', 'ESSCO`', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(36, 1, 1, 'LONG BODY BIB COCK ', 'MQT-ESS-512-LONG BODY BIB COCK WITH WALL FLANGE WITH ', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(37, 1, 1, 'WALL MIXER', 'SQT-ESS-517BKN-WALL MIXER WITH 115MM LONG BEND PIPE FOR', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(38, 1, 1, 'BASIN INLET ', 'SQT-ESS-526KN-BASIN INLET CONNECTION (ANGLE VALVE)', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(39, 1, 1, 'CONCEALED STOP COCK', 'SQT-ESS-514KN-CONCEALED STOP COCK  WITH SLIDING FLANGE ', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(40, 1, 1, 'SINK COCK', 'MQT-ESS-523-SINK COCK WITH SWINGING CASTED PSPOUT (TA)', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(41, 1, 1, 'BIB COCK ', 'MQT-ESS--511-BIB COCK SHORT BODY ', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(42, 1, 1, 'EWC ', 'ECS-WHT-551PN-EWC WITH NORMAL CLOSING SEAT COVER ', 'ESSCO', 'Number', '0.00', '2018-10-20', '0000-00-00'),
(43, 1, 1, 'MCCB', 'MCC -160A  TPN', '-', 'Number', '9455.00', '2018-10-20', '2018-10-20'),
(44, 1, 1, 'HANDLE', '-', '-', 'Number', '970.00', '2018-10-20', '2018-10-20'),
(45, 1, 1, 'sproader Links ', 'Sproader Links ', '-', 'Number', '918.00', '2018-10-20', '2018-10-20'),
(46, 1, 1, 'Power Terminal ', 'Power Terminal - 70 SQ.MM', '-', 'Number', '19.38', '2018-10-20', '2018-10-20'),
(47, 1, 1, 'Encloser ', 'Encloser - 400 X 300 X 210\r\n', '-', 'Number', '2888.00', '2018-10-20', '2018-10-20'),
(48, 1, 1, 'Power cable ', 'Power Cable - 3.5C Al ARM 70SQ.MM - 90Mtrs', '-', 'Number', '27054.00', '2018-10-20', '0000-00-00'),
(49, 1, 1, 'LUGS..', 'LUGS..- 70 SQMM RING TYPE AL. I.D  8MM', '-', 'Number', '24.00', '2018-10-20', '0000-00-00'),
(50, 1, 1, 'LUGS.. ', ' LUGS.. - 35SQMM RING TYPE AL I.D 8MM ', '-', 'Number', '24.00', '2018-10-20', '0000-00-00'),
(51, 1, 1, 'CABLE GLAND ', 'CABLE GLAND - BRASS S.C (1/2)\" 2 NOS\r\nBRASS S.C 1\" 2 NOS \r\n           ', '-', 'Number', '2064.00', '2018-10-20', '0000-00-00'),
(52, 1, 1, 'CHEMICAL EARTH KIT ', 'CHEMICAL EARTH KIT ', '-', 'Number', '3600.00', '2018-10-20', '0000-00-00'),
(53, 1, 1, 'IG StriP ( 25MM X 5MM) ', 'IG StriP ( 25MM X 5MM) ', '-', 'RM', '92.40', '2018-10-20', '0000-00-00'),
(54, 1, 1, 'installation & commissioning', 'Installation & Commissioning', '-', 'Number', '5250.00', '2018-10-20', '0000-00-00'),
(55, 1, 1, 'power cable', 'power cable 3.5c al arm 70sq.mm-90mtrs', '-', 'Number', '27054.00', '2018-10-21', '0000-00-00'),
(56, 1, 1, 'PACKING & FORWORDING', '-', '-', 'Number', '0.00', '2018-10-21', '0000-00-00'),
(57, 1, 1, 'PP sheet ', 'PP Sheet 2mm Gray 48\'\'X72\'\'', '-', 'Number', '72.00', '2018-10-29', '0000-00-00'),
(58, 1, 1, 'One way tape ', 'One Way Tape 72mm P', '-', 'Roll', '75.00', '2018-10-29', '0000-00-00'),
(59, 1, 1, 'pP SHEET ', 'PP sheet 2mm gray 48\'\'x72\'\'', '-', 'Number', '0.00', '2018-11-01', '0000-00-00'),
(60, 1, 1, 'safety jacket ', '1\" Patti Orange Colour ', 'Make Guard', 'Number', '0.00', '2018-11-01', '0000-00-00'),
(61, 1, 1, 'safety Helmet', 'yellow colour ', 'make gaurd', 'Number', '0.00', '2018-11-01', '0000-00-00'),
(62, 1, 1, 'Floor Protection sheet ', '2mm thick - 1m*2m', 'KVIK', 'sqft', '4.70', '2018-12-14', '0000-00-00'),
(63, 1, 1, 'safety Belt ', 'Double rope full body Universal', 'karam', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(64, 1, 1, 'safety nose mask', '44+', 'venus', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(65, 1, 1, 'ABC type 4kg ', 'capacity F/E ISI mark', 'powder', 'Number', '3.00', '2018-12-14', '0000-00-00'),
(66, 1, 1, 'DCP', 'BC stored pressure type 9kg F/E ISI mark', 'Universal ', 'Number', '1.00', '2018-12-14', '0000-00-00'),
(67, 1, 1, 'Dust Bin', '20 ltr', 'Aristo', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(68, 1, 1, 'D F Black foam sheet ', '0.9*1.8M', ' K n', 'sqft', '2.50', '2018-12-14', '0000-00-00'),
(69, 1, 1, 'd F black foam sheet ', '1*2m\r\n', 'n K', 'sqft', '2.50', '2018-12-14', '0000-00-00'),
(70, 1, 1, 'one way tape ', '72mm P', 'N k', 'Roll', '0.00', '2018-12-14', '0000-00-00'),
(71, 1, 1, 'nut Bolt', '-', '-', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(72, 1, 1, 'mask', '', 'DCS', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(73, 1, 1, 'wall support', '-', '-', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(74, 1, 1, 'Zip Crane', '-', '-', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(75, 1, 1, 'resistor box', '-', '-', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(76, 1, 1, 'hoist cabin', '', 'DCS', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(77, 1, 1, 'Drive unit', 'with motor', 'KYB', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(78, 1, 1, 'CAG', '', 'KYB', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(79, 1, 1, 'cable trolly', '', 'kYB', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(80, 1, 1, 'cable ', 'R/m', 'KYB', 'RM', '0.00', '2018-12-14', '0000-00-00'),
(81, 1, 1, 'Resistance box', '', 'KYB', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(82, 1, 1, 'Buffer spring', '', 'KYB', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(83, 1, 1, 'door laminate ', '78\"X33\"', 'Soft 02', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(84, 1, 1, 'Crush Sand', '', 'Sand', 'Brass', '0.00', '2018-12-14', '0000-00-00'),
(85, 1, 1, 'Bricks', '', '6\"', 'Number', '0.00', '2018-12-14', '0000-00-00'),
(86, 1, 1, 'Sand ', 'River Sand', 'Vaishnao Traders ', 'Bags 30 kg', '100.00', '2018-12-15', '0000-00-00'),
(87, 1, 1, 'Cement', '50kg bags', 'UltraTech limited', 'BAG', '310.00', '2018-12-15', '0000-00-00'),
(88, 1, 1, 'Kitchen Sink', '20 X 17', 'Filix', 'Number', '1160.00', '2018-12-22', '0000-00-00'),
(89, 1, 1, 'Bathroom Floor Tiles ', '12\" X 12\" Chicago Grey                                                                                                                                                             ', 'Kajariya ', 'Box-10', '0.00', '2018-12-22', '0000-00-00'),
(90, 1, 1, 'Kitchen wall Tiles ', '18\" X 12\" Stanley highlighter ', 'Kajariya ', 'Box - 6', '0.00', '2018-12-22', '0000-00-00'),
(91, 1, 1, 'ALD-705 Copping', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(92, 1, 1, 'OHS CHR 1989', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(93, 1, 1, 'FLBH CHR 5053N', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(94, 1, 1, 'ALD CHR 585 ', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(95, 1, 1, 'OHS 1995 ', '', 'J', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(96, 1, 1, 'FLR 5357N', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(97, 1, 1, 'FLR CHR 5041N', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(98, 1, 1, 'CON 037KN', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(99, 1, 1, 'CHS WHT 903 ', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(100, 1, 1, 'CON CHR 041KN', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(101, 1, 1, 'CON CHR 053KN', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(102, 1, 1, 'CON CHR 267KN', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(103, 1, 1, 'CON CHR 347KN', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(104, 1, 1, 'CHS WHT 901', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(105, 1, 1, 'CHS WHT 903', '', 'ESSCO', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(106, 1, 1, 'Laminate Main Door ', '81\" X 38\" ', 'Unicus', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(107, 1, 1, 'Laminate Bedroom Door ', '81\" X 32\"', 'Unicus ', 'Number', '0.00', '2018-12-22', '0000-00-00'),
(108, 1, 1, 'FRC Door ', '81\" X 27\"', 'Unicus ', 'Number', '0.00', '2018-12-22', '2018-12-24'),
(109, 1, 1, 'Shower Arm with Wall Flange ', 'SHA-CHR-477P', 'ESSCO', 'Number', '0.00', '2018-12-24', '0000-00-00'),
(110, 1, 1, 'Smart Single Flush Wall Hung ', 'WHE-WHT-183L', 'ESSCO', 'Number', '0.00', '2018-12-24', '0000-00-00'),
(111, 1, 1, 'Roller Bearing', '60062Z-C3', 'Flag', 'Number', '329.00', '2018-12-24', '0000-00-00'),
(112, 1, 1, 'Toilet wall tiles', 'Sphere Blanco 300X450 ', 'Kajariya', 'Box - 6', '0.00', '2018-12-24', '0000-00-00'),
(113, 1, 1, 'Kitchen Wall Tiles ', 'Stanley Highlighter 300X450 ', 'Kajariya ', 'Box - 6', '0.00', '2018-12-24', '0000-00-00'),
(114, 1, 1, 'Bath Room Floor Tiles ', 'Chicago Gray 300X300', 'Kajariya', 'Box-10', '0.00', '2018-12-24', '0000-00-00'),
(115, 1, 1, 'Hinges', '', 'MS', 'Bundle - 12', '0.00', '2018-12-24', '0000-00-00'),
(116, 1, 1, 'Lock patti', '', 'MS', 'Kg', '0.00', '2018-12-24', '0000-00-00'),
(117, 1, 1, 'Welding Rod', '', '0', 'Pack', '0.00', '2018-12-24', '0000-00-00'),
(118, 1, 1, 'Cutting wheel ', '', '0', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(119, 1, 1, 'Steel', '12mm Sq Bar \r\n20X5mm Patti', 'MS', 'Kg', '0.00', '2018-12-24', '0000-00-00'),
(120, 1, 1, 'Grinder Wheel', '4\"', '0', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(121, 1, 1, 'Rope ', '', '0', 'RM', '0.00', '2018-12-24', '0000-00-00'),
(122, 1, 1, 'Gogal', '', '0', 'Nos', '0.00', '2018-12-24', '2019-02-17'),
(123, 1, 1, 'whole pass', '', 'MS', 'Kg', '0.00', '2018-12-24', '0000-00-00'),
(124, 1, 1, 'sefty Shoe', 'For Staff ', 'Tiger', 'pair', '970.00', '2018-12-24', '2019-02-17'),
(125, 1, 1, 'Hand Gloves', '', 'J', 'pair', '0.00', '2018-12-24', '0000-00-00'),
(126, 1, 1, 'Concrete Nails ', '', 'MS', 'Kg', '0.00', '2018-12-24', '0000-00-00'),
(127, 1, 1, 'Black Paint', '', 'Berger', 'Ltr', '0.00', '2018-12-24', '0000-00-00'),
(128, 1, 1, 'Tarpaint', '', 'berger', 'Ltr', '0.00', '2018-12-24', '0000-00-00'),
(129, 1, 1, 'Redoxide', '', '0', 'Ltr', '0.00', '2018-12-24', '0000-00-00'),
(130, 1, 1, 'Oil Paint', '', '0', 'Ltr', '0.00', '2018-12-24', '0000-00-00'),
(131, 1, 1, '3 way round socket box', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(132, 1, 1, '2 way socket box', '', 'l', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(133, 1, 1, '1.5MM POLYCAB CABLE', '', 'l', 'BUNDLE 100M', '0.00', '2018-12-24', '0000-00-00'),
(134, 1, 1, '8M Box + Plate', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(135, 1, 1, '16A Socket', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(136, 1, 1, '6A Switches', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(137, 1, 1, 'SP MCB', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(138, 1, 1, '20A MCB', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(139, 1, 1, '100A Buster', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(140, 1, 1, '200A Main Fuse Box', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(141, 1, 1, '16mm Lugs', '', 'L', 'Nos', '0.00', '2018-12-24', '0000-00-00'),
(142, 1, 1, '2.5sq mm - 2 Core Flexible Cable ', '', 'L', 'BUNDLE 100M', '0.00', '2018-12-24', '2018-12-24'),
(143, 1, 1, '6sq mm -4 core Flexible cable  ', '', 'L', 'BUNDLE 100M', '0.00', '2018-12-24', '0000-00-00'),
(144, 1, 1, '3 -Pintop', '', 'L', 'Nos', '0.00', '2018-12-27', '2019-02-17'),
(145, 1, 1, 'Polycab TS Led 1800', '', 'l', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(146, 1, 1, 'Industrial Socket', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(147, 1, 1, 'Industrial Socket Pintop', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(148, 1, 1, 'RCCB 63A 4 Pole', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(149, 1, 1, 'RCCB Enclosure ', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(150, 1, 1, '12\" Cabin Fan', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(151, 1, 1, '1Sq mm X 2 Core ', '', 'L', 'BUNDLE 100M', '0.00', '2018-12-27', '0000-00-00'),
(152, 1, 1, '2.5 sq mm X 3 core', '', 'l', 'BUNDLE 100M', '0.00', '2018-12-27', '0000-00-00'),
(153, 1, 1, '2.5Sq mm wire ', '', 'L', 'RM', '0.00', '2018-12-27', '0000-00-00'),
(154, 1, 1, 'wire Clips', '', 'l', 'Pack', '0.00', '2018-12-27', '0000-00-00'),
(155, 1, 1, '50W LED Floodlight', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(156, 1, 1, '18M Surface Box + Plate ', ' ', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(157, 1, 1, '6M Surface + Plate ', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(158, 1, 1, 'polycab 1 sq mm 90 m', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(159, 1, 1, '16 A Switches ', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(160, 1, 1, '16A MCB', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(161, 1, 1, 'MCB Enclosure ', ' ', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(162, 1, 1, '3M Surfase Box', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(163, 1, 1, '6 sq mm 3 core wire ', '', 'L', 'BUNDLE 100M', '0.00', '2018-12-27', '0000-00-00'),
(164, 1, 1, 'cABLE tIE ', '', 'l', 'Pack', '0.00', '2018-12-27', '2018-12-27'),
(165, 1, 1, 'QL 20W LED Tube Light', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(166, 1, 1, 'QL9902PD030W1DL', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(167, 1, 1, 'arctic air 36', '', 'L', 'Nos', '0.00', '2018-12-27', '2018-12-27'),
(168, 1, 1, 'Arctic Air 48\"', '', 'L', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(169, 1, 1, '2M Box +Plate', '', 'l', 'Nos', '0.00', '2018-12-27', '0000-00-00'),
(170, 1, 1, 'Pine Wood Patti', '10mmX12mm -3.25RFT', 'Unicus', 'RFT', '0.00', '2018-12-27', '2018-12-27'),
(171, 1, 1, 'Pine Wood Patti', '10mmX12mm 6.75RFT', 'Unicus', 'RFT', '0.00', '2018-12-27', '0000-00-00'),
(172, 1, 1, '25X6 Steel Screw', 'In one Box 400 Nos ', 'SS', 'Box', '0.00', '2018-12-27', '0000-00-00'),
(173, 1, 1, 'Door Chain', '', 'ME', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(174, 1, 1, '8\" Handle ', '', 'SS', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(175, 1, 1, '25X8 Mirror Screw', '', 'SS', 'Box', '0.00', '2018-12-27', '0000-00-00'),
(176, 1, 1, 'M2 Magnet', '', 'FB', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(177, 1, 1, '10\" Handdrop', '', 'SS', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(178, 1, 1, '8\" Latch', '', 'ME', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(179, 1, 1, '6\" tower bolt', '', 'ME', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(180, 1, 1, '4X14 Hinges', '', 'ME', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(181, 1, 1, '6\" Handle ', '', 'mE', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(182, 1, 1, '4\" Tower Bolt', '', 'ME', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(183, 1, 1, '38X8 Steel Screw', '', 'ME', 'Box', '0.00', '2018-12-27', '0000-00-00'),
(184, 1, 1, '19X6 Screw', '', 'ME', 'Box', '0.00', '2018-12-27', '0000-00-00'),
(185, 1, 1, '4X12 Hinges', '', 'ME', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(186, 1, 1, '19X5 screw Steel', '', 'ME', 'Box', '0.00', '2018-12-27', '0000-00-00'),
(187, 1, 1, 'Door Eye Piece', '', 'ME', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(188, 1, 1, 'Rose Handle ', '', 'ME', 'pair', '0.00', '2018-12-27', '0000-00-00'),
(189, 1, 1, '6700 Econ Lock Boddy', '', 'ME', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(190, 1, 1, '5476 Euro Pin Cylinder', '', 'me', 'Piece', '0.00', '2018-12-27', '0000-00-00'),
(191, 1, 1, '16X4 SS Crew', '', 'Unicus', 'Box', '0.00', '2018-12-27', '0000-00-00'),
(192, 1, 1, 'Door frame cover moulding', '', 'unicus', 'Nos', '0.00', '2018-12-29', '0000-00-00'),
(193, 1, 1, 'Door packing', '', 'unicus', 'Nos', '0.00', '2018-12-29', '0000-00-00'),
(194, 1, 1, 'Tower Crane ', 'Timing', 'Rent', 'Hrs', '0.00', '2019-01-31', '0000-00-00'),
(195, 1, 1, 'Flexible wire ', 'Single core 10 sqmm', 'Tachion ', 'RM', '79.00', '2019-02-09', '0000-00-00'),
(196, 1, 1, 'kaddapa Stone', 'Various Sizes', 'Stone', 'Sqft', '29.00', '2019-02-09', '0000-00-00'),
(197, 1, 1, 'White Marble ', 'Spotted white marble ', 'Stone ', 'Sqft', '50.00', '2019-02-09', '0000-00-00'),
(198, 1, 1, 'Black Granite ', 'Black Granite ', 'Stone ', 'Sqft', '119.00', '2019-02-09', '0000-00-00'),
(199, 1, 1, 'elbow', '40 mm', 'prince', 'Nos', '20.00', '2019-02-17', '0000-00-00'),
(200, 1, 1, 'hook frame', 'metal', 'pri', 'Nos', '110.00', '2019-02-17', '0000-00-00'),
(201, 1, 1, 'hexa blade', 'pvc pipe cutting\r\n', 'x', 'Nos', '10.00', '2019-02-17', '0000-00-00'),
(202, 1, 1, 'white Cement', 'joint filling', 'Birla', 'Kg', '35.00', '2019-02-17', '0000-00-00'),
(203, 1, 1, 'Steelgrip  Tape', 'For electic cable Joint', 'Pidilite', 'Nos', '10.00', '2019-02-17', '0000-00-00'),
(204, 1, 1, 'water proof', 'water Proofing', 'Dr Fixit', 'Kg', '312.00', '2019-02-17', '0000-00-00'),
(205, 1, 1, 'Curring Pipe', 'for water ', '-', 'Bundle - 12', '800.00', '2019-02-17', '0000-00-00'),
(206, 1, 1, 'Chain', 'metal', '-', 'Nos', '40.00', '2019-02-17', '0000-00-00'),
(207, 1, 1, 'plug', 'for machine pin', 'anchor', 'Nos', '10.00', '2019-02-17', '0000-00-00'),
(208, 1, 1, 'wiser', 'fir lift nut-bolt', '-', 'Kg', '100.00', '2019-02-17', '0000-00-00'),
(209, 1, 1, 'Tape', '50 mtr for measurement', 'hi-fi', 'Nos', '500.00', '2019-02-17', '0000-00-00'),
(210, 1, 1, 'Areltide', 'for marble door frame fixing', 'Bond Lite', 'Kg', '1050.00', '2019-02-17', '0000-00-00'),
(211, 1, 1, '2 Core cable', 'for connection', 'anchor', 'Bundle - 12', '1950.00', '2019-02-17', '0000-00-00'),
(212, 1, 1, '2\" pipe', 'for water supply', 'Prince', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(213, 1, 1, '2\" Elbow', 'for water supply', 'Prince', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(214, 1, 1, 'brass MT', 'for water supply', 'Prince', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(215, 1, 1, '4\" Pipe', 'for Raj torres', 'Prince', 'Ft.', '0.00', '2019-02-17', '0000-00-00'),
(216, 1, 1, '1.5', 'for Water supply', 'Prince', 'Ft.', '0.00', '2019-02-17', '2019-02-17'),
(217, 1, 1, 'Mseal', 'for kitch sink & granite gap filing', 'Pidilite', 'Nos', '20.00', '2019-02-17', '0000-00-00'),
(218, 1, 1, '2-Pintop', 'for machine connection', 'Anchor', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(219, 1, 1, 'multiplug', 'for connection', 'Anchor', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(220, 1, 1, 'Flexible Pipe', 'for kitchen gas connection', '-', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(221, 1, 1, '8-module plate', 'for connection', 'Anchor', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(222, 1, 1, '50 watt Halogen set', 'For night work', '-', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(223, 1, 1, '20x22 Spanner', 'for lift bolt fixing ', 'Taparia', 'Nos', '0.00', '2019-02-17', '0000-00-00'),
(224, 1, 1, 'chemical', 'chemical dr fixid urp', 'dr fixid urp', 'Kg', '0.00', '2019-02-18', '0000-00-00'),
(225, 1, 1, 'safety shoes', 'tiger safety shoes', 'tiger', 'Nos', '0.00', '2019-02-18', '0000-00-00'),
(226, 1, 0, 'eLEVATOR', '', 'HOIST', 'Nos', '1390000.00', '2019-02-19', '0000-00-00'),
(227, 1, 0, 'CONTROL PANEL', '', 'TACHION', 'Nos', '83772.00', '2019-02-19', '0000-00-00'),
(228, 1, 0, 'M.S.I BEAM /CHANEEL - 7216', 'LIFT EXTENSION', 'TURBHE', 'Kg', '48.00', '2019-02-19', '0000-00-00'),
(229, 1, 0, 'M.S.ANGLE HSN 7216', 'LIFT EXTENSION', 'TURBHE', 'Kg', '52.00', '2019-02-19', '0000-00-00'),
(230, 1, 0, 'M.S.FLAT/M.S.SQUARE HSN.7211', 'LIFT EXTENSION', 'TURBHE', 'Kg', '60.00', '2019-02-19', '0000-00-00'),
(231, 1, 0, 'CUTTING', '', 'TURBHE', 'Nos', '480.00', '2019-02-19', '0000-00-00'),
(232, 1, 0, 'LOADING', '', 'TURBHE', 'Nos', '180.00', '2019-02-19', '0000-00-00'),
(233, 1, 0, 'Sphere Blanco(450X300)', '', 'bhavya', 'Box', '320.00', '2019-02-19', '0000-00-00'),
(234, 1, 0, 'Fright outward', '', 'Bhavya', 'Nos', '1200.00', '2019-02-19', '0000-00-00'),
(235, 1, 0, 'Tiles', 'K-6016', 'bhavya', 'Box', '610.20', '2019-02-19', '2019-02-19'),
(236, 1, 0, 'Tiles(45X30)', 'Sphere Blanco', 'Bhavya', 'Box', '320.00', '2019-02-19', '0000-00-00'),
(237, 1, 0, '901 TT BASIN WHITE', '', 'APOLLO', 'Piece', '1457.70', '2019-02-20', '0000-00-00'),
(238, 1, 0, 'Slim Flush Tank 1300-1', '083 FT Reguler', 'APOLLO', 'Nos', '470.36', '2019-02-20', '0000-00-00'),
(239, 1, 0, 'Slim Flush tank 1300-2', '083 FT K 6NEXP', 'APOLLO', 'Nos', '470.36', '2019-02-20', '0000-00-00'),
(240, 1, 0, 'Cera Garnet Sink Cock', '347 KNSINK COCK', 'APOLLO', 'Piece', '1000.05', '2019-02-20', '2019-02-20'),
(241, 1, 0, 'HAND SHOWER(HEALTH FAUCET)', 'ALD CHP 585', 'APOLLO', 'Piece', '781.40', '2019-02-20', '0000-00-00'),
(242, 1, 0, '2 WAY BIB COCK', 'CON CHR 041 KN', 'APOLLO', 'Piece', '703.43', '2019-02-20', '0000-00-00'),
(243, 1, 0, 'ANGULAR STOP COCK(REGULATING)', '053 KN CON CHR', 'APOLLO', 'Piece', '491.55', '2019-02-20', '0000-00-00'),
(244, 1, 0, 'WALL MIXER WITH TELEPHONE SHOWER', 'CON CHR 967 KN', 'APOLLO', 'Piece', '2669.63', '2019-02-20', '0000-00-00'),
(245, 1, 0, 'TABLE TOP BASIN ', 'SIXE 355X355X140      347 KN CON', 'APOLLO', 'Piece', '1000.05', '2019-02-20', '0000-00-00'),
(246, 1, 0, 'TABLE TOP WHITE BASIN(PRM)', '901 CHS / WH', 'APOLLO', 'Nos', '1457.70', '2019-02-20', '0000-00-00'),
(247, 1, 0, 'STORM SILVER PRM 600 X600', '24 X24 KAJ', 'APOLLO', 'Box', '576.30', '2019-02-20', '0000-00-00'),
(248, 1, 0, '300 X 300 HD DIGITAL(PRM)', '12X12 C GREY', 'APOLLO', 'Box', '313.58', '2019-02-20', '0000-00-00'),
(249, 1, 0, '450x300 hd digital prm', '18x12 s hi', 'aPOLLO', 'Box', '271.20', '2019-02-20', '0000-00-00'),
(250, 1, 0, 'Kerro-6016', '6016 Kaj', 'APOLLO', 'Box', '576.30', '2019-02-20', '0000-00-00'),
(251, 1, 0, 'carrage Outward', '', 'APOLLP', 'Nos', '508.47', '2019-02-20', '0000-00-00'),
(252, 1, 1, 'Screw', '1.5 Screw ss', 'SS ', 'Box', '0.00', '2019-02-20', '0000-00-00'),
(253, 1, 1, 'aldrop', '10 inch Aldrop  ss', 'sS', 'Number', '0.00', '2019-02-20', '0000-00-00'),
(254, 1, 1, 'gress', 'for lift gress', '-', 'Kg', '0.00', '2019-02-20', '0000-00-00'),
(255, 1, 1, 'wire clamp', 'pvc wire clamp', '-', 'Number', '0.00', '2019-02-20', '0000-00-00'),
(256, 1, 1, '10 >11 spanner', '10>11 spanner', '-', 'Number', '0.00', '2019-02-20', '0000-00-00'),
(257, 1, 1, 'tape ', '3 mtr  Measurement tape ', '-', 'Number', '0.00', '2019-02-20', '0000-00-00'),
(258, 1, 1, 'tape', '5 mtr  measurement tape', '-', 'Number', '0.00', '2019-02-20', '0000-00-00'),
(259, 1, 1, 'Marker', 'marker', '-', 'Number', '0.00', '2019-02-20', '0000-00-00'),
(260, 1, 1, 'tape', 'pvc tape', '-', 'Number', '0.00', '2019-02-20', '0000-00-00'),
(261, 1, 1, 'hex nut bolt', '8 & 15 HEX NUT BOLT', '-', 'Number', '0.00', '2019-02-20', '0000-00-00'),
(262, 1, 1, 'screw', '1\'\' screw ', '-', 'Number', '0.00', '2019-02-21', '0000-00-00'),
(263, 1, 1, 'board', '8 Model  board  with plat', 'ANCHOR', 'Number', '0.00', '2019-02-21', '0000-00-00'),
(264, 1, 1, 'switch', '5 Amp switch', 'anchor', 'Number', '0.00', '2019-02-21', '0000-00-00'),
(265, 1, 1, 'drill', '5 mm  drill bit', 'taparia', 'Number', '0.00', '2019-02-21', '0000-00-00'),
(266, 1, 1, 'rawal plug', 'rawal plug', '-', 'Pack', '0.00', '2019-02-21', '0000-00-00'),
(267, 1, 1, 'wire', '1 sq.mm 3 core wire ', '-', 'RM', '0.00', '2019-02-21', '0000-00-00'),
(268, 1, 1, 'ribe hooks', 'ribe hooks', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(269, 1, 1, 'pawada', 'pawada with handle', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(270, 1, 1, 'pvc ghamela ', 'pvc ghamela  small', 'pvc ', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(271, 1, 1, 'pvc ghamela ', 'medium', 'pvc', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(272, 1, 1, 'Linedori ', 'linedori', '-', 'bundle 25  RM', '0.00', '2019-02-21', '0000-00-00'),
(273, 1, 1, 'tester', 'tester taparia', 'taparia', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(274, 1, 1, 'brush', '4\'\' brush', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(275, 1, 1, 'j hooks', 'j hooks ', '-', 'Kg', '0.00', '2019-02-21', '0000-00-00'),
(276, 1, 1, 'hammer', '3 cbs hammer', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(277, 1, 1, 'handle', 'hammer  handle', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(278, 1, 1, 'tacha', 'tacha', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(279, 1, 1, 'cheni', 'Cheni', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(280, 1, 1, 'spirit level', '12\'\'  spirit level', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(281, 1, 1, 'curring pipe', 'currig pipe', '-', 'bundle', '0.00', '2019-02-21', '0000-00-00'),
(282, 1, 1, 'pvc pipe', '10 mm pvc pipe', '-', 'bundle', '0.00', '2019-02-21', '0000-00-00'),
(283, 1, 1, 'croshing patty', '1\'\' croshing patty', '-', 'bundle', '0.00', '2019-02-21', '0000-00-00'),
(284, 1, 1, 'nails', '2.5\'\' nails', '-', 'Kg', '0.00', '2019-02-21', '0000-00-00'),
(285, 1, 1, 'right  angle', '12\'\' right angle', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(286, 1, 1, 'mask', 'mask', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(287, 1, 1, 'halogen', '500 watt halogen', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(288, 1, 1, 'spanners', '20 > 22 fix spanners', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(289, 1, 1, 'flexible pipe', 'flexible pipe', '-', 'RM', '0.00', '2019-02-21', '0000-00-00'),
(290, 1, 1, 'plat', '8 modul  plat', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(291, 1, 1, '2 pin top', '2 pin top', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(292, 1, 1, 'multi plug', 'multi plug', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(293, 1, 1, 'pvc tap', 'pvc tape', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(294, 1, 1, 'abro tape', '1\'\' abro tape', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(295, 1, 1, 'weight machine ', 'weight machine', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(296, 1, 1, 'plug', '1/2 plug', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(297, 1, 1, 'combined box', 'combined box', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(298, 1, 1, 'p.o  red', 'p.o  red', '-', 'gm', '0.00', '2019-02-21', '0000-00-00'),
(299, 1, 1, 'peroom', 'peroom', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(300, 1, 1, 'patra', 'patra', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(301, 1, 1, 'pvc board', '8 > 10 pvc board', '-', 'Nos', '0.00', '2019-02-21', '0000-00-00'),
(302, 1, 1, 'aluminium', 'Aluminium  bottom patti 12 feet', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(303, 1, 1, 'solution', 'solution', '-', 'ml', '0.00', '2019-02-22', '0000-00-00'),
(304, 1, 1, 'bush pvc fitting', '1/2 bush pvc fitting', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(305, 1, 1, 'white cement ', 'white cement\r\n', '-', 'Kg', '0.00', '2019-02-22', '0000-00-00'),
(306, 1, 1, 'lock', 'lock', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(307, 1, 1, 'aralite ', 'aralite  per set  1 kg', '-', 'Kg', '0.00', '2019-02-22', '0000-00-00'),
(308, 1, 1, '70  lug ', '70 lug', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(309, 1, 1, 'finale', 'finale for {toilet cleaning}', '-', 'bottle', '0.00', '2019-02-22', '0000-00-00'),
(310, 1, 1, 'bleaching powder', 'bleaching powder for cleaning', '-', 'Kg', '0.00', '2019-02-22', '0000-00-00'),
(311, 1, 1, 'broom', 'broom', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(312, 1, 1, '50  lugs', '50 lugs for main connection jointing', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(313, 1, 1, 'nut bolt', '12 > 14  nut bolt for  passenger lift', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(314, 1, 1, 'nails', '17&1 nails', '-', 'Kg', '0.00', '2019-02-22', '0000-00-00'),
(315, 1, 1, 'black powder', 'black powder', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(316, 1, 1, '  spannels', '24 no  spannels', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(317, 1, 1, 'spannels', '27 no  spannels', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(318, 1, 1, 'ellenki pana', 'ellenki pana', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(319, 1, 1, 'ellenki pana', 'ellenki pana 12 mm', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(320, 1, 1, 'hammer', 'hammer 12 mm', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(321, 1, 1, 'ring pana', '24 > 22 ring pana', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(322, 1, 1, 'mirror screw', '1\'\' mirror screw', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(323, 1, 1, 'kharrata jadu', 'kharrata  jadu', '-', 'Nos', '0.00', '2019-02-22', '0000-00-00'),
(324, 1, 1, 'english 3 pin plug', '6 ampere english 3 pin plug', '-', 'Number', '0.00', '2019-02-22', '2019-02-23'),
(325, 1, 1, 'LED Bulb', '15Watt', '-', 'Number', '0.00', '2019-02-22', '0000-00-00'),
(326, 1, 1, 'brass', 'brass boll wall', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(327, 1, 1, 'mix nut bolt', 'mix nut bolt', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(328, 1, 1, 'lugs', '95 lugs', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(329, 1, 1, 'pipe hooks', 'pipe hooks  with nut bolt', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(330, 1, 1, 'plug ', '20 amp 3 pin plug', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(331, 1, 1, 'spenners ', '20&22 rig or fix pana spanners', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(332, 1, 1, 'fevicol', 'fevicol', '-', 'gm', '0.00', '2019-02-23', '0000-00-00'),
(333, 1, 1, 'fevikwik', 'fevikwik', '-', 'gm', '0.00', '2019-02-23', '0000-00-00'),
(334, 1, 1, 'bron tape', '2\'\' bron  tape', '-', 'bundle', '0.00', '2019-02-23', '0000-00-00'),
(335, 1, 1, 'flange bend', '110 mm  flange bend', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(336, 1, 1, 'connection pipe', 'connection pipe', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(337, 1, 1, 'plastic bibcock', 'plastic bibcock', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(338, 1, 1, 'clear tape', 'clear tape', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(339, 1, 1, 'pipe spenners', '14 \'\' pipe spenners ', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(340, 1, 1, 'teflon tape', 'taflon tape', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(341, 1, 1, 'upvc solvent', 'upvc solvent', '-', 'ml', '0.00', '2019-02-23', '0000-00-00'),
(342, 1, 1, 'cpvc solvent', 'cpvc solvent', '-', 'ml', '0.00', '2019-02-23', '0000-00-00'),
(343, 1, 1, 'upvc pipe', '40 feet  1 1/2  upvc pipe', '-', 'Ft.', '0.00', '2019-02-23', '0000-00-00'),
(344, 1, 1, 'Upvc tee', '1  1/2  upvc tee', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(345, 1, 1, 'upvc m t ', '1  1/2 upvc m t', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(346, 1, 1, 'Long tank nipples', '  1/2  long tank  nipplea', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(347, 1, 1, 'g i  lion   ', '1/2 g.i  lion', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(348, 1, 1, 'g i elbow', '1/2 g i elbow', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(349, 1, 1, 'Brass balve', '1/2 Brass balve', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(350, 1, 1, 'brass m.t', '1/2  brass m.t', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(351, 1, 1, 'Cpvc pluge', '1\'\' cpvc plug', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(352, 1, 1, 'cpvc brass m.t', '1\'\' cpvc brass  m.t', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(353, 1, 1, 'g.i tee', '1 3/4  g.i  tee', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(354, 1, 1, 'pipe', '3 bundle pipe', '-', 'bundle', '0.00', '2019-02-23', '0000-00-00'),
(355, 1, 1, 'nippel ', '1/2 nippel', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(356, 1, 1, 'reduser', 'reduser', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(357, 1, 1, 'g.i clip', '1\'\' g.i clip', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(358, 1, 1, 'cable jointer', '25 sq cable jointer', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(359, 1, 1, 'nut bolt', '22 no.  nut bolt   for passenger  lift', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(360, 1, 1, 'cable jointer', '50 sq cable jointer ', '-', 'Nos', '0.00', '2019-02-23', '0000-00-00'),
(361, 1, 1, ' chemical', 'water proofing chemical', 'sunanda', 'Ltr', '0.00', '2019-02-25', '0000-00-00'),
(362, 1, 1, 'black granite', 'black granite', '-', 'Sqft', '0.00', '2019-02-25', '0000-00-00'),
(363, 1, 0, 'Polyalk WP ', '20 ltr', 'Kenny', 'Ltr', '166.00', '2019-03-08', '0000-00-00'),
(364, 1, 0, 'fRIGHT OUTWARD2', '435', 'BHAVYA', 'Nos', '1500.00', '2019-03-08', '0000-00-00'),
(365, 1, 0, 'tvs hex Head Bolt ', '1\" X 8\" ', 'Supreme ', 'Nos', '221.00', '2019-03-11', '0000-00-00'),
(366, 1, 0, 'ISI Washer', 'Washer', 'Supreme ', 'Kg', '120.00', '2019-03-11', '0000-00-00'),
(367, 1, 0, 'Spring Washer', '25mm', 'Supreme', 'Nos', '5.00', '2019-03-11', '0000-00-00'),
(368, 1, 0, ' s s sink ', '20X17', 'apollo', 'Piece', '1228.88', '2019-03-25', '0000-00-00'),
(369, 1, 0, 'rasin kit', 'B+H  1.43', 'apollo ', 'Piece', '380.00', '2019-03-25', '0000-00-00'),
(370, 1, 0, 'CEMENT', '', 'PRACHI', 'BAG', '273.43', '2019-03-25', '0000-00-00'),
(371, 1, 1, 'Screw Nut Bolt ', '2\'\' Nut Bolt for doors', 'ss', 'Box', '0.00', '2019-04-19', '0000-00-00'),
(372, 1, 1, 'Screw', '19x4 screw', 'ss', 'Box', '0.00', '2019-04-19', '0000-00-00'),
(373, 1, 1, 'cutter blade', 'cutter blade for grill', '-', 'Piece', '0.00', '2019-04-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_supplier`
--

CREATE TABLE `mst_supplier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `s_type` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `land_line` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `panno` varchar(11) NOT NULL,
  `adharno` varchar(25) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `pic_no` varchar(255) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_supplier`
--

INSERT INTO `mst_supplier` (`id`, `user_id`, `sub_user_id`, `s_type`, `name`, `email`, `contact`, `land_line`, `gender`, `panno`, `adharno`, `gst_no`, `pic_no`, `comp_name`, `dob`, `state`, `city`, `address`, `joining_date`, `record_date`, `update_date`) VALUES
(5, 1, 1, 'Mr', 'Raj Tattva', '', '9022736714', '', 'Male', 'AAACK4477C', '', '27AAACK4477C1ZN', '', 'Rajesh Life Spaces', '0000-00-00', '21', '1898', 'Kapurbawadi ', '0000-00-00', '2018-09-22', '2019-02-09'),
(6, 1, 1, 'Mr', 'Vesteria', 'vesteria29@gmail.com', '9820241481', '', 'Male', 'ALKPS8333B', '', '27ALKPS8333B1ZY', '', '', '0000-00-00', '21', '1797', '90 FT ROAD GHATKOPAR', '0000-00-00', '2018-09-26', '2018-12-24'),
(7, 1, 1, 'Mr', 'Berger paint india ltd (Anad salunke)', 'testing@neotech123.in', '9223310818', '', 'Male', 'AABCB0976E', '', '27AABCB0976E1ZV', '', '', '0000-00-00', '21', '1898', 'thane, mumbai', '0000-00-00', '2018-10-04', '0000-00-00'),
(8, 1, 1, 'Mr', 'Sonali Enterprises', 'sales@knconcept.in', '9766375691', '2266950050', 'Male', 'AAKFN4226B', '', '27AAKFN4226B1ZJ', '', 'Sonali Enterprises', '0000-00-00', '21', '1797', 'goregaon', '0000-00-00', '2018-10-06', '2018-10-06'),
(9, 1, 1, 'Mr', 'Rohin ', 'apollotile2009@gmail.com', '7379364228', '', 'Male', 'CDRPM2201D', '', '27CDRPM2201D1ZD', '', 'Apollo Studio', '0000-00-00', '21', '1797', 'Mumbra Panvel Road', '0000-00-00', '2018-10-06', '2018-12-22'),
(10, 1, 1, 'Mr', 'akar enterprises', 'pscs@prakashgroup.net.in', '9890622500', '2221635171', 'Male', 'AAUFP2672H', '', '27AAUFP2672H1ZP', '', '', '0000-00-00', '21', '1797', 'gawanpada mulund east', '0000-00-00', '2018-10-12', '0000-00-00'),
(11, 1, 1, 'Mr', 'Ashish Bhai', 'project@abhinavbuiltmat.com', '8451801009', '', 'Male', 'AAECA6505F', '', '27AAECA6505F1ZY', '', 'Abhinav Builtmat Pvt Ltd', '0000-00-00', '21', '1797', 'thane west', '0000-00-00', '2018-10-17', '0000-00-00'),
(12, 1, 1, 'Mr', 'Juganu Panchal', 'kvikprotection@gmail.com', '9619442542', '', 'Male', 'AUFPP2602J', '', '27AUFPP2602J1ZN', '', 'KVIK PROTECTION', '0000-00-00', '21', '1797', 's v road andheri west', '0000-00-00', '2018-12-14', '0000-00-00'),
(13, 1, 1, 'Mr', 'Ganesh ', '145@gmail.com', '9892137187', '', 'Male', 'AACCU2212P', '', '27AACCU2212P1Z7', '', '', '0000-00-00', '21', '1797', 'mahape navi mumbai', '0000-00-00', '2018-12-14', '0000-00-00'),
(14, 1, 1, 'Mr', 'Jugunu Panchal', 'sales@concepts.in', '7387340285', '', 'Male', 'APAPS8825E', '', '27APAPS8825E1ZP', '', '', '0000-00-00', '21', '1797', 'jogeshwari west', '0000-00-00', '2018-12-14', '0000-00-00'),
(15, 1, 1, 'Mr', 'Rajiv', 'info@dcstechno.com', '9440803696', '', 'Male', 'AABCD3102E', '', '36AABCD3102E1ZE', '', '', '0000-00-00', '2', '150', 'jubilee hills', '0000-00-00', '2018-12-14', '0000-00-00'),
(16, 1, 1, 'Mr', 'Jai Bhairav Laminate', 'jaibhairav@gmail.com', '9619510804', '', 'Male', 'AIWPB3603N', '', '27AIWPB3603N2ZW', '', '', '0000-00-00', '21', '1898', 'majiwada', '0000-00-00', '2018-12-14', '0000-00-00'),
(17, 1, 1, 'Mr', 'Naren patil ', 'narenpatil@yahoo.com', '9930823392', '', 'Male', 'AMNPP8577C', '', '27AMNPP8577C1ZG', '', 'V N Enterprises', '0000-00-00', '21', '1898', 'Patil Estate, kapurbawadi naka ', '0000-00-00', '2018-12-14', '0000-00-00'),
(18, 1, 1, 'Mr', 'Krishna Traders ', 'krishnatraders1996@gmail.com', '9890622501', '', 'Male', 'AALPC5333R', '', '27AALPC5333R1Z9', '', '', '0000-00-00', '21', '1797', 'jogeshwari east', '0000-00-00', '2018-12-15', '0000-00-00'),
(19, 1, 1, 'Mr', 'Devarm', 'unicusdoor@gmail.com', '9422493789', '', 'Male', 'ABWPP5861B', '', '27ABWPP5861B1Z7', '', '', '0000-00-00', '21', '1846', 'Khalapur', '0000-00-00', '2018-12-22', '0000-00-00'),
(20, 1, 1, 'Mr', 'New Bombay', 'nbht@nbhtpl.com', '9594521111', '', 'Male', 'AAACN3954B', '', '27AAACN3954B1ZQ', '', '', '0000-00-00', '21', '1797', 'Turbhe , Navi Mumbai', '0000-00-00', '2018-12-24', '0000-00-00'),
(21, 1, 1, 'Mr', 'Md Alam', 'alam.alam57@gmail.com', '8879026414', '', 'Male', 'EWZTS3707R', '', '27EWZTS3707R1Z4', '', 'Muskan Fabrications', '0000-00-00', '21', '1797', 'Ulva Navi Mumbai', '0000-00-00', '2018-12-24', '0000-00-00'),
(22, 1, 1, 'Mr', 'Salam', 'lanterns2led@gmail.com', '9699398140', '', 'Male', 'CCIPB4417L', '', '27CCIPB4417L1ZK', '', 'LANTERNS 2 LED', '0000-00-00', '21', '1797', 'Neral East, Navi Mumbai ', '0000-00-00', '2018-12-24', '0000-00-00'),
(23, 1, 1, 'Mr', 'Piyush Patel', '', '9619689338', '', 'Male', 'BGGPP4182B', '', '27BGGPP4182B1ZG', '', 'Macro Enterprise', '0000-00-00', '21', '1797', 'Koparkhairne', '0000-00-00', '2018-12-27', '2018-12-27'),
(24, 1, 0, 'Mr', 'charbhuja', '', '9004234101', '', 'Male', 'ADNPC1032C', '', '27ADNPC1032C1Z8', '', 'Charbhuja Traders', '0000-00-00', '21', '1898', 'Kapurbawadi', '0000-00-00', '2019-01-02', '2019-03-11'),
(25, 1, 1, 'Mr', 'serato', '', '9619480135', '', 'Male', 'ADJPV5047J', '', '27ADJPV5047J1ZZ', '', 'serato International Development Limited', '0000-00-00', '21', '1797', 'Turbhe Navi Mumbai ', '0000-00-00', '2019-01-02', '2019-02-09'),
(29, 1, 1, 'Mr', 'Chaudhary', '', '9082763272', '', 'Male', 'BLRPC0949R', '', '27BLRPC0949R1ZB', '', 'Dhanlaxmi Granite & Marble ', '0000-00-00', '21', '1898', 'Sasunaghar Villege ', '0000-00-00', '2019-02-09', '2019-02-09'),
(30, 1, 0, 'Mr', 'DCS', 'abhay@dcstechno.com', '8886886103', '', 'Male', 'AABCD3102E', '', '27AABCD3102E1ZD', '', 'DCS TECHNO SERVICES PVT LTD.', '0000-00-00', '21', '1898', 'CBD BELAPUR', '0000-00-00', '2019-02-19', '0000-00-00'),
(31, 1, 0, 'Mr', 'TACHION', 'account@tachion-india.com', '9820290193', '02227790273', 'Male', 'AADCT5240R', '', '27AADCT5240R1ZT', '', 'TACHION ELECTRICALS AND CONTROLS PVT LTD', '0000-00-00', '21', '1898', 'PLOT NO.8, SECTOR1, AIROLI NAKA, AIROLI, NAVI MUMBAI-400708', '0000-00-00', '2019-02-19', '0000-00-00'),
(32, 1, 0, 'Mr', 'TURBHE', 'turbheironandsteel@gmail.com', '8693814085', '02227834502', 'Male', 'AAACT4498A', '', '27AAACT4498A1ZD', '', 'TURBHE IRON & STEEL TRADING PVT LTD', '0000-00-00', '21', '1898', 'PLOT NO.102(A), TURBHE SERVICE INDUSTRIAL AREA, NEAR JANTA MARKET SEC23, TURBHE, NAVI MUMBAI -400705', '0000-00-00', '2019-02-19', '0000-00-00'),
(33, 1, 0, 'Miss', 'BHAVYA', 'shaileshchopra2028@yahoo.com', '9869320330', '', 'Female', 'AFBPC2870G', '', '27AFBPC2870G1ZS', '', 'BHAVYA CERAMICS', '0000-00-00', '21', '1797', 'SANTACRUZ', '0000-00-00', '2019-02-19', '0000-00-00'),
(34, 1, 0, 'Mr', 'Harsha', 'harshawardhan.kenny@gmail.com', '9820021157', '', 'Male', 'AKVPK4074H', '', '27AKVPK4074H1ZN', '', 'KENNY ENTERPRISES', '0000-00-00', '21', '1898', 'ULWE', '0000-00-00', '2019-03-08', '0000-00-00'),
(35, 1, 0, 'Mr', 'Supreme', 'supremehardware17@gmail.com', '8359975995', '', 'Male', 'ANMPS6054M', '', '27ANMPS6054M1Z7', '', 'SUPREME HARDWARE', '0000-00-00', '21', '1898', 'TURBHE', '0000-00-00', '2019-03-11', '0000-00-00'),
(36, 1, 0, 'Mr', 'PRACHI ENTERPRISES', 'prachienterprises93@gmail.com', '9320071771', '', 'Male', 'ALMPP5972H', '', '27ALMPP972H1ZG', '', 'PRACHI ENTERPRSES', '0000-00-00', '21', '1898', 'KHARGHAR', '0000-00-00', '2019-03-25', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_task`
--

CREATE TABLE `mst_task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_task`
--

INSERT INTO `mst_task` (`id`, `user_id`, `sub_user_id`, `description`, `record_date`, `update_date`) VALUES
(1, 1, 0, 'Plaster', '2018-08-11', '0000-00-00'),
(2, 1, 0, 'Painting', '2018-10-30', '0000-00-00'),
(3, 1, 0, 'Grinding', '2018-08-16', '2018-08-30'),
(5, 1, 0, 'Fabrication', '2018-08-29', '0000-00-00'),
(6, 1, 0, 'Steel Cutting', '2018-09-11', '0000-00-00'),
(8, 1, 0, 'Carpentry Work', '2018-09-11', '0000-00-00'),
(9, 1, 1, 'Excavation', '2018-10-17', '0000-00-00'),
(10, 1, 1, 'Backfilling', '2018-10-17', '0000-00-00'),
(11, 1, 1, 'PCC', '2018-10-17', '0000-00-00'),
(12, 1, 1, 'RCC', '2018-10-17', '0000-00-00'),
(13, 1, 1, 'Formwork', '2018-10-17', '0000-00-00'),
(14, 1, 1, 'Internal Painting', '2018-10-17', '0000-00-00'),
(15, 1, 1, 'External Painting', '2018-10-17', '0000-00-00'),
(16, 1, 1, 'Water Proofing', '2018-10-17', '0000-00-00'),
(17, 1, 1, 'Doors', '2018-10-17', '0000-00-00'),
(18, 1, 1, 'Windows', '2018-10-17', '0000-00-00'),
(19, 1, 0, 'Trimix', '2018-12-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_unit`
--

CREATE TABLE `mst_unit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_unit`
--

INSERT INTO `mst_unit` (`id`, `user_id`, `sub_user_id`, `unit`, `record_date`, `update_date`) VALUES
(2, 1, 0, 'SQM', '2018-08-11', '0000-00-00'),
(3, 1, 0, 'CUM', '2018-08-11', '2018-08-11'),
(4, 1, 0, 'RM', '2018-08-11', '0000-00-00'),
(5, 1, 0, 'BAG', '2018-08-11', '0000-00-00'),
(6, 1, 0, 'Quintal', '2018-08-11', '0000-00-00'),
(7, 1, 0, 'Brass', '2018-08-16', '0000-00-00'),
(8, 1, 0, 'Box - 100', '2018-08-22', '2018-08-29'),
(9, 1, 0, 'Box - 200', '2018-08-29', '0000-00-00'),
(10, 1, 0, 'Box - 50', '2018-08-29', '0000-00-00'),
(11, 1, 0, 'Box', '2018-08-29', '0000-00-00'),
(12, 1, 0, 'Number', '2018-09-19', '0000-00-00'),
(13, 1, 1, 'BAG 40kg', '2018-09-26', '0000-00-00'),
(14, 1, 1, 'BAG 35Kg', '2018-09-26', '0000-00-00'),
(15, 1, 1, 'Box - 6', '2018-09-26', '2018-10-06'),
(16, 1, 1, 'Ltr', '2018-10-04', '0000-00-00'),
(17, 1, 1, 'Sqft', '2018-10-17', '2019-02-09'),
(18, 1, 1, 'Roll', '2018-10-29', '0000-00-00'),
(19, 1, 1, 'Bags 30 kg', '2018-12-15', '0000-00-00'),
(20, 1, 1, 'Box-10', '2018-12-22', '0000-00-00'),
(21, 1, 1, 'Bundle - 12', '2018-12-24', '0000-00-00'),
(22, 1, 1, 'Kg', '2018-12-24', '0000-00-00'),
(23, 1, 1, 'Pack', '2018-12-24', '0000-00-00'),
(24, 1, 1, 'Nos', '2018-12-24', '0000-00-00'),
(25, 1, 1, 'pair', '2018-12-24', '0000-00-00'),
(26, 1, 1, 'BUNDLE 100M', '2018-12-24', '0000-00-00'),
(27, 1, 1, 'RFT', '2018-12-27', '0000-00-00'),
(28, 1, 1, 'Piece', '2018-12-27', '0000-00-00'),
(29, 1, 1, 'Hrs', '2019-01-31', '0000-00-00'),
(30, 1, 1, 'Ft.', '2019-02-17', '0000-00-00'),
(31, 1, 1, 'bundle 25  RM', '2019-02-21', '0000-00-00'),
(32, 1, 1, 'bundle', '2019-02-21', '0000-00-00'),
(33, 1, 1, 'mtr', '2019-02-21', '0000-00-00'),
(34, 1, 1, 'gm', '2019-02-21', '0000-00-00'),
(35, 1, 1, 'ml', '2019-02-22', '0000-00-00'),
(36, 1, 1, 'bottle', '2019-02-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_vender`
--

CREATE TABLE `mst_vender` (
  `v_id` int(255) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_contact` int(255) NOT NULL,
  `v_email` varchar(255) NOT NULL,
  `v_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_payment`
--

CREATE TABLE `new_payment` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `packageid` int(11) NOT NULL,
  `fix_commission` decimal(10,0) NOT NULL,
  `comp_amount` decimal(10,0) NOT NULL,
  `packg_cost` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_project`
--

CREATE TABLE `new_project` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `owner_name` varchar(250) NOT NULL,
  `maharera_no` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_sale_area` varchar(255) NOT NULL,
  `neo_allow_area` varchar(255) NOT NULL,
  `neo_allow_rate` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_project`
--

INSERT INTO `new_project` (`id`, `user_id`, `sub_user_id`, `pro_name`, `owner_name`, `maharera_no`, `state`, `city`, `address`, `total_sale_area`, `neo_allow_area`, `neo_allow_rate`, `start_date`, `end_date`, `record_date`, `update_date`) VALUES
(1, 1, 0, 'Rajtattva ', 'Rajtattva ', '', '1', '1898', ' ghodbandar road. ', '10000', '1000', '950', '2017-08-01', '2019-01-15', '2018-09-07', '2018-12-07'),
(2, 1, 0, 'Mateshwari ', 'Mateshwari', '', '21', '1739', 'sheel fata', '50000', '15000', '750', '0000-00-00', '0000-00-00', '2018-09-07', '0000-00-00'),
(3, 1, 0, ' Balaji world ', 'Balaji', '', '21', '1739', 'Kalyan ', '45000', '2000', '1000', '0000-00-00', '0000-00-00', '2018-09-07', '0000-00-00'),
(4, 1, 0, 'Green gate ', 'Green Gate', '', '17', '1292', ' Mangalore. ', '300000', '2000', '5000', '0000-00-00', '0000-00-00', '2018-09-07', '2018-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `cost` decimal(53,2) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `cost`, `description`, `status`) VALUES
(1, 'Invoice', '2500.00', 'Account Software ', 1),
(2, 'Invoice And CRM', '2999.00', 'Account Software with CRM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `invoice_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(53,2) DEFAULT NULL,
  `notes` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `sub_user_id`, `invoice_id`, `date`, `amount`, `notes`) VALUES
(1, 1, 0, 1, '2018-06-04', '36000.00', 'Cheque no.010010'),
(2, 1, 0, 15, '2018-06-14', '8850.00', 'Cash'),
(3, 1, 0, 12, '2018-06-14', '719.00', 'Cash'),
(4, 1, 0, 21, '2018-06-23', '1000.00', 'Card'),
(5, 1, 0, 21, '2018-06-23', '121.00', 'Cash'),
(6, 1, 0, 22, '2018-07-31', '8850.00', 'Cash'),
(7, 1, 0, 22, '2018-07-31', '121.00', 'Cash'),
(8, 1, 0, 17, '2019-01-18', '1008.00', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `pay_info`
--

CREATE TABLE `pay_info` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `bill_date` date NOT NULL,
  `amount` decimal(52,2) NOT NULL,
  `tax_value` decimal(53,2) NOT NULL,
  `tax_amt` decimal(52,2) NOT NULL,
  `sgst` decimal(52,2) NOT NULL,
  `cgst` decimal(52,2) NOT NULL,
  `total_amt` decimal(52,2) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '''Paid'' ''Received''',
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_info`
--

INSERT INTO `pay_info` (`id`, `user_id`, `sub_user_id`, `name`, `payment_date`, `bill_no`, `bill_date`, `amount`, `tax_value`, `tax_amt`, `sgst`, `cgst`, `total_amt`, `type`, `record_date`, `update_date`) VALUES
(2, 1, 0, 'Rahul ', '2018-08-13', 'Bill1520', '2018-08-13', '8250.00', '12.00', '990.00', '495.00', '495.00', '9240.00', 'Paid', '2018-08-13', '2018-08-16'),
(3, 1, 0, 'Amit Ranawade', '2018-08-16', 'B-123', '2018-08-16', '1000.00', '12.00', '120.00', '60.00', '60.00', '1120.00', 'Receive', '2018-08-16', '2018-08-16'),
(4, 1, 0, 'Raj', '2018-08-16', 'B145', '2018-08-16', '1500.00', '12.00', '180.00', '90.00', '90.00', '1680.00', 'Paid', '2018-08-16', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `hsn_code` varchar(255) NOT NULL,
  `description` longtext,
  `base_price` decimal(53,2) NOT NULL,
  `units` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `sub_user_id`, `reference`, `hsn_code`, `description`, `base_price`, `units`, `sold`, `created_at`, `updated_at`, `session`) VALUES
(1, 1, 0, 'Software', '564111', 'Invoice And CRM', '5999.00', NULL, 8, '2018-06-04 07:02:05', '2018-06-23 07:57:12', '2018-06-000320-STO'),
(2, 1, 0, 'printing', '654211', 'I-Cards Printing', '20.00', NULL, 50, '2018-06-04 07:27:49', '2018-06-23 07:41:31', '2018-06-000318-STO'),
(3, 1, 0, 'Cloths', '9874611', 'Shirts', '1500.00', NULL, 16, '2018-06-08 10:56:27', '2018-06-16 09:58:42', '2018-06-000312-STO'),
(4, 1, 0, '', '5410000', 'sdfsf', '500.00', NULL, 0, '2018-06-08 11:09:30', '2018-06-08 11:11:33', '2018-06-000275-STO'),
(5, 1, 0, '', '', '', '0.00', NULL, NULL, '2018-06-12 17:02:55', '0000-00-00 00:00:00', ''),
(6, 1, 0, 'test', '546111', 'Testing', '120.00', NULL, NULL, '2018-07-24 13:52:47', '2018-07-24 13:53:30', ''),
(7, 1, 0, 'Books', '001', 'History Books', '200.00', NULL, 50, '2018-08-29 11:32:16', '0000-00-00 00:00:00', '2018-08-000346-STO'),
(8, 1, 0, 'Painting Work', '', 'Neotech Painting Work for 10 Floors', '2000000.00', NULL, NULL, '2018-08-29 11:36:51', '0000-00-00 00:00:00', ''),
(9, 1, 0, 'Testing', 'Test', 'testing', '4000.00', NULL, 32, '2018-08-29 12:28:09', '2019-01-23 10:38:18', '2019-01-000377-STO');

-- --------------------------------------------------------

--
-- Table structure for table `project_team`
--

CREATE TABLE `project_team` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `job_title` varchar(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `availability` int(255) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_team`
--

INSERT INTO `project_team` (`id`, `user_id`, `sub_user_id`, `emp_id`, `pro_id`, `job_title`, `start_date`, `end_date`, `availability`, `record_date`, `update_date`) VALUES
(1, 1, 0, 1, 1, 'PM1', '2018-09-07', '2018-09-30', 0, '2018-09-07', '0000-00-00'),
(2, 1, 0, 3, 2, 'PM2', '2018-09-07', '2018-09-30', 0, '2018-09-07', '0000-00-00'),
(3, 1, 0, 4, 3, 'PM3', '2018-09-07', '2018-09-30', 0, '2018-09-07', '0000-00-00'),
(4, 1, 0, 5, 4, 'PM4', '2018-09-07', '2018-09-30', 0, '2018-09-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `purches_tax`
--

CREATE TABLE `purches_tax` (
  `id` int(11) NOT NULL,
  `purches_id` int(11) NOT NULL,
  `tax_value` decimal(53,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purches_tax`
--

INSERT INTO `purches_tax` (`id`, `purches_id`, `tax_value`) VALUES
(1, 1, '12.00'),
(2, 2, '18.00'),
(3, 3, '18.00'),
(4, 4, '12.00'),
(5, 5, '28.00');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `first_number` int(20) DEFAULT '1' COMMENT 'This is for Invoices',
  `estimates` int(11) NOT NULL DEFAULT '1',
  `profarmas` int(11) NOT NULL DEFAULT '1',
  `challans` int(11) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `user_id`, `name`, `value`, `first_number`, `estimates`, `profarmas`, `challans`, `enabled`) VALUES
(5, 1, 'Supplier  Invoice', '1', 10, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `unit_id` varchar(50) NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `qty` int(255) NOT NULL,
  `amount` decimal(52,2) NOT NULL,
  `tax_value` decimal(53,2) NOT NULL,
  `tax_amt` decimal(52,2) NOT NULL,
  `total_amt` decimal(52,2) NOT NULL,
  `sgst` decimal(52,2) NOT NULL,
  `cgst` decimal(52,2) NOT NULL,
  `material_supp_date` date NOT NULL,
  `paid_amt` decimal(52,2) NOT NULL,
  `balence_amt` decimal(52,2) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `user_id`, `sub_user_id`, `supp_id`, `material_name`, `bill_date`, `bill_no`, `unit_id`, `rate`, `qty`, `amount`, `tax_value`, `tax_amt`, `total_amt`, `sgst`, `cgst`, `material_supp_date`, `paid_amt`, `balence_amt`, `record_date`, `update_date`) VALUES
(2, 1, 0, 3, '3', '2018-08-16', 'Bill1520', 'BAG', '300.00', 50, '15000.00', '12.00', '1800.00', '16800.00', '900.00', '900.00', '2018-08-17', '16800.00', '0.00', '2018-08-17', '0000-00-00'),
(3, 1, 0, 4, '6', '2018-08-22', '001', '500Box', '40000.00', 10, '400000.00', '28.00', '112000.00', '512000.00', '56000.00', '56000.00', '2018-08-30', '0.00', '512000.00', '2018-08-29', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_triple` tinyint(1) DEFAULT NULL,
  `triple_namespace` varchar(100) DEFAULT NULL,
  `triple_key` varchar(100) DEFAULT NULL,
  `triple_value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagging`
--

CREATE TABLE `tagging` (
  `id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `taggable_model` varchar(30) DEFAULT NULL,
  `taggable_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sgst` varchar(255) DEFAULT NULL,
  `cgst` varchar(255) NOT NULL,
  `igst` varchar(100) NOT NULL,
  `value` decimal(53,2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1' COMMENT '1-active 0-inactive',
  `is_default` tinyint(1) DEFAULT '0' COMMENT '1-active 0-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `sgst`, `cgst`, `igst`, `value`, `active`, `is_default`) VALUES
(1, 'GST', 'SGST @ 2.5% ', ' CGST @ 2.5%', 'IGST @ 5%', '5.00', 1, 1),
(2, 'GST', 'SGST @ 6%', ' CGST @ 6%', 'IGST @ 12%\n', '12.00', 1, 1),
(3, 'GST', 'SGST @ 9%', 'CGST @ 9%', 'IGST @ 18%', '18.00', 1, 1),
(4, 'GST', 'SGST @ 14%', 'CGST @ 14%', 'IGST @ 28%\n', '28.00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_debit`
--

CREATE TABLE `tbl_debit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `debit_no` varchar(255) NOT NULL,
  `debit_date` date NOT NULL,
  `ref_po_no` varchar(255) NOT NULL,
  `ref_po_date` date NOT NULL,
  `terms` text NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_debit`
--

INSERT INTO `tbl_debit` (`id`, `user_id`, `sub_user_id`, `po_id`, `supp_id`, `debit_no`, `debit_date`, `ref_po_no`, `ref_po_date`, `terms`, `create_date`, `update_date`) VALUES
(1, 1, 0, 3, 7, 'Do001', '2018-12-06', 'PO003', '2018-12-05', '1. Please pay your invoice within seven daysÂ \r\n2. Cheque and DDâ€™s to be drawn on â€˜Neotech Constructions Pvt. Ltd.â€™Â \r\n3. Subject to Navi Mumbai Jurisdiction\r\n\r\nThank you for your business', '2018-12-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_debit_materials`
--

CREATE TABLE `tbl_debit_materials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `debit_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `base_amt` decimal(52,2) NOT NULL,
  `tax_value` decimal(52,2) NOT NULL,
  `tax_amt` decimal(52,2) NOT NULL,
  `total_amt` decimal(52,2) NOT NULL,
  `comment` text NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `po_mate_record_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_debit_materials`
--

INSERT INTO `tbl_debit_materials` (`id`, `user_id`, `sub_user_id`, `debit_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `rate`, `base_amt`, `tax_value`, `tax_amt`, `total_amt`, `comment`, `state_code`, `po_mate_record_id`, `created_date`, `update_date`) VALUES
(1, 1, 0, 1, 1, 9, 'Wether coat Ext primer prolinks', 'Ltr', 5, '25.00', '125.00', '0.00', '0.00', '125.00', '', '27', 3, '2018-12-05', '2018-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_planning`
--

CREATE TABLE `tbl_planning` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_st_date` date NOT NULL,
  `pro_ed_date` date NOT NULL,
  `task_id` int(11) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `end_date` varchar(25) NOT NULL,
  `total_work_days` int(11) NOT NULL,
  `total_work_plan` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po`
--

CREATE TABLE `tbl_po` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `po_no` varchar(255) NOT NULL,
  `po_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `base_amt` decimal(52,2) NOT NULL,
  `tax_value` varchar(255) NOT NULL,
  `tax_amt` decimal(52,2) NOT NULL,
  `grand_total` decimal(52,2) NOT NULL,
  `terms` text NOT NULL,
  `comment` text NOT NULL,
  `session_no` varchar(255) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po`
--

INSERT INTO `tbl_po` (`id`, `user_id`, `sub_user_id`, `req_id`, `pro_id`, `supp_id`, `mate_id`, `description`, `unit`, `po_no`, `po_date`, `qty`, `rate`, `base_amt`, `tax_value`, `tax_amt`, `grand_total`, `terms`, `comment`, `session_no`, `record_date`, `update_date`) VALUES
(2, 1, 0, 2, 0, 11, 0, 'null', 'null', '001', '2018-11-14', 450, '50.00', '22500.00', '12.00', '2700.00', '25200.00', '1. Please pay your invoice within seven daysÂ \r\n2. Cheque and DDâ€™s to be drawn on â€˜Neotech Constructions Pvt. Ltd.â€™Â \r\n3. Subject to Navi Mumbai Jurisdiction\r\n\r\nThank you for your business', 'null', '2', '2018-11-21', '2018-11-21'),
(3, 1, 0, 0, 1, 7, 0, 'null', 'null', 'PO003', '2018-12-05', 100, '25.00', '2500.00', 'null', '0.00', '2500.00', '1. Please pay your invoice within seven daysÂ \r\n2. Cheque and DDâ€™s to be drawn on â€˜Neotech Constructions Pvt. Ltd.â€™Â \r\n3. Subject to Navi Mumbai Jurisdiction\r\n\r\nThank you for your business', 'null', '2018-12-000359-STO', '2018-12-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_matrials`
--

CREATE TABLE `tbl_po_matrials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `rate` decimal(52,2) NOT NULL,
  `base_amt` decimal(52,2) NOT NULL,
  `tax_value` decimal(52,2) NOT NULL,
  `tax_amt` decimal(52,2) NOT NULL,
  `total_amt` decimal(52,2) NOT NULL,
  `comment` text NOT NULL,
  `state_code` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sesssion_no` varchar(255) NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_matrials`
--

INSERT INTO `tbl_po_matrials` (`id`, `user_id`, `sub_user_id`, `po_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `rate`, `base_amt`, `tax_value`, `tax_amt`, `total_amt`, `comment`, `state_code`, `status`, `sesssion_no`, `record_date`, `update_date`) VALUES
(2, 1, 0, 2, 1, 57, 'PP Sheet 2mm Gray 48\'\'X72\'\'', 'Number', 450, '50.00', '22500.00', '12.00', '2700.00', '25200.00', '', '27', '1', '2', '2018-11-21', '2018-11-21'),
(3, 1, 0, 3, 1, 9, 'Wether coat Ext primer prolinks', 'Ltr', 100, '25.00', '2500.00', '0.00', '0.00', '2500.00', '', '27', '1', '2018-12-000359-STO', '2018-12-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`id`, `session_id`) VALUES
(1, '381');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sign_up`
--

CREATE TABLE `tbl_sign_up` (
  `id` int(11) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `record_date` date NOT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `first_digit` varchar(10) NOT NULL,
  `state_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `name`, `first_digit`, `state_code`) VALUES
(1, 'Andaman & Nicobar ', 'AN', 35),
(2, 'Andhra Pradesh ', 'AP', 28),
(3, 'Arunachal Pradesh ', 'AR', 12),
(4, 'Assam ', 'AS', 18),
(5, 'Bihar ', 'BR', 10),
(6, 'Chandigarh ', 'CH', 22),
(7, 'Chhattisgarh ', 'CG', 4),
(8, 'Dadra & Nagar Haveli ', 'DN', 26),
(9, 'Daman & Diu ', 'DD', 25),
(10, 'Delhi ', 'DL', 7),
(11, 'Goa ', 'GA', 30),
(12, 'Gujarat ', 'GJ', 24),
(13, 'Haryana ', 'HR', 6),
(14, 'Himachal Pradesh ', 'HP', 2),
(15, 'Jammu & Kashmir ', 'JK', 1),
(16, 'Jharkhand ', 'JH', 20),
(17, 'Karnataka ', 'KR', 29),
(18, 'Kerala ', 'KL', 32),
(19, 'Lakshadweep ', 'LD', 31),
(20, 'Madhya Pradesh ', 'MP', 23),
(21, 'Maharashtra ', 'MH', 27),
(22, 'Manipur ', 'MN', 14),
(23, 'Meghalaya ', 'ML', 17),
(24, 'Mizoram ', 'MM', 15),
(25, 'Nagaland ', 'NL', 13),
(26, 'Orissa ', 'OR', 21),
(27, 'Pondicherry ', 'PC', 34),
(28, 'Punjab ', 'PJ', 3),
(29, 'Rajasthan ', 'RJ', 8),
(30, 'Sikkim ', 'SK', 11),
(31, 'Tamil Nadu ', 'TN', 33),
(32, 'Tripura ', 'TR', 16),
(33, 'Uttar Pradesh ', 'UP', 9),
(34, 'Uttarakhand', 'UK', 5),
(35, 'West Bengal ', 'WB', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work`
--

CREATE TABLE `tbl_work` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `cont_id` varchar(255) NOT NULL,
  `work_type` varchar(255) NOT NULL,
  `area` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `unit` varchar(11) NOT NULL,
  `value` int(255) NOT NULL,
  `no_of_dayes` int(11) NOT NULL,
  `terms` text NOT NULL,
  `record_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_work`
--

INSERT INTO `tbl_work` (`id`, `user_id`, `sub_user_id`, `date`, `pro_id`, `cont_id`, `work_type`, `area`, `rate`, `unit`, `value`, `no_of_dayes`, `terms`, `record_date`, `update_date`) VALUES
(10, 1, 0, '2018-12-04', '2', '6', '1', 900, 100, 'Brass', 90000, 60, '1. Please pay your invoice within seven daysÂ \r\n2. Cheque and DDâ€™s to be drawn on â€˜Neotech Constructions Pvt. Ltd.â€™Â \r\n3. Subject to Navi Mumbai Jurisdiction\r\n\r\nThank you for your business', '2018-12-10', '0000-00-00'),
(11, 1, 0, '2018-12-03', '2', '6', '19', 10000, 60, 'Sq meter ', 600000, 30, '1. Please pay your invoice within seven daysÂ \r\n2. Cheque and DDâ€™s to be drawn on â€˜Neotech Constructions Pvt. Ltd.â€™Â \r\n3. Subject to Navi Mumbai Jurisdiction\r\n\r\nThank you for your business', '2018-12-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` date DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-received,0-not received',
  `hash` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `comp_name`, `name`, `username`, `password`, `contact`, `is_active`, `is_super_admin`, `last_login`, `start_date`, `end_date`, `payment_status`, `hash`, `created_at`, `updated_at`, `type`) VALUES
(1, 'NEOTECH Construction Pvt. Ltd', 'NEOTECH Admin', 'engineers.neotech@gmail.com', 'admin', '8169179011', 1, 1, NULL, '2018-03-15', '2018-03-27', 0, '', '2018-03-14', '2019-02-15', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `invoice` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `customer` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `estimates` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `product` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `expenses` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `gst_mod` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `name`, `mobile`, `email`, `password`, `permission`, `invoice`, `customer`, `estimates`, `product`, `expenses`, `gst_mod`, `type`) VALUES
(1, 1, 'PM1 Rajtattva Thane', '9845632100', 'pm1.rajt.thane@gmail.com', 'user', 'project,master,material', 'Yes', 'No', 'Yes', 'No', 'Yes', 'Yes', 'user'),
(3, 1, 'PM2 Mateshwari Kalyan', '9874563210', 'pm2.mate.kalya@gmail.com', 'user', 'project,master,material', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'user'),
(4, 1, 'PM3 Balaji world Kalyan', '7896547854', 'pm3.bala.kalya@gmail.com', 'user', 'project,master,material', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'user'),
(5, 1, 'PM4 Green gate Mangalore', '8795874698', 'pm4.gree.manga@gmail.com', 'user', 'project,master,material', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_head`
--
ALTER TABLE `acc_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_partner`
--
ALTER TABLE `channel_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common`
--
ALTER TABLE `common`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_details`
--
ALTER TABLE `contractor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_labour`
--
ALTER TABLE `daily_labour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_material_consuption`
--
ALTER TABLE `daily_material_consuption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_material_requisition`
--
ALTER TABLE `daily_material_requisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_works`
--
ALTER TABLE `daily_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat_booking`
--
ALTER TABLE `flat_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_tax`
--
ALTER TABLE `item_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_invoice_gen`
--
ALTER TABLE `material_invoice_gen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_procurement`
--
ALTER TABLE `material_procurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_stock`
--
ALTER TABLE `material_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_contractor`
--
ALTER TABLE `mst_contractor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_customer`
--
ALTER TABLE `mst_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_employee`
--
ALTER TABLE `mst_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_material`
--
ALTER TABLE `mst_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_task`
--
ALTER TABLE `mst_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_unit`
--
ALTER TABLE `mst_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_vender`
--
ALTER TABLE `mst_vender`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `new_payment`
--
ALTER TABLE `new_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_project`
--
ALTER TABLE `new_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_info`
--
ALTER TABLE `pay_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_team`
--
ALTER TABLE `project_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purches_tax`
--
ALTER TABLE `purches_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagging`
--
ALTER TABLE `tagging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_debit`
--
ALTER TABLE `tbl_debit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_debit_materials`
--
ALTER TABLE `tbl_debit_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_planning`
--
ALTER TABLE `tbl_planning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_po`
--
ALTER TABLE `tbl_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_po_matrials`
--
ALTER TABLE `tbl_po_matrials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sign_up`
--
ALTER TABLE `tbl_sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work`
--
ALTER TABLE `tbl_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_head`
--
ALTER TABLE `acc_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `channel_partner`
--
ALTER TABLE `channel_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2886;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `common`
--
ALTER TABLE `common`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contractor_details`
--
ALTER TABLE `contractor_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `daily_labour`
--
ALTER TABLE `daily_labour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily_material_consuption`
--
ALTER TABLE `daily_material_consuption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daily_material_requisition`
--
ALTER TABLE `daily_material_requisition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daily_works`
--
ALTER TABLE `daily_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `flat_booking`
--
ALTER TABLE `flat_booking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `item_tax`
--
ALTER TABLE `item_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material_invoice_gen`
--
ALTER TABLE `material_invoice_gen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `material_procurement`
--
ALTER TABLE `material_procurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=810;

--
-- AUTO_INCREMENT for table `material_stock`
--
ALTER TABLE `material_stock`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mst_contractor`
--
ALTER TABLE `mst_contractor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_customer`
--
ALTER TABLE `mst_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_employee`
--
ALTER TABLE `mst_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mst_material`
--
ALTER TABLE `mst_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;

--
-- AUTO_INCREMENT for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mst_task`
--
ALTER TABLE `mst_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mst_unit`
--
ALTER TABLE `mst_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mst_vender`
--
ALTER TABLE `mst_vender`
  MODIFY `v_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_payment`
--
ALTER TABLE `new_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_project`
--
ALTER TABLE `new_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pay_info`
--
ALTER TABLE `pay_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_team`
--
ALTER TABLE `project_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purches_tax`
--
ALTER TABLE `purches_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagging`
--
ALTER TABLE `tagging`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_debit`
--
ALTER TABLE `tbl_debit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_debit_materials`
--
ALTER TABLE `tbl_debit_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_planning`
--
ALTER TABLE `tbl_planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_po`
--
ALTER TABLE `tbl_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_po_matrials`
--
ALTER TABLE `tbl_po_matrials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_session`
--
ALTER TABLE `tbl_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sign_up`
--
ALTER TABLE `tbl_sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_work`
--
ALTER TABLE `tbl_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
