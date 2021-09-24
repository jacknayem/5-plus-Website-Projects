-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 10:00 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osenp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chefs_info`
--

CREATE TABLE `chefs_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chefs_info`
--

INSERT INTO `chefs_info` (`id`, `name`, `position`, `email`, `image`) VALUES
(1, 'jack Nayem', 'chief', 'jacknayem@yahoo.com', 0x696d616765732f63686566732f35616564303263383964366633323031382d30352d30352d30332d30332d303463686566735f626f792e6a7067),
(4, 'Sinthia', 'Cooker', 'sinthia@gmail.com', 0x696d616765732f63686566732f35616564306261393762343964323031382d30352d30352d30332d34302d35377465616d332e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `date`) VALUES
(1, 'Jack', 'jack@g.com', 'Thanks', '2018-04-20 23:12:33'),
(3, 'Mehdi', 'Mehdi@gmail.com', 'I am so happy to get this survice', '2018-04-21 11:13:19'),
(4, 'Mehdi', 'Mehdi@gmail.com', 'I am so happy to get this survice', '2018-04-21 11:30:37'),
(5, 'Mehdi', 'Mehdi@gmail.com', 'I am so happy to get this survice', '2018-04-21 11:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_month_specials`
--

CREATE TABLE `gallery_month_specials` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `fname` varchar(30) NOT NULL,
  `fdiscription` varchar(100) NOT NULL,
  `fprice` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_month_specials`
--

INSERT INTO `gallery_month_specials` (`id`, `image`, `fname`, `fdiscription`, `fprice`) VALUES
(1, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356165373166363733323031382d30342d33302d32302d30352d323770322e6a7067, 'Sushi mix	', '5 pieces Sushi Saumon et 5 pieces Sushi Thon	', '4.50'),
(2, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356337386135376636323031382d30342d33302d32302d31322d303870332e6a7067, 'Sashimi Saumon big', '12 pieces + 1 Riz', '6.50'),
(3, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356361383137363730323031382d30342d33302d32302d31322d353670342e6a7067, 'Sashimi Saumon', '6 pieces', '5.00'),
(4, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356365303437643739323031382d30342d33302d32302d31332d353270352e6a7067, 'Sashimi Thon', '6 pieces', '7.00'),
(5, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356435373238353636323031382d30342d33302d32302d31352d353170362e6a7067, 'Sashimi Thon Big', '12 pieces', '12.00'),
(6, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356439346566373739323031382d30342d33302d32302d31362d353270332e6a7067, 'Sashimi Mix', '(6pieces Saumon et 6 pieces thon)+ 1 Riz	', '15.00'),
(7, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356463353065363638323031382d30342d33302d32302d31372d343170362e6a7067, 'California Mix', 'California Avocat Saumon 8 pieces	', '6.00'),
(8, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356466376465616132323031382d30342d33302d32302d31382d333170352e6a7067, 'California Thon', '8 pieces et California Veggie 8 pieces', '7.00'),
(9, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356532353530313666323031382d30342d33302d32302d31392d313770342e6a7067, 'Osaka classic Rolls', 'California Avocat Saumon 8 pieces', '5.00'),
(10, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356534653661393062323031382d30342d33302d32302d31392d353870332e6a7067, 'Maki Saumon', '6 pieces et green Saumon pieces', '8.50'),
(11, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356537626332383237323031382d30342d33302d32302d32302d343370322e6a7067, 'Saumon Mix', 'California Avocat Saumon 8 pieces', '3.50'),
(12, 0x696d616765732f6d6f6e74685f7370656369616c732f35616537356564623265303230323031382d30342d33302d32302d32322d313970352e6a7067, 'Sushi mix Big', '12 pieces Sushi Saumon et 12 pieces Sushi Thon', '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `menu_list`
--

CREATE TABLE `menu_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discription` varchar(150) NOT NULL,
  `price` varchar(10) NOT NULL,
  `parent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_list`
--

INSERT INTO `menu_list` (`id`, `name`, `discription`, `price`, `parent`) VALUES
(1, 'ACCOMPAGNEMENT', '', '', 'menu'),
(2, 'LES TEMPURA', '', '', 'menu'),
(3, 'YAKI / GRILLÉ', '', '', 'menu'),
(4, 'OSAKA DONBURI', '', '', 'menu'),
(5, 'À LA CARTE', '', '', 'menu'),
(8, 'Burger', 'Good/mojar/very', '3.00', 'ACCOMPAGNEMENT'),
(9, 'Pizza', 'verry/good/mojar', '4.50', 'LES TEMPURA'),
(10, 'Misti', 'valo/ektu beshi/misty', '3.50', 'ACCOMPAGNEMENT'),
(12, 'caslic', 'very/very/very good', '10.00', 'YAKI / GRILLÉ'),
(13, 'Marton Burger', 'not/bad/too good', '9.50', 'OSAKA DONBURI'),
(14, 'Chicken ball', 'round/spic/good', '2.30', 'À LA CARTE'),
(15, 'lolipop chicken', 'like/a/lolipop', '4.20', 'À LA CARTE'),
(20, 'Chicken', '6 piece chicken mcnuggets', '7.00', 'ACCOMPAGNEMENT');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_mail`
--

CREATE TABLE `newsletter_mail` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_mail`
--

INSERT INTO `newsletter_mail` (`id`, `email`) VALUES
(28, 'jackma@gmail.com'),
(1, 'jacknayem@yahoo.com'),
(25, 'lolyonnayem@gmail.com'),
(26, 'Mack@gmail.com'),
(27, 'rashedulhaqe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `fdiscription` varchar(200) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`id`, `fname`, `fdiscription`, `image`) VALUES
(23, 'Burger', 'California Avocat Saumon 8 pieces', 0x696d616765732f70686f746f5f67616c6c6572792f35616562356463306330313936323031382d30352d30332d32312d30362d343067616c6c6572792d696d67312e6a7067),
(24, 'Gambbu Burger', '6 pieces', 0x696d616765732f70686f746f5f67616c6c6572792f35616562356464623662396439323031382d30352d30332d32312d30372d303767616c6c6572792d696d67322e6a7067),
(25, 'Sashimi Saumon', '8 pieces', 0x696d616765732f70686f746f5f67616c6c6572792f35616562356534306432303130323031382d30352d30332d32312d30382d343867616c6c6572792d696d67352e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `special_offer`
--

CREATE TABLE `special_offer` (
  `id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `fdiscription` varchar(500) NOT NULL,
  `fprice` double NOT NULL,
  `fpreprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_offer`
--

INSERT INTO `special_offer` (`id`, `fname`, `fdiscription`, `fprice`, `fpreprice`) VALUES
(5, ' Gyoza Légume', '(Raviolis 4 Pièces)', 6, 7.5),
(6, 'Nem poulet', '(3 pieces)', 4, 4.5),
(7, ' yakitori brochette de Poulet', '(une paires)', 4.5, 5),
(8, 'YakiBoulet de Poulet', '(une pairs)', 6, 7),
(9, 'Yaki brochette bœuf fromage', '(une paires)', 5, 5.5),
(36, 'This is another one one', 'Yes that another', 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbphoto`
--

CREATE TABLE `tbphoto` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `fname` varchar(100) NOT NULL,
  `fdiscription` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbphoto`
--

INSERT INTO `tbphoto` (`id`, `image`, `fname`, `fdiscription`) VALUES
(53, 0x696d616765732f746573742f35616461646632646330643835323031382d30342d32312d30382d35302d323148616d6275726765722e6a7067, 'jack', 'josss');

-- --------------------------------------------------------

--
-- Table structure for table `today_gallery`
--

CREATE TABLE `today_gallery` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `fname` varchar(50) NOT NULL,
  `fdiscription` varchar(150) NOT NULL,
  `fnum` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `today_gallery`
--

INSERT INTO `today_gallery` (`id`, `image`, `fname`, `fdiscription`, `fnum`) VALUES
(50, 0x696d616765732f746573742f35616462316634313865643534323031382d30342d32312d31332d32332d34356275726765722e6a7067, 'Burger', 'Very good', '1'),
(51, 0x696d616765732f746573742f35616462316635656264346461323031382d30342d32312d31332d32342d313448616d6275726765722e6a7067, 'Burger2', 'Very good too', '1'),
(52, 0x696d616765732f746573742f35616462316661343963376638323031382d30342d32312d31332d32352d323467616c6c6572792d696d67312e6a7067, 'Pizza', 'Very good too', '2'),
(53, 0x696d616765732f746573742f35616462316663303861663735323031382d30342d32312d31332d32352d353267616c6c6572792d696d67352e6a7067, 'Pizza2', 'Very good too', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chefs_info`
--
ALTER TABLE `chefs_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_month_specials`
--
ALTER TABLE `gallery_month_specials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_list`
--
ALTER TABLE `menu_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_mail`
--
ALTER TABLE `newsletter_mail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_offer`
--
ALTER TABLE `special_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbphoto`
--
ALTER TABLE `tbphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `today_gallery`
--
ALTER TABLE `today_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chefs_info`
--
ALTER TABLE `chefs_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery_month_specials`
--
ALTER TABLE `gallery_month_specials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu_list`
--
ALTER TABLE `menu_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newsletter_mail`
--
ALTER TABLE `newsletter_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `special_offer`
--
ALTER TABLE `special_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbphoto`
--
ALTER TABLE `tbphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `today_gallery`
--
ALTER TABLE `today_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
