<?php ob_start();
include "koneksi.php";

$query=mysql_query("update kependudukan set status_kependudukan='Tidak Valid' where id_kependudukan='$_GET[id_kependudukan]'");
?><script language="JavaScript">
 alert('Data Pribadi Kependudukan Berhasil Divalidasi');
document.location='pengajuan-data-pribadi.php'</script>