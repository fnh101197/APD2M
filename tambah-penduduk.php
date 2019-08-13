<?php ob_start();
include 'koneksi.php';
$target_dir = "assets/images/dokumen/ktp/";
if(isset($_POST['input'])){
    $error = $_FILES['gambar']['error']; // Menyimpan jumlah error ke variabel $errorr
 
    // Validasi error
    if($error == 0){
        $ukuran_file = $_FILES['gambar']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
 
        // Validasi ukuran file
        if($ukuran_file <= 1000000){
            $nama_file = $_FILES['gambar']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
 
            // Validasi format
            if( ($format == "jpg") or ($format == "png")){
                $temp = explode(".", $_FILES["gambar"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
                $nama_baru = round(microtime(true)) . '.' . end($temp);//fungsi untuk membuat nama acak
                move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir."/" . $nama_baru);
                $query =   	$id_mhs   = $_POST['id_mhs'];
							$nik   = $_POST['nik'];
							$agama  = $_POST['agama'];
							$warga_negara  = $_POST['warga_negara'];
							$file_ktp = $nama_baru;
							$tmp_lahir  = $_POST['tmp_lahir'];
							$tgl_lahir  = $_POST['tgl_lahir'];
							$gol_darah  = $_POST['gol_darah'];
							$alamat  = $_POST['alamat'];
							$kelurahan  = $_POST['kelurahan'];
							$kecamatan  = $_POST['kecamatan'];
							$kabupaten  = $_POST['kabupaten'];
							$provinsi  = $_POST['provinsi'];

							mysql_query("INSERT INTO kependudukan(id_mhs,nik,agama,warga_negara,file_ktp,tmp_lahir,tgl_lahir,gol_darah,alamat,kelurahan,kecamatan,kabupaten,provinsi,status_kependudukan)
							VALUE('$id_mhs','$nik','$agama','$warga_negara','$file_ktp','$tmp_lahir','$tgl_lahir','$gol_darah','$alamat','$kelurahan','$kecamatan','$kabupaten','$provinsi','Pengajuan')")or die(mysql_error());
                if ($query) {
                // Validasi upload (hasil true jika upload berhasil)
                    header('location:profil.php');
                }else{ // else upload gagal
                    echo 'Upload gagal. <a href="halaman-tambah-penduduk.php">Kembali</a>';
                }
 
            }else{ // else validasi format
                echo 'Format yang diizinkan hanya jpg dan png <a href="halaman-tambah-penduduk.php">Kembali</a>';
            }
 
        }else{ // else validasi ukuran file
            echo 'File terlalu besar. Max. 1 MB <a href="halaman-tambah-penduduk.php">Kembali</a>';
        }
 
    }else{ // else validasi error
        echo 'Ada '.$error.' error. Gagal upload. <a href="halaman-tambah-penduduk.php">Kembali</a>';
    }  
}
?>