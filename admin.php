<?php
require_once "include/connection.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location: pages/login_admin.php");
}
// Mengambil data dari session
// $id = $_SESSION["id_admin"];
$username = $_SESSION["username"];
$name = $_SESSION["name"];
$jabatan = $_SESSION["jabatan"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Selamat datang </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style-admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/image/favicon-admin.png" type="image/x-icon">

    <style>
        .table tbody tr {
            cursor: default;
        }
    </style>
</head>

<body>
    <div id="container" class="d-flex">
        <div class="col-2 nav-side bg-dark d-flex flex-column">
            <div class="d-flex justify-content-center align-items-center flex-column mt-4">
                <!-- Profil Admin -->
                <div class="profil-admin d-flex align-items-center mb-4">
                    <!-- Ikon Profil -->
                    <div class="profile-icon text-light d-flex justify-content-center align-items-center me-3">
                        <?php
                        // Ambil huruf pertama dari username
                        $initial = strtoupper(substr($username, 0, 1));
                        echo $initial;
                        ?>
                    </div>
                    <!-- Info Profil -->
                    <div class="info-profile">
                        <h5 class="text-light"><?= $username ?></h5>
                        <h6 class="text-light"><?= $name ?></h6>
                    </div>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <ul class="nav-menus d-flex flex-column gap-3 mt-3">
                <li class="nav-item">
                    <a class="nav-link text-light d-flex align-items-center gap-2" href="?page=dashboard">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light d-flex align-items-center gap-2" href="?page=donasi">
                        <i class="fas fa-donate"></i> Donasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light d-flex align-items-center gap-2" href="?page=donatur">
                        <i class="fas fa-users"></i> Donatur
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light d-flex align-items-center gap-2" href="?page=metode-pembayaran">
                        <i class="fas fa-credit-card"></i> Metode Pembayaran
                    </a>
                </li>
            </ul>

            <!-- Footer Menu -->
            <div class="mt-auto mb-4">
                <ul class="nav-menus d-flex flex-column gap-3">
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex align-items-center gap-2" href="index.php">
                            <i class="bi bi-house-door-fill"></i> Kembali Ke Website
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex align-items-center gap-2" href="query/proses_logout.php">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-10 main-side bg-light">

            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'dashboard':
                        require_once 'pages/page_dashboard.php';
                        break;
                    case 'donasi':
                        require_once 'pages/page_donasi.php';
                        break;
                    case 'donatur':
                        require_once 'pages/page_donatur.php';
                        break;
                    case 'kampanye-donatur':
                        require_once 'pages/page_program-donatur.php';
                        break;
                    case 'metode-pembayaran':
                        require_once 'pages/page_metode-pembayaran.php';
                        break;
                    default:
                        require_once '404.php';
                        break;
                }
            } else {
                require_once 'pages/page_dashboard.php';
            }
            ?>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.js"></script>
</body>

</html>
