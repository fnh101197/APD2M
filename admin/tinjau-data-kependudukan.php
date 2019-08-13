<!DOCTYPE html>
<html>
<head>
	<title>Tinjau Data Kependudukan</title>
	<style type="text/css">
		td{
			font-size: 30px;
		}
	</style>
</head>
<body>
	<?php
	include 'koneksi.php';
	$id_kependudukan=$_GET['id_kependudukan'];
	$query=mysql_query("SELECT * FROM kependudukan kp JOIN mahasiswa m ON kp.id_mhs=m.id_mhs WHERE kp.id_kependudukan='$id_kependudukan'");
	$var=mysql_fetch_array($query)
	?>
	<h1>Data Kependudukan</h1>
	<table width="910px">
		<tr>
			<td width="20%">NIK</td>
			<td>: <?php echo $var['nik']; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>: <?php echo $var['nama_mhs']; ?></td>
		</tr>
		<tr>
			<td>Warga Negara</td>
			<td>: <?php echo $var['warga_negara']; ?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>: <?php echo $var['agama']; ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>: <?php echo $var['tmp_lahir']; ?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>: <?php echo $var['tgl_lahir']; ?></td>
		</tr>
		<tr>
			<td>Golongan Darah</td>
			<td>: <?php echo $var['gol_darah']; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: <?php echo $var['alamat']." Kelurahan ".$var['kelurahan'].", Kecamatan ".$var['kecamatan'].", Kota/Kabupaten ".$var['kabupaten'].", Provinsi ".$var['provinsi'];?></td>
		</tr>
	</table>
	<br>
	<img src="../assets/images/dokumen/ktp/<?php echo $var['file_ktp']; ?>" width="1011px" height="638px">
<script>
	window.print();
</script>
</body>
</html>