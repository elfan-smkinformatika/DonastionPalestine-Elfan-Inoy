<?php
    require_once "../include/connection.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_hash = password_hash($password,PASSWORD_BCRYPT);

    $queryAdmin = mysqli_query($conn, "SELECT * FROM admins WHERE username='$username'");

    //Memastikan dan mencocokan data yang ada di table admins
    if (mysqli_num_rows($queryAdmin) >= 1) {
        // Mengambil data dari baris hasil Query
        $data = mysqli_fetch_assoc($queryAdmin);

        // Mengambil data dari database
        $dataId = $data["id"];
        $dataUsername = $data["username"];
        $dataPassword = $data["password"];
        $dataName = $data["name"];
        $dataJabatan = $data["jabatan"];

        echo "data ada";

        if (password_verify($password,$dataPassword)) {
            echo " Pasword Benar";
            session_start();

            $_SESSION["id"] = $dataId;
            $_SESSION["username"] = $dataUsername;
            $_SESSION["name"] = $dataName;
            $_SESSION["jabatan"] = $dataJabatan;

            header('location: ../admin.php');
        }else {
            echo "Login Gagal, coba masukan username dan passwod yang benar";
            header("Location: ../pages/login_admin.php?msg=login_gagal");
            
        }
    }else {
        // Jika Data Salah
        header("Location: ../pages/login_admin.php?msg=login_gagal");
    }
?>