<?php ob_start();
include "koneksi.php";

$valid = "Valid";
$query=mysql_query("update kependudukan set status_kependudukan='$valid' where id_kependudukan='$_GET[id_kependudukan]'");
?><script language="JavaScript">
 alert('Data Pribadi Kependudukan Berhasil Divalidasi');
document.location='pengajuan-data-pribadi.php'</script>