<?php ob_start();
include "koneksi.php";

$id_mhs = $_POST['id_mhs'];
$status_kawin = $_POST['status_kawin'];
$jml_sdr = $_POST['jml_sdr'];
$nm_ayah = $_POST['nm_ayah'];
$nm_ibu = $_POST['nm_ibu'];

    if (!empty($_FILES["file_kk"]["tmp_name"]))
    {
        $namafolder="assets/images/dokumen/kk/";
        $nama_file = $_FILES['file_kk']['name']; // Menyimpan nama file ke variabel $nama_file
        $jenis_gambar = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
        $ukuran_file = $_FILES['file_kk']['size']; // Menyimpan ukuran file ke variabel $ukuran_file

        if(($jenis_gambar=="jpg" || $jenis_gambar=="png") && ($ukuran_file<=1000000))
        {
            $file_kk = round(microtime(true)) . end($temp);//fungsi untuk membuat nama acak
            if (move_uploaded_file($_FILES["file_kk"]["tmp_name"], $namafolder."/" . $file_kk)) {
                echo "<br>upload gambar berhasil";
            } else {
                echo "<br>upload gagal";
            }
            mysql_query("UPDATE keluarga SET file_kk='$file_kk' WHERE id_mhs='$id_mhs'");
        }
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .png ukuran max. 1 MB <a href='halaman-edit-keluarga.php'>Kembali<a/>"); }
    }

$query="UPDATE keluarga SET status_kawin='$status_kawin', jml_sdr='$jml_sdr', nm_ayah='$nm_ayah', nm_ibu='$nm_ibu', status_keluarga='Pengajuan' WHERE id_mhs='$id_mhs'";

mysql_query($query) or die(mysql_error());
header('location:profil.php');
?>