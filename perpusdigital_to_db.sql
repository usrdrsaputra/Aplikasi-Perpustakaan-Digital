-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 08:14 PM
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
-- Database: `perpusdigital_to_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `BukuID` int(11) NOT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Penulis` varchar(255) DEFAULT NULL,
  `Penerbit` varchar(255) DEFAULT NULL,
  `TahunTerbit` date DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `ekstensi` varchar(50) NOT NULL,
  `berkas` mediumtext NOT NULL,
  `Foto` text NOT NULL,
  `DeskripsiBuku` text NOT NULL,
  `Harga` varchar(255) NOT NULL,
  `Status` enum('Gratis','Berbayar','Sudah Dibeli') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`BukuID`, `Judul`, `Penulis`, `Penerbit`, `TahunTerbit`, `title`, `size`, `ekstensi`, `berkas`, `Foto`, `DeskripsiBuku`, `Harga`, `Status`) VALUES
(77, 'Atlas sejarah indonesia berita proklamasi kemerdekaan', 'Dr. Abdurakhman', 'Jenderal Kebudayaan Kementerian Pendidikan dan Kebudayaan', '2018-08-17', 'atlassejarah_indonesia_berita_proklamasikemerdekaa.pdf', 18446194, 'pdf', '../peminjam/kumpulan_file_buku/atlassejarah_indonesia_berita_proklamasikemerdekaa.pdf', '../foto/atlassejarah_indonesia_berita_proklamasikemerdeka.jpeg', '0', '', 'Gratis'),
(78, 'Sejarah Riyaya Undhuh Undhuh Mojowarno', 'GKJW mojowarno', 'GKJW jemaat mojowarno', '2010-12-26', 'Sejarah Riyaya Undhuh Undhuh Mojowarno.pdf', 18177451, 'pdf', '../peminjam/kumpulan_file_buku/Sejarah Riyaya Undhuh Undhuh Mojowarno.pdf', '../foto/SejarahRiyayaUndhuhUndhuhMojowarno.jpeg', '0', '', 'Gratis'),
(79, 'Madinah Dalam Quran Hadis Dan Sejarah', 'Muhamad Taufiq Ali Yahya', 'Lentera', '2008-07-21', 'MadinahDalamQuranHadisdanSejarah.pdf', 30202678, 'pdf', '../peminjam/kumpulan_file_buku/MadinahDalamQuranHadisdanSejarah.pdf', '../foto/madinahdalamquranhadisdansejarah.jpeg', '0', '', 'Gratis'),
(80, 'Sejarah Para Nabi', 'Muhammad Ali', 'Darul Kutubil Islamiyah', '2007-05-05', 'sejarah-para-nabi.pdf', 996768, 'pdf', '../peminjam/kumpulan_file_buku/sejarah-para-nabi.pdf', '../foto/SejarahParaNabi.jpeg', '0', '', 'Gratis'),
(81, 'Sejarah Islam DiNusantara', 'Michael Lafhan', 'PT Bentang Pustaka', '2015-09-18', 'Sejarah_Islam_dinusantara.pdf', 2971790, 'pdf', '../peminjam/kumpulan_file_buku/Sejarah_Islam_dinusantara.pdf', '../foto/sejarah_islam_dinusantara.jpeg', '0', '', 'Gratis'),
(82, 'Sejarah Terawih', ' Ahmad Zarkasih, Lc', 'Rumah Fiqih Publishing', '2019-04-10', 'SejarahTarawih.pdf', 949349, 'pdf', '../peminjam/kumpulan_file_buku/SejarahTarawih.pdf', '../foto/sejarahtarawih.jpeg', '0', '', 'Gratis'),
(83, 'Sejarah Kesultanan Dermayu', 'Sudhono', 'Sudhono', '1983-04-10', 'SejarahKesultananDermayu.pdf', 38278289, 'pdf', '../peminjam/kumpulan_file_buku/SejarahKesultananDermayu.pdf', '../foto/sejarah-kesultanan-dermayu_202301.jpeg', '0', '', 'Gratis'),
(84, 'Sejarah Puasa', 'Ahmad Sarwat, Lc.,MA', 'Rumah Fiqih Publishing', '2021-04-24', '355-Sejarah Puasa.pdf', 590340, 'pdf', '../peminjam/kumpulan_file_buku/355-Sejarah Puasa.pdf', '../foto/355-sejarah-puasa.jpeg', '0', '', 'Gratis'),
(85, 'Sejarah Solat', 'Ahmad Sarwat, Lc. MA', 'Rumah Fiqih Publishing', '2021-03-02', '352-Sejarah Shalat.pdf', 702661, 'pdf', '../peminjam/kumpulan_file_buku/352-Sejarah Shalat.pdf', '../foto/352-sejarah-shalat.jpeg', '0', '', 'Gratis'),
(86, 'Sejarah Pembentukan Kalender Hijriyah', 'Ahmad Zarkasih, Lc', 'Rumah Fiqih Publishing', '2011-09-10', 'SejarahPembentukanKalenderHijriyah.pdf', 765007, 'pdf', '../peminjam/kumpulan_file_buku/SejarahPembentukanKalenderHijriyah.pdf', '../foto/sejarahpembentukankalenderhijriyah.jpeg', '0', '', 'Gratis'),
(87, 'The Best Ghost Stories', 'varius', 'joseph lewis french', '2006-03-01', 'The-Best-Ghost-Stories.pdf', 1071224, 'pdf', '../peminjam/kumpulan_file_buku/The-Best-Ghost-Stories.pdf', '../foto/The-Best-Ghost-Stories.jpg', '0', '', 'Gratis'),
(88, 'DrakulaDrakula', 'Bram stoker', 'Chuck Greif ', '2016-08-16', 'Dracula.pdf', 1666115, 'pdf', '../peminjam/kumpulan_file_buku/Dracula.pdf', '../foto/drakula.jpg', '0', '', 'Gratis'),
(89, 'The Invisible Man', 'H. G. Wells', 'Andrew Sly', '2004-10-07', 'The-Invisible-Man.pdf', 788418, 'pdf', '../peminjam/kumpulan_file_buku/The-Invisible-Man.pdf', '../foto/The_Invisible_Man.jpg', '0', '', 'Gratis'),
(90, 'The Woman in White', 'Wilkie Collins', 'manybook.net', '2008-09-13', 'The-Woman-in-White.pdf', 2624921, 'pdf', '../peminjam/kumpulan_file_buku/The-Woman-in-White.pdf', '../foto/the_woman_inwhite.jpg', '0', '', 'Gratis'),
(91, 'The Canterville Ghost', 'Oscar Wilde', 'Gutenberg', '2004-12-30', 'The-Canterville-Ghost.pdf', 431107, 'pdf', '../peminjam/kumpulan_file_buku/The-Canterville-Ghost.pdf', '../foto/The_Canterville_Ghost.jpg', '0', '', 'Gratis'),
(92, 'The Dunwich Horror', 'H. P. Lovecraft', 'Greg Weeks', '2015-06-25', 'The-Dunwich-Horror.pdf', 395956, 'pdf', '../peminjam/kumpulan_file_buku/The-Dunwich-Horror.pdf', '../foto/The_Dunwich_Horror.jpg', '0', '', 'Gratis'),
(93, 'The Arabian Nights Entertainments', 'Andrew Lang', 'Christy Phillips and John Hamm', '2024-04-27', 'The-Arabian-Nights.pdf', 1285503, 'pdf', '../peminjam/kumpulan_file_buku/The-Arabian-Nights.pdf', '../foto/The-Arabian-Nightss.jpg', '0', '', 'Gratis'),
(94, ' The Adventures of Pinocchio', 'Collodi--Pseudonym of Carlo Lorenzin', '	Charles Keller', '2024-04-27', 'Adventures-of-Pinocchio.pdf', 699668, 'pdf', '../peminjam/kumpulan_file_buku/Adventures-of-Pinocchio.pdf', '../foto/Adventures-of-Pinocchio0.jpg', '0', '', 'Gratis'),
(95, 'Household Stories by the Brothers Grimm', 'Jacob Grimm and Wilhelm Grimm', 'GUTENBERG EBOOK HOUSEHOLD STORIES', '2024-04-27', 'Household-Stories-by-the-Brothers-Grimm.pdf', 1668728, 'pdf', '../peminjam/kumpulan_file_buku/Household-Stories-by-the-Brothers-Grimm.pdf', '../foto/Household-Stories-by-the-Brothers-Grimmm.jpg', '0', '', 'Gratis'),
(96, 'Alaeddin und die Wunderlampe aus Tausend und eine Nacht', ' Kurt Moreck', 'Markus Brenner', '2007-08-07', 'Alaeddin-und-die-Wunderlampe.pdf', 559975, 'pdf', '../peminjam/kumpulan_file_buku/Alaeddin-und-die-Wunderlampe.pdf', '../foto/Alaeddin-und-die-Wunderlampee.jpg', '0', '', 'Gratis'),
(97, 'All the Way to Fairyland Fairy Stories', 'Evelyn Sharp', 'Gutenberg ', '2009-04-07', 'All-the-Way-to-Fairyland.pdf', 629515, 'pdf', '../peminjam/kumpulan_file_buku/All-the-Way-to-Fairyland.pdf', '../foto/All-the-Way-to-Fairylandd.jpg', '0', '', 'Gratis'),
(98, 'Worlds Unseen', 'Rachel Starr Thomson', 'Little Dozen Press at Smashwords', '2010-06-25', 'Worlds-Unseen.pdf', 941577, 'pdf', '../peminjam/kumpulan_file_buku/Worlds-Unseen.pdf', '../foto/Worlds-Unseenn.jpg', '0', '', 'Gratis'),
(100, 'jQuery Simplifiez et enrichissez vos développements JavaScript', 'Jonathan Chaffer Karl Swedberg', 'Pearson Education France', '2006-08-31', '73.C.Java.Script.Language.72.pdf', 1573608, 'pdf', '../peminjam/kumpulan_file_buku/73.C.Java.Script.Language.72.pdf', '../foto/jQuerySimplifiezetenrichissezvosdéveloppementsJavaScript.jpeg', '0', '', 'Gratis'),
(101, 'Java Script Language', 'ABBYY FineReader', 'Internet Archive', '2024-04-27', '73.C.Java.Script.Language.72.pdf', 1573608, 'pdf', '../peminjam/kumpulan_file_buku/73.C.Java.Script.Language.72.pdf', '../foto/JavaScriptObjectProgramming.jpeg', 'JavaScript adalah bahasa pemrograman web dan digunakan oleh lebih banyak pengembang perangkat lunak saat ini dibandingkan bahasa pemrograman lainnya. Selama hampir 25 tahun buku terlaris ini telah menjadi panduan utama bagi pemrogram JavaScript. Edisi ketujuh diperbarui sepenuhnya untuk mencakup JavaScript versi 2020, dan bab baru mencakup kelas, modul, iterator, generator, Janji, async/await, dan metaprogramming. Anda akan menemukan contoh kode yang mencerahkan dan menarik di seluruh bagiannya.\r\n\r\nBuku ini ditujukan untuk programmer yang ingin mempelajari JavaScript dan untuk pengembang web yang ingin meningkatkan pemahaman dan penguasaan mereka ke tingkat berikutnya. Ini dimulai dengan menjelaskan bahasa JavaScript itu sendiri, secara detail, dari bawah ke atas. Ini kemudian dibangun di atas fondasi tersebut untuk mencakup platform web dan Node.js.', '', 'Gratis'),
(103, 'Perahu Kertas', 'Dewi Lestari', 'Bentang Pustaka', '2001-08-13', 'perahu_kertas.pdf', 1509555, 'pdf', '../peminjam/kumpulan_file_buku/perahu_kertas.pdf', '../foto/perahu_kertas.JPG', '0Perahu Kertas karya Dee Lestari – Perahu Kertas adalah sebuah judul novel yang ditulis oleh seorang penulis sekaligus penyanyi asal Indonesia, yakni Dewi Lestari atau Dee sebagai nama penanya. Novel dengan genre romansa remaja ini, terlebih dahulu sudah dipublikasikan ke dalam bentuk digital (WAP) bulan April tahun 2008, hingga akhirnya berhasil dibukukan dan terbit pada tahun 2009 oleh penerbit Bentang Pustaka.\r\n\r\nPerahu Kertas adalah novel keenam karya Dee dan novel pertamanya dengan genre populer. Untuk pertama kalinya, Dee dikenal oleh masyarakat luas sebagai seorang novelis saat novel pertamanya yang bertajuk Supernova terbit pada tahun 2001. Kemudian, Dee membuat beberapa karya tulis lainnya yang juga tidak kalah terkenal di kalangan masyarakat, khususnya pecinta sastra, salah satunya Perahu Kertas ini.', '', 'Gratis'),
(105, 'Sejarah Perkembangan Madzhab Syafii', 'Teuku Khairul Fazli, Lc', 'Rumah Fiqih Publishing', '2020-02-20', 'Sejarah_Perkembangan_Madzhab_Syafii.pdf', 477575, 'pdf', '../peminjam/kumpulan_file_buku/Sejarah_Perkembangan_Madzhab_Syafii.pdf', '../foto/sejarahperkembanganmadzhabsyafii.jpeg', '\r\nSebuah karya klasik yang fenomenal. Dr. Al-Bugha menyajikannya secara lengkap, disertai dalil-dalil Al-Quran dan Hadis, serta pendapat para sahabat. Menjadi rujukan yang sangat berharga.\r\n-Dr. K.H. Maruf Amin, Ketua Majelis Ulama Indonesia (MUI)\r\n\r\n\r\nMatan Abu Syuja adalah salah satu kitab terbaik fiqih Mazhab Syafii, ditinjau dari cara pengkajian maupun isi kandungannya. Semua bab fiqih, ketentuan hukum, masalah ibadah, muamalah, dan lain-lain tercakup dalam buku ini. Bahasa yang lugas dan klarifikasi bahasan yang tematis menjadikan buku ini mudah dipelajari dan dipahami.\r\n\r\nUntuk memenuhi kecenderungan pencari ilmu yang menuntut dalil-dalil, Dr. Musthafa Dib Al-Bugha melengkapinya dengan dalil-dalil Al-Quran dan Hadis, serta pendapat para ulama.\r\n\r\nSejak dulu hingga sekarang, buku ini menjadi bahan kajian para pencari ilmu dan menjadi sangat istimewa untuk dijadikan rujukan penting dalam mempelajari fiqih Mazhab Syafii.\r\n\r\n', '', 'Gratis'),
(120, 'Pribadi Dan Martabat Buya Hamka', 'Rusydi Hamka, Haji,', 'Mijan Media Utama', '2017-10-07', 'Rusydi Hamka - Buya Hamka_ Pribadi dan Martabat-Noura (2017).pdf', 3334776, 'pdf', '../peminjam/kumpulan_file_buku/Rusydi Hamka - Buya Hamka_ Pribadi dan Martabat-Noura (2017).pdf', '../foto/pribadi-dan-martabat-buya-hamka.jpeg', 'Buku \"Pribadi dan Martabat\" karya Buya Hamka yang diterbitkan oleh Mijan Media Utama pada tahun 07 oktober 2017 merupakan salah satu karya sastra yang membahas tentang kehidupan pribadi manusia dan martabatnya dalam pandangan agama Islam. Dalam buku ini, Buya Hamka menguraikan konsep-konsep kehidupan yang meliputi aspek moral, etika, dan spiritualitas, serta bagaimana konsep tersebut berhubungan dengan martabat individu. Buya Hamka membahas tentang pentingnya menjaga keutuhan dan keutamaan pribadi dalam menjalani kehidupan sehari-hari. Ia menyoroti berbagai aspek yang memengaruhi kualitas pribadi seseorang, seperti akhlak, karakter, dan integritas. Selain itu, Buya Hamka juga mengajak pembaca untuk merenungkan makna sejati dari martabat manusia dalam konteks keislaman, yaitu sebagai makhluk yang memiliki kedudukan tinggi di hadapan Allah SWT. Dengan gaya bahasa yang lugas dan mendalam, Buya Hamka mengajak pembaca untuk merenungkan nilai-nilai kehidupan yang bersifat universal serta menegaskan pentingnya menjaga martabat sebagai manusia. Buku ini tidak hanya memberikan pemahaman yang mendalam tentang konsep pribadi dan martabat, tetapi juga memberikan inspirasi bagi pembaca untuk meningkatkan kualitas diri dan menjalani kehidupan dengan penuh kebermaknaan.', '50.000', 'Berbayar'),
(121, 'Berani Mimpi Berani Aksi', 'dham Padmaya Mahatma, dkk.', 'Lembaga Kemahasiswaan ITB', '2015-08-18', 'Buku-Cerita-Inspiratif-2014-Bidikmisi-ITB-Berani-Mimpi-Berani-Aksi.pdf', 1913797, 'pdf', '../peminjam/kumpulan_file_buku/Buku-Cerita-Inspiratif-2014-Bidikmisi-ITB-Berani-Mimpi-Berani-Aksi.pdf', '../foto/berani_mimpi_berani_aksi.jpeg', 'Buku ini mengisahkan sebagian kecil dari potret\r\nperjuangan para penerima beasiswa Bidikmisi ITB dalam\r\nmeraih cita. Semoga hadirnya buku ini dapat menjadi inspirasi\r\nyang mendorong semangat dan kepercayaan diri para anak\r\nnegeri untuk meraih mimpi. Dan dengan berbagi kisah ini,\r\nsemoga semakin banyak komponen masyarakat Indonesia yang\r\nberkontribusi, bahu membahu untuk mencerdaskan anak\r\n', '60.000', 'Berbayar'),
(122, 'Beani Tidak Disukai', ' Ichiro Kishimi dan Fumitake Koga', 'Gramedia Pustaka Utama ', '2009-09-09', 'Berani Tidak Disukai (Ichiro Kishimi, Fumitake Koga) (z-lib.org).pdf', 1675958, 'pdf', '../peminjam/kumpulan_file_buku/Berani Tidak Disukai (Ichiro Kishimi, Fumitake Koga) (z-lib.org).pdf', '../foto/berani_tidakdisukai.png', 'Berani Tidak Disukai merupakan buku yang berisikan dialog antara seorang filsuf dengan seorang pemuda. Dialog yang dilakukan selama lima malam ini, berisi percakapan dari seorang pemuda yang tidak puas dengan kehidupannya dan seorang filsuf yang mengajarkannya tentang bagaimana cara mendapatkan kebahagiaan di dunia.', '80.000', 'Berbayar'),
(123, 'Milea suasana dari dilan', 'pidi baiq', 'pastel books', '2016-06-09', 'pidi-baiq-dilan-3.pdf', 3079247, 'pdf', '../peminjam/kumpulan_file_buku/pidi-baiq-dilan-3.pdf', '../foto/mileadariidilan.jpeg', ' Pidi Baiq adalah penulis buku dan novel, dosen, ilustrator, komikus, musisi, dan pencipta lagu yang lahir di Bandung, 8 Agustus 1972. Namanya mulai dikenal melalui grup band The Panas Dalam yang didirikan 1995.  Dia makin dikenal para pencinta karya sastra bergenre humor melalui novel Dilan  bagian 1 terbit 1994, Dilan bagian 2 terbit 2015 dan Dilan bagian 3 terbit tahun 2016.\r\n\r\n                Sebelumnya juga dia menerbitkan novel lain, diantaranya adalah Drunken Monster 2008, Drunken Molen 2008, dan Drunken Mama 2009.\r\n\r\nDilan bagian 3 ini merupakan salah satu novel trilogi Dilan. Bagian ini menceritakan sosok Milea di mata Dilan. Berawal dari harmonisnya hubungan Dilan dengan Milea, Dilan dengan keluarganya, Milea dengan keluarganya, dan antarkelurga mereka. kemudian terjadi peristiwa  yang memicu konflik yaitu kematian Akew, sahabat Dilan akibat dikeroyok orang tak dikenal. Milea berpikir bahwa itu imbas dari keikutsertaan  Dilan dkk di geng motor. Milea ingin Dilan keluar dari geng motor tersebut. Namun Dilan yang sedang dilanda kemaraharahan dan kesedihan atas kematian sahabatnya diikat dalam rasa solidaritas ingin balas dendam. Dalam keadaan bingung  dan galau Dilan butuh orang yang mengerti dirinya, tetapi Milea justru memutuskan sepihak.\r\n\r\n                Diantara Dilan dan Milea terjadi kesalahpahaman yang tidak disadari mereka yang justru membuat mereka semakin jauh. Dilan menyangka bahwa Milea sudah mempunyai pacar baru dan tak mau menggangu hubungan Milea dengan Gunar. Gunar yang selalu bersama Milea di  bimbingan belajar. Padahal Gunar hanya teman biasa, malah Milea dilabrak oleh pacar Gunar. Milea menjauhi Gunar meski Gunar tak mau. Milea menyangka Dilan sudah punya pacar baru ketika pada pemakaman ayah Dilan ada wanita yang mendampingi Dilan dan ada yang menginformasikan bahwa itu pacar Dilan. Milea tidak mau merusak hubungan Dilan dengan wanita tersebut. Padahal wanita tersebut adalah sodara  Dilan.', '65.000', 'Berbayar');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `KategoriID` int(11) NOT NULL,
  `NamaKategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`KategoriID`, `NamaKategori`) VALUES
(35, 'Sejarah'),
(36, 'Horor'),
(37, 'Fantasi'),
(39, 'Teknologi'),
(40, 'Novel'),
(41, 'Biografi'),
(42, 'non fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `KategoriBukuID` int(11) NOT NULL,
  `KategoriID` int(11) DEFAULT NULL,
  `BukuID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`KategoriBukuID`, `KategoriID`, `BukuID`) VALUES
(76, 35, 77),
(77, 35, 78),
(78, 35, 79),
(79, 35, 80),
(80, 35, 81),
(81, 35, 82),
(82, 35, 83),
(83, 35, 84),
(84, 35, 85),
(85, 35, 86),
(86, 36, 87),
(87, 36, 88),
(88, 36, 89),
(89, 36, 90),
(90, 36, 91),
(91, 36, 92),
(92, 37, 93),
(93, 37, 94),
(94, 37, 95),
(95, 37, 96),
(96, 36, 97),
(97, 36, 98),
(99, 39, 100),
(100, 39, 101),
(102, 40, 103),
(104, 35, 105),
(119, 41, 120),
(120, 40, 121),
(121, 40, 122),
(122, 40, 123);

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `KoleksiID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BukuID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`KoleksiID`, `UserID`, `BukuID`) VALUES
(28, 10, 103);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `PeminjamaID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BukuID` int(11) DEFAULT NULL,
  `TanggalPeminjaman` date DEFAULT NULL,
  `TanggalPengembalian` date DEFAULT NULL,
  `StatusPeminjaman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`PeminjamaID`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`) VALUES
(74, 10, 77, '2024-04-29', '2024-04-29', 'Sudah Di Kembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `UlasanID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BukuID` int(11) DEFAULT NULL,
  `Ulasan` text DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`UlasanID`, `UserID`, `BukuID`, `Ulasan`, `Rating`) VALUES
(13, 10, 85, 'banyak pelajaran yang dapat di ambil dari buku ini the best pokonya', 5),
(14, 10, 77, 'bukunya bagus', 5),
(15, 10, 85, 'isi bukunya keren banget', 5),
(16, 10, 77, 'sangat menarik untuk di baca', 5),
(17, 17, 77, 'sangat bagus untuk di baca', 5),
(18, 17, 84, 'setelah membaca ini saya jadi semangat untuk berpuasa', 5),
(19, 17, 84, 'saya jadi bersemangat berpuasa', 5),
(20, 17, 78, 'bukunya bagus', 4),
(21, 17, 78, 'bukunya bagus', 4),
(22, 17, 77, 'mantap', 3),
(23, 17, 77, 'mantap', 3),
(24, 17, 77, 'mantap', 2),
(25, 17, 77, 'bukunya bagus', 4),
(26, 17, 77, 'sangat menarik untuk di baca', 2),
(27, 17, 77, 'sangat menarik untuk di baca', 2),
(28, 17, 77, 'sangat menarik untuk di baca', 2),
(29, 17, 78, 'bukunya bagus', 4),
(30, 17, 78, 'bukunya bagus', 4),
(31, 17, 77, 'bukunya bagus', 2),
(32, 17, 77, 'sangat bagus untuk di baca', 4),
(41, 10, 77, 'bukunya sangat menarik', 5),
(42, 10, 103, 'bukunya bagus', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `NamaLengkap` varchar(255) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `Role` varchar(255) DEFAULT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `Role`, `foto`) VALUES
(10, 'satria ', '477054c78baea7a1242f79d898a2ca46', 'satria@gmail.com', 'muhamad satria noval ', 'KP. Babakan Anyar RT/RW 04/20', 'Peminjam', 'foto.jpg'),
(14, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'ilman@gmail.com', 'hilamn ucung', 'KP.Cikakak RT/RW 01/20', 'Petugas', ''),
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'administrator', 'SMK DOA BANGSA', 'Administrator', '_MG_5847.jpg'),
(17, 'irwan', 'b360089e48b62d69c6c80fa1b5ef024d', 'irwan@gmail.com', 'irwan kurniawan', 'SMK DOA BANGSA', 'Peminjam', ''),
(24, '123', '202cb962ac59075b964b07152d234b70', 'usridarsaputra@gmail.com', 'usridar muhamad saputra', 'KP.cicurugRT/RW 01/20', 'Administrator', 'pas foto.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`BukuID`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`KategoriBukuID`),
  ADD KEY `KategoriID` (`KategoriID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`KoleksiID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`PeminjamaID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`UlasanID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `BukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `KategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `KategoriBukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `KoleksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `PeminjamaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `UlasanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`KategoriID`) REFERENCES `kategoribuku` (`KategoriID`),
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`);

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`);

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `ulasanbuku_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
