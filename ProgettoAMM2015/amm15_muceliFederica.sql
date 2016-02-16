-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Feb 16, 2016 alle 18:26
-- Versione del server: 5.6.27-0ubuntu1
-- Versione PHP: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amm15_muceliFederica`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ContenutoOrdine`
--

CREATE TABLE IF NOT EXISTS `ContenutoOrdine` (
  `Ordine` int(11) NOT NULL,
  `Prodotto` varchar(100) NOT NULL,
  `Quantita` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `Datori`
--

CREATE TABLE IF NOT EXISTS `Datori` (
  `id` int(10) unsigned NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cognome` varchar(100) NOT NULL,
  `User` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Via` varchar(100) NOT NULL,
  `Civico` int(11) NOT NULL,
  `Citta` varchar(100) NOT NULL,
  `Provincia` char(2) NOT NULL,
  `Cap` char(5) NOT NULL,
  `Telefono` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Datori`
--

INSERT INTO `Datori` (`id`, `Nome`, `Cognome`, `User`, `Password`, `Email`, `Via`, `Civico`, `Citta`, `Provincia`, `Cap`, `Telefono`) VALUES
(1, 'Davide', 'Spano', 'spano', 'amm', 'd@gmail.it', 'Ospedale', 2, 'Cagliari', 'CA', '09125', '3200000011');

-- --------------------------------------------------------

--
-- Struttura della tabella `Ordini`
--

CREATE TABLE IF NOT EXISTS `Ordini` (
  `Cod` int(10) unsigned NOT NULL,
  `Utente` int(10) NOT NULL,
  `Prezzo` decimal(10,2) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `Prodotti`
--

CREATE TABLE IF NOT EXISTS `Prodotti` (
  `Nome` varchar(100) NOT NULL,
  `Prezzo` decimal(10,2) NOT NULL,
  `Descrizione` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Prodotti`
--

INSERT INTO `Prodotti` (`Nome`, `Prezzo`, `Descrizione`) VALUES
('Coccoi prena', '14.50', 'Ingredienti sfoglia:farina 00, acqua, strutto,sale.Ingredienti ripieno:patate, olio extravergine d''oliva,pecorino, formaggio salato,aglio e menta.'),
('Culurgionis', '12.00', 'Ingredienti sfoglia:farina 00, acqua, strutto,sale.Ingredienti ripieno:patate, olio extravergine d''oliva,pecorino, formaggio salato,aglio e menta.'),
('Sebadas', '10.00', 'Ingredienti sfoglia:farina,acqua, strutto, zucchero. \r\nIngredienti ripieno: formaggio, zucchero, semola, scorza e succo di limone');

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenti`
--

CREATE TABLE IF NOT EXISTS `Utenti` (
  `id` int(10) unsigned NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cognome` varchar(100) NOT NULL,
  `User` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Via` varchar(100) NOT NULL,
  `Civico` int(11) NOT NULL,
  `Citta` varchar(100) NOT NULL,
  `Provincia` char(2) NOT NULL,
  `Cap` char(5) NOT NULL,
  `Telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Utenti`
--

INSERT INTO `Utenti` (`id`, `Nome`, `Cognome`, `User`, `Password`, `Email`, `Via`, `Civico`, `Citta`, `Provincia`, `Cap`, `Telefono`) VALUES
(1, 'Marco', 'Melis', 'marcolino', 'amm1', 'm@gmail.it', 'Lanusei', 1, 'Cagliari', 'CA', '08000', '3200000012'),
(2, 'Federica', 'Muceli', 'fede', 'amm', 'f@gmail.it', 'Ospedale', 1, 'Cagliari', 'CA', '09125', '3200000010');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ContenutoOrdine`
--
ALTER TABLE `ContenutoOrdine`
  ADD PRIMARY KEY (`Ordine`,`Prodotto`);

--
-- Indici per le tabelle `Datori`
--
ALTER TABLE `Datori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`User`),
  ADD UNIQUE KEY `password` (`Password`),
  ADD UNIQUE KEY `email` (`Email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indici per le tabelle `Ordini`
--
ALTER TABLE `Ordini`
  ADD PRIMARY KEY (`Cod`),
  ADD UNIQUE KEY `Cod` (`Cod`);

--
-- Indici per le tabelle `Prodotti`
--
ALTER TABLE `Prodotti`
  ADD PRIMARY KEY (`Nome`);

--
-- Indici per le tabelle `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`User`),
  ADD UNIQUE KEY `password` (`Password`),
  ADD UNIQUE KEY `email` (`Email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Datori`
--
ALTER TABLE `Datori`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `Ordini`
--
ALTER TABLE `Ordini`
  MODIFY `Cod` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
