<?php ob_start();
include "koneksi.php";

$id_adm = $_POST['id_adm'];
$nik   = $_POST['nik'];
$nama_adm = addslashes($_POST['nama_adm']);
$jabatan  = $_POST['jabatan'];
$username  = $_POST['username'];
$password  = $_POST['password'];

$query=mysql_query("update admin set nik='$nik',nama_adm='$nama_adm',jabatan='$jabatan',username='$username',password='$password' where id_adm='$id_adm'");
header('location:data-user.php');
?>