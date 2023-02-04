-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2023 at 05:40 PM
-- Server version: 10.9.4-MariaDB
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polovni`
--

-- --------------------------------------------------------

--
-- Table structure for table `boja_vozila`
--

CREATE TABLE `boja_vozila` (
  `id_boje` int(11) NOT NULL,
  `boja` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `boja_vozila`
--

INSERT INTO `boja_vozila` (`id_boje`, `boja`) VALUES
(1, 'Bela'),
(2, 'Crna'),
(3, 'Bez'),
(4, 'Zelena'),
(5, 'Crvena'),
(6, 'Siva'),
(7, 'Srebrna '),
(8, 'Plava'),
(9, 'Narandzasta'),
(10, 'Braon'),
(11, 'Ljubicasta'),
(12, 'Zuta'),
(13, 'Zlatna'),
(14, 'Bordo'),
(15, 'Teget'),
(16, 'Krem'),
(17, 'Tirkizna'),
(18, 'Pink'),
(19, 'Visebojno');

-- --------------------------------------------------------

--
-- Table structure for table `broj_sedista`
--

CREATE TABLE `broj_sedista` (
  `id_sedista` int(11) NOT NULL,
  `broj` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `broj_sedista`
--

INSERT INTO `broj_sedista` (`id_sedista`, `broj`) VALUES
(1, '2 sedista'),
(2, '3 sedista'),
(3, '4 sedista'),
(4, '5 sedista'),
(5, '6 sedista'),
(6, '7 sedista'),
(7, '8 sedista'),
(8, '9 sedista');

-- --------------------------------------------------------

--
-- Table structure for table `broj_vrata`
--

CREATE TABLE `broj_vrata` (
  `id_vrata` int(11) NOT NULL,
  `tip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `broj_vrata`
--

INSERT INTO `broj_vrata` (`id_vrata`, `tip`) VALUES
(1, '2/3 vrata'),
(2, '4/5 vrata');

-- --------------------------------------------------------

--
-- Table structure for table `emisiona_klasa_motora`
--

CREATE TABLE `emisiona_klasa_motora` (
  `id_klase` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `emisiona_klasa_motora`
--

INSERT INTO `emisiona_klasa_motora` (`id_klase`, `naziv`) VALUES
(1, 'Euro 1'),
(2, 'Euro 2'),
(3, 'Euro 3'),
(4, 'Euro 4'),
(5, 'Euro 5'),
(6, 'Euro 6');

-- --------------------------------------------------------

--
-- Table structure for table `karoserija`
--

CREATE TABLE `karoserija` (
  `id_karoserije` int(11) NOT NULL,
  `vrsta` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `karoserija`
--

INSERT INTO `karoserija` (`id_karoserije`, `vrsta`) VALUES
(1, 'Limuzina'),
(2, 'Karavan'),
(3, 'Kupe'),
(4, 'Hecbek'),
(5, 'Kabriolet'),
(6, 'Dzip/SUV'),
(7, 'Monovolumen'),
(8, 'Pickup');

-- --------------------------------------------------------

--
-- Table structure for table `klima`
--

CREATE TABLE `klima` (
  `id_klime` int(11) NOT NULL,
  `vrsta` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `klima`
--

INSERT INTO `klima` (`id_klime`, `vrsta`) VALUES
(1, 'Nema'),
(2, 'Manuelna'),
(3, 'Automatska');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnika` int(11) NOT NULL,
  `ime` varchar(40) NOT NULL,
  `prezime` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `sifra` binary(60) NOT NULL,
  `rola` int(1) NOT NULL,
  `telefon` varchar(30) NOT NULL,
  `email` varchar(320) NOT NULL,
  `verifikovan` int(1) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnika`, `ime`, `prezime`, `username`, `sifra`, `rola`, `telefon`, `email`, `verifikovan`, `img`) VALUES
(1, 'Djordje', 'Molnar', 'djordje.molnar', 0x2432792431322459565544366b766e2f53586b4472706a6d46476734753676794b4f333431626c544e33376875746e4255534238514a782e78654143, 1, '+381695623568', 'molnar@gmail.com', 1, ''),
(2, 'Djurdja', 'Ristic', 'djurdja.ristic', 0x2432792431322468595534496248376f646f5a354655784831483462655a7370724b52536b475459526948484a7a4a6576496932386a574e76304e4b, 1, '+381641258569', 'ristic@gmail.com', 1, ''),
(3, 'Aleksa', 'Lazarevic', 'aleksa12432', 0x243279243132246d456c764256382f4d6f59637a646b626677664a772e4574487a762e46725072427937765a4a516556656a7861617559756b6e2e4b, 1, '+38164646464', 'lazarevic@gmail.com', 1, 'slike/avatar.png'),
(4, 'Milan', 'Marinkovic', 'milan.marinkovic', 0x243279243132246a465164776d555a70485a3251556f34455870724c75574e4e716a37464f6130564f39536646574270776465666d4e595563663853, 1, '+381698562457', 'marinkovic@gmail.com', 1, ''),
(5, 'Nikola', 'Ivanovic', 'nikola.ivanovic', 0x243279243132244a4e6379774a43506b735950585455704f2f775a68756e526a64436c32717a676c7875387a6e68744a744764707136527652785a47, 1, '0632368597', 'ivanovic@gmail.com', 1, ''),
(7, 'Petar', 'Petrovic', 'petar.petrovic', 0x2432792431322449673063495462644d714875356965414d392e78552e473543594436447358787148536a4c6c473044584e7359472f4e464d6d7671, 0, '+38160123456', 'petar@petrovic.com', 0, ''),
(8, 'Mirko', 'Mirkovic', 'mirko.mirkovic', 0x243279243132245a6a7a343339306f686d68715342754c5638447947653764764f476f73316b6941333869696874734e4c456a5834532e2f51464665, 0, '+38160123456', 'mirko.mirkovic@mirko.com', 0, ''),
(9, 'Miljan', 'Miljanovic', 'miljan.miljanovic', 0x2432792431322434484250533245534935556f6247714d444a36616a2e567a5770306670452e57475a7736617a57414642726948633939483759554f, 0, '0611234567', 'miljan.miljanovic@gmail.com', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `id_marke` int(11) NOT NULL,
  `naziv` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id_marke`, `naziv`) VALUES
(1, 'Fiat'),
(2, 'BMW'),
(3, 'Mercedes Benz'),
(4, 'Opel'),
(5, 'Peugeot'),
(6, 'Renault'),
(7, 'Volvo'),
(8, 'Audi'),
(9, 'VW'),
(10, 'Citroen');

-- --------------------------------------------------------

--
-- Table structure for table `oglas`
--

CREATE TABLE `oglas` (
  `id_oglasa` int(11) NOT NULL,
  `vlasnik` int(11) NOT NULL,
  `marka` int(11) NOT NULL,
  `model` varchar(40) NOT NULL,
  `godina_proizvodnje` year(4) NOT NULL,
  `cena` double NOT NULL,
  `karoserija` int(11) NOT NULL,
  `zapremina_motora(ccm)` int(11) NOT NULL,
  `snaga_motora(kw)` int(11) NOT NULL,
  `emisiona_klasa_motora` int(11) NOT NULL,
  `klima` int(11) NOT NULL,
  `predjena_kilometraza` double NOT NULL,
  `broj_sedista` int(11) NOT NULL,
  `broj_vrata` int(11) NOT NULL,
  `boja` int(11) NOT NULL,
  `poreklo_vozila` int(11) NOT NULL,
  `fotografije` varchar(255) NOT NULL,
  `vrsta_goriva` int(11) NOT NULL,
  `vrsta_prenosa` int(11) NOT NULL,
  `vrsta_pogona` int(11) NOT NULL,
  `datum_postavke` date NOT NULL DEFAULT current_timestamp(),
  `opis_automobila` text NOT NULL,
  `aktivan` int(1) NOT NULL,
  `odobren` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `oglas`
--

INSERT INTO `oglas` (`id_oglasa`, `vlasnik`, `marka`, `model`, `godina_proizvodnje`, `cena`, `karoserija`, `zapremina_motora(ccm)`, `snaga_motora(kw)`, `emisiona_klasa_motora`, `klima`, `predjena_kilometraza`, `broj_sedista`, `broj_vrata`, `boja`, `poreklo_vozila`, `fotografije`, `vrsta_goriva`, `vrsta_prenosa`, `vrsta_pogona`, `datum_postavke`, `opis_automobila`, `aktivan`, `odobren`) VALUES
(3, 3, 9, 'Golf 5 1.9TDI BKC', 2004, 3800, 4, 1896, 77, 4, 3, 269000, 4, 2, 6, 1, '3', 4, 2, 1, '2023-01-11', 'Auto u dobrom stanju, vozi se svaki dan. Nije NOV, polovan je, ali dosta ocuvan.\r\nNove zimske gume su na fabrickim alu felnama. Nije truo, bez korozije, sto se moze reci, zdrav kao koska!\r\nUradjen mali servis pre 200km.\r\nNajbolji motor 1.9TDI 77kw/105ks - BKC oznaka motora.\r\nGolf za svaku preporuku, registrovan do Avgusta 2023. godine.\r\n', 1, 0),
(4, 5, 8, 'A3 1.4 g tron s line', 2015, 15350, 4, 1395, 81, 6, 3, 175000, 4, 2, 6, 2, '4', 3, 4, 1, '2023-01-11', 'auto u fabrickom stanju\r\nbez ulaganja\r\nza svaku preporuku', 1, 1),
(8, 3, 2, 'X5 M Laser/Head up/Pano', 2021, 93990, 6, 2993, 210, 6, 3, 20233, 6, 2, 1, 3, '8', 7, 5, 3, '2023-01-24', 'Uvoz Nemacka.\r\nApsolutno perfektno stanje. Najlepse BMW M 22\" crne felne koje ovaj model ima u ponudi.\r\nVrlo unikatan i prelepa Alpin Bela exterier boja.\r\nAuto bez ikakve mane, pregled svakakve vrste je moguc...', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `poreklo_vozila`
--

CREATE TABLE `poreklo_vozila` (
  `id_porekla` int(11) NOT NULL,
  `vrsta` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `poreklo_vozila`
--

INSERT INTO `poreklo_vozila` (`id_porekla`, `vrsta`) VALUES
(1, 'Domace tablice'),
(2, 'Na ime kupca'),
(3, 'Stranac');

-- --------------------------------------------------------

--
-- Table structure for table `pretrage`
--

CREATE TABLE `pretrage` (
  `id_pretrage` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `id_marke` int(11) NOT NULL,
  `model` text NOT NULL,
  `cenaod` int(11) NOT NULL,
  `cenado` int(11) NOT NULL,
  `id_karoserije` int(11) NOT NULL,
  `godisteod` int(11) NOT NULL,
  `godistedo` int(11) NOT NULL,
  `kilometrazado` int(11) NOT NULL,
  `id_goriva` int(11) NOT NULL,
  `id_boje` int(11) NOT NULL,
  `id_prenosa` int(11) NOT NULL,
  `id_vrata` int(11) NOT NULL,
  `id_sedista` int(11) NOT NULL,
  `id_klase` int(11) NOT NULL,
  `id_klime` int(11) NOT NULL,
  `id_porekla` int(11) NOT NULL,
  `id_pogona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pretrage`
--

INSERT INTO `pretrage` (`id_pretrage`, `id_korisnika`, `id_marke`, `model`, `cenaod`, `cenado`, `id_karoserije`, `godisteod`, `godistedo`, `kilometrazado`, `id_goriva`, `id_boje`, `id_prenosa`, `id_vrata`, `id_sedista`, `id_klase`, `id_klime`, `id_porekla`, `id_pogona`) VALUES
(8, 3, 2, 'x5', 90000, 100000, 6, 2000, 2023, 521251, 7, 1, 5, 2, 6, 6, 3, 3, 3),
(9, 3, 5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_goriva`
--

CREATE TABLE `vrsta_goriva` (
  `id_goriva` int(11) NOT NULL,
  `naziv` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `vrsta_goriva`
--

INSERT INTO `vrsta_goriva` (`id_goriva`, `naziv`) VALUES
(1, 'Benzin'),
(2, 'Benzin + Gas'),
(3, 'Benzin + Metan'),
(4, 'Dizel'),
(5, 'Gas'),
(6, 'Metan'),
(7, 'Hibrid'),
(8, 'Elektricni');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_pogona`
--

CREATE TABLE `vrsta_pogona` (
  `id_pogona` int(11) NOT NULL,
  `naziv` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `vrsta_pogona`
--

INSERT INTO `vrsta_pogona` (`id_pogona`, `naziv`) VALUES
(1, 'Prednji'),
(2, 'Zadnji'),
(3, '4x4'),
(4, '4x4 Reduktor');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_prenosa`
--

CREATE TABLE `vrsta_prenosa` (
  `id_prenosa` int(11) NOT NULL,
  `naziv` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `vrsta_prenosa`
--

INSERT INTO `vrsta_prenosa` (`id_prenosa`, `naziv`) VALUES
(1, 'Manuelni 4 brzine'),
(2, 'Manuelni 5 brzina'),
(3, 'Manuelni 6 brzina'),
(4, 'Poluatomatski'),
(5, 'Automatski');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boja_vozila`
--
ALTER TABLE `boja_vozila`
  ADD PRIMARY KEY (`id_boje`);

--
-- Indexes for table `broj_sedista`
--
ALTER TABLE `broj_sedista`
  ADD PRIMARY KEY (`id_sedista`);

--
-- Indexes for table `broj_vrata`
--
ALTER TABLE `broj_vrata`
  ADD PRIMARY KEY (`id_vrata`);

--
-- Indexes for table `emisiona_klasa_motora`
--
ALTER TABLE `emisiona_klasa_motora`
  ADD PRIMARY KEY (`id_klase`);

--
-- Indexes for table `karoserija`
--
ALTER TABLE `karoserija`
  ADD PRIMARY KEY (`id_karoserije`);

--
-- Indexes for table `klima`
--
ALTER TABLE `klima`
  ADD PRIMARY KEY (`id_klime`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnika`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id_marke`);

--
-- Indexes for table `oglas`
--
ALTER TABLE `oglas`
  ADD PRIMARY KEY (`id_oglasa`),
  ADD KEY `vlasnik` (`vlasnik`),
  ADD KEY `marka` (`marka`),
  ADD KEY `karoserija` (`karoserija`),
  ADD KEY `emisiona_klasa_motora` (`emisiona_klasa_motora`),
  ADD KEY `klima` (`klima`),
  ADD KEY `broj_vrata` (`broj_vrata`),
  ADD KEY `poreklo_vozila` (`poreklo_vozila`),
  ADD KEY `vrsta_goriva` (`vrsta_goriva`),
  ADD KEY `vrsta_prenosa` (`vrsta_prenosa`),
  ADD KEY `vrsta_pogona` (`vrsta_pogona`),
  ADD KEY `broj_sedista` (`broj_sedista`),
  ADD KEY `boja` (`boja`);

--
-- Indexes for table `poreklo_vozila`
--
ALTER TABLE `poreklo_vozila`
  ADD PRIMARY KEY (`id_porekla`);

--
-- Indexes for table `pretrage`
--
ALTER TABLE `pretrage`
  ADD PRIMARY KEY (`id_pretrage`),
  ADD KEY `id_korisnika` (`id_korisnika`),
  ADD KEY `id_marke` (`id_marke`),
  ADD KEY `id_karoserije` (`id_karoserije`),
  ADD KEY `id_goriva` (`id_goriva`),
  ADD KEY `id_boje` (`id_boje`),
  ADD KEY `id_prenosa` (`id_prenosa`),
  ADD KEY `id_vrata` (`id_vrata`),
  ADD KEY `id_sedista` (`id_sedista`),
  ADD KEY `id_klase` (`id_klase`),
  ADD KEY `id_klime` (`id_klime`),
  ADD KEY `id_porekla` (`id_porekla`),
  ADD KEY `id_pogona` (`id_pogona`);

--
-- Indexes for table `vrsta_goriva`
--
ALTER TABLE `vrsta_goriva`
  ADD PRIMARY KEY (`id_goriva`);

--
-- Indexes for table `vrsta_pogona`
--
ALTER TABLE `vrsta_pogona`
  ADD PRIMARY KEY (`id_pogona`);

--
-- Indexes for table `vrsta_prenosa`
--
ALTER TABLE `vrsta_prenosa`
  ADD PRIMARY KEY (`id_prenosa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boja_vozila`
--
ALTER TABLE `boja_vozila`
  MODIFY `id_boje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `broj_sedista`
--
ALTER TABLE `broj_sedista`
  MODIFY `id_sedista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `broj_vrata`
--
ALTER TABLE `broj_vrata`
  MODIFY `id_vrata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emisiona_klasa_motora`
--
ALTER TABLE `emisiona_klasa_motora`
  MODIFY `id_klase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karoserija`
--
ALTER TABLE `karoserija`
  MODIFY `id_karoserije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `klima`
--
ALTER TABLE `klima`
  MODIFY `id_klime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `id_marke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oglas`
--
ALTER TABLE `oglas`
  MODIFY `id_oglasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `poreklo_vozila`
--
ALTER TABLE `poreklo_vozila`
  MODIFY `id_porekla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pretrage`
--
ALTER TABLE `pretrage`
  MODIFY `id_pretrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vrsta_goriva`
--
ALTER TABLE `vrsta_goriva`
  MODIFY `id_goriva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vrsta_pogona`
--
ALTER TABLE `vrsta_pogona`
  MODIFY `id_pogona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vrsta_prenosa`
--
ALTER TABLE `vrsta_prenosa`
  MODIFY `id_prenosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oglas`
--
ALTER TABLE `oglas`
  ADD CONSTRAINT `oglas_ibfk_1` FOREIGN KEY (`vlasnik`) REFERENCES `korisnik` (`id_korisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_10` FOREIGN KEY (`broj_sedista`) REFERENCES `broj_sedista` (`id_sedista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_11` FOREIGN KEY (`boja`) REFERENCES `boja_vozila` (`id_boje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_12` FOREIGN KEY (`emisiona_klasa_motora`) REFERENCES `emisiona_klasa_motora` (`id_klase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_2` FOREIGN KEY (`marka`) REFERENCES `marka` (`id_marke`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_3` FOREIGN KEY (`vrsta_pogona`) REFERENCES `vrsta_pogona` (`id_pogona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_4` FOREIGN KEY (`vrsta_goriva`) REFERENCES `vrsta_goriva` (`id_goriva`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_5` FOREIGN KEY (`broj_vrata`) REFERENCES `broj_vrata` (`id_vrata`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_6` FOREIGN KEY (`klima`) REFERENCES `klima` (`id_klime`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_7` FOREIGN KEY (`poreklo_vozila`) REFERENCES `poreklo_vozila` (`id_porekla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_8` FOREIGN KEY (`karoserija`) REFERENCES `karoserija` (`id_karoserije`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oglas_ibfk_9` FOREIGN KEY (`vrsta_prenosa`) REFERENCES `vrsta_prenosa` (`id_prenosa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pretrage`
--
ALTER TABLE `pretrage`
  ADD CONSTRAINT `pretrage_ibfk_5` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
