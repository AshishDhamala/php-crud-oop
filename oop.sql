-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2016 at 04:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `image_name`, `title`, `content`) VALUES
(1, 'a', 'a', 'a'),
(23, '6DP1678RTYH47CY7EP4YeFWM.jpg', 'me when i was small', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of &quot;Lorem Ipsum&quot;.\r\n\r\n\r\n\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of &quot;Lorem Ipsum&quot;.\r\n\r\n\r\n\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of &quot;Lorem Ipsum&quot;.'),
(24, '13404256-jacket-and-tie-on-a-white-background.jpg', 'Ross University', 'Ross University is one of the biggest and best Caribbean medicinal schools on the planet &ndash; and remains one of the colossal insider facts in allopathic and veterinary restorative instruction.\r\n\r\nAt Ross University School of Medicine and School of Veterinary Medicine, our most elevated need is giving understudies a medicinal training of the most elevated quality. We are focused on conveying an uncommon scholastic and clinical experience to our understudies, which will build the establishment for their accomplishment in their picked field.\r\n\r\nFoundation of Ross University\r\n\r\nRoss University was established in 1978 and it is a revenue driven school offering the Doctor of Medicine and Doctor of Veterinary Medicine degrees. The School of Medicine is found in Dominica, with clinical training focuses in Miramar, Florida and Saginaw, Michigan. The School of Veterinary Medicine is spotted in St. Kitts.\r\n\r\nRoss University was established by Robert Ross, who sold the school to private value firms Leeds Equity Partners and J.W. Childs Associates in 2000. It is at present claimed by DeVry, Inc., which procured the school in 2003 for $310 million. The authoritative workplaces are placed in North Brunswick, New Jersey, United States. Understudies of Ross University are all residents or perpetual inhabitants of the United States, who are qualified for budgetary aid under Title IV of the Higher Education Act. Ross'' curricula take after the models utilized as a part of U.S. medicinal and veterinary schools.\r\n\r\nThorough Curricula of Ross University\r\n\r\nSince opening in 1978, Ross University has been effectively giving understudies thorough curricula that reflect the training of our US peers.\r\n\r\nWorkforce at our restorative schools are chosen for their extraordinary expert accreditations, as well as for their solid duty to instructing. This understudy focused methodology gives yearning doctors and veterinarians for all intents and purposes unmitigated access to a phenomenal personnel who are devoted to their prosperity.\r\n\r\nRoss University fulifilling the critical shortage of  Physicians and Veterinarians\r\n\r\nWith the genuine danger postured by an approaching doctor and veterinarian lack, Ross University''s central goal of planning profoundly prepared MDs and DVMs has never been so basic. As indicated by the Health Resources and Services Administration, there will be a deficiency of give or take 55,000 doctors in the US by 2020. What''s more, the Bureau of Labor Statistics predicts that there will be more than 28,000 openings for veterinarians by 2012, as indicated by US Senator Wayne Allard of Colorado, who is additionally a veterinarian.'),
(25, 'IMG_4634.jpg', 'The art institutes', 'The Art Institutes (Ai) is an arrangement of revenue driven workmanship schools with pretty nearly 50 Art Institute areas over the United States and Canada. The schools offer graduate degrees, four year college educations, partner degrees, and testaments in visual, imaginative, connected, and culinary expressions. Instructive accreditation of The Art Institutes and their projects shifts among grounds and projects.\r\n\r\nThe Art Institutes'' guardian organization, Education Management Corporation (EDMC), is \r\nheadquartered in Pittsburgh, Pennsylvania. In November 2014, EDMC was delisted from the NASDAQ in the midst of budgetary troubles, claims, and examinations.\r\n\r\nIn 2011, the Art Institutes got more prominent open investigation with the arrival of the Frontline narrative, Educating Sergeant Pantzke. In the narrative Chris Pantzke, a resigned Iraq war veteran talked about the absence of handicap administrations at the school. As per Mr. Pantzke and Frontline &quot;''Being an officer, you would prefer not to stop, you would prefer not to surrender or come up short,''&quot; he clarified. Anyhow in the wake of doing his own particular examination, Pantzke inferred that the degree he was seeking after wasn''t ''justified regardless of a great deal more than the paper is justified regardless of.'' And he felt he was &quot;discarding citizen cash&quot; by utilizing GI Bill stores.&quot;\r\n\r\nEDMC''s claims incorporate charges of extortion and forceful understudy recruitment and also misrepresentation identified with budgetary help qualification.'),
(27, 'EQPrPfWABDbWfBNCb5eBSXNe.jpg', 'Final test for my website', 'Since opening in 1978, Ross University has been effectively giving understudies thorough curricula that reflect the training of our US peers.\r\n\r\nWorkforce at our restorative schools are chosen for their extraordinary expert accreditations, as well as for their solid duty to instructing. This understudy focused methodology gives yearning doctors and veterinarians for all intents and purposes unmitigated access to a phenomenal personnel who are devoted to their prosperity.\r\n\r\nWith the genuine danger postured by an approaching doctor and veterinarian lack, Ross University''s central goal of planning profoundly prepared MDs and DVMs has never been so basic. As indicated by the Health Resources and Services Administration, there will be a deficiency of give or take 55,000 doctors in the US by 2020. What''s more, the Bureau of Labor Statistics predicts that there will be more than 28,000 openings for veterinarians by 2012, as indicated by US Senator Wayne Allard of Colorado, who is additionally a veterinarian. Since opening in 1978, Ross University has been effectively giving understudies thorough curricula that reflect the training of our US peers.\r\n\r\nWorkforce at our restorative schools are chosen for their extraordinary expert accreditations, as well as for their solid duty to instructing. This understudy focused methodology gives yearning doctors and veterinarians for all intents and purposes unmitigated access to a phenomenal personnel who are devoted to their prosperity.\r\n\r\nWith the genuine danger postured by an approaching doctor and veterinarian lack, Ross University''s central goal of planning profoundly prepared MDs and DVMs has never been so basic. As indicated by the Health Resources and Services Administration, there will be a deficiency of give or take 55,000 doctors in the US by 2020. What''s more, the Bureau of Labor Statistics predicts that there will be more than 28,000 openings for veterinarians by 2012, as indicated by US Senator Wayne Allard of Colorado, who is additionally a veterinarian.\r\n\r\nSince opening in 1978, Ross University has been effectively giving understudies thorough curricula that reflect the training of our US peers.\r\n\r\nWorkforce at our restorative schools are chosen for their extraordinary expert accreditations, as well as for their solid duty to instructing. This understudy focused methodology gives yearning doctors and veterinarians for all intents and purposes unmitigated access to a phenomenal personnel who are devoted to their prosperity.\r\n\r\nWith the genuine danger postured by an approaching doctor and veterinarian lack, Ross University''s central goal of planning profoundly prepared MDs and DVMs has never been so basic. As indicated by the Health Resources and Services Administration, there will be a deficiency of give or take 55,000 doctors in the US by 2020. What''s more, the Bureau of Labor Statistics predicts that there will be more than 28,000 openings for veterinarians by 2012, as indicated by US Senator Wayne Allard of Colorado, who is additionally a veterinarian.\r\n\r\nWorkforce at our restorative schools are chosen for their extraordinary expert accreditations, as well as for their solid duty to instructing. This understudy focused methodology gives yearning doctors and veterinarians for all intents and purposes unmitigated access to a phenomenal personnel who are devoted to their prosperity.\r\n\r\nWith the genuine danger postured by an approaching doctor and veterinarian lack, Ross University''s central goal of planning profoundly prepared MDs and DVMs has never been so basic. As indicated by the Health Resources and Services Administration, there will be a deficiency of give or take 55,000 doctors in the US by 2020. What''s more, the Bureau of Labor Statistics predicts that there will be more than 28,000 openings for veterinarians by 2012, as indicated by US Senator Wayne Allard of Colorado, who is additionally a veterinarian.\r\n\r\nWorkforce at our restorative schools are chosen for their extraordinary expert accreditations, as well as for their solid duty to instructing. This understudy focused methodology gives yearning doctors and veterinarians for all intents and purposes unmitigated access to a phenomenal personnel who are devoted to their prosperity.\r\n\r\nWith the genuine danger postured by an approaching doctor and veterinarian lack, Ross University''s central goal of planning profoundly prepared MDs and DVMs has never been so basic. As indicated by the Health Resources and Services Administration, there will be a deficiency of give or take 55,000 doctors in the US by 2020. What''s more, the Bureau of Labor Statistics predicts that there will be more than 28,000 openings for veterinarians by 2012, as indicated by US Senator Wayne Allard of Colorado, who is additionally a veterinarian.'),
(28, 'bidur_and_pratik_blurred.jpg', 'Testing new text editor', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto culpa dicta doloribus, dolorum eius facere fugiat inventore iste magnam modi neque pariatur porro vel. Adipisci aperiam consectetur debitis delectus dignissimos distinctio doloremque enim eos exercitationem harum illum impedit, incidunt laudantium maxime, molestias nam nostrum odit officiis perferendis quas quo sunt tempora tempore tenetur unde.<br />\r\n<br />\r\nBlanditiis, consectetur delectus ducimus excepturi exercitationem explicabo facilis illo in iure molestiae neque possimus quam quisquam quos repudiandae sit suscipit, temporibus unde vel vero! Dicta doloribus magni neque quidem? Ab aliquid aspernatur atque dignissimos eligendi exercitationem ipsam, iusto, magnam modi molestiae nesciunt non officiis quasi qui, quis quisquam quo reprehenderit sint tempore ut?<br />\r\n<br />\r\nAlias animi blanditiis, consequuntur cupiditate deleniti distinctio dolorum error et eum eveniet exercitationem expedita explicabo, facere harum id maiores, maxime nam natus nesciunt omnis possimus quia reprehenderit sapiente sequi similique sint suscipit tempora temporibus velit voluptates. Aliquid asperiores autem dolore ducimus ea eos eum excepturi ipsum laudantium libero magni neque nesciunt odio omnis perspiciatis quae quam quas quasi quibusdam quis quo repudiandae sint sit tempore, temporibus unde vel voluptate. Animi aperiam at commodi consectetur consequatur cupiditate debitis distinctio, ducimus, eligendi eveniet fugit incidunt modi nam numquam odio perspiciatis quae quisquam quos! Molestias, sequi.</p>\r\n'),
(29, 'Bhisma_ko_paara_blurred.jpg', 'Testing second time', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto culpa dicta doloribus, dolorum eius facere fugiat inventore iste magnam modi neque pariatur porro vel. Adipisci aperiam consectetur debitis delectus dignissimos distinctio doloremque enim eos exercitationem harum illum impedit, incidunt laudantium maxime, molestias nam nostrum odit officiis perferendis quas quo sunt tempora tempore tenetur unde.<br />\r\n<br />\r\nBlanditiis, consectetur delectus ducimus excepturi exercitationem explicabo facilis illo in iure molestiae neque possimus quam quisquam quos repudiandae sit suscipit, temporibus unde vel vero! Dicta doloribus magni neque quidem? Ab aliquid aspernatur atque dignissimos eligendi exercitationem ipsam, iusto, magnam modi molestiae nesciunt non officiis quasi qui, quis quisquam quo reprehenderit sint tempore ut?<br />\r\n<br />\r\nAlias animi blanditiis, consequuntur cupiditate deleniti distinctio dolorum error et eum eveniet exercitationem expedita explicabo, facere harum id maiores, maxime nam natus nesciunt omnis possimus quia reprehenderit sapiente sequi similique sint suscipit tempora temporibus velit voluptates. Aliquid asperiores autem dolore ducimus ea eos eum excepturi ipsum laudantium libero magni neque nesciunt odio omnis perspiciatis quae quam quas quasi quibusdam quis quo repudiandae sint sit tempore, temporibus unde vel voluptate. Animi aperiam at commodi consectetur consequatur cupiditate debitis distinctio, ducimus, eligendi eveniet fugit incidunt modi nam numquam odio perspiciatis quae quisquam quos! Molestias, sequi.</p>\r\n'),
(30, 'FTHEXdfCfHUBCtKfH1d5Ub3Y.jpg', 'Third test of the text box', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto culpa dicta doloribus, dolorum eius facere fugiat inventore iste magnam modi neque pariatur porro vel. Adipisci aperiam consectetur debitis delectus dignissimos distinctio doloremque enim eos exercitationem harum illum impedit, incidunt laudantium maxime, molestias nam nostrum odit officiis perferendis quas quo sunt tempora tempore tenetur unde.<br />\r\n<br />\r\nBlanditiis, consectetur delectus ducimus excepturi exercitationem explicabo facilis illo in iure molestiae neque possimus quam quisquam quos repudiandae sit suscipit, temporibus unde vel vero! Dicta doloribus magni neque quidem? Ab aliquid aspernatur atque dignissimos eligendi exercitationem ipsam, iusto, magnam modi molestiae nesciunt non officiis quasi qui, quis quisquam quo reprehenderit sint tempore ut?<br />\r\n<br />\r\nAlias animi blanditiis, consequuntur cupiditate deleniti distinctio dolorum error et eum eveniet exercitationem expedita explicabo, facere harum id maiores, maxime nam natus nesciunt omnis possimus quia reprehenderit sapiente sequi similique sint suscipit tempora temporibus velit voluptates. Aliquid asperiores autem dolore ducimus ea eos eum excepturi ipsum laudantium libero magni neque nesciunt odio omnis perspiciatis quae quam quas quasi quibusdam quis quo repudiandae sint sit tempore, temporibus unde vel voluptate. Animi aperiam at commodi consectetur consequatur cupiditate debitis distinctio, ducimus, eligendi eveniet fugit incidunt modi nam numquam odio perspiciatis quae quisquam quos! Molestias, sequi.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

CREATE TABLE `test1` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`id`, `first_name`, `last_name`, `email`, `visible`) VALUES
(1, 'a', 'a', 'a', 0),
(2, 'Ashish', 'Dhamala', 'ashish@gmail.com', 1),
(3, 'Amit', 'Dhamala', 'amit@gmail.com', 1),
(10, 'Sandhya', 'Dahal', 'sandhya@gmail.com', 1),
(11, 'Anita updated', 'Dhamala', 'anita@gmail.com', 1),
(13, 'Kedar', 'Dhamala', 'kedar@gmail.com', 1),
(14, 'Anita', 'Dhamala', 'anita@gmail.com', 1),
(16, 'Anita created', 'Dhamala created', 'anita@gmail.com', 1),
(17, 'Anita''s updated', 'Dhamala updated', 'anita@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id` int(11) NOT NULL,
  `time` varchar(15) NOT NULL,
  `date` varchar(15) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` text,
  `repeat_nature` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`id`, `time`, `date`, `title`, `category`, `description`, `repeat_nature`) VALUES
(5, '06:06', '2016-07-27', 'just for fun', 'Personal', 'Hello this is ashish dhamala', 'Weekly');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(9) NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `username` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`) VALUES
(1, 0, 'a', 'a', 'a'),
(39, 1, 'Ashish Dhamala', 'ashish201030@gmail.com', '$2y$10$jWiztJE0CRqe56r3c36uyuLxtpTdw.S8.GTTlq/5scUCZLFRchyWK'),
(43, 0, 'Amit Dhamala', 'amit.dhamala1@gmail.com', '$2y$10$Gy3a77NpnOU.JyZoRDHQKe8U835IjISbUqkT2JCA/BbjKX4w3NTV.'),
(57, 0, 'Anita Dhamala', 'anita.dhamala1@gmail.com', '$2y$10$P3ivNGwypYUBQMd8iTI4OOuvuhfwpd6QbAKoaXsT/h4.cRgg.tqBq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
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
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `test1`
--
ALTER TABLE `test1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
