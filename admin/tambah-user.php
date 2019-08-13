<?php ob_start();
include "koneksi.php";

$target_dir = "../assets/images/foto-profil/";
	$uploadOk = 1;
	// memeriksa apakah filenya adalah gambar atau bukan
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["file_foto"]["tmp_name"]);
	    if($check !== false) {
	        echo "format file gambarnya adalah : " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "bukan file file_foto";
	        $uploadOk = 0;
	    }
	}
	
	// jika uploadok nilanya 0 maka upload gambar gagal,
	if ($uploadOk == 0) {
	    echo "upload gagal";
	//jika tidak maka akan dilakukan proses upload gambar
	} else {
		$temp = explode(".", $_FILES["file_foto"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
		$nama_baru = round(microtime(true)) . '.' . end($temp);//fungsi untuk membuat nama acak
	    if (move_uploaded_file($_FILES["file_foto"]["tmp_name"], $target_dir."/" . $nama_baru)) {
	        echo "<br>upload gambar berhasil";
	    } else {
	        echo "<br>upload gagal";
	    }
	}

$nik   = $_POST['nik'];
$nama_adm = addslashes($_POST['nama_adm']);
$jabatan  = $_POST['jabatan'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$file_foto = $nama_baru;



mysql_query("INSERT INTO admin(nik,nama_adm,jabatan,username,password,file_foto)
VALUE('$nik','$nama_adm','$jabatan','$username','$password','$file_foto')")or die(mysql_error());


header('location:data-user.php');
?>