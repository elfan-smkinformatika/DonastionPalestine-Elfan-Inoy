<?php 
    session_start(); 
    if (isset($_SESSION['username'])) {
        header("Location: pages/login_admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Selamat datang </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    



    <script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>