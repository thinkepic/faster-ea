-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 08:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faster_ea`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `name`) VALUES
(1101, 11, 'Simeulue'),
(1102, 11, 'Aceh Singkil'),
(1103, 11, 'Aceh Selatan'),
(1104, 11, 'Aceh Tenggara'),
(1105, 11, 'Aceh Timur'),
(1106, 11, 'Aceh Tengah'),
(1107, 11, 'Aceh Barat'),
(1108, 11, 'Aceh Besar'),
(1109, 11, 'Pidie'),
(1110, 11, 'Bireuen'),
(1111, 11, 'Aceh Utara'),
(1112, 11, 'Aceh Barat Daya'),
(1113, 11, 'Gayo Lues'),
(1114, 11, 'Aceh Taming'),
(1115, 11, 'Nagan Raya'),
(1116, 11, 'Aceh Jaya'),
(1117, 11, 'Bener Meriah'),
(1118, 11, 'Pidie Jaya'),
(1171, 11, 'Kota Banda Aceh'),
(1172, 11, 'Kota Sabang'),
(1173, 11, 'Kota Langsa'),
(1174, 11, 'Kota Lhokseumawe'),
(1175, 11, 'Kota Subulussalam'),
(1201, 12, 'NIAS'),
(1202, 12, 'MANDAILING NATAL'),
(1203, 12, 'TAPANULI SELATAN'),
(1204, 12, 'TAPANULI TENGAH'),
(1205, 12, 'TAPANULI UTARA'),
(1206, 12, 'TOBA SAMOSIR'),
(1207, 12, 'LABUHAN BATU'),
(1208, 12, 'ASAHAN'),
(1209, 12, 'SIMALUNGUN'),
(1210, 12, 'DAIRI'),
(1211, 12, 'KARO'),
(1212, 12, 'DELI SERDANG'),
(1213, 12, 'LANGKAT'),
(1214, 12, 'NIAS SELATAN'),
(1215, 12, 'HUMBANG HASUNDUTAN'),
(1216, 12, 'PAKPAK BHARAT'),
(1217, 12, 'SAMOSIR'),
(1218, 12, 'SERDANG BEDAGAI'),
(1219, 12, 'BATU BARA'),
(1220, 12, 'PADANG LAWAS UTARA'),
(1221, 12, 'PADANG LAWAS'),
(1222, 12, 'LABUHAN BATU SELATAN'),
(1223, 12, 'LABUHAN BATU UTARA'),
(1224, 12, 'NIAS UTARA'),
(1225, 12, 'NIAS BARAT'),
(1271, 12, 'KOTA SIBOLGA'),
(1272, 12, 'KOTA TANJUNG BALAI'),
(1273, 12, 'KOTA PEMATANG SIANTAR'),
(1274, 12, 'KOTA TEBING TINGGI'),
(1275, 12, 'KOTA MEDAN'),
(1276, 12, 'KOTA BINJAI'),
(1277, 12, 'KOTA PADANGSIDIMPUAN'),
(1278, 12, 'KOTA GUNUNGSITOLI'),
(1301, 13, 'KEPULAUAN MENTAWAI'),
(1302, 13, 'PESISIR SELATAN'),
(1303, 13, 'SOLOK'),
(1304, 13, 'SIJUNJUNG'),
(1305, 13, 'TANAH DATAR'),
(1306, 13, 'PADANG PARIAMAN'),
(1307, 13, 'AGAM'),
(1308, 13, 'LIMA PULUH KOTA'),
(1309, 13, 'PASAMAN'),
(1310, 13, 'SOLOK SELATAN'),
(1311, 13, 'DHARMAS RAYA'),
(1312, 13, 'PASAMAN BARAT'),
(1371, 13, 'KOTA PADANG'),
(1372, 13, 'KOTA SOLOK'),
(1373, 13, 'KOTA SAWAH LUNTO'),
(1374, 13, 'KOTA PADANG PANJANG'),
(1375, 13, 'KOTA BUKITTINGGI'),
(1376, 13, 'KOTA PAYAKUMBUH'),
(1377, 13, 'KOTA PARIAMAN'),
(1401, 14, 'KUANTAN SINGINGI'),
(1402, 14, 'INDRAGIRI HULU'),
(1403, 14, 'INDRAGIRI HILIR'),
(1404, 14, 'PELALAWAN'),
(1405, 14, 'SIAK'),
(1406, 14, 'KAMPAR'),
(1407, 14, 'ROKAN HULU'),
(1408, 14, 'BENGKALIS'),
(1409, 14, 'ROKAN HILIR'),
(1410, 14, 'KEPULAUAN MERANTI'),
(1471, 14, 'KOTA PEKANBARU'),
(1473, 14, 'KOTA DUMAI'),
(1501, 15, 'KERINCI'),
(1502, 15, 'MERANGIN'),
(1503, 15, 'SAROLANGUN'),
(1504, 15, 'BATANG HARI'),
(1505, 15, 'MUARO JAMBI'),
(1506, 15, 'TANJUNG JABUNG TIMUR'),
(1507, 15, 'TANJUNG JABUNG BARAT'),
(1508, 15, 'TEBO'),
(1509, 15, 'BUNGO'),
(1571, 15, 'KOTA JAMBI'),
(1572, 15, 'KOTA SUNGAI PENUH'),
(1601, 16, 'OGAN KOMERING ULU'),
(1602, 16, 'OGAN KOMERING ILIR'),
(1603, 16, 'MUARA ENIM'),
(1604, 16, 'LAHAT'),
(1605, 16, 'MUSI RAWAS'),
(1606, 16, 'MUSI BANYUASIN'),
(1607, 16, 'BANYU ASIN'),
(1608, 16, 'OGAN KOMERING ULU SELATAN'),
(1609, 16, 'OGAN KOMERING ULU TIMUR'),
(1610, 16, 'OGAN ILIR'),
(1611, 16, 'EMPAT LAWANG'),
(1612, 16, 'PENUKAL ABAB LEMATANG ILIR'),
(1671, 16, 'KOTA PALEMBANG'),
(1672, 16, 'KOTA PRABUMULIH'),
(1673, 16, 'KOTA PAGAR ALAM'),
(1674, 16, 'KOTA LUBUKLINGGAU'),
(1701, 17, 'BENGKULU SELATAN'),
(1702, 17, 'REJANG LEBONG'),
(1703, 17, 'BENGKULU UTARA'),
(1704, 17, 'KAUR'),
(1705, 17, 'SELUMA'),
(1706, 17, 'MUKOMUKO'),
(1707, 17, 'LEBONG'),
(1708, 17, 'KEPAHIANG'),
(1709, 17, 'BENGKULU TENGAH'),
(1771, 17, 'KOTA BENGKULU'),
(1801, 18, 'LAMPUNG BARAT'),
(1802, 18, 'TANGGAMUS'),
(1803, 18, 'LAMPUNG SELATAN'),
(1804, 18, 'LAMPUNG TIMUR'),
(1805, 18, 'LAMPUNG TENGAH'),
(1806, 18, 'LAMPUNG UTARA'),
(1807, 18, 'WAY KANAN'),
(1808, 18, 'TULANGBAWANG'),
(1809, 18, 'PESAWARAN'),
(1810, 18, 'PRINGSEWU'),
(1811, 18, 'MESUJI'),
(1812, 18, 'TULANGBAWANG BARAT'),
(1813, 18, 'PESISIR BARAT'),
(1871, 18, 'KOTA BANDAR LAMPUNG'),
(1872, 18, 'KOTA METRO'),
(1901, 19, 'BANGKA'),
(1902, 19, 'BELITUNG'),
(1903, 19, 'BANGKA BARAT'),
(1904, 19, 'BANGKA TENGAH'),
(1905, 19, 'BANGKA SELATAN'),
(1906, 19, 'BELITUNG TIMUR'),
(1971, 19, 'KOTA PANGKAL PINANG'),
(2101, 21, 'KARIMUN'),
(2102, 21, 'BINTAN'),
(2103, 21, 'NATUNA'),
(2104, 21, 'LINGGA'),
(2105, 21, 'KEPULAUAN ANAMBAS'),
(2171, 21, 'KOTA BATAM'),
(2172, 21, 'KOTA TANJUNG PINANG'),
(3101, 31, 'KEPULAUAN SERIBU'),
(3171, 31, 'JAKARTA SELATAN'),
(3172, 31, 'JAKARTA TIMUR'),
(3173, 31, 'JAKARTA PUSAT'),
(3174, 31, 'JAKARTA BARAT'),
(3175, 31, 'JAKARTA UTARA'),
(3201, 32, 'BOGOR'),
(3202, 32, 'SUKABUMI'),
(3203, 32, 'CIANJUR'),
(3204, 32, 'BANDUNG'),
(3205, 32, 'GARUT'),
(3206, 32, 'TASIKMALAYA'),
(3207, 32, 'CIAMIS'),
(3208, 32, 'KUNINGAN'),
(3209, 32, 'CIREBON'),
(3210, 32, 'MAJALENGKA'),
(3211, 32, 'SUMEDANG'),
(3212, 32, 'INDRAMAYU'),
(3213, 32, 'SUBANG'),
(3214, 32, 'PURWAKARTA'),
(3215, 32, 'KARAWANG'),
(3216, 32, 'BEKASI'),
(3217, 32, 'BANDUNG BARAT'),
(3218, 32, 'PANGANDARAN'),
(3271, 32, 'KOTA BOGOR'),
(3272, 32, 'KOTA SUKABUMI'),
(3273, 32, 'KOTA BANDUNG'),
(3274, 32, 'KOTA CIREBON'),
(3275, 32, 'KOTA BEKASI'),
(3276, 32, 'KOTA DEPOK'),
(3277, 32, 'KOTA CIMAHI'),
(3278, 32, 'KOTA TASIKMALAYA'),
(3279, 32, 'KOTA BANJAR'),
(3301, 33, 'CILACAP'),
(3302, 33, 'BANYUMAS'),
(3303, 33, 'PURBALINGGA'),
(3304, 33, 'BANJARNEGARA'),
(3305, 33, 'KEBUMEN'),
(3306, 33, 'PURWOREJO'),
(3307, 33, 'WONOSOBO'),
(3308, 33, 'MAGELANG'),
(3309, 33, 'BOYOLALI'),
(3310, 33, 'KLATEN'),
(3311, 33, 'SUKOHARJO'),
(3312, 33, 'WONOGIRI'),
(3313, 33, 'KARANGANYAR'),
(3314, 33, 'SRAGEN'),
(3315, 33, 'GROBOGAN'),
(3316, 33, 'BLORA'),
(3317, 33, 'REMBANG'),
(3318, 33, 'PATI'),
(3319, 33, 'KUDUS'),
(3320, 33, 'JEPARA'),
(3321, 33, 'DEMAK'),
(3322, 33, 'SEMARANG'),
(3323, 33, 'TEMANGGUNG'),
(3324, 33, 'KENDAL'),
(3325, 33, 'BATANG'),
(3326, 33, 'PEKALONGAN'),
(3327, 33, 'PEMALANG'),
(3328, 33, 'TEGAL'),
(3329, 33, 'BREBES'),
(3371, 33, 'KOTA MAGELANG'),
(3372, 33, 'KOTA SURAKARTA'),
(3373, 33, 'KOTA SALATIGA'),
(3374, 33, 'KOTA SEMARANG'),
(3375, 33, 'KOTA PEKALONGAN'),
(3376, 33, 'KOTA TEGAL'),
(3401, 34, 'KULON PROGO'),
(3402, 34, 'BANTUL'),
(3403, 34, 'GUNUNG KIDUL'),
(3404, 34, 'SLEMAN'),
(3471, 34, 'KOTA YOGYAKARTA'),
(3501, 35, 'PACITAN'),
(3502, 35, 'PONOROGO'),
(3503, 35, 'TRENGGALEK'),
(3504, 35, 'TULUNGAGUNG'),
(3505, 35, 'BLITAR'),
(3506, 35, 'KEDIRI'),
(3507, 35, 'MALANG'),
(3508, 35, 'LUMAJANG'),
(3509, 35, 'JEMBER'),
(3510, 35, 'BANYUWANGI'),
(3511, 35, 'BONDOWOSO'),
(3512, 35, 'SITUBONDO'),
(3513, 35, 'PROBOLINGGO'),
(3514, 35, 'PASURUAN'),
(3515, 35, 'SIDOARJO'),
(3516, 35, 'MOJOKERTO'),
(3517, 35, 'JOMBANG'),
(3518, 35, 'NGANJUK'),
(3519, 35, 'MADIUN'),
(3520, 35, 'MAGETAN'),
(3521, 35, 'NGAWI'),
(3522, 35, 'BOJONEGORO'),
(3523, 35, 'TUBAN'),
(3524, 35, 'LAMONGAN'),
(3525, 35, 'GRESIK'),
(3526, 35, 'BANGKALAN'),
(3527, 35, 'SAMPANG'),
(3528, 35, 'PAMEKASAN'),
(3529, 35, 'SUMENEP'),
(3571, 35, 'KOTA KEDIRI'),
(3572, 35, 'KOTA BLITAR'),
(3573, 35, 'KOTA MALANG'),
(3574, 35, 'KOTA PROBOLINGGO'),
(3575, 35, 'KOTA PASURUAN'),
(3576, 35, 'KOTA MOJOKERTO'),
(3577, 35, 'KOTA MADIUN'),
(3578, 35, 'KOTA SURABAYA'),
(3579, 35, 'KOTA BATU'),
(3601, 36, 'PANDEGLANG'),
(3602, 36, 'LEBAK'),
(3603, 36, 'TANGERANG'),
(3604, 36, 'SERANG'),
(3671, 36, 'KOTA TANGERANG'),
(3672, 36, 'KOTA CILEGON'),
(3673, 36, 'KOTA SERANG'),
(3674, 36, 'KOTA TANGERANG SELATAN'),
(5101, 51, 'JEMBRANA'),
(5102, 51, 'TABANAN'),
(5103, 51, 'BADUNG'),
(5104, 51, 'GIANYAR'),
(5105, 51, 'KLUNGKUNG'),
(5106, 51, 'BANGLI'),
(5107, 51, 'KARANG ASEM'),
(5108, 51, 'BULELENG'),
(5171, 51, 'KOTA DENPASAR'),
(5201, 52, 'LOMBOK BARAT'),
(5202, 52, 'LOMBOK TENGAH'),
(5203, 52, 'LOMBOK TIMUR'),
(5204, 52, 'SUMBAWA'),
(5205, 52, 'DOMPU'),
(5206, 52, 'BIMA'),
(5207, 52, 'SUMBAWA BARAT'),
(5208, 52, 'LOMBOK UTARA'),
(5271, 52, 'KOTA MATARAM'),
(5272, 52, 'KOTA BIMA'),
(5301, 53, 'SUMBA BARAT'),
(5302, 53, 'SUMBA TIMUR'),
(5303, 53, 'KUPANG'),
(5304, 53, 'TIMOR TENGAH SELATAN'),
(5305, 53, 'TIMOR TENGAH UTARA'),
(5306, 53, 'BELU'),
(5307, 53, 'ALOR'),
(5308, 53, 'LEMBATA'),
(5309, 53, 'FLORES TIMUR'),
(5310, 53, 'SIKKA'),
(5311, 53, 'ENDE'),
(5312, 53, 'NGADA'),
(5313, 53, 'MANGGARAI'),
(5314, 53, 'ROTE NDAO'),
(5315, 53, 'MANGGARAI BARAT'),
(5316, 53, 'SUMBA TENGAH'),
(5317, 53, 'SUMBA BARAT DAYA'),
(5318, 53, 'NAGEKEO'),
(5319, 53, 'MANGGARAI TIMUR'),
(5320, 53, 'SABU RAIJUA'),
(5371, 53, 'KOTA KUPANG'),
(6101, 61, 'SAMBAS'),
(6102, 61, 'BENGKAYANG'),
(6103, 61, 'LANDAK'),
(6104, 61, 'PONTIANAK'),
(6105, 61, 'SANGGAU'),
(6106, 61, 'KETAPANG'),
(6107, 61, 'SINTANG'),
(6108, 61, 'KAPUAS HULU'),
(6109, 61, 'SEKADAU'),
(6110, 61, 'MELAWI'),
(6111, 61, 'KAYONG UTARA'),
(6112, 61, 'KUBU RAYA'),
(6171, 61, 'KOTA PONTIANAK'),
(6172, 61, 'KOTA SINGKAWANG'),
(6201, 62, 'KOTAWARINGIN BARAT'),
(6202, 62, 'KOTAWARINGIN TIMUR'),
(6203, 62, 'KAPUAS'),
(6204, 62, 'BARITO SELATAN'),
(6205, 62, 'BARITO UTARA'),
(6206, 62, 'SUKAMARA'),
(6207, 62, 'LAMANDAU'),
(6208, 62, 'SERUYAN'),
(6209, 62, 'KATINGAN'),
(6210, 62, 'PULANG PISAU'),
(6211, 62, 'GUNUNG MAS'),
(6212, 62, 'BARITO TIMUR'),
(6213, 62, 'MURUNG RAYA'),
(6271, 62, 'KOTA PALANGKA RAYA'),
(6301, 63, 'TANAH LAUT'),
(6302, 63, 'KOTA BARU'),
(6303, 63, 'BANJAR'),
(6304, 63, 'BARITO KUALA'),
(6305, 63, 'TAPIN'),
(6306, 63, 'HULU SUNGAI SELATAN'),
(6307, 63, 'HULU SUNGAI TENGAH'),
(6308, 63, 'HULU SUNGAI UTARA'),
(6309, 63, 'TABALONG'),
(6310, 63, 'TANAH BUMBU'),
(6311, 63, 'BALANGAN'),
(6371, 63, 'KOTA BANJARMASIN'),
(6372, 63, 'KOTA BANJAR BARU'),
(6401, 64, 'PASIR'),
(6402, 64, 'KUTAI BARAT'),
(6403, 64, 'KUTAI KARTANEGARA'),
(6404, 64, 'KUTAI TIMUR'),
(6405, 64, 'BERAU'),
(6406, 65, 'MALINAU'),
(6407, 65, 'BULUNGAN'),
(6408, 65, 'NUNUKAN'),
(6409, 64, 'PENAJAM PASER UTARA'),
(6410, 65, 'TANA TIDUNG'),
(6411, 64, 'MAHAKAM HULU'),
(6471, 64, 'KOTA BALIKPAPAN'),
(6472, 64, 'KOTA SAMARINDA'),
(6473, 65, 'KOTA TARAKAN'),
(6474, 64, 'KOTA BONTANG'),
(7101, 71, 'BOLAANG MONGONDOW'),
(7102, 71, 'MINAHASA'),
(7103, 71, 'KEPULAUAN SANGIHE'),
(7104, 71, 'KEPULAUAN TALAUD'),
(7105, 71, 'MINAHASA SELATAN'),
(7106, 71, 'MINAHASA UTARA'),
(7107, 71, 'BOLAANG MONGONDOW UTARA'),
(7108, 71, 'SIAU TAGULANDANG BIARO'),
(7109, 71, 'MINAHASA TENGGARA'),
(7110, 71, 'BOLAANG MONGONDOW SELATAN'),
(7111, 71, 'BOLAANG MONGONDOW TIMUR'),
(7171, 71, 'KOTA MANADO'),
(7172, 71, 'KOTA BITUNG'),
(7173, 71, 'KOTA TOMOHON'),
(7174, 71, 'KOTA KOTAMOBAGU'),
(7201, 72, 'BANGGAI KEPULAUAN'),
(7202, 72, 'BANGGAI'),
(7203, 72, 'MOROWALI'),
(7204, 72, 'POSO'),
(7205, 72, 'DONGGALA'),
(7206, 72, 'TOLI-TOLI'),
(7207, 72, 'BUOL'),
(7208, 72, 'PARIGI MOUTONG'),
(7209, 72, 'TOJO UNA-UNA'),
(7210, 72, 'SIGI'),
(7271, 72, 'KOTA PALU'),
(7301, 73, 'KEPULAUAN SELAYAR'),
(7302, 73, 'BULUKUMBA'),
(7303, 73, 'BANTAENG'),
(7304, 73, 'JENEPONTO'),
(7305, 73, 'TAKALAR'),
(7306, 73, 'GOWA'),
(7307, 73, 'SINJAI'),
(7308, 73, 'MAROS'),
(7309, 73, 'PANGKAJENE DAN KEPULAUAN'),
(7310, 73, 'BARRU'),
(7311, 73, 'BONE'),
(7312, 73, 'SOPPENG'),
(7313, 73, 'WAJO'),
(7314, 73, 'SIDENRENG RAPPANG'),
(7315, 73, 'PINRANG'),
(7316, 73, 'ENREKANG'),
(7317, 73, 'LUWU'),
(7318, 73, 'TANA TORAJA'),
(7322, 73, 'LUWU UTARA'),
(7325, 73, 'LUWU TIMUR'),
(7326, 73, 'TORAJA UTARA'),
(7371, 73, 'KOTA MAKASSAR'),
(7372, 73, 'KOTA PAREPARE'),
(7373, 73, 'KOTA PALOPO'),
(7401, 74, 'BUTON'),
(7402, 74, 'MUNA'),
(7403, 74, 'KONAWE'),
(7404, 74, 'KOLAKA'),
(7405, 74, 'KONAWE SELATAN'),
(7406, 74, 'BOMBANA'),
(7407, 74, 'WAKATOBI'),
(7408, 74, 'KOLAKA UTARA'),
(7409, 74, 'BUTON UTARA'),
(7410, 74, 'KONAWE UTARA'),
(7471, 74, 'KOTA KENDARI'),
(7472, 74, 'KOTA BAU-BAU'),
(7501, 75, 'BOALEMO'),
(7502, 75, 'GORONTALO'),
(7503, 75, 'POHUWATO'),
(7504, 75, 'BONE BOLANGO'),
(7505, 75, 'GORONTALO UTARA'),
(7571, 75, 'KOTA GORONTALO'),
(7601, 76, 'MAJENE'),
(7602, 76, 'POLEWALI MANDAR'),
(7603, 76, 'MAMASA'),
(7604, 76, 'MAMUJU'),
(7605, 76, 'MAMUJU UTARA'),
(7606, 76, 'MAMUJU TENGAH'),
(8101, 81, 'MALUKU TENGGARA BARAT'),
(8102, 81, 'MALUKU TENGGARA'),
(8103, 81, 'MALUKU TENGAH'),
(8104, 81, 'BURU'),
(8105, 81, 'KEPULAUAN ARU'),
(8106, 81, 'SERAM BAGIAN BARAT'),
(8107, 81, 'SERAM BAGIAN TIMUR'),
(8108, 81, 'MALUKU BARAT DAYA'),
(8109, 81, 'BURU SELATAN'),
(8171, 81, 'KOTA AMBON'),
(8172, 81, 'KOTA TUAL'),
(8201, 82, 'HALMAHERA BARAT'),
(8202, 82, 'HALMAHERA TENGAH'),
(8203, 82, 'KEPULAUAN SULA'),
(8204, 82, 'HALMAHERA SELATAN'),
(8205, 82, 'HALMAHERA UTARA'),
(8206, 82, 'HALMAHERA TIMUR'),
(8207, 82, 'PULAU MOROTAI'),
(8271, 82, 'KOTA TERNATE'),
(8272, 82, 'KOTA TIDORE KEPULAUAN'),
(9101, 91, 'FAKFAK'),
(9102, 91, 'KAIMANA'),
(9103, 91, 'TELUK WONDAMA'),
(9104, 91, 'TELUK BINTUNI'),
(9105, 91, 'MANOKWARI'),
(9106, 91, 'SORONG SELATAN'),
(9107, 91, 'SORONG'),
(9108, 91, 'RAJA AMPAT'),
(9109, 91, 'TAMBRAUW'),
(9110, 91, 'MAYBRAT'),
(9171, 91, 'KOTA SORONG'),
(9401, 94, 'MERAUKE'),
(9402, 94, 'JAYAWIJAYA'),
(9403, 94, 'JAYAPURA'),
(9404, 94, 'NABIRE'),
(9408, 94, 'YAPEN WAROPEN'),
(9409, 94, 'BIAK NUMFOR'),
(9410, 94, 'PANIAI'),
(9411, 94, 'PUNCAK JAYA'),
(9412, 94, 'MIMIKA'),
(9413, 94, 'BOVEN DIGOEL'),
(9414, 94, 'MAPPI'),
(9415, 94, 'ASMAT'),
(9416, 94, 'YAHUKIMO'),
(9417, 94, 'PEGUNUNGAN BINTANG'),
(9418, 94, 'TOLIKARA'),
(9419, 94, 'SARMI'),
(9420, 94, 'KEEROM'),
(9426, 94, 'WAROPEN'),
(9427, 94, 'SUPIORI'),
(9428, 94, 'MAMBERAMO RAYA'),
(9429, 94, 'NDUGA'),
(9430, 94, 'LANNY JAYA'),
(9431, 94, 'MAMBERAMO TENGAH'),
(9432, 94, 'YALIMO'),
(9433, 94, 'PUNCAK'),
(9434, 94, 'DOGIYAI'),
(9435, 94, 'INTAN JAYA'),
(9436, 94, 'DEIYAI'),
(9471, 94, 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `ea_requests`
--

CREATE TABLE `ea_requests` (
  `id` int(11) NOT NULL,
  `request_base` varchar(255) NOT NULL,
  `tor_number` varchar(255) DEFAULT NULL,
  `employment` varchar(255) NOT NULL,
  `employment_status` varchar(255) DEFAULT NULL,
  `participant_group_name` varchar(255) DEFAULT NULL,
  `participant_group_email` varchar(255) DEFAULT NULL,
  `participant_group_contact_person` varchar(255) DEFAULT NULL,
  `number_of_participants` int(11) DEFAULT NULL,
  `originating_city` varchar(255) NOT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `country_director_notified` varchar(11) NOT NULL,
  `travel_advance` varchar(11) NOT NULL,
  `need_documents` varchar(11) NOT NULL,
  `document_description` varchar(255) DEFAULT NULL,
  `car_rental` varchar(11) NOT NULL,
  `hotel_reservations` varchar(11) NOT NULL,
  `hotel_check_in` date DEFAULT NULL,
  `hotel_check_out` date DEFAULT NULL,
  `preferred_hotel` varchar(255) DEFAULT NULL,
  `other_transportation` varchar(11) NOT NULL,
  `special_instructions` varchar(255) DEFAULT NULL,
  `max_budget_idr` decimal(14,2) DEFAULT NULL,
  `max_budget_usd` decimal(14,2) DEFAULT NULL,
  `requestor_id` int(11) NOT NULL,
  `exteral_invitation_file` text DEFAULT NULL,
  `car_rental_memo` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ea_requests_destinations`
--

CREATE TABLE `ea_requests_destinations` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `order` varchar(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `project_number` varchar(255) NOT NULL,
  `budget_monitor` varchar(255) NOT NULL,
  `lodging` decimal(14,2) NOT NULL,
  `meals` decimal(14,2) NOT NULL,
  `total_lodging_and_meals` decimal(14,2) NOT NULL,
  `night` int(11) NOT NULL,
  `total` decimal(14,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ea_requests_participants`
--

CREATE TABLE `ea_requests_participants` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ea_requests_status`
--

CREATE TABLE `ea_requests_status` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `head_of_units_id` int(11) DEFAULT NULL,
  `head_of_units_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Pending,\r\n2=Approved,\r\n3=Rejected',
  `head_of_units_status_at` datetime DEFAULT NULL,
  `ea_assosiate_id` int(11) DEFAULT NULL,
  `ea_assosiate_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Pending,\r\n2=Approved,\r\n3=Rejected',
  `ea_assosiate_status_at` datetime DEFAULT NULL,
  `fco_monitor_id` int(11) DEFAULT NULL,
  `fco_monitor_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Pending,\r\n2=Approved,\r\n3=Rejected',
  `fco_monitor_status_at` datetime DEFAULT NULL,
  `finance_id` int(11) DEFAULT NULL,
  `finance_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Pending,\r\n2=Approved,\r\n3=Rejected',
  `finance_status_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mst_kabupaten_mst_provinsi` (`province_id`),
  ADD KEY `id_kabupaten` (`id`);

--
-- Indexes for table `ea_requests`
--
ALTER TABLE `ea_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ea_requests_destinations`
--
ALTER TABLE `ea_requests_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ea_requests_participants`
--
ALTER TABLE `ea_requests_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ea_requests_status`
--
ALTER TABLE `ea_requests_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9472;

--
-- AUTO_INCREMENT for table `ea_requests`
--
ALTER TABLE `ea_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ea_requests_destinations`
--
ALTER TABLE `ea_requests_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ea_requests_participants`
--
ALTER TABLE `ea_requests_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ea_requests_status`
--
ALTER TABLE `ea_requests_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
