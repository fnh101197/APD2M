<?php
session_start();
unset($_SESSION);
session_destroy();
?>

<script language="JavaScript">
    document.location="index.php"
</script>