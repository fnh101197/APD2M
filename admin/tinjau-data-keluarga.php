<!DOCTYPE html>
<html>
<head>
	<title>Tinjau Data Keluarga</title>
	<style type="text/css" media="print">
		@page { size: landscape; }
	</style>
</head>
<body>
	<?php
	include 'koneksi.php';
	$id_kk=$_GET['id_kk'];
	$query=mysql_query("SELECT * FROM keluarga k JOIN mahasiswa m ON k.id_mhs=m.id_mhs WHERE k.id_kk='$id_kk'");
	$var=mysql_fetch_array($query)
	?>
	<center><h1>Data Keluarga <?php echo $var['nama_mhs']; ?></h1></center>
	<table width="910px" align="center">
		<tr>
			<td>Status Kawin</td>
			<td>: <?php echo $var['status_kawin']; ?></td>
			<td>Jumlah Saudara</td>
			<td>: <?php echo $var['jml_sdr']; ?></td>
		</tr>
		<tr>
			<td>Nama Ayah</td>
			<td>: <?php echo $var['nm_ayah']; ?></td>
			<td>Nama Ibu</td>
			<td>: <?php echo $var['nm_ibu']; ?></td>
		</tr>
	</table>
	<br>
	<center>
		<table>
			<tr>
				<td>
					<img src="../assets/images/dokumen/kk/<?php echo $var['file_kk']; ?>" width="1280px" height="800px">
				</td>
			</tr>
		</table>
	</center>
<script>
	window.print();
</script>
</body>
</html>