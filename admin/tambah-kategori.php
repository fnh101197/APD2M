<?php ob_start();
include "koneksi.php";

$nm_ks   = $_POST['nm_ks'];
$singkatan_ks = $_POST['singkatan_ks'];

mysql_query("INSERT INTO kategori_sertifikat(nm_ks,singkatan_ks)
VALUE('$nm_ks','$singkatan_ks')")or die(mysql_error());


header('location:data-kategori.php');
?>