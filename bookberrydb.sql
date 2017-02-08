-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2016 at 04:49 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookberry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'mahana.deepak20@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'ENGINEERING'),
(2, 'MEDICAL'),
(3, 'CIVIL SERVICES'),
(4, 'LITERATURE');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_address`, `customer_country`, `customer_contact`, `customer_image`) VALUES
(1, '127.0.0.1', 'Deepak Mahana', 'mahana.deepak20@gmail.com', '12345', 'Ghatkopar(W)', 'India', '9892851277', '1.jpg'),
(2, '127.0.0.1', 'Pushkaraj Joshi', 'pushkaraj903@gmail.com ', '12345', 'Chinchpokli', 'India', '9833467730', '2.jpg'),
(3, '127.0.0.1', 'Prajwal Bharambe', 'plystudy@gmail.com', '12345', 'Panvel', 'India', '7021068933', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(100) NOT NULL AUTO_INCREMENT,
  `p_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `status` text NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(100) NOT NULL AUTO_INCREMENT,
  `amount` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_author` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_author`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 'Fundamentals Of Algorithms', 'Sartaz Sahani', 500, '<p>It is a very good book.</p>', 'algorithmsahani.jpg', 'Algorithms , Sahani , Asymptotic , Computer , Engineering '),
(2, 1, 'Head First Java', 'Kathy Sierra ', 700, '<p>Core Java</p>', 'HFJava.gif', 'Programming, Language , Java , Computer , Engineering '),
(3, 1, 'ANSI C', 'E.Balguruswamy', 400, '<p>C Programming</p>', 'AnsiC.jpg', 'Programming, Language , C , Computer , Engineering '),
(4, 1, 'Introduction to Algorithms', 'Cormen', 900, '<p>Introduction to Algorithms from Asymptotic to high level.</p>', 'Clrs3.jpeg', 'Algorithms , Cormen , Asymptotic , Computer , Engineering '),
(5, 1, 'Database Management System', 'Sudarshan, Korth', 550, '<p>Database Management System, Files, DBMS</p>', 'dbms.jpeg', 'Programming, Database , SQL , Computer , Engineering '),
(6, 1, 'Operating System', 'Galvin', 600, '<p>Fundamentals of Operating Systems</p>', 'OS.jpg', 'Programming, Operating System , Computer , Engineering '),
(7, 1, 'JSP and Servlets', 'Kathy Sierra ', 800, '<p>Java Server Pages and Servlets to create dynamic pages</p>', 'HFjspNserv.gif', 'Programming, Language , Java ,JSP, Servelt, Computer , Engineering '),
(8, 1, 'Basic Electrical ', 'BR Patil', 450, '<p>Basic Of Electrical and Electronics Engineering</p>', 'beeBRpatil.jpg', 'Electronics , Electrical , Circuits , Electronics Engineering '),
(9, 1, 'Basic Electronics', 'Ravish Singh', 460, '<p>Basic Electrical and Electronics Engineering Concepts by Ravish Singh</p>', 'BeeRavish.jpg', 'Electronics , Electrical , Circuits , Electronics Engineering , Ravish Singh'),
(10, 1, 'Programming in C', 'Pradeep Dey', 520, '<p>Programming in C with easy to understand approach</p>', 'CprogPradeepDey.jpg', 'Programming, Language , C , Computer , Engineering , Pradeep Dey'),
(11, 1, 'DS and Algorithms', 'Robert Lafore', 650, '<p>Data Structure</p>', 'datastruct.jpg', 'Algorithms , Data Structure , Asymptotic , Computer , Engineering '),
(12, 1, 'DS and Algorithms Made Easy', 'CarrerMonk', 410, '<p>Data Structure by Narasimha Karumanchi</p>', 'datastructandalgo.jpg', 'Algorithms , Data Structure , Asymptotic , Computer , Engineering , CarrerMonk'),
(13, 1, 'Digital Logic ', 'Morris Mano', 530, '<p>Digital Logic and Electronics</p>', 'digital.jpg', 'Digital, Logic Gates, Electronics, Engineering'),
(14, 1, 'DS and Algorithms in C++', 'Pearson Education', 320, '<p>Data Structure in C++</p>', 'dsinc.png', 'Algorithms , Data Structure , Asymptotic , Computer , Engineering , C++'),
(15, 1, 'Engineering Drawing', 'NH DUBEY', 620, '<p>Engineering Drawing</p>', 'ED.jpg', 'Drawing, Curves, Isometric, Engineering, 3D'),
(16, 1, 'Engineering Mechanics', 'NH DUBEY', 430, '<p>Mechanics</p>', 'Mech.jpg', 'Mechanics, NH Dubey, Engineering '),
(17, 2, 'Human Anatomy', 'CBS Publishers', 1010, '<p>Human</p>', 'anatomy.jpg', 'Human, Anatomy, Medical, MBBS'),
(18, 2, 'Human Anatomy', 'Robert D Acland', 650, '<p>Human Anotomy</p>', 'anatomy1.jpg', 'Human, Anatomy, Medical, MBBS, Robert Acland'),
(19, 2, 'Biochemistry', 'Jaypee Publication', 1560, '<p>Biochemistry</p>', 'biochemistry.jpg', 'Bio, Chemistry, Medical, Biochemistry, MBBS, Jaypee'),
(20, 2, 'Disaster Medicine', 'Elsevier', 1200, '<p>not interested</p>', 'DisasterMedicine.jpg', 'Disaster, Medicine, MBBS, Medical, Elsevier'),
(21, 2, 'Microbiology', 'Elsevier', 1500, '<p>its all about minute part of biology</p>', 'Microbiology.jpg', 'Microbiology, biology, elsevier'),
(22, 2, 'Microbiology', 'Connie Mahon', 2500, '<p>great</p>', 'microbiology1.jpg', 'Connie Mahon , Microbiology, Medical'),
(23, 2, 'Pharma Medicine', 'Lionel D Edwards', 1155, '<p>medicine</p>', 'pharmamedicine.jpg', 'Medicine, Science Pharma, Pharmamedicine'),
(24, 2, 'Pharmocology', 'Padma Udaykumar', 1555, '<p>pharmology books</p>', 'pharmocology.jpeg', 'Pharmocology, Padma Udaykumar, medicine field'),
(25, 2, 'Pharmocology', 'Rang N Dale', 1400, '<p>Pharmocology</p>', 'RnDPharmacology.jpg', 'Pharmocology, Rang N Dale, Medical'),
(26, 3, 'Combined Defence Services', 'Pathfinder', 610, 'pp', 'CDS.JPG', 'Combined,Defence,Services,UPSC,Civil,Army,Military,Navy,Airforce'),
(27, 3, 'Indian Economy', 'Ramesh Singh', 510, 'pp', 'economy.jpg', 'Economy,Commerce,UPSC,Civil Services'),
(28, 3, 'Ethics Integrity & Apt', 'Nanda Kishore Reddy', 420, 'pp', 'Ethics.jpeg', 'Ethics,Integrity,Aptitude,UPSC,civil'),
(29, 3, 'General Studies', 'Tata Macgraw Hill', 780, 'pp', 'GS.JPG', 'General Studies,GS,UPSC,Civil Services,Competitve Exams'),
(30, 3, 'History of Modern India', 'Bipin Chandra', 210, 'his', 'mhistory.jpg', 'History,Modern India,Bipin Chandra,UPSC,Civil Services'),
(31, 3, 'Indian Economy', 'Sanjiv Verma', 600, 'Economy', 'IndianEconomy.jpg', 'Indian,Economy,Commerce,UPSC,Civil Services'),
(32, 3, 'Indian Polity', 'M Laxmikanth', 450, 'pp', 'IndianPolity.jpg', 'Indian,Polity,Politics,UPSC,Civil Services,Competitve Exams'),
(33, 3, 'India Since Independence', 'Bipin Chandra', 620, 'pp', 'indiasind.jpg', 'India,Independence,UPSC,Civil Services,Bipin Chandra'),
(34, 3, 'Indian History', 'Prakash Kumar', 488, 'pp', 'history.jpg', 'India,History,UPSC,Civil Services,Modern,Ancient'),
(35, 3, 'Environment', 'Shankar IAS', 630, 'pp', 'environment.jpg', 'India,Environment,UPSC,Civil Services'),
(36, 3, 'UPSC Sociology', 'Dr.S.Saraswati', 230, '<p>pp</p>', 'UPSC 1.JPG', 'India,Sociology,UPSC,Civil Services,Social'),
(37, 4, 'My Journey', 'APJ ABDUL KALAM', 250, 'pp', 'apjjourney.jpeg', 'Journey, APJ , Abdul , Kalam , Transforming, India'),
(38, 4, 'Ignited Minds', 'APJ Abdul Kalam', 290, 'pp', 'ignitedminds.jpg', 'Ignited, Minds, APJ , Abdul , Kalam , Transforming, India'),
(39, 4, '3 Mistakes Of My Life', 'Chetan Bhagat', 90, 'pp', '3mistakes.jpg', 'Journey, Chetan, Bhagat, Mistakes, Life, India'),
(40, 4, 'Half Girlfriend', 'Chetan Bhagat', 120, 'pp', 'halfgirlfriend.jpg', 'Half, Chetan, Bhagat, Girlfriend, Life, India'),
(41, 4, 'The Kite Runner', 'Khaled Hossaini', 320, 'pp', 'KiteRunner.jpg', 'Kite, Khaled , Hossaini, Runner'),
(42, 4, 'And The Mountains Echoed', 'Khaled Hossaini', 430, 'pp', 'mountainsecho.jpg', 'Mountains, Echoed, Khaled, Hossaini'),
(43, 4, 'Harry Potter Box Set', 'J.K.Rowling', 2250, 'pp', 'HarryBox.JPG', 'Harry, Potter, Rowling, Box, Series, Set, All in one'),
(44, 4, 'Revolution 2020', 'Chetan Bhagat', 230, 'pp', 'revolution2020.jpg', 'Journey, Chetan, Bhagat, Mistakes, Life, India, 2020, Revolution'),
(45, 4, 'Rich Dad Poor Dad', 'Robert Kiyosaki', 200, 'pp', 'RichdadPoorDad.jpg', 'Rich, Dad, Poor , Robert , Kiyosaki '),
(46, 4, 'A Thousand Splendid Suns', 'Khaled Hossaini', 340, 'pp', 'splendidsuns.jpg', 'Thousand, Splendid, Suns, Khaled, Hossaini'),
(47, 4, 'Stay Hungry Stay Foolish', 'Rashmi Bansal', 560, 'pp', 'stayhsfool.jpg', 'Stay, Hungry, Foolish, Rashmi, Bansal, Startups'),
(48, 4, 'Think And Grow Rich', 'Napolean Hill', 230, 'pp', 'thinknrichgrow.jpg', 'Think, Grow, Rich, Napolean, Hill'),
(49, 4, 'Wings Of Fire', 'APJ Abdul Kalam', 260, 'pp', 'Wingsoffire.jpg', 'Journey, APJ , Abdul , Kalam , Transforming, India, Wings, Fire'),
(51, 4, 'Harry Potter & Cursed Child', 'J.K.Rowling', 600, 'pp', 'Harry Potter and Cursed Child.jpg', 'Harry, Potter, Rowling, Cursed, Child'),
(52, 4, 'One Indian Girl', 'Chetan Bhagat', 160, 'pp', 'One Indian Girl.jpg', 'Journey, Chetan, Bhagat, One, Indian, Girl');
