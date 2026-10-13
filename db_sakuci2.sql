-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2026 at 02:06 AM
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
-- Database: `db_sakuci2`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` set('Laki-Laki','Perempuan') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `jenis_kelamin`, `user_id`) VALUES
(1, 2147483647, 'Flowery', 'Laki-Laki', 4),
(2, 2147483647, 'Minjii', 'Perempuan', 5),
(3, 2147483647, 'Devour Of God', 'Laki-Laki', 6),
(4, 123456789, 'Eye of cthullu', 'Laki-Laki', 7),
(5, 2147483647, 'Steven Howald', 'Laki-Laki', 8),
(6, 1234526, 'Sikili The SQonquerorL', 'Laki-Laki', 9),
(7, 2147483647, 'Hetaker', 'Laki-Laki', 10),
(8, 311321321, 'Monkey Di Lutfi', 'Laki-Laki', 11),
(9, 321456321, 'Toriel Dreemur', 'Perempuan', 12),
(10, 2147483647, 'Mimic', 'Perempuan', 13),
(11, 321456728, 'StickGuy', 'Laki-Laki', 24),
(12, 321567231, 'Cypher', 'Laki-Laki', 25),
(13, 1234523456, 'Muthya Batford', 'Perempuan', 27),
(14, 321456789, 'Gugun', 'Laki-Laki', 28),
(15, 322456789, 'Suci Sulastri', 'Perempuan', 29);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `nama`, `guru_id`) VALUES
(1, 'MP001', 'Gardening', 1),
(2, 'MP002', 'Magic', 2),
(3, 'MP003', 'COOKING', 3),
(4, 'MP004', 'Aerodynamic', 4),
(5, 'MP005', 'Physics', 5),
(6, 'MP006', 'Psychic', 6),
(7, 'MP007', 'Socials', 7),
(8, 'MP003', 'Cooking', 8),
(9, 'MP009', 'English', 9),
(10, 'MP010', 'Theatre', 10),
(11, 'MP011', 'Planning', 11),
(12, 'MP012', 'Mercyful', 11),
(13, 'MP005', 'Physics', 4),
(14, 'MP014', 'Spy', 12);

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`id`, `siswa_id`, `mapel_id`) VALUES
(1, 1, 1),
(2, 2, 4),
(3, 3, 1),
(4, 4, 7),
(5, 1, 1),
(6, 6, 6),
(7, 7, 10),
(8, 8, 3),
(9, 9, 8),
(10, 10, 1),
(11, 1, 3),
(12, 1, 11),
(13, 1, 12),
(14, 10, 14),
(15, 7, 13),
(16, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_rapor`
--

CREATE TABLE `nilai_rapor` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai_kkm` int(100) NOT NULL,
  `nilai_pengetahuan` int(100) NOT NULL,
  `nilai_keterampilan` int(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_rapor`
--

INSERT INTO `nilai_rapor` (`id`, `siswa_id`, `mapel_id`, `nilai_kkm`, `nilai_pengetahuan`, `nilai_keterampilan`, `keterangan`) VALUES
(1, 8, 3, 75, 92, 76, 'Kerja Bagus'),
(2, 9, 3, 75, 10, 100, 'HOW????'),
(3, 3, 3, 75, 84, 76, 'Perlu Dikembangkan Lagi'),
(4, 1, 3, 75, 84, 90, 'Kerja Bagus'),
(5, 2, 4, 75, 85, 78, 'Cukup Bagus'),
(6, 7, 10, 75, 90, 65, 'Pemalas Orangnya'),
(7, 6, 6, 75, 100, 98, 'Brilliant Sekali'),
(8, 10, 14, 75, 78, 100, 'Miraculous'),
(9, 5, 13, 75, 75, 80, 'Perlu Dikembangkan Lagi'),
(10, 1, 12, 75, 100, 100, 'We Were At Your Mercy'),
(11, 7, 13, 75, 75, 75, 'Mediocre'),
(12, 2, 13, 75, 85, 87, 'Cukup Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jenis_kelamin` set('Laki-Laki','Perempuan') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `jenis_kelamin`, `user_id`) VALUES
(1, 2147483647, 'Frisk', 'UNDERTALE', '', 14),
(2, 2147483647, 'Adihdash', 'XI-OLGA-3', 'Laki-Laki', 15),
(3, 123456012, 'The Chosen One', 'XII-Studio-1', 'Laki-Laki', 16),
(4, 9695984, 'Jacks', 'XI-DIGI-4', 'Laki-Laki', 17),
(5, 2147483647, 'Stratosphere', 'XI-GEO-2', 'Laki-Laki', 18),
(6, 321456321, 'Light Yagami', 'XII-RPL-1', '', 19),
(7, 1232123, 'Sans', 'UNDERDALE', 'Laki-Laki', 20),
(8, 1234545, 'SquidWod', 'XII-ART-7', 'Laki-Laki', 21),
(9, 657546456, 'Patic', '-X1-NN-0', 'Laki-Laki', 22),
(10, 2147483647, 'Wilson', 'XI-STRANDED-0', 'Laki-Laki', 23),
(11, 321456789, 'Abdulohman', 'XI-RPL-I', 'Laki-Laki', 30),
(12, 1234567890, 'Zahra', 'XI-RPL-I', 'Perempuan', 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` set('admin','guru','siswa') NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(3, 'Patient0', '$2y$10$QLaL0.Kw43H2uqASHm5dbe.Wo33xxUBn7zKhmOx6IpVDvmkKBpyCK', 'admin', '2026-10-06'),
(4, 'FlowerMan', '$2y$10$QYJAWlljzD9ovTWMjyrEUeaRNsG.mkuH4/TvY/bP/LV4rF8fsEESq', 'guru', '2026-10-06'),
(5, 'NotRealPerson', '$2y$10$6zqZa/kIzd4YPk294KcSX.Wg/ooTdILNhopE5ReXM0nHC7fu/ldJ2', 'guru', '2026-10-06'),
(6, 'THE O-G', '$2y$10$LJjIajAwFaaaDTSGg4CwCuT77R5PAGgB1k00LJv7tL4f7I9A/XCHe', 'guru', '2026-10-06'),
(7, 'EYEAMTHEBEGINNING', '$2y$10$K36xUKE7We3BHv9uDIsWCuO3qt3Xjt6s4H9WHJvnC7MioE0b21ztO', 'guru', '2026-10-06'),
(8, 'Rusdi', '$2y$10$dsf82xUEheqKppxAkdsW8O5PmZJTJokPPtbb7fu/L2FyGzLPHibxe', 'guru', '2026-10-06'),
(9, 'SQonquestL', '$2y$10$JV1xvpPQ5vOP9KfrR53/tuGiDoDYJCaHvqpNUq02p0EG4XoG5ycVi', 'guru', '2026-10-06'),
(10, 'HellTekah', '$2y$10$ByDIiUccWi9rISn8B0kHFu3cDTCZpFssTFEgKv0mDHmfSBg6jvDL6', 'guru', '2026-10-06'),
(11, 'King Son', '$2y$10$eV6/5UOqwwGrjT.Xn00w3.tIuHVM2ZzSI4m9cBb70AiarCf653YzS', 'guru', '2026-10-06'),
(12, 'BorielAhsibau', '$2y$10$86P7ejYtjBlPfQRQ6NlkMuF0YG2nElEHeD.DfyZqNgiWN7bn1FQk6', 'guru', '2026-10-06'),
(13, 'shadowsonthewall', '$2y$10$T.bQs3.qhZ3fpBo33DPveuIr.p/6eqqYGrRgLGfy818llIn/aQ0pi', 'guru', '2026-10-06'),
(14, 'thesoul', '$2y$10$D3qj/dq.S2Elo6665WLY4eyAMl8d3GYVff3POj61gfwWMCy72Egdm', 'siswa', '2026-10-06'),
(15, 'adadih', '$2y$10$FQ7r88ZynhXS.5rfPeWwM.zgEs77vnEI8JbA3z2sWiWqaxoNjD.i.', 'siswa', '2026-10-06'),
(16, 'TCO', '$2y$10$aUp6zY5TNmOIYmpGYUitku71zS5atb.7/vktRAXbu/qIL0WBiItgO', 'siswa', '2026-10-06'),
(17, 'JX360', '$2y$10$7r3X75MIsxD8oR0la/AqD.A3WpmUyWPrp4A5HEf4qbWksKhQyMIi.', 'siswa', '2026-10-06'),
(18, 'ZAWALDO', '$2y$10$aSA3PpxJ/Cv/wUwGf07zneOEhrpB87H2V4vzSkPylNc/IL7JIK2vW', 'siswa', '2026-10-06'),
(19, 'notkira', '$2y$10$pr8uPlvmMynjfbvmY.dQ9.E7N35taozMwR.ucJHWMALlB3J3xCzQi', 'siswa', '2026-10-06'),
(20, 'ComicSans', '$2y$10$27r1vV.UhNnCwGY72AKPoOgeMr3zFPWGXtE/aRY0xe5EfvgRiYLm.', 'siswa', '2026-10-06'),
(21, 'Squidaddle', '$2y$10$tC51pY4LlvXEvO8eRKftjewUkTSHPMDsp7.jf8dShmHQ.2A2xBO5.', 'siswa', '2026-10-06'),
(22, 'staroftheshow', '$2y$10$hq9yYxEBsRGkzNwCeYAbaO21zCOq5VBEF9fpmGNKHfdlw3oMqoHri', 'siswa', '2026-10-06'),
(23, 'willyson', '$2y$10$BD.jQo3ExTWfEa/sGuq3l.KtHti1NIRPv8nN6AVeXPhUWU5vOLs4u', 'siswa', '2026-10-06'),
(24, 'Henry', '$2y$10$XDK2T8wZaPPb6O9Si4FLuuilBzKtfeXUa3dMGqdfHF2tr1I1Srquq', 'guru', '2026-10-06'),
(25, 'civilian', '$2y$10$KWOByfVd2JtAParylZeKOeGl.D7xphY3bIQzZKL2nBvOizH1fv2ZC', 'guru', '2026-10-06'),
(26, 'pa nafsir', '$2y$10$8uB81QDOO/KQEEl6FGaK0uDNYFGAgAk2LuYWBH.EVPw8H0fHTfVyK', 'admin', '2026-10-13'),
(27, 'mutia19', '$2y$10$FtW2QkAAttU/5ckYqhrR.uWWm6HDqbVF5mikCBnojE20ZmALjU3Dq', 'guru', '2026-10-13'),
(28, 'gugun21', '$2y$10$dWDMTQziMqONSCYLB9Veouidpi7Q6J9l8qkBP6IHpyxxEvGU1bk/y', 'guru', '2026-10-13'),
(29, 'suci12', '$2y$10$.McsR0cU2RSUchDJNzvVF.Ky9wufxzCzI8Fvpm1TDz/gbA5Vsr2jO', 'guru', '2026-10-13'),
(30, 'Abdurohman19', '$2y$10$GoT5QM99yagO0dl6dEPNyeNVxha7sDOVWe0tqMWSF9HGSqTAci.r6', 'siswa', '2026-10-13'),
(31, 'Zahra36', '$2y$10$M8ZmS7q5BGg0nX40GVAP6ujdJAdJIE/zXyez9/Hz/fj7eLqU1tqAK', 'siswa', '2026-10-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`,`nip`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`guru_id`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indexes for table `nilai_rapor`
--
ALTER TABLE `nilai_rapor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`,`nis`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`);

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `mengajar_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `nilai_rapor`
--
ALTER TABLE `nilai_rapor`
  ADD CONSTRAINT `nilai_rapor_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `nilai_rapor_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
