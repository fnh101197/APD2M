<?php ob_start();
include "koneksi.php";

$valid = "Valid";
$query=mysql_query("update keluarga set status_keluarga='$valid' where id_kk='$_GET[id_kk]'");
?><script language="JavaScript">
 alert('Data Pribadi Keluarga Berhasil Divalidasi');
document.location='pengajuan-data-pribadi.php'</script>