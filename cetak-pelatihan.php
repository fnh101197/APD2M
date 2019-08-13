<!DOCTYPE html><?php session_start(); ?>
<html>
<head>
<style type="text/css">
	table, td, th {
    	border: 1px solid black;
	}

	.td {
	    vertical-align: top;
	}
</style>
</head>
<body>
	<table border="1" cellspacing="0" style="width: 100%">
		<center>
			<h1>DATA LAPORAN PELATIHAN</h1>
			<?php 
		    include 'koneksi.php';
		    $id_mhs=$_SESSION['id_mhs'];
		    $query=mysql_query("
		        SELECT
		        	*
		        FROM 
		        	mahasiswa
		        WHERE
		            id_mhs='$id_mhs'");
		    while ($var=mysql_fetch_array($query)) {
		?>
			<H3>NPM : <?php echo $var['nama_mhs']; ?> </H3>
			<H3>NPM : <?php echo $var['npm']; ?> </H3>
		<?php } ?>
		</center>
		<tr>
            <th>No</th>
            <th>Asal</th>
            <th>Tanggal Peroleh</th>
            <th>Keterangan</th>
        </tr>
		<?php 
		    include 'koneksi.php';
		    include "tgl-indo.php";
		    $id_mhs=$_SESSION['id_mhs'];
		    $query2=mysql_query("
		        SELECT
		            s.id_sertifikat, 
		            s.asal,
		            s.tgl_peroleh,
		            s.keterangan,
		            s.gambar,
		            s.kategori_sertifikat
		        FROM 
		            sertifikat s,
		            mahasiswa m
		        WHERE
		            s.kategori_sertifikat='Pelatihan'
		        AND
		            '$id_mhs'=s.id_mhs
		        AND
		            m.id_mhs=s.id_mhs
		        ORDER BY
		            s.id_sertifikat");
		    $no=0;
		    while ($var2=mysql_fetch_array($query2)) {
		    $no++;
		?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $var2['asal']; ?></td>
            <td><?php echo TanggalIndo($var2['tgl_peroleh']); ?></td>
            <td><?php echo $var2['keterangan']; ?></td>
        </tr>
        <?php } ?>
    </table> 	
	<script>
		window.print();
	</script>	
</body>
</html>