<?php
    include 'koneksi.php';
    if (isset($_POST['input'])) {
        $gambar2 = $_FILES['gambar2']['name'];
        if ($gambar2==null) {
        
    $target_dir = "assets/images/sertifikat/kegiatan/";
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
                $query =    $id_mhs   = $_POST['id_mhs'];
                            $keterangan   = $_POST['keterangan'];
                            $tgl_peroleh  = $_POST['tgl_peroleh'];
                            $kategori_sertifikat  = $_POST['kategori_sertifikat'];
                            $gambar = $nama_baru;
                            $asal  = $_POST['asal'];
                            mysql_query("INSERT INTO sertifikat(id_mhs,keterangan,tgl_peroleh,kategori_sertifikat,gambar,asal,status_sertifikat)
                            VALUE('$id_mhs','$keterangan','$tgl_peroleh','$kategori_sertifikat','$gambar','$asal','Pengajuan')")or die(mysql_error());
                if ($query) {
                // Validasi upload (hasil true jika upload berhasil)
                    header('location:kegiatan-mhs.php');
                }else{ // else upload gagal
                    echo 'Upload gagal. <a href="kegiatan-mhs.php">Kembali</a>';
                }
 
            }else{ // else validasi format
                echo 'Format yang diizinkan hanya JPG dan PNG <a href="kegiatan-mhs.php">Kembali</a>';
            }
 
        }else{ // else validasi ukuran file
            echo 'File terlalu besar. Max. 1 MB <a href="kegiatan-mhs.php">Kembali</a>';
        }
 
    }else{ // else validasi error
        echo 'Ada '.$error.' error. Gagal upload. <a href="kegiatan-mhs.php">Kembali</a>';
    }  
}

        } else {

include 'koneksi.php';
    $target_dir = "assets/images/sertifikat/kegiatan/";
    $target_dir2 = "assets/images/sertifikatb/kegiatan/";
    if(isset($_POST['input'])){
    $error = $_FILES['gambar']['error']; // Menyimpan jumlah error ke variabel $error
    $error2 = $_FILES['gambar2']['error']; // Menyimpan jumlah error ke variabel $error
 
    // Validasi error
    if(($error == 0) AND ($error2 == 0)){
        $ukuran_file = $_FILES['gambar']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
        $ukuran_file2 = $_FILES['gambar2']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
 
        // Validasi ukuran file
        if($ukuran_file <= 1000000 && $ukuran_file2 <= 1000000){
            $nama_file = $_FILES['gambar']['name']; // Menyimpan nama file ke variabel $nama_file
            $nama_file2 = $_FILES['gambar2']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
            $format2 = pathinfo($nama_file2, PATHINFO_EXTENSION); // Mendapatkan format file
 
            // Validasi format
            if( ($format == "jpg") or ($format == "png") or ($format2 == "jpg") or ($format2 == "png") ){
                $temp = explode(".", $_FILES["gambar"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
                $temp2 = explode(".", $_FILES["gambar2"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
                $nama_baru = round(microtime(true)) . '.' . end($temp);//fungsi untuk membuat nama acak
                $nama_baru2 = round(microtime(true)) . '.' . end($temp2);//fungsi untuk membuat nama acak
                move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir."/" . $nama_baru);
                move_uploaded_file($_FILES["gambar2"]["tmp_name"], $target_dir2."/" . $nama_baru2);
                $query =    $id_mhs   = $_POST['id_mhs'];
                            $keterangan   = $_POST['keterangan'];
                            $tgl_peroleh  = $_POST['tgl_peroleh'];
                            $kategori_sertifikat  = $_POST['kategori_sertifikat'];
                            $gambar = $nama_baru;
                            $gambar2 = $nama_baru2;
                            $asal  = $_POST['asal'];
                            mysql_query("INSERT INTO sertifikat(id_mhs,keterangan,tgl_peroleh,kategori_sertifikat,gambar,gambar2,asal,status_sertifikat)
                            VALUE('$id_mhs','$keterangan','$tgl_peroleh','$kategori_sertifikat','$gambar','$gambar2','$asal','Pengajuan')")or die(mysql_error());
                if ($query) {
                // Validasi upload (hasil true jika upload berhasil)
                    header('location:kegiatan-mhs.php');
                }else{ // else upload gagal
                    echo 'Upload gagal. <a href="kegiatan-mhs.php">Kembali</a>';
                }
 
            }else{ // else validasi format
                echo 'Format yang diizinkan hanya JPG dan PNG <a href="kegiatan-mhs.php">Kembali</a>';
            }
 
        }else{ // else validasi ukuran file
            echo 'File terlalu besar. Max. 1 MB <a href="kegiatan-mhs.php">Kembali</a>';
        }
 
    }else{ // else validasi error
        echo 'Ada '.$error.' error. Gagal upload. <a href="kegiatan-mhs.php">Kembali</a>';
    }  
}

        }
        
    }
    
?>