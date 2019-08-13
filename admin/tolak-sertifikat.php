<?php ob_start();
include "koneksi.php";

$valid = "Tidak Valid";
$query=mysql_query("update sertifikat set status_sertifikat='$valid' where id_sertifikat='$_GET[id_sertifikat]'");
?><script language="JavaScript">
 alert('Sertifikat Berhasil Ditolak');
document.location='pengajuan-sertifikat.php'</script>