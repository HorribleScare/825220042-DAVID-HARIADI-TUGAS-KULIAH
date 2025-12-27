-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2022 pada 05.05
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--
CREATE DATABASE IF NOT EXISTS `a_wisata` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `a_wisata`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
('A002', 'Jason', 'jgulielmus@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `kabupatenKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `kabupatenKODE`) VALUES
('A001', 'Dlingo', 'Daerah Istimewa Yogyakarta', 'Dlingo adalah sebuah kapanewon berlokasi di Kabupaten Bantul, Daerah Istimewa Yogyakarta, Indonesia.', 'K001'),
('A002', 'Imogiri', 'Daerah Istimewa Yogyakarta', 'Imogiri merupakan salah satu lokasi pemakaman raja-raja Mataram Baru yang dibangun oleh Sultan Agung. Imogiri juga adalah tempat dimakamkannya Sultan Agung, raja terbesar Kesultanan Mataram yang memerintah tahun 1613-1645.', 'K001'),
('A003', 'Playen', 'Daerah Istimewa Yogyakarta', 'Playen adalah sebuah kecamatan di Kabupaten Gunungkidul, Provinsi Daerah Istimewa Yogyakarta, Indonesia.', 'K003'),
('A004', 'Saptosari', 'Daerah Istimewa Yogyakarta', 'Saptosari adalah sebuah kecamatan di Kabupaten Gunungkidul, Provinsi Daerah Istimewa Yogyakarta, Indonesia. Kecamatan ini berjarak sekitar 18 Km dari Wonosari, ibu kota Kabupaten Gunungkidul ke arah barat daya. Pusat pemerintahannya berada di Desa Kepek.', 'K003'),
('A005', 'Patuk', 'Daerah Istimewa Yogyakarta', 'Patuk adalah sebuah kecamatan di Kabupaten Gunungkidul, Provinsi Daerah Istimewa Yogyakarta, Indonesia. Kecamatan ini berjarak sekitar 16 Km dari Wonosari, ibu kota Kabupaten Gunungkidul ke arah barat laut melalui jalan nasional ruas Kota Yogyakarta-Wonos', 'K003'),
('A006', 'Borobudur', 'Jawa Tengah', 'Borobudur adalah sebuah kecamatan di Kabupaten Magelang, Jawa Tengah, Indonesia. Kecamatan ini berjarak sekitar 4 Km dari Kota Mungkid, ibu kota Kabupaten Magelang ke arah selatan. Pusat pemerintahannya berada di Desa Borobudur.', 'K006'),
('A007', 'Mungkid', 'Jawa Tengah', 'Mungkid adalah kecamatan di Kabupaten Magelang, Jawa Tengah. Wilayah kecamatan Mungkid bagian Utara menjadi pembentuk wilayah Kota Mungkid yang berfungsi sebagai ibu kota Kabupaten Magelang. Pusat kecamatan Mungkid berada di kelurahan Mungkid yang merupak', 'K006'),
('A008', 'Sawangan', 'Jawa Tengah', 'Sawangan adalah sebuah kecamatan di Kabupaten Magelang, Jawa Tengah, Indonesia. Kecamatan ini berjarak sekitar 15 Km dari Kota Mungkid, ibu kota Kabupaten Magelang ke arah timur. Pusat pemerintahannya berada di Tlatar. Kecamatan ini berada di lereng barat', 'K006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `beritaID` char(4) NOT NULL,
  `beritajudul` varchar(60) NOT NULL,
  `beritainti` varchar(1000) NOT NULL,
  `penulis` char(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggalterbit` date NOT NULL,
  `destinasiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`beritaID`, `beritajudul`, `beritainti`, `penulis`, `penerbit`, `tanggalterbit`, `destinasiID`) VALUES
('B001', 'Pesona Tebing Breksi, Rekreasi di Tebing Seni', 'Dari Tambang Batu Kapur, Sekarang Mempesona Sahabat pesonajawa, tebing breksi ini pada masa lalu adalah tempat penambangan bat .....', 'Lorem Ipsum', 'Lorem Ipsum', '2022-11-23', 'D001'),
('B002', 'Pesona Tebing Breksi, Rekreasi di Tebing Seni', 'Dari Tambang Batu Kapur, Sekarang Mempesona Sahabat pesonajawa, tebing breksi ini pada masa lalu adalah tempat penambangan bat .....', 'Lorem Ipsum', 'Lorem Ipsum', '2022-11-27', 'D001'),
('B003', 'Apa Kata Pemimpin Dunia soal Rusia-Ukraina di KTT G20?', 'Sorotan dunia tengah tertuju pada Konferensi Tingkat Tinggi (KTT) G20 di Bali pada 15-16 November 2022.', 'Ahmad Naufal', 'kompas', '2022-11-27', 'D001'),
('B004', 'Pesona Tebing Breksi, Rekreasi di Tebing Seni', 'Dari Tambang Batu Kapur, Sekarang Mempesona Sahabat pesonajawa, tebing breksi ini pada masa lalu adalah tempat penambangan bat .....', 'Lorem Ipsum', 'Lorem Ipsum', '2022-11-27', 'D005'),
('B005', 'Apa Kata Pemimpin Dunia soal Rusia-Ukraina di KTT G20', 'Sorotan dunia tengah tertuju pada Konferensi Tingkat Tinggi (KTT) G20 di Bali pada 15-16 November 2022.', 'Lorem Ipsum', 'Lorem Ipsum', '2022-11-27', 'D004'),
('B006', 'Pesona Tebing Breksi, Rekreasi di Tebing Seni', 'Dari Tambang Batu Kapur, Sekarang Mempesona Sahabat pesonajawa, tebing breksi ini pada masa lalu adalah tempat penambangan bat .....', 'Lorem Ipsum', 'Lorem Ipsum', '2022-11-23', 'D001'),
('B007', 'Pesona Tebing Breksi, Rekreasi di Tebing Seni', 'Dari Tambang Batu Kapur, Sekarang Mempesona Sahabat pesonajawa, tebing breksi ini pada masa lalu adalah tempat penambangan bat .....', 'Lorem Ipsum', 'Lorem Ipsum', '2022-11-27', 'D001'),
('B008', 'Apa Kata Pemimpin Dunia soal Rusia-Ukraina di KTT G20?', 'Sorotan dunia tengah tertuju pada Konferensi Tingkat Tinggi (KTT) G20 di Bali pada 15-16 November 2022.', 'Ahmad Naufal', 'kompas', '2022-11-27', 'D001'),
('B009', 'Pesona Tebing Breksi, Rekreasi di Tebing Seni', 'Dari Tambang Batu Kapur, Sekarang Mempesona Sahabat pesonajawa, tebing breksi ini pada masa lalu adalah tempat penambangan bat .....', 'Lorem Ipsum', 'Lorem Ipsum', '2022-11-27', 'D005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(4) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('D001', 'Bukit Lintang Sewu', 'Jl. Dahromo, Karang Asem, Desa Muntuk, Kecamatan Dlingo, Kabupaten Bantul', 'W004', 'A001'),
('D002', 'Griya Dahar Mbok Sum', 'Jl. Imogiri - Dlingo, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'W002', 'A001'),
('D003', 'Hutan Pinus Mangunan', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'W004', 'A001'),
('D004', 'Kampung Batik Giriloyo', 'Jl. Imogiri Timur km 14, Gazebo Wisata Giriloyo, Desa Wukirsari, Kecamatan Imogiri, Kabupaten Bantul', 'W003', 'A002'),
('D005', 'Makam Raja Imogiri', 'Jl. Makam Raja atau Jl. Imogiri – Dlingo, Desa Imogiri, Kecamatan Imogiri, Kabupaten Bantul', 'W005', 'A002'),
('D006', 'Seribu Batu Songgo Langit', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'W004', 'A001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `eventID` char(4) NOT NULL,
  `eventNama` varchar(255) NOT NULL,
  `eventKeterangan` text NOT NULL,
  `eventTanggalMulai` date NOT NULL,
  `eventTanggalSelesai` date NOT NULL,
  `eventFoto` text NOT NULL,
  `eventFotoKet` varchar(255) NOT NULL,
  `kabupatenKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`eventID`, `eventNama`, `eventKeterangan`, `eventTanggalMulai`, `eventTanggalSelesai`, `eventFoto`, `eventFotoKet`, `kabupatenKODE`) VALUES
('E001', 'Tour de Ambarrukmo 2022', 'Dalam rangka memeriahkan ulang tahun ke-16 Plaza Ambarrukmo, akan diselenggarakan Tour de Ambarrukmo 2022 sebanyak dua kali kegiatan dengan diawali Road to Tour de Ambarrukmo 2022 pada hari Sabtu, 19 Maret 2022.\r\n\r\nPenyelenggaran Tour de Ambarrukmo yang kedua akan ditentukan kemudian setelah melakukan evaluasi dari kegiatan yang pertama. Melalui acara ini diharapkan memperkuat citra Yogyakarta sebagai kota wisata dan budaya serta ramah bagi para pesepeda.\r\n\r\nRute yang ditempuh adalah 115 km melintasi beberapa destinasi wisata yang ada di Kabupaten Sleman, Bantul dan Gunung Kidul.\"\"', '2022-03-19', '2022-03-19', 'tourdeambarukmo2.jpg', 'Source image: tourdeambarrukmo (1600 Peserta Tour Tahun 2019)', 'K008'),
('E002', 'Tawur Agung Sasih Kesanga di Candi Pramabanan', 'Menyambut Hari Raya Nyepi bagi umat Hindu tahun 2022, akan diadakan gelaran Tawur Agung Sasih Kesanga di Candi Prambanan. Tawur Agung Kesanga menjadi ritual doa sebelum Catur Brata, puncak perayaan Nyepi yang diadakan keesokan harinya. Tawur atau pecaruan biasanya dilakukanpada waktu tengah hari. Tawur secara filosofis bermakna membayar atau mengembalikan sarinya alam yang telah dihisap atau digunakan manusia.\"\"', '2022-03-02', '2022-03-02', 'tawur agung kesanga by alamy.jpg', 'Source image: alamy [Tawur Agung 06-03-2019]', 'K008'),
('E003', 'Sedekah Gunung Merapi', 'Sedekah gunung merupakan tradisi masyarakat yang tinggal di kaki Gunung Merapi sebagai ungkapan terima kasih manusia kepada alam yang telah menghidupi mereka. Kepala kerbau dan aneka sesaji dibawa ke puncak Merapi. Sedekah gunung ini untuk nguri-uri budaya dan memohon keselamatan kepada Tuhan Yang Maha Esa bagi masyarakat di bawah Gunung Merapi,\"', '2021-08-09', '2021-08-09', 'grebeg-selo.jpg', 'Source image: jatengprov', 'K002'),
('E004', 'Festival Cheng Ho', 'Festival untuk memperingati kedatangan Laksamana Cheng Ho ke Semarang. Festival Cheng Ho yang ke 616 atau bisa disebut hari Ulang Tahun kedatangan Sam Poo Tay Djien (Laksamana Zheng He), diperingati setahun sekali dengan kirab membawa Patung Dewa. Dengan berjalan kaki dari Klenteng Tay Kak Sie menuju Klenteng Agung Sam Poo Kong, Festival Laksamana Cheng Ho ini dimeriahkan pula dengan panggung kesenian yang ciamik yang menampilkan perpaduan seni Budaya Tionghoa dan Jawa. Klenteng Tay Kak Sie - Sam Po Kong - Kota Semarang.\r\n', '2021-08-07', '2021-08-07', 'festival-cheng-hoo.jpg', 'Source image: jatengprov', 'K007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F001', 'Bukit Lintang Sewu', 'D001', 'lintangsewu4.jpg'),
('F002', 'Griya Dahar Mbok Sum', 'D002', 'griyadaharmboksum1.jpg'),
('F003', 'Hutan Pinus Mangunan', 'D003', 'ionpinusmangunan.jpg'),
('F004', 'Kampung Batik Giriloyo', 'D004', 'kampungbatikgiriloyo.jpg'),
('F005', 'Makam Raja Imogiri', 'D005', 'makamrajaimogiri1.jpg'),
('F006', 'Seribu Batu Songgo Langit', 'D006', 'seribubatusonggolangit.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelnama` varchar(60) NOT NULL,
  `hotelalamat` varchar(255) NOT NULL,
  `hotelketerangan` varchar(300) NOT NULL,
  `hotelfoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `hotelalamat`, `hotelketerangan`, `hotelfoto`, `areaID`) VALUES
('H001', 'A', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10008390-c43520109e4aa4f8091c941fe1d2a569.webp', 'A001'),
('H002', 'B', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10002262-1518x1024-FIT_AND_TRIM-17040c141bae9155d8e47caa8b8d753d.webp', 'A001'),
('H003', 'C', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10013035-1200x845-FIT_AND_TRIM-affbbd70857894e2e5d0a3fbc7e91c67.webp', 'A001'),
('H004', 'D', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10002713-4050x2700-FIT_AND_TRIM-ed8cc532ac861c8bd17e5d9abe795e4a.webp', 'A001'),
('H005', 'E', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '20016951-8009992060d6cdcb7ea2b6f3fbbe7c1a.webp', 'A002'),
('H006', 'F', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10004529-666x444-FIT_AND_TRIM-2bfac7258e56d3fe0b50da65912d3a68.webp', 'A002'),
('H007', 'G', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '20007376-4505f4e55cb38235f1b0296dc05c16ec.webp', 'A001'),
('H008', 'H', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10010619-b1ff43eb1461c8a283b3e07be85083d5.webp', 'A001'),
('H009', 'I', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '20052530-6ec94a2936b1dee2212d9f5bf63359b9.webp', 'A002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenKODE` char(4) NOT NULL,
  `kabupatenNAMA` varchar(50) NOT NULL,
  `kabupatenALAMAT` varchar(255) NOT NULL,
  `kabupatenKET` text NOT NULL,
  `kabupatenFOTOICON` varchar(255) NOT NULL,
  `kabupatenFOTOICONKET` text NOT NULL,
  `provinsiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenKODE`, `kabupatenNAMA`, `kabupatenALAMAT`, `kabupatenKET`, `kabupatenFOTOICON`, `kabupatenFOTOICONKET`, `provinsiID`) VALUES
('K001', 'Bantul', 'Jl. Robert Wolter Monginsidi No.1 Bantul, Daerah Istimewa Yogyakarta, 5571', 'Bantul memang tak bisa dilepaskan dari sejarah Yogyakarta sebagai kota perjuangan dan sejarah perjuangan Indonesia pada umumnya. Bantul menyimpan banyak kisah kepahlawanan. Antara lain, perlawanan Pangeran Mangkubumi di Ambar Ketawang dan upaya pertahanan Sultan Agung di Pleret.', '08062021060532iconbantul.jpg', 'Obyek Wisata Seribu Batu Songgo Langit', 'P001'),
('K002', 'Boyolali', 'Jalan Raya Boyolali-Semarang km 5 Penggung, Boyolali, Jawa Tengah Kode Pos 57351', 'Asal mula nama BOYOLALI menurut cerita serat Babad Pengging Serat Mataram, nama Boyolali tak disebutkan. Demikian juga pada masa Kerajaan Demak Bintoro maupun Kerajaan Pengging, nama Boyolali belum dikenal. Menurut legenda nama BOYOLALI berhubungan dengan ceritera Ki Ageng Pandan Arang (Bupati Semarang pada abad XVI. Alkisah, Ki Ageng Pandan Arang yang lebih dikenal dengan Tumenggung Notoprojo diramalkan oleh Sunan Kalijogo sebagai Wali penutup menggantikan Syeh Siti Jenar. Oleh Sunan Kalijogo, Ki Ageng Pandan Arang diutus untuk menuju ke Gunung Jabalakat di Tembayat (Klaten) untuk syiar agama Islam.', '27052021165208lembahgunungmadu.jpg', 'Lembah Gunung Madu', 'P002'),
('K003', 'Gunung Kidul', 'Jl. Brigjen Katamso No.1 Wonosari, Daerah Istimewa Yogyakarta', 'Pada waktu Gunungkidul masih merupakan hutan belantara, terdapat suatu desa yang dihuni beberapa orang pelarian dari Majapahit. Desa tersebut adalah Pongangan, yang dipimpin oleh R. Dewa Katong saudara raja Brawijaya. Setelah R Dewa Katong pindah ke desa Katongan 10 km utara Pongangan, puteranya yang bernama R. Suromejo membangun desa Pongangan, sehingga semakin lama semakin rama. Beberapa waktu kemudian, R. Suromejo pindah ke Karangmojo.', '28052021051510gunungkidul01.jpg', 'Gerbang Gunung Kidul', 'P001'),
('K004', 'Karanganyar', 'Kantor Sekretariat Daerah: Jl. Lawu No. 385, Komplek Perkantoran Cangaan, Karanganyar, 57712', 'Karanganyar lahir sebagai dukuh kecil, tepatnya terjadi pada tanggal 19 April 1745 atau 16 Maulud 1670. Pencetus nama Karanganyar adalah Raden Mas Said, atau yang lebih dikenal dengan sebutan Pangeran Sambernyawa. Cikal bakal daerah Karanganyar berasal dari Raden Ayu Diponegoro atau Nyi Ageng Karang dengan nama kecil Raden Ayu Sulbiyah.', '26052021163818candisukuh01.jpg', 'Candi Sukuh', 'P002'),
('K005', 'Klaten', 'Bagian Humas Setda Klaten: Jalan Pemuda No. 294 Klaten 57424.', 'Sejarah Klaten tersebar diberbagai catatan arsip-arsip kuno dan kolonial, arsip-arsip kuno dan manuskrip Jawa. Catatan itu seperti tertulis dalam Serat Perjanjian Dalem Nata, Serat Ebuk Anyar, Serat Siti Dusun, Sekar Nawala Pradata, Serat Angger Gunung, Serat Angger Sedasa dan Serat Angger Gladag. Dalam bundel arsip Karesidenan Surakarta menjadikan rujukan sejarah Klaten seperti tercantum dalam Soerakarta Brieven van Buiten Posten, Brieven van den Soesoehoenan 1784-1810, Daghregister van den Resi dentie Soerakarta 1819, Reporten 1787-1816, Rijksblad Soerakarta dan Staatblad van Nederlandsche Indie. Babad Giyanti, Babad Bedhahipun Karaton Negari Ing Ngayogyakarta, Babad Tanah Jawi dan Babad Sindula menjadi sumber lain untuk menelusuri sejarah Klaten.', '26052021172850candiplaosan01.jpg', 'Candi Plaosan', 'P002'),
('K006', 'Magelang', 'Kantor Pemerintahan : Jl. Soekarno Hatta (Jl. Letnan Tukiyat) No. 59 Kota Mungkid Magelang.', 'Sejarah kabupaten Magelang tidak bisa dipisahkan dari perkembangan Kota Magelang. Pada tahun 1812, Letnan Gubernur Sir Thomas Stamford Raffles mengangkat Ngabei Danuningrat sebagai bupati pertama Magelang dengan gelar Adipati Danuningrat I. Penunjukkan ini terjadi sebagai konsekuensi perjanjian antara Inggris dan Kesultanan Yogyakarta pada tanggal 1 Agustus 1812 yang menyerahkan wilayah Kedu kepada pemerintah Inggris. Sejak itu Danuningrat menjadi bupati pertama di Kabupaten Magelang dengan gelar Adipati Danuningrat I. Atas petunjuk dari gurunya dia memilih daerah antara desa Mantiasih dan desa Gelangan sebagai pusat pemerintahan. Pada tahun 1930, jabatan bupati diserahkan dari dinasti Danuningrat kepada pejabat baru yang bernama Ngabei Danukusumo.', '27052021162657candiborobudur01.jpg', 'Candi Borobudur', 'P002'),
('K007', 'Semarang', 'Sekretariat Daerah Kab.Semarang. Jl.Diponegoro No.14 Ungaran Jawa Tengah – Indonesia.', 'Wilayah kabupaten Semarang terletak di persimpangan menuju kearah Semarang, Yogyakarya dan Solo.Â Â Bahkan jaraknya sangat dekat dan berbatasan dengan wilayah ibu kota provinsinya ,yaitu kota Semarang.Â Â Oleh karena itu batas Utara dari wilayahnya adalah Kota Semarang dan Kabupaten Demak.Â Â Sebelah Timur dengan Kabupaten Boyolali, dan Grobogan.Â Sebelah Selatan berbatasan dengan Kabupaten Boyolali dan Kabupaten Magelang.Â Sebelah Barat berbatasan dengan Kabupaten Temanggung dan Kabupaten Kendal.Â Sedang ditengah-tengah wilayah, terdapat Kota Salatiga.', '27052021173749umbulsidomukti01.jpg', 'Umbul Sidomukti', 'P002'),
('K008', 'Sleman', 'Jl Parasamya Beran Tridadi Sleman, Daerah Istimewa Yogyakarta 55511', 'Mengungkap Sejarah Sleman. Mengungkap sejarah merupakan perjalanan yang rumit dan melelahkan. Setidaknya pengalaman tersebut dapat dipetik dari upaya Dati II Sleman untuk menentukan hari jadinya. Setelah melalui penelitian, pembahasan, dan perdebatan bertahun-tahun, akhirnya hari jadi Kabupaten Dati II Sleman disepakati. Perda no.12 tahun 1998 tertanggal 9 Oktober 1998, metetapkan tanggal 15 (lima belas) Mei tahun 1916 merupakan hari jadi Sleman. Di sini perlu ditegaskan bahwa hari jadi Sleman adalah hari jadi Kabupaten Sleman, bukan hari jadi Pemerintah Kabupaten Dati II Sleman. Penegasan ini diperlukan mengingat keberadaan Kabupaten Sleman jauh sebelum Proklamasi 17 Agustus 1945 sebagai wujud lahirnya negara Indonesia modern, yang memunculkan Pemerintah Kabupaten Dati II Sleman.', '28052021052526candiprambanan01.jpg', 'Candi Prambanan', 'P001'),
('K009', 'Wonogiri', 'Jl. Kabupaten No. 4-6 Wonogiri 57612 Telp. (0273) 321002 Fax. (0273) 322318 Email: bupati@wonogirikab.go.id', 'Kabupaten Wonogiri Terletak pada 7º 32’ – 8º 15’ Lintang selatan dan Garis Bujur 110º 41’ – 111º 18’ Bujur Timur. Posisi Kabupaten Wonogiri sangat strategis karena terletak di ujung selatan Propinsi Jawa Tengah dan diapit oleh Propinsi Jawa Timur dan Propinsi Daerah Istimewa Yogyakarta. Luas wilayah Kabupaten Wonogiri adalah 182.236,02 ha. Secara administratif terbagi menjadi 25 Kecamatan, 43 Kelurahan dan 251 Desa.', '26052021152944wonogiri01.jpg', 'Wonogiri', 'P002'),
('K010', 'Surakarta', 'JL. Jenderal Sudirman No. 2, Kota Surakarta, Jawa Tengah', 'Sejarah kuno Solo dimulai ketika ditemukannya manusia purba Homo erectus di Sangiran, Kabupaten Sragen. Selain itu sebuah penelitian menyebutkan bahwa nama Solo ada karena Kota Surakarta didirikan di sebuah desa bernama Desa Sala, di tepi Sungai Solo.', '28052021040649keratonsolo01.jpg', 'Keraton Surakarta Hadiningrat', 'P002'),
('K011', 'Yogyakarta', 'Jalan Kenari No.56, Muja Muju, Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55165.', 'Berdirinya Kota Yogyakarta berawal dari adanya Perjanjian Gianti pada Tanggal 13 Februari 1755 yang ditandatangani Kompeni Belanda di bawah tanda tangan Gubernur Nicholas Hartingh atas nama Gubernur Jendral Jacob Mossel. Isi Perjanjian Gianti : Negara Mataram dibagi dua : Setengah masih menjadi Hak Kerajaan Surakarta, setengah lagi menjadi Hak Pangeran Mangkubumi. Dalam perjanjian itu pula Pengeran Mangkubumi diakui menjadi Raja atas setengah daerah Pedalaman Kerajaan Jawa dengan Gelar Sultan Hamengku Buwono Senopati Ing Alega Abdul Rachman Sayidin Panatagama Khalifatullah.', 'malioborosiang01.jpg', 'Malioboro', 'P001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriketerangan` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('W001', 'Artificial Tourism', 'Setiap kabupaten telah mengambil beberapa langkah bagaimana mengembangkan sektor pariwisata dan bagaimana menambahkan destinasi wisata buatan yang baru dan dibuat lebih menarik dengan fitur yang lebih baik untuk menarik lebih banyak wisatawan.', 'Buku'),
('W002', 'Culinery Tourism', 'Wisata kuliner pada masa sekarang telah muncul sebagai bagian wisata yang menarik. Wisata ini mencakup bagian dari wisata budaya, lanskap, laut, sejarah lokal, nilai-nilai, dan warisan budaya.', 'Buku'),
('W003', 'Cultural Heritage', 'Peninggalan atau warisan (heritage) merupakan konsep yang luas mencakup warisan yang bersifat alamiah, asli dan merupakan sejarah atau budaya kita. Warisan budaya merupakan wujud dari cara hidup yang dikembangkan oleh masyarakat.', 'Buku'),
('W004', 'Nature Tourism', 'Wisata dengan cara melakukan perjalanan ke daerah alami, yang bertujuan melestarikan lingkungan dan meningkatkan kesejahteraan masyarakat setempat. Wisata yang berbasis pada atraksi alam suatu daerah seperti: mengamati burung, fotografi, melihat bintang.', 'Buku'),
('W005', 'Spiritual Tourism', 'Jenis wisata budaya yang sedang populer, karena banyak orang yang semakin mengembangkan spiritualitas mereka sendiri dan untuk menemukan hal yang lainnya. Pada tahun 2007, pariwisata spiritual dinilai oleh UNWTO sebagai segmen yang paling cepat berkembang', 'Buku'),
('W006', 'Tourist Village', 'Desa wisata adalah desa yang secara resmi ditetapkan sebagai desa yang menyambut pariwisata. Ditetapkan sebagai desa wisata sebagai salah satu cara untuk meningkatkan sektor pariwisata sekaligus menerapkan pembangunan pariwisata berbasis masyarakat', 'Buku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(4) NOT NULL,
  `provinsinama` varchar(50) NOT NULL,
  `provinsiwilayah` varchar(50) NOT NULL,
  `provinsiket` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsinama`, `provinsiwilayah`, `provinsiket`) VALUES
('P001', 'DI Yogyakarta', 'Pulau Jawa', 'Daerah Istimewa Yogyakarta adalah Daerah Istimewa setingkat provinsi di Indonesia yang merupakan peleburan Negara Kesultanan Yogyakarta dan Negara Kadipaten Paku Alaman.'),
('P002', 'Jawa Tengah', 'Pulau Jawa', 'Jawa Tengah adalah sebuah wilayah provinsi di Indonesia yang terletak di bagian tengah Pulau Jawa. Ibu kotanya adalah Kota Semarang.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `restoranID` char(4) NOT NULL,
  `restorannama` varchar(60) NOT NULL,
  `restoranalamat` varchar(255) NOT NULL,
  `restoranketerangan` varchar(300) NOT NULL,
  `restoranfoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`restoranID`, `restorannama`, `restoranalamat`, `restoranketerangan`, `restoranfoto`, `areaID`) VALUES
('H001', 'A', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10008390-c43520109e4aa4f8091c941fe1d2a569.webp', 'A002'),
('H002', 'B', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10002262-1518x1024-FIT_AND_TRIM-17040c141bae9155d8e47caa8b8d753d.webp', 'A001'),
('H003', 'C', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10013035-1200x845-FIT_AND_TRIM-affbbd70857894e2e5d0a3fbc7e91c67.webp', 'A001'),
('H004', 'D', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10002713-4050x2700-FIT_AND_TRIM-ed8cc532ac861c8bd17e5d9abe795e4a.webp', 'A001'),
('H005', 'E', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '20016951-8009992060d6cdcb7ea2b6f3fbbe7c1a.webp', 'A002'),
('H006', 'F', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10004529-666x444-FIT_AND_TRIM-2bfac7258e56d3fe0b50da65912d3a68.webp', 'A002'),
('H007', 'G', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '20007376-4505f4e55cb38235f1b0296dc05c16ec.webp', 'A001'),
('H008', 'H', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '10010619-b1ff43eb1461c8a283b3e07be85083d5.webp', 'A001'),
('H009', 'I', 'Jl. Hutan Pinus Nganjir, Desa Mangunan, Kecamatan Dlingo, Kabupaten Bantul', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku.', '20052530-6ec94a2936b1dee2212d9f5bf63359b9.webp', 'A002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscribe`
--

CREATE TABLE `subscribe` (
  `subscribeID` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subscribe`
--

INSERT INTO `subscribe` (`subscribeID`, `email`) VALUES
(' S001 ', 'jgulielmus@gmail.com'),
(' S002 ', 'gulielmus.825210038@stu.untar.ac.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `travel`
--

CREATE TABLE `travel` (
  `travelID` char(4) NOT NULL,
  `travelketerangan` varchar(255) NOT NULL,
  `traveltanggal` date NOT NULL,
  `travelwaktu` time NOT NULL,
  `traveltarif` int(11) NOT NULL,
  `kabupatenKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `travel`
--

INSERT INTO `travel` (`travelID`, `travelketerangan`, `traveltanggal`, `travelwaktu`, `traveltarif`, `kabupatenKODE`) VALUES
('T001', 'Travel tujuan Bantul', '2022-12-05', '08:00:00', 300000, 'K001'),
('T002', 'Travel tujuan Bantul', '2022-12-05', '06:00:00', 300000, 'K001'),
('T003', 'Travel tujuan Semarang', '2022-12-07', '08:00:00', 200000, 'K007');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indeks untuk tabel `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenKODE`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indeks untuk tabel `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`subscribeID`);

--
-- Indeks untuk tabel `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travelID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
