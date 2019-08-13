-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Agu 2019 pada 17.01
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sidama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_adm` int(20) NOT NULL AUTO_INCREMENT,
  `nik` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `nama_adm` char(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `file_foto` text NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `nik`, `jabatan`, `nama_adm`, `username`, `password`, `file_foto`) VALUES
(1, '-', 'Tata Usaha', 'Erlina', 'admin', 'admin', '1563317195.jpg'),
(2, '10108001477', 'Kepala Program Studi', 'Lita Karlitasari, S.Kom., MMSI.', 'kaprodi', 'kaprodi', '1560920918.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_sertifikat`
--

CREATE TABLE IF NOT EXISTS `kategori_sertifikat` (
  `id_ks` int(10) NOT NULL AUTO_INCREMENT,
  `nm_ks` text NOT NULL,
  `singkatan_ks` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ks`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `kategori_sertifikat`
--

INSERT INTO `kategori_sertifikat` (`id_ks`, `nm_ks`, `singkatan_ks`) VALUES
(1, 'Prestasi', 'PRE'),
(2, 'Kegiatan', 'KEG'),
(3, 'Seminar', 'SEM'),
(4, 'Pelatihan', 'PEL'),
(5, 'Lain-lain', 'SLL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `id_kk` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(20) NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `jml_sdr` varchar(10) NOT NULL,
  `nm_ayah` varchar(50) NOT NULL,
  `nm_ibu` varchar(50) NOT NULL,
  `file_kk` text NOT NULL,
  `status_keluarga` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`id_kk`, `id_mhs`, `status_kawin`, `jml_sdr`, `nm_ayah`, `nm_ibu`, `file_kk`, `status_keluarga`) VALUES
(1, 1, 'Belum Menikah', '2', 'Ngadiyo', 'Pawit', '', 'Valid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kependudukan`
--

CREATE TABLE IF NOT EXISTS `kependudukan` (
  `id_kependudukan` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(20) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `warga_negara` varchar(40) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tmp_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `file_ktp` text NOT NULL,
  `status_kependudukan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kependudukan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `kependudukan`
--

INSERT INTO `kependudukan` (`id_kependudukan`, `id_mhs`, `nik`, `warga_negara`, `agama`, `tmp_lahir`, `tgl_lahir`, `gol_darah`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `file_ktp`, `status_kependudukan`) VALUES
(1, 1, '3201011011970006', 'WNI', 'Islam', 'PURWOREJO', '2019-07-16', 'O', 'Liingkungan 03 Citatah RT 02 RW 08', 'CIRIUNG', 'CIBINONG', 'BOGOR', 'Jawa Barat', '', 'Pengajuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mhs` int(20) NOT NULL AUTO_INCREMENT,
  `npm` varchar(15) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `jk` text NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `jurusan` text NOT NULL,
  `fakultas` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `file_foto` text NOT NULL,
  `status_foto` varchar(15) NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `npm`, `nama_mhs`, `jk`, `angkatan`, `jurusan`, `fakultas`, `username`, `password`, `file_foto`, `status_foto`) VALUES
(1, '068016026', 'Fajar Nur Hidayat', 'Laki-laki', '2016', 'D3 Sistem Informasi', 'Diploma', 'fajar', 'fajar', '1558352309.jpg', 'Valid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `no_pdk` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(20) NOT NULL,
  `thn_angkatan` int(10) NOT NULL,
  `thn_lulus` int(10) NOT NULL,
  `asal_sekolah` text NOT NULL,
  `jurusan_sekolah` text NOT NULL,
  `file_ijazah` text NOT NULL,
  `file_ijazahb` text NOT NULL,
  `status_pdk` varchar(15) NOT NULL,
  PRIMARY KEY (`no_pdk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`no_pdk`, `id_mhs`, `thn_angkatan`, `thn_lulus`, `asal_sekolah`, `jurusan_sekolah`, `file_ijazah`, `file_ijazahb`, `status_pdk`) VALUES
(1, 1, 2013, 2016, 'SMKN 2 Bogor', 'TKR', '', '', 'Valid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE IF NOT EXISTS `sertifikat` (
  `id_sertifikat` int(10) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(20) NOT NULL,
  `kategori_sertifikat` varchar(30) NOT NULL,
  `asal` text NOT NULL,
  `tgl_peroleh` date NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL,
  `gambar2` text,
  `status_sertifikat` varchar(15) NOT NULL,
  PRIMARY KEY (`id_sertifikat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Dumping data untuk tabel `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `id_mhs`, `kategori_sertifikat`, `asal`, `tgl_peroleh`, `keterangan`, `gambar`, `gambar2`, `status_sertifikat`) VALUES
(58, 1, 'Prestasi', 'UKM Sepakbola dan Futsal', '2019-05-20', 'Staff Of The Year', '1562664728', '', 'Valid'),
(215, 1, 'Kegiatan', 'tes', '2019-08-13', 'tes', '1565708370.jpg', NULL, 'Valid'),
(216, 1, 'Pelatihan', 'tes', '2019-08-13', 'tes', '1565708429.png', NULL, 'Pengajuan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
