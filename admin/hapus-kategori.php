<?php ob_start();
 include "koneksi.php";
 mysql_query("delete from kategori_sertifikat where id_ks='$_GET[id_ks]'");
 header('location:data-kategori.php');
?>