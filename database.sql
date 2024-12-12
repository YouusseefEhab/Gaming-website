-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 06:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int(50) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`name`, `email`, `password`, `age`, `user_type`) VALUES
('mina', 'mina@gmail.com', '88bc791a99343512d457ce0b26d5726e', 20, 'user'),
('youssef', 'youssef@gmail.com', '4bcd7361dee8bd3e1c78cc0fca5cdf53', 20, 'developer'),
('yosab', 'yosab@gmail.com', '2611b81c2c51fe44f646ea184ac656f0', 20, 'user'),
('emad', 'emad@gmail.com', '1fcf7a4e78b82e0ea8d11c2ac293e412', 19, 'developer'),
('amir', 'amir@gmail.com', '7e3df9b73a8759ac27cabd5750fda2c7', 21, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user` varchar(50) NOT NULL,
  `cart` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`user`, `cart`) VALUES
('mina', 'Dark Souls II'),
('yosab', 'Dark Souls II');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user` varchar(50) NOT NULL,
  `complaint` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user`, `complaint`) VALUES
('mina', ' Enter Your Complaint. '),
('amir', 'i uploaded and no work'),
('mina', ''),
('mina', 'my complaint.'),
('mina', 'hjfgfjhgfhjgfjh');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float(5,2) NOT NULL,
  `developer` varchar(50) NOT NULL,
  `categories` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`name`, `description`, `price`, `developer`, `categories`) VALUES
('Elden Ring', 'THE NEW FANTASY ACTION RPG. Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.', 59.99, 'From Software', 'Action,RPG'),
('Call Of Duty: Black Ops III', 'Call of Duty: Black Ops III takes place in 2065, 40 years after the events of Black Ops II, in a world facing upheaval from conflicts, climate change and new technologies. A Third Cold War is ongoing between two global alliances, known as the Winslow Accord and the Common Defense Pact.', 59.99, 'Activision', 'Action,Adventure'),
('Red Dead Redemption 2', 'Winner of over 175 Game of the Year Awards and recipient of over 250 perfect scores, RDR2 is the epic tale of outlaw Arthur Morgan and the infamous Van der Linde gang, on the run across America at the dawn of the modern age. Also includes access to the shared living world of Red Dead Online.', 59.99, 'Rockstar Games', 'Action,Adventure'),
('Dark Souls', 'Dark Souls will be the most deeply challenging game you play this year. Can you live through a million deaths and earn your legacy?', 24.99, 'From Software', 'Action,RPG'),
('Dishonored', 'Dishonored is an immersive first-person action game that casts you as a supernatural assassin driven by revenge. With Dishonored’s flexible combat system, creatively eliminate your targets as you combine the supernatural abilities, weapons and unusual gadgets at your disposal.', 9.99, 'Arkane Studios', 'Action,Adventure'),
('Dishonored: Death Of The Outsider', 'From the award-winning developers at Arkane® Studios comes Dishonored®: Death of the Outsider, the next standalone adventure in the critically-acclaimed Dishonored® series.', 29.99, 'Arkane Studios', 'Action'),
('Dark Souls III', 'Dark Souls continues to push the boundaries with the latest, ambitious chapter in the critically-acclaimed and genre-defining series. Prepare yourself and Embrace The Darkness!', 59.99, 'From Software', 'Action'),
('Watch_Dogs', 'In today\'s hyper-connected world, Chicago operates under ctOS, the most advanced computer network in America.', 29.99, 'Ubisoft', 'Action,Adventure'),
('Watch_Dogs 2', 'Welcome to San Francisco. Play as Marcus, a brilliant young hacker, and join the most notorious hacker group, DedSec. Your objective: execute the biggest hack of history.', 49.99, 'Ubisoft', 'Action,Adventure'),
('Watch_Dogs: Legion', 'Build a resistance as you fight to take back a near-future London facing its downfall. Welcome to the Resistance.', 59.99, 'Ubisoft', 'Action,Adventure'),
('Dark Souls II', 'Developed by FROM SOFTWARE, DARK SOULS™ II is the highly anticipated sequel to the gruelling 2011 breakout hit Dark Souls. The unique old-school action RPG experience captivated imaginations of gamers worldwide with incredible challenge and intense emotional reward.', 24.99, 'From Software', 'Action,RPG'),
('Sekiro: Shadows Die Twice', 'In Sekiro: Shadows Die Twice you are the “one-armed wolf”, a disgraced and disfigured warrior rescued from the brink of death. Bound to protect a young lord who is the descendant of an ancient bloodline, you become the target of many vicious enemies, including the dangerous Ashina clan. When the young lord is captured, nothing will stop you on a perilous quest to regain your honor, not even death itself.', 59.99, 'From Software', 'Action,Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `name` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`name`, `id`, `number`) VALUES
('Youssab Shenoda', 20220558, '01025340381'),
('Mina Emad', 20220525, '01220351204'),
('Mina Georgie', 20220525, '01277933601'),
('Youssef Gamal', 20220564, '01140840042'),
('Youssef Ehab', 20220563, '01012072656'),
('Youssef Samy', 20220566, '01281306487'),
('Mina Ibrahim', 20220522, '01210369539'),
('Youssef Ahmed', 20220560, '01119086477');

-- --------------------------------------------------------

--
-- Table structure for table `ownedgames`
--

CREATE TABLE `ownedgames` (
  `name` varchar(50) NOT NULL,
  `games` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ownedgames`
--

INSERT INTO `ownedgames` (`name`, `games`) VALUES
('mina', 'Elden Ring,Dark Souls,Red Dead Redemption 2,Call Of Duty: Black Ops III,Dark Souls III,Dark Souls II,Dark Souls II'),
('yosab', 'Call Of Duty: Black Ops III,Dark Souls');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `user` varchar(50) NOT NULL,
  `CCName` varchar(50) NOT NULL,
  `CCNum` varchar(50) NOT NULL,
  `expMonth` varchar(50) NOT NULL,
  `expYear` varchar(50) NOT NULL,
  `CVV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`user`, `CCName`, `CCNum`, `expMonth`, `expYear`, `CVV`) VALUES
('mina', 'Mina Emad', '7b8802b5aa06e55f70c9d8711213364b', '06', '26', '1234'),
('mina', 'Mina Emad', '7b8802b5aa06e55f70c9d8711213364b', '06', '26', '1234'),
('mina', 'Mina Emad', '7b8802b5aa06e55f70c9d8711213364b', '06', '26', '1234'),
('mina', 'gjhgk', '52e175203ef3b93e8fa8151fdef7a2bf', '01', '25', '123'),
('mina', 'jhgkjhg', 'c7a2d84355479c3836c2b959248e5a8e', '05', '29', '321'),
('yosab', 'yos', '522c88530c38f56f72e6cda1871e04cf', '07', '24', '612'),
('yosab', 'asdlkfjalk', 'c494b90144b6e69c62bab2c89471c55a', '05', '28', '643');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
