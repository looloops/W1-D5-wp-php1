-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 15, 2024 alle 18:00
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestione_libreria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `id` smallint(6) NOT NULL,
  `titolo` varchar(500) NOT NULL,
  `autore` varchar(500) NOT NULL,
  `anno_pubblicazione` int(11) NOT NULL,
  `genere` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`id`, `titolo`, `autore`, `anno_pubblicazione`, `genere`) VALUES
(1, 'Il signore degli anelli', 'J.R.R. Tolkien', 1954, 'Fantasy'),
(2, '1984', 'George Orwell', 1949, 'Distopia'),
(3, 'Cronache del ghiaccio e del fuoco', 'George R.R. Martin', 1996, 'Fantasy'),
(4, 'Il conte di Montecristo', 'Alexandre Dumas', 1844, 'Romanzo storico'),
(5, 'Orgoglio e pregiudizio', 'Jane Austen', 1813, 'Romanzo'),
(6, 'Harry Potter e la pietra filosofale', 'J.K. Rowling', 1997, 'Fantasy'),
(7, 'Guerra e pace', 'Lev Tolstoj', 1869, 'Romanzo storico'),
(8, 'Il grande Gatsby', 'F. Scott Fitzgerald', 1925, 'Romanzo'),
(9, 'Il nome della rosa', 'Umberto Eco', 1980, 'Giallo storico'),
(10, 'Il piccolo principe', 'Antoine de Saint-Exupéry', 1943, 'Romanzo'),
(11, 'Moby Dick', 'Herman Melville', 1851, 'Romanzo'),
(12, 'Don Chisciotte della Mancia', 'Miguel de Cervantes', 1605, 'Romanzo'),
(13, 'L\'isola del tesoro', 'Robert Louis Stevenson', 1883, 'Avventura'),
(14, 'Anna Karenina', 'Lev Tolstoj', 1877, 'Romanzo'),
(15, 'Il processo', 'Franz Kafka', 1925, 'Romanzo'),
(16, '1984', 'George Orwell', 1949, 'Distopia'),
(17, 'Il giovane Holden', 'J.D. Salinger', 1951, 'Romanzo'),
(18, 'Il vecchio e il mare', 'Ernest Hemingway', 1952, 'Romanzo'),
(19, 'Cime tempestose', 'Emily Brontë', 1847, 'Romanzo'),
(20, 'Il giro di boa', 'Joseph Conrad', 1902, 'Romanzo'),
(21, 'Il ritratto di Dorian Gray', 'Oscar Wilde', 1890, 'Romanzo'),
(22, 'Delitto e castigo', 'Fëdor Dostoevskij', 1866, 'Romanzo'),
(23, 'Il grande Inquisitore', 'Fëdor Dostoevskij', 1880, 'Romanzo'),
(24, 'Lo straniero', 'Albert Camus', 1942, 'Romanzo'),
(25, 'Le avventure di Sherlock Holmes', 'Arthur Conan Doyle', 1892, 'Giallo'),
(26, 'Venti mila leghe sotto i mari', 'Jules Verne', 1870, 'Fantascienza'),
(27, 'La divina commedia', 'Dante Alighieri', 1320, 'Poesia epica'),
(28, 'L\'Odissea', 'Omero', -800, 'Poesia epica'),
(29, 'Le mille e una notte', 'Anonimo', 800, 'Raccolta di storie'),
(30, 'Lo hobbit', 'J.R.R. Tolkien', 1937, 'Fantasy'),
(31, 'Il castello', 'Franz Kafka', 1926, 'Romanzo'),
(32, 'La fattoria degli animali', 'George Orwell', 1945, 'Satira'),
(33, 'La Metamorfosi', 'Franz Kafka', 1915, 'Romanzo breve'),
(34, 'La storia infinita', 'Michael Ende', 1979, 'Fantasy'),
(35, 'Il ladro di fulmini', 'Rick Riordan', 2005, 'Fantasy'),
(36, 'Uno, nessuno e centomila', 'Luigi Pirandello', 1926, 'Romanzo'),
(37, 'Le cronache di Narnia', 'C.S. Lewis', 1950, 'Fantasy'),
(38, 'Il processo', 'Franz Kafka', 1925, 'Romanzo'),
(39, 'Lo strano caso del dottor Jekyll e del signor Hyde', 'Robert Louis Stevenson', 1886, 'Romanzo'),
(40, 'Il deserto dei Tartari', 'Dino Buzzati', 1940, 'Romanzo'),
(41, 'Il barone rampante', 'Italo Calvino', 1957, 'Romanzo'),
(42, 'L\'arte della guerra', 'Sun Tzu', -500, 'Saggio'),
(43, 'Il visconte dimezzato', 'Italo Calvino', 1952, 'Romanzo'),
(44, 'Il codice Da Vinci', 'Dan Brown', 2003, 'Thriller'),
(45, 'Fahrenheit 451', 'Ray Bradbury', 1953, 'Distopia'),
(46, 'Il sole tramonta sul Chianti', 'Luigi Pirandello', 1923, 'Romanzo'),
(47, 'Il cavaliere inesistente', 'Italo Calvino', 1959, 'Romanzo'),
(48, 'Il mondo nuovo', 'Aldous Huxley', 1932, 'Distopia'),
(49, 'Le città invisibili', 'Italo Calvino', 1972, 'Romanzo'),
(50, 'Lo straniero', 'Albert Camus', 1942, 'Romanzo');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
