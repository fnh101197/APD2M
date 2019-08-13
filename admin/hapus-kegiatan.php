<?php ob_start();
 include "koneksi.php";
 mysql_query("delete from sertifikat where id_sertifikat='$_GET[id_sertifikat]'");
 header('location:kegiatan-admin.php');
?>