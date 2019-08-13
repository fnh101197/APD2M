<!doctype html><?php session_start(); ?><?php error_reporting(0) // tambahkan untuk menghilangkan notice... hehe ?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Profil Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <!-- <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" /> -->
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/stylesme.css">
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
                    <a href="index.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="../admin/beranda.php"><i class="fa fa-home"></i><span>Home</span></a>
                            </li>
                            <li>
                                <a href="../admin/profil.php"><i class="fa fa-user"></i><span>Profil</span></a>
                            </li>
                            <?php if ($_SESSION['jabatan']=='Tata Usaha') { ?>
                            <li>
                                <a href="#" aria-expanded="true"><i class="fa fa-database"></i> <span>Data Akun</span></a>
                                <ul class="collapse">
                                    <li>
                                        <a href="../admin/data-user.php"><i class="fa fa-user"></i><span>Akun Admin</span></a>
                                    </li>
                                    <li>
                                        <a href="../admin/data-user-mhs.php"><i class="fa fa-trophy"></i><span>Akun Mahasiswa</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="../admin/data-kategori.php"><i class="fa fa-sticky-note-o"></i><span>Kategori Sertifikat</span></a>
                            </li>
                            <?php } ?>
                            <li class="active">
                                <a href=""><i class="fa fa-trophy"></i><span>Data Mahasiswa</span>
                                    <?php if ($_SESSION['jabatan']=='Tata Usaha') { ?>
                                    <?php include 'koneksi.php';
                                        $query3=mysql_query("
                                            SELECT (SELECT COUNT(status_pdk) FROM pendidikan WHERE status_pdk='Pengajuan')+(SELECT COUNT(status_kependudukan) FROM kependudukan WHERE status_kependudukan ='Pengajuan')+(SELECT COUNT(status_keluarga) FROM keluarga WHERE status_keluarga ='Pengajuan')+(SELECT COUNT(*) FROM mahasiswa WHERE status_foto ='Pengajuan') AS dptotal");
                                        $var3=mysql_fetch_array($query3);
                                        $dptotal = $var3['dptotal'];
                                    ?>
                                    <?php
                                        if ($var3['dptotal']>'0') {
                                           echo '<span class="btn-danger">'."&nbsp;".$dptotal."&nbsp;".'</span>'; 
                                        }else{
                                            
                                        }
                                    ?>
                                    <?php } ?>
                                </a>
                                <ul class="collapse">
                                    <?php if ($_SESSION['jabatan']=='Tata Usaha') { ?>
                                    <li>
                                        <a href="pengajuan-data-pribadi.php"><i class="fa fa-hourglass-2"></i><span>Data Pribadi</span>
                                        <?php include 'koneksi.php';
                                            $query3=mysql_query("
                                                SELECT (SELECT COUNT(status_pdk) FROM pendidikan WHERE status_pdk='Pengajuan')+(SELECT COUNT(status_kependudukan) FROM kependudukan WHERE status_kependudukan ='Pengajuan')+(SELECT COUNT(status_keluarga) FROM keluarga WHERE status_keluarga ='Pengajuan')+(SELECT COUNT(*) FROM mahasiswa WHERE status_foto ='Pengajuan') AS dptotal");
                                            $var3=mysql_fetch_array($query3);
                                            $dptotal = $var3['dptotal'];
                                        ?>
                                        <?php
                                            if ($var3['dptotal']>'0') {
                                               echo '<span class="btn-danger">'."&nbsp;".$dptotal."&nbsp;".'</span>'; 
                                            }else{
                                                
                                            }
                                        ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="active">
                                        <a href="../admin/daftar-mhs.php"><i class="fa fa-user"></i><span>Profil Mahasiswa</span></a>
                                    </li>
                                    <li>
                                        <a href="data-penduduk.php"><i class="fa fa-user"></i><span>Data Penduduk</span></a>
                                    </li>
                                    <li>
                                        <a href="data-pendidikan.php"><i class="fa fa-user"></i><span>Data Pendidikan</span></a>
                                    </li>
                                    <li>
                                        <a href="data-keluarga.php"><i class="fa fa-user"></i><span>Data Keluarga</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sticky-note-o"></i>
                                    <span>Sertifikat
                                    </span>
                                    <?php if ($_SESSION['jabatan']=='Tata Usaha') { ?>
                                        <?php include 'koneksi.php';
                                            $query2=mysql_query("
                                                SELECT COUNT(status_sertifikat) AS sstotal FROM sertifikat WHERE status_sertifikat='Pengajuan' ");
                                            $var2=mysql_fetch_array($query2);
                                            $sstotal = $var2['sstotal'];
                                        ?>
                                        <?php
                                            if ($var2['sstotal']>'0') {
                                               echo '<span class="btn-danger">'."&nbsp;".$sstotal."&nbsp;".'</span>'; 
                                            }else{
                                                
                                            }
                                        ?>
                                        <?php } ?>
                                </a>
                                <ul class="collapse">
                                    <?php if ($_SESSION['jabatan']=='Tata Usaha') { ?>
                                    <li>
                                        <a href="
                                        pengajuan-sertifikat.php"><i class="fa fa-hourglass-2"></i><span>Pengajuan</span>
                                        <?php include 'koneksi.php';
                                            $query2=mysql_query("
                                                SELECT COUNT(status_sertifikat) AS sstotal FROM sertifikat WHERE status_sertifikat='Pengajuan' ");
                                            $var2=mysql_fetch_array($query2);
                                            $sstotal = $var2['sstotal'];
                                        ?>
                                        <?php
                                            if ($var2['sstotal']>'0') {
                                               echo '<span class="btn-danger">'."&nbsp;".$sstotal."&nbsp;".'</span>'; 
                                            }else{
                                                
                                            }
                                        ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="rekap-sertifikat.php"><i class="fa fa-sticky-note-o"></i><span>Rekap Sertifikat</span></a>
                                    </li>
                                    <li>
                                        <a href="../admin/prestasi-admin.php"><i class="fa fa-trophy"></i><span>Prestasi</span></a>
                                    </li>
                                    <li>
                                        <a href="../admin/kegiatan-admin.php"><i class="fa fa-check-square-o"></i><span>Kegiatan</span></a>
                                    </li>
                                    <li>
                                        <a href="../admin/pelatihan-admin.php"><i class="fa fa-mortar-board"></i><span>Pelatihan</span></a>
                                    </li>
                                    <li>
                                        <a href="../admin/seminar-admin.php"><i class="fa fa-certificate"></i><span>Seminar</span></a>
                                    </li>
                                    <li>
                                        <a href="../admin/sdl-admin.php"><i class="fa fa-exclamation-circle"></i><span>Lain-Lain</span></a>
                                    </li>
                                </ul>
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
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Aplikasi Data Dokumen Mahasiswa D3 Sistem Informasi</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nama_adm']; ?><i class="fa fa-angle-down"></i></h4>
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
                <!-- colom start -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- heading area start -->
                                        <?php 
                                            include 'koneksi.php';
                                            $id_mhs=$_GET['id_mhs'];
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
                                        <input type="hidden" name="" value="<?php echo $id_mhs=$_GET['id_mhs']; ?>">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <div class="header-title">
                                                    Biodata
                                                </div>
                                            </div>
                                        </div>
                                        <!-- heading area end-->
                                        <center>
                                            <img src="../assets/images/foto-profil/<?php if ($var['file_foto']==null) {
                                                echo "noimg.jpg";
                                            }else{
                                                echo $var['file_foto'];
                                            } ?>"
                                            " width="200px" height="300" border="10px">
                                        </center>
                                        <br>
                                        <a href="../assets/images/foto-profil/<?php if ($var['file_foto']==null) {
                                                echo "noimg.jpg";
                                            }else{
                                                echo $var['file_foto'];
                                            } ?>"
                                            " width="200px" height="300" border="10px" class="btn btn-primary btn-lg btn-block" target="_BLANK" download>
                                        <i class="fa fa-download"> Download Foto</i>    
                                        </a>
                                        <a href="cetak-biodata-mhs.php?id_mhs=<?php echo $var['id_mhs']; ?>" class="btn btn-success btn-lg btn-block" target="_BLANK">
                                        <i class="fa fa-download"> Download Biodata</i>    
                                        </a>
                                        <br>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Nama</strong>
                                                    </div>
                                                    <div class="">
                                                        : 
                                                        <?php
                                                            echo $var['nama_mhs'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Jenis Kelamin</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['jk']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>NPM</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['npm']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Program Studi</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['jurusan']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Fakultas</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['fakultas']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Angkatan</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['angkatan']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- heading area end -->
                            <!-- Customizing Headings area start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- heading area start -->
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <div class="header-title">
                                                    Keluarga
                                                </div>
                                            </div>
                                            <?php 
                                                include 'koneksi.php';
                                                $id_mhs=$_GET['id_mhs'];
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
                                        </div>
                                        <!-- heading area end-->
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Status</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['status_kawin']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Jumlah Saudara</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['jml_sdr']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Nama Ayah</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['nm_ayah']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Nama Ibu</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['nm_ibu']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="../assets/images/dokumen/kk/<?php if ($var['file_kk']==null) {
                                                                echo "400-image-not-found.jpg";
                                                            }else{
                                                                echo $var['file_kk'];
                                                            } ?>" target="_BLANK">
                                                            <button class="btn btn-danger btn-xs mb-3">
                                                                <i class="fa fa-image">
                                                                    Lihat Kartu Keluarga
                                                                </i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Customizing Headings area end -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <!-- heading class area start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- heading area start -->
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <div class="header-title">
                                                    Pendidikan
                                                </div>
                                            </div>
                                            <?php 
                                                include 'koneksi.php';
                                                $id_mhs=$_GET['id_mhs'];
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
                                            <?php 
                                                include 'koneksi.php';
                                                $id_mhs=$_GET['id_mhs'];
                                                $query1=mysql_query("
                                                    SELECT
                                                        id_mhs
                                                    FROM 
                                                        pendidikan
                                                    WHERE
                                                        id_mhs='$id_mhs'
                                                        ");
                                                $var1=mysql_fetch_array($query1)
                                            ?>
                                        </div>
                                        <!-- heading area end-->
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Tahun Lulus</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php
                                                            echo $var['thn_lulus'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Asal Sekolah</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['asal_sekolah']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Jurusan</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['jurusan_sekolah']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <strong>Tahun Masuk</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php echo $var['thn_angkatan']; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="<?php if ($var['file_ijazah']==null) {
                                                                echo "../assets/images/dokumen/ijazah/400-image-not-found.jpg";
                                                            }else{
                                                                echo "cetak-ijazah.php?id_mhs=$id_mhs";
                                                            } ?>" target="_BLANK">
                                                            <button class="btn btn-danger btn-xs mb-3">
                                                                <i class="fa fa-image">
                                                                    Lihat Ijazah
                                                                </i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- heading class area end -->
                            <!-- Inline Text Elements area start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- heading area start -->
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <div class="header-title">
                                                    Kependudukan
                                                </div>
                                            </div>
                                            <?php 
                                                include 'koneksi.php';
                                                include 'tgl-indo.php';
                                                $id_mhs=$_GET['id_mhs'];
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
                                        </div>
                                        <!-- heading area end-->
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>NIK</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['nik'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Agama</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['agama'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Kewarganegaraan</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['warga_negara'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Tempat Lahir</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['tmp_lahir'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Tanggal Lahir</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo TanggalIndo($var['tgl_lahir']);
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Golongan Darah</strong>
                                                    </div>
                                                    <div class="">
                                                        :   <?php  
                                                            echo $var['gol_darah'];
                                                        ?>                                                
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Alamat</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['alamat'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Kelurahan/Desa</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['kelurahan'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Kecamatan</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['kecamatan'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Kabupaten/Kota</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['kabupaten'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Provinsi</strong>
                                                    </div>
                                                    <div class="">
                                                        : <?php  
                                                            echo $var['provinsi'];
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="../assets/images/dokumen/ktp/<?php if ($var['file_ktp']==null) {
                                                                echo "400-image-not-found.jpg";
                                                            }else{
                                                                echo $var['file_ktp'];
                                                            } ?>" target="_BLANK">
                                                            <button class="btn btn-danger btn-xs mb-3">
                                                                <i class="fa fa-image">
                                                                    Lihat Kartu Tanda Penduduk
                                                                </i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Inline Text Elements area end -->
                        </div>
                    </div>
                </div>
            </div>
                <!-- colom end -->
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
<!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- start amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/animate/animate.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <?php } ?>
</body>
</html>