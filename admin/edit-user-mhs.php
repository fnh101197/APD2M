<?php ob_start();
include "koneksi.php";

$id_mhs = $_POST['id_mhs'];
$nama_mhs = $_POST['nama_mhs'];
$npm   = $_POST['npm'];
$angkatan= $_POST['angkatan'];
$jurusan  = $_POST['jurusan'];
$fakultas = $_POST['fakultas'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$jk  = $_POST['jk'];

$query=mysql_query("update mahasiswa set nama_mhs='$nama_mhs',npm='$npm',angkatan='$angkatan',jurusan='$jurusan',fakultas='$fakultas',username='$username',password='$password' ,jk='$jk' where id_mhs='$id_mhs'");
header('location:data-user-mhs.php');
?>