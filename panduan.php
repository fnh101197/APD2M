<!DOCTYPE html>
<html>
<head>
	<title>Panduan</title>
</head>
<body>
<?php 
	//memanggil library mpdf
	include("mpdf57/mpdf.php");

	//object
	$mpdf = new mPDF();

	//character set
	$mpdf->charset_in = 'UTF-8';

	//tampil pdf browser
	$mpdf->WriteHTML('<h1 style=text-align:center>Hallo Dumetschool</h1>');

	$mpdf->Output();

	exit();
?>
<script>window.print();</script>
</body>
</html>