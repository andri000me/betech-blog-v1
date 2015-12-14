-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2015 at 10:11 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `betech_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_article`
--

CREATE TABLE IF NOT EXISTS `tb_article` (
  `article_id` int(4) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(200) NOT NULL,
  `article_content` text NOT NULL,
  `article_datetime` datetime NOT NULL,
  `article_pict` varchar(100) NOT NULL,
  `article_cat_id` int(2) NOT NULL,
  `article_user_id` int(2) NOT NULL,
  `article_publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_article`
--

INSERT INTO `tb_article` (`article_id`, `article_title`, `article_content`, `article_datetime`, `article_pict`, `article_cat_id`, `article_user_id`, `article_publish`) VALUES
(3, 'Tutorial Crud Part 4', '<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>', '2015-11-04 11:24:39', 'tutorial-crud-part-4.jpg', 10, 1, 'Y'),
(4, 'Wajib mengenal programming', '<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>', '2015-11-04 11:24:30', 'wajib-mengenal-programming.png', 4, 1, 'Y'),
(5, 'Harus bersertifikasi', '<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>', '2015-11-04 11:25:15', 'harus-bersertifikasi.png', 9, 1, 'Y'),
(6, 'Belajar Slicing', '<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>\r\n<p>Quisque imperdiet placerat lacinia. In hac habitasse platea dictumst. Pellentesque in mattis sapien, nec tincidunt erat. Fusce convallis ipsum et arcu tempor, maximus tincidunt enim lobortis. Sed a eros eget purus ultrices ultrices a in erat. Suspendisse scelerisque a augue sed dignissim. Vestibulum accumsan urna quam, id mattis mi lobortis sit amet. Maecenas a ex vulputate, tristique ipsum nec, molestie neque. Quisque vulputate quam lorem, eu imperdiet nisl facilisis eu. Maecenas nulla justo, congue ut euismod gravida, suscipit id ligula. Duis convallis est libero, a pellentesque sapien finibus eu. Fusce vitae auctor quam. Quisque scelerisque felis nec augue fermentum, eget consectetur risus feugiat.</p>', '2015-11-04 11:29:01', 'belajar-slicing.png', 3, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `cat_id` int(2) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`cat_id`, `cat_name`) VALUES
(14, 'VB'),
(2, 'YII Framework'),
(3, 'Ruby on Rails'),
(4, 'Angular JS'),
(9, 'Java'),
(10, 'NodeJs'),
(12, 'MySQL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE IF NOT EXISTS `tb_gallery` (
  `gallery_id` int(4) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(100) NOT NULL,
  `gallery_desc` text NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_gallery`
--

INSERT INTO `tb_gallery` (`gallery_id`, `gallery_name`, `gallery_desc`) VALUES
(1, '1291969.jpg', 'Ini gambar 20'),
(4, '56883622_18f242e114_z.jpg', 'Ini gambar 1'),
(5, 'HiRes.jpg', 'Ini gambar 3'),
(6, 'html-programming.jpg', 'Ini gambar 10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(2) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(35) NOT NULL,
  `user_pass` varchar(128) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_pass`, `user_fullname`) VALUES
(1, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Demo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
