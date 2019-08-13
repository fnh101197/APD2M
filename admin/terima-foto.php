<?php ob_start();
include "koneksi.php";

$valid = "Valid";
$query=mysql_query("update mahasiswa set status_Foto='$valid' where id_mhs='$_GET[id_mhs]'");
?><script language="JavaScript">
 alert('Foto Berhasil Divalidasi');
document.location='pengajuan-data-pribadi.php'</script>