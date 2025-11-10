-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2025 pada 09.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudkendaraan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `tahun` int(4) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vehicles`
--

INSERT INTO `vehicles` (`id`, `merk`, `jenis_kendaraan`, `tipe`, `warna`, `tahun`, `gambar`) VALUES
(1, 'Toyota', 'Mobil', 'Avanza G', 'Hitam', 2020, '1762758345_avanza g.jpeg'),
(2, 'Honda', 'Mobil', 'City RS', 'Putih', 2021, '1762758467_city RS.jpeg'),
(3, 'Daihatsu', 'Mobil', 'Xenia R', 'Silver', 2019, '1762758554_Xenia R.jpeg'),
(4, 'Suzuki', 'Mobil', 'Ertiga GX', 'Merah', 2018, '1762759969_ertigaGX.jpeg'),
(5, 'Mitsubishi', 'Mobil', 'Xpander Ultimate', 'Abu-abu', 2022, '1762760073_xpander ultimate.jpeg'),
(6, 'Yamaha', 'Motor', 'NMAX 155', 'Biru', 2020, '1762760173_nmax115.jpeg'),
(7, 'Kawasaki', 'Motor', 'Ninja ZX-25R', 'Hijau', 2021, '1762760790_ninja kawasaki.jpeg'),
(8, 'Vespa', 'Motor', 'Sprint 150', 'Krem', 2019, '1762761843_vespa.jpeg'),
(9, 'Honda', 'Motor', 'Vario 160', 'Merah', 2022, '1762760929_vario160.jpeg'),
(10, 'Isuzu', 'Truk', 'Traga Box', 'Putih', 2021, '1762761055_trga box.jpeg'),
(11, 'Hino', 'Truk', 'Dutro 130 HD', 'Kuning', 2019, '1762761143_truk hino.jpg'),
(12, 'Mercedes-Benz', 'Bus', 'OH 1626', 'Silver', 2022, '1762761242_bus oh1626.jpeg'),
(13, 'BMW', 'Mobil', '320i Sport', 'Biru', 2023, '1762761359_bmw 230i.jpg'),
(14, 'Hyundai', 'Mobil', 'Stargazer Prime', 'Hitam', 2022, '1762761398_hyundai.jpeg'),
(15, 'Nissan', 'Mobil', 'Livina VE', 'Putih', 2021, '1762761431_livina ve.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
