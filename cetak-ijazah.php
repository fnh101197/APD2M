<!DOCTYPE html><?php session_start(); ?>
<html>
<head>
	<title>Cetak Ijazah</title>
</head>
<body>
<?php 
    include 'koneksi.php';
    $id_mhs=$_SESSION['id_mhs'];
    $query=mysql_query("
        SELECT
        	*
        FROM 
        	pendidikan
        WHERE
            id_mhs='$id_mhs'");
$var=mysql_fetch_array($query)
?>
<table>
	<tr>
		<td>
			<img src="assets/images/dokumen/ijazah/<?php echo $var['file_ijazah']; ?>" width="910px" height="1280px">
		</td>
	</tr>
	<tr>
		<td>
			<img src="assets/images/dokumen/ijazahb/<?php echo $var['file_ijazahb']; ?>" width="910px" height="1280px">
		</td>
	</tr>
</table>
<script>
	window.print();
</script>
</body>
</html>