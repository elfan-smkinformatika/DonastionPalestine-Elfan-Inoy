<?php
require_once "include/connection.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location: pages/login_admin.php");
}
// Mengambil data dari session
$id = $_SESSION["id_admin"];
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
    <style>
        .table tbody tr {
            cursor: default;
        }
    </style>
</head>

<body>
    <div id="container" class="d-flex">
        <div class="col-2 nav-side bg-dark">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <div class="profil-admin d-flex">
                    <img src="" alt="">
                    <div class="info-profile">
                        <h5 class="text-light"><?= $username ?></h5>
                        <h5 class="text-light"><?= $name ?></h5>
                    </div>
                </div>
                <ul class="nav-menus d-flex justify-content-center gap-3 flex-column">
                    <li class="d-flex "><a class="d-flex text-light text-decoration-none" href="?page=dashboard"><img src="" alt="">Dashboard</a></li>
                    <li class="d-flex "><a class="d-flex text-light text-decoration-none" href="?page=donasi"><img src="" alt="">Donasi</a></li>
                    <li class="d-flex "><a class="d-flex text-light text-decoration-none" href="?page=donatur"><img src="" alt="">Donatur</a></li>
                    <li class="d-flex "><a class="d-flex text-light text-decoration-none" href="?page=kampanye-donatur"><img src="" alt="">Kampanye Donasi</a></li>
                    <li class="d-flex "><a class="d-flex text-light text-decoration-none" href="?page=metode-pembayaran"><img src="" alt="">Metode Pembayaran</a></li>
                </ul>
                <ul class="mt-auto">
                    <li class=""><a class="text-decoration-none" href="index.php">Kembali Ke Website</a></li>
                    <li class=""><a class="text-decoration-none" href="query/proses_logout.php">Logout</a></li>
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