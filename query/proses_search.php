<?php
// Koneksi ke database
require '../include/connection.php';

// Ambil nilai pencarian dari query string
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk pencarian
$query = "SELECT * FROM donatur WHERE nama_donatur LIKE '%$search%' OR email LIKE '%$search%'";

// Eksekusi query
$result = mysqli_query($conn, $query);

// Periksa apakah ada hasil
$dataDonatur = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dataDonatur[] = $row;
    }
}
?>
