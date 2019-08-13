<!DOCTYPE html><?php session_start(); ?>
<html>
<head>
	<title>Cetak Ijazah</title>
</head>
<body>
<?php 
    include 'koneksi.php';
    $id_sertifikat=$_GET['id_sertifikat'];
    $query=mysql_query("
        SELECT
        	*
        FROM 
        	sertifikat
        WHERE
            id_sertifikat='$id_sertifikat'");
	$var=mysql_fetch_array($query);

	if ($var['gambar2']==null) {

		$kategori = $var['kategori_sertifikat'];
		$gambar = $var['gambar'];
		$folder = '../assets/images/sertifikat/';
		$filename = $folder."/".$kategori."/".$gambar;
		$data = getimagesize($filename);
		$width = $data[0];
		$height = $data[1];

		if ($width<$height) {?>
		<table>
			<tr>
				<td>
					<img src="../assets/images/sertifikat/<?php echo $var['kategori_sertifikat']; ?>/<?php echo $var['gambar']; ?>" width="910px" height="1280px">
				</td>
			</tr>
		</table>
		<script>
			window.print();
		</script>
		<?} else {?>
		<style type="text/css" media="print">
			@page { size: landscape; }
		</style>
		<table>
			<tr>
				<td>
					<img src="../assets/images/sertifikat/<?php echo $var['kategori_sertifikat']; ?>/<?php echo $var['gambar']; ?>" width="1280px" height="950px">
				</td>
			</tr>
		</table>
		<script>
			window.print();
		</script>
		<?}

	} else {

		$kategori = $var['kategori_sertifikat'];
		$gambar = $var['gambar'];
		$folder = '../assets/images/sertifikat/';
		$filename = $folder."/".$kategori."/".$gambar;
		$data = getimagesize($filename);
		$width = $data[0];
		$height = $data[1];

		$gambar2 = $var['gambar2'];
		$folder2 = '../assets/images/sertifikatb/';
		$filename2 = $folder2."/".$kategori."/".$gambar2;
		$data2 = getimagesize($filename2);
		$width2 = $data2[0];
		$height2 = $data2[1];

		if ($width<$height&&$width<$height) {?>
		<table>
			<tr>
				<td>
					<img src="../assets/images/sertifikat/<?php echo $var['kategori_sertifikat']; ?>/<?php echo $var['gambar']; ?>" width="910px" height="1280px">
				</td>
			</tr>
			<tr>
				<td>
					<img src="../assets/images/sertifikatb/<?php echo $var['kategori_sertifikat']; ?>/<?php echo $var['gambar2']; ?>" width="910px" height="1280px">
				</td>
			</tr>
		</table>
		<script>
			window.print();
		</script>
		<?} else {?>
		<style type="text/css" media="print">
			@page { size: landscape; }
		</style>
			<table>
				<tr>
					<td>
						<img src="../assets/images/sertifikat/<?php echo $var['kategori_sertifikat']; ?>/<?php echo $var['gambar']; ?>" width="1280px" height="910px">
					</td>
				</tr>
				<tr>
					<td>
						<img src="../assets/images/sertifikatb/<?php echo $var['kategori_sertifikat']; ?>/<?php echo $var['gambar2']; ?>" width="1280px" height="910px">
					</td>
				</tr>
			</table>
			<script>
				window.print();
			</script>
		<?}
	}
	
?>	
</body>
</html>