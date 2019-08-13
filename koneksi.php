<?php 

	$host = "localhost";
	$uname = "root";
	$pswd = "";
	$nama_db = "sidama";

	$koneksi = mysql_connect($host,$uname,$pswd) or 
	die ("gagal terhubung ke server MYSQL");

	mysql_select_db($nama_db, $koneksi) or die("gagal memilih database!");
?>