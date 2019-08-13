<?php ob_start();
include "koneksi.php";

$nama_mhs   = $_POST['nama_mhs'];
$npm = $_POST['npm'];
$angkatan  = $_POST['angkatan'];
$jurusan  = $_POST['jurusan'];
$fakultas  = $_POST['fakultas'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$jk  = $_POST['jk'];


mysql_query("INSERT INTO mahasiswa(nama_mhs,npm,angkatan,jurusan,fakultas,username,password,jk,status_foto)
VALUE('$nama_mhs','$npm','$angkatan','$jurusan','$fakultas','$username','$password','$jk','Tidak Ada')")or die(mysql_error());


header('location:data-user-mhs.php');
?>