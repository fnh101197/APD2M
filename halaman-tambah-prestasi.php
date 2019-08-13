<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Prestasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- session -->
    <?php
        session_start();
        if(!isset($_SESSION['username']) || (!isset($_SESSION['password']))) {
            ?><script language="JavaScript">
                alert('Silahkan log in!');
                document.location='index.php'
            </script><?
        } else {
    ?>
    <!-- konfirmasi logout -->
    <script language="JavaScript">
        function logout(){
            tanya = confirm('Yakin log out?');
            if (tanya == true) return true;
                else return false;
        }
    </script>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="../admin/beranda.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="beranda.php"><i class="fa fa-home"></i><span>Home</span></a>
                            </li>
                            <li>
                                <a href="profil.php"><i class="fa fa-user"></i><span>Profil</span></a>
                            </li>
                            <li class="active">
                                <a href="prestasi-mhs.php"><i class="fa fa-trophy"></i><span>Prestasi</span></a>
                            </li>
                            <li>
                                <a href="kegiatan-mhs.php"><i class="fa fa-check-square-o"></i><span>Kegiatan</span></a>
                            </li>
                            <li>
                                <a href="pelatihan-mhs.php"><i class="fa fa-mortar-board"></i><span>Pelatihan</span></a>
                            </li>
                            <li>
                                <a href="seminar-mhs.php"><i class="fa fa-certificate"></i><span>Seminar</span></a>
                            </li>
                            <li>
                                <a href="sdl-mhs.php"><i class="fa fa-exclamation-circle"></i><span>Lain - lain</span></a>
                            </li>
                            <li>
                                <a href="rekap-sertifikat.php"><i class="fa fa-sticky-note-o"></i><span>Rekap Sertifikat</span></a>
                            </li>
                            <li>
                                <a href="logout.php" onclick="return logout()"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Prestasi</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><span>Aplikasi Data Dokumen Mahasiswa D3 Sistem Informasi</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nama_mhs']; ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="beranda.php">Profile</a>
                                <a class="dropdown-item" href="logout.php" onclick="return logout()">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Primary table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="halaman-tambah-prestasi.php" method="POST" name="input" novalidate="" ENCTYPE="multipart/form-data">
                                    <h4 class="header-title">Edit Prestasi</h4>
                                    <input type="hidden" name="id_sertifikat" value="">
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <input type="text" class="form-control col-4" id="" name="asal" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Asal</label>
                                            <input type="text" class="form-control col-4" id="" name="asal" value="" required="" placeholder="Masukan Asal Sertifikat">
                                        </div>
                                         <div class="form-group">
                                            <label for="">Tanggal Diperoleh</label>
                                            <input type="date" class="form-control col-4" id="" name="tgl_peroleh" value="" required="" placeholder="Masukan Tanggal Diperoleh">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <input type="text" class="form-control col-4" id="" name="keterangan" value="" required="" placeholder="Masukan Keterangan Sertifikat">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input value="" name="gambar" class="form-control col-4" type="file"  placeholder="" id="validationCustom05">
                                        </div>
                                        <input type="submit" name="edit-prestasi" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>© Copyright 2019. Fajar Nur Hidayat.</p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
<?php } ?>
</body>
</html>
<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
    $error = $_FILES['gambar']['error']; // Menyimpan jumlah error ke variabel $error
 
    // Validasi error
    if($error == 0){
        $ukuran_file = $_FILES['gambar']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
 
        // Validasi ukuran file
        if($ukuran_file <= 1000000){
            $nama_file = $_FILES['gambar']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
 
            // Validasi format
            if( ($format == "jpg") or ($format == "png") ){
                $file_asal = $_FILES['gambar']['tmp_name'];
                $file_tujuan = "assets/images/sertifikat/prestasi/";
                $upload = move_uploaded_file($file_asal, $file_tujuan); // Proses upload. Menghasilkan nilai true jika upload berhasil
 
                // Validasi upload (hasil true jika upload berhasil)
                if($upload == true){
                    echo "Upload berhasil";
                }else{ // else upload gagal
                    echo "Upload gagal";
                }
 
            }else{ // else validasi format
                echo "Format harus jpg atau png.";
            }
 
        }else{ // else validasi ukuran file
            echo "Ukuran file kamu ".$ukuran_file.", file tidak boleh lebih dari 1000000 (1MB)";
        }
 
    }else{ // else validasi error
        echo 'Ada '.$error.' error. Gagal upload.';
    }
    
}

$id_mhs   = $_POST['id_mhs'];
$keterangan   = $_POST['keterangan'];
$tgl_peroleh  = $_POST['tgl_peroleh'];
$kategori_sertifikat  = $_POST['kategori_sertifikat'];
$gambar = $nama_file;
$asal  = $_POST['asal'];

mysql_query("INSERT INTO sertifikat(id_mhs,keterangan,tgl_peroleh,kategori_sertifikat,gambar,asal)
VALUE('$id_mhs','$keterangan','$tgl_peroleh','$kategori_sertifikat','$gambar','$asal')")or die(mysql_error());
?>