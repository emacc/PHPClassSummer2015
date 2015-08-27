-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2015 at 03:39 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpclasssummer2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `sitelinks`
--

CREATE TABLE IF NOT EXISTS `sitelinks` (
  `site_id` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sitelinks`
--

INSERT INTO `sitelinks` (`site_id`, `link`) VALUES
(2, 'http://www.google.com/'),
(3, 'http://www.iana.org/domains/example'),
(4, 'http://www.wikipedia.org/'),
(5, 'http://cdn.sstatic.net/stackoverflow/img/apple-touch-icon'),
(5, 'http://stackoverflow.com/'),
(5, 'https://stackauth.com'),
(5, 'http://chat.stackoverflow.com'),
(5, 'http://blog.stackoverflow.com'),
(5, 'http://meta.stackoverflow.com'),
(5, 'https://stackoverflow.com/users/signup'),
(5, 'https://stackoverflow.com/users/login'),
(5, 'http://akka.io/news/2015/07/15/akka-streams-1.0-released.html said that Akka Streams '),
(5, 'https://github.com/ride/ember-stripe-service add-on and everything worked nicely until Ember 1.10.1'),
(5, 'http://math.stackexchange.com/questions/1410343/definition-of-homeomorphic'),
(5, 'http://ell.stackexchange.com/questions/65397/the-first-time-i-met-my-wife-i-knew-she-was-a-keeper-she-was-wearing-massive-g'),
(5, 'http://ux.stackexchange.com/questions/83562/how-to-indicate-that-something-isnt-to-scale'),
(5, 'http://stackoverflow.com/questions/32233623/combining-3-arrays-by-row-number'),
(5, 'http://biology.stackexchange.com/questions/37211/why-are-potassium-channels-slower-than-sodium-channels'),
(5, 'http://tex.stackexchange.com/questions/263332/how-to-condense-environments-and-options-to-one-environment'),
(5, 'http://scifi.stackexchange.com/questions/100246/identify-a-sci-fi-painting-of-a-man-in-a-space-suit-flying-just-above-a-horde-of'),
(5, 'http://blender.stackexchange.com/questions/36477/rendered-object-blender-2-74-cant-be-moved'),
(5, 'http://german.stackexchange.com/questions/25185/the-pronounciation-of-e-is-so-confusing'),
(5, 'http://blender.stackexchange.com/questions/36485/using-python-to-animate-a-curve-fmodifier'),
(5, 'http://space.stackexchange.com/questions/10777/is-nasa-launching-fewer-interplanetary-missions'),
(5, 'http://gis.stackexchange.com/questions/159780/how-do-i-figure-out-the-length-of-polyline-features-in-a-feature-class-with-a-wg'),
(5, 'http://scifi.stackexchange.com/questions/100262/looking-for-a-novel-i-read-about-twenty-years-ago-about-a-man-who-can-change-rea'),
(5, 'http://dba.stackexchange.com/questions/112300/finding-distinct-rows-across-two-tables-full-outer-join-more-efficient-than-uni'),
(5, 'http://puzzling.stackexchange.com/questions/20581/find-the-longest-string-of-words-such-that-the-4-letter-end-of-one-word-is-the'),
(5, 'http://codegolf.stackexchange.com/questions/55272/a-naturally-occurring-prime-generator'),
(5, 'http://rpg.stackexchange.com/questions/67695/can-more-than-one-battle-master-maneuvers-be-used-in-the-same-attack'),
(5, 'http://codegolf.stackexchange.com/questions/55293/stop-stand-there-where-you-are'),
(5, 'http://ell.stackexchange.com/questions/65434/would-you-like-cup-of-bloodcount-duclia-said-to-lord-voldmart'),
(5, 'http://money.stackexchange.com/questions/52313/ethics-and-investment'),
(5, 'http://scifi.stackexchange.com/questions/100217/how-was-ramirezs-sword-forged-over-1-500-years-before-katana-swordsmithing-tech'),
(5, 'http://anime.stackexchange.com/questions/24393/love-chuunibyou-other-delusions-productions-ordering'),
(5, 'http://aviation.stackexchange.com/questions/19347/what-do-i-do-if-i-wish-to-move-my-software-from-dal-level-a-to-dal-level-c'),
(5, 'http://worldbuilding.stackexchange.com/questions/23350/could-an-average-person-take-over-the-world'),
(5, 'http://data.stackexchange.com'),
(5, 'http://stackexchange.com/legal'),
(5, 'http://stackexchange.com/legal/privacy-policy'),
(5, 'http://stackexchange.com/work-here'),
(5, 'http://stackexchange.com/mediakit'),
(5, 'http://stackexchange.com/sites'),
(5, 'http://creativecommons.org/licenses/by-sa/3.0/'),
(5, 'http://blog.stackoverflow.com/2009/06/attribution-required/'),
(5, 'http://pixel.quantserve.com/pixel/p-c1rF4kxgLUzNc.gif'),
(6, 'http://www.w3.org/1999/xhtml'),
(6, 'http://php.net/favicon.ico'),
(6, 'http://php.net/phpnetimprovedsearch.src'),
(6, 'http://php.net/releases/feed.php'),
(6, 'http://php.net/feed.atom'),
(6, 'http://php.net/index.php'),
(6, 'http://php.net/index'),
(6, 'http://php.net/cached.php'),
(6, 'http://php.net/styles/workarounds.ie7.css'),
(6, 'http://php.net/styles/workarounds.ie9.css'),
(6, 'http://php.net/js/ext/html5.js'),
(6, 'http://php.net/archive/2015.php'),
(6, 'https://bugs.php.net'),
(6, 'https://github.com/php/php-src/blob/php-7.0.0RC1/NEWS'),
(6, 'https://github.com/php/php-src/blob/php-7.0.0RC1/UPGRADING'),
(6, 'https://downloads.php.net/ab/'),
(6, 'http://windows.php.net/qa/'),
(6, 'https://wiki.php.net/todo/php70'),
(6, 'http://www.php.net/downloads.php'),
(6, 'http://windows.php.net/download/'),
(6, 'http://www.php.net/ChangeLog-5.php'),
(6, 'http://php.net/supported-versions.php'),
(6, 'https://github.com/php/php-src/blob/php-7.0.0beta3/NEWS'),
(6, 'https://github.com/php/php-src/blob/php-7.0.0beta3/UPGRADING'),
(6, 'https://github.com/php/php-src/blob/php-7.0.0beta2/NEWS'),
(6, 'https://github.com/php/php-src/blob/php-7.0.0beta2/UPGRADING'),
(6, 'http://php.net/archive/2013.php'),
(6, 'http://bugs.php.net'),
(6, 'https://twitter.com/official_php'),
(6, 'http://php.net/conferences/index.php'),
(7, 'http://www.msn.com/'),
(8, 'https://github.com/gforti'),
(8, 'http://www.linkedin.com/pub/gabriel-forti/58/523/a00/'),
(8, 'http://www.gforti.com '),
(8, 'https://docs.google.com/document/d/1Ie_9obN7jZyy0gB6kHRwU1B_5pz-CuSP27jKUqFhOjo/edit'),
(8, 'http://www.chadbrownhealth.org/'),
(8, 'http://www.optum.com/'),
(8, 'http://www.neit.edu/'),
(8, 'http://www.andera.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sitelinks`
--
ALTER TABLE `sitelinks`
  ADD KEY `site_id` (`site_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sitelinks`
--
ALTER TABLE `sitelinks`
ADD CONSTRAINT `sitelinks_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`site_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
