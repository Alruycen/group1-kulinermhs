-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2022 at 08:47 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kulinermahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggalditulis` date NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `nama`, `deskripsi`, `tanggalditulis`, `penulis`, `foto`, `id_kategori`) VALUES
(1, 'Sate Bandeng', 'Daging yang diolah dari ikan bandeng dan dililit pada tusukan sate, makanan asli Tangerang.', '2022-04-27', 'Richard', '../images/sate-bandeng.jpg', 1),
(2, 'Bir Pletok', 'Minuman penyegar yang dicampur dari jahe, daun pandan, serai, dan kayu secang, minuman asli Tangerang.', '2022-04-28', 'Richard', '../images/bir-pletok.jpg', 2),
(3, 'Pasar Malam', 'Tempat yang dibuka saat malam hari di distrik hiburan yang juga menjual banyak makanan dan minuman', '2022-05-01', 'Faustine', '../images/pasar-malam.jpg', 3),
(4, 'Kafe', 'Tempat yang menyajikan kopi diselingi makanan ringan, tempat untuk nongkrong yang sangat nyaman.', '2022-05-02', 'Faustine', '../images/kafe.jpg', 3),
(5, 'Restoran', 'Tempat untuk makan bersama yang menyajikan masakan dari budaya yang berbeda di seluruh dunia.', '2022-05-02', 'Faustine', '../images/restoran.jpg', 3),
(6, 'Bolu Tape', 'Berbentuk kue yang lembut, manis, dan mempunyai cita rasa unik tape dari olahan singkong.', '2022-05-03', 'Wong', '../images/bolu-tape.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id` int(11) NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritiksaran`
--

INSERT INTO `kritiksaran` (`id`, `tanggapan`) VALUES
(1, 'Websitenya keren, cuma kurang login saja');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(3, 'tempat'),
(4, 'oleholeh');

-- --------------------------------------------------------

--
-- Table structure for table `ratingulasan`
--

CREATE TABLE `ratingulasan` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `tanggalditulis` date NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `id_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratingulasan`
--

INSERT INTO `ratingulasan` (`id`, `rating`, `ulasan`, `tanggalditulis`, `penulis`, `id_artikel`) VALUES
(1, 5, 'Rasanya enak, gurih, dan tusukan satenya ramah lingkungan.', '2022-04-30', 'Richard Faustine', 1),
(2, 4, 'Rasanya lumayan enak, tetapi teksturnya kurang.', '2022-05-01', 'Richard Wong', 2),
(3, 5, 'Rasanya sangat menyegarkan dan membuat badan lebih hangat, mantap', '2022-05-01', 'Faustine Wong', 3),
(5, 4, 'Sangat menyegarkan, sayangnya isinya sangat sedikit', '2022-05-01', 'Faustine Richard', 3),
(6, 4, 'Suasananya asik, rame banget, sayang sekali di masa pandemi jadi tutup lebih awal', '2022-05-02', 'Richard Faustine', 5),
(7, 5, 'Tempatnya bagus, asri,  enak buat nongkrong', '2022-05-02', 'Richard Wong', 4),
(8, 5, 'Sepi semenjak pandemi dan kurang menyenangkan', '2022-05-03', 'Wong Richard', 5),
(9, 5, 'Enak banget! Tempatnya juga luas jadi bisa makan ramai-ramai.', '2022-05-03', 'Wong Richard', 6),
(10, 4, 'Meskipun dengan harga yang ekonomis, rasanya bintang 5', '2022-05-04', 'Richard Faustine', 3),
(11, 2, 'Mahal banget...', '2022-05-04', 'Wong Richard', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rentangharga`
--

CREATE TABLE `rentangharga` (
  `id` int(11) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `hargaminimal` int(11) NOT NULL,
  `hargamaksimal` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentangharga`
--

INSERT INTO `rentangharga` (`id`, `merek`, `lokasi`, `hargaminimal`, `hargamaksimal`, `id_artikel`) VALUES
(1, 'Sate Bandeng Hj. Maryam', 'No. 63 Kaujon Tengah, Jl. Ki Uju, Serang, Kec. Serang, Kota Serang, Banten 42116', 30000, 50000, 1),
(2, 'SABAJO Sate Bandeng', 'Jl Raya Mauk Km 16 Buaranjati Rt 04/04, Jatiwaringin, Kec. Sukadiri, Kabupaten Tangerang, Banten 15540', 25000, 30000, 1),
(3, 'MPOK NINI Bir Pletok', 'Jln Belanak 2 Ujung RT.02/01 No.57 Perumnas 2 Kel, RT.001/RW.001, Kayuringin Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17144', 10000, 15000, 2),
(4, 'Sans Cafe & Vappening', 'QJ89+HQV, Kelapa Dua, Tangerang Regency, Banten 15810', 15000, 145000, 4),
(5, 'Pasar Lama Tangerang', 'Pasar Lama, Jl. Kisamaun, Sukasari, Tangerang, Tangerang City, Banten 15118', 2000, 20000, 3),
(6, 'HOG WILD with Chef Bruno Serpong', 'Ruko South Goldfinch SGA 039 The Springs, Cihuni, Pagedangan, Tangerang Regency, Banten 15332', 65000, 590000, 5),
(7, 'MAMA BOLU Bolu Tape Benteng', 'Jl. Raya Merdeka No.2, RT.002/RW.003, Sukajadi, Kec. Karawaci, Kota Tangerang, Banten 15113', 45000, 50000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `bahan` text NOT NULL,
  `prosedur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id`, `id_artikel`, `bahan`, `prosedur`) VALUES
(1, 2, 'Jahe 250 g,\r\nCengkeh 3 g,\r\nBiji Pala 3 g,\r\nLada 3 g,\r\nSereh 3 g,\r\nKapulaga 3 g,\r\nKayu Manis 30 g,\r\nDaun Pandan 7 lbr,\r\nDaun Jeruk 6 lbr,\r\nGula 1 kg,\r\nAir 6 L,\r\nKayu Secang q.s.\r\n\r\n', '- Hancurkan jahe, biji pala, lada, kapulaga, dan sereh.\r\n- Rebus lima bahan tersebut ke dalam panci dan tambahkan daun pandan, daun jeruk, cengkeh, serta kayu manis.\r\n- Masukkan gula ke dalam panci dan diaduk.\r\n- Masukkan kayu secang sebagai pewarna alami sampai berwarna merah kecokelatan.\r\n- Masak sampai air mendidih lalu sajikan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratingulasan`
--
ALTER TABLE `ratingulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `rentangharga`
--
ALTER TABLE `rentangharga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratingulasan`
--
ALTER TABLE `ratingulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rentangharga`
--
ALTER TABLE `rentangharga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `page` (`id`);

--
-- Constraints for table `ratingulasan`
--
ALTER TABLE `ratingulasan`
  ADD CONSTRAINT `ratingulasan_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `rentangharga` (`id`);

--
-- Constraints for table `rentangharga`
--
ALTER TABLE `rentangharga`
  ADD CONSTRAINT `rentangharga_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
