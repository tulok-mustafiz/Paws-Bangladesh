-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221217.13890a947a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 04:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawsbangladesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `email`, `contact`, `username`, `password`) VALUES
(1, 'mustafiz', 'mustafiz@gmail.com', '01254462050', 'mustafiz', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `adopted`
--

CREATE TABLE `adopted` (
  `id` int(11) NOT NULL,
  `uid` int(100) NOT NULL,
  `donator_mail` varchar(200) NOT NULL,
  `adopted_username` varchar(200) NOT NULL,
  `adopted_mail` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `age` int(5) NOT NULL,
  `health` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `uid` int(100) NOT NULL,
  `description` text NOT NULL,
  `donator_mail` varchar(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` int(5) NOT NULL,
  `health` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `price` int(200) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `uid`, `description`, `donator_mail`, `name`, `age`, `health`, `type`, `gender`, `status`, `picture`, `price`, `location`) VALUES
(19, 693664055, 'Persian ', 'messi@goat.com', 'Piku', 1, 'Health is totally fine. Very friendly and playful.', 'Cat', 'Male', 'available', 'https://img.freepik.com/premium-photo/persian-cat-blue-christmas-background-with-snow_231786-4347.jpg', 17000, 'Jatrabari'),
(20, 50890905, 'Exotic', 'moni@gmail.com', 'Mustache', 2, 'Healthy and fit. Active Cat.', 'Cat', 'Male', 'available', 'https://static.wixstatic.com/media/e011d5_550169ecfde2435b89175da72b475f92~mv2.jpg/v1/fill/w_480,h_440,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/DSC_0300_JPG.jpg', 25000, 'Rampura'),
(21, 1562133981, 'Deshi Mynah', 'parvej@gmail.com', 'Sweety', 1, 'Healthy bird. no issue', 'Bird', 'Male', 'available', 'https://bengaldiscover.com/wp-content/uploads/2020/06/Moyna-bird-rescued-in-bd-696x391.jpg', 1750, 'Uttara');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pd_uid` varchar(200) NOT NULL,
  `pd_name` varchar(200) NOT NULL,
  `pd_type` varchar(200) NOT NULL,
  `pd_description` text NOT NULL,
  `pd_expire_date` varchar(200) NOT NULL,
  `pd_batch_no` varchar(200) NOT NULL,
  `pd_price` varchar(200) NOT NULL,
  `pd_quantity` int(20) NOT NULL,
  `buyer_name` varchar(200) NOT NULL,
  `buyer_email` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `checkout` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pd_uid`, `pd_name`, `pd_type`, `pd_description`, `pd_expire_date`, `pd_batch_no`, `pd_price`, `pd_quantity`, `buyer_name`, `buyer_email`, `status`, `checkout`) VALUES
(23, '585322950', 'Foodinnova Nekko Adult Pouch Wet Cat Food Tuna Topping Sea Beam In Gravy 70g', 'food', 'Made from 100% pure fish meat without artificial meat.\r\nNo preservatives\r\nEnriched with vitamins and minerals. Vitamin E\r\nPrebiotic help the digestive system.\r\nLactose olycosoxide Helps to protect the hairs.\r\nFish & Taurine Nourish the eyes and nervous system.', '2025-12-12', '2022', '75', 1, 'moni', 'moni@gmail.com', 'pending', 1),
(24, '173783636', 'SmartHeart Mynah Bird Food 1kg\r\n', 'food', 'Specifically developed to provide complete and balanced nutrition.\r\nThis Enhanced Immunity & Shiny Feather will strengthen your birds immune system and intensify the feathers radiant color.', '2025-12-12', '2022', '250', 1, 'moni', 'moni@gmail.com', 'pending', 0),
(25, '633251770', 'Drools Absolute Skin + Coat Tablet Supplement For Pets 50Pcs', 'medicine', 'Drools Absolute Skin + Coat Tablet is enriched with Omega 3 & 6 for healthy skin and coat\r\nThese highly palatable semi-moist kibbles are prepared with turmeric extract and green tea which aids in skin repair\r\nEssential ingredients blended with other nutrients helps in protecting the skin and coat of your dog\r\nAdministration of this dog supplement is easy hence pet parents of fussy eaters feel relaxed', '2025-12-12', '2022', '600', 1, 'Parvej', 'Parvej@gmail.com', 'pending', 1),
(26, '619624316', 'Bioline Dental Care Set Brush & Toothpaste With Beef Flavour For Dog 100g', 'medicine', 'Tooth paste help to prevent the build up of tartar.\r\nImproves the hygiene in the mouth.\r\nTooth brush large brush for the front teeth.\r\nSmall brush for the molars.\r\nBrush heads toothbrush for sensitive dogs enable to gentle brushing on sensitive areas.\r\nEspecially recommended during the adaption phase.', '2026-12-12', '2022', '550', 1, 'Parvej', 'Parvej@gmail.com', 'Approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `uid` int(50) NOT NULL,
  `food_name` varchar(200) NOT NULL,
  `food_type` varchar(200) NOT NULL,
  `food_description` text NOT NULL,
  `food_expire_date` varchar(200) NOT NULL,
  `food_batch_no` varchar(200) NOT NULL,
  `food_price` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `uid`, `food_name`, `food_type`, `food_description`, `food_expire_date`, `food_batch_no`, `food_price`, `category`, `status`, `image`) VALUES
(3, 1793173789, 'Tick & Flea Oil Ridd', 'food', 'RIDD is a conserved ancestral mechanism regulating proteostasis in different eukaryotic phyla.\r\n\r\nRIDD has a basal activity that is required to maintain ER homeostasis.\r\n\r\nXBP1 splicing and RIDD produce opposite effects on cell fate in cells subjected to ER stress.', '2023-08-12', '2022', 1500, 'store', 'available', 'https://bdpetmart.com/wp-content/uploads/2019/02/Ridd.png'),
(5, 2110746076, 'Optimum Highly Nutritious Aquarium Fish Food 200g', 'food', 'Optimum is highly nutritious food for all aquarium fish. Rich in Vitamins C and E Promotes growth Non-water contamination, Complete nutrition', '2024-09-12', '2022', 160, 'store', 'available', 'https://katabononline.com/wp-content/uploads/2021/09/Optimum-Fish-Food-200g.jpg'),
(6, 1933258274, 'Drools Chicken and Egg Biscuits Treats For Dog 800gm', 'food', 'Made with Real Chicken which is our #1 ingredient\r\nThe crunchy texture of these biscuits helps in removing plaque & reducing tartar build up\r\nThe combination of Omega 3 & 6 fatty acids makes coat lustrous.\r\nVitamins and Minerals helps to keep your dog active and healthy', '2024-10-01', '2022', 800, 'store', 'available', 'https://katabononline.com/wp-content/uploads/2022/09/Drools-Biscuits-900gm-for-dog-768x781.png'),
(7, 585322950, 'Foodinnova Nekko Adult Pouch Wet Cat Food Tuna Topping Sea Beam In Gravy 70g', 'food', 'Made from 100% pure fish meat without artificial meat.\r\nNo preservatives\r\nEnriched with vitamins and minerals. Vitamin E\r\nPrebiotic help the digestive system.\r\nLactose olycosoxide Helps to protect the hairs.\r\nFish & Taurine Nourish the eyes and nervous system.', '2025-12-12', '2022', 75, 'store', 'available', 'https://katabononline.com/wp-content/uploads/2021/08/Foodinnova-Nekko-Adult-Pouch-Wet-Cat-Food-Tuna-Topping-Sea-Beam-In-Gravy-70g.jpg'),
(8, 173783636, 'SmartHeart Mynah Bird Food 1kg\r\n', 'food', 'Specifically developed to provide complete and balanced nutrition.\r\nThis Enhanced Immunity & Shiny Feather will strengthen your birds immune system and intensify the feathers radiant color.', '2025-12-12', '2022', 250, 'store', 'available', 'https://katabononline.com/wp-content/uploads/2021/09/SmartHeart-Mynah-Bird-Food-400g.jpg'),
(9, 767978365, 'SmartHeart Adult Dry Cat Food Mackerel Flavour 7kg', 'food', 'Made from real meat and real fish\r\nEnhanced Brain Function\r\nDHA (from fish oil) and choline (from lecithin) for enhanced brain and nervous system function.\r\nTriple DHA Enhancement\r\nSupplemental levels of DHA (3 times higher) for improve cat’s memory, alertness and intelligence.\r\nHealthy Heart\r\nOmega-3 fatty acids from fish oil for a healthy heart.\r\nVision Nourishing\r\nTaurine supplement for eye sight nourishing.\r\nHealthy Skin and Coat\r\nThe combinations of Biotin, Zinc and Omega 3 & 6 for a healthy skin and shiny coat.\r\nStrong Bones and Teeth\r\nCalcium and Phosphorus for strong bones and teeth.\r\nReduce The Risk of FLUTD\r\nThis Formula was developed to help prevent the risk of FLUTD (Feline Lower Urinary Tract Disease).', '5025-12-12', '2022', 2500, 'store', 'available', 'https://katabononline.com/wp-content/uploads/2021/08/SmartHeart-Adult-Dry-Cat-Food-Mackeral-Flavour-1.2kg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `uid` int(50) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `medicine_type` varchar(200) NOT NULL,
  `medicine_batch_no` varchar(200) NOT NULL,
  `medicine_expire_date` varchar(200) NOT NULL,
  `medicine_description` text NOT NULL,
  `medicine_price` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `uid`, `medicine_name`, `medicine_type`, `medicine_batch_no`, `medicine_expire_date`, `medicine_description`, `medicine_price`, `category`, `status`, `image`) VALUES
(10, 1220230880, 'Duvo+ Anti-Flea and Tick Spray For Dog 200ml', 'medicine', '2022', '2025-12-12', 'Repel and prevent fleas and ticks\r\nTreat three times with one week intervals between each treatment\r\nPesticide\r\nEcologically friendly and highly effective', '1150', 'store', 'available', 'https://katabononline.com/wp-content/uploads/2021/09/Duvo-Anti-Flea-and-Tick-Spray-Dog-200ml.jpg'),
(11, 633251770, 'Drools Absolute Skin + Coat Tablet Supplement For Pets 50Pcs', 'medicine', '2022', '2025-12-12', 'Drools Absolute Skin + Coat Tablet is enriched with Omega 3 & 6 for healthy skin and coat\r\nThese highly palatable semi-moist kibbles are prepared with turmeric extract and green tea which aids in skin repair\r\nEssential ingredients blended with other nutrients helps in protecting the skin and coat of your dog\r\nAdministration of this dog supplement is easy hence pet parents of fussy eaters feel relaxed', '600', 'store', 'available', 'https://katabononline.com/wp-content/uploads/2021/09/Drools-Absolute-Skin-Coat-Tablet-Supplement-For-Pets-50Pcs.jpg'),
(14, 619624316, 'Bioline Dental Care Set Brush & Toothpaste With Beef Flavour For Dog 100g', 'medicine', '2022', '2026-12-12', 'Tooth paste help to prevent the build up of tartar.\r\nImproves the hygiene in the mouth.\r\nTooth brush large brush for the front teeth.\r\nSmall brush for the molars.\r\nBrush heads toothbrush for sensitive dogs enable to gentle brushing on sensitive areas.\r\nEspecially recommended during the adaption phase.', '550', 'store', 'available', 'https://katabononline.com/wp-content/uploads/2021/09/Bioline-Dental-Care-Set-Brush-Toothpaste-With-Beef-Flavour-For-Dog-100g.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(100) NOT NULL,
  `pd_name` varchar(200) NOT NULL,
  `pd_type` varchar(200) NOT NULL,
  `pd_description` text NOT NULL,
  `pd_expire_date` varchar(200) NOT NULL,
  `pd_batch_no` varchar(200) NOT NULL,
  `pd_price` int(50) NOT NULL,
  `pd_quantity` int(50) NOT NULL,
  `buyer_name` varchar(200) NOT NULL,
  `buyer_email` varchar(200) NOT NULL,
  `card_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` int(20) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `address`, `phone`, `mail`, `user_type`, `password`) VALUES
(13, 'Messi', 'Buerno Aires', 1523121321, 'messi@goat.com', '', '$2y$10$/.BAVBu1XFc3RHm9DTCt3OWNaKRiJKew51sMRseLmfangt8oWh1By'),
(14, 'moni', 'paterbag', 1011213141, 'moni@gmail.com', '', '$2y$10$Con2JUarIWXFqopETEz1COQukG4moKULuHnthu7uDSdoUrLr0dJJ2'),
(15, 'Parvej', 'Badda', 1345698745, 'Parvej@gmail.com', '', '$2y$10$liUNLLdyKQ/zp/pNNMFwX.OpAUbocxVx6AXEP1G5ZiUb.ITihphly');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adopted`
--
ALTER TABLE `adopted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adopted`
--
ALTER TABLE `adopted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `donator`
--
ALTER TABLE `donator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
