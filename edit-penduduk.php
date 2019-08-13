<?php ob_start();
include "koneksi.php";

$id_mhs = $_POST['id_mhs'];
$nik = $_POST['nik'];
$agama = $_POST['agama'];
$warga_negara = $_POST['warga_negara'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$gol_darah = $_POST['gol_darah'];
$alamat = $_POST['alamat'];
$kelurahan = $_POST['kelurahan'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];
$provinsi = $_POST['provinsi'];

    if (!empty($_FILES["file_ktp"]["tmp_name"]))
    {
        $namafolder="assets/images/dokumen/ktp/";

        $nama_file = $_FILES['file_ktp']['name']; // Menyimpan nama file ke variabel $nama_file
        $jenis_gambar = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
        $ukuran_file = $_FILES['file_ktp']['size']; // Menyimpan ukuran file ke variabel $ukuran_file

        if(($jenis_gambar=="jpg" ||  $jenis_gambar=="png") && $ukuran_file<=1000000)
        {
            $file_ktp = round(microtime(true)) . end($temp);//fungsi untuk membuat nama acak
            if (move_uploaded_file($_FILES["file_ktp"]["tmp_name"], $namafolder."/" . $file_ktp)) {
                echo "<br>upload gambar berhasil";
            } else {
                echo "<br>upload gagal";
            }
            mysql_query("UPDATE kependudukan SET file_ktp='$file_ktp' WHERE id_mhs='$id_mhs'");
        }
        else { die('Format yang diizinkan hanya jpg dan png. Ukuran max. 1MB <a href="halaman-edit-penduduk.php">Kembali</a>'); }
    }

$query="UPDATE kependudukan SET nik='$nik', agama='$agama', warga_negara='$warga_negara', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', gol_darah='$gol_darah', alamat='$alamat', kelurahan='$kelurahan', kecamatan='$kecamatan', kabupaten='$kabupaten', provinsi='$provinsi', status_kependudukan='Pengajuan' WHERE id_mhs='$id_mhs'";

mysql_query($query) or die(mysql_error());
header('location:profil.php');
?>