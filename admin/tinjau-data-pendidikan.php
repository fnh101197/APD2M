<!DOCTYPE html>
<html>
<head>
	<title>Tinjau Data Kependudukan</title>
	<style type="text/css">
		td{
			font-size: 20px;
		}
	</style>
</head>
<body>
	<?php
	include 'koneksi.php';
	$no_pdk=$_GET['no_pdk'];
	$query=mysql_query("SELECT * FROM pendidikan p JOIN mahasiswa m ON p.id_mhs=m.id_mhs WHERE p.no_pdk='$no_pdk'");
	$var=mysql_fetch_array($query)
	?>
	<center><h1>Data Pendidikan</h1></center>
	<table width="910px" align="center">
		<tr>
			<td>Nama</td>
			<td>: <?php echo $var['nama_mhs']; ?></td>
		</tr>
		<tr>
			<td>Asal Sekolah/Jurusan</td>
			<td>: <?php echo $var['asal_sekolah']; ?>/<?php echo $var['jurusan_sekolah']; ?></td>
		</tr>
		<tr>
			<td>Tahun Masuk - Tahun Lulus</td>
			<td>: <?php echo $var['thn_angkatan']; ?> - <?php echo $var['thn_lulus']; ?></td>
		</tr>
	</table>
	<br>
	<center>
		<table>
			<tr>
				<td>
					<img src="../assets/images/dokumen/ijazah/<?php echo $var['file_ijazah']; ?>" width="780px" height="1140px">
				</td>
			</tr>
			<tr>
				<td>
					<img src="../assets/images/dokumen/ijazahb/<?php echo $var['file_ijazahb']; ?>" width="780px" height="1140px">
				</td>
			</tr>
		</table>
	</center>
<script>
	window.print();
</script>
</body>
</html>