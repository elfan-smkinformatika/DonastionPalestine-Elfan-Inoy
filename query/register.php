<?php
    require_once "../include/connection.php";

    $username = "firza";
    $name = "Firza Inayah";
    $password = "elfan123";
    $password_hash = password_hash($password,PASSWORD_BCRYPT);
    $jabatan = "owner";

    mysqli_query($conn, "INSERT INTO admins(username, name, password, jabatan) VALUE('$username', '$name', '$password_hash', '$jabatan')");

?>