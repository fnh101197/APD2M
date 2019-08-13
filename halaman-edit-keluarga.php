<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Keluarga</title>
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
                                <a href="beranda.php"><i class="fa fa-home"></i><span>Home</span></a>
                            </li>
                            <li class="active">
                                <a href="profil.php"><i class="fa fa-user"></i><span>Profil</span></a>
                            </li>
                            <li>
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
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
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
                                            $id_mhs=$_SESSION['id_mhs'];
                                            $query=mysql_query("
                                                SELECT
                                                    *
                                                FROM 
                                                    mahasiswa
                                                WHERE
                                                    '$id_mhs'=id_mhs
                                                    ");
                                            while ($var=mysql_fetch_array($query)) {
                                        ?>
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <div class="header-title">
                                                    Edit Biodata
                                                </div>
                                            </div>
                                        </div>
                                        <!-- heading area end-->
                                        <center>
                                            <img src="assets/images/foto-profil/<?php if ($var['file_foto']==null) {
                                                echo "noimg.jpg";
                                            }else{
                                                echo $var['file_foto'];
                                            } ?>"
                                            " width="200px" height="300" border="10px">
                                        </center>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-lg btn-block">
                                            <i class="fa fa-download"> Download Foto</i>
                                        </button>
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
                                    <?php } ?>
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
                                        </div>
                                        <!-- heading area end-->
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
                                        <form class="needs-validation" novalidate="" method="POST" action="edit-keluarga.php" name="input" enctype="multipart/form-data">
                                        <input type="hidden" name="id_mhs" value="<?php echo $id_mhs;?>">
                                            <div class="form-group">
                                            <label for="">Status</label>
                                            <select type="text" class="form-control col-6" name="status_kawin">
                                                <option>
                                                    <?php  
                                                    echo $var['status_kawin'];
                                                    ?>
                                                </option>
                                                <option>
                                                    <?php  
                                                    if ($var['status_kawin']=='Belum Menikah') {
                                                        echo "Menikah";
                                                    }elseif ($var['status_kawin']=='Menikah') {
                                                        echo "Cerai";
                                                    }else{
                                                        echo "Belum Menikah";
                                                    }
                                                    ?>
                                                </option>
                                                <option>
                                                    <?php  
                                                    if ($var['status_kawin']=='Cerai') {
                                                        echo "Menikah";
                                                    }elseif ($var['status_kawin']=='Belum Menikah') {
                                                        echo "Cerai";
                                                    }else{
                                                        echo "Belum Menikah";
                                                    }
                                                    ?>
                                                </option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="">Jumlah Saudara Kandung</label>
                                            <input type="text" class="form-control col-6" id="" name="jml_sdr"  placeholder="Masukan Jumlah Saudara Kandung" required="" value="<?php echo $var['jml_sdr']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Ayah</label>
                                            <input type="text" class="form-control col-6" id="" name="nm_ayah"  placeholder="Masukan Nama Ayah" required="" value="<?php echo $var['nm_ayah']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Ibu</label>
                                            <input type="text" class="form-control col-6" id="" name="nm_ibu" placeholder="Masukan Nama Ibu" required="" value="<?php echo $var['nm_ibu']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">File Kartu Keluarga</label>
                                            <input  name="file_kk" class="form-control col-6" type="file" value="assets/images/dokumen/kk/<?php echo $var['file_kk']; ?>">
                                        </div>
                                        <div class="row">
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            <div>
                                                <input class="btn btn-primary" type="submit" value="Tambah" name="input">
                                            </div>
                                            &nbsp;&nbsp;
                                            <div>
                                                <a href="profil.php" onclick="javascript: return confirm('Anda Yakin Keluar?');">
                                                    <input type="submit" name="" class="btn btn-danger" value="Batal">
                                                </a>
                                            </div> 
                                        </div>
                                        </form>
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
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <div class="header-title">
                                                    <?php if ($var['status_pdk']=='Pengajuan') {
                                                        echo "Pendidikan (Pengajuan)";
                                                    }elseif ($var['status_pdk']=='Tidak Valid') {
                                                        echo "Pendidikan (Tidak Valid)";
                                                    }else{
                                                        echo "Pendidikan";
                                                    } ?>
                                                </div>
                                            </div>
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
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <div class="header-title">
                                                   <?php if ($var['status_kependudukan']=='Pengajuan') {
                                                        echo "Kependudukan (Pengajuan)";
                                                    }elseif ($var['status_kependudukan']=='Tidak Valid') {
                                                        echo "Kependudukan (Tidak Valid)";
                                                    }else{
                                                        echo "Kependudukan";
                                                    } ?>
                                                </div>
                                            </div>
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
                                                            echo $var['tgl_lahir'];
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
