<?php ob_start();
include "koneksi.php";

$id_ks = $_POST['id_ks'];
$nm_ks   = $_POST['nm_ks'];
$singkatan_ks = $_POST['singkatan_ks'];

$query=mysql_query("update kategori_sertifikat set nm_ks='$nm_ks',singkatan_ks='$singkatan_ks' where id_ks='$id_ks'");
header('location:data-kategori.php');
?>