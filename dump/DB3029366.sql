-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: rdbms
-- Erstellungszeit: 26. Feb 2018 um 13:53
-- Server Version: 5.6.37-log
-- PHP-Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `DB3029366`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Media`
--

CREATE TABLE IF NOT EXISTS `Media` (
`MID` int(11) NOT NULL,
  `OfType` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `User` int(11) DEFAULT NULL,
  `Source1` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Source2` mediumtext COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `Media`
--

INSERT INTO `Media` (`MID`, `OfType`, `Name`, `User`, `Source1`, `Source2`) VALUES
(41, 'Text', 'Liebe.txt', 38, 'upload/text/Liebe.txt', 'Gedicht Ã¼ber das Thema Liebe'),
(44, 'Audio', 'Mozart - Symphonie.mp3', 47, 'upload/audio/Mozart - Symphonie.mp3', 'Klassische Musik'),
(46, 'YT', 'Luftaufnahmen aus dem Siegerland', 43, 'T_-sj99ALwk', 'Aufnahmen aus dem Flugzeug'),
(55, 'Text', 'Der Esel auf Probe.txt', 49, 'upload/text/Der Esel auf Probe.txt', 'Eine Fabel Ã¼ber einen Esel'),
(57, 'Image', 'bbb.jpg', 51, 'upload/images/bbb.jpg', 'Eine wunderschÃ¶ne Sonnenblumennn'),
(58, 'Image', '150-Jahre-Henry-Ford-Das-erste-Auto-erz-hlt-gp_t4yo1gcc_183300-620x400.jpg', 52, 'upload/images/150-Jahre-Henry-Ford-Das-erste-Auto-erz-hlt-gp_t4yo1gcc_183300-620x400.jpg', 'Das erste Auto von Ford'),
(59, 'Audio', 'John Denver - Country Roads.mp3', 53, 'upload/audio/John Denver - Country Roads.mp3', 'Dem Himmel nahe, West Virginia\r\nBlue Ridge Mountains, Shenandoah River\r\nDas Leben ist alt dort, Ã¤lter als die BÃ¤ume\r\nJÃ¼nger als die Berge, wehend wie eine Brise\r\n\r\nLandstraÃŸen, bringt mich nach Hause\r\nZu dem Platz zu dem ich gehÃ¶re\r\nWest Virginia, Mutter der Berge\r\nBringt mich nach Hause, LandstraÃŸen\r\n\r\nAlle meine Erinnerungen drehen sich um sie\r\nMinerâ€™s Lady, eine Fremde fÃ¼r das blaue Wasser\r\nDunkel und staubig in den Himmel gezeichnet\r\nDas neblige GefÃ¼hl von Mondschein, eine TrÃ¤ne ist in meinem Auge\r\n\r\n\r\n\r\nLandstraÃŸen, bringt mich nach Hause\r\nZu dem Platz zu dem ich gehÃ¶re\r\nWest Virginia, Mutter der Berge\r\nBringt mich nach Hause, LandstraÃŸen\r\n\r\nIch hÃ¶re die Stimme\r\nin der Morgenstunde ruft sie mich\r\ndas Radio erinnert mich an mein weit entferntes zuhause\r\ndie Strasse entlangfahrend bekomme ich so ein GefÃ¼hl\r\ndas ich gestern hÃ¤tte zuhause sein sollen (gestern)\r\n\r\n(2x) LandstraÃŸen, bringt mich nach Hause\r\nZu dem Platz zu dem ich gehÃ¶re\r\nWest Virginia, Mutter der Berge\r\nBringt mich nach Hause, LandstraÃŸen'),
(60, 'YT', 'Die schÃ¶nsten Bahnstrecken Deutschlands ', 52, '0rZgcVH5378', 'Leipzig - Saalfeld\r\nFÃ¼hrerstands Mitfahrten durch Deutschland\r\nDie schÃ¶nsten Bahnstrecken Deutschlands'),
(62, 'YT', 'Katzen Treffen Welpen Zum Ersten Mal', 54, 'IOP-vwNx6xA', 'Erste Begegnung zwischen Katze und Hundewelpen'),
(63, 'Image', 'Stadt.jpg', 45, 'upload/images/Stadt.jpg', 'Heimatstadt Ulm'),
(64, 'Audio', 'Test.mp3', 53, 'upload/audio/Test.mp3', 'TestDatei'),
(69, 'Image', 'wall-painting-1241426_640.jpg', 53, 'upload/images/wall-painting-1241426_640.jpg', 'rrrr'),
(70, 'YT', 'TestVideo', 45, '-GcAc0kovUs', 'ddd'),
(71, 'YT', 'TestVideo', 45, '-GcAc0kovUs', 'ddd'),
(72, 'YT', 'Name des Videos', 34, 'ga3etWQgK0s', 'sss'),
(75, 'Audio', '03 - Besser Im Bett.mp3', 43, 'upload/audio/03 - Besser Im Bett.mp3', 'fdgdfg'),
(76, 'Audio', '04 - Rain on You (Feat. Emory).mp3', 43, 'upload/audio/04 - Rain on You (Feat. Emory).mp3', 'fdppp'),
(77, 'Audio', '10-avicii-heart_upon_my_sleeve.mp3', 34, 'upload/audio/10-avicii-heart_upon_my_sleeve.mp3', 'sda'),
(79, 'Audio', '15 - Das Spiel.mp3', 46, 'upload/audio/15 - Das Spiel.mp3', 'fgjfgfghhgf'),
(80, 'Audio', '20-Outro.mp3', 43, 'upload/audio/20-Outro.mp3', 'fghfgh');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `User`
--

CREATE TABLE IF NOT EXISTS `User` (
`UID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Public` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `User`
--

INSERT INTO `User` (`UID`, `Name`, `Public`) VALUES
(33, 'Ursula Brigitte', 0),
(34, 'Hans Dieter Wolf', 0),
(38, '1960', 1),
(39, '1950', 1),
(40, '1970', 1),
(41, '1980', 1),
(43, 'Bekannte Orte', 1),
(44, 'Hermann Walter', 0),
(45, 'Frauke Jung', 0),
(46, 'Modern Pop', 1),
(47, 'Klassik', 1),
(48, 'Geschichten', 1),
(49, 'Fabeln', 1),
(51, 'Pflanzen', 1),
(52, 'Technik', 1),
(53, 'Country Musik', 1),
(54, 'Tiere', 1),
(57, '2001', 0),
(58, 'ssss', 0),
(59, 'TÃ¼ere', 1),
(60, 'StÃ¤dte', 1),
(61, 'Silvester', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Media`
--
ALTER TABLE `Media`
 ADD PRIMARY KEY (`MID`), ADD KEY `User` (`User`);

--
-- Indizes für die Tabelle `User`
--
ALTER TABLE `User`
 ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Media`
--
ALTER TABLE `Media`
MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT für Tabelle `User`
--
ALTER TABLE `User`
MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Media`
--
ALTER TABLE `Media`
ADD CONSTRAINT `Media_ibfk_1` FOREIGN KEY (`User`) REFERENCES `User` (`UID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
