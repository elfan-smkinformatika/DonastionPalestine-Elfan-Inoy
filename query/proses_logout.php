<?php 
    session_start();
    session_destroy();
    header("Location: ../pages/login_admin.php");
?>               