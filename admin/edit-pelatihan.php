<?php ob_start();
include "koneksi.php";

$id_sertifikat = $_POST['id_sertifikat'];
$asal = $_POST['asal'];
$tgl_peroleh = $_POST['tgl_peroleh'];
$keterangan = $_POST['keterangan'];
$kategori = $_POST['kategori_sertifikat'];

if (!empty($_FILES["gambar"]["tmp_name"]))
    {
        $namafolder="../assets/images/sertifikat/pelatihan/";
        $nama_file = $_FILES['gambar']['name']; // Menyimpan nama file ke variabel $nama_file
        $jenis_gambar = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
        $ukuran_file = $_FILES['gambar']['size']; // Menyimpan ukuran file ke variabel $ukuran_file

        if(($jenis_gambar=="jpg" || $jenis_gambar=="png")&&($ukuran_file<=1000000))
        {
            $gambar = round(microtime(true)) . end($temp);//fungsi untuk membuat nama acak
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $namafolder."/" . $gambar)) {
                echo "<br>upload gambar berhasil";
            } else {
                echo "<br>upload gagal";
            }
            mysql_query("UPDATE sertifikat SET gambar='$gambar' WHERE id_sertifikat='$id_sertifikat'");
        }
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .png ukuran max. 1 MB <a href='pelatihan-admin.php'>Kembali<a/>"); }
    }

if (!empty($_FILES["gambar2"]["tmp_name"]))
    {
        $namafolder="../assets/images/sertifikatb/pelatihan/";
        $nama_file = $_FILES['gambar2']['name']; // Menyimpan nama file ke variabel $nama_file
        $jenis_gambar = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
        $ukuran_file = $_FILES['gambar2']['size']; // Menyimpan ukuran file ke variabel $ukuran_file

        if(($jenis_gambar=="jpg" || $jenis_gambar=="png")&&($ukuran_file<=1000000))
        {
            $gambar = round(microtime(true)) . end($temp);//fungsi untuk membuat nama acak
            if (move_uploaded_file($_FILES["gambar2"]["tmp_name"], $namafolder."/" . $gambar)) {
                echo "<br>upload gambar berhasil";
            } else {
                echo "<br>upload gagal";
            }
            mysql_query("UPDATE sertifikat SET gambar2='$gambar' WHERE id_sertifikat='$id_sertifikat'");
        }
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .png ukuran max. 1 MB <a href='pelatihan-admin.php'>Kembali<a/>"); }
    }

$query="UPDATE sertifikat SET asal='$asal', tgl_peroleh='$tgl_peroleh', keterangan='$keterangan', kategori_sertifikat='$kategori' WHERE id_sertifikat='$id_sertifikat'";

mysql_query($query) or die(mysql_error());
header('location:pelatihan-admin.php');
?>