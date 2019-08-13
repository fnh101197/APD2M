<?php ob_start();
include "koneksi.php";

$query=mysql_query("update pendidikan set status_pdk='Tidak Valid' where no_pdk='$_GET[no_pdk]'");
?><script language="JavaScript">
 alert('Data Pribadi Kependudukan Berhasil Divalidasi');
document.location='pengajuan-data-pribadi.php'</script>