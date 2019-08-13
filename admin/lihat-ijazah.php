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
	<center>
		<table>
			<tr>
				<td>
					<img src="../assets/images/dokumen/ijazah/<?php echo $var['file_ijazah']; ?>" width="910px" height="1280px">
				</td>
			</tr>
			<tr>
				<td>
					<img src="../assets/images/dokumen/ijazahb/<?php echo $var['file_ijazahb']; ?>" width="910px" height="1280px">
				</td>
			</tr>
		</table>
	</center>
<script>
	window.print();
</script>
</body>
</html>