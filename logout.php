<?php
session_start();
session_destroy();
echo '<script>alert("Sampean Berhasil logout");window.location="login.php"</script>';
?>