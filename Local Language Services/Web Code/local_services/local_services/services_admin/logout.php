<?php
session_start();
unset($_SESSION['ADMIN']['ID']);
unset($_SESSION['ADMIN']['UN']);

echo '<script>window.location = "index.php"</script>';
?>