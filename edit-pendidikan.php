<?php ob_start();
include "koneksi.php";

$id_mhs = $_POST['id_mhs'];
$thn_lulus = $_POST['thn_lulus'];
$asal_sekolah = $_POST['asal_sekolah'];
$jurusan_sekolah = $_POST['jurusan_sekolah'];
$thn_angkatan = $_POST['thn_angkatan'];

    if (!empty($_FILES["file_ijazah"]["tmp_name"]))
    {
        $namafolder="assets/images/dokumen/ijazah/";
        $nama_file = $_FILES['file_ijazah']['name']; // Menyimpan nama file ke variabel $nama_file
        $jenis_gambar = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
        $ukuran_file = $_FILES['file_ijazah']['size']; // Menyimpan ukuran file ke variabel $ukuran_file

        if(($jenis_gambar=="jpg" || $jenis_gambar=="png")&&($ukuran_file<=1000000))
        {
            $file_ijazah = round(microtime(true)) . end($temp);//fungsi untuk membuat nama acak
            if (move_uploaded_file($_FILES["file_ijazah"]["tmp_name"], $namafolder."/" . $file_ijazah)) {
                echo "<br>upload gambar berhasil";
            } else {
                echo "<br>upload gagal";
            }
            mysql_query("UPDATE pendidikan SET file_ijazah='$file_ijazah' WHERE id_mhs='$id_mhs'");
        }
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .png ukuran max. 1 MB <a href='halaman-edit-pendidikan.php'>Kembali<a/>"); }
    }

    if (!empty($_FILES["file_ijazahb"]["tmp_name"]))
    {
        $namafolder="assets/images/dokumen/ijazahb/";
        $nama_file = $_FILES['file_ijazahb']['name']; // Menyimpan nama file ke variabel $nama_file
        $jenis_gambar = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
        $ukuran_file = $_FILES['file_ijazahb']['size']; // Menyimpan ukuran file ke variabel $ukuran_file

        if(($jenis_gambar=="jpg" ||$jenis_gambar=="png") && ($ukuran_file<=1000000))
        {
            $file_ijazahb = round(microtime(true)) . end($temp);//fungsi untuk membuat nama acak
            if (move_uploaded_file($_FILES["file_ijazahb"]["tmp_name"], $namafolder."/" . $file_ijazahb)) {
                echo "<br>upload gambar berhasil";
            } else {
                echo "<br>upload gagal";
            }
            mysql_query("UPDATE pendidikan SET file_ijazahb='$file_ijazahb' WHERE id_mhs='$id_mhs'");
        }
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .png. Ukuran max. 1MB<a href='halaman-edit-pendidikan.php'>Kembali<a/>"); }
    }

$query="UPDATE pendidikan SET thn_lulus='$thn_lulus', asal_sekolah='$asal_sekolah', jurusan_sekolah='$jurusan_sekolah', thn_angkatan='$thn_angkatan', status_pdk='Pengajuan' WHERE id_mhs='$id_mhs'";

mysql_query($query) or die(mysql_error());
header('location:profil.php');
?>