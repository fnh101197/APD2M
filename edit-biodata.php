<?php ob_start();
include "koneksi.php";

$id_mhs = $_POST['id_mhs'];

    if (!empty($_FILES["file_foto"]["tmp_name"]))
    {
        $namafolder="assets/images/foto-profil/";
        $nama_file = $_FILES['file_foto']['name']; // Menyimpan nama file ke variabel $nama_file
        $jenis_gambar = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
        $ukuran_file = $_FILES['file_foto']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
        if(($jenis_gambar=="jpg" ||  $jenis_gambar=="png") && $ukuran_file<=1000000)
        {
            $file_foto = round(microtime(true)) .".jpg".end($temp);//fungsi untuk membuat nama acak
            if (move_uploaded_file($_FILES["file_foto"]["tmp_name"], $namafolder."/" . $file_foto)) {
                echo "<br>upload foto berhasil";
            } else {
                echo "<br>upload gagal";
            }
            mysql_query("UPDATE mahasiswa SET file_foto='$file_foto',status_foto='Pengajuan' WHERE id_mhs='$id_mhs'");
        }
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .png ukuran max. 1 MB <a href='halaman-edit-biodata.php'>Kembali<a/>"); }
    }
header('location:profil.php');
?>