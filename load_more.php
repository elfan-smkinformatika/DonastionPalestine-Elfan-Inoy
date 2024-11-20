<?php
include 'include/connection.php'; // Pastikan file koneksi terhubung

// Ambil parameter offset dan limit dari permintaan AJAX
$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$limit = isset($_POST['limit']) ? intval($_POST['limit']) : 10;

// Query untuk mengambil data donasi dengan offset dan limit
$queryDonatur = "SELECT id_donatur, nama_donatur, nominal, pesan FROM donatur LIMIT $offset, $limit";
$resultDonatur = mysqli_query($conn, $queryDonatur);

$donations = [];
if (mysqli_num_rows($resultDonatur) > 0) {
    while ($data = mysqli_fetch_assoc($resultDonatur)) {
        $donations[] = $data;
    }
}

// Kirim data dalam format JSON
echo json_encode($donations);
?>
