<?php ob_start();
include "koneksi.php";

$id_mhs = $_POST['id_mhs'];
$thn_lulus = $_POST['thn_lulus'];
$asal_sekolah = $_POST['asal_sekolah'];
$jurusan_sekolah = $_POST['jurusan_sekolah'];
$thn_angkatan = $_POST['thn_angkatan'];

    if (!empty($_FILES["file_ijazah"]["tmp_name"]))
    {
        $namafolder="../assets/images/dokumen/ijazah/";
        $jenis_gambar=$_FILES['file_ijazah']['type'];
        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
        {
            $file_ijazah = round(microtime(true)) . end($temp);//fungsi untuk membuat nama acak
            if (move_uploaded_file($_FILES["file_ijazah"]["tmp_name"], $namafolder."/" . $file_ijazah)) {
                echo "<br>upload gambar berhasil";
            } else {
                echo "<br>upload gagal";
            }
            mysql_query("UPDATE pendidikan SET file_ijazah='$file_ijazah' WHERE id_mhs='$id_mhs'");
        }
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .gif .png"); }
    }

$query="UPDATE pendidikan SET thn_lulus='$thn_lulus', asal_sekolah='$asal_sekolah', jurusan_sekolah='$jurusan_sekolah', thn_angkatan='$thn_angkatan' WHERE id_mhs='$id_mhs'";

mysql_query($query) or die(mysql_error());
header('location:profil.php');
?>