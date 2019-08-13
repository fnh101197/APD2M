<?php ob_start();
include "koneksi.php";

$valid = "Valid";
$query=mysql_query("update pendidikan set status_pdk='$valid' where no_pdk='$_GET[no_pdk]'");
?><script language="JavaScript">
 alert('Data Pribadi Pendidikan Berhasil Divalidasi');
document.location='pengajuan-data-pribadi.php'</script>