-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 10:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unilam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `aboutID` int(11) NOT NULL,
  `aboutType` varchar(32) NOT NULL,
  `bannerTitle` varchar(64) DEFAULT NULL,
  `bannerImageUrl` varchar(200) DEFAULT NULL,
  `aboutAuthorName` varchar(64) DEFAULT NULL,
  `aboutTitle` varchar(64) NOT NULL,
  `aboutDescription` text DEFAULT NULL,
  `aboutImageUrl` varchar(200) DEFAULT NULL,
  `aboutTitle2` varchar(64) DEFAULT NULL,
  `aboutDescription2` text DEFAULT NULL,
  `aboutImageUrl2` varchar(200) DEFAULT NULL,
  `currentClients` varchar(6) DEFAULT NULL,
  `yearsOfExperience` varchar(9) DEFAULT NULL,
  `awardWinning` varchar(10) DEFAULT NULL,
  `officeWorldWide` varchar(6) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`aboutID`, `aboutType`, `bannerTitle`, `bannerImageUrl`, `aboutAuthorName`, `aboutTitle`, `aboutDescription`, `aboutImageUrl`, `aboutTitle2`, `aboutDescription2`, `aboutImageUrl2`, `currentClients`, `yearsOfExperience`, `awardWinning`, `officeWorldWide`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(1, 'aboutpage', 'About UNILAM', 'uploads/bannerImage/__1701757640_0f27ef30e278d231ed9f.jpg', 'ABOUT OUR LEGACY', 'A Brilliant Concept', '<p>A brilliant concept is always born from a basic drawing waiting to be brought to life; with the help of our fully-equipped and modernized workshop, we can provide a comprehensive service throughout your project to aid in making your ideas reality. We can use your CAD designs as well as assemble CAD files from basic sketches that fit your precise needs. Our in-house technical designers excel at further developing an idea into production files for machining and fabrication. Continuous investment in cutting-edge CAD/CAM softwares enables us to develop top quality products at a competitive price.</p>', 'uploads/aboutImage/__1701784079_ab6d090f9f8a49b0a41c.png', 'Crafting Wood, Building Trust', '<p>A brilliant concept is always born from a basic drawing waiting to be brought to life; with the help of our fully-equipped and modernized workshop, we can provide a comprehensive service throughout your</p>', 'uploads/aboutImage2/__1701784079_673dc674bd3d6643d158.jpg', '10', '5', '50', '6', 1, '2023-12-05 06:44:01', '2023-12-05 06:44:01', '2023-12-06 01:58:10'),
(3, 'aboutdashboard', 'A Brilliant Concept', 'uploads/bannerImage/__1701784311_8fe5a82c75810111722e.jpg', 'ABOUT OUR LEGACY', 'A Brilliant Concept', '<p>A brilliant concept is always born from a basic drawing waiting to be brought to life; with the help of our fully-equipped and modernized workshop, we can provide a comprehensive service throughout your project to aid in making your ideas reality. We can use your CAD designs as well as assemble CAD files from basic sketches that fit your precise needs. Our in-house technical designers excel at further developing an idea into production files for machining and fabrication. Continuous investment in cutting-edge CAD/CAM softwares enables us to develop top quality products at a competitive price.</p>', 'uploads/aboutImage/__1701842427_d527fc62b7ffbb869502.jpg', '', '', '', '', '', '', '', 0, '2023-12-05 12:10:48', '2023-12-05 12:10:48', '2023-12-06 00:00:27'),
(4, 'dashboardchoose', 'Crafting Wood, Building Trust', 'uploads/bannerImage/__1701775909_dbaac71bc4160028cc21.webp', ' Why Choose Us?', 'Crafting Wood, Building Trust', '<p>Building Tomorrow\'s Beauty, Responsibly Today</p>', '', '', '', '', '', '', '', '', 0, '2023-12-05 12:10:48', '2023-12-05 12:10:48', '2023-12-05 05:31:49'),
(5, 'dashboardprojectside', NULL, NULL, 'SUSTAINABILITY PRACTICES', 'Crafting Wood, Building Trust', '<p>Building Tomorrow\'s Beauty, Responsibly Today</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-05 12:10:48', '2023-12-05 12:10:48', '2023-12-06 02:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `bannerID` int(11) NOT NULL,
  `bannerHeading` varchar(32) NOT NULL,
  `bannerTitle` varchar(64) NOT NULL,
  `bannerUrl` varchar(300) DEFAULT NULL,
  `bannerFileUrl` varchar(200) DEFAULT NULL,
  `bannerDescription` text DEFAULT NULL,
  `showOrder` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`bannerID`, `bannerHeading`, `bannerTitle`, `bannerUrl`, `bannerFileUrl`, `bannerDescription`, `showOrder`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(1, 'Quality', 'Crafting Wood, Building Trust', 'J6E_15S9feY', '', '', 0, 1, '2023-12-05 04:30:36', '2023-12-05 04:30:36', '2023-12-05 08:55:28'),
(4, 'UNILAM', 'A Brilliant Concept', '', 'uploads/bannerFile/__1701788066_5b843086402f444bb635.jpg', '', 0, 1, '2023-12-05 08:54:26', '2023-12-05 08:54:26', '2023-12-05 08:55:38'),
(5, 'UNILAM', '2 Crafting Wood, Building Trust 2', '', 'uploads/bannerFile/__1701788090_d657faae7a7e86a05817.jpg', '', 0, 1, '2023-12-05 08:54:50', '2023-12-05 08:54:50', '2023-12-05 08:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactID` int(11) NOT NULL,
  `contactType` varchar(34) NOT NULL,
  `bannerTitle` varchar(64) NOT NULL,
  `bannerImageUrl` varchar(200) NOT NULL,
  `contactTitle` varchar(64) NOT NULL,
  `contactDescription` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `email` varchar(64) NOT NULL,
  `twitterLink` varchar(200) NOT NULL,
  `linkedInLink` varchar(100) NOT NULL,
  `faceBookLink` varchar(200) NOT NULL,
  `instagramLink` varchar(200) NOT NULL,
  `youTubeLink` varchar(200) NOT NULL,
  `whatsAppLink` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactID`, `contactType`, `bannerTitle`, `bannerImageUrl`, `contactTitle`, `contactDescription`, `address`, `phone`, `zipcode`, `email`, `twitterLink`, `linkedInLink`, `faceBookLink`, `instagramLink`, `youTubeLink`, `whatsAppLink`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(1, 'main', 'Let\'s Start a Project', 'uploads/bannerImage/__1701763656_3ff8194ca6f9fc296651.jpg', 'Akmal', '<p>Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. We will be happy to answer your questions.</p>', 'ADCB, UAE, Dubai', '45464900', '449554', 'nfo@unilam.ae', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'youtube.com', 'https://www.whatsapp.com/', 1, '2023-12-05 08:33:02', '2023-12-05 08:33:02', '2023-12-05 08:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `featureID` int(11) NOT NULL,
  `featureTitle` varchar(100) NOT NULL,
  `featureDescription` text NOT NULL,
  `featureIconUrl` varchar(200) NOT NULL,
  `showOrder` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`featureID`, `featureTitle`, `featureDescription`, `featureIconUrl`, `showOrder`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(2, 'Responsible Wood Sourcing', '<p>Unilam Wood Industries LLC prioritizes the use of wood from responsibly managed forests and sustainable sources.</p>', 'uploads/featureIcon/__1701782376_d2dfcd6749e13b373efe.png', 0, 1, '2023-12-05 07:19:36', '2023-12-05 07:19:36', '2023-12-05 07:19:36'),
(3, 'Waste Reduction', '<p>Unilam actively works to minimize waste during its manufacturing processes.</p>', 'uploads/featureIcon/__1701782395_070b3d58c5f2ee183d45.png', 0, 1, '2023-12-05 07:19:55', '2023-12-05 07:19:55', '2023-12-05 07:19:55'),
(4, 'Eco-Friendly Materials', '<p>The company makes a concerted effort to utilize eco-friendly materials and finishes in its wood products whenever possible.</p>', 'uploads/featureIcon/__1701782421_9914ce980add1e004ae6.png', 0, 1, '2023-12-05 07:20:21', '2023-12-05 07:20:21', '2023-12-05 07:20:21'),
(5, 'Energy Efficiency', '<p>Unilam Wood Industries LLC has invested in energy-efficient machinery and processes within its manufacturing facilities.</p>', 'uploads/featureIcon/__1701782442_fcbcce60b085427ee744.png', 0, 1, '2023-12-05 07:20:42', '2023-12-05 07:20:42', '2023-12-05 07:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `our_works`
--

CREATE TABLE `our_works` (
  `workID` int(11) NOT NULL,
  `workCategoryID` int(11) NOT NULL,
  `projectTitle` varchar(64) NOT NULL,
  `workImageUrl` varchar(200) NOT NULL,
  `projectLocation` varchar(64) NOT NULL,
  `services` varchar(64) NOT NULL,
  `projectType` varchar(64) NOT NULL,
  `strategy` varchar(64) NOT NULL,
  `workTitle` varchar(100) NOT NULL,
  `projectDate` date NOT NULL DEFAULT current_timestamp(),
  `workDescription` text NOT NULL,
  `workLongDescription` text NOT NULL,
  `workBnnerImageUrl` varchar(200) NOT NULL,
  `twitterLink` varchar(200) NOT NULL,
  `faceBookLink` varchar(200) NOT NULL,
  `linkedInLink` varchar(200) NOT NULL,
  `pinterestLink` varchar(200) NOT NULL,
  `showOrder` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_works`
--

INSERT INTO `our_works` (`workID`, `workCategoryID`, `projectTitle`, `workImageUrl`, `projectLocation`, `services`, `projectType`, `strategy`, `workTitle`, `projectDate`, `workDescription`, `workLongDescription`, `workBnnerImageUrl`, `twitterLink`, `faceBookLink`, `linkedInLink`, `pinterestLink`, `showOrder`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(4, 1, 'Al Barsha Heights', 'uploads/workImage/__1701790385_9b177185d5d3acb24e83.jpg', 'Dubai Internet City', 'Wood Works', 'Interior Design', 'Interior Design', 'Al Barsha Heights Apartment', '2023-12-04', '<p>Barsha Heights apartment building offers a contemporary design interior in a vibrant and urban community. Unilam was responsible for the refurbishment of the hotel apartment building by creating all wood works for the main lobby and lift lobbies.</p>', '<h4>Design in Details</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos? Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus laboriosam similique amet porro!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum possimus ratione numquam tempore laborum, itaque sapiente provident pariatur officiis, quis unde fuga aspernatur. Pariatur minus fugit unde nisi sint obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, illum? Deleniti sequi id ullam soluta ex dignissimos est odit quae culpa. Deserunt provident voluptas est ipsum corrupti libero, neque soluta?</p><h4>Incredible Result</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos? Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus laboriosam similique amet porro!</p>', 'uploads/workBnnerImage/__1701786252_af749976ee00faffdb62.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://www.pinterest.com/', 1, 1, '2023-12-05 08:24:12', '2023-12-05 08:24:12', '2023-12-06 23:53:27'),
(5, 1, 'Banyan Tree Residency', 'uploads/workImage/__1701790407_589160cdadefd8f6da8e.jpg', 'Dubai Internet City', 'Wood Works', 'Interior Design', 'Interior Design', 'Al Barsha Heights Apartment', '2023-12-04', '<p>Barsha Heights apartment building offers a contemporary design interior in a vibrant and urban community. Unilam was responsible for the refurbishment of the hotel apartment building by creating all wood works for the main lobby and lift lobbies.</p>', '<h4>Design in Details</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos? Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus laboriosam similique amet porro!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum possimus ratione numquam tempore laborum, itaque sapiente provident pariatur officiis, quis unde fuga aspernatur. Pariatur minus fugit unde nisi sint obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, illum? Deleniti sequi id ullam soluta ex dignissimos est odit quae culpa. Deserunt provident voluptas est ipsum corrupti libero, neque soluta?</p><h4>Incredible Result</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos? Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus laboriosam similique amet porro!</p>', 'uploads/workBnnerImage/__1701786252_af749976ee00faffdb62.jpg', '', '', '', '', 0, 1, '2023-12-05 08:24:12', '2023-12-05 08:24:12', '2023-12-06 23:52:50'),
(6, 2, 'SLS Dubai Hotel', 'uploads/workImage/__1701790434_2d559b5c3e60495a32f5.jpg', 'Dubai Internet City', 'Wood Works', 'Interior Design', 'Interior Design', 'Al Barsha Heights Apartment', '2023-12-04', '<p>Barsha Heights apartment building offers a contemporary design interior in a vibrant and urban community. Unilam was responsible for the refurbishment of the hotel apartment building by creating all wood works for the main lobby and lift lobbies.</p>', '<h4>Design in Details</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos? Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus laboriosam similique amet porro!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum possimus ratione numquam tempore laborum, itaque sapiente provident pariatur officiis, quis unde fuga aspernatur. Pariatur minus fugit unde nisi sint obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, illum? Deleniti sequi id ullam soluta ex dignissimos est odit quae culpa. Deserunt provident voluptas est ipsum corrupti libero, neque soluta?</p><h4>Incredible Result</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos? Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus laboriosam similique amet porro!</p>', 'uploads/works/4/galleryImages_1701786252_2a9d15e2e9b231661d45.jpg', '', '', '', '', 0, 1, '2023-12-05 08:24:12', '2023-12-05 08:24:12', '2023-12-06 23:39:03'),
(7, 2, 'Penthouse at Banyan Tree Residence', 'uploads/workImage/__1701790487_f9d944fbc1e2af60271b.jpg', 'Dubai Internet City', 'Wood Works', 'Interior Design', 'Interior Design', 'Al Barsha Heights Apartment', '2023-12-04', '<p>Barsha Heights apartment building offers a contemporary design interior in a vibrant and urban community. Unilam was responsible for the refurbishment of the hotel apartment building by creating all wood works for the main lobby and lift lobbies.</p>', '<h4>Design in Details</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos? Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus laboriosam similique amet porro!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum possimus ratione numquam tempore laborum, itaque sapiente provident pariatur officiis, quis unde fuga aspernatur. Pariatur minus fugit unde nisi sint obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, illum? Deleniti sequi id ullam soluta ex dignissimos est odit quae culpa. Deserunt provident voluptas est ipsum corrupti libero, neque soluta?</p><h4>Incredible Result</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos? Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus laboriosam similique amet porro!</p>', 'uploads/works/4/galleryImages_1701786252_2a9d15e2e9b231661d45.jpg', '', '', '', '', 0, 1, '2023-12-05 08:24:12', '2023-12-05 08:24:12', '2023-12-06 23:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `our_work_gallery_images`
--

CREATE TABLE `our_work_gallery_images` (
  `gallaryImageID` int(11) NOT NULL,
  `workID` int(11) NOT NULL,
  `gallaryImageUrl` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_work_gallery_images`
--

INSERT INTO `our_work_gallery_images` (`gallaryImageID`, `workID`, `gallaryImageUrl`) VALUES
(1, 3, 'uploads/workBnnerImage/__1701681524_ada7d3925c23188c3da5.jpg'),
(2, 3, 'uploads/workBnnerImage/__1701681524_ada7d3925c23188c3da5.jpg'),
(3, 3, 'uploads/works/3/galleryImages_1701687911_66cbbbec74fab72e33e0.jpg'),
(4, 3, 'uploads/works/3/galleryImages_1701687911_77a8867b78f7a6a13cea.jpg'),
(5, 3, 'uploads/works/3/galleryImages_1701687911_e76a691673f5591c0278.jpg'),
(6, 4, 'uploads/works/4/galleryImages_1701786252_64da7aa795c58e32a8e7.jpg'),
(7, 4, 'uploads/works/4/galleryImages_1701786252_f336d761b71415203655.jpg'),
(8, 4, 'uploads/works/4/galleryImages_1701786252_2a9d15e2e9b231661d45.jpg'),
(9, 5, 'uploads/workBnnerImage/__1701681524_ada7d3925c23188c3da5.jpg'),
(10, 6, 'uploads/workBnnerImage/__1701681524_ada7d3925c23188c3da5.jpg'),
(11, 3, 'uploads/works/3/galleryImages_1701687911_66cbbbec74fab72e33e0.jpg'),
(12, 5, 'uploads/works/3/galleryImages_1701687911_77a8867b78f7a6a13cea.jpg'),
(13, 5, 'uploads/workBnnerImage/__1701681524_ada7d3925c23188c3da5.jpg'),
(14, 6, 'uploads/workBnnerImage/__1701681524_ada7d3925c23188c3da5.jpg'),
(15, 7, 'uploads/works/3/galleryImages_1701687911_66cbbbec74fab72e33e0.jpg'),
(16, 7, 'uploads/works/3/galleryImages_1701687911_77a8867b78f7a6a13cea.jpg'),
(17, 7, 'uploads/works/3/galleryImages_1701687911_e76a691673f5591c0278.jpg'),
(18, 7, 'uploads/works/4/galleryImages_1701786252_64da7aa795c58e32a8e7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productTypeIDs` text NOT NULL,
  `materialID` int(11) NOT NULL,
  `productTitle` varchar(64) NOT NULL,
  `productDescription` text NOT NULL,
  `productImageUrl` varchar(200) NOT NULL,
  `productBannerImageUrl` varchar(300) NOT NULL,
  `showOrder` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productTypeIDs`, `materialID`, `productTitle`, `productDescription`, `productImageUrl`, `productBannerImageUrl`, `showOrder`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(1, '4,3,2,1', 1, 'Acrylic Board 1', '<p>An acrylic sheet thin layer bonded to MDF (Medium Density Fibreboard) forms a sleek and modern composite. The acrylic layer, known for its clarity and vibrant colours, is securely affixed to MDF through adhesion, creating a surface that\'s both visually striking and durable. This combination merges the elegance of acrylic with the sturdiness of MDF, making it an excellent choice for furniture accents, and decorative panels. The result is a harmonious blend of aesthetics and resilience, perfect for enhancing interiors with a touch of sophistication.</p>', 'uploads/products/productImage1701847701_6ec2ceea5007f7612822.jpg', 'uploads/products/bannerImage1701783672_eab9c94017f075c03ddb.png', 0, 1, '2023-12-06 01:28:21', '2023-12-05 07:41:12', '2023-12-06 01:28:21'),
(2, '3,2', 2, 'FR WALL PANELS', '<p>n acrylic sheet thin layer bonded to MDF (Medium Density Fibreboard) forms a sleek and modern composite. The acrylic layer, known for its clarity and vibrant colours, is securely affixed to MDF through adhesion, creating a surface that\'s both visually striking and durable. This combination merges the elegance of acrylic with the sturdiness of MDF, making it an excellent choice for furniture accents, and decorative panels. The result is a harmonious blend of aesthetics and resilience, perfect for enhancing interiors with a touch of sophistication.</p>', 'uploads/products/bannerImage1701783759_37ae76fadf025c9115d7.png', 'uploads/products/bannerImage1701783759_37ae76fadf025c9115d7.png', 0, 1, '2023-12-05 07:42:39', '2023-12-05 07:42:39', '2023-12-05 07:42:39'),
(3, '3', 1, 'PVC EDGES', '<p>An acrylic sheet thin layer bonded to MDF (Medium Density Fibreboard) forms a sleek and modern composite. The acrylic layer, known for its clarity and vibrant colours, is securely affixed to MDF through adhesion, creating a surface that\'s both visually striking and durable. This combination merges the elegance of acrylic with the sturdiness of MDF, making it an excellent choice for furniture accents, and decorative panels. The result is a harmonious blend of aesthetics and resilience, perfect for enhancing interiors with a touch of sophistication.</p>', 'uploads/products/bannerImage1701783801_db62ec21e477aba0ac11.png', 'uploads/products/bannerImage1701783801_db62ec21e477aba0ac11.png', 0, 1, '2023-12-05 07:43:21', '2023-12-05 07:43:21', '2023-12-05 07:43:21'),
(4, '3,2', 2, 'FR WALL PANELS', '<p>n acrylic sheet thin layer bonded to MDF (Medium Density Fibreboard) forms a sleek and modern composite. The acrylic layer, known for its clarity and vibrant colours, is securely affixed to MDF through adhesion, creating a surface that\'s both visually striking and durable. This combination merges the elegance of acrylic with the sturdiness of MDF, making it an excellent choice for furniture accents, and decorative panels. The result is a harmonious blend of aesthetics and resilience, perfect for enhancing interiors with a touch of sophistication.</p>', 'uploads/products/bannerImage1701783759_37ae76fadf025c9115d7.png', 'uploads/products/bannerImage1701783759_37ae76fadf025c9115d7.png', 0, 1, '2023-12-05 07:42:39', '2023-12-05 07:42:39', '2023-12-05 07:42:39'),
(5, '4,3,2,1', 1, 'Acrylic Board', '<p>An acrylic sheet thin layer bonded to MDF (Medium Density Fibreboard) forms a sleek and modern composite. The acrylic layer, known for its clarity and vibrant colours, is securely affixed to MDF through adhesion, creating a surface that\'s both visually striking and durable. This combination merges the elegance of acrylic with the sturdiness of MDF, making it an excellent choice for furniture accents, and decorative panels. The result is a harmonious blend of aesthetics and resilience, perfect for enhancing interiors with a touch of sophistication.</p>', 'uploads/products/bannerImage1701783672_eab9c94017f075c03ddb.png', 'uploads/products/bannerImage1701783672_eab9c94017f075c03ddb.png', 0, 1, '2023-12-05 07:41:12', '2023-12-05 07:41:12', '2023-12-05 07:41:12'),
(6, '3', 1, 'PVC EDGES', '<p>An acrylic sheet thin layer bonded to MDF (Medium Density Fibreboard) forms a sleek and modern composite. The acrylic layer, known for its clarity and vibrant colours, is securely affixed to MDF through adhesion, creating a surface that\'s both visually striking and durable. This combination merges the elegance of acrylic with the sturdiness of MDF, making it an excellent choice for furniture accents, and decorative panels. The result is a harmonious blend of aesthetics and resilience, perfect for enhancing interiors with a touch of sophistication.</p>', 'uploads/products/bannerImage1701783801_db62ec21e477aba0ac11.png', 'uploads/products/bannerImage1701783801_db62ec21e477aba0ac11.png', 0, 1, '2023-12-05 07:43:21', '2023-12-05 07:43:21', '2023-12-05 07:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallary_images`
--

CREATE TABLE `product_gallary_images` (
  `gallaryImageID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `gallaryImageUrl` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_gallary_images`
--

INSERT INTO `product_gallary_images` (`gallaryImageID`, `productID`, `gallaryImageUrl`) VALUES
(1, 1, 'uploads/products/1/galleryImages_1701783672_aefd1de1e99e0bf41fdc.png'),
(2, 1, 'uploads/products/1/galleryImages_1701783672_247d1958b0a4c28fc54e.png'),
(3, 1, 'uploads/products/1/galleryImages_1701783672_cd730e6dbc627520852e.png'),
(4, 1, 'uploads/products/1/galleryImages_1701783672_a2f82074983019571778.png'),
(5, 1, 'uploads/products/1/galleryImages_1701783672_35c1f81bbeddd825ff56.png'),
(6, 2, 'uploads/products/2/galleryImages_1701783759_992e9d5adce51c4c02df.png'),
(7, 2, 'uploads/products/2/galleryImages_1701783759_c16bcdbad7903fd2af26.png'),
(8, 2, 'uploads/products/2/galleryImages_1701783759_b649c22b698334395bf1.png'),
(9, 2, 'uploads/products/2/galleryImages_1701783759_888f7422f4e4bfbd22ae.png'),
(10, 2, 'uploads/products/2/galleryImages_1701783759_28c450da36b21fd42701.png'),
(11, 3, 'uploads/products/3/galleryImages_1701783801_50e25b9bf62b20ffaf66.png'),
(12, 3, 'uploads/products/3/galleryImages_1701783801_cc57ec0258bd0e073078.png'),
(13, 3, 'uploads/products/3/galleryImages_1701783801_6ac97f18843f998cf1da.png'),
(14, 3, 'uploads/products/3/galleryImages_1701783801_5f122e2978192600b25d.png'),
(15, 3, 'uploads/products/3/galleryImages_1701783801_d8067276be49994f61ea.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `materialID` int(11) NOT NULL,
  `materialName` varchar(32) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`materialID`, `materialName`, `createdOn`) VALUES
(1, 'BOARD', '2023-12-06 07:27:49'),
(2, 'WOOD', '2023-12-06 07:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `productTypeID` int(11) NOT NULL,
  `typeTitle` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`productTypeID`, `typeTitle`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(1, 'WOOD', 1, '2023-12-05 07:31:46', '2023-12-05 07:31:46', '2023-12-05 07:31:46'),
(2, 'TEXTURE', 1, '2023-12-05 07:31:56', '2023-12-05 07:31:56', '2023-12-05 07:31:56'),
(3, 'STONE', 1, '2023-12-05 07:32:04', '2023-12-05 07:32:04', '2023-12-05 07:32:04'),
(4, 'SOLID COLORS', 1, '2023-12-05 07:32:12', '2023-12-05 07:32:12', '2023-12-05 07:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_type_details`
--

CREATE TABLE `product_type_details` (
  `typeDetailID` int(11) NOT NULL,
  `productTypeID` int(11) NOT NULL,
  `typeDetailTitle` varchar(64) NOT NULL,
  `typeDetailImageUrl` varchar(200) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(11) NOT NULL,
  `serviceTitle` varchar(32) NOT NULL,
  `serviceBannerImageUrl` varchar(200) NOT NULL,
  `serviceBannerImageTitle` varchar(100) NOT NULL,
  `serviceHeadLine` varchar(64) NOT NULL,
  `serviceMainDescription` text NOT NULL,
  `serviceHeadLine2` varchar(64) NOT NULL,
  `serviceMainDescription2` text NOT NULL,
  `serviceHeadLineImageUrl2` varchar(200) NOT NULL,
  `serviceHeadLine3` varchar(64) DEFAULT NULL,
  `serviceMainDescription3` text DEFAULT NULL,
  `serviceHeadLineImageUrl3` varchar(200) DEFAULT NULL,
  `showOrder` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceTitle`, `serviceBannerImageUrl`, `serviceBannerImageTitle`, `serviceHeadLine`, `serviceMainDescription`, `serviceHeadLine2`, `serviceMainDescription2`, `serviceHeadLineImageUrl2`, `serviceHeadLine3`, `serviceMainDescription3`, `serviceHeadLineImageUrl3`, `showOrder`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(2, 'Manufacturing', 'uploads/serviceBannerImage/__1701784474_557f98e66c9a2a01caf0.jpg', 'Manufacturing', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem nobis tempore omnis, doloremque laudantium nam ea, iusto iure, amet voluptatem consequatur illo beatae similique! Tenetur eum temporibus suscipit voluptates sunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, alias vitae nisi ex porro maxime quae, deleniti quaerat odit similique voluptates quisquam commodi veritatis voluptatibus voluptas dolorem omnis incidunt quo? Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati nemo quo assumenda exercitationem, voluptas et rerum sunt perspiciatis, ducimus velit doloribus magni laboriosam in aliquid corrupti, mollitia quam dignissimos repellendus!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta in magnam voluptatem natus quas quis qui doloremque, molestias doloribus earum, voluptates dolorum, optio sunt tempore incidunt saepe eaque ratione harum. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, labore nemo beatae et quaerat cumque animi iure rerum qui, similique impedit eveniet odio quisquam libero sequi in ipsam molestiae quas!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, laboriosam nostrum at a porro eos doloremque, unde facilis aliquam sapiente obcaecati dignissimos doloribus animi laborum similique nisi! Praesentium, eveniet quidem.</p>', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ex possimus commodi cum laboriosam debitis, enim recusandae nemo, nulla culpa velit sed quas modi in quod fugiat quae repellendus consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus unde odit nobis commodi asperiores, accusantium natus ad, molestiae reprehenderit deleniti eius voluptate assumenda, perspiciatis ducimus eos. Facilis velit voluptatum harum! Lorem ipsum dolor sit amet consectetur adipisicing elit. At dolorum dolores perspiciatis eius natus. Accusantium, repudiandae? Modi incidunt pariatur ab rem earum labore ducimus assumenda, tempora amet aspernatur reprehenderit dolore!</p>', 'uploads/serviceHeadLineImage2/__1701784474_17fdd8b11bd7d33547dc.jpg', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ex possimus commodi cum laboriosam debitis, enim recusandae nemo, nulla culpa velit sed quas modi in quod fugiat quae repellendus consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus unde odit nobis commodi asperiores, accusantium natus ad, molestiae reprehenderit deleniti eius voluptate assumenda, perspiciatis ducimus eos. Facilis velit voluptatum harum! Lorem ipsum dolor sit amet consectetur adipisicing elit. At dolorum dolores perspiciatis eius natus. Accusantium, repudiandae? Modi incidunt pariatur ab rem earum labore ducimus assumenda, tempora amet aspernatur reprehenderit dolore!</p>', 'uploads/serviceHeadLineImage3/__1701784474_125b0d71dc506bfaf29e.jpg', 0, 1, '2023-12-05 07:54:34', '2023-12-05 07:54:34', '2023-12-05 07:54:34'),
(3, 'Technical Support', 'uploads/serviceBannerImage/__1701850890_25fb679aa2e58533726b.jpg', 'Manufacturing', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem nobis tempore omnis, doloremque laudantium nam ea, iusto iure, amet voluptatem consequatur illo beatae similique! Tenetur eum temporibus suscipit voluptates sunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, alias vitae nisi ex porro maxime quae, deleniti quaerat odit similique voluptates quisquam commodi veritatis voluptatibus voluptas dolorem omnis incidunt quo? Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati nemo quo assumenda exercitationem, voluptas et rerum sunt perspiciatis, ducimus velit doloribus magni laboriosam in aliquid corrupti, mollitia quam dignissimos repellendus!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta in magnam voluptatem natus quas quis qui doloremque, molestias doloribus earum, voluptates dolorum, optio sunt tempore incidunt saepe eaque ratione harum. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, labore nemo beatae et quaerat cumque animi iure rerum qui, similique impedit eveniet odio quisquam libero sequi in ipsam molestiae quas!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, laboriosam nostrum at a porro eos doloremque, unde facilis aliquam sapiente obcaecati dignissimos doloribus animi laborum similique nisi! Praesentium, eveniet quidem.</p>', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ex possimus commodi cum laboriosam debitis, enim recusandae nemo, nulla culpa velit sed quas modi in quod fugiat quae repellendus consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus unde odit nobis commodi asperiores, accusantium natus ad, molestiae reprehenderit deleniti eius voluptate assumenda, perspiciatis ducimus eos. Facilis velit voluptatum harum! Lorem ipsum dolor sit amet consectetur adipisicing elit. At dolorum dolores perspiciatis eius natus. Accusantium, repudiandae? Modi incidunt pariatur ab rem earum labore ducimus assumenda, tempora amet aspernatur reprehenderit dolore!</p>', 'uploads/serviceHeadLineImage2/__1701784474_17fdd8b11bd7d33547dc.jpg', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ex possimus commodi cum laboriosam debitis, enim recusandae nemo, nulla culpa velit sed quas modi in quod fugiat quae repellendus consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus unde odit nobis commodi asperiores, accusantium natus ad, molestiae reprehenderit deleniti eius voluptate assumenda, perspiciatis ducimus eos. Facilis velit voluptatum harum! Lorem ipsum dolor sit amet consectetur adipisicing elit. At dolorum dolores perspiciatis eius natus. Accusantium, repudiandae? Modi incidunt pariatur ab rem earum labore ducimus assumenda, tempora amet aspernatur reprehenderit dolore!</p>', 'uploads/serviceHeadLineImage3/__1701784474_125b0d71dc506bfaf29e.jpg', 0, 1, '2023-12-05 07:54:34', '2023-12-05 07:54:34', '2023-12-06 02:21:30'),
(4, 'Product Development', 'uploads/serviceBannerImage/__1701850806_62b4858c9d2d7e0894de.jpg', 'Manufacturing', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem nobis tempore omnis, doloremque laudantium nam ea, iusto iure, amet voluptatem consequatur illo beatae similique! Tenetur eum temporibus suscipit voluptates sunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, alias vitae nisi ex porro maxime quae, deleniti quaerat odit similique voluptates quisquam commodi veritatis voluptatibus voluptas dolorem omnis incidunt quo? Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati nemo quo assumenda exercitationem, voluptas et rerum sunt perspiciatis, ducimus velit doloribus magni laboriosam in aliquid corrupti, mollitia quam dignissimos repellendus!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta in magnam voluptatem natus quas quis qui doloremque, molestias doloribus earum, voluptates dolorum, optio sunt tempore incidunt saepe eaque ratione harum. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, labore nemo beatae et quaerat cumque animi iure rerum qui, similique impedit eveniet odio quisquam libero sequi in ipsam molestiae quas!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, laboriosam nostrum at a porro eos doloremque, unde facilis aliquam sapiente obcaecati dignissimos doloribus animi laborum similique nisi! Praesentium, eveniet quidem.</p>', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ex possimus commodi cum laboriosam debitis, enim recusandae nemo, nulla culpa velit sed quas modi in quod fugiat quae repellendus consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus unde odit nobis commodi asperiores, accusantium natus ad, molestiae reprehenderit deleniti eius voluptate assumenda, perspiciatis ducimus eos. Facilis velit voluptatum harum! Lorem ipsum dolor sit amet consectetur adipisicing elit. At dolorum dolores perspiciatis eius natus. Accusantium, repudiandae? Modi incidunt pariatur ab rem earum labore ducimus assumenda, tempora amet aspernatur reprehenderit dolore!</p>', 'uploads/serviceHeadLineImage2/__1701784474_17fdd8b11bd7d33547dc.jpg', 'Custom Board Manufacturing', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ex possimus commodi cum laboriosam debitis, enim recusandae nemo, nulla culpa velit sed quas modi in quod fugiat quae repellendus consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus unde odit nobis commodi asperiores, accusantium natus ad, molestiae reprehenderit deleniti eius voluptate assumenda, perspiciatis ducimus eos. Facilis velit voluptatum harum! Lorem ipsum dolor sit amet consectetur adipisicing elit. At dolorum dolores perspiciatis eius natus. Accusantium, repudiandae? Modi incidunt pariatur ab rem earum labore ducimus assumenda, tempora amet aspernatur reprehenderit dolore!</p>', 'uploads/serviceHeadLineImage3/__1701784474_125b0d71dc506bfaf29e.jpg', 0, 1, '2023-12-05 07:54:34', '2023-12-05 07:54:34', '2023-12-06 02:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userTypeID` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `userName` varchar(64) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `statusOn` datetime NOT NULL DEFAULT current_timestamp(),
  `lastLoggedOn` datetime DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userTypeID`, `name`, `email`, `password`, `userName`, `phone`, `status`, `statusOn`, `lastLoggedOn`, `createdOn`) VALUES
(1, 1, 'akmal', 'akmal@gmail.com', '123456', 'akmal', 0, 1, '2023-11-29 11:28:02', '2023-11-29 05:54:31', '2023-11-29 06:35:29'),
(2, 14, 'akmal test', 'akmaltest@gmail.com', '1f32aa4c9a1d2ea010adcf2348166a04', NULL, 112222, 1, '2023-11-30 05:10:52', NULL, '2023-11-30 01:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `userTypeID` int(11) NOT NULL,
  `userType` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `statusOn` datetime NOT NULL DEFAULT current_timestamp(),
  `createdOn` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`userTypeID`, `userType`, `status`, `statusOn`, `createdOn`, `updatedOn`) VALUES
(1, 'Admin', 1, '2023-11-29 17:53:35', '2023-11-29 17:53:35', '2023-11-30 01:31:28'),
(4, 'IT', 1, '2023-11-29 23:16:09', '2023-11-29 23:16:09', '2023-11-30 02:07:07'),
(14, 'Manager', 1, '2023-11-30 00:46:28', '2023-11-30 00:46:28', '2023-11-30 01:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `work_category`
--

CREATE TABLE `work_category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(11) NOT NULL,
  `createdOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_category`
--

INSERT INTO `work_category` (`categoryID`, `categoryName`, `createdOn`) VALUES
(1, 'INTERIORS', '2023-12-06 02:13:29'),
(2, 'FLORE', '2023-12-06 13:14:55'),
(4, 'SIDE', '2023-12-06 03:57:10'),
(5, 'Hello', '2023-12-06 04:36:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`aboutID`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`bannerID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`featureID`);

--
-- Indexes for table `our_works`
--
ALTER TABLE `our_works`
  ADD PRIMARY KEY (`workID`);

--
-- Indexes for table `our_work_gallery_images`
--
ALTER TABLE `our_work_gallery_images`
  ADD PRIMARY KEY (`gallaryImageID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_gallary_images`
--
ALTER TABLE `product_gallary_images`
  ADD PRIMARY KEY (`gallaryImageID`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`materialID`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`productTypeID`);

--
-- Indexes for table `product_type_details`
--
ALTER TABLE `product_type_details`
  ADD PRIMARY KEY (`typeDetailID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`userTypeID`);

--
-- Indexes for table `work_category`
--
ALTER TABLE `work_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `aboutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `bannerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `featureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `our_works`
--
ALTER TABLE `our_works`
  MODIFY `workID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `our_work_gallery_images`
--
ALTER TABLE `our_work_gallery_images`
  MODIFY `gallaryImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_gallary_images`
--
ALTER TABLE `product_gallary_images`
  MODIFY `gallaryImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_material`
--
ALTER TABLE `product_material`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `productTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_type_details`
--
ALTER TABLE `product_type_details`
  MODIFY `typeDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `userTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `work_category`
--
ALTER TABLE `work_category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
