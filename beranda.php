<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Beranda</title>
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
                    <a href="beranda.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="beranda.php"><i class="fa fa-home"></i><span>Home</span></a>
                            </li>
                            <li>
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
                            <h4 class="page-title pull-left">Home</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><span>Aplikasi Data Dokumen Mahasiswa D3 Sistem Informasi</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nama_mhs']; ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="profil.php">Profile</a>
                                <a class="dropdown-item" href="logout.php" onclick="return logout()">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- accroding start -->
                <div class="row">
                    <!-- pie chart start -->
                <div class="row">
                    <?php  
                    $connect = mysqli_connect("localhost", "root", "", "sidama");  
                    $query = "SELECT kategori_sertifikat, count(*) as number FROM sertifikat WHERE status_sertifikat='Valid' GROUP BY kategori_sertifikat";  
                    $result = mysqli_query($connect, $query);  
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {var data = google.visualization.arrayToDataTable([  
                                          ['kategori_sertifikat', 'Number'],  
                                          <?php  
                                          while($row = mysqli_fetch_array($result))  
                                          {  
                                               echo "['".$row["kategori_sertifikat"]."', ".$row["number"]."],";  
                                          }  
                                          ?>  
                                     ]);  
                                    var options = {
                                    legend: 'none',
                                    pieSliceText: 'label',
                                    pieStartAngle: 100,
                                     };  
                                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                                chart.draw(data, options);  
                      }
                    </script>
                    <div class="col-lg-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <?php $file='panduan.pdf';
                                echo "<h4>Lihat Panduan Pengguna <a href='file.php?filename=$file' target='pdf-frame'>Disni</a> </h4>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="iv-left col-6">
                                        <div class="header-title">
                                            Jumlah Sertifikat Mahasiswa
                                        </div>
                                    </div>
                                </div>
                                <div id="piechart2" style="width: 550px; height: 440px;"></div>
                            </div>
                        </div>
                    </div>
                    <?php  
                    $connect = mysqli_connect("localhost", "root", "", "sidama"); 
                    $query = "SELECT jk, count(*) as number FROM mahasiswa GROUP BY jk";  
                    $result = mysqli_query($connect, $query);  
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
                    <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {var data = google.visualization.arrayToDataTable([  
                                        ['jk', 'Number'],  
                                          <?php  
                                          while($row = mysqli_fetch_array($result))  
                                          {  
                                               echo "['".$row["jk"]."', ".$row["number"]."],";  
                                          }  
                                          ?>  
                                     ]);  
                                var options = {
                                    is3D: true,
                                     };  
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                                chart.draw(data, options);  
                      }
                    </script>
                    <div class="col-lg-6 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Jenis Kelamin</h4>
                            <div id="piechart" style="width: 550px; height: 440px;"></div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- pie chart end -->
                    <!-- colom 1 start -->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                    include 'koneksi.php';
                                    $id_mhs=$_SESSION['id_mhs'];
                                    $query2=mysql_query("
                                        SELECT 
                                            s.id_mhs,
                                            m.id_mhs,
                                            m.nama_mhs,
                                        COUNT(s.id_mhs)
                                        AS
                                            jumlah 
                                        FROM 
                                            sertifikat s,
                                            mahasiswa m
                                        WHERE
                                            s.kategori_sertifikat='Prestasi'
                                        AND
                                            m.id_mhs=s.id_mhs
                                        GROUP BY
                                            s.id_mhs
                                        ORDER BY
                                            jumlah DESC
                                        LIMIT 1
                                    ");
                                    while ($var2=mysql_fetch_array($query2)) {
                                ?>
                                <center>
                                    <h4 class="header-title">Mahasiswa Prestasi Tebanyak</h4>
                                    <h5><?php echo $var2['nama_mhs']; ?></h5>
                                    <br>
                                    <h1 class="text-success" size="50"><?php echo $var2['jumlah']; ?></h1>
                                    <br>
                                    <h5>Prestasi</h5>
                                </center>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                    <!-- colom 1 end -->
                    <!-- colom 2 start -->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                    include 'koneksi.php';
                                    $id_mhs=$_SESSION['id_mhs'];
                                    $query=mysql_query("
                                        SELECT 
                                            s.id_mhs,
                                            m.id_mhs,
                                            m.nama_mhs,
                                        COUNT(s.id_mhs)
                                        AS
                                            jumlah 
                                        FROM 
                                            sertifikat s,
                                            mahasiswa m
                                        WHERE
                                            s.kategori_sertifikat='Kegiatan'
                                        AND
                                            m.id_mhs=s.id_mhs
                                        GROUP BY
                                            s.id_mhs
                                        ORDER BY
                                            jumlah DESC
                                        LIMIT 1
                                    ");
                                    while ($var=mysql_fetch_array($query)) {
                                ?>
                                <center>
                                    <h4 class="header-title">Mahasiswa Kegiatan Terbanyak</h4>
                                    <h5><?php echo $var['nama_mhs']; ?></h5>
                                    <br>
                                    <h1 class="text-success" size="50"><?php echo $var['jumlah']; ?></h1>
                                    <br>
                                    <h5>Kegiatan Kepanitiaan</h5>
                                </center>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- colom 2 end -->
                    <!-- colom 3 start -->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                 <?php 
                                    include 'koneksi.php';
                                    $query1=mysql_query("
                                        SELECT 
                                            s.id_mhs,
                                            m.id_mhs,
                                            m.nama_mhs,
                                        COUNT(s.id_mhs)
                                        AS
                                            jumlah 
                                        FROM 
                                            sertifikat s,
                                            mahasiswa m
                                        WHERE
                                            s.kategori_sertifikat='Pelatihan'
                                        AND
                                            m.id_mhs=s.id_mhs
                                        GROUP BY
                                            s.id_mhs
                                        ORDER BY
                                            jumlah DESC
                                        LIMIT 1
                                    ");
                                    while ($var1=mysql_fetch_array($query1)) {
                                ?>
                                <center>
                                    <h4 class="header-title">Mahasiswa Pelatihan Terbanyak</h4>
                                    <h5><?php echo $var1['nama_mhs']; ?></h5>
                                    <br>
                                    <h1 class="text-success" size="50"><?php echo $var1['jumlah']; ?></h1>
                                    <br>
                                    <h5>Pelatihan Yang diikuti</h5>
                                </center>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- colom 3 end -->
                    <!-- colom 4 start -->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                 <?php 
                                    include 'koneksi.php';
                                    $query1=mysql_query("
                                        SELECT 
                                            s.id_mhs,
                                            m.id_mhs,
                                            m.nama_mhs,
                                        COUNT(s.id_mhs)
                                        AS
                                            jumlah 
                                        FROM 
                                            sertifikat s,
                                            mahasiswa m
                                        WHERE
                                            s.kategori_sertifikat='Seminar'
                                        AND
                                            m.id_mhs=s.id_mhs
                                        GROUP BY
                                            s.id_mhs
                                        ORDER BY
                                            jumlah DESC
                                        LIMIT 1
                                    ");
                                    while ($var1=mysql_fetch_array($query1)) {
                                ?>
                                <center>
                                    <h4 class="header-title">Mahasiswa Seminar Terbanyak</h4>
                                    <h5><?php echo $var1['nama_mhs']; ?></h5>
                                    <br>
                                    <h1 class="text-success" size="50"><?php echo $var1['jumlah']; ?></h1>
                                    <br>
                                    <h5>Sebagai Peserta Seminar</h5>
                                </center>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- colom 4 end -->
                </div>
                <!-- accroding end -->
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
<script type="text/javascript">
  $(document).ready(function () {
    $("#panduan").on ("change", function () {
      var url = "assets/panduan.pdf" + this.value;;
      window.open(url, '_blank');
    })
  })
</script>
</body>

</html>
