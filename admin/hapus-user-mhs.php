<?php ob_start();
 include "koneksi.php";
 mysql_query("DELETE
 				
 			FROM
 				mahasiswa
 			WHERE
 				id_mhs='$_GET[id_mhs]'");
 header('location:data-user-mhs.php');
?>