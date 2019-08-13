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
        <?php if ($_SESSION['jabatan']=='Tata Usaha') { ?>
        <li class="active">
            <a href=""><i class="fa fa-trophy"></i><span>Data Mahasiswa</span>
                <?php include 'koneksi.php';
                    $query3=mysql_query("
                        SELECT (SELECT COUNT(status_pdk) FROM pendidikan WHERE status_pdk='Pengajuan')+(SELECT COUNT(status_kependudukan) FROM kependudukan WHERE status_kependudukan ='Pengajuan')+(SELECT COUNT(status_keluarga) FROM keluarga WHERE status_keluarga ='Pengajuan') AS dptotal");
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
            <ul class="collapse">
                <li class="active">
                    <a href="pengajuan-data-pribadi.php"><i class="fa fa-hourglass-2"></i><span>Data Pribadi</span>
                    <?php include 'koneksi.php';
                        $query3=mysql_query("
                            SELECT (SELECT COUNT(status_pdk) FROM pendidikan WHERE status_pdk='Pengajuan')+(SELECT COUNT(status_kependudukan) FROM kependudukan WHERE status_kependudukan ='Pengajuan')+(SELECT COUNT(status_keluarga) FROM keluarga WHERE status_keluarga ='Pengajuan') AS dptotal");
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
                <li>
                    <a href="../admin/daftar-mhs.php"><i class="fa fa-user"></i><span>Profil Mahasiswa</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-sticky-note-o"></i>
                <span>Sertifikat
                </span>
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
            <ul class="collapse">
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
                <li>
                    <a href="#"><i class="fa fa-sticky-note-o"></i><span>Rekap Sertifikat</span></a>
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
        <?php } ?>
        <li>
            <a href="logout.php" onclick="return logout()"><i class="fa fa-sign-out"></i><span>Logout</span></a>
        </li>
    </ul>
</nav>