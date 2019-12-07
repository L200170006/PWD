<?php
    session_start();
    session_destroy();
?>
<script language="Javascript">
    alert("Anda telah logout");
    document.location="percobaan3.php";
</script>