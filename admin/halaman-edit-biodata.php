<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Biodata</title>
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
                            <li class="active">
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
                            <li>
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
                                    <li>
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
                                            $id_adm=$_SESSION['id_adm'];
                                            $query=mysql_query("
                                                SELECT
                                                    *
                                                FROM 
                                                    admin
                                                WHERE
                                                    '$id_adm'=id_adm
                                                    ");
                                            $var=mysql_fetch_array($query)
                                        ?>
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <div class="header-title">
                                                    Edit Biodata
                                                </div>
                                            </div>
                                        </div>
                                        <!-- heading area end-->
                                        <form action="edit-biodata.php" method="POST" name="input" novalidate="" ENCTYPE="multipart/form-data">
                                        <input type="hidden" name="id_adm" value="<?php echo $id_adm;?>">
                                            <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" class="form-control col-6" name="nama_adm" value="<?php echo $var['nama_adm']; ?>" required="" readonly> 
                                        </div>
                                         <div class="form-group">
                                            <label for="">NIP</label>
                                            <input type="text" class="form-control col-6" id="" name="nik" value="<?php echo $var['nik']; ?>" placeholder="Masukan nik" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Program Studi</label>
                                            <input type="text" class="form-control col-6" id="" name="jabatan" value="<?php echo $var['jabatan']; ?>" placeholder="Masukan Nama Jabatan" required="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <input value="assets/images/sertifikat/kegiatan/<?php echo $var['file_foto']; ?>" name="file_foto" class="form-control col-6" type="file" required="">
                                        </div>
                                        <div class="row">
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            <div>
                                                <input type="submit" name="edit-biodata" class="btn btn-primary" value="Simpan">
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
