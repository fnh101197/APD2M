<!doctype html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pelatihan</title>
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
                    <a href="beranda.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
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
                            <li>
                                <a href="prestasi-mhs.php"><i class="fa fa-trophy"></i><span>Prestasi</span></a>
                            </li>
                            <li>
                                <a href="kegiatan-mhs.php"><i class="fa fa-check-square-o"></i><span>Kegiatan</span></a>
                            </li>
                            <li class="active">
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
                            <h4 class="page-title pull-left">Pelatihan</h4>
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
                <div class="row">
                    <!-- Primary table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4 class="header-title">Data Pelatihan</h4>&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-primary btn-xs mb-3" data-toggle="modal" data-target=".bd-example-modal-lg" type="button"><i class="fa fa-user-plus"> Tambah Pelatihan</i></button>&nbsp;&nbsp;&nbsp;
                                    <?php $id_mhs=$_SESSION['id_mhs']; ?>
                                    <!-- Large modal start -->
                                    <div class="modal fade bd-example-modal-lg">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Pelatihan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <!-- Server side start -->
                                                    <div class="card-body">
                                                        <form class="needs-validation" novalidate="" method="POST" action="tambah-pelatihan.php" name="input" enctype="multipart/form-data">
                                                            <?php $id_mhs=$_SESSION['id_mhs']; ?>
                                                            <input type="hidden" name="id_mhs" value="<?php echo $id_mhs; ?>">
                                                            <div class="form-row">
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="validationCustom05">Asal</label>
                                                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Asal" name="asal" required="">
                                                                   <div class="invalid-feedback">
                                                                        Masukan Asal Sertifikat
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="validationCustom05">Tanggal Diperoleh</label>
                                                                    <input type="date" class="form-control" id="validationCustom05" placeholder="Zip" name="tgl_peroleh" value="<?php echo date("Y-m-d");?>" required="">
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="validationCustom05">Kategori</label>
                                                                    <select name="kategori_sertifikat" type="text" class="form-control" id="validationCustom05" required="" readonly>
                                                                    <option>Pelatihan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-8 mb-3">
                                                                    <label for="validationCustom05">Keterangan Pelatihan</label>
                                                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Keterangan Pelatihan Yang Diperoleh" name="keterangan" required="">
                                                                   <div class="invalid-feedback">
                                                                        Masukan Keterangan Pelatihan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="form-row">
                                                            <div class="col-md-4 mb-3">
                                                                <label class="validationCustom05">Gambar Depan(Max 1 MB)</label>
                                                                <div class="controls">
                                                                  <input name="gambar" class="form-control" type="file"  placeholder="" id="validationCustom05" required="">
                                                                    <div class="invalid-feedback">
                                                                        Pilih File Gambar(Max. 1MB)
                                                                    </div>
                                                                    <div class="valid-feedback">
                                                                        Max. 1MB
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label class="validationCustom05">Gambar Belakang(Max 1 MB)</label>
                                                                <div class="controls">
                                                                  <input name="gambar2" class="form-control" type="file"  placeholder="" id="validationCustom05">
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <!-- Server side end -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <input class="btn btn-primary" type="submit" value="Tambah" name="input">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Large modal modal end -->
                                </div>
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable2" class="text-center" width="100%">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Asal</th>
                                                <th>Tanggal Peroleh</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Dokumen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'koneksi.php';
                                            include "tgl-indo.php";
                                            $id_mhs=$_SESSION['id_mhs'];
                                            $query=mysql_query("
                                                SELECT
                                                    s.id_sertifikat, 
                                                    s.asal,
                                                    s.tgl_peroleh,
                                                    s.keterangan,
                                                    s.gambar,
                                                    s.status_sertifikat
                                                FROM 
                                                    sertifikat s,
                                                    mahasiswa m
                                                WHERE
                                                    s.kategori_sertifikat='Pelatihan'
                                                AND
                                                    m.id_mhs=s.id_mhs
                                                AND
                                                    '$id_mhs'=s.id_mhs
                                                ORDER BY
                                                    s.id_sertifikat DESC");
                                            $no=0;
                                            while ($var=mysql_fetch_array($query)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td align="left"><?php echo $no; ?></td>
                                                <td align="left"><?php echo $var['asal']; ?></td>
                                                <td align="left"><?php echo TanggalIndo($var['tgl_peroleh']); ?></td>
                                                <td align="left"><?php echo $var['keterangan']; ?></td>
                                                <td><?php echo $var['status_sertifikat']; ?></td>
                                                <td>
                                                    <a href="lihat-sertifikat.php?id_sertifikat=<?php echo $var['id_sertifikat']; ?>" target="_blank"><i class="fa fa-image" title="Hapus"></i> Lihat</a>
                                                </td>
                                                <td><a href="hapus-pelatihan.php?id_sertifikat=<?php echo $var['id_sertifikat'] ?>" onclick="javascript: return confirm('Anda Yakin Hapus?');"><i class="ti-trash" title="Cetak"></i></a>
                                                    <a href="halaman-edit-pelatihan.php?id_sertifikat=<?php echo $var['id_sertifikat'] ?>"><i class="fa fa-edit" title="Edit"></i></a>
                                                </td>
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
    <?php
    include 'koneksi.php';
    $id_mhs=$_SESSION['id_mhs'];
    $header='../assets/images/header.jpg';
    $query = mysql_query("SELECT * FROM mahasiswa WHERE id_mhs='$id_mhs'");
    $var=mysql_fetch_array($query)
    ?>
    $(document).ready(function() {
    $('#dataTable2').DataTable( {
    'destroy': true,
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true,
    'responsive':true,
    'filter':true,
        dom:"<'row'<'col-sm-2'l><'col-sm-6'B><'col-sm-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: 'print',
                text: '<i class="fa fa-print"> Cetak</i>',
                title: '',
                className: 'btn btn-primary btn-xs mb-3',
                messageTop: '<center><img src="<?php echo 'assets/images/header.jpg'; ?>"><br><br><h1>Rekap Pelatihan</h1></center><br><h3><table><tr><td>Nama</td><td> : <?php echo $var['nama_mhs']; ?></td></tr><tr><td>NPM</td><td> : <?php echo $var['npm']; ?></td></tr><tr><td>Jurusan</td><td> : <?php echo $var['jurusan']; ?></td></tr></table></h3><br>' 
            },
            {
                extend: 'excel',
                text: 'Excel',
                title: 'Pelatihan <?php echo $_SESSION['nama_mhs']; ?>',
                messageTop: 'NPM <?php echo ' : '.$_SESSION['npm']; ?>',
                className: 'btn btn-primary btn-xs mb-3'
            }
        ]
    } );
    table.draw();
} );
    </script>
<?php } ?>
</body>

</html>
