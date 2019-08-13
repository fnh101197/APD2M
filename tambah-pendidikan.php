<?php ob_start();
include 'koneksi.php';

$target_dir = "assets/images/dokumen/ijazah/";
$target_dir2 = "assets/images/dokumen/ijazahb/";
if(isset($_POST['input'])){
    $error = $_FILES['gambar']['error']; // Menyimpan jumlah error ke variabel $errorr
 	$error2 = $_FILES['gambar2']['error']; // Menyimpan jumlah error ke variabel $errorr
    
    // Validasi error
    if(($error == 0) && ($error2 == 0)){
        $ukuran_file = $_FILES['gambar']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
        $ukuran_file2 = $_FILES['gambar2']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
 
        // Validasi ukuran file
        if(($ukuran_file <= 1000000) && ($ukuran_file2 <= 1000000)){
            $nama_file = $_FILES['gambar']['name']; // Menyimpan nama file ke variabel $nama_file
            $nama_file2 = $_FILES['gambar2']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
            $format2 = pathinfo($nama_file2, PATHINFO_EXTENSION); // Mendapatkan format file
 
            // Validasi format
            if( (($format == "jpg") or ($format == "png")) && (($format2 == "jpg") or ($format2 == "png"))){
                $temp = explode(".", $_FILES["gambar"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
                $temp2 = explode(".", $_FILES["gambar2"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya

                $nama_baru = round(microtime(true)) . '.' . end($temp);//fungsi untuk membuat nama acak
                $nama_baru2 = round(microtime(true)) . '.' . end($temp2);//fungsi untuk membuat nama acak

                move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir."/" . $nama_baru);
                move_uploaded_file($_FILES["gambar2"]["tmp_name"], $target_dir2."/" . $nama_baru2);

                $query =   	$id_mhs   = $_POST['id_mhs'];
							$thn_lulus   = $_POST['thn_lulus'];
							$asal_sekolah  = $_POST['asal_sekolah'];
							$jurusan_sekolah  = $_POST['jurusan_sekolah'];
							$file_ijazah = $nama_baru;
							$file_ijazahb = $nama_baru;
							$thn_angkatan  = $_POST['thn_angkatan'];

							mysql_query("INSERT INTO pendidikan(id_mhs,thn_lulus,asal_sekolah,jurusan_sekolah,file_ijazah,file_ijazahb,thn_angkatan)
							VALUE('$id_mhs','$thn_lulus','$asal_sekolah','$jurusan_sekolah','$file_ijazah','$file_ijazahb','$thn_angkatan')")or die(mysql_error());
                if ($query) {
                // Validasi upload (hasil true jika upload berhasil)
                    header('location:profil.php');
                }else{ // else upload gagal
                    echo 'Upload gagal. <a href="halaman-tambah-pendidikan.php">Kembali</a>';
                }
 
            }else{ // else validasi format
                echo 'Format yang diizinkan hanya jpg dan png <a href="halaman-tambah-pendidikan.php">Kembali</a>';
            }
 
        }else{ // else validasi ukuran file
            echo 'File terlalu besar. Max. 1 MB <a href="halaman-tambah-pendidikan.php">Kembali</a>';
        }
 
    }else{ // else validasi error
        echo 'Ada '.$error.' error. Gagal upload. <a href="halaman-tambah-pendidikan.php">Kembali</a>';
    }  
}
?>