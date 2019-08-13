<?php ob_start();
 include "koneksi.php";
 mysql_query("delete from admin where id_adm='$_GET[id_adm]'");
 header('location:data-user.php');
?>