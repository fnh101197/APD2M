<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Pengajuan Sertifikat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
                            <li class="active">
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
                                    <li class="active">
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
                            <h4 class="page-title pull-left">Data Pengajuan Sertifikat</h4>
                            <ul class="breadcrumbs pull-left">
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
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Informasi Status Sertifikat</h4>
                                <table width="30%">
                                    <?php include 'koneksi.php';
                                        $query=mysql_query("
                                            SELECT 
                                                SUM(status_sertifikat='Pengajuan') AS Pengajuan,
                                                SUM(status_sertifikat='Tidak Valid') AS TidakValid
                                            FROM 
                                                sertifikat");
                                        $var=mysql_fetch_array($query)
                                    ?>
                                    <tr>
                                        <td><strong>Pengajuan : <?php echo $var['Pengajuan']; ?> Sertifikat</strong></td>
                                        <td><strong>Tidak Valid : <?php echo $var['TidakValid']; ?> Sertifikat</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Primary table start -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Data Pengajuan Sertifikat</h4>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center" width="100%">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Pemilik</th>
                                                <th>Kategori</th>
                                                <th>Keterangan</th>
                                                <th>Gambar</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include 'koneksi.php';
                                                $query=mysql_query("
                                                    SELECT 
                                                        *
                                                    FROM 
                                                        sertifikat s LEFT JOIN mahasiswa m ON s.id_mhs=m.id_mhs
                                                    WHERE
                                                        status_sertifikat='Pengajuan'
                                                    OR
                                                        status_sertifikat='Tidak Valid'
                                                    ORDER BY s.status_sertifikat");
                                                $no=0;
                                                while ($var=mysql_fetch_array($query)) {
                                                $no++;
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td align="left"><?php echo $var['nama_mhs']; ?></td>
                                                <td align="left"><?php echo $var['kategori_sertifikat']; ?></td>
                                                <td align="left"><?php echo $var['keterangan']; ?></td>
                                                <td>
                                                    <a href="lihat-sertifikat.php?id_sertifikat=<?php echo $var['id_sertifikat']; ?>" target="_blank"><i type="" name="" class="fa fa-image"> Gambar</i></a>
                                                </td>
                                                <?php
                                                if ($var['status_sertifikat']=='Pengajuan') {?>
                                                <td>
                                                    <a href="terima-sertifikat.php?id_sertifikat=<?php echo $var['id_sertifikat']; ?>" class="btn-success">
                                                        &nbsp;Aprove&nbsp;
                                                    </a>&nbsp;
                                                    <a href="tolak-sertifikat.php?id_sertifikat=<?php echo $var['id_sertifikat']; ?>" class="btn-danger">
                                                        &nbsp;Ignore&nbsp;
                                                    </a>
                                                </td>
                                                <?}else{?>
                                                    <td>
                                                        <a href="#" class="btn-danger" onclick="return false;">
                                                            &nbsp;Tidak Valid&nbsp;
                                                        </a>
                                                    </td>
                                                <?}?>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Primary table end -->
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
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    var table = $('#dataTable2').DataTable( {
    'destroy': true,
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true,
    'responsive':true,
        dom: "<'row'<'col-sm-2'l><'col-sm-6'B><'col-sm-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            { extend: 'excel', className: 'btn btn-primary btn-xs mb-3' },
            { 
                extend: 'print', 
                className: 'btn btn-primary btn-xs mb-3',
                title : '',
                messageTop: '<center><img src="<?php echo '../assets/images/header.jpg'; ?>"><br><br><h1>Pengajuan Sertifikat</h1></center><br>'         
                         }
        ]
    } );
    table.draw();
} );
    </script>
<?php } ?>
</body>

</html>
