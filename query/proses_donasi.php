<?php
    require_once "../include/connection.php";

    $nominal = $_POST["nominal"];
    $nama_donatur = $_POST["nama_donatur"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $metode_pembayaran = $_POST["metode_pembayaran"];
    $pesan = $_POST["pesan"];

    $query = "INSERT INTO donatur(nominal,nama_donatur,email,telephone,metode_pembayaran,pesan) VALUES('$nominal', '$nama_donatur', '$email', '$telephone', '$metode_pembayaran', '$pesan')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($conn));
    } else {
        echo "Donasi berhasil ditambahkan. Terima kasih atas kontribusi Anda!";
        header("Location: ../pages/terimakasih.php");
    }
?>