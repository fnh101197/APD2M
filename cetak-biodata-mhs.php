<!DOCTYPE html><?php session_start(); ?><?php error_reporting(0) // tambahkan untuk menghilangkan notice... hehe ?>
<?php  
include 'tgl-indo.php';
?>
<html>
<head>
<style type="text/css">
	table, td, th {
    	border: 1px solid black;
	}

	.td {
	    vertical-align: top;
	}
	.td-no-bd{
		border:none;
	}
</style>
</head>
<body>
	<center>
		<h2>BIODATA MAHASISWA</h2>
		<br>
		<table border="1" cellspacing="0">
		<tbody>
			<?php 
                include 'koneksi.php';
                $id_mhs=$_SESSION['id_mhs'];
                $query=mysql_query("
                    SELECT
                        *
                    FROM 
                        mahasiswa
                    WHERE
                        '$id_mhs'=id_mhs
                        ");
                $var=mysql_fetch_array($query)
            ?>
			<tr>
				<td width="240px" height="300" rowspan="18"><center><img src="assets/images/foto-profil/<?php if ($var['file_foto']==null) {
                                                echo "noimg.jpg";
                                            }else{
                                                echo $var['file_foto'];
                                            } ?>" width="200px" height="270"></center></td>
			</tr>
			<tr>
				<td colspan="2"  height="20px"><b>&nbsp;A. BIODATA</b></td>
			</tr>
			<tr>
				<td width="150px"><b>&nbsp;Nama</b></td>
				<td width="350px">&nbsp;<?php echo $var['nama_mhs'];?></td>
			</tr>
			<tr>
				<td><b>&nbsp;NPM</b></td>
				<td>&nbsp;<?php echo $var['npm']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Jenis Kelamin</b></td>
				<td>&nbsp;<?php echo $var['jk']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Program Studi</b></td>
				<td>&nbsp;<?php echo $var['jurusan']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Fakultas</b></td>
				<td>&nbsp;<?php echo $var['fakultas']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Angkatan</b></td>
				<td>&nbsp;<?php echo $var['angkatan']; ?></td>
			</tr>
			<?php 
	            include 'koneksi.php';
	            $id_mhs=$_SESSION['id_mhs'];
	            $query=mysql_query("
	                SELECT
	                    *
	                FROM 
	                    pendidikan
	                WHERE
	                    id_mhs='$id_mhs'
	                    ");
	            $var=mysql_fetch_array($query)
	        ?>
			<tr>
				<td colspan="2" height="20px"><b>&nbsp;B. ASAL SEKOLAH</b></td>
			</tr>
			<tr>
				<td><b>&nbsp;Nama Sekolah</b></td>
				<td>&nbsp;<?php echo $var['asal_sekolah']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Jurusan</b></td>
				<td>&nbsp;<?php echo $var['jurusan_sekolah']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Tahun Masuk</b></td>
				<td>&nbsp;<?php echo $var['thn_angkatan']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Tahun Lulus</b></td>
				<td>&nbsp;<?php echo $var['thn_lulus'];?></td>
			</tr>
			<?php 
                include 'koneksi.php';
                $id_mhs=$_SESSION['id_mhs'];
                $query=mysql_query("
                    SELECT
                        *
                    FROM 
                        keluarga
                    WHERE
                        '$id_mhs'=id_mhs
                        ");
                $var=mysql_fetch_array($query)
            ?>
			<tr>
				<td colspan="2" height="20px"><b>&nbsp;C. KELUARGA</b></td>
			</tr>
			<tr>
				<td><b>&nbsp;Status</b></td>
				<td>&nbsp;<?php echo $var['status_kawin']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Jumlah Saudara</b></td>
				<td>&nbsp;<?php echo $var['jml_sdr']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Nama Ayah</b></td>
				<td>&nbsp;<?php echo $var['nm_ayah']; ?></td>
			</tr>
			<tr>
				<td><b>&nbsp;Nama Ibu</b></td>
				<td>&nbsp;<?php echo $var['nm_ibu']; ?></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table border="1" cellspacing="0">
		<tbody>
			<?php 
                include 'koneksi.php';
                $id_mhs=$_SESSION['id_mhs'];
                $query=mysql_query("
                    SELECT
                        *
                    FROM 
                        kependudukan
                    WHERE
                        '$id_mhs'=id_mhs
                        ");
                $var=mysql_fetch_array($query)
            ?>
			<tr>
				<td colspan="2"><b>&nbsp;D. KEPENDUDUKAN</b></td>
			</tr>
			<tr>
				<td width="350px"><b>&nbsp;NIK</b></td>
				<td width="550px">&nbsp;<?php echo $var['nik'];?></td>
			</tr>
			<tr>
				<td width="350px"><b>&nbsp;Agama</b></td>
				<td width="550px">&nbsp;<?php echo $var['agama'];?></td>
			</tr>
			<tr>
				<td width="350px"><b>&nbsp;Kewarganegaraan</b></td>
				<td width="550px">&nbsp;<?php echo $var['warga_negara'];?></td>
			</tr>
			<tr>
				<td width="350px"><b>&nbsp;Tempat Lahir</b></td>
				<td width="550px">&nbsp;<?php echo $var['tmp_lahir'];?></td>
			</tr>
			<tr>
				<td width="350px"><b>&nbsp;Tanggal Lahir</b></td>
				<td width="550px">&nbsp;<?php echo TanggalIndo($var['tgl_lahir']);?></td>
			</tr>
			<tr>
				<td width="350px"><b>&nbsp;Golongan Darah</b></td>
				<td width="550px">&nbsp;<?php echo $var['gol_darah'];?></td>
			</tr>
			<tr>
				<td width="350px"><b>&nbsp;Alamat</b></td>
				<td width="550px"><?php echo $var['alamat']." Kelurahan ".$var['kelurahan'].", Kecamatan ".$var['kecamatan'].", Kota/Kabupaten ".$var['kabupaten'].", Provinsi ".$var['provinsi'];?></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table border="1" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="4"><b>&nbsp;E. PRESTASI</b></td>
			</tr>
			<tr>
				<td width="20px"><center><b>&nbsp;No</b></center></td>
				<td width="290px"><center><b>&nbsp;Asal</b></center></td>
				<td width="290px"><center><b>&nbsp;Tgl. Diperoleh</b></center></td>
				<td width="290px"><center><b>&nbsp;Keterangan</b></center></td>
			</tr>
			<?php 
                include 'koneksi.php';
                $id_mhs=$_SESSION['id_mhs'];
                $query=mysql_query("
                    SELECT
                        s.id_sertifikat, 
                        s.asal,
                        s.tgl_peroleh,
                        s.keterangan,
                        s.gambar
                    FROM 
                        sertifikat s,
                        mahasiswa m
                    WHERE
                        s.kategori_sertifikat='Prestasi'
                    AND
                        m.id_mhs=s.id_mhs
                    AND
                        '$id_mhs'=s.id_mhs
                    ORDER BY
                        s.id_sertifikat");
                $no=0;
                while ($var=mysql_fetch_array($query)) {
                $no++;
            ?>
			<tr>
				<td width="20px"><center><?php echo $no; ?></center></td>
				<td width="290px"><?php echo $var['asal']; ?></td>
				<td width="290px"><?php echo TanggalIndo($var['tgl_peroleh']); ?></td>
				<td width="290px"><?php echo $var['keterangan']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<br>
	<table border="1" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="4"><b>&nbsp;F. KEGIATAN</b></td>
			</tr>
			<tr>
				<td width="20px"><center><b>&nbsp;No</b></center></td>
				<td width="290px"><center><b>&nbsp;Asal</b></center></td>
				<td width="290px"><center><b>&nbsp;Tgl. Diperoleh</b></center></td>
				<td width="290px"><center><b>&nbsp;Keterangan</b></center></td>
			</tr>
			<?php 
                include 'koneksi.php';
                $id_mhs=$_SESSION['id_mhs'];
                $query=mysql_query("
                    SELECT
                        s.id_sertifikat, 
                        s.asal,
                        s.tgl_peroleh,
                        s.keterangan,
                        s.gambar
                    FROM 
                        sertifikat s,
                        mahasiswa m
                    WHERE
                        s.kategori_sertifikat='Kegiatan'
                    AND
                        m.id_mhs=s.id_mhs
                    AND
                        '$id_mhs'=s.id_mhs
                    ORDER BY
                        s.id_sertifikat");
                $no=0;
                while ($var=mysql_fetch_array($query)) {
                $no++;
            ?>
			<tr>
				<td width="20px"><center><?php echo $no; ?></center></td>
				<td width="290px"><?php echo $var['asal']; ?></td>
				<td width="290px"><?php echo TanggalIndo($var['tgl_peroleh']); ?></td>
				<td width="290px"><?php echo $var['keterangan']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	</center>
	<br>
	<table border="1" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="4"><b>&nbsp;G. PELATIHAN</b></td>
			</tr>
			<tr>
				<td width="20px"><center><b>&nbsp;No</b></center></td>
				<td width="290px"><center><b>&nbsp;Asal</b></center></td>
				<td width="290px"><center><b>&nbsp;Tgl. Diperoleh</b></center></td>
				<td width="290px"><center><b>&nbsp;Keterangan</b></center></td>
			</tr>
			<?php 
                include 'koneksi.php';
                $id_mhs=$_SESSION['id_mhs'];
                $query=mysql_query("
                    SELECT
                        s.id_sertifikat, 
                        s.asal,
                        s.tgl_peroleh,
                        s.keterangan,
                        s.gambar
                    FROM 
                        sertifikat s,
                        mahasiswa m
                    WHERE
                        s.kategori_sertifikat='Pelatihan'
                    AND
                        m.id_mhs=s.id_mhs
                    AND
                        '$id_mhs'=s.id_mhs
                    ORDER BY
                        s.id_sertifikat");
                $no=0;
                while ($var=mysql_fetch_array($query)) {
                $no++;
            ?>
			<tr>
				<td width="20px"><center><?php echo $no; ?></center></td>
				<td width="290px"><?php echo $var['asal']; ?></td>
				<td width="290px"><?php echo TanggalIndo($var['tgl_peroleh']); ?></td>
				<td width="290px"><?php echo $var['keterangan']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<br>
	<table border="1" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="4"><b>&nbsp;H. SEMINAR</b></td>
			</tr>
			<tr>
				<td width="20px"><center><b>&nbsp;No</b></center></td>
				<td width="290px"><center><b>&nbsp;Asal</b></center></td>
				<td width="290px"><center><b>&nbsp;Tgl. Diperoleh</b></center></td>
				<td width="290px"><center><b>&nbsp;Keterangan</b></center></td>
			</tr>
			<?php 
                include 'koneksi.php';
                $id_mhs=$_SESSION['id_mhs'];
                $query=mysql_query("
                    SELECT
                        s.id_sertifikat, 
                        s.asal,
                        s.tgl_peroleh,
                        s.keterangan,
                        s.gambar
                    FROM 
                        sertifikat s,
                        mahasiswa m
                    WHERE
                        s.kategori_sertifikat='Seminar'
                    AND
                        m.id_mhs=s.id_mhs
                    AND
                        '$id_mhs'=s.id_mhs
                    ORDER BY
                        s.id_sertifikat");
                $no=0;
                while ($var=mysql_fetch_array($query)) {
                $no++;
            ?>
			<tr>
				<td width="20px"><center><?php echo $no; ?></center></td>
				<td width="290px"><?php echo $var['asal']; ?></td>
				<td width="290px"><?php echo TanggalIndo($var['tgl_peroleh']); ?></td>
				<td width="290px"><?php echo $var['keterangan']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<br>
	<br>
	<table border="1" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="4"><b>&nbsp;I. LAIN-LAIN</b></td>
			</tr>
			<tr>
				<td width="20px"><center><b>&nbsp;No</b></center></td>
				<td width="290px"><center><b>&nbsp;Asal</b></center></td>
				<td width="290px"><center><b>&nbsp;Tgl. Diperoleh</b></center></td>
				<td width="290px"><center><b>&nbsp;Keterangan</b></center></td>
			</tr>
			<?php 
                include 'koneksi.php';
                $id_mhs=$_SESSION['id_mhs'];
                $query=mysql_query("
                    SELECT
                        s.id_sertifikat, 
                        s.asal,
                        s.tgl_peroleh,
                        s.keterangan,
                        s.gambar
                    FROM 
                        sertifikat s,
                        mahasiswa m
                    WHERE
                        s.kategori_sertifikat='Lain-lain'
                    AND
                        m.id_mhs=s.id_mhs
                    AND
                        '$id_mhs'=s.id_mhs
                    ORDER BY
                        s.id_sertifikat");
                $no=0;
                while ($var=mysql_fetch_array($query)) {
                $no++;
            ?>
			<tr>
				<td width="20px"><center><?php echo $no; ?></center></td>
				<td width="290px"><?php echo $var['asal']; ?></td>
				<td width="290px"><?php echo TanggalIndo($var['tgl_peroleh']); ?></td>
				<td width="290px"><?php echo $var['keterangan']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<script>
		window.print();
	</script>	
</body>
</html>